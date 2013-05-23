<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage Reviews
 */

/**
 * Reviews table information
*/
function Reviews_tables()
{
    // Initialise table array
    $tables = array();

    // legacy Reviews comments table
    $tables['reviews_comments'] = DBUtil::getLimitedTablename('reviews_comments');
    $tables['reviews_comments_column'] = array(
        'cid'       => 'pn_cid',
        'rid'       => 'pn_rid',
        'userid'    => 'pn_userid',
        'date'      => 'pn_date',
        'comments'  => 'pn_comments',
        'score'     => 'pn_score'
    );
    $tables['reviews_comments_column_def'] = array(
        'cid'       => 'I(11) NOTNULL AUTOINCREMENT PRIMARY',
        'rid'       => "I(11) NOTNULL DEFAULT '0'",
        'userid'    => 'C(25) NOTNULL',
        'date'      => 'T DEFAULT NULL',
        'comments'  => 'X DEFAULT NULL',
        'score'     => "I(11) NOTNULL DEFAULT '0'"
    );

    return $tables;
}
