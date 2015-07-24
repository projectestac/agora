#!/bin/bash
DIRECTORY=$(cd `dirname $0` && pwd)
cd $DIRECTORY
source "config.sh"


mkdir $logs 2> /dev/null

mkdir $basedir"adminInfo" 2> /dev/null

cd $basedir/html/config
php $basedir/html/config/createSchoolsListsFiles.php
sleep 5

cd /tmp
fitxer=$basedir"adminInfo/cronIntranet.txt"

cat $fitxer | while read line; do
	get_wget_complete $line
done

rm -f /tmp/iwcron.php*
rm -f /tmp/index.php*
rm -f /tmp/cron.php*
rm -f /tmp/queues_cron.php*


#Compressio dels crons del dia anterior:
cd $logs
data=`date -d "yesterday" +%Y%m%d`
tar -zcvf crons.$data.tgz  cron${data}*.txt
rm -f cron${data}*.txt

chown $apacheuser $logs/* 2> /dev/null
