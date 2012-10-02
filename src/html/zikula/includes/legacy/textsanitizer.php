<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2001, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: textsanitizer.php 26497 2009-09-02 11:11:32Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 */

/**
 * Text encoding style
 */
define("TS_DEFAULT", 0);
define("TS_ZIKULA", 1);
define("TS_WIKI", 2);
define("TS_BBCODE", 3);

/**
 * @package Zikula_Core
 * @subpackage Zikula_legacy
 */
class TextSanitizer {
    // added by sebastien, for the treatment of wiki ...
    var $typeCoding;
    // this one is use to fake the view of the text if unfortunately there are some
    // _TP, _TW ... in it.
    function de_typocode($text)
    {
        $retour = str_replace('_TW', '', $text);
        $retour = str_replace('_TB', '', $retour);
        $retour = str_replace('_TP', '', $retour);
        return ($retour);
    }
    // this one is supposed to return a 0 to 3 when reveiving "", "postnuke","wiki, "bbcode"
    function typocode($cType)
    {
        switch ($cType) {
            case ('postnuke') :
                $nRetour = TS_ZIKULA;
                break;
            case ('wiki') :
                $nRetour = TS_WIKI;
                break;
            case ('bbcode') :
                $nRetour = TS_BBCODE;
                break;
            default :
                $nRetour = TS_DEFAULT;
        }
        return($nRetour);
    }
    // thisone to fill $this->typeCoding with a 0, 1, 2, 3
    // this is where I am stocking the value of Format_type coming from the
    // table stories.
    function fillFormat_type($nType)
    {
        $this->typeCoding = $nType;
    }
    // end of added by sebastien, for the treatment of wiki ...
    function makeClickable($text)
    {
        // Modified by Nathan Codding - July 20, 2000.
        // Made it only work on URLs and e-mail addresses preceeded by a space, in order to stop
        // mangling HTML code.
        // The Following function was taken from the Scriplets area of http://www.phpwizard.net, and was written by Tobias Ratschiller.
        // Visit phpwizard.net today, its an excellent site!
        // original make_clickable
        $ret = preg_replace("/ ([[:alnum:]]+):\/\/([^[:space:]]*)([[:alnum:]#\?\/&=])/", " <a href='\\1://\\2\\3' target='_blank' target='_new'>\\1://\\2\\3</a>", $text);
        $ret = preg_replace("/ (([a-z0-9_]|\\-|\\.)+@([^[:space:]]*)([[:alnum:]-]))/i", " <a href='mailto:\\1' target='_new'>\\1</a>", $ret);
        return $ret;
    }

    function undoHtmlSpecialChars($input)
    {
        // Simon Birtwistle
        // Takes a string, and does the reverse of the PHP standard function htmlspecialchars().
        // Note htmlspecialchars_decode is only available in PHP >=5.2
        if ( !function_exists('htmlspecialchars_decode') ) {
           function htmlspecialchars_decode($text) {
               return strtr($text, array_flip(get_html_translation_table(HTML_SPECIALCHARS)));
           }
        }
        return htmlspecialchars_decode($input);
    }

    function oopsNl2Br($string)
    {
        $string = preg_replace("/(\015\012)|(\015)|(\012)/", "<br>", $string);
        $string = str_replace("<br><br><br>", "<br>", $string);
        return $string;
    }

    function oopsAddSlashes($text)
    {
        if (!get_magic_quotes_gpc()) {
            $text = addslashes($text);
        }
        return $text;
    }

    function oopsStripSlashes($text)
    {
        $text = stripslashes($text);
        return $text;
    }

    function sanitizeIntoDB($text)
    {
        // dbescape checks the database type and escapes appropriately.
        $text = dbescape($text);
        return $text;
    }

    function sanitizeToTextarea($text)
    {
        $text = $this->oopsStripSlashes($text);
        return $text;
    }

    function sanitizeForDisplay($text, $allowhtml = 0)
    {
        $numargs = func_num_args();
        if (get_magic_quotes_runtime()) {
            $text = $this->oopsStripSlashes($text);
        }
        if ($numargs == 4) {
            $text = $this->makeClickable($text);
            if ($allowhtml == 0) {
                $text = htmlspecialchars($text);
            }
        }

        return $text;
    }

    function sanitizeForPreview($text, $allowhtml = 0)
    {
        $numargs = func_num_args();
        if (get_magic_quotes_gpc()) {
            $text = $this->oopsStripSlashes($text);
        }
        if ($numargs == 4) {
            $text = $this->makeClickable($text);
            if ($allowhtml == 0) {
                $text = htmlspecialchars($text);
            }
            $text = transform($text, $this->typeCoding);
            $text = $this->de_typocode($text);
            $text = $this->oopsNl2Br($text);
        }

        return $text;
    }
}

/**
 * @package Zikula_Core
 * @subpackage Zikula_legacy
 */
class MyTextSanitizer extends TextSanitizer {
    // Allow no html tags for textbox data
    // Smiley can be enabled/disabled for both textbox and textarea data
    // Allow only the following html tags for textarea data
    // <br> is not allowed since nl2br will be used when storing data
    var $allowed = "<a>,<b>,<blockquote>,<img>,<code>,<div>,<em>,<i>,<li>,<ol>,<p>,<pre>,<strike>,<strong>,<sub>,<sup>,<tt>,<u>,<ul>,<image>,<hr>,%%%";
    // called before saving textbox form data
    function makeTboxData4Save($text)
    {
        $text = $this->undoHtmlSpecialChars($text);
        $text = strip_tags($text, ''); // strip all html tags SF bug #457478
        // we are preparing for a save so send to DB sanitize method
        $text = $this->sanitizeIntoDB($text);
        return $text;
    }
    // called before displaying textbox form data
    // smiley can be used if you want
    function makeTboxData4Show($text, $smiley = 0)
    {
        $text = $this->sanitizeForDisplay($text, 0, $smiley, 0); //do htmlspecialchars
        return $text;
    }
    // called before editting textbox form data
    function makeTboxData4Edit($text)
    {
        $text = $this->sanitizeForDisplay($text, 0, 0, 0); //do htmlspecialchars
        return $text;
    }
    // called before preview of textbox form data
    // smiley can be used if you want
    // use makeTboxData4PreviewInForm when you want textbox data to be previewed in textbox again
    function makeTboxData4Preview($text, $smiley = 0)
    {
        $text = $this->sanitizeForPreview($text, 0, $smiley, 0); //do htmlspecialchars
        return $text;
    }

    function makeTboxData4PreviewInForm($text)
    {
        $text = $this->sanitizeForPreview($text, 0, 0, 0); //do htmlspecialchars
        return $text;
    }
    // functions for filtering textarea form data
    function sanitizeTotextarea4Edit($text)
    {
        if (get_magic_quotes_runtime()) {
            $text = stripslashes($text);
        }
        return $text;
    }

    function sanitizeTotextarea4Preview($text)
    {
        if (get_magic_quotes_gpc()) {
            $text = stripslashes($text);
        }
        $text = strip_tags($text, $this->allowed); // strip unallowed html tags
        return $text;
    }
    // called before saving first time data or editted textarea data
    function makeTareaData4Save($text)
    {
        $text = strip_tags($text, $this->allowed); // strip unallowed html tags
        // we are preparing for a save so send to DB sanitize method
        $text = $this->sanitizeIntoDB($text);
        return $text;
    }
    // called before displaying textarea form data
    function makeTareaData4Show($text, $allowhtml = 1, $smiley = 0, $bbcode = 0)
    {
        $text = $this->sanitizeForDisplay($text, $allowhtml, $smiley, $bbcode);
        return $text;
    }
    // called before editting textarea form data
    function makeTareaData4Edit($text)
    {
        // if magic_quotes_runtime is on, do stipslashes
        $text = $this->sanitizeTotextarea4Edit($text);
        return $text;
    }
    // called before previewing textarea form data
    function makeTareaData4Preview($text, $allowhtml = 1, $smiley = 0, $bbcode = 0)
    {
        $text = strip_tags($text, $this->allowed); // strip unallowed html tags
        $text = $this->sanitizeForPreview($text, $allowhtml, $smiley, $bbcode);
        return $text;
    }
    // called before previewing textarea form data
    // this time, text area data is inserted into textarea again
    function makeTareaData4PreviewInForm($text)
    {
        // if magic_quotes_gpc is on, do stipslashes
        $text = $this->sanitizeTotextarea4Preview($text);
        return $text;
    }
}
