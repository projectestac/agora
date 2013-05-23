<?php
/**
 * Copyright Zikula Foundation 2009 - Profile module for Zikula
 *
 * This work is contributed to the Zikula Foundation under one or more
 * Contributor Agreements and licensed to You under the following license:
 *
 * @license GNU/GPLv3 (or at your option, any later version).
 * @package Profile
 *
 * Please see the NOTICE file distributed with this source code for further
 * information regarding copyright and licensing.
 */

/**
 * Smarty function to display an editable dynamic user data field.
 *
 * Example
 * {duditemdisplay propattribute='avatar'}
 *
 * Example
 * {duditemdisplay propattribute='realname' uid=$uid}
 *
 * Example
 * {duditemdisplay item=$item}
 *
 * Parameters passed in the $params array:
 * ---------------------------------------
 * string  item          The Profile DUD item.
 * string  userinfo      The userinfo information [if not set uid must be specified].
 * string  uid           User ID to display the field value for (-1 = do not load).
 * string  proplabel     Property label to display (optional overrides the preformated dud item $item).
 * string  propattribute Property attribute to display.
 * string  default       Default content for an empty DUD.
 * boolean showlabel     Show the label? default = true.
 * 
 * @param array  $params  All attributes passed to this function from the template.
 * @param object &$smarty Reference to the Zikula_View/Smarty object.
 * 
 * @return string|boolean The results of the module function; empty string if the Profile module is not available; false if error.
 */
function smarty_function_duditemdisplay($params, &$smarty)
{
    extract($params);
    unset($params);

    if (!ModUtil::available('Profile')) {
        return '';
    }

    if (!isset($item)) {
        if (isset($proplabel)) {
            $item = ModUtil::apiFunc('Profile', 'user', 'get', array('proplabel' => $proplabel));
        } else if (isset($propattribute)) {
            $item = ModUtil::apiFunc('Profile', 'user', 'get', array('propattribute' => $propattribute));
        } else {
            return false;
        }
    }

    if (!isset($item) || empty ($item)) {
        return false;
    }

    $dom = ZLanguage::getModuleDomain('Profile');

    // check for a template set
    if (!isset($tplset)) {
        $tplset = 'profile_duddisplay';
    }

    // a default value if the user data is empty
    if (!isset($default)) {
        $default = '';
    }

    if (!isset($uid)) {
        $uid = UserUtil::getVar('uid');
    }

    if (!isset($userinfo)) {
        $userinfo = UserUtil::getVars($uid);
    }

    // get the value of this field from the userinfo array
    if (isset($userinfo['__ATTRIBUTES__'][$item['prop_attribute_name']])) {
        $uservalue = $userinfo['__ATTRIBUTES__'][$item['prop_attribute_name']];

    } elseif (isset($userinfo[$item['prop_attribute_name']])) {
        // user's temp view for non-approved users needs this
        $uservalue = $userinfo[$item['prop_attribute_name']];

    } else {
        // can be a non-marked checkbox in the user temp data
        $uservalue = '';
    }

    // try to get the DUD output if it's Third Party
    if ($item['prop_dtype'] != 1) {
        $output = ModUtil::apiFunc($item['prop_modname'], 'dud', 'edit',
                               array('item'      => $item,
                                     'userinfo'  => $userinfo,
                                     'uservalue' => $uservalue,
                                     'default'   => $default));
        if ($output) {
            return $output;
        }
    }

    // build the output
    $output = '';
    $render = Zikula_View::getInstance('Profile', false, null, true);
    $render->assign('item',      $item);
    $render->assign('userinfo',  $userinfo);
    $render->assign('uservalue', $uservalue);

    // detects the template to use
    $template = $tplset.'_'.$item['prop_id'].'.tpl';
    if (!$render->template_exists($template)) {
        $template = $tplset.'_generic.tpl';
    }

    $output = '';


    // checks the different attributes and types
    // avatar
    if ($item['prop_attribute_name'] == 'avatar') {
        $baseurl = System::getBaseUrl();
        $avatarpath = ModUtil::getVar(Users_Constant::MODNAME, Users_Constant::MODVAR_AVATAR_IMAGE_PATH, Users_Constant::DEFAULT_AVATAR_IMAGE_PATH);
        if (empty($uservalue)) {
            $uservalue = 'blank.png';
        }

        $output = "<img alt=\"\" src=\"{$baseurl}{$avatarpath}/{$uservalue}\" />";

    } elseif ($item['prop_attribute_name'] == 'tzoffset') {
        // timezone
        if (empty($uservalue)) {
            $uservalue = UserUtil::getVar('tzoffset') ? UserUtil::getVar('tzoffset') : System::getVar('timezone_offset');
        }

        $output = DateUtil::getTimezoneText($uservalue);
        if (!$output) {
            return '';
        }


    } elseif ($item['prop_displaytype'] == 2) {
        // checkbox
        $default = array('No', 'Yes');
        $output  = array_splice(explode('@@', $item['prop_listoptions']), 1);
        if (!is_array($output) || count($output) < 2) {
            $output = $default;
        }
        $output = isset($output[(int)$uservalue]) && !empty($output[(int)$uservalue]) ? __($output[(int)$uservalue], $dom) : __($default[(int)$uservalue], $dom);


    } elseif ($item['prop_displaytype'] == 3) {
        // radio
        $options = ModUtil::apiFunc('Profile', 'dud', 'getoptions', array('item' => $item));

        // process the user value and get the translated label
        $output = isset($options[$uservalue]) ? $options[$uservalue] : $default;


    } elseif ($item['prop_displaytype'] == 4) {
        // select
        $options = ModUtil::apiFunc('Profile', 'dud', 'getoptions', array('item' => $item));

        // process the user values and get the translated label
        $uservalue = @unserialize($uservalue);

        $output = array();
        foreach ((array)$uservalue as $id) {
            if (isset($options[$id])) {
                $output[] = $options[$id];
            }
        }


    } elseif (!empty($uservalue) && $item['prop_displaytype'] == 5) {
        // date
        $format = ModUtil::apiFunc('Profile', 'dud', 'getoptions', array('item' => $item));
        //! This is from the core domain (datebrief)
        $format = !empty($format) ? $format : __('%b %d, %Y');

        $output = DateUtil::getDatetime(strtotime($uservalue), $format);


    } elseif ($item['prop_displaytype'] == 7) {
        // multicheckbox
        $options = ModUtil::apiFunc('Profile', 'dud', 'getoptions', array('item' => $item));

        // process the user values and get the translated label
        $uservalue = @unserialize($uservalue);

        $output = array();
        foreach ((array)$uservalue as $id) {
            if (isset($options[$id])) {
                $output[] = $options[$id];
            }
        }


    } elseif ($item['prop_attribute_name'] == 'url') {
        // url
        if (!empty($uservalue) && $uservalue != 'http://') {
            //! string to describe the user's site
            $output = '<a href="'.DataUtil::formatForDisplay($uservalue).'" title="'.__f("%s's site", $userinfo['uname'], $dom).'" rel="nofollow">'.DataUtil::formatForDisplay($uservalue).'</a>';
        }

    } elseif (empty($uservalue)) {
        // process the generics
        $output = $default;


    } elseif (DataUtil::is_serialized($uservalue) || is_array($uservalue)) {
        // serialized data
        $uservalue = !is_array($uservalue) ? unserialize($uservalue) : $uservalue;
        $output = array();
        foreach ((array)$uservalue as $option) {
            $output[] = __($option, $dom);
        }


    } else {
        // a string
        $output .= __($uservalue, $dom);
    }


    // omit this field if is empty after the process
    if (empty($output)) {
        return '';
    }

    return $render->assign('output', is_array($output) ? $output : array($output))
        ->fetch($template);
}
