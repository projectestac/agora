#!/bin/bash

function gitcheckout {
    dir=$1
    branch=$2
    remote=$3

    if [ ! -d "$dir" ]; then
        update_exec "git submodule update --init $dir"

        if [ ! -d "$dir" ]; then
            echo 'ERROR: el directori $dir no existeix'
            exit -1
        fi
    fi

    echo "Entrant $dir BRANCH $branch REPO $remote ..."
    pushd $dir > /dev/null
    update_exec "git checkout $branch"

    if [ ! -z "$remote" ]; then
        update_exec "git remote set-url origin $remote"
    fi

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
}

function update_exec {
    if ! $1 > /dev/null
    then
        echo >&2 "ERROR: on $1"
        exit -2
    fi
}

############## SCRIPT START
tempaction=$1
if [[ $tempaction == 'reset' ]]
then
    echo 'Demanat RESET'
    action=$tempaction
elif [[ $tempaction == 'stash' ]]
then
    echo 'Demanat STASH'
    action=$tempaction
else
    action=""
fi

echo 'Pull inicial'
git_pull master

if [[ $action != 'reset' ]]
then
    echo 'Inicialitzant submòduls...'
    update_exec "git submodule update --recursive --init"

    echo 'Sincronitzant submòduls...'
    update_exec "git submodule sync"
fi

#El tercer paràmetre només es posa si el repositori és nostre per poder-hi escriure
gitcheckout "html/moodle2" "master" "git@github.com:projectestac/agora_moodle2.git"
gitcheckout "html/moodle2/auth/googleoauth2" "STABLE_26" "git@github.com:projectestac/moodle-auth_googleoauth2.git"
gitcheckout "html/moodle2/blocks/rgrade" "master" "https://github.com/imartel/Rgrade.git"
gitcheckout "html/moodle2/langpacks" "master" "git@github.com:projectestac/moodle-langpacks.git"
gitcheckout "html/moodle2/local/agora" "master" "git@github.com:projectestac/moodle-local_agora.git"
gitcheckout "html/moodle2/local/agora/mailer" "master" "git@github.com:projectestac/mailer.git"
gitcheckout "html/moodle2/local/bigdata" "master" "git@github.com:projectestac/moodle-local_bigdata.git"
gitcheckout "html/moodle2/local/oauth" "master" "git@github.com:projectestac/moodle-local_oauth.git"
gitcheckout "html/moodle2/local/mobile" "MOODLE_26_STABLE" "https://github.com/jleyva/moodle-local_mobile.git"
gitcheckout "html/moodle2/message/output/airnotifier" "MOODLE_26_STABLE" "https://github.com/jleyva/moodle-message_airnotifier.git"
gitcheckout "html/moodle2/mod/eoicampus" "master" "git@github.com:projectestac/moodle-mod_eoicampus.git"
gitcheckout "html/moodle2/mod/geogebra" "master" "git@github.com:projectestac/moodle-mod_geogebra.git"
gitcheckout "html/moodle2/mod/hotpot" "master" "https://github.com/gbateson/moodle-mod_hotpot.git"
gitcheckout "html/moodle2/mod/jclic" "master" "git@github.com:projectestac/moodle-mod_jclic.git"
gitcheckout "html/moodle2/mod/journal" "MOODLE_26_STABLE" "git@github.com:projectestac/moodle-mod_journal.git"
gitcheckout "html/moodle2/mod/questionnaire" "MOODLE_26_STABLE" "git@github.com:projectestac/moodle-mod_questionnaire.git"
gitcheckout "html/moodle2/mod/qv" "master" "git@github.com:projectestac/moodle-mod_qv.git"
gitcheckout "html/moodle2/question/format/hotpot" "master" "https://github.com/gbateson/moodle-qformat_hotpot.git"
gitcheckout "html/moodle2/question/type/ddimageortext" "master" "https://github.com/moodleou/moodle-qtype_ddimageortext.git"
gitcheckout "html/moodle2/question/type/ddmarker" "master" "https://github.com/moodleou/moodle-qtype_ddmarker.git"
gitcheckout "html/moodle2/question/type/ddwtos" "master" "https://github.com/moodleou/moodle-qtype_ddwtos.git"
gitcheckout "html/moodle2/question/type/gapselect" "master" "https://github.com/moodleou/moodle-qtype_gapselect.git"
gitcheckout "html/moodle2/report/coursequotas" "master" "git@github.com:projectestac/moodle-report_coursequotas.git"
gitcheckout "html/moodle2/theme/xtec2" "master" "git@github.com:projectestac/moodle-theme_xtec2.git"
gitcheckout "html/moodle2/filter/wiris" "master" "git@github.com:projectestac/moodle-filter_wiris.git"
gitcheckout "html/moodle2/lib/editor/tinymce/plugins/tiny_mce_wiris" "master" "git@github.com:projectestac/moodle-tinymce_wiris.git"
gitcheckout "html/moodle2/question/type/wq" "master" "git@github.com:projectestac/moodle-qtype_wq.git"
gitcheckout "html/moodle2/question/type/truefalsewiris" "master" "git@github.com:projectestac/moodle-qtype_truefalsewiris.git"
gitcheckout "html/moodle2/question/type/shortanswerwiris" "master" "git@github.com:projectestac/moodle-qtype_shortanswerwiris.git"
gitcheckout "html/moodle2/question/type/multichoicewiris" "master" "git@github.com:projectestac/moodle-qtype_multichoicewiris.git"
gitcheckout "html/moodle2/question/type/multianswerwiris" "master" "git@github.com:projectestac/moodle-qtype_multianswerwiris.git"
gitcheckout "html/moodle2/question/type/matchwiris" "master" "git@github.com:projectestac/moodle-qtype_matchwiris.git"
gitcheckout "html/moodle2/question/type/essaywiris" "master" "git@github.com:projectestac/moodle-qtype_essaywiris.git"

gitcheckout "html/wordpress" "master" "git@github.com:projectestac/agora_nodes.git"

gitcheckout "html/zikula2/modules/IWagendas" "master" "git@github.com:intraweb-modules13/IWagendas.git"
gitcheckout "html/zikula2/modules/IWdocmanager" "master" "git@github.com:intraweb-modules13/IWdocmanager.git"
gitcheckout "html/zikula2/modules/IWgroups" "master" "git@github.com:intraweb-modules13/IWgroups.git"

gitcheckout "html/portal/modules/XtecMailer/includes" "master" "git@github.com:projectestac/mailer.git"

echo "Garbage collecting..."
git gc

echo "That's all folks!"
