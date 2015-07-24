#!/bin/bash
DIRECTORY=$(cd `dirname $0` && pwd)
cd $DIRECTORY
source "config.sh"

#Estadístiques
#S’executa una vegada al dia, sobre les 2:00 des d'un dels frontals.

cd /tmp

get_wget '/config/statistics.php?onlyIntranet'
get_wget '/config/statistics.php?onlyMoodle2'
get_wget '/config/statistics.php?onlyNodes'

rm /tmp/statistics.php*
