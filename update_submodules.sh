#!/bin/bash

source "update_functions.sh"

execmoodle=false
execwordpress=false
execportal=false

if [[ $1 == 'onlymoodle' ]]; then
    execmoodle=true
elif [[ $1 == 'onlywordpress' ]]; then
    execwordpress=true
elif [[ $1 == 'onlyportal' ]]; then
    execportal=true
else
    execmoodle=true
    execwordpress=true
    execportal=true
fi

if [[ $execmoodle == true ]]; then
    gitcheckout "html/moodle2" "master" "https://github.com/projectestac/agora_moodle2.git"
    gitcheckout "html/moodle2/admin/tool/migratehvp2h5p" "master" "https://github.com/projectestac/moodle-tool_migratehvp2h5p.git"
    gitcheckout "html/moodle2/blocks/completion_progress" "master" "https://github.com/deraadt/moodle-block_completion_progress.git"
    gitcheckout "html/moodle2/blocks/courses_vicensvives" "master" "https://github.com/vicensvives/moodle-block_courses_vicensvives.git"
    gitcheckout "html/moodle2/blocks/licenses_vicensvives" "master" "https://github.com/vicensvives/moodle-block_licenses_vicensvives.git"
    gitcheckout "html/moodle2/blocks/rgrade" "master" "https://github.com/projectestac/Rgrade.git"
    gitcheckout "html/moodle2/course/format/simple" "master" "https://github.com/projectestac/moodle-format_simple.git"
    gitcheckout "html/moodle2/course/format/vv" "master" "https://github.com/vicensvives/moodle-format_vicensvives.git"
    gitcheckout "html/moodle2/filter/wiris" "stable" "https://github.com/wiris/moodle-filter_wiris.git"
    gitcheckout "html/moodle2/langpacks" "master" "https://github.com/projectestac/moodle-langpacks.git"
    gitcheckout "html/moodle2/lib/editor/atto/plugins/cloze" "master" "https://github.com/dthies/moodle-atto_cloze.git"
    gitcheckout "html/moodle2/lib/editor/atto/plugins/fontsize" "master" "https://github.com/andrewnicols/moodle-atto_fontsize.git"
    gitcheckout "html/moodle2/lib/editor/atto/plugins/fontfamily" "master" "https://github.com/projectestac/moodle-atto_fontfamily.git"
    gitcheckout "html/moodle2/lib/editor/atto/plugins/wiris" "stable" "https://github.com/wiris/moodle-atto_wiris.git"
    gitcheckout "html/moodle2/local/agora" "master" "https://github.com/projectestac/moodle-local_agora.git"
    gitcheckout "html/moodle2/local/alexandriaimporter" "master" "https://github.com/projectestac/moodle-local_alexandriaimporter.git"
    gitcheckout "html/moodle2/local/clickedu" "MOODLE_40_STABLE" "https://github.com/clickedu/ClickeduMoodlePlugin.git"
    gitcheckout "html/moodle2/local/oauth" "master" "https://github.com/projectestac/moodle-local_oauth.git"
    gitcheckout "html/moodle2/local/redislock" "master" "https://github.com/projectestac/moodle-local_redislock.git"
    gitcheckout "html/moodle2/local/wsvicensvives" "master" "https://github.com/vicensvives/moodle-local_ws_vicensvives.git"
    gitcheckout "html/moodle2/mod/assign/submission/snap" "main" "https://github.com/jguille2/moodle-assignsubmission_snap.git"
    gitcheckout "html/moodle2/mod/attendance" "MOODLE_401_STABLE" "https://github.com/danmarsden/moodle-mod_attendance.git"
    gitcheckout "html/moodle2/mod/choicegroup" "master" "https://github.com/ndunand/moodle-mod_choicegroup.git"
    gitcheckout "html/moodle2/mod/geogebra" "master" "https://github.com/projectestac/moodle-mod_geogebra.git"
    gitcheckout "html/moodle2/mod/hotpot" "master" "https://github.com/gbateson/moodle-mod_hotpot.git"
    gitcheckout "html/moodle2/mod/hvp" "master" "https://github.com/projectestac/moodle-hvp.git"
    gitcheckout "html/moodle2/mod/jclic" "master" "https://github.com/projectestac/moodle-mod_jclic.git"
    gitcheckout "html/moodle2/mod/journal" "master" "https://github.com/elearningsoftware/moodle-mod_journal.git"
    gitcheckout "html/moodle2/mod/questionnaire" "MOODLE_400_STABLE" "https://github.com/PoetOS/moodle-mod_questionnaire.git"
    gitcheckout "html/moodle2/mod/qv" "master" "https://github.com/projectestac/moodle-mod_qv.git"
    gitcheckout "html/moodle2/question/format/hotpot" "master" "https://github.com/gbateson/moodle-qformat_hotpot.git"
    gitcheckout "html/moodle2/question/type/essaywiris" "main" "https://github.com/wiris/moodle-qtype_essaywiris.git"
    gitcheckout "html/moodle2/question/type/matchwiris" "main" "https://github.com/wiris/moodle-qtype_matchwiris.git"
    gitcheckout "html/moodle2/question/type/multianswerwiris" "main" "https://github.com/wiris/moodle-qtype_multianswerwiris.git"
    gitcheckout "html/moodle2/question/type/multichoicewiris" "main" "https://github.com/wiris/moodle-qtype_multichoicewiris.git"
    gitcheckout "html/moodle2/question/type/shortanswerwiris" "main" "https://github.com/wiris/moodle-qtype_shortanswerwiris.git"
    gitcheckout "html/moodle2/question/type/truefalsewiris" "main" "https://github.com/wiris/moodle-qtype_truefalsewiris.git"
    gitcheckout "html/moodle2/question/type/wq" "master" "https://github.com/projectestac/moodle-qtype_wq.git"
    gitcheckout "html/moodle2/question/type/ordering" "master" "https://github.com/gbateson/moodle-qtype_ordering.git"
    gitcheckout "html/moodle2/report/coursequotas" "master" "https://github.com/projectestac/moodle-report_coursequotas.git"
    gitcheckout "html/moodle2/theme/xtecboost" "master" "https://github.com/projectestac/moodle-theme_xtecboost.git"
fi

if [[ $execwordpress == true ]]; then
    gitcheckout "html/wordpress" "master" "https://github.com/projectestac/agora_nodes.git"
    gitcheckout "html/wordpress/wp-content/mu-plugins/common" "master" "https://github.com/projectestac/wordpress-mu-common.git"
    gitcheckout "html/wordpress/wp-content/plugins/add-to-any" "master" "https://github.com/projectestac/wordpress-add-to-any.git"
    gitcheckout "html/wordpress/wp-content/plugins/advanced-nocaptcha-recaptcha" "master" "https://github.com/projectestac/wordpress-advanced-nocaptcha-recaptcha.git"
    gitcheckout "html/wordpress/wp-content/plugins/astra-addon" "master" "https://github.com/projectestac/wordpress-astra-addon.git"
    gitcheckout "html/wordpress/wp-content/plugins/astra-sites" "master" "https://github.com/projectestac/wordpress-astra-sites.git"
    gitcheckout "html/wordpress/wp-content/plugins/author-category" "master" "https://github.com/projectestac/wordpress-author-category.git"
    gitcheckout "html/wordpress/wp-content/plugins/bbpress" "master" "https://github.com/projectestac/wordpress-bbpress.git"
    gitcheckout "html/wordpress/wp-content/plugins/blogger-importer" "master" "https://github.com/projectestac/wordpress-blogger-importer.git"
    gitcheckout "html/wordpress/wp-content/plugins/buddypress" "master" "https://github.com/projectestac/wordpress-buddypress.git"
    gitcheckout "html/wordpress/wp-content/plugins/buddypress-docs" "master" "https://github.com/projectestac/wordpress-buddypress-docs.git"
    gitcheckout "html/wordpress/wp-content/plugins/buddypress-group-email-subscription" "master" "https://github.com/projectestac/wordpress-buddypress-group-email-subscription.git"
    gitcheckout "html/wordpress/wp-content/plugins/code-snippets" "master" "https://github.com/projectestac/wordpress-code-snippets.git"
    gitcheckout "html/wordpress/wp-content/plugins/email-subscribers" "master" "https://github.com/projectestac/wordpress-email-subscribers.git"
    gitcheckout "html/wordpress/wp-content/plugins/getwid" "master" "https://github.com/projectestac/wordpress-getwid.git"
    gitcheckout "html/wordpress/wp-content/plugins/gif-master" "master" "https://github.com/projectestac/wordpress-gif-master.git"
    gitcheckout "html/wordpress/wp-content/plugins/google-analyticator" "master" "https://github.com/projectestac/wordpress-google-analyticator.git"
    gitcheckout "html/wordpress/wp-content/plugins/google-calendar-events" "master" "https://github.com/projectestac/wordpress-gce.git"
    gitcheckout "html/wordpress/wp-content/plugins/h5p" "master" "https://github.com/projectestac/wordpress-h5p.git"
    gitcheckout "html/wordpress/wp-content/plugins/import-users-from-csv-with-meta" "master" "https://github.com/projectestac/wordpress-import-users-from-csv-with-meta.git"
    gitcheckout "html/wordpress/wp-content/plugins/invite-anyone" "master" "https://github.com/projectestac/wordpress-invite-anyone.git"
    gitcheckout "html/wordpress/wp-content/plugins/nodes-editor-widget" "master" "https://github.com/projectestac/wordpress-dashboard-editor-widget.git"
    gitcheckout "html/wordpress/wp-content/plugins/nodes-incidencies" "master" "https://github.com/projectestac/wordpress-nodes-incidencies.git"
    gitcheckout "html/wordpress/wp-content/plugins/nodes-inventari" "master" "https://github.com/projectestac/wordpress-nodes-inventari.git"
    gitcheckout "html/wordpress/wp-content/plugins/pods" "master" "https://github.com/projectestac/wordpress-pods.git"
    gitcheckout "html/wordpress/wp-content/plugins/polylang" "master" "https://github.com/projectestac/wordpress-polylang.git"
    gitcheckout "html/wordpress/wp-content/plugins/slideshare" "master" "https://github.com/projectestac/wordpress-slideshare.git"
    gitcheckout "html/wordpress/wp-content/plugins/slideshow-jquery-image-gallery" "master" "https://github.com/projectestac/wordpress-slideshow-jig.git"
    gitcheckout "html/wordpress/wp-content/plugins/table-of-contents-plus" "master" "https://github.com/projectestac/wordpress-table-of-contents-plus.git"
    gitcheckout "html/wordpress/wp-content/plugins/tabs-responsive" "master" "https://github.com/projectestac/tabs-responsive.git"
    gitcheckout "html/wordpress/wp-content/plugins/tinymce-advanced" "master" "https://github.com/projectestac/wordpress-tinymce-advanced.git"
    gitcheckout "html/wordpress/wp-content/plugins/widget-visibility-without-jetpack" "master" "https://github.com/projectestac/wordpress-widget-visibility-without-jetpack.git"
    gitcheckout "html/wordpress/wp-content/plugins/wordpress-importer" "master" "https://github.com/projectestac/wordpress-importer.git"
    gitcheckout "html/wordpress/wp-content/plugins/wordpress-social-login" "master" "https://github.com/projectestac/wordpress-social-login.git"
    gitcheckout "html/wordpress/wp-content/plugins/wordpress-telegram" "master" "https://github.com/projectestac/wordpress-telegram.git"
    gitcheckout "html/wordpress/wp-content/plugins/wpforms-lite" "master" "https://github.com/projectestac/wordpress-wpforms-lite.git"
    gitcheckout "html/wordpress/wp-content/themes/astra" "master" "https://github.com/projectestac/wordpress-theme-astra.git"
    gitcheckout "html/wordpress/wp-includes/xtec" "master" "https://github.com/projectestac/wordpress-xtec.git"
fi

if [[ $execportal == true ]]
then
    gitcheckout "html/portal" "master" "https://github.com/projectestac/agora_portal.git"
fi
