<?php
    require_once('../../../config.php');
    require_once($CFG->libdir.'/adminlib.php');
    require_once($CFG->dirroot.'/local/rcommon/WebServices/AuthenticateContent.php');

    $cred = optional_param('id_cr', '', PARAM_INT);

    $credential = $DB->get_record_sql("SELECT b.id AS bookid, cred.euserid as userid, cred.credentials
    	FROM {rcommon_user_credentials} cred
    	LEFT JOIN {rcommon_books} b ON cred.isbn = b.isbn
    	WHERE cred.id = '{$cred}'");

    $data = new stdClass();
    $data->bookid     = $credential->bookid;
    $data->id         = 0;
    $data->unitid     = 0;
    $data->activityid = 0;
    $data->course     = 1;
    $data->module     = 'check_credentials';
    $data->cmid       = 0;

    $usr_creden              = new stdClass();
    $usr_creden->credentials = $credential->credentials;
    $usr_creden->euserid     = $credential->userid;

try {
    $result = AuthenticateUserContent($data, $usr_creden, false);

    if ($result->AutenticarUsuarioContenidoResult->Codigo == 1) {
    	echo '<span style="color:green">' . get_string('good_connection', 'local_rcommon') . '</span>';
    } else {
  		echo '<span style="color:red">' . get_string('bad_connection', 'local_rcommon') . ': <span style="font-size:small">' . get_string('error_code_' . $result->AutenticarUsuarioContenidoResult->Codigo, 'local_rcommon') . '</span></span>';
    }
} catch (Exception $e) {
    echo '<span style="color:red">' . get_string('bad_connection', 'local_rcommon') . ': <span style="font-size:small">' . $e->getMessage() . '</span></span>';
}
