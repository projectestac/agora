#!/bin/bash

DIRECTORY=$(cd `dirname $0` && pwd)
cd $DIRECTORY

source "config.sh"
source "pass.sh"

# Determinar si l'hora és parell o senar
hora=$(date +"%k")
resta=$(($hora % 2))

# Esquema Oracle
if [ "$resta" -eq 0 ]; then
  echo "Esborrant objectes de USU1... "
  printf "%s\n%s\n%s\n%s\n%s\n%s\n" "spool /tmp/sortida.txt" "set scan off" "ALTER SESSION SET recyclebin = OFF;" "@sql/dropObjectesPropiUsuari.sql" "ALTER SESSION SET recyclebin = ON;" "spool off" | sqlplus "USU1/$pass_usu1_form"
  echo "Important els objectes des de INT... "
  impdp USU1/$pass_usu1_form NETWORK_LINK=LNK_PHPINT SCHEMAS=MOODLE_FORM REMAP_SCHEMA=MOODLE_FORM:USU1 DIRECTORY=IMPDP_DIR TRANSFORM=SEGMENT_ATTRIBUTES:n LOGFILE=USU1_FORM.log
  usudir=$moodledata/usu1/
else
  echo "Esborrant objectes de USU10000... "
  printf "%s\n%s\n%s\n%s\n%s\n%s\n" "spool /tmp/sortida.txt" "set scan off" "ALTER SESSION SET recyclebin = OFF;" "@sql/dropObjectesPropiUsuari.sql" "ALTER SESSION SET recyclebin = ON;" "spool off" | sqlplus "USU10000/$pass_usu1_form"
  echo "Important els objectes des de INT... "
  impdp USU10000/$pass_usu1_form NETWORK_LINK=LNK_PHPINT SCHEMAS=MOODLE_FORM REMAP_SCHEMA=MOODLE_FORM:USU10000 DIRECTORY=IMPDP_DIR TRANSFORM=SEGMENT_ATTRIBUTES:n LOGFILE=USU10000_FORM.log
  usudir=$moodledata/usu10000/
fi

# Fitxers Moodle
echo "Esborrant moodledata... "
rm -rf $basedir$usudir

echo "Creant moodledata... "
mkdir $basedir$usudir

echo "Descomprimint moodle_form.zip"
unzip $basedir$portaldata/data/demo/moodle_form.zip -d $basedir$usudir

echo "Aplicant permisos... "
chmod -R 777 $basedir$usudir

echo "Fi"
echo

