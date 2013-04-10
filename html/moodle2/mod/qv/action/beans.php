<?php 

// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * File called from QV player to save students' results
 *
 * @package    mod
 * @subpackage qv
 * @copyright  2011 Departament d'Ensenyament de la Generalitat de Catalunya
 * @author     Sara Arjona Téllez <sarjona@xtec.cat>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
header('Content-type: text/xml;charset=UTF-8');

define('ERROR_BEAN_NOT_DEFINED', 'error_bean_not_defined');
define('ERROR_ASSIGNMENTID_DOES_NOT_EXIST', 'error_assignmentid_does_not_exist');
define('ERROR_DB_INSERT', 'error_db_insert');
define('ERROR_DB_UPDATE', 'error_db_update');
define('ERROR_MAXDELIVER_EXCEEDED', 'error_maxdeliver_exceeded');


if(isset($GLOBALS["HTTP_RAW_POST_DATA"]) && $GLOBALS["HTTP_RAW_POST_DATA"]){
	$my_xml = $GLOBALS["HTTP_RAW_POST_DATA"];
} else if(isset($HTTP_RAW_POST_DATA)){
	$my_xml = $HTTP_RAW_POST_DATA;
}

require_once("../../../config.php");
require_once("../lib.php");
require_once("../locallib.php");

$elements=array();
$oldElements=array();
$thisElement="";


$beans = array();
$currentBean = -1;
$params = array();

function startElement($parser, $name, $attribs ) {
	global $beans, $currentBean, $params, $thisElement, $oldElements, $elements;
	
	array_push($oldElements, $thisElement);
	$thisElement=$name;
	if ($name == 'BEAN'){
		$currentBean++;
		$bean = array();
		$bean['ID'] = $attribs['ID'];
		$bean['PARAMS'] = "";
		$beans[$currentBean] = $bean;
		$params = array();
	}else if ($name == 'PARAM'){
		$params[$attribs['NAME']] = $attribs['VALUE'];
	}else if ($name == 'ACTIVITY'){
		$beans[$currentBean]['ACTIVITY'] = array('name'=>$attribs['NAME'],'start'=>$attribs['START'],'time'=>$attribs['TIME'],'solved'=>$attribs['SOLVED'],'score'=>$attribs['SCORE'],'minActions'=>$attribs['MINACTIONS'],'actions'=>$attribs['ACTIONS']);
	}
	$elements[ $thisElement ] = $attribs;
}

function endElement($parser, $name) {
   global $beans, $currentBean, $params, $thisElement, $oldElements;
   
   $thisElement = array_pop( $oldElements);
   $beans[$currentBean]['PARAMS'] = $params;
}

function characterData($parser, $text) {
	global $beans, $currentBean, $params, $thisElement, $elements;
   
	$elements[ $thisElement ] .= $text;
	if ($thisElement == 'MESSAGE' || $thisElement == 'RESPONSES' || $thisElement == 'SCORES') {
		if (!array_key_exists(strtolower($thisElement), $params))
			$params[strtolower($thisElement)] = '';
		$params[strtolower($thisElement)] .= str_replace("'", "&#39;", $text);
	}
}

$xml_parser = xml_parser_create('UTF-8');
xml_set_element_handler($xml_parser, 'startElement', 'endElement');
xml_set_character_data_handler($xml_parser, 'characterData');
xml_parse($xml_parser, $my_xml);
xml_parser_free($xml_parser);

switch($beans[0]['ID']){
    case "add_message":
		$assignmentid=$beans[0]['PARAMS']['assignmentid'];
		$sectionid=$beans[0]['PARAMS']['sectionid'];
		$itemid=$beans[0]['PARAMS']['itemid'];
		$userid=$beans[0]['PARAMS']['userid'];
		$text=$beans[0]['PARAMS']['message'];
		$bean = addMessage($assignmentid, $sectionid, $itemid, $userid, $text);
		break;
    case "correct_section":
		$assignmentid=$beans[0]['PARAMS']['assignmentid'];
		$sectionid=$beans[0]['PARAMS']['sectionid'];
		$responses=(array_key_exists('responses', $beans[0]['PARAMS']))?$beans[0]['PARAMS']['responses']:'';//Albert
		$scores=(array_key_exists('scores', $beans[0]['PARAMS']))?$beans[0]['PARAMS']['scores']:'';//Albert
		$bean = correctSection($assignmentid, $sectionid, $responses, $scores);
		break;
    case "save_time": //Albert
		$assignmentid=$beans[0]['PARAMS']['assignmentid'];
		$sectionid=$beans[0]['PARAMS']['sectionid'];
		$sectiontime=$beans[0]['PARAMS']['time'];
		//echo correctSection($assignmentid, $sectionid);
		$bean = saveTime($assignmentid, $sectionid, $sectiontime);
		break;
    case "deliver_section":
		$assignmentid=$beans[0]['PARAMS']['assignmentid'];
		$sectionid=$beans[0]['PARAMS']['sectionid'];
		$sectionorder=(array_key_exists('sectionorder', $beans[0]['PARAMS']))?$beans[0]['PARAMS']['sectionorder']:-1; //Albert
		$itemorder=(array_key_exists('itemorder', $beans[0]['PARAMS']))?$beans[0]['PARAMS']['itemorder']:-1; //Albert
		$sectiontime=(array_key_exists('time', $beans[0]['PARAMS']))?$beans[0]['PARAMS']['time']:0; //Albert
		$responses=(array_key_exists('responses', $beans[0]['PARAMS']))?$beans[0]['PARAMS']['responses']:'';
		$scores=(array_key_exists('scores', $beans[0]['PARAMS']))?$beans[0]['PARAMS']['scores']:'';
		$bean = deliverSection($assignmentid, $sectionid, $responses, $scores, $sectionorder, $itemorder, $sectiontime);
		break;
    case "get_messages":
		$assignmentid=$beans[0]['PARAMS']['assignmentid'];
		$sectionid=$beans[0]['PARAMS']['sectionid'];
		$bean = getMessages($assignmentid, $sectionid);
		break;
    case "get_section":
		$assignmentid=$beans[0]['PARAMS']['assignmentid'];
		$sectionid=$beans[0]['PARAMS']['sectionid'];
		$bean = getSection($assignmentid, $sectionid);
		break;
	case "get_sections":
		$assignmentid = $beans[0]['PARAMS']['assignmentid'];
		$bean = getSections($assignmentid);
		break;
	case "save_section":
		$assignmentid=$beans[0]['PARAMS']['assignmentid'];
		$sectionid=$beans[0]['PARAMS']['sectionid'];
		$sectionorder=(array_key_exists('sectionorder', $beans[0]['PARAMS']))?$beans[0]['PARAMS']['sectionorder']:-1; //Albert
		$itemorder=(array_key_exists('itemorder', $beans[0]['PARAMS']))?$beans[0]['PARAMS']['itemorder']:-1; //Albert
		$sectiontime=(array_key_exists('time', $beans[0]['PARAMS']))?$beans[0]['PARAMS']['time']:0; //Albert
		$responses=$beans[0]['PARAMS']['responses'];
		$bean = saveSection($assignmentid, $sectionid, $responses, $sectionorder, $itemorder, $sectiontime);
		break;
	case "save_section_teacher":
		$assignmentid=$beans[0]['PARAMS']['assignmentid'];
		$sectionid=$beans[0]['PARAMS']['sectionid'];
		$responses=$beans[0]['PARAMS']['responses'];
		$scores=(array_key_exists('scores', $beans[0]['PARAMS']))?$beans[0]['PARAMS']['scores']:'';//A
		$bean = saveSectionTeacher($assignmentid, $sectionid, $responses, $scores);//A
		break;
	default:
		$bean = new SimpleXMLElement('<bean/>');
		$bean->addAttribute('id',$beans[0]['ID']);
		$param = $bean->addChild('param');
		$param->addAttribute('name','error');
		$param->addAttribute('value', ERROR_BEAN_NOT_DEFINED);
		break;
}

$xml = $bean->asXML();
echo str_replace('<?xml version="1.0"?>', '<?xml version="1.0" encoding="UTF-8"?>', $xml);


function getSections($assignmentid){
	global $DB;
  
	if (!existsAssignment($assignmentid)){
		$error = ERROR_ASSIGNMENTID_DOES_NOT_EXIST;
	}
	
	$time = '00:00:00';
	
	$bean = new SimpleXMLElement('<bean/>');
	$bean->addAttribute('id','get_sections');
	$bean->addAttribute('assignmentid',$assignmentid);
	
	if (!isset($error)){
		if($qv = $DB->get_record_sql("SELECT q.id as qvid, q.maxdeliver, q.showcorrection
							 FROM {qv} q, {qv_assignments} a 
							 WHERE q.id = a.qvid AND a.id = $assignmentid")){
			if ($qv_sections = $DB->get_records('qv_sections', array('assignmentid'=>$assignmentid))){
				foreach ($qv_sections as $qv_section){
					$time = qv_add_time($time, $qv_section->time);
					$section = $bean->addChild('section');
					$section->addAttribute('id',$qv_section->sectionid);
					$section->addAttribute('showcorrection',$qv->showcorrection);
					$section->addAttribute('maxdeliver',$qv->maxdeliver);
					$section->addAttribute('attempts',$qv_section->attempts);
					$section->addAttribute('scores',$qv_section->scores);
					$section->addAttribute('pending_scores',$qv_section->pending_scores);
					$section->addAttribute('state',$qv_section->state);
					$section->addAttribute('time',$qv_section->time);
				}
			}	
		}
	} else {
		$message->addAttribute('error',$error);
	}
  
	$bean->addAttribute('time',$time);
	
	return $bean;
}

function getSection($assignmentid, $sectionid){
	global $DB;

	$responses = '';
	$scores = '';
	$pending_scores = '';
	$attempts = 0;
	$state = -1;
	$time = "00:00:00";
	$maxdeliver = '';
	$showcorrection = '';
	
	if (!existsAssignment($assignmentid)){
		$error = ERROR_ASSIGNMENTID_DOES_NOT_EXIST;
	} else {
		if ($qv_section = $DB->get_record('qv_sections', array('assignmentid'=>$assignmentid, 'sectionid'=>$sectionid))){
			$responses = $qv_section->responses;
			$scores = $qv_section->scores;
			$pending_scores = $qv_section->pending_scores;//A
			$attempts = $qv_section->attempts;
			$state = $qv_section->state;
			$time = $qv_section->time;//Albert
		}

		if($qv = $DB->get_record_sql("SELECT q.id as qvid, q.maxdeliver, q.showcorrection
								 FROM {qv} q, {qv_assignments} a 
								 WHERE q.id=a.qvid AND a.id=$assignmentid")){
			  $maxdeliver = $qv->maxdeliver;
			  $showcorrection = $qv->showcorrection;
		}  
	}

	$bean = new SimpleXMLElement('<bean/>');
	$bean->addAttribute('id','get_section');
	$bean->addAttribute('assignmentid',$assignmentid);

	$section = $bean->addChild('section');
	$section->addAttribute('id',$sectionid);
	if (isset($error)) $section->addAttribute('error',$error);
	$section->addAttribute('showcorrection',$showcorrection);
	$section->addAttribute('maxdeliver',$maxdeliver);
	$section->addAttribute('attempts',$attempts);
	$section->addAttribute('state',$state);
	$section->addAttribute('time',$time);

	$section->addChild('responses',$responses);
	$section->addChild('pending_scores',$pending_scores);
	
	return $bean;
}

function existsAssignment($assignmentid){
    global $DB;
    $qv_assignment = $DB->get_record('qv_assignments', array('id'=>$assignmentid));
    return $qv_assignment;
}

function checkMaxDeliverNotExceeded($qv_section){
    global $DB;
    
    $not_exceeded = true;
        //Check max deliver < current attempts
    if($qv = $DB->get_record_sql("SELECT q.maxdeliver, q.showcorrection
                           FROM {qv} q, {qv_assignments} a  
                           WHERE q.id=a.qvid AND a.id=$qv_section->assignmentid")){
        $not_exceeded = ($qv->maxdeliver < 0 || $qv_section->attempts < $qv->maxdeliver);
    }
    return $not_exceeded;
}

function saveSection($assignmentid, $sectionid, $responses, $sectionOrder=-1, $itemOrder=-1, $sectiontime){ //Albert
    global  $DB;
    
    $qvAssignment = existsAssignment($assignmentid);//ALLR
    //ALLR if (!$existsAssignment($assignmentid)){
    if (!$qvAssignment){
		$error = ERROR_ASSIGNMENTID_DOES_NOT_EXIST;
    }else{
        $modifiedAssign = false;
        if($sectionOrder >= 0) { //Establishing sectionOrder
            if($sectionOrder!=0 && $qvAssignment->sectionorder==0){ //it wasn't established before
                $qvAssignment->sectionorder=$sectionOrder;
                $modifiedAssign = true;
            }
        }	
        if($itemOrder>=0){ //Establishing itemOrder
            if($itemOrder!=0 && $qvAssignment->itemorder==0){ //it wasn't established before
                $qvAssignment->itemorder=$itemOrder;
                $modifiedAssign = true;
            }
        }	
        if ($modifiedAssign){ //Only update if necessary
            if (!$DB->update_record('qv_assignments', $qvAssignment)){
                $error = ERROR_DB_INSERT;
            }
        }

        if (!$qv_section = $DB->get_record('qv_sections', array('assignmentid'=>$assignmentid, 'sectionid'=>$sectionid))){
            // Insert section
            $qv_section = new stdClass();
            $qv_section->assignmentid=$assignmentid;
            $qv_section->sectionid=$sectionid;
            $qv_section->responses=$responses;
            $qv_section->state=0;
            $qv_section->time=$sectiontime; 
            if (!$DB->insert_record('qv_sections', $qv_section)){
                $error = ERROR_DB_INSERT;
            }
        } else {
            if(checkMaxDeliverNotExceeded($qv_section)){  	
                //Update section
                $qv_section->responses = $responses;
                $qv_section->state = 0;
                $qv_section->pending_scores = $qv_section->scores;//A
                $qv_section->time = qv_add_time($qv_section->time, $sectiontime); 
                if (!$DB->update_record('qv_sections', $qv_section)){
                    $error = ERROR_DB_UPDATE;
                }
            }else{
                $error = ERROR_MAXDELIVER_EXCEEDED;        		
            }
        }  
    }

    $bean = new SimpleXMLElement('<bean/>');
	$bean->addAttribute('id','save_section');
	$bean->addAttribute('assignmentid',$assignmentid);

	$section = $bean->addChild('section');
	$section->addAttribute('id',$sectionid);
	if (isset($error)) $section->addAttribute('error',$error);
	$section->addAttribute('state',$qv_section->state);
	
	return $bean;
}

function saveSectionTeacher($assignmentid, $sectionid, $responses, $scores){ //Albert //A
    global $DB;

    $qvAssignment = existsAssignment($assignmentid);//ALLR
    if (!$qvAssignment){
		$error = ERROR_ASSIGNMENTID_DOES_NOT_EXIST;
    } else{
        if (!$qv_section = $DB->get_record('qv_sections', array('assignmentid'=>$assignmentid, 'sectionid'=>$sectionid))){
            // Insert section
            $qv_section = new stdClass();
            $qv_section->assignmentid=$assignmentid;
            $qv_section->sectionid=$sectionid;
            $qv_section->responses=$responses;
            $qv_section->pending_scores=$scores;//A
            //$qv_section->state=0;
            $qv_section->time="00:00:00"; 
            if (!$DB->insert_record('qv_sections', $qv_section)){
                $error = ERROR_DB_INSERT;
            }
        } else{
            //Update section
            $qv_section->responses=$responses;
            $qv_section->pending_scores=$scores;//A
            //$qv_section->state=0;

            if (!$DB->update_record('qv_sections', $qv_section)){
                $error = ERROR_DB_UPDATE;
            }else{
//                qv_update_gradebook($qv_section);        	
                $qv = $DB->get_record('qv', array('id' => $qvAssignment->qvid) );
                $cm = get_coursemodule_from_instance('qv', $qv->id, $qv->course, false, MUST_EXIST);
                $qv->cmidnumber = $cm->idnumber;
                qv_update_grades($qv, $qvAssignment->userid);
            }
        }  
    }
  	
	$bean = new SimpleXMLElement('<bean/>');
	$bean->addAttribute('id','save_section_teacher');
	$bean->addAttribute('assignmentid',$assignmentid);

	$section = $bean->addChild('section');
	$section->addAttribute('id',$sectionid);
	if (isset($error)) $section->addAttribute('error',$error);
	$section->addAttribute('state',$qv_section->state);
	
	return $bean;
}

function deliverSection($assignmentid, $sectionid, $responses, $scores, $sectionOrder=-1, $itemOrder=-1, $sectiontime){ //Albert
    global $DB;

    $qvAssignment = existsAssignment($assignmentid);//ALLR
    //ALLR if (!$existsAssignment($assignmentid)){
    if (!$qvAssignment){
        $error = ERROR_ASSIGNMENTID_DOES_NOT_EXIST;
    }else {
        $modifiedAssign = false;
        if ($sectionOrder>=0){ //Establishing sectionOrder
            if ($sectionOrder!=0 && $qvAssignment->sectionorder==0){ //it wasn't established before
                $qvAssignment->sectionorder=$sectionOrder;
                $modifiedAssign = true;
            }
        }	
        if($itemOrder>=0){ //Establishing itemOrder
            if($itemOrder!=0 && $qvAssignment->itemorder==0){ //it wasn't established before
                    $qvAssignment->itemorder=$itemOrder;
                    $modifiedAssign = true;
            }
        }	
        if ($modifiedAssign){ //Only update if necessary
            if (!$DB->update_record('qv_assignments', $qvAssignment)){
              $error = ERROR_DB_INSERT;
            }
        }

        if (!$qv_section = $DB->get_record('qv_sections', array('assignmentid'=>$assignmentid, 'sectionid'=>$sectionid))){
            // Insert section
            $qv_section = new stdClass();
            $qv_section->assignmentid=$assignmentid;
            $qv_section->sectionid=$sectionid;
            $qv_section->responses=$responses;
            $qv_section->scores=$scores;
            $qv_section->pending_scores=$scores;//A
            $qv_section->attempts=1;
            $qv_section->state=1;		
            $qv_section->time=$sectiontime;//Albert
            if (!$DB->insert_record('qv_sections', $qv_section)){
                $error = ERROR_DB_INSERT;
            }else{
//                qv_update_gradebook($qv_section);
                $qv = $DB->get_record('qv', array('id' => $qvAssignment->qvid) );
                $cm = get_coursemodule_from_instance('qv', $qv->id, $qv->course, false, MUST_EXIST);
                $qv->cmidnumber = $cm->idnumber;
                qv_update_grades($qv, $qvAssignment->userid);
            }
        } else{
            //Check max deliver < current attempts
            if(checkMaxDeliverNotExceeded($qv_section)){
                //Update section
                $qv_section->responses = $responses;
                $qv_section->scores = $scores;
                $qv_section->pending_scores = $scores;
                $qv_section->attempts = $qv_section->attempts+1;
                $qv_section->state = 1;
                $qv_section->time = qv_add_time($qv_section->time, $sectiontime);
                if (!$DB->update_record('qv_sections', $qv_section)){
                    $error = ERROR_DB_UPDATE;
                } else{
//                    qv_update_gradebook($qv_section);
                    $qv = $DB->get_record('qv', array('id' => $qvAssignment->qvid) );
                    $cm = get_coursemodule_from_instance('qv', $qv->id, $qv->course, false, MUST_EXIST);
                    $qv->cmidnumber = $cm->idnumber;
                    qv_update_grades($qv, $qvAssignment->userid);
                }
            } else{
                $error=ERROR_MAXDELIVER_EXCEEDED;        		
            }
        }  
    }

    if($qv = $DB->get_record_sql("SELECT q.id as qvid, q.maxdeliver, q.showcorrection
                             FROM {qv} q, {qv_assignments} a 
                         WHERE q.id=a.qvid AND a.id=$assignmentid")){
		$maxdeliver = $qv->maxdeliver;
		$showcorrection = $qv->showcorrection;
    }

    $bean = new SimpleXMLElement('<bean/>');
	$bean->addAttribute('id','deliver_section');
	$bean->addAttribute('assignmentid',$assignmentid);

	$section = $bean->addChild('section');
	$section->addAttribute('id',$sectionid);
	if (isset($error)) $section->addAttribute('error',$error);
	$section->addAttribute('attempts',$qv_section->attempts);
	$section->addAttribute('maxdeliver',$qv_section->maxdeliver);
	$section->addAttribute('showcorrection',$qv_section->showcorrection);
	$section->addAttribute('time',$qv_section->time);
	$section->addAttribute('state',$qv_section->state);
	
	return $bean;
}

function correctSection($assignmentid, $sectionid, $responses, $scores){
    global $DB;
    
    $qvAssignment = existsAssignment($assignmentid);
    if (!$qvAssignment) {
        $error = ERROR_ASSIGNMENTID_DOES_NOT_EXIST;
    }else{
        if (!$qv_section = $DB->get_record('qv_sections', array('assignmentid'=>$assignmentid, 'sectionid'=>$sectionid))){
            // Insert section
            $qv_section = new stdClass();
            $qv_section->assignmentid = $assignmentid;
            $qv_section->sectionid = $sectionid;
            if ($responses=''){ //Albert
                $qv_section->responses="";
            } else {
                $qv_section->responses=$responses;
            }
            if ($scores=''){//Albert
                $qv_section->scores = "";
                $qv_section->pending_scores = "";//A
            } else {
                $qv_section->scores = $scores;
                $qv_section->pending_scores = $scores;//A
            }
            $qv_section->attempts = 0;
            $qv_section->state = 2;
            
            if (!$DB->insert_record('qv_sections', $qv_section)){
              $error = ERROR_DB_INSERT;
            }
        } else{
            //Update section
            $qv_section->state = 2;
            if ($responses!=''){ //Albert
                $qv_section->responses = $responses;
            }
            if ($scores!=''){//Albert
                $qv_section->scores = $scores;
                $qv_section->pending_scores = $scores;//A
            }
            if (!$DB->update_record('qv_sections', $qv_section)){
                $error = ERROR_DB_UPDATE;
            } else{
//                qv_update_gradebook($qv_section);      		
                $qv = $DB->get_record('qv', array('id' => $qvAssignment->qvid) );
                $cm = get_coursemodule_from_instance('qv', $qv->id, $qv->course, false, MUST_EXIST);
                $qv->cmidnumber = $cm->idnumber;
                qv_update_grades($qv, $qvAssignment->userid);
            }
        }
    }

    $bean = new SimpleXMLElement('<bean/>');
	$bean->addAttribute('id','correct_section');
	$bean->addAttribute('assignmentid',$assignmentid);

	$section = $bean->addChild('section');
	$section->addAttribute('id',$sectionid);
	if (isset($error)) $section->addAttribute('error',$error);
	$section->addAttribute('state',$qv_section->state);
	
	return $bean;
}

function saveTime($assignmentid, $sectionid, $sectiontime){
    global $DB;
    
    if (!existsAssignment($assignmentid)){
        $error = ERROR_ASSIGNMENTID_DOES_NOT_EXIST;
    } else {
        if (!$qv_section = $DB->get_record('qv_sections', array('assignmentid'=>$assignmentid, 'sectionid'=>$sectionid))){
            // Insert section
            $qv_section = new stdClass();
            $qv_section->assignmentid=$assignmentid;
            $qv_section->sectionid=$sectionid;
            $qv_section->responses="";
            $qv_section->scores="";
            $qv_section->attempts=0;
            $qv_section->state=0;
            $qv_section->time=$sectiontime;		
            if (!$DB->insert_record('qv_sections', $qv_section)){
                    $error = ERROR_DB_UPDATE;
            }
        } else{
            //Update section
            $qv_section->time = qv_add_time($qv_section->time, $sectiontime);
            if (!$DB->update_record('qv_sections', $qv_section)){
              $error = ERROR_DB_UPDATE;
            }
        }
    }

    $bean = new SimpleXMLElement('<bean/>');
	$bean->addAttribute('id','save_time');
	$bean->addAttribute('assignmentid',$assignmentid);

	$section = $bean->addChild('section');
	$section->addAttribute('id',$sectionid);
	if (isset($error)) $section->addAttribute('error',$error);
	$section->addAttribute('time',$qv_section->time);
	
	return $bean;
}

function addMessage($assignmentid, $sectionid, $itemid, $userid, $message){
    global $USER, $DB;

    if (!existsAssignment($assignmentid)){
        $error = ERROR_ASSIGNMENTID_DOES_NOT_EXIST;
    }else if ($message!=''){
        if (!$qv_section = $DB->get_record('qv_sections', array('assignmentid'=>$assignmentid, 'sectionid'=>$sectionid))){
            // Insert section
            $qv_section = new stdClass();
            $qv_section->assignmentid = $assignmentid;
            $qv_section->sectionid = $sectionid;
            $qv_section->responses = '';
            $qv_section->id = $DB->insert_record('qv_sections', $qv_section);
            if (!$qv_section->id){
                $error=ERROR_DB_INSERT;
            }
        }
        if (!isset($error)){
            // Insert message
            $qv_message->sid = $qv_section->id;
            $qv_message->itemid = $itemid;
            $qv_message->userid = ($userid!=''?$userid:$USER->id);
            $qv_message->created = time();
            $qv_message->message = $message;
            $msgid = $DB->insert_record('qv_messages', $qv_message);
            if ($msgid <= 0) {
                $error = ERROR_DB_INSERT;
            } else{
                // Mark message read for author user
                $qv_message_read = readMessage($qv_section);		
            }
        }
    }

    // Response
    $bean = new SimpleXMLElement('<bean/>');
	$bean->addAttribute('id','add_message');
	$bean->addAttribute('assignmentid',$assignmentid);
	$bean->addAttribute('sectionid',$sectionid);
	$bean->addAttribute('itemid',$itemid);
	$bean->addAttribute('userid',$userid);

	$message = $bean->addChild('message');
	$message->addAttribute('id',$msgid);
	if (isset($error)) $message->addAttribute('error',$error);  

    return $bean;
}

function getMessages($assignmentid, $sectionid){
    global $USER, $DB;

    if (!existsAssignment($assignmentid)){
        $error = ERROR_ASSIGNMENTID_DOES_NOT_EXIST;
    }else{
        if ($qv_section = $DB->get_record('qv_sections', array('assignmentid'=>$assignmentid, 'sectionid'=>$sectionid))){
            $qv_message_read = readMessage($qv_section);
        }
    }

    $bean = new SimpleXMLElement('<bean/>');
	$bean->addAttribute('id','get_messages');
	$bean->addAttribute('assignmentid',$assignmentid);
	$bean->addAttribute('sectionid',$sectionid);
	$bean->addAttribute('userid',$userid);
	if (isset($error)) $bean->addAttribute('error',$error);
	else if ($qv_section && $qv_messages = $DB->get_records('qv_messages', array('sid'=>$qv_section->id), 'created')){
		foreach ($qv_messages as $qv_message) {
			$message = $bean->addChild('message',$qv_message->message);
			$message->addAttribute('id',$qv_message->id);
			$message->addAttribute('itemid',$qv_message->itemid);
			$message->addAttribute('userid',$qv_message->userid);
			if ($qv_username = $DB->get_field('user', 'username', array('id'=>$qv_message->userid))){
				$message->addAttribute('username',$qv_username);
			}
			$message->addAttribute('id',$qv_message->id);
			$message->addAttribute('id',$qv_message->id);
			if (isset($error)) $message->addAttribute('error',$error);
		}
	}

    return $bean;
}

function readMessage($qv_section){
    global $USER, $DB;

    // Mark section as read by userid 
    if ($qv_message_read = $DB->get_record('qv_messages_read', array('sid'=>$qv_section->id, 'userid'=>$USER->id))){
        $qv_message_read->timereaded = time();
        if (!$DB->update_record('qv_messages_read', $qv_message_read)){
            $error = ERROR_DB_UPDATE;
        }
    }else{
        $qv_message_read = new stdClass();
        $qv_message_read->sid = $qv_section->id;
        $qv_message_read->userid = $USER->id;
        $qv_message_read->timereaded = time();
        if (!$DB->insert_record('qv_messages_read', $qv_message_read)){ 
            $error = ERROR_DB_INSERT;
        }
    }
    return $qv_message_read;
}
