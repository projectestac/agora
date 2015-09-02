#!/bin/bash

DIRECTORY=$(cd `dirname $0` && pwd)
cd $DIRECTORY

function exec_cli {
    $PHP_PATH $1
}

function get_curl {
    get_curl_complete $urlbase$1
}

function get_curl_complete {
    curl --silent $1 > /dev/null
}

function get_wget {
    get_wget_complete $urlbase$1
}

function get_wget_complete {
    wget -q -o /dev/null $1 > /dev/null
}