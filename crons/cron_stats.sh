#!/bin/bash
DIRECTORY=$(cd `dirname $0` && pwd)
cd $DIRECTORY
source "config.sh"

#Estadístiques
#S’executa una vegada al dia, sobre les 2:00 des d'un dels frontals.

cd /tmp

exec_cli '/config/statistics.php?only=intranet'
exec_cli '/config/statistics.php?only=moodle2'
exec_cli '/config/statistics.php?only=nodes'

rm /tmp/statistics.php*
