#!/bin/bash

# script infr.contar_sesiones.sh
# versio 0.2.20100414
# S'ha d'executar a cada backend cada cinc minuts. 
# 0,5,10,15,20,25,30,35,40,45,50,55 * * * * ~/analytics/infr.contar_sesiones.sh xe > /dev/null
# Compta el nombre de processos idle d'Oracle. 
# Crea un registre nou a la taula MLANALYTICS_SESSIONS.

#Agafem el nom del BE
SERVER_NAME=$1

# Importar variables de configuracio
. ~/analytics/infr.config.sh

TMP_RESULT_FILE=$RESULT_FILE
RESULT_FILE=$TMP_RESULT_FILE"2"

#Correspon al nombre de Processos idle d'Oracle 
#PROC_idle=`ps -ef|grep oracle |grep LOCAL= | grep idle | wc -l`
#Correspon al nombre de Processos actius d'Oracle
#PROC=`ps -ef|grep oracle |grep LOCAL= |wc -l`

#Correspon al nombre de Processos bloquejats d'Oracle 
sqlplus $DBMONITORUSER/$DBMONITORPASSWORD@$DBMONITORNAME <<EOF
set lines 132 pages 999
spool $RESULT_FILE
select count(*) from v\$lock l1, v\$lock l2, v\$session s where l1.block =1 and l2.request > 0 and l1.id1=l2.id1 and l1.id2=l2.id2 and s.sid=l1.sid and s.username like 'USU%';
spool off
EOF
PROC_idle=`cat $RESULT_FILE | head -5 | tail -1 | sed s/" "//g`

#Correspon al nombre de Processos actius totals d'Oracle
sqlplus $DBMONITORUSER/$DBMONITORPASSWORD@$DBMONITORNAME <<EOF
set lines 132 pages 999
spool $RESULT_FILE
select count(*) from v\$session s, v\$process p where s.username like 'USU%' and s.paddr = p.addr and s.status='ACTIVE';
spool off
EOF
PROC=`cat $RESULT_FILE | head -5 | tail -1 | sed s/" "//g`



DATA=`date | awk -F: '{print $1":"$2}'` 
#CARGA=`uptime |awk -F: '{print $NF}'`
#Guardem en C1, C5 i C15 els valors de CPU. 
#Separam el nivell de càrrega de la comanda per poder emmagatzemar-los 
#En aquest cas són valors separat per comes. Exemple 0.12, 0.60, 4.50
#C1=`echo $CARGA| cut -d, -f1 | sed s/" "//g`
#C5=`echo $CARGA | cut -d, -f2 | sed s/" "//g`
#C15=`echo $CARGA | cut -d, -f3 | sed s/" "//g`
#Necesitem consultar la carrega en mitjana del BE corresponent (Falta especificar com es posa el BE)
CARGA=`/usr/sfw/bin/snmpget -t 1 -r 5 -m ALL -v 1 -O vq -c public $SNMP_SERVER laLoad.1 laLoad.2 laLoad.3`
C1=`echo $CARGA |  awk ' { print $1 }'`
C5=`echo $CARGA |  awk ' { print $2 }'`
C15=`echo $CARGA |  awk ' { print $3 }'`


#DIA=`date | awk -F" " '{print $6"_"$2}'`
DIA=`date +%Y_%m`

# Inserim a la base de dades de la instància moodle que controla les estadístiques els valor que hem recollit

sqlplus $DBUSER/$DBPASSWORD@$DBNAME<<EOF
INSERT INTO mlanalytics_sessions (postgres, idle, c1, c5, c15, server_name) VALUES ($PROC, $PROC_idle, $C1, $C5, $C15, '$SERVER_NAME');
EOF

rm $RESULT_FILE
