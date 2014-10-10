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
 * Strings for component 'qtype_algebra', language 'en', branch 'MOODLE_26_STABLE'
 *
 * @package   qtype_algebra
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addmoreanswerblanks'] = 'Blanks for {no} More Answers';
$string['addmorevariableblanks'] = 'Blanks for {no} More Variables';
$string['algebraoptions'] = 'Options';
$string['allfunctions'] = 'All Functions';
$string['allowedfuncs'] = 'Allowed Functions';
$string['allowedfuncs_help'] = '**NOT YET IMPLEMENTED**

These controls can be used to restrict the functions which the students
can use in their responses. If the "All" button is checked then
there are no restrictions on functions which the students may use in
their answers. This is the default case. To restrict the allowed functions
uncheck the "All" box and select the functions you wish to allow.';
$string['allowedfunctions'] = 'Allowed Functions';
$string['answer'] = 'Answer: {$a}';
$string['answerboxprefix'] = 'String with which to prefix the answer box when displaying the question';
$string['answermustbegiven'] = 'You must enter an answer if there is a grade or feedback.';
$string['answerno'] = 'Answer {$a}';
$string['answerprefix'] = 'Answer box prefix';
$string['answerprefix_help'] = 'The text entered here will be placed in front of the input box where
students enter their answers. For example if a question is asking the form
of a function, f(x), then the string "f(x) = " could be entered in this
field.';
$string['badclosebracket'] = 'Invalid close bracket found';
$string['badequivtype'] = 'Invalid type: can only compare parser terms with other parser terms';
$string['badfuncargs'] = 'Invalid arguments for the function \'{$a}';
$string['brackets'] = '[...]';
$string['checktolerance'] = 'Check Tolerance';
$string['compalgorithm'] = 'Comparison Algorithm';
$string['compareby'] = 'Comparison Algorithm';
$string['compareby_help'] = 'This selects the method by which the students\' responses are compared
to all the questions answers. The different possibilities are:

SAGE: uses the Open Source <a href="http://www.sagemath.org/">SAGE</a>
mathematics software to perform a full symbolic algebraic comparison.

Evaluation: This method generates random numbers for
the question variables and then evaluates both the student response and the
question\'s answer for that set of values.

Equivalence:
This is the simplest of all the methods. It will only perform the most basic of
comparisons between expressions.';
$string['compareequiv'] = 'Equivalence';
$string['compareeval'] = 'Evaluation';
$string['comparesage'] = 'SAGE';
$string['correctansweris'] = 'The correct answer is: {$a} giving';
$string['correctanswers'] = 'Correct answers';
$string['decimal'] = '.';
$string['defaultmethod'] = 'Default comparison method';
$string['disallow'] = 'Disallowed Answer';
$string['disallowans'] = 'Disallowed Answer';
$string['disallowanswer'] = 'Disallowed Answer';
$string['disallow_help'] = 'contains an expression which will be disallowed as an answer.
Students entering an answers which matches this will be prevented from
receiving any grade for the question even if the response would match
a given answer for the question.';
$string['displayresponse'] = 'Display response';
$string['dollars'] = '$$...$$';
$string['duplicatevar'] = 'Duplicated variable name: \'{$a}\' is already defined.';
$string['editingalgebra'] = 'Editing an Algebra question';
$string['evalchecks'] = 'Evaluation Checks';
$string['filloutoneanswer'] = 'You must provide at least one possible answer. Answers left blank will not be used. \'*\' can be used as a wildcard to match any characters. The first matching answer will be used to determine the score and feedback. Only variables defined above are allowed';
$string['filloutonevariable'] = 'You must provide at least one variable.';
$string['host'] = 'Host url of SAGE server';
$string['illegalplusminus'] = 'Found a + or - in an invalid location';
$string['illegalvarname'] = 'Illegal variable name \'{$a}\': same name as a parser function or special constant.';
$string['mismatchedbracket'] = 'Mismatched brackets: Open and close bracket pair not of same type \'{$a}';
$string['mismatchedcloseb'] = 'Mismatched brackets: Close bracket without an open bracket found';
$string['mismatchedopenb'] = 'Mismatched brackets: Open bracket without a close bracket found';
$string['missingonearg'] = 'Syntax Error: Operator \'{$a}\' missing its argument';
$string['missingtwoargs'] = 'Syntax Error: Operator \'{$a}\' requires two arguments';
$string['morethantwoargs'] = 'Trying to compare a term with more than 2 arguments - no code to handle this case!';
$string['multiply'] = 'times';
$string['nargswrong'] = 'Incorrect number of arguments for the term \'{$a}';
$string['nchecks'] = 'Number of Evaluation Checks';
$string['nchecks_help'] = 'Number of Evaluation Checks used in Evaluation Comparison Algorithm';
$string['noevaluate'] = 'The evaluate method for term \'{$a}\' has not been implemented';
$string['notanumber'] = 'Invalid value: a number is required.';
$string['notenoughanswers'] = 'You must enter at least one answer.';
$string['notenoughvars'] = 'You must enter at least one variable.';
$string['notopterm'] = 'Syntax Error: Unable to condense to a single, top level operator';
$string['novarmax'] = 'No maximum bound specified for variable.';
$string['novarmin'] = 'No minimum bound specified for variable.';
$string['options'] = 'Options';
$string['parseerror'] = 'Error parsing function: \'{$a}';
$string['pluginname'] = 'algebra';
$string['pluginnameadding'] = 'Adding an algebra question';
$string['pluginnameediting'] = 'Editing an algebra question';
$string['pluginname_help'] = 'Student enter a formula as response that include one or more variables. Correctness is evaluted using one of 3 differents methods';
$string['pluginname_link'] = 'question/type/algebra';
$string['pluginnamesummary'] = 'Student enter a formula that can include one or more variables. Correctness is evaluted using one of 3 differents methods.';
$string['port'] = 'Port of SAGE server';
$string['restoreqdbfailed'] = 'Restoring algebra question failed: database write error';
$string['restorevardbfailed'] = 'Restoring algebra question variable failed: database write error';
$string['texdelimiters'] = 'Delimiters for TeX expressions';
$string['tolerance'] = 'Tolerance for Evaluation Checks';
$string['tolerance_help'] = 'Determines the maximum difference between numerical
evaluations of the student response and question answers which will be
allowed to count as matching.';
$string['toleranceltzero'] = 'Tolerance must be greater than or equal to zero';
$string['undeclaredvar'] = 'Undeclared variable \'{$a}\' found';
$string['undefinedfunction'] = 'Undefined function \'{$a}';
$string['undefinedvar'] = 'Undefined variable(s) {$a} used in one or more answers.';
$string['undefinedvariable'] = 'Undefined variable \'{$a}\' found when numerically evaluating an expression';
$string['unknownterm'] = 'Syntax Error: Unknown term found at \'{$a}\' in the expression';
$string['unusedvar'] = 'This variable is not used by any answer.';
$string['uri'] = 'uri of SAGE server';
$string['variable'] = 'Variable';
$string['variable_help'] = 'All variables names used in answers must be entered here. Minimum and maximum values are only needed if the Evaluation comparison algorithm is used.';
$string['variablename'] = 'Name';
$string['variableno'] = 'Variable {$a}';
$string['variables'] = 'Variables';
$string['variablex'] = 'Variable {no}';
$string['varmax'] = 'Maximum Value';
$string['varmin'] = 'Minimum Value';
$string['varmingtmax'] = 'The minimum value must be less than the maximum value.';
