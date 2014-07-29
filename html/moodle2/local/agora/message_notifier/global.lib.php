<?php

function message_notifier_count_unread_messages(){
    global $USER, $DB;

    // Got unread messages so now do another query that joins with the user table.
    $messagesql = "SELECT count(m.id)
                     FROM {message} m
                     JOIN {message_working} mw ON m.id = mw.unreadmessageid
                     JOIN {message_processors} p ON mw.processorid = p.id
                    WHERE m.useridto = :userid
                      AND p.name='popup'";
    return $DB->count_records_sql($messagesql, array('userid' => $USER->id));
}

function message_notifier_get_messages($limit = 10){
    global $USER, $DB;

    // Got unread messages so now do another query that joins with the user table.
    $namefields = get_all_user_name_fields(true, 'u');
    $messagesql = "SELECT m.id, m.smallmessage, m.useridfrom, m.useridto, m.timecreated, m.subject, m.contexturl, m.contexturlname, m.notification
                     FROM {message} m
                     JOIN {message_working} mw ON m.id = mw.unreadmessageid
                     JOIN {message_processors} p ON mw.processorid = p.id
                    WHERE m.useridto = :userid
                      AND p.name='popup'";
    return $DB->get_records_sql($messagesql, array('userid' => $USER->id), 0, $limit);
}

function message_notifier_get_message($id){
    global $USER, $DB;

    // Got unread messages so now do another query that joins with the user table.
    $namefields = get_all_user_name_fields(true, 'u');
    $messagesql = "SELECT m.*
                     FROM {message} m
                     JOIN {message_working} mw ON m.id = mw.unreadmessageid
                     JOIN {message_processors} p ON mw.processorid = p.id
                    WHERE m.useridto = :userid
                      AND p.name='popup'
                      AND m.id = :messageid";
    return $DB->get_record_sql($messagesql, array('userid' => $USER->id, 'messageid'=>$id));
}



function message_notifier_get_badge(){
    global $USER, $OUTPUT, $PAGE, $CFG;
    if(!isloggedin()) return;
    
    $PAGE->set_popup_notification_allowed(false);
    
    $num_messages = message_notifier_count_unread_messages();
    $output = '<div id="message_notifier" class="dropdown pull-right">';
    $output .= '<div id="message_notif_click" class="dropdown-toggle" data-toggle="dropdown">';
    $output .= $OUTPUT->pix_icon('t/message', 'Notifications', 'moodle', array('width'=>'24px','height'=>'24px'));
    $output .= '<span class="num_overlay" id="message_count">'.$num_messages.'</span>';
    $output .= '</div>';
    $output .= '<ul id="message_contents" class="dropdown-menu">';
    $output .= '<li class="viewall"><a href="'.$CFG->wwwroot.'/message/index.php">'.get_string('messagehistoryfull','message').'</a></li>';
    $output .= '</ul>';
    $output .= '</div>';

    $jsmodule = array(
        'name'     => 'local_message_notifier',
        'fullpath' => '/local/agora/message_notifier/module.js',
        'requires' => array('base'),
    );
    $PAGE->requires->js_init_call('M.local_message_notifier.init_notification',array(), true, $jsmodule);
    return $output;
}

function time_elapsed_string($ptime) {
    $etime = time() - $ptime;

    if ($etime < 1) {
        return get_string('now', 'local_agora');
    }

    $a = array( 12 * 30 * 24 * 60 * 60  =>  'year',
                30 * 24 * 60 * 60       =>  'month',
                24 * 60 * 60            =>  'day',
                60 * 60                 =>  'hour',
                60                      =>  'minute',
                1                       =>  'second'
                );

    foreach ($a as $secs => $str) {
        $d = $etime / $secs;
        if ($d >= 1) {
            $r = round($d);
            $str = ($r > 1 ? $str.'s' : $str);
            return get_string($str.'_ago', 'local_agora', $r);
        }
    }
}
