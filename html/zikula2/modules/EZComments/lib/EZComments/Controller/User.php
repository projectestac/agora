<?php
/**
 * EZComments
 *
 * @copyright (C) EZComments Development Team
 * @link http://code.zikula.org/ezcomments
 * @license See license.txt
 */

class EZComments_Controller_User extends Zikula_AbstractController
{
    /**
     * Return to index page
     *
     * This is the default function called when EZComments is called
     * as a module. As we do not intend to output anything, we just
     * redirect to the start page.
     *
     * @since 0.2
     */
    public function main($args = array())
    {
        if (!UserUtil::isLoggedIn()) {
            return System::redirect(System::getHomepageUrl());
        }

        // the following code was taken from the admin interface first and modified
        // that only own comments are shown on the overview page.

        // get the status filter
        $status = isset($args['status']) ? $args['status'] : FormUtil::getPassedValue('status', -1, 'GETPOST');
        if (!isset($status) || !is_numeric($status) || $status < -1 || $status > 2) {
            $status = -1;
        }

        // presentation values
        $startnum = isset($args['startnum']) ? $args['startnum'] : FormUtil::getPassedValue('startnum', null, 'GETPOST');
        $itemsperpage = ModUtil::getVar('EZComments', 'itemsperpage');

        // call the api to get all current comments that are from the user or the user's content
        $params = array('startnum' => $startnum,
                        'numitems' => $itemsperpage,
                        'status'   => $status,
                        'owneruid' => UserUtil::getVar('uid'),
                        'uid'      => UserUtil::getVar('uid'));

        $items = ModUtil::apiFunc('EZComments', 'user', 'getall', $params);

        if ($items === false) {
            return LogUtil::registerError($this->__('Internal Error.'));
        }

        // loop through each item adding the relevant links
        foreach ($items as $k => $item)
        {
            $options   = array();
            $options[] = array('url'   => $item['url'] . '#comment' . $item['id'],
                               'image' => 'kview.png',
                               'title' => $this->__('View'));

            // Security check
            $securityCheck = ModUtil::apiFunc('EZComments', 'user', 'checkPermission',
                                          array('module'    => '',
                                                'objectid'  => '',
                                                'commentid' => $item['id'],
                                                'uid'       => $item['uid'],
                                                'owneruid'  => $item['owneruid'],
                                                'level'     => ACCESS_EDIT));

            if ($securityCheck) {
                $options[] = array('url'   => ModUtil::url('EZComments', 'user', 'modify', array('id' => $item['id'])),
                                   'image' => 'xedit.png',
                                   'title' => $this->__('Edit'));
            }

            $items[$k]['options'] = $options;
        }

        // assign the module vars
        $this->view->assign(ModUtil::getVar('EZComments'));

        // assign the items to the template, values for the filters
        $this->view->assign('items',  $items);
        $this->view->assign('status', $status);

        // values for the smarty plugin to produce a pager
        $this->view->assign('ezc_pager', array('numitems'     => ModUtil::apiFunc('EZComments', 'user', 'countitems', $params),
                                             'itemsperpage' => $itemsperpage));

        // Return the output
        return $this->view->fetch('ezcomments_user_main.tpl');
    }

    /**
     * Display a comment form
     *
     * This function displays a comment form, if you do not want users to
     * comment on the same page as the item is.
     *
     * @param $comment the comment (taken from HTTP put)
     * @param $mod the name of the module the comment is for (taken from HTTP put)
     * @param $objectid ID of the item the comment is for (taken from HTTP put)
     * @param $redirect URL to return to (taken from HTTP put)
     * @param $subject The subject of the comment (if any) (taken from HTTP put)
     * @param $replyto The ID of the comment for which this an anser to (taken from HTTP put)
     * @param $template The name of the template file to use (with extension)
     * @todo Check out it this function can be merged with _view!
     * @since 0.2
     */
    public function comment($args)
    {
        $mod         = isset($args['mod'])      ? $args['mod']      : FormUtil::getPassedValue('mod',      null, 'POST');
        $objectid    = isset($args['objectid']) ? $args['objectid'] : FormUtil::getPassedValue('objectid', null, 'POST');
        $areaid      = isset($args['areaid'])   ? $args['areaid']   : FormUtil::getPassedValue('areaid',   null, 'POST');
        $redirect    = isset($args['redirect']) ? $args['redirect'] : FormUtil::getPassedValue('redirect', null, 'POST');
        $useurl      = isset($args['useurl'])   ? $args['useurl']   : FormUtil::getPassedValue('useurl',   null, 'POST');
        $comment     = isset($args['comment'])  ? $args['comment']  : FormUtil::getPassedValue('comment',  null, 'POST');
        $subject     = isset($args['subject'])  ? $args['subject']  : FormUtil::getPassedValue('subject',  null, 'POST');
        $replyto     = isset($args['replyto'])  ? $args['replyto']  : FormUtil::getPassedValue('replyto',  null, 'POST');
        $order       = isset($args['order'])    ? $args['order']    : FormUtil::getPassedValue('order',    null, 'POST');
        $owneruid    = isset($args['owneruid']) ? $args['owneruid'] : FormUtil::getPassedValue('owneruid', null, 'POST');
        $template    = isset($args['template']) ? $args['template'] : FormUtil::getPassedValue('template', null, 'POST');
        $stylesheet  = isset($args['ezccss'])   ? $args['ezccss']   : FormUtil::getPassedValue('ezccss',   null, 'POST');

        if ($order == 1) {
            $sortorder = 'DESC';
        } else {
            $sortorder = 'ASC';
        }

        $status = 0;

        // check if commenting is setup for the input module
        if (!ModUtil::available($mod) || !ModUtil::isHooked('EZComments', $mod)) {
            return LogUtil::registerPermissionError();
        }

        // check if we're using the pager
        $enablepager = ModUtil::getVar('EZComments', 'enablepager');
        if ($enablepager) {
            $numitems = ModUtil::getVar('EZComments', 'commentsperpage');
            $startnum = FormUtil::getPassedValue('comments_startnum');
            if (!isset($startnum) && !is_numeric($startnum)) {
                $startnum = -1;
            }
        } else {
            $startnum = -1;
            $numitems = -1;
        }

        $items = ModUtil::apiFunc('EZComments', 'user', 'getall',
        compact('mod', 'objectid', 'sortorder', 'status', 'numitems', 'startnum'));

        if ($items === false) {
            return LogUtil::registerError($this->__('Internal Error.'), null, 'index.php');;
        }

        $items = ModUtil::apiFunc('EZComments', 'user', 'prepareCommentsForDisplay', $items);

        if ($enablepager) {
            $commentcount = ModUtil::apiFunc('EZComments', 'user', 'countitems', compact('mod', 'objectid'));
        } else {
            $commentcount = count($items);
        }

        // don't use caching (for now...)
        $this->view->setCaching(false);

        $this->view->assign('comments',     $items);
        $this->view->assign('commentcount', $commentcount);
        $this->view->assign('order',        $sortorder);
        $this->view->assign('redirect',     $redirect);
        $this->view->assign('allowadd',     SecurityUtil::checkPermission('EZComments::', "$mod:$objectid: ", ACCESS_COMMENT));
        $this->view->assign('mod',          DataUtil::formatForDisplay($mod));
        $this->view->assign('objectid',     DataUtil::formatForDisplay($objectid));
        $this->view->assign('subject',      DataUtil::formatForDisplay($subject));
        $this->view->assign('replyto',      DataUtil::formatForDisplay($replyto));

        // assign the user is of the content owner
        $this->view->assign('owneruid',     $owneruid);

        // assign useurl if there was another url for email and storing submitted
        $this->view->assign('useurl',       $useurl);

        // assign all module vars (they may be useful...)
        $this->view->assign(ModUtil::getVar('EZComments'));

        // assign the values for the pager
        $this->view->assign('ezc_pager', array('numitems'     => $commentcount,
                                             'itemsperpage' => $numitems));

        // find out which template to use
        $templateset = isset($args['template']) ? $args['template'] : $template;
        $defaultcss  = ModUtil::getVar('EZComments', 'css', 'style.css');

        if (!$this->view->template_exists(DataUtil::formatForOS($templateset) . '/ezcomments_user_comment.tpl')) {
            $templateset = ModUtil::getVar('EZComments', 'template', 'Standard');
        }
        $this->view->assign('template', $templateset);

        // include stylesheet if there is a style sheet
        $css = $stylesheet ? "$stylesheet.css" : $defaultcss;
        if ($css = ModUtil::apiFunc('EZComments', 'user', 'getStylesheet', array('path' => "$templateset/$css"))) {
            PageUtil::addVar('stylesheet', $css);
        }

        // FIXME comment template missing
        return $this->view->fetch(DataUtil::formatForOS($templateset) . '/ezcomments_user_view.tpl');
    }

    /**
     * Create a comment for a specific item
     *
     * This is a standard function that is called with the results of the
     * form supplied by EZComments_user_view to create a new item
     *
     * @param $comment the comment (taken from HTTP put)
     * @param $mod the name of the module the comment is for (taken from HTTP put)
     * @param $objectid ID of the item the comment is for (taken from HTTP put)
     * @param $redirect URL to return to (taken from HTTP put)
     * @param $subject The subject of the comment (if any) (taken from HTTP put)
     * @param $replyto The ID of the comment for which this an anser to (taken from HTTP put)
     * @since 0.1
     */
    public function create($args)
    {
        $mod      = isset($args['mod'])      ? $args['mod']      : FormUtil::getPassedValue('mod',      null, 'POST');
        $objectid = isset($args['objectid']) ? $args['objectid'] : FormUtil::getPassedValue('objectid', null, 'POST');
        $areaid   = isset($args['areaid'])   ? $args['areaid']   : FormUtil::getPassedValue('areaid',   null, 'POST');
        $comment  = isset($args['comment'])  ? $args['comment']  : FormUtil::getPassedValue('comment',  null, 'POST');
        $subject  = isset($args['subject'])  ? $args['subject']  : FormUtil::getPassedValue('subject',  null, 'POST');
        $replyto  = isset($args['replyto'])  ? $args['replyto']  : FormUtil::getPassedValue('replyto',  null, 'POST');
        $owneruid = isset($args['owneruid']) ? $args['owneruid'] : FormUtil::getPassedValue('owneruid',  null, 'POST');

        $redirect = isset($args['redirect']) ? $args['redirect'] : FormUtil::getPassedValue('redirect', null, 'POST');
        $useurl   = isset($args['useurl'])   ? $args['useurl']   : FormUtil::getPassedValue('useurl',   null, 'POST');

        // check if the user logged in and if we're allowing anon users to
        // set a name and e-mail address
        if (!UserUtil::isLoggedIn()) {
            $anonname    = isset($args['anonname'])    ? $args['anonname']    : FormUtil::getPassedValue('anonname',    null, 'POST');
            $anonmail    = isset($args['anonmail'])    ? $args['anonmail']    : FormUtil::getPassedValue('anonmail',    null, 'POST');
            $anonwebsite = isset($args['anonwebsite']) ? $args['anonwebsite'] : FormUtil::getPassedValue('anonwebsite', null, 'POST');
        } else {
            $anonname = '';
            $anonmail = '';
            $anonwebsite = '';
        }

        if (!isset($owneruid) || (!($owneruid > 1))) {
            $owneruid = 0;
        }

        $redirect = str_replace('&amp;', '&', base64_decode($redirect));
        $redirect = !empty($redirect) ? $redirect : System::serverGetVar('HTTP_REFERER');
        $useurl   = base64_decode($useurl);

        // save the submitted data if any error occurs
        $ezcomment = unserialize(SessionUtil::getVar('ezcomment', 'a:0:{}'));
        if (isset($ezcomment[$mod][$objectid])) {
            unset($ezcomment[$mod][$objectid]);
        }
        if (!empty($subject)) {
            $ezcomment[$mod][$objectid]['subject'] = $subject;
        }
        if (!empty($comment)) {
            $ezcomment[$mod][$objectid]['comment'] = $comment;
        }
        if (!empty($anonname)) {
            $ezcomment[$mod][$objectid]['anonname'] = $anonname;
        }
        if (!empty($anonmail)) {
            $ezcomment[$mod][$objectid]['anonmail'] = $anonmail;
        }
        if (!empty($anonwebsite)) {
            $ezcomment[$mod][$objectid]['anonwebsite'] = $anonwebsite;
        }

        // Confirm authorisation code
        // check csrf token
        SessionUtil::setVar('ezcomment', serialize($ezcomment));
        $this->checkCsrfToken();
        SessionUtil::delVar('ezcomment');

        // and check we've actually got a comment....
        if (empty($comment)) {
            SessionUtil::setVar('ezcomment', serialize($ezcomment));
            return LogUtil::registerError($this->__('Error! The comment contains no text.'), null,
                                          $redirect."#commentform_{$mod}_{$objectid}");
        }

        // now parse out the hostname+subfolder from the url for storing in the DB
        $url = str_replace(System::getBaseUri(), '', $useurl);

        $id = ModUtil::apiFunc('EZComments', 'user', 'create',
                           array('mod'         => $mod,
                                 'objectid'    => $objectid,
                                 'areaid'      => $areaid,
                                 'url'         => $url,
                                 'comment'     => $comment,
                                 'subject'     => $subject,
                                 'replyto'     => $replyto,
                                 'uid'         => UserUtil::getVar('uid'),
                                 'owneruid'    => $owneruid,
                                 'useurl'      => $useurl,
                                 'redirect'    => $redirect,
                                 'anonname'    => $anonname,
                                 'anonmail'    => $anonmail,
                                 'anonwebsite' => $anonwebsite));

        // redirect if it was not successful
        if (!$id) {
            SessionUtil::setVar('ezcomment', $ezcomment);
            System::redirect($redirect."#commentform_{$mod}_{$objectid}");
        }

        // clean/set the session data
        if (isset($ezcomment[$mod][$objectid])) {
            unset($ezcomment[$mod][$objectid]);
            if (empty($ezcomment[$mod])) {
                unset($ezcomment[$mod]);
            }
        }
        if (empty($ezcomment)) {
            SessionUtil::delVar('ezcomment');
        } else {
            SessionUtil::setVar('ezcomment', serialize($ezcomment));
        }

        return System::redirect($redirect.'#comment'.$id);
    }

    /**
     * Sort comments by thread
     *
     * @param $comments An array of comments
     * @return array The sorted array
     * @since 0.2
     */
    private function threadComments($comments)
    {
        return $this->displayChildren($comments, -1, 0);
    }

    /**
     * Get all child comments
     *
     * This function returns all child comments to a given comment.
     * It is called recursively
     *
     * @param $comments An array of comments
     * @param $id The id of the parent comment
     * @param $level The indentation level
     * @return array The sorted array
     * @access private
     * @since 0.2
     */
    private function displayChildren($comments, $id, $level)
    {
        $childs = array();
        foreach ($comments as $comment)
        {
            if ($comment['replyto'] == $id) {
                $comment['level'] = $level;
                $childs[] = $comment;
                $childs = array_merge($childs, $this->displayChildren($comments, $comment['id'], $level+1));
            }
        }

        return $childs;
    }

    /**
     * Return an rss/atom feed of the last x comments
     *
     * @author Mark west
     */
    public function feed($args)
    {
        $mod       = isset($args['mod'])       ? $args['mod']       : FormUtil::getPassedValue('mod',   null, 'POST');
        $objectid  = isset($args['objectid'])  ? $args['objectid']  : FormUtil::getPassedValue('objectid',  null, 'POST');
        $feedtype  = isset($args['feedtype'])  ? $args['feedtype']  : FormUtil::getPassedValue('feedtype',  null, 'POST');
        $feedcount = isset($args['feedcount']) ? $args['feedcount'] : FormUtil::getPassedValue('feedcount', null, 'POST');

        // check our input
        if (!isset($feedcount) || !is_numeric($feedcount) || $feedcount < 1 || $feedcount > 999) {
            $feedcount = ModUtil::getVar('EZcomments', 'feedcount');
        }
        if (!isset($feedtype) || !is_string($feedtype) || ($feedtype !== 'rss' && $feedtype !== 'atom')) {
            $feedtype = ModUtil::getVar('EZComments', 'feedtype');
        }
        if (!isset($mod) || !is_string($mod) || !ModUtil::available($mod)) {
            $mod = null;
        }
        if (!isset($objectid) || !is_string($objectid)) {
            $objectid = null;
        }

        $comments = ModUtil::apiFunc('EZComments', 'user', 'getall',
                                 array('mod'       => $mod,
                                       'objectid'  => $objectid,
                                       'numitems'  => $feedcount,
                                       'sortorder' => 'DESC',
                                       'status'    => 0));

        // get the last x comments
        $this->view->assign('comments'    , $comments);
        $this->view->assign('language'    , ZLanguage::getLocale());
        $this->view->assign('sitename'    , System::getVar('sitename'));
        $this->view->assign('slogan'      , System::getVar('slogan'));
        $this->view->assign('adminmail'   , System::getVar('adminmail'));
        $this->view->assign('current_date', date(DATE_RSS));

        // grab the item url from one of the comments
        if (isset($comments[0]['url'])) {
            $this->view->assign('itemurl', $comments[0]['url']);
        } else {
            // attempt to guess the url (api compliant mods only....)
            $this->view->assign('itemurl', ModUtil::url($mod, 'user', 'display', array('objectid' => $objectid)));
        }

        // display the feed and notify the core that we're done
        $this->view->display("ezcomments_user_$feedtype.tpl.tpl");
        return true;
    }

    /**
     * Modify a comment
     *
     * This is a standard function that is called whenever an comment owner
     * wishes to modify a comment
     *
     * @param  tid the id of the comment to be modified
     * @return string the modification page
     */
    public function modify($args)
    {
        // get our input
        $id = isset($args['id']) ? $args['id'] : FormUtil::getPassedValue('id', null, 'GETPOST');

        // Security check
        $securityCheck = ModUtil::apiFunc('EZComments', 'user', 'checkPermission',
                                      array('module'    => '',
                                            'objectid'  => '',
                                            'commentid' => $id,
                                            'level'     => ACCESS_EDIT));
        if (!$securityCheck) {
            $redirect = base64_decode(FormUtil::getPassedValue('redirect'));
            if (!isset($redirect)) {
                $redirect = System::getHomepageUrl();
            }
            return LogUtil::registerPermissionError($redirect);
        }

        // Create Form output object
        $render = FormUtil::newForm('EZComments', $this);

        // Return the output that has been generated by this function
        return $render->execute("ezcomments_user_modify.tpl", new EZComments_Form_Handler_User_Modify());
    }
}
