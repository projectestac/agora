<?php
//-------------------------------------------------------------------------------------
/**
 * Downloads
 *
 * Purpose of file:  eMail notification
 *
 * @package      Downloads
 * @version      2.4
 * @author       Sascha Jost
 * @link         http://www.cmods-dev.de
 * @copyright    Copyright (C) 2005 by Sascha Jost
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */
 // -----------------------------------------------------------------------------------

include_once('modules/Downloads/common.php');

/**
 *
 * eMail notification
 *
 * @author       Lindbergh
 * @version      1.0
 * @param        
 * @return      
 */
function Downloads_notifyapi_send_notification($args)
{
  	$dom = ZLanguage::getModuleDomain('Downloads');
	extract($args);
	unset($args);
  	
  	// Argument check
	if ((!isset($title)) || (is_numeric($title)) || (!isset($cid)) || (!is_numeric($cid)) || (!isset($lid)) || (!is_numeric($lid)))
    {
        return errorpage(__FILE__,__LINE__, __('Wrong or missing argument passed to the function', $dom) );
    }
    
    // get some mod info
  	$modinfo = pnModGetInfo(pnModGetIDFromName(pnModGetName()));
  	$sitename  = pnConfigGetVar('sitename');
  	$adminmail = pnConfigGetVar('adminmail');
  	$to_mail   = pnModGetVar('downloads', 'notifymail');
  	
  	$catinfo = pnModAPIFunc('Downloads','user','category_info',array('cid' => $cid));
  	
	$message = __('Notification', $dom) . ' '. $sitename . "\n"
            . __('A new file is available. Please release it.', $dom) . "\n"
            .__('File name:', $dom). $title .($id)."\n"
			.__('Category:', $dom). $catinfo['title'] . "\n"
            . "---------------------------------------------------------------------\n\n"
            . "\n"
            . _DL_NOTIFY_URL . ' ' . pnGetBaseURL();

    $args = array( 'fromname'    => $sitename,
                   'fromaddress' => $adminmail,
                   'toname'      => $sitename,
				   'toaddress'   => $to_mail,
                   'subject'     => __('New File', $dom),
                   'body'        => $message,
                   'headers'     => array('X-FileID: ' . md5($lid),
                                          'X-Mailer: Downloads v' . $modinfo['version'],
                                          'X-CategoryID: ' . $cid));

    pnModAPIFunc('Mailer', 'user', 'sendmessage', $args);

	if (pnModGetVar('downloads', 'inform_user') == 'yes')
	{
        	$message = 	__('Notification', $dom) . ' '. $sitename . "\n"
            		 	. __('Thanks for your submission.', $dom) . "\n"
            		 	.__('File name:', $dom). $title .($id)."\n"
						.__('Category:', $dom). $catinfo['title'] . "\n"
            			. "---------------------------------------------------------------------\n\n"
            			. "\n"
            			. __('Page link', $dom) . ' ' . pnGetBaseURL();

		    $args = array( 'fromname'    => $sitename,
		                   'fromaddress' => $adminmail,
		                   'toname'      => pnUserGetVar('name'),
						   'toaddress'   => pnUserGetVar('email'),
		                   'subject'     => __('New File', $dom),
		                   'body'        => $message,
		                   'headers'     => array('X-FileID: ' . md5($lid),
		                                          'X-Mailer: Downloads v' . $modinfo['version'],
		                                          'X-CategoryID: ' . $cid));
		                                          
		    pnModAPIFunc('Mailer', 'user', 'sendmessage', $args);
 	}
    return;
   
}


?>