<?php
/**
 * Zikula Application Framework
 *
 * @copyright Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: ZI18n.php 27278 2009-10-30 16:04:49Z drak $
 * @license GNU/LGPL - http://www.gnu.org/copyleft/lgpl.html
 * @author Drak drak@zikula.org
 * @package Zikula_Core

 **
 * ZI18n
 */
class ZI18n
{
    // public properties
    var $locale;
    var $sign;
    var $sign_posn;
    var $sep_by_space;
    var $cs_precedes;

    // public function __construct() { }


    function ZI18n($locale)
    {
        $this->locale = new ZLocale($locale);
    }

    function &getInstance($locale=null)
    {
        static $instance;
        if (!isset($locale)) {
            $locale = ZLanguage::getLanguageCode();
        }
        if (!isset($instance[$locale])) {
            $instance[$locale] = new ZI18n($locale);
        }
        return $instance[$locale];
    }

    /**
     * transform a given currency into an internal number
     * @param $number
     * @return unknown_type
     */
    function transformCurrencyInternal($number)
    {
        $number = (string)$number;
        $number = str_replace(' ', '', $number);
        $number = str_replace($this->locale->getCurrency_symbol(), '', $number);
        $number = str_replace($this->locale->getMon_thousands_sep(), '', $number);
        $number = str_replace($this->locale->getMon_decimal_point(), '.', $number);
        return (float)$number;
    }

    /**
     * transform a number into internal form with . as decimal
     *
     * @param $number
     * @return float
     */
    function transformNumberInternal($number)
    {
        $number = (string)$number;
        $number = str_replace(' ', '', $number);
        $number = str_replace($this->locale->getThousands_sep(), '', $number);
        $number = str_replace($this->locale->getDecimal_point(), '.', $number);
        return (float)$number;
    }

    /**
     * Format a number for display
     *
     * @param $number
     * @param $decimal_points null=default locale, false=precision, int=precision
     * @return unknown_type
     */
    function transformNumberDisplay($number, $decimal_points=null)
    {
        $this->processSign($number);
        $decimal_points = (isset($decimal_points) ? $decimal_points : $this->locale->getFrac_digits());
        if (!$decimal_points) {
            list($a, $b) = explode('.', $number);
            $decimal_points = strlen($b);
        }
        // Number format:
        $number = number_format(abs($number), $decimal_points, $this->locale->getDecimal_point(), $this->locale->getThousands_sep());

        switch ($this->sign_posn) {
            case 0:
                $number = "($number)";
                break;
            case 1:
                $number = "$this->sign{$number}";
                break;
            case 2:
                $number = "{$number}$this->sign";
                break;
            case 3:
                $number = "$this->sign{$number}";
                break;
            case 4:
                $number = "{$number}$this->sign";
                break;
            default:
                $number = "$number [error sign_posn=$this->sign_posn]";
        }

        return $number;
    }

    /**
     * format a number in monetary terms
     * @param $number
     * @return unknown_type
     */
    function transformCurrencyDisplay($number)
    {
        $this->processSign($number);
        $number = number_format(abs($number), $this->locale->getFrac_digits(), $this->locale->getMon_decimal_point(), $this->locale->getMon_thousands_sep());
        $space = ($this->sep_by_space ? ' ' : '');
        $number = $this->cs_precedes ? $this->locale->getCurrency_symbol()."$space$number" : "$number$space".$this->locale->getCurrency_symbol();

        switch ($this->sign_posn) {
            case 0:
                $number = "($number)";
                break;
            case 1:
                $number = "$this->sign{$number}";
                break;
            case 2:
                $number = "{$number}$this->sign";
                break;
            case 3:
                $number = "$this->sign{$number}";
                break;
            case 4:
                $number = "{$number}$this->sign";
                break;
            default:
                $number = "$number [error sign_posn=$this->sign_posn]";
        }

        return $number;
    }


    /**
     * Process the positive or negative sign for a number
     * @param $number
     * @return unknown_type
     */
    function processSign($number)
    {
        if ($number >= 0) {
            $this->sign = $this->locale->getPositive_sign();
            $this->sign_posn = $this->locale->getP_sign_posn();
            $this->sep_by_space = $this->locale->getP_sep_by_space();
            $this->cs_precedes = $this->locale->getP_cs_precedes();
        } else {
            $this->sign = $this->locale->getNegative_sign();
            $this->sign_posn = $this->locale->getN_sign_posn();
            $this->sep_by_space = $this->locale->getN_sep_by_space();
            $this->cs_precedes = $this->locale->getN_cs_precedes();
        }
    }
}