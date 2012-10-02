<?php
/**
 * Zikula Application Framework
 *
 * @copyright Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: LanguageUtil.class.php 26463 2009-08-31 02:37:11Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author Robert Gasch rgasch@gmail.com
 * @package Zikula_Core
 */

/**
 * LanguageUtil class
 *
 * @category   Zikula_Core
 * @package    Object_Library
 * @subpackage LanguageUtil
 * @license    GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @link       http://www.zikula.org
 */
class LanguageUtil
{
    /**
     * @deprecated, relates to old language system
     * need to provide old style language list based on locale/xy directories (bernd)
     */
    function getInstalledLanguages()
    {
        return Compat_LanguageUtil_getInstalledLanguages();
    }

    /**
     * @deprecated
     */
    function getLanguages()
    {
        return Compat_LanguageUtil_getLanguages();
    }
}

