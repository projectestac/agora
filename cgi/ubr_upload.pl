#!/usr/bin/perl -w
#**********************************************************************************************************************************
#   ATTENTION: THIS FILE HEADER MUST REMAIN INTACT. DO NOT DELETE OR MODIFY THIS FILE HEADER.
#
#   Name: ubr_upload.pl
#   Link: http://uber-uploader.sourceforge.net/
#   Revision: 1.6
#   Date: 4/3/2008 8:16:20 PM
#   Initial Developer: Peter Schmandra
#   Description: Upload files to a temp dir based on upload id, transfer files to upload dir and redirects.
#
#   Licence:
#   The contents of this file are subject to the Mozilla Public
#   License Version 1.1 (the "License"); you may not use this file
#   except in compliance with the License. You may obtain a copy of
#   the License at http://www.mozilla.org/MPL/
#
#   Software distributed under the License is distributed on an "AS
#   IS" basis, WITHOUT WARRANTY OF ANY KIND, either express or
#   implied. See the License for the specific language governing
#   rights and limitations under the License.
#
#**********************************************************************************************************************************

#****************************************************************************************
#  ATTENTION: The $TEMP_DIR values MUST be duplicated in the "ubr_ini.php" file
#****************************************************************************************
my $TEMP_DIR = '/srv/www/agora/moodledata/ubr_uploads/tmp/';

$|++;                                         # Auto flush output buffer

use strict;                                   # Insert whipping sound here
use CGI::Carp 'fatalsToBrowser';              # Dump fatal errors to screen
use CGI qw(:cgi);                             # Load the CGI.pm module
use File::Copy;                               # Module for moving uploaded files
use File::Path;                               # Module for creating and removing directories

my $UBER_VERSION = "6.3.4";                   # Version of UU
my $THIS_VERSION = "1.6";                     # Version of this script
my $UPLOAD_ID = '';                           # Initialize upload id

# Makes %ENV safer
$ENV{'PATH'} = '/bin:/usr/bin:/usr/local/bin';
delete @ENV{'IFS', 'CDPATH', 'ENV', 'BASH_ENV'};

###############################################################
# The following possible query string formats are assumed
#
# 1. ?upload_id=32_alpha_numeric_string
# 2. ?about=1
###############################################################
my %query_string = parse_query_string($ENV{'QUERY_STRING'});   # Parse query string
my $print_issued = 0;                                          # Track print statement
my $remove_temp_dir = 0;                                       # Track remove upload_id.dir

# Check for tainted upload id
if(exists($query_string{'upload_id'})){
	if($query_string{'upload_id'} !~ m/(^[a-zA-Z0-9]{32}$)/){ &kak("<font color='red'>ERROR<\/font>: Invalid upload id<br>\n", 1, __LINE__); }
	else{ $UPLOAD_ID = $1; }
}
elsif(exists($query_string{'about'})){
	if($query_string{'about'} == 1){ &kak("<u><b>UBER UPLOADER VERSION</b><\/u><br> UBER UPLOADER VERSION = <b>" . $UBER_VERSION . "<\/b><br> UBR_UPLOAD = <b>" . $THIS_VERSION . "<\/b><br>\n", 1, __LINE__); }
}
else{ &kak("<font color='red'>ERROR</font>: Invalid parameters passed<br>\n", 1, __LINE__); }

my $start_upload = 0;                                                               # Timestamp start of upload
my $end_upload = 0;                                                                 # Timestamp end of upload
my $sleep_time = 1;                                                                 # Seconds to wait before upload proceeds (for small file uploads)
my %uploaded_files = ();                                                            # Hash used to store uploaded file names, sizes and types
my %config = &load_config_file($TEMP_DIR, $UPLOAD_ID);                              # Hash containig configuration settings
my $temp_dir_id = $TEMP_DIR . $UPLOAD_ID . '.dir';                                  # The upload dir appendided to the temp dir
my $flength_file = $temp_dir_id . '/' . $UPLOAD_ID . '.flength';                    # Flength file is used to store the size of the upload in bytes
my $redirect_file = $TEMP_DIR . $UPLOAD_ID . '.redirect';                           # Redirect file (upload id.redirect)

# Dump info to screen and exit if $DEBUG_UPLOAD=1
if($config{'debug_upload'}){ &show_debug_info($UBER_VERSION, $THIS_VERSION, $TEMP_DIR, $UPLOAD_ID, %config); }

umask(0);
$SIG{HUP} = 'IGNORE';                                                               # Ignore sig hup
$CGI::POST_MAX = $config{'max_upload_size'};                                        # Set the max post value
$CGI::PRIVATE_TEMPFILES = 0;                                                        # Disable private temp files

# Create a temp directory based on upload id
mkpath($temp_dir_id, 0, 0777) or die("Failed to make $temp_dir_id: $!\n");

# Prepare the flength file for writing
open(FLENGTH, ">" , "$flength_file") or &kak("<font color='red'>ERROR</font>: Failed to open flength file $flength_file: $!", 1, __LINE__);

if($ENV{'CONTENT_LENGTH'} > $config{'max_upload_size'} || $ENV{'CONTENT_LENGTH'} < 10485760){
	# If file size exceeds maximum write error to flength file and exit
	my $max_size = &format_bytes($config{'max_upload_size'}, 99);

	print FLENGTH "<font color='red'>ERROR</font>: S'ha superat la mida màxima permesa de $max_size o el fitxer té menys de 10.00 MB";
	close(FLENGTH);
	chmod 0666, $flength_file;

	# &kak("<font color='red'>ERROR</font>: S'ha superat la mida màxima permesa dex $max_size.<br>", 1, __LINE__);
}
else{
	# Write total upload size in bytes to flength file
	print FLENGTH $ENV{'CONTENT_LENGTH'};
	close(FLENGTH);
	chmod 0666, $flength_file;

	# Clean up upload_id.dir when the script exits
	$remove_temp_dir = 1;
}

# Let progress bar get some info (for small file uploads)
sleep($sleep_time);

# Timestamp start of upload
$start_upload = time();

# Tell CGI.pm to use our directory based on upload id
if($TempFile::TMPDIRECTORY){ $TempFile::TMPDIRECTORY = $temp_dir_id; }
elsif($CGITempFile::TMPDIRECTORY){ $CGITempFile::TMPDIRECTORY = $temp_dir_id; }
else{ &kak("<font color='red'>ERROR</font>: Failed to assign CGI temp directory", 1, __LINE__); }

my $query = new CGI;
####################################################################################################################
# The upload is complete at this point, so you can now access post values. eg. $query->param("some_post_value");
####################################################################################################################

####################################################################################################################
# IF you are modifying the upload directory with a post value, it may be done here.
#
# Note: Making modifications based on posted input may be unsafe. Make sure your posted input is safe!
#
# You must override the $config{'upload_dir'} value
# If you are linking to the file you must also override the $config{'path_to_upload'} value
#
# eg. $config{'upload_dir'} .= $query->param("employee_num") . '/';
# eg. $config{'path_to_upload'} .= $query->param("employee_num") . '/';
###################################################################################################################

# Create a directory based on upload_id inside the upload directory if config setting 'unique_upload_dir' is enabled
if($config{'unique_upload_dir'}){
	$config{'upload_dir'} .= $UPLOAD_ID . '/';

	if($config{'link_to_upload'} || $config{'link_to_upload_in_email'}){ $config{'path_to_upload'} .= $UPLOAD_ID . '/'; }
}

# Create upload directory if it does not exist
if(!-d $config{'upload_dir'}){ mkpath($config{'upload_dir'}, 0, 0777) or die("Failed to make $config{'upload_dir'}: $!\n"); }

# Start processing the uploaded files
for my $upload_key (keys %{$query->{'.tmpfiles'}}){
	# Get the file slot name eg. 'upfile_0'
	$query->{'.tmpfiles'}->{$upload_key}->{info}->{'Content-Disposition'} =~ / name="([^"]*)"/;
	my $file_slot = $1;

	# Get uploaded file name
	my $file_name = param($file_slot);

	# Get the upload file handle
	my $upload_filehandle = $query->upload($file_slot);

	# Get the CGI temp file name
	my $tmp_filename = $query->tmpFileName($upload_filehandle);

	# Get the type of file being uploaded
	my $content_type = $query->uploadInfo($upload_filehandle)->{'Content-Type'};

	# Strip extra path info from the file (IE). Note: Will likely cause problems with foreign languages like chinese
	$file_name =~ s/.*[\/\\](.*)/$1/;

	# Get the file extention
	my ($f_name, $file_extension) = ($file_name =~ /(.*)\.(.+)/);

	########################################################################################################
	# IF you are modifying the file name with a post value, it may be done here.
	#
	# Note: Making modifications based on posted input may be unsafe. Make sure your posted input is safe!
	#
	# eg. $file_name = $f_name . "_" . $query->param("employee_num") . "." . $file_extension;
	########################################################################################################

	my $allow_extensions_check = 1;       # Default to pass check
	my $disallow_extensions_check = 1;    # Default to pass check

	# Check file extension
	if($config{'check_allow_extensions_on_server'}){ $allow_extensions_check = &check_file_extension($file_extension, $config{'allow_extensions'}, 1); }
	if($config{'check_disallow_extensions_on_server'}){ $disallow_extensions_check = &check_file_extension($file_extension, $config{'disallow_extensions'}, 2); }

	# Do not process zero length files or files with illegal extensions
	if((-s $tmp_filename) && $allow_extensions_check && $disallow_extensions_check){
		# Create a unique filename if config setting 'unique_filename' is enabled
		if($config{'unique_file_name'}){
			my $unique_file_name = generate_random_string($config{'unique_file_name_length'});
			$unique_file_name = $unique_file_name . "." . $file_extension;
			$file_name = $unique_file_name;
		}
		elsif($config{'normalize_file_names'}){ $file_name = &normalize_filename($file_name, $config{'normalize_file_delimiter'}, $config{'normalize_file_length'}); }

		# Check for an existing file and rename if it already exists
		if(!$config{'overwrite_existing_files'}){ $file_name = &rename_filename($file_name, 1, $config{'upload_dir'}); }

		my $upload_file_path = $config{'upload_dir'} . $file_name;

		# Win wants the file handle closed before transfer
		close($upload_filehandle);

		# Transfer uploaded file to final destination
		move($tmp_filename, $upload_file_path) or copy($tmp_filename, $upload_file_path) or die("Cannot move/copy from $tmp_filename to $upload_file_path: $!");

		chmod 0666, $upload_file_path;
	}
	else{ close($upload_filehandle); }

	# Store the upload file info
	$uploaded_files{$file_slot}{'file_size'} = &get_file_size($config{'upload_dir'}, $file_name);
	$uploaded_files{$file_slot}{'file_name'} = $file_name;
	$uploaded_files{$file_slot}{'file_type'} = $content_type;
}

# Timestamp end of upload (includes file transfer)
$end_upload = time();

# Delete the temp directory based on upload id and everything in it
rmtree($temp_dir_id, 0, 1) or warn("Failed to remove $temp_dir_id: $!\n");

# Purge old temp directories
if($config{'purge_temp_dirs'}){ &purge_ubr_dirs($TEMP_DIR, $config{'purge_temp_dirs_limit'}); }

# Log Upload
if($config{'log_uploads'}){
	my ($sec, $min, $hour, $mday, $mon, $year, $wday, $yday, $isdst) = localtime(time());
	$year += 1900;
	$mon++;

	my $log_day = $config{'log_dir'} . $year . '-' . $mon . '-' . $mday . '/';

	# Create log directory if it does not exist
	if(!-d $log_day){ mkpath($log_day, 0, 0777) or die("Failed to make $log_day: $!\n"); }

	my $log_file = $log_day . $UPLOAD_ID . ".log";

	if(open LOGG, ">", "$log_file"){
		my $file_handle = *LOGG;
		&write_uu_file($file_handle, $start_upload, $end_upload, %config, %uploaded_files);
	}
	else{ &kak("<font color='red'>ERROR<\/font>: Failed to open $UPLOAD_ID.log $!", 1, __LINE__); }
}

# Open redirect file
if(open REDIRECT, ">", "$redirect_file"){
	my $file_handle = *REDIRECT;

	# Write redirect file
	&write_uu_file($file_handle, $start_upload, $end_upload, %config, %uploaded_files);

	# Append upload id to redirect url
	my $redirect_url = $config{'redirect_url'} . "?upload_id=" . $UPLOAD_ID;

	# Do redirect
	if(!$config{'embedded_upload_results'} && ($config{'opera_browser'} || $config{'safari_browser'})){
		# Deal with Opera and Safari browser limitations
		$config{'redirect_using_js'} = 1;
		$config{'redirect_using_html'} = 0;
		$config{'redirect_using_location'} = 0;
		&kak("<script language=\"javascript\" type=\"text/javascript\">top.location.href='$redirect_url';</script>", 1, __LINE__);
	}
	else{
		if($config{'redirect_using_html'}){
			print "content-type:text/html; charset=utf-8\n\n";
			print "<html><head><meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"><meta http-equiv=\"refresh\" content=\"0; url='$redirect_url'\"></head><body></body></html>";
		}
		elsif($config{'redirect_using_js'}){
			&kak("<script language=\"javascript\" type=\"text/javascript\">document.location.href='$redirect_url';</script>", 1, __LINE__);
		}
		elsif($config{'redirect_using_location'}){
			# Uncomment next line if using Webstar V
			# print "HTTP/1.1 302 Redirection\n";
			print "Location: $redirect_url\n\n";
		}
	}
}
else{ &kak("<font color='red'>ERROR<\/font>: Failed to open $UPLOAD_ID.redirect $!", 1, __LINE__); }

exit;
######################################################## START SUB ROUTINES ############################################################


#########################################
# Clean up the upload_id.dir and everything in it
#########################################
END{
	if(-d $temp_dir_id && $remove_temp_dir){ rmtree($temp_dir_id, 0, 1) or warn("Failed to remove $temp_dir_id: $!\n"); }
}

#########################################
# Check file extension
#########################################
sub check_file_extension{
	my $file_extension = shift;
	my $config_extensions = shift;
	my $mode = shift;

	if($mode == 1){
		if($file_extension =~ m/^$config_extensions$/i){ return 1; }
		else{ return 0; }
	}
	elsif($mode == 2) {
		if($file_extension !~ m/^$config_extensions$/i){ return 1; }
		else{ return 0; }
	}
	else{ return 0; }
}

##################################################
# Get the size of the ploaded file if it exists
##################################################
sub get_file_size{
	my $upload_dir = shift;
	my $file_name = shift;
	my $path_to_file = $upload_dir . $file_name;
	my $file_size = 0;

	if(-e $path_to_file && -f $path_to_file){ $file_size = -s $path_to_file; }

	return $file_size;
}

####################################################
#  formatBytes($file_size, 99) mixed file sizes
#  formatBytes($file_size, 0) KB file sizes
#  formatBytes($file_size, 1) MB file sizes etc
####################################################
sub format_bytes{
	my $bytes = shift;
	my $byte_format = shift;
	my $byte_size = 1024;
	my $i = 0;
	my @byte_type = (" KB", " MB", " GB", " TB", " PB", " EB", " ZB", " YB");

	$bytes /= $byte_size;

	if($byte_format == 99 || $byte_format > 7){
		while($bytes > $byte_size){
			$bytes /= $byte_size;
			$i++;
		}
	}
	else{
		while($i < $byte_format){
			$bytes /= $byte_size;
			$i++;
		}
	}

	$bytes = sprintf("%1.2f", $bytes);
	$bytes .= $byte_type[$i];

	return $bytes;
}

############################################
# Rename uploaded file if it already exists
############################################
sub rename_filename{
	my $file_name = shift;
	my $count = shift;
	my $upload_dir = shift;
	my $path_to_file = $upload_dir . $file_name;

	if(-e $path_to_file && -f $path_to_file){
		if($file_name =~ /(.*)_(\d*)\.(.*)/){
			# Already renamed so count on
			$count = $2 + 1;
			$file_name =~ s/(.*)_(\d*)\.(.*)/$1_$count\.$3/;
		}
		else{
			# Not renamed so start counting
			$file_name =~ s/(.*)\.(.*)/$1_$count\.$2/;
		}
		&rename_filename($file_name, $count, $upload_dir);
	}
	else{ return $file_name; }
}

#######################
# Normalize file name
######################
sub normalize_filename{
	my $file_name = shift;
	my $delimiter = shift;
	my $max_file_length = shift;

	$file_name =~ s/^\s+//;   # Trim left
	$file_name =~ s/\s+$//;   # Trim right

	# Check the length of the file name and cut if neseccary
	if(length($file_name) > $max_file_length){ $file_name = substr($file_name, length($file_name) - $max_file_length); }

	# Search and replace illegal file name characters
	$file_name =~ s/[^a-zA-Z0-9\_\.\-\s]/$delimiter/g;

	return $file_name;
}

#########################
# Generate Randon String
#########################
sub generate_random_string{
	my $length_of_randomstring = shift;
	my @chars=('a'..'z', '0'..'9');
	my $random_string;

	for(my $i = 0; $i < $length_of_randomstring; $i++){ $random_string .= $chars[int(rand(36))]; }

	return $random_string;
}

##########################
# Parse the query string
##########################
sub parse_query_string{
	my $buffer = shift;
	my @pairs = split(/&/, $buffer);
	my %query_string = ();

	foreach my $pair (@pairs){
		my ($name, $value) = split(/=/, $pair);

		$value =~ s/%([a-fA-F0-9][a-fA-F0-9])/pack("C", hex($1))/eg;
		$query_string{$name} = $value;
	}

	return %query_string;
}

##########################
# Load config file
##########################
sub load_config_file{
	my $temp_dir = shift;
	my $upload_id = shift;
	my $config_file = $temp_dir . $upload_id . ".link";
	my %config = ();

	open(CONFIG, $config_file) || &kak("<font color='red'>ERROR</font>: Failed to open config file " . $upload_id . ".link", 1, __LINE__);
	my @raw_config = <CONFIG>;
	close(CONFIG);

	foreach my $config_line (@raw_config){
		chop($config_line);
		my($config_setting, $config_value) = split(/<=>/, $config_line);
		$config{$config_setting} = $config_value;
	}

	if($config{'delete_link_file'}){ rmtree($config_file, 0, 1) or warn("Failed to remove $config_file: $!\n"); }

	return %config;
}

################################
# Purge old upload directories
################################
sub purge_ubr_dirs{
	my $temp_dir = shift;
	my $purge_temp_dirs_limit = shift;
	my @upload_dirs = glob("$temp_dir*.dir");
	my $now_time = time();

	foreach my $upload_dir (@upload_dirs){
		my $dir_time = (stat($upload_dir))[9];

		if(($now_time - $dir_time) > $purge_temp_dirs_limit){ rmtree($upload_dir, 0, 1) or warn("Failed to remove $upload_dir: $!\n"); }
	}
}

####################################################
# Write a XML file containing configuration upload
# and post information
####################################################
sub write_uu_file{
	my $file_handle = shift;
	my $start_upload = shift;
	my $end_upload = shift;
	my $config = shift;
	my $uploaded_files = shift;
	my @names = $query->param;

	binmode $file_handle;

	print $file_handle "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
	print $file_handle "<uu_upload>\n";
	print $file_handle "  <config>\n";
	print $file_handle "    <remote_ip>$ENV{REMOTE_ADDR}<\/remote_ip>\n";
	print $file_handle "    <user_agent>$ENV{HTTP_USER_AGENT}<\/user_agent>\n";
	print $file_handle "    <start_upload>$start_upload<\/start_upload>\n";
	print $file_handle "    <end_upload>$end_upload<\/end_upload>\n";

	for my $config_setting (keys %config){ print $file_handle "    <$config_setting>$config{$config_setting}<\/$config_setting>\n"; }

	print $file_handle "  <\/config>\n";
	print $file_handle "  <post>\n";

	foreach my $key (@names){
		my @post_values = $query->param($key);

		foreach my $post_value (@post_values){
			$post_value =~ s/&/&amp;/g;
			$post_value =~ s/</&lt;/g;
			$post_value =~ s/>/&gt;/g;
			$post_value =~ s/'/&apos;/g;
			$post_value =~ s/"/&quot;/g;

			$key =~ s/[^a-zA-Z0-9\_\-]//g;

			print $file_handle "    <$key>$post_value<\/$key>\n";
		}
	}

	print $file_handle "  <\/post>\n";
	print $file_handle "  <file>\n";

	# Log upload file info
	for my $file_slot (keys %uploaded_files){
		my $file_name = $uploaded_files{$file_slot}{'file_name'};
		my $file_size = $uploaded_files{$file_slot}{'file_size'};
		my $file_type = $uploaded_files{$file_slot}{'file_type'};

		print $file_handle "    <file_upload>\n";
		print $file_handle "      <slot>$file_slot<\/slot>\n";
		print $file_handle "      <name>$file_name<\/name>\n";
		print $file_handle "      <size>$file_size<\/size>\n";
		print $file_handle "      <type>$file_type<\/type>\n";
		print $file_handle "    <\/file_upload>\n";
	}

	print $file_handle "  <\/file>\n";
	print $file_handle "<\/uu_upload>\n";
	close($file_handle);
	chmod 0666, $file_handle;
}

########################################################################
# Output a message to the screen
#
# You can use this function to debug your script.
#
# eg. &kak("The value of blarg is: " . $blarg . "<br>", 1, __LINE__);
# This will print the value of blarg and exit the script.
#
# eg. &kak("The value of blarg is: " . $blarg . "<br>", 0, __LINE__);
# This will print the value of blarg and continue the script.
########################################################################
sub kak{
	my $msg = shift;
	my $kak_exit = shift;
	my $line  = shift;

	if(!$print_issued){
		print "Content-type: text/html\n\n";
		$print_issued = 1;
	}

	print "<!DOCTYPE HTML PUBLIC \"-\/\/W3C\/\/DTD HTML 4.01 Transitional\/\/EN\">\n";
	print "<html>\n";
	print "  <head>\n";
	print "    <title>Uber-Uploader - Free File Upload Progress Bar<\/title>\n";
	print "      <meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\">\n";
	print "      <meta http-equiv=\"Pragma\" content=\"no-cache\">\n";
	print "      <meta http-equiv=\"CACHE-CONTROL\" content=\"no-cache\">\n";
	print "      <meta http-equiv=\"expires\" content=\"-1\">\n";
	print "      <meta name=\"robots\" content=\"none\">\n";
	print "  <\/head>\n";
	print "  <body style=\"background-color: #EEEEEE; color: #000000; font-family: arial, helvetica, sans_serif;\">\n";
	print "    <br>\n";
	print "    <div align='center'>\n";
	print "    $msg\n";
	print "    <br>\n";
	print "    <!-- kak on line $line -->\n";
	print "    </div>\n";
	print "  </body>\n";
	print "</html>\n";

	if($kak_exit){
		close(STDIN);
		exit;
	}
}

#####################################################################
# Print config, driver settings and 'Environment Variables' to screen
#####################################################################
sub show_debug_info{
	my $uber_version = shift;
	my $this_version = shift;
	my $temp_dir = shift;
	my $upload_id = shift;
	my $config = shift;
	my $msg = '';
	my $perlversion = $];
	my $perlos = $^O;
	my $cgiversion = $CGI::VERSION;
	my $filecopyversion = $File::Copy::VERSION;
	my $filepathversion = $File::Path::VERSION;

	$msg .= "<div align='left'>\n";
	$msg .= "<u><b>UBER UPLOADER CONFIG SETTINGS<\/b><\/u><br>\n";
	$msg .= "UBER UPLOADER VERSION = <b>$uber_version<\/b><br>\n";
	$msg .= "UBR_UPLOAD = <b>$this_version<\/b><br>\n";
	$msg .= "CONFIG_FILE NAME = <b>$config{'config_file_name'}<\/b><br>\n";
	$msg .= "PERL VERSION = <b>$perlversion<\/b><br>\n";
	$msg .= "PERL OS = <b>$perlos<\/b><br>\n";
	$msg .= "CGI.PM VERSION = <b>$cgiversion<\/b><br>\n";
	$msg .= "FILE::COPY VERSION = <b>$filecopyversion<\/b><br>\n";
	$msg .= "FILE::PATH VERSION = <b>$filepathversion<\/b><br>\n";
	$msg .= "MAX_UPLOAD_SIZE = <b>" . format_bytes($config{'max_upload_size'}, 99) . "<\/b><br>\n";

	if($config{'delete_link_file'}){
		$msg .= "DELETE_LINK_FILE = <b><font color='green'>enabled</font><\/b><br>\n";
	}
	else{ $msg .= "DELETE_LINK_FILE = <b><font color='red'>disabled</font><\/b><br>\n"; }

	if($config{'purge_temp_dirs'}){
		$msg .= "PURGE_TEMP_DIRS = <b><font color='green'>enabled</font><\/b><br>\n";
		$msg .= "PURGE_TEMP_DIRS_LIMIT = <b><font color='green'>$config{'purge_temp_dirs_limit'}</font><\/b><br>\n";
	}
	else{ $msg .= "PURGE_TEMP_DIRS = <b><font color='red'>disabled</font><\/b><br>\n"; }

	if(!-d $temp_dir){ $msg .= "TEMP_DIR = <b><font color='red'>$temp_dir<\/font><\/b><br>\n"; }
	else{ $msg .= "TEMP_DIR = <b><font color='green'>$temp_dir<\/font><\/b><br>\n"; }

	if(!-d $config{'upload_dir'}){ $msg .= "UPLOAD_DIR = <b><font color='red'>$config{'upload_dir'}<\/font><\/b><br>\n"; }
	else{ $msg .= "UPLOAD_DIR = <b><font color='green'>$config{'upload_dir'}<\/font><\/b><br>\n"; }

	if($config{'unique_upload_dir'}){ $msg .= "UNIQUE_UPLOAD_DIR = <b><font color='green'>enabled</font><\/b><br>\n"; }
	else{ $msg .= "UNIQUE_UPLOAD_DIR = <b><font color='red'>disabled</font><\/b><br>\n"; }

	if($config{'unique_file_name'}){
		$msg .= "UNIQUE_FILE_NAME = <b><font color='green'>enabled</font><\/b><br>\n";
		$msg .= "UNIQUE_FILE_NAME_LENGTH = <b>$config{'unique_file_name_length'} chars<\/b><br>\n";
	}
	else{ $msg .= "UNIQUE_FILE_NAME = <b><font color='red'>disabled</font><\/b><br>\n"; }

	if($config{'overwrite_existing_files'}){ $msg .= "OVERWRITE_EXISTING_FILES = <b><font color='green'>enabled</font><\/b><br>\n"; }
	else{ $msg .= "OVERWRITE_EXISTING_FILES = <b><font color='red'>disabled</font><\/b><br>\n"; }

	if($config{'normalize_file_names'}){ $msg .= "NORMALIZE_FILE_NAMES = <b><font color='green'>enabled</font><\/b><br>\n"; }
	else{ $msg .= "NORMALIZE_FILE_NAMES = <b><font color='red'>disabled</font><\/b><br>\n"; }

	if($config{'normalize_file_names'}){
		$msg .= "NORMALIZE_FILE_LENGTH = <b>$config{'normalize_file_length'} chars<\/b><br>\n";
		$msg .= "NORMALIZE_FILE_DELIMITER = <b>$config{'normalize_file_delimiter'}<\/b><br>\n";
	}

	if($config{'check_allow_extensions_on_server'}){
		$msg .= "CHECK_ALLOW_EXTENSIONS_ON_SERVER = <b><font color='green'>enabled</font><\/b><br>\n";
		$msg .= "ALLOW_EXTENSIONS = <b>" . $config{'allow_extensions'} . "<\/b><br>\n";
	}
	else{ $msg .= "CHECK_ALLOW_EXTENSIONS_ON_SERVER = <b><font color='red'>disabled</font><\/b><br>\n"; }

	if($config{'check_disallow_extensions_on_server'}){
		$msg .= "CHECK_DISALLOW_EXTENSIONS_ON_SERVER = <b><font color='green'>enabled</font><\/b><br>\n";
		$msg .= "DISALLOW_EXTENSIONS = <b>" . $config{'disallow_extensions'} . "<\/b><br>\n";
	}
	else{ $msg .= "CHECK_DISALLOW_EXTENSIONS_ON_SERVER = <b><font color='red'>disabled</font><\/b><br>\n"; }

	if($config{'link_to_upload'}){
		$msg .= "LINK_TO_UPLOAD = <b><font color='green'>enabled</font><\/b><br>\n";
		$msg .= "PATH_TO_UPLOAD = <a href=\"$config{'path_to_upload'}\">$config{'path_to_upload'}</a><br>\n";
	}
	else{ $msg .= "LINK_TO_UPLOAD = <b><font color='red'>disabled</font><\/b><br>\n"; }

	if($config{'send_email_on_upload'}){
		$msg .= "SEND_EMAIL_ON_UPLOAD = <b><font color='green'><a href=\"mailto:$config{'to_email_address'}?subject=Uber Uploader Email Test\">enabled</a></font><\/b><br>\n";
		$msg .= "EMAIL_SUBJECT = <b>$config{'email_subject'}<\/b><br>\n";

		if($config{'html_email_support'}){ $msg .= "HTML_EMAIL_SUPPORT = <b><font color='green'>enabled</font><\/b><br>\n"; }
		else{ $msg .= "HTML_EMAIL_SUPPORT = <b><font color='red'>disabled</font><\/b><br>\n"; }

		if($config{'link_to_upload_in_email'}){ $msg .= "LINK_TO_UPLOAD_IN_EMAIL = <b><font color='green'>enabled</font><\/b><br>\n"; }
		else{ $msg .= "LINK_TO_UPLOAD_IN_EMAIL = <b><font color='red'>disabled</font><\/b><br>\n"; }
	}
	else{ $msg .= "SEND_EMAIL_ON_UPLOAD = <b><font color='red'>disabled</font><\/b><br>\n"; }

	$msg .= "REDIRECT_URL = <a href=\"$config{'redirect_url'}?about=1\">$config{'redirect_url'}<\/a><br>\n";

	if($config{'redirect_using_html'}){ $msg .= "REDIRECT_USING_HTML = <b><font color='green'>enabled</font><\/b><br>\n"; }
	else{ $msg .= "REDIRECT_USING_HTML = <b><font color='red'>disabled</font><\/b><br>\n"; }

	if($config{'redirect_using_js'}){ $msg .= "REDIRECT_USING_JS = <b><font color='green'>enabled</font><\/b><br>\n"; }
	else{ $msg .= "REDIRECT_USING_JS = <b><font color='red'>disabled</font><\/b><br>\n"; }

	if($config{'redirect_using_location'}){ $msg .= "REDIRECT_USING_LOCATION = <b><font color='green'>enabled</font><\/b><br>\n"; }
	else{ $msg .= "REDIRECT_USING_LOCATION = <b><font color='red'>disabled</font><\/b><br>\n"; }

	if($config{'log_uploads'}){
		$msg .= "LOG_UPLOADS = <b><font color='green'>enabled</font><\/b><br>\n";

		if(!-d $config{'log_dir'}){ $msg .= "LOG_DIR = <b><font color='red'>$config{'log_dir'}<\/font><\/b><br>\n"; }
		else{ $msg .= "LOG_DIR = <b><font color='green'>$config{'log_dir'}<\/font><\/b><br>\n"; }
	}
	else{ $msg .= "LOG_UPLOADS = <b><font color='red'>disabled</font><\/b><br>\n"; }

	$msg .= "<br><u><b>ENVIRONMENT VARIABLES<\/b><\/u><br>\n";

	foreach my $key (sort keys(%ENV)){ $msg .= "$key = <b>$ENV{$key}<\/b><br>\n"; }

	$msg .= "<\/div>\n";

	if($config{'embedded_upload_results'} || ($config{'opera_browser'} || $config{'safari_browser'})){ $msg .= "<script language=\"javascript\" type=\"text/javascript\">parent.document.getElementById('upload_div').style.display = '';</script>\n"; }

	&kak($msg, 1, __LINE__);
}
