#!/bin/bash

#//------------ DESENVOLUPAMENT

PHP_PATH=/usr/bin/php5
export ORACLE_HOME=/usr/lib/oracle/xe/app/oracle/product/10.2.0/server
TNS_ADMIN=$ORACLE_HOME/network/admin
LD_LIBRARY_PATH=$LD_LIBRARY_PATH:$ORACLE_HOME:$ORACLE_HOME/lib
NLS_LANG=SPANISH_SPAIN.AL32UTF8
TZ=Europe/Madrid


#//------------ INTEGRACIÓ / ACCEPTACIÓ / PRODUCCIÓ
<<COMENTAT
PHP_PATH="/opt/xtk/php5/bin/php -c /opt/xtk/php5/lib/php.ini"

# Oracle vars for OCI8 (extracted from /opt/coolstack/apache2/bin/envvars)
LD_LIBRARY_PATH="/usr/local/lib:/opt/xtk/apache2-80/lib:/opt/xtk/lib:$LD_LIBRARY_PATH"
TNS_ADMIN=/opt/xtk/apache2-80/conf/extra
TZ=Europe/Madrid
NLS_LANG=AMERICAN_AMERICA.AL32UTF8
COMENTAT


#//----- PART COMUNA
export LD_LIBRARY_PATH
export NLS_LANG
export TZ
export TNS_ADMIN
