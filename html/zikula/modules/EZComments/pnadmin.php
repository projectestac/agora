<?php
/**
 * EZComments
 *
 * @copyright (C) EZComments Development Team
 * @link http://code.zikula.org/ezcomments
 * @version $Id: pnadmin.php 693 2010-05-25 07:11:17Z mateo $
 * @license See license.txt
 */

/**
 * Main administration function
 *
 * This function provides the main administration interface to the comments
 * module.
 *
 * @return string output the admin interface
 */
function EZComments_admin_main()
{
    $dom = ZLanguage::getModuleDomain('EZComments');

    // Security check
    if (!SecurityUtil::checkPermission('EZComments::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError();
    }

    // get the status filter
    $status = FormUtil::getPassedValue('status', -1, 'GETPOST');
    if (!isset($status) || !is_numeric($status) || $status < -1 || $status > 2) {
        $status = -1;
    }

    // presentation values
    $showall = (bool)FormUtil::getPassedValue('showall');
    if ($showall) {
        $itemsperpage = -1;
    } else {
        $itemsperpage = pnModGetVar('EZComments', 'itemsperpage');
    }

    $startnum = FormUtil::getPassedValue('startnum', null, 'GETPOST');

    // Create output object
    $renderer = & pnRender::getInstance('EZComments', false);

    // assign the module vars
    $renderer->assign(pnModGetVar('EZComments'));

    // call the api to get all current comments
    $items = pnModAPIFunc('EZComments', 'user', 'getall',
                          array('startnum' => $showall == true ? true : $startnum,
                                'numitems' => $itemsperpage,
                                'status'   => $status,
                                'admin'    => 1));

    if ($items === false) {
        return LogUtil::registerError(__('Internal Error.', $dom));
    }

    // loop through each item adding the relevant links
    $comments = array();
    foreach ($items as $item)
    {
        $options = array(array('url' => $item['url'] . '#comment' . $item['id'],
                               'image' => 'demo.gif',
                               'title' => __('View', $dom)));

        $options[] = array('url'   => pnModURL('EZComments', 'admin', 'modify', array('id' => $item['id'])),
                           'image' => 'xedit.gif',
                           'title' => __('Edit', $dom));

        $item['options'] = $options;
        $comments[] = $item;
    }

    // assign the items to the template
    $renderer->assign('items', $comments);

    // assign values for the filters
    $renderer->assign('status', $status);
    $renderer->assign('showall', $showall);

    // assign the values for the smarty plugin to produce a pager
    $renderer->assign('pager', array('numitems'     => pnModAPIFunc('EZComments', 'user', 'countitems', array('status' => $status, 'admin' => 1)),
                                     'itemsperpage' => $itemsperpage));

    // Return the output
    return $renderer->fetch('ezcomments_admin_view.htm');
}

/**
 * modify a comment
 *
 * This is a standard function that is called whenever an administrator
 * wishes to modify a comment
 *
 * @author The EZComments Development Team
 * @param tid  the id of the comment to be modified
 * @return string the modification page
 */
function EZComments_admin_modify($args)
{
    Loader::requireOnce('modules/EZComments/pnincludes/common.php');
    return ezc_modify($args);
}

/**
 * delete item
 *
 * This is a standard function that is called whenever an administrator
 * wishes to delete a current module item.
 *
 * @author The EZComments Development Team
 * @param id  the id of the item to be deleted
 * @param redirect the location to redirect to after the deletion attempt
 * @return bool true on sucess, false on failure
 */
function EZComments_admin_delete($args)
{
    // delete functionalityx has been moved to the modify function which uses pnForms.
    // We need this function for backwards compatibility only

    // Get parameters from whatever input we need.
    $id       = isset($args['id'])       ? $args['id']       : FormUtil::getPassedValue('id',       null, 'GETPOST');
    $objectid = isset($args['objectid']) ? $args['objectid'] : FormUtil::getPassedValue('objectid', null, 'GETPOST');
    $redirect = isset($args['redirect']) ? $args['redirect'] : FormUtil::getPassedValue('redirect', '', 'GETPOST');

    return pnRedirect(pnModURL('EZComments', 'admin', 'modify',
                               array('id'       => $id,
                                     'objectid' => $objectid,
                                     'redirect' => $redirect)));
}

/**
 * process multiple comments
 *
 * This function process the comments selected in the admin view page.
 * Multiple comments may have thier state changed or be deleted
 *
 * @author The EZComments Development Team
 * @param Comments   the ids of the items to be deleted
 * @param confirmation  confirmation that this item can be deleted
 * @param redirect the location to redirect to after the deletion attempt
 * @return bool true on sucess, false on failure
 */
function EZComments_admin_processselected($args)
{
    // Confirm authorisation code.
    if (!SecurityUtil::confirmAuthKey()) {
        return LogUtil::registerAuthidError(pnModURL('EZComments', 'admin', 'main'));
    }

    $dom = ZLanguage::getModuleDomain('EZComments');

    // Get parameters from whatever input we need.
    $comments = isset($args['comments']) ? $args['comments'] : FormUtil::getPassedValue('comments', null, 'POST');
    $action   = isset($args['action'])   ? $args['action']   : FormUtil::getPassedValue('action', null, 'POST');
    $redirect = isset($args['redirect']) ? $args['redirect'] : FormUtil::getPassedValue('redirect', null, 'POST');

    // loop round each comment deleted them in turn
    foreach ($comments as $comment) {
        switch(strtolower($action))
        {
            case 'delete':
                // The API function is called.
                if (pnModAPIFunc('EZComments', 'admin', 'delete', array('id' => $comment))) {
                    // Success
                    LogUtil::registerStatus(__('Done! Item deleted.', $dom));
                }
                break;

            case 'approve':
                if (pnModAPIFunc('EZComments', 'admin', 'updatestatus', array('id' => $comment, 'status' => 0))) {
                    // Success
                    LogUtil::registerStatus(__('Done! Item updated.', $dom));
                }
                break;

            case 'hold':
                if (pnModAPIFunc('EZComments', 'admin', 'updatestatus', array('id' => $comment, 'status' => 1))) {
                    // Success
                    LogUtil::registerStatus(__('Done! Item updated.', $dom));
                }
                break;

            case 'reject':
                if (pnModAPIFunc('EZComments', 'admin', 'updatestatus', array('id' => $comment, 'status' => 2))) {
                    // Success
                    LogUtil::registerStatus(__('Done! Item updated.', $dom));
                }
                break;
        }
    }

    // This function generated no output, and so now it is complete we redirect
    // the user to an appropriate page for them to carry on their work
    if (!empty($redirect)) {
        return pnRedirect($redirect);
    } else {
        return pnRedirect(pnModURL('EZComments', 'admin', 'main'));
    }
}

/**
 * Modify configuration
 *
 * This is a standard function to modify the configuration parameters of the
 * module
 *
 * @author The EZComments Development Team
 * @return string The configuration page
 */
function EZComments_admin_modifyconfig()
{
    // Security check
    if (!SecurityUtil::checkPermission('EZComments::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError();
    }

    // load edithandler class from file
    Loader::requireOnce('modules/EZComments/pnincludes/ezcomments_admin_modifyconfighandler.class.php');

    // Create pnForm output object
    $pnf = FormUtil::newpnForm('EZComments');

    // Return the output that has been generated by this function
    return $pnf->pnFormExecute('ezcomments_admin_modifyconfig.htm', new EZComments_admin_modifyconfighandler());
}

/**
 * Migration functionality
 *
 * This function provides a common interface to migration scripts.
 * The migration scripts will upgrade from different other modules
 * (like NS-Comments, Reviews, My_eGallery, ...) to EZComments.
 *
 * @return output the migration interface
 */
function EZComments_admin_migrate()
{
    $dom = ZLanguage::getModuleDomain('EZComments');

    if (!SecurityUtil::checkPermission('EZComments::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError();
    }

    $migrated  = pnModGetVar('EZComments', 'migrated');
    $available = FileUtil::getFiles('modules/EZComments/pnmigrateapi', false, true, 'php', 'f');

    $selectitems = array();
    foreach ($available as $f) {
        $f = substr($f, 0, -4);
        if (!isset($migrated[$f]) || !$migrated[$f]) {
            $selectitems[$f] = $f;
        }
    }

    if (!$selectitems) {
        LogUtil::registerStatus(__('No migration plugins available.', $dom));
        return pnRedirect(pnModURL('EZComments', 'admin'));
    }

    // Create output object
    $renderer = & pnRender::getInstance('EZComments', false);

    // assign the migratation options
    $renderer->assign('selectitems', $selectitems);

    // Return the output that has been generated by this function
    return $renderer->fetch('ezcomments_admin_migrate.htm');
}

/**
 * Do the migration
 *
 * This is the function that is called to do the actual
 * migration.
 *
 * @param $migrate The plugin to do the migration
 */
function EZComments_admin_migrate_go()
{
    // Permissions
    if (!SecurityUtil::checkPermission('EZComments::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError();
    }

    // Authentication key
    if (!SecurityUtil::confirmAuthKey()) {
        return LogUtil::registerAuthidError(pnModURL('EZComments', 'admin', 'main'));
    }

    // Parameter
    $migrate = FormUtil::getPassedValue('migrate');
    if (!isset($migrate)){
        return LogUtil::registerArgsError();
    }

    // call the migration function
    if (pnModAPIFunc('EZComments', 'migrate', $migrate)) {
        $migrated = pnModGetVar('EZComments', 'migrated', array('dummy' => true));
        $migrated[$migrate] = true;
        pnModSetVar('EZComments', 'migrated', $migrated);
    }

    return pnRedirect(pnModURL('EZComments', 'admin', 'migrate'));
}

/**
 * Cleanup functionality
 *
 * This is the interface to the Cleanup functionality.
 * When a Module is deleted, EZComments doesn't know about
 * this. Thus, any comments for this module stay in the database.
 * With this functionality you can delete these comments.
 *
 * @return output the cleanup interface
 */
function EZComments_admin_cleanup()
{
    if (!SecurityUtil::checkPermission('EZComments::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError();
    }

    $dom = ZLanguage::getModuleDomain('EZComments');

    // build a simple array of all available modules
    $mods = pnModGetAllMods();
    $allmods = array();
    foreach ($mods as $mod) {
        $allmods[] = $mod['name'];
    }

    $usedmods = pnModAPIFunc('EZComments', 'admin', 'getUsedModules');

    $orphanedmods = array_diff($usedmods, $allmods);

    if (!$orphanedmods) {
        LogUtil::registerStatus(__('No orphaned comments.', $dom));
        return pnRedirect(pnModURL('EZComments', 'admin', 'main'));
    }

    $selectitems = array();
    foreach ($orphanedmods as $mod) {
        $selectitems[$mod] = $mod;
    }

    $renderer = & pnRender::getInstance('EZComments', false);
    $renderer->assign('selectitems', $selectitems);

    return $renderer->fetch('ezcomments_admin_cleanup.htm');
}

/**
 * Do the migration
 *
 * This is the function that is called to do the actual
 * deletion of orphaned comments.
 *
 * @param  $module The Module to delete for
 */
function EZComments_admin_cleanup_go()
{
    $dom = ZLanguage::getModuleDomain('EZComments');

    // Permissions
    if (!SecurityUtil::checkPermission('EZComments::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError();
    }

    // Authentication key
    if (!SecurityUtil::confirmAuthKey()) {
        return LogUtil::registerAuthidError(pnModURL('EZComments', 'admin', 'main'));
    }

    $module = FormUtil::getPassedValue('ezcomments_module');
    if (!isset($module)) {
        return LogUtil::registerArgsError();
    }

    if (!pnModAPIFunc('EZComments', 'admin', 'deleteall', compact('module'))) {
        return LogUtil::registerError(__('Error! A general failure occurs.', $dom));
    }

    LogUtil::registerStatus(__('Done! All orphaned comments for this module deleted.', $dom));

    return pnRedirect(pnModURL('EZComments', 'admin', 'main'));
}

/**
 * purge comments
 *
 * @author The EZComments Development Team
 * @param confirmation  confirmation that this item can be deleted
 * @param redirect the location to redirect to after the deletion attempt
 * @return bool true on sucess, false on failure
 */
function EZComments_admin_purge($args)
{
    $dom = ZLanguage::getModuleDomain('EZComments');

    // Get parameters from whatever input we need.
    $purgepending  = isset($args['purgepending'])  ? $args['purgepending']  : FormUtil::getPassedValue('purgepending', null, 'POST');
    $purgerejected = isset($args['purgerejected']) ? $args['purgerejected'] : FormUtil::getPassedValue('purgerejected', null, 'POST');
    $confirmation  = isset($args['confirmation'])  ? $args['confirmation']  : FormUtil::getPassedValue('confirmation', null, 'POST');

    // Security check
    if (!SecurityUtil::checkPermission('EZComments::', '::', ACCESS_DELETE)) {
        return LogUtil::registerPermissionError();
    }

    // Check for confirmation.
    if (empty($confirmation)) {
        // No confirmation yet - display a suitable form to obtain confirmation
        // of this action from the user

        // Create output object - this object will store all of our output so that
        // we can return it easily when required
        $renderer = & pnRender::getInstance('EZComments', false);

        // Return the output that has been generated by this function
        return $renderer->fetch('ezcomments_admin_purge.htm');
    }

    // If we get here it means that the user has confirmed the action
    // Confirm authorisation code.
    if (!SecurityUtil::confirmAuthKey()) {
        return LogUtil::registerAuthidError(pnModURL('EZComments', 'admin', 'main'));
    }

    // The API function is called.
    if (pnModAPIFunc('EZComments', 'admin', 'purge',
        array('purgepending' => $purgepending, 'purgerejected' => $purgerejected))) {
        // Success
        LogUtil::registerStatus(__('Done! Comment deleted.', $dom));
    }

    // This function generated no output, and so now it is complete we redirect
    // the user to an appropriate page for them to carry on their work
    return pnRedirect(pnModURL('EZComments', 'admin', 'main'));
}

/**
 * display commenting stats
 *
 * @author Mark West
 * @return string html output
 */
function EZComments_admin_stats()
{
    // security check
    if (!SecurityUtil::checkPermission('EZComments::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError();
    }

    // Create output object
    $renderer = & pnRender::getInstance('EZComments', false);

    // assign the module vars
    $renderer->assign(pnModGetVar('EZComments'));

    // get a list of the hooked modules
    $hookedmodules = pnModAPIFunc('Modules', 'admin', 'gethookedmodules', array('hookmodname'=> 'EZComments'));

    // get a list of comment stats by module
    $commentstats = array();
    foreach (array_keys($hookedmodules) as $mod)
    {
        $data = pnModGetInfo(pnModGetIDFromName($mod));
        $data['modid'] = $data['id'];
        $data['approvedcomments'] = pnModAPIFunc('EZComments', 'user', 'countitems', array('status' => 0, 'mod' => $data['name']));
        $data['pendingcomments']  = pnModAPIFunc('EZComments', 'user', 'countitems', array('status' => 1, 'mod' => $data['name']));
        $data['rejectedcomments'] = pnModAPIFunc('EZComments', 'user', 'countitems', array('status' => 2, 'mod' => $data['name']));
        $data['totalcomments']    = $data['approvedcomments'] + $data['pendingcomments'] + $data['rejectedcomments'];

        $commentstats[] = $data;
    }
    $renderer->assign('commentstats', $commentstats);

    // Return the output
    return $renderer->fetch('ezcomments_admin_stats.htm');
}

/**
 * display all comments for a module
 *
 * @author Mark West
 * @return string html output
 */
function EZComments_admin_modulestats()
{
    // security check
    if (!SecurityUtil::checkPermission('EZComments::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError();
    }

    // get our input
    $mod = FormUtil::getPassedValue('mod');

    // Create output object
    $renderer = & pnRender::getInstance('EZComments', false);

    // assign the module vars
    $renderer->assign(pnModGetVar('EZComments'));

    // get a list of comments
    $modulecomments = pnModAPIFunc('EZComments', 'user', 'getallbymodule', array('mod' => $mod));

    // assign the module info
    $modid = pnModGetIDFromName($mod);
    $renderer->assign('modid', $modid);
    $renderer->assign(pnModGetInfo($modid));

    // get a list of comment stats by module
    $commentstats = array();
    foreach ($modulecomments as $data)
    {
        $data['approvedcomments'] = pnModAPIFunc('EZComments', 'user', 'countitems', array('status' => 0, 'mod' => $mod, 'objectid' => $data['objectid']));
        $data['pendingcomments']  = pnModAPIFunc('EZComments', 'user', 'countitems', array('status' => 1, 'mod' => $mod, 'objectid' => $data['objectid']));
        $data['rejectedcomments'] = pnModAPIFunc('EZComments', 'user', 'countitems', array('status' => 2, 'mod' => $mod, 'objectid' => $data['objectid']));
        $data['totalcomments']    = $data['count'];
        $commentstats[] = $data;
    }
    $renderer->assign('commentstats', $commentstats);

    // Return the output
    return $renderer->fetch('ezcomments_admin_modulestats.htm');
}

/**
 * delete all comments attached to a module
 *
 * @author  Mark West
 * @param modname the name of the module to delete all comments for
 * @param confirmation  confirmation that this item can be deleted
 * @return bool true on sucess, false on failure
 */
function EZComments_admin_deletemodule($args)
{
    $dom = ZLanguage::getModuleDomain('EZComments');

    // Get parameters from whatever input we need.
    $modid        = isset($args['modid']) ? $args['modid'] : FormUtil::getPassedValue('modid', null, 'GETPOST');
    $confirmation = isset($args['confirmation']) ? $args['confirmation'] : FormUtil::getPassedValue('confirmation', null, 'GETPOST');

    // get our module info
    $modinfo = pnModGetInfo($modid);

    // Security check
    if (!$modinfo || $modinfo['name'] == 'zikula' || !SecurityUtil::checkPermission('EZComments::', "$modinfo[name]::", ACCESS_DELETE)) {
        return LogUtil::registerPermissionError();
    }

    // Check for confirmation.
    if (empty($confirmation)) {
        // No confirmation yet

        // Create output object
        $renderer = & pnRender::getInstance('EZComments', false);

        // Add a hidden field for the item ID to the output
        $renderer->assign('modid', $modid);
        $renderer->assign($modinfo);

        // Return the output that has been generated by this function
        return $renderer->fetch('ezcomments_admin_deletemodule.htm');
    }

    // If we get here it means that the user has confirmed the action
    // Confirm authorisation code.
    if (!SecurityUtil::confirmAuthKey()) {
        return LogUtil::registerAuthidError(pnModURL('EZComments', 'admin', 'main'));
    }

    // The API function is called.
    // note: the api call is a little different here since we'll really calling a hook function that will
    // normally be executed when a module is deleted. The extra nesting of the modname inside an extrainfo
    // array reflects this
    if (pnModAPIFunc('EZComments', 'admin', 'deletemodule', array('extrainfo' => array('module' => $modinfo['name'])))) {
        // Success
        LogUtil::registerStatus(__('Done! Comment deleted.', $dom));
    }

    // This function generated no output, and so now it is complete we redirect
    // the user to an appropriate page for them to carry on their work
    return pnRedirect(pnModURL('EZComments', 'admin', 'main'));
}

/**
 * delete all comments attached to a module
 *
 * @author  Mark West
 * @param modname  the name of the module to delete all comments for
 * @param confirmation  confirmation that this item can be deleted
 * @return bool true on sucess, false on failure
 */
function EZComments_admin_deleteitem($args)
{
    $dom = ZLanguage::getModuleDomain('EZComments');

    // Get parameters from whatever input we need.
    $mod          = isset($args['mod']) ? $args['mod'] : FormUtil::getPassedValue('mod', null, 'GETPOST');
    $objectid     = isset($args['objectid']) ? $args['objectid'] : FormUtil::getPassedValue('objectid', null, 'GETPOST');
    $confirmation = isset($args['confirmation']) ? $args['confirmation'] : FormUtil::getPassedValue('confirmation', null, 'GETPOST');

    // input check
    if (!isset($mod) || !is_string($mod) || !isset($objectid) || !is_numeric($objectid)) {
        return LogUtil::registerArgsError(pnModURL('EZComments', 'admin', 'main'));
    }

    // Security check
    if (!SecurityUtil::checkPermission('EZComments::', $mod . ':' . $objectid . ':', ACCESS_DELETE)) {
        return LogUtil::registerPermissionError();
    }

    // get our module info
    if (!empty($mod)) {
        $modinfo =  pnModGetInfo(pnModGetIDFromName($mod));
    }

    // Check for confirmation.
    if (empty($confirmation)) {
        // No confirmation yet

        // Create output object
        $renderer = & pnRender::getInstance('EZComments', false);

        // Add a hidden field for the item ID to the output
        $renderer->assign('objectid', $objectid);
        $renderer->assign($modinfo);

        // Return the output that has been generated by this function
        return $renderer->fetch('ezcomments_admin_deleteitem.htm');
    }

    // If we get here it means that the user has confirmed the action
    // Confirm authorisation code.
    if (!SecurityUtil::confirmAuthKey()) {
        return LogUtil::registerAuthidError(pnModURL('EZComments', 'admin', 'main'));
    }

    // The API function is called.
    // note: the api call is a little different here since we'll really calling a hook function that will
    // normally be executed when a module is deleted. The extra nesting of the modname inside an extrainfo
    // array reflects this
    if (pnModAPIFunc('EZComments', 'admin', 'deletebyitem', array('mod' => $modinfo['name'], 'objectid' => $objectid))) {
        // Success
        LogUtil::registerStatus(__('Done! Comment deleted.', $dom));
    }

    return pnRedirect(pnModURL('EZComments', 'admin', 'main'));
}

/**
 * delete all comments attached to a module
 *
 * @author  Mark West
 * @param mod the name of the module to delete all comments for
 * @param confirmation confirmation that this item can be deleted
 * @param allcomments delete all comments fir this module
 * @param status only delete comments of this status
 * @return bool true on sucess, false on failure
 */
function EZComments_admin_applyrules($args)
{
    $dom = ZLanguage::getModuleDomain('EZComments');

    // Get parameters from whatever input we need.
    $mod          = isset($args['mod']) ? $args['mod'] : FormUtil::getPassedValue('mod', null, 'GETPOST');
    $confirmation = isset($args['confirmation']) ? $args['confirmation'] : FormUtil::getPassedValue('confirmation', null, 'GETPOST');
    $allcomments  = isset($args['allcomments']) ? $args['allcomments'] : FormUtil::getPassedValue('allcomments', null, 'GETPOST');
    $status       = isset($args['status']) ? $args['status'] : FormUtil::getPassedValue('status', null, 'GETPOST');

    // Security check
    if (!SecurityUtil::checkPermission('EZComments::', '::', ACCESS_DELETE)) {
        return LogUtil::registerPermissionError();
    }

    // Create output object
    $renderer = & pnRender::getInstance('EZComments', false);

    // Check for confirmation.
    if (empty($confirmation)) {
        // No confirmation yet

        // assign the status flags
        $renderer->assign('statuslevels', array('1' => __('Pending', $dom),
                                                '2' => __('Rejected', $dom),
                                                '0' => __('Approved', $dom)));

        // Return the output that has been generated by this function
        return $renderer->fetch('ezcomments_admin_applyrules_form.htm');
    }

    // If we get here it means that the user has confirmed the action
    // Confirm authorisation code.
    if (!SecurityUtil::confirmAuthKey()) {
        return LogUtil::registerAuthidError(pnModURL('EZComments', 'admin', 'main'));
    }

    // get the matching comments
    $args = array();
    if (!$allcomments) {
        $args['status'] = $status;
    }
    $comments = pnModAPIFunc('EZComments', 'user', 'getall', $args);

    // these processes could take some time
    set_time_limit(0);

    // apply the moderation filter to each comment
    $moderatedcomments = array();
    $blacklistedcomments = array();
    foreach ($comments as $comment)
    {
        $subjectstatus = _EZComments_userapi_checkcomment($comment['subject']);
        $commentstatus = _EZComments_userapi_checkcomment($comment['comment']);
        // akismet
        if (pnModAvailable('akismet') && pnModGetVar('EZComments', 'akismet')
            && pnModAPIFunc('akismet', 'user', 'isspam',
                            array('author'      => ($comment['uid'] > 0) ? pnUserGetVar('uname', $comment['uid']) : $comment['anonname'],
                                  'authoremail' => ($comment['uid'] > 0) ? pnUserGetVar('email', $comment['uid']) : $comment['anonmail'],
                                  'authorurl'   => ($comment['uid'] > 0) ? pnUserGetVar('url', $comment['uid']) : $comment['anonwebsite'],
                                  'content'     => $comment['comment'],
                                  'permalink'   => $comment['url']))) {
            $akismetstatus = pnModGetVar('EZComments', 'akismetstatus');
        } else {
            $akismetstatus = $commentstatus;
        }
        if (($subjectstatus == 0 && $commentstatus == 0 && $akismetstatus == 0) && $comment['status'] != 0) {
            continue;
        }

        // defines the available options
        $options = array(array('url' => $comment['url'] . '#comment' . $comment['id'],
                               'title' => __('View', $dom)));

        if (SecurityUtil::checkPermission('EZComments::', "$comment[mod]:$comment[objectid]:$comment[id]", ACCESS_EDIT)) {
            $options[] = array('url'   => pnModURL('EZComments', 'admin', 'modify', array('id' => $comment['id'])),
                               'title' => __('Edit', $dom));
        }
        $comment['options'] = $options;

        // fill the corresponding array
        if (($subjectstatus == 1 || $commentstatus == 1 || $akismetstatus == 1) && $comment['status'] != 1) {
            $moderatedcomments[] = $comment;
        }
        if (($subjectstatus == 2 || $commentstatus == 2 || $akismetstatus == 2) && $comment['status'] != 2) {
            $blacklistedcomments[] = $comment;
        }
    }

    // for the first confirmation display a results page to the user
    if (!empty($confirmation) && $confirmation == 1) {
        $renderer->assign('moderatedcomments', $moderatedcomments);
        $renderer->assign('blacklistedcomments', $blacklistedcomments);
        $renderer->assign('status', $status);
        $renderer->assign('allcomments', $allcomments);

        // Return the output that has been generated by this function
        return $renderer->fetch('ezcomments_admin_applyrules_results.htm');
    }

    if (!empty($confirmation) && $confirmation == 2) {
        foreach ($moderatedcomments as $comment) {
            $comment['status'] = 1;
            pnModAPIFunc('EZComments', 'admin', 'update', $comment);
        }

        foreach ($blacklistedcomments as $comment)
        {
            $comment['status'] = 2;
            pnModAPIFunc('EZComments', 'admin', 'update', $comment);
        }

        LogUtil::registerStatus(__('New comment rules applied', $dom));
        return pnRedirect(pnModURL('EZComments', 'admin'));
    }
}
