<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2001, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: error.php 24342 2008-06-06 12:03:14Z markwest $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @deprecated
 * @note This file is only need for users providing custom error pages from .7x
 * @note This file will be removed for the next major release
 */

include 'includes/pnAPI.php';
pnInit();

header('HTTP/1.1 404 Not Found');
include 'header.php';
if (!pnModAvailable('Errors') || !pnModLoad('Errors', 'user')) {
    echo DataUtil::formatForDisplay(_LOADAPIFAILED);
} else {
    $output = pnModFunc('Errors', 'user', 'main');
    echo $output;
}
include 'footer.php';
