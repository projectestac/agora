#!/bin/bash
#
source "update_functions.sh"

get_action $1

echo 'Pull inicial'
git_pull master

pull_submodules

echo "Garbage collecting..."
git gc

echo "That's all folks!"
