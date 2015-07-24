#!/bin/bash
DIRECTORY=$(cd `dirname $0` && pwd)
cd $DIRECTORY
source "config.sh"

cd $basedir/dades

#DiskUsage
#S'executa un script que genera aquests tres fitxers una vegada al dia des d'un dels frontals a la 1:30.
#L’executa el root directament des de la cabina de discos, sense passar per l’NFS per a que sigui més ràpid.
#Aquest és el fitxer que es fa servir per controlar la quota dels centres.
du -sk zkdata/* > zkdata/diskUsageZk.txt
du -sk docs/wpdata/* > docs/wpdata/diskUsageWp.txt
du -sk docs/moodle2/* > docs/moodle2/diskUsageMdl2.txt



