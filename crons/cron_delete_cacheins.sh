#!/bin/bash
DIRECTORY=$(cd `dirname $0` && pwd)
cd $DIRECTORY
source "config.sh"

#Elimina el cacheins:
dir="localmuc/*"
rm -Rf $basedir$dir
