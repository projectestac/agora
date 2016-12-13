#!/bin/bash
# Script per a la generacio del fitxer d'ocupacio d'agora - moodledata

path="/NAS/agora/docs/moodle2"
repoDirPrefix="repo"

if [ -d $path ]; then
    echo "Directori muntat!"
else
    echo "Directori no muntat! Abortem execucio"
    exit 1
fi

echo "Creant diskUsageMdl2.txt ..."

cd $path

repo=()

# Crea els fitxers parcials i es guarda els noms
for i in $(ls -d */)
do
    if [[ $i == ${repoDirPrefix}* ]]
    then
        repo+=(${i%%/}/diskUsageMdl2_part.txt)
        # Si el du -sk es fa per volums, tres línies següents s'haurien de comentar
        cd ${i%%/}
        du -sk usu* > diskUsageMdl2_part.txt
        cd ..
    fi
done

# Crea el fitxer parcial corresponent als espais que estan fora de directoris "repo"
du -sk usu* > diskUsageMdl2_part.txt

dirs=''

for item in ${repo[*]}
do
   dirs=$dirs" "$item;
done

# Crea el diskUsageMdl2.txt: Concatena els fitxers parcials i esborra duplicats (queden els usus de dins dels repo)
cat $dirs diskUsageMdl2_part.txt | awk '!a[$2]++' > diskUsageMdl2.txt

echo "diskUsageMdl2.txt creat!"

