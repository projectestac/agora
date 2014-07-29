<?php

function decode_html_entities($xml) {
    $htmlentitiestable = get_html_translation_table(HTML_ENTITIES, ENT_QUOTES, 'UTF-8');
    $xmlentitiestable = get_html_translation_table(HTML_SPECIALCHARS , ENT_COMPAT, 'UTF-8');
    $entitiestable = array_diff($htmlentitiestable, $xmlentitiestable);
    $decodetable = array_flip($entitiestable);
    $xml = str_replace(array_keys($decodetable), array_values($decodetable), $xml);
    return $xml;
}

function wrsqz_mathmlDecode($input) {
    $from = array('«', '»', '¨', '§', '`');
    $to = array('<', '>', '"', '&', '\'');
    $r = str_replace($from, $to, $input);
    return decode_html_entities($r);
}
?>
