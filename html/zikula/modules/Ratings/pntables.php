<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pntables.php 17 2010-04-02 23:47:55Z yokav $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 */

/**
 * Get ratings pntable array
 * @author Jim McDonald
 * @return array
 */
function ratings_pntables()
{
    // Initialise table array
    $pntable = array();

    // Main ratings table
    $pntable['ratings'] = DBUtil::getLimitedTablename('ratings');
    $pntable['ratings_column'] = array('rid'        => 'pn_rid',
                                       'module'     => 'pn_module',
                                       'itemid'     => 'pn_itemid',
                                       'ratingtype' => 'pn_ratingtype',
                                       'rating'     => 'pn_rating',
                                       'numratings' => 'pn_numratings');
    $pntable['ratings_column_def'] = array('rid'        => 'I NOTNULL AUTO PRIMARY',
                                           'module'     => "C(32)  NOTNULL DEFAULT ''",
                                           'itemid'     => "C(64)  NOTNULL DEFAULT ''",
                                           'ratingtype' => "C(64)  NOTNULL DEFAULT ''",
                                           'rating'     => "F  NOTNULL DEFAULT '0'",
                                           'numratings' => "I NOTNULL DEFAULT '1'");
    $pntable['ratings_column_idx'] = array ('module' => 'module',
                                            'itemid' => 'itemid');

    // Ratings log table
    $pntable['ratingslog'] = DBUtil::getLimitedTablename('ratingslog');
    $pntable['ratingslog_column'] = array('id'       => 'pn_id',
                                          'ratingid' => 'pn_ratingid',
                                          'rating'   => 'pn_rating');
    $pntable['ratingslog_column_def'] = array('id'       => "C(32) NOTNULL DEFAULT ''",
                                              'ratingid' => "C(64) NOTNULL DEFAULT ''",
                                              'rating'   => "I NOTNULL DEFAULT '0'");

    // Return table information
    return $pntable;
}
