<?php
/**
 * Zikula Application Framework
 *
 * @copyright  (c) Zikula Development Team
 * @link       http://www.zikula.org
 * @version    $Id$
 * @license    GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @category   Zikula_Core
 * @package    Object_Library
 * @subpackage Compatibility_Layer
 * @deprecated
 */

// introducing Compat for depreciating functions - drak


/** depreciated functions relating to the old language system
 *
 */

/**
 * Loads the required language file for themes
 *
 * deprecated - pnThemeLoad now handles the language file directly
 * @author Patrick Kellum
 * @deprecated
 */
function themes_get_language($script = 'global')
{
}

/**
 * 2009-07-20 depreciated
 * get current language
 */
function language_current($action = 'get', $new_language = '')
{
    static $language = '';
    switch ($action) {
        case 'get' :
            return $language;
        case 'set' :
            $language = $new_language;
            break;
        default :
            die("language_current($action,$new_language)");
    }
}

/**
 * 2009-07-20 depreciated
 * build language sql clause for ml
 */
function language_sql($table, $prefix = '', $sql = 'WHERE')
{
    $language = language_current();
    if ($language == '') {
        return '';
    } else {
        return " $sql " . $pntable["{$table}_column"]["{$prefix}language"] . "='$language'";
    }
}

/**
 * 2009-06-28 - depreciated (b.plagge)
 * translatable language names now defined in LanguageUtil.class.php
 *list of all availabe languages
 * @deprecated
 *
 * @author Patrick Kellum <webmaster@ctarl-ctarl.com>
 */
function languagelist()
{
    Loader::requireOnce('language/languages.php');
}

/**
 * 2009-07-20 depreciated
 * @deprecated since 1.2
 * we now directly analyse the 2-digit language and country codes
 * Language list for auto detection of browser language
 */
function cnvlanguagelist()
{
    $cnvlang['KOI8-R'] = 'rus';
    $cnvlang['af'] = 'eng';
    $cnvlang['ar'] = 'ara';
    $cnvlang['ar-ae'] = 'ara';
    $cnvlang['ar-bh'] = 'ara';
    $cnvlang['ar-bh'] = 'ara';
    $cnvlang['ar-dj'] = 'ara';
    $cnvlang['ar-dz'] = 'ara';
    $cnvlang['ar-eg'] = 'ara';
    $cnvlang['ar-iq'] = 'ara';
    $cnvlang['ar-jo'] = 'ara';
    $cnvlang['ar-km'] = 'ara';
    $cnvlang['ar-kw'] = 'ara';
    $cnvlang['ar-lb'] = 'ara';
    $cnvlang['ar-ly'] = 'ara';
    $cnvlang['ar-ma'] = 'ara';
    $cnvlang['ar-mr'] = 'ara';
    $cnvlang['ar-om'] = 'ara';
    $cnvlang['ar-qa'] = 'ara';
    $cnvlang['ar-sa'] = 'ara';
    $cnvlang['ar-sd'] = 'ara';
    $cnvlang['ar-so'] = 'ara';
    $cnvlang['ar-sy'] = 'ara';
    $cnvlang['ar-tn'] = 'ara';
    $cnvlang['ar-ye'] = 'ara';
    $cnvlang['be'] = 'eng';
    $cnvlang['bg'] = 'bul';
    $cnvlang['bo'] = 'tib';
    $cnvlang['ca'] = 'eng';
    $cnvlang['cs'] = 'ces';
    $cnvlang['da'] = 'dan';
    $cnvlang['de'] = 'deu';
    $cnvlang['de-at'] = 'deu';
    $cnvlang['de-ch'] = 'deu';
    $cnvlang['de-de'] = 'deu';
    $cnvlang['de-li'] = 'deu';
    $cnvlang['de-lu'] = 'deu';
    $cnvlang['el'] = 'ell';
    $cnvlang['en'] = 'eng';
    $cnvlang['en-au'] = 'eng';
    $cnvlang['en-bz'] = 'eng';
    $cnvlang['en-ca'] = 'eng';
    $cnvlang['en-gb'] = 'eng';
    $cnvlang['en-ie'] = 'eng';
    $cnvlang['en-jm'] = 'eng';
    $cnvlang['en-nz'] = 'eng';
    $cnvlang['en-ph'] = 'eng';
    $cnvlang['en-tt'] = 'eng';
    $cnvlang['en-us'] = 'eng';
    $cnvlang['en-za'] = 'eng';
    $cnvlang['en-zw'] = 'eng';
    $cnvlang['es'] = 'spa';
    $cnvlang['es-ar'] = 'spa';
    $cnvlang['es-bo'] = 'spa';
    $cnvlang['es-cl'] = 'spa';
    $cnvlang['es-co'] = 'spa';
    $cnvlang['es-cr'] = 'spa';
    $cnvlang['es-do'] = 'spa';
    $cnvlang['es-ec'] = 'spa';
    $cnvlang['es-es'] = 'spa';
    $cnvlang['es-gt'] = 'spa';
    $cnvlang['es-hn'] = 'spa';
    $cnvlang['es-mx'] = 'spa';
    $cnvlang['es-ni'] = 'spa';
    $cnvlang['es-pa'] = 'spa';
    $cnvlang['es-pe'] = 'spa';
    $cnvlang['es-pr'] = 'spa';
    $cnvlang['es-py'] = 'spa';
    $cnvlang['es-sv'] = 'spa';
    $cnvlang['es-uy'] = 'spa';
    $cnvlang['es-ve'] = 'spa';
    $cnvlang['eu'] = 'eng';
    $cnvlang['fi'] = 'fin';
    $cnvlang['fo'] = 'eng';
    $cnvlang['fr'] = 'fra';
    $cnvlang['fr-be'] = 'fra';
    $cnvlang['fr-ca'] = 'fra';
    $cnvlang['fr-ch'] = 'fra';
    $cnvlang['fr-fr'] = 'fra';
    $cnvlang['fr-lu'] = 'fra';
    $cnvlang['fr-mc'] = 'fra';
    $cnvlang['ga'] = 'eng';
    $cnvlang['gd'] = 'eng';
    $cnvlang['gl'] = 'eng';
    $cnvlang['hr'] = 'cro';
    $cnvlang['hu'] = 'hun';
    $cnvlang['in'] = 'ind';
    $cnvlang['is'] = 'isl';
    $cnvlang['it'] = 'ita';
    $cnvlang['it-ch'] = 'ita';
    $cnvlang['it-it'] = 'ita';
    $cnvlang['ja'] = 'jpn';
    $cnvlang['ka'] = 'kat';
    $cnvlang['ko'] = 'kor';
    $cnvlang['mk'] = 'mkd';
    $cnvlang['nl'] = 'nld';
    $cnvlang['nl-be'] = 'nld';
    $cnvlang['nl-nl'] = 'nld';
    $cnvlang['no'] = 'nor';
    $cnvlang['pl'] = 'pol';
    $cnvlang['pt'] = 'por';
    $cnvlang['pt-br'] = 'por';
    $cnvlang['pt-pt'] = 'por';
    $cnvlang['ro'] = 'ron';
    $cnvlang['ro-mo'] = 'ron';
    $cnvlang['ro-ro'] = 'ron';
    $cnvlang['ru'] = 'rus';
    $cnvlang['ru-mo'] = 'rus';
    $cnvlang['ru-ru'] = 'rus';
    $cnvlang['sk'] = 'slv';
    $cnvlang['sl'] = 'slv';
    $cnvlang['sq'] = 'eng';
    $cnvlang['sr'] = 'eng';
    $cnvlang['sv'] = 'swe';
    $cnvlang['sv-fi'] = 'swe';
    $cnvlang['sv-se'] = 'swe';
    $cnvlang['th'] = 'tha';
    $cnvlang['tr'] = 'tur';
    $cnvlang['uk'] = 'ukr';
    $cnvlang['zh-cn'] = 'zho';
    $cnvlang['zh-tw'] = 'zho';

    return $cnvlang;
}

/**
 * @deprecated since 1.2
 * the rss allows all html/browser languages and locales
 */
function rsslanguagelist()
{
    $rsslang['KOI8-R'] = 'Russian KOI8-R';
    $rsslang['af'] = 'Afrikaans';
    $rsslang['ar'] = 'Arabic';
    $rsslang['ar-ae'] = 'Arabic (United Arab Emirates)';
    $rsslang['ar-bh'] = 'Arabic (Bahrain)';
    $rsslang['ar-bh'] = 'Arabic (Bahrain)';
    $rsslang['ar-dj'] = 'Arabic (Djibouti)';
    $rsslang['ar-dz'] = 'Arabic (Algeria)';
    $rsslang['ar-eg'] = 'Arabic (Egypt)';
    $rsslang['ar-iq'] = 'Arabic (Iraq)';
    $rsslang['ar-jo'] = 'Arabic (Jordan)';
    $rsslang['ar-km'] = 'Arabic (Comoros)';
    $rsslang['ar-kw'] = 'Arabic (Kuwait)';
    $rsslang['ar-lb'] = 'Arabic (Lebanon)';
    $rsslang['ar-ly'] = 'Arabic (Libya)';
    $rsslang['ar-ma'] = 'Arabic (Morocco)';
    $rsslang['ar-mr'] = 'Arabic (Mauritania)';
    $rsslang['ar-om'] = 'Arabic (Oman)';
    $rsslang['ar-qa'] = 'Arabic (Qatar)';
    $rsslang['ar-sa'] = 'Arabic (Saudi Arabia)';
    $rsslang['ar-sd'] = 'Arabic (Sudan)';
    $rsslang['ar-so'] = 'Arabic (Somalia)';
    $rsslang['ar-sy'] = 'Arabic (Syria)';
    $rsslang['ar-tn'] = 'Arabic (Tunisia)';
    $rsslang['ar-ye'] = 'Arabic (Yemen)';
    $rsslang['be'] = "Belarusian";
    $rsslang['bg'] = "Bulgarian";
    $rsslang['bo'] = 'Tibetan';
    $rsslang['ca'] = "Catalan";
    $rsslang['cs'] = 'Czech';
    $rsslang['da'] = 'Danish';
    $rsslang['de'] = 'German';
    $rsslang['de-at'] = 'German (Austria)';
    $rsslang['de-ch'] = 'German (Switzerland)';
    $rsslang['de-de'] = 'German (Germany)';
    $rsslang['de-li'] = 'German (Liechtenstein)';
    $rsslang['de-lu'] = 'German (Luxembourg)';
    $rsslang['el'] = 'Greek';
    $rsslang['en'] = 'English';
    $rsslang['en-au'] = 'English (Australia)';
    $rsslang['en-bz'] = 'English (Belize)';
    $rsslang['en-ca'] = 'English (Canada)';
    $rsslang['en-gb'] = 'English (United Kingdom)';
    $rsslang['en-ie'] = 'English (Ireland)';
    $rsslang['en-jm'] = 'English (Jamaica)';
    $rsslang['en-nz'] = 'English (New Zealand)';
    $rsslang['en-ph'] = 'English (Phillipines)';
    $rsslang['en-tt'] = 'English (Trinidad)';
    $rsslang['en-us'] = 'English (United States)';
    $rsslang['en-za'] = 'English (South Africa)';
    $rsslang['en-zw'] = 'English (Zimbabwe)';
    $rsslang['es'] = 'Spanish';
    $rsslang['es-ar'] = 'Spanish (Argentina)';
    $rsslang['es-bo'] = 'Spanish (Bolivia)';
    $rsslang['es-cl'] = 'Spanish (Chile)';
    $rsslang['es-co'] = 'Spanish (Colombia)';
    $rsslang['es-cr'] = 'Spanish (Costa Rica)';
    $rsslang['es-do'] = 'Spanish (Dominican Republic)';
    $rsslang['es-ec'] = 'Spanish (Ecuador)';
    $rsslang['es-es'] = 'Spanish (Spain)';
    $rsslang['es-gt'] = 'Spanish (Guatemala)';
    $rsslang['es-hn'] = 'Spanish (Honduras)';
    $rsslang['es-mx'] = 'Spanish (Mexico)';
    $rsslang['es-ni'] = 'Spanish (Nicaragua)';
    $rsslang['es-pa'] = 'Spanish (Panama)';
    $rsslang['es-pe'] = 'Spanish (Peru)';
    $rsslang['es-pr'] = 'Spanish (Puerto Rico)';
    $rsslang['es-py'] = 'Spanish (Paraguay)';
    $rsslang['es-sv'] = 'Spanish (El Salvador)';
    $rsslang['es-uy'] = 'Spanish (Uruguay)';
    $rsslang['es-ve'] = 'Spanish (Venezuela)';
    $rsslang['eu'] = "Basque";
    $rsslang['fi'] = 'Finnish';
    $rsslang['fo'] = 'Faeroese';
    $rsslang['fr'] = 'French';
    $rsslang['fr-be'] = 'French (Belgium)';
    $rsslang['fr-ca'] = 'French (Canada)';
    $rsslang['fr-ch'] = 'French (Switzerland)';
    $rsslang['fr-fr'] = 'French (France)';
    $rsslang['fr-lu'] = 'French (Luxembourg)';
    $rsslang['fr-mc'] = 'French (Monaco)';
    $rsslang['ga'] = 'Irish';
    $rsslang['gd'] = 'Gaelic';
    $rsslang['gl'] = 'Galician';
    $rsslang['hr'] = 'Croatian';
    $rsslang['hu'] = 'Hungarian';
    $rsslang['in'] = 'Indonesian';
    $rsslang['is'] = 'Icelandic';
    $rsslang['it'] = 'Italian';
    $rsslang['it-ch'] = 'Italian (Switzerland)';
    $rsslang['it-it'] = 'Italian (Italy)';
    $rsslang['ja'] = 'Japanese';
    $rsslang['ko'] = 'Korean';
    $rsslang['mk'] = 'Macedonian';
    $rsslang['nl'] = 'Dutch';
    $rsslang['nl-be'] = 'Dutch (Belgium)';
    $rsslang['nl-nl'] = 'Dutch (Netherlands)';
    $rsslang['no'] = 'Norwegian';
    $rsslang['pl'] = 'Polish';
    $rsslang['pt'] = 'Portuguese';
    $rsslang['pt-br'] = 'Portuguese (Brazil)';
    $rsslang['pt-pt'] = 'Portuguese (Portugal)';
    $rsslang['ro'] = 'Romanian';
    $rsslang['ro-mo'] = 'Romanian (Moldova)';
    $rsslang['ro-ro'] = 'Romanian (Romania)';
    $rsslang['ru'] = 'Russian';
    $rsslang['ru-mo'] = 'Russian (Moldova)';
    $rsslang['ru-ru'] = 'Russian (Russia)';
    $rsslang['sk'] = 'Slovak';
    $rsslang['sl'] = 'Slovenian';
    $rsslang['sq'] = "Albanian";
    $rsslang['sr'] = 'Serbian';
    $rsslang['sv'] = 'Swedish';
    $rsslang['sv-fi'] = 'Swedish (Finland)';
    $rsslang['sv-se'] = 'Swedish (Sweden)';
    $rsslang['th'] = 'Thai';
    $rsslang['tr'] = 'Turkish';
    $rsslang['uk'] = 'Ukranian';
    $rsslang['zh-cn'] = 'Chinese (Simplified)';
    $rsslang['zh-tw'] = 'Chinese (Traditional)';

    return $rsslang;
}

/* 2009-06-28 - depreciated
 * translatable country names are now defined in LanguageUtil.class.php
 */
function countrylist()
{
    return ZLanguage::countryMap();
}

/**
 * 2009-06-28 - depreciated - use function in LanguageUtil.class.php
 * 3-digit language code
 * get a language name
 */
function language_name($language)
{
    if (!isset($language)) {
        return null;
    }

    $map = ZLanguage::legacyMap();
    if (isset($map[$language])) {
        return $map[$language];
    }
    return null;
}

/**
 * Make common language selection dropdown
 * @deprecated
 * @author Tim Litwiller
 */
function lang_dropdown()
{
    $currentlang = pnUserGetLang();
    echo "<select name=\"alanguage\" class=\"pn-text\" id=\"language\">";
    $lang = languagelist();
    print "<option value=\"\">" . _ALL . '</option>';
    $handle = opendir('language');
    while (false !== ($f = readdir($handle))) {
        if (is_dir("language/$f") && isset($lang[$f])) {
            $langlist[$f] = $lang[$f];
        }
    }
    closedir($handle);

    asort($langlist);
    foreach ($langlist as $k => $v) {
        echo '<option value="' . $k . '"';
        if ($currentlang == $k) {
            echo ' selected="selected"';
        }
        echo '>' . DataUtil::formatForDisplay($v) . '</option> ';
    }
    echo "</select>";
}

/**
 * return a translated string
 *
 * @deprecated
 * @param name constant to use
 * @param params associative array of replacements
 */
function pnML($name, $params = array(), $html = false, $noprocess = false, $escapeForScript = false)
{
    if (!isset($name)) {
        return $name;
    }

    // prevent evaluating strings with illegal characters as defines
    if(!preg_match("/^[A-Z0-9_-]+$/", $name)) {
        return $name;
    }

    if(!defined($name)) {
        return $name;
    }

    // get the constant
    $result = constant($name);

    // perform any string replacements
    if (!empty($params)) {
        foreach ($params as $var => $string) {
            $var = "%$var%";
            $result = str_replace($var, $string, $result);
        }
    }

    if (isset($noprocess) && $noprocess) {
        // don't do anything to result
    } else if (isset($html) && ($html > 0)) {
        $result = DataUtil::formatForDisplayHTML($result);
    } else {
        $result = DataUtil::formatForDisplay($result);
    }

    if ($escapeForScript) {
        $result = addslashes($result);
    }

    return $result;
}

/**
 * Loads the required language file for module
 * some workaround for new layout with /system and /modules [larsneo]
 *
 * @author Patrick Kellum <webmaster@ctarl-ctarl.com>
 */
function modules_get_language($script = 'global')
{
    $currentlang = ZLanguage::getLanguageCodeLegacy();
    $language = ZLanguage::lookupLegacyCode(pnConfigGetVar('language_i18n'));

    if (!isset($GLOBALS['ModName'])) {
        $modname = pnModGetName();
    } else {
        $modname = $GLOBALS['ModName'];
    }

    $modinfo = pnModGetInfo(pnModGetIDFromName($modname));
    // TODO: shouldn't we check for a successful load??
    $moddir = DataUtil::formatForOS($modinfo['directory']);
    $curlang = DataUtil::formatForOS($currentlang);
    $syslang = DataUtil::formatForOS($language);

    $files = array();
    $files[] = 'modules/' . $moddir . '/lang/' . $curlang . "/$script.php";
    $files[] = 'modules/' . $moddir . '/lang/' . $syslang . "/$script.php";
    $files[] = 'modules/' . $moddir . "/lang/eng/$script.php";
    Loader::loadOneFile($files);

    return;
}

/**
 * Loads the required manual for module
 */
function modules_get_manual()
{
    $currentlang = ZLanguage::getLanguageCodeLegacy();
    $language = ZLanguage::lookupLegacyCode(pnConfigGetVar('language_i18n'));

    if (!isset($GLOBALS['ModName'])) {
        $modname = pnModGetName();
    } else {
        $modname = $GLOBALS['ModName'];
    }

    $modinfo = pnModGetInfo(pnModGetIDFromName($modname));
    // TODO: shouldn't we check for a successful load??
    $moddir = DataUtil::formatForOS($modinfo['directory']);
    $curlang = DataUtil::formatForOS($currentlang);
    $syslang = DataUtil::formatForOS($language);

    if (file_exists('modules/' . $moddir . '/lang/' . $curlang . '/manual.html')) {
        $hlpfile = 'modules/' . $moddir . '/lang/' . $curlang . '/manual.html';
    } elseif (!empty($language)) {
        if (file_exists('modules/' . $moddir . '/lang/' . $syslang . '/manual.html')) {
            $hlpfile = 'modules/' . $moddir . '/lang/' . $syslang . '/manual.html';
        }
    } else {
        $hlpfile = 'modules/' . $moddir . '/lang/eng/manual.html';
    }

    return;
}

/**
 * load legacy language defines and set a session variable
 *
 * @param string    lang   3-digit language code
 * @return void
 */
function loadLegacyLanguageDefines($lang)
{
    // Load global language defines
    // we have to manually parse the file and remove _LOCALE, _LOCALEWIN, _CHARSET
    // TODO A [try to legacy out these three] (drak)
    $oslang = DataUtil::formatForOS($lang);
    $files = array();

    if (file_exists("language/$oslang/core.php")) {
        $files[] = "language/$oslang/core.php";
    }
    if (file_exists("config/languages/$oslang/global.php")) {
        $files[] = "config/languages/$oslang/global.php";
    } elseif (file_exists('config/languages/eng/global.php')) {
        $files[] = 'config/languages/eng/global.php';
    }

    if (count($files) > 0) {
        // Here we will parse them manually remove deprecated defines and eval (yuk) - it it's legacy afterall :) - drak
        $search = array(
                    '/<\?php/i' => '',
                    '/\?>/' => '',
                    "/define\('_LOCALE/" => "// define('_LOCALE/",
                    "/define\('_LOCALEWIN/" => "// define('_LOCALEWIN/",
                    "/define\('_CHARSET/" => "// define('_CHARSET/",
                    "/define\('_DATEBRIEF/" => "// define('_DATEBRIEF/",
                    "/define\('_DATELONG/" => "// define('_DATELONG/",
                    "/define\('_DATESTRING/" => "// define('_DATESTRING/",
                    "/define\('_DATESTRING2/" => "// define('_DATESTRING2/",
                    "/define\('_DATETIMEBRIEF/" => "// define('_DATETIMEBRIEF/",
                    "/define\('_DATETIMELONG/" => "// define('_DATETIMELONG/",
                    "/define\('_DATEINPUT/" => "// define('_DATEINPUT/",
                    "/define\('_DATETIMEINPUT/" => "// define('_DATETIMEINPUT/",
                    "/define\('_TIMEBRIEF/" => "// define('_TIMEBRIEF/",
                    "/define\('_TIMELONG/" => "// define('_TIMELONG/");
        foreach ($files as $file) {
            $contents = file_get_contents($file);
            $safe = preg_replace(array_keys($search), array_values($search), $contents);
            @eval($safe);
        }
    }
    if (!defined('_PNINSTALLVER')) {
        pnBlockLoad('Blocks', 'thelang');
    }
}

/**
 * Timezone Function
 *
 * @author Fred B (fredb86)
 */
function ml_ftime($datefmt, $timestamp = -1)
{
    if (!isset($datefmt)) {
        return null;
    }

    if ($timestamp < 0) {
        $timestamp = time();
    }

    static $day_of_week_short, $month_short, $day_of_week_long, $month_long, $ml_date, $thezone, $timezone_all, $offset_all, $ml_date;

    if (!isset($ml_date[$datefmt])) {
        $day_of_week_short = explode(' ', _DAY_OF_WEEK_SHORT);
        $month_short = explode(' ', _MONTH_SHORT);
        $day_of_week_long = explode(' ', _DAY_OF_WEEK_LONG);
        $month_long = explode(' ', _MONTH_LONG);

        $ml_date[$datefmt] = preg_replace('/%a/', $day_of_week_short[(int) strftime('%w', $timestamp)], $datefmt);
        $ml_date[$datefmt] = preg_replace('/%A/', $day_of_week_long[(int) strftime('%w', $timestamp)], $ml_date[$datefmt]);
        $ml_date[$datefmt] = preg_replace('/%b/', $month_short[(int) strftime('%m', $timestamp) - 1], $ml_date[$datefmt]);
        $ml_date[$datefmt] = preg_replace('/%B/', $month_long[(int) strftime('%m', $timestamp) - 1], $ml_date[$datefmt]);

        if (pnUserLoggedIn()) {
            $thezone = pnUserGetVar(pnUserDynamicAlias('timezone_offset'));
        } else {
            $thezone = pnConfigGetVar('timezone_offset');
        }

        $timezone_all = explode(' ', _TIMEZONES);
        $offset_all = explode(' ', _TZOFFSETS);

        $indexofzone = 0;
        $offsetsize = sizeof($offset_all);
        for($i = 0; $i < $offsetsize; $i++) {
            if ($offset_all[$i] == $thezone) {
                $indexofzone = $i;
            }
        }
        $ml_date[$datefmt] = preg_replace('/%Z/', $timezone_all[$indexofzone], $ml_date[$datefmt]);
    }
    return strftime($ml_date[$datefmt], $timestamp);
}


/**
 * Return the currently available languages
 * @deprecated, relates to old language system
 * @return An array of languages
 */
function Compat_LanguageUtil_getInstalledLanguages()
{
    static $installedlangs;

    if (isset($installedlangs)) {
        return $installedlangs;
    }

    $langs = Compat_LanguageUtil_getLanguages();
    $alllangs = languagelist();

    $installedlangs = array();
    foreach ($langs as $lang) {
        if (isset($alllangs[$lang])) {
            $installedlangs[$lang] = $alllangs[$lang];
        }
    }

    return $installedlangs;
}

/**
 * Return the currently available system languages
 *
 * @deprecated
 * @return An array of system languages
 */
function Compat_LanguageUtil_getLanguages()
{
    // check the language folders in /language
    $langs = array();
    if ($dir = opendir('language')) {
        while ($lang = readdir($dir)) {
            if (is_dir("language/$lang") && !in_array($lang, array('.', '..', 'CVS', '.svn'))) {
                $langs[] = $lang;
            }
        }
        closedir($dir);
    }

    return $langs;
}


