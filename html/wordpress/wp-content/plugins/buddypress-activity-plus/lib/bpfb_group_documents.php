<?php
/**
 * This file contains the entire server-side support for
 * Group Documents plugin integration.
 */

/**
 * Registers required AJAX handlers.
 */
function bpfb_documents_add_ajax_hooks_handler () {
	add_action('wp_ajax_bpfb_preview_document', 'bpfb_documents_ajax_preview_document');
	add_action('wp_ajax_bpfb_remove_temp_documents', 'bpfb_documents_ajax_remove_temp_documents');
}

function bpfb_documents_add_js_globals () {
	printf(
		'<script type="text/javascript">var _bpfbDocumentsAllowedExtensions = [%s];</script>',
		'"' . join('", "', array_map('trim', explode(',', BPFB_DOCUMENTS_ALLOWED_EXTENSIONS))) . '"'
	);
}

/**
 * Injects required interface scripts.
 */
function bpfb_documents_add_cssjs_hooks_handler () {
	if (!defined('BP_GROUP_DOCUMENTS_IS_INSTALLED') || !BP_GROUP_DOCUMENTS_IS_INSTALLED) return false;

	add_action('wp_print_scripts', 'bpfb_documents_add_js_globals');
	wp_enqueue_script('bpfb_group_documents', BPFB_PLUGIN_URL . '/js/bpfb_group_documents.js', array('bpfb_interface_script'));
	wp_localize_script('bpfb_group_documents', 'l10nBpfbDocs', array(
		'add_documents' => __('Add documents', 'bpfb'),
		'no_group_selected' => __('Please select a group to upload to', 'bpfb'),
	));
}

/**
 * Handles document upload preview
 */
function bpfb_documents_ajax_preview_document () {
	$dir = BPFB_PLUGIN_BASE_DIR . '/img/';
	if (!class_exists('qqFileUploader')) require_once(BPFB_PLUGIN_BASE_DIR . '/lib/external/file_uploader.php');
	$uploader = new qqFileUploader(array_map('trim', explode(',', BPFB_DOCUMENTS_ALLOWED_EXTENSIONS)));
	$result = $uploader->handleUpload(BPFB_TEMP_IMAGE_DIR);

	if ($result['file']) {
		$doc_obj = new BP_Group_Documents();
		$doc_obj->file = $result['file'];
		$result['icon'] = $doc_obj->get_icon();
	}
	echo htmlspecialchars(json_encode($result), ENT_NOQUOTES);
	exit();
}

/**
 * Checks upload permissions.
 * Adapted from Group Documents plugin.
 */
function bpfb_documents_allowed ($group=false) {
	if (!$group) return false;

	$user = wp_get_current_user();
	$moderator_of = BP_Groups_Member::get_is_admin_of($user->ID) + BP_Groups_Member::get_is_mod_of($user->ID);
	$moderator_of = (is_array($moderator_of) && isset($moderator_of['groups'])) ? $moderator_of['groups'] : false;

	$is_mod = false;
	foreach ($moderator_of as $gm) {
		if ($gm->id == $group->id) {
			$is_mod = true; break;
		}
	}

	switch( get_option( 'bp_group_documents_upload_permission' ) ) {
		case 'mods_decide':
			switch( groups_get_groupmeta( $group->id, 'group_documents_upload_permission')) {
				case 'mods_only':
					if($is_mod) return true;
				break;
				case 'members':
				default:
					if( bp_group_is_member($group) )
						return true;
				break;
			}
		break;
		case 'mods_only':
			if($is_mod) return true;
		break;
		case 'members':
		default:
			if( bp_group_is_member($group) )
				return true;
		break;
	}
	return false;
}

/**
 * Handles save request.
 */
function bpfb_documents_code_before_save_handler ($code) {
	if (@$_POST['data']['bpfb_documents']) {
		$docs = bpfb_documents_move($_POST['data']['bpfb_documents']);
		$code = bpfb_documents_create_documents_tag($docs);
	}
	return $code;
}

/**
 * Clears up the temporary documents storage.
 */
function bpfb_documents_ajax_remove_temp_documents () {
	header('Content-type: application/json');
	parse_str($_POST['data'], $data);
	$data = is_array($data) ? $data : array('bpfb_documents'=>array());
	foreach ($data['bpfb_documents'] as $file) {
		@unlink (BPFB_TEMP_IMAGE_DIR . $file);
	}
	echo json_encode(array('status'=>'ok'));
	exit();
}

/**
 * Moves the documents to a place recognized by Group Documents plugin
 * and saves them.
 */
function bpfb_documents_move ($docs) {
	if (!$docs) return false;
	if (!is_array($docs)) $docs = array($docs);

	if (!(int)@$_POST['group_id']) return false;

	$group = new BP_Groups_Group((int)@$_POST['group_id']);
	if (!bpfb_documents_allowed($group)) return false;

	global $bp;
	$ret = array();

	// Construct the needed data
	$user = wp_get_current_user();
	$data = array (
		'user_id' => $user->ID,
		'group_id' => (int)@$_POST['group_id'],
		'created_ts' => time(),
		'modified_ts' => time(),
		'file' => '',
		'name' => '',
		'description' => @$_POST['content'],
	);

	foreach ($docs as $doc) {
		$doc_obj = new BP_Group_Documents();
		foreach ($data as $key=>$val) {
			$doc_obj->$key = $val;
		}
		$doc_obj->name = $doc;
		$doc_obj->file = apply_filters('bp_group_documents_filename_in', $doc);

		$tmp_doc = realpath(BPFB_TEMP_IMAGE_DIR . $doc);
		$new_doc = $doc_obj->get_path(0,1);

		if (@rename($tmp_doc, $new_doc) && $doc_obj->save(false)) {
			$ret[] = $doc_obj;
		}
	}

	return $ret;
}

/**
 * Creates the activity info message.
 * No shortcode, just renders the appropriate HTML.
 */
function bpfb_documents_create_documents_tag ($docs) {
	if (!$docs || !is_array($docs)) return false;

	global $bp;
	$uploaded = array();
	$group = false;
	foreach ($docs as $doc) {
		if (!$group) $group = new BP_Groups_Group($doc->group_id);
		$uploaded[] = '<a href="' . $doc->get_url() . '">' . esc_attr($doc->name) . '</a>';
	}
	return sprintf(
		__('%s uploaded new file(s): %s to %s', 'bpfb'),
		bp_core_get_userlink($bp->loggedin_user->id),
		join(', ', $uploaded),
		'<a href="' . bp_get_group_permalink($group) . '">' . bp_get_group_name($group) . '</a>'
	);
}

function bpfb_documents_create_core_defines () {
	if (!defined('BPFB_DOCUMENTS_ALLOWED_EXTENSIONS')) {
		$exts = get_option('bp_group_documents_valid_file_formats');
		if ($exts) {
			define('BPFB_DOCUMENTS_ALLOWED_EXTENSIONS', $exts);
		} else {
			define(
				'BPFB_DOCUMENTS_ALLOWED_EXTENSIONS',
				'adp, as, avi, bash, bz, bz2, c, cf, cpp, cs, css, deb, doc, docx, eps, exe, fh, fl, gif, gz, htm, html, iso, java, jpeg, jpg, json, m4a, mov, mdb, mp3, mpeg, msp, ods, odt, ogg, perl, pdf, php, png, ppt, pps, pptx, ps, rb, rtf, sh, sql, swf, tar, txt, wav, xls, xlsx, xml, zip'
			);
		}
	}
}

/**
 * This define is a list of allowed file extensions.
 * It can be overriden in wp-config.php

if (!defined('BPFB_DOCUMENTS_ALLOWED_EXTENSIONS')) {
	define(
		'BPFB_DOCUMENTS_ALLOWED_EXTENSIONS',
		'adp, as, avi, bash, bz, bz2, c, cf, cpp, cs, css, deb, doc, docx, eps, exe, fh, fl, gif, gz, htm, html, iso, java, jpeg, jpg, json, m4a, mov, mdb, mp3, mpeg, msp, ods, odt, ogg, perl, pdf, php, png, ppt, pps, pptx, ps, rb, rtf, sh, sql, swf, tar, txt, wav, xls, xlsx, xml, zip'
	);
}
*/

add_action('bpfb_add_ajax_hooks', 'bpfb_documents_add_ajax_hooks_handler');
add_action('bpfb_add_cssjs_hooks', 'bpfb_documents_add_cssjs_hooks_handler');
add_action('bpfb_code_before_save', 'bpfb_documents_code_before_save_handler');
add_action('bpfb_init', 'bpfb_documents_create_core_defines');