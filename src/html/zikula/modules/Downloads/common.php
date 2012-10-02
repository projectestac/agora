<?php
// -----------------------------------------------------------------------------------
/**
 * Downloads
 *
 * Purpose of file: Error handling
 *
 * @package      Downloads
 * @version      2.4
 * @author       Sascha Jost
 * @link         http://www.cmods-dev.de
 * @copyright    Copyright (C) 2005 by Sascha Jost
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */
 // -----------------------------------------------------------------------------------

/**
 *
 * show appropriate message if something is going wrong
 *
 * @author       Lindbergh
 * @version      1.0
 * @param        $file
 * @param        $line
 * @param        $message
 * @return       pnRender Object
 */
function errorpage($file, $line , $message, $add_flag = false, $down_flag = false, $search_flag = false, $upgrade_flag = false)
{
    $dom = ZLanguage::getModuleDomain('Downloads');

    if	((!isset($file))

	||(is_numeric($file))

	||(!isset($line))

	||(!is_numeric($line))

	||(!isset($message))

	||(is_numeric($message)))
	{
        pnSessionSetVar('errormsg', _CDL__MODULENOAUTH);

        pnRedirect(pnModURL('Downloads', 'user', 'main'));

        return true;
    }

	// we need to load one core file in order to have the language definitions
    // available
    if(!pnModAPILoad('Downloads','admin'))
    {
        pnModAPILoad('Downloads', 'user');
    }

    pnModLangLoad('Downloads');
    
    $is_admin = false;
    
	$pnr = new pnRender('Downloads');
    
    $pnr->caching = false;
    
    if (pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
    {
        $errormessage = "<strong>".__('File', $dom).":</strong> $file <br /> <strong>".__('Line', $dom).":</strong> $line <br /> <strong>".__('Message', $dom).":</strong> $message";
        $is_admin = true;
        $pnr->assign('is_admin', $is_admin);
    }
    else
    {
        $errormessage = "<strong>".__('Message', $dom).":</strong> $message";
    }

    $errormessage = pnVarPrepHTMLDisplay($errormessage);

    if ($add_flag === true)
    {
		$pnr->assign('add_flag', $add_flag);
	}
	
	if ($down_flag === true)
    {
      	$lid  = pnVarCleanFromInput('lid');
      	$pnr->assign('lid',$lid);
		$pnr->assign('down_flag', $down_flag);
	}
	
	if ($search_flag === true)
    {
		$pnr->assign('search_flag', $search_flag);
	}
	
	if ($upgrade_flag === true)
    {
      	$pnr->assign('upgrade_flag', $upgrade_flag);
		$pnr->assign('upgrade_message', __('Please create or chmod the folder mentoined above!', $dom));
	}
	
    $pnr->assign('errormessage', $errormessage);
  
    $output = $pnr->fetch('downloads_error_page.htm');
    
    //This code is taken from pnForum common.php
    if(preg_match("/(api\.php|common\.php|pninit\.php)$/i", $file)<>0)
    {
        // __FILE__ ends with api.php or is common.php or pninit.php
        include_once('header.php');
        echo $output;
        include_once('footer.php');
        exit;
    }
    
    return $output;
    
}

?>