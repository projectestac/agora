#!/bin/bash

DIRECTORY=$(cd `dirname $0` && pwd)

. $DIRECTORY/sync-config.sh

$PHP_PATH $DIRECTORY/sync_to_file.php --debug=on

if [ -f $DIRECTORY/../../syncdata/allSchools.php.tmp ]; then
    mv $DIRECTORY/../../syncdata/allSchools.php.tmp $DIRECTORY/../../syncdata/allSchools.php
fi

exit 0;
