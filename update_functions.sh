#!/bin/bash

function gitcheckout {
    dir=$1
    branch=$2
    remote=$3

    if [ ! "$(ls -A $dir)" ]; then
        # Empty directory
        update_exec "git submodule sync --recursive"
        update_exec "git submodule update --init --recursive"

        if [ ! "$(ls -A $dir)" ]; then
            echo 'ERROR: el directori $dir no existeix o és buit'
            exit -1
        fi
    fi

    echo "Entrant $dir BRANCH $branch REPO $remote ..."
    pushd $dir > /dev/null
    if [ ! -z "$remote" ]; then
        update_exec "git remote set-url origin $remote"
        update_exec "git fetch"
    fi

    update_exec "git checkout $branch"

    git_pull $branch

    popd > /dev/null
    echo 'OK'
}

function git_pull {
    branch=$1
    if [[ $action == 'stash' ]]
    then
        update_exec "git stash"
    fi

    if [[ $action == 'reset' ]]
    then
        update_exec "git reset --hard origin/$branch"
    fi

    update_exec "git pull"

    if [[ $action == 'stash' ]]
    then
        if [[ -n $(git stash list) ]]; then
            echo ' >>>> Aplicat Stash'
            update_exec "git stash pop"
        fi
    fi

    if [[ $action == 'gc' ]]
    then
        update_exec "git gc"
    fi
}

function update_exec {
    if ! $1 > /dev/null
    then
        echo >&2 "ERROR: on $1"
        exit -2
    fi
}

function get_action {
    tempaction=$1

    if [[ $tempaction == 'reset' ]]
    then
        echo 'Demanat RESET'
        action=$tempaction
    elif [[ $tempaction == 'stash' ]]
    then
        echo 'Demanat STASH'
        action=$tempaction
    elif [[ $tempaction == 'gc' ]]
    then
        echo 'Demanat GC'
        action=$tempaction
    else
        action=""
    fi
}

function pull_submodules {
    if [[ $action != 'reset' ]]
    then
        echo 'Inicialitzant submòduls...'
        update_exec "git submodule update --recursive --init"

        echo 'Sincronitzant submòduls...'
        update_exec "git submodule sync"
    fi

    ./update_submodules.sh
}

function end_exec {
    echo "Garbage collecting..."
    git gc

    echo "That's all folks!"
}