#!/bin/bash
DIRECTORY=$(cd `dirname $0` && pwd)
cd $DIRECTORY
source "config.sh"

#Moodle Crons
#S’executa cada 15 minuts entre les 22:00 i les 10:00 i una vegada a les 14:00. Els crons s’executen via CLI.
data=`date +%Y%m%d%H%M`
fitxer=$basedir"/adminInfo/cronMoodle2.txt"

mkdir $logs 2> /dev/null

cd /tmp

#Control del PID
PID=$$
#Execucio amb log
cat $fitxer | while read line; do
	data=`date +%Y%m%d%H%M`
	wget -O - $line 2>> $logs/cron${data}2_${PID}.txt >> $logs/cron${data}2_${PID}.txt
	sleep 2
done

sleep 10

chown $apacheuser $logs/*
