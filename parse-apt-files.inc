<?php
    //////////////////////////////////////////////////////////////////
    // PHP Apt-file parser, Version 1.3.7
    // $Id$
    //
    // The following PHP functions parse Debian APT-repository files
    // (Packages.gz, Sources.gz) and generate an XHTML summary of them.
    //
    // Written by Jarno Elonen in 2003, 2004
    // Written by Daniel Leidert in 2005-2008
    // Written by Damian Viano in 2006
    //
    // Visit or join us at
    //   http://alioth.debian.org/projects/php-apt-parser.
    //
    // For licensing information see the LICENSE file.
    //
    //////////////////////////////////////////////////////////////////

    // Parse Packages.gz or Sources.gz file and return an array of format
    // Array( "<pkg-name>", Array( "<Field-name>" => "<value>", ... ))
    // Note that the result may contain several versions of the same package
    function parse_packages( $filename )
    {
        $lines = (strpos($filename, ".gz") !== False)
          ? gzfile($filename) : file($filename);

        $i = -1;
        $curtag = false;
        $newtag = true;
        $value = "";
        $res = Array();
        foreach( $lines as $line )
        {
            $matches = Array();
            if ( preg_match("/^([^ ]*):( )?(.*)$/", $line, $matches) )
            {
                if ( $curtag !== false && $i >= 0 )
                    $res[$i][1][$curtag] = $value;

                $curtag = $matches[1];
                $value = $matches[3];

                if ( $curtag == "Package" )
                    $res[++$i] = Array(0 => $value, 1 => Array());
                $newtag = true;
            }
            else
            {
                if ( trim($line) !== "." )
                {
                    if ( $newtag || substr($line, 0, 2) == "  " )
                        $value .= "\n";
                    else
                        $value .= " ";
                    $value .= trim($line);
                }
                else $value .= "\n\n";
                $newtag = false;
            }
        }
        if ( $curtag !== false && $i >= 0 )
            $res[$i][1][$curtag] = $value;

        return $res;
    }

    // Convert given byte-size to more human readable format
    function human_format_size( $bytes )
    {
        $formats = Array("%d Bytes", "%.1f KB", "%.1f MB", "%.1f GB",
                         "%.1f TB");
        $logsize = min((int)(log($bytes)/log(1024)), count($formats)-1);
        return sprintf($formats[$logsize], $bytes/pow(1024, $logsize));
    }

    // Extract URLs from text, make them links and output
    // the whole thing as HTML
    function link_aware_htmlize( $txt )
    {
        $res = "";
        $linkpattern = "!([a-z]+://[^ \n    \)$]+)!is";
        $frags = preg_split($linkpattern, $txt, -1, PREG_SPLIT_DELIM_CAPTURE);
        foreach( $frags as $f )
        {
            if ( preg_match($linkpattern, $f) )
                $res .= "<a href=\"" . htmlentities($f) . "\">" .
                        htmlentities($f) . "</a>";
            else
                $res .= htmlentities($f);
        }
        return str_replace("\n", "<br/>\n", $res);
    }

    function parse_section( $section )
    {
        $res = "<span class=\"section\">";
        if ( preg_match("!(contrib/[a-z]+)!is", $section) )
            $res .= ", <span class=\"contrib\">contrib</span>";
        else if ( preg_match("!(non-free/[a-z]+)!is", $section) )
            $res .= ", <span class=\"nonfree\">non-free</span>";
        else
            $res .= ", <span class=\"main\">main</span>";
        return $res . "</span>";
    }

    // We simply check, if the created filename fits exactly the beginning of
    // the name of the given file. If yes, we have our  
    // This adds quite a bit of disk access so if your server is very busy,
    // you might want to comment the function call out.
    function chb_file_match( $file, $version, $field )
    {
        $res = false;
        if ( strpos( $file, $field . "_" . $version, 0 ) !== False )
          return $file;
        else
          return $res;
    }

    // Get a directory and which files to search for. Try to make a file link.
    // This adds quite a bit of disk access so if your server is very busy,
    // you might want to comment the function call out.
    function chb_file_link_from_directory( $dir, $ext, $myfields, $mysrcdields )
    {
        global $base_url;
        $dhandle = false;
        $version = preg_replace("/^[0-9]+\:/", "", $myfields["Version"]);

        // If no special directory was given, we set the directory found in
        // the "Directory" field of the Sources(.gz) entry as search path.
        if ( $dir == False )
            $dir = $mysrcdields["Directory"];

        if ( $dir !== False && $dhandle = opendir($dir) )
        {
            $chfile = False;
            
            while ( false !== ($file = readdir($dhandle)) )
            {
                $fileinfo = pathinfo($file);
                // Only check files, that are not '.' or '..' and have the
                // necessary file extension. This maybe reduces the workload.
                if ( $file != "."
                     && $file != ".."
                     && $fileinfo["extension"] == $ext )
                { 
                    // Packages with multiple binaries or a source-package
                    // name != binary-package name normally have a
                    // "Source"-field in Packages(.{gz,bz2}).
                    if ( isset($myfields["Source"]) )
                        $chfile = chb_file_match($file, $version, $myfields["Source"]);
                    // If there is no "Source"-field, just try to use the
                    // Packages-field in Sources(.{gz,bz2}).
                    else if ( isset($mysrcdields["Package"]) )
                        $chfile = chb_file_match($file, $version, $mysrcdields["Package"]);
                    // And at least simply try the "Package"-field from
                    // Packages(.{gz,bz2}) for those packages, that do not
                    // have a Sources(.{gz,bz2}) entry.
                    else
                        $chfile = chb_file_match($file, $version, $myfields["Package"]);
                }
                if ( $chfile !== False )
                {
                        print "| <span class=\"" .
                        $ext .
                        "\"><a href=\"" .
                        htmlentities($base_url) .
                        htmlentities($dir) .
                        "/" .
                        htmlentities($chfile) .
                        "\">" . "." .
                        htmlentities($ext) .
                        "</a></span>" . "\n";
                    break;
                }
            }
            closedir($dhandle);
        }
    }

    // Parse given files and write out a nice summary in HTML.
    // This is the main function.
    function parse_and_list( $packagesgzfiles, $sourcesgzfile,
                             $shared_changesdir = False,
                             $shared_buildlogsdir = False )
    {
        global $base_url;
        if ( !is_array($sourcesgzfile) )
            $sourcesgzfile = Array($sourcesgzfile);
        
        // Rebuild sources array
        $sources = Array();
        foreach( $sourcesgzfile as $f )
        {
            $sources_temp = parse_packages($f);
            while( list($i, $p) = each($sources_temp) )
                    $sources[$p[0]] = $p[1];
        }

        if ( !is_array($packagesgzfiles) )
            $packagesgzfiles = Array($packagesgzfiles);

        // Merge different architectures into one $packages array
        $packages = Array();
        foreach( $packagesgzfiles as $f )
        {
            $pkgs = parse_packages($f);
            while( list($i, $p) = each($pkgs) )
            {
                $name_and_ver = $p[0] . "-" . $p[1]["Version"];
                if ( !isset($packages[$name_and_ver]) )
                    $packages[$name_and_ver] = Array();
                $packages[$name_and_ver][$p[1]["Architecture"]] = $p;
            }
        }

        // Walk through the packages and print out the info
        while( list($name_and_ver, $archs) = each($packages) )
        {
            print "<div class=\"package\">\n";

            // $first = false;
            // use the first arch for description etc.
            ksort($archs);
            list($pkg, $fields) = reset($archs);

            $srcfields = false;
            if ( isset($fields["Source"]) &&
                 isset($sources[$fields["Source"]]) )
                    $srcfields = $sources[$fields["Source"]];
            else if ( isset($sources[$pkg]) )
                $srcfields = $sources[$pkg];

            print "<span class=\"name\">" .
                  htmlentities($fields["Package"]) .
                  "</span> " .
                  "<span class=\"version\">(" .
                  htmlentities($fields["Version"]) .
                  parse_section($fields["Section"]) .
                  ")</span>" .
                  "\n";

            if ( strlen(trim($fields["Description"])) )
                print " - <span class=\"short_description\">" .
                      htmlentities(preg_replace("/[\n].*/", "",
                        $fields["Description"]));
            print "</span><br/>\n";

            $archlinks = Array();
            while( list($arch_name, list(, $arch_fields)) = each($archs) )
                $archlinks[] = "<a href=\"" .
                               htmlentities($base_url) .
                               htmlentities($arch_fields["Filename"]) .
                               "\">" .
                               htmlentities($arch_name) .
                               " (" .
                               human_format_size($arch_fields["Size"]) .
                               ")</a>";
            print "<span class=\"linkline\">Binary for arch <span class=\"archs\">" .
                  join(", ", $archlinks) . "</span>\n";

            // If sources are available, print out location.
            if ( isset($srcfields["Directory"]) )
            {
                print "| <span class=\"source\"><a href=\"" .
                    htmlentities($base_url) .
                    htmlentities($srcfields["Directory"]) .
                    "/\">Source dir</a></span>" . "\n";

            }
  
            // Now create .changes and .build file links.
            chb_file_link_from_directory( $shared_changesdir, "changes", $fields, $srcfields );
            // The file extenion for build-log should be changeable. For the
            // moment we set it to the debuild/pdebuild default '.build'.
            chb_file_link_from_directory( $shared_buildlogsdir, "build", $fields, $srcfields );
            
            print "</span>";
            
            // Output the package description.
	    print "<br/><br/>\n" .
                  "<blockquote cite=\"" .
                  htmlentities($base_url) .
                  htmlentities($srcfields["Directory"]) .
                  "\"><p class=\"description\">\n" .
                  link_aware_htmlize(
                    preg_replace("/^[^\n]*\n/", "", $fields["Description"])) .
                  "\n</p>\n" .
                  "</blockquote>\n</div>\n";
        }
    }
?>
