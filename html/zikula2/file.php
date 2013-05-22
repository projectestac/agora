<?php
/**
 * Zikula Application Framework
 *
 * @copyright  (c) Zikula Development Team
 * @link       http://www.zikula.org
 * @version    $Id: file.php 202 2009-12-09 20:28:11Z aperezm $
 * @license    GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author     Albert Pérez Monfort <aperezm@xtec.cat>
 * @category   Zikula_Extension
 * @package    Utilities
 * @subpackage Files
 */

include_once ('config/config.php');
// this file gets the files from the public directories of the users.
$fileNameGet = (isset($_GET['file'])) ? $_GET['file'] : null;
// security check to avoid the access to not allowed directories
if (strpos($fileNameGet, "..") !== false || $fileNameGet == null) {
    return false;
}
$pos = strrpos($fileNameGet, '/');
if($GLOBALS['PNConfig']['Multizk']['multi'] == 1){
    $folderPath = $GLOBALS['PNConfig']['Multizk']['filesRealPath'] . '/' . $_GET['siteDNS'] . $GLOBALS['PNConfig']['Multizk']['siteFilesFolder'] . '/';
} else {
    // it is necessary to load zikula engine to get the folderPath
    // you can avoid it writting the fisical path here instead of get it from zikula database
    // in this case you should delete the include of the file pnAPI.php and the call to the function pnInit
    // if you decide to do it you have to delete the call to pnShutDown(); too below in this code
    // init zikula engine
    include 'includes/pnAPI.php';
	pnInit(PN_CORE_CONFIG |
            PN_CORE_ADODB |
	        PN_CORE_DB |
            PN_CORE_OBJECTLAYER |
            PN_CORE_TABLES |
            PN_CORE_THEME);
    $folderPath = pnModGetVar('Files', 'folderPath') . '/';

}
$fileName = $folderPath . $fileNameGet;
$filePath = substr($fileNameGet, 0, $pos);
$accessFile = $folderPath . $filePath . '/.locked';
// check if the file .locked and the requested file exist.
// if the requested file do not exist or the .locked file exists the function returns false.
if (!file_exists($fileName) || file_exists($accessFile)) {
    return false;
}
// get file extension
$fileExtension = strtolower(substr(strrchr($fileName, "."), 1));
// get MIME array
$ctypeArray = getMimetype($fileExtension);
// get MIME type
$ctype = $ctypeArray['type'];
//use the switch-generated Content-Type
header("Content-Type: $ctype");
$chunksize = 1 * (1024 * 1024);
$buffer = '';
$cnt = 0;
$handle = fopen($fileName, 'rb');
if ($handle === false) {
    return false;
}
while (!feof($handle)) {
    @set_time_limit(60 * 60);
    $buffer = fread($handle, $chunksize);
    echo $buffer;
    flush();
    if ($retbytes) {
        $cnt += strlen($buffer);
    }
}
$status = fclose($handle);
if($GLOBALS['PNConfig']['Multizk']['multi'] != 1){
    pnShutDown();
}

/**
 * get the list of information about file types based on extensions.
 * @return an array with the list of information about file types based on extensions
 */
function getMimetype($extension)
{
    $mimeTypes = array(
        'xxx' => array('type' => 'document/unknown', 'icon' => 'unknown.gif'),
        '3gp' => array('type' => 'video/quicktime', 'icon' => 'video.gif'),
        'ai' => array('type' => 'application/postscript', 'icon' => 'image.gif'),
        'aif' => array('type' => 'audio/x-aiff', 'icon' => 'audio.gif'),
        'aiff' => array('type' => 'audio/x-aiff', 'icon' => 'audio.gif'),
        'aifc' => array('type' => 'audio/x-aiff', 'icon' => 'audio.gif'),
        'applescript' => array('type' => 'text/plain', 'icon' => 'text.gif'),
        'asc' => array('type' => 'text/plain', 'icon' => 'text.gif'),
        'asm' => array('type' => 'text/plain', 'icon' => 'text.gif'),
        'au' => array('type' => 'audio/au', 'icon' => 'audio.gif'),
        'avi' => array('type' => 'video/x-ms-wm', 'icon' => 'avi.gif'),
        'bmp' => array('type' => 'image/bmp', 'icon' => 'image.gif'),
        'c' => array('type' => 'text/plain', 'icon' => 'text.gif'),
        'cct' => array('type' => 'shockwave/director', 'icon' => 'flash.gif'),
        'cpp' => array('type' => 'text/plain', 'icon' => 'text.gif'),
        'cs' => array('type' => 'application/x-csh', 'icon' => 'text.gif'),
        'css' => array('type' => 'text/css', 'icon' => 'text.gif'),
        'dv' => array('type' => 'video/x-dv', 'icon' => 'video.gif'),
        'dmg' => array('type' => 'application/octet-stream', 'icon' => 'dmg.gif'),
        'doc' => array('type' => 'application/msword', 'icon' => 'word.gif'),
        'docx' => array('type' => 'application/msword', 'icon' => 'docx.gif'),
        'docm' => array('type' => 'application/msword', 'icon' => 'docm.gif'),
        'dotx' => array('type' => 'application/msword', 'icon' => 'dotx.gif'),
        'dcr' => array('type' => 'application/x-director', 'icon' => 'flash.gif'),
        'dif' => array('type' => 'video/x-dv', 'icon' => 'video.gif'),
        'dir' => array('type' => 'application/x-director', 'icon' => 'flash.gif'),
        'dxr' => array('type' => 'application/x-director', 'icon' => 'flash.gif'),
        'eps' => array('type' => 'application/postscript', 'icon' => 'pdf.gif'),
        'fdf' => array('type' => 'application/pdf', 'icon' => 'pdf.gif'),
        'flv' => array('type' => 'video/x-flv', 'icon' => 'video.gif'),
        'gif' => array('type' => 'image/gif', 'icon' => 'image.gif'),
        'gtar' => array('type' => 'application/x-gtar', 'icon' => 'zip.gif'),
        'tgz' => array('type' => 'application/g-zip', 'icon' => 'zip.gif'),
        'gz' => array('type' => 'application/g-zip', 'icon' => 'zip.gif'),
        'gzip' => array('type' => 'application/g-zip', 'icon' => 'zip.gif'),
        'h' => array('type' => 'text/plain', 'icon' => 'text.gif'),
        'hpp' => array('type' => 'text/plain', 'icon' => 'text.gif'),
        'hqx' => array('type' => 'application/mac-binhex40', 'icon' => 'zip.gif'),
        'htc' => array('type' => 'text/x-component', 'icon' => 'text.gif'),
        'html' => array('type' => 'text/html', 'icon' => 'html.gif'),
        'htm' => array('type' => 'text/html', 'icon' => 'html.gif'),
        'ico' => array('type' => 'image/vnd.microsoft.icon', 'icon' => 'image.gif'),
        'java' => array('type' => 'text/plain', 'icon' => 'text.gif'),
        'jcb' => array('type' => 'text/xml', 'icon' => 'jcb.gif'),
        'jcl' => array('type' => 'text/xml', 'icon' => 'jcl.gif'),
        'jcw' => array('type' => 'text/xml', 'icon' => 'jcw.gif'),
        'jmt' => array('type' => 'text/xml', 'icon' => 'jmt.gif'),
        'jmx' => array('type' => 'text/xml', 'icon' => 'jmx.gif'),
        'jpe' => array('type' => 'image/jpeg', 'icon' => 'image.gif'),
        'jpeg' => array('type' => 'image/jpeg', 'icon' => 'image.gif'),
        'jpg' => array('type' => 'image/jpeg', 'icon' => 'image.gif'),
        'jqz' => array('type' => 'text/xml', 'icon' => 'jqz.gif'),
        'js' => array('type' => 'application/x-javascript', 'icon' => 'text.gif'),
        'latex' => array('type' => 'application/x-latex', 'icon' => 'text.gif'),
        'm' => array('type' => 'text/plain', 'icon' => 'text.gif'),
        'mov' => array('type' => 'video/quicktime', 'icon' => 'video.gif'),
        'movie' => array('type' => 'video/x-sgi-movie', 'icon' => 'video.gif'),
        'm3u' => array('type' => 'audio/x-mpegurl', 'icon' => 'audio.gif'),
        'mp3' => array('type' => 'audio/mp3', 'icon' => 'audio.gif'),
        'mp4' => array('type' => 'video/mp4', 'icon' => 'video.gif'),
        'mpeg' => array('type' => 'video/mpeg', 'icon' => 'video.gif'),
        'mpe' => array('type' => 'video/mpeg', 'icon' => 'video.gif'),
        'mpg' => array('type' => 'video/mpeg', 'icon' => 'video.gif'),
        'odt' => array('type' => 'application/vnd.oasis.opendocument.text', 'icon' => 'odt.gif'),
        'ott' => array('type' => 'application/vnd.oasis.opendocument.text-template', 'icon' => 'odt.gif'),
        'oth' => array('type' => 'application/vnd.oasis.opendocument.text-web', 'icon' => 'odt.gif'),
        'odm' => array('type' => 'application/vnd.oasis.opendocument.text-master', 'icon' => 'odm.gif'),
        'odg' => array('type' => 'application/vnd.oasis.opendocument.graphics', 'icon' => 'odg.gif'),
        'otg' => array('type' => 'application/vnd.oasis.opendocument.graphics-template', 'icon' => 'odg.gif'),
        'odp' => array('type' => 'application/vnd.oasis.opendocument.presentation', 'icon' => 'odp.gif'),
        'otp' => array('type' => 'application/vnd.oasis.opendocument.presentation-template', 'icon' => 'odp.gif'),
        'ods' => array('type' => 'application/vnd.oasis.opendocument.spreadsheet', 'icon' => 'ods.gif'),
        'ots' => array('type' => 'application/vnd.oasis.opendocument.spreadsheet-template', 'icon' => 'ods.gif'),
        'odc' => array('type' => 'application/vnd.oasis.opendocument.chart', 'icon' => 'odc.gif'),
        'odf' => array('type' => 'application/vnd.oasis.opendocument.formula', 'icon' => 'odf.gif'),
        'odb' => array('type' => 'application/vnd.oasis.opendocument.database', 'icon' => 'odb.gif'),
        'odi' => array('type' => 'application/vnd.oasis.opendocument.image', 'icon' => 'odi.gif'),
        'pct' => array('type' => 'image/pict', 'icon' => 'image.gif'),
        'pdf' => array('type' => 'application/pdf', 'icon' => 'pdf.gif'),
        'php' => array('type' => 'text/plain', 'icon' => 'text.gif'),
        'pic' => array('type' => 'image/pict', 'icon' => 'image.gif'),
        'pict' => array('type' => 'image/pict', 'icon' => 'image.gif'),
        'png' => array('type' => 'image/png', 'icon' => 'image.gif'),
        'pps' => array('type' => 'application/vnd.ms-powerpoint', 'icon' => 'powerpoint.gif'),
        'ppt' => array('type' => 'application/vnd.ms-powerpoint', 'icon' => 'powerpoint.gif'),
        'pptx' => array('type' => 'application/vnd.ms-powerpoint', 'icon' => 'pptx.gif'),
        'pptm' => array('type' => 'application/vnd.ms-powerpoint', 'icon' => 'pptm.gif'),
        'potx' => array('type' => 'application/vnd.ms-powerpoint', 'icon' => 'potx.gif'),
        'potm' => array('type' => 'application/vnd.ms-powerpoint', 'icon' => 'potm.gif'),
        'ppam' => array('type' => 'application/vnd.ms-powerpoint', 'icon' => 'ppam.gif'),
        'ppsx' => array('type' => 'application/vnd.ms-powerpoint', 'icon' => 'ppsx.gif'),
        'ppsm' => array('type' => 'application/vnd.ms-powerpoint', 'icon' => 'ppsm.gif'),
        'ps' => array('type' => 'application/postscript', 'icon' => 'pdf.gif'),
        'qt' => array('type' => 'video/quicktime', 'icon' => 'video.gif'),
        'ra' => array('type' => 'audio/x-realaudio', 'icon' => 'audio.gif'),
        'ram' => array('type' => 'audio/x-pn-realaudio', 'icon' => 'audio.gif'),
        'rhb' => array('type' => 'text/xml', 'icon' => 'xml.gif'),
        'rm' => array('type' => 'audio/x-pn-realaudio', 'icon' => 'audio.gif'),
        'rtf' => array('type' => 'text/rtf', 'icon' => 'text.gif'),
        'rtx' => array('type' => 'text/richtext', 'icon' => 'text.gif'),
        'sh' => array('type' => 'application/x-sh', 'icon' => 'text.gif'),
        'sit' => array('type' => 'application/x-stuffit', 'icon' => 'zip.gif'),
        'smi' => array('type' => 'application/smil', 'icon' => 'text.gif'),
        'smil' => array('type' => 'application/smil', 'icon' => 'text.gif'),
        'sqt' => array('type' => 'text/xml', 'icon' => 'xml.gif'),
        'svg' => array('type' => 'image/svg+xml', 'icon' => 'image.gif'),
        'svgz' => array('type' => 'image/svg+xml', 'icon' => 'image.gif'),
        'swa' => array('type' => 'application/x-director', 'icon' => 'flash.gif'),
        'swf' => array('type' => 'application/x-shockwave-flash', 'icon' => 'flash.gif'),
        'swfl' => array('type' => 'application/x-shockwave-flash', 'icon' => 'flash.gif'),
        'sxw' => array('type' => 'application/vnd.sun.xml.writer', 'icon' => 'odt.gif'),
        'stw' => array('type' => 'application/vnd.sun.xml.writer.template', 'icon' => 'odt.gif'),
        'sxc' => array('type' => 'application/vnd.sun.xml.calc', 'icon' => 'odt.gif'),
        'stc' => array('type' => 'application/vnd.sun.xml.calc.template', 'icon' => 'odt.gif'),
        'sxd' => array('type' => 'application/vnd.sun.xml.draw', 'icon' => 'odt.gif'),
        'std' => array('type' => 'application/vnd.sun.xml.draw.template', 'icon' => 'odt.gif'),
        'sxi' => array('type' => 'application/vnd.sun.xml.impress', 'icon' => 'odt.gif'),
        'sti' => array('type' => 'application/vnd.sun.xml.impress.template', 'icon' => 'odt.gif'),
        'sxg' => array('type' => 'application/vnd.sun.xml.writer.global', 'icon' => 'odt.gif'),
        'sxm' => array('type' => 'application/vnd.sun.xml.math', 'icon' => 'odt.gif'),
        'tar' => array('type' => 'application/x-tar', 'icon' => 'zip.gif'),
        'tif' => array('type' => 'image/tiff', 'icon' => 'image.gif'),
        'tiff' => array('type' => 'image/tiff', 'icon' => 'image.gif'),
        'tex' => array('type' => 'application/x-tex', 'icon' => 'text.gif'),
        'texi' => array('type' => 'application/x-texinfo', 'icon' => 'text.gif'),
        'texinfo' => array('type' => 'application/x-texinfo', 'icon' => 'text.gif'),
        'tsv' => array('type' => 'text/tab-separated-values', 'icon' => 'text.gif'),
        'txt' => array('type' => 'text/plain', 'icon' => 'text.gif'),
        'wav' => array('type' => 'audio/wav', 'icon' => 'audio.gif'),
        'wmv' => array('type' => 'video/x-ms-wmv', 'icon' => 'avi.gif'),
        'asf' => array('type' => 'video/x-ms-asf', 'icon' => 'avi.gif'),
        'xdp' => array('type' => 'application/pdf', 'icon' => 'pdf.gif'),
        'xfd' => array('type' => 'application/pdf', 'icon' => 'pdf.gif'),
        'xfdf' => array('type' => 'application/pdf', 'icon' => 'pdf.gif'),
        'xls' => array('type' => 'application/vnd.ms-excel', 'icon' => 'excel.gif'),
        'xlsx' => array('type' => 'application/vnd.ms-excel', 'icon' => 'xlsx.gif'),
        'xlsm' => array('type' => 'application/vnd.ms-excel', 'icon' => 'xlsm.gif'),
        'xltx' => array('type' => 'application/vnd.ms-excel', 'icon' => 'xltx.gif'),
        'xltm' => array('type' => 'application/vnd.ms-excel', 'icon' => 'xltm.gif'),
        'xlsb' => array('type' => 'application/vnd.ms-excel', 'icon' => 'xlsb.gif'),
        'xlam' => array('type' => 'application/vnd.ms-excel', 'icon' => 'xlam.gif'),
        'xml' => array('type' => 'application/xml', 'icon' => 'xml.gif'),
        'xsl' => array('type' => 'text/xml', 'icon' => 'xml.gif'),
        'zip' => array('type' => 'application/zip', 'icon' => 'zip.gif'));

    $return = $mimeTypes[$extension];
    if ($return['type'] == '') {
        $return = $mimeTypes['xxx'];
    }
    return $return;
}
