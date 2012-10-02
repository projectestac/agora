<?php

// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Strings for component 'auth', language 'fr', branch 'MOODLE_23_STABLE'
 *
 * @package   auth
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actauthhdr'] = 'Plugins d\'authentification disponibles';
$string['alternatelogin'] = 'Si vous spécifiez ici une URL, elle sera utilisée comme page de connexion pour ce site. La page doit contenir un formulaire dont la propriété « action » est <strong>{$a}</strong> et doit contenir les champs <strong>username</strong> et <strong>password</strong>.<br />Attention à donner une URL correcte, sans quoi vous risquez de ne plus pouvoir accéder au site.<br />Pour utiliser la page de connexion par défaut, laissez ce champ vide.';
$string['alternateloginurl'] = 'URL de la page de connexion de rechange';
$string['auth_changepasswordhelp'] = 'Aide au changement de mot de passe';
$string['auth_changepasswordhelp_expl'] = 'Affiche des explications concernant la récupération de mot de passe à l\'attention des utilisateurs ayant perdu leur mot de passe {$a}. Ce texte sera affiché soit en même temps, soit à la place de l\'<strong>URL du changement de mot de passe</strong> ou du changement interne de mot de passe de Moodle.';
$string['auth_changepasswordurl'] = 'URL du changement de mot de passe';
$string['auth_changepasswordurl_expl'] = 'Indiquez l\'adresse URL vers laquelle diriger les utilisateurs ayant perdu leur mot de passe {$a}. Désactivez l\'option <strong>Utiliser la page de changement de mot de passe standard</strong>.';
$string['auth_changingemailaddress'] = 'Vous avez demandé la modification de votre adresse de courriel, de {$a->oldemail} à {$a->newemail}. Pour des raisons de sécurité, un message de confirmation vous est envoyé à la nouvelle adresse afin de confirmer qu\'elle vous appartient. Votre adresse de courriel sera modifiée dès que vous aurez cliqué sur l\'URL indiquée dans le message envoyé.';
$string['auth_common_settings'] = 'Réglages partagés';
$string['auth_data_mapping'] = 'Appariement des données';
$string['authenticationoptions'] = 'Options d\'authentification';
$string['auth_fieldlock'] = 'Verrouillage';
$string['auth_fieldlock_expl'] = '<p><strong>Verrouiller cette valeur :</strong> si cette option est activée, elle empêchera les utilisateurs et les administrateurs de modifier le champ directement. Utilisez cette option si vous maintenez ces données dans le système d\'authentification externe.</p>';
$string['auth_fieldlocks'] = 'Verrouiller les champs utilisateur';
$string['auth_fieldlocks_help'] = '<p>Vous pouvez verrouiller des champs utilisateurs. Ceci est utile sur les sites où les données des utilisateurs sont gérées manuellement par les administrateurs (en modifiant manuellement les enregistrements des utilisateurs) ou en utilisant l\'option « Importer des utilisateurs ». Si vous verrouillez des champs requis par Moodle, assurez-vous que vous fournissez les données en question lors de la création des comptes, sans quoi ceux-ci seront inutilisables.</p><p>Pour éviter ce problème, vous pouvez choisir comme mode de verrouillage « Déverrouillé si vide ».</p>';
$string['authinstructions'] = 'Laisser vide pour les instructions de connexion par défaut. Si vous voulez indiquer des instructions de connexion propres à votre institution, saisissez-les ici.';
$string['auth_invalidnewemailkey'] = 'Erreur : si vous avez tenté de confirmer la modification de votre adresse de courriel, il se peut que vous ayez fait une erreur lors de la copie de l\'URL qui vous a été envoyé. Veuillez essayer à nouveau.';
$string['auth_multiplehosts'] = 'Vous pouvez indiquer ici plusieurs hôtes ou adresses IP (par exemple host1.com;host2.com;host3.com ou 192.168.1.100;172.23.92.1)';
$string['auth_outofnewemailupdateattempts'] = 'Le nombre de tentatives permises pour modifier votre adresse de courriel est dépassé. Votre demande de modification a été annulée.';
$string['auth_passwordisexpired'] = 'Votre mot de passe est échu. Voulez-vous le changer maintenant ?';
$string['auth_passwordwillexpire'] = 'Votre mot de passe arrivera à échéance dans {$a} jours. Voulez-vous changer votre mot de passe maintenant ?';
$string['auth_remove_delete'] = 'Supprimer complètement l\'utilisateur interne';
$string['auth_remove_keep'] = 'Conserver comme utilisateur interne';
$string['auth_remove_suspend'] = 'Désactiver l\'utilisateur interne';
$string['auth_remove_user'] = 'Indiquer la procédure à effectuer durant une synchronisation avec un compte utilisateur interne lorsque le compte a été retiré de la source d\'authentification externe. Seuls les utilisateurs désactivés sont automatiquement réactivés quand ils réapparaissent dans la source externe.';
$string['auth_remove_user_key'] = 'Utilisateur externe supprimé';
$string['auth_sync_script'] = 'Script cron de synchronisation';
$string['auth_updatelocal'] = 'Mise à jour des données locales';
$string['auth_updatelocal_expl'] = '<p><strong>Mise à jour des données locales :</strong> lorsque cette option est activée, le champ est mis à jour (depuis la source externe) chaque fois que l\'utilisateur se connecte ou qu\'une synchronisation a lieu. Les champs destinés à être mis à jour ainsi devraient être verrouillés.</p>';
$string['auth_updateremote'] = 'Mise à jour des données externes';
$string['auth_updateremote_expl'] = '<p><strong>Mise à jour des données externes :</strong> lorsque cette option est activée, la source d\'authentification externe est mise à jour chaque fois que les données de l\'utilisateur le sont. Pour permettre leur modification, les champs devraient être déverrouillés.</p>';
$string['auth_updateremote_ldap'] = '<p><strong>Remarque :</strong> la mise à jour externe des données LDAP nécessite de fixer pour tous les enregistrements les valeurs binddn et bindpw à un utilisateur-lien avec des privilèges de modification. Elle ne conserve pas les attributs à plusieurs valeurs et supprimera les valeurs en trop lors des mises à jour.</p>';
$string['auth_user_create'] = 'Activer la création des utilisateurs';
$string['auth_user_creation'] = 'Les nouveaux utilisateurs (anonymes) peuvent créer des comptes sur la source d\'authentification externe, avec confirmation par courriel. Ne pas oublier de configurer les éventuelles options dans les différents modules lors de l\'activation de cette possibilité.';
$string['auth_usernameexists'] = 'Ce nom d\'utilisateur existe déjà. Veuillez en choisir un autre.';
$string['auto_add_remote_users'] = 'Ajouter automatiquement les utilisateurs distants';
$string['changepassword'] = 'URL de la page de changement du mot de passe';
$string['changepasswordhelp'] = 'Vous pouvez indiquer dans cette zone l\'URL d\'une page sur laquelle vos utilisateurs pourront récupérer ou changer leurs nom d\'utilisateur et mot de passe s\'ils les ont oubliés. Cette URL sera disponible sous forme d\'un bouton sur la page de connexion. Si cette zone est vide, ce bouton ne sera pas affiché.';
$string['chooseauthmethod'] = 'Choisir une méthode d\'authentification';
$string['chooseauthmethod_help'] = 'Ce réglage détermine la méthode d\'authentification utilisée lorsque l\'utilisateur se connecte. Seules les plugins d\'authentification activés doivent être sélectionnés, faute de quoi l\'utilisateur ne pourra pas se connecter. Pour empêcher la connexion d\'un utilisateur, choisissez « Pas de connexion ».';
$string['createpasswordifneeded'] = 'Créer un mot de passe si nécessaire';
$string['emailchangecancel'] = 'Annuler la modification de l\'adresse de courriel';
$string['emailchangepending'] = 'Modification en attente. Veuillez cliquer sur le lien qui vous à été envoyé à l\'adresse {$a->preference_newemail}.';
$string['emailnowexists'] = 'L\'adresse de courriel que vous tentez d\'utiliser pour votre profil est déjà attribuée à un autre utilisateur. Votre demande de modification de courriel est donc annulée, mais vous pouvez réessayer avec une adresse différente.';
$string['emailupdate'] = 'Modification d\'adresse de courriel';
$string['emailupdatemessage'] = 'Bonjour,

Vous avez demandé la modification de votre adresse de courriel pour votre compte utilisateur sur {$a->site}. Veuillez cliquer sur l\'URL ci-dessous afin de confirmer la modification.

{$a->url}';
$string['emailupdatesuccess'] = 'L\'adresse de courriel de votre compte <em>{$a->fullname}</em> a été modifiée. L\'adresse est maintenant <em>{$a->email}</em>.';
$string['emailupdatetitle'] = 'Confirmation de modification de courriel sur {$a->site}';
$string['enterthenumbersyouhear'] = 'Tapez les chiffres que vous entendez';
$string['enterthewordsabove'] = 'Tapez les mots ci-dessus';
$string['errormaxconsecutiveidentchars'] = 'Les mots de passe doivent comporter au plus {$a} caractères identiques consécutifs.';
$string['errorminpassworddigits'] = 'Les mots de passe doivent comporter au moins {$a} chiffre(s).';
$string['errorminpasswordlength'] = 'Les mots de passe doivent comporter au moins {$a} caractères.';
$string['errorminpasswordlower'] = 'Les mots de passe doivent comporter au moins {$a} lettre(s) minuscules.';
$string['errorminpasswordnonalphanum'] = 'Les mots de passe doivent comporter au moins {$a} caractère(s) non alphanumériques.';
$string['errorminpasswordupper'] = 'Les mots de passe doivent comporter au moins {$a} lettre(s) majuscules.';
$string['errorpasswordupdate'] = 'Erreur lors de la modification du mot de passe. Le mot de passe n\'a pas été modifié';
$string['forcechangepassword'] = 'Imposer le changement du mot de passe';
$string['forcechangepasswordfirst_help'] = 'Impose aux utilisateurs de changer leur mot de passe lors de leur prochaine connexion à Moodle.';
$string['forcechangepassword_help'] = 'Impose aux utilisateurs de changer leur mot de passe lors de leur première connexion à Moodle.';
$string['forgottenpassword'] = 'Si vous tapez une URL dans ce champ, elle sera utilisée comme page permettant de récupérer le mot de passe pour ce site. Ce réglage est prévu pour les sites où la gestion des mots de passe est entièrement effectuée en dehors de Moodle. Laissez ce champ vide pour utiliser le mécanisme de récupération de mot de passe de Moodle.';
$string['forgottenpasswordurl'] = 'URL de récupération de mot de passe';
$string['getanaudiocaptcha'] = 'Obtenir un CAPTCHA audio';
$string['getanimagecaptcha'] = 'Obtenir un CAPTCHA visuel';
$string['getanothercaptcha'] = 'Obtenir un nouveau CAPTCHA';
$string['guestloginbutton'] = 'Bouton de connexion anonyme';
$string['incorrectpleasetryagain'] = 'Incorrect. Veuillez essayer à nouveau.';
$string['infilefield'] = 'Champ requis dans le fichier';
$string['informminpassworddigits'] = 'au moins {$a} chiffre(s)';
$string['informminpasswordlength'] = 'au moins {$a} caractères(s)';
$string['informminpasswordlower'] = 'au moins {$a} minuscule(s)';
$string['informminpasswordnonalphanum'] = 'au moins {$a} caractères(s) non-alphanumérique(s)';
$string['informminpasswordupper'] = 'au moins {$a} majuscule(s)';
$string['informpasswordpolicy'] = 'Le mot de passe doit comporter {$a}';
$string['instructions'] = 'Instructions';
$string['internal'] = 'Interne';
$string['locked'] = 'Verrouillé';
$string['md5'] = 'Hachage MD5';
$string['nopasswordchange'] = 'Le mot de passe ne peut pas être modifié';
$string['nopasswordchangeforced'] = 'Vous ne pouvez pas continuer sans modifier votre mot de passe. Cependant, il n\'y a aucun moyen disponible de le modifier. Veuillez contacter l\'administrateur de votre Moodle.';
$string['noprofileedit'] = 'Le profil ne peut pas être modifié';
$string['ntlmsso_attempting'] = 'Tentative de connexion SSO via NTLM...';
$string['ntlmsso_failed'] = 'La connexion automatique a échoué. Essayez de vous connecter depuis la page de connexion standard.';
$string['ntlmsso_isdisabled'] = 'L\'authentification SSO NTLM est désactivée.';
$string['passwordhandling'] = 'Traitement du champ Mot de passe';
$string['plaintext'] = 'Texte en clair';
$string['pluginnotenabled'] = 'Le plugin d\'authentification {$a} n\'est pas activé.';
$string['pluginnotinstalled'] = 'Le plugin d\'authentification {$a} n\'est pas installé.';
$string['potentialidps'] = 'Se connecter au moyen du compte :';
$string['recaptcha'] = 'reCAPTCHA';
$string['recaptcha_help'] = 'Un CAPTCHA est un programme capable de distinguer si son utilisateur est un humain ou un ordinateur, destiné à éviter les abus de programmes automatiques pour faire du spam. Saisissez dans le champ les mots que vous lisez, dans l\'ordre et séparés par un espace.

Si vous n\'êtes pas sûr des mots présentés, essayez de deviner ou suivez le lien « Obtenir un nouveau CAPTCHA » ou « Obtenir un CAPTCHA audio ».';
$string['selfregistration'] = 'Auto-enregistrement';
$string['selfregistration_help'] = 'Si vous choisissez un plugin d\'authentification gérant l\'auto-enregistrement, par exemple par courriel, vous permettez aux utilisateurs potentiels de créer des comptes pour eux-mêmes. Il est par conséquent possible que des spammeurs créent des comptes dans le but d\'écrire du spam dans des messages dans les forums, des articles de blog, etc. Si vous voulez éviter ce risque, vous devez désactiver l\'auto-enregistrement ou au moins le limiter en utilisant le réglage <em> Domaines courriel autorisés</em>.';
$string['sha1'] = 'Hachage SHA-1';
$string['showguestlogin'] = 'Vous pouvez choisir d\'afficher ou non sur la page de connexion le bouton de connexion anonyme.';
$string['stdchangepassword'] = 'Utiliser la page de changement de mot de passe standard';
$string['stdchangepassword_expl'] = 'Si la source d\'authentification externe permet le changement de mot de passe par l\'intermédiaire de Moodle, mettez ce réglage sur « Oui ». Ce réglage rend obsolète le réglage « URL de la page de changement du mot de passe ».';
$string['stdchangepassword_explldap'] = 'Remarque : il est recommandé d\'utiliser LDAP à travers un tunnel chiffré SSL (ldaps://) si le serveur LDAP n\'est pas dans un intranet.';
$string['suspended'] = 'Compte suspendu';
$string['suspended_help'] = 'Les comptes suspendus ne peuvent pas se connecter ou utiliser de services web, et tous ses messages sortants sont ignorés.';
$string['unlocked'] = 'Déverrouillé';
$string['unlockedifempty'] = 'Déverrouillé si vide';
$string['update_never'] = 'Jamais';
$string['update_oncreate'] = 'À la création';
$string['update_onlogin'] = 'À chaque connexion';
$string['update_onupdate'] = 'Lors de la mise à jour';
$string['user_activatenotsupportusertype'] = 'auth: ldap user_activate() ne supporte pas le type d\'utilisateur sélectionné {$a}';
$string['user_disablenotsupportusertype'] = 'auth: ldap user_disable() ne supporte pas (encore) le type d\'utilisateur sélectionné';
