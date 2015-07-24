#!/bin/bash
DIRECTORY=$(cd `dirname $0` && pwd)
cd $DIRECTORY
source "config.sh"

#Cues del portal
#S'executa cada 5 minuts
cd /tmp
get_curl '/portal/queues_cron.php'
rm -f /tmp/queues_cron.php*
