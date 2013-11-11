//******************************************************************************************************
//   ATTENTION: THIS FILE HEADER MUST REMAIN INTACT. DO NOT DELETE OR MODIFY THIS FILE HEADER.
//
//   Name: ubr_file_upload.js
//   Revision: 1.4
//   Date: 3/23/2008 12:24:11 PM
//   Link: http://uber-uploader.sourceforge.net
//   Initial Developer: Peter Schmandra  http://www.webdice.org
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

//***************************************************************************************************************
// * ATTENTION * If you need to debug this file, set the $DEBUG_AJAX = 1 in ubr_ini.php
//               and use the showDebugMessage function. eg. showDebugMessage("Upload ID = $UPLOAD_ID<br>");
//***************************************************************************************************************

var upload_range = 2;
var get_data_loop = false;
var get_status_url;
var seconds = 0;
var minutes = 0;
var hours = 0;
var info_width = 0;
var info_bytes = 0;
var info_time_width = 500;
var info_time_bytes = 15;
var cedric_hold = true;
var total_upload_size = 0;
var total_Kbytes = 0;
var bytesID;
var statusID;

// Check the file format before uploading
function checkFileNameFormat(){
    if(!check_file_name_format){
        return false;
    }

    for(var i = 0; i < upload_range; i++){
        if (typeof document.form_upload.elements['upfile_' + i] != 'undefined') {
            if(document.form_upload.elements['upfile_' + i].value != ""){
                var string = document.form_upload.elements['upfile_' + i].value;
                var num_of_last_slash = string.lastIndexOf("\\");

                if(num_of_last_slash < 1){
                    num_of_last_slash = string.lastIndexOf("/");
                }

                var file_name = string.slice(num_of_last_slash + 1, string.length);
                var re = /^[\w][\w\.\-\s]{1,100}$/i;

                if(!re.test(file_name)){
                    //alert("Sorry, uploading files in this format is not allowed. Please ensure your file names follow this format. \n\n1. Entire file cannot exceed 48 characters\n2. Format should be filename.extension or filename\n3. Legal characters are 1-9, a-z, A-Z, _, -, space\n");
                    alert("La càrrega d'aquest tipus de fitxers no és permesa. Si us plau, assegureu-vos de que el fitxer compleix les normes següents:\n\n1. El nom del fitxer no pot excedir els 100 caràcters.\n2. El format ha de ser fitxer.zip o fitxer.mbz.\n3. Els caràcters permesos són 1-9, a-z, A-Z, _, - i espai en blanc.\n");
                    return true;
                }
            }
        }
    }
    return false;
}

// Check for legal file extentions
function checkAllowFileExtensions(){
    if(!check_allow_extensions_on_client){
        return false;
    }

    for(var i = 0; i < upload_range; i++){
        if (typeof document.form_upload.elements['upfile_' + i] != 'undefined') {
            if(document.form_upload.elements['upfile_' + i].value != ""){
                if(!document.form_upload.elements['upfile_' + i].value.match(allow_extensions)){
                    var string = document.form_upload.elements['upfile_' + i].value;
                    var num_of_last_slash = string.lastIndexOf("\\");

                    if(num_of_last_slash < 1){
                        num_of_last_slash = string.lastIndexOf("/");
                    }

                    var file_name = string.slice(num_of_last_slash + 1, string.length);
                    var file_extension = file_name.slice(file_name.indexOf(".")).toLowerCase();

                    //alert('Sorry, uploading a file with the extension "' + file_extension + '" is not allowed.');
                    alert('No es poden pujar fitxers amb l\'extensió "' + file_extension + '".');
                    return true;
                }
            }
        }
    }
    return false;
}

// Check for illegal file extentions
function checkDisallowFileExtensions(){
    if(!check_disallow_extensions_on_client){
        return false;
    }

    for(var i = 0; i < upload_range; i++){
        if (typeof document.form_upload.elements['upfile_' + i] != 'undefined') {
            if(document.form_upload.elements['upfile_' + i].value != ""){
                if(document.form_upload.elements['upfile_' + i].value.match(disallow_extensions)){
                    var string = document.form_upload.elements['upfile_' + i].value;
                    var num_of_last_slash = string.lastIndexOf("\\");

                    if(num_of_last_slash < 1){
                        num_of_last_slash = string.lastIndexOf("/");
                    }

                    var file_name = string.slice(num_of_last_slash + 1, string.length);
                    var file_extension = file_name.slice(file_name.indexOf(".")).toLowerCase();

                    //alert('Sorry, uploading a file with the extension "' + file_extension + '" is not allowed.');
                    alert('No es poden pujar fitxers amb l\'extensió "' + file_extension + '".');
                    return true;
                }
            }
        }
    }
    return false;
}

// Make sure the user selected at least one file
function checkNullFileCount(){
    if(!check_null_file_count){
        return false;
    }

    var null_file_count = 0;

    for(var i = 0; i < upload_range; i++){
        if (typeof document.form_upload.elements['upfile_' + i] != 'undefined') {
            if(document.form_upload.elements['upfile_' + i].value == ""){
                null_file_count++;
            }
        }
    }

    if(null_file_count == upload_range){
        alert("Trieu un fitxer per pujar al servidor");
        return true;
    }
    else{
        return false;
    }
}

// Make sure the user is not uploading duplicate files
function checkDuplicateFileCount(){
    if(!check_duplicate_file_count){
        return false;
    }

    var duplicate_flag = false;
    var file_count = 0;
    var duplicate_msg = "Duplicate Upload Files Detected.\n\n";
    var file_name_array = new Array();

    for(var i = 0; i < upload_range; i++){
        if (typeof document.form_upload.elements['upfile_' + i] != 'undefined') {
            if(document.form_upload.elements['upfile_' + i].value != ""){
                var string = document.form_upload.elements['upfile_' + i].value;
                var num_of_last_slash = string.lastIndexOf("\\");

                if(num_of_last_slash < 1){
                    num_of_last_slash = string.lastIndexOf("/");
                }

                var file_name = string.slice(num_of_last_slash + 1, string.length);

                file_name_array[i] = file_name;
            }
        }
    }

    var num_files = file_name_array.length;

    for(var i = 0; i < num_files; i++){
        for(var j = 0; j < num_files; j++){
            if(file_name_array[i] == file_name_array[j] && file_name_array[i] != null){
                file_count++;
            }
        }
        if(file_count > 1){
            duplicate_msg += 'Duplicate file "' + file_name_array[i] + '" detected in slot ' + (i + 1) + ".\n";
            duplicate_flag = true;
        }
        file_count = 0;
    }

    if(duplicate_flag){
        alert(duplicate_msg);
        return true;
    }
    else{
        return false;
    }
}


function resetForm(){
    location.href = self.location;
}
function hideProgressBar(){
    document.getElementById('progress_bar').style.display = "none";
}
function showDebugMessage(message){
    document.getElementById('ubr_debug').innerHTML += message + '<br>';
}
function clearDebugMessage(){
    document.getElementById('ubr_debug').innerHTML = '';
}
function showAlertMessage(message){
    document.getElementById('ubr_alert').innerHTML = message;
}
function clearAlertMessage(){
    document.getElementById('ubr_alert').innerHTML = '';
}
function stopDataLoop(){
    get_data_loop = false;
}

// Initialize the file upload page
function iniFilePage(){
    resetProgressBar();
    clearAlertMessage();

    for(var i = 0; i < upload_range; i++){
        if (typeof document.form_upload.elements['upfile_' + i] != 'undefined') {
            document.form_upload.elements['upfile_' + i].disabled = false;
            document.form_upload.elements['upfile_' + i].value = "";
        }
    }

    document.getElementById('upload_button').disabled = false;
    document.getElementById('progress_bar').style.display = "none";
    document.form_upload.reset();
}

// Reset the progress bar
function resetProgressBar(){
    get_data_loop = false;
    seconds = 0;
    minutes = 0;
    hours = 0;
    info_width = 0;
    info_bytes = 0;
    cedric_hold = true;
    total_upload_size = 0;
    total_Kbytes = 0;

    document.getElementById('upload_status').style.width = '0px';

    if(show_percent_complete){
        document.getElementById('percent').innerHTML = '0%';
    }
    if(show_files_uploaded){
        document.getElementById('uploaded_files').innerHTML = 0;
    }
    if(show_files_uploaded){
        document.getElementById('total_uploads').innerHTML = '';
    }
    if(show_current_position){
        document.getElementById('current').innerHTML = 0;
    }
    if(show_current_position){
        document.getElementById('total_kbytes').innerHTML = '';
    }
    if(show_elapsed_time){
        document.getElementById('time').innerHTML = 0;
    }
    if(show_est_time_left){
        document.getElementById('remain').innerHTML = 0;
    }
    if(show_est_speed){
        document.getElementById('speed').innerHTML = 0;
    }
}

// Handle user pressing 'Enter' in the upload slots
function handleKey(event){
    if(document.all){
        if(window.event.keyCode == 13){
            return false;
        }
    }
    else{
        if(event && event.which == 13){
            return false;
        }
    }
}

// Link the upload
function linkUpload(){
    if(checkFileNameFormat()){
        return false;
    }
    if(checkAllowFileExtensions()){
        return false;
    }
    if(checkDisallowFileExtensions()){
        return false;
    }
    if(checkNullFileCount()){
        return false;
    }
    if(checkDuplicateFileCount()){
        return false;
    }

    if(show_files_uploaded){
        var total_uploads = 0;

        for(var i = 0; i < upload_range; i++){
            if (typeof document.form_upload.elements['upfile_' + i] != 'undefined') {
                if(document.form_upload.elements['upfile_' + i].value != ""){
                    total_uploads++;
                }
            }
        }

        document.getElementById('total_uploads').innerHTML = total_uploads;
    }

    var jsel = document.createElement('SCRIPT');
    var day = new Date;
    var dom;
	
    if(document.getElementById('ajax_div')){
        dom = document.getElementById('ajax_div');
    }
    else{
        dom = document.body;
    }
	 
    jsel.type = 'text/javascript';

    if(multi_configs_enabled){
        jsel.src = path_to_link_script + '?config_file=' + config_file + '&rnd_id=' + day.getTime();
    }
    else{
        jsel.src = path_to_link_script + '?rnd_id=' + day.getTime();
    }

    dom.appendChild(jsel);

    dom = null;
    jsel = null;
    day = null;
}

//Submit the upload form
function startUpload(upload_id, debug_upload){
    document.getElementById('upload_button').disabled = true;
    document.form_upload.action = path_to_upload_script + '?upload_id=' +  upload_id;
    document.form_upload.submit();

    for(var i = 0; i < upload_range; i++){
        if (typeof document.form_upload.elements['upfile_' + i] != 'undefined') {
            document.form_upload.elements['upfile_' + i].disabled = true;
        }
    }

    if(document.getElementById('upload_div')){
        document.getElementById('upload_div').style.display = "none";
    }

    if(!debug_upload){
        initializeProgressBar(upload_id);
    }
}

// Initialize progress bar
function initializeProgressBar(upload_id){
    var jsel = document.createElement('SCRIPT');
    var dom;
	
    if(document.getElementById('ajax_div')){
        dom = document.getElementById('ajax_div');
    }
    else{
        dom = document.body;
    }

    jsel.type = 'text/javascript';
    jsel.src = path_to_set_progress_script + '?upload_id=' + upload_id;
    dom.appendChild(jsel);
	
    dom = null;
    jsel = null;
    day = null;
}

// Stop the upload
function stopUpload(){
    try{
        window.stop();
    }
    catch(e){
        try{
            document.execCommand('Stop');
        }
        catch(e){}
    }
}

//Start the progress bar
function startProgressBar(upload_id, upload_size, start_time){
    total_upload_size = upload_size;
    total_Kbytes = Math.round(total_upload_size / 1024);
    get_status_url = path_to_get_progress_script + '?upload_id=' + upload_id + '&start_time=' + start_time + '&total_upload_size=' + total_upload_size;
    get_data_loop = true;
    document.getElementById('progress_bar').style.display = "";
    showAlertMessage("Procés de la pujada de fitxers al servidor");

    if(show_current_position){
        document.getElementById('total_kbytes').innerHTML = total_Kbytes + " ";
    }
    if(show_elapsed_time){
        getElapsedTime();
    }

    getProgressStatus();

    if(cedric_progress_bar == 1){
        if(show_current_position){
            smoothCedricBytes();
        }
        smoothCedricStatus();
    }
}

// Calculate and display upload stats
function setProgressStatus(bytes_read, lapsed_time, uploaded_files){
    var byte_speed = 0;
    var time_remaining = 0;
    var dom;

    if(lapsed_time > 0){
        byte_speed = bytes_read / lapsed_time;
    }
    if(byte_speed > 0){
        time_remaining = Math.round((total_upload_size - bytes_read) / byte_speed);
    }

    if(cedric_progress_bar == 1){
        if(byte_speed != 0){
            info_time_width = Math.round(total_upload_size * 1000 / (byte_speed * progress_bar_width));
            info_time_bytes = Math.round(1024000 / byte_speed);
        }
        else{
            info_time_width = 500;
            info_time_bytes = 15;
        }
    }

    // Calculate percent finished
    var percent_float = bytes_read / total_upload_size;
    var percent = Math.round(percent_float * 100);
    var progress_bar_status = Math.round(percent_float * progress_bar_width);

    // Calculate time remaining
    var remaining_sec = (time_remaining % 60);
    var remaining_min = (((time_remaining - remaining_sec) % 3600) / 60);
    var remaining_hours = ((((time_remaining - remaining_sec) - (remaining_min * 60)) % 86400) / 3600);

    if(remaining_sec < 10){
        remaining_sec = '0' + remaining_sec;
    }
    if(remaining_min < 10){
        remaining_min = '0' + remaining_min;
    }
    if(remaining_hours < 10){
        remaining_hours = '0' + remaining_hours;
    }

    var time_remaining_f = remaining_hours + ':' + remaining_min + ':' + remaining_sec;
    var Kbyte_speed = Math.round(byte_speed / 1024);
    var Kbytes_read = Math.round(bytes_read / 1024);

    if(cedric_progress_bar == 1){
        if(cedric_hold_to_sync){
            if(progress_bar_status < info_width){
                cedric_hold = true;
            }
            else{
                cedric_hold = false;
                info_width = progress_bar_status;
                info_bytes = Kbytes_read;
            }
        }
        else{
            cedric_hold = false;
            info_width = progress_bar_status;
            info_bytes = Kbytes_read;
        }
    }
    else{
        dom = document.getElementById('upload_status');
        dom.style.width = progress_bar_status + 'px';

        if(show_current_position){
            dom = document.getElementById('current');
            dom.innerHTML = Kbytes_read;
        }
    }

    if(show_percent_complete){
        dom = document.getElementById('percent')
        dom.innerHTML = percent + '%';
    }
    if(show_files_uploaded){
        dom = document.getElementById('uploaded_files');
        dom.innerHTML = uploaded_files;
    }
    if(show_est_time_left){
        dom = document.getElementById('remain');
        dom.innerHTML = time_remaining_f;
    }
    if(show_est_speed){
        dom = document.getElementById('speed');
        dom.innerHTML = Kbyte_speed;
    }

    dom = null;
}

// Get the progress of the upload
function getProgressStatus(){
    var jsel = document.createElement('SCRIPT');
    var day = new Date;
    var dom;
	
    if(document.getElementById('ajax_div')){ 
        dom = document.getElementById('ajax_div');
        dom.innerHTML = ''; 
    }
    else{
        dom = document.body;
    }

    jsel.type = 'text/javascript';
    jsel.src = get_status_url + "&rnd_id=" + day.getTime();

    dom.appendChild(jsel);
    dom = null;
    jsel = null;
    day = null;
}

// Calculate the time spent uploading
function getElapsedTime(){
    seconds++;

    if(seconds == 60){
        seconds = 0;
        minutes++;
    }

    if(minutes == 60){
        minutes = 0;
        hours++;
    }

    var hr = "" + ((hours < 10) ? "0" : "") + hours;
    var min = "" + ((minutes < 10) ? "0" : "") + minutes;
    var sec = "" + ((seconds < 10) ? "0" : "") + seconds;
    var dom = document.getElementById('time')

    dom.innerHTML = hr + ":" + min + ":" + sec;

    dom = null;
    hr = null;
    min = null;
    sec = null;

    if(get_data_loop){
        setTimeout("getElapsedTime()", 1000);
    }
}

// Make the progress bar smooth
function smoothCedricStatus(){
    if(info_width < progress_bar_width && !cedric_hold){
        info_width++;
        var dom = document.getElementById('upload_status');
        dom.style.width = info_width + 'px';
        dom = null;
    }

    if(get_data_loop){
        clearTimeout(statusID);
        statusID = setTimeout("smoothCedricStatus()", info_time_width);
    }
}

// Make the bytes uploaded smooth
function smoothCedricBytes(){
    if(info_bytes < total_Kbytes && !cedric_hold){
        info_bytes++;
        var dom = document.getElementById('current');
        dom.innerHTML = info_bytes;
        dom = null;
    }

    if(get_data_loop){
        clearTimeout(bytesID);
        bytesID = setTimeout("smoothCedricBytes()", info_time_bytes);
    }
}

// Add one upload slot
function addUploadSlot(num){
    if(upload_range < max_upload_slots){
        if(num == upload_range){
            var up = document.getElementById('upload_slots');
            var dv = document.createElement("div");

            dv.innerHTML = '<input type="file" name="upfile_' + upload_range + '" size="50" onChange="addUploadSlot('+(upload_range + 1)+')" onKeypress="return handleKey(event)">';
            up.appendChild(dv);
            upload_range++;
            up = null;
            dv = null;
        }
    }
}
