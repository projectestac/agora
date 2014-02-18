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
 * Strings for component 'report_patches', language 'en', branch 'MOODLE_23_STABLE'
 *
 * @package   report_patches
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['config_patches_closepattern'] = 'Patch closing pattern';
$string['config_patches_openpattern'] = 'Patch opening pattern';
$string['config_patches_scanexcludes'] = 'Scanner exclusion patterns';
$string['desc_patches_closepattern'] = 'The pattern that detects the line of ending of the non standard alteration. It should address likely a full line comment. Sample : "// /PATCH"';
$string['desc_patches_openpattern'] = 'The pattern that marks the starting line of a non standard customisation. The pattern should address a full line typical comment marker that can be followed by a purpose description. Sample : "// PATCH"';
$string['desc_patches_scanexcludes'] = 'Enter a space separated list of patterns to apply to each file or dir entry to exclude it for scanning. GIF, JPG, PNG images and SWF, PDF files are excluded as standard filtering.';
$string['endline'] = 'End';
$string['location'] = 'File';
$string['nopatches'] = 'No patches found';
$string['orderbyfeature'] = 'Order by feature';
$string['orderbypath'] = 'Order by path';
$string['patches'] = 'Core Patchs';
$string['patchesreport'] = 'Patch report';
$string['patchessettings'] = 'Patch scanner settings';
$string['patchlist'] = 'Non standard patch list';
$string['pluginname'] = 'Core Patchs';
$string['purpose'] = 'Purpose';
$string['scan'] = 'Scan the codebase for patches';
$string['startline'] = 'Start';
