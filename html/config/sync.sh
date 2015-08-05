#!/bin/bash

DIRECTORY=$(cd `dirname $0` && pwd)

. $DIRECTORY/sync-config.sh

$PHP_PATH -f $DIRECTORY/sync_to_file.php --debug=on

mv $DIRECTORY/../../syncdata/allSchools.php.tmp $DIRECTORY/../../syncdata/allSchools.php

exit 0;
