<?php

/**
 * Zikula Application Framework
 *
 * @package	XTEC advMailer
 * @author	Francesc Bassas i Bullich
 * @license	GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 */

/**
 * API function to send email message
 * @author Francesc Bassas i Bullich
 * @param string args['fromname'] name of the sender
 * @param string args['fromaddress'] address of the sender
 * @param string args['toname '] name to the recipient
 * @param string args['toaddress'] the address of the recipient
 * @param string args['replytoname '] name to reply to
 * @param string args['replytoaddress'] address to reply to
 * @param string args['subject'] message subject
 * @param string args['contenttype '] optional contenttype of the mail (default config)
 * @param string args['charset'] optional charset of the mail (default config)
 * @param string args['encoding'] optional mail encoding (default config)
 * @param string args['body'] message body
 * @param array  args['cc'] addresses to add to the cc list
 * @param array  args['bcc'] addresses to add to the bcc list
 * @param array/string args['headers'] custom headers to add
 * @param int args['html'] HTML flag
 * @param array args['attachments'] array of either absolute filenames to attach to the mail or array of arays in format array($string,$filename,$encoding,$type)
 * @param array args['stringattachments'] array of arrays to treat as attachments, format array($string,$filename,$encoding,$type)
 * @param array args['embeddedimages'] array of absolute filenames to image files to embed in the mail
 * @return bool true if successful, false otherwise
 */
function advMailer_userapi_sendmessage($args)
{
    // include php mailsender class file
    if (file_exists($file = "modules/advMailer/pnincludes/mailsender.class.php")) {
        Loader::requireOnce($file);
    } else {
        return false;
    }

    // include php message class file
    if (file_exists($file = "modules/advMailer/pnincludes/message.class.php")) {
		Loader::requireOnce($file);
    } else {
        return false;
    }
	
    $enabled = pnModGetVar('advMailer','enabled');
    
    if ($enabled == 0) {
    	// Add processed flag
        $args['processed'] = 1;
        $result = pnModAPIFunc('Mailer', 'user', 'sendmessage', $args);
        return $result;
    }
    
    $idApp = pnModGetVar('advMailer','idApp');
    $replyAddress = pnModGetVar('advMailer','replyAddress');
    $sender = pnModGetVar('advMailer','sender');
    //$environment = pnModGetVar('advMailer','environment');
    $log = pnModGetVar('advMailer','log');
    $debug = pnModGetVar('advMailer','debug');
	$logpath = pnModGetVar('advMailer','logpath');

    // @aginard: get environment info from html/config/env-config.php file, so
    // it's automatically filled with proper value
    global $agora;
    $environment = $agora['server']['enviroment'];


    $mail = new mailsender($idApp,$replyAddress,$sender,$environment,$log,$debug,$logpath);
    
    // add body content type
    $contenttypes = pnModFunc('advMailer', 'admin', 'getContentTypes');
    
    // set HTML mail if required
    if (isset($args['html']) && is_bool($args['html'])) {
    	if ($args['html']) { $bodyType = 'text/html'; }
        else { $bodyType = TEXTPLAIN; }
    } else {
        $bodyType = $contenttypes[pnModGetVar('advMailer', 'contenttype')];
    }
    
    $message = new message($bodyType, $log, $debug, $logpath);
        
    // add any to addresses
    if (is_array($args['toaddress'])) {
        foreach ($args['toaddress'] as $to) {
        	$message->set_to($to);
        }
    } else {
        // $toaddress is not an array -> old logic
        // process multiple names entered in a single field separated by commas (#262)
        foreach (explode(',', $args['toaddress']) as $to) {
        	$message->set_to($to);
        }
    }
    
    // add any cc addresses
    if (isset($args['cc']) && is_array($args['cc'])) {
        foreach ($args['cc'] as $cc) {
        	$message->set_cc($cc['address']);
        }
    }

    // add any bcc addresses
    if (isset($args['bcc']) && is_array($args['bcc'])) {
        foreach ($args['bcc'] as $bcc) {
           $message->set_bcc($bcc['address']);
        }
    }

    // add message subject and body
    $subject = $args['subject'];
    $message->set_subject($subject);
    $body = $args['body'];
    $message->set_bodyContent($body);
    
    // add attachments
    if (isset($args['attachments']) && !empty($args['attachments'])) {
        foreach($args['attachments'] as $attachment) {
            if (is_array($attachment)) {
                if (count($attachment) != 4) {
                    // skip invalid arrays
                    continue;
                }
                $message->set_attachByPathOnAppServer($attachment[1],$attachment[0]);
            } else {
            	$message->set_attachByPathOnAppServer(basename($attachment[0]),$attachment[0]);
            }
        }
    }
    
    // add string attachments.
    if (isset($args['stringattachments']) && !empty($args['stringattachments'])) {
        foreach($args['stringattachments'] as $attachment) {
            if (is_array($attachment) && count($attachment) == 4) {
            	$message->set_attachByContent($attachment[1],$attachment[0],$attachment[3]);
            }
        }
    }
    
    // add embedded images
    if (isset($args['embeddedimages']) && !empty($args['embeddedimages'])) {
        foreach($args['embeddedimages'] as $embeddedimage) {
			$message->set_attachByPathOnAppServer(basename($embeddedimage),$embeddedimage);
        }
    }
    
	//add message to mailsender
	if (!$mail->add($message)) {
        // message not added
        LogUtil::log(__f('Error! A problem occurred while adding an e-mail message from \'%1$s\' (%2$s) to (%3$s) (%4$s) with the subject line \'%5$s\': %6$s', $args));
        return LogUtil::registerError(__('Error! An unidentified problem occurred while adding e-mail message.'));
	}
    
    // send message
    if (!$mail->send_mail()) {
        // message not send
        LogUtil::log(__f('Error! A problem occurred while sending an e-mail message from \'%1$s\' (%2$s) to (%3$s) (%4$s) with the subject line \'%5$s\': %6$s', $args));
        return LogUtil::registerError(__('Error! An unidentified problem occurred while sending e-mail message.'));
    }
    return true; // message sent    
}