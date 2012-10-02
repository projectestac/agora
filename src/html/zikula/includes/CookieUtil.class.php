<?php
/**
 * Zikula Application Framework
 *
 * @copyright Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: CookieUtil.class.php 20486 2006-11-11 16:17:02Z rgasch $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author Robert Gasch rgasch@gmail.com
 * @uses generic data utililty class
 * @package Zikula_Core
 */

/**
 * CookieUtil
 *
 * @package Zikula_Core
 * @subpackage CookieUtil
 */
class CookieUtil
{
    /**
     * Set a cookie value
     *
     * @author Drak
     * @param string $name name of cookie
     * @param string $value
     * @param int $expires unix epoch dat for expiry
     * @param string $path
     * @param string $domain domain must be at least .domain.tld
     * @param bool $secure to set if cookie must only be set over existing https connection
     * @param bool $signed override system setting to use signatures
     * @return bool
     */
    function setCookie($name, $value='', $expires=null, $path=null, $domain=null, $secure=null, $signed = true)
    {
        if (!$name) {
            return pn_exit(__f("Error! In 'setCookie', you must specify at least the cookie name '%s'.", DataUtil::formatForDisplay($name)));
        }

        if (!is_string($value)) {
            return pn_exit('setCookie: ' . DataUtil::formatForDisplay($value) . ' must be a string');
        }

        if (pnConfigGetVar('signcookies') && (!$signed==false)){ // sign the cookie
            $value = SecurityUtil::signData($value);
        }

        return setcookie($name, $value, $expires, $path, $domain, $secure);
    }

    /**
     * Get a cookie
     *
     * @author Drak
     * @param string $name name of cookie
     * @param bool $signed override system setting to use signatures
     * @param bool $default default value
     * @return mixed cookie value as string or bool false
     */
    function getCookie($name, $signed=true, $default='')
    {
        $cookie = FormUtil::getPassedValue($name, $default, 'COOKIE');
        if (pnConfigGetVar('signcookies') && (!$signed==false)){
            return SecurityUtil::checkSignedData($cookie);
        }

        return $cookie;
    }

    /**
     * Delete given cookie
     * can be called multiple times, but must be other output is sent to browser.
     *
     * @author Drak
     * @param string $name nmame of cookie
     * @return bool
     */
    function deleteCookie($name)
    {
        return CookieUtil::setCookie($name, '', time());
    }
}
