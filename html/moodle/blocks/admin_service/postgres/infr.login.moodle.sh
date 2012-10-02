#!/bin/sh

# script infr.login.moodle.sh
# versio 0.1.20091023: si es supera el LIMIT de sessions es modifica el login en Moodle:


#MAXPOSTGRES=1450
#MAXPOSTGRES=1400
#-MAXPOSTGRES=1300
#MAXPOSTGRES=1
# agafem estat anterior:
TEMP=/tmp/estat.anterior.bd.out.$$
#/usr/local/pgsql/bin/psql -d moodle_utf8 -U moodle 1> $TEMP << EOF
#/usr/bin/psql -d moodle_service -U moodle 1> $TEMP << EOF
/usr/bin/psql -d moodle_service -U postgres 1> $TEMP << EOF
select value from mdl_config where name = 'maxpostgres';
EOF
cat $TEMP
MAXPOSTGRES=`cat $TEMP | head -3 | tail -1 | sed s/" "//g`

#LIMITCRITIC=65
#LIMITCRITIC=60
#-LIMITCRITIC=50
TEMP=/tmp/estat.anterior.bd.out.$$
#/usr/local/pgsql/bin/psql -d moodle_utf8 -U moodle 1> $TEMP << EOF
#/usr/bin/psql -d moodle_service -U moodle 1> $TEMP << EOF
/usr/bin/psql -d moodle_service -U postgres 1> $TEMP << EOF
select value from mdl_config where name = 'limitcritic';
EOF
cat $TEMP
LIMITCRITIC=`cat $TEMP | head -3 | tail -1 | sed s/" "//g`

#LIMITCRITIC=47
#LIMITCRITIC=35
#LIMITCRITIC=25
#LIMITCRITIC=22
#LIMITCRITIC=18
#LIMITCRITIC=15

#LIMITWARNING=31
#LIMITWARNING=25
#-LIMITWARNING=20
TEMP=/tmp/estat.anterior.bd.out.$$
#/usr/local/pgsql/bin/psql -d moodle_utf8 -U moodle 1> $TEMP << EOF
#/usr/bin/psql -d moodle_service -U moodle 1> $TEMP << EOF
/usr/bin/psql -d moodle_service -U postgres 1> $TEMP << EOF
select value from mdl_config where name = 'limitwarning';
EOF
cat $TEMP
LIMITWARNING=`cat $TEMP | head -3 | tail -1 | sed s/" "//g`
#LIMITWARNING=15
#LIMITWARNING=10

ESTATCRITIC=2
ESTATWARNING=1
ESTATOK=0

#destinataris="oriol.sanchez@upcnet.es,enric.ribot@upcnet.es,upcnet.backoffice.aps@upcnet.es"
#destinataris="david.castro-garcia@upcnet.es,upcnet.backoffice.aps@upcnet.es"
destinataris="david.castro-garcia@upcnet.es"

FECHA=`date +%Y%m%d`
FITXLOG=/Dades/moodledata/activitat_sessions/canvi.estat.login.txt

#echo $ESTATCRITIC, $ESTATWARNING, $ESTATOK...

# valors uptime i num. sessions moodle:
#CARREGA=`uptime | awk -F: '{print $NF}' | awk -F\. '{print $1}'`
UPTIME=`uptime`

# mirem carrega 5m (-f2):
CARREGA=`echo $UPTIME | awk -F: '{print $NF}' | cut -d, -f2 | awk -F\. '{print $1}' | sed s/" "//g`

#NUMSES=`find /Dades/moodledata/sessions/ -type f -size +1024c  -ls | wc -l`
PROCPOSTGRES=`ps -ef|grep postgres|wc -l`

# agafem estat anterior:
TEMP=/tmp/estat.anterior.bd.out.$$
#/usr/local/pgsql/bin/psql -d moodle_utf8 -U moodle 1> $TEMP << EOF
#/usr/bin/psql -d moodle_service -U moodle 1> $TEMP << EOF
/usr/bin/psql -d moodle_service -U postgres 1> $TEMP << EOF
select semafor from mdl_analytics where nom_client = 'SERVER' AND nom = 'ADMIN_SERVER';
EOF
cat $TEMP

estatanterior=`cat $TEMP | head -3 | tail -1 | sed s/" "//g`

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
# Actualitzem permisos de login:
#/usr/local/pgsql/bin/psql -d moodle_utf8 -U moodle << EOF
#/usr/bin/psql -d moodle_service -U moodle << EOF
/usr/bin/psql -d moodle_service -U postgres << EOF
UPDATE mdl_analytics SET semafor = '$NOUESTAT' WHERE nom_client = 'SERVER' AND nom = 'ADMIN_SERVER'; 
EOF

 # guardar info en fitxer log:
 UPTIME2=`echo $UPTIME | awk -F: '{print $NF}'`
 FECHAHORA=`date +"%Y%m%d %H:%M"`
 #MISSLOG="$FECHAHORA - $UPTIME2 - nivell carrega: $CARREGA - nou estat: $NOUESTAT (anterior $estatanterior) - sessions: $NUMSES - #postgres: $PROCPOSTGRES"
 MISSLOG="$FECHAHORA - $UPTIME2 - nivell carrega: $CARREGA - nou estat: $NOUESTAT (anterior $estatanterior) - #postgres: $PROCPOSTGRES"
 echo $MISSLOG >> $FITXLOG

 # enviar mail si hi ha canvi d'estat a Backoffice APS:
 MISS="Canvi d'estat en login Atenea, nou estat: $NOUESTAT (anterior $estatanterior), nivell carrega: $CARREGA - #postgres: $PROCPOSTGRES"
 echo $MISS
 servidor=`uname -n`
 echo $MISS | mail -s "ATENEA($servidor): nou nivell restriccio login: $NOUESTAT ($UPTIME)" $destinataris

fi

rm $TEMP
