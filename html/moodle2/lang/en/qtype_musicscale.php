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
 * Strings for component 'qtype_musicscale', language 'en', branch 'MOODLE_24_STABLE'
 *
 * @package   qtype_musicscale
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['A'] = 'A';
$string['addingscale'] = 'Adding Musical Scale';
$string['alto'] = 'Alto';
$string['answer'] = 'answer';
$string['answer_cap'] = 'Answer';
$string['answer_help'] = '<p>Enter the notes of the scale in this format:</p><p>[Letter name (C,D,E,F,G,B)] [Accidental (# or b)] [register, using the <a href="http://en.wikipedia.org/wiki/Scientific_pitch_notation" target="_blank">scientific pitch notation</a>]</p><p>Insert commas between the notes, without spaces. Include the tonic note both at the beginning and at the end of the scale.</p><p>Examples:</p><ul><li>The solution for the E major scale where the tonic is E4 should be entered as: <br><strong>E4,F#4,G#4,A4,B4,C#5,D#5,E5</strong></li><li>The solution for the F# melodic minor scale where the tonic is F#3 should be entered as: <br><strong>F#3,G#3,A3,B3,C#4,D#4,E#4,F#4,E4,D4,C#4,B3,A3,G#3,F#3</strong></li></ul><p>You can click "Blanks for 3 More Choices" to add other answers that yield a partial grade. At least one of the answers must be assigned a full grade of 100%.</p>';
$string['answerno'] = 'Answer {$a}';
$string['b'] = 'Flat';
$string['B'] = 'B';
$string['bass'] = 'Bass';
$string['C'] = 'C';
$string['D'] = 'D';
$string['default'] = 'Default';
$string['E'] = 'E';
$string['editingscale'] = 'Editing Musical Scale';
$string['F'] = 'F';
$string['feedback'] = 'Feedback';
$string['feedbackcorrectanswer'] = 'Your answer is correct.';
$string['feedbackwronganswer'] = 'The correct answer is:';
$string['forceclef'] = 'Force Clef';
$string['forceclef_help'] = 'This will override the default generated Clef.';
$string['G'] = 'G';
$string['includeks'] = 'Include key signature';
$string['includeks_help'] = 'Specifies whether the key signature is provided. If the key signature isn\'t provided, the respondent must enter accidentals for each altered note.';
$string['instructions'] = '<h5>Instructions</h5><p>Move your mouse over the stave to generate a note.</p><p>When you have reached the location to place it, left click with your mouse to lock it.</p><p>If you need to move the note, left click on it, and move it to the new location, then left click to lock it back in.</p><p>To add accidentals to the note, Right click on it and a context menu will appear.';
$string['modescale'] = 'Scale type';
$string['modescale_harmonic_minor'] = 'Harmonic minor';
$string['modescale_help'] = 'Specifies the type of scale to be entered.';
$string['modescale_major'] = 'Major';
$string['modescale_melodic_minor'] = 'Melodic minor';
$string['modescale_natural_minor'] = 'Natural minor';
$string['no'] = 'No';
$string['nonexistentkey'] = 'This tonic doesn\'t have a key signature for the mode of the scale you selected - please select another tonic or another type of scale.';
$string['noteletterout'] = 'You have added a note letter that is out of range.';
$string['orignoteaccidental'] = 'Tonic accidental';
$string['orignoteaccidental_help'] = 'Specifies an accidental applying to the tonic - if no accidental applies, natural should be selected.';
$string['orignoteletter'] = 'Tonic letter';
$string['orignoteletter_help'] = 'Specifies the letter name of the tonic.';
$string['orignoteregister'] = 'Tonic register';
$string['orignoteregister_help'] = 'Specifies the register where the tonic lies, using the <a href="http://en.wikipedia.org/wiki/Scientific_pitch_notation" target="_blank">scientific pitch notation</a>.';
$string['outofrange'] = 'The clef and note(s) that have been selected are out of range.';
$string['pluginname'] = 'Music Scale';
$string['pluginnameadding'] = 'Adding a music scale question';
$string['pluginnameediting'] = 'Editing a music scale question';
$string['pluginname_help'] = 'Flash for Defining Scales';
$string['pluginname_link'] = 'question/type/musicscale';
$string['pluginnamesummary'] = 'Flash Component that allows user to define a scale';
$string['registerout'] = 'You have added a register that is out of range.';
$string['scale'] = 'Musical Scale';
$string['scale_help'] = 'The respondent is given a tonic, mode, clef and scale type, and is asked to enter the corresponding scale on the staff.';
$string['tenor'] = 'Tenor';
$string['tonic_too_high_for_register'] = 'This register is too high for the given tonic - the input component wouldn\'t support it. Please select a lower register.';
$string['treble'] = 'Treble';
$string['yes'] = 'Yes';
