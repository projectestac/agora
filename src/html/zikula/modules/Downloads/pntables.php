<?php
// -----------------------------------------------------------------------------------
/**
 * Downloads
 *
 * Purpose of file:  provide database information
 *
 * @package      Downloads
 * @version      2.4
 * @author       Sascha Jost 
 * @link         http://www.cmods-dev.de
 * @copyright    Copyright (C) 2005 by Sascha Jost
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */
 // -----------------------------------------------------------------------------------


function downloads_pntables()
{
    // Initialise table array
    $pntable = array();

	// Get the DB prefix
	$prefix = pnConfigGetVar('prefix');

    $dl_categories = $prefix. '_downloads_categories';
    $pntable['downloads_categories']          = $dl_categories;
    $pntable['downloads_categories_column']   = array(

                            'cid'         	    => 'pn_cid',
                            'pid'            	=> 'pn_pid',
                           	'title'       	 	=> 'pn_title',
                           	'description' 	 	=> 'pn_description');

    $dl_downloads = $prefix. '_downloads_downloads';
    $pntable['downloads_downloads']          = $dl_downloads;
    $pntable['downloads_downloads_column']   = array(

                            'lid'			         => 'pn_lid',
							'cid'			         => 'pn_cid',
						    'status'                 => 'pn_status',
							'update'                 => 'pn_update',
							'title'			         => 'pn_title',
							'url'			         => 'pn_url',
							'filename'			     => 'pn_filename',
							'description'	         => 'pn_description',
							'date'			         => 'pn_date',
							'name'			         => 'pn_name',
							'email'			         => 'pn_email',
							'hits'			         => 'pn_hits',
							'submitter'		         => 'pn_submitter',
							'downloadratingsummary'	 => 'pn_ratingsummary',
							'totalvotes'		     => 'pn_totalvotes',
							'totalcomments'		     => 'pn_totalcomments',
							'filesize'		         => 'pn_filesize',
							'version'		         => 'pn_version',
							'homepage'		         => 'pn_homepage',
							'modid'		         	 => 'pn_modid',
							'objectid'		         => 'pn_objectid');

    $dl_modrequest = $prefix. '_downloads_modrequest';
    $pntable['downloads_modrequest']          = $dl_modrequest;
    $pntable['downloads_modrequest_column']   = array(
    
                            'requestid'		       => 'pn_requestid',
							'lid'			       => 'pn_lid',
							'cid'			       => 'pn_cid',
							'title'			       => 'pn_title',
							'url'			       => 'pn_url',
							'description'		   => 'pn_description',
							'modifysubmitter'	   => 'pn_modifysubmitter',
							'brokendownload'	   => 'pn_brokendownload',
							'name'			       => 'pn_name',
							'email'			       => 'pn_email',
							'filesize'		       => 'pn_filesize',
							'version'		       => 'pn_version',
							'homepage'		       => 'pn_homepage');

	// we need this for the update procedure
	
    $dl_votedata = $prefix. '_downloads_votedata';
    $pntable['downloads_votedata']        = $dl_votedata;
    $pntable['downloads_votedata_column'] = array(
    
                        'ratingdbid'            => 'pn_id',
						'ratinglid'			    => 'pn_lid',
						'ratinguser'			=> 'pn_user',
						'rating'			    => 'pn_rating',
						'ratinghostname'		=> 'pn_hostname',
						'ratingcomments'		=> 'pn_comments',
						'ratingtimestamp'		=> 'pn_timestamp');

    $dl_subcategories = $prefix. '_downloads_subcategories';
    $pntable['downloads_subcategories']        = $dl_subcategories;
    $pntable['downloads_subcategories_column'] = array(

                            'sid'          	    => 'pn_sid',
							'cid'          		=> 'pn_cid',
							'title'        		=> 'pn_title');

    $dl_newdownload = $prefix. '_downloads_newdownload';
    $pntable['downloads_newdownload']          = $dl_newdownload;
    $pntable['downloads_newdownload_column']   = array(

                                'lid'		    => 'pn_lid',
    							'cid'			=> 'pn_cid',
    							'sid'			=> 'pn_sid',
    							'title'			=> 'pn_title',
    							'url'			=> 'pn_url',
    							'description'	=> 'pn_description',
    							'name'			=> 'pn_name',
    							'email'			=> 'pn_email',
    							'submitter'		=> 'pn_submitter',
    							'filesize'		=> 'pn_filesize',
    							'version'		=> 'pn_version',
    							'homepage'		=> 'pn_homepage');
    							
    							
    //***************************************************************
    // dummy tables for import
    
    $dm_categories = $prefix. '_dummy_categories';
    $pntable['dummy_categories']          = $dm_categories;
    $pntable['dummy_categories_column']   = array(

                            'cid'         	    => 'pn_cid',
                            'pid'				=> 'pn_pid',
                           	'title'       	 	=> 'pn_title',
                           	'description' 	 	=> 'pn_description');

    $dm_downloads = $prefix. '_dummy_downloads';
    $pntable['dummy_downloads']          = $dm_downloads;
    $pntable['dummy_downloads_column']   = array(

                            'lid'			         => 'pn_lid',
							'cid'			         => 'pn_cid',
							'sid'					 => 'pn_sid',
							'title'			         => 'pn_title',
							'url'			         => 'pn_url',
							'description'	         => 'pn_description',
							'date'			         => 'pn_date',
							'name'			         => 'pn_name',
							'email'			         => 'pn_email',
							'hits'			         => 'pn_hits',
							'submitter'		         => 'pn_submitter',
							'downloadratingsummary'	 => 'pn_ratingsummary',
							'totalvotes'		     => 'pn_totalvotes',
							'totalcomments'		     => 'pn_totalcomments',
							'filesize'		         => 'pn_filesize',
							'version'		         => 'pn_version',
							'homepage'		         => 'pn_homepage');

    $dm_modrequest = $prefix. '_dummy_modrequest';
    $pntable['dummy_modrequest']          = $dm_modrequest;
    $pntable['dummy_modrequest_column']   = array(
    
                            'requestid'		       => 'pn_requestid',
							'lid'			       => 'pn_lid',
							'cid'			       => 'pn_cid',
							'sid'				   => 'pn_sid',
							'title'			       => 'pn_title',
							'url'			       => 'pn_url',
							'description'		   => 'pn_description',
							'modifysubmitter'	   => 'pn_modifysubmitter',
							'brokendownload'	   => 'pn_brokendownload',
							'name'			       => 'pn_name',
							'email'			       => 'pn_email',
							'filesize'		       => 'pn_filesize',
							'version'		       => 'pn_version',
							'homepage'		       => 'pn_homepage');
	
	$dm_subcategories = $prefix. '_dummy_subcategories';
    $pntable['dummy_subcategories']        = $dm_subcategories;
    $pntable['dummy_subcategories_column'] = array(

                            'sid'          	    => 'pn_sid',
							'cid'          		=> 'pn_cid',
							'title'        		=> 'pn_title');
							
	// old tables for upgrade
    $pntable['downloads_editorials'] = $prefix. '_downloads_editorials';
    $pntable['downloads_newdownload'] = $prefix. '_downloads_newdownload';
    $pntable['downloads_votedata'] = $prefix. '_downloads_votedata';
    							
    // output
    return $pntable;
}
?>