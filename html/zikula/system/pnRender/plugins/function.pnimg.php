<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.pnimg.php 27368 2009-11-02 20:19:51Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to provide easy access to an image
 *
 * This function provides an easy way to include an image. The function will return the
 * full source path to the image. It will as well provite the width and height attributes
 * if none are set.
 *
 * Available parameters:
 *   - src            The file name of the image
 *   - modname        The well-known name of a module (default: the current module)
 *   - width, height  If set, they will be passed. If none is set, they are obtained from the image
 *   - alt            If not set, an empty string is being assigned
 *   - altml          If true then alt string is assumed to be a ML constant
 *   - title          If set it will be passed as a title attribute
 *   - titleml        If true then title string is assumed to be a ML constant
 *   - assign         If set, the results are assigned to the corresponding variable instead of printed out
 *   - optional       If set then the plugin will not return an error if an image is not found
 *   - default        If set then a default image is used should the requested image not be found (Note: full path required)
 *   - set            If modname is 'core' then the set parameter is set to define the directory in /images/
 *   - nostoponerror  If set and error ocurs (image not found or src is no image), do not trigger_error, but return false and fill pnimg_error instead
 *   - retval         If set indicated the field to return instead the array of values (src, width, etc.)
 *   - fqurl          If set the image path is absolute, if not relative
 *   - all remaining parameters are passed to the image tag
 *
 * Example: <!--[pnimg src="heading.gif" ]-->
 * Output:  <img src="modules/Example/pnimages/eng/heading.gif" alt="" width="261" height="69"  />
 *
 * Example: <!--[pnimg src="heading.gif" width="100" border="1" alt="foobar" ]-->
 * Output:  <img src="modules/Example/pnimages/eng/heading.gif" width="100" border="1" alt="foobar"  />
 *
 * Example <!--[pnimg src=xhtml11.png modname=core set=powered]-->
 * <img src="/Theme/images/powered/xhtml11.png" alt="" width="88" height="31"  />
 *
 * If the parameter assign is set, the results are assigned as an array. The components of
 * this array are the same as the attributes of the img tag; additionally an entry 'imgtag' is
 * set to the complete image tag.
 *
 * Example:
 * <!--[pnimg src="heading.gif" assign="myvar"]-->
 * <!--[$myvar.src]-->
 * <!--[$myvar.width]-->
 * <!--[$myvar.imgtag]-->
 *
 * Output:
 * modules/Example/pnimages/eng/heading.gif
 * 261
 * <img src="modules/Example/pnimages/eng/heading.gif" alt="" width="261" height="69"  />
 *
 *
 * @author       Joerg Napp
 * @since        05. Nov. 2003
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @return       string      The img tag
 */
function smarty_function_pnimg($params, &$smarty)
{
    $nostoponerror = (isset($params['nostoponerror'])) ? true : false;

    if (!isset($params['src'])) {
        $smarty->trigger_error(__f('Error! in %1$s: the %2$s parameter must be specified.', array('pnimg', 'src')));
        if ($nostoponerror == true) {
            return;
        } else {
            return false;
        }
    }

    // default for the module
    $modname = isset($params['modname']) ? $params['modname'] : $smarty->toplevelmodule;

    // if the module name is 'core' then we require an image set
    if ($modname == 'core') {
        if (!isset($params['set'])) {
            $smarty->trigger_error(__f('Error! in %1$s: the %2$s parameter must be specified.', array('pnimg', 'set')));
            if ($nostoponerror == true) {
                return;
            } else {
                return false;
            }
        }
        $osset = DataUtil::formatForOS($params['set']);
    }

    // default for the optional flag
    $optional = isset($params['optional']) ? $params['optional'] : true;

    // always provide an alt attribute.
    // if none is set, assign an empty one.
    $params['alt'] = isset($params['alt']) ? $params['alt'] : '';

    if (!isset($params['title'])) {
        $params['title'] = '';
    }

    // check if the alt string is an ml constant
    if (isset($params['altml']) && is_bool($params['altml']) && $params['altml']) {
        if ($params['title'] == $params['alt']) {
            $params['titleml'] = true;
        }
        $params['alt'] = constant($params['alt']);
    }
    // check if the title string is an ml constant
    if (isset($params['titleml']) && is_bool($params['titleml']) && $params['titleml'] && defined($params['title'])) {
        $params['title'] = constant($params['title']);
    }

    // prevent overwriting surrounding titles (#477)
    if (empty($params['title'])) {
        unset($params['title']);
    }

    // language
    $lang =  ZLanguage::transformFS(ZLanguage::getLanguageCode());
    $langLegacy = ZLanguage::getLanguageCodeLegacy();

    // theme directory
    $theme         = DataUtil::formatForOS(pnUserGetTheme());
    $osmodname     = DataUtil::formatForOS($modname);
    $themelangpath = "themes/$theme/templates/modules/$osmodname/images/$lang";
    $themelanglegpath = "themes/$theme/templates/modules/$osmodname/images/$langLegacy";
    $themepath     = "themes/$theme/templates/modules/$osmodname/images";
    $corethemepath = "themes/$theme/images";

    // module directory
    $modinfo       = pnModGetInfo(pnModGetIDFromName($modname));
    $osmoddir      = DataUtil::formatForOS($modinfo['directory']);
    $moduleDir     = ($modinfo['type'] == 3 ? 'system' : 'modules');
    if ($modname == 'core') {
        $modpath        = "images/$osset";
    } elseif ($modinfo['type'] != 1) {
        $modlangpath    = "$moduleDir/$osmoddir/pnimages/$lang";
        $modlanglegpath = "$moduleDir/$osmoddir/pnimages/$langLegacy";
        $modpath        = "$moduleDir/$osmoddir/pnimages";
    } else {
        $modlangpath    = "$moduleDir/$osmoddir/images/$lang";
        $modlanglegpath = "$moduleDir/$osmoddir/images/$langLegacy";
        $modpath        = "$moduleDir/$osmoddir/images";
    }
    $ossrc = DataUtil::formatForOS($params['src']);

    // form the array of paths
    if ($modname == 'core') {
        $paths = array($themepath, $corethemepath, $modpath);
    } else {
        $paths = array($themelangpath, $themelanglegpath, $themepath, $corethemepath,
                       $modlangpath, $modlanglegpath, $modpath);
    }

    // search for the image
    $imgsrc = '';
    foreach ($paths as $path) {
        if (file_exists("$path/$ossrc") && is_readable("$path/$ossrc")) {
            $imgsrc = "$path/$ossrc";
            break;
        }
    }

    if ($imgsrc == '' && isset($params['default'])) {
        $imgsrc = $params['default'];
    }

    if ($imgsrc == '') {
        if ($optional) {
            $smarty->trigger_error(__f("%s: Image '%s' not found", array('pnimg', DataUtil::formatForDisplay($params['src']))));
            if ($nostoponerror == true) {
                return;
            } else {
                return false;
            }
        }
        return;
    }

    // If neither width nor height is set, get these parameters.
    // If one of them is set, we do NOT obtain the real dimensions.
    // This way it is easy to scale the image to a certain dimension.
    if (!isset($params['width']) && !isset($params['height'])) {
        if (!($_image_data = @getimagesize($imgsrc))) {
            $smarty->trigger_error(__f("%s: Image '%s' is not a valid image file", array('pnimg', DataUtil::formatForDisplay($params['src']))));
            if ($nostoponerror == true) {
                return;
            } else {
                return false;
            }
        }
        $params['width']  = $_image_data[0];
        $params['height'] = $_image_data[1];
    }

    $basepath = (isset($params['fqurl']) && $params['fqurl']) ? pnGetBaseURL() : pnGetBaseURI();
    $params['src'] = $basepath . '/' . $imgsrc;

    $assign = isset($params['assign']) ? $params['assign'] : null;
    $retval = isset($params['retval']) ? $params['retval'] : null;

    unset($params['modname']);
    unset($params['assign']);
    unset($params['retval']);
    unset($params['altml']);
    unset($params['titleml']);
    unset($params['optional']);
    unset($params['default']);
    unset($params['set']);
    unset($params['nostoponerror']);
    unset($params['fqurl']);

    $imgtag = '<img ';
    foreach ($params as $key => $value) {
        $imgtag .= $key . '="' .$value  . '" ';
    }
    $imgtag .= '/>';

    if (!empty($retval) && isset($params[$retval])) {
        return $params[$retval];
    } else if (!empty($assign)) {
        $params['imgtag'] = $imgtag;
        $smarty->assign($assign, $params);
    } else {
        return $imgtag;
    }
}
