#!/bin/bash
DIRECTORY=$(cd `dirname $0` && pwd)
cd $DIRECTORY
source "config.sh"


mkdir $logs 2> /dev/null

#Portal
#S’executa una vegada al dia des d'un dels frontals, a les 7:30.
wget -q -O $logs/updateDiskUse.txt  $urlbase/portal/index.php?module=agoraPortal\&type=admin\&func=updateDiskUse
