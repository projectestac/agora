#!/bin/sh

# script infr.contar_sesiones.sh
# versio 0.2.20091027
 
PROC_idle=`ps -ef|grep postgres|grep idle|wc -l`
PROC=`ps -ef|grep postgres|wc -l`
DATA=`date | awk -F: '{print $1":"$2}'` 
CARGA=`uptime |awk -F: '{print $NF}'`
C1=`echo $CARGA| cut -d, -f1 | sed s/" "//g`
C5=`echo $CARGA | cut -d, -f2 | sed s/" "//g`
C15=`echo $CARGA | cut -d, -f3 | sed s/" "//g`

#DIA=`date | awk -F" " '{print $6"_"$2}'`
DIA=`date +%Y_%m`
FINALPATH=/Dades/moodledata/activitat_sessions

# agafem estat anterior:
TEMP=/tmp/estat.anterior.bd.out.$$
#/usr/local/pgsql/bin/psql -d moodle_utf8 -U moodle 1> $TEMP << EOF
#/usr/bin/psql -d moodle_infr -U moodle 1> $TEMP << EOF
/usr/bin/psql -d moodle_service -U postgres 1> $TEMP << EOF
INSERT INTO mdl_analytics_sessions (postgres, idle, c1, c5, c15) VALUES ($PROC, $PROC_idle, $C1, $C5, $C15);
EOF
cat $TEMP


#for INSTANCIAMOODLE in `ls /Dades/ | fgrep moodle_data_ | fgrep -i -v .tar | fgrep -i -v .gz | fgrep -v -i .zip`
for INSTANCIAMOODLE in $(ls /Dades/ | fgrep moodledata | fgrep -i -v .tar | fgrep -i -v .gz | fgrep -v -i .zip|fgrep  moodledata_ | cut -d_ -f2-)
do

   PATHSESSIONS=/Dades/moodledata_$INSTANCIAMOODLE/sessions/

#   NUM=`ls -l $PATHSESSIONS|wc -l`
   NUM2=`find $PATHSESSIONS -type f -size +1024c  -ls | wc -l`
   SESSIONSMOODLE=$NUM2

   # per cada moodle_data_instancia, calcular les sessions obertes:

#INSERT INTO mdl_analytics_moodle_sessions (smoodle) VALUES (3);
echo $INSTANCIAMOODLE++++++++++

   TAULA="mdl_analytics_"$INSTANCIAMOODLE"_sessions"
/usr/bin/psql -d moodle_service -U postgres 1> $TEMP << EOF
INSERT INTO $TAULA (smoodle) VALUES ($SESSIONSMOODLE);
EOF

/usr/bin/psql -d moodle_service -U postgres 1> $TEMP << EOF
SELECT usuaris_concurrents FROM mdl_analytics WHERE nom = '$INSTANCIAMOODLE';
EOF

   USUARIS=`cat $TEMP | head -3 | tail -1 | sed s/" "//g`

/usr/bin/psql -d moodle_service -U postgres 1> $TEMP << EOF
SELECT permissibilitat FROM mdl_analytics WHERE nom = '$INSTANCIAMOODLE';
EOF
   PERMCENT=`cat $TEMP | head -3 | tail -1 | sed s/" "//g`
   PERM=`echo "$USUARIS * $PERMCENT / 100" | bc`
   USERPERM=`expr $USUARIS + $PERM`
 
   if [ $SESSIONSMOODLE -le $USUARIS ]
   then
	 valsemafor=0 
   else
       if [ $SESSIONSMOODLE -gt $USUARIS -a $SESSIONSMOODLE -le $USERPERM ]
       then
	  valsemafor=1
       else
       	    if [ $SESSIONSMOODLE -gt $USERPERM ]
	    then
		valsemafor=2
	    fi
       fi
   fi 

/usr/bin/psql -d moodle_service -U postgres 1> $TEMP << EOF
UPDATE mdl_analytics SET semafor = '$valsemafor' WHERE nom = '$INSTANCIAMOODLE';
EOF

done

#####################################################################################

#echo $DATA  "#Sess moodle: "  $NUM " (" $NUM2 ")  #Pgsql: " $PROC " #Pgsql idle: " $PROC_idle "#Carga: " $CARGA >> /Dades/data/sessions/dades_sessions_$HOSTNAME"_"$DIA

#echo $DATA  "#Sess moodle: "  $NUM " (" $NUM2 ")  #Pgsql: " $PROC " #Pgsql idle: " $PROC_idle "#Carga: " $CARGA >> $FINALPATH/dades_sessions_$HOSTNAME"_"$DIA.txt

## Regenerar index.html
#cd $FINALPATH
#ls -t dades_sessions_*.txt | awk 'BEGIN { print "<html><body>" } { print "<a href=\"" $1 "\">" $1 "</a><br>" } END {print "</body></html>"}' > $FINALPATH/activitat.html

