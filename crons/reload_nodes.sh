#!/bin/bash

DIRECTORY=$(cd `dirname $0` && pwd)
cd $DIRECTORY

source "config.sh"
source "pass.sh"

echo "------------------------------------------------"
echo `date`
echo "------------------------------------------------"

mysqlsock=$mysqlsock
echo "Valor del socket MySQL obtingut: $mysqlsock"

echo "Esborrant USU1 i USU2... " 
mysqladmin -h $server -u $mysqladmin_user -p$mysqladmin_pass -S $mysqlsock --port=$port -f drop usu1;
mysqladmin -h $server -u $mysqladmin_user -p$mysqladmin_pass -S $mysqlsock --port=$port -f drop usu2;

echo "Create USU1... "
mysqladmin -h $server -u $mysqladmin_user -p$mysqladmin_pass -S $mysqlsock --port=$port create usu1;
echo "Create USU2... "
mysqladmin -h $server -u $mysqladmin_user -p$mysqladmin_pass -S $mysqlsock --port=$port create usu2;

echo "Bolcant el fitxer nodes_pri.sql a USU1... "
mysql -h $server -u $mysqladmin_user -p$mysqladmin_pass -S $mysqlsock --port=$port  usu1 < $basedir$portaldata'/data/demo/nodes_pri.sql';
echo "Bolcant el fitxer nodes_sec.sql a USU2... "
mysql -h $server -u $mysqladmin_user -p$mysqladmin_pass -S $mysqlsock --port=$port usu2 < $basedir$portaldata'/data/demo/nodes_sec.sql';
echo "Bases de dades bolcades"
echo

echo "Esborrant zkdata/[usu1,usu2]... "
rm -rf $basedir$zkdata/usu1/*
rm -rf $basedir$zkdata/usu2/*

echo "Esborrant wpdata/[usu1,usu2]... "
rm -rf $basedir$wpdata/usu1/*
rm -rf $basedir$wpdata/usu2/*

echo "Descomprimint dades a zkdata... "
unzip $basedir$portaldata/data/demo/usu0.zip -d $basedir$zkdata/usu1/
unzip $basedir$portaldata/data/demo/usu0.zip -d $basedir$zkdata/usu2/

echo "Descomprimint dades a wpdata... "
unzip $basedir$moodledata/usu2/repository/files/masterpri.zip -d $basedir$wpdata/usu1/
unzip $basedir$moodledata/usu2/repository/files/mastersec.zip -d $basedir$wpdata/usu2/

echo "Aplicant permisos... "
chmod -R 777 $basedir$zkdata/usu1/
chmod -R 777 $basedir$zkdata/usu2/
chmod -R 777 $basedir$wpdata/usu1/
chmod -R 777 $basedir$wpdata/usu2/
echo "Fi"
echo
