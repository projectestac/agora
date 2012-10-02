<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2005 Steven Armstrong <sa at c-area dot ch>
 * @copyright (c) 2009, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: Gettext.php 28366 2010-02-28 06:12:12Z drak $
 * @license GNU/GPL version 2 (or at your option, any later version).
 */

// Variables
global $text_domains, $default_domain, $LC_CATEGORIES, $EMULATEGETTEXT, $CURRENTLOCALE;
$text_domains = array();
$default_domain = 'zikula';
$LC_CATEGORIES = array('LC_CTYPE', 'LC_NUMERIC', 'LC_TIME', 'LC_COLLATE', 'LC_MONETARY', 'LC_MESSAGES', 'LC_ALL');
$EMULATEGETTEXT = 0;
$CURRENTLOCALE = '';

// Utility functions


/**
 * Utility function to get a StreamReader for the given text domain.
 */
function _get_reader($domain = null, $category = 5, $enable_cache = true)
{
    global $text_domains, $default_domain, $LC_CATEGORIES, $CURRENTLOCALE;
    if (!isset($domain)) {
        $domain = $default_domain;
    }
    if (!isset($text_domains[$CURRENTLOCALE][$domain]->l10n)) {
        // get the current locale
        $locale = $CURRENTLOCALE;//$locale = _setlocale(LC_ALL, 0);
        $p = isset($text_domains[$CURRENTLOCALE][$domain]->path) ? $text_domains[$CURRENTLOCALE][$domain]->path : './';
        $path = $p . "$locale/" . $LC_CATEGORIES[$category] . "/$domain.mo";
        if (file_exists($path)) {
            $input = new FileReader($path);
        } else {
            $input = null;
        }
        @$text_domains[$CURRENTLOCALE][$domain]->l10n = new gettext_reader($input, $enable_cache);
    }
    return $text_domains[$CURRENTLOCALE][$domain]->l10n;
}

/**
 * Returns whether we are using our emulated gettext API or PHP built-in one.
 */
function locale_emulation()
{
    global $EMULATEGETTEXT;
    return $EMULATEGETTEXT;
}

/**
 * Checks if the current locale is supported on this system.
 */
function _check_locale()
{
    global $EMULATEGETTEXT;
    return !$EMULATEGETTEXT;
}

/**
 * Get the codeset for the given domain.
 */
function _get_codeset($domain = null)
{
    global $text_domains, $default_domain, $LC_CATEGORIES, $CURRENTLOCALE;
    if (!isset($domain)) {
        $domain = $default_domain;
    }
    return (isset($text_domains[$CURRENTLOCALE][$domain]->codeset)) ? $text_domains[$CURRENTLOCALE][$domain]->codeset : ini_get('mbstring.internal_encoding');
}

/**
 * Convert the given string to the encoding set by bind_textdomain_codeset.
 */
function _encode($text)
{
    $source_encoding = mb_detect_encoding($text);
    $target_encoding = _get_codeset();
    if ($source_encoding != $target_encoding) {
        return mb_convert_encoding($text, $target_encoding, $source_encoding);
    } else {
        return $text;
    }
}

// Custom implementation of the standard gettext related functions


/**
 * Sets a requested locale, if needed emulates it.
 */
function _setlocale($category, $locale)
{
    global $CURRENTLOCALE, $EMULATEGETTEXT;
    if ($locale === 0) { // use === to differentiate between string "0"
        if ($CURRENTLOCALE != '') {
            return $CURRENTLOCALE;
        } else {
            // obey LANG variable, maybe extend to support all of LC_* vars
            // even if we tried to read locale without setting it first
            return _setlocale($category, $CURRENTLOCALE);
        }
    } else {
        $ret = 0;
        if (function_exists('setlocale'))  {// I don't know if this ever happens ;)
            $ret = setlocale($category, $locale);
        }
        if (($ret and $locale == '') or ($ret == $locale)) {
            $EMULATEGETTEXT = 0;
            $CURRENTLOCALE = $ret;

        } else {
            if ($locale == '') {// emulate variable support
                $CURRENTLOCALE = getenv('LANG');
            } else {
                $CURRENTLOCALE = $locale;
            }
            $EMULATEGETTEXT = 1;
        }
        return $CURRENTLOCALE;
    }
}

/**
 * Sets the path for a domain.
 */
function _bindtextdomain($domain, $path)
{
    global $text_domains, $CURRENTLOCALE;
    // ensure $path ends with a slash
    if ($path[strlen($path) - 1] != '/') {
        $path .= '/';
    } elseif ($path[strlen($path) - 1] != '\\') {
        $path .= '\\';
    }
    @$text_domains[$CURRENTLOCALE][$domain]->path = $path;
}

/**
 * Specify the character encoding in which the messages from the DOMAIN message catalog will be returned.
 */
function _bind_textdomain_codeset($domain, $codeset)
{
    global $text_domains, $CURRENTLOCALE;
    $text_domains[$CURRENTLOCALE][$domain]->codeset = $codeset;
}

/**
 * Sets the default domain.
 */
function _textdomain($domain)
{
    global $default_domain;
    $default_domain = $domain;
}

/**
 * Lookup a message in the current domain.
 */
function _gettext($msgid)
{
    $l10n = _get_reader();
    //return $l10n->translate($msgid);
    return _encode($l10n->translate($msgid));
}
/**
 * Plural version of gettext.
 */
function _ngettext($single, $plural, $number)
{
    $l10n = _get_reader();
    //return $l10n->ngettext($single, $plural, $number);
    return _encode($l10n->ngettext($single, $plural, $number));
}

/**
 * Override the current domain.
 */
function _dgettext($domain, $msgid)
{
    $l10n = _get_reader($domain);
    //return $l10n->translate($msgid);
    return _encode($l10n->translate($msgid));
}
/**
 * Plural version of dgettext.
 */
function _dngettext($domain, $single, $plural, $number)
{
    $l10n = _get_reader($domain);
    //return $l10n->ngettext($single, $plural, $number);
    return _encode($l10n->ngettext($single, $plural, $number));
}

/**
 * Overrides the domain and category for a single lookup.
 */
function _dcgettext($domain, $msgid, $category)
{
    $l10n = _get_reader($domain, $category);
    //return $l10n->translate($msgid);
    return _encode($l10n->translate($msgid));
}
/**
 * Plural version of dcgettext.
 */
function _dcngettext($domain, $single, $plural, $number, $category)
{
    $l10n = _get_reader($domain, $category);
    //return $l10n->ngettext($single, $plural, $number);
    return _encode($l10n->ngettext($single, $plural, $number));
}


