<?php
/**
 * Zikula Application Framework
 *
 * @copyright  (c) Zikula Development Team
 * @link       http://www.zikula.org
 * @version    $Id: Zikula.php 25879 2009-06-27 05:08:34Z mateo $
 * @license    GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @category   Zikula_Core
 * @package    Object_Library
 * @subpackage API
 */

/**
 * Format _dgettext string.
 *
 * uses sprintf() formatting %s etc, and positional %1$s, %2$s etc.
 * @link http://us.php.net/manual/en/function.sprintf.php
 * %1$s specifies the first occurance in the array of params, %2$s the second
 *
 * Note params must passed either as
 * __('beer') or as $beer where $beer = __('beer') somewhere before the call
 * __f('I want some %s with my meal', __('beer'));
 * __f('Give me %s with my %s', array(__('some sausages'), __('beer'));
 * __f('%1$s buy me %2$s', array('Drak', __('a beer'));
 *
 */
function __f($msgid, $params, $domain=null)
{
    $msgstr = (isset($domain) ? _dgettext($domain, $msgid) : _gettext($msgid));
    $params = (is_array($params) ? $params : array($params));
    return vsprintf($msgstr, $params);
}

/**
 * Format _dngettext string.
 *
 * uses sprintf() formatting %s etc, and positional %1$s, %2$s etc.
 * @link http://us.php.net/manual/en/function.sprintf.php
 * %1$s specifies the first occurance in the array of params, %2$s the second
 *
 * Note params must passed either as
 * __('now') or as $value where $value = __('now') somewhere before the call
 * _fn('apple %s', 'apples %s', __('now'), 4);
 * _fn('apple %s', 'apples %s', $value, 4);
 *
 */
function _fn($sin, $plu, $n, $params, $domain=null)
{
    $msgstr = (isset($domain) ? _dngettext($domain, $sin, $plu, (int)$n) : _ngettext($sin, $plu, (int)$n));
    $params = (is_array($params) ? $params : array($params));
    return vsprintf($msgstr, $params);
}

/**
 * Alias for gettext.
 */
function __($msgid, $domain=null)
{
    return (isset($domain) ? _dgettext($domain, $msgid) : _gettext($msgid));
}

/**
 * Plural translation
 *
 * @param string singular  $singular
 * @param string plural $plural
 * @param int count $count
 * @param string domain $domain
 * @return string
 */
function _n($singular, $plural, $count, $domain=null)
{
    return (isset($domain) ? _dngettext($domain, $singular, $plural, (int)$count) : _ngettext($singular, $plural, (int)$count));
}

/**
 * No operation gettext
 *
 * @param string $msgid
 * @return string
 */
function no__($msgid)
{
    return $msgid;
}
