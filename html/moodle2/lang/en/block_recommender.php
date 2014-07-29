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
 * Strings for component 'block_recommender', language 'en', branch 'MOODLE_25_STABLE'
 *
 * @package   block_recommender
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activity_filter_activities'] = 'All module activities';
$string['activity_filter_activity'] = 'Type of item';
$string['activity_filter_activity_help'] = '<p>You can filter the results in the table below by controlling the resource and/or activity included.</p> <p>By default all activities and resources will be included within the results table.</p> <p>If you wish to only view resources that have been viewed (these would be files and resource pages) or only activities (these would be for example a forum, wiki, glossary or blog) you can use the drop down list to choose from the following three options:</p> <ol><li>All</li><li>All module resources</li><li>All module activities</li></ol><p>Please note that if your website does not include either of the above types of resource or activity the filter option will not be available.</p> <p>If you navigate away from the page your filter options will return to the default options.</p>';
$string['activity_filter_all'] = 'All';
$string['activity_filter_apply'] = 'Apply';
$string['activity_filter_daterange'] = 'Date range';
$string['activity_filter_daterange_help'] = '<p>You can filter the results in the table below by controlling the date range over which the activity and/or resource is included.</p> <p>By default the date range is either since the user last visited the website, or since last month; whichever is the most recent date. Therefore, if you visit the website regularly you will see activity based on your last visit; if you do not visit regularly the default will be based on the activity over the last month.</p><p> Use the drop down list to choose from the following four options:</p><ol><li>Since you last visited this website</li><li>Since last month</li><li>Since last week</li><li>Since yesterday</li></ol> <p> Once you have selected the option you require the results will be updated, showing only those results that fall within the date range you have chosen.</p><p> If you navigate away from the page your filter options will return to the default options.</p>';
$string['activity_filter_resources'] = 'All module resources';
$string['activity_filter_sort'] = 'Sort by';
$string['activity_filter_sort_az'] = 'A to Z';
$string['activity_filter_sort_help'] = '<p>You can sort the results in the table below.</p>
<p>By default the results are ordered with the most popular activities and resources at the top. These would be the results with the highest number within the ‘Views’ column.</p>
<p>You can also select the least viewed results, or the most or least contributions (participations), or to reorder the items alphabetically.</p>
<p>If you navigate away from the page your filter options will return to the default options.</p>';
$string['activity_filter_sort_leastp'] = 'Least contributions';
$string['activity_filter_sort_leastviewed'] = 'Least viewed';
$string['activity_filter_sort_mostp'] = 'Most contributions';
$string['activity_filter_sort_mostviewed'] = 'Most viewed';
$string['activity_filter_sort_za'] = 'Z to A';
$string['activity_items'] = 'Items';
$string['activity_lastmonth'] = 'Since last month';
$string['activity_lastvisit'] = 'Since you last visited this website';
$string['activity_lastweek'] = 'Since last week';
$string['activity_moduleincluded'] = '{$a->modname} included';
$string['activity_more'] = 'More popular items';
$string['activity_participateactions'] = 'Participate actions';
$string['activity_participations'] = 'Participations';
$string['activity_popularactivitiestitle'] = 'Popular activities';
$string['activity_servicetitle'] = 'Popular activities and resources';
$string['activity_sort'] = 'Results';
$string['activity_viewactions'] = 'View actions';
$string['activity_views'] = 'Views';
$string['activity_yesterday'] = 'Since yesterday';
$string['add'] = 'Add';
$string['bookmark_addbookmark'] = 'Add Bookmark';
$string['bookmark_bookmarktitle'] = 'Bookmarks';
$string['bookmark_category'] = 'Category';
$string['bookmark_categoryn_description'] = 'The title to use for category {$a}';
$string['bookmark_categoryn_title'] = 'Category {$a}';
$string['bookmark_categorytitlen'] = 'Category {$a}';
$string['bookmark_confirmdeletionfull'] = 'Are you sure that you wish to remove the link \'{$a->title}\' ({$a->url})?';
$string['bookmark_create'] = 'create';
$string['bookmark_create_alt'] = 'Create a new shared bookmark';
$string['bookmark_createbookmark_text'] = 'You may also {$a} a new bookmark';
$string['bookmark_defaultcategory'] = 'Default Category';
$string['bookmark_delete'] = 'Delete bookmark';
$string['bookmark_deletetitle'] = 'Delete Bookmark';
$string['bookmark_displaytype_categoryn'] = 'The top links from category {$a}';
$string['bookmark_displaytype_defaultcategory'] = 'The top links from the default category';
$string['bookmark_displaytype_description'] = 'Which links should be shown in the block';
$string['bookmark_displaytype_title'] = 'Display';
$string['bookmark_displaytype_top'] = 'The top link from each category';
$string['bookmark_edit'] = 'Edit bookmark';
$string['bookmark_editbookmark'] = 'Edit Bookmark';
$string['bookmark_errormoving'] = 'Error moving bookmark item.';
$string['bookmark_more'] = 'More bookmarks';
$string['bookmark_more_title'] = 'Bookmark Details';
$string['bookmark_move'] = 'Move bookmark';
$string['bookmark_movehere'] = 'Move bookmark here';
$string['bookmark_servicetitle'] = 'Shared bookmarks';
$string['bookmark_title'] = 'Title';
$string['bookmark_titleinuse'] = 'This title is already used with the URL \'{$a->url}\' within this course';
$string['bookmark_url'] = 'URL';
$string['bookmark_urlinuse'] = 'This url is already used for the bookmark \'{$a->title}\' within this course';
$string['bookmark_urlinvalid'] = 'This url is invalid';
$string['course_course_shortname_pattern_description'] = 'This regular expression is applied to the course shortname';
$string['course_course_shortname_pattern_title'] = 'Shortname Regular Expression';
$string['course_course_url_description'] = 'The URL to use if a match is found in the course shortname. Any matches found in the pattern can be used within the URL using the $1 notation.';
$string['course_course_url_title'] = 'Link URL';
$string['course_role'] = 'Popular Courses Role';
$string['course_roledescription'] = 'Which role should be used to assess if a course is popular';
$string['course_servicetitle'] = 'Popular websites';
$string['enabledservices'] = 'Enabled services';
$string['errorcallingservice'] = 'Error calling service \'{$a}\'.';
$string['erroremptyfield'] = 'Field \'{$a}\' is empty.';
$string['errormissingfield'] = 'Field \'{$a}\' is missing.';
$string['errornosuchservice'] = 'Service \'{$a}\' does not exist.';
$string['notifynoenabledservices'] = 'At least one service should be enabled in the {$a} to make this block useful.';
$string['pluginname'] = 'Recommender';
$string['recommender:addbookmark'] = 'Add item to Bookmarks service';
$string['recommender:addinstance'] = 'Add a new recommender block';
$string['recommender:myaddinstance'] = 'Recommended My screen capability';
$string['recommendertitle'] = 'Recommender';
$string['recommendertitle_help'] = '<p>This block allows you to look at the most recent activity by
other users of this website. You can view the most popular resources and activities that have been
viewed and, if appropriate, participated in within the website.</p>
<p>If you click on the ‘Popular activities and resources’ link below you will see the top three
results (you can click on these titles to take you directly to the resource or activity listed) and
a ‘more’ link where you can access a page where all the results for this website will be listed.</p>
<p>You will be able to filter the results by date range, item type, and by the
number of views and participations.</p>';
$string['recommender:viewactivity'] = 'View Popular Activities service';
$string['recommender:viewbookmark'] = 'View Bookmarks service';
$string['recommender:viewcourse'] = 'View Popular Courses service';
$string['servicedisabled'] = 'The \'{$a->servicename}\' service is currently disabled';
$string['sortby'] = '.  Sort by';
