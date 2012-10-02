<?php
/**
 * Copyright Zikula Foundation 2009 - Profile module for Zikula
 *
 * This work is contributed to the Zikula Foundation under one or more
 * Contributor Agreements and licensed to You under the following license:
 *
 * @license GNU/GPLv3 (or at your option, any later version).
 * @package Profile
 *
 * Please see the NOTICE file distributed with this source code for further
 * information regarding copyright and licensing.
 */

/**
 * Returns (legacy) table information for the Profile module.
 * 
 * @return array Table/column definition array.
 */
function Profile_tables()
{
    // Initialise table array
    $dbtable = array();

    // Set the table name
    $dbtable['user_property'] = 'user_property';

    $dbtable['user_property_column'] = array('prop_id'             => 'id',
                                             'prop_label'          => 'label',
                                             'prop_dtype'          => 'dtype',
                                             'prop_modname'        => 'modname',
                                             'prop_weight'         => 'weight',
                                             'prop_validation'     => 'validation',
                                             'prop_attribute_name' => 'attributename');

    $dbtable['user_property_column_def'] = array('prop_id'             => 'I4 NOTNULL AUTO PRIMARY',
                                                 'prop_label'          => "C(255) NOTNULL DEFAULT ''",
                                                 'prop_dtype'          => "I4 NOTNULL DEFAULT 0",
                                                 'prop_modname'        => "C(64) NOTNULL DEFAULT ''",
                                                 'prop_weight'         => 'I4 NOTNULL DEFAULT 0',
                                                 'prop_validation'     => 'X',
                                                 'prop_attribute_name' => "C(80) NOTNULL DEFAULT ''");

    $dbtable['user_property_column_idx'] = array('prop_label' => 'prop_label',
                                                 'prop_attr'  => 'prop_attribute_name');

    //
    // declaration of user_data is still needed for upgrade purposes
    // in the Users module and cannot be removed
    //

    // Set the table name
    $dbtable['user_data'] = DBUtil::getLimitedTablename('user_data');

    $dbtable['user_data_column'] = array('uda_id'     => 'pn_uda_id',
                                         'uda_propid' => 'pn_uda_propid',
                                         'uda_uid'    => 'pn_uda_uid',
                                         'uda_value'  => 'pn_uda_value');

    $dbtable['user_data_column_def'] = array('uda_id'     => 'I4 NOTNULL AUTO PRIMARY',
                                             'uda_propid' => 'I4 NOTNULL DEFAULT 0',
                                             'uda_uid'    => 'I4 NOTNULL DEFAULT 0',
                                             'uda_value'  => 'XL NOTNULL');

    // Return the table information
    return $dbtable;
}
