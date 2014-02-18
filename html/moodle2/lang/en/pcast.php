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
 * Strings for component 'pcast', language 'en', branch 'MOODLE_24_STABLE'
 *
 * @package   pcast
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addnewepisode'] = 'Add a new episode';
$string['allcategories'] = 'All categories';
$string['allentries'] = 'ALL';
$string['approvalview'] = 'Approve entries';
$string['areaepisode'] = 'Podcast episodes';
$string['arealogo'] = 'Podcast RSS logo';
$string['areasummary'] = 'Podcast episode summaries';
$string['areyousuredelete'] = 'Are you sure you want to delete this episode';
$string['ascending'] = 'Acsending';
$string['attachment'] = 'Attachment';
$string['author'] = 'Author';
$string['author_help'] = 'Author of this podcast';
$string['authorview'] = 'Browse by author';
$string['category'] = 'Category';
$string['category_help'] = 'iTunes category';
$string['categoryview'] = 'Browse by category';
$string['changeto'] = 'Change to {$a}';
$string['clean'] = 'Clean';
$string['commentsnotenabled'] = 'Error: Commenting is not enabled';
$string['configallowhtmlinsummary'] = 'This switch will allow allow the RSS description fields feeds to contain HTML.  When it is disabled, the HTML will silently be stripped out as part of the RSS feed generation.';
$string['configallowhtmlinsummary2'] = 'Allow HTML in RSS feeds';
$string['configenablerssfeeds'] = 'This switch will enable the possibility of RSS feeds for all podcasts.  You will still need to turn feeds on manually in the settings for each podcast.';
$string['configenablerssfeeds2'] = 'Enable RSS Feeds:';
$string['configenablerssitunes'] = 'This switch will enable the possibility of itunes compatible RSS feeds for all podcasts.  You will still need to set Enable iTunes RSS Tags to yes podcast course settings.';
$string['configenablerssitunes2'] = 'Enable iTunes RSS:';
$string['configusemediafilter'] = 'Use moodle media filters';
$string['configusemediafilter2'] = 'Use Media Filter:';
$string['createasc'] = 'Newest episode first';
$string['created'] = 'Created';
$string['createdesc'] = 'Oldest episode first';
$string['current'] = 'current sort {$a}';
$string['dateview'] = 'Browse by date';
$string['deleteallviews'] = 'Delete episode view history';
$string['deletenotenrolled'] = 'Delete episodes by users not enrolled';
$string['descending'] = 'Descending';
$string['displayauthor'] = 'Display author names';
$string['displayauthor_help'] = 'Display the name of the author for each episode to users';
$string['displayviews'] = 'Display names of viewers';
$string['displayviews_help'] = 'Display the names and number of views for each episode to users';
$string['duration'] = 'Duration';
$string['durationlength'] = '{$a->hour} hours {$a->min} minutes {$a->sec} seconds';
$string['durationlength2'] = '{$a->min} minutes {$a->sec} seconds';
$string['enablerssfeed'] = 'Enable RSS';
$string['enablerssfeed_help'] = 'Enable RSS for this podcast';
$string['enablerssitunes'] = 'Enable RSS for iTunes';
$string['enablerssitunes_help'] = 'This enables iTunes specific tags in the RSS file';
$string['episodecommentandrateview'] = 'Comment / Rate';
$string['episodecommentview'] = 'Comment';
$string['episodedeleted'] = 'episode {$a} was sucessfully deleted';
$string['episoderateview'] = 'Rate';
$string['episodeswithoutcategory'] = 'Episodes without a category';
$string['episodetitle'] = 'Episode';
$string['episodeview'] = 'Episode';
$string['episodeviews'] = 'Views';
$string['errcannotedit'] = 'Error: you cannot edit this episode';
$string['errcannoteditothers'] = 'Error: you cannot edit other users episodes';
$string['erredittimeexpired'] = 'Error: Editing time has expired';
$string['errorinvalidmode'] = 'Error: you do not have access';
$string['explainaddentry'] = 'Add a new episode to the current podcast.<br />name, summary, and attachment are mandatory fields.';
$string['explainall'] = 'Shows ALL entries on one page';
$string['explainalphabet'] = 'Browse the podcast using this index';
$string['explainspecial'] = 'Shows entries that do not begin with a letter';
$string['explicit'] = 'Explicit content';
$string['explicit_help'] = 'This specifies if the podcast contains explicit content.';
$string['image'] = 'Podcast image';
$string['imagefile'] = 'Image';
$string['imageheight'] = 'Height';
$string['imageheight_help'] = 'Height of RSS channel logo';
$string['imagewidth'] = 'Width';
$string['imagewidth_help'] = 'Width of RSS channel logo';
$string['invalidcmorid'] = 'Error: You must specify a course_module ID or an instance ID';
$string['invalidcourse'] = 'Error: Course ID is incorrect';
$string['invalidentry'] = 'Error: Invalid episode ID';
$string['itunes'] = 'iTunes';
$string['keywords'] = 'Keywords';
$string['keywords_help'] = 'Keywords describing this podcast';
$string['maxattachmentsize'] = 'Maximum attachment size';
$string['maxattachmentsize_help'] = 'This setting specifies the largest size of file that can be attached as a pcast episode.';
$string['modulename'] = 'Pcast';
$string['modulename_help'] = 'The pcast activity module enables participants to create a podcast and and publish episodes consisting of video and / or audio files.

Episodes can be browsed alphabetically or by category, date or author. Episodes can be approved by default or require approving by a teacher before they are viewable by everyone.

A teacher can allow comments on episodes. Episodes can also be rated by teachers or students (peer evaluation). Ratings are aggregated to form a final grade which is recorded in the gradebook.

Students can subscribe to the podcast using their favorite web browser or an Audio application such as iTunes, Winamp, or Windows Media Player, and listen to them on a portable MP3 player such as an iPod.';
$string['modulenameplural'] = 'Pcasts';
$string['name'] = 'Title';
$string['newepisodes'] = 'New podcast episodes';
$string['nocommentuntilapproved'] = 'Comments are not available until the episode has been approved';
$string['noeditprivlidges'] = 'Error: You do not have editing rights.';
$string['nopcastmediafile'] = 'No media file found';
$string['nopermissiontodelepisode'] = 'Error: You do not have permission to delete this episode';
$string['noratinguntilapproved'] = 'Ratings are not available until the episode has been approved';
$string['noresize'] = 'Do not resize';
$string['notcategorised'] = 'Not categorised';
$string['notingroup'] = 'Error: You do not have access to episodes created by members of this group';
$string['noviews'] = 'No views';
$string['page-mod-pcast-edit'] = 'Pcast add/edit episode page';
$string['page-mod-pcast-view'] = 'View pcast edit page';
$string['page-mod-pcast-x'] = 'Any pcast module page';
$string['pcast'] = 'pcast';
$string['pcast:addinstance'] = 'Add a new podcast';
$string['pcastadministration'] = 'Podcast administration';
$string['pcast:approve'] = 'Approve unapproved episodes';
$string['pcastfieldset'] = 'Custom example fieldset';
$string['pcast_help'] = 'This activity allows users to create and maintain video and audio podcasts. The podcast can easily be configured for iTunes compatiblity.';
$string['pcastlink'] = 'Subscribe in iTunes';
$string['pcast:manage'] = 'Manage episodes (Edit / Delete)';
$string['pcastmediafile'] = 'Media file';
$string['pcastname'] = 'pcast name';
$string['pcast:rate'] = 'Add ratings to episodes';
$string['pcast:view'] = 'View episodes';
$string['pcast:viewallratings'] = 'View all raw ratings given by individuals';
$string['pcast:viewanyrating'] = 'View total ratings that anyone received';
$string['pcast:viewrating'] = 'View the total ratings you received';
$string['pcast:write'] = 'Create new episodes';
$string['pluginadministration'] = 'Podcast administration';
$string['pluginname'] = 'pcast';
$string['requireapproval'] = 'Require approval for episodes';
$string['requireapproval_help'] = 'Require episodes to be approved before posting';
$string['resetpcastsall'] = 'Delete episodes from all podcasts';
$string['rssepisodes'] = 'Number of episodes';
$string['rssepisodes_help'] = 'This option limits the number of episodes displayed on the RSS feed';
$string['rsslink'] = 'RSS feed for this activity';
$string['rsssortorder'] = 'RSS sort order';
$string['rsssortorder_help'] = 'This is the sort order for the episodes.  They can be sorted by date';
$string['setupposting'] = 'Posting options';
$string['sortby'] = 'Sort by';
$string['sortbycreation'] = 'Date created';
$string['sortbylastupdate'] = 'Date updated';
$string['special'] = 'Special';
$string['standardview'] = 'Browse by alphabet';
$string['subtitle'] = 'Subtitle';
$string['subtitle_help'] = 'Subtitle for podcast';
$string['summary'] = 'Summary';
$string['totalcomments'] = 'Total comments';
$string['totalratings'] = 'Total ratings';
$string['totalviews'] = 'Total views';
$string['updated'] = 'Last updated';
$string['user'] = 'Users';
$string['userscancategorize'] = 'Allow episode categories';
$string['userscancategorize_help'] = 'Allow users to select iTunes categories for each of their episodes';
$string['userscancomment'] = 'Allow user comments';
$string['userscancomment_help'] = 'Allow users to post comments';
$string['userscanpost'] = 'Allow users to post episodes';
$string['userscanpost_help'] = 'Allow users to post episodes.';
$string['userscanrate'] = 'Allow user ratings';
$string['userscanrate_help'] = 'Allow users to rate episodes';
$string['view'] = 'View';
$string['viewepisode'] = 'view this episode';
$string['viewpcast'] = 'View podcast: {$a}';
$string['views'] = 'Views';
$string['viewthisepisode'] = 'Viewing an episode from: {$a}';
$string['waitingapproval'] = 'Approve episodes';
