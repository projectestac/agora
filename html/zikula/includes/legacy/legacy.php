<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2001, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: legacy.php 27809 2009-12-01 21:12:46Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Core
 * @subpackage Zikula_legacy
 */
global $pnconfig;
$pnconfig['nukeurl'] = pnGetBaseURI();
global $mainfile;
$mainfile = 1;


/**
 * Delete quotes in a string
*/
function delQuotes($string)
{
    // No recursive function to add quote to an HTML tag if needed
    // and delete duplicate spaces between attribs.
    $tmp = ""; // string buffer
    $result = ""; // result string
    $i = 0;
    $attrib = -1; // Are us in an HTML attrib ?   -1: no attrib   0: name of the attrib   1: value of the atrib
    $quote = 0; // Is a string quote delimited opened ? 0=no, 1=yes
    $len = strlen($string);
    while ($i < $len) {
        switch ($string[$i]) { // What car is it in the buffer ?
            case "\"": // "       // a quote.
                if ($quote == 0) {
                    $quote = 1;
                } else {
                    $quote = 0;
                    if (($attrib > 0) && ($tmp != "")) {
                        $result .= "=\"$tmp\"";
                    }
                    $tmp = "";
                    $attrib = -1;
                }
                break;
            case "=": // an equal - attrib delimiter
                if ($quote == 0) { // Is it found in a string ?
                    $attrib = 1;
                    if ($tmp != "") {
                        $result .= " $tmp";
                    }
                    $tmp = "";
                } else $tmp .= '=';
                break;
            case " ": // a blank ?
                if ($attrib > 0) { // add it to the string, if one opened.
                    $tmp .= $string[$i];
                }
                break;
            default: // Other
                if ($attrib < 0) { // If we weren't in an attrib, set attrib to 0= 0;
                }
                $tmp .= $string[$i];
                break;
        }
        $i++;
    }
    if (($quote != 0) && ($tmp != "")) {
        if ($attrib == 1) {
            $result .= "=";
        }
        /**
         * If it is the value of an atrib, add the '='
         */
        $result .= "\"$tmp\"";
        /**
         * Add quote if needed (the reason of the function ;-)
         */
    }
    return $result;
}


/**
 * Fixes quoting on a string
 *
 * This function replaces all single single quotes with double single quotes
 * (' becomes '') and all occurrences of \' with '.
 *
 * @param  $what string The string to be fixed
 * @return string The fixed string
 * @author ?
 */
function FixQuotes ($what = "")
{
    $what = preg_replace("/'/", "''", $what);
    while (preg_match("/\\\\'/", $what)) {
        $what = preg_replace("/\\\\'/", "'", $what);
    }
    return $what;
}


/**
 * Checks allowed HTML in a string
 */
function check_html ($str, $strip = '')
{
    // The core of this code has been lifted from phpslash
    // which is licenced under the GPL.
    $AllowableHTML = pnConfigGetVar('AllowableHTML');

    if ($strip == "nohtml") {
        $AllowableHTML = array('');
    }
    $str = stripslashes($str);
    $str = preg_replace("/<[[:space:]]*([^>]*)[[:space:]]*>/",
        '<\\1>', $str);
    // Delete all spaces from html tags .
    $str = preg_replace("/<a[^>]*href[[:space:]]*=[[:space:]]*\"?[[:space:]]*([^\" >]*)[[:space:]]*\"?[^>]*>/i",
        '<a href="\\1">', $str); // "
    // Delete all attribs from Anchor, except an href, double quoted.
    $tmp = "";
    while (preg_match("/<(/?[[:alpha:]]*)[[:space:]]*([^>]*)>/", $str, $reg)) {
        $i = strpos($str, $reg[0]);
        $l = strlen($reg[0]);
        if ($reg[1][0] == "/") {
            $tag = strtolower(substr($reg[1], 1));
        } else {
            $tag = strtolower($reg[1]);
        }
        if (isset($AllowableHTML[$tag])) {
            if ($a = $AllowableHTML[$tag]) {
                if ($reg[1][0] == "/") {
                    $tag = "</$tag>";
                } elseif (($a == 1) || ($reg[2] == "")) {
                    $tag = "<$tag>";
                } else {
                    // Place here the double quote fix function.
                    $attrb_list = delQuotes($reg[2]);
                    $tag = "<$tag" . $attrb_list . ">";
                } // Attribs in tag allowed
            }
        } else {
            $tag = "";
        }
        $tmp .= substr($str, 0, $i) . $tag;
        $str = substr($str, $i + $l);
    }
    $str = $tmp . $str;
    return $str;
    pnShutDown();
    // Squash PHP tags unconditionally
    $str = preg_replace("/<\?/", "", $str);
    return $str;
}


/**
 * Filter text through both censor and allowed HTML
 */
function filter_text($Message, $strip = "")
{
    global $EditedMessage;
    check_words($Message);
    $EditedMessage = check_html($EditedMessage, $strip);
    return ($EditedMessage);
}


/**
 * formatting stories
 */
function formatTimestamp($time)
{
    global $datetime;

    setlocale (LC_TIME, pnConfigGetVar('locale'));
    // Below ereg commented out 07-08-2001:Alarion - less strict ereg thanks to "Joe"
    // ereg ("([0-9]{4})-([0-9]{1,2})-([0-9]{1,2}) ([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})", $time, $datetime);
    preg_match("/([0-9]+)-([0-9]+)-([0-9]+) ([0-9]+):([0-9]+):([0-9]+)/", $time, $datetime);
    // 07-07-2001:Alarion - For the time being, I added an ereg_replace to strip out
    // the timezone until I get a function in to replace the server timezone with the users timezone
    $datetime = strftime("" . preg_replace("/%Z/", "", _DATESTRING) . "", mktime($datetime[4], $datetime[5], $datetime[6], $datetime[2], $datetime[3], $datetime[1]));
    $datetime = ucfirst($datetime);
    return($datetime);
}


/**
 * include_once replacement
 *
 * Works basicly like include_once() (except not
 * include() aware, I'm not sure what array name
 * they use). Needed for older PHP4 installs.
 *
 * @param  $f string The file/path to include
 * @return false if file was already included. true if first include
 * @author Patrick Kellum <webmaster@ctarl-ctarl.com>
 * @ignore
 */
if (!function_exists('pninclude_once')) {
    function pninclude_once($f)
    {
        Loader::includeOnce($f);
        return true;
    }
}


/**
 * Check string for censored words
 */
function check_words($message)
{
    global $EditedMessage;

    $EditedMessage = DataUtil::censor($message);

    return ($EditedMessage);
}


/**
 * cross site scripting check
 */
function csssafe($checkArg = "op", $checkReferer = true)
{
    return true;
}


/**
 * Create basic text form
 */
function myTextForm($url , $value , $useTable = false , $extraname = "postnuke")
{
    $form = '<form action="'.$url.'" method="post">'."\n";
    if ($useTable) {
        $form .= '<table border="0" width="100%" align="center"><tr><td>'."\n";
    }
    $form .= '<input type="submit" value="'.$value.'" class="pn-normal" style="text-align:center">';
    $form .= '<input type="hidden" name="'.$extraname.'" value="'.$extraname.'"></form>'."\n";
    if ($useTable) {
        $form .= '</td></tr></table>'."\n";
    }
    return $form;
}


/**
 *  Error message due a ADODB SQL error and die
 */
function PN_DBMsgError($db='',$prg='',$line=0,$message='Error Accesing the Database')
{

    /*
    * simplied version of initial fix supplied by Neo
    * original fix by markwest
    */
    $docroot = getcwd();
    $docroot = str_replace( 'includes', "", $docroot );

    $prg = str_replace('\\', '/', $prg);
    $prgoutput = str_replace($docroot, '[webroot]', $prg);

    if (SecurityUtil::checkPermission("::", '::', ACCESS_ADMIN)) {
        $lcmessage = $message . "<br>" .
                     "Program: " . $prgoutput . " - " . "Line N.: " . $line . "<br>" .
                     "Database: " . $db->database . "<br> ";

        if ($db->ErrorNo()<>0) {
            $lcmessage .= "Error (" . $db->ErrorNo() . ") : " . $db->ErrorMsg() . "<br>";
        }
    } else {
        $lcmessage = $message . "<br>" ."Program: " . $prgoutput . " - " . "Line N.: " . $line . "<br>";

        if ($db->ErrorNo()<>0) {
            $lcmessage .= "Error (" . $db->ErrorNo() . ") : " . $db->ErrorMsg() . "<br>";
        }
    }
    pnShutDown($lcmessage);
}


/**
 * Timezone information
 */
// fixed notice error [class007]
$tzinfo = DateUtil::getTimezones();
