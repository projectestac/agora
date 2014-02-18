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
 * Output format: hp_6
 *
 * @package   mod-hotpot
 * @copyright 2010 Gordon Bateson <gordon.bateson@gmail.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

// get parent class
require_once($CFG->dirroot.'/mod/hotpot/attempt/hp/renderer.php');

/**
 * mod_hotpot_attempt_hp_6_renderer
 *
 * @copyright 2010 Gordon Bateson
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @since     Moodle 2.0
 */
class mod_hotpot_attempt_hp_6_renderer extends mod_hotpot_attempt_hp_renderer {

    /**
     * init
     *
     * @param xxx $hotpot
     */
    function init($hotpot)  {
        parent::init($hotpot);
        array_unshift($this->templatesfolders, 'mod/hotpot/attempt/hp/6/templates');
    }

    /**
     * fix_headcontent_DragAndDrop for JMix and JMatch
     */
    function fix_headcontent_DragAndDrop()  {
        // replace one line functions that get and set positions of positionable elements
        $search = array(
            '/(?<=function CardGetL).*/',
            '/(?<=function CardGetT).*/',
            '/(?<=function CardGetW).*/',
            '/(?<=function CardGetH).*/',
            '/(?<=function CardGetB).*/',
            '/(?<=function CardGetR).*/',
            '/(?<=function CardSetL).*/',
            '/(?<=function CardSetT).*/',
            '/(?<=function CardSetW).*/',
            '/(?<=function CardSetH).*/',
        );
        $replace = array(
            "(){return getOffset(this.elm, 'Left')}",
            "(){return getOffset(this.elm, 'Top')}",
            "(){return getOffset(this.elm, 'Width')}",
            "(){return getOffset(this.elm, 'Height')}",
            "(){return getOffset(this.elm, 'Bottom')}",
            "(){return getOffset(this.elm, 'Right')}",
            "(NewL){setOffset(this.elm, 'Left', NewL)}",
            "(NewT){setOffset(this.elm, 'Top',  NewT)}",
            "(NewW){setOffset(this.elm, 'Width', NewW)}",
            "(NewH){setOffset(this.elm, 'Height', NewH)}"
        );
        $this->headcontent = preg_replace($search, $replace, $this->headcontent, 1);
    }

    /**
     * fix_headcontent_rottmeier
     *
     * @param xxx $type (optional, default='')
     */
    function fix_headcontent_rottmeier($type='')  {

        switch ($type) {

            case 'dropdown':
                // adding missing brackets to call to Is_ExerciseFinished() in CheckAnswers()
                $search = '/(Finished\s*=\s*Is_ExerciseFinished)(;)/';
                $this->headcontent = preg_replace($search, '$1()$2', $this->headcontent);
                break;

            case 'findit':
                // get position of last </style> tag and
                // insert CSS to make <b> and <em> tags bold
                // even within GapSpans added by javascript
                $search = '</style>';
                if ($pos = strrpos($this->headcontent, $search)) {
                    $insert = "\n"
                        .'<!--[if IE 6]><style type="text/css">'."\n"
                        .'span.GapSpan{'."\n"
                        .'	font-size:24px;'."\n"
                        .'}'."\n"
                        .'</style><![endif]-->'."\n"
                        .'<style type="text/css">'."\n"
                        .'b span.GapSpan,'."\n"
                        .'em span.GapSpan{'."\n"
                        .'	font-weight:inherit;'."\n"
                        .'}'."\n"
                        .'</style>'."\n"
                    ;
                    $this->headcontent = substr_replace($this->headcontent, $insert, $pos + strlen($search), 0);
                }
                break;

            case 'jintro':
                // add TimeOver variable, so we can use standard detection of quiz completion
                if ($pos = strpos($this->headcontent, 'var Score = 0;')) {
                    $insert = "var TimeOver = false;\n";
                    $this->headcontent = substr_replace($this->headcontent, $insert, $pos, 0);
                }
                break;

            case 'jmemori':
                // add TimeOver variable, so we can use standard detection of quiz completion
                if ($pos = strpos($this->headcontent, 'var Score = 0;')) {
                    $insert = "var TimeOver = false;\n";
                    $this->headcontent = substr_replace($this->headcontent, $insert, $pos, 0);
                }

                // override table border collapse from standard Moodle styles
                if ($pos = strrpos($this->headcontent, '</style>')) {
                    $insert = ''
                        .'#'.$this->themecontainer.' form table'."\n"
                        .'{'."\n"
                        .'	border-collapse: separate;'."\n"
                        .'	border-spacing: 2px;'."\n"
                        .'}'."\n"
                    ;
                    $this->headcontent = substr_replace($this->headcontent, $insert, $pos, 0);
                }
                break;
        }
    }

    /**
     * fix_bodycontent_rottmeier
     *
     * @param xxx $hideclozeform (optional, default=false)
     */
    function fix_bodycontent_rottmeier($hideclozeform=false)  {
        // fix left aligned instructions in Rottmeier-based formats
        //     JCloze: DropDown, FindIt(a)+(b), JGloss
        //     JMatch: JMemori
        $search = '/<p id="Instructions">(.*?)<\/p>/is';
        $replace = '<div id="Instructions">$1</div>';
        $this->bodycontent = preg_replace($search, $replace, $this->bodycontent);

        if ($hideclozeform) {
            // initially hide the Cloze text (so gaps are not revealed)
            $search = '/<(form id="Cloze" [^>]*)>/is';
            $replace = '<$1 style="display:none;">';
            $this->bodycontent = preg_replace($search, $replace, $this->bodycontent);
        }
    }

    /**
     * get_js_functionnames
     *
     * @return xxx
     */
    function get_js_functionnames()  {
        // return a comma-separated list of js functions to be "fixed".
        // Each function name requires an corresponding function called:
        // fix_js_{$name}

        return 'Client,ShowElements,GetViewportHeight,SuppressBackspace,PageDim,TrimString,RemoveBottomNavBarForIE,StartUp,GetUserName,PreloadImages,ShowMessage,HideFeedback,SendResults,Finish,WriteToInstructions,ShowSpecialReadingForQuestion';
    }

    /**
     * fix_js_Client
     *
     * @param xxx $str (passed by reference)
     * @param xxx $start
     * @param xxx $length
     */
    function fix_js_Client(&$str, $start, $length)  {
        $substr = substr($str, $start, $length);

        // refine detection of Chrome browser
        $search = 'this.geckoVer < 20020000';
        if ($pos = strpos($substr, $search)) {
            $substr = substr_replace($substr, 'this.geckoVer > 10000000 && ', $pos, 0);
        }

        // add detection of Chrome browser
        $search = '/(\s*)if \(this\.min == false\)\{/s';
        $replace = '$1'
            ."this.chrome = (this.ua.indexOf('Chrome') > 0);".'$1'
            ."if (this.chrome) {".'$1'
            ."	this.geckoVer = 0;".'$1'
            ."	this.safari = false;".'$1'
            ."	this.min = true;".'$1'
            ."}$0"
        ;
        $substr = preg_replace($search, $replace, $substr, 1);

        $str = substr_replace($str, $substr, $start, $length);
    }

    /**
     * fix_js_ShowElements
     *
     * @param xxx $str (passed by reference)
     * @param xxx $start
     * @param xxx $length
     */
    function fix_js_ShowElements(&$str, $start, $length)  {
        $substr = substr($str, $start, $length);

        // hide <embed> tags (required for Chrome browser)
        if ($pos = strpos($substr, 'TagName == "object"')) {
            $substr = substr_replace($substr, 'TagName == "embed" || ', $pos, 0);
        }

        $str = substr_replace($str, $substr, $start, $length);
    }

    /**
     * fix_js_PageDim
     *
     * @param xxx $str (passed by reference)
     * @param xxx $start
     * @param xxx $length
     * @return xxx
     */
    function fix_js_PageDim(&$str, $start, $length)  {
        if ($this->usemoodletheme) {
            $obj = "document.getElementById('$this->themecontainer')"; // moodle
        } else {
            $obj = "document.getElementsByTagName('body')[0]"; // original
        }
        $replace = ''
            ."function getStyleValue(obj, property_name, propertyName){\n"
            ."	var value = 0;\n"
            ."	// Watch out for HTMLDocument which has no style property\n"
            ."	// as this causes errors later in getComputedStyle() in FF\n"
            ."	if (obj && obj.style){\n"
            ."		// based on http://www.quirksmode.org/dom/getstyles.html\n"
            ."		if (document.defaultView && document.defaultView.getComputedStyle){\n"
            ."			// Firefox, Opera, Safari\n"
            ."			value = document.defaultView.getComputedStyle(obj, null).getPropertyValue(property_name);\n"
            ."		} else if (obj.currentStyle) {"
            ."			// IE (and Opera)\n"
            ."			value = obj.currentStyle[propertyName];\n"
            ."		}\n"
            ."		if (typeof(value)=='string'){\n"
            ."			var r = new RegExp('([0-9.]*)([a-z]+)');\n"
            ."			var m = value.match(r);\n"
            ."			if (m){\n"
            ."				switch (m[2]){\n"
            ."					case 'em':\n"
            ."						// as far as I can see, only IE needs this\n"
            ."						// other browsers have getComputedStyle() in px\n"
            ."						if (typeof(obj.EmInPx)=='undefined'){\n"
            ."							var div = obj.parentNode.appendChild(document.createElement('div'));\n"
            ."							div.style.margin = '0px';\n"
            ."							div.style.padding = '0px';\n"
            ."							div.style.border = 'none';\n"
            ."							div.style.height = '1em';\n"
            ."							obj.EmInPx = getOffset(div, 'Height');\n"
            ."							obj.parentNode.removeChild(div);\n"
            ."						}\n"
            ."						value = parseFloat(m[1] * obj.EmInPx);\n"
            ."						break;\n"
            ."					case 'px':\n"
            ."						value = parseFloat(m[1]);\n"
            ."						break;\n"
            ."					default:\n"
            ."						value = 0;\n"
            ."				}\n"
            ."			} else {\n"
            ."				value = 0 ;\n"
            ."			}\n"
            ."		} else {\n"
            ."			value = 0;\n"
            ."		}\n"
            ."	}\n"
            ."	return value;\n"
            ."}\n"
            ."function isStrict(){\n"
            ."	return false;\n"
            ."	if (typeof(window.cache_isStrict)=='undefined'){\n"
            ."		if (document.compatMode) { // ie6+\n"
            ."			window.cache_isStrict = (document.compatMode=='CSS1Compat');\n"
            ."		} else if (document.doctype){\n"
            ."			var s = document.doctype.systemId || document.doctype.name; // n6 OR ie5mac\n"
            ."			window.cache_isStrict = (s && s.indexOf('strict.dtd') >= 0);\n"
            ."		} else {\n"
            ."			window.cache_isStrict = false;\n"
            ."		}\n"
            ."	}\n"
            ."	return window.cache_isStrict;\n"
            ."}\n"
            ."function setOffset(obj, type, value){\n"
            ."	if (! obj){\n"
            ."		return false;\n"
            ."	}\n"
            ."\n"
            ."	switch (type){\n"
            ."		case 'Right':\n"
            ."			return setOffset(obj, 'Width', value - getOffset(obj, 'Left'));\n"
            ."		case 'Bottom':\n"
            ."			return setOffset(obj, 'Height', value - getOffset(obj, 'Top'));\n"
            ."	}\n"
            ."\n"
            ."	if (isStrict()){\n"
            ."		// set arrays of p(roperties) and s(ub-properties)\n"
            ."		var properties = new Array('margin', 'border', 'padding');\n"
            ."		switch (type){\n"
            ."			case 'Top':\n"
            ."				var sides = new Array('Top');\n"
            ."				break;\n"
            ."			case 'Left':\n"
            ."				var sides = new Array('Left');\n"
            ."				break;\n"
            ."			case 'Width':\n"
            ."				var sides = new Array('Left', 'Right');\n"
            ."				break;\n"
            ."			case 'Height':\n"
            ."				var sides = new Array('Top', 'Bottom');\n"
            ."				break;\n"
            ."			default:\n"
            ."				return 0;\n"
            ."		}\n"
            ."		for (var p=0; p<properties.length; p++){\n"
            ."			for (var s=0; s<sides.length; s++){\n"
            ."				var propertyName = properties[p] + sides[s];\n"
            ."				var property_name = properties[p] + '-' + sides[s].toLowerCase();\n"
            ."				value -= getStyleValue(obj, property_name, propertyName);\n"
            ."			}\n"
            ."		}\n"
            ."		value = Math.floor(value);\n"
            ."	}\n"
            ."	if (type=='Top' || type=='Left') {\n"
            ."		value -= getOffset(obj.offsetParent, type);\n"
            ."	}\n"
            ."	if (obj.style) {\n"
            ."		obj.style[type.toLowerCase()] = value + 'px';\n"
            ."	}\n"
            ."}\n"
            ."function getOffset(obj, type){\n"
            ."	if (! obj){\n"
            ."		return 0;\n"
            ."	}\n"
            ."	switch (type){\n"
            ."		case 'Width':\n"
            ."		case 'Height':\n"
            ."			return eval('(obj.offset'+type+'||0)');\n"
            ."\n"
            ."		case 'Top':\n"
            ."		case 'Left':\n"
            ."			return eval('(obj.offset'+type+'||0) + getOffset(obj.offsetParent, type)');\n"
            ."\n"
            ."		case 'Right':\n"
            ."			return getOffset(obj, 'Left') + getOffset(obj, 'Width');\n"
            ."\n"
            ."		case 'Bottom':\n"
            ."			return getOffset(obj, 'Top') + getOffset(obj, 'Height');\n"
            ."\n"
            ."		default:\n"
            ."			return 0;\n"
            ."	} // end switch\n"
            ."}\n"
            ."function PageDim(){\n"
            ."	var obj = $obj;\n"
            ."	this.W = getOffset(obj, 'Width');\n"
            ."	this.H = getOffset(obj, 'Height');\n"
            ."	this.Top = getOffset(obj, 'Top');\n"
            ."	this.Left = getOffset(obj, 'Left');\n"
            ."}\n"
            ."function getClassAttribute(className, attributeName){\n"
            ."	//based on http://www.shawnolson.net/a/503/\n"
            ."	if (! document.styleSheets){\n"
            ."		return null; // old browser\n"
            ."	}\n"
            ."	var css = document.styleSheets;\n"
            ."	var rules = (document.all ? 'rules' : 'cssRules');\n"
            ."	var regexp = new RegExp('\\\\.'+className+'\\\\b');\n"
            ."	try {\n"
            ."		var i_max = css.length;\n"
            ."	} catch(err) {\n"
            ."		var i_max = 0; // shouldn't happen !!\n"
            ."	}\n"
            ."	for (var i=0; i<i_max; i++){\n"
            ."		try {\n"
            ."			var ii_max = css[i][rules].length;\n"
            ."		} catch(err) {\n"
            ."			var ii_max = 0; // shouldn't happen !!\n"
            ."		}\n"
            ."		for (var ii=0; ii<ii_max; ii++){\n"
            ."			if (! css[i][rules][ii].selectorText){\n"
            ."				continue;\n"
            ."			}\n"
            ."			if (css[i][rules][ii].selectorText.match(regexp)){\n"
            ."				if (css[i][rules][ii].style[attributeName]){\n"
            ."					// class/attribute found\n"
            ."					return css[i][rules][ii].style[attributeName];\n"
            ."				}\n"
            ."			}\n"
            ."		}\n"
            ."	}\n"
            ."	// class/attribute not found\n"
            ."	return null;\n"
            ."}\n"
        ;
        $str = substr_replace($str, $replace, $start, $length);
    }

    /**
     * fix_js_GetViewportHeight
     *
     * @param xxx $str (passed by reference)
     * @param xxx $start
     * @param xxx $length
     * @return xxx
     */
    function fix_js_GetViewportHeight(&$str, $start, $length)  {
        $replace = ''
            ."function GetViewportSize(type){\n"
            ."	if (eval('window.inner' + type)){\n"
            ."		return eval('window.inner' + type);\n"
            ."	}\n"
            ."	if (document.documentElement){\n"
            ."		if (eval('document.documentElement.client' + type)){\n"
            ."			return eval('document.documentElement.client' + type);\n"
            ."		}\n"
            ."	}\n"
            ."	if (document.body){\n"
            ."		if (eval('document.body.client' + type)){\n"
            ."			return eval('document.body.client' + type);\n"
            ."		}\n"
            ."	}\n"
            ."	return 0;\n"
            ."}\n"
            ."function GetViewportHeight(){\n"
            ."	return GetViewportSize('Height');\n"
            ."}\n"
            ."function GetViewportWidth(){\n"
            ."	return GetViewportSize('Width');\n"
            ."}"
        ;
        $str = substr_replace($str, $replace, $start, $length);
    }

    /**
     * fix_js_SuppressBackspace
     *
     * @param xxx $str (passed by reference)
     * @param xxx $start
     * @param xxx $length
     * @return xxx
     */
    function fix_js_SuppressBackspace(&$str, $start, $length)  {
        // could also check "window.InTextBox" which is HP's standard way of detecting INPUT and TEXTAREA
        $replace = ''
            ."function SuppressBackspace(evt) {\n"
            ."	if (evt==null) {\n"
            ."		evt = window.event;\n"
            ."	}\n"
            ."	if (evt.target) {\n"
            ."		var evtTarget = evt.target;\n"
            ."	} else if (evt.srcElement) {\n"
            ."		var evtTarget = evt.srcElement;\n"
            ."	} else {\n"
            ."		return true;\n" // shouldn't happen !!
            ."	}\n"
            ."	if (evt.keyCode != 8) {\n"
            ."		return true;\n" // not the delete key
            ."	}\n"
            ."	if (evtTarget.nodeType==3) {\n" // Safari quirk
            ."		evtTarget = evtTarget.parentNode;\n"
            ."	}\n"
            ."	if (evtTarget.tagName=='INPUT' || evtTarget.tagName=='TEXTAREA') {\n"
            ."		return true;\n" // allow delete key in text input / textarea
            ."	}\n"
            ."	if (evt.preventDefault) {\n"
            ."		evt.preventDefault();\n"
            ."	} else if (window.event) {\n"
            ."		window.event.returnValue = false;\n"
            ."		window.event.cancelBubble = true;\n"
            ."	}\n"
            ."	return false;\n"
            ."}\n"
        ;
        $str = substr_replace($str, $replace, $start, $length);

        // remove standard HP code that assigns event keypress/keydown handler
        $offset = $start + strlen($replace);
        list($start, $finish) = $this->locate_js_block('if', 'C.ie', $str, true, $offset);

        if ($finish) {
            $length = $finish - $start;
            $str = substr_replace($str, '', $start, $length);
        }
    }

    /**
     * remove_js_function
     *
     * @param xxx $str (passed by reference)
     * @param xxx $start
     * @param xxx $length
     * @param xxx $function
     */
    function remove_js_function(&$str, $start, $length, $function)  {
        // remove this function
        $str = substr_replace($str, '', $start, $length);

        // remove all direct calls to this function
        $search = '/\s*'.$function.'\([^)]*\);/s';
        $str = preg_replace($search, '', $str);
    }

    /**
     * fix_js_TrimString
     *
     * @param xxx $str (passed by reference)
     * @param xxx $start
     * @param xxx $length
     * @return xxx
     */
    function fix_js_TrimString(&$str, $start, $length)  {
        $replace = ''
            ."function TrimString(InString){\n"
            ."	if (typeof(InString)=='string'){\n"
            ."		InString = InString.replace(new RegExp('^\\\\s+', 'g'), ''); // left\n"
            ."		InString = InString.replace(new RegExp('\\\\s+$', 'g'), ''); // right\n"
            ."		InString = InString.replace(new RegExp('\\\\s+', 'g'), ' '); // inner\n"
            ."	}\n"
            ."	return InString;\n"
            ."}"
        ;
        $str = substr_replace($str, $replace, $start, $length);
    }

    /**
     * fix_js_TypeChars
     *
     * @param xxx $str (passed by reference)
     * @param xxx $start
     * @param xxx $length
     */
    function fix_js_TypeChars(&$str, $start, $length)  {
        if ($obj = $this->fix_js_TypeChars_obj()) {
            $substr = substr($str, $start, $length);
            if (strpos($substr, 'document.selection')===false) {
                $replace = ''
                    ."function TypeChars(Chars){\n"
                    .$this->fix_js_TypeChars_init()
                    ."	if ($obj==null || $obj.style.display=='none') {\n"
                    ."		return;\n"
                    ."	}\n"
                    ."	$obj.focus();\n"
                    ."	if (typeof($obj.selectionStart)=='number') {\n"
                    ."		// FF, Safari, Chrome, Opera\n"
                    ."		var startPos = $obj.selectionStart;\n"
                    ."		var endPos = $obj.selectionEnd;\n"
                    ."		$obj.value = $obj.value.substring(0, startPos) + Chars + $obj.value.substring(endPos);\n"
                    ."		var newPos = startPos + Chars.length;\n"
                    ."		$obj.setSelectionRange(newPos, newPos);\n"
                    ."	} else if (document.selection) {\n"
                    ."		// IE (tested on IE6, IE7, IE8)\n"
                    ."		var rng = document.selection.createRange();\n"
                    ."		rng.text = Chars;\n"
                    ."		rng = null; // prevent memory leak\n"
                    ."	} else {\n"
                    ."		// this browser can't insert text, so append instead\n"
                    ."		$obj.value += Chars;\n"
                    ."	}\n"
                    ."}"
                ;
                $str = substr_replace($str, $replace, $start, $length);
            }
        }
    }

    /**
     * fix_js_TypeChars_init
     *
     * @return xxx
     */
    function fix_js_TypeChars_init()  {
        return '';
    }

    /**
     * fix_js_TypeChars_obj
     *
     * @return xxx
     */
    function fix_js_TypeChars_obj()  {
        return '';
    }

    /**
     * fix_js_SendResults
     *
     * @param xxx $str (passed by reference)
     * @param xxx $start
     * @param xxx $length
     */
    function fix_js_SendResults(&$str, $start, $length)  {
        $this->remove_js_function($str, $start, $length, 'SendResults');
    }

    /**
     * fix_js_GetUserName
     *
     * @param xxx $str (passed by reference)
     * @param xxx $start
     * @param xxx $length
     */
    function fix_js_GetUserName(&$str, $start, $length)  {
        $this->remove_js_function($str, $start, $length, 'GetUserName');
    }

    /**
     * fix_js_Finish
     *
     * @param xxx $str (passed by reference)
     * @param xxx $start
     * @param xxx $length
     */
    function fix_js_Finish(&$str, $start, $length)  {
        $this->remove_js_function($str, $start, $length, 'Finish');
    }

    /**
     * fix_js_PreloadImages
     *
     * @param xxx $str (passed by reference)
     * @param xxx $start
     * @param xxx $length
     */
    function fix_js_PreloadImages(&$str, $start, $length)  {
        $substr = substr($str, $start, $length);

        // fix issue in IE8 which sometimes doesn't have Image object in popups
        // http://moodle.org/mod/forum/discuss.php?d=134510
        $search = "Imgs[i] = new Image();";
        if ($pos = strpos($substr, $search)) {
            $replace = "Imgs[i] = (window.Image ? new Image() : document.createElement('img'));";
            $substr = substr_replace($substr, $replace, $pos, strlen($search));
        }

        $str = substr_replace($str, $substr, $start, $length);
    }

    /**
     * fix_js_WriteToInstructions
     *
     * @param xxx $str (passed by reference)
     * @param xxx $start
     * @param xxx $length
     * @return xxx
     */
    function fix_js_WriteToInstructions(&$str, $start, $length)  {
        $substr = substr($str, $start, $length);

        if ($pos = strpos($substr, '{')) {
            $insert = "\n"
                ."	// check required HTML element exists\n"
                ."	if (! document.getElementById('InstructionsDiv')) return false;\n"
            ;
            $substr = substr_replace($substr, $insert, $pos+1, 0);
        }

        if ($pos = strrpos($substr, '}')) {
            $append = "\n"
                ."	StretchCanvasToCoverContent(true);\n"
            ;
            $substr = substr_replace($substr, $append, $pos, 0);
        }

        $str = substr_replace($str, $substr, $start, $length);
    }

    /**
     * fix_js_ShowMessage
     *
     * @param xxx $str (passed by reference)
     * @param xxx $start
     * @param xxx $length
     * @return xxx
     */
    function fix_js_ShowMessage(&$str, $start, $length)  {
        // the ShowMessage function is used by all HP6 quizzes

        $substr = substr($str, $start, $length);

        // only show feedback if the required HTML elements exist
        // this prevents JavaScript errors which block the returning of the quiz results to Moodle
        if ($pos = strpos($substr, '{')) {
            $insert = "\n"
                ."	// check required HTML elements exist\n"
                ."	if (! document.getElementById('FeedbackDiv')) return false;\n"
                ."	if (! document.getElementById('FeedbackContent')) return false;\n"
                ."	if (! document.getElementById('FeedbackOKButton')) return false;\n"
            ;
            $substr = substr_replace($substr, $insert, $pos+1, 0);
        }

        // hide <embed> elements on Chrome browser
        $search = "/(\s*)ShowElements\(true, 'object', 'FeedbackContent'\);/s";
        $replace = ''
            ."$0".'$1'
            ."if (C.chrome) {".'$1'
            ."	ShowElements(false, 'embed');".'$1'
            ."	ShowElements(true, 'embed', 'FeedbackContent');".'$1'
            ."}"
        ;
        $substr = preg_replace($search, $replace, $substr, 1);

        // fix "top" setting to position FeedbackDiv
        if ($this->usemoodletheme) {
            $canvas = "document.getElementById('$this->themecontainer')"; // moodle
        } else {
            $canvas = "document.getElementsByTagName('body')[0]"; // original
        }
        $search = "/FDiv.style.top = [^;]*;(\s*)(FDiv.style.display = [^;]*;)/s";
        $replace = ''
            .'$1$2'
            .'$1'."var t = getOffset($canvas, 'Top');"
            .'$1'."setOffset(FDiv, 'Top', Math.max(t, TopSettingWithScrollOffset(30)));"
        ;
        $substr = preg_replace($search, $replace, $substr, 1);

        // append link to student feedback form, if necessary
        if ($this->hotpot->studentfeedback) {
            $search = '/(\s*)var Output = [^;]*;/';
            $replace = ''
                ."$0".'$1'
                ."if (window.FEEDBACK) {".'$1'
                ."	Output += '".'<a href="javascript:hpFeedback();">'."' + FEEDBACK[6] + '</a>';".'$1'
                ."}"
            ;
            $substr = preg_replace($search, $replace, $substr, 1);
        }

        $str = substr_replace($str, $substr, $start, $length);
    }

    /**
     * fix_js_RemoveBottomNavBarForIE
     *
     * @param xxx $str (passed by reference)
     * @param xxx $start
     * @param xxx $length
     */
    function fix_js_RemoveBottomNavBarForIE(&$str, $start, $length)  {
        $replace = ''
            ."function RemoveBottomNavBarForIE(){\n"
            ."	if (C.ie) {\n"
            ."		if (document.getElementById('Reading')){\n"
            ."			var obj = document.getElementById('BottomNavBar');\n"
            ."			if (obj){\n"
            ."				obj.parentNode.removeChild(obj);\n"
            ."			}\n"
            ."		}\n"
            ."	}\n"
            ."}"
        ;
        $str = substr_replace($str, $replace, $start, $length);
    }

    /**
     * fix_js_StartUp_DragAndDrop
     *
     * @param xxx $substr (passed by reference)
     */
    function fix_js_StartUp_DragAndDrop(&$substr)  {
        // fixes for Drag and Drop (JMatch and JMix)
    }

    /**
     * fix_js_StartUp_DragAndDrop_DragArea
     *
     * @param xxx $substr (passed by reference)
     */
    function fix_js_StartUp_DragAndDrop_DragArea(&$substr)  {
        // fix LeftCol (=left side of drag area)
        $search = '/(LeftColPos = [^;]+);/';
        $replace = '$1 + pg.Left;';
        $substr = preg_replace($search, $replace, $substr, 1);

        // fix DragTop (=top side of Drag area)
        $search = '/DragTop = [^;]+;/';
        $replace = "DragTop = getOffset(document.getElementById('CheckButtonDiv'),'Bottom') + 10;";
        $substr = preg_replace($search, $replace, $substr, 1);
    }

    /**
     * fix_js_StartUp
     *
     * @param xxx $str (passed by reference)
     * @param xxx $start
     * @param xxx $length
     */
    function fix_js_StartUp(&$str, $start, $length)  {
        $substr = substr($str, $start, $length);

        // ensure StartUp is not called more than once
        if ($pos = strpos($substr, '{')) {
            $insert = "\n"
                ."	if (window.StartedUp) {\n"
                ."		return;\n"
                ."	}\n"
                ."	window.StartedUp = true;"
            ;
            $substr = substr_replace($substr, $insert, $pos+1, 0);
        }

        // if necessary, fix drag area for JMatch or JMix drag-and-drop
        $this->fix_js_StartUp_DragAndDrop($substr);

        if ($pos = strrpos($substr, '}')) {
            if ($this->hotpot->delay3==hotpot::TIME_DISABLE) {
                $ajax = 1;
            } else {
                $ajax = 0;
            }
            if ($this->can_clickreport()) {
                $sendallclicks = 1;
            } else {
                $sendallclicks = 0;
            }
            if ($this->can_continue()==hotpot::CONTINUE_RESUMEQUIZ) {
                $onunload_status = hotpot::STATUS_INPROGRESS;
            } else {
                $onunload_status = hotpot::STATUS_ABANDONED;
            }
            $append = "\n"
                ."// adjust size and position of Feedback DIV\n"
                ."	if (! window.pg){\n"
                ."		window.pg = new PageDim();\n"
                ."	}\n"
                ."	var FDiv = document.getElementById('FeedbackDiv');\n"
                ."	if (FDiv){\n"
                ."		var w = getOffset(FDiv, 'Width') || FDiv.style.width || getClassAttribute(FDiv.className, 'width');\n"
                ."		if (w){\n"
                ."			if (typeof(w)=='string' && w.indexOf('%')>=0){\n"
                ."				var percent = parseInt(w);\n"
                ."			} else {\n"
                ."				var percent = Math.floor(100 * parseInt(w) / pg.W);\n"
                ."			}\n"
                ."		} else if (window.FeedbackWidth && window.DivWidth){\n"
                ."			var percent = Math.floor(100 * FeedbackWidth / DivWidth);\n"
                ."		} else {\n"
                ."			var percent = 34; // default width as percentage\n"
                ."		}\n"
                ."		FDiv.style.display = 'block';\n"
                ."		setOffset(FDiv, 'Left', pg.Left + Math.floor(pg.W * (50 - percent/2) / 100));\n"
                ."		setOffset(FDiv, 'Width', Math.floor(pg.W * percent / 100));\n"
                ."		FDiv.style.display = 'none';\n"
                ."	}\n"
                ."\n"
                ."	// create HP object (to collect and send responses)\n"
                ."	window.HP = new ".$this->js_object_type."($sendallclicks,$ajax);\n"
                ."\n"
                ."	// define event handlers to try to send results if quiz finishes unexpectedly\n"
                ."	HP_add_listener(window, 'beforeunload', HP_send_results);\n" // modern browsers
                ."	HP_add_listener(window, 'pagehide', HP_send_results);\n"     // modern browsers that don't allow actions in "onbeforeunload"
                ."	HP_add_listener(window, 'unload', HP_send_results);\n"       // old browsers that don't have "onbeforeunload" or "pagehide"
                ."\n"
            ;
            $substr = substr_replace($substr, $append, $pos, 0);
        }

        // stretch the canvas vertically down, if there is a reading
        if ($pos = strrpos($substr, '}')) {
            // Reading is contained in <div class="LeftContainer">
            // MainDiv is contained in <div class="RightContainer">
            // when there is a reading. Otherwise, MainDiv is not contained.
            // ReadingDiv is used to show different reading for each question
            if ($this->usemoodletheme) {
                $canvas = "document.getElementById('$this->themecontainer')"; // moodle
            } else {
                $canvas = "document.getElementsByTagName('body')[0]"; // original
            }
            // None: $canvas = "document.getElementById('page-mod-hotpot-attempt')"
            $id = $this->embed_object_id;
            $onload = $this->embed_object_onload;
            $insert = "\n"
            ."// fix canvas height, if necessary\n"
            ."	if (! window.hotpot_mediafilter_loader){\n"
            ."		StretchCanvasToCoverContent();\n"
            ."	}\n"
            ."}\n"
            ."function StretchCanvasToCoverContent(skipTimeout){\n"
            ."	if (! skipTimeout){\n"
            ."		if (navigator.userAgent.indexOf('Firefox/3')>=0){\n"
            ."			var millisecs = 1000;\n"
            ."		} else {\n"
            ."			var millisecs = 500;\n"
            ."		}\n"
            ."		setTimeout('StretchCanvasToCoverContent(true)', millisecs);\n"
            ."		return;\n"
            ."	}\n"
            ."	var canvas = $canvas;\n"
            ."	if (canvas){\n"
            ."		var ids = new Array('Reading','ReadingDiv','MainDiv');\n"
            ."		var i_max = ids.length;\n"
            ."		for (var i=i_max-1; i>=0; i--){\n"
            ."			var obj = document.getElementById(ids[i]);\n"
            ."			if (obj){\n"
            ."				obj.style.height = ''; // reset height\n"
            ."			} else {\n"
            ."				ids.splice(i, 1); // remove this id\n"
            ."				i_max--;\n"
            ."			}\n"
            ."		}\n"
            ."		var b = 0;\n"
            ."		for (var i=0; i<i_max; i++){\n"
            ."			var obj = document.getElementById(ids[i]);\n"
            ."			b = Math.max(b, getOffset(obj,'Bottom'));\n"
            ."		}\n"
            ."		if (window.Segments) {\n" // JMix special
            ."			var obj = document.getElementById('D'+(Segments.length-1));\n"
            ."			if (obj) {\n"
            ."				b = Math.max(b, getOffset(obj,'Bottom'));\n"
            ."			}\n"
            ."		}\n"
            ."		if (b){\n"
            ."			setOffset(canvas, 'Bottom', b + 21);\n"
            ."			for (var i=0; i<i_max; i++){\n"
            ."				var obj = document.getElementById(ids[i]);\n"
            ."				setOffset(obj, 'Bottom', b);\n"
            ."			}\n"
            ."		}\n"
            ."	}\n"
            ;
            if ($this->hotpot->navigation==hotpot::NAVIGATION_EMBED) {
                // stretch container object/iframe
                $insert .= ''
                    ."	if (parent.$onload) {\n"
                    ."		parent.$onload(null, parent.document.getElementById('".$this->embed_object_id."'));\n"
                    ."	}\n"
                ;
            }
            $substr = substr_replace($substr, $insert, $pos, 0);
        }

        $str = substr_replace($str, $substr, $start, $length);
    }

    /**
     * fix_js_HideFeedback
     *
     * @param xxx $str (passed by reference)
     * @param xxx $start
     * @param xxx $length
     */
    function fix_js_HideFeedback(&$str, $start, $length)  {
        global $CFG;
        $substr = substr($str, $start, $length);

        // unhide <embed> elements on Chrome browser
        $search = "/(\s*)ShowElements\(true, 'object'\);/s";
        $replace = ''
            .'$0$1'
            ."if (C.chrome) {".'$1'
            ."	ShowElements(true, 'embed');".'$1'
            ."}"
        ;
        $substr = preg_replace($search, $replace, $substr, 1);

        $search = '/('.'\s*if \(Finished == true\){\s*)(?:.*?)(\s*})/s';
        if ($this->hotpot->delay3==hotpot::TIME_AFTEROK) {
            $replace = '$1'.'HP_send_results(HP.EVENT_SENDVALUES);'.'$2';
        } else {
            $replace = ''; // i.e. remove this if-block
        }
        $substr = preg_replace($search, $replace, $substr, 1);

        $str = substr_replace($str, $substr, $start, $length);
    }

    /**
     * fix_js_ShowSpecialReadingForQuestion
     *
     * @param xxx $str (passed by reference)
     * @param xxx $start
     * @param xxx $length
     */
    function fix_js_ShowSpecialReadingForQuestion(&$str, $start, $length)  {
        $replace = ''
            ."function ShowSpecialReadingForQuestion(){\n"
            ."	var ReadingDiv = document.getElementById('ReadingDiv');\n"
            ."	if (ReadingDiv){\n"
            ."		var ReadingText = null;\n"
            ."		var divs = ReadingDiv.getElementsByTagName('div');\n"
            ."		for (var i=0; i<divs.length; i++){\n"
            ."			if (divs[i].className=='ReadingText' || divs[i].className=='TempReadingText'){\n"
            ."				ReadingText = divs[i];\n"
            ."				break;\n"
            ."			}\n"
            ."		}\n"
            ."		if (ReadingText && HiddenReadingShown){\n"
            ."			SwapReadingTexts(ReadingText, HiddenReadingShown);\n"
            ."			ReadingText = HiddenReadingShown;\n"
            ."			HiddenReadingShown = false;\n"
            ."		}\n"
            ."		var HiddenReading = null;\n"
            ."		if (QArray[CurrQNum]){\n"
            ."			var divs = QArray[CurrQNum].getElementsByTagName('div');\n"
            ."			for (var i=0; i<divs.length; i++){\n"
            ."				if (divs[i].className=='HiddenReading'){\n"
            ."					HiddenReading = divs[i];\n"
            ."					break;\n"
            ."				}\n"
            ."			}\n"
            ."		}\n"
            ."		if (HiddenReading){\n"
            ."			if (! ReadingText){\n"
            ."				ReadingText = document.createElement('div');\n"
            ."				ReadingText.className = 'ReadingText';\n"
            ."				ReadingDiv.appendChild(ReadingText);\n"
            ."			}\n"
            ."			SwapReadingTexts(ReadingText, HiddenReading);\n"
            ."			HiddenReadingShown = ReadingText;\n"
            ."		}\n"
            ."		var btn = document.getElementById('ShowMethodButton');\n"
            ."		if (btn){\n"
            ."			if (HiddenReadingShown){\n"
            ."				if (btn.style.display!='none'){\n"
            ."					btn.style.display = 'none';\n"
            ."				}\n"
            ."			} else {\n"
            ."				if (btn.style.display=='none'){\n"
            ."					btn.style.display = '';\n"
            ."				}\n"
            ."			}\n"
            ."		}\n"
            ."		btn = null;\n"
            ."		ReadingDiv = null;\n"
            ."		ReadingText = null;\n"
            ."		HiddenReading = null;\n"
            ."	}\n"
            ."}\n"
            ."function SwapReadingTexts(ReadingText, HiddenReading) {\n"
            ."	HiddenReadingParentNode = HiddenReading.parentNode;\n"
            ."	HiddenReadingParentNode.removeChild(HiddenReading);\n"
            ."\n"
            ."	// replaceChild(new_node, old_node)\n"
            ."	ReadingText.parentNode.replaceChild(HiddenReading, ReadingText);\n"
            ."\n"
            ."	if (HiddenReading.IsOriginalReadingText){\n"
            ."		HiddenReading.className = 'ReadingText';\n"
            ."	} else {\n"
            ."		HiddenReading.className = 'TempReadingText';\n"
            ."	}\n"
            ."	HiddenReading.style.display = '';\n"
            ."\n"
            ."	if (ReadingText.className=='ReadingText'){\n"
            ."	    ReadingText.IsOriginalReadingText = true;\n"
            ."	} else {\n"
            ."	    ReadingText.IsOriginalReadingText = false;\n"
            ."	}\n"
            ."	ReadingText.style.display = 'none';\n"
            ."	ReadingText.className = 'HiddenReading';\n"
            ."\n"
            ."	HiddenReadingParentNode.appendChild(ReadingText);\n"
            ."	HiddenReadingParentNode = null;\n"
            ."}\n"
        ;
        $str = substr_replace($str, $replace, $start, $length);
    }

    /**
     * fix_js_CheckAnswers
     *
     * @param xxx $str (passed by reference)
     * @param xxx $start
     * @param xxx $length
     */
    function fix_js_CheckAnswers(&$str, $start, $length)  {
        // JCloze, JCross, JMatch : CheckAnswers
        // JMix : CheckAnswer
        // JQuiz : CheckFinished
        $substr = substr($str, $start, $length);

        // intercept Checks, if necessary
        if ($insert = $this->get_stop_function_intercept()) {
            if ($pos = strpos($substr, '{')) {
                $substr = substr_replace($substr, $insert, $pos+1, 0);
            }
        }

        // add extra argument to function - so it can be called from the "Give Up" button
        $name = $this->get_stop_function_name();
        $search = '/(function '.$name.'\()(.*?)(\))/s';
        $callback = array($this, 'fix_js_CheckAnswers_arguments');
        $substr = preg_replace_callback($search, $callback, $substr, 1);

        // add call to Finish function (including QuizStatus)
        $search = $this->get_stop_function_search();
        $replace = $this->get_stop_function_replace();
        $substr = preg_replace($search, $replace, $substr, 1);

        $str = substr_replace($str, $substr, $start, $length);
    }

    /**
     * fix_js_CheckAnswers_arguments
     *
     * @param xxx $match
     * @return xxx
     */
    function fix_js_CheckAnswers_arguments($match)  {
        if (empty($match[2])) {
            return $match[1].'ForceQuizEvent'.$match[3];
        } else {
            return $match[1].$match[2].',ForceQuizEvent'.$match[3];
        }
    }

    /**
     * get_stop_onclick
     *
     * @return xxx
     */
    function get_stop_onclick() {
        if ($name = $this->get_stop_function_name()) {
            return 'if('.$this->get_stop_function_confirm().')'.$name.'('.$this->get_stop_function_args().')';
        } else {
            return 'HP_send_results(HP.EVENT_ABANDONED)';
        }
    }

    /**
     * get_stop_function_confirm
     *
     * @return xxx
     */
    function get_stop_function_confirm()  {
        // Note: "&&" in onclick must be encoded as html-entities for strict XHTML
        return ''
            ."confirm("
            ."'".$this->hotpot->source->js_value_safe(get_string('confirmstop', 'hotpot'), true)."'"
            ."+'\\n\\n'+(window.HP_beforeunload &amp;&amp; HP_beforeunload()?(HP_beforeunload()+'\\n\\n'):'')+"
            ."'".$this->hotpot->source->js_value_safe(get_string('pressoktocontinue', 'hotpot'), true)."'"
            .")"
        ;
    }

    /**
     * get_stop_function_name
     *
     * @return xxx
     */
    function get_stop_function_name()  {
        // the name of the javascript function into which the "give up" code should be inserted
        return '';
    }

    /**
     * get_stop_function_args
     *
     * @return xxx
     */
    function get_stop_function_args()  {
        // the arguments required by the javascript function which the stop_function() code calls
        return 'HP.EVENT_ABANDONED';
    }

    /**
     * get_stop_function_intercept
     *
     * @return xxx
     */
    function get_stop_function_intercept()  {
        // JMix and JQuiz each have their own version of this function
        return "\n"
            ."	// intercept this Check\n"
            ."	HP.onclickCheck();\n"
        ;
    }

    /**
     * get_stop_function_search
     *
     * @return xxx
     */
    function get_stop_function_search()  {
        // JCloze : AllCorrect || Finished
        // JCross : AllCorrect || TimeOver
        // JMatch : AllDone || TimeOver
        // JMix : AllDone || TimeOver (in the CheckAnswer function)
        // JQuiz : AllDone (in the CheckFinished function)
        return '/\s*if \(\((\w+) == true\)\|\|\(\w+ == true\)\)({).*?}\s*/s';
    }

    /**
     * get_stop_function_replace
     *
     * @return xxx
     */
    function get_stop_function_replace()  {
        // $1 : name of the "all correct/done" variable
        // $2 : opening curly brace of if-block plus any following text to be kept

        $event = $this->get_send_results_event();
        return "\n"
            ."	if ($1){\n"
            ."		var QuizEvent = $event;\n" // COMPLETED or SETVALUES
            ."	} else if (ForceQuizEvent){\n"
            ."		var QuizEvent = ForceQuizEvent;\n" // TIMEDOUT or ABANDONED
            ."	} else if (TimeOver){\n"
            ."		var QuizEvent = HP.EVENT_TIMEDOUT;\n"
            ."	} else {\n"
            ."		var QuizEvent = HP.EVENT_CHECK;\n"
            ."	}\n"
            ."	if (HP.end_of_quiz(QuizEvent)) $2\n"
            ."		if (window.Interval) {\n"
            ."			clearInterval(window.Interval);\n"
            ."		}\n"
            ."		TimeOver = true;\n"
            ."		Locked = true;\n"
            ."		Finished = true;\n"
            ."	}\n"
            ."	if (Finished || HP.sendallclicks){\n"
            ."		if (QuizEvent==HP.EVENT_COMPLETED){\n"
            ."			// send results after delay (quiz completed as expected)\n"
            ."			setTimeout('HP_send_results('+QuizEvent+')', SubmissionTimeout);\n"
            ."		} else {\n"
            ."			// send results immediately (quiz finished unexpectedly)\n"
            ."			HP_send_results(QuizEvent);\n"
            ."		}\n"
            ."	}\n"
        ;
    }

    /**
     * postprocessing
     *
     * after headcontent and bodycontent have been setup and
     * before content is sent to browser, we add title edit icon,
     * insert submission form, adjust navigation butons (if any)
     * and add external javascripts (to the top of the page)
     */
    function postprocessing()  {
        $this->fix_title_icons();
        $this->fix_submissionform();
        $this->fix_navigation_buttons();
        foreach ($this->javascripts as $script) {
            $this->page->requires->js('/'.$script, true);
        }
    }

    /**
     * fix_navigation_buttons
     *
     * @return xxx
     */
    function fix_navigation_buttons()  {
        if ($this->hotpot->navigation==hotpot::NAVIGATION_ORIGINAL) {
            // replace relative URLs in <button class="NavButton" ... onclick="location='...'">
            $search = '/'.'(?<='.'onclick="'."location='".')'."([^']*)".'(?='."'; return false;".'")'.'/is';
            $callback = array($this, 'convert_url_navbutton');
            $this->bodycontent = preg_replace_callback($search, $callback, $this->bodycontent);

            // replace history.back() in <button class="NavButton" ... onclick="history.back(); ...">
            // with a link to the course page
            $params = array('id'=>$this->hotpot->course->id);
            $search = '/'.'(?<='.'onclick=")'.'history\.back\(\)'.'(?=; return false;")'.'/';
            $replace = "location='".new moodle_url('/course/view.php', $params)."'";
            $this->bodycontent = preg_replace($search, $replace, $this->bodycontent);
        }
    }

    /**
     * fix_TimeLimit
     */
    function fix_TimeLimit()  {
        if ($this->hotpot->timelimit > 0) {
            $search = '/(?<=var Seconds = )\d+(?=;)/';
            $this->headcontent = preg_replace($search, $this->hotpot->timelimit, $this->headcontent, 1);
        }
    }

    /**
     * fix_SubmissionTimeout
     */
    function fix_SubmissionTimeout()  {
        if ($this->hotpot->delay3==hotpot::TIME_TEMPLATE) {
            // use default from source/template file (=30000 ms =30 seconds)
            if ($this->hasSubmissionTimeout) {
                $timeout = null;
            } else {
                $timeout = 30000; // = 30 secs is HP default
            }
        } else {
            if ($this->hotpot->delay3 >= 0) {
                $timeout = $this->hotpot->delay3 * 1000; // milliseconds
            } else {
                $timeout = 0; // i.e. immediately
            }
        }
        if (is_null($timeout)) {
            return; // nothing to do
        }
        if ($this->hasSubmissionTimeout) {
            // remove HPNStartTime
            $search = '/var HPNStartTime\b[^;]*?;\s*/';
            $this->headcontent = preg_replace($search, '', $this->headcontent, 1);

            // reset the value of SubmissionTimeout
            $search = '/(?<=var SubmissionTimeout = )\d+(?=;)/';
            $this->headcontent = preg_replace($search, $timeout, $this->headcontent, 1);
        } else {
            // Rhubarb, Sequitur and Quandary
            $search = '/var FinalScore = 0;/';
            $replace = '$0'."\n".'var SubmissionTimeout = '.$timeout.';';
            $this->headcontent = preg_replace($search, $replace, $this->headcontent, 1);
        }
    }

    /**
     * fix_navigation
     */
    function fix_navigation()  {
        if ($this->hotpot->navigation==hotpot::NAVIGATION_ORIGINAL) {
            // do nothing - leave navigation as it is
            return;
        }

        // insert the stop button, if required
        if ($this->hotpot->stopbutton) {

            // replace top nav buttons with a single stop button
            if ($this->hotpot->stopbutton==hotpot::STOPBUTTON_LANGPACK) {
                if ($pos = strpos($this->hotpot->stoptext, '_')) {
                    $mod = substr($this->hotpot->stoptext, 0, $pos);
                    $str = substr($this->hotpot->stoptext, $pos + 1);
                    $stoptext = get_string($str, $mod);
                } else if ($this->hotpot->stoptext) {
                    $stoptext = get_string($this->hotpot->stoptext);
                } else {
                    $stoptext = '';
                }
            } else {
                $stoptext = $this->hotpot->stoptext;
            }
            if (trim($stoptext)=='') {
                $stoptext = get_string('giveup', 'hotpot');
            }
            $confirm = get_string('confirmstop', 'hotpot');
            //$search = '/<!-- BeginTopNavButtons -->'.'.*?'.'<!-- EndTopNavButtons -->/s';
            $search = '/<(div class="Titles")>/s';
            $replace = '<$1 style="position: relative">'."\n\t"
                .'<div class="hotpotstopbutton">'
                .'<button class="FuncButton" '
                    .'onclick="'.$this->get_stop_onclick().'" '
                    .'onfocus="FuncBtnOver(this)" onblur="FuncBtnOut(this)" '
                    .'onmouseover="FuncBtnOver(this)" onmouseout="FuncBtnOut(this)" '
                    .'onmousedown="FuncBtnDown(this)" onmouseup="FuncBtnOut(this)">'
                    .hotpot_textlib('utf8_to_entities', $stoptext)
                .'</button>'
                .'</div>'
            ;
            $this->bodycontent = preg_replace($search, $replace, $this->bodycontent, 1);
        }

        // remove (remaining) navigation buttons
        $search = '/<!-- Begin(Top|Bottom)NavButtons -->'.'.*?'.'<!-- End'.'\\1'.'NavButtons -->/s';
        $this->bodycontent = preg_replace($search, '', $this->bodycontent);
    }

    /**
     * fix_filters
     *
     * @return xxx
     */
    function fix_filters()  {
        global $CFG;
        if (isset($CFG->textfilters)) {
            $textfilters = $CFG->textfilters;
        } else {
            $textfilters = '';
        }
        if ($this->hotpot->usefilters) {
            $filters = filter_get_active_in_context($this->hotpot->context);
            $filters = array_keys($filters);
        } else {
            $filters = array();
        }
        if ($this->hotpot->useglossary && ! in_array('mod/glossary', $filters)) {
            $filters[] = 'mod/glossary';
        }
        if ($this->hotpot->usemediafilter) {
            // exclude certain unnecessary or miscreant $filters
            //  - "mediaplugins" because it duplicates work done by "usemediafilter" setting
            //  - "asciimath" because it does not behave like a filter is supposed to behave
            $filters = preg_grep('/^filter\/(mediaplugin|asciimath)$/', $filters, PREG_GREP_INVERT);
        }

        $CFG->textfilters = implode(',', $filters);
        $this->filter_text_headcontent();
        $this->filter_text_bodycontent();
        $CFG->textfilters = $textfilters;

        // fix unwanted conversions by the Moodle's Tex filter
        // http://moodle.org/mod/forum/discuss.php?d=68435
        // http://tracker.moodle.org/browse/MDL-7849
        if (preg_match('/jcross|jmix/', get_class($this))) {
            $search = '/(?<=replace\(\/)'.'<a[^>]*><img[^>]*class="texrender"[^>]*title="(.*?)"[^>]*><\/a>'.'(?=\/g)/is';
            $replace = '\['.'$1'.'\]';
            $this->headcontent = preg_replace($search, $replace, $this->headcontent);
        }

        // make sure openpopup() function is available if needed (for glossary entries)
        // Note: this could also be done using filter_add_javascript($this->htmlcontent)
        // but that function expects entire htmlcontent, where we would prefer just the headcontent
        if ($this->hotpot->navigation==hotpot::NAVIGATION_ORIGINAL && in_array('mod/glossary', $filters)) {
            // add openwindow() function (from lib/javascript.php)
            $this->headcontent .= "\n"
                .'<script type="text/javascript">'."\n"
                .'//<![CDATA['."\n"
                .'function openpopup(url, name, options, fullscreen) {'."\n"
                .'    var fullurl = "'.$CFG->httpswwwroot.'" + url;'."\n"
                .'    var windowobj = window.open(fullurl, name, options);'."\n"
                .'    if (!windowobj) {'."\n"
                .'        return true;'."\n"
                .'    }'."\n"
                .'    if (fullscreen) {'."\n"
                .'        windowobj.moveTo(0, 0);'."\n"
                .'        windowobj.resizeTo(screen.availWidth, screen.availHeight);'."\n"
                .'    }'."\n"
                .'    windowobj.focus();'."\n"
                .'    return false;'."\n"
                .'}'."\n"
                .'//]]>'."\n"
                .'</script>'
            ;
        }
    }

    /**
     * filter_text_headcontent
     */
    function filter_text_headcontent()  {
        if ($names = $this->headcontent_strings) {
            $search = '/^'."((?:var )?(?:$names)(?:\[\d+\])*\s*=\s*')(.*)(';)".'$/m';
            $callback = array($this, 'filter_text_headcontent_string');
            $this->headcontent = preg_replace_callback($search, $callback, $this->headcontent);
        }
        if ($names = $this->headcontent_arrays) {
            $search = '/^'."((?:var )?(?:$names)(?:\[\d+\])* = new Array\()(.*)(\);)".'$/m';
            $callback = array($this, 'filter_text_headcontent_array');
            $this->headcontent = preg_replace_callback($search, $callback, $this->headcontent);
        }
    }

    /**
     * filter_text_headcontent_array
     *
     * @param xxx $match
     * @return xxx
     */
    function filter_text_headcontent_array($match)  {
        // I[q][0][a] = new Array('JQuiz answer text', 'feedback', 0, 0, 0)
        $before = $match[1];
        $str    = $match[count($match) - 2];
        $after  = $match[count($match) - 1];

        $search = "/(')((?:\\\\\\\\|\\\\'|[^'])*)(')/";
        $callback = array($this, 'filter_text_headcontent_string');
        return $before.preg_replace_callback($search, $callback, $str).$after;
    }

    /**
     * filter_text_headcontent_string
     *
     * @param xxx $match
     * @return xxx
     */
    function filter_text_headcontent_string($match)  {
        // var YourScoreIs = 'Your score is';
        // I[q][1][a][2] = 'JCloze clue';
        global $CFG;

        static $replace_pairs = array(
            // backslashes and quotes
            '\\\\'=>'\\', "\\'"=>"'", '\\"'=>'"',
            // newlines
            '\\n'=>"\n",
            // other (closing tag is for XHTML compliance)
            '\\0'=>"\0", '<\\/'=>'</'
        );

        $before = $match[1];
        $str    = $match[count($match) - 2];
        $after  = $match[count($match) - 1];

        // unescape backslashes, quote and newlines
        $str = strtr($str, $replace_pairs);

        // convert javascript unicode
        $search = '/\\\\u([0-9a-f]{4})/i';
        $str = $this->filter_text_to_utf8($str, $search);

        // convert html entities
        $search = '/&#x([0-9a-f]+);/i';
        $str = $this->filter_text_to_utf8($str, $search);

        // fix relative urls
        $str = $this->fix_relativeurls($str);

        // filter string,
        // $str = filter_text($str);

        // return safe javascript unicode
        return $before.$this->hotpot->source->js_value_safe($str, true).$after;
    }

    /**
     * filter_text_to_utf8
     *
     * @param xxx $str
     * @param xxx $search
     * @return string $str
     * @return boolean $modified
     */
    function filter_text_to_utf8($str, $search) {
        if (preg_match_all($search, $str, $matches, PREG_OFFSET_CAPTURE)) {
            $i_max = count($matches[0]) - 1;
            for ($i=$i_max; $i>=0; $i--) {
                list($match, $start) = $matches[0][$i];
                $char = $matches[1][$i][0];
                $char = hotpot_textlib('code2utf8', hexdec($char));
                $str = substr_replace($str, $char, $start, strlen($match));
            }
        }
        return $str;
    }

    /**
     * filter_text_bodycontent
     */
    function filter_text_bodycontent()  {
        // convert entities to utf8, filter text and convert back
        $this->bodycontent = hotpot_textlib('entities_to_utf8', $this->bodycontent);
        $this->bodycontent = filter_text($this->bodycontent);
        $this->bodycontent = hotpot_textlib('utf8_to_entities', $this->bodycontent);
    }

    /**
     * fix_feedbackform
     */
    function fix_feedbackform()  {
        // we are aiming to generate the following javascript to send to the client
        //FEEDBACK = new Array();
        //FEEDBACK[0] = ''; // url of feedback page/script
        //FEEDBACK[1] = ''; // array of array('teachername', 'value');
        //FEEDBACK[2] = ''; // 'student name' [formmail only]
        //FEEDBACK[3] = ''; // 'student email' [formmail only]
        //FEEDBACK[4] = ''; // window width
        //FEEDBACK[5] = ''; // window height
        //FEEDBACK[6] = ''; // 'Send a message to teacher' [prompt/button text]
        //FEEDBACK[7] = ''; // 'Title'
        //FEEDBACK[8] = ''; // 'Teacher'
        //FEEDBACK[9] = ''; // 'Message'
        //FEEDBACK[10] = ''; // 'Close this window'

        global $CFG, $USER;

        $feedback = array();
        switch ($this->hotpot->studentfeedback) {
            case hotpot::FEEDBACK_NONE:
                // do nothing - feedback form is not required
                break;

            case hotpot::FEEDBACK_WEBPAGE:
                if ($this->hotpot->studentfeedbackurl) {
                    $feedback[0] = "'".addslashes_js($this->hotpot->studentfeedbackurl)."'";
                } else {
                    $this->hotpot->studentfeedback = hotpot::FEEDBACK_NONE;
                }
                break;

            case hotpot::FEEDBACK_FORMMAIL:
                if ($this->hotpot->studentfeedbackurl) {
                    $teachers = $this->get_feedback_teachers();
                } else {
                    $teachers = '';
                }
                if ($teachers) {
                    $feedback[0] = "'".addslashes_js($this->hotpot->studentfeedbackurl)."'";
                    $feedback[1] = $teachers;
                    $feedback[2] = "'".addslashes_js(fullname($USER))."'";
                    $feedback[3] = "'".addslashes_js($USER->email)."'";
                    $feedback[4] = 500; // width
                    $feedback[5] = 300; // height
                } else {
                    // no teachers (or no feedback url)
                    $this->hotpot->studentfeedback = hotpot::FEEDBACK_NONE;
                }
                break;

            case hotpot::FEEDBACK_MOODLEFORUM:
                $cmids = array();
                if ($modinfo = get_fast_modinfo($this->hotpot->course)) {
                    foreach ($modinfo->cms as $cmid=>$mod) {
                        if ($mod->modname=='forum' && $mod->visible) {
                            $cmids[] = $cmid;
                        }
                    }
                }
                switch (count($cmids)) {
                    case 0: $this->hotpot->studentfeedback = hotpot::FEEDBACK_NONE; break; // no forums !!
                    case 1: $feedback[0] = "'".$CFG->wwwroot.'/mod/forum/view.php?id='.$cmids[0]."'"; break;
                    default: $feedback[0] = "'".$CFG->wwwroot.'/mod/forum/index.php?id='.$this->hotpot->course->id."'";
                }
                break;

            case hotpot::FEEDBACK_MOODLEMESSAGING:
                if ($CFG->messaging) {
                    $teachers = $this->get_feedback_teachers();
                } else {
                    $teachers = '';
                }
                if ($teachers) {
                    $feedback[0] = "'$CFG->wwwroot/message/discussion.php?id='";
                    $feedback[1] = $teachers;
                    $feedback[4] = 400; // width
                    $feedback[5] = 500; // height
                } else {
                    // no teachers (or no Moodle messaging)
                    $this->hotpot->studentfeedback = hotpot::FEEDBACK_NONE;
                }
                break;

            default:
                // unrecognized feedback setting, so reset it to something valid
                $this->hotpot->studentfeedback = hotpot::FEEDBACK_NONE;
        }
        if ($this->hotpot->studentfeedback==hotpot::FEEDBACK_NONE) {
            // do nothing - feedback form is not required
        } else {
            // complete remaining feedback fields
            if ($this->hotpot->studentfeedback==hotpot::FEEDBACK_MOODLEFORUM) {
                $feedback[6] = "'".addslashes_js(get_string('feedbackdiscuss', 'hotpot'))."'";
            } else {
                // FEEDBACK_WEBPAGE, FEEDBACK_FORMMAIL, FEEDBACK_MOODLEMESSAGING
                $feedback[6] = "'".addslashes_js(get_string('feedbacksendmessage', 'hotpot'))."'";
            }
            $feedback[7] = "'".addslashes_js(get_string('feedback'))."'";
            $feedback[8] = "'".addslashes_js(get_string('defaultcourseteacher'))."'";
            $feedback[9] = "'".addslashes_js(get_string('messagebody'))."'";
            $feedback[10] = "'".addslashes_js(get_string('closewindow'))."'";
            $js = '';
            foreach ($feedback as $i=>$str) {
                $js .= 'FEEDBACK['.$i."] = $str;\n";
            }
            $js = '<script type="text/javascript">'."\n//<![CDATA[\n"."FEEDBACK = new Array();\n".$js."//]]>\n</script>\n";
            if ($this->usemoodletheme) {
                $this->headcontent .= $js;
            } else {
                $this->bodycontent = preg_replace('/<\/head>/i', "$js</head>", $this->bodycontent, 1);
            }
        }
    }

    /**
     * get_feedback_teachers
     *
     * @return xxx
     */
    function get_feedback_teachers()  {
        $context = hotpot_get_context(CONTEXT_COURSE, $this->hotpot->source->courseid);
        $teachers = get_users_by_capability($context, 'mod/hotpot:reviewallattempts');

        $details = array();
        if (isset($teachers) && count($teachers)) {
            if ($this->hotpot->studentfeedback==hotpot::FEEDBACK_MOODLEMESSAGING) {
                $detail = 'id';
            } else {
                $detail = 'email';
            }
            foreach ($teachers as $teacher) {
                $details[] = "new Array('".addslashes_js(fullname($teacher))."', '".addslashes_js($teacher->$detail)."')";
            }
        }

        if ($details = implode(', ', $details)) {
            return 'new Array('.$details.')';
        } else {
            return ''; // no teachers
        }
    }

    /**
     * fix_reviewoptions
     */
    function fix_reviewoptions()  {
        // enable/disable review options
    }

    /**
     * fix_submissionform
     */
    function fix_submissionform()  {

        $params = array(
            'id' => $this->hotpot->create_attempt(),
            $this->scorefield => '0', 'detail' => '0', 'status' => '0',
            'starttime' => '0', 'endtime' => '0', 'redirect' => '0',
        );
        $attributes = array(
            'id' => $this->formid, 'autocomplete' => 'off'
        );
        $form_start = $this->form_start('submit.php', $params, $attributes);

        $search = '<!-- BeginSubmissionForm -->';
        if (! $pos = strpos($this->bodycontent, $search)) {
            throw new moodle_exception('couldnotinsertsubmissionform', 'hotpot');
        }
        $this->bodycontent = substr_replace($this->bodycontent, $form_start, $pos, strlen($search));

        $search = '<!-- EndSubmissionForm -->';
        if (! $pos = strpos($this->bodycontent, $search)) {
            throw new moodle_exception('couldnotinsertsubmissionform', 'hotpot');
        }
        $this->bodycontent = substr_replace($this->bodycontent, $this->form_end(), $pos, strlen($search));
    }

    /**
     * fix_mediafilter_onload_extra
     *
     * @return xxx
     */
    function fix_mediafilter_onload_extra()  {
        return ''
            .'	if(window.StretchCanvasToCoverContent) {'."\n"
            .'		StretchCanvasToCoverContent();'."\n"
            .'	}'."\n"
        ;
    }

    // captions and messages

    /**
     * expand_AlsoCorrect
     *
     * @return xxx
     */
    function expand_AlsoCorrect()  {
        return $this->hotpot->source->xml_value($this->hotpot->source->hbs_software.'-config-file,'.$this->hotpot->source->hbs_quiztype.',also-correct');
    }

    /**
     * expand_BottomNavBar
     *
     * @return xxx
     */
    function expand_BottomNavBar()  {
        return $this->expand_NavBar('BottomNavBar');
    }

    /**
     * expand_CapitalizeFirst
     *
     * @return xxx
     */
    function expand_CapitalizeFirst()  {
        return $this->hotpot->source->xml_value_bool($this->hotpot->source->hbs_software.'-config-file,'.$this->hotpot->source->hbs_quiztype.',capitalize-first-letter');
    }

    /**
     * expand_CheckCaption
     *
     * @return xxx
     */
    function expand_CheckCaption()  {
        return $this->hotpot->source->xml_value($this->hotpot->source->hbs_software.'-config-file,global,check-caption');
    }

    /**
     * expand_ContentsURL
     *
     * @return xxx
     */
    function expand_ContentsURL()  {
        return $this->hotpot->source->xml_value($this->hotpot->source->hbs_software.'-config-file,global,contents-url');
    }

    /**
     * expand_CorrectIndicator
     *
     * @return xxx
     */
    function expand_CorrectIndicator()  {
        return $this->hotpot->source->xml_value_js($this->hotpot->source->hbs_software.'-config-file,global,correct-indicator');
    }

    /**
     * expand_Back
     *
     * @return xxx
     */
    function expand_Back()  {
        return $this->hotpot->source->xml_value_int($this->hotpot->source->hbs_software.'-config-file,global,include-back');
    }

    /**
     * expand_BackCaption
     *
     * @return xxx
     */
    function expand_BackCaption()  {
        return $this->hotpot->source->xml_value($this->hotpot->source->hbs_software.'-config-file,global,back-caption');
    }

    /**
     * expand_CaseSensitive
     *
     * @return xxx
     */
    function expand_CaseSensitive()  {
        return $this->hotpot->source->xml_value_bool($this->hotpot->source->hbs_software.'-config-file,'.$this->hotpot->source->hbs_quiztype.',case-sensitive');
    }

    /**
     * expand_ClickToAdd
     *
     * @return xxx
     */
    function expand_ClickToAdd()  {
        return $this->hotpot->source->xml_value($this->hotpot->source->hbs_software.'-config-file,'.$this->hotpot->source->hbs_quiztype.',click-to-add');
    }

    /**
     * expand_ClueCaption
     *
     * @return xxx
     */
    function expand_ClueCaption()  {
        return $this->hotpot->source->xml_value($this->hotpot->source->hbs_software.'-config-file,global,clue-caption');
    }

    /**
     * expand_Clues
     *
     * @return xxx
     */
    function expand_Clues()  {
        // Note: WinHotPot6 uses "include-clues", but JavaHotPotatoes6 uses "include-clue" (missing "s")
        return $this->hotpot->source->xml_value_int($this->hotpot->source->hbs_software.'-config-file,'.$this->hotpot->source->hbs_quiztype.',include-clues');
    }

    /**
     * expand_Contents
     *
     * @return xxx
     */
    function expand_Contents()  {
        return $this->hotpot->source->xml_value_int($this->hotpot->source->hbs_software.'-config-file,global,include-contents');
    }

    /**
     * expand_ContentsCaption
     *
     * @return xxx
     */
    function expand_ContentsCaption()  {
        return $this->hotpot->source->xml_value($this->hotpot->source->hbs_software.'-config-file,global,contents-caption');
    }

    /**
     * expand_Correct
     *
     * @return xxx
     */
    function expand_Correct()  {
        if ($this->hotpot->source->hbs_quiztype=='jcloze') {
            $tag = 'guesses-correct';
        } else {
            $tag = 'guess-correct';
        }
        return $this->hotpot->source->xml_value_js($this->hotpot->source->hbs_software.'-config-file,'.$this->hotpot->source->hbs_quiztype.','.$tag);
    }

    /**
     * expand_DeleteCaption
     *
     * @return xxx
     */
    function expand_DeleteCaption()  {
        return $this->hotpot->source->xml_value($this->hotpot->source->hbs_software.'-config-file,'.$this->hotpot->source->hbs_quiztype.',delete-caption');
    }

    /**
     * expand_DublinCoreMetadata
     *
     * @return xxx
     */
    function expand_DublinCoreMetadata()  {
        $dc = '';
        if ($value = $this->hotpot->source->xml_value('', "['rdf:RDF'][0]['@']['xmlns:dc']")) {
            $dc .= '<link rel="schema.DC" href="'.str_replace('"', '&quot;', $value).'" />'."\n";
        }
        if (is_array($this->hotpot->source->xml_value('rdf:RDF,rdf:Description'))) {
            $names = array('DC:Creator'=>'dc:creator', 'DC:Title'=>'dc:title');
            foreach ($names as $name => $tag) {
                $i = 0;
                $values = array();
                while($value = $this->hotpot->source->xml_value("rdf:RDF,rdf:Description,$tag", "[$i]['#']")) {
                    if ($value = trim(strip_tags($value))) {
                        $values[strtoupper($value)] = htmlspecialchars($value);
                    }
                    $i++;
                }
                if ($value = implode(', ', $values)) {
                    $dc .= '<meta name="'.$name.'" content="'.$value.'" />'."\n";
                }
            }
        }
        return $dc;
    }

    /**
     * expand_EMail
     *
     * @return xxx
     */
    function expand_EMail()  {
        return $this->hotpot->source->xml_value($this->hotpot->source->hbs_software.'-config-file,global,email');
    }

    /**
     * expand_EscapedExerciseTitle
     * this string only used in resultsp6sendresults.js_ which is not required in Moodle
     *
     * @return xxx
     */
    function expand_EscapedExerciseTitle()  {
        return $this->hotpot->source->xml_value_js('data,title');
    }

    /**
     * expand_ExBGColor
     *
     * @return xxx
     */
    function expand_ExBGColor()  {
        return $this->hotpot->source->xml_value($this->hotpot->source->hbs_software.'-config-file,global,ex-bg-color');
    }

    /**
     * expand_ExerciseSubtitle
     *
     * @return xxx
     */
    function expand_ExerciseSubtitle()  {
        return $this->hotpot->source->xml_value($this->hotpot->source->hbs_software.'-config-file,'.$this->hotpot->source->hbs_quiztype.',exercise-subtitle');
    }

    /**
     * expand_ExerciseTitle
     *
     * @return xxx
     */
    function expand_ExerciseTitle()  {
        return $this->hotpot->source->xml_value('data,title');
    }

    /**
     * expand_FontFace
     *
     * @return xxx
     */
    function expand_FontFace()  {
        return $this->hotpot->source->xml_value($this->hotpot->source->hbs_software.'-config-file,global,font-face');
    }

    /**
     * expand_FontSize
     *
     * @return xxx
     */
    function expand_FontSize()  {
        $value = $this->hotpot->source->xml_value($this->hotpot->source->hbs_software.'-config-file,global,font-size');
        return (empty($value) ? 'small' : $value);
    }

    /**
     * expand_FormMailURL
     *
     * @return xxx
     */
    function expand_FormMailURL()  {
        return $this->hotpot->source->xml_value($this->hotpot->source->hbs_software.'-config-file,global,formmail-url');
    }

    /**
     * expand_FullVersionInfo
     *
     * @return xxx
     */
    function expand_FullVersionInfo()  {
        global $CFG;
        return $this->hotpot->source->xml_value('version').'.x (Moodle '.$CFG->release.', HotPot '.hotpot::get_version_info('release').')';
    }

    /**
     * expand_FuncLightColor
     *
     * @return xxx
     */
    function expand_FuncLightColor()  { // top-left of buttons
        $color = $this->hotpot->source->xml_value($this->hotpot->source->hbs_software.'-config-file,global,ex-bg-color');
        return $this->expand_halfway_color($color, '#ffffff');
    }

    /**
     * expand_FuncShadeColor
     *
     * @return xxx
     */
    function expand_FuncShadeColor()  { // bottom right of buttons
        $color = $this->hotpot->source->xml_value($this->hotpot->source->hbs_software.'-config-file,global,ex-bg-color');
        return $this->expand_halfway_color($color, '#000000');
    }

    /**
     * expand_GiveHint
     *
     * @return xxx
     */
    function expand_GiveHint()  {
        return $this->hotpot->source->xml_value_js($this->hotpot->source->hbs_software.'-config-file,'.$this->hotpot->source->hbs_quiztype.',next-correct-letter');
    }

    /**
     * expand_GraphicURL
     *
     * @return xxx
     */
    function expand_GraphicURL()  {
        return $this->hotpot->source->xml_value($this->hotpot->source->hbs_software.'-config-file,global,graphic-url');
    }

    /**
     * expand_GuessCorrect
     *
     * @return xxx
     */
    function expand_GuessCorrect()  {
        return $this->hotpot->source->xml_value_js($this->hotpot->source->hbs_software.'-config-file,'.$this->hotpot->source->hbs_quiztype.',guess-correct');
    }

    /**
     * expand_GuessIncorrect
     *
     * @return xxx
     */
    function expand_GuessIncorrect()  {
        return $this->hotpot->source->xml_value_js($this->hotpot->source->hbs_software.'-config-file,'.$this->hotpot->source->hbs_quiztype.',guess-incorrect');
    }

    /**
     * expand_HeaderCode
     *
     * @return xxx
     */
    function expand_HeaderCode()  {
        return $this->hotpot->source->xml_value($this->hotpot->source->hbs_software.'-config-file,global,header-code');
    }

    /**
     * expand_Hint
     *
     * @return xxx
     */
    function expand_Hint()  {
        return $this->hotpot->source->xml_value_int($this->hotpot->source->hbs_software.'-config-file,'.$this->hotpot->source->hbs_quiztype.',include-hint');
    }

    /**
     * expand_HintCaption
     *
     * @return xxx
     */
    function expand_HintCaption()  {
        return $this->hotpot->source->xml_value($this->hotpot->source->hbs_software.'-config-file,global,hint-caption');
    }

    /**
     * expand_Incorrect
     *
     * @return xxx
     */
    function expand_Incorrect()  {
        if ($this->hotpot->source->hbs_quiztype=='jcloze') {
            $tag = 'guesses-incorrect';
        } else {
            $tag = 'guess-incorrect';
        }
        return $this->hotpot->source->xml_value_js($this->hotpot->source->hbs_software.'-config-file,'.$this->hotpot->source->hbs_quiztype.','.$tag);
    }

    /**
     * expand_IncorrectIndicator
     *
     * @return xxx
     */
    function expand_IncorrectIndicator()  {
        return $this->hotpot->source->xml_value_js($this->hotpot->source->hbs_software.'-config-file,global,incorrect-indicator');
    }

    /**
     * expand_Instructions
     *
     * @return xxx
     */
    function expand_Instructions()  {
        return $this->hotpot->source->xml_value($this->hotpot->source->hbs_software.'-config-file,'.$this->hotpot->source->hbs_quiztype.',instructions');
    }

    /**
     * expand_JSBrowserCheck
     *
     * @return xxx
     */
    function expand_JSBrowserCheck()  {
        return $this->expand_template('hp6browsercheck.js_');
    }

    /**
     * expand_JSButtons
     *
     * @return xxx
     */
    function expand_JSButtons()  {
        return $this->expand_template('hp6buttons.js_');
    }

    /**
     * expand_JSCard
     *
     * @return xxx
     */
    function expand_JSCard()  {
        return $this->expand_template('hp6card.js_');
    }

    /**
     * expand_JSCheckShortAnswer
     *
     * @return xxx
     */
    function expand_JSCheckShortAnswer()  {
        return $this->expand_template('hp6checkshortanswer.js_');
    }

    /**
     * expand_JSHotPotNet
     *
     * @return xxx
     */
    function expand_JSHotPotNet()  {
        return $this->expand_template('hp6hotpotnet.js_');
    }

    /**
     * expand_JSSendResults
     *
     * @return xxx
     */
    function expand_JSSendResults()  {
        return $this->expand_template('hp6sendresults.js_');
    }

    /**
     * expand_JSShowMessage
     *
     * @return xxx
     */
    function expand_JSShowMessage()  {
        return $this->expand_template('hp6showmessage.js_');
    }

    /**
     * expand_JSTimer
     *
     * @return xxx
     */
    function expand_JSTimer()  {
        return $this->expand_template('hp6timer.js_');
    }

    /**
     * expand_JSUtilities
     *
     * @return xxx
     */
    function expand_JSUtilities()  {
        return $this->expand_template('hp6utilities.js_');
    }

    /**
     * expand_LastQCaption
     *
     * @return xxx
     */
    function expand_LastQCaption()  {
        $caption = $this->hotpot->source->xml_value($this->hotpot->source->hbs_software.'-config-file,global,last-q-caption');
        return ($caption=='<=' ? '&lt;=' : $caption);
    }

    /**
     * expand_LinkColor
     *
     * @return xxx
     */
    function expand_LinkColor()  {
        return $this->hotpot->source->xml_value($this->hotpot->source->hbs_software.'-config-file,global,link-color');
    }

    /**
     * expand_NamePlease
     *
     * @return xxx
     */
    function expand_NamePlease()  {
        return $this->hotpot->source->xml_value_js($this->hotpot->source->hbs_software.'-config-file,global,name-please');
    }

    /**
     * expand_NavBar
     *
     * @param xxx $navbarid (optional, default='')
     * @return xxx
     */
    function expand_NavBar($navbarid='')  {
        $this->navbarid = $navbarid;
        $navbar = $this->expand_template('hp6navbar.ht_');
        unset($this->navbarid);
        return $navbar;
    }

    /**
     * expand_NavBarID
     *
     * @return xxx
     */
    function expand_NavBarID()  {
        // $this->navbarid is set in "$this->expand_NavBar"
        return empty($this->navbarid) ? '' : $this->navbarid;
    }

    /**
     * expand_NavBarJS
     *
     * @return xxx
     */
    function expand_NavBarJS()  {
        return $this->expand_NavButtons();
    }

    /**
     * expand_NavButtons
     *
     * @return xxx
     */
    function expand_NavButtons()  {
        return ($this->expand_Back() || $this->expand_NextEx() || $this->expand_Contents());
    }

    /**
     * expand_NavTextColor
     *
     * @return xxx
     */
    function expand_NavTextColor()  {
        // might be 'title-color' ?
        return $this->hotpot->source->xml_value($this->hotpot->source->hbs_software.'-config-file,global,text-color');
    }

    /**
     * expand_NavBarColor
     *
     * @return xxx
     */
    function expand_NavBarColor()  {
        return $this->hotpot->source->xml_value($this->hotpot->source->hbs_software.'-config-file,global,nav-bar-color');
    }

    /**
     * expand_NavLightColor
     *
     * @return xxx
     */
    function expand_NavLightColor()  {
        $color = $this->hotpot->source->xml_value($this->hotpot->source->hbs_software.'-config-file,global,nav-bar-color');
        return $this->expand_halfway_color($color, '#ffffff');
    }

    /**
     * expand_NavShadeColor
     *
     * @return xxx
     */
    function expand_NavShadeColor()  {
        $color = $this->hotpot->source->xml_value($this->hotpot->source->hbs_software.'-config-file,global,nav-bar-color');
        return $this->expand_halfway_color($color, '#000000');
    }

    /**
     * expand_NextCaption
     *
     * @return xxx
     */
    function expand_NextCaption()  {
        return $this->hotpot->source->xml_value($this->hotpot->source->hbs_software.'-config-file,'.$this->hotpot->source->hbs_quiztype.',next-caption');
    }

    /**
     * expand_NextCorrect
     *
     * @return xxx
     */
    function expand_NextCorrect()  {
        if ($this->hotpot->source->hbs_quiztype=='jquiz') {
            $tag = 'next-correct-letter'; // jquiz
        } else {
            $tag = 'next-correct-part'; // jmix
        }
        return $this->hotpot->source->xml_value_js($this->hotpot->source->hbs_software.'-config-file,'.$this->hotpot->source->hbs_quiztype.','.$tag);
    }

    /**
     * expand_NextEx
     *
     * @return xxx
     */
    function expand_NextEx()  {
        return $this->hotpot->source->xml_value_int($this->hotpot->source->hbs_software.'-config-file,global,include-next-ex');
    }

    /**
     * expand_NextExCaption
     *
     * @return xxx
     */
    function expand_NextExCaption()  {
        $caption = $this->hotpot->source->xml_value($this->hotpot->source->hbs_software.'-config-file,global,next-ex-caption');
        return ($caption=='=>' ? '=&gt;' : $caption);
    }

    /**
     * expand_NextQCaption
     *
     * @return xxx
     */
    function expand_NextQCaption()  {
        return $this->hotpot->source->xml_value($this->hotpot->source->hbs_software.'-config-file,global,next-q-caption');
    }

    /**
     * expand_NextExURL
     *
     * @return xxx
     */
    function expand_NextExURL()  {
        return $this->hotpot->source->xml_value($this->hotpot->source->hbs_software.'-config-file,'.$this->hotpot->source->hbs_quiztype.',next-ex-url');
    }

    /**
     * expand_OKCaption
     *
     * @return xxx
     */
    function expand_OKCaption()  {
        return $this->hotpot->source->xml_value($this->hotpot->source->hbs_software.'-config-file,global,ok-caption');
    }

    /**
     * expand_PageBGColor
     *
     * @return xxx
     */
    function expand_PageBGColor()  {
        return $this->hotpot->source->xml_value($this->hotpot->source->hbs_software.'-config-file,global,page-bg-color');
    }

    /**
     * expand_PlainTitle
     *
     * @return xxx
     */
    function expand_PlainTitle()  {
        return $this->hotpot->source->xml_value('data,title');
    }

    /**
     * expand_PreloadImages
     *
     * @return xxx
     */
    function expand_PreloadImages()  {
        $value = $this->expand_PreloadImageList();
        return empty($value) ? false : true;
    }

    /**
     * expand_PreloadImageList
     *
     * @return xxx
     */
    function expand_PreloadImageList()  {
        if (! isset($this->PreloadImageList)) {
            $this->PreloadImageList = '';

            $images = array();

            // extract all src values from <img> tags in the xml file
            $search = '/&amp;#x003C;img.*?src=&quot;(.*?)&quot;.*?&amp;#x003E;/is';
            if (preg_match_all($search, $this->hotpot->source->filecontents, $matches)) {
                $images = array_merge($images, $matches[1]);
            }

            // extract all urls from HotPot's [square bracket] notation
            // e.g. [%sitefiles%/images/screenshot.jpg image 350 265 center]
            $search = '/\['."([^\?\]]*\.(?:jpg|gif|png)(?:\?[^ \t\r\n\]]*)?)".'[^\]]*'.'\]/s';
            if (preg_match_all($search, $this->hotpot->source->filecontents, $matches)) {
                $images = array_merge($images, $matches[1]);
            }

            if (count($images)) {
                $images = array_unique($images);
                $this->PreloadImageList = "\n\t\t'".implode("',\n\t\t'", $images)."'\n\t";
            }
        }
        return $this->PreloadImageList;
    }

    /**
     * expand_Reading
     *
     * @return xxx
     */
    function expand_Reading()  {
        return $this->hotpot->source->xml_value_int('data,reading,include-reading');
    }

    /**
     * expand_ReadingText
     *
     * @return xxx
     */
    function expand_ReadingText()  {
        $title = $this->expand_ReadingTitle();
        if ($value = $this->hotpot->source->xml_value('data,reading,reading-text')) {
            $value = '<div class="ReadingText">'.$value.'</div>';
        } else {
            $value = '';
        }
        return $title.$value;
    }

    /**
     * expand_ReadingTitle
     *
     * @return xxx
     */
    function expand_ReadingTitle()  {
        $value = $this->hotpot->source->xml_value('data,reading,reading-title');
        return empty($value) ? '' : ('<h3 class="ExerciseSubtitle">'.$value.'</h3>');
    }

    /**
     * expand_Restart
     *
     * @return xxx
     */
    function expand_Restart()  {
        return $this->hotpot->source->xml_value_int($this->hotpot->source->hbs_software.'-config-file,'.$this->hotpot->source->hbs_quiztype.',include-restart');
    }

    /**
     * expand_RestartCaption
     *
     * @return xxx
     */
    function expand_RestartCaption()  {
        return $this->hotpot->source->xml_value($this->hotpot->source->hbs_software.'-config-file,global,restart-caption');
    }

    /**
     * expand_Scorm12
     *
     * @return xxx
     */
    function expand_Scorm12()  {
        return false; // HP scorm functionality is always disabled in Moodle
    }

    /**
     * expand_Seconds
     *
     * @return xxx
     */
    function expand_Seconds()  {
        return $this->hotpot->source->xml_value('data,timer,seconds');
    }

    /**
     * expand_SendResults
     *
     * @return xxx
     */
    function expand_SendResults()  {
        return false; // send results (via formmail) is always disabled in Moodle
        // $tags = $this->hotpot->source->hbs_software.'-config-file,'.$this->hotpot->source->hbs_quiztype.',send-email';
        // return $this->hotpot->source->xml_value($tags);
    }

    /**
     * expand_ShowAllQuestionsCaption
     *
     * @return xxx
     */
    function expand_ShowAllQuestionsCaption($convert_to_unicode=false)  {
        return $this->hotpot->source->xml_value($this->hotpot->source->hbs_software.'-config-file,global,show-all-questions-caption');
    }

    /**
     * expand_ShowAnswer
     *
     * @return xxx
     */
    function expand_ShowAnswer()  {
        return $this->hotpot->source->xml_value_int($this->hotpot->source->hbs_software.'-config-file,'.$this->hotpot->source->hbs_quiztype.',include-show-answer');
    }

    /**
     * expand_SolutionCaption
     *
     * @return xxx
     */
    function expand_SolutionCaption() {
        return $this->hotpot->source->xml_value_js($this->hotpot->source->hbs_software.'-config-file,global,solution-caption');
    }

    /**
     * expand_ShowOneByOneCaption
     *
     * @return xxx
     */
    function expand_ShowOneByOneCaption()  {
        return $this->hotpot->source->xml_value($this->hotpot->source->hbs_software.'-config-file,global,show-one-by-one-caption');
    }

    /**
     * expand_StyleSheet
     *
     * @return xxx
     */
    function expand_StyleSheet()  {
        return $this->expand_template('hp6.cs_');
    }

    /**
     * expand_TextColor
     *
     * @return xxx
     */
    function expand_TextColor()  {
        return $this->hotpot->source->xml_value($this->hotpot->source->hbs_software.'-config-file,global,text-color');
    }

    /**
     * expand_TheseAnswersToo
     *
     * @return xxx
     */
    function expand_TheseAnswersToo()  {
        return $this->hotpot->source->xml_value_js($this->hotpot->source->hbs_software.'-config-file,'.$this->hotpot->source->hbs_quiztype.',also-correct');
    }

    /**
     * expand_ThisMuch
     *
     * @return xxx
     */
    function expand_ThisMuch()  {
        return $this->hotpot->source->xml_value_js($this->hotpot->source->hbs_software.'-config-file,'.$this->hotpot->source->hbs_quiztype.',this-much-correct');
    }

    /**
     * expand_Timer
     *
     * @return xxx
     */
    function expand_Timer()  {
        if ($this->hotpot->timelimit < 0) {
            // use setting in source file
            return $this->hotpot->source->xml_value_int('data,timer,include-timer');
        } else {
            // override setting in source file
            return $this->hotpot->timelimit;
        }
    }

    /**
     * expand_TimesUp
     *
     * @return xxx
     */
    function expand_TimesUp()  {
        return $this->hotpot->source->xml_value_js($this->hotpot->source->hbs_software.'-config-file,global,times-up');
    }

    /**
     * expand_TitleColor
     *
     * @return xxx
     */
    function expand_TitleColor()  {
        return $this->hotpot->source->xml_value($this->hotpot->source->hbs_software.'-config-file,global,title-color');
    }

    /**
     * expand_TopNavBar
     *
     * @return xxx
     */
    function expand_TopNavBar()  {
        return $this->expand_NavBar('TopNavBar');
    }

    /**
     * expand_Undo
     *
     * @return xxx
     */
    function expand_Undo()  {
        return $this->hotpot->source->xml_value_int($this->hotpot->source->hbs_software.'-config-file,'.$this->hotpot->source->hbs_quiztype.',include-undo');
    }

    /**
     * expand_UndoCaption
     *
     * @return xxx
     */
    function expand_UndoCaption()  {
        return $this->hotpot->source->xml_value($this->hotpot->source->hbs_software.'-config-file,global,undo-caption');
    }

    /**
     * expand_UserDefined1
     *
     * @return xxx
     */
    function expand_UserDefined1()  {
        return $this->hotpot->source->xml_value($this->hotpot->source->hbs_software.'-config-file,global,user-string-1');
    }

    /**
     * expand_UserDefined2
     *
     * @return xxx
     */
    function expand_UserDefined2()  {
        return $this->hotpot->source->xml_value($this->hotpot->source->hbs_software.'-config-file,global,user-string-2');
    }

    /**
     * expand_UserDefined3
     *
     * @return xxx
     */
    function expand_UserDefined3()  {
        return $this->hotpot->source->xml_value($this->hotpot->source->hbs_software.'-config-file,global,user-string-3');
    }

    /**
     * expand_VLinkColor
     *
     * @return xxx
     */
    function expand_VLinkColor()  {
        return $this->hotpot->source->xml_value($this->hotpot->source->hbs_software.'-config-file,global,vlink-color');
    }

    /**
     * expand_YourScoreIs
     *
     * @return xxx
     */
    function expand_YourScoreIs()  {
        return $this->hotpot->source->xml_value_js($this->hotpot->source->hbs_software.'-config-file,global,your-score-is');
    }

    /**
     * expand_Keypad
     *
     * @return xxx
     */
    function expand_Keypad()  {
        $str = '';
        if ($this->hotpot->source->xml_value_int($this->hotpot->source->hbs_software.'-config-file,'.$this->hotpot->source->hbs_quiztype.',include-keypad')) {

            // these characters must always be in the keypad
            $chars = array();
            $this->add_keypad_chars($chars, $this->hotpot->source->xml_value($this->hotpot->source->hbs_software.'-config-file,global,keypad-characters'));

            // append other characters used in the answers
            switch ($this->hotpot->source->hbs_quiztype) {
                case 'jcloze':
                    $tags = 'data,gap-fill,question-record';
                    break;
                case 'jquiz':
                    $tags = 'data,questions,question-record';
                    break;
                case 'rhubarb':
                    $tags = 'data,rhubarb-text';
                    break;
                default:
                    $tags = '';
            }
            if ($tags) {
                $q = 0;
                while (($question="[$q]['#']") && $this->hotpot->source->xml_value($tags, $question)) {

                    if ($this->hotpot->source->hbs_quiztype=='jquiz') {
                        $answers = $question."['answers'][0]['#']";
                    } else {
                        $answers = $question;
                    }

                    $a = 0;
                    while (($answer=$answers."['answer'][$a]['#']") && $this->hotpot->source->xml_value($tags, $answer)) {
                        $this->add_keypad_chars($chars, $this->hotpot->source->xml_value($tags,  $answer."['text'][0]['#']"));
                        $a++;
                    }
                    $q++;
                }
            }

            // remove duplicate characters and sort
            $chars = array_unique($chars);
            usort($chars, array($this, 'hotpot_keypad_chars_sort'));

            // create keypad buttons for each character
            foreach ($chars as $char) {
                $str .= '<button onclick="'."TypeChars('".$this->hotpot->source->js_value_safe($char, true)."');".'return false;">'.$char.'</button>';
            }
        }
        return $str;
    }

    /**
     * add_keypad_chars
     *
     * @param xxx $chars (passed by reference)
     * @param xxx $text
     */
    function add_keypad_chars(&$chars, $text)  {
        if (preg_match_all('/&[^;]+;/', $text, $more_chars)) {
            $chars = array_merge($chars, $more_chars[0]);
        }
    }

    /**
     * hotpot_keypad_chars_sort
     *
     * @param xxx $a_char
     * @param xxx $b_char
     * @return xxx
     */
    function hotpot_keypad_chars_sort($a_char, $b_char)  {
        $a_value = $this->hotpot_keypad_char_value($a_char);
        $b_value = $this->hotpot_keypad_char_value($b_char);
        if ($a_value < $b_value) {
            return -1;
        }
        if ($a_value > $b_value) {
            return 1;
        }
        // values are equal
        return 0;
    }

    /**
     * hotpot_keypad_char_value
     *
     * @param xxx $char
     * @return xxx
     */
    function hotpot_keypad_char_value($char)  {

        $char = hotpot_textlib('entities_to_utf8', $char);
        $ord = ord($char);

        // lowercase letters (plain or accented)
        if (($ord>=97 && $ord<=122) || ($ord>=224 && $ord<=255)) {
            return ($ord-31) + ($ord/1000);
        }

        // subscripts and superscripts
        switch ($ord) {
            case 0x2070: return 48.1; // super 0 = ord('0') + 0.1
            case 0x00B9: return 49.1; // super 1
            case 0x00B2: return 50.1; // super 2
            case 0x00B3: return 51.1; // super 3
            case 0x2074: return 52.1; // super 4
            case 0x2075: return 53.1; // super 5
            case 0x2076: return 54.1; // super 6
            case 0x2077: return 55.1; // super 7
            case 0x2078: return 56.1; // super 8
            case 0x2079: return 57.1; // super 9

            case 0x207A: return 43.1; // super +
            case 0x207B: return 45.1; // super -
            case 0x207C: return 61.1; // super =
            case 0x207D: return 40.1; // super (
            case 0x207E: return 41.1; // super )
            case 0x207F: return 110.1; // super n

            case 0x2080: return 47.9; // sub 0 = ord('0') - 0.1
            case 0x2081: return 48.9; // sub 1
            case 0x2082: return 49.9; // sub 2
            case 0x2083: return 50.9; // sub 3
            case 0x2084: return 51.9; // sub 4
            case 0x2085: return 52.9; // sub 5
            case 0x2086: return 53.9; // sub 6
            case 0x2087: return 54.9; // sub 7
            case 0x2088: return 55.9; // sub 8
            case 0x2089: return 56.9; // sub 9

            case 0x208A: return 42.9; // sub +
            case 0x208B: return 44.9; // sub -
            case 0x208C: return 60.9; // sub =
            case 0x208D: return 39.9; // sub (
            case 0x208E: return 40.9; // sub )
            case 0x208F: return 109.9; // sub n
        }

        return $ord;
    }

    // JCloze

    /**
     * expand_JSJCloze6
     *
     * @return xxx
     */
    function expand_JSJCloze6()  {
        return $this->expand_template('jcloze6.js_');
    }

    /**
     * expand_ClozeBody
     *
     * @return xxx
     */
    function expand_ClozeBody()  {
        $str = '';

        // get drop down list of words, if required
        $dropdownlist = '';
        if ($this->use_DropDownList()) {
            $this->set_WordList();
            foreach ($this->wordlist as $word) {
                $dropdownlist .= '<option value="'.$word.'">'.$word.'</option>';
            }
        }

        // cache clues flag and caption
        $includeclues = $this->expand_Clues();
        $cluecaption = $this->expand_ClueCaption();

        // detect if cloze starts with gap
        if (strpos($this->hotpot->source->filecontents, '<gap-fill><question-record>')) {
            $startwithgap = true;
        } else {
            $startwithgap = false;
        }

        // initialize loop values
        $q = 0;
        $tags = 'data,gap-fill';
        $question_record = "$tags,question-record";

        // initialize loop values
        $q = 0;
        $tags = 'data,gap-fill';
        $question_record = "$tags,question-record";

        // loop through text and gaps
        $looping = true;
        while ($looping) {
            $text = $this->hotpot->source->xml_value($tags, "[0]['#'][$q]");
            $gap = '';
            if (($question="[$q]['#']") && $this->hotpot->source->xml_value($question_record, $question)) {
                $gap .= '<span class="GapSpan" id="GapSpan'.$q.'">';
                if ($this->use_DropDownList()) {
                    $gap .= '<select id="Gap'.$q.'"><option value=""></option>'.$dropdownlist.'</select>';
                } else {
                    // minimum gap size
                    if (! $gapsize = $this->hotpot->source->xml_value_int($this->hotpot->source->hbs_software.'-config-file,'.$this->hotpot->source->hbs_quiztype.',minimum-gap-size')) {
                        $gapsize = 6;
                    }

                    // increase gap size to length of longest answer for this gap
                    $a = 0;
                    while (($answer=$question."['answer'][$a]['#']") && $this->hotpot->source->xml_value($question_record, $answer)) {
                        $answertext = $this->hotpot->source->xml_value($question_record,  $answer."['text'][0]['#']");
                        $answertext = preg_replace('/&[#a-zA-Z0-9]+;/', 'x', $answertext);
                        $gapsize = max($gapsize, strlen($answertext));
                        $a++;
                    }

                    $gap .= '<input type="text" id="Gap'.$q.'" onfocus="TrackFocus('.$q.')" onblur="LeaveGap()" class="GapBox" size="'.$gapsize.'"></input>';
                }
                if ($includeclues) {
                    $clue = $this->hotpot->source->xml_value($question_record, $question."['clue'][0]['#']");
                    if (strlen($clue)) {
                        $gap .= '<button style="line-height: 1.0" class="FuncButton" onfocus="FuncBtnOver(this)" onmouseover="FuncBtnOver(this)" onblur="FuncBtnOut(this)" onmouseout="FuncBtnOut(this)" onmousedown="FuncBtnDown(this)" onmouseup="FuncBtnOut(this)" onclick="ShowClue('.$q.')">'.$cluecaption.'</button>';
                    }
                }
                $gap .= '</span>';
            }
            if (strlen($text) || strlen($gap)) {
                if ($startwithgap) {
                    $str .= $gap.$text;
                } else {
                    $str .= $text.$gap;
                }
                $q++;
            } else {
                // no text or gap, so force end of loop
                $looping = false;
            }
        }
        if ($q==0) {
            // oops, no gaps found!
            return $this->hotpot->source->xml_value($tags);
        } else {
            return $str;
        }
    }

    /**
     * expand_ItemArray
     *
     * @return xxx
     */
    function expand_ItemArray()  {
        // this method is overridden by JCloze and JQuiz output formats
    }

    /**
     * expand_WordList
     *
     * @return xxx
     */
    function expand_WordList()  {
        $str = '';
        if ($this->include_WordList()) {
            $this->set_WordList();
            $str = implode(' &#160;&#160; ', $this->wordlist);
        }
        return $str;
    }

    /**
     * include_WordList
     *
     * @return xxx
     */
    function include_WordList()  {
        return $this->hotpot->source->xml_value_int($this->hotpot->source->hbs_software.'-config-file,'.$this->hotpot->source->hbs_quiztype.',include-word-list');
    }

    /**
     * use_DropDownList
     *
     * @return xxx
     */
    function use_DropDownList()  {
        return $this->hotpot->source->xml_value_int($this->hotpot->source->hbs_software.'-config-file,'.$this->hotpot->source->hbs_quiztype.',use-drop-down-list');
    }

    /**
     * set_WordList
     */
    function set_WordList()  {

        if (isset($this->wordlist)) {
            // do nothing
        } else {
            $this->wordlist = array();

            // is the wordlist required
            if ($this->include_WordList() || $this->use_DropDownList()) {

                $q = 0;
                $tags = 'data,gap-fill,question-record';
                while (($question="[$q]['#']") && $this->hotpot->source->xml_value($tags, $question)) {
                    $a = 0;
                    $aa = 0;
                    while (($answer=$question."['answer'][$a]['#']") && $this->hotpot->source->xml_value($tags, $answer)) {
                        $text = $this->hotpot->source->xml_value($tags,  $answer."['text'][0]['#']");
                        $correct =  $this->hotpot->source->xml_value_int($tags, $answer."['correct'][0]['#']");
                        if (strlen($text) && $correct) { // $correct is always true
                            $this->wordlist[] = $text;
                            $aa++;
                        }
                        $a++;
                    }
                    $q++;
                }
                $this->wordlist = array_unique($this->wordlist);
                sort($this->wordlist);
            }
        }
    }

    // jcross

    /**
     * expand_JSJCross6
     *
     * @return xxx
     */
    function expand_JSJCross6()  {
        return $this->expand_template('jcross6.js_');
    }

    /**
     * expand_CluesAcrossLabel
     *
     * @return xxx
     */
    function expand_CluesAcrossLabel()  {
        return $this->hotpot->source->xml_value($this->hotpot->source->hbs_software.'-config-file,'.$this->hotpot->source->hbs_quiztype.',clues-across');
    }

    /**
     * expand_CluesDownLabel
     *
     * @return xxx
     */
    function expand_CluesDownLabel()  {
        return $this->hotpot->source->xml_value($this->hotpot->source->hbs_software.'-config-file,'.$this->hotpot->source->hbs_quiztype.',clues-down');
    }

    /**
     * expand_EnterCaption
     *
     * @return xxx
     */
    function expand_EnterCaption()  {
        return $this->hotpot->source->xml_value($this->hotpot->source->hbs_software.'-config-file,'.$this->hotpot->source->hbs_quiztype.',enter-caption');
    }

    /**
     * expand_ShowHideClueList
     *
     * @return xxx
     */
    function expand_ShowHideClueList()  {
        $value = $this->hotpot->source->xml_value_int($this->hotpot->source->hbs_software.'-config-file,'.$this->hotpot->source->hbs_quiztype.',include-clue-list');
        return empty($value) ? ' style="display: none;"' : '';
    }

    /**
     * expand_CluesDown
     *
     * @return xxx
     */
    function expand_CluesDown()  {
        return $this->expand_jcross_clues('D');
    }

    /**
     * expand_CluesAcross
     *
     * @return xxx
     */
    function expand_CluesAcross()  {
        return $this->expand_jcross_clues('A');
    }

    /**
     * expand_jcross_clues
     *
     * @param xxx $direction
     * @return xxx
     */
    function expand_jcross_clues($direction)  {
        // $direction: A(cross) or D(own)
        $row = null;
        $r_max = 0;
        $c_max = 0;
        $this->get_jcross_grid($row, $r_max, $c_max);

        $clue_i = 0; // clue index;
        $str = '';
        for ($r=0; $r<=$r_max; $r++) {
            for ($c=0; $c<=$c_max; $c++) {
                $aword = $this->get_jcross_aword($row, $r, $r_max, $c, $c_max);
                $dword = $this->get_jcross_dword($row, $r, $r_max, $c, $c_max);
                if ($aword || $dword) {
                    $clue_i++; // increment clue index

                    // get the definition for this word
                    $def = '';
                    $word = ($direction=='A') ? $aword : $dword;
                    $word = hotpot_textlib('utf8_to_entities', $word);

                    $i = 0;
                    $clues = 'data,crossword,clues,item';
                    while (($clue = "[$i]['#']") && $this->hotpot->source->xml_value($clues, $clue)) {
                        if ($word==$this->hotpot->source->xml_value($clues, $clue."['word'][0]['#']")) {
                            $def = $this->hotpot->source->xml_value($clues, $clue."['def'][0]['#']");
                            break;
                        }
                        $i++;
                    }
                    if ($def) {
                        $str .= '<tr><td class="ClueNum">'.$clue_i.'. </td><td id="Clue_'.$direction.'_'.$clue_i.'" class="Clue">'.$def.'</td></tr>';
                    }
                }
            }
        }
        return $str;
    }

    /**
     * expand_LetterArray
     *
     * @return xxx
     */
    function expand_LetterArray()  {
        $row = null;
        $r_max = 0;
        $c_max = 0;
        $this->get_jcross_grid($row, $r_max, $c_max);

        $str = '';
        for ($r=0; $r<=$r_max; $r++) {
            $str .= "L[$r] = new Array(";
            for ($c=0; $c<=$c_max; $c++) {
                $str .= ($c>0 ? ',' : '')."'".$this->hotpot->source->js_value_safe($row[$r]['cell'][$c]['#'], true)."'";
            }
            $str .= ");\n";
        }
        return $str;
    }

    /**
     * expand_GuessArray
     *
     * @return xxx
     */
    function expand_GuessArray()  {
        $row = null;
        $r_max = 0;
        $c_max = 0;
        $this->get_jcross_grid($row, $r_max, $c_max);

        $str = '';
        for ($r=0; $r<=$r_max; $r++) {
            $str .= "G[$r] = new Array('".str_repeat("','", $c_max)."');\n";
        }
        return $str;
    }

    /**
     * expand_ClueNumArray
     *
     * @return xxx
     */
    function expand_ClueNumArray()  {
        $row = null;
        $r_max = 0;
        $c_max = 0;
        $this->get_jcross_grid($row, $r_max, $c_max);

        $i = 0; // clue index
        $str = '';
        for ($r=0; $r<=$r_max; $r++) {
            $str .= "CL[$r] = new Array(";
            for ($c=0; $c<=$c_max; $c++) {
                if ($c>0) {
                    $str .= ',';
                }
                $aword = $this->get_jcross_aword($row, $r, $r_max, $c, $c_max);
                $dword = $this->get_jcross_dword($row, $r, $r_max, $c, $c_max);
                if (empty($aword) && empty($dword)) {
                    $str .= 0;
                } else {
                    $i++; // increment the clue index
                    $str .= $i;
                }
            }
            $str .= ");\n";
        }
        return $str;
    }

    /**
     * expand_GridBody
     *
     * @return xxx
     */
    function expand_GridBody()  {
        $row = null;
        $r_max = 0;
        $c_max = 0;
        $this->get_jcross_grid($row, $r_max, $c_max);

        $i = 0; // clue index;
        $str = '';
        for ($r=0; $r<=$r_max; $r++) {
            $str .= '<tr id="Row_'.$r.'">';
            for ($c=0; $c<=$c_max; $c++) {
                if (empty($row[$r]['cell'][$c]['#'])) {
                    $str .= '<td class="BlankCell">&nbsp;</td>';
                } else {
                    $aword = $this->get_jcross_aword($row, $r, $r_max, $c, $c_max);
                    $dword = $this->get_jcross_dword($row, $r, $r_max, $c, $c_max);
                    if (empty($aword) && empty($dword)) {
                        $str .= '<td class="LetterOnlyCell"><span id="L_'.$r.'_'.$c.'">&nbsp;</span></td>';
                    } else {
                        $i++; // increment clue index
                        $str .= '<td class="NumLetterCell"><a href="javascript:void(0);" class="GridNum" onclick="ShowClue('.$i.','.$r.','.$c.')">'.$i.'</a><span class="NumLetterCellText" id="L_'.$r.'_'.$c.'" onclick="ShowClue('.$i.','.$r.','.$c.')">&nbsp;&nbsp;&nbsp;</span></td>';
                    }
                }
            }
            $str .= '</tr>';
        }
        return $str;
    }

    /**
     * get_jcross_grid
     *
     * @param xxx $rows (passed by reference)
     * @param xxx $r_max (passed by reference)
     * @param xxx $c_max (passed by reference)
     */
    function get_jcross_grid(&$rows, &$r_max, &$c_max)  {
        $r_max = 0;
        $c_max = 0;

        $r = 0;
        $tags = 'data,crossword,grid,row';
        while (($moretags="[$r]['#']") && $row = $this->hotpot->source->xml_value($tags, $moretags)) {
            $rows[$r] = $row;
            for ($c=0; $c<count($row['cell']); $c++) {
                if (! empty($row['cell'][$c]['#'])) {
                    $r_max = max($r, $r_max);
                    $c_max = max($c, $c_max);
                }
            }
            $r++;
        }
    }

    /**
     * get_jcross_dword
     *
     * @param xxx $row (passed by reference)
     * @param xxx $r
     * @param xxx $r_max
     * @param xxx $c
     * @param xxx $c_max
     * @return xxx
     */
    function get_jcross_dword(&$row, $r, $r_max, $c, $c_max)  {
        $str = '';
        if (($r==0 || empty($row[$r-1]['cell'][$c]['#'])) && $r<$r_max && !empty($row[$r+1]['cell'][$c]['#'])) {
            $str = $this->get_jcross_word($row, $r, $r_max, $c, $c_max, true);
        }
        return $str;
    }

    /**
     * get_jcross_aword
     *
     * @param xxx $row (passed by reference)
     * @param xxx $r
     * @param xxx $r_max
     * @param xxx $c
     * @param xxx $c_max
     * @return xxx
     */
    function get_jcross_aword(&$row, $r, $r_max, $c, $c_max)  {
        $str = '';
        if (($c==0 || empty($row[$r]['cell'][$c-1]['#'])) && $c<$c_max && !empty($row[$r]['cell'][$c+1]['#'])) {
            $str = $this->get_jcross_word($row, $r, $r_max, $c, $c_max, false);
        }
        return $str;
    }

    /**
     * get_jcross_word
     *
     * @param xxx $row (passed by reference)
     * @param xxx $r
     * @param xxx $r_max
     * @param xxx $c
     * @param xxx $c_max
     * @param xxx $go_down (optional, default=false)
     * @return xxx
     */
    function get_jcross_word(&$row, $r, $r_max, $c, $c_max, $go_down=false)  {
        $str = '';
        while ($r<=$r_max && $c<=$c_max && !empty($row[$r]['cell'][$c]['#'])) {
            $str .= $row[$r]['cell'][$c]['#'];
            if ($go_down) {
                $r++;
            } else {
                $c++;
            }
        }
        return $str;
    }

    // jmatch

    /**
     * expand_JSJMatch6
     *
     * @return xxx
     */
    function expand_JSJMatch6()  {
        return $this->expand_template('jmatch6.js_');
    }

    /**
     * expand_JSDJMatch6
     *
     * @return xxx
     */
    function expand_JSDJMatch6()  {
        return $this->expand_template('djmatch6.js_');
    }

    /**
     * expand_JSFJMatch6
     *
     * @return xxx
     */
    function expand_JSFJMatch6()  {
        return $this->expand_template('fjmatch6.js_');
    }

    /**
     * expand_ShuffleQs
     *
     * @return xxx
     */
    function expand_ShuffleQs()  {
        return $this->hotpot->source->xml_value_bool($this->hotpot->source->hbs_software.'-config-file,'.$this->hotpot->source->hbs_quiztype.',shuffle-questions');
    }

    /**
     * expand_QsToShow
     *
     * @return xxx
     */
    function expand_QsToShow()  {
        $i = $this->hotpot->source->xml_value($this->hotpot->source->hbs_software.'-config-file,'.$this->hotpot->source->hbs_quiztype.',show-limited-questions');
        if ($i) {
            $i = $this->hotpot->source->xml_value($this->hotpot->source->hbs_software.'-config-file,'.$this->hotpot->source->hbs_quiztype.',questions-to-show');
        }
        if (empty($i)) {
            $i = 0;
            if ($this->hotpot->source->hbs_quiztype=='jmatch') {
                $tags = 'data,matching-exercise,pair';
            } else if ($this->hotpot->source->hbs_quiztype=='jquiz') {
                $tags = 'data,questions,question-record';
            } else {
                $tags = '';
            }
            if ($tags) {
                while (($moretags="[$i]['#']") && $value = $this->hotpot->source->xml_value($tags, $moretags)) {
                    $i++;
                }
            }
        }
        return $i;
    }

    /**
     * expand_MatchDivItems
     *
     * @return xxx
     */
    function expand_MatchDivItems()  {
        $this->set_jmatch_items();

        $l_keys = $this->shuffle_jmatch_items($this->l_items);
        $r_keys = $this->shuffle_jmatch_items($this->r_items);

        $options = '<option value="x">'.$this->hotpot->source->xml_value('data,matching-exercise,default-right-item').'</option>'."\n";

        foreach ($r_keys as $key) {
            // only add the first occurrence of the text (i.e. skip duplicates)
            if ($key==$this->r_items[$key]['key']) {
                $options .= '<option value="'.$key.'">'.$this->r_items[$key]['text'].'</option>'."\n";
                // Note: if the 'text' contains an image, it could be added as the background image of the option
                // http://www.small-software-utilities.com/design/91/html-select-with-background-image-or-icon-next-to-text/
                // ... or of an optgroup ...
                // http://ask.metafilter.com/16153/Images-in-HTML-select-form-elements
            }
        }

        $str = '';
        foreach ($l_keys as $key) {
            $str .= '<tr><td class="l_item">'.$this->l_items[$key]['text'].'</td>';
            $str .= '<td class="r_item">';
            if ($this->r_items[$key]['fixed']) {
                $str .= $this->r_items[$key]['text'];
            }  else {
                $str .= '<select id="s'.$this->r_items[$key]['key'].'_'.$key.'">'.$options.'</select>';
            }
            $str .= '</td><td></td></tr>';
        }
        return $str;
    }

    /**
     * expand_FixedArray
     *
     * @return xxx
     */
    function expand_FixedArray()  {
        $this->set_jmatch_items();
        $str = '';
        foreach ($this->l_items as $i=>$item) {
            $str .= "F[$i] = new Array();\n";
            $str .= "F[$i][0] = '".$this->hotpot->source->js_value_safe($item['text'], true)."';\n";
            $str .= "F[$i][1] = ".($item['key']+1).";\n";
        }
        return $str;
    }

    /**
     * expand_DragArray
     *
     * @return xxx
     */
    function expand_DragArray()  {
        $this->set_jmatch_items();
        $str = '';
        foreach ($this->r_items as $i=>$item) {
            $str .= "D[$i] = new Array();\n";
            $str .= "D[$i][0] = '".$this->hotpot->source->js_value_safe($item['text'], true)."';\n";
            $str .= "D[$i][1] = ".($item['key']+1).";\n";
            $str .= "D[$i][2] = ".$item['fixed'].";\n";
        }
        return $str;
    }

    /**
     * expand_Slide
     *
     * @return xxx
     */
    function expand_Slide()  {
        // return true if any JMatch drag-and-drop RH items are fixed and therefore need to slide to the LHS
        $this->set_jmatch_items();
        foreach ($this->r_items as $i=>$item) {
            if ($item['fixed']) {
                return true;
            }
        }
        return false;
    }

    /**
     * set_jmatch_items
     */
    function set_jmatch_items()  {
        if (count($this->l_items)) {
            return;
        }
        $tags = 'data,matching-exercise,pair';
        $i = 0;
        while (($item = "[$i]['#']") && $this->hotpot->source->xml_value($tags, $item)) {

            $l_item = $item."['left-item'][0]['#']";
            $l_text = $this->hotpot->source->xml_value($tags, $l_item."['text'][0]['#']");
            $l_fixed = $this->hotpot->source->xml_value_int($tags, $l_item."['fixed'][0]['#']");

            $r_item = $item."['right-item'][0]['#']";
            $r_text = $this->hotpot->source->xml_value($tags, $r_item."['text'][0]['#']");
            $r_fixed = $this->hotpot->source->xml_value_int($tags, $r_item."['fixed'][0]['#']");

            // typically all right-hand items are unique, but there may be duplicates
            // in which case we want the key of the first item containing this text
            for ($key=0; $key<$i; $key++) {
                if (isset($this->r_items[$key]) && $this->r_items[$key]['text']==$r_text) {
                    break;
                }
            }

            if (strlen($r_text)) {
                $addright = true;
            } else {
                $addright = false;
            }
            if (strlen($l_text)) {
                $this->l_items[] = array('key' => $key, 'text' => $l_text, 'fixed' => $l_fixed);
                $addright = true; // force right item to be added
            }
            if ($addright) {
                $this->r_items[] = array('key' => $key, 'text' => $r_text, 'fixed' => $r_fixed);
            }
            $i++;
        }
    }

    /**
     * shuffle_jmatch_items
     *
     * @param xxx $items (passed by reference)
     * @return xxx
     */
    function shuffle_jmatch_items(&$items)  {
        // get moveable items
        $moveable_keys = array();
        for ($i=0; $i<count($items); $i++) {
            if(! $items[$i]['fixed']) {
                $moveable_keys[] = $i;
            }
        }
        // shuffle moveable items
        $this->seed_random_number_generator();
        shuffle($moveable_keys);

        $keys = array();
        for ($i=0, $ii=0; $i<count($items); $i++) {
            if($items[$i]['fixed']) {
                //  fixed items stay where they are
                $keys[] = $i;
            } else {
                //  moveable items are inserted in a shuffled order
                $keys[] = $moveable_keys[$ii++];
            }
        }
        return $keys;
    }

    /**
     * seed_random_number_generator
     */
    function seed_random_number_generator()  {
        static $seeded = false;
        if (! $seeded) {
            srand((double) microtime() * 1000000);
            $seeded = true;
        }
    }

    // JMatch flash card

    /**
     * expand_TRows
     *
     * @return xxx
     */
    function expand_TRows()  {
        $str = '';
        $this->set_jmatch_items();
        $i_max = count($this->l_items);
        for ($i=0; $i<$i_max; $i++) {
            $str .= '<tr class="FlashcardRow" id="I_'.$i.'"><td id="L_'.$i.'">'.$this->l_items[$i]['text'].'</td><td id="R_'.$i.'">'.$this->r_items[$i]['text'].'</td></tr>'."\n";
        }
        return $str;
    }

    // jmix

    /**
     * expand_JSJMix6
     *
     * @return xxx
     */
    function expand_JSJMix6()  {
        return $this->expand_template('jmix6.js_');
    }

    /**
     * expand_JSFJMix6
     *
     * @return xxx
     */
    function expand_JSFJMix6()  {
        return $this->expand_template('fjmix6.js_');
    }

    /**
     * expand_JSDJMix6
     *
     * @return xxx
     */
    function expand_JSDJMix6()  {
        return $this->expand_template('djmix6.js_');
    }

    /**
     * expand_Punctuation
     *
     * @return xxx
     */
    function expand_Punctuation()  {
        $chars = array();

        // RegExp pattern to match HTML entity
        $pattern = '/&#x([0-9A-F]+);/i';

        // entities for all punctutation except '&#;' (because they are used in html entities)
        $entities = $this->jmix_encode_punctuation('!"$%'."'".'()*+,-./:<=>?@[\]^_`{|}~');

        // xml tags for JMix segments and alternate answers
        $punctuation_tags = array(
            'data,jumbled-order-exercise,main-order,segment',
            'data,jumbled-order-exercise,alternate'
        );
        foreach ($punctuation_tags as $tags) {

            // get next segment (or alternate answer)
            $i = 0;
            while ($value = $this->hotpot->source->xml_value($tags, "[$i]['#']")) {

                // convert low-ascii punctuation to entities
                $value = strtr($value, $entities);

                // extract all hex HTML entities
                if (preg_match_all($pattern, $value, $matches)) {

                    // loop through hex entities
                    $m_max = count($matches[0]);
                    for ($m=0; $m<$m_max; $m++) {

                        // convert to hex string to number
                        //eval('$hex=0x'.$matches[1][$m].';');
                        $hex = hexdec($matches[1][$m]);

                        // is this a punctuation character?
                        if (
                            ($hex>=0x0020 && $hex<=0x00BF) || // ascii punctuation
                            ($hex>=0x2000 && $hex<=0x206F) || // general punctuation
                            ($hex>=0x3000 && $hex<=0x303F) || // CJK punctuation
                            ($hex>=0xFE30 && $hex<=0xFE4F) || // CJK compatability
                            ($hex>=0xFE50 && $hex<=0xFE6F) || // small form variants
                            ($hex>=0xFF00 && $hex<=0xFF40) || // halfwidth and fullwidth forms (1)
                            ($hex>=0xFF5B && $hex<=0xFF65) || // halfwidth and fullwidth forms (2)
                            ($hex>=0xFFE0 && $hex<=0xFFEE)    // halfwidth and fullwidth forms (3)
                        ) {
                            // add this character
                            $chars[] = $matches[0][$m];
                        }
                    }
                } // end if HTML entity

                $i++;
            } // end while next segment (or alternate answer)
        } // end foreach $tags

        $chars = implode('', array_unique($chars));
        return $this->hotpot->source->js_value_safe($chars, true);
    }

    /**
     * expand_OpenPunctuation
     *
     * @return xxx
     */
    function expand_OpenPunctuation()  {
        $chars = array();

        // unicode punctuation designations (pi="initial quote", ps="open")
        //  http://www.sql-und-xml.de/unicode-database/pi.html
        //  http://www.sql-und-xml.de/unicode-database/ps.html
        $pi = '0022|0027|00AB|2018|201B|201C|201F|2039';
        $ps = '0028|005B|007B|0F3A|0F3C|169B|201A|201E|2045|207D|208D|2329|23B4|2768|276A|276C|276E|2770|2772|2774|27E6|27E8|27EA|2983|2985|2987|2989|298B|298D|298F|2991|2993|2995|2997|29D8|29DA|29FC|3008|300A|300C|300E|3010|3014|3016|3018|301A|301D|FD3E|FE35|FE37|FE39|FE3B|FE3D|FE3F|FE41|FE43|FE47|FE59|FE5B|FE5D|FF08|FF3B|FF5B|FF5F|FF62';
        $pattern = '/(&#x('.$pi.'|'.$ps.');)/i';

        // HMTL entities of opening punctuation
        $entities = $this->jmix_encode_punctuation('"'."'".'(<[{');

        // xml tags for JMix segments and alternate answers
        $punctuation_tags = array(
            'data,jumbled-order-exercise,main-order,segment',
            'data,jumbled-order-exercise,alternate'
        );
        foreach ($punctuation_tags as $tags) {
            $i = 0;
            while ($value = $this->hotpot->source->xml_value($tags, "[$i]['#']")) {
                $value = strtr($value, $entities);
                if (preg_match_all($pattern, $value, $matches)) {
                    $chars = array_merge($chars, $matches[0]);
                }
                $i++;
            }
        }

        $chars = implode('', array_unique($chars));
        return $this->hotpot->source->js_value_safe($chars, true);
    }

    /**
     * jmix_encode_punctuation
     *
     * @param xxx $str
     * @return xxx
     */
    function jmix_encode_punctuation($str)  {
        $entities = array();
        $i_max = strlen($str);
        for ($i=0; $i<$i_max; $i++) {
            $entities[$str{$i}] = '&#x'.sprintf('%04X', ord($str{$i})).';';
        }
        return $entities;
    }

    /*
     * expand_ForceLowercase
     *
     * Should we force the first letter of the first word to be lowercase?
     * (all other letters are assumed to have the correct case)
     *
     * When generating html files with standard JMix program, the user is prompted:
     *   Should the word Xxxxx begin with a capital letter
     *   even when it isn't at the beginning of a sentence?
     *
     * The "force-lowercase" xml tag implements a similar functionality
     * This tag does not exist in standard Hot Potatoes XML files,
     * but it can be added manually, for example to a HP config file
     *
     * @return xxx
     */
     function expand_ForceLowercase() {
        $tag = $this->hotpot->source->hbs_software.'-config-file,'.$this->hotpot->source->hbs_quiztype.',force-lowercase';
        return $this->hotpot->source->xml_value_int($tag);
    }

    /**
     * expand_SegmentArray
     *
     * @return xxx
     */
    function expand_SegmentArray($more_values=array()) {

        $segments = array();
        $values = array();

        // XML tags to the start of a segment
        $tags = 'data,jumbled-order-exercise,main-order,segment';

        $i = 0;
        while ($value = $this->hotpot->source->xml_value($tags, "[$i]['#']")) {
            if ($i==0 && $this->expand_ForceLowercase()) {
                $value = strtolower(substr($value, 0, 1)).substr($value, 1);
            }
            $key = array_search($value, $values);
            if (is_numeric($key)) {
                $segments[] = $key;
            } else {
                $segments[] = $i;
                $values[$i] = $value;
            }
            $i++;
        }

        foreach ($more_values as $value) {
            $key = array_search($value, $values);
            if (is_numeric($key)) {
                $segments[] = $key;
            } else {
                $segments[] = $i;
                $values[$i] = $value;
            }
            $i++;
        }

        $this->seed_random_number_generator();
        $keys = array_keys($segments);
        shuffle($keys);

        $str = '';
        for ($i=0; $i<count($keys); $i++) {
            $key = $segments[$keys[$i]];
            $str .= "Segments[$i] = new Array();\n";
            $str .= "Segments[$i][0] = '".$this->hotpot->source->js_value_safe($values[$key], true)."';\n";
            $str .= "Segments[$i][1] = ".($key+1).";\n";
            $str .= "Segments[$i][2] = 0;\n";
        }
        return $str;
    }

    /**
     * expand_AnswerArray
     *
     * @return xxx
     */
    function expand_AnswerArray()  {

        $segments = array();
        $values = array();
        $escapedvalues = array();

        // XML tags to the start of a segment
        $tags = 'data,jumbled-order-exercise,main-order,segment';

        $i = 0;
        while ($value = $this->hotpot->source->xml_value($tags, "[$i]['#']")) {
            if ($i==0 && $this->expand_ForceLowercase()) {
                $value = strtolower(substr($value, 0, 1)).substr($value, 1);
            }
            $key = array_search($value, $values);
            if (is_numeric($key)) {
                $segments[] = $key+1;
            } else {
                $segments[] = $i+1;
                $values[$i] = $value;
                $escapedvalues[] = preg_quote($value, '/');
            }
            $i++;
        }

        // start the answers array
        $a = 0;
        $str = 'Answers['.($a++).'] = new Array('.implode(',', $segments).");\n";

        // pattern to match the next part of an alternate answer
        $pattern = '/^('.implode('|', $escapedvalues).')\s*/i';

        // XML tags to the start of an alternate answer
        $tags = 'data,jumbled-order-exercise,alternate';

        $i = 0;
        while ($value = $this->hotpot->source->xml_value($tags, "[$i]['#']")) {
            $segments = array();
            while (strlen($value) && preg_match($pattern, $value, $matches)) {
                $key = array_search($matches[1], $values);
                if (is_numeric($key)) {
                    $segments[] = $key+1;
                    $value = substr($value, strlen($matches[0]));
                } else {
                    // invalid alternate sequence - shouldn't happen !!
                    $segments = array();
                    break;
                }
            }
            if (count($segments)) {
                $str .= 'Answers['.($a++).'] = new Array('.implode(',', $segments).");\n";
            }
            $i++;
        }
        return $str;
    }

    /**
     * expand_RemainingWords
     *
     * @return xxx
     */
    function expand_RemainingWords()  {
        return $this->hotpot->source->xml_value($this->hotpot->source->hbs_software.'-config-file,'.$this->hotpot->source->hbs_quiztype.',remaining-words');
    }

    /**
     * expand_DropTotal
     *
     * @return xxx
     */
    function expand_DropTotal()  {
        return $this->hotpot->source->xml_value_int($this->hotpot->source->hbs_software.'-config-file,global,drop-total');
    }

    // JQuiz

    /**
     * expand_JSJQuiz6
     *
     * @return xxx
     */
    function expand_JSJQuiz6()  {
        return $this->expand_template('jquiz6.js_');
    }

    /**
     * expand_QuestionOutput
     *
     * @return xxx
     */
    function expand_QuestionOutput()  {
        // start question list
        $str = '<ol class="QuizQuestions" id="Questions">'."\n";

        $q = 0;
        $tags = 'data,questions,question-record';
        while (($question="[$q]['#']") && $this->hotpot->source->xml_value($tags, $question) && ($answers = $question."['answers'][0]['#']") && $this->hotpot->source->xml_value($tags, $answers)) {

            // get question
            $question_text = $this->hotpot->source->xml_value($tags, $question."['question'][0]['#']");
            $question_type = $this->hotpot->source->xml_value_int($tags, $question."['question-type'][0]['#']");

            switch ($question_type) {
                case 1: // MULTICHOICE:
                    $textbox = false;
                    $liststart = '<ol class="MCAnswers">'."\n";
                    break;
                case 2: // SHORTANSWER:
                    $textbox = true;
                    $liststart = '';
                    break;
                case 3: // HYBRID:
                    $textbox = true;
                    $liststart = '<ol class="MCAnswers" id="Q_'.$q.'_Hybrid_MC" style="display: none;">'."\n";
                    break;
                case 4: // MULTISELECT:
                    $textbox = false;
                    $liststart = '<ol class="MSelAnswers">'."\n";
                    break;
                default:
                    continue; // unknown question type
            }

            $first_answer_tags = $question."['answers'][0]['#']['answer'][0]['#']['text'][0]['#']";
            $first_answer_text = $this->hotpot->source->xml_value($tags, $first_answer_tags, '', false);

            // check we have a question (or at least one answer)
            if (strlen($question_text) || strlen($first_answer_text)) {

                // start question
                $str .= '<li class="QuizQuestion" id="Q_'.$q.'" style="display: none;">';
                $str .= '<p class="QuestionText">'.$question_text.'</p>';

                if ($textbox) {

                    // get prefix, suffix and maximum size of ShortAnswer box (default = 9)
                    list($prefix, $suffix, $size) = $this->expand_jquiz_textbox_details($tags, $answers, $q);

                    $str .= '<div class="ShortAnswer" id="Q_'.$q.'_SA"><form method="post" action="" onsubmit="return false;"><div>';
                    $str .= $prefix;
                    if ($size<=25) {
                        // text box
                        $str .= '<input type="text" id="Q_'.$q.'_Guess" onfocus="TrackFocus('."'".'Q_'.$q.'_Guess'."'".')" onblur="LeaveGap()" class="ShortAnswerBox" size="'.$size.'"></input>';
                    } else {
                        // textarea (29 cols wide)
                        $str .= '<textarea id="Q_'.$q.'_Guess" onfocus="TrackFocus('."'".'Q_'.$q.'_Guess'."'".')" onblur="LeaveGap()" class="ShortAnswerBox" cols="29" rows="'.ceil($size/25).'"></textarea>';
                    }
                    $str .= $suffix;
                    $str .= '<br /><br />';

                    $caption = $this->expand_CheckCaption();
                    $str .= $this->expand_jquiz_button($caption, "CheckShortAnswer($q)");

                    if ($this->expand_Hint()) {
                        $caption = $this->expand_HintCaption();
                        $str .= $this->expand_jquiz_button($caption, "ShowHint($q)");
                    }
                    if ($this->expand_ShowAnswer()) {
                        $caption = $this->expand_ShowAnswerCaption();
                        $str .= $this->expand_jquiz_button($caption, "ShowAnswers($q)");
                    }

                    $str .= '</div></form></div>';
                }

                if ($liststart) {

                    $str .= $liststart;

                    $a = 0;
                    $aa = 0;
                    while (($answer = $answers."['answer'][$a]['#']") && $this->hotpot->source->xml_value($tags, $answer)) {
                        $text = $this->hotpot->source->xml_value($tags, $answer."['text'][0]['#']");
                        if (strlen($text)) {
                            if ($question_type==1 || $question_type==3) {
                                // MULTICHOICE or HYBRID: button
                                if ($this->hotpot->source->xml_value_int($tags, $answer."['include-in-mc-options'][0]['#']")) {
                                    $str .= '<li id="Q_'.$q.'_'.$aa.'"><button class="FuncButton" onfocus="FuncBtnOver(this)" onblur="FuncBtnOut(this)" onmouseover="FuncBtnOver(this)" onmouseout="FuncBtnOut(this)" onmousedown="FuncBtnDown(this)" onmouseup="FuncBtnOut(this)" id="Q_'.$q.'_'.$aa.'_Btn" onclick="CheckMCAnswer('.$q.','.$aa.',this)">&nbsp;&nbsp;?&nbsp;&nbsp;</button>&nbsp;&nbsp;'.$text.'</li>'."\n";
                                }
                            } else if ($question_type==4) {
                                // MULTISELECT: checkbox
                                $str .= '<li id="Q_'.$q.'_'.$aa.'"><form method="post" action="" onsubmit="return false;"><div><input type="checkbox" id="Q_'.$q.'_'.$aa.'_Chk" class="MSelCheckbox" />'.$text.'</div></form></li>'."\n";
                            }
                            $aa++;
                        }
                        $a++;
                    }

                    // finish answer list
                    $str .= '</ol>';

                    if ($question_type==4) {
                        // MULTISELECT: check button
                        $caption = $this->expand_CheckCaption();
                        $str .= $this->expand_jquiz_button($caption, "CheckMultiSelAnswer($q)");
                    }
                }

                // finish question
                $str .= "</li>\n";
            }
            $q++;
        } // end while $question

        // finish question list and finish
        return $str."</ol>\n";
    }

    /**
     * expand_jquiz_textbox_details
     *
     * @param xxx $tags
     * @param xxx $answers
     * @param xxx $q
     * @param xxx $defaultsize (optional, default=9)
     * @return xxx
     */
    function expand_jquiz_textbox_details($tags, $answers, $q, $defaultsize=9) {
        $prefix = '';
        $suffix = '';
        $size = $defaultsize;

        $a = 0;
        while (($answer = $answers."['answer'][$a]['#']") && $this->hotpot->source->xml_value($tags, $answer)) {
            $text = $this->hotpot->source->xml_value($tags, $answer."['text'][0]['#']", '', false);
            $text = preg_replace('/&[#a-zA-Z0-9]+;/', 'x', $text);
            $size = max($size, strlen($text));
            $a++;
        }

        return array($prefix, $suffix, $size);
    }

    /**
     * expand_jquiz_button
     *
     * @param xxx $caption
     * @param xxx $onclick
     * @return xxx
     */
    function expand_jquiz_button($caption, $onclick)  {
        return '<button class="FuncButton" onfocus="FuncBtnOver(this)" onblur="FuncBtnOut(this)" onmouseover="FuncBtnOver(this)" onmouseout="FuncBtnOut(this)" onmousedown="FuncBtnDown(this)" onmouseup="FuncBtnOut(this)" onclick="'.$onclick.'">'.$caption.'</button>';
    }

    /**
     * expand_MultiChoice
     *
     * @return xxx
     */
    function expand_MultiChoice()  {
        return $this->jquiz_has_question_type(1);
    }

    /**
     * expand_ShortAnswer
     *
     * @return xxx
     */
    function expand_ShortAnswer()  {
        return $this->jquiz_has_question_type(2);
    }

    /**
     * expand_MultiSelect
     *
     * @return xxx
     */
    function expand_MultiSelect()  {
        return $this->jquiz_has_question_type(4);
    }

    /**
     * jquiz_has_question_type
     *
     * @param xxx $type
     * @return xxx
     */
    function jquiz_has_question_type($type) {
        // does this JQuiz have any questions of the given $type?
        $q = 0;
        $tags = 'data,questions,question-record';
        while (($question = "[$q]['#']") && $this->hotpot->source->xml_value($tags, $question)) {
            $question_type = $this->hotpot->source->xml_value($tags, $question."['question-type'][0]['#']");
            if ($question_type==$type || ($question_type==3 && ($type==1 || $type==2))) {
                // 1=MULTICHOICE 2=SHORTANSWER 3=HYBRID
                return true;
            }
            $q++;
        }
        return false;
    }

    /**
     * expand_CompletedSoFar
     *
     * @return xxx
     */
    function expand_CompletedSoFar()  {
        return $this->hotpot->source->xml_value_js($this->hotpot->source->hbs_software.'-config-file,global,completed-so-far');
    }

    /**
     * expand_ContinuousScoring
     *
     * @return xxx
     */
    function expand_ContinuousScoring()  {
        return $this->hotpot->source->xml_value_bool($this->hotpot->source->hbs_software.'-config-file,'.$this->hotpot->source->hbs_quiztype.',continuous-scoring');
    }

    /**
     * expand_CorrectFirstTime
     *
     * @return xxx
     */
    function expand_CorrectFirstTime()  {
        return $this->hotpot->source->xml_value_js($this->hotpot->source->hbs_software.'-config-file,global,correct-first-time');
    }

    /**
     * expand_ExerciseCompleted
     *
     * @return xxx
     */
    function expand_ExerciseCompleted()  {
        return $this->hotpot->source->xml_value_js($this->hotpot->source->hbs_software.'-config-file,global,exercise-completed');
    }

    /**
     * expand_ShowCorrectFirstTime
     *
     * @return xxx
     */
    function expand_ShowCorrectFirstTime()  {
        return $this->hotpot->source->xml_value_bool($this->hotpot->source->hbs_software.'-config-file,'.$this->hotpot->source->hbs_quiztype.',show-correct-first-time');
    }

    /**
     * expand_ShuffleAs
     *
     * @return xxx
     */
    function expand_ShuffleAs()  {
        return $this->hotpot->source->xml_value_bool($this->hotpot->source->hbs_software.'-config-file,'.$this->hotpot->source->hbs_quiztype.',shuffle-answers');
    }

    /**
     * expand_DefaultRight
     *
     * @return xxx
     */
    function expand_DefaultRight()  {
        return $this->expand_GuessCorrect();
    }

    /**
     * expand_DefaultWrong
     *
     * @return xxx
     */
    function expand_DefaultWrong()  {
        return $this->expand_GuessIncorrect();
    }

    /**
     * expand_ShowAllQuestionsCaptionJS
     *
     * @return xxx
     */
    function expand_ShowAllQuestionsCaptionJS()  {
        return $this->hotpot->source->xml_value_js($this->hotpot->source->hbs_software.'-config-file,global,show-all-questions-caption');
    }

    /**
     * expand_ShowOneByOneCaptionJS
     *
     * @return xxx
     */
    function expand_ShowOneByOneCaptionJS()  {
        return $this->hotpot->source->xml_value_js($this->hotpot->source->hbs_software.'-config-file,global,show-one-by-one-caption');
    }

    /**
     * expand_CorrectList
     *
     * @return xxx
     */
    function expand_CorrectList()  {
        return $this->hotpot->source->xml_value_js($this->hotpot->source->hbs_software.'-config-file,'.$this->hotpot->source->hbs_quiztype.',correct-answers');
    }

    /**
     * expand_HybridTries
     *
     * @return xxx
     */
    function expand_HybridTries()  {
        return $this->hotpot->source->xml_value($this->hotpot->source->hbs_software.'-config-file,'.$this->hotpot->source->hbs_quiztype.',short-answer-tries-on-hybrid-q');
    }

    /**
     * expand_PleaseEnter
     *
     * @return xxx
     */
    function expand_PleaseEnter()  {
        return $this->hotpot->source->xml_value_js($this->hotpot->source->hbs_software.'-config-file,'.$this->hotpot->source->hbs_quiztype.',enter-a-guess');
    }

    /**
     * expand_PartlyIncorrect
     *
     * @return xxx
     */
    function expand_PartlyIncorrect()  {
        return $this->hotpot->source->xml_value_js($this->hotpot->source->hbs_software.'-config-file,'.$this->hotpot->source->hbs_quiztype.',partly-incorrect');
    }

    /**
     * expand_ShowAnswerCaption
     *
     * @return xxx
     */
    function expand_ShowAnswerCaption()  {
        return $this->hotpot->source->xml_value($this->hotpot->source->hbs_software.'-config-file,'.$this->hotpot->source->hbs_quiztype.',show-answer-caption');
    }

    /**
     * expand_ShowAlsoCorrect
     *
     * @return xxx
     */
    function expand_ShowAlsoCorrect()  {
        return $this->hotpot->source->xml_value_bool($this->hotpot->source->hbs_software.'-config-file,global,show-also-correct');
    }

    // Textoys stylesheets (tt3.cs_)

    /**
     * expand_isRTL
     *
     * @return xxx
     */
    function expand_isRTL()  {
        // this may require some clever detection of RTL languages (e.g. Hebrew)
        // but for now we just check the RTL setting in Options -> Configure Output
        return $this->hotpot->source->xml_value_int($this->hotpot->source->hbs_software.'-config-file,global,process-for-rtl');
    }

    /**
     * expand_isLTR
     *
     * @return xxx
     */
    function expand_isLTR()  {
        if ($this->expand_isRTL()) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * expand_RTLText
     *
     * @return xxx
     */
    function expand_RTLText()  {
        return $this->expand_isRTL();
    }
}
