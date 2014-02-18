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
 * Strings for component 'qtype_varnumericset', language 'en', branch 'MOODLE_24_STABLE'
 *
 * @package   qtype_varnumericset
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addmoreanswerblanks'] = 'Blanks for {no} more answers';
$string['addmorevariants'] = 'Add {$a} more blanks for more variants';
$string['addmorevars'] = 'Add {no} more blanks for variables';
$string['ae_numericallycorrect'] = 'Your answer is almost correct. You have the correct value and it is rounded correctly.';
$string['ae_numericallycorrectandwrongformat'] = 'Your answer is almost correct. You have the correct value and it is rounded correctly but it is not in scientific notation.';
$string['ae_roundingincorrect'] = 'Your answer is almost correct, but it is rounded incorrectly.';
$string['ae_roundingincorrectandwrongformat'] = 'Your answer is almost correct, but it is rounded incorrectly and it is not in scientific notation.';
$string['ae_toomanysigfigs'] = 'Your answer is almost correct, but it is given to too many significant figures.';
$string['ae_toomanysigfigsandwrongformat'] = 'Your answer is almost correct, but it is given to too many significant figures and it is not in scientific notation.';
$string['ae_wrongbyfactorof10'] = 'Your answer is almost correct, but you have the factor of 10 wrong.';
$string['ae_wrongbyfactorof10andwrongformat'] = 'Your answer is almost correct, but you have the factor of 10 wrong and it is not in scientific notation.';
$string['answer'] = 'Answer: {$a}';
$string['answermustbegiven'] = 'You must enter an answer if there is a grade or feedback.';
$string['answerno'] = 'Answer {$a}';
$string['autofirehdr'] = 'Give feedback and partial credit where answer {$a} is partially wrong';
$string['calculatewhen'] = 'When to calculate calculated values';
$string['cannotrecalculate'] = 'Cannot recalculate values for calculated variables as there are errors in the form, sorry. Please fix the errors then you can recalculate the values.';
$string['checknumerical'] = 'If numerically correct';
$string['checkpowerof10'] = 'If power of 10 is off';
$string['checkrounding'] = 'If rounding is incorrect';
$string['checkscinotation'] = 'If scientific notation required but not used';
$string['correctansweris'] = 'The correct answer is: {$a}';
$string['correctansweriserror'] = '{$a->answer} <sup>+</sup>/<sub>-</sub> {$a->error}';
$string['correctanswerissigfigs'] = '{$a->answer} ({$a->sigfigs} significant figures)';
$string['correctanswers'] = 'Correct answers';
$string['error'] = 'Accepted error +/-';
$string['errorreportedbyexpressionevaluator'] = 'Expression evaluation error: {$a}';
$string['expectingassignment'] = 'You must use a mathematical expression to assign a value to a \'Calculated variable\'.';
$string['expectingvariablename'] = 'Expecting a variable name here';
$string['expressionevaluatesasinfinite'] = 'Result is infinite.';
$string['expressionevaluatesasnan'] = 'Result is not a number.';
$string['expressionmustevaluatetoanumber'] = 'You should enter an expression that evaluates to a number here, not an assignment';
$string['filloutoneanswer'] = 'You must provide at least one possible answer. Answers left blank will not be used. \'*\' can be used as a wildcard to match any number. The first matching answer will be used to determine the score and feedback.';
$string['forallanswers'] = 'For all answers';
$string['hintoverride'] = 'If auto-check fires allow another try but do not show this hint or apply this penalty';
$string['illegalthousandseparator'] = 'You have used an illegal thousands separator "{$a->thousandssep}" in your answer. We only accept answers with a decimal separator "{$a->decimalsep}".';
$string['notenoughanswers'] = 'This type of question requires at least {$a} answers';
$string['notolerancehere'] = 'You cannot enter a tolerance for this match anything answer';
$string['notvalidnumber'] = 'You have not entered a number in a recognised format.';
$string['notvalidnumberprepostfound'] = 'Please enter a valid number and nothing else.';
$string['options'] = 'Options';
$string['pleaseenterananswer'] = 'Please enter an answer.';
$string['pluginname'] = 'Variable numeric set';
$string['pluginnameadding'] = 'Adding a Variable numeric set question';
$string['pluginnameediting'] = 'Editing a Variable numeric set question';
$string['pluginname_help'] = 'In response to a question the respondent types a number.

Numbers used in the question and used to calculate the answer are chosen from predefined sets which can be precalculated from mathematical expressions.

All expressions are calculated at the time of question creation and values from random functions are the same for all users. For a question without variants, with expressions calculated on the fly and with random values different for each user see the \'variable numeric\' question type.';
$string['pluginname_link'] = 'question/type/varnumericset';
$string['pluginnamesummary'] = 'Allows a numeric response, question can have several \'variants\', expressions are pre evaluated for each question variant';
$string['preandpostfixesignored'] = 'Only the numerical part of your answer was graded.';
$string['questiontext'] = 'Question text and embedded variables';
$string['questiontext_help'] = 'You can embed variable names and expressions in question text, general feedback, answer feedback and hints

Anything enclosed in double square brackets will be evaluated before being displayed. E.g. if you enter, for example, [[a]] then the value of the variable a will be displayed. [[log(a)]] will display the log of a.

You can also specify how to display the result using printf codes. For example [[a,.3e]] will display the value of a in scientific notation with 4 significant figures.';
$string['randomseed'] = 'String to act as a seed for randomisation';
$string['recalculatenow'] = 'Recalculate now';
$string['requirescinotation'] = 'Require scientific notation';
$string['sigfigs'] = 'Significant figures';
$string['syserrorpenalty'] = 'For each error deduct';
$string['unspecified'] = 'Unspecified';
$string['usesuperscript'] = 'Use superscript entry';
$string['varheader'] = 'Variable {no}';
$string['variant'] = 'Value for variant {$a}';
$string['variants'] = 'Value for variants';
$string['variants_help'] = 'Enter values for \'Predefined variables\' here OR if this is a \'Calculated variable\' you will see calculated values displayed here.

For a predefined variable you must enter a value for at least one question variant and for all predefined variables you must fill in an equal number of boxes.

Moodle automatically determines how many variants a question has by seeing how many variant values for predefined variables have been filled in, or if there are no predefined variables only calculated ones then we assume 5 question variants. You do not have to fill in the last blanks, they are there for you to add more values for variants to the question, if required.';
$string['varname'] = 'Name or assignment';
$string['varname_help'] = 'For a \'Predefined variable\' you enter only a variable name here e.g. \'a\'. Then enter the values for this variable for each question variant below.

Or for a \'Calculated variable\' enter a variable name and assign it a value from an expression e.g. \'b = a^4\' (where \'a\' is a previously defined variable).

If you leave this field blank then any values below will just be ignored.';
$string['varnumericset'] = 'Variable numeric set';
$string['varnumericset_help'] = 'In response to a question the respondent types a number.

Numbers used in the question and used to calculate the answer are chosen from predefined sets which can be precalculated from mathematical expressions.

All expressions are calculated at the time of question creation and values from random functions are the same for all users. For a question without variants, with expressions calculated on the fly and with random values different for each user see the \'variable numeric\' question type.';
$string['varnumericset_link'] = 'question/type/varnumericset';
$string['varnumericsetsummary'] = 'Allows a numeric response, question can have several \'variants\', expressions are pre evaluated for each question variant';
$string['vartypecalculated'] = 'Calculated variable';
$string['vartypepredefined'] = 'Predefined variable';
$string['youmustprovideavalueforallvariants'] = 'Please fill out an equal number of blanks for all predefined variables, ie. a value for each predefined variable for all question variants you require.';
$string['youmustprovideavalueforatleastonevariant'] = 'You must provide a value here.';
