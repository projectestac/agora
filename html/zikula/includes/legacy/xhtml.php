<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2001, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: xhtml.php 24342 2008-06-06 12:03:14Z markwest $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 */

/**
 * Sends the three types of standard xhtml headers out
 *
 * $type: [0] Transitional, [1] Frameset, [2] Strict
 *
 * While Frameset would rarely be used, the goal is to reach Strict
 */
function xhtml_head_start($type)
{
    $xhtmloptions['encoding'] = "iso-8859-1";
    /**
     * Western Europe
     */
    $xhtmloptions['language'] = "en";
    // You Will Need this here to not confuse some PHP systems
    // - Some do not have the <?php requirement turned on.
    echo "<?xml version=\"1.0\" encoding=\"" . $xhtmloptions['encoding'] . "\"?>\n";

    if ($type == 0) {
        echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0
              Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n";
    } elseif ($type == 1) {
        echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Frameset//EN\"
     	      \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd\">\n";
    } elseif ($type == 2) {
        echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\"
              \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\n";
    } else {
        // NOTE: Error Handling Code Here
    }
    // NOTE: add language option for function
    echo "<html xmlns=\"http://www.w3.org/1999/xhtml\"
         xml:lang=\"" . $xhtmloptions["language"] . "\"
         lang=\"" . $xhtmloptions['language'] . "\">\n";
    echo "<head>\n";
}

/**
 * Displays W3.org's Validator Icon to test page with compliance to
 * XHTML.
 *    NOTE: DO NOT LEAVE THIS ON FOR PRODUCTION SITES UNLESS THE ENTIRE SITE
 *          COMPLETELY CONFORMS WITHOUT ERROR.
 */
function xhtml_display_test()
{
    echo "<hr />";
    echo "<p style=\"text-align: center;\"><b>DEBUG: </b>";
    echo "<a href=\"http://validator.w3.org/check/referer\">";
    echo "Test Page for XHTML Compliance!</a></p>";
}
