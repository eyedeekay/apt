<?php header("Content-type: text/html; charset=utf-8");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
        <title>Debian I2P Packages</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="shortcut icon" href="favicon.ico" />
<link rel="canonical" href="https://deb.i2p2.de/" />
</head>
<body>
<!--<img style="float:left;display:inline;" src="openlogo-50.png" alt="Debian" width="50" height="61" /> -->
<h1 style="text-align:center">I2P Packages for Debian and Ubuntu</h1>
<h2>Overview</h2>
<p>This is the official repository for the <a href="https://geti2p.net/">I2P project</a>.
For instructions, see below, and more information is on <a href="https://geti2p.net/debian">geti2p.net</a>.
<p>
For Ubuntu, we recommend <a href="https://launchpad.net/~i2p-maintainers/+archive/ubuntu/i2p">our PPA</a> instead, and instructions are on <a href="https://geti2p.net/debian">geti2p.net</a>.
</p><p>The signing key for this repo <a href="https://geti2p.net/_static/i2p-debian-repo.key.asc">may be downloaded here</a>.</p>

<h2>News</h2>
<!-- newest first please -->
<ul>
<li><b>2022-05-24</b> I2P 1.8.0 release added to all repos; Kinetic repo added.
<li><b>2022-03-03</b> Fixed the architecture listings below for libjbigi-jni.
<li><b>2022-02-22</b> I2P 1.7.0 release added to all repos.
<li><b>2021-11-30</b> I2P 1.6.1 release added to all repos.
<li><b>2021-10-23</b> Jammy repo added.
<li><b>2021-09-10</b> Repository signing key updated; Bookworm repo added; stable/oldstable links updated.
<li><b>2021-08-30</b> I2P 1.5.0 release added to all repos, sorry for the delay.
<li><b>2021-05-19</b> I2P 0.9.50 release added to all repos.
<li><b>2021-05-16</b> Impish and Bullseye repos added.
<li><b>2021-02-17</b> I2P 0.9.49 release added to all repos.
<li><b>2020-12-02</b> I2P 0.9.48 release added to all supported repos; Hirsute repo added.
<li><b>2020-10-17</b> NOTE: I2P 0.9.47 was the last release for Xenial (16.04). Xenial I2P packages are no longer supported.
<li><b>2020-08-25</b> I2P 0.9.47 release added to all supported repos (Buster+, Xenial+).
                      Wheezy / Jessie / Stretch / Precise / Trusty I2P packages are no longer supported.
                      Java 8 is now required.
<li><b>2020-05-26</b> I2P 0.9.46 release added to all repos; Groovy repo added.
                      NOTE: This is the last release for Wheezy / Jessie / Stretch / Precise / Trusty.
                      Java 8 will be required starting with 0.9.47.
<li><b>2020-02-25</b> I2P 0.9.45 release added to all repos.
<li><b>2019-12-01</b> I2P 0.9.44 release added to all repos.
<li><b>2019-10-22</b> I2P 0.9.43 release added to all repos; Focal repo added.
<li><b>2019-09-21</b> Repository signing key updated</li>
<li><b>2019-08-28</b> I2P 0.9.42 release added to all repos.
<li><b>2019-07-24</b> Updated stable, oldstable, newstable aliases, added oldoldstable, testing, bullseye aliases.
<li><b>2019-07-03</b> I2P 0.9.41 release added to all repos.
                      Added arm64, armhf, powerpc, ppc64el, and s390x architectures to all supported repos.
<li><b>2019-05-08</b> I2P 0.9.40 release added to all repos.
<li><b>2019-04-19</b> I2P 0.9.39 in Bionic and Cosmic fixed for the change from Jetty 9.2.22 to 9.4.15; Eoan repo added.
<li><b>2019-03-22</b> I2P 0.9.39 release added to all repos.
<li><b>2019-01-26</b> I2P 0.9.38 packages for Wheezy/Jessie/Precise/Trusty fixed.
<li><b>2019-01-23</b> Disco repo added; I2P 0.9.38 release added to all repos.
<li><b>2018-10-05</b> Buster repo added; I2P 0.9.37 release added to all repos.
<li><b>2018-09-16</b> Repository signing key updated</li>
<li><b>2018-08-24</b> I2P 0.9.36 release added to all repos.
<li><b>2018-06-27</b> Cosmic repo added; I2P 0.9.35 release added to all repos.
<li><b>2018-04-20</b> I2P 0.9.34 is now in official Debian Sid and Ubuntu Bionic repos.
                      If you are running Debian Sid or Ubuntu Bionic or later, you do not need to use this repo;
                      simply install the i2p package using your package manager.
<li><b>2018-04-11</b> I2P 0.9.34 release added to all repos.
<li><b>2018-01-31</b> Bionic repo added; I2P 0.9.33 release added to all repos.
<li><b>2017-11-08</b> I2P 0.9.32 release added to all repos.
<li><b>2017-09-21</b> Repository signing key package fixed again for older distros, sorry about that</li>
<li><b>2017-09-20</b> Repository signing key package fixed, sorry about that</li>
<li><b>2017-09-18</b> Repository signing key updated</li>
<li><b>2017-08-09</b> Artful repo added; I2P 0.9.31 release added to all repos.
<li><b>2017-05-04</b> I2P 0.9.30 release added to all repos including stretch.
<li><b>2017-04-15</b> Stretch and stretch-testing repos added. Stretch-testing now contains a 0.9.29-17-rc development build.
Please report results in IRC #i2p-dev.
<!--
I2P will not be added to the stretch repo until the 0.9.30 release.
<li><b>2017-02-27</b> Note that I2P is not installable on Debian stretch or testing, or Ubuntu Zesty 17.04, since the (now EOL) libjetty8-java package is not available there.
This will not be fixed until we
migrate to Jetty 9, currently scheduled for 0.9.30, early May.
See <a href="https://trac.i2p2.de/ticket/1902">this ticket</a> for details.
Sorry for the inconvenience.
-->
<li><b>2017-01-06</b> New <a href="https://github.com/i2p/i2p.i2p/blob/master/debian-alt/doc/dependencies.txt">status notes on the i2p package</a> now available.</li>
<li><b>2016-11-04</b> https now supported on host <a href="https://deb.i2p2.de/">deb.i2p2.de</a>.
http is still available on host <a href="http://deb.i2p2.no/">deb.i2p2.no</a>.
If https does not work, do: <tt>sudo apt-get install apt-transport-https</tt>
</li>
<li><b>2016-10-01</b> Repository signing key updated</li>
<!--
<li>2014-10-17 Now serving <a href="https://github.com/PrivacySolutions/i2pd">i2pd</a></li>
-->
<li><b>2014-03-09</b> Now serving <a href="http://www.anoncoin.net">Anoncoin</a> and packages for Ubuntu</li>
<li><b>2013-10-10</b> Repository started with hosting generously provided by Meeh.</li>
</ul>

<h2>Notes</h2>
<p>Any necessary dependency packages will be found in either Debian's repository or this one. Please report any problems with the I2P packages on the <a href="https://trac.i2p2.de/newticket?component=package/debian&amp;owner=killyourtv&amp;cc=killyourtv@mail.i2p">I2P Bug Tracker</a>. Bugs for Anoncoin should be reported on its <a href="https://github.com/anoncoin/anoncoin/issues">Github project page</a>.</p>

<h3>Repository Information</h3>
<p>Add lines like the following to <code>/etc/apt/sources.list.d/i2p.list</code>.</p>
<p>For Debian Wheezy (EOL May 2018):</p>
<pre class="listing">
    deb https://deb.i2p2.de/ wheezy main
    deb-src https://deb.i2p2.de/ wheezy main</pre>
<p>For Debian Jessie (EOL June 2020):</p>
<pre class="listing">
    deb https://deb.i2p2.de/ jessie main
    deb-src https://deb.i2p2.de/ jessie main</pre>

<p>For Debian Stretch (oldoldstable):</p>
<pre class="listing">
    deb https://deb.i2p2.de/ stretch main
    deb-src https://deb.i2p2.de/ stretch main</pre>

<p>For Debian Buster (oldstable):</p>
<pre class="listing">
    deb https://deb.i2p2.de/ buster main
    deb-src https://deb.i2p2.de/ buster main</pre>

<p>For Debian Bullseye (stable):</p>
<pre class="listing">
    deb https://deb.i2p2.de/ bullseye main
    deb-src https://deb.i2p2.de/ bullseye main</pre>

<p>For Debian Bookworm (newstable):</p>
<pre class="listing">
    deb https://deb.i2p2.de/ bookworm main
    deb-src https://deb.i2p2.de/ bookworm main</pre>

<p>For Debian testing or Sid (unstable):</p>
<pre class="listing">
    deb https://deb.i2p2.de/ unstable main
    deb-src https://deb.i2p2.de/ unstable main</pre>

<p>For Ubuntu Precise (LTS 12.04):</p>
<pre class="listing">
    deb https://deb.i2p2.de/ precise main
    deb-src https://deb.i2p2.de/ precise main</pre>

<p>For Ubuntu Trusty (LTS 14.04):</p>
<pre class="listing">
    deb https://deb.i2p2.de/ trusty main
    deb-src https://deb.i2p2.de/ trusty main</pre>

<p>For Ubuntu Xenial (LTS 16.04):</p>
<pre class="listing">
    deb https://deb.i2p2.de/ xenial main
    deb-src https://deb.i2p2.de/ xenial main</pre>

<p>For Ubuntu Bionic (LTS 18.04):</p>
<pre class="listing">
    deb https://deb.i2p2.de/ bionic main
    deb-src https://deb.i2p2.de/ bionic main</pre>

<p>For Ubuntu Focal (LTS 20.04):</p>
<pre class="listing">
    deb https://deb.i2p2.de/ focal main
    deb-src https://deb.i2p2.de/ focal main</pre>

<p>For Ubuntu Groovy (20.10):</p>
<pre class="listing">
    deb https://deb.i2p2.de/ groovy main
    deb-src https://deb.i2p2.de/ groovy main</pre>

<p>For Ubuntu Hirsute (21.04):</p>
<pre class="listing">
    deb https://deb.i2p2.de/ hirsute main
    deb-src https://deb.i2p2.de/ hirsute main</pre>

<p>For Ubuntu Impish (21.10):</p>
<pre class="listing">
    deb https://deb.i2p2.de/ impish main
    deb-src https://deb.i2p2.de/ impish main</pre>

<p>For Ubuntu Jammy (LTS 22.04):</p>
<pre class="listing">
    deb https://deb.i2p2.de/ jammy main
    deb-src https://deb.i2p2.de/ jammy main</pre>


<h3>Updating the package list</h3>
<p>
After adding the repo to apt, update the package list with</p>
<pre class="listing">    sudo apt-get update</pre>
<p>APT will likely complain about a missing key. If it does you can resolve this by running the following:</p>
<pre class="listing">    sudo apt-get install i2p-keyring &amp;&amp; apt-get update</pre>
<p>Alternately, you may <a href="https://geti2p.net/_static/i2p-debian-repo.key.asc">download the key here</a>
and then do:</p>
<pre class="listing">    sudo apt-key add i2p-debian-repo.key.asc</pre>

<h2>Current Contents</h2>
<p>The current contents of the repo are listed below.
This information is automatically generated.
</p>



<hr style="width:75%" />
<?php
include_once("parse-apt-files.inc");

echo "<hr style=\"width:75%\">";
echo "<h2 id=\"bullseye\" style=\"text-align:center\">Packages in Bullseye (Debian stable)</h2>";
parse_and_list(
  Array("dists/bullseye/main/binary-i386/Packages.gz",
  "dists/bullseye/main/binary-amd64/Packages.gz",
  "dists/bullseye/main/binary-armhf/Packages.gz",
  "dists/bullseye/main/binary-arm64/Packages.gz",
  "dists/bullseye/main/binary-ppc64el/Packages.gz",
  "dists/bullseye/main/binary-s390x/Packages.gz"),
  "dists/bullseye/main/source/Sources.gz");

echo "<h2 id=\"buster\" style=\"text-align:center\">Packages in Buster (Debian old stable)</h2>";
parse_and_list(
  Array("dists/buster/main/binary-i386/Packages.gz",
  "dists/buster/main/binary-amd64/Packages.gz",
  "dists/buster/main/binary-armel/Packages.gz",
  "dists/buster/main/binary-armhf/Packages.gz",
  "dists/buster/main/binary-arm64/Packages.gz",
  "dists/buster/main/binary-ppc64el/Packages.gz",
  "dists/buster/main/binary-s390x/Packages.gz"),
  "dists/buster/main/source/Sources.gz");

echo "<h2 id=\"stretch\" style=\"text-align:center\">Packages in Stretch (Debian old old stable)</h2>";
parse_and_list(
  Array("dists/stretch/main/binary-i386/Packages.gz",
  "dists/stretch/main/binary-amd64/Packages.gz",
  "dists/stretch/main/binary-armel/Packages.gz",
  "dists/stretch/main/binary-armhf/Packages.gz"),
  "dists/stretch/main/source/Sources.gz");

echo "<h2 id=\"jessie\" style=\"text-align:center\">Packages in Jessie (Debian's old old old stable distribution, released 2015-04-25)</h2>";
parse_and_list(
  Array("dists/jessie/main/binary-i386/Packages.gz",
  "dists/jessie/main/binary-amd64/Packages.gz",
  "dists/jessie/main/binary-armel/Packages.gz",
  "dists/jessie/main/binary-armhf/Packages.gz",
  "dists/jessie/main/binary-powerpc/Packages.gz"),
  "dists/jessie/main/source/Sources.gz");

echo "<hr style=\"width:75%\">";
echo "<h2 id=\"wheezy\" style=\"text-align:center\">Packages in Wheezy (Debian's old old old old stable distribution, released 2013-05-04)</h2>";
parse_and_list(
  Array("dists/wheezy/main/binary-i386/Packages.gz",
  "dists/wheezy/main/binary-amd64/Packages.gz",
  "dists/wheezy/main/binary-armel/Packages.gz",
  "dists/wheezy/main/binary-armhf/Packages.gz",
  "dists/wheezy/main/binary-powerpc/Packages.gz"),
  "dists/wheezy/main/source/Sources.gz");

echo "<hr style=\"width:75%\">";
echo "<h2 id=\"sid\" style=\"text-align:center\">Packages in Unstable (sid)</h2>";
parse_and_list(
  Array("dists/unstable/main/binary-i386/Packages.gz",
  "dists/unstable/main/binary-amd64/Packages.gz",
  "dists/unstable/main/binary-armel/Packages.gz",
  "dists/unstable/main/binary-armhf/Packages.gz"),
  "dists/unstable/main/source/Sources.gz");

?>
</body>
</html>
