<?php
/**
 * Zikula Application Framework
 * @copyright (c) 2001, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pninit.php 27407 2009-11-04 17:11:14Z herr.vorragend $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_System_Modules
 * @subpackage Blocks
 */

/**
 * initialise the blocks module
 *
 * @author       Mark West
 * @return       bool       true on success, false otherwise
 */
function blocks_init()
{
    // create blocks table
    // appropriate error message and return
    if (!DBUtil::createTable('blocks')) {
        return false;
    }

    // create userblocks table
    if (!DBUtil::createTable('userblocks')) {
        return false;
    }

    // create block positions table
    if (!DBUtil::changeTable('block_positions')) {
        return false;
    }

    // create block placements table
    if (!DBUtil::changeTable('block_placements')) {
        return false;
    }

    // Set a default value for a module variable
    pnModSetVar('Blocks', 'collapseable', 0);

    // Initialisation successful
    return true;
}

/**
 * upgrade the module from an old version
 *
 * This function must consider all the released versions of the module!
 * If the upgrade fails at some point, it returns the last upgraded version.
 *
 * @author       Mark West
 * @param        string   $oldVersion   version number string to upgrade from
 * @return       mixed    true on success, last valid version string or false if fails
 */
function blocks_upgrade($oldversion)
{
    // Upgrade dependent on old version number
    switch ($oldversion)
    {
        case '3.2':
            blocks_upgrade_fixSerializedData();
            blocks_upgrade_migrateExtMenu();

        case '3.3':
            blocks_upgrade_updateThelang();

        case '3.4':
            blocks_upgrade_updateBlockLanguages();

        case '3.5':
        case '3.6':
            // future upgrade routines
    }

    // Update successful
    return true;
}

/**
 * delete the blocks module
 *
 * Since the blocks module should never be deleted we'all always return false here
 * @author       Mark West
 * @return       bool       false
 */
function blocks_delete()
{
    // Deletion not allowed
    return false;
}

/**
 * Add default block data for new installs
 * This is called after a complete pn installation since the blocks
 * need to be populated with module id's which are only available
 * once the install has been completed
 */
function blocks_defaultdata()
{
    // create the default block positions - left, right and center for the traditional 3 column layout
    pnModAPILoad('Blocks', 'admin', true);

    // sanity check - truncate existing tables to ensure a clean blocks setup
    DBUtil::truncateTable('blocks');
    DBUtil::truncateTable('block_positions');
    DBUtil::truncateTable('block_placements');

    $left = pnModAPIFunc('Blocks', 'admin', 'createposition', array('name' => 'left', 'description' => __('Left blocks')));
    $right = pnModAPIFunc('Blocks', 'admin', 'createposition', array('name' => 'right', 'description' => __('Right blocks')));
    $center = pnModAPIFunc('Blocks', 'admin', 'createposition', array('name' => 'center', 'description' => __('Centre blocks')));

    // define an array of the default blocks
    $blocks = array();
    // build the menu content
    $languages = ZLanguage::getInstalledLanguages();
    $saveLanguage = ZLanguage::getLanguageCode();
    foreach ($languages as $lang)
    {
        ZLanguage::setLocale($lang);
        ZLanguage::bindCoreDomain();
        $menucontent['displaymodules'] = '0';
        $menucontent['stylesheet'] = 'extmenu.css';
        $menucontent['template'] = 'blocks_block_extmenu.htm';
        $menucontent['blocktitles'][$lang] = __('Main menu');
        // insert the links
        $menucontent['links'][$lang][] = array('name' => __('Home'), 'url' => '{homepage}', 'title' => __("Go to the site's home page"), 'level' => 0, 'parent' => 0, 'image' => '', 'active' => '1');
        $menucontent['links'][$lang][] = array('name' => __('Site admin panel'), 'url' => '{Admin:adminpanel:admin}', 'title' => __('Go to the site admin panel'), 'level' => 0, 'parent' => 0, 'image' => '', 'active' => '1');
        $menucontent['links'][$lang][] = array('name' => __('User account panel'), 'url' => '{Users}', 'title' => __('Go to your user account panel'), 'level' => 0, 'parent' => 0, 'image' => '', 'active' => '1');
        $menucontent['links'][$lang][] = array('name' => __('Log out'), 'url' => '{Users:logout}', 'title' => __('Log out of your user account'), 'level' => 0, 'parent' => 0, 'image' => '', 'active' => '1');
    }

    ZLanguage::setLocale($saveLanguage);

    $menucontent = serialize($menucontent);
    $blocks[] = array('bkey' => 'extmenu', 'collapsable' => 1, 'defaultstate' => 1, 'language' => '', 'mid' => pnModGetIDFromName('Blocks'), 'title' => __('Main menu'), 'content' => $menucontent, 'positions' => array($left));
    $blocks[] = array('bkey' => 'thelang', 'collapsable' => 1, 'defaultstate' => 1, 'language' => '', 'mid' => pnModGetIDFromName('Blocks'), 'title' => __('Languages'), 'content' => '', 'positions' => array($left));
    $blocks[] = array('bkey' => 'login', 'collapsable' => 1, 'defaultstate' => 1, 'language' => '', 'mid' => pnModGetIDFromName('Users'), 'title' => __('User log-in'), 'positions' => array($right));
    $blocks[] = array('bkey' => 'online', 'collapsable' => 1, 'defaultstate' => 1, 'language' => '', 'mid' => pnModGetIDFromName('Users'), 'title' => __("Who's on-line"), 'positions' => array($right));
    $blocks[] = array('bkey' => 'messages', 'collapsable' => 1, 'defaultstate' => 1, 'language' => '', 'mid' => pnModGetIDFromName('Admin_Messages'), 'title' => __('Admin messages'), 'positions' => array($center));

    // create each block and then update the block
    // the create creates the initiial block record, the update sets the block placments
    foreach ($blocks as $position => $block)
    {
        $block['bid'] = pnModAPIFunc('Blocks', 'admin', 'create', $block);
        pnModAPIFunc('Blocks', 'admin', 'update', $block);
    }

    return;
}

function blocks_upgrade_fixSerializedData()
{
    // fix serialised data in blocks
    $obj = DBUtil::selectObjectArray('blocks');
    foreach ($obj as $block)
    {
        if (DataUtil::is_serialized($block['content'])) {
            $block['content'] = serialize(DataUtil::mb_unserialize($block['content']));
        }
        DBUtil::updateObject($block, 'blocks', '', 'bid', true);
    }

    return true;
}

function blocks_upgrade_migrateExtMenu()
{
    $pntable = pnDBGetTables();
    $blockcolumn = $pntable['blocks_column'];
    $where = "WHERE $blockcolumn[bkey] = 'extmenu'";
    $obj = DBUtil::selectObjectArray('blocks', $where);

    if (count($obj) == 0) {
        // nothing to do
        return;
    }

    foreach ($obj as $block)
    {
        // translate display_name l3 -> l2
        $data = unserialize($block['content']);
        foreach ($data['blocktitles'] as $l3 => $v) {
            if ($l2 = ZLanguage::translateLegacyCode($l3)) {
                unset($data['blocktitles'][$l3]);
                $data['blocktitles'][$l2] = $v;
            }
        }

        foreach ($data['links'] as $l3 => $v) {
            if ($l2 = ZLanguage::translateLegacyCode($l3)) {
                unset($data['links'][$l3]);
                $data['links'][$l2] = $v;
            }
        }

        $block['content'] = serialize($data);
        DBUtil::updateObject($block, 'blocks', '', 'bid', true);
    }

    return;
}

function blocks_upgrade_updateThelang()
{
    $pntable = pnDBGetTables();
    $blockcolumn = $pntable['blocks_column'];
    $where = "WHERE $blockcolumn[bkey] = 'thelang'";
    $obj = DBUtil::selectObjectArray('blocks', $where);

    if (count($obj) == 0) {
        // nothing to do
        return;
    }

    pnBlockLoad('Blocks', 'thelang');
    foreach ($obj as $block)
    {
        // translate display_name l3 -> l2
        $data = DataUtil::mb_unserialize($block['content']);
        $data['languages'] = ZLanguage::getInstalledLanguages();

        $block['content'] = serialize($data);
        DBUtil::updateObject($block, 'blocks', '', 'bid', true);
    }

    return;
}

function blocks_upgrade_updateBlockLanguages()
{
    $pntable = pnDBGetTables();
    $blockcolumn = $pntable['blocks_column'];
    $where = "WHERE $blockcolumn[language] != ''";
    $obj = DBUtil::selectObjectArray('blocks', $where);

    if (count($obj) == 0) {
        // nothing to do
        return;
    }

    foreach ($obj as $block) {
        // translate l3 -> l2
        if ($l2 = ZLanguage::translateLegacyCode($block['language'])) {
            $block['language'] = $l2;
        }
        DBUtil::updateObject($block, 'blocks', '', 'bid', true);
    }

    return;
}
