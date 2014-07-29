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
 * Strings for component 'cachestore_xcache', language 'en', branch 'MOODLE_25_STABLE'
 *
 * @package   cachestore_xcache
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['erroruniqueprefix'] = 'The prefix you have selected is not unique. Please choose a unique prefix.';
$string['maxttl'] = 'Maximum TTL (minutes)';
$string['maxttl_help'] = 'This sets a maximum TTL on all entries stored in the cache. This ensures that items within the cache do not get stale. Setting this to 0 will ensure a TTL is not set and items will stay in the cache until removed. Please note that when set to 0 we can be sure that data set to the cache is available however you run a greater risk of filling the cache and experiencing degraded performance.';
$string['pluginname'] = 'XCache shared memory cache';
$string['prefix'] = 'Prefix';
$string['prefix_help'] = 'The prefix to use for this instance. This allows multiple instances of the XCache store to exist harmoniously, it must be unique.';
