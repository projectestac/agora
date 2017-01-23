#!/bin/bash

urlbase=http://agora-virtual.xtec.cat/agora
basedir=/dades/agora/
apacheuser=vagrant
logs=$basedir"logs"
moodledata="docs/moodle2"
portaldata="docs/portaldata"
zkdata="zkdata"
wpdata="docs/wpdata"
mysqlsock="/var/run/mysqld/mysqld.sock"
server="localhost"
port="3306"

NLS_LANG=AMERICAN_AMERICA.AL32UTF8
TZ=Europe/Madrid
export NLS_LANG
export TZ
#LD_LIBRARY_PATH="/usr/local/lib:/etc/httpd/lib:/opt/xtk/lib:$LD_LIBRARY_PATH"
#export LD_LIBRARY_PATH
#TNS_ADMIN=/etc/httpd/conf/oracle/
#APACHE_HOME=/etc/httpd/

# DEV
PHP_PATH="/usr/bin/php"

# CMO
#PHP_PATH="/opt/xtk/php5/bin/php -c /opt/xtk/php5/lib/php.ini"

# FMO AGORA INT / AGORA-EOI INT
#PHP_PATH="/opt/rh/php54/root/usr/bin/php -c /serveis/conf/int/A02php54/apache/php.ini"

# FMO AGORA PRE
#PHP_PATH="/opt/rh/php54/root/usr/bin/php -c /serveis/conf/pre/1051/apache/php.ini"

# FMO AGORA PRO
#PHP_PATH="/opt/rh/php54/root/usr/bin/php -c /serveis/conf/pro/1051/apache/php.ini"

# FMO AGORA FRM
#PHP_PATH="/opt/rh/php54/root/usr/bin/php -c /serveis/conf/for/P02for/apache/php.ini"

# FMO AGORA-EOI PRE
#PHP_PATH="/opt/rh/php54/root/usr/bin/php -c /serveis/conf/pre/1143/apache/php.ini"

# FMO AGORA-EOI PRO
#PHP_PATH="/opt/rh/php54/root/usr/bin/php -c /serveis/conf/pro/1143/apache/php.ini"

source "lib.sh"
