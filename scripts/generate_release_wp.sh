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

PDIR="wp-autoembed.$1"
PFILE="wp-autoembed.$1.zip"

echo "Preparing for version $1 release ..."
mkdir $PDIR
cp ../dist/autoembed-wordpress/autoembed.php $PDIR
cp ../dist/autoembed-wordpress/licence.txt $PDIR
cp ../dist/autoembed-wordpress/readme.txt $PDIR
zip $PFILE $PDIR/*
echo "File written to $PFILE"
echo "Cleaning up ..."
rm -rf $PDIR
echo "Done"
