#!/bin/bash

if [ "$#" -ne 1 ] ; then
    echo "Script per comprimir la release"
    echo "Forma d'ús: prepare_release.sh <version>"
    echo "Exemple invocació: ./prepare_release.sh 14.09.30"
    exit 0
fi

version=$1
app=agora
filename=$app"_v"$version

cd /tmp
git clone https://github.com/projectestac/$app.git
cd $app
git submodule update --recursive --init

find . -name '\.git*' -exec rm -rf {} \; 2>/dev/null

echo "Comprimint $filename.tar.gz"
tar cfzp ../$filename.tar.gz *

echo "Comprimint $filename.zip"
zip -r -q ../$filename.zip .
echo "Fet"
