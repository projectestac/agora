<?php

// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Strings for component 'repository_capture', language 'en', branch 'MOODLE_26_STABLE'
 *
 * @package   repository_capture
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['btn_audio'] = 'Record audio';
$string['btn_help'] = 'Recording Help';
$string['btn_help_help'] = 'Recording instructions:<br>
<ol>
<li>Use the recording button to record your sound or video</li>
<li>You can replay the recording with the play button</li>
<li>Use the two triangular handles to trim the beginning and end of the video recording</li>
<li>Once you have completed the editing, click on the Save button to send your recording to Moodle. (Processing can take a while depending on length, bandwidth and server processing speed.)</li>
</ol>';
$string['btn_photo'] = 'Take a picture';
$string['btn_play'] = 'Play/Pause';
$string['btn_record'] = 'Record';
$string['btn_record_photo'] = 'Take a picture';
$string['btn_reset'] = 'Try again';
$string['btn_save'] = 'Save';
$string['btn_settings'] = 'Recording settings';
$string['btn_stop'] = 'Stop';
$string['btn_video'] = 'Record video';
$string['capture:audio'] = 'Use Capture audio mode in file picker';
$string['capture:photo'] = 'Use Capture photo mode in file picker';
$string['capture:video'] = 'Use Capture video mode in file picker';
$string['capture:view'] = 'Use Capture in file picker';
$string['configplugin'] = 'Configuration for Capture plugin';
$string['default_filename'] = 'Recording';
$string['download'] = 'Download';
$string['err_no_hardware'] = 'Camera or microphone is missing. Please connect your device and refresh the page (depending on your browser, you may need to restart your browser)';
$string['err_record_ffmpeg_exec'] = 'Execution of the ffmpeg path failed. Please check the path and try again.';
$string['err_record_file_not_exists'] = 'The recording does not exist. There is probably a problem with the server configuration. Verify that the temp folder is writable and that FFMPEG is properly installed.';
$string['err_record_fps_range'] = 'Value must be between 10 - 60';
$string['err_record_quality_range'] = 'Value must be between 20 - 100';
$string['head_index'] = 'Capture';
$string['pluginname'] = 'Capture';
$string['pluginname_help'] = 'Record an audio or video directly in Moodle and upload it into the Moodle file system.';
$string['radio_no'] = 'No';
$string['radio_yes'] = 'Yes';
$string['record_audio'] = 'Allow audio recording';
$string['record_audio_help'] = 'Select yes if you want to allow users to record audio with their microphone';
$string['record_ffmpeg'] = 'FFMPEG exec path';
$string['record_ffmpeg_help'] = 'The path to ffmpeg (or avconv depending on your system). Generally <b>ffmpeg</b> is enough but on some servers, you need to specify the full path like <b>"C:Program Filesffmpegbinffmpeg.exe"</b> (quotes are important if there are spaces in the path)';
$string['record_fps'] = 'The framerate';
$string['record_fps_help'] = 'Set the framerate in frames per second. <b>Default = 15</b>.<br>
<b>Note</b>: The more frames per seconds,the bigger the video size and the rendering becomes slower. Max FPS 60';
$string['record_photo'] = 'Allow taking pictures from the webcam';
$string['record_photo_help'] = 'Select yes if you want to allow users to take a picture from the webcam';
$string['record_quality'] = 'Record Quality (in %)';
$string['record_quality_help'] = 'Default 70%. 100% for best quality.<br>
<b>Note</b>: The higher the quality, the more time it will take to encode the video';
$string['record_video'] = 'Allow video recording';
$string['record_video_help'] = 'Select yes if you want to allow users to record video with the webcam and microphone';
$string['saveas'] = 'File name:';
$string['setauthor'] = 'Author:';
$string['setlicense'] = 'Choose license:';
$string['title_audio'] = 'Audio';
$string['title_audio_help'] = 'Click on Record an audio to use your microphone to add a new mp3 file';
$string['title_info'] = 'Information';
$string['title_info_help'] = 'Complete the following information in order to save the file';
$string['title_photo'] = 'Photo';
$string['title_photo_help'] = 'Choose your picture size and click on "Take a picture" to use your webcam to add a new jpg file';
$string['title_video'] = 'Video';
$string['title_video_help'] = 'Choose your video size and click on Record video to use your webcam and microphone to add a new mp4 file';
$string['video_conversion_processing'] = 'Processing...';
$string['video_height'] = '- Height:';
$string['video_width'] = 'Width:';
