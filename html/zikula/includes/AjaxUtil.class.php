<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2001, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: AjaxUtil.class.php 27218 2009-10-27 11:53:39Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 *
 * @package Zikula_Core
 */

/**
 * AjaxUtil
 *
 * @package Zikula_Core
 * @subpackage AjaxUtil
 * @author Frank Schummertz
 */
class AjaxUtil
{
    /**
     * error()
     *
     * Immediately stops execution and returns an error message
     *
     * @param error - error text
     * @param code - optional error code, default '400 Bad data'
     * @author Frank Schummertz
     *
     */
    function error($error='', $code='400 Bad data')
    {
        if (!empty($error)) {
            header('HTTP/1.0 ' . $code);
            echo DataUtil::convertToUTF8($error);
            pnShutDown();
        }
    }

    /**
     * encode data in JSON and return
     * This functions can add a new authid if requested to do so (default).
     * If the supplied args is not an array, it will be converted to an
     * array with 'data' as key.
     * Authid field will always be named 'authid'. Any other field 'authid'
     * will be overwritten!
     * Script execution stops here
     *
     * @param args - string or array of data
     * @param createauthid - create a new authid and send it back to the calling javascript
     * @param xjsonheader - send result in X-JSON: header for prototype.js
     * @author Frank Schummertz
     *
     */
    function output($args, $createauthid = false, $xjsonheader = false)
    {
        // check if an error message is set
        $msgs = LogUtil::getErrorMessagesText ('<br />');
        if ($msgs != false && !empty($msgs)) {
            AjaxUtil::error($msgs);
        }

        // now check if a status message is set
        $msgs = LogUtil::getStatusMessagesText ('<br />');

        if (!is_array($args)) {
            $data = array('data' => $args);
        } else {
            $data = $args;
        }
        $data['statusmsg'] = $msgs;

        if ($createauthid == true) {
            $data['authid'] = SecurityUtil::generateAuthKey(pnModGetName());
        }

        // set locale to en_US to ensure correct decimal delimiters
        if (stristr(getenv('OS'), 'windows')) {
            setlocale(LC_ALL, 'eng');
        } else {
            setlocale(LC_ALL, 'en_US');
        }

        // convert the data to UTF-8 if not already encoded as such
        // Note: this isn't strict test but relying on the site language pack encoding seems to be a good compromise
        if (ZLanguage::getEncoding() != 'utf-8') {
            $data = DataUtil::convertToUTF8($data);
        }
        // correct, but wrong: check PHP version and use internal json_encode if >=5.2.0
        // better in order to satisfy some weird webhosters (like goneo - forget them) who think they know PHP better
        // than the PHP guys and install >=5.2.0 without JSON-support: check if json_encode() exists
        if (function_exists('json_encode')) {
            // found - use built-in json encoding
            $output = json_encode($data);
        } else {
            // not found - use external JSON library
            Loader::requireOnce('includes/classes/JSON/JSON.php');
            $json = new Services_JSON();
            $output = $json->encode($data);
        }

        header('HTTP/1.0 200 OK');
        if ($xjsonheader == true) {
            header('X-JSON:(' . $output . ')');
        }
        echo $output;
        pnShutDown();
    }

}
