<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pntables.php 600 2009-11-17 04:59:02Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage Reviews
 */

/**
 * reviews table information
*/
function Reviews_pntables()
{
    // Initialise table array
    $pntable = array();

    // legacy Reviews comments table
    $pntable['reviews_comments'] = DBUtil::getLimitedTablename('reviews_comments');
    $pntable['reviews_comments_column'] = array(
        'cid'       => 'pn_cid',
        'rid'       => 'pn_rid',
        'userid'    => 'pn_userid',
        'date'      => 'pn_date',
        'comments'  => 'pn_comments',
        'score'     => 'pn_score'
    );
    $pntable['reviews_comments_column_def'] = array(
        'cid'       => 'I(11) NOTNULL AUTOINCREMENT PRIMARY',
        'rid'       => "I(11) NOTNULL DEFAULT '0'",
        'userid'    => 'C(25) NOTNULL',
        'date'      => 'T DEFAULT NULL',
        'comments'  => 'X DEFAULT NULL',
        'score'     => "I(11) NOTNULL DEFAULT '0'"
    );

    return $pntable;
}
