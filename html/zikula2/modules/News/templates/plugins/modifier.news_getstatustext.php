<?php
/**
* Zikula Application Framework
*
* @copyright (c), Zikula Development Team
* @link http://www.zikula.org
* @version $Id:  $
* @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
* @package Zikula_Template_Plugins
* @subpackage Modifiers
*/

/**
* Smarty modifier to get the respective status text
*
* Example
*   <!--[$article.published_status|news_getstatustext]-->
* 
* @author       Mateo Tibaquira [mateo]
* @since        17/11/2009
* @param        int      $status       The status to transform
* @return       string   the modified output
*/
function smarty_modifier_news_getstatustext($status)
{
    $dom    = ZLanguage::getModuleDomain('News');
    $output = __('Unknown status', $dom);

    switch ($status)
    {
        case 0:
            $output = __('Published', $dom);
            break;

        case 1:
            $output = __('Rejected', $dom);
            break;

        case 2:
            $output = __('Pending Review', $dom);
            break;

        case 3:
            $output = __('Archived', $dom);
            break;

        case 4:
            $output = __('Draft', $dom);
            break;
    }

    return $output;
}
