<?php
/**
 * Zikula Application Framework
 *
 * @copyright Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author Mark West
 * @package Zikula_Core
 * @subpackage CacheUtil
 */

/**
 * CacheUtil
 *
 * @package Zikula_Core
 * @subpackage CacheUtil
 */
class CacheUtil
{
    /**
     * get the location of the local cache directory
     *
     * @return string location of the cache directory
     */
    function getLocalDir()
    {
        return DataUtil::formatForOS(pnConfigGetVar('temp'), true);
    }

    /**
     * Create a directory below zikula's local cache directory
     *
     * @param dir The name of the directory to create
     * @param mode The (UNIX) mode we wish to create the files with
     *
     * @return bool true if successful, false otherwise
     */
    function createLocalDir($dir, $mode = null)
    {
        Loader::loadClass('FileUtil');
        $path = DataUtil::formatForOS(pnConfigGetVar('temp'), true) . '/' . $dir;
        if (!FileUtil::mkdirs($path, $mode)) {
            return false;
        }
        touch("{$path}/index.html");
        return true;
    }

    /**
     * Remove a directory from zikula's local cache directory
     *
     * @param dir The name of the directory to remove
     *
     * @return bool true if successful, false otherwise
     */
    function removeLocalDir($dir)
    {
        Loader::loadClass('FileUtil');
        $path = DataUtil::formatForOS(pnConfigGetVar('temp'), true) . '/' . $dir;
        return FileUtil::deldir($path);
    }

    /**
     * Clear the contents of a directory from zikula's local cache directory
     *
     * THIS DOES WORK ONLY ONCE ON SOME CONFIGURATIONS, A SECOND CLEARING OF COMPILED TEMPLATES
     * FAILS. SO BETTER DO NOT USE THIS ATM.
     * ToDo: Check why and fix this.
     *
     * @param dir The name of the directory to remove
     */
    function clearLocalDir($dir)
    {
        Loader::loadClass('FileUtil');
        CacheUtil::removeLocalDir($dir);
        CacheUtil::createLocalDir($dir);
    }
}
