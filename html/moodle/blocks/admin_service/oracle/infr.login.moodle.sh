#!/bin/bash

# script infr.login.moodle.sh
# versio 0.2.20100414
# S'ha d'executar cada minut per cada backend (indicant-lo com a paràmetre, per exemple ./infr.login.moodle.sh adora1) des d'un dels frontends.
# * * * * * ~/analytics/infr.login.moodle.sh xe > /dev/null
# Si es supera el LIMIT de sessions es modifica el login en Moodle
# Comprova la càrrega de la màquina i actualitza el semàfor en funció del limit permès. 
# Actualitza la columna semafor de la taula MLANALYTICS

#Agafem el nom del BE
SERVER_NAME=$1

# Importar variables de configuracio
. ~/analytics/infr.config.sh

TMP_RESULT_FILE=$RESULT_FILE
RESULT_FILE=$TMP_RESULT_FILE"1"

#Necessitem agafar valors de la Bases de dades Oracle mitjançant un SQL
#Aquesta base de dades correspons a l instància Moodle que controla les estadístiques.
#connexió ORACLE s'ha d'especificar al sqlplus: "instancia/password@basesdedades"
#PENDENT: Modificar consulta SQL per permetre més d'un backed. La consulta final és:
#select value from mlconfig where name = (select CONCAT('maxpostgres', id) from mlanalytics where nom_client='SERVER' AND server_name='$SERVER_NAME')

sqlplus $DBUSER/$DBPASSWORD@$DBNAME <<EOF
set lines 132 pages 999
spool $RESULT_FILE
select value from mlconfig where name = (select CONCAT('maxpostgres', id) from mlanalytics where nom_client='SERVER' AND server_name='$SERVER_NAME')
spool off
EOF
#Límit de Sessions Oracle
MAXPOSTGRES=`cat $RESULT_FILE | head -5 | tail -1 | sed s/" "//g`

#Límit de CPU crític
sqlplus $DBUSER/$DBPASSWORD@$DBNAME <<EOF
set lines 132 pages 999
spool $RESULT_FILE
select value from mlconfig where name = (select CONCAT('limitcritic', id) from mlanalytics where nom_client='SERVER' AND server_name='$SERVER_NAME')
spool off
EOF
LIMITCRITIC=`cat $RESULT_FILE | head -5 | tail -1 | sed s/" "//g`

#Límit de CPU mig
sqlplus $DBUSER/$DBPASSWORD@$DBNAME <<EOF
set lines 132 pages 999
spool $RESULT_FILE
select value from mlconfig where name = (select CONCAT('limitwarning', id) from mlanalytics where nom_client='SERVER' AND server_name='$SERVER_NAME')
spool off
EOF
LIMITWARNING=`cat $RESULT_FILE | head -5 | tail -1 | sed s/" "//g`

#Els 3 estats de la màquina
ESTATCRITIC=2
ESTATWARNING=1
ESTATOK=0

FECHA=`date +%Y%m%d`

#echo $ESTATCRITIC, $ESTATWARNING, $ESTATOK...

# valors uptime i num. sessions moodle:
#CARREGA=`uptime | awk -F: '{print $NF}' | awk -F\. '{print $1}'`
UPTIME=`uptime`

# Ens quedem amb la càrrega adequada 5m. L'String que retallem es UPTIME per aconseguir el valor separant per comes
# Segons la màquina virtual aixó no agafa correctament el valor per en comptes de ser: 0.15, 0.20, 0.30 són 0,15, 0,20, 0,30
# mirem carrega 5m (-f2):
#CARREGA=`echo $UPTIME | awk -F: '{print $NF}' | cut -d, -f2 | awk -F\. '{print $1}' | sed s/" "//g`
#Necesitem consultar la carrega en mitjana del BE corresponent (Falta especificar com es posa el BE)
CARREGATOTAL=`/usr/sfw/bin/snmpget -t 1 -r 5 -m ALL -v 1 -O vq -c public $SNMP_SERVER laLoad.1 laLoad.2 laLoad.3`
CARREGA=`echo $CARREGATOTAL |  awk ' { print $2 }'`


#NUMSES=`find /Dades/moodledata/sessions/ -type f -size +1024c  -ls | wc -l`
#PROCPOSTGRES=`ps -ef|grep oracle |grep LOCAL= |wc -l`
sqlplus $DBMONITORUSER/$DBMONITORPASSWORD@$DBMONITORNAME <<EOF
set lines 132 pages 999
spool $RESULT_FILE
select count(*) from v\$session s, v\$process p where s.username like 'USU%' and s.paddr = p.addr and s.status='ACTIVE';
spool off
EOF
PROCPOSTGRES=`cat $RESULT_FILE | head -5 | tail -1 | sed s/" "//g`

# Agafem estat anterior del semàfor:
sqlplus $DBUSER/$DBPASSWORD@$DBNAME <<EOF
set lines 132 pages 999
spool $TEMP
select semafor from mlanalytics where nom_client='SERVER' AND server_name='$SERVER_NAME';
spool off
EOF
cat $TEMP

estatanterior=`cat $TEMP | head -5 | tail -1 | sed s/" "//g`

# per defecte permetem entrar a tothom:
NOUESTAT=$ESTATOK

if [ $CARREGA -ge $LIMITCRITIC -o $PROCPOSTGRES -ge $MAXPOSTGRES ] 
then
	NOUESTAT=$ESTATCRITIC
else
  if  [ $CARREGA -ge $LIMITWARNING ]
  then
	NOUESTAT=$ESTATWARNING
  fi
fi

echo "estat anterior: $estatanterior .. nou estat:  $NOUESTAT .. carrega: $CARREGA ($UPTIME)"

if [ $NOUESTAT -ne $estatanterior ]
then
# Actualitzem semàfor per el login:
sqlplus $DBUSER/$DBPASSWORD@$DBNAME <<EOF
UPDATE mlanalytics SET semafor='$NOUESTAT' WHERE nom_client='SERVER' AND server_name='$SERVER_NAME'; 
EOF

 # guardar info en fitxer log:
 #UPTIME2=`echo $UPTIME | awk -F: '{print $NF}'`
 #FECHAHORA=`date +"%Y%m%d %H:%M"`
 #MISSLOG="$FECHAHORA - $UPTIME2 - nivell carrega: $CARREGA - nou estat: $NOUESTAT (anterior $estatanterior) - sessions: $NUMSES - #postgres: $PROCPOSTGRES"
 #MISSLOG="$FECHAHORA - $UPTIME2 - nivell carrega: $CARREGA - nou estat: $NOUESTAT (anterior $estatanterior) - #postgres: $PROCPOSTGRES"
 #echo $MISSLOG >> $FITXLOG

 # enviar mail si hi ha canvi d'estat a Backoffice APS:
 MISS="Canvi d'estat en login Atenea, nou estat: $NOUESTAT (anterior $estatanterior), nivell carrega: $CARREGA - #postgres: $PROCPOSTGRES"
 echo $MISS
 servidor=`uname -n`
 echo $MISS | mail -s "ÀGORA($servidor): nou nivell restriccio login: $NOUESTAT ($UPTIME)" $destinataris

fi

rm $TEMP
rm $RESULT_FILE
