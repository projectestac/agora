<?php
/**
 * Show the chat room
 * @author		Fèlix Casanellas (fcasanel@xtec.cat)
 * @return		Chat room interface
 */
function iw_chat_user_main()
{
	require_once "modules/iw_chat/includes/phpFreeChat/src/phpfreechat.class.php";
	
	$dom = ZLanguage::getModuleDomain('iw_chat');
	// security check
	if (!SecurityUtil::checkPermission('iw_chat::', "::", ACCESS_READ) || !pnUserLoggedIn()) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	$uid = pnUserGetVar('uid'); 
	$rooms = pnModAPIFunc('iw_chat','user','getRooms', array('uid' => $uid));
	$room_array = array();
	$channels = array();
	
	foreach ($rooms as $room){
		 $room_prop = pnModAPIFunc('iw_chat', 'user', 'getAllRooms',
                                    array('rid' => $room));
		 $room_cell['name'] = $room_prop[0]['room_name'];
		 $room_cell['desc'] = str_replace("'", "\'", $room_prop[0]['room_desc']);
		 $room_cell['id'] = $room_prop[0]['room_name'].'_'.$room_prop[0]['rid'];
		 $channels[] = $room_cell['id'];
		 $room_array[] = $room_cell;
	}
			
    $currLang = ZLanguage::getLanguageCode();
    $langs = array();
    $langs['ca'] = 'ca_CAT';
    $langs['en'] = 'en_US';
    $langs['es'] = 'es_ES';
   
   
    $params = array();
    $params['serverid']              = md5('iw_chat');
    $params['language']              = $langs[$currLang];
    if (defined('_CHARSET')) 
      $params['output_encoding']     = _CHARSET;

    $params['nick']                  = pnUserGetVar('uname');
    $params['max_nick_len']          = (int)25;
    $params['frozen_nick']           = true;
    $params['nickmeta']              = array();
    $params['nickmeta_private']      = array('ip');
    $params['nickmeta_key_to_hide']  = array();

    $params["isadmin"] = (SecurityUtil::checkPermission('iw_chat::', "::", ACCESS_ADMIN)) ? true : false;

    $params['admins']                = array();        	
    $params['firstisadmin']          = false;        	

    $params["title"]    = __('Chat room', $dom);      	
    //$params["channels"]        =  (count($channels) != '0') ? array($channels['0']) : array();
    $params["channels"]        = array();
	$params["frozen_channels"] = $channels;
	
    $params['max_channels']          = 10;
    $params['privmsg']               = array();
    $params['max_privmsg']           = 5;

    $params['refresh_delay']         = pnModGetVar('iw_chat', 'delay');

    $params['refresh_delay_steps']   = array(2000,20000,3000,60000);
    $params['timeout']               = 60000;
    $params['islocked']              = false;
    $params['lockurl']               = 'http://www.phpfreechat.net';
    $params['skip_proxies']          = array();
    $params['post_proxies']          = array();
    $params['pre_proxies']           = array();
    $params['proxies_cfg']           = array();
    $params['proxies_path']          = '';
    $params['proxies_path_default']  = dirname(__FILE__).'/includes/phpFreeChat/src/proxies';
    $params['cmd_path']              = '';
    $params['cmd_path_default']      = dirname(__FILE__).'/includes/phpFreeChat/src/commands';

    $params['max_text_len']          = pnModGetVar('iw_chat', 'max_len');
    $params['max_msg']               = 20;
    $params['max_displayed_lines']   = 150;
    $params['quit_on_closedwindow']  = false;
    $params['focus_on_connect']      = true;
    $params['connect_at_startup']    = true;
    $params['start_minimized']       = false;
    $params['height']                = '440px';
    $params['shownotice']            = 0;
    $params['nickmarker']            = true;
    $params['clock']                 = true;
    $params['startwithsound']        = (pnModGetVar('iw_chat', 'sound') == '1') ? true : false;
    $params['openlinknewwindow']     = true;
    $params['notify_window']         = true;
    $params['short_url']             = true;
    $params['short_url_width']       = 40;
    $params['display_ping']          = true;
    $params['display_pfc_logo']      = true;
    $params['displaytabimage']       = true;
    $params['displaytabclosebutton'] = true;
    $params['showwhosonline']        = true;
    $params['showsmileys']           = true;
    $params['btn_sh_whosonline']     = true;
    $params['btn_sh_smileys']        = true;
    $params['bbcode_colorlist']      = array ('#FFFFFF','#000000','#000055','#008000','#FF0000','#800000','#800080','#FF5500','#FFFF00','#00FF00','#008080','#00FFFF','#0000FF','#FF00FF','#7F7F7F','#D2D2D2');
    $params['nickname_colorlist']    = array ('#CCCCCC','#000000','#3636B2','#2A8C2A','#C33B3B','#C73232','#80267F','#66361F','#D9A641','#3DCC3D','#1A5555','#2F8C74','#4545E6','#B037B0','#4C4C4C','#959595');
    $params['btn_sh_whosonline']     = true;
    $params['btn_sh_whosonline']     = true;
    $params['btn_sh_whosonline']     = true;
    $params['btn_sh_whosonline']     = true;

	$params['theme']             	=  pnModGetVar('iw_chat', 'theme');

    $params['theme_path']            = '' ;
    $params['theme_url']             = '';
    $params['theme_default_path']    = '';

    $params["theme_default_url"]     = "modules/iw_chat/includes/phpFreeChat/themes";

    $params["container_type"] = "mysql";
	$params["container_cfg_mysql_host"]     = $GLOBALS['PNConfig']['DBInfo']['default']['dbhost'];        // default value is "localhost"
	$params["container_cfg_mysql_port"]     = 3306;               // default value is 3306
	$params["container_cfg_mysql_database"] = $GLOBALS['PNConfig']['DBInfo']['default']['dbname'];      // default value is "phpfreechat"
	$params["container_cfg_mysql_table"]    = $GLOBALS['PNConfig']['System']['prefix']."_iw_chat_msg";             // default value is "phpfreechat"
	$params["container_cfg_mysql_username"] = $GLOBALS['PNConfig']['DBInfo']['default']['dbuname'];      // default value is "root"
	$params["container_cfg_mysql_password"] = $GLOBALS['PNConfig']['DBInfo']['default']['dbpass']; // default value is ""
    
    
    
    $params['server_script_path']    = '';
	$params["server_script_url"]     = "./index.php?module=iw_chat";


    $params['client_script_path']    = '';
    $params['data_private_path']     = pnModGetVar('iw_main', 'documentRoot').'/'.pnModGetVar('iw_chat', 'private_dir');
    $params['data_public_path']      = "modules/iw_chat/includes/phpFreeChat/data/public";

    $params['data_public_url']       = "modules/iw_chat/includes/phpFreeChat/data/public";

    $params['prototypejs_url']       = '';
    $params['debug']                 = false;
    $params['time_offset']           = 0;
    $params['date_format']           = 'd/m/Y';
    $params['time_format']           = 'H:i:s';
    $params['get_ip_from_xforwardedfor'] = false;
    $params['dyn_params']            = array('isadmin','language');
    // $params['proxies']            = array(); Do not change!!!

	// create output object
    $pnRender = pnRender::getInstance('iw_chat', false);
    if ((!file_exists(pnModGetVar("iw_main","documentRoot")."/".pnModGetVar("iw_chat","private_dir")))
		|| (!is_writable(pnModGetVar("iw_main","documentRoot")."/".pnModGetVar("iw_chat","private_dir")))
		|| (pnModGetVar('iw_chat', 'private_dir')=='')){
			LogUtil::registerError (__('Module is not configured correctly.', $dom));
    }
    else{
        $chat = new phpFreeChat($params);
        $pnRender->assign ('chatBody',  $chat->printChat(true));
        $pnRender->assign ('channels',  $room_array);
    }
    	
    return $pnRender -> fetch('iw_chat_user_main.htm');
}
