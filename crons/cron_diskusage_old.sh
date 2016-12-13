#!/bin/bash
DIRECTORY=$(cd `dirname $0` && pwd)
cd $DIRECTORY
source "config.sh"

cd $basedir/dades

#DiskUsage
#S'executa un script que genera aquests tres fitxers una vegada al dia des d'un dels frontals a la 1:30.
#L’executa el root directament des de la cabina de discos, sense passar per l’NFS per a que sigui més ràpid.
#Aquest és el fitxer que es fa servir per controlar la quota dels centres.
cd dades2/zkdata
du -sk * > diskUsageZk.tmp
mv diskUsageZk.tmp diskUsageZk.txt

cd ../wpdata
du -sk * > diskUsageWp.tmp
mv diskUsageWp.tmp diskUsageWp.txt

cd ../../dades1/moodle2
du -sk * > diskUsageMdl2.tmp
mv diskUsageMdl2.tmp diskUsageMdl2.txt

