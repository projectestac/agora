<?php

// Email plugin

$string['auth_changingemailaddress'] = 'Vous avez demandé la modification de votre adresse de courriel, de $a->oldemail à $a->newemail. Pour des raisons de sécurité, un message de confirmation vous est envoyé à la nouvelle adresse afin de confirmer qu\'elle vous appartient. Votre adresse de courriel sera modifiée dès que vous aurez cliqué sur l\'URL indiquée dans le message envoyé.'; // Obsolete from 2.0dev onwards, see MDL-19182
$string['auth_emailchangecancel'] = 'Annuler la modification de l\'adresse de courriel';
$string['auth_emailchangepending'] = 'Modification en attente. Veuillez cliquer sur le lien qui vous à été envoyé à l\'adresse $a->preference_newemail.';
$string['auth_emaildescription'] = 'La confirmation par courriel est la méthode d\'authentification par défaut. Lorsqu\'un utilisateur s\'enregistre en choisissant ses nom d\'utilisateur et mot de passe, un message de confirmation est envoyé à son adresse de courriel. Ce message contient un lien sécurisé vers une page Web où il peut confirmer son inscription. Les connexions suivantes ne vérifient que les nom d\'utilisateur et mot de passe précédemment enregistrés dans la base de données de Moodle.';
$string['auth_emailnoemail'] = 'La tentative de vous envoyer un courriel a échoué !';
$string['auth_emailnoinsert'] = 'Impossible d\'ajouter votre enregistrement à la base de données !';
$string['auth_emailnowexists'] = 'L\'adresse de courriel que vous tentez d\'utiliser pour votre profil est déjà attribuée à un autre utilisateur. Votre demande de modification de courriel est donc annulée, mais vous pouvez réessayer avec une adresse différente.';
$string['auth_emailrecaptcha'] = 'Ajoute une confirmation visuelle ou audio aux éléments du formulaire de la page d\'enregistrement pour les utilisateurs s\'enregistrant eux-mêmes avec confirmation par courriel. Ceci permet de protéger votre site contre les spammeurs et contribue en même temps à une cause valable. Voir http://recaptcha.net/learnmore.html pour plus de détails.<br /><em>L\'extension cURL de PHP est requise.</em>';
$string['auth_emailrecaptcha_key'] = 'Activer reCAPTCHA';
$string['auth_emailsettings'] = 'Réglages';
$string['auth_emailtitle'] = 'Auto-enregistrement par courriel';
$string['auth_emailupdatemessage'] = 'Bonjour,

Vous avez demandé la modification de votre adresse de courriel pour votre compte utilisateur sur $a->site. Veuillez cliquer sur l\'URL ci-dessous afin de confirmer la modification.

$a->url';
$string['auth_emailupdatetitle'] = 'Confirmation de modification de courriel sur $a->site';
$string['auth_emailupdatesuccess'] = 'L\'adresse de courriel de votre compte <em>$a->fullname</em> a été modifiée. L\'adresse est maintenant <em>$a->email</em>.';
$string['auth_emailupdate'] = 'Modification d\'adresse de courriel';
$string['auth_invalidnewemailkey'] = 'Erreur : si vous avez tenté de confirmer la modification de votre adresse de courriel, il se peut que vous ayez fait une erreur lors de la copie de l\'URL qui vous a été envoyé. Veuillez essayer à nouveau.';
$string['auth_outofnewemailupdateattempts'] = 'Le nombre de tentatives permises pour modifier votre adresse de courriel est dépassé. Votre demande de modification a été annulée.';
