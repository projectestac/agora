#!/bin/bash
DIRECTORY=$(cd `dirname $0` && pwd)
cd $DIRECTORY
source "config.sh"

#Cues del portal
#S'executa cada 5 minuts
cd $basedir'html/portal'
exec_cli queues_cron.php
