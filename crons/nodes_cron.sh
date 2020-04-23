#!/bin/bash

wget --no-check-certificate -O /tmp/cronNodes.txt https://agora-aws.xtec.cat/config/createSchoolsListsFiles.php?service=nodes

while read -r line; do
    wget --no-check-certificate -O /dev/null -o /dev/null "$line"
    sleep 2
done < /tmp/cronNodes.txt
