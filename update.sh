#!/bin/bash
#
source "update_functions.sh"

# Check if the second parameter is defined, if not set it to "master"
branch=${2:-master}

get_action "$1"

echo 'Pull inicial'
git_pull "$branch"
pull_submodules
end_exec
