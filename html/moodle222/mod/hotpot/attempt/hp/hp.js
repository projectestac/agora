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
 * mod/hotpot/attempt/hp/hp.js
 *
 * @package   mod-hotpot
 * @copyright 2010 Gordon Bateson <gordon.bateson@gmail.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * hpQuizAttempt
 *
 * @return xxx
 */
function hpQuizAttempt() {
    this.status    = 0;
    this.redirect  = 0;
    this.penalties = 0;
    this.score     = 0;
    this.forceajax = false;
    this.sendallclicks = false;

    this.questions = new Array();

    this.quiztype  = ''; // JCloze JCross JMatch JMix JQuiz
    this.form      = null; // reference to document.forms['store']
    this.formlock  = false; // prevents duplicate sets of results being sent
    this.starttime = null; // Date object for start time as recorded by client
    this.endtime   = null; // Date object for end time as recorded by client

    /**
     * init
     *
     * @param xxx questionCount
     * @param xxx sendallclicks
     * @param xxx forceajax
     */
    this.init = function (questionCount, sendallclicks, forceajax) {
        this.form = this.findForm('store', self);
        if (questionCount) {
            this.initQuestions(questionCount);
        }
        if ((typeof(sendallclicks)=='string' && parseInt(sendallclicks)) || (typeof(sendallclicks)=='number' && sendallclicks) || (typeof(sendallclicks)=='boolean' && sendallclicks)) {
            this.sendallclicks = true;
        }
        if ((typeof(forceajax)=='string' && parseInt(forceajax)) || (typeof(forceajax)=='number' && forceajax) || (typeof(forceajax)=='boolean' && forceajax)) {
            this.forceajax = true;
        }
        this.status = 1; // in progress
        this.starttime = new Date();
    }

    /**
     * initQuestions
     *
     * @param xxx questionCount
     */
    this.initQuestions = function (questionCount) {
        for (var i=0; i<questionCount; i++) {
            this.addQuestion(i);
            this.initQuestion(i);
        }
    }

    /**
     * initQuestion
     *
     * @param xxx i
     */
    this.initQuestion = function (i) {
        // this function will be "overloaded" by subclass
    }

    /**
     * addQuestion
     *
     * @param xxx i
     */
    this.addQuestion = function (i) {
        this.questions[i] = new hpQuestion();
    }

    /**
     * onclickClue
     *
     * @param xxx i
     */
    this.onclickClue = function (i) {
        this.questions[i].clues++;
        if (this.sendallclicks) {
            this.onunload(0);
        }
    }

    /**
     * onclickHint
     *
     * @param xxx i
     */
    this.onclickHint = function (i) {
        this.questions[i].hints++;
        if (this.sendallclicks) {
            this.onunload(0);
        }
    }

    /**
     * onclickCheck
     *
     * @param xxx setScores
     */
    this.onclickCheck = function (setScores) {
        // this function will be "overloaded" by subclass
    }

    /**
     * addFields
     *
     * @param xxx xml
     */
    this.addFields = function (xml) {
        // looop through fields in this attempt
        for (var fieldname in this) {
            switch (fieldname) {
                // case 'quiztype':
                case 'status':
                case 'penalties':
                case 'score':
                    xml.addField(this.quiztype+'_'+fieldname, this[fieldname]);
                    break;

                case 'questions':
                    var keys = object_keys(this.questions, 1); // 1 = properties only
                    var x;
                    while (x = keys.shift()) {
                        this.questions[x].addFields(xml, this.getQuestionPrefix(x));
                    }
                    break;
            }
        }
    }

    /**
     * getQuestionPrefix
     *
     * @param xxx i
     * @return xxx
     */
    this.getQuestionPrefix = function (i) {
        return this.quiztype + '_q' + (parseInt(i)<9 ? '0' : '') + (parseInt(i)+1) + '_';
    }

    /**
     * setQuestionScore
     *
     * @param xxx q
     */
    this.setQuestionScore = function (q) {
        this.questions[q].score = 0;
    }

    /**
     * setScoreAndPenalties
     *
     * @param xxx forceRecalculate
     */
    this.setScoreAndPenalties = function (forceRecalculate) {
        if (forceRecalculate) {
            // trigger this.onclickCheck() event to save responses and set scores
            this.onclickCheck(true);
        }
        this.score = window.Score || 0;
        this.penalties = window.Penalties || 0;
    }

    /**
     * lock
     */
    this.lock = function () {
        this.formlock = true;
    }

    /**
     * unlock
     */
    this.unlock = function () {
        this.formlock = false;
    }

    /**
     * islocked
     *
     * @return xxx
     */
    this.islocked = function () {
        return this.formlock;
    }

    /**
     * onunload
     *
     * @param xxx status
     * @param xxx flag
     * @return xxx
     */
    this.onunload = function (status, flag) {
        if (! this.form) {
            // results have already been submitted
            return true;
        }

        if (this.islocked()) {
            // results have just been submitted so don't send duplicates
            // this may happen if user clicks on a link away from the page
            // both the "onclick" and the "onunload" event call this function
            return true;
        }

        // make sure flag is set : 0=do everything, 1=set form values, -1=send form
        if (typeof(flag)=='undefined') {
            flag = 0;
        }

        // lock the form for 2 seconds
        if (flag<=0) {
            this.lock();
            setTimeout('if(window.HP)HP.unlock();', 2000);
        }

        // set form values if necessary
        if (flag>=0) {

            // set status : 0=undefined, 1=in progress, 2=timed out, 3=abandoned, 4=completed
            if (status) {
                this.status = status;
                if (status>1) {
                    // we set this flag here to tell the server that it is OK to redirect,
                    // but whether we actually get redirected or not is up to the server
                    this.redirect = 1;
                }
                var forceRecalculate = false;
            } else {
                // onunload has been triggered by user navigating away from this page
                // so we want to try to send results and let them continue
                var forceRecalculate = true;
                this.forceajax = true;
            }

            // get end time and round down duration to exact number of seconds
            this.endtime = new Date();
            var duration = this.endtime - this.starttime;
            this.endtime.setTime(this.starttime.getTime() + duration - (duration % 1000));

            // set score for each question
            var keys = object_keys(this.questions, 1); // 1 = properties only
            var q;
            while (q = keys.shift()) {
                this.setQuestionScore(q);
            }

            // set score and penalties
            this.setScoreAndPenalties(forceRecalculate);

            // create XML
            var XML = new hpXML();
            this.addFields(XML);

            // transfer results to form
            this.form.mark.value = this.score;
            this.form.detail.value = XML.getXML();
            this.form.status.value = this.status;
            this.form.redirect.value = this.redirect;
            this.form.starttime.value = this.getTimeString(this.starttime);
            this.form.endtime.value = this.getTimeString(this.endtime);
        } // end if flag>=0 (set values)

        // send form if necessary
        if (flag<=0) {
            // submit results to Moodle

             // cancel the check for navigating away from this page
            window.onbeforeunload = null;

            // based on http://www.captain.at/howto-ajax-form-post-request.php
            var useajax = false;
            if (typeof(window.HP_httpRequest)=='undefined') {
                window.HP_httpRequest = false;
                if (this.forceajax || this.redirect==0) {
                    if (window.XMLHttpRequest) { // Mozilla, Safari,...
                        HP_httpRequest = new XMLHttpRequest();
                    } else if (window.ActiveXObject) { // IE
                        try {
                            HP_httpRequest = new ActiveXObject("Msxml2.XMLHTTP");
                        } catch (e) {
                            try {
                                HP_httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
                            } catch (e) {
                                HP_httpRequest = false;
                            }
                        }
                    }
                }
                if (HP_httpRequest) {
                    useajax = true;
                }
            }

            if (useajax) {
                var parameters = '';
                var i_max = this.form.elements.length;
                for (var i=0; i<i_max; i++) {
                    var obj = this.form.elements[i];
                    if (! obj.name) {
                        continue;
                    }
                    var value = this.getFormElementValue(obj);
                    if (! value) {
                        continue;
                    }
                    parameters += (parameters=='' ? '' : '&') + obj.name + '=' + escape(value); // encodeURI
                }
                HP_httpRequest.onreadystatechange = HP_onreadystatechange;
                HP_httpRequest.open(this.form.method, this.form.action, true); // ! this.redirect
                HP_httpRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                HP_httpRequest.setRequestHeader("Content-length", parameters.length);
                HP_httpRequest.setRequestHeader("Connection", "close");
                HP_httpRequest.send(parameters);
            } else {
                this.form.submit();
            }

            if (this.status>1) {
                // quiz is finished, so ensure results do not get submitted again
                this.form = null;
            } else if (window.quizportbeforeunload) {
                // quiz is not finished yet, so restore onbeforeunload
               window.onbeforeunload = window.quizportbeforeunload;
            }
       }

    } // end function onunload

    /**
     * getFormElementValue
     *
     * @param xxx obj
     * @return xxx
     */
    this.getFormElementValue = function (obj) {
        var v = ''; // value
        var t = obj.type;
		if (t=='text' || t=='textarea' || t=='password' || t=='hidden') {
			v = obj.value;
        } else if (t=='radio' || t=='checkbox') {
			if (obj.checked) {
                v = obj.value;
            }
        } else if (t=='select-one' || t=='select-multiple') {
			var i_max = obj.options.length;
			for (var i=0; i<i_max; i++) {
				if (obj.options[i].selected) {
					v += (v=='' ? '' : ',') + obj.options[i].value;
				}
			}
        } else if (t=='button' || t=='reset' || t=='submit') {
            // do nothing
        } else {
            // radio or checkbox groups
            var i_max = obj.length || 0;
            for (var i=0; i<i_max; i++) {
                if (obj[i].checked) {
                    v += (v=='' ? '' : ',') + obj[i].value;
                }
            }
        }
        return v;
    }

    /**
     * getTimeString
     *
     * @param xxx date
     * @return xxx
     */
    this.getTimeString = function (date) {
        if (date==null) {
            // get default Date object
            date = new Date();
        }
        // get year, month and day (yyyy-mm-dd)
        var s = date.getFullYear() + '-' + pad(date.getMonth()+1, 2) + '-' + pad(date.getDate(), 2);
        // get hours, minutes and seconds (hh:mm:ss)
        s += ' ' + pad(date.getHours(), 2) + ':' + pad(date.getMinutes(), 2) + ':' + pad(date.getSeconds(), 2);
        // get time difference (+xxxx)
        var x = date.getTimezoneOffset(); // e.g. -540
        if (typeof(x)=='number') {
            s += ' ' + (x<0 ? '+' : '-');
            x = Math.abs(x);
            s += pad(parseInt(x/60), 2) + pad(x - (parseInt(x/60)*60), 2);
        }
        return s;
    }

    /**
     * findForm
     *
     * @param xxx id
     * @param xxx w
     * @return xxx
     */
    this.findForm = function (id, w) {
        var f = w.document.forms[id];
        if (! f) {
            var i_max = (w.frames ? w.frames.length : 0);
            for (var i=0; i<i_max; i++) {
                f = this.findForm(id, w.frames[i]);
                if (f) break;
            }
        }
        return f;
    }
}

/**
 * HP_onreadystatechange
 *
 * @return xxx
 */
function HP_onreadystatechange() {
    // http://www.webdeveloper.com/forum/showthread.php?t=108334
    if (! window.HP_httpRequest) {
        return false;
    }
    if (HP_httpRequest.readyState==4) {
        switch (HP_httpRequest.status) {
            case 200:
                // we do not expect to get any real content on this channel
                // it is probably an error message from the server, so display it
                document.write(HP_httpRequest.responseText);
                document.close();
                break;
            case 204:
                // the server has fulfilled the request
                // we can unset the HP_httpRequest object
                window.HP_httpRequest = null;
                break;
            default:
                // alert('Unexpected httpRequest.status: '+HP_httpRequest.status);
        }
    }
}

/**
 * hpQuestion
 */
function hpQuestion() {
    this.name      = '';
    this.type      = '';
    this.text      = '';

    this.score     = 0;
    this.weighting = 0;
    this.hints     = 0;
    this.clues     = 0;
    this.checks    = 0;
    this.correct   = new Array();
    this.wrong     = new Array();
    this.ignored   = new Array();

    /**
     * addFields
     *
     * @param xxx xml
     * @param xxx prefix
     */
    this.addFields = function (xml, prefix) {
        // add fields for this question
        for (var fieldname in this) {
            switch (fieldname) {
                case 'name':
                case 'type':
                case 'text':
                case 'score':
                case 'weighting':
                case 'hints':
                case 'clues':
                case 'checks':
                case 'correct':
                case 'wrong':
                case 'ignored':
                    xml.addField(prefix+fieldname, this[fieldname]);
                    break;
            }
        }
    }
}

/**
 * hpXML
 *
 * @return xxx
 */
function hpXML() {
    this.xml = '';
    this.fields = new Array();

    /**
     * addField
     *
     * @param xxx name
     * @param xxx value
     */
    this.addField = function (name, value) {
        this.fields[this.fields.length] = new hpField(name, value);
    }

    /**
     * getXML
     *
     * @return xxx
     */
    this.getXML = function () {
        this.xml = '<'+'?xml version="1.0"?'+'>\n';
        this.xml += '<hpjsresult><fields>\n';
        for (var i=0; i<this.fields.length; i++) {
            this.xml += this.fields[i].getXML();
        }
        this.xml += '</fields></hpjsresult>\n';
        return this.xml;
    }
}

/**
 * hpField
 *
 * @param xxx name
 * @param xxx value
 * @return xxx
 */
function hpField(name, value) {
    this.name = name;
    this.value = value;
    this.data = ''; // xml field data (i.e. "value" encoded for XML)

    /**
     * getXML
     *
     * @return xxx
     */
    this.getXML = function () {
        this.data = '';
        switch (typeof(this.value)) {
            case 'string':
                this.data += this.encode_entities(this.value);
                break;

            case 'object': // array
                var i_max = this.value.length;
                for (var i=0; i<i_max; i++) {
                    var v = trim(this.value[i]);
                    if (v.length) {
                        this.data += (i==0 ? '' : ',') +  this.encode_entities(v);
                    }
                }
                break;

            case 'number':
                this.data = ('' + this.value);
                break;
        }
        if (this.data.length==0) {
            return '';
        } else {
            if (this.data.indexOf('<')>=0 && this.data.indexOf('>')>=0) {
                this.data = '<' + '![CDATA[' + this.data + ']]' + '>';
            }
            return '<field><fieldname>' + this.name + '</fieldname><fielddata>' + this.data + '</fielddata></field>\n';
        }
    }

    /**
     * encode_entities
     *
     * @param xxx s_in
     * @return xxx
     */
    this.encode_entities = function (s_in) {
        var i_max = (s_in) ? s_in.length : 0;
        var s_out = '';
        for (var i=0; i<i_max; i++) {
            var c = s_in.charCodeAt(i);
            // 34 : double quote .......["] &quot;
            // 38 : ampersand ..........[&] &amp;
            // 39 : single quote .......['] &apos;
            // 43 : plus sign ..........[+]
            // 44 : comma ..............[,]
            // 60 : left angle bracket .[<] &lt;
            // 62 : right angle bracket [>] &gt;
            // >=128 multibyte character
            if (c==38 || c==43 || c==44 || c>=128) {
                // encode ampersand, plus sign, comma and multibyte chars
                s_out += '&#x' + pad(c.toString(16), 4) + ';';
            } else {
                s_out += s_in.charAt(i);
            }
        }
        return s_out;
    }
}

/**
 * GetTextFromNodeN
 *
 * @param xxx obj
 * @param xxx className
 * @param xxx n
 * @return xxx
 */
function GetTextFromNodeN(obj, className, n) {
    // returns the text under the nth node of obj with the target class name
    var txt = '';
    if (obj && className) {
        if (typeof(n)=='undefined') {
            n = 0;
        }
        var nodes = GetNodesByClassName(obj, className);
        if (n<nodes.length) {
            txt += GetTextFromNode(nodes[n]);
        }
    }
    return txt;
}

/**
 * GetNodesByClassName
 *
 * @param xxx obj
 * @param xxx className
 * @return xxx
 */
function GetNodesByClassName(obj, className) {
    // returns an array of nodes with the target classname
    var nodes = new Array();
    if (obj) {
        if (className && obj.className==className) {
            nodes.push(obj);
        } else if (obj.childNodes) {
            for (var i=0; i<obj.childNodes.length; i++) {
                nodes = nodes.concat(GetNodesByClassName(obj.childNodes[i], className));
            }
        }
    }
    return nodes;
}

/**
 * GetTextFromNode
 *
 * @param xxx obj
 * @return xxx
 */
function GetTextFromNode(obj) {
    // return text in (and under) a single DOM node
    var txt = '';
    if (obj) {
        if (obj.nodeType==3) {
            txt = obj.nodeValue + ' ';
        }
        if (obj.childNodes) {
            for (var i=0; i<obj.childNodes.length; i++) {
                txt += GetTextFromNode(obj.childNodes[i]);
            }
        }
    }
    return txt;
}
// object / array  manipulation utilities

/**
 * print_object
 *
 * @param xxx obj
 * @param xxx name
 * @param xxx tabs
 * @return xxx
 */
function print_object(obj, name, tabs) {
    var s = '';
    if (! tabs) {
        tabs = 0;
    }
    for (var i=0; i<tabs; i++) {
        s += '    '; // 1 tab  = 4 spaces
    }
    if (name != null) {
        s += name + ' ';
    }
    var t = typeof(obj);
    s += ' ' + t.toUpperCase() + ' : ';
    switch (t.toLowerCase()) {
        case 'boolean':
        case 'number':
        case 'string':
            s += obj + '\n';
            break;
        case 'object': // or array
            if (obj && obj.nodeType) {
                s += 'html node' + '\n';
            } else {
                s += '\n';
                var keys = object_keys(obj); // properties and methods
                var x;
                while (x = keys.shift()) {
                    s += print_object(obj[x], '['+x+']', tabs+1);
                }
            }
            break;
        case 'function':
            var f = obj.toString();
            s += f.substring(9, f.indexOf('{', 9)) + '\n';
            break;
        default:
            s += 'unrecognized object type:' + t + '\n';
    }
    return s;
}

/**
 * print_object_keys
 *
 * @param xxx obj
 * @param xxx flag
 * @return xxx
 */
function print_object_keys(obj, flag) {
    var s = '';
    var keys = object_keys(obj, flag);
    var x;
    while (x = keys.shift()) {
        s += ', ' + x;
    }
    return s.substring(2);
}

/**
 * object_keys
 *
 * @param xxx obj
 * @param xxx flag
 * @return xxx
 */
function object_keys(obj, flag) {
    // flag
    //     0 : return properties and methods (default)
    //     1 : return properties only (i.e. skip methods)
    //     2 : return methods only (i.e. skip properties)

    var keys = new Array();

    // check obj is indeed an object
    if (obj && typeof(obj)=='object') {

        if (typeof(flag)=='undefined') {
            // default flag value
            flag = 0;
        }

        // numeric keys
        if (obj.length) {
            var i_max = obj.length;
        } else {
            var i_max = 0;
        }
        for (var i=0; i<i_max; i++) {
            var t = typeof(obj[i]);
            if (t=='undefined') {
                // skip null values
                continue;
            }
            if (flag==1 && t=='function') {
                // skip methods
                continue;
            }
            if (flag==2 && t!='function') {
                // skip properties
                continue;
            }
            keys.push('' + i);
        }

        // non-numeric keys
        var numeric_key = new RegExp('^\\d+$');
        for (var x in obj) {
            var t = typeof(x);
            if (t=='number' || (t=='string' && x.match(numeric_key))) {
                // skip numeric keys (IE)
                continue;
            }
            var t = typeof(obj[x]);
            if (t=='undefined') {
                // skip null values
                continue;
            }
            if (flag==1 && t=='function') {
                // skip methods
                continue;
            }
            if (flag==2 && t!='function') {
                // skip properties
                continue;
            }
            keys.push('' + x);
        } // end for x in obj

    } // end if obj
    return keys;
}

/**
 * object_destroy
 *
 * @param xxx obj
 */
function object_destroy(obj) {
    // check this is an object (but is not a DOM node)
    if (obj && typeof(obj)=='object' && !obj.nodeType) {
        var keys = object_keys(obj); // properties and methods
        var x;
        while (x = keys.shift()) {
            if (typeof(obj[x])=='object') {
                object_destroy(obj[x]);
            }
        }
        obj = null;
    }
}
// string formatting utilities

/**
 * pad
 *
 * @param xxx i
 * @param xxx l
 * @return xxx
 */
function pad(i, l) {
    var s = (i + '');
    while (s.length<l) {
        s = '0' + s;
    }
    return s;
}

/**
 * trim
 *
 * @param xxx s
 * @return xxx
 */
function trim(s) {
    switch (typeof(s)) {
        case 'string':
            return s.replace(new RegExp('^\\s+|\\s+$', 'g'), '');
        case 'undefined':
            return '';
        default:
            return s;
    }
}
