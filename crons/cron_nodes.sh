#!/bin/bash
DIRECTORY=$(cd `dirname $0` && pwd)
cd $DIRECTORY
source "config.sh"

mkdir $logs 2> /dev/null

data=`date +%Y%m%d`
if [ ! -f $logs/cron_nodes_${data}.txt ]; then
    touch $logs/cron_nodes_${data}.txt
fi

hora=`date +%H:%M`
echo "Inici execució "${hora} >> $logs/cron_nodes_${data}.txt

mkdir $basedir"adminInfo" 2> /dev/null

cd $basedir/html/config
exec_cli $basedir/html/config/createSchoolsListsFiles.php

cd /tmp
fitxer=$basedir"adminInfo/cronNodes.txt"

cat $fitxer | while read line; do
	get_wget_complete $line
done

rm -f /tmp/wp-cron.php*

hora=`date +%H:%M`
echo "Final execució "${hora} >> $logs/cron_nodes_${data}.txt

# Compressio dels crons del dia anterior
cd $logs
data=`date -d "2 days ago" +%Y%m%d`
tar -zcvf crons.$data.tgz  cron_nodes_${data}*.txt
rm -f cron_nodes_${data}*.txt

chown $apacheuser $logs/* 2> /dev/null

