<?php
/**
 * formicula - the contact mailer for Zikula
 * -----------------------------------------
 *
 * @copyright  (c) formicula Development Team
 * @link       https://github.com/landseer/Formicula
 * @license    GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author     Frank Schummertz <frank@zikula.org>
 * @package    Third_Party_Components
 * @subpackage Formicula
 */

/**
 * simplecaptcha plugin
 * adds a simplecaptcha image to a form
 *
 * based on imagetext (c) guite.de which is
 * based on imagetext (c) Christoph Erdmann <mail@cerdmann.com>
 *
 *@params font
 *@params size
 *@params bgcolor
 *@params fgcolor
 */

//if (!isset($smarty->imagetextcount)) $smarty->imagetextcount = 0;

function smarty_function_simplecaptcha($params, &$smarty)
{
     // check which image types are supported
    $freetype = function_exists('imagettfbbox');
    if($freetype && (imagetypes() && IMG_PNG)) {
        $imagetype = '.png';
        $createimagefunction = 'imagepng';
    } elseif($freetype && (imagetypes() && IMG_JPG)) {
        $imagetype = '.jpg';
        $createimagefunction = 'imagejpeg';
    } elseif($freetype && (imagetypes() && IMG_GIF)) {
        $imagetype = '.gif';
        $createimagefunction = 'imagegif';
    } else {
        // no image functions available
        ModUtil::setVar('Formicula', 'spamcheck', 0);
        if(SecurityUtil::checkPermission('Formicula::', '.*', ACCESS_ADMIN)) {
            // admin permission, show error messages
            return $this->__('no image function available - captcha deactivated');
        } else {
            // return silently
            return;
        }
    }

    // catch wrong input
    if (empty($params['font'])) {
        $smarty->trigger_error("simplecaptcha: missing 'font' parameter");
        return;
    }
    $params['font'] = DataUtil::formatForOS('modules/Formicula/images/' . $params['font'] . '.ttf');
    if(!file_exists($params['font']) || !is_readable($params['font'])) {
        $smarty->trigger_error('simplecaptcha: missing font ' . DataUtil::formatForDisplay($params['font']));
        return;
    }
    if (empty($params['size'])) {
        $smarty->trigger_error("simplecaptcha: missing 'size' parameter");
        return;
    }
    if (empty($params['bgcolor'])) {
        $smarty->trigger_error("simplecaptcha: missing 'bgcolor' parameter");
        return;
    }
    if (empty($params['fgcolor'])) {
        $smarty->trigger_error("simplecaptcha: missing 'fgcolor' parameter");
        return;
    }

    srand ((double)microtime()*1000000);
    $x = rand(1,10); /* 1 to 10 */
    $y = rand(1,10); /* 1 to 10 */
    $z = rand(0,1);  /* 0=+, 1=- */
    if(($z==1) && ($y==$x)) {
        // turn minus into plus when x=y
        $z=0;
    }
    if(($z==1) && ($y>$x)) {
        // make sure that x>y if z=1 (minus)
        $a=$x; $x=$y; $y=$a;
    }

    $m = array('+', '-');
    SessionUtil::setVar('formicula_captcha', serialize(compact('x', 'y', 'z')));

    // create the text for the image
    $params['text'] = $x . ' ' . $m[$z] . ' ' . $y . ' =';

    // has params for cache filename
    $hash = hash('sha256', implode('', $params));
    // create uri of image
    $temp = System::getVar('temp');
    if(StringUtil::right($temp, 1) <> '/') {
        $temp .= '/';
    }
    $imgurl = $temp . 'formicula_cache/' . $hash . $imagetype;

    if(!file_exists($imgurl)) {
        // we create a larger picture than needed, this makes it looking better at the end
        $multi = 4;
        // get the textsize in the image
        $bbox = imagettfbbox ($params['size'] * $multi, 0, $params['font'], $params['text']);
        $xcorr = 0 - $bbox[6]; // northwest X
        $ycorr = 0 - $bbox[7]; // northwest Y
        $box['left'] = $bbox[6] + $xcorr;
        $box['height'] = abs($bbox[5]) + abs($bbox[1]);
        $box['width'] = abs($bbox[2]) + abs($bbox[0]);
        $box['top'] = abs($bbox[5]);

        // create the image
        $im = imagecreate ($box['width'], $box['height']);

        $bgcolor = fromhex($im, $params['bgcolor']);
        $fgcolor = fromhex($im, $params['fgcolor']);

        // add the text to the image
        imagettftext ($im, $params['size'] * $multi, 0, $box['left'], $box['top'], $fgcolor, $params['font'], $params['text']);

        // resize the image now
        $finalwidth  = round($box['width'] / $multi);
        $finalheight = round($box['height'] / $multi);
        $ds = imagecreatetruecolor ($finalwidth, $finalheight);

        $bgcolor2 = fromhex($ds,$params['bgcolor']);
        imageFill($ds, 0, 0, $bgcolor2);
        imagecopyresampled($ds, $im, 0, $box['left'], 0, 0, $box['width'] / $multi, $box['height'] / $multi, $box['width'], $box['height']);
        imagetruecolortopalette($ds, 0, 256);
        imagepalettecopy($ds, $im);
        ImageColorTransparent($ds, $bgcolor);

        // write the file
        $createimagefunction($ds, $imgurl);
        ImageDestroy ($im);
        ImageDestroy ($ds);
    } else {
        // file already exists, calculate image size
        $imgdata = getimagesize($imgurl);
        $finalwidth  = $imgdata[0];
        $finalheight = $imgdata[1];
    }

    // If the imgurl starts with / we assume that ztemp is pointing to an absolute path which
    // is outside the webservers root. In this case we have to use a function to show the image instead
    // of loading the image directly
    if(StringUtil::left(System::getVar('temp'), 1) == '/') {
        return '<img src="' . DataUtil::formatForDisplay(ModUtil::url('Formicula', 'user', 'getimage', array('img' => $hash . $imagetype), null, null, true)) . '" alt="" width="' . $finalwidth . '" height="' . $finalheight .'" />';
    } else {
        return '<img src="' . $imgurl . '" alt="" width="' . $finalwidth . '" height="' . $finalheight .'" />';
    }
}

// get the rgb values form the hex color value
if (!function_exists('fromhex')) {
    function fromhex($image,$string) {
        sscanf($string, "%2x%2x%2x", $red, $green, $blue);
        return ImageColorAllocate($image, $red, $green, $blue);
    }
}
