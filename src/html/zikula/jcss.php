<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2009, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: index.php 26479 2009-09-01 02:08:02Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 */

ini_set('mbstring.internal_encoding', 'UTF-8');
ini_set('default_charset', 'UTF-8');
define('ACCESS_ADMIN', 1);
require_once 'config/config.php';
require_once 'includes/FormUtil.class.php';
global $PNConfig;
$f = FormUtil::getPassedValue('f', null, 'GET');

if (!isset($f)) {
    header('HTTP/1.0 404 Not Found');
    exit;
}

// clean $f
$f = preg_replace('`/`', '', $f);

// set full path to the file
$f = $PNConfig['System']['temp'] . '/Xanthia_cache/' . $f;

if (!is_readable($f)) {
    header('HTTP/1.0 404 Not Found');
    die('ERROR: Requested file not readable.');
}

// child lock
if ($PNConfig['DBInfo']['default']['encoded']) {
    $signingKey = md5($PNConfig['DBInfo']['default']['dbhost'] . base64_decode($PNConfig['DBInfo']['default']['dbuname']) . base64_decode($PNConfig['DBInfo']['default']['dbpass']));
} else {
    $signingKey = md5($PNConfig['DBInfo']['default']['dbhost'] . $PNConfig['DBInfo']['default']['dbuname'] . ($PNConfig['DBInfo']['default']['dbpass']));
}

$contents = file_get_contents($f);
if (!is_serialized($contents)) {
    header('HTTP/1.0 404 Not Found');
    die('ERROR: Corrupted file.');
}

$dataArray = unserialize($contents);
if (!isset($dataArray['contents']) || !isset($dataArray['ctype']) || !isset($dataArray['lifetime']) || !isset($dataArray['gz']) || !isset($dataArray['signature'])) {
    header('HTTP/1.0 404 Not Found');
    die('ERROR: Invalid data.');
}

// check signature
if (md5($dataArray['contents'] . $dataArray['ctype'] . $dataArray['lifetime'] . $dataArray['gz'] . $signingKey) != $dataArray['signature']) {
    header('HTTP/1.0 404 Not Found');
    die('ERROR: File has been altered.');
}

// gz handlers if requested
if ($dataArray['gz']) {
    ini_set('zlib.output_handler', '');
    ini_set('zlib.output_compression', 1);
}

header("Content-type: $dataArray[ctype]");
header('Cache-Control: must-revalidate');
header('Expires: ' . gmdate("D, d M Y H:i:s", time() + $dataArray['lifetime']) . ' GMT');
echo $dataArray['contents'];
exit;

function is_serialized($string)
{
    return ($string == 'b:0;' ? true : (bool) @unserialize($string));
}

function pnStripslashes(&$value)
{
    if (empty($value))
        return;

    if (!is_array($value)) {
        $value = stripslashes($value);
    } else {
        array_walk($value, 'pnStripslashes');
    }
}

class SecurityUtil
{
    function checkPermission()
    {
        return true;
    }
}
