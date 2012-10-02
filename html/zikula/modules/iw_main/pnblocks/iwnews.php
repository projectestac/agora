<?php

if (strpos($_SERVER['PHP_SELF'], 'online.php')) {
    die("You can't access directly to this block");
}

/**
 * initialise block
 *
 * @author		Albert Pérez Monfort (aperezm@xtec.cat)
 */
function iw_main_iwnewsblock_init() {
    //Security check
    pnSecAddSchema('iw_main:newsBlock:', 'Block title::');
}

/**
 * get information on block
 *
 * @author       Albert Pérez Monfort (aperezm@xtec.cat)
 * @return       array       The block information
 */
function iw_main_iwnewsblock_info() {
    $dom = ZLanguage::getModuleDomain('iw_main');
    //Values
    return array('text_type' => 'iwnews',
        'module' => 'iw_main',
        'text_type_long' => __('Show news of the user', $dom),
        'allow_multiple' => true,
        'form_content' => false,
        'form_refresh' => false,
        'show_preview' => true);
}

/**
 * Gets user news
 *
 * @author	Albert Pérez Monfort (aperezm@xtec.cat)
 * @return	The user news block	
 */
function iw_main_iwnewsblock_display($row) {
    // Security check
    if (!SecurityUtil::checkPermission('iw_main:newsBlock:', $row['title'] . "::", ACCESS_READ) || !pnUserLoggedIn()) {
        return false;
    }

    if (pnModGetVar('iw_main', 'URLBase') != pngetbaseurl()) {
        pnModSetVar('iw_main', 'URLBase', pngetbaseurl());
    }

    $uid = pnUserGetVar('uid');

    //get the headlines saved in the user vars. It is renovate every 10 minutes
    $sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
    $exists = pnModApiFunc('iw_main', 'user', 'userVarExists', array('name' => 'news',
        'module' => 'iw_main_block_news',
        'uid' => $uid,
        'sv' => $sv));

    if ($exists) {
        $sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
        $have_news = pnModFunc('iw_main', 'user', 'userGetVar', array('uid' => $uid,
            'name' => 'have_news',
            'module' => 'iw_main_block_news',
            'sv' => $sv));
        if ($have_news != '0') {
            pnModFunc('iw_main', 'user', 'news', array('where' => $have_news));
            $sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
            pnModFunc('iw_main', 'user', 'userSetVar', array('uid' => $uid,
                'name' => 'have_news',
                'module' => 'iw_main_block_news',
                'sv' => $sv,
                'value' => '0'));
        }

        $sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
        $have_flags = pnModFunc('iw_main', 'user', 'userGetVar', array('uid' => pnUserGetVar('uid'),
            'name' => 'have_flags',
            'module' => 'iw_main_block_flagged',
            'sv' => $sv));

        if ($have_flags != '0') {
            pnModFunc('iw_main', 'user', 'flagged', array('where' => $have_flags,
                'chars' => 15));


            $sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
            pnModFunc('iw_main', 'user', 'userSetVar', array('uid' => pnUserGetVar('uid'),
                'name' => 'have_flags',
                'module' => 'iw_main_block_flagged',
                'sv' => $sv,
                'value' => '0'));
        }
    } else {
        pnModFunc('iw_main', 'user', 'news');
    }

    //get the flagged items
    $sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
    if (!$exists = pnModApiFunc('iw_main', 'user', 'userVarExists', array('name' => 'flagged',
        'module' => 'iw_main_block_flagged',
        'uid' => $uid,
        'sv' => $sv))) {
        pnModFunc('iw_main', 'user', 'flagged', array('where' => '',
            'chars' => 15));
    }

    $sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
    $news = pnModFunc('iw_main', 'user', 'userGetVar', array('uid' => $uid,
        'name' => 'news',
        'module' => 'iw_main_block_news',
        'sv' => $sv,
        'nult' => true));

    $sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
    $flags = pnModFunc('iw_main', 'user', 'userGetVar', array('uid' => pnUserGetVar('uid'),
        'name' => 'flagged',
        'module' => 'iw_main_block_flagged',
        'sv' => $sv,
        'nult' => true));

    $pnRender = pnRender::getInstance('iw_main', false);

    $pnRender->assign('news', $news);
    $pnRender->assign('flags', $flags);

    $s = $pnRender->fetch('iw_main_block_iwnews.htm');

    $row['content'] = $s;
    return themesideblock($row);
}