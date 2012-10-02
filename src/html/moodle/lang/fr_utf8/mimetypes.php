<?php // $Id: mimetypes.php,v 1.3 2006/03/16 08:27:19 martignoni Exp $

// These should be accessed using get_mimetype_description in filelib.php.
// They correspond to a (currently small) subset of the MIME types that Moodle
// supports, which are also listed in filelib.php. Descriptions for other types
// should be added here.

// Style: initial lower-case letter, except as required for product names etc.
  
$string['text/plain'] = 'fichier texte';
$string['application/pdf'] = 'document PDF';
$string['application/msword'] = 'document Word';
$string['text/rtf'] = 'document RTF';
$string['application/vnd.ms-excel'] = 'feuille de calcul Excel';
$string['audio/wav'] = 'fichier audio';
$string['audio/mp3'] = 'fichier audio MP3';
$string['application/vnd.ms-powerpoint'] = 'présentation Powerpoint';
$string['application/zip'] = 'archive ZIP';
$string['image/jpeg'] = 'image JPEG';
$string['image/gif'] = 'image GIF';
$string['image/bmp'] = 'image BMP non compressée';

// Moodle default MIME type used for all types not described 
$string['document/unknown'] = 'fichier'; 

?>
