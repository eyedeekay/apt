#!/bin/sh

DIROFDIST="$1"
NEWNAME="$2"
OLDNAME="$3"
# this can be old($3 exists), new($2 exists) or change (both):
STATUS="$4"
BASENAME="`basename "$OLDNAME"`"

# with reprepro <= 0.7 this could also be Packages.gz or Sources.gz,
# but now only the uncompressed name is given. (even if not generated)
if [ "xPackages" = "x$BASENAME" ] || [ "xSources" = "x$BASENAME" ] ; then
if [ "x$STATUS" = "xold" ] ; then
if [ -f "$DIROFDIST/$OLDNAME.lzma" ] ; then
echo "$OLDNAME.lzma" >&3
else
lzma -c -- "$DIROFDIST/$OLDNAME" >"$DIROFDIST/$OLDNAME.lzma.new" 3>/dev/null
echo "$OLDNAME.lzma.new" >&3
fi
else
lzma -c -- "$DIROFDIST/$NEWNAME" >"$DIROFDIST/$OLDNAME.lzma.new" 3>/dev/null
echo "$OLDNAME.lzma.new" >&3
fi
fi

