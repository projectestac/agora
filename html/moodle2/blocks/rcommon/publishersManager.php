<?php

require_once('../../config.php');
require_once("{$CFG->libdir}/formslib.php");

/*
print_header("$site->shortname: $str: $pagetitle", $str, $navigation, '', '', true, $prefsbutton, user_login_string($site));
*/
//************** FI
if(!$site = get_site()) {
	print_error(get_string('accessdenied'), $CFG->wwwroot.'/'.$CFG->admin.'/index.php');
}
//TODO comprovar que no es faci la redireccio, ja que si es fa i s'ha enviat el header dona un warning
require_login();
//MARSUPIAL *************** MODIFICAT - To show as admin option
//sarjona @2011.09.15
require_once($CFG->libdir.'/adminlib.php');
admin_externalpage_setup('marsupialmanage_publisher');
// get parameters
$action  = optional_param('action', '', PARAM_ALPHA);
// MARSUPIAL ************ AFEGIT -> Control if we are saving data
// 2013.02.06 @abertranb
if ($action!='save'){
// ********** END
// MARSUPIAL ************ MODIFICAT -> Deprecated code in Moodle 2.x
// 2012.11.17 @abertranb
echo $OUTPUT->header();
// ************** ORIGINAL
//admin_externalpage_print_header();
// ************ FI

$pagetitle = get_string('publishersmanager', 'block_rcommon');
//set headers
// MARSUPIAL ************ DELETED -> Not needed in Moodle 2.x
// 2012.11.17 @abertranb
/*

$str = get_string('rcommon', 'block_rcommon');
$navlinks = array();
$navlinks[] = array('name' => "{$str} : {$pagetitle}",
					'link' =>'#',
					'type' => 'misc');

$prefsbutton = "";

// Print title and header
$navigation = build_navigation($navlinks);
*/
// ************** FI

//publishers management
echo '<div>
		<h2 class="headingblock header ">'.$pagetitle.'</h2>
		<ul class="unlist">
			<li>
				<div class="coursebox clearfix">
					<div class="info-manager">
						<div class="name">';
}
switch($action){
	case 'edit':
		//get values
		$publisher = required_param('publisher', PARAM_INT);
		if (!$record = $DB->get_record('rcommon_publisher', array('id' => $publisher))){
			print_error(get_string('nopublisher', 'block_rcommon'), $CFG->wwwroot.'/blocks/rcommon/publishersManager.php');
		}
	case 'add';
		class block_rcommon_publishers_form extends moodleform {
			
		    function definition() {
			    global $CFG;
			    $bform    =& $this->_form;
			    $bform->addElement('hidden', 'action', 'save');
		        $bform->addElement('hidden', 'publisher');
		        //name  
			    $bform->addElement('text', 'name', get_string('name'), array('maxlength' => 255, 'size' => 45));
				$bform->addRule('name', null, 'required', null, 'client');
			    //code
			    $bform->addElement('text', 'code', get_string('code', 'block_rcommon'), array('maxlength' => 255, 'size' => 45));
				//urlwsauthentication
				$bform->addElement('text', 'urlwsauthentication', get_string('urlwsauthentication', 'block_rcommon'), array('maxlength' => 255, 'size' => 45));
				$bform->addRule('urlwsauthentication', null, 'required', null, 'client');
				$bform->setType('urlwsauthentication', PARAM_URL);
				//urlwsbookstructure
				$bform->addElement('text', 'urlwsbookstructure', get_string('urlwsbookstructure', 'block_rcommon'), array('maxlength' => 255, 'size' => 45));
				$bform->addRule('urlwsbookstructure', null, 'required', null, 'client');
				$bform->setType('urlwsbookstructure', PARAM_URL);
				//username
				$bform->addElement('text', 'username', get_string('username'), array('maxlength' => 255, 'size' => 45));
				//password
				$bform->addElement('passwordunmask', 'password', get_string('password'), array('maxlength' => 255, 'size' => 45));
				
				$buttonarray = array();
				$buttonarray[] = &$bform->createElement('submit', 'submitbutton', get_string('save', 'block_rcommon'));
				$buttonarray[] = &$bform->createElement('button', 'cancel', get_string('cancel'), array('onclick' => 'javascript:history.back();'));
				
				$bform->addGroup($buttonarray, 'buttonar', '', array(' '), false);
                $bform->setType('buttonar', PARAM_RAW);
                $bform->closeHeaderBefore('buttonar');
				
			}
		}
		
		$form = new stdClass();
        //set values
		if (isset($publisher)){
		    $form->publisher           = $publisher;
			$form->name                = $record->name;
			$form->code                = $record->code;
			$form->urlwsauthentication = $record->urlwsauthentication;
			$form->urlwsbookstructure  = $record->urlwsbookstructure;
			$form->username            = $record->username;
			$form->password            = $record->password;			
		} else {
			$form->name                = "";
			$form->code                = "";
			$form->urlwsauthentication = "";
			$form->urlwsbookstructure  = "";
			$form->username            = "";
			$form->password            = "";
		}
		
	    $bform = new block_rcommon_publishers_form();
	    $bform->set_data($form);
	    $bform->display();
		
	break;
	case 'save':
		//get values
		$publisher = optional_param('publisher', '', PARAM_INT);
		$record = new stdClass();
		$record->code                = required_param('code', PARAM_RAW);
		$record->name                = optional_param('name', $record->code, PARAM_RAW);
		$record->urlwsauthentication = optional_param('urlwsauthentication', '', PARAM_RAW);
		$record->urlwsbookstructure  = optional_param('urlwsbookstructure', '', PARAM_RAW); 
		$record->username            = optional_param('username', '', PARAM_RAW);
		$record->password            = optional_param('password', '', PARAM_RAW);
		
//MARSUPIAL *********** AFEGIT -> Fixed bug, Always check that the urls are with "/" and not with "\"
//2011.10.14 @mmartinez
		//sanitate values
		$record->urlwsauthentication = str_replace("\\", "/", $record->urlwsauthentication);
		$record->urlwsbookstructure  = str_replace("\\", "/", $record->urlwsbookstructure);
// *********** END

		//extra controls
		if (empty($record->name)){
			print_error(get_string('savekoemptyvalues', 'block_rcommon'), $CFG->wwwroot.'/blocks/rcommon/publishersManager.php');
		}
		if (!empty($record->urlwsauthentication) && $pos = strpos(strtolower($record->urlwsauthentication), '?wsdl')){
			$record->urlwsauthentication = substr($record->urlwsauthentication, 0, $pos);
		}
		if (!empty($record->urlwsbookstructure) && $pos = strpos(strtolower($record->urlwsbookstructure), '?wsdl')){
			$record->urlwsbookstructure  = substr($record->urlwsbookstructure, 0, $pos);
		}		
		
		//do save
		if (empty($publisher)){			
			$record->timecreated = time();

			if (!$DB->insert_record('rcommon_publisher', $record)){
				redirect($CFG->wwwroot.'/blocks/rcommon/publishersManager.php?action=edit&publisher='.$publisher, get_string('saveko', 'block_rcommon'), 5);
			}
			
		}else{
		    $record->id           = $publisher;
			$record->timemodified = time();
			
			if (!$DB->update_record('rcommon_publisher', $record)){
			    redirect($CFG->wwwroot.'/blocks/rcommon/publishersManager.php?action=edit&publisher='.$publisher, get_string('saveko', 'block_rcommon'), 5);
			}		
		}
		
		redirect($CFG->wwwroot.'/blocks/rcommon/publishersManager.php', get_string('saveok', 'block_rcommon'), 2);
		
	break;
	case 'del':
		//get values
		$confirm   = optional_param('confirm', 0, PARAM_INT);
		$publisher = optional_param('publisher', '', PARAM_INT);
		
		//do delete
		if (empty($confirm)){
	        if (!$record = $DB->get_record('rcommon_publisher', array('id' => $publisher))){
				print_error(get_string('nopublisher', 'block_rcommon'), $CFG->wwwroot.'/blocks/rcommon/publishersManager.php');
			}
			echo '<p>'.get_string('confirmdeletestr', 'block_rcommon', $record->name.' ('.$record->code.')').'</p>
			    <form action="publishersManager.php" method="GET">
			        <input type="hidden" name="action" value="del" />
			        <input type="hidden" name="confirm" value="1" />
			        <input type="hidden" name="publisher" value="'.$publisher.'" />			        
			        <input type="submit" value="'.get_string('confirm').'" /> <input type="button" value="'.get_string('cancel').'" onclick="javascript:history.back();" />
			    </form>';
		}else{
			if (!$DB->delete_records('rcommon_publisher', array('id' => $publisher))){
				redirect($CFG->wwwroot.'/blocks/rcommon/publishersManager.php', get_string('delko', 'block_rcommon'), 5);
			}
			redirect($CFG->wwwroot.'/blocks/rcommon/publishersManager.php', get_string('delok', 'block_rcommon'), 2);
		}
	break;
	default:
        	$publishers = $DB->get_records('rcommon_publisher', array(), 'name ASC');
		if (!empty($publishers)){    
                    echo '<p>'.get_string('selectpublisheredit','block_rcommon').'<br/>
			<form action="publishersManager.php" method="GET">
				<input type="hidden" name="action" value="edit" />
			    <select name="publisher" id="publisher">
				';
				$publishers = $DB->get_records('rcommon_publisher', array(), 'name ASC');
				foreach($publishers as $publisher) {
				    echo '<option value="'.$publisher->id.'">'.$publisher->name.(!empty($publisher->code)?' ('.$publisher->code.')':'').'</option>';
				}
				echo '</select>
				<input type="submit" value="'.get_string('edit').'" /> <input type="button" value="'.get_string('delete').'" onclick="if (document.getElementById(\'publisher\').value != 0){ document.location.href=\'publishersManager.php?action=del&publisher=\'+document.getElementById(\'publisher\').value;}" />
			</form>
			</p>';
                }
		echo '<p><input onclick="document.location.href=\'publishersManager.php?action=add\';" type="submit" value="'.get_string('addnewpublisher', 'block_rcommon').'" /></p>';		
}
echo '</div>
</div>
<div class="summary"></div>
</div>
</li>
</ul>
</div>';
// MARSUPIAL ************ MODIFICAT -> Deprecated code in Moodle 2.x
// 2012.11.17 @abertranb
echo $OUTPUT->footer();
// ************ MODIFICAT
//print_footer();
// ************ FI


?>