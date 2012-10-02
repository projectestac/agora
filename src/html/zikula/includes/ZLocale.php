<?php
/**
 * Zikula Application Framework
 *
 * @copyright Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: ZLocale.php 28093 2010-01-10 12:12:42Z drak $
 * @license GNU/LGPL - http://www.gnu.org/copyleft/lgpl.html
 * @author Drak drak@zikula.org
 * @package Zikula_Core

 **
 * ZLocale
 */
class ZLocale
{
    // public properties
    var $locale;
    var $errors = array();
    var $localeData = array(
        'language_direction' => 'ltr',
        'decimal_point' => '.',
        'thousands_sep' => ',',
        'int_curr_symbol' => 'EUR',
        'currency_symbol' => '€',
        'mon_decimal_point' => '.',
        'mon_thousands_sep' => ',',
        'positive_sign' => '',
        'negative_sign' => '-',
        'int_frac_digits' => '2',
        'frac_digits' => '2',
        'p_cs_precedes' => '1',
        'p_sep_by_space' => '1',
        'n_cs_precedes' => '1',
        'n_sep_by_space' => '1',
        'p_sign_posn' => '1',
        'n_sign_posn' => '2',
        'firstweekday' => '0',
        'timeformat' => '24',
        'grouping' => array(),
        'mon_grouping' => array());

    // public function __construct() { }

    function ZLocale($locale)
    {
        $this->locale = $locale;
        $this->loadLocaleConfig();
        $this->detectErrors();
    }

    //private
    function loadLocaleConfig()
    {
        $lang = ZLanguage::transformFS($this->locale);
        $override = "config/locale/$lang/locale.ini";
        $file = (is_readable($override) ? $override : "locale/$lang/locale.ini");
        if (is_readable($file)) {
            $array = DataUtil::parseIniFile($file);
            foreach ($array as $k => $v) {
                $k = strtolower($k);
                if ($k == "grouping" || $k == "mon_grouping") {
                    $v = explode(',', $v);
                }
                if (!is_array($v)) {
                    $v = trim(trim($v, '"'), "'");
                }
                $this->localeData[$k] = $v;
            }
            $this->validateLocale($file);
        } else {
            $this->registerError(__f("Error! Could not load '%s'. Please check that it exists.", $file));
        }
    }

    //public
    function validateLocale($file)
    {
        if (count($this->localeData) == 0) {
            $this->registerError(__f('Error! The locale file %s contains invalid data.', array($file)));
            return;
        }
        $validationArray = array('language_direction' => '#^(ltr|rtl)$#');
        foreach ($validationArray as $key => $validation) {
            if (!isset($this->localeData[$key])) {
                $this->registerError(__f('Error! %1$s is missing in %2$s.', array(
                    $key,
                    $file)));
            } else {
                if (!preg_match($validation, $this->localeData[$key])) {
                    $this->registerError(__f('Error! There is an invalid value for %1$s in %2$s.', array(
                        $key,
                        $file)));
                }
            }
        }
    }

    function registerError($msg)
    {
        $this->errors[] = array($msg);
    }

    function detectErrors()
    {
        if (count($this->errors) == 0) {
            return true;
        }

        // fatal errors require 404
        header('HTTP/1.1 404 Not Found');
        foreach ($this->errors as $error) {
            LogUtil::registerError($error);
        }

        return false;
    }

    /**
     * @return the $n_sign_posn
     */
    function getN_sign_posn()
    {
        return $this->localeData['n_sign_posn'];
    }

    /**
     * @return the $p_sign_posn
     */
    function getP_sign_posn()
    {
        return $this->localeData['p_sign_posn'];
    }

    /**
     * @return the $n_sep_by_space
     */
    function getN_sep_by_space()
    {
        return $this->localeData['n_sep_by_space'];
    }

    /**
     * @return the $n_cs_precedes
     */
    function getN_cs_precedes()
    {
        return $this->localeData['n_cs_precedes'];
    }

    /**
     * @return the $p_sep_by_space
     */
    function getP_sep_by_space()
    {
        return $this->localeData['p_sep_by_space'];
    }

    /**
     * @return the $p_cs_precedes
     */
    function getP_cs_precedes()
    {
        return $this->localeData['p_cs_precedes'];
    }

    /**
     * @return the $frac_digits
     */
    function getFrac_digits()
    {
        return $this->localeData['frac_digits'];
    }

    /**
     * @return the $int_frac_digits
     */
    function getInt_frac_digits()
    {
        return $this->localeData['int_frac_digits'];
    }

    /**
     * @return the $negative_sign
     */
    function getNegative_sign()
    {
        return $this->localeData['negative_sign'];
    }

    /**
     * @return the $positive_sign
     */
    function getPositive_sign()
    {
        return $this->localeData['positive_sign'];
    }

    /**
     * @return the $mon_thousands_sep
     */
    function getMon_thousands_sep()
    {
        return $this->localeData['mon_thousands_sep'];
    }

    /**
     * @return the $mon_decimal_point
     */
    function getMon_decimal_point()
    {
        return $this->localeData['mon_decimal_point'];
    }

    /**
     * @return the $currency_symbol
     */
    function getCurrency_symbol()
    {
        return $this->localeData['currency_symbol'];
    }

    /**
     * @return the $int_curr_symbol
     */
    function getInt_curr_symbol()
    {
        return $this->localeData['int_curr_symbol'];
    }

    /**
     * @return the $thousands_sep
     */
    function getThousands_sep()
    {
        return $this->localeData['thousands_sep'];
    }

    /**
     * @return the $decimal_point
     */
    function getDecimal_point()
    {
        return $this->localeData['decimal_point'];
    }

    /**
     * @return the $language_direction
     */
    function getLanguage_direction()
    {
        return $this->localeData['language_direction'];
    }

    /**
     * @return the $firstweekday
     */
    function getFirstweekday()
    {
        return $this->localeData['firstweekday'];
    }

    /**
     * @return the $timeformat
     */
    function getTimeformat()
    {
        return $this->localeData['timeformat'];
    }

    /**
     * @return the $grouping
     */
    function getGrouping()
    {
        return $this->localeData['grouping'];
    }

    /**
     * @return the $mon_grouping
     */
    function getMon_grouping()
    {
        return $this->localeData['mon_grouping'];
    }
}

