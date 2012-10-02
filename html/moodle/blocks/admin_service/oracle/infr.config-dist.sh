#!/bin/bash

# script infr.config.sh
# versio 0.2.20100218

# Directori on està instal·lat l'oracle
export ORACLE_HOME=/oracle/client

# Directori que conté el fitxer tnsnames.ora
export TNS_ADMIN=~/oracle

# Per afegir sqlplus al path
export PATH=$PATH:$ORACLE_HOME/bin
 
# Directori arrel que conté els usuXXX amb els moodledata de tots els espais Moodle
MOODLEDATA_PATH=/dades/dev/agora/src/moodledata

# Esquema de la base de dades on està instal·lat l'Analytics
DBUSER=usu1
# Contrasenya de l'esquema de base de dades on està instal·lat l'Analytics
DBPASSWORD=agora
# Base de dades on es troba l'esquema de base de dades on està instal·lat l'Analytics
DBNAME=XE

# Agent SNMP de cada base de dades
if [ "$SERVER_NAME" = "XE" ]; then
  SNMP_SERVER="XE:161"
fi

# Esquema de la base de dades on es monitoritza l'Àgora
DBMONITORUSER=monitor
# Contrasenya de l'esquema de base de dades on es monitoritza l'Àgora
DBMONITORPASSWORD=agora
# Base de dades on es troba l'esquema de base de dades on es monitoritza l'Àgora
DBMONITORNAME=XE

# Directori on es crearan i esborraran fitxers temporals (per guardar el valor d'algunes consultes SQL)
TMP_DIR=/tmp

# Usuaris monitoritzats
MONITORED_USERS=(usu2)


### ELS PARAMETRES SEGUENTS NO CAL REVISAR-LOS
# Fitxers temporals
RESULT_FILE=$TMP_DIR/result.txt
FITXLOG=$TMP_DIR/canvi.estat.login.txt
TEMP=$RESULT_FILE

#Destinataris del correu (Separats per comes)
destinataris="email@domain.net"
