#!/bin/bash

git submodule update --recursive --init
git submodule sync

pushd html/moodle2
git checkout master
git remote set-url origin git@github.com:projectestac/agora_moodle2.git
popd
pushd html/moodle2/auth/googleoauth2
git checkout STABLE_26
git remote set-url origin git@github.com:projectestac/moodle-auth_googleoauth2.git
popd
pushd html/moodle2/blocks/advices
git checkout master
git remote set-url origin git@github.com:projectestac/moodle-block_advices.git
popd
pushd html/moodle2/blocks/rgrade
git checkout master
git remote set-url origin  git@github.com:imartel/Rgrade.git
popd
pushd html/moodle2/langpacks
git checkout master
git remote set-url origin git@github.com:projectestac/moodle-langpacks.git
popd
pushd html/moodle2/local/agora
git checkout master
git remote set-url origin git@github.com:projectestac/moodle-local_agora.git
popd
pushd html/moodle2/local/agora/mailer
git checkout master
git remote set-url origin git@github.com:projectestac/mailer.git
popd
pushd html/moodle2/local/bigdata
git checkout master
git remote set-url origin git@github.com:projectestac/moodle-local_bigdata.git
popd
pushd html/moodle2/local/oauth
git checkout master
git remote set-url origin git@github.com:projectestac/moodle-local_oauth.git
popd
pushd html/moodle2/mod/eoicampus
git checkout master
git remote set-url origin git@github.com:projectestac/moodle-mod_eoicampus.git
popd
pushd html/moodle2/mod/geogebra
git checkout master
git remote set-url origin git@github.com:projectestac/moodle-mod_geogebra.git
popd
pushd html/moodle2/mod/hotpot
git checkout master
git remote set-url origin git@github.com:gbateson/moodle-mod_hotpot.git
popd
pushd html/moodle2/mod/jclic
git checkout master
git remote set-url origin git@github.com:projectestac/moodle-mod_jclic.git
popd
pushd html/moodle2/mod/journal
git checkout MOODLE_26_STABLE
git remote set-url origin git@github.com:dmonllao/moodle-mod_journal.git
popd
pushd html/moodle2/mod/questionnaire
git checkout MOODLE_26_STABLE
git remote set-url origin git@github.com:projectestac/moodle-mod_questionnaire.git
popd
pushd html/moodle2/mod/qv
git checkout master
git remote set-url origin git@github.com:projectestac/moodle-mod_qv.git
popd
pushd html/moodle2/question/format/hotpot
git checkout master
git remote set-url origin git@github.com:gbateson/moodle-qformat_hotpot.git
popd
pushd html/moodle2/question/type/ddimageortext
git checkout master
git remote set-url origin git@github.com:moodleou/moodle-qtype_ddimageortext.git
popd
pushd html/moodle2/question/type/ddmarker
git checkout master
git remote set-url origin git@github.com:moodleou/moodle-qtype_ddmarker.git
popd
pushd html/moodle2/question/type/ddwtos
git checkout master
git remote set-url origin git@github.com:moodleou/moodle-qtype_ddwtos.git
popd
pushd html/moodle2/question/type/gapselect
git checkout master
git remote set-url origin git@github.com:moodleou/moodle-qtype_gapselect.git
popd
pushd html/moodle2/report/coursequotas
git checkout master
git remote set-url origin git@github.com:projectestac/moodle-report_coursequotas.git
popd
pushd html/moodle2/theme/xtec2
git checkout master
git remote set-url origin git@github.com:projectestac/moodle-theme_xtec2.git
popd
pushd html/wordpress
git checkout master
git remote set-url origin git@github.com:projectestac/agora_nodes.git
popd
pushd html/zikula2/modules/IWagendas
git checkout master
git remote set-url origin git@github.com:intraweb-modules13/IWagendas.git 
popd
pushd html/zikula2/modules/IWdocmanager
git checkout master
git remote set-url origin git@github.com:intraweb-modules13/IWdocmanager.git
popd
pushd html/zikula2/modules/IWgroups
git checkout master
git remote set-url origin git@github.com:intraweb-modules13/IWgroups.git
popd

git submodule foreach --recursive git pull
