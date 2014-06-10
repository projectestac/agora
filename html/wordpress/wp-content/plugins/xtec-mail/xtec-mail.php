<?php
/*
  Plugin Name: XTEC Mail
  Plugin URI:
  Description: Reconfigures the wp_mail() function to use web service mail service of Departament d'Ensenyament instead of mail(). The plugin use v.11.04.07 of Mail Sender By WS PHP library.
  Version: 3.0
  Author: Francesc Bassas i Bullich
  Author: Toni Ginard
  Author URI:
 */


function xtecmail_init() {
    // Localization
    load_plugin_textdomain('xtec-mail', false, basename(dirname(__FILE__)) . '/languages/');

    // Check for WordPress multisite and add option to Dashboard
    if (is_multisite()) {
        add_action('network_admin_menu', 'xtec_mail_network_admin_menu');
    } else {
        add_action('admin_menu', 'xtec_mail_admin_menu');
    }
}

// Initialization of the plugin
add_action('init', 'xtecmail_init');


// Adds plugin admin menu for singlesite
function xtec_mail_admin_menu() {
    add_submenu_page('tools.php', __('Mail', 'xtec-mail'), __('Mail', 'xtec-mail'), 'manage_options', 'mail', 'xtec_mail_options');
}

// Adds plugin network admin menu (WordPress multisite)
function xtec_mail_network_admin_menu() {
    add_submenu_page('settings.php', __('Mail', 'xtec-mail'), __('Mail', 'xtec-mail'), 'manage_network_options', 'ms-mail', 'xtec_mail_options');
}

/**
 * Displays plugin network options page.
 */
function xtec_mail_options() {
    
    // If it's MultiSite (XTECBlocs) is not necessary that is_xtecadmin() exists because first condition fails
    if (!is_multisite() && !is_xtecadmin()) {
        ?>
        <div class="wrap">
            <h2><?php _e('XTEC Mail', 'xtec-mail'); ?></h2>
            <div id="message" class="updated">
                <p>
                    <?php _e('XTEC Mail is active', 'xtec-mail'); ?>
                </p>
            </div>
        </div>
        <?php
        return ;
    }

    switch ($_GET['action']) {
        case 'siteoptions':
            if (isset($_POST['xtec_mail_idapp'])) {
                update_site_option('xtec_mail_idapp', $_POST['xtec_mail_idapp']);
            }
            if (isset($_POST['xtec_mail_replyto'])) {
                update_site_option('xtec_mail_replyto', $_POST['xtec_mail_replyto']);
            }
            if (isset($_POST['xtec_mail_sender'])) {
                update_site_option('xtec_mail_sender', $_POST['xtec_mail_sender']);
            }
            if (!isset($_POST['xtec_mail_log'])) {
                update_site_option('xtec_mail_log', 0);
            } else {
                update_site_option('xtec_mail_log', $_POST['xtec_mail_log']);
            }
            if (!isset($_POST['xtec_mail_debug'])) {
                update_site_option('xtec_mail_debug', 0);
            } else {
                update_site_option('xtec_mail_debug', $_POST['xtec_mail_debug']);
            }
            if (isset($_POST['xtec_mail_logpath'])) {
                update_site_option('xtec_mail_logpath', $_POST['xtec_mail_logpath']);
            }
            ?>
            <div id="message" class="updated">
                <p><?php _e('Options saved.', 'xtec-mail') ?></p>
            </div>
            <?php
            break;
    }

    // Check for WordPress multisite
    $page = (is_multisite()) ? 'ms-mail' : 'mail';
    ?>

    <div class="wrap">
        <form method="post" action="?page=<?php echo $page; ?>&action=siteoptions">
            <h2><?php _e('XTEC Mail', 'xtec-mail') ?></h2>
            <table class="form-table">
                <tbody>
                    <tr valign="top"> 
                        <th scope="row"><?php _e('idApp', 'xtec-mail') ?></th> 
                        <td>
                            <input type="text" name="xtec_mail_idapp" value="<?php echo get_site_option('xtec_mail_idapp') ?>" />
                        </td>
                    </tr>
                    <tr valign="top"> 
                        <th scope="row"><?php _e('replyto', 'xtec-mail') ?></th> 
                        <td>
                            <input type="text" name="xtec_mail_replyto" value="<?php echo get_site_option('xtec_mail_replyto') ?>" />
                        </td>
                    </tr>
                    <tr valign="top"> 
                        <th scope="row"><?php _e('Environment', 'xtec-mail') ?></th> 
                        <td>
                            <?php 
                                echo ENVIRONMENT . '&nbsp;&nbsp;<span style="font-style:italic;">(' . __('Set in config', 'xtec-mail') . ')</span>';
                            ?>
                        </td>
                    </tr>
                    <tr valign="top"> 
                        <th scope="row"><?php _e('Sender', 'xtec-mail') ?></th> 
                        <td>
                            <input type="text" name="xtec_mail_sender" value="<?php echo get_site_option('xtec_mail_sender') ?>" />
                        </td>
                    </tr>
                    <tr valign="top"> 
                        <th scope="row"><?php _e('Mail Log', 'xtec-mail') ?></th> 
                        <td>
                            <label>
                                <input name="xtec_mail_log" type="checkbox" value="1" <?php checked(get_site_option('xtec_mail_log')) ?> /> 
                                <?php _e('Enable the log for the mail system', 'xtec-mail'); ?>
                            </label>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><?php _e('Mail Debug', 'xtec-mail') ?></th> 
                        <td>
                            <label>
                                <input name="xtec_mail_debug" type="checkbox" value="1" <?php checked(get_site_option('xtec_mail_debug')) ?> /> 
                                <?php _e('Enable the debug mode for log of the mail system', 'xtec-mail'); ?>
                            </label>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><?php _e('Log Path', 'xtec-mail') ?></th> 
                        <td>
                            <label>
                                <input type="text" name="xtec_mail_logpath" size="50" value="<?php echo get_site_option('xtec_mail_logpath') ?>" /> 
                                <?php _e('Absolute path to log file', 'xtec-mail'); ?>
                            </label>
                        </td>
                    </tr>
                </tbody>
            </table>
            <p class="submit">
                <input type="submit" name="submit" id="submit" class="button-primary" value="<?php _e('Save', 'xtec-mail') ?>">
            </p>
        </form>
    </div>
    <?php
}

/**
 * Send mail, similar to PHP's mail
 *
 * A true return value does not automatically mean that the user received the
 * email successfully. It just only means that the method used was able to
 * process the request without any errors.
 *
 * Using the two 'wp_mail_from' and 'wp_mail_from_name' hooks allow from
 * creating a from address like 'Name <email@address.com>' when both are set. If
 * just 'wp_mail_from' is set, then just the email address will be used with no
 * name.
 *
 * The default content type is 'text/plain' which does not allow using HTML.
 * However, you can set the content type of the email by using the
 * 'wp_mail_content_type' filter.
 *
 * The default charset is based on the charset used on the blog. The charset can
 * be set using the 'wp_mail_charset' filter.
 *
 * @since 1.2.1
 * @uses apply_filters() Calls 'wp_mail' hook on an array of all of the parameters.
 * @uses apply_filters() Calls 'wp_mail_from' hook to get the from email address.
 * @uses apply_filters() Calls 'wp_mail_from_name' hook to get the from address name.
 * @uses apply_filters() Calls 'wp_mail_content_type' hook to get the email content type.
 * @uses apply_filters() Calls 'wp_mail_charset' hook to get the email charset
 * @uses do_action_ref_array() Calls 'phpmailer_init' hook on the reference to
 * 		phpmailer object.
 * @uses PHPMailer
 * @
 *
 * @param string|array $to Array or comma-separated list of email addresses to send message.
 * @param string $subject Email subject
 * @param string $message Message contents
 * @param string|array $headers Optional. Additional headers.
 * @param string|array $attachments Optional. Files to attach.
 * @return bool Whether the email contents were sent successfully.
 */
if (!function_exists('wp_mail')) {

    function wp_mail($to, $subject, $message, $headers = '', $attachments = array()) {
        include_once 'lib/mailsender.class.php';
        include_once 'lib/message.class.php';

        $log = (get_site_option('xtec_mail_log')) ? true : false;
        $debug = (get_site_option('xtec_mail_debug')) ? true : false;
        $idApp = get_site_option('xtec_mail_idapp');
        $replyto = get_site_option('xtec_mail_replyto');
        $sender = get_site_option('xtec_mail_sender');
        $logpath = get_site_option('xtec_mail_logpath');

        //load the mailsender
        $mailsender = new mailsender($idApp, $replyto, $sender, ENVIRONMENT, $log, $debug, $logpath);

        // Compact the input, apply the filters, and extract them back out
        extract(apply_filters('wp_mail', compact('to', 'subject', 'message', 'headers', 'attachments')));

        if (!is_array($attachments)) {
            $attachments = explode("\n", str_replace("\r\n", "\n", $attachments));
        }

        // Headers
        if (empty($headers)) {
            $headers = array();
        } else {
            if (!is_array($headers)) {
                // Explode the headers out, so this function can take both
                // string headers and an array of headers.
                $tempheaders = explode("\n", str_replace("\r\n", "\n", $headers));
            } else {
                $tempheaders = $headers;
            }
            $headers = array();

            // If it actually got contents
            if (!empty($tempheaders)) {
                // Iterate through the raw headers
                foreach ((array) $tempheaders as $header) {
                    if (strpos($header, ':') === false) {
                        if (false !== stripos($header, 'boundary=')) {
                            $parts = preg_split('/boundary=/i', trim($header));
                            $boundary = trim(str_replace(array("'", '"'), '', $parts[1]));
                        }
                        continue;
                    }
                    // Explode them out
                    list( $name, $content ) = explode(':', trim($header), 2);

                    // Cleanup crew
                    $name = trim($name);
                    $content = trim($content);

                    switch (strtolower($name)) {
                        // Mainly for legacy -- process a From: header if it's there
                        case 'from':
                            if (strpos($content, '<') !== false) {
                                // So... making my life hard again?
                                $from_name = substr($content, 0, strpos($content, '<') - 1);
                                $from_name = str_replace('"', '', $from_name);
                                $from_name = trim($from_name);

                                $from_email = substr($content, strpos($content, '<') + 1);
                                $from_email = str_replace('>', '', $from_email);
                                $from_email = trim($from_email);
                            } else {
                                $from_name = trim($content);
                            }
                            break;
                        case 'content-type':
                            if (strpos($content, ';') !== false) {
                                list( $type, $charset ) = explode(';', $content);
                                $content_type = trim($type);
                                if (false !== stripos($charset, 'charset=')) {
                                    $charset = trim(str_replace(array('charset=', '"'), '', $charset));
                                } elseif (false !== stripos($charset, 'boundary=')) {
                                    $boundary = trim(str_replace(array('BOUNDARY=', 'boundary=', '"'), '', $charset));
                                    $charset = '';
                                }
                            } else {
                                $content_type = trim($content);
                            }
                            break;
                        case 'cc':
                            $cc = array_merge((array) $cc, explode(',', $content));
                            break;
                        case 'bcc':
                            $bcc = array_merge((array) $bcc, explode(',', $content));
                            break;
                        default:
                            // Add it to our grand headers array
                            $headers[trim($name)] = trim($content);
                            break;
                    }
                }
            }
        }

        // From email and name
        // If we don't have a name from the input headers
        if (!isset($from_name)) {
            $from_name = '';
        }

        /* If we don't have an email from the input headers default to $noreply
         * Some hosts will block outgoing mail from this address if it doesn't exist but
         * there's no easy alternative. Defaulting to admin_email might appear to be another
         * option but some hosts may refuse to relay mail from an unknown domain. See
         * http://trac.wordpress.org/ticket/5007.
         */
        if (!isset($from_email)) {
            // Get the site domain and get rid of www.
            $sitename = strtolower($_SERVER['SERVER_NAME']);
            if (substr($sitename, 0, 4) == 'www.') {
                $sitename = substr($sitename, 4);
            }
            $from_email = $replyto;
        }

        // Set destination addresses
        if (!is_array($to)) {
            $to = explode(',', $to);
        }

        // Set Content-Type and charset
        // If we don't have a content-type from the input headers
        if (!isset($content_type)) {
            $content_type = 'text/html';
        }

        $content_type = apply_filters('wp_mail_content_type', $content_type);

        $msg = new message($content_type, $log, $debug, $logpath);

        $msg->set_to($to);
        $msg->set_cc($cc);
        $msg->set_bcc($bcc);
        $msg->set_subject($subject);
        $msg->set_bodyContent($message);

        if (!empty($attachments)) {
            foreach ($attachments as $attachment) {
                $msg->set_attachByPathOnAppServer(basename($attachment), $attachment);
            }
        }

        //add message to mailsender
        if (!$mailsender->add($msg)) {
            return false;
        }

        // Send!
        $result = $mailsender->send_mail();

        return $result;
    }

}