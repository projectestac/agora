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
 * Strings for component 'qformat_qtex', language 'en', branch 'MOODLE_26_STABLE'
 *
 * @package   qformat_qtex
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['allimagesmissing'] = 'The .tex file includes images. If you upload a zip archive containing the images and the .tex file, the images will be embedded automatically (supported formats: png).';
$string['badpercentage'] = 'In question "{$a->question}" : The optional parameter {$a->fraction} contains bad characters.';
$string['cannotopenzip'] = 'Can not open zip archive, error code: {$a}.';
$string['cannotreadimage'] = 'Can not read image from {$a}';
$string['changedpercentage'] = 'In question "{$a->question}" : The percentage {$a->original} is not allowed in Moodle and has been changed to {$a->new}.';
$string['configmissing'] = 'The configuration file config.php of the QuestionTeX format cannot be accessed.';
$string['embederror'] = 'Error while parsing embedded image';
$string['gradingmissing'] = 'The file grading.php containing the grading schemes cannot be accessed.';
$string['imagefolder'] = 'images/';
$string['imagemissing'] = 'Image "{$a}" can not be found in the zip archive.';
$string['instructions'] = '% QuestionTeX

% Instructions
% ============
%   - This LaTeX source may be compiled by either latex or pdflatex.
%   - Requires the questiontex package.
%     Alternatively, questiontex.sty may be placed in the same folder.
%     It can be downloaded from
%       www.lemuren.math.ethz.ch/coursesupport/multiplechoice
%     where you can also find a more detailed documentation.';
$string['latexcompilation'] = 'Error during LaTeX compilation:n{$a}';
$string['latexdistromissing'] = 'No LaTeX distribution found. Please set path to latex.exe in config.php.';
$string['macrosmissing'] = 'File with QuestionTeX macros is missing.';
$string['multipletex'] = 'Found multiple .tex files {$a} in zip archive. Do not know, which to translate.';
$string['noanswers'] = 'No answers found for question "{$a->question}".';
$string['norenderenginefound'] = 'No text filter for math detected. Assuming standard TeX notation filter.';
$string['notexfound'] = 'Found no .tex file in zip archive.';
$string['notreadable'] = 'The filepath {$a} could not be read and can thus not be included in export.';
$string['pluginname'] = 'QuestionTeX format';
$string['pluginname_help'] = 'QuestionTeX is a collection of LaTeX-macros that enables authors to create multiple-choice tests.';
$string['pluginname_link'] = 'qformat/qtex';
$string['questionsincludeimages'] = 'The selected questions include images. A zip archive is being created, containing the images as well as the .tex file.';
$string['renderenginefound'] = 'Detected "{$a}" filter for displaying formulae.';
$string['tempdir'] = 'Problem with creation/deletion of temporary directory.';
$string['unknownenvironment'] = 'Unknown LaTeX environment {$a}.';
$string['unknownexportformat'] = 'The export of format {$a} is not supported.';
$string['unknownfiletype'] = 'Unknown file extension: {$a}.';
$string['unknowngradingscheme'] = 'The specified grading scheme cannot be found.';
$string['unsupportedimagetype'] = 'The image type of {$a} may not be supported for display in Moodle.';
$string['wrongidentifier'] = 'The identifier {$a} is unknown.';
