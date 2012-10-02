<?PHP // $Id: beans.php,v 1.11 2009/03/11 13:29:36 sarjona Exp $
header('Content-type: text/xml;charset=UTF-8');

/////////////////////////////////////////////////////////////////////////////////
///  Quaderns Virtuals services to save activities
///  Author: Sara Arjona Tellez (sara.arjona@gmail.com)
/////////////////////////////////////////////////////////////////////////////////

define('ERROR_BEAN_NOT_DEFINED', 'error_bean_not_defined');
define('ERROR_ASSIGNMENTID_DOES_NOT_EXIST', 'error_assignmentid_does_not_exist');
define('ERROR_DB_INSERT', 'error_db_insert');
define('ERROR_DB_UPDATE', 'error_db_update');
define('ERROR_MAXDELIVER_EXCEEDED', 'error_maxdeliver_exceeded');


if($GLOBALS["HTTP_RAW_POST_DATA"]){
  $my_xml = $GLOBALS["HTTP_RAW_POST_DATA"];
} else {
  $my_xml = $HTTP_RAW_POST_DATA;
}
//$my_xml=utf8_decode($my_xml);

require_once("../../../config.php");
require_once("../util/qvtime.php");//Albert
require_once("../lib.php");

$elements=array();
$oldElements=array();
$thisElement="";


$beans=array();
$currentBean=-1;
$params=array();

function startElement($parser, $name, $attribs ) {
   global $beans, $currentBean, $params, $thisElement, $oldElements, $elements;
   array_push( $oldElements, $thisElement);
   $thisElement=$name;
   if ($name=='BEAN'){
   	$currentBean++;
   	$bean=array();
   	$bean['ID']=$attribs['ID'];
   	$bean['PARAMS']="";
	$beans[$currentBean]=$bean;
	$params=array();
   }else if ($name=='PARAM'){
   	$params[$attribs['NAME']]=$attribs['VALUE'];
   }else if ($name=='ACTIVITY'){
   	$beans[$currentBean]['ACTIVITY']=array('name'=>$attribs['NAME'],'start'=>$attribs['START'],'time'=>$attribs['TIME'],'solved'=>$attribs['SOLVED'],'score'=>$attribs['SCORE'],'minActions'=>$attribs['MINACTIONS'],'actions'=>$attribs['ACTIONS']);
   }
   $elements[ $thisElement ] = $attribs;
}

function endElement($parser, $name) {
   global $beans, $currentBean, $params, $thisElement, $oldElements;
   $thisElement= array_pop( $oldElements);
   $beans[$currentBean]['PARAMS']=$params;
}

function characterData($parser, $text) {
   global $beans, $currentBean, $params, $thisElement, $elements;
   $elements[ $thisElement ] .= $text;
   if ($thisElement=='MESSAGE' || $thisElement=='RESPONSES' || $thisElement=='SCORES') {
    if (!array_key_exists(strtolower($thisElement), $params)) $params[strtolower($thisElement)]='';
    $params[strtolower($thisElement)].=str_replace("'", "&#39;", $text);
  }
}

$xml_parser = xml_parser_create('UTF-8');
xml_set_element_handler($xml_parser, "startElement", "endElement");
xml_set_character_data_handler($xml_parser, "characterData");
xml_parse($xml_parser, $my_xml);
xml_parser_free($xml_parser);

switch($beans[0]['ID']){
    case "add_message":
	  $assignmentid=$beans[0]['PARAMS']['assignmentid'];
	  $sectionid=$beans[0]['PARAMS']['sectionid'];
	  $itemid=$beans[0]['PARAMS']['itemid'];
	  $userid=$beans[0]['PARAMS']['userid'];
	  $text=$beans[0]['PARAMS']['message'];
	  echo addMessage($assignmentid, $sectionid, $itemid, $userid, $text);
    break;
    case "correct_section":
	  $assignmentid=$beans[0]['PARAMS']['assignmentid'];
	  $sectionid=$beans[0]['PARAMS']['sectionid'];
	  $responses=(array_key_exists('responses', $beans[0]['PARAMS']))?$beans[0]['PARAMS']['responses']:'';//Albert
	  $scores=(array_key_exists('scores', $beans[0]['PARAMS']))?$beans[0]['PARAMS']['scores']:'';//Albert
	  echo correctSection($assignmentid, $sectionid, $responses, $scores);
    break;
    case "save_time": //Albert
	  $assignmentid=$beans[0]['PARAMS']['assignmentid'];
	  $sectionid=$beans[0]['PARAMS']['sectionid'];
	  $sectiontime=$beans[0]['PARAMS']['time'];
	  //echo correctSection($assignmentid, $sectionid);
	  echo saveTime($assignmentid, $sectionid, $sectiontime);
    break;
    case "deliver_section":
	  $assignmentid=$beans[0]['PARAMS']['assignmentid'];
	  $sectionid=$beans[0]['PARAMS']['sectionid'];
	  $sectionorder=(array_key_exists('sectionorder', $beans[0]['PARAMS']))?$beans[0]['PARAMS']['sectionorder']:-1; //Albert
	  $itemorder=(array_key_exists('itemorder', $beans[0]['PARAMS']))?$beans[0]['PARAMS']['itemorder']:-1; //Albert
	  $sectiontime=(array_key_exists('time', $beans[0]['PARAMS']))?$beans[0]['PARAMS']['time']:0; //Albert
	  $responses=(array_key_exists('responses', $beans[0]['PARAMS']))?$beans[0]['PARAMS']['responses']:'';
	  $scores=(array_key_exists('scores', $beans[0]['PARAMS']))?$beans[0]['PARAMS']['scores']:'';
	  echo deliverSection($assignmentid, $sectionid, $responses, $scores, $sectionorder, $itemorder, $sectiontime);
    break;
    case "get_messages":
	  $assignmentid=$beans[0]['PARAMS']['assignmentid'];
	  $sectionid=$beans[0]['PARAMS']['sectionid'];
	  echo getMessages($assignmentid, $sectionid);
    break;
    case "get_section":
	  $assignmentid=$beans[0]['PARAMS']['assignmentid'];
	  $sectionid=$beans[0]['PARAMS']['sectionid'];
    echo getSection($assignmentid, $sectionid);
    break;
	case "get_sections":
	  $assignmentid=$beans[0]['PARAMS']['assignmentid'];
	  echo getSections($assignmentid);
    break;
	case "save_section":
	  $assignmentid=$beans[0]['PARAMS']['assignmentid'];
	  $sectionid=$beans[0]['PARAMS']['sectionid'];
	  $sectionorder=(array_key_exists('sectionorder', $beans[0]['PARAMS']))?$beans[0]['PARAMS']['sectionorder']:-1; //Albert
	  $itemorder=(array_key_exists('itemorder', $beans[0]['PARAMS']))?$beans[0]['PARAMS']['itemorder']:-1; //Albert
	  $sectiontime=(array_key_exists('time', $beans[0]['PARAMS']))?$beans[0]['PARAMS']['time']:0; //Albert
	  $responses=$beans[0]['PARAMS']['responses'];
    echo saveSection($assignmentid, $sectionid, $responses, $sectionorder, $itemorder, $sectiontime);
    break;
	case "save_section_teacher":
	  $assignmentid=$beans[0]['PARAMS']['assignmentid'];
	  $sectionid=$beans[0]['PARAMS']['sectionid'];
	  $responses=$beans[0]['PARAMS']['responses'];
	  $scores=(array_key_exists('scores', $beans[0]['PARAMS']))?$beans[0]['PARAMS']['scores']:'';//A
    echo saveSectionTeacher($assignmentid, $sectionid, $responses, $scores);//A
    break;
	default:
		echo '<?xml version="1.0" encoding="UTF-8"?'.'>';
		echo '<bean id="'.$beans[0]['ID'].'">';
		echo ' <param name="error" value="'.ERROR_BEAN_NOT_DEFINED.'"/>';
		echo '</bean>';
}


function getSections($assignmentid){
  global $CFG;
  
  if (!existsAssignment($assignmentid)){
    $error=ERROR_ASSIGNMENTID_DOES_NOT_EXIST;
  }
  $response ='';//A
  //A $response ='<?xml version="1.0" encoding="UTF-8"?'.'>';
  //A $response.='<bean id="get_sections" assignmentid="'.$assignmentid.'" '.(isset($error)?'error="'.$error.'"':"").'   >';
  $time="00:00:00";//Albert
	
  if (!isset($error)){
    if($qv = get_record_sql("SELECT q.id as qvid, q.maxdeliver, q.showcorrection
                             FROM {$CFG->prefix}qv q, {$CFG->prefix}qv_assignments a 
                             WHERE q.id=a.qvid AND a.id=$assignmentid")){
		
  		if ($qv_sections=get_records('qv_sections', 'assignmentid', $assignmentid)){
  			$maxdeliver=$qv->maxdeliver;
  			$showcorrection=$qv->showcorrection;
  			foreach($qv_sections as $qv_section){
				$time = addTime($time, $qv_section->time); //Albert
  				$response.="<section ";
  				$response.=" id=\"$qv_section->sectionid\" ";
  				$response.=" showcorrection=\"$showcorrection\"";
  				$response.=" maxdeliver=\"$maxdeliver\"";
  				$response.=" attempts=\"$qv_section->attempts\"";
  				$response.=" scores=\"$qv_section->scores\"";
  				$response.=" pending_scores=\"$qv_section->pending_scores\"";//A
  				$response.=" state=\"$qv_section->state\"";
  				$response.=" time=\"$qv_section->time\"";//Albert
  				$response.="/>";
  			}
  		}	
    }
  }
  //A $response.='</bean>';
  
  $responseHeader ='<?xml version="1.0" encoding="UTF-8"?'.'>';
  $responseHeader.='<bean id="get_sections" assignmentid="'.$assignmentid.'" time="'.$time.'" '.(isset($error)?'error="'.$error.'"':"").'   >';
  $response=$responseHeader.$response;//A
  $response.='</bean>';//A
	
  return $response;
}

function getSection($assignmentid, $sectionid){
  global $CFG;
  if (!existsAssignment($assignmentid)){
    $error=ERROR_ASSIGNMENTID_DOES_NOT_EXIST;
  }else{
    if ($qv_section=get_record('qv_sections', 'assignmentid', $assignmentid, 'sectionid', $sectionid)){
  		$responses = $qv_section->responses;
  		$scores = $qv_section->scores;
  		$pending_scores = $qv_section->pending_scores;//A
  		$attempts = $qv_section->attempts;
  		$state = $qv_section->state;
  		$time = $qv_section->time;//Albert
  	}else{
  	 $responses='';
  	 $scores='';
	 $pending_scores = '';//A
  	 $attempts = 0;
  	 $state = -1;
	 $time = "00:00:00";//Albert
    }
  	
    if($qv = get_record_sql("SELECT q.id as qvid, q.maxdeliver, q.showcorrection
  	                         FROM {$CFG->prefix}qv q, {$CFG->prefix}qv_assignments a 
                             WHERE q.id=a.qvid AND a.id=$assignmentid")){
          $qvid=$qv->qvid;
          $maxdeliver=$qv->maxdeliver;
          $showcorrection=$qv->showcorrection;
  	}  
  }

  	
  $response ='<?xml version="1.0" encoding="UTF-8"?'.'>';
  $response.='<bean id="get_section" assignmentid="'.$assignmentid.'">';
  $response.=" <section ";
  $response.="  id=\"$sectionid\" ";
  if (isset($error)) $response.=" error=\"$error\" ";
  $response.="  showcorrection=\"$showcorrection\"";
  $response.="  maxdeliver=\"$maxdeliver\"";
  $response.="  attempts=\"$attempts\"";
  $response.="  state=\"$state\"";
  $response.="  time=\"$time\"";//Albert
  $response.=" >";
  $response.="  <responses><![CDATA[$responses]]></responses>";
  $response.="  <scores><![CDATA[$scores]]></scores>";
  $response.="  <pending_scores><![CDATA[$pending_scores]]></pending_scores>";//A
  $response.=" </section>";	  
  $response.='</bean>';
  return $response;
}

function existsAssignment($assignmentid){
  $qv_assignment=get_record('qv_assignments', 'id', $assignmentid);
  return ($qv_assignment);
}

function checkMaxDeliverNotExceeded($qv_section){
  global $CFG;
  $not_exceeded=true;
	//Check max deliver < current attempts
  if($qv = get_record_sql("SELECT q.maxdeliver, q.showcorrection
                       	   FROM {$CFG->prefix}qv q, {$CFG->prefix}qv_assignments a  
                           WHERE q.id=a.qvid AND a.id=$qv_section->assignmentid")){
    $not_exceeded=($qv->maxdeliver<0 || $qv_section->attempts < $qv->maxdeliver);
  }
  return $not_exceeded;
}

function saveSection($assignmentid, $sectionid, $responses, $sectionOrder=-1, $itemOrder=-1, $sectiontime){ //Albert
  global $CFG;
  $qvAssignment = existsAssignment($assignmentid);//ALLR
  //ALLR if (!$existsAssignment($assignmentid)){
  if (!$qvAssignment){
    $error=ERROR_ASSIGNMENTID_DOES_NOT_EXIST;
  }else{
    $modifiedAssign = false;
    if($sectionOrder>=0){ //Establishing sectionOrder
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
	if (!update_record("qv_assignments", $qvAssignment)){
	  $error=ERROR_DB_INSERT;
	}
    }
 
    if (!$qv_section=get_record('qv_sections', 'assignmentid', $assignmentid, 'sectionid', $sectionid)){
  		// Insert section
  		$qv_section->assignmentid=$assignmentid;
  		$qv_section->sectionid=$sectionid;
  		$qv_section->responses=$responses;
  		$qv_section->state=0;
		$qv_section->time=$sectiontime; 
  		if (!insert_record("qv_sections", $qv_section)){
  		  $error=ERROR_DB_INSERT;
      }
  	} else{
      if(checkMaxDeliverNotExceeded($qv_section)){  	
    		//Update section
    		$qv_section->responses=$responses;
    		$qv_section->state=0;
		$qv_section->pending_scores=$qv_section->scores;//A
		$qv_section->time=addTime($qv_section->time, $sectiontime); 

    	if (!update_record("qv_sections", $qv_section)){
    		  $error=ERROR_DB_UPDATE;
        }
       }else{
		 $error=ERROR_MAXDELIVER_EXCEEDED;        		
       }
  	}  
  }
  	
	$response ='<?xml version="1.0" encoding="UTF-8"?'.'>';
	$response.='<bean id="save_section" assignmentid="'.$assignmentid.'" >';
    $response.=" <section id=\"$sectionid\" ";
    if (isset($error)) $response.=" error=\"$error\" ";
    $response.=" state=\"$qv_section->state\" />";	
	$response.='</bean>';
	return $response;
}

function saveSectionTeacher($assignmentid, $sectionid, $responses, $scores){ //Albert //A
  global $CFG;
  $qvAssignment = existsAssignment($assignmentid);//ALLR
  if (!$qvAssignment){
    $error=ERROR_ASSIGNMENTID_DOES_NOT_EXIST;
  }else{
    if (!$qv_section=get_record('qv_sections', 'assignmentid', $assignmentid, 'sectionid', $sectionid)){
  		// Insert section
  		$qv_section->assignmentid=$assignmentid;
  		$qv_section->sectionid=$sectionid;
  		$qv_section->responses=$responses;
  		$qv_section->pending_scores=$scores;//A
  		//$qv_section->state=0;
		$qv_section->time="00:00:00"; 
  		if (!insert_record("qv_sections", $qv_section)){
  		  $error=ERROR_DB_INSERT;
      	}
  	} else{
        //Update section
    	$qv_section->responses=$responses;
		$qv_section->pending_scores=$scores;//A
    	//$qv_section->state=0;

    	if (!update_record("qv_sections", $qv_section)){
    	  $error=ERROR_DB_UPDATE;
        }else{
          qv_update_gradebook($qv_section);        	
        }
     	  
  	}  
  }
  	
	$response ='<?xml version="1.0" encoding="UTF-8"?'.'>';
	$response.='<bean id="save_section_teacher" assignmentid="'.$assignmentid.'" >';
    $response.=" <section id=\"$sectionid\" ";
    if (isset($error)) $response.=" error=\"$error\" ";
    $response.=" state=\"$qv_section->state\" />";	
	$response.='</bean>';
	return $response;
}

function deliverSection($assignmentid, $sectionid, $responses, $scores, $sectionOrder=-1, $itemOrder=-1, $sectiontime){ //Albert
  global $CFG;
  $qvAssignment = existsAssignment($assignmentid);//ALLR
  //ALLR if (!$existsAssignment($assignmentid)){
  if (!$qvAssignment){
    $error=ERROR_ASSIGNMENTID_DOES_NOT_EXIST;
  }else{
    $modifiedAssign = false;
    if($sectionOrder>=0){ //Establishing sectionOrder
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
	if (!update_record("qv_assignments", $qvAssignment)){
	  $error=ERROR_DB_INSERT;
	}
    }

    if (!$qv_section=get_record('qv_sections', 'assignmentid', $assignmentid, 'sectionid', $sectionid)){
  		// Insert section
  		$qv_section->assignmentid=$assignmentid;
  		$qv_section->sectionid=$sectionid;
  		$qv_section->responses=$responses;
  		$qv_section->scores=$scores;
		$qv_section->pending_scores=$scores;//A
  		$qv_section->attempts=1;
  		$qv_section->state=1;		
  		$qv_section->time=$sectiontime;//Albert
		if (!insert_record("qv_sections", $qv_section)){
  		  $error=ERROR_DB_INSERT;
        }else{
          qv_update_gradebook($qv_section);
        }
  	} else{
  		//Check max deliver < current attempts
      if(checkMaxDeliverNotExceeded($qv_section)){
  				//Update section
  				$qv_section->responses=$responses;
  				$qv_section->scores=$scores;
				$qv_section->pending_scores=$scores;
  				$qv_section->attempts=$qv_section->attempts+1;
  				$qv_section->state=1;
				$qv_section->time=addTime($qv_section->time, $sectiontime);
  				if (!update_record("qv_sections", $qv_section)){
  				  $error=ERROR_DB_UPDATE;
                }else{
                	qv_update_gradebook($qv_section);
                }
     	}else{
				$error=ERROR_MAXDELIVER_EXCEEDED;        		
     	}
  	}  
  }
  
    if($qv = get_record_sql("SELECT q.id as qvid, q.maxdeliver, q.showcorrection
  	                         FROM {$CFG->prefix}qv q, {$CFG->prefix}qv_assignments a 
                             WHERE q.id=a.qvid AND a.id=$assignmentid")){
          $qvid=$qv->qvid;
          $maxdeliver=$qv->maxdeliver;
          $showcorrection=$qv->showcorrection;
  	}  
  

  
	$response ='<?xml version="1.0" encoding="UTF-8"?'.'>';
	$response.='<bean id="deliver_section" assignmentid="'.$assignmentid.'" >';
    $response.=" <section id=\"$sectionid\" ";
    if (isset($error)) $response.=" error=\"$error\" ";
    $response.=" attempts=\"$qv_section->attempts\" ";
    $response.=" maxdeliver=\"$qv->maxdeliver\" ";
    $response.=" showcorrection=\"$qv->showcorrection\" ";
    $response.=" time=\"$qv_section->time\" ";//Albert
    $response.=" state=\"$qv_section->state\" />";
	$response.='</bean>';
	return $response;
}

function correctSection($assignmentid, $sectionid, $responses, $scores){
  if (!existsAssignment($assignmentid)){
    $error=ERROR_ASSIGNMENTID_DOES_NOT_EXIST;
  }else{
    if (!$qv_section=get_record('qv_sections', 'assignmentid', $assignmentid, 'sectionid', $sectionid)){
  		// Insert section
  		$qv_section->assignmentid=$assignmentid;
  		$qv_section->sectionid=$sectionid;
		if ($responses=''){ //Albert
  			$qv_section->responses="";
		} else {
			$qv_section->responses=$responses;
		}
		if ($scores=''){//Albert
	  		$qv_section->scores="";
			$qv_section->pending_scores="";//A
  		} else {
			$qv_section->scores=$scores;
			$qv_section->pending_scores=$scores;//A
		}
		$qv_section->attempts=0;
  		$qv_section->state=2;		
  		if (!insert_record("qv_sections", $qv_section)){
  		  $error=ERROR_DB_UPDATE;
      	}
  	} else{
  		//Update section
  		$qv_section->state=2;
		if ($responses!=''){ //Albert
			$qv_section->responses=$responses;
		}
		if ($scores!=''){//Albert
			$qv_section->scores=$scores;
			$qv_section->pending_scores=$scores;//A
		}
  		if (!update_record("qv_sections", $qv_section)){
  		  $error=ERROR_DB_UPDATE;
      	}else{
          qv_update_gradebook($qv_section);      		
      	}
  	}
  }
  	
	$response ='<?xml version="1.0" encoding="UTF-8"?'.'>';
	$response.='<bean id="correct_section" assignmentid="'.$assignmentid.'" >';
    $response.=" <section id=\"$sectionid\" ";
    if (isset($error)) $response.=" error=\"$error\" ";
    $response.=" state=\"$qv_section->state\" />";
	$response.='</bean>';
	return $response;
}

function saveTime($assignmentid, $sectionid, $sectiontime){
	if (!existsAssignment($assignmentid)){
    		$error=ERROR_ASSIGNMENTID_DOES_NOT_EXIST;
  	}else{
    		if (!$qv_section=get_record('qv_sections', 'assignmentid', $assignmentid, 'sectionid', $sectionid)){
  			// Insert section
  			$qv_section->assignmentid=$assignmentid;
  			$qv_section->sectionid=$sectionid;
  			$qv_section->responses="";
  			$qv_section->scores="";
  			$qv_section->attempts=0;
  			$qv_section->state=0;
			$qv_section->time=$sectiontime;		
  			if (!insert_record("qv_sections", $qv_section)){
  		  		$error=ERROR_DB_UPDATE;
      		}
  		} else{
  			//Update section
  			$qv_section->time=addTime($qv_section->time, $sectiontime);
	  		if (!update_record("qv_sections", $qv_section)){
	  		  $error=ERROR_DB_UPDATE;
      		}
  		}
  	}

  // Response		
	$response ='<?xml version="1.0" encoding="UTF-8"?'.'>';
	$response.='<bean id="save_time" assignmentid="'.$assignmentid.'" >';
  	$response.=" <section id=\"$sectionid\" ";
  	if (isset($error)) $response.=" error=\"$error\" ";
  	$response.=" time=\"$qv_section->time\" />";
	$response.='</bean>';
	return $response;
}

function addMessage($assignmentid, $sectionid, $itemid, $userid, $message){
  global $USER;

  if (!existsAssignment($assignmentid)){
    $error=ERROR_ASSIGNMENTID_DOES_NOT_EXIST;
  }else if ($message!=''){
    	if (!$qv_section=get_record('qv_sections', 'assignmentid', $assignmentid, 'sectionid', $sectionid)){
  		// Insert section
  		$qv_section->assignmentid=$assignmentid;
  		$qv_section->sectionid=$sectionid;
  		$qv_section->responses="";
  		if (!insert_record("qv_sections", $qv_section)){
  		  $error=ERROR_DB_INSERT;
      	}else{
    			$qv_section->id=mysql_insert_id();
      	}
  	}
  	if (!isset($error)){
    	// Insert message
    	$qv_message->sid=$qv_section->id;
    	$qv_message->itemid=$itemid;
    	$qv_message->userid=($userid!=''?$userid:$USER->id);
    	$qv_message->created=time();
    	$qv_message->message=$message;
    	insert_record("qv_messages", $qv_message);
    	$msgid=mysql_insert_id();
    	if ($msgid<=0) $error=ERROR_DB_INSERT;
		else{
			// Mark message read for author user
	  		$qv_message_read = readMessage($qv_section);		
		}
    }
  }
  
  // Response		
	$response ='<?xml version="1.0" encoding="UTF-8"?'.'>'."\n";
	$response.='<bean id="add_message" assignmentid="'.$assignmentid.'" sectionid="'.$sectionid.'" itemid="'.$itemid.'" userid="'.$userid.'" >';
	$response.="<message id=\"$msgid\" ";
  if (isset($error)) $response.=" error=\"$error\" ";
	$response.=" />";

	$response.='</bean>';
	return $response;
}

function getMessages($assignmentid, $sectionid){
  global $USER;
  
  if (!existsAssignment($assignmentid)){
    $error=ERROR_ASSIGNMENTID_DOES_NOT_EXIST;
  }else{
  	if ($qv_section=get_record('qv_sections', 'assignmentid', $assignmentid, 'sectionid', $sectionid)){
  		$qv_message_read = readMessage($qv_section);
  	}
  }

	$response ='<?xml version="1.0" encoding="UTF-8"?'.'>';
	$response.="\n".'<bean id="get_messages" assignmentid="'.$assignmentid.'" sectionid="'.$sectionid.'" userid="'.$USER->id.'" ';
  if (isset($error)) {
    $response.=" error=\"$error\" >";
  }else{
	  $response.=" >";		
		// Get messages    	
    if ($qv_section && $qv_messages=get_records('qv_messages', 'sid', $qv_section->id, "created")){
			foreach ($qv_messages as $qv_message) {
				$response.="\n<message id=\"$qv_message->id\" ";
				$response.=" itemid=\"$qv_message->itemid\" ";
				$response.=" userid=\"$qv_message->userid\" ";
				if ($qv_user=get_record('user', 'id', $qv_message->userid)){
					$response.=" username=\"$qv_user->username\" ";
				}
				$response.=">\n";
				$response.="<![CDATA[".$qv_message->message."]]>\n";
				$response.="</message>\n";
			}
		}
	}
	$response.='</bean>';
	return $response;
}

function readMessage($qv_section){
	global $USER;
	
	// Mark section as read by userid 
	if ($qv_message_read=get_record('qv_messages_read', 'sid', $qv_section->id, 'userid', $USER->id)){
		$qv_message_read->timereaded=time();
		if (!update_record("qv_messages_read", $qv_message_read)){
		 $error=ERROR_DB_UPDATE;
    	}
	}else{
		$qv_message_read->sid=$qv_section->id;
		$qv_message_read->userid=$USER->id;
		$qv_message_read->timereaded=time();
		if (!insert_record("qv_messages_read", $qv_message_read)){ 
		 $error=ERROR_DB_INSERT;
    	}
	}
	return $qv_message_read;
}

?>
