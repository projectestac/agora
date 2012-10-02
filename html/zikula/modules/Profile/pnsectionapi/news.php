<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c), Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: news.php 69 2009-12-05 10:28:06Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_System_Modules
 * @subpackage Profile
*/

/**
 * Section to show the latest articles of an user
 *
 * @author Mateo Tibaquira
 * @param  integer   numitems   number of headings to show
 * @return array of articles
 */
function Profile_sectionapi_news($args)
{
    // validates an the uid parameter
    if (!isset($args['uid']) || empty($args['uid'])) {
        return false;
    }

    // assures the number of items to retrieve
    if (!isset($args['numitems']) || empty($args['numitems'])) {
        $args['numitems'] = 5;
    }

    // only published articles
    $args['status'] = 0;

    // exclude future articles
    $args['filterbydate'] = true;

    // removes unallowed parameters
    if (isset($args['from']))  unset($args['from']);
    if (isset($args['to']))    unset($args['to']);
    if (isset($args['query'])) unset($args['query']);

    return pnModAPIFunc('News', 'user', 'getall', $args);
}
