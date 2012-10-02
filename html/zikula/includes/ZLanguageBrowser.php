<?php
/*
 * convert information in 'Accept-*' headers to
 * gettext language identifiers.
 * @copyright (c) 2003, Wouter Verhelst <wouter@debian.org>
 * @license GNU/GPL
 * @author Wouter Verhelst <wouter@debian.org>
 * @author Dominic Chambers <dominic@encasa.com>
 *
 * Usage:
 *
 *  $locale=al2gt(<array of supported languages/charsets in gettext syntax>,
 *                <MIME type of document>);
 *  setlocale('LC_ALL', $locale); // or 'LC_MESSAGES', or whatever...
 *
 * Example:
 *
 *  $langs=array('nl_BE.ISO-8859-15','nl_BE.UTF-8','en_US.UTF-8','en_GB.UTF-8');
 *  $locale=al2gt($langs, 'text/html');
 *  setlocale('LC_ALL', $locale);
 *
 * Note that this will send out header information (to be
 * RFC2616-compliant), so it must be called before anything is sent to
 * the user.
 *
 * Assumptions made:
 * * Charset encodings are written the same way as the Accept-Charset
 *   HTTP header specifies them (RFC2616), except that they're parsed
 *   case-insensitive.
 * * Country codes and language codes are the same in both gettext and
 *   the Accept-Language syntax (except for the case differences, which
 *   are dealt with easily). If not, some input may be ignored.
 * * The provided gettext-strings are fully qualified; i.e., no "en_US";
 *   always "en_US.ISO-8859-15" or "en_US.UTF-8", or whichever has been
 *   used. "en.ISO-8859-15" is OK, though.
 * * The language is more important than the charset; i.e., if the
 *   following is given:
 *
 *   Accept-Language: nl-be, nl;q=0.8, en-us;q=0.5, en;q=0.3
 *   Accept-Charset: ISO-8859-15, utf-8;q=0.5
 *
 *   And the supplied parameter contains (amongst others) nl_BE.UTF-8
 *   and nl.ISO-8859-15, then nl_BE.UTF-8 will be picked.
 */
class ZLanguageBrowser
{
    var $available;
    //function __construct() {}


    function ZLanguageBrowser($langList)
    {
        $this->available = $langList;
    }

    function discover()
    {
        $match = $this->getPreferredLanguage();
        return (empty($match) ? false : $match);
    }

    function getPreferredLanguage()
    {
        $langsList = $this->available;
        // default to 'everything is acceptable', as RFC2616 specifies
        $acceptLang = ((!isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) || $_SERVER['HTTP_ACCEPT_LANGUAGE'] == '') ? '*' : $_SERVER['HTTP_ACCEPT_LANGUAGE']);
        $alparts = preg_split('/,/', $acceptLang);

        // Parse the contents of the Accept-Language header.
        foreach ($alparts as $part) {
            $part = trim($part);
            if (preg_match('/;/', $part)) {
                $lang = preg_split('/;/', $part);
                $score = preg_split('/=/', $lang[1]);
                $alscores[$lang[0]] = $score[1];
            } else {
                $alscores[$part] = 1;
            }
        }

        // Parse the contents of the Accept-Language header.
        // RFC2616: ``If no "*" is present in an Accept-Charset field, then
        // all character sets not explicitly mentioned get a quality value of
        // 0, except for ISO-8859-1, which gets a quality value of 1 if not
        // explicitly mentioned.''
        $acceptChar = ((!isset($_SERVER['HTTP_ACCEPT_CHARSET']) || $_SERVER['HTTP_ACCEPT_CHARSET'] == '') ? '*' : $_SERVER['HTTP_ACCEPT_CHARSET']);
        $acparts = preg_split('/,/', $acceptChar);
        $acscores['ISO-8859-1'] = 2;

        foreach ($acparts as $part) {
            $part = trim($part);
            if (preg_match('/;/', $part)) {
                $cs = preg_split('/;/', $part);
                $score = preg_split('/=/', $cs[1]);
                $acscores[strtoupper($cs[0])] = $score[1];
            } else {
                $acscores[strtoupper($part)] = 1;
            }
        }
        if ($acscores['ISO-8859-1'] == 2) {
            $acscores['ISO-8859-1'] = (isset($acscores['*']) ? $acscores['*'] : 1);
        }

        // Loop through the available languages/encodings, and pick the one
        // with the highest score, excluding the ones with a charset the user
        // did not include.
        $curlscore = 0;
        $curcscore = 0;
        $curgtlang = NULL;
        foreach ($langsList as $lang) {

            $tmp1 = preg_replace('/\_/', '-', $lang);
            $tmp2 = preg_split('/\./', $tmp1);
            $allang = strtolower($tmp2[0]);
            @$gtcs = strtoupper($tmp2[1]);
            $noct = preg_split('/-/', $allang);

            @$testvals = array(array($alscores[$allang], $acscores[$gtcs]), array($alscores[$noct[0]], $acscores[$gtcs]), array($alscores[$allang], $acscores['*']), array($alscores[$noct[0]], $acscores['*']), array($alscores['*'], $acscores[$gtcs]),
                    array($alscores['*'], $acscores['*']));

            @$testvals = array(array($alscores[$allang], $acscores[$gtcs]), array($alscores[$noct[0]], $acscores[$gtcs]), array($alscores[$allang], $acscores['*']), array($alscores[$noct[0]], $acscores['*']), array($alscores['*'], $acscores[$gtcs]),
                    array($alscores['*'], $acscores['*']));

            $found = false;
            foreach ($testvals as $tval) {
                if (!$found && isset($tval[0]) && isset($tval[1])) {
                    $arr = $this->find_match($curlscore, $curcscore, $curgtlang, $tval[0], $tval[1], $lang);
                    $curlscore = $arr[0];
                    $curcscore = $arr[1];
                    $curgtlang = $arr[2];
                    $found = true;
                }
            }
        }

        // We must re-parse the gettext-string now, since we may have found it through a "*" qualifier.
        $gtparts = preg_split('/\./', $curgtlang);
        $tmp = strtolower($gtparts[0]);
        $lang = preg_replace('/\_/', '-', $tmp);
        @$charset = $gtparts[1];

        return $curgtlang;
    }

    // private
    function find_match($curlscore, $curcscore, $curgtlang, $langval, $charval, $lang)
    {
        if ($curlscore < $langval) {
            $curlscore = $langval;
            $curcscore = $charval;
            $curgtlang = $lang;
        } else if ($curlscore == $langval) {
            if ($curcscore < $charval) {
                $curcscore = $charval;
                $curgtlang = $lang;
            }
        }
        return array($curlscore, $curcscore, $curgtlang);
    }

}