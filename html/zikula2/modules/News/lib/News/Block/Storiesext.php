<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2001, Zikula Development Team
 * @link http://www.zikula.org
 * @link http://code.zikula.org/storiesext  Project page
 * @link http://www.erikspaan.nl    Homepage of author
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage News
 */

/**
 * @author Erik Spaan
 * @description Extension of the standard Story Titles block from the News module
 *   - The ability to select zero or more categories (in one or more category properties for zk)
 *   - Optional maximum age (in days) of the articles
 *   - Selectable display of authorid, storydate, nr of reads, nr of comments (EZComments)
 *   - Optional display of a NEW image with every recent article
 *   - Optional maximum length of the story title
 *   - Optional display of (part of) the hometext of the article with a more link
 *   - Direct link to edit this block when user has admin rights, dedicated template for that
 *   - Newsscrolling in 3 flavours (pausing up/down, fading, marquee)
 *
 * Version 2.0
 * - first version for Zikula 1.0 based upon version 1.4 for PostNuke 0.764
 * Version 2.1
 * - Bug #3 fixed (choice of published status to show)
 * Version 2.2
 * - Bug fixes for EZComments comment count
 * Version 2.3
 * - Added possibilty of choosing multiple Categories with multiple Category Properties
 * - Added the choice of showing a "No News" message when no relevant news is found
 * - Admin interface now uses switchdisplaystate for better user feedback when showing optional parts
 * - Renamed storiestype to show
 * Version 2.4
 * - Core Ticket #654 implemented, preview permission
 * - Added seletion of ordering on general News setting or counter
 * - Added the truncatehtml plugin for html safe(r) truncating of the hometext
 * Version 2.5
 * - Added the possibility to choose the used template (block and row)
 * - Topic related properties are now available in the row template with a commented out default use
 * Version 2.6
 * - Ticket #12 fixed, queued articles being displayed wrongfully.
 * Version 2.6 is merged into News 2.4
 */


class News_Block_Storiesext extends Zikula_Controller_AbstractBlock
{
    /**
     * initialise block
     *
     * @author       Erik Spaan [espaan]
     */
    public function init()
    {
        SecurityUtil::registerPermissionSchema('Storiesextblock::', 'Block ID::');
    }

    /**
     * get information on block
     *
     * @author       The Zikula Development Team
     * @return       array       The block information
     */
    public function info()
    {
        return array('module'          => 'News',
                'text_type'       => $this->__('Extended article titles'),
                'text_type_long'  => $this->__('Display article titles with extended options'),
                'allow_multiple'  => true,
                'form_content'    => false,
                'form_refresh'    => false,
                'show_preview'    => true,
                'admin_tableless' => true);
    }

    /**
     * display block
     *
     * @author       Erik Spaan [espaan]
     * @param        array       $blockinfo     a blockinfo structure
     * @return       output      the rendered bock
     */
    public function display($blockinfo)
    {
        if (!SecurityUtil::checkPermission('Storiesextblock::', "$blockinfo[bid]::", ACCESS_OVERVIEW)) {
            return;
        }

        // Break out options from our content field
        $vars = BlockUtil::varsFromContent($blockinfo['content']);
        // Get the News categorization setting
        $enablecategorization = ModUtil::getVar('News', 'enablecategorization');
        $lang = ZLanguage::getLanguageCode();
        $topicProperty = ModUtil::getVar('News', 'topicproperty');
        $topicField = empty($topicProperty) ? 'Main' : $topicProperty;
        $catimagepath = ModUtil::getVar('News', 'catimagepath');

        // --- Setting of the Defaults
        if (!isset($vars['category'])) {
            $vars['category'] = null;
        }
        if (!isset($vars['show'])) {
            $vars['show'] = 1;
        }
        if (!isset($vars['status'])) {
            $vars['status'] = 0;
        }
        if (!isset($vars['order'])) {
            $vars['order'] = 0;
        }
        if (!isset($vars['limit'])) {
            $vars['limit'] = 5;
        }
        // Maximum article age in days
        if (!isset($vars['dayslimit'])) {
            $vars['dayslimit'] = 0;
        }
        // Maximum title length
        if (!isset($vars['maxtitlelength'])) {
            $vars['maxtitlelength'] = 0;
        }
        if (!isset($vars['titlewraptxt'])) {
            $vars['titlewraptxt'] = '...';
        }
        // Show 'No News' message instead of empty block
        if (!isset($vars['showemptyresult'])) {
            $vars['showemptyresult'] = 0;
        }
        // Override templates for the block and row display
        if (!isset($vars['blocktemplate'])) {
            $vars['blocktemplate'] = '';
        }
        if (!isset($vars['rowtemplate'])) {
            $vars['rowtemplate'] = '';
        }
        // Display optional article information
        $vars['dispuname'] = (!isset($vars['dispuname'])) ? false : !empty($vars['dispuname']);
        $vars['dispdate'] = (!isset($vars['dispdate'])) ? true : !empty($vars['dispdate']);
        if (!isset($vars['dateformat'])) {
            $vars['dateformat'] = '%x';
        }
        $vars['dispreads'] = (!isset($vars['dispreads'])) ? false : !empty($vars['dispreads']);
        $vars['dispcomments'] = (!isset($vars['dispcomments'])) ? false : !empty($vars['dispcomments']);
        if (!isset($vars['dispsplitchar'])) {
            $vars['dispsplitchar'] = ', ';
        }
        // Display (part of) the hometext of the article
        $vars['disphometext'] = (!isset($vars['disphometext'])) ? false : !empty($vars['disphometext']);
        if (!isset($vars['maxhometextlength'])) {
            $vars['maxhometextlength'] = 0;
        }
        if (!isset($vars['hometextwraptxt'])) {
            $vars['hometextwraptxt'] = '...';
        }
        // Display of a new story image
        $vars['dispnewimage'] = (!isset($vars['dispnewimage'])) ? false : !empty($vars['dispnewimage']);
        if (!isset($vars['newimagelimit'])) {
            $vars['newimagelimit'] = 3;
        }
        if (!isset($vars['newimageset'])) {
            $vars['newimageset'] = 'icons/extrasmall/';
        }
        if (!isset($vars['newimagesrc'])) {
            $vars['newimagesrc'] = 'favorites.png';
        }
        // display the items in a scrolling box, pausing, fading or marquee
        if (!isset($vars['scrolling'])) {
            $vars['scrolling'] = 1;
        }
        if (!isset($vars['scrollstyle'])) {
            $vars['scrollstyle'] = '%DIVID% {
width:inherit;
overflow:hidden;
position:relative;
padding:2px;
border:0px solid black;
background:transparent;
/* IE: Height + 2*padding + 2*border */
height:54px;
voice-family: "\"}\"";
voice-family:inherit;
/* regular height */
height:50px;
}
/* Opera browser */
html>body %DIVID% {
height:50px;
}';
        }
        if (!isset($vars['scrolldelay'])) {
            $vars['scrolldelay'] = 3000;
        }
        if (!isset($vars['scrollmspeed'])) {
            $vars['scrollmspeed'] = 2;
        }
        $scrollfilterduration = 1.0;

        // --- Work out the parameters for the News api call, fill the apiargs array with the necessary fields
        $apiargs = array();
        switch ($vars['show'])
        {
            case 3: // non index page articles
                $apiargs['displayonindex'] = 0;
                break;
            case 2: // index page articles
                $apiargs['displayonindex'] = 1;
                break;
            // all - doesn't need displayonindex
        }
        $apiargs['numitems'] = $vars['limit']; // Nr of articles to obtain
        $apiargs['status'] = $vars['status']; // Published status

        // Make a category filter only if categorization is enabled in News module
        if ($enablecategorization) {
            // Get the registrered categories for the News module
            $catregistry  = CategoryRegistryUtil::getRegisteredModuleCategories('News', 'news');
            $apiargs['catregistry'] = $catregistry;
            $apiargs['category'] = $vars['category'];
        }

        // Limit the shown articles in days using DateUtil
        if ((int)$vars['dayslimit'] > 0 && $vars['order'] == 0) {
            $apiargs['from'] = DateUtil::getDatetime_NextDay(-$vars['dayslimit']);
            $apiargs['to'] = DateUtil::getDatetime();
        }

        // Handle the sorting order
        switch ($vars['order'])
        {
            case 2:
                $apiargs['order'] = 'weight';
                break;
            case 3:
                $apiargs['order'] = 'random';
                break;
            case 1:
                $apiargs['order'] = 'counter';
                break;
            case 0:
            default:
            // Use News module setting, so don't set apiargs[order]
        }

        // Make sure datefiltering is done. Solves #12
        $apiargs['filterbydate'] = true;

        // Call the News api and get the requested articles with the above arguments
        $items = ModUtil::apiFunc('News', 'user', 'getall', $apiargs);

        // check for an empty return
        if (empty($items)) {
            if ($vars['showemptyresult']) {
                // Show empty result message instead of empty block if variable is set
                $blockinfo['content'] = $this->__('No articles.');
                return BlockUtil::themeBlock($blockinfo);
            } else {
                return;
            }
        }

        // UserUtil is not automatically loaded, so load it now if needed and set anonymous
        if ($vars['dispuname']) {
            $anonymous = System::getVar('anonymous');
        }

        // --- Select the configurable row template or the default. The row templates is cached with its sid (storyid)
        $storiesoutput = array();
        if (!empty($vars['rowtemplate'])) {
            $rowtemplate = $vars['rowtemplate'];
        } else {
            $rowtemplate = 'block/storiesext/row.tpl';
        }

        // --- loop through the items and prepare every News item for display
        foreach ($items as $item) {
            // Get specific information from the article. It was a choice not to use the pnuserapi functions
            // GetArticleInfo, GetArticleLinks and getArticlesPreformat because of speed etc.
            // --- Check for Topic related properties like topicimage, topicsearchurl etc.
            if ($enablecategorization && !empty($item['__CATEGORIES__']) && isset($item['__CATEGORIES__'][$topicField])) {
                $item['topicid'] = $item['__CATEGORIES__'][$topicField]['id'];
                $item['topicname'] = isset($item['__CATEGORIES__'][$topicField]['display_name'][$lang]) ? $item['__CATEGORIES__'][$topicField]['display_name'][$lang] : $item['__CATEGORIES__'][$topicField]['name'];
                // set the topic image if topic_image category property exists
                $item['topicimage'] = (isset($item['__CATEGORIES__'][$topicField]['__ATTRIBUTES__']) && isset($item['__CATEGORIES__'][$topicField]['__ATTRIBUTES__']['topic_image'])) ? $item['__CATEGORIES__'][$topicField]['__ATTRIBUTES__']['topic_image'] : '';
                // set the topic description if exists
                $item['topictext'] = isset($item['__CATEGORIES__'][$topicField]['display_desc'][$lang]) ? $item['__CATEGORIES__'][$topicField]['display_desc'][$lang] : '';
                // set the path of the topic
                $item['topicpath']  = $item['__CATEGORIES__'][$topicField]['path_relative'];
                // set the url to search for this topic
                if (System::getVar('shorturls', false)) {
                    $item['topicsearchurl'] = DataUtil::formatForDisplay(ModUtil::url('News', 'user', 'view', array('prop' => $topicField, 'cat' => $item['topicpath'])));
                } else {
                    $item['topicsearchurl'] = DataUtil::formatForDisplay(ModUtil::url('News', 'user', 'view', array('prop' => $topicField, 'cat' => $item['topicid'])));
                }
            } else {
                $item['topicid']    = null;
                $item['topicname']  = '';
                $item['topicimage'] = '';
                $item['topictext']  = '';
                $item['topicpath']  = '';
                $item['topicsearchurl'] = '';
            }
            // Optional new image if the difference in days from the publishing date and now < the limit
            $item['itemnewimage'] = ($vars['dispnewimage'] && DateUtil::getDatetimeDiff_AsField($item['from'], DateUtil::getDatetime(), 3) < (int)$vars['newimagelimit']);
            // Wrap the title if needed
            $item['titlewrapped'] = false;
            if ($vars['maxtitlelength'] > 0 && strlen($item['title']) > (int)$vars['maxtitlelength'])  {
                // wrap the title with wordwrap (instead of substr)
                $a = explode('[[[wrap]]]', wordwrap($item['title'], (int)$vars['maxtitlelength'], '[[[wrap]]]'));
                $item['title'] = $a[0];
                $item['titlewrapped'] = true;
            }
            if ($vars['dispuname']) {
                // Get the user information from the author id
                if ($item['cr_uid'] == 0) {
                    $this->view->assign('uname', $anonymous);
                    $this->view->assign('aid_name', $anonymous);
                } else {
                    $user = UserUtil::getVars($item['cr_uid']);
                    $this->view->assign('uname', $user['uname']);
                    $this->view->assign('aid_name', $user['name']);
                }
            }
            // Check for EZComments
            if ($vars['dispcomments'] && ModUtil::available('EZComments')) {
                $item['comments'] = ModUtil::apiFunc('EZComments', 'user', 'countitems', array('mod' => 'News', 'objectid' => $item['sid'], 'status' => 0));
            }
            if ($vars['disphometext']) {
                if ($vars['maxhometextlength'] > 0 && strlen(strip_tags($item['hometext'])) > (int)$vars['maxhometextlength']) {
                    $item['hometextwrapped'] = true;
                }
            }
            if ($vars['dispuname']||$vars['dispdate']||$vars['dispreads']||$vars['dispcomments']) {
                $this->view->assign('dispinfo', true);
            }
            $this->view->assign('readperm',(bool)SecurityUtil::checkPermission('News::', "$item[cr_uid]::$item[sid]", ACCESS_READ));
            $this->view->assign($vars);
            $this->view->assign($item);
            // Get the cached output per row
            $storiesoutput[] = $this->view->fetch($rowtemplate, $item['sid']);
        }

        // Turn of caching for the block display
        $this->view->setCaching(false);

        // Use the configured template if set, otherwise use the default static/scrolling ones.
        if (!empty($vars['blocktemplate'])) {
            $blocktemplate = $vars['blocktemplate'];
        } else {
            $blocktemplate = 'block/storiesext/main.tpl';
            if ((int)$vars['scrolling']>1) {
                switch ((int)$vars['scrolling']) {
                    case 2:
                        $blocktemplate = 'block/storiesext/scrollpause.tpl';
                        break;
                    case 3:
                        $blocktemplate = 'block/storiesext/scrollfade.tpl';
                        // Add the IE fading effect to the existing scrollstyle
                        $vars['scrollstyle'] .= '%DIVID% {filter: progid:DXImageTransform.Microsoft.GradientWipe(GradientSize=1.0 Duration=' . $scrollfilterduration . ')}';
                        break;
                    case 4:
                        $blocktemplate = 'block/storiesext/scrollmarquee.tpl';
                        $this->view->assign('scrollmspeed', $vars['scrollmspeed']);
                        break;
                }
                $this->view->assign('scrollstyle', $vars['scrollstyle']);
                $this->view->assign('scrolldelay', $vars['scrolldelay']);
            }
        }
        $this->view->assign('catimagepath', $catimagepath);
        $this->view->assign('bid', $blockinfo['bid']);
        $this->view->assign('stories', $storiesoutput);

        $blockinfo['content'] = $this->view->fetch($blocktemplate);

        return BlockUtil::themeBlock($blockinfo);
    }

    /**
     * modify block settings
     *
     * @author       Erik Spaan [espaan]
     * @param        array       $blockinfo     a blockinfo structure
     * @return       output      the bock form
     */
    public function modify($blockinfo)
    {
        // Break out options from our content field
        $vars = BlockUtil::varsFromContent($blockinfo['content']);

        // Defaults
        if (!isset($vars['category'])) {
            $vars['category'] = array();
        }
        if (!isset($vars['show'])) {
            $vars['show'] = 1;
        }
        if (!isset($vars['status'])) {
            $vars['status'] = 0;
        }
        if (!isset($vars['order'])) {
            $vars['order'] = 0;
        }
        if (!isset($vars['limit'])) {
            $vars['limit'] = 5;
        }
        // Maximum article age in days
        if (!isset($vars['dayslimit'])) {
            $vars['dayslimit'] = 0;
        }
        // Maximum title length
        if (!isset($vars['maxtitlelength'])) {
            $vars['maxtitlelength'] = 0;
        }
        if (!isset($vars['titlewraptxt'])) {
            $vars['titlewraptxt'] = '...';
        }
        if (!isset($vars['showemptyresult'])) {
            $vars['showemptyresult'] = 0;
        }
        // Override templates for the block and row display
        if (!isset($vars['blocktemplate'])) {
            $vars['blocktemplate'] = '';
        }
        if (!isset($vars['rowtemplate'])) {
            $vars['rowtemplate'] = '';
        }
        // Display optional article information
        $vars['dispuname'] = (!isset($vars['dispuname'])) ? false : !empty($vars['dispuname']);
        $vars['dispdate'] = (!isset($vars['dispdate'])) ? true : !empty($vars['dispdate']);
        if (!isset($vars['dateformat'])) {
            $vars['dateformat'] = '%x';
        }
        $vars['dispreads'] = (!isset($vars['dispreads'])) ? false : !empty($vars['dispreads']);
        $vars['dispcomments'] = (!isset($vars['dispcomments'])) ? false : !empty($vars['dispcomments']);
        if (!isset($vars['dispsplitchar'])) {
            $vars['dispsplitchar'] = ', ';
        }
        // Display (part of) the hometext of the article
        if (!isset($vars['disphometext'])) {
            $vars['disphometext'] = false;
        }
        if (!isset($vars['maxhometextlength'])) {
            $vars['maxhometextlength'] = 0;
        }
        if (!isset($vars['hometextwraptxt'])) {
            $vars['hometextwraptxt'] = '...';
        }
        // Display of a new story image
        if (!isset($vars['dispnewimage'])) {
            $vars['dispnewimage'] = false;
        }
        if (!isset($vars['newimagelimit'])) {
            $vars['newimagelimit'] = 3;
        }
        if (!isset($vars['newimageset'])) {
            $vars['newimageset'] = 'icons/extrasmall';
        }
        if (!isset($vars['newimagesrc'])) {
            $vars['newimagesrc'] = 'favorites.png';
        }
        // display the items in a scrolling box, pausing, fading or marquee
        if (!isset($vars['scrolling'])) {
            $vars['scrolling'] = 1;
        }
        if (!isset($vars['scrollstyle'])) {
            $vars['scrollstyle'] = '%DIVID% {
width:inherit;
overflow:hidden;
position:relative;
padding:2px;
border:0px solid black;
background:transparent;
/* IE: Height + 2*padding + 2*border */
height:54px;
voice-family: "\"}\"";
voice-family:inherit;
/* regular height */
height:50px;
}
/* Opera browser */
html>body %DIVID% {
height:50px;
}';
        }
        if (!isset($vars['scrolldelay'])) {
            $vars['scrolldelay'] = 3000;
        }
        if (!isset($vars['scrollmspeed'])) {
            $vars['scrollmspeed'] = 2;
        }

        // Get the News categorization setting
        $enablecategorization = ModUtil::getVar('News', 'enablecategorization');

        // As Admin output changes often, we do not want caching.
        $this->view->setCaching(false);

        // Select categories only if enabled for the News module, otherwise selector will not be shown in modify template
        if ($enablecategorization) {
            // Get the registrered categories for the News module
            $catregistry  = CategoryRegistryUtil::getRegisteredModuleCategories('News', 'news');
            $this->view->assign('catregistry', $catregistry);
            $this->view->assign('category', $vars['category']);
        }
        $this->view->assign('enablecategorization', $enablecategorization);
        // assign the block vars
        $this->view->assign($vars);

        $this->view->assign('dom');

        // Return the output that has been generated by this function
        return $this->view->fetch('block/storiesext/modify.tpl');
    }

    /**
     * update block settings
     *
     * @author       Erik Spaan [espaan]
     * @param        array       $blockinfo     a blockinfo structure
     * @return       $blockinfo  the modified blockinfo structure
     */
    public function update($blockinfo)
    {
        // Get current content
        $vars = BlockUtil::varsFromContent($blockinfo['content']);

        // alter the corresponding variable
        $vars['show'] = (int)FormUtil::getPassedValue('show', 1, 'POST');
        $vars['category'] = FormUtil::getPassedValue('category', null, 'POST');
        $vars['limit'] = (int)FormUtil::getPassedValue('limit', 10, 'POST');
        $vars['status'] = (int)FormUtil::getPassedValue('status', 0, 'POST');
        $vars['order'] = (int)FormUtil::getPassedValue('order', 0, 'POST');
        $vars['dayslimit'] = (int)FormUtil::getPassedValue('dayslimit', 0, 'POST');
        $vars['maxtitlelength'] = (int)FormUtil::getPassedValue('maxtitlelength', 0, 'POST');
        $vars['titlewraptxt'] = FormUtil::getPassedValue('titlewraptxt', null, 'POST');
        $vars['showemptyresult'] = (bool)FormUtil::getPassedValue('showemptyresult', false, 'POST');
        $vars['blocktemplate'] = FormUtil::getPassedValue('blocktemplate', null, 'POST');
        $vars['rowtemplate'] = FormUtil::getPassedValue('rowtemplate', null, 'POST');

        $vars['dispuname'] = (bool)FormUtil::getPassedValue('dispuname', false, 'POST');
        $vars['dispdate'] = (bool)FormUtil::getPassedValue('dispdate', false, 'POST');
        $vars['dateformat'] = FormUtil::getPassedValue('dateformat', null, 'POST');
        $vars['dispreads'] = (bool)FormUtil::getPassedValue('dispreads', false, 'POST');
        $vars['dispcomments'] = (bool)FormUtil::getPassedValue('dispcomments', false, 'POST');
        $vars['dispsplitchar'] = FormUtil::getPassedValue('dispsplitchar', null, 'POST');

        $vars['disphometext'] = (bool)FormUtil::getPassedValue('disphometext', false, 'POST');
        $vars['maxhometextlength'] = (int)FormUtil::getPassedValue('maxhometextlength', 0, 'POST');
        $vars['hometextwraptxt'] = FormUtil::getPassedValue('hometextwraptxt', null, 'POST');

        $vars['dispnewimage'] = (bool)FormUtil::getPassedValue('dispnewimage', false, 'POST');
        $vars['newimagelimit'] = (int)FormUtil::getPassedValue('newimagelimit', 0, 'POST');
        $vars['newimageset'] = FormUtil::getPassedValue('newimageset', null, 'POST');
        $vars['newimagesrc'] = FormUtil::getPassedValue('newimagesrc', null, 'POST');

        $vars['scrolling'] = (int)FormUtil::getPassedValue('scrolling', 1, 'POST');
        $vars['scrollstyle'] = FormUtil::getPassedValue('scrollstyle', null, 'POST');
        $vars['scrolldelay'] = (int)FormUtil::getPassedValue('scrolldelay', 0, 'POST');
        $vars['scrollmspeed'] = (int)FormUtil::getPassedValue('scrollmspeed', 0, 'POST');

        // Check the templates
        if (!$this->view->template_exists($vars['rowtemplate'])) {
            $vars['rowtemplate'] = '';
        }
        if (!$this->view->template_exists($vars['blocktemplate'])) {
            $vars['blocktemplate'] = '';
        }

        // write back the new contents
        $blockinfo['content'] = BlockUtil::varsToContent($vars);

        // clear the block cache
        $this->view->clear_all_cache();

        return $blockinfo;
    }
}