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

function exec_cli {
    $basedir$1
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

