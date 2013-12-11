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
 * Render an attempt at a HotPot quiz
 *
 * @package   mod-hotpot
 * @copyright 2010 Gordon Bateson <gordon.bateson@gmail.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

// get parent class
require_once($CFG->dirroot.'/mod/hotpot/renderer.php');

/**
 * mod_hotpot_attempt_renderer
 *
 * @copyright 2010 Gordon Bateson
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @since     Moodle 2.0
 */
class mod_hotpot_attempt_renderer extends mod_hotpot_renderer {

    /** xml declaration */
    protected $xmldeclaration;

    /** doctype tag */
    protected $doctype;

    /** html tag attributes */
    protected $htmlattributes;

    /** head tag attributes */
    protected $headattributes;

    /** head content */
    public $headcontent;

    /** body tag attributes */
    protected $bodyattributes;

    /** body content */
    public $bodycontent;

    /** name of html frame */
    protected $framename;

    /** boolean flag indicating whether or not we should use the Moodle theme */
    protected $usemoodletheme;

    /** name of theme containiner */
    protected $themecontainer;

    /** the hotpot object (as defined in "mod/hotpot/locallib.php") representing this HotPot */
    public $hotpot;

    /** the id for the embedded object used for hotpot::NAVIGATION_EMBED */
    protected $embed_object_id  = 'hotpot_embed_object';

    /** the onload function (in iframe.js) for the embedded object (if used) */
    protected $embed_object_onload  = 'set_embed_object_height';

    /**
     * most outputformats use the hotpot cache
     * but those that don't can switch this flag off
     */
    protected $use_hotpot_cache = true;

    /** object to store the hotpot_cache record for the quiz */
    protected $cache;

    /** boolean flag that indicates whether the cache content is uptodate or not */
    protected $cache_uptodate;

    /**
     * these $CFG fields must match those in the "hotpot_cache" table
     * "wwwroot" is not stored explicitly because it is included in the md5key
     */
    protected $cache_CFG_fields = array(
        'slasharguments','hotpot_enableobfuscate','hotpot_enableswf'
    );

    /**
     * these fields in the quiz record must match those in the "hotpot_cache" table
     * "outputformat" is not stored explicitly because it is included in the md5key
     */
    protected $cache_hotpot_fields = array(
        'name','sourcefile','sourcetype','sourcelocation','configfile','configlocation',
        'navigation','stopbutton','stoptext','title','usefilters','useglossary','usemediafilter',
        'studentfeedback','studentfeedbackurl','timelimit','delay3','clickreporting'
    );

    /** these fields are treated as text fields */
    public $cache_text_fields = array(
        'slasharguments','hotpot_enableobfuscate','hotpot_enableswf','name',
        'sourcefile','sourcetype','sourcelastmodified','sourceetag',
        'configfile','configlastmodified','configetag',
        'usemediafilter','studentfeedbackurl','stoptext'
    );

    /* these fields from the source and config file objects are stored in the cache */
    public $cache_remote_fields = array(
        'lastmodified','etag'
    );

    /**
     * these fields will be serialized and then stored in the "content" field of the "hotpot_cache" table
     */
    protected $cache_content_fields = array(
        'xmldeclaration','doctype','htmlattributes','headattributes','headcontent','bodyattributes','bodycontent'
    );

    protected $unitid = 0;
    protected $unumber = 0;
    protected $unitgradeid = 0;
    protected $unitattemptid = 0;

    protected $quizid = 0;
    protected $qnumber = 0;
    protected $quizscoreid = 0;
    protected $quizattemptid = 0;

    /**
     * init
     *
     * @param xxx $hotpot
     */
    protected function init($hotpot)  {
        // save a reference to the $hotpot record
        $this->hotpot = $hotpot;

        $this->hotpot->get_source();

        // set the frame name, if any
        $this->framename = optional_param('framename', '', PARAM_ALPHA);

        switch ($hotpot->navigation) {
            case hotpot::NAVIGATION_NONE:
            case hotpot::NAVIGATION_FRAME:
            case hotpot::NAVIGATION_EMBED:
            case hotpot::NAVIGATION_ORIGINAL:
                $this->usemoodletheme = true; // ($this->framename=='top');
                $this->themecontainer = 'page-mod-hotpot-attempt';
                break;
            case hotpot::NAVIGATION_MOODLE:
            case hotpot::NAVIGATION_TOPBAR:
            default:
                // using any of the following elements as "themecontainer",
                // results in incorrect calculation of ViewportSize in themes
                // that use the CSS "overflow: hidden":
                //   - region-main
                //   - region-main-wrap
                //   - region-post-box
                //   - region-main-box
                //   - page-content
                // using any of the following elements as "themecontainer" is OK:
                //   - page-content-wrapper
                //   - wrapper
                //   - page (doesn't work)
                //   - my-page-wrapper (doesn't work)
                //   - page-mod-hotpot-attempt (doesn't work)
                $this->usemoodletheme = true;
                $this->themecontainer = 'region-main';
                break;
        }
    }

    /**
     * the source file types with which this output format can be used
     *
     * @return array of source file types
     */
    public static function sourcetypes() {
        return array();
    }

    /**
     * Returns html code for an attempt at a HotPot instance
     * $this->output is a core_renderer (see "lib/outputrenderers.php")
     *
     * you can set page properties like this
     *  - $this->page->set_title($title);
     *  - $this->page->set_heading($this->page->course->fullname);
     *  - $this->page->requires->js('/mod/hotpot/attempt/iframe.js', true); // add to head
     *  - $this->page->requires->js_module('hotpot'); // gets mod/hotpot/module.js
     *  - $this->page->requires->js_init_call('M.mod_hotpot.secure_window.init');
     *
     * @param hotpot object
     * @return string html
     */
    public function render_attempt($hotpot, $cacheonly=false) {

        // initialize some important properties
        $this->init($hotpot);

        // if necessary, print container page and associated frames
        $basetag = '';
        if ($this->hotpot->navigation==hotpot::NAVIGATION_FRAME || $this->hotpot->navigation==hotpot::NAVIGATION_EMBED) {
            if ($cacheonly) {
                $this->framename = 'main';
                $this->usemoodletheme = false;
            } else if ($this->hotpot->navigation==hotpot::NAVIGATION_FRAME) {
                if ($this->framename=='') {
                    $this->print_frameset();
                    die;
                }
                if ($this->framename=='top') {
                    $this->print_topframe();
                    die;
                }
            } else if ($this->hotpot->navigation==hotpot::NAVIGATION_EMBED) {
                if ($this->framename=='') {
                    $this->print_embed_object_page();
                    die;
                }
            }
            // otherwise we print the "main" frame below

            // set basetag to ensure links and forms can escape from frame
            $basetag = $this->basetag();
        }

        // try to get content from cache
        $this->get_fields_from_cache();

        if ($cacheonly && $this->cache_uptodate) {
            return true;
        }

        // do pre-processing, if required
        $this->preprocessing();

        // generate the main parts of the page
        $this->set_xmldeclaration();
        $this->set_doctype();
        $this->set_htmlattributes();
        $this->set_headattributes();
        $this->set_headcontent();
        $this->set_bodyattributes();
        $this->set_bodycontent();

        // save content to cache (if necessary)
        $this->set_fields_in_cache();

        if ($cacheonly) {
            return true;
        }

        // do post-processing, if required
        $this->postprocessing();

        if (! $this->bodycontent) {
            throw new moodle_exception('sourcefilenotfound', 'hotpot', '', $this->hotpot->sourcefile);
        }

        echo $this->hotpot_header();
        echo $this->hotpot_content();
        echo $this->hotpot_footer();
    }

    /////////////////////////////////////////////////////////////////////
    // functions to prepare browser content                            //
    /////////////////////////////////////////////////////////////////////

    /**
     * preprocessing
     */
    protected function preprocessing()  {
        // pre-processing for this output format
        // e.g. convert source to ideal format for this output format
    }

    /**
     * set_xmldeclaration
     */
    protected function set_xmldeclaration()  {
        if (! isset($this->xmldeclaration)) {
            $this->xmldeclaration = '';
        }
    }

    /**
     * set_doctype
     */
    protected function set_doctype()  {
        if (! isset($this->doctype)) {
            $this->doctype = '';
        }
    }

    /**
     * set_htmlattributes
     */
    protected function set_htmlattributes()  {

    if (! isset($this->htmlattributes)) {
            $this->htmlattributes = '';
        }
    }

    /**
     * set_headattributes
     */
    protected function set_headattributes()  {
        if (! isset($this->headattributes)) {
            $this->headattributes = '';
        }
    }

    /**
     * set_headcontent
     */
    protected function set_headcontent()  {
        if (! isset($this->headcontent)) {
            $this->headcontent = '';
        }
    }

    /**
     * set_bodyattributes
     */
    protected function set_bodyattributes()  {
        if (! isset($this->bodyattributes)) {
            $this->bodyattributes = '';
        }
    }

    /**
     * set_bodycontent
     */
    protected function set_bodycontent()  {
        if (! isset($this->bodycontent)) {
            $this->bodycontent = '';
        }
    }

    /**
     * postprocessing
     */
    protected function postprocessing()  {
        // procesessing for this output format after content has been retrieved from cache
        // This is intended for fixes to $this->headcontent and $this->bodycontent,
        // that are not to be included in the cached data, e.g. $this->fix_title_icons()
        // If you want to fix $this->headcontent and $this->bodycontent before caching,
        // add your own "set_bodycontent()" method
    }

    /**
     * fix_title
     */
    function fix_title()  {
        if (preg_match($this->tagpattern('h2'), $this->bodycontent, $matches, PREG_OFFSET_CAPTURE)) {
            // $matches: <h2 $matches[1]>$matches[2]</h2>
            $start = $matches[2][1];
            $length = strlen($matches[2][0]);
            $this->bodycontent = substr_replace($this->bodycontent, $this->get_title(), $start, $length);
        }
    }

    /**
     * fix_title_icons
     */
    function fix_title_icons()  {
        // add quiz edit icons if the current user is a teacher/administrator
        if ($this->hotpot->can_manage()) {
            if (preg_match($this->tagpattern('h2'), $this->bodycontent, $matches, PREG_OFFSET_CAPTURE)) {
                // $matches: <h2 $matches[1]>$matches[2]</h2>
                $start = $matches[2][1] + strlen($matches[2][0]);
                $editicon = $this->modedit_icon($this->hotpot);
                $this->bodycontent = substr_replace($this->bodycontent, $editicon, $start, 0);
            }
        }
    }

   /////////////////////////////////////////////////////////////////////
    // functions to merge external page with Moodle page               //
    /////////////////////////////////////////////////////////////////////

    /**
     * generates the header for this hotpot attempt
     *
     * @return string $output
     */
    function hotpot_header()  {
        $header = $this->header();
        // $this->xmldeclaration
        // $this->doctype
        // $this->htmlattributes
        // $this->headattributes
        if ($pos = strpos($header, '</head>')) {
            $header = substr_replace($header, $this->headcontent, $pos, 0);
        }
        // $this->bodyattributes
        return $header;
    }

    /**
     * generates the main content for this hotpot attempt
     *
     * @return string $output
     */
    function hotpot_content()  {
        return $this->bodycontent;
    }

    /**
     * generates the footer for this hotpot attempt
     *
     * @return string $output
     */
    function hotpot_footer()  {
        return $this->footer();
    }

    /**
     * outputs the main content for this page
     * (i.e. what comes between the header and footer)
     *
     * @return string $output
     */
    function maincontent()  {
        return $this->bodycontent;
    }

    /////////////////////////////////////////////////////////////////////
    // functions to generate frames                                    //
    /////////////////////////////////////////////////////////////////////

    /**
     * basetag
     */
    function basetag() {
        global $CFG;
        if (empty($CFG->framename)) {
            $framename = '_top';
        } else {
            $framename = $CFG->framename;
        }
        return html_writer::empty_tag('base', array('target'=>$framename, 'href'=>''));
        // Note: href is required for strict xhtml
    }

    /**
     * fix_targets
     */
    function fix_targets()  {
        global $CFG;
        if (empty($CFG->framename)) {
            $framename = '_top';
        } else {
            $framename = $CFG->framename;
        }
        $this->bodycontent .= ''
            .'<script type="text/javascript">'."\n"
            .'//<![CDATA['."\n"
            ."	var obj = document.getElementsByTagName('a');\n"
            ."	if (obj) {\n"
            ."		var i_max = obj.length;\n"
            ."		for (var i=0; i<i_max; i++) {\n"
            ."			if (obj[i].href && ! obj[i].target) {\n"
            ."				obj[i].target = '$framename';\n"
            ."			}\n"
            ."		}\n"
            ."		var obj = null;\n"
            ."	}\n"
            ."	var obj = document.getElementsByTagName('form');\n"
            ."	if (obj) {\n"
            ."		var i_max = obj.length;\n"
            ."		for (var i=0; i<i_max; i++) {\n"
            ."			if (obj[i].action && ! obj[i].target) {\n"
            ."				obj[i].target = '$framename';\n"
            ."			}\n"
            ."		}\n"
            ."		var obj = null;\n"
            ."	}\n"
            .'//]]>'."\n"
            .'</script>'."\n"
        ;
    }

    /**
     * print frameset containing "top" and "main" frames
     */
    function print_frameset()  {
        global $CFG;

        $charset = 'utf-8';
        $direction = get_string('thisdirection', 'langconfig');

        $title = format_text($this->hotpot->name);
        $title_top = get_string('navigation_frame', 'hotpot');
        $title_main = get_string('modulename', 'hotpot');

        $src_top = $this->hotpot->attempt_url('top');
        $src_main = $this->hotpot->attempt_url('main');

        if (empty($CFG->hotpot_lockframe)) {
            $lock_frameset = '';
            $lock_top = '';
            $lock_main = '';
        } else {
            $lock_frameset = ' border="0" frameborder="0" framespacing="0"';
            $lock_top = ' noresize="noresize" scrolling="no"';
            $lock_main = ' noresize="noresize"';
        }

        if (empty($CFG->hotpot_frameheight)) {
            $rows =  85; // default
        } else {
            $rows = $CFG->hotpot_frameheight;
        }

        echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">'."\n";
        echo '<html dir="'.$direction.'">'."\n";
        echo '<head>'."\n";
        echo '<meta http-equiv="content-type" content="text/html; charset='.$charset.'" />'."\n";
        echo $this->basetag()."\n";
        echo '<title>'.$title.'</title>'."\n";
        echo '</head>'."\n";
        echo '<frameset rows="'.$rows.',*".'.$lock_frameset.'>'."\n";
        echo '<frame title="'.$title_top.'" src="'.$src_top.'"'.$lock_top.' />'."\n";
        echo '<frame title="'.$title_main.'" src="'.$src_main.'"'.$lock_main.' />'."\n";
        echo '<noframes>'."\n";
        echo '<p>'.get_string('framesetinfo').'</p>'."\n";
        echo '<ul>'."\n";
        echo '<li><a href="'.$src_top.'">'.$title_top.'</a></li>'."\n";
        echo '<li><a href="'.$src_main.'">'.$title_main.'</a></li>'."\n";
        echo '</ul>'."\n";
        echo '</noframes>'."\n";
        echo '</frameset>'."\n";
        echo '</html>'."\n";
    }

    /**
     * print "top" frame, containing Moodle navigation bar
     */
    function print_topframe()  {
        echo $this->header();
        echo $this->footer();
    }

    /**
     * print a page embedded in an object in a standard Moodle page
     *
     * for XHTML 1.0 Strict compatability, the embedded page should be implemented
     * using an <object> not an <iframe>. However, IE <object>'s are problematic
     * (links and forms cannot escape), so we use conditional comments to display
     * an <iframe> in IE and an <object> in other browsers
     */
    function print_embed_object_page()  {
        // external javascript to adjust height of iframe
        $this->page->requires->js('/mod/hotpot/attempt/iframe.js', true);

        echo $this->header();

        // set object attributes
        $id = $this->embed_object_id;
        $width = '100%';
        $height = '100%';
        $onload_function = $this->embed_object_onload;
        $src = $this->hotpot->attempt_url('main');

        // print the html element to hold the embedded html page
        // Note: the iframe in IE needs a "name" attribute for the resizing to work
        echo '<!--[if IE]>'."\n";
        echo '<iframe name="'.$id.'" id="'.$id.'" src="'.$src.'" width="'.$width.'" height="'.$height.'"></iframe>'."\n";
        echo '<![endif]-->'."\n";
        echo '<!--[if !IE]> <-->'."\n";
        echo '<object id="'.$id.'" type="text/html" data="'.$src.'" width="'.$width.'" height="'.$height.'"></object>'."\n";
        echo '<!--> <![endif]-->'."\n";

        // javascript to add onload event handler - we do this here because
        // an object tag should have no onload attribute in XHTML 1.0 Strict
        echo '<script type="text/javascript">'."\n";
        echo '//<![CDATA['."\n";
        echo "var obj = document.getElementById('$id');\n";
        echo "if (obj) {\n";
        echo "	if (obj.addEventListener) {\n";
        echo "		obj.addEventListener('load', $onload_function, false);\n";
        echo "	} else if (obj.attachEvent) {\n";
        echo "		obj.attachEvent('onload', $onload_function);\n";
        echo "	} else {\n";
        echo "		obj['onload'] = $onload_function;\n";
        echo "	}\n";
        echo "}\n";
        echo "obj = null;\n";
        echo '//]]>'."\n";
        echo '</script>'."\n";

        echo $this->footer();
    }

    /////////////////////////////////////////////////////////////////////
    // functions to set and get cached content                         //
    /////////////////////////////////////////////////////////////////////

    /**
     * get_cache_md5key
     */
    function get_cache_md5key() {
        global $CFG;
        return md5($this->hotpot->outputformat . $this->page->theme->name . $CFG->wwwroot);
    }

    /**
     * get_fields_from_cache
     *
     * @return xxx
     */
    function get_fields_from_cache()  {
        global $CFG, $DB;

        if (isset($this->cache_uptodate)) {
            return $this->cache_uptodate;
        }

        // assume cache is not up-to-date
        $this->cache_uptodate = false;

        if (empty($CFG->hotpot_enablecache)) {
            return false; // cache not enabled
        }

        if (! $this->use_hotpot_cache) {
            return false; // this renderer doesn't use a cache
        }

        $hotpotid = $this->hotpot->id;
        $md5key = $this->get_cache_md5key();
        $select = "hotpotid=$hotpotid AND md5key='$md5key'";
        if (! $this->cache = $DB->get_record_select('hotpot_cache', $select)) {
            return false; // no cached content for this quiz (+ outputformat + currenttheme + wwwroot)
        }

        foreach ($this->cache_CFG_fields as $field) {
            if ($this->cache->$field != $CFG->$field) {
                return false; // $CFG settings have changed
            }
        }
        foreach ($this->cache_hotpot_fields as $field) {
            if ($this->cache->$field != $this->hotpot->$field) {
                return false; // quiz settings have changed
            }
        }

        // custom fields
        if (isset($this->hotpot->source) && $this->cache->timemodified < $this->hotpot->source->filemtime($this->cache->sourcelastmodified, $this->cache->sourceetag)) {
            return false; // sourcefile file has been modified
        }
        if (isset($this->hotpot->source->config) && $this->cache->timemodified < $this->hotpot->source->config->filemtime($this->cache->configlastmodified, $this->cache->configetag)) {
            return false; // config file has been modified
        }

        if ($this->hotpot->useglossary) {
            $select = 'course = ? AND module = ? AND action IN (?, ?, ?, ?) AND time > ?';
            $params = array(
                $this->hotpot->course->id, 'glossary',
                'add entry','approve entry','update entry','delete entry',
                $this->cache->timemodified
            );
            if ($DB->record_exists_select('log', $select, $params)) {
                return false; // glossary entries (for this course) have been modified
            }
        }

        // if we get this far then the cache content is uptodate

        // transfer cache content to this quiz object
        $content = unserialize(base64_decode($this->cache->content));
        foreach ($this->cache_content_fields as $field) {
            $this->$field = $content->$field;
        }
        $this->cache_uptodate = true;
        return $this->cache_uptodate;
    }

    /**
     * set_fields_in_cache
     *
     * @return xxx
     */
    function set_fields_in_cache()  {
        global $CFG, $DB;

        if (empty($CFG->hotpot_enablecache)) {
            return; // cache not enabled
        }

        if ($this->cache_uptodate) {
            return; // cache is already uptodate
        }

        if (! $this->cache) {
            $this->cache = new stdClass();
        }

        // add special fields to cache record
        $this->cache->hotpotid = $this->hotpot->id;
        $this->cache->md5key = $this->get_cache_md5key();
        $this->cache->timemodified = time();

        // transfer $CFG fields to cache record
        foreach ($this->cache_CFG_fields as $field) {
            $this->cache->$field = $CFG->$field;
        }

        // transfer quiz fields to cache record
        foreach ($this->cache_hotpot_fields as $field) {
            $this->cache->$field = $this->hotpot->$field;
        }

        // transfer remote access fields to cache record
        foreach ($this->cache_remote_fields as $field) {
            $sourcefield = 'source'.$field;
            $configfield = 'config'.$field;
            $this->cache->$sourcefield = ''; // $this->hotpot->source->$field;
            $this->cache->$configfield = ''; // $this->hotpot->source->config->$field;
        }

        // create content object
        $content = new stdClass();
        foreach ($this->cache_content_fields as $field) {
            $content->$field = $this->$field;
        }

        // serialize the $content object
        $this->cache->content = base64_encode(serialize($content));

        // add / update the cache record
        if (isset($this->cache->id)) {
            if (! $DB->update_record('hotpot_cache', $this->cache)) {
                print_error('error_updaterecord', 'hotpot', '', 'hotpot_cache');
            }
        } else {
            if (! $this->cache->id = $DB->insert_record('hotpot_cache', $this->cache)) {
                print_error('error_insertrecord', 'hotpot', '', 'hotpot_cache');
            }
        }

        // cache record was successfully updated/inserted
        $this->cache_uptodate = true;
        return $this->cache_uptodate;
    }

    /**
     * get_name
     *
     * @return xxx
     */
    function get_name()  {
        return $this->hotpot->source->get_name();
    }

    /**
     * get_title
     *
     * @return xxx
     */
    function get_title()  {
        $format_string = false;

        switch ($this->hotpot->title & hotpot::TITLE_SOURCE) {
            case hotpot::TEXTSOURCE_FILE:
                $title = $this->hotpot->source->get_title();
                break;
            case hotpot::TEXTSOURCE_FILENAME:
                $title = basename($this->hotpot->sourcefile);
                break;
            case hotpot::TEXTSOURCE_FILEPATH:
                $title = ltrim($this->hotpot->sourcefile, '/');
                break;
            case hotpot::TEXTSOURCE_SPECIFIC:
            default:
                $title = $this->hotpot->name;
                $title = format_string($title); // this will strip tags
        }

        if ($this->hotpot->title & hotpot::TITLE_UNITNAME) {
            $title = $this->hotpot->name.': '.$title;
        }
        if ($this->hotpot->title & hotpot::TITLE_SORTORDER) {
            $title .= ' ('.$this->sortorder.')';
        }

        $textlib = hotpot_get_textlib();
        $title = $textlib->utf8_to_entities($title);

        return $title;
    }

    /////////////////////////////////////////////////////////////////////
    // utility functions to indicate whether user can resume, restart  //
    /////////////////////////////////////////////////////////////////////

    // does this output format allow quiz attempts to be resumed?

    /**
     * provide_resume
     *
     * @return xxx
     */
    function provide_resume()  {
        return false;
    }

    // does this output format allow a clickreport
    // show a click trail of what students clicked

    /**
     * provide_clickreport
     *
     * @return xxx
     */
    function provide_clickreport()  {
        return false;
    }

    // can the current unit/quiz attempt be paused and resumed later?

    /**
     * can_resume
     *
     * @param xxx $type
     * @return xxx
     */
    function can_resume($type)  {
        global $QUIZPORT;
        if ($type=='unit' || ($type=='quiz' && $this->provide_resume())) {
            if (isset($QUIZPORT->$type) && $QUIZPORT->$type->allowresume) {
                return true;
            }
        }
        return false;
    }

    // can the current unit/quiz be restarted after the current attempt finishes?

    /**
     * can_restart
     *
     * @param xxx $type
     * @return xxx
     */
    function can_restart($type)  {
        global $QUIZPORT;
        if (isset($QUIZPORT->$type) && $QUIZPORT->$type->attemptlimit) {
            if ($attempts = $QUIZPORT->get_attempts($type)) {
                if (count($attempts) >= $QUIZPORT->$type->attemptlimit) {
                    return false;
                }
            }
        }
        return true;
    }

    /**
     * can_continue
     *
     * @return xxx
     */
    function can_continue()  {
        if ($this->can_resume('unit')) {
            if ($this->can_resume('quiz')) {
                return hotpot::CONTINUE_RESUMEQUIZ;
            } else if ($this->can_restart('quiz')) {
                return hotpot::CONTINUE_RESTARTQUIZ;
            }
        }
        if ($this->can_restart('unit')) {
            return hotpot::CONTINUE_RESTARTUNIT;
        } else {
            return hotpot::CONTINUE_ABANDONUNIT;
        }
    }

    /**
     * can_clickreport
     *
     * @return xxx
     */
    function can_clickreport()  {
        if ($this->provide_clickreport() && isset($this->hotpot) && $this->hotpot->clickreporting) {
            return true;
        } else {
            return false;
        }
    }

    /////////////////////////////////////////////////////////////////////
    // utility functions for extracting and cleaning html              //
    /////////////////////////////////////////////////////////////////////

    /**
     * remove_blank_lines
     *
     * @param xxx $str
     * @return xxx
     */
    function remove_blank_lines($str)  {
        // standardize line endings and remove trailing white space and blank lines
        $str = preg_replace('/\s+[\r\n]/s', "\n", $str);
        return $str;
    }

    /**
     * single_line
     *
     * @param xxx $str
     * @return xxx
     */
    function single_line($str)  {
        return trim(preg_replace('/\s+/s', ' ', $str));
    }

    /**
     * tagpattern
     *
     * @param xxx $tag
     * @param xxx $attribute (optional, default='')
     * @param xxx $returncontent (optional, default=true)
     * @param xxx $before (optional, default='')
     * @param xxx $after (optional, default='')
     * @return xxx
     */
    function tagpattern($tag, $attribute='', $returncontent=true, $before='', $after='')  {
        // $0 : entire match
        // if $attribute is empty
        //     $1 : all tag attrbutes
        //     $2 : content (if required)
        // if $attribute is NOT empty
        //     $1 : all tag attrbutes
        //     $2 : first quote of required attibute
        //     $3 : value of required attibute
        //     $4 : closing quote of required attibute
        //     $5 : content (if required)
        if ($attribute) {
            $attribute .= '=(["\'])(.*?)(\\2)[^>]*';
        }
        if ($returncontent) {
            $content = '(.*?)<\/'.$tag.'>';
        } else {
            $content = '';
        }
        return '/'.$before.'<'.$tag.'([^>]*'.$attribute.')>'.$content.$after.'/is';
    }

    /////////////////////////////////////////////////////////////////////
    // utility functions for fixing css, media, onload, and urls       //
    /////////////////////////////////////////////////////////////////////

    /**
     * fix_css_definitions
     *
     * @param xxx $match
     * @return xxx
     */
    function fix_css_definitions($match)  {

        $container = '#'.$this->themecontainer;
        $css_selector = $match[1];
        $css_definition = $match[2];

        // additional CSS for list items
        $listitem_css = '';

        $selectors = array();
        foreach (explode(',', $css_selector) as $selector) {
            if ($selector = trim($selector)) {
                switch (true) {
                    case preg_match('/^html\b/i', $selector):
                        // leave "html" as it is
                        $selectors[] = "$selector";
                        break;
                    case preg_match('/^body\b/i', $selector):
                        // currently we do nothing here, so that
                        // these styles do not affect the Moodle theme

                        // replace "body" with the container element
                        //$selectors[] = "$container";

                        // disable entire css definition
                        //$css_definition = "\n"
                        //    ."\t/".str_repeat('*', 20)."\n"."\t".'Hot Potatoes page styles are disabled'."\n"
                        //    ."\t".str_repeat('*', 21)."\n".$css_definition."\t".str_repeat('*', 20)."/\n"
                        //;

                        // remove font, margin, backgroud and color from the css definition
                        //$search = "/\b(font-[a-z]+|margin-[a-z]+|background-color|color)\b[^;]*;/";
                        //$css_definition = preg_replace($search, '/* $0 */', $css_definition);
                        break;
                    default:
                        // we need to do some special processing of CSS for list items
                        // override standard Moodle 2.0 setting of li {list-style-type }
                        if (preg_match('/(ol|ul)([.#]\w+)?$/', $selector)) {
                            // CSS for a list ("ol" or "ul")
                            $search = '/\s*'.'list-style-type'.'\s*:\s*'.'[a-zA-Z0-9_-]+/';
                            if (preg_match($search, $css_definition, $matches)) {
                                $listitem_css .= "\n$container $selector li {\n".$matches[0].";\n}";
                            }
                        }
                        // restrict other CSS selectors to affect only the content of the container element
                        $selectors[] = "$container $selector";
                }
            }
        }
        if (empty($selectors)) {
            return '';
        } else {
            return implode(",\n", $selectors)."\n".'{'.$css_definition.'}'.$listitem_css;
        }
    }

    /**
     * fix_onload
     *
     * @param xxx $onload
     * @param xxx $script_tags (optional, default=false)
     * @return xxx
     */
    function fix_onload($onload, $script_tags=false)  {
        static $count = 0;
        $onload_temp  = 'onload_'.sprintf('%02d', (++$count));

        $onload_oneline = preg_replace('/\s+/s', ' ', $onload);
        $onload_nospace = str_replace(' ', '', $onload_oneline);

        $str = '';
        if ($script_tags) {
            $str .= "\n".'<script type="text/javascript">'."\n"."//<![CDATA[\n";
        }
        $str .= ''
            .'if (typeof(window.onload)=="function"){'."\n"
            .'	var s = onload.toString();'."\n"
            .'	s = s.replace(new RegExp("\\\\s+", "g"), "");'."\n"
            .'	if (s.indexOf("'.$onload_nospace.'")<0){'."\n"
            .'		window.'.$onload_temp.' = onload;'."\n"
            .'		window.onload = new Function("window.'.$onload_temp.'();"+"'.$onload_oneline.';");'."\n"
            .'	}'."\n"
            .'} else {'."\n"
            .'	window.onload = new Function("'.$onload_oneline.'");'."\n"
            .'}'."\n"
        ;
        if ($script_tags) {
            $str .= "//]]>\n"."</script>\n";
        }
        return $str;
    }

    /**
     * fix_mediafilter
     *
     * @return xxx
     */
    function fix_mediafilter()  {
        global $CFG;

        if (! $this->hotpot->usemediafilter) {
            return false;
        }

        if (! hotpot::load_mediafilter_filter($this->hotpot->usemediafilter)) {
            return false;
        }
        $mediafilterclass = 'hotpot_mediafilter_'.$this->hotpot->usemediafilter;
        $mediafilter = new $mediafilterclass($this);

        $mediafilter->fix('headcontent', $this);
        $mediafilter->fix('bodycontent', $this);

        if ($mediafilter->js_inline) {
            // remove the internal </script><script ... > joins from the inline javascripts (js_inline)
            $search = '/(?:\s*\/\/\]\]>)?'.'\s*<\/script>\s*<script type="text\/javascript">'.'(?:\s*\/\/<!\[CDATA\[[ \t]*)?/is';
            $mediafilter->js_inline = preg_replace($search, '', $mediafilter->js_inline);

            // extract urls of deferred scripts from $mediafilter->js_external
            if (preg_match_all($this->tagpattern('script'), $mediafilter->js_external, $scripts, PREG_OFFSET_CAPTURE)) {
                $deferred_js = array();
                $strlen_wwwroot = strlen($CFG->wwwroot);
                foreach (array_reverse($scripts[0]) as $script) {
                    // $script [0] => matched string, [1] => offset to start of matched string
                    $remove = false;
                    if (strpos($script[0], 'type="text/javascript"')) {
                        if (preg_match('/src="(.*?)"/i', $script[0], $matches)) {
                            if (strpos($script[0], 'defer="defer"')===false) {
                                $inhead = true;
                            } else {
                                $inhead = false;
                            }
                            // we do not add scripts with $this->page->requires->js() because
                            // they will not then be added when content is retrieved from cache
                            //if (substr($matches[1], 0, $strlen_wwwroot)==$CFG->wwwroot) {
                            //    $this->page->requires->js(substr($matches[1], $strlen_wwwroot), $inhead);
                            //    $remove = true;
                            //} else
                            if ($inhead) {
                                // leave this script where it is (i.e. in the head)
                            } else {
                                array_unshift($deferred_js, '"'.addslashes_js($matches[1]).'"');
                                $remove = true;
                            }
                        }
                    }
                    if ($remove) {
                        $mediafilter->js_external = substr_replace($mediafilter->js_external, '', $script[1], strlen($script[0]));
                    }
                }
                $deferred_js = implode(',', array_unique($deferred_js));
            } else {
                $deferred_js = '';
            }
            if ($deferred_js) {
                $deferred_js = ''
                    .'  // load deferred scripts'."\n"
                    .'  var head = document.getElementsByTagName("head")[0];'."\n"
                    .'  var urls = new Array('.$deferred_js.');'."\n"
                    .'  for (var i=0; i<urls.length; i++) {'."\n"
                    .'    var script = document.createElement("script");'."\n"
                    .'    script.type = "text/javascript";'."\n"
                    .'    script.src = urls[i];'."\n"
                    .'    head.appendChild(script);'."\n"
                    .'  }'."\n"
                ;
            }

            $functions = '';
            if (preg_match_all('/(?<=function )\w+/', $mediafilter->js_inline, $names)) {
                foreach ($names[0] as $name) {
                    list($start, $finish) = $this->locate_js_function($name, $mediafilter->js_inline, true);
                    if ($finish) {
                        $functions .= trim(substr($mediafilter->js_inline, $start, ($finish - $start)))."\n";
                        $mediafilter->js_inline = substr_replace($mediafilter->js_inline, '', $start, ($finish - $start));
                    }
                }
            }

            // put all the inline javascript into one single function called "hotpot_mediafilter_loader()",
            // which also loads up any deferred js, and force this function to be run when the page has loaded
            $onload = 'hotpot_mediafilter_loader()';
            $search = '/(\/\/<!\[CDATA\[)(.*)(\/\/\]\]>)/s';
            $replace = '$1'."\n"
                .$functions
                .'function '.$onload.'{'
                .'$2'
                //."\n"
                .$deferred_js // load deferred scripts, if any
                .$this->fix_mediafilter_onload_extra()
                .'} // end function '.$onload."\n"
                ."\n"
                .$this->fix_onload($onload)
                .'$3'
            ;
            $mediafilter->js_inline = preg_replace($search, $replace, $mediafilter->js_inline, 1);

            // append the inline javascripts to the end of the bodycontent
            $this->bodycontent .= $mediafilter->js_inline;
        }

        if ($mediafilter->js_external) {
            // append the external javascripts to the head content
            $this->headcontent .= $mediafilter->js_external;
        }
    }

    /**
     * fix_mediafilter_onload_extra
     *
     * @return xxx
     */
    function fix_mediafilter_onload_extra()  {
        return '';
    }

    /**
     * fix_relativeurls
     *
     * @param xxx $str (optional, default=null)
     * @return xxx
     */
    function fix_relativeurls($str=null)  {
        // elements of the regular expression which will search for the URLs
        $tagopen = '(?:(<)|(\\\\u003C)|(&lt;)|(&amp;#x003C;))'; // left angle bracket
        $tagclose = '(?(2)>|(?(3)\\\\u003E|(?(4)&gt;|(?(5)&amp;#x003E;))))'; //  right angle bracket (to match left angle bracket)

        $space = '\s+'; // at least one space
        $equals = '\s*=\s*'; // equals sign (+ white space)
        $anychar = '(?:[^>]*?)'; // any character

        $quoteopen = '("|\\\\"|&quot;|&amp;quot;'."|'|\\\\'|&apos;|&amp;apos;".')'; // open quote
        $quoteclose = '\\6'; //  close quote (to match open quote)

        // define which attributes of which HTML tags to search for URLs
        $tags = array(
            // tag  =>  attribute containing url
            'a'      => 'href',
            'area'   => 'href', // <area href="sun.htm" ... shape="..." coords="..." />
            'embed'  => 'src',
            'iframe' => 'src',
            'img'    => 'src',
            'input'  => 'src', // <input type="image" src="..." >
            'link'   => 'href',
            'object' => 'data',
            'param'  => 'value',
            'script' => 'src',
            'source' => 'src', // HTML5
            '(?:table|th|td)' => 'background',
            '[a-z]+' => 'style'
        );

        // replace relative URLs in attributes of certain HTML tags
        foreach ($tags as $tag=>$attribute) {
            if ($tag=='param') {
                $url = '[^ =]+?\.[^ ]+?'; // must include a filename and have no spaces
            } else {
                $url = '.*?';
            }
            $search = "/($tagopen$tag$space$anychar$attribute$equals$quoteopen)($url)($quoteclose$anychar$tagclose)/is";
            if ($attribute=='style') {
                $callback = array($this, 'convert_urls_css');
            } else {
                $callback = array($this, 'convert_url_relative');
            }
            if (is_string($str)) {
                $str = preg_replace_callback($search, $callback, $str);
            } else {
                $this->headcontent = preg_replace_callback($search, $callback, $this->headcontent);
                $this->bodycontent = preg_replace_callback($search, $callback, $this->bodycontent);
            }
        }

        if (is_string($str)) {
            return $str;
        }

        // replace relative URLs in stylesheets
        $search = '/'.'(<style[^>]*>)'.'(.*?)'.'(<\/style>)'.'/is';
        $callback = array($this, 'convert_urls_css');
        $this->headcontent = preg_replace_callback($search, $callback, $this->headcontent);
        $this->bodycontent = preg_replace_callback($search, $callback, $this->bodycontent);

        // replace relative URLs in <a ... onclick="window.open('...')...">...</a>
        $search = '/'.'('.'onclick="'."window.open\('".')'."([^']*)".'('."'[^\)]*\);return false;".'")'.'/is';
        $callback = array($this, 'convert_url');
        $this->bodycontent = preg_replace_callback($search, $callback, $this->bodycontent);
    }

    /**
     * convert_urls_css
     *
     * @param xxx $match
     * @return xxx
     */
    function convert_urls_css($match)  {
        $before = $match[1];
        $css    = $match[count($match) - 2];
        $after  = $match[count($match) - 1];

        $search = '/(url\(['."'".'"]?)(.+?)(['."'".'"]?\))/is';
        $callback = array($this, 'convert_url');
        return $before.preg_replace_callback($search, $callback, $css).$after;
    }

    /**
     * convert_url_relative
     *
     * @param xxx $match
     * @return xxx
     */
    function convert_url_relative($match)  {
        if (is_string($match)) {
            $before = '';
            $url    = $match;
            $after  = '';
        } else {
            $before = $match[1];
            $url    = $match[count($match) - 2];
            $after  = $match[count($match) - 1];
        }

        switch (true) {
            case preg_match('/^'.'\w+=[^&]+'.'('.'&((amp;#x0026;)?amp;)?'.'\w+=[^&]+)*'.'$/', $url):
                // catch <PARAM name="FlashVars" value="TheSound=soundfile.mp3">
                //  ampersands can appear as "&", "&amp;" or "&amp;#x0026;amp;"
                $query = $url;
                $url = '';
                $fragment = '';
                break;

            case preg_match('/^'.'([^?]*)'.'((?:\?[^#]*)?)'.'((?:#.*)?)'.'$/', $url, $matches):
                // parse the $url into $matches
                //  [1] path
                //  [2] query string, if any
                //  [3] anchor fragment, if any
                $url = $matches[1];
                $query = $matches[2];
                $fragment = $matches[3];
                break;

            default:
                // there appears to be no query or fragment in this url
                $query = '';
                $fragment = '';
        } // end switch

        // convert the filepath part of the url
        if ($url) {
            $url = $this->convert_url($url);
        }

        // convert urls, if any, in the query string
        if ($query) {
            $search = '/'.'((?:file|src|thesound|mp3)=)([^&]+)(&|$)/is';
            $callback = array($this, 'convert_url');
            $query = preg_replace_callback($search, $callback, $query);
        }

        // return the reconstructed tag (with converted url)
        return $before.$url.$query.$fragment.$after;
    }

    /**
     * convert_url
     *
     * @param xxx $match
     * @return xxx
     */
    function convert_url($match)  {
        global $CFG;

        if (is_string($match)) {
            $before = '';
            $url    = $match;
            $after  = '';
        } else {
            $before = $match[1];
            $url    = $match[count($match) - 2];
            $after  = $match[count($match) - 1];
        }

        $baseurl = $this->hotpot->source->baseurl;
        $sourcefile = $this->hotpot->source->filepath;

        if ($CFG->slasharguments) {
            $file_php = 'file.php';
        } else {
            $file_php = 'file.php?file=';
        }
        $pluginfile_php = 'plugin'.$file_php;

        // %domainfiles% is not needed, because the same effect can be achieved using simply "/my-file.html"
        //if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on') {
        //    $http = 'https';
        //} else {
        //    $http = 'http';
        //}
        //$url = str_replace('%domainfiles%', $http.'://'.$_SERVER[SERVER_NAME].'/', $url);

        // %quizfiles% is not needed, because this is the default behavior for a relative URL
        // $url = str_replace('%quizfiles%', $CFG->wwwroot.'/'.$baseurl, $url);

        // substitute %wwwroot%, %sitepage/files%, %coursepage/files%, %modulepage/files%
        $replace_pairs = array(
            '%wwwroot%' => $CFG->wwwroot,
            '%sitepage%' => $CFG->wwwroot.'/course/view.php?id='.SITEID,
            '%sitefiles%' => $CFG->wwwroot.'/'.$file_php.'/'.SITEID,
            '%coursepage%' => $CFG->wwwroot.'/course/view.php?id='.$this->hotpot->course->id,
            '%coursefiles%' => $CFG->wwwroot.'/'.$file_php.'/'.$this->hotpot->course->id,
            '%modulepage%' => $CFG->wwwroot.'/mod/hotpot/view.php?id='.$this->hotpot->cm->id,
            '%modulefiles%' => $CFG->wwwroot.'/'.$pluginfile_php.'/'.$this->hotpot->context->id.'/mod_hotpot/sourcefile'
        );
        $url = strtr($url, $replace_pairs);

        if (preg_match('/^(?:\/|(?:[a-zA-Z0-9]+:))/', $url)) {
            // no processing  - this is already an absolute url (http:, mailto:, javascript:, etc)
            return $before.$url.$after;
        }

        // get the subdirectory, $dir, of the quiz $sourcefile
        $dir = dirname($sourcefile);

        if ($baseurl=='' && preg_match('/^https?:\/\//', $dir)) {
            $url = $dir.'/'.$url;
        } else {
            // remove leading "./" and "../"
            while (preg_match('/^(\.{1,2})\/(.*)$/', $url, $matches)) {
                if ($matches[1]=='..') {
                    $dir = dirname($dir);
                }
                $url = $matches[2];
            }
            // add subdirectory, $dir, to $baseurl, if necessary
            if ($dir && $dir!='.') {
                $baseurl .= '/'.ltrim($dir, '/');
            }
            // prefix $url with $baseurl
            $url = "$baseurl/$url";
        }

        return $before.$url.$after;
    } // end function : convert_url
}
