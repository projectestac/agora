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
 * Strings for component 'filter_poodll', language 'en', branch 'MOODLE_26_STABLE'
 *
 * @package   filter_poodll
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activate'] = 'Activate PoodLL?';
$string['audioheight'] = 'Audio Player Height';
$string['audiosplash'] = 'Show Simple Audio Splash';
$string['audiosplashdetails'] = 'Splash screen is shown for Flowplayer only.';
$string['audiotranscode'] = 'Auto Conv. to MP3';
$string['audiotranscodedetails'] = 'Convert recorded/uploaded audio file to MP3 format before storing in Moodle. This works for recordings made on tokyo.poodll.com, or uploaded recordings if using FFMPEG';
$string['audiowidth'] = 'Audio Player Width';
$string['autotryports'] = 'Try diff. ports if cannot connect';
$string['bandwidth'] = 'Student connection. bytes/second. Affects webcam qual.';
$string['biggallheight'] = 'Vid. Gallery (big) Height';
$string['biggallwidth'] = 'Vid. Gallery (big) Width';
$string['capturefps'] = 'Video Recorder Capture FPS';
$string['captureheight'] = 'Video Recorder Capture Height';
$string['capturewidth'] = 'Video Recorder Capture Size';
$string['datadir'] = 'PoodLL Data Dir';
$string['datadirdetails'] = 'A sub directory of Moodle dir, to allow some components Moodle 1.9 style file access to media resources. Should only be used for non sensitive media resources. PoodLL will not create, or manage access rights for, this folder';
$string['defaultplayer'] = 'Default A/V Player';
$string['defaultwhiteboard'] = 'Default whiteboard';
$string['ffmpeg'] = 'Convert uploaded media with FFMPEG';
$string['ffmpeg_details'] = 'FFMPEG must be installed on your Moodle Server and on the system path. It will need to support converting to mp3, so try it out first on the command line, eg ffmpeg -i somefile.flv somefile.mp3 . This is still *experimental*';
$string['filename'] = 'Default Filename';
$string['filtername'] = 'PoodLL Filter';
$string['filter_poodll_audioplayer_heading'] = 'Audio Player Settings';
$string['filter_poodll_camera_heading'] = 'Web Camera Settings';
$string['filter_poodll_flowplayer_heading'] = 'Flowplayer Settings';
$string['filter_poodll_intercept_heading'] = 'Filetypes PoodLL Handles by Default';
$string['filter_poodll_legacy_heading'] = 'PoodLL Legacy Settings';
$string['filter_poodll_mic_heading'] = 'Microphone Settings';
$string['filter_poodll_network_heading'] = 'PoodLL Network Settings';
$string['filter_poodll_playertypes_heading'] = 'Default Player Types';
$string['filter_poodll_videogallery_heading'] = 'Video Gallery Settings';
$string['filter_poodll_videoplayer_heading'] = 'Video Player Settings';
$string['filter_poodll_whiteboard_heading'] = 'Whiteboard Settings';
$string['forum_audio'] = 'PoodLL Forum: Audio?';
$string['forum_recording'] = 'PoodLL Forum: AV Recording Enabled?';
$string['forum_video'] = 'PoodLL Forum: Video?';
$string['fp_bgcolor'] = 'Flowplayer Color';
$string['fpembedtype'] = 'Flowplayer Embed Method';
$string['fp_embedtypedescr'] = 'SWF Object is the most reliable. Flowplayer JS handles preview splash images better. If you use Flowplayer JS consider turning off Multimedia Plugins filter MP3/FLV/MP4 handling to avoid double-filtering.';
$string['fp_enableplaylist'] = 'Enable Flowplayer Audiolist';
$string['fp_enableplaylistdescr'] = 'This requires the JQuery javascript library and adds about 100kb to the page download size. Moodle will cache it though, so there should be no noticeable slowdown. You should also set the Flowplayer embed setting to Flowplayer js. Purge the cache after changing this or any flowplayer config setting.';
$string['handleflv'] = 'Handle FLV Files';
$string['handlemov'] = 'Handle MOV Files';
$string['handlemp3'] = 'Handle MP3 Files';
$string['handlemp4'] = 'Handle MP4 Files';
$string['html5controls'] = 'HTML5 Controls';
$string['html5fancybutton'] = 'Use Fancy Upload Button';
$string['html5play'] = 'HTML5 Playback';
$string['html5rec'] = 'HTML5 Recording';
$string['html5use_heading'] = 'When to use HTML5';
$string['html5widgets'] = 'HTML5 PoodLL Widgets';
$string['journal_audio'] = 'PoodLL Journal: Audio?';
$string['journal_recording'] = 'PoodLL Journal: AV Recording Enabled?';
$string['journal_video'] = 'PoodLL Journal: Video?';
$string['miccanpause'] = 'Allow pause (MP3 recorder only)';
$string['micecho'] = 'Mic. Echo';
$string['micgain'] = 'Mic. Gain';
$string['micloopback'] = 'Mic. Loopback';
$string['micrate'] = 'Mic. Rate';
$string['micsilencelevel'] = 'Mic. Silence Level';
$string['miniplayerwidth'] = 'Mini Player Width';
$string['mobile_os_version_warning'] = '<p>Your OS Version is too low</p>
		<p>Android requires version 4 or greater.</p>
		<p>iOS requires version 6 or greater.</p>';
$string['mp3opts'] = 'FFMPEG MP3 Conversion options';
$string['mp3opts_details'] = 'Leave this empty if you wish to let FFMPEG make the decisions. Anything you put here will appear between [ffmpeg -i myfile.xx ] and [ myfile.mp3 ]';
$string['mp4opts'] = 'FFMPEG MP4 Conversion options';
$string['mp4opts_details'] = 'Leave this empty if you wish to let FFMPEG make the decisions. Anything you put here will appear between [ffmpeg -i myfile.xx ] and [ myfile.mp4 ]';
$string['newpairheight'] = 'Pairwork Widget Height';
$string['newpairwidth'] = 'Pairwork Widget Width';
$string['nopoodllresource'] = '--- Select PoodLL Resource ---';
$string['overwrite'] = 'Overwrite Same?';
$string['picqual'] = 'Target webcam qual. 1 - 10';
$string['pluginname'] = 'PoodLL Filter';
$string['poodll:candownloadmedia'] = 'Can download media';
$string['screencapturedevice'] = 'Screencast Capture Device Name';
$string['serverhttpport'] = 'PoodLL Server Port (HTTP)';
$string['serverid'] = 'PoodLL Server Id';
$string['servername'] = 'PoodLL Host Address';
$string['serverport'] = 'PoodLL Server Port (RTMP)';
$string['settings'] = 'PoodLL Filter Settings';
$string['showdownloadicon'] = 'Show download icon under players';
$string['showheight'] = 'Screencast Player Height';
$string['showwidth'] = 'Screencast Player Width';
$string['smallgallheight'] = 'Vid. Gallery (small) Height';
$string['smallgallwidth'] = 'Vid. Gallery (small) Width';
$string['studentcam'] = 'Preferred device name for camera';
$string['studentmic'] = 'Preferred  device name for microphone';
$string['talkbackheight'] = 'Talkback Player Height';
$string['talkbackwidth'] = 'Talkback Player Width';
$string['thumbnailsplash'] = 'Use Preview as Splash';
$string['thumbnailsplashdetails'] = 'Preview splash uses first frame of video as the splash image. Only use this when using server tokyo.poodll.com.';
$string['transcode_heading'] = 'Audio/Video File Conversion Settings';
$string['usecourseid'] = 'Use Course ID?';
$string['videoheight'] = 'Video Player Height';
$string['videosplash'] = 'Show Simple Video Splash';
$string['videosplashdetails'] = 'Splash screen is shown for Flowplayer only.';
$string['videotranscode'] = 'Auto Conv. to MP4';
$string['videotranscodedetails'] = 'Convert recorded/uploaded video files to MP4 format before storing in Moodle. This works for recordings made on tokyo.poodll.com, or uploaded recordings if using FFMPEG';
$string['videowidth'] = 'Video Player Width';
$string['wboardautosave'] = 'Autosave(milliseconds)';
$string['wboardautosave_details'] = 'Saves the drawing when the user has paused drawing after X milliseconds. 0 = no autosave';
$string['wboardheight'] = 'Whiteboard Default Height';
$string['wboardwidth'] = 'Whiteboard Default Width';
$string['whiteboardsave'] = 'Save Picture';
$string['wordplayerfontsize'] = 'Word Player Fontsize';
