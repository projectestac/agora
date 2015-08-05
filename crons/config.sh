#!/bin/bash

urlbase=http://agora/agora
basedir=/dades/agora/
apacheuser=apache2
logs=$basedir"logs"

NLS_LANG=AMERICAN_AMERICA.AL32UTF8
TZ=Europe/Madrid
export NLS_LANG
export TZ
#LD_LIBRARY_PATH="/usr/local/lib:/etc/httpd/lib:/opt/xtk/lib:$LD_LIBRARY_PATH"
#export LD_LIBRARY_PATH
#TNS_ADMIN=/etc/httpd/conf/oracle/
#APACHE_HOME=/etc/httpd/

# DEV
PHP_PATH=/usr/bin/php

# CMO
#PHP_PATH="/opt/xtk/php5/bin/php -c /opt/xtk/php5/lib/php.ini"

# FMO AGORA INT / AGORA-EOI INT
#PHP_PATH="/opt/rh/php54/root/usr/bin/php -c /serveis/conf/int/A02php54/apache/php.ini"

# FMO AGORA PRE
#PHP_PATH="/opt/rh/php54/root/usr/bin/php -c /serveis/conf/pre/1051/apache/php.ini"

# FMO AGORA PRO
#PHP_PATH="/opt/rh/php54/root/usr/bin/php -c /serveis/conf/pro/1051/apache/php.ini"

# FMO AGORA-EOI PRE
#PHP_PATH="/opt/rh/php54/root/usr/bin/php -c /serveis/conf/pre/1143/apache/php.ini"

# FMO AGORA-EOI PRO
#PHP_PATH="/opt/rh/php54/root/usr/bin/php -c /serveis/conf/pro/1143/apache/php.ini"


function exec_cli {
    php $basedir$1
}

function get_curl {
    get_curl_complete $urlbase$1
}

function get_curl_complete {
    curl --silent $1 > /dev/null
}

function get_wget {
    get_wget_complete $urlbase$1
}

function get_wget_complete {
    wget -q -o /dev/null $1 > /dev/null
}

