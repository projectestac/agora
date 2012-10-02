<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2001, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pntables.php 27341 2009-11-01 20:07:25Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_System_Modules
 * @subpackage Users
 * @author Mark West
 */

/**
 * Populate pntables array for Users module
 *
 * This function is called internally by the core whenever the module is
 * loaded. It delivers the table information to the core.
 * It can be loaded explicitly using the pnModDBInfoLoad() API function.
 *
 * @author       Mark West
 * @return       array       The table information.
 */
function Users_pntables()
{
    // Initialise table array
    $pntable = array();

    // Get the name for the Users item table.  This is not necessary
    // but helps in the following statements and keeps them readable
    $users = DBUtil::getLimitedTablename('users');

    // Set the table name
    $pntable['users'] = $users;

    // Set the column names.  Note that the array has been formatted
    // on-screen to be very easy to read by a user.
    $pntable['users_column'] = array ('uid'             => 'pn_uid',
                                      'uname'           => 'pn_uname',
                                      'email'           => 'pn_email',
                                      'user_regdate'    => 'pn_user_regdate',
                                      'user_viewemail'  => 'pn_user_viewemail',
                                      'user_theme'      => 'pn_user_theme',
                                      'pass'            => 'pn_pass',
                                      'storynum'        => 'pn_storynum',
                                      'ublockon'        => 'pn_ublockon',
                                      'ublock'          => 'pn_ublock',
                                      'theme'           => 'pn_theme',
                                      'counter'         => 'pn_counter',
                                      'activated'       => 'pn_activated',
                                      'lastlogin'       => 'pn_lastlogin',
                                      'validfrom'       => 'pn_validfrom',
                                      'validuntil'      => 'pn_validuntil',
                                      'hash_method'     => 'pn_hash_method');

    $pntable['users_column_def'] = array('uid'             => "I4 PRIMARY AUTO",
                                         'uname'           => "C(25) NOTNULL DEFAULT ''",
                                         'email'           => "C(60) NOTNULL DEFAULT ''",
                                         'user_regdate'    => "T DEFDATETIME NOTNULL DEFAULT '1970-01-01 00:00:00'",
                                         'user_viewemail'  => "I2 DEFAULT 0",
                                         'user_theme'      => "C(64) DEFAULT ''",
                                         'pass'            => "C(128) NOTNULL DEFAULT ''",
                                         'storynum'        => "I(4) NOTNULL DEFAULT '10'",
                                         'umode'           => "C(10) NOTNULL DEFAULT ''",
                                         'uorder'          => "I1 NOTNULL DEFAULT '0'",
                                         'thold'           => "I1 NOTNULL DEFAULT '0'",
                                         'noscore'         => "I1 NOTNULL DEFAULT '0'",
                                         'ublockon'        => "I1 NOTNULL DEFAULT '0'",
                                         'ublock'          => "X NOTNULL DEFAULT ''",
                                         'theme'           => "C(255) NOTNULL DEFAULT ''",
                                         'commentmax'      => "I4 NOTNULL DEFAULT '4096'",
                                         'counter'         => "I4 NOTNULL DEFAULT '0'",
                                         'activated'       => "I1 NOTNULL DEFAULT '0'",
                                         'lastlogin'       => "T DEFDATETIME NOTNULL DEFAULT '1970-01-01 00:00:00'",
                                         'validfrom'       => "I4 NOTNULL DEFAULT '0'",
                                         'validuntil'      => "I4 NOTNULL DEFAULT '0'",
                                         'hash_method'     => "I1 NOTNULL DEFAULT '8'");

    $pntable['users_column_idx'] = array('uname' => 'uname',
                                         'email' => 'email');

    // Turn on object attribution for the users table. This enables other modules to dynamically
    // add information for a user. These information are stored in the ObjectData modules
    // objectdata_attributes table
    $pntable['users_db_extra_enable_attribution'] = true;
    // needed for meta data? not sure....
    $pntable['users_primary_key_column'] = 'uid';

    // Temp Table - Moderation
    // Get the name for the Temporary item table.  This is not necessary
    // but helps in the following statements and keeps them readable
    $users_temp = DBUtil::getLimitedTablename('users_temp');

    // Set the table name
    $pntable['users_temp'] = $users_temp;

    // Set the column names.  Note that the array has been formatted
    // on-screen to be very easy to read by a user.
    $pntable['users_temp_column'] = array ('tid'      => 'pn_tid',
                                           'uname'    => 'pn_uname',
                                           'email'    => 'pn_email',
                                           'femail'   => 'pn_femail',
                                           'pass'     => 'pn_pass',
                                           'dynamics' => 'pn_dynamics',
                                           'comment'  => 'pn_comment',
                                           'type'     => 'pn_type',
                                           'tag'      => 'pn_tag');

    $pntable['users_temp_column_def'] = array('tid'      => "I4 PRIMARY AUTO",
                                              'uname'    => "C(25) NOTNULL DEFAULT ''",
                                              'email'    => "C(60) NOTNULL DEFAULT ''",
                                              'femail'   => "I1 NOTNULL DEFAULT '0'",
                                              'pass'     => "C(128) NOTNULL DEFAULT ''",
                                              'dynamics' => "XL NOTNULL",
                                              'comment'  => "C(254) NOTNULL DEFAULT ''",
                                              'type'     => "I1 NOTNULL DEFAULT '0'",
                                              'tag'      => "I1 NOTNULL DEFAULT '0'");

    // sessions
    // Get the name for the session item table.  This is not necessary
    // but helps in the following statements and keeps them readable
    $session_info = DBUtil::getLimitedTablename('session_info');

    // Set the table name
    $pntable['session_info'] = $session_info;

    // Set the column names.  Note that the array has been formatted
    // on-screen to be very easy to read by a user.
    $pntable['session_info_column'] = array ('sessid'    => 'pn_sessid',
                                             'ipaddr'    => 'pn_ipaddr',
                                             'lastused'  => 'pn_lastused',
                                             'uid'       => 'pn_uid',
                                             'remember'  => 'pn_remember',
                                             'vars'      => 'pn_vars');

    $pntable['session_info_column_def'] = array('sessid'    => "C(40) PRIMARY NOTNULL DEFAULT ''",
                                                'ipaddr'    => "C(32) NOTNULL DEFAULT ''",
                                                'lastused'  => "T DEFAULT '1970-01-01 00:00:00'",
                                                'uid'       => "I4 DEFAULT '0'",
                                                'remember'  => "I1 NOTNULL DEFAULT '0'",
                                                'vars'      => "XL NOTNULL" );

// commented out because of [#5295]
//    $pntable['session_info_column_idx'] = array('lastused' => 'lastused');

    if (isset($_SESSION['_PNUpgrader']['_PNUpgradeFrom76x'])) {
        // temporary tables for the 76x -> .8 migration path
        $users76x = DBUtil::getLimitedTablename('users76x');
        $pntable['users76x'] = $users76x;
        $pntable['users76x_column'] = array ('uid'             => 'pn_uid',
                                             'name'            => 'pn_name',
                                             'uname'           => 'pn_uname',
                                             'email'           => 'pn_email',
                                             'femail'          => 'pn_femail',
                                             'url'             => 'pn_url',
                                             'user_avatar'     => 'pn_user_avatar',
                                             'user_regdate'    => 'pn_user_regdate',
                                             'user_icq'        => 'pn_user_icq',
                                             'user_occ'        => 'pn_user_occ',
                                             'user_from'       => 'pn_user_from',
                                             'user_intrest'    => 'pn_user_intrest',
                                             'user_sig'        => 'pn_user_sig',
                                             'user_viewemail'  => 'pn_user_viewemail',
                                             'user_theme'      => 'pn_user_theme',
                                             'user_aim'        => 'pn_user_aim',
                                             'user_yim'        => 'pn_user_yim',
                                             'user_msnm'       => 'pn_user_msnm',
                                             'pass'            => 'pn_pass',
                                             'storynum'        => 'pn_storynum',
                                             'umode'           => 'pn_umode',
                                             'uorder'          => 'pn_uorder',
                                             'thold'           => 'pn_thold',
                                             'noscore'         => 'pn_noscore',
                                             'bio'             => 'pn_bio',
                                             'ublockon'        => 'pn_ublockon',
                                             'ublock'          => 'pn_ublock',
                                             'theme'           => 'pn_theme',
                                             'commentmax'      => 'pn_commentmax',
                                             'counter'         => 'pn_counter',
                                             'timezone_offset' => 'pn_timezone_offset');

        $pntable['users76x_column_def'] = array(
                        'uid'	    => "I4 PRIMARY AUTO",
  		    			'name'		=> "C(60) NOTNULL DEFAULT ''",
	    				'uname'		=> "C(25) NOTNULL DEFAULT ''",
  					    'email'		=> "C(60) NOTNULL DEFAULT ''",
  				    	'femail'	=> "C(60) NOTNULL DEFAULT ''",
  			    		'url'		=> "C(254) NOTNULL DEFAULT ''",
  		    			'user_avatar'	=> "C(30) DEFAULT ''",
  	    				'user_regdate'	=> "C(20) NOTNULL DEFAULT ''",
      					'user_icq'	=> "C(15) DEFAULT ''",
  					    'user_occ'	=> "C(100) DEFAULT ''",
  				    	'user_from'	=> "C(100) DEFAULT ''",
  			    		'user_intrest'	=> "C(150) DEFAULT ''",
  		    			'user_sig'	=> "C(255) DEFAULT ''",
  	    				'user_viewemail'	=> "I4 DEFAULT '0'",
      					'user_theme'	=> "I4 DEFAULT '0'",
  				    	'user_aim'	=> "C(18) DEFAULT ''",
  			    		'user_yim'	=> "C(25) DEFAULT ''",
  		    			'user_msnm'	=> "C(25) DEFAULT ''",
  	    				'pass'		=> "C(40) NOTNULL DEFAULT ''",
      					'storynum'	=> "I4 NOTNULL DEFAULT '10'",
  					    'umode'		=> "C(10) NOTNULL DEFAULT ''",
  				    	'uorder'	=> "I1 NOTNULL DEFAULT '0'",
  			    		'thold'		=> "I1 NOTNULL DEFAULT '0'",
  		    			'noscore'	=> "I1 NOTNULL DEFAULT '0'",
      					'bio'		=> "X NOTNULL DEFAULT ''",
  				    	'ublockon'	=> "I1 NOTNULL DEFAULT '0'",
  			    		'ublock'	=> "X NOTNULL DEFAULT ''",
  		    			'theme'		=> "C(255) NOTNULL DEFAULT ''",
  	    				'commentmax'	=> "I4 NOTNULL DEFAULT '4096'",
      	 				'counter'	=> "I4 NOTNULL DEFAULT '0'",
  	                    'timezone_offset'	=> "N(3.1) NOTNULL DEFAULT '0.0'");

        $pntable['users76x_column_idx'] = array('uname' => 'uname',
                                                'email' => 'email');
    }

    // Return the table information
    return $pntable;
}
