<?php // $Id: slideshow.php,v 1.1.2.2 2010/09/01 21:00:04 arborrow Exp $ 

//translators:  You might want to leave the first two items 'as is' in English
$string['modulename'] = 'Diaporama';
$string['modulenameplural'] = 'Diaporamas';

// for mod.html
$string['chooseapacket'] = 'Choisir un dossier';
$string['coursepacket'] = 'Dossier du diaporama';
$string['maindirectory'] = 'Dossier des fichiers principaux';
$string['no_GD_no_thumbs'] = 'L\'extension GD pour PHP n\est pas installée. Aucune vignette ne sera créée.';
$string['display_filename'] = 'Afficher le nom de fichier/la légende&nbsp;?';
$string['display_none'] = 'aucune';
$string['display_over'] = 'au-dessus de l\'image';
$string['display_under'] = 'en dessous de l\'image';
$string['display_right'] = 'à droite de l\'image';
$string['thumbnail_layout'] = 'Position de vignettes :';
$string['onblack'] = 'Fond d\'écran en noir ?';
$string['centred'] = 'Centrer ?';
$string['showtime'] = 'Délais du diaporama :';
$string['noautoplay'] = 'Pas de démarrage automatique';

// for view.php
$string['none_found'] = 'Aucune image JPG dans le dossier ';
$string['dir_problem'] = 'Problème avec le dossier indiqué';
$string['open_new'] = 'Ouvrir dans une nouvelle fenêtre, pour impression';
$string['warning'] = 'ATTENTION&nbsp;!!!';
$string['files_too_big'] = '<p>Le(s) fichier(s) indiqués ci-dessous sont très gros. Les images seront visibles, mais prendront du temps à être chargées, notamment pour les utilisateurs avec une faible ligne.</p><p>Il serait judicieux de compresser et/ou de réduire la résolution et la taille des fichiers à moins de ';
$string['recompress'] = 'Recompresser les fichiers';
$string['edit_captions'] = 'Modifier les légendes';
$string['original_exists'] = 'L\'original existe déjà dans ';
$string['original_moved'] = 'Original déplacé vers ';
$string['original_deleted'] = 'Original effacé.';

// for captions.php
$string['captiontext'] = 'Pour rendre permanent l\'affichage des légendes, veuillez utiliser le bouton «&nbsp;Enregistrer les modification&nbsp;» au bas de cette page.';
//$string['captionedit'] = 'Modification de la légende de ';
$string['save_changes'] = 'Enregistrer les modifications';
$string['saved'] = 'Les légendes ont été enregistrées.';
$string['continue'] = 'Continuer';
$string['autopopup'] = 'Diaporama automatique dans une nouvelle fenêtre';
$string['caption'] = 'égende';
$string['title'] = 'Titre';

// for config.html
$string['configmaxbytes'] = 'Taille maximum permises des fichiers (Kb) avant que les images ne soient redimensionnées et enregistrées';
$string['configmaxwidth'] = 'Largeur maximum des images (en pixels)';
$string['configmaxheight'] = 'Hauteur maximum des images (en pixels)';
$string['keeporiginals'] = 'Si les originaux sont conservés, l\'image originale sera copiée dans un dossier séparé lorsqu\'elle est redimensionnée. Sinon, seules les version redimensionnées des images sont conservées pour économiser l\'espace disque du serveur.';
?>