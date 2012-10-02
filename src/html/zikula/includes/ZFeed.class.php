<?php
/**
 * Zikula Application Framework
 *
 * @copyright Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: ZFeed.class.php 25798 2009-04-27 17:24:37Z herr.vorragend $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author Mark West
 * @package Zikula_Core
 */

Loader::requireOnce('includes/classes/SimplePie/simplepie.inc'); 

/**
 * ZFeed
 *
 * @package Zikula_Core
 * @subpackage Feed
 */
class ZFeed extends SimplePie
{
    /**
     * Class constructor
     */
    function ZFeed($feed_url = null, $cache_duration = null)
    {
        $cache_dir = CacheUtil::getLocalDir() . '/feeds';
        $this->SimplePie($feed_url, $cache_dir, $cache_duration);
    }
}
