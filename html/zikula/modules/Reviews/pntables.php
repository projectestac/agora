<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pntables.php 334 2009-11-09 05:51:54Z drak $
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

    // Full table definition
    $pntable['reviews'] = DBUtil::getLimitedTablename('reviews');
    $pntable['reviews_column'] = array ('id'        => 'pn_id',
                                        'date'      => 'pn_cr_date',
                                        'title'     => 'pn_title',
                                        'urltitle'  => 'pn_urltitle',
                                        'text'      => 'pn_text',
                                        'reviewer'  => 'pn_reviewer',
                                        'email'     => 'pn_email',
                                        'score'     => 'pn_score',
                                        'cover'     => 'pn_cover',
                                        'url'       => 'pn_url',
                                        'url_title' => 'pn_url_title',
                                        'hits'      => 'pn_hits',
                                        'rlanguage' => 'pn_language',
                                        'language'  => 'pn_language',
                                        'status'    => 'pn_status');
    $pntable['reviews_column_def'] = array('id'        => 'I(11) NOTNULL AUTOINCREMENT PRIMARY',
                                           'title'     => "C(150) NOTNULL DEFAULT ''",
                                           'urltitle'  => "X NOTNULL DEFAULT ''",
                                           'text'      => 'X NOTNULL',
                                           'reviewer'  => 'C(20) DEFAULT NULL',
                                           'email'     => 'C(60) DEFAULT NULL',
                                           'score'     => "I(11) NOTNULL DEFAULT '0'",
                                           'cover'     => "C(100) NOTNULL DEFAULT ''",
                                           'url'       => "C(254) NOTNULL DEFAULT ''",
                                           'url_title' => "C(150) NOTNULL DEFAULT ''",
                                           'hits'      => "I(11) NOTNULL DEFAULT '0'",
                                           'language'  => "C(30) NOTNULL DEFAULT ''",
                                           'status'    => "I(4) NOTNULL DEFAULT '0'");

    // Enable categorization services
    $pntable['reviews_db_extra_enable_categorization'] = pnModGetVar('Reviews', 'enablecategorization');
    $pntable['reviews_primary_key_column'] = 'id';

    // add standard data fields
    ObjectUtil::addStandardFieldsToTableDefinition($pntable['reviews_column'], 'pn_');
    ObjectUtil::addStandardFieldsToTableDataDefinition($pntable['reviews_column_def']);

    // legacy tables
    $pntable['reviews_add'] = DBUtil::getLimitedTablename('reviews_add');
    $pntable['reviews_main'] = DBUtil::getLimitedTablename('reviews_main');
    $pntable['reviews_comments'] = DBUtil::getLimitedTablename('reviews_comments');

    return $pntable;
}
