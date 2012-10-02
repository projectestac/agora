#!/bin/bash

DIRECTORY=$(cd `dirname $0` && pwd)

. $DIRECTORY/sync-config.sh

$PHP_PATH -f $DIRECTORY/sync_to_file.php debug=on

cp -r $DIRECTORY/../../syncdata/sync/* $DIRECTORY/../../syncdata/
#$RSYNC_PATH -r sync/* centres

exit 0;
