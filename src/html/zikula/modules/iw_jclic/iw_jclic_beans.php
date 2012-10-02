<?PHP // $Id: beans.php,v 1.5 2008/11/03 14:39:45 sarjona Exp $
header('Content-type: text/xml');

/////////////////////////////////////////////////////////////////////////////////
///  JClic Services to save activities
///  Author: Sara Arjona Tellez (sara.arjona@gmail.com)
/////////////////////////////////////////////////////////////////////////////////


if($GLOBALS["HTTP_RAW_POST_DATA"]){
    $my_xml = $GLOBALS["HTTP_RAW_POST_DATA"];
} else {
  $my_xml = $HTTP_RAW_POST_DATA;
}

// init zikula engine
include 'includes/pnAPI.php';

pnInit(PN_CORE_CONFIG |
		PN_CORE_ADODB |
		PN_CORE_DB |
		PN_CORE_OBJECTLAYER |
		PN_CORE_TABLES |
		PN_CORE_THEME);

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
}

$xml_parser = xml_parser_create('');
xml_set_element_handler($xml_parser, "startElement", "endElement");
xml_set_character_data_handler($xml_parser, "characterData");
xml_parse($xml_parser, $my_xml);
xml_parser_free($xml_parser);

switch($beans[0]['ID']){
	case "get_properties":
		echo '<?xml version="1.0" encoding="UTF-8"?'.'>';
		echo '<bean id="get_properties">';

		$settings = pnModAPIFunc('iw_jclic', 'user', 'getSettings');
		foreach($settings as $setting){
			echo ' <param name="'.$setting['setting_key'].'" value="'.$setting['setting_value'].'"/>';
		}

		echo '</bean>';
	    break;
	case "add session":
		$session_datetime = round($beans[0]['PARAMS']['time']/1000);
		$session_id = $beans[0]['PARAMS']['user'].'_'.$beans[0]['PARAMS']['time'];
		$key = $beans[0]['PARAMS']['key'];

		$items = array('jclicid' => $key,
				'user_id' => $beans[0]['PARAMS']['user'],
				'session_datetime' => $session_datetime,
				'session_id' => $session_id,
				'project_name' => $beans[0]['PARAMS']['project']);


		$createdSession = pnModAPIFunc('iw_jclic', 'user', 'createSession', array('items' => $items));
		//create a user session
		if($createdSession && !pnModAPIFunc('iw_jclic', 'user', 'getUserSession', array('user_id' => $beans[0]['PARAMS']['user'],
													'key' => $key))){

			pnModAPIFunc('iw_jclic', 'user', 'createUser', array('user_id' => $beans[0]['PARAMS']['user'],
										'key' => $key));
		}		

		echo '<?xml version="1.0" encoding="UTF-8"?'.'>';
		echo '<bean id="add session">';
		echo ' <param name="session" value="'.$session_id.'"/>';
		echo '</bean>';
	    break;
	case "multiple":
		foreach ($beans as $bean){
			if ($bean['ID']=='add activity'){
				$activity_solved = $bean['ACTIVITY']['solved']=='true'?1:0;
				$qualification = getPrecision($bean['ACTIVITY']['minActions'], $bean['ACTIVITY']['actions'], ''.$bean['ACTIVITY']['solved'], $bean['ACTIVITY']['score']);

				$items = array('session_id' => $bean['PARAMS']['session'],
							'activity_id' => $bean['PARAMS']['num'],
							'activity_name' => utf8_decode($bean['ACTIVITY']['name']),
							'num_actions' => $bean['ACTIVITY']['actions'],
							'activity_solved' => $activity_solved,
							'score' => $bean['ACTIVITY']['score'],
							'qualification' => $qualification,
							'total_time' => $bean['ACTIVITY']['time']);


				$createdSession = pnModAPIFunc('iw_jclic', 'user', 'addActivity', array('items' => $items));
			}			
		}
		echo '<?xml version="1.0" encoding="UTF-8"?'.'>';
		echo '<bean id="add activity">';
		echo ' <param name="activity" value="'.$bean['PARAMS']['num'].'"/>';
		echo '</bean>';
		break;
	default:
		echo '<?xml version="1.0" encoding="UTF-8"?'.'>';
		echo '<bean id="'.$beans[0]['ID'].'">';
		echo ' <param name="error" value="bean not defined"/>';
		echo '</bean>';
}


function getPrecision($minActions, $numActions, $solved, $score){
	$precision = 0;
	if ($minActions>0 && $numActions>0){
		if ($solved=='true'){
			if ($numActions<$minActions) $precision=100;
			else $precision=($minActions*100)/$numActions;
		}else{
			$precision=100*($score*$score)/($minActions*$numActions);
		}
	}
	return $precision;
}


pnShutDown();
?>
