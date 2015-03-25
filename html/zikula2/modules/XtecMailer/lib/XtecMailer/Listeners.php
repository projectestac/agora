<?php

/**
 * Copyright Zikula Foundation 2009 - Zikula Application Framework
 *
 * This work is contributed to the Zikula Foundation under one or more
 * Contributor Agreements and licensed to You under the following license:
 *
 * @license GNU/LGPLv3 (or at your option, any later version).
 *
 * Please see the NOTICE file distributed with this source code for further
 * information regarding copyright and licensing.
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

/**
 * Listeners class.
 */
class XtecMailer_Listeners {

    /**
     * Loads the mailsender once
     * @return Mailsender or false on error
     */
    private static function get_mailsender() {
        global $agora, $mailsender;

        // include php mailsender class file
        require_once('modules/XtecMailer/includes/mailer/mailsender.class.php');
        // include php message class file
        require_once('modules/XtecMailer/includes/mailer/message.class.php');

        if (!is_null($mailsender)) {
            return $mailsender;
        }

        $idApp = ModUtil::getVar('XtecMailer', 'idApp');
        $replyAddress = ModUtil::getVar('XtecMailer', 'replyAddress');
        $sender = ModUtil::getVar('XtecMailer', 'sender');
        $log = ModUtil::getVar('XtecMailer', 'log');
        $debug = ModUtil::getVar('XtecMailer', 'debug');
        $logpath = ModUtil::getVar('XtecMailer', 'logpath');

        // Load the environment, if and URL is set, then user the WSDL, if not:
        // @aginard: get environment info from html/config/env-config.php file, so
        // it's automatically filled with proper value
        $wsdl = ModUtil::getVar('XtecMailer', 'environment_url');
        $wsdl = empty($wsdl) ? $agora['server']['enviroment'] : $wsdl;

        try {
            $mailsender = new mailsender($idApp, $replyAddress, $sender, $wsdl, $log, $debug, $logpath);
        } catch (Exception $e) {
            LogUtil::registerError('ERROR: Cannot initialize mailsender, no mail will be sent');
            LogUtil::registerError($e->getMessage());
            LogUtil::registerError('The execution must go on!');
            $mailsender = false;
        }
        return $mailsender;
    }

    /**
     * Checks if the user is member of clients group and if it should be member of it
     * @author Albert Pérez Monfort
     * @return bool true authetication succesful
     */
    public static function sendMail(Zikula_Event $event) {
        $args = $event->getArgs();

        $enabled = ModUtil::getVar('XtecMailer', 'enabled');

        if ($enabled == 0) {
            // Add processed flag
            $args['processed'] = 1;
            $result = ModUtil::apiFunc('Mailer', 'user', 'sendmessage', $args);
            return $result;
        }

        $log = ModUtil::getVar('XtecMailer', 'log');
        $debug = ModUtil::getVar('XtecMailer', 'debug');
        $logpath = ModUtil::getVar('XtecMailer', 'logpath');

        $sender = self::get_mailsender();
        if (!$sender) {
            return false;
        }

        // add body content type
        $contenttypes = ModUtil::func('XtecMailer', 'admin', 'getContentTypes');

        // set HTML mail if required
        if (isset($args['html']) && is_bool($args['html'])) {
            if ($args['html']) {
                $bodyType = TEXTHTML;
            } else {
                $bodyType = TEXTPLAIN;
            }
        } else {
            $bodyType = $contenttypes[ModUtil::getVar('XtecMailer', 'contenttype')];
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
            foreach ($args['attachments'] as $attachment) {
                if (is_array($attachment)) {
                    if (count($attachment) != 4) {
                        // skip invalid arrays
                        continue;
                    }
                    $message->set_attachByPathOnAppServer($attachment[1], $attachment[0]);
                } else {
                    $message->set_attachByPathOnAppServer(basename($attachment[0]), $attachment[0]);
                }
            }
        }

        // add string attachments.
        if (isset($args['stringattachments']) && !empty($args['stringattachments'])) {
            foreach ($args['stringattachments'] as $attachment) {
                if (is_array($attachment) && count($attachment) == 4) {
                    $message->set_attachByContent($attachment[1], $attachment[0], $attachment[3]);
                }
            }
        }

        // add embedded images
        if (isset($args['embeddedimages']) && !empty($args['embeddedimages'])) {
            foreach ($args['embeddedimages'] as $embeddedimage) {
                $message->set_attachByPathOnAppServer(basename($embeddedimage), $embeddedimage);
            }
        }

        //add message to mailsender
        if (!$sender->add($message)) {
            // message not added
            return LogUtil::registerError(__f('Error! A problem occurred while adding an e-mail message to \'%1$s\' (%2$s) with subject \'%3$s\'', array(serialize($args['toname']), serialize($args['toaddress']), $args['subject'])));
        }

        // send message
        if (!$sender->send_mail()) {
            // message not sent
            return LogUtil::registerError(__f('Error! A problem occurred while sending an e-mail message to \'%1$s\' (%2$s) with subject \'%3$s\'', array(serialize($args['toname']), serialize($args['toaddress']), $args['subject'])));
        }
        return true; // message sent
    }

}
