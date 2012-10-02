#!/bin/bash

# script infr.moodledata_sessions.sh
# versio 0.2.20100414
# S'ha d'executar cada cinc minuts sense paràmetres (és a dir, un únic cop) des d'un dels frontends.
# Compta el nombre de sessions obertes pels usuaris definits a $MONITORED_USERS (~nombre de fitxers que hi ha a $MOODLEDATA_PATH/usuXXX/sessions. 
# Crea un registre nou a les taules MLANALYTICS_X_SESSIONS (tantes com espais Moodle s'estiguin monitoritzant)

# Importar variables de configuracio
. ~/analytics/infr.config.sh
. ~/analytics/infr.config_users.sh

TMP_RESULT_FILE=$RESULT_FILE
RESULT_FILE=$TMP_RESULT_FILE"3"

#For, per recorre tots els directoris Moodle_data que estan en un directori comú. D'aquesta manera en cada iteració del bucle, 
#s'agafa un moodle_data diferent per poder actualitzar les estadístiques. Per fer aquest sistema més senzill, ja que sabem quines són
#les instàncies moodle que s'han de monitoritzar, podem fer un buble sobre una llista de noms que correspone als usu es qüestió.
#D'aquesta manera poden fer coincidi el PATHSESSIONS de forma fàcil.
 
#for INSTANCIAMOODLE in $(ls $MOODLEDATA_PATH | fgrep usu | fgrep -i -v .tar | fgrep -i -v .gz | fgrep -v -i .zip)
for INSTANCIAMOODLE in "${MONITORED_USERS[@]}"
do

   #Com és un sistema Oracle on el nom de la base de dades es sempre el mateix "XE".
   #La única diferenciació que hi ha és l'usuari de connexió "USUXXX", per tant utilitzem el el nom de la instancia amb usuXX com
   #és el dbuser per seleccionar-la

   #On usu1 será $INSTANCIAMOODLE
   #exemple: PATHSESSIONS=/home/agora/public_html/agora/moodledata/usu1/sessions/
   #PATHSESSIONS=$MOODLEDATA_PATH/$INSTANCIAMOODLE/sessions/

   #NUM=`ls -l $PATHSESSIONS|wc -l`
   #NUM2=`find $PATHSESSIONS -type f -size +1024c  -ls | wc -l`
   #SESSIONSMOODLE=$NUM2

#treiem el PASSWORD del corresponent al USU
#connexió ORACLE s'ha d'especificar al sqlplus: "instancia/password@basesdedades"
sqlplus $DBUSER/$DBPASSWORD@$DBNAME<<EOF
set lines 132 pages 999
spool $RESULT_FILE
select dbpass from mlanalytics where dbuser = '$INSTANCIAMOODLE';
spool off
EOF
  
#El password del Usu corresponent
TMPDBPASS=`cat $RESULT_FILE | head -5 | tail -1 | sed s/" "//g`

#treiem el DBNAME del corresponent al USU
#connexió ORACLE s'ha d'especificar al sqlplus: "instancia/password@basesdedades"
sqlplus $DBUSER/$DBPASSWORD@$DBNAME<<EOF
set lines 132 pages 999
spool $RESULT_FILE
select dbname from mlanalytics where dbuser = '$INSTANCIAMOODLE';
spool off
EOF
  
#El password del Usu corresponent
TMPDBNAME=`cat $RESULT_FILE | head -5 | tail -1 | sed s/" "//g`

   
#Sel·leccionem les sessions de bases de dades actives que no hagin expirat.
#sqlplus $DBUSER/$DBPASSWORD@$DBNAME <<EOF
sqlplus $INSTANCIAMOODLE/$TMPDBPASS@$TMPDBNAME <<EOF
set lines 132 pages 999
spool $RESULT_FILE
select count(*) from mlsessions2 where expiry > CURRENT_TIMESTAMP; 
spool off
EOF
SESSIONSMOODLE=`cat $RESULT_FILE | head -5 | tail -1 | sed s/" "//g`
   
# Sessions Oracle de la instància
#SORACLE=`ps -ef|grep oracle |grep $NOMPROC |wc -l`
sqlplus $DBMONITORUSER/$DBMONITORPASSWORD@$DBMONITORNAME <<EOF
set lines 132 pages 999
spool $RESULT_FILE
select count(*) from v\$session where username=UPPER('$INSTANCIAMOODLE')
spool off
EOF
SORACLE=`cat $RESULT_FILE | head -5 | tail -1 | sed s/" "//g`


#Calculem l'identificador corresponent al USU
#connexió ORACLE s'ha d'especificar al sqlplus: "instancia/password@basesdedades"
sqlplus $DBUSER/$DBPASSWORD@$DBNAME<<EOF
set lines 132 pages 999
spool $RESULT_FILE
select id from mlanalytics where dbuser = '$INSTANCIAMOODLE';
spool off
EOF
  
#Identificador del Usu corresponent
USUID=`cat $RESULT_FILE | head -5 | tail -1 | sed s/" "//g`
   
#TAULA="mlanalytics_usu1_sessions"
TAULA="mlanalytics_"$USUID"_sessions"
	
#Inserim en la base de dades de la instància moodle que controla les estadístiques els valor que hem recollit
sqlplus $DBUSER/$DBPASSWORD@$DBNAME<<EOF
INSERT INTO $TAULA (smoodle, spostgres) VALUES ($SESSIONSMOODLE,$SORACLE);
EOF

#Agafem el paràmetre corresponent per SQL
sqlplus $DBUSER/$DBPASSWORD@$DBNAME<<EOF
set lines 132 pages 999
spool $RESULT_FILE
SELECT usuaris_concurrents FROM mlanalytics WHERE dbuser = '$INSTANCIAMOODLE';
EOF

USUARIS=`cat $RESULT_FILE | head -5 | tail -1 | sed s/" "//g`

#Agafem el paràmetre corresponent per SQL
#Instancia SELECT permissibilitat FROM mlanalytics WHERE dbuser = '$INSTANCIAMOODLE';

sqlplus $DBUSER/$DBPASSWORD@$DBNAME<<EOF
set lines 132 pages 999
spool $RESULT_FILE
SELECT permissibilitat FROM mlanalytics WHERE dbuser = '$INSTANCIAMOODLE';
EOF

PERMCENT=`cat $RESULT_FILE | head -5 | tail -1 | sed s/" "//g`
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

#Actualitzem el semàfor de la instància
sqlplus $DBUSER/$DBPASSWORD@$DBNAME<<EOF
UPDATE mlanalytics SET semafor = '$valsemafor' WHERE dbuser = '$INSTANCIAMOODLE';
EOF
done

rm $RESULT_FILE
