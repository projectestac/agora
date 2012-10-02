<?php // $Id: portfolio_boxnet.php,v 1.8 2009/04/10 19:28:53 martignoni Exp $

$string['apikey'] = 'Clef API';
$string['apikeyhelp'] = 'Vous obtiendrez cette clef en vous inscrivant sur le site enabled.box.net et en ajoutant application. L\' URL de <i>callback</i> doit être votre_wwwroot/portfolio/add.php?postcontrol=1';
$string['apikeyinlinehelp'] = '<p>Pour configurer Box.net, visitez <a href=\"http://enabled.box.net/my-projects\">enabled.box.net</a> et connectez-vous.</p><p>Pour chaque site Moodle, vous devrez créer un nouveau projet sous l\'onglet My Projects.</p><p>Le seul réglage important est l\'url de rappel (callback), qui doit être $a. Vous pouvez renseigner à votre guise les autres réglages. Il ne vous reste alors qu\'à enregistrer et voilà !';
$string['err_noapikey'] = 'Aucune clef API n\'est configurée pour ce plugin. Vous pouvez en obtenir une à l\'adresse  http://enabled.box.net';
$string['existingfolder'] = 'Dossier existant dans lequel placer le(s) fichier(s)';
$string['folderclash'] = 'Le dossier dont vous avez demandé la création existe déjà !';
$string['foldercreatefailed'] = 'Échec de la création de votre dossier cible sur box.net';
$string['folderlistfailed'] = 'Échec de la récupération de la liste des fichiers d\'un dossier sur box.net';
$string['newfolder']  = 'Nouveau dossier dans lequel placer le(s) fichier(s)';
$string['noauthtoken'] = 'Impossible de récupérer un jeton d\authentification à utiliser dans cette session';
$string['noticket'] = 'Impossible de récupérer un ticket sur box.net pour initier la session d\'authentification';
$string['notarget'] = 'Vous devez indiquer soit un dossier existant soit un dossier à créer vers lequel déposer les données';
$string['password'] = 'Votre mot de passe box.net (ne sera pas enregistré)';
$string['pluginname'] = 'Stockage internet Box.net';
$string['sendfailed'] = 'Échec de l\'envoi de contenu vers box.net : $a';
$string['sharedfolder'] = 'Partagé';
$string['sharefile'] = 'Partager ce fichier ?';
$string['sharefolder'] = 'Partager ce nouveau dossier ?';
$string['targetfolder'] = 'Dossier cible';
$string['tobecreated'] = 'À créer';
$string['username'] = 'Votre nom d\'utilisateur box.net (ne sera pas enregistré)';

?>
