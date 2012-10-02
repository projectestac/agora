<?php
/**
 * Copyright Zikula Foundation 2011 - Profile module for Zikula
 *
 * This work is contributed to the Zikula Foundation under one or more
 * Contributor Agreements and licensed to You under the following license:
 *
 * @license GNU/LGPLv3 (or at your option, any later version).
 * @package Profile
 *
 * Please see the NOTICE file distributed with this source code for further
 * information regarding copyright and licensing.
 */

/**
 * Section to show the latest articles of a user.
 *
 * Parameters passed in the $args array:
 * -------------------------------------
 * numeric uid      The user account id of the user for whom to return comments.
 * numeric numitems Number of comments to show.
 * 
 * @param array $args All parameters passed to this function.
 * 
 * @return array An array of articles.
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

    return ModUtil::apiFunc('News', 'user', 'getall', $args);
}
