<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.get_country_name_for_country_code.php 28020 2009-12-30 12:22:34Z rgasch $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package ZikulaTemplate_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to get a country name from a given country name
 *
 * Available parameters:
 *   - assign:   If set, the results are assigned to the corresponding variable instead of printed out
 *   - code:     Country code to get the corresponding name for
 *
 * Example
 *   <!--[get_country_name_for_country_code  code=ZZ]-->
 *
 *
 * @author      Robert Gasch
 * @since        12 December 2007
 * @param       array       $params      All attributes passed to this function from the template
 * @param       object      &$smarty     Reference to the Smarty object
 * @return      string      the value of the last status message posted, or void if no status message exists
 */
function smarty_function_get_country_name_for_country_code ($params, &$smarty)
{
    $code   = strtolower(isset($params['code']) ? $params['code'] : 'ZZ');
    $assign = isset($params['assign']) ? $params['assign'] : null;

    $countries = countrylist();
    if (isset($countries[$code])) { 
        $result = $countries[$code];
    } else {
        $result = $countries['ZZ'];
    }

    if ($assign) {
        $smarty->assign ($assign, $result);
    } else {
        return $result;
    }
}
