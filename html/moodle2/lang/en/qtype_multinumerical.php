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
 * Strings for component 'qtype_multinumerical', language 'en', branch 'MOODLE_26_STABLE'
 *
 * @package   qtype_multinumerical
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['answer'] = 'Your answer: {$a}';
$string['badfeedbackperconditionsyntax'] = 'Each line must be of the form : &quot;Feedback if condition true | Feedback if condition false&quot;';
$string['badnumfeedbackperconditions'] = 'The number of per constraint feedbacks can not be higher than the number of constraints';
$string['binarygrade'] = 'Grade calculation';
$string['conditionnotverified'] = 'Unverified constraint';
$string['conditions'] = 'Constraints';
$string['conditionverified'] = 'Verified constraint';
$string['displaycalc'] = 'Display calculation result';
$string['feedbackperconditions'] = 'Per constraint feedback';
$string['gradebinary'] = 'All or nothing';
$string['gradefractional'] = 'Fractional';
$string['helponquestionoptions'] = 'For more information on this question type and the behaviour of the following options, please click the help button at the top of this form.';
$string['noncomputable'] = '(correct answers not computable automatically)';
$string['onlyforcalculations'] = 'Only for calculations';
$string['parameters'] = 'Parameters';
$string['pleaseenterananswer'] = 'Please enter an answer';
$string['pluginname'] = 'Multinumerical';
$string['pluginnameadding'] = 'Adding a Multinumerical question';
$string['pluginnameediting'] = 'Editing a Multinumerical question';
$string['pluginname_help'] = '<h2>How this works</h2>
<p>A multinumerical question allows to ask students for an answer made of several (numeric) parameters.</p>
<p><strong>Example:</strong> find <span style="font-family:monospace">X</span> and <span style="font-family:monospace">Y</span> such that </p>
<ul><li>X + Y &lt; 20</li><li>X * Y &gt; 35</li></ul>
<p>There are <em>possibly</em> several correct answers to this question, and any answer satisfying these conditions should be considered correct.</p>
<p>This question type allows then to define the parameters we\'re looking for (here, <span style="font-family:monospace">X</span> and <span style="font-family:monospace">Y</span>) and the given constraints.</p>
<h2>Usage</h2>
<ul>
	<li>Enter a list of comma-separated parameters (in our example &quot;<span style="font-family:monospace">X,Y</span>&quot;).<br />
	<strong>Note :</strong> units may be entered after each parameter:
	&quot;<span style="font-family:monospace">X [m],Y [h]</span>&quot; (a blank space has to exist between the parameter and its unit).</li>
	<li>Enter the constraints, one per line; in our example: <pre>X + Y &lt; 20
X * Y &gt; 35</pre>(empty lines will be ignored)
    <p>Available operators are : <ul>
        <li>&quot;<span style="font-family:monospace">=</span>&quot; (equality)</li>
        <li>&quot;<span style="font-family:monospace">&lt;</span>&quot; (less than)</li>
        <li>&quot;<span style="font-family:monospace">&lt;=</span>&quot; (less or equal)</li>
        <li>&quot;<span style="font-family:monospace">&gt;</span>&quot; (greater than)</li>
        <li>&quot;<span style="font-family:monospace">&gt;=</span>&quot; (greater or equal)</li>
        <li>intervals:
            <pre><span style="font-family:monospace">X = [1;5]</span></pre> (closed)
            <pre><span style="font-family:monospace">X = ]1;5[</span></pre> (open)
        </li>
    </ul></p></li>
	<li>Enter if desired a feedback for each constraint. In our example, one could enter:
    <pre>OK : X + Y &lt; 20 | No, X + Y &gt;= 20 !
OK : X * Y &gt; 35 | No, X + Y &lt;= 35 !</pre>
    </li>
    <li>If &quot;Display calculation result&quot; is checked, the feedback will display a numerical evaluation of each of the constraints.
    This is only displayed if the feedback for this constraint is not empty.<br />
    If &quot;Only for calculations&quot; is checked, this will not be displayed for non-calculated constraints (such as <span style="font-family:monospace">X&nbsp;>&nbsp;5</span>), in order to not give away the answer to the learner.</li>
    <li>The &quot;Grade calculation&quot; option defines whether a partially correct answer yields a fraction of the grade, or the null grade.</li>
</ul>';
$string['pluginname_link'] = 'question/type/multinumerical';
$string['pluginnamesummary'] = 'Allows to create a question whose correct answers may be many, governed by equations or inequations.';
$string['qtypeoptions'] = 'Multinumerical question type specific options';
$string['usecolorforfeedback'] = 'Use color for per constraint feedback';
