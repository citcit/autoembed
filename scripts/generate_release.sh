#!/bin/bash
if [ ! -f "generate_release.sh" ]
then
	echo "Script must be run from the scripts/ directory.  Aborting."
	exit
fi

if [ -z "$1" ] 
then
	echo "Must specify a version for this release.  Aborting."
	exit
fi

PDIR="AutoEmbed-$1"
PFILE="AutoEmbed-$1.tar.gz"

echo "Preparing for version $1 release ..."
mkdir $PDIR
cp ../AutoEmbed.class.php $PDIR
cp ../LICENSE $PDIR
cp ../README $PDIR
cp ../stubs.php $PDIR
tar vcfz ../public/download/$PFILE $PDIR
echo "File written to ../public/download/$PFILE"
echo "Cleaning up ..."
rm -rf $PDIR
echo "Done"
