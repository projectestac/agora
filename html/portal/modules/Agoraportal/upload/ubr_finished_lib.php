<?php
//******************************************************************************************************
//   ATTENTION: THIS FILE HEADER MUST REMAIN INTACT. DO NOT DELETE OR MODIFY THIS FILE HEADER.
//
//   Name: ubr_finished_lib.php
//   Revision: 1.4
//   Date: 4/13/2008 11:24:15 AM
//   Link: http://uber-uploader.sourceforge.net
//   Initial Developer: Peter Schmandra
//   Description: Library for uu_finished.php
//
//   Contributor: http://www.php.net/manual/en/function.xml-parse.php
//
//   Licence:
//   The contents of this file are subject to the Mozilla Public
//   License Version 1.1 (the "License"); you may not use this file
//   except in compliance with the License. You may obtain a copy of
//   the License at http://www.mozilla.org/MPL/
//
//   Software distributed under the License is distributed on an "AS
//   IS" basis, WITHOUT WARRANTY OF ANY KIND, either express or
//   implied. See the License for the specific language governing
//   rights and limitations under the License.
//
//***************************************************************************************************************

//error_reporting(E_ALL);

/////////////////////////////////////////////////////////////////////////////
// Get/Set/Store uploaded file slot name, file name, file size and file type
/////////////////////////////////////////////////////////////////////////////
class FileInfo{
	var $slot = '';
	var $name = '';
	var $size = 0;
	var $type = '';

	function getFileInfo($key){
		if(strcasecmp($key, 'slot') == 0){ return $this->slot; }
		elseif(strcasecmp($key, 'name') == 0){ return $this->name; }
		elseif(strcasecmp($key, 'size') == 0){ return $this->size; }
		elseif(strcasecmp($key, 'type') == 0){ return $this->type; }
		else{ print "Error: Invalid get member $key value on FileInfo object<br>\n"; }
	}

	function setFileInfo($key, $value){
		if(strcasecmp($key, 'slot') == 0){ $this->slot = $value; }
		elseif(strcasecmp($key, 'name') == 0){ $this->name = $value; }
		elseif(strcasecmp($key, 'size') == 0){ $this->size = $value; }
		elseif(strcasecmp($key, 'type') == 0){ $this->type = $value; }
		else{ print "Error: Invalid set member $key value on FileInfo object<br>\n"; }
	}
}

/////////////////////////////////////////////////////////////////////
// XML Parser
// Contributor: http://www.php.net/manual/en/function.xml-parse.php
/////////////////////////////////////////////////////////////////////
class XML_Parser{
	var $XML_Parser;
	var $error_msg = '';
	var $delete_xml_file = 1;
	var $in_error = 0;
	var $xml_file = '';
	var $raw_xml_data = '';
	var $xml_data = array();
	var $upload_id = '';

	function setXMLFileDelete($delete_xml_file){ $this->delete_xml_file = $delete_xml_file; }
	function setXMLFile($temp_dir, $upload_id){
		$this->xml_file = $temp_dir . $upload_id . ".redirect";
		$this->upload_id = $upload_id;
	}
	function getError(){ return $this->in_error; }
	function getErrorMsg(){ return $this->error_msg; }
	function getRawXMLData(){ return $this->raw_xml_data; }
	function getXMLData(){ return $this->xml_data; }

	function startHandler($parser, $name, $attribs){
		$_content = array('name' => $name);

		if(!empty($attribs)){ $_content['attrs'] = $attribs; }

		array_push($this->xml_data, $_content);
	}

	function dataHandler($parser, $data){
		if(count(trim($data))){
			$_data_idx = count($this->xml_data) - 1;

			if(!isset($this->xml_data[$_data_idx]['content'])){ $this->xml_data[$_data_idx]['content'] = ''; }

			$this->xml_data[$_data_idx]['content'] .= $data;
		}
	}

	function endHandler($parser, $name){
		if(count($this->xml_data) > 1){
			$_data = array_pop($this->xml_data);
			$_data_idx = count($this->xml_data) - 1;
			$this->xml_data[$_data_idx]['child'][] = $_data;
		}
	}

	function parseFeed(){
		if(is_file($this->xml_file) && is_readable($this->xml_file)){
			// open upload_id.redirect file
			$xfp = fopen($this->xml_file, "rb");

			if(is_resource($xfp)){
				$xml_post_data = null;

				// read upload_id.redirect file
				while($xml_input = fread($xfp, filesize($this->xml_file))){ $xml_post_data .= $xml_input; }

				fclose($xfp);

				// store the raw xml file
				$this->raw_xml_data = $xml_post_data;

				// format the xml data into 1 long string
				$xml_post_data = preg_replace('/\>(\n|\r|\r\n| |\t)*\</','><', $xml_post_data);

				// create the xml parser
				$this->XML_Parser = xml_parser_create('');

				// set xml parser options
				xml_set_object($this->XML_Parser, $this);
				xml_parser_set_option($this->XML_Parser, XML_OPTION_CASE_FOLDING, false);
				xml_set_element_handler($this->XML_Parser, "startHandler", "endHandler");
				xml_set_character_data_handler($this->XML_Parser, "dataHandler");

				// parse upload_id.redirect file
				if(!xml_parse($this->XML_Parser, $xml_post_data)){
					$this->in_error = true;
					$this->error_msg = sprintf("<font color='red'>XML ERROR</font>: %s at line %d", xml_error_string(xml_get_error_code($this->XML_Parser)), xml_get_current_line_number($this->XML_Parser));
				}

				xml_parser_free($this->XML_Parser);

				// delete upload_id.redirect file
				if($this->delete_xml_file){
					for($i = 0; $i < 3; $i++){
						if(@unlink($this->xml_file)){ break; }
						else{ sleep(1); }
					}
				}
			}
			else{
				$this->in_error = true;
				$this->error_msg = "<font color='red'>ERROR</font>: Failed to open file handle";
			}
		}
		else{
			$this->in_error = true;
			$this->error_msg = "<font color='red'>ERROR</font>: Failed to open redirect file " . $this->upload_id . ".redirect";
		}
	}
}

/////////////////////////////////////////
// Parse config data out of the xml data
/////////////////////////////////////////
function getConfigData($_XML_DATA){
	$_config_data = array();
	$num_configs = count($_XML_DATA[0]['child'][0]['child']);

	//config data is assumed to be stored in $_XML_DATA[0]['child'][0]
	for($i = 0; $i < $num_configs; $i++){
		if(isset($_XML_DATA[0]['child'][0]['child'][$i]['name']) && isset($_XML_DATA[0]['child'][0]['child'][$i]['content'])){
			$key = $_XML_DATA[0]['child'][0]['child'][$i]['name'];
			$value = $_XML_DATA[0]['child'][0]['child'][$i]['content'];
			$_config_data[$key] = $value;
		}
	}

	return $_config_data;
}

/////////////////////////////////////////
// Parse post data out of the xml data
/////////////////////////////////////////
function getpostData($_XML_DATA){
	$_post_value = array();
	$_post_data = array();
	$num_posts = count($_XML_DATA[0]['child'][1]['child']);

	for($i = 0; $i < $num_posts; $i++){
		if(isset($_XML_DATA[0]['child'][1]['child'][$i]['name']) && isset($_XML_DATA[0]['child'][1]['child'][$i]['content'])){
			$_post_value[$_XML_DATA[0]['child'][1]['child'][$i]['name']][$i] = $_XML_DATA[0]['child'][1]['child'][$i]['content'];
		}
	}

	foreach($_post_value as $key => $value){
		if(count($_post_value[$key]) > 1){
			$j = 0;

			foreach($_post_value[$key] as $content){
				$_post_data[$key][$j] = $content;
				$j++;
			}
		}
		else{
			foreach($_post_value[$key] as $content){ $_post_data[$key] = $content; }
		}
	}

	return $_post_data;
}

/////////////////////////////////////////
// Parse file data out of the xml data
/////////////////////////////////////////
function getFileData($_XML_DATA){
	$_file_data = array();
	$num_files = count($_XML_DATA[0]['child'][2]['child']);

	//file data is assumed to be stored in $_XML_DATA[0]['child'][2]
	for($i = 0; $i < $num_files; $i++){
		$file_info = new FileInfo;

		$file_info->setFileInfo($_XML_DATA[0]['child'][2]['child'][$i]['child'][0]['name'], $_XML_DATA[0]['child'][2]['child'][$i]['child'][0]['content']);
		$file_info->setFileInfo($_XML_DATA[0]['child'][2]['child'][$i]['child'][1]['name'], $_XML_DATA[0]['child'][2]['child'][$i]['child'][1]['content']);
		$file_info->setFileInfo($_XML_DATA[0]['child'][2]['child'][$i]['child'][2]['name'], $_XML_DATA[0]['child'][2]['child'][$i]['child'][2]['content']);
		$file_info->setFileInfo($_XML_DATA[0]['child'][2]['child'][$i]['child'][3]['name'], $_XML_DATA[0]['child'][2]['child'][$i]['child'][3]['content']);

		$_file_data[$i] = $file_info;
	}

	return $_file_data;
}

//////////////////////////////////////////////////
//  formatBytes($file_size) mixed file sizes
//  formatBytes($file_size, 0) KB file sizes
//  formatBytes($file_size, 1) MB file sizes etc
//////////////////////////////////////////////////
function formatBytes($bytes, $format=99){
	$byte_size = 1024;
	$byte_type = array(" KB", " MB", " GB", " TB", " PB", " EB", " ZB", " YB");

	$bytes /= $byte_size;
	$i = 0;

	if($format == 99 || $format > 7){
		while($bytes > $byte_size){
			$bytes /= $byte_size;
			$i++;
		}
	}
	else{
		while($i < $format){
			$bytes /= $byte_size;
			$i++;
		}
	}

	$bytes = sprintf("%1.2f", $bytes);
	$bytes .= $byte_type[$i];

	return $bytes;
}

//////////////////////////////////////////////////////////////////////
// Send an email with the upload results.
//////////////////////////////////////////////////////////////////////
function emailUploadResults($_FILE_DATA, $_CONFIG_DATA, $_POST_DATA){
	$_FILE_DATA_EMAIL = getFileDataEmail($_FILE_DATA, $_CONFIG_DATA, $_POST_DATA);

	$end_char = "\n";
	$headers = '';
	$message = '';

	if($_CONFIG_DATA['html_email_support']){
		$headers = 'Content-type: text/html; charset=utf-8; format=flowed' . "\r\n";
		$end_char = "<br>\n";
	}
	else{ $headers = 'Content-type: text/plain; charset=utf-8; format=flowed' . "\r\n"; }

	// add config data to email
	$headers = "From: " . $_CONFIG_DATA['from_email_address'] . "\r\n";
	$message = "Upload ID: ". $_CONFIG_DATA['upload_id'] . $end_char;
	$message .= "Start Upload: ". date("M j, Y, g:i:s", $_CONFIG_DATA['start_upload']) . $end_char;
	$message .= "End Upload: ". date("M j, Y, g:i:s", $_CONFIG_DATA['end_upload']) . $end_char;
	$message .= "Remote IP: " . $_CONFIG_DATA['remote_ip'] . $end_char;
	$message .= "Browser: " . $_CONFIG_DATA['user_agent'] . $end_char . $end_char;

	// add file upload info to email
	$message .= $_FILE_DATA_EMAIL;

	// add any post values to the email here. eg.
	// $message .= "The client ID is " . $_POST_DATA['client_id'] . $end_char;

	mail($_CONFIG_DATA['to_email_address'], $_CONFIG_DATA['email_subject'], $message, $headers);
}

////////////////////////////////////////////////////////
// Create a '<tr><td>' string based on file upload info
////////////////////////////////////////////////////////
function getFileDataTable($_FILE_DATA, $_CONFIG_DATA, $_POST_DATA){
	$file_list = '';
	$col = 0;

	$file_list = "<table cellpadding=\"1\" cellspacing=\"1\" width=\"700px\">\n";
	$file_list .= "   <tr><td align=\"center\" bgcolor=\"bbbbbb\">&nbsp;&nbsp;<b>UPLOADED FILE NAME</b>&nbsp;&nbsp;</td><td align=\"center\" bgcolor=\"bbbbbb\">&nbsp;&nbsp;<b>UPLOADED FILE SIZE</b>&nbsp;&nbsp;</td></tr>\n";

	for($i = 0; $i < count($_FILE_DATA); $i++){
		$file_slot = $_FILE_DATA[$i]->getFileInfo('slot');
		$file_name = $_FILE_DATA[$i]->getFileInfo('name');
		$file_size = $_FILE_DATA[$i]->getFileInfo('size');
		$file_type = $_FILE_DATA[$i]->getFileInfo('type');
		$formatted_file_size = formatBytes($file_size);

		if($col%=2){ $bg_col = "cccccc"; }
		else{ $bg_col = "dddddd"; }

		if($file_size > 0){
			if($_CONFIG_DATA['link_to_upload'] == 1){
				$file_path = $_CONFIG_DATA['path_to_upload'] . $file_name;
				$file_list .= "<tr><td align=\"center\" bgcolor=\"$bg_col\"><a href=\"$file_path\" target=\"_blank\">$file_name</a></td><td align=\"center\" bgcolor=\"$bg_col\">$formatted_file_size</td></tr>\n";
			}
			else{ $file_list .= "<tr><td align=\"center\" bgcolor=\"$bg_col\">$file_name</td><td align=\"center\" bgcolor=\"$bg_col\">$formatted_file_size</td></tr>\n"; }
		}
		else{ $file_list .= "<tr><td align=\"center\" bgcolor=\"$bg_col\">&nbsp;$file_name&nbsp;</td><td align=\"center\" bgcolor=\"$bg_col\"><font color=\"red\">Failed To Upload</font></td></tr>\n"; }

		$col++;
	}

	$file_list .= "</table>\n";

	return $file_list;
}

///////////////////////////////////////////////////////
// Create an email string based on file upload data
///////////////////////////////////////////////////////
function getFileDataEmail($_FILE_DATA, $_CONFIG_DATA, $_POST_DATA){
	$email_file_list = '';
	$end_char = "\n";

	if($_CONFIG_DATA['html_email_support']){ $end_char = "<br>\n"; }

	for($i = 0; $i < count($_FILE_DATA); $i++){
		$file_slot = $_FILE_DATA[$i]->getFileInfo('slot');
		$file_name = $_FILE_DATA[$i]->getFileInfo('name');
		$file_size = $_FILE_DATA[$i]->getFileInfo('size');
		$file_type = $_FILE_DATA[$i]->getFileInfo('type');
		$formatted_file_size = formatBytes($file_size);

		if($file_size > 0){
			if($_CONFIG_DATA['link_to_upload_in_email']){ $email_file_list .= "File Name: " . $_CONFIG_DATA['path_to_upload'] . $file_name . "     File Size: " . $formatted_file_size . $end_char; }
			else{
				if($_CONFIG_DATA['unique_upload_dir']){
					$email_file_list .= 'File Name: ' . $_CONFIG_DATA['upload_id'] . '/' . $file_name . "     File Size: " . $formatted_file_size . $end_char;
				}
				else{ $email_file_list .= 'File Name: ' . $file_name . "     File Size: " . $formatted_file_size . $end_char; }
			}
		}
		else{ $email_file_list .= 'File Name: ' . $file_name . "     File Size: Failed To Upload !" . $end_char; }
	}

	return $email_file_list;
}

///////////////////////////////////////////////////////////////////////////////////
// Run js script on parent if 'embedded_upload_results' config setting is detected
///////////////////////////////////////////////////////////////////////////////////
function scriptParent(){
	print "<script language='javascript' type='text/javascript'>\n";
	print "	parent.document.getElementById('upload_div').style.display = '';\n";
	print "	parent.iniFilePage();\n";
	print "</script>\n";
}

?>