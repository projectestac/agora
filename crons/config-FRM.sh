#!/bin/bash

urlbase=http://agora.xtec.cat/formacio
basedir="/serveis/dades/for/P02for/apache/1051_agora/"
apacheuser=adP02php
logs=$basedir"logs"
moodledata="dades/dades1/moodle2"
portaldata="dades/dades2/portaldata"
zkdata="dades/dades2/zkdata"
wpdata="dades/dades2/wpdata"
mysqlsock="/serveis/dades/for/P02for/myAgoraFrm/myAgoraFrm.sock"
server="10.48.24.39"
port="3307"

NLS_LANG=AMERICAN_AMERICA.AL32UTF8
TZ=Europe/Madrid
export NLS_LANG
export TZ
#LD_LIBRARY_PATH="/usr/local/lib:/etc/httpd/lib:/opt/xtk/lib:$LD_LIBRARY_PATH"
#export LD_LIBRARY_PATH
#TNS_ADMIN=/etc/httpd/conf/oracle/
#APACHE_HOME=/etc/httpd/

# DEV
#PHP_PATH="/usr/bin/php"

# CMO
#PHP_PATH="/opt/xtk/php5/bin/php -c /opt/xtk/php5/lib/php.ini"

# FMO AGORA INT / AGORA-EOI INT
#PHP_PATH="/opt/rh/php54/root/usr/bin/php -c /serveis/conf/int/A02php54/apache/php.ini"

# FMO AGORA PRE
#PHP_PATH="/opt/rh/php54/root/usr/bin/php -c /serveis/conf/pre/1051/apache/php.ini"

# FMO AGORA PRO
#PHP_PATH="/opt/rh/php54/root/usr/bin/php -c /serveis/conf/pro/1051/apache/php.ini"

# FMO AGORA FRM
PHP_PATH="/opt/rh/php54/root/usr/bin/php -c /serveis/conf/for/P02for/apache/php.ini"

# FMO AGORA-EOI PRE
#PHP_PATH="/opt/rh/php54/root/usr/bin/php -c /serveis/conf/pre/1143/apache/php.ini"

# FMO AGORA-EOI PRO
#PHP_PATH="/opt/rh/php54/root/usr/bin/php -c /serveis/conf/pro/1143/apache/php.ini"

source "lib.sh"
