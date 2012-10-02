<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.modulejavascript.php 27368 2009-11-02 20:19:51Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to include module specific javascripts
 *
 * available parameters:
 *  - modname     module name (if not set, the current module is assumed)
 *                if modname="" than we will look into the main javascript folder
 *  - script      name of the external javascript file (mandatory)
 *  - modonly     javascript will only be included when the the current module is $modname
 *  - onload      function to be called with onLoad handler in body tag, makes sense with assign set only, see example #2
 *  - assign      if set, the tag and the script filename are returned
 *
 * Example: <!--[modulejavascript modname=foobar script=openwindow.js modonly=1 ]-->
 * Output:  <script type="text/javascript" src="modules/foobar/pnjavascript/openwindow.js">
 *
 * Example: <!--[modulejavascript modname=foobar script=openwindow.js modonly=1 onload="dosomething()" assign=myjs ]-->
 * Output: nothing, but assigns a variable containing several values:
 *      $myjs.scriptfile = "modules/foobar/pnjavascript/openwindow.js"
 *      $myjs.tag = "<script type=\"text/javascript\" src=\"modules/foobar/pnjavascript/openwindow.js\"></script>"
 *      $myjs.onload = "onLoad=\"dosomething()\"";
 *      Possible code in master.htm would be:
 *
 *      ...
 *      <!--[ $myjs.tag ]-->
 *      </head>
 *      <body <!--[ $myjs.onload ]--> >
 *      ...
 *
 *      which results in
 *
 *      ...
 *      <script type="text/javascript" src="modules/foobar/pnjavascript/openwindow.js"></script>
 *      </head>
 *      <body onLoad="dosomething()" >
 *      ...
 *
 *      if foobar is the current module.
 *
 * @author       Frank Schummertz
 * @since        13. June 2004
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @return       string      The tag
 */
function smarty_function_modulejavascript($params, &$smarty)
{
	// check if script is set (mandatory)
    if (!isset($params['script'])) {
        $smarty->trigger_error(__f('Error! in %1$s: the %2$s parameter must be specified.', array('modulejavascript', 'script')));
        return false;
    }

    // check if modname is set and if not, if $modonly is set
    if (!isset($params['modname'])) {
        if (isset($params['modonly'])) {
            // error - we want $modonly only with $modname
            $smarty->trigger_error(__f('Error! in %1$s: parameter \'%2$s\' only supported together with \'%3$s\' set.', array('modulejavascript', 'modonly', 'modname')));
            return;
        }
        // we use the current module name
        $params['modname'] = pnModGetName();
    }

    if (isset($params['modonly']) && ($params['modname'] <> pnModGetName())) {
        // current module is not $modname - do nothing and return silently
        return;
    }

    // if modname is empty, we will search the main javascript folder
    if ($params['modname'] == '') {
        $searchpaths = array('javascript', 'javascript/ajax');
    } else {
	    // theme directory
        $theme         = DataUtil::formatForOS(pnUserGetTheme());
        $osmodname     = DataUtil::formatForOS($params['modname']);
        $themepath     = "themes/$theme/javascript/$osmodname";

	    // module directory
        $modinfo       = pnModGetInfo(pnModGetIDFromName($params['modname']));
	    $osmoddir      = DataUtil::formatForOS($modinfo['directory']);
        $modpath       = "modules/$osmoddir/pnjavascript";
        $syspath       = "system/$osmoddir/pnjavascript";

        $searchpaths = array( $themepath, $modpath, $syspath );
    }
    $osscript = DataUtil::formatForOS($params['script']);

	// search for the javascript
    $scriptsrc = '';
	foreach($searchpaths as $path) {
        if (file_exists("$path/$osscript") && is_readable("$path/$osscript")) {
		    $scriptsrc = "$path/$osscript";
			break;
		}
    }

	// if no module javascript has been found then return no content
	$tag = (empty($scriptsrc)) ? '' : '<script type="text/javascript" src="' . $scriptsrc . '"></script>';

    // onLoad event handler used?
    $onload = (isset($params['onload'])) ? 'onLoad="' . $params['onload'] . '"' : '';

    if (isset($params['assign'])) {
        $return = array();
        $return['scriptfile'] = $scriptsrc;
        $return['tag']        = $tag;
        $return['onload']     = $onload;
        $smarty->assign($params['assign'], $return);
    } else {
        return $tag;
    }
}
