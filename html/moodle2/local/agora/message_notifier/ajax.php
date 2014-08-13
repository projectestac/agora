<?php
require_once('../../../config.php');
require_once($CFG->dirroot.'/message/lib.php');
require_once($CFG->dirroot.'/local/agora/message_notifier/global.lib.php');


$context = context_system::instance();
$PAGE->set_context($context);
require_login();

$action = required_param('action',PARAM_TEXT);

header('Content-Type: text/xml; charset=utf-8');
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon,26 Jul 1997 05:00:00 GMT');
echo '<?xml version="1.0" encoding="UTF-8"?>';


echo '<message>';
echo "<![CDATA[\n";
switch($action){
	case 'show_messages':
		$messages = message_notifier_get_messages();
		foreach($messages as $message){
			$user = $DB->get_record('user', array('id'=>$message->useridfrom));
			$url = empty($message->contexturl) ? $CFG->wwwroot.'/message/index.php?user='.$message->useridto.'&id='.$message->useridfrom : $message->contexturl;
			$subject = empty($message->subject) ? $message->contexturlname : $message->subject;

			echo '<li class="message" data-target="'.$message->id.'"">';
			echo '<div class="picture">'.$OUTPUT->user_picture($user, array('size' => 35, 'courseid' => SITEID, 'link'=>false)).'</div>';
			echo '<div class="time">'.time_elapsed_string($message->timecreated).'</div>';
			echo '<div class="subject"><span class="userfrom">'.fullname($user).'</span>'.$subject.'</div>';
			echo '<div class="message_content">'.$message->smallmessage.'</div>';
			echo '</li>';
		}
		echo '<li class="viewall"><a href="'.$CFG->wwwroot.'/message/index.php">'.get_string('messagehistoryfull','message').'</a></li>';
	break;
	case 'show_message':
		$id = required_param('id',PARAM_INT);
		$message = message_notifier_get_message($id);
		$user = $DB->get_record('user', array('id'=>$message->useridfrom));

		$url = empty($message->contexturl) ? $CFG->wwwroot.'/message/index.php?user='.$message->useridto.'&id='.$message->useridfrom : $message->contexturl;
		$subject = empty($message->subject) ? $message->contexturlname : $message->subject;
		echo '<div id="messagePanel" class="message">';
		echo '<div class="picture">'.$OUTPUT->user_picture($user, array('size' => 35, 'courseid' => SITEID)).'</div>';
		echo '<div class="time">'.time_elapsed_string($message->timecreated).'</div>';
		echo '<div class="subject"><span class="userfrom">'.fullname($user).'</span><a href="'.$url.'">'.$subject.'</a></div>';
		$text = empty($message->fullmessagehtml) ? $message->fullmessage : $message->fullmessagehtml;
		//$text = message_format_message($message);
		echo '<div class="message_content">'.$text.'</div>';
		echo '</div>';
	break;
	case 'mark_as_read':
		$id = required_param('id',PARAM_INT);
		$message = message_notifier_get_message($id);
		message_mark_message_read($message,time());
	break;
}
echo "]]>\n";
echo '</message>';
