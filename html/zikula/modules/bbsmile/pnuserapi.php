<?php
// $Id: pnuserapi.php 125 2009-11-11 15:13:48Z herr.vorragend $
// ----------------------------------------------------------------------
// LICENSE
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License (GPL)
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// To read the license please visit http://www.gnu.org/copyleft/gpl.html
// ----------------------------------------------------------------------
// Original Author of file: Hinrich Donner
// changed to bbsmile: larsneo
// ----------------------------------------------------------------------

/**
 * @package Zikula_Utility_Modules
 * @subpackage bbsmile
 * @license http://www.gnu.org/copyleft/gpl.html
*/

/**
 * the hook function
*/
function bbsmile_userapi_transform($args)
{
    $dom = ZLanguage::getModuleDomain('bbsmile');
    // Argument check
    if ((!isset($args['objectid'])) ||
        (!isset($args['extrainfo']))) {
        return LogUtil::registerArgsError();
    }

    if (is_array($args['extrainfo'])) {
        foreach ($args['extrainfo'] as $text) {
            $result[] = bbsmile_transform($text);
        }
    } else {
        $result = bbsmile_transform($args['text']);
    }

    return $result;
}

/*
 * main transformation function
 */
function bbsmile_transform($text)
{
    // check the user agent - if it is a bot, return immediately
    $robotslist = array ( "ia_archiver",
                          "googlebot",
                          "mediapartners-google",
                          "yahoo!",
                          "msnbot",
                          "jeeves",
                          "lycos");
    $useragent = pnServerGetVar('HTTP_USER_AGENT');
    for($cnt=0; $cnt < count($robotslist); $cnt++) {
        if(strpos(strtolower($useragent), $robotslist[$cnt]) !== false) {
            return $text;
        }
    }

    $smilies = pnModGetVar('bbsmile','smilie_array');
    $remove_inactive = pnModGetVar('bbsmile', 'remove_inactive');

    if(is_array($smilies) && count($smilies)>0) {
        // sort smilies, see http://code.zikula.org/bbsmile/ticket/1
        uasort($smilies, 'cmp_smiliesort');
        $imagepath      = pnGetBaseURL() . DataUtil::formatForOS(pnModGetVar('bbsmile', 'smiliepath'));
        $imagepath_auto = pnGetBaseURL() . DataUtil::formatForOS(pnModGetVar('bbsmile', 'smiliepath_auto'));
        $auto_active = pnModGetVar('bbsmile','activate_auto');
    	// pad it with a space so we can distinguish between FALSE and matching the 1st char (index 0).
	    // This is important!
    	$text = ' ' . $text;
        foreach ($smilies as $smilie) {
            // check if smilie is active
	        if ($smilie['active'] == 1) {
                // check if alt is a define
                $smilie['alt'] = (defined($smilie['alt'])) ? constant($smilie['alt']) : $smilie['alt'];

                if($smilie['type'] == 0) {
                    $text = str_replace($smilie['short'], ' <img src="' . $imagepath . '/' . $smilie['imgsrc'] . '" alt="' . $smilie['alt'] . '" /> ', $text);
                } else {
                    if($auto_active == 1) {
                        $text = str_replace($smilie['short'], ' <img src="' . $imagepath_auto . '/' . $smilie['imgsrc'] . '" alt="' . $smilie['alt'] . '" /> ', $text);
                    }
                }

                if(!empty($smilie['alias'])) {
                    $aliases = explode(",", trim($smilie['alias']));
                    if(is_array($aliases) && count($aliases)>0) {
                        foreach($aliases as $alias) {
                            if($smilie['type'] == 0) {
                                $text = str_replace($alias, ' <img src="' . $imagepath . '/' . $smilie['imgsrc'] . '" alt="' . $smilie['alt'] . '" /> ', $text);
                            } else {
                                if($auto_active == 1) {
                                    $text = str_replace($alias, ' <img src="' . $imagepath_auto . '/' . $smilie['imgsrc'] . '" alt="' . $smilie['alt'] . '" /> ', $text);
                                }
                            }
                        }
                    }
                }
            } else {// End of if smilie is active
                $text = str_replace($smilie['short'], '', $text);
            }
        }  // foreach
    	// Remove our padding from the string..
	    $text = substr($text, 1);
    } // End of if smilies is array and not empty
    return $text;
}

/**
 * get all old smilies- only needed by Messages module right now
 */
function bbsmile_userapi_getall()
{
	$handle=opendir('images/smilies');
	while ($file = readdir($handle)) {
		$filelist[] = $file;
	}
	asort($filelist);
	$icons = array();
	while (list ($key, $file) = each ($filelist)) {
		ereg('.gif|.jpg',$file);
		if ($file != '.' && $file != '..' && $file != 'index.html' && $file != '.svn' && $file != 'CVS') {
			$icons[] = array('imgsrc' => $file);
		}

	}
	return $icons;
}

function cmp_smiliesort ($a, $b)
{
    return strlen($a['short']) > strlen($b['short']);
}
