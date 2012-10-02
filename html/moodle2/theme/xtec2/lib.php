<?php

/**
 * This is the postprocess function for the theme
 *
 * @param string $css Incoming CSS to process
 * @param stdClass $theme The theme object
 * @return string The processed CSS
 */
function xtec2_process_css($css, $theme) {

    global $OUTPUT;
    
    // Configure site logo
    if (!empty($theme->settings->logourl)) {
        $logourl = $theme->settings->logourl;
    } else {
        $logourl = $OUTPUT->pix_url('theme/top', 'theme'); // Default value
    }
    $css = str_replace('[[setting:logourl]]', $logourl, $css);


    // Set the font size
    if (!empty($theme->settings->fontsize)) {
        $fontsize = $theme->settings->fontsize;
    } else {
        $fontsize = 'mitjana'; // Default value
    }
    switch ($fontsize) {
        case 'moltpetita':
            $fontsize = '10px';
            break;
        case 'petita':
            $fontsize = '12px';
            break;
        case 'mitjana':
            $fontsize = '14px';
            break;
        case 'gran':
            $fontsize = '16px';
            break;
        case 'moltgran':
            $fontsize = '18px';
            break;
    }
    $css = str_replace('[[setting:fontsize]]', $fontsize, $css);


    // Set the font style
    if (!empty($theme->settings->fontstyle)) {
        $fontstyle = $theme->settings->fontstyle;
    } else {
        $fontstyle = 'normal'; // Default value
    }
    switch ($fontstyle) {
        case 'normal':
            $fontstyle = 'font-family: arial, helvetica, clean, sans-serif;';
            break;
        case 'lligada':
            $fontstyle = 'font-family: Abecedario;';
            break;
        case 'majuscules':
            $fontstyle = 'text-transform: uppercase';
            break;
    }
    $css = str_replace('[[setting:fontstyle]]', $fontstyle, $css);


    // Configure import CSS
    if (!empty($theme->settings->importcss)) {
        $importcss = "@import url('" . $theme->settings->importcss . "');";
    } else {
        $importcss = ''; // Default value
    }
    $css = str_replace('[[setting:importcss]]', $importcss, $css);


    // Get extra css from theme settings
    if (!empty($theme->settings->customcss)) {
        $customcss = $theme->settings->customcss;
    } else {
        $customcss = ''; // Default value
    }
    $css = str_replace('[[setting:customcss]]', $customcss, $css);

    
    // Set color1
    if (!empty($theme->settings->color1)) {
        $color1 = $theme->settings->color1;
    } else {
        $color1 = '#AC2013'; // Default value
    }
    $css = str_replace('[[setting:color1]]', $color1, $css);


    // Set color2
    if (!empty($theme->settings->color2)) {
        $color2 = $theme->settings->color2;
    } else {
        $color2 = '#AC2013'; // Default value
    }
    $css = str_replace('[[setting:color2]]', $color2, $css);


    // Set color3
    if (!empty($theme->settings->color3)) {
        $color3 = $theme->settings->color3;
    } else {
        $color3 = '#FFFFFF'; // Default value
    }
    $css = str_replace('[[setting:color3]]', $color3, $css);


    // Set color4
    if (!empty($theme->settings->color4)) {
        $color4 = $theme->settings->color4;
    } else {
        $color4 = '#303030'; // Default value
    }
    $css = str_replace('[[setting:color4]]', $color4, $css);


    // Set color5
    if (!empty($theme->settings->color5)) {
        $color5 = $theme->settings->color5;
    } else {
        $color5 = '#AC2013'; // Default value
    }
    $css = str_replace('[[setting:color5]]', $color5, $css);


    // Set color6
    if (!empty($theme->settings->color6)) {
        $color6 = $theme->settings->color6;
    } else {
        $color6 = '#D0D0D0'; // Default value
    }
    $css = str_replace('[[setting:color6]]', $color6, $css);


    
    return $css;
}

