#!/bin/bash

wget --no-check-certificate -O /tmp/cronMoodle2.txt https://agora-aws.xtec.cat/config/createSchoolsListsFiles.php?service=moodle2

while read -r line; do
    wget --no-check-certificate -O /dev/null -o /dev/null "$line"
    sleep 2
done < /tmp/cronMoodle2.txt
