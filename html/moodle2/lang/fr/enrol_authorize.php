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
 * Strings for component 'enrol_authorize', language 'fr', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol_authorize
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['adminacceptccs'] = 'Cartes de crédit acceptées';
$string['adminaccepts'] = 'Veuillez choisir les méthodes de paiement acceptées et leur type';
$string['adminauthorizeccapture'] = 'Contrôle des commandes & réglages de saisie programmée';
$string['adminauthorizeemail'] = 'Réglages d\'envoi de courriel';
$string['adminauthorizesettings'] = 'Réglages compte marchand Authorize.Net';
$string['adminauthorizewide'] = 'Réglages généraux';
$string['adminconfighttps'] = 'Veuillez vous assurez que l\'option <a href="{$a->url}">loginhttps</a> est activée pour utiliser ce plugin.';
$string['adminconfighttpsgo'] = 'Passer sur une <a href="{$a->url}">page sécurisée</a> pour configurer ce plugin.';
$string['admincronsetup'] = 'Le script de maintenance cron.php n\'a pas été lancé depuis plus de 24 heures.<br />Ce script doit être activé si vous voulez utiliser la saisie programmée.<br />Veuillez <b>activer</b> le plugin Authorize.Net et régler le cron, ou décocher la variable an_review.<br />Si vous désactivez la saisie programmée, les transactions seront annulées à moins que vous ne les approuviez dans les 30 jours.<br />Cochez la variable an_review et inscrivez « 0 » dans le champ de la variable an_capture_day<br />si vous voulez accepter ou refuser manuellement les paiements durant 30 jours.';
$string['adminemailexpiredsort'] = 'Lorsque le nombre de commandes en suspens est envoyé par courriel aux enseignants, quelle est le paramètre important ?';
$string['adminemailexpiredsortcount'] = 'Nombre de commandes';
$string['adminemailexpiredsortsum'] = 'Montant total';
$string['adminemailexpsetting'] = '(0 = désactiver l\'envoi par courriel, par défaut = 2, max = 5)<br />(Réglage de saisie automatique requis pour l\'envoi des courriels : cron = activé, an_review = coché, an_capture_day = 0, an_emailexpired = 1-5)';
$string['adminhelpcapturetitle'] = 'Jour de saisie programmée';
$string['adminhelpreviewtitle'] = 'Contrôle de commande';
$string['adminneworder'] = 'Cher administrateur,

Vous avez reçu une nouvelle commande en attente :

    No de commande : {$a->orderid}
    No de transaction : {$a->transid}
    Utilisateur : {$a->user}
    Cours : {$a->course}
    Montant : {$a->amount}

    SAISIE PROGRAMMÉE ACTIVE ? {$a->acstatus}

Si la saisie programmée est activée, il est prévu que les infos de carte de
crédit seront saisies le {$a->captureon} et que l\'étudiant sera inscrit au
cours. Dans le cas contraire, ces données arriveront à échéance le
{$a->expireon} et ne pourront plus être saisies après cette date.

Vous pouvez aussi accepter ou refuser le paiement afin d\'inscrire
immédiatement l\'étudiant en cliquant sur le lien ci-dessous.
{$a->url}';
$string['adminnewordersubject'] = '{$a->course}, nouvelle commande en attente de traitement : {$a->orderid}';
$string['adminpendingorders'] = 'Vous avez désactivé la saisie programmée.<br />Un total de {$a->count} transactions dont le statut est « Autorisé / En attente de saisie » seront annulées après échéance, à moins que vous ne les approuviez entre-temps.<br />Pour accepter ou refuser des paiements, visitez la page <a href=\'{$a->url}\'>Gestion des paiements</a>.';
$string['adminteachermanagepay'] = 'Les enseignants peuvent gérer les paiements du cours.';
$string['allpendingorders'] = 'Toutes les commandes en attente';
$string['amount'] = 'Montant';
$string['anauthcode'] = 'Obtenir un code d\'autorisation';
$string['anauthcodedesc'] = 'Si la carte de crédit d\'un utilisateur ne peut pas être saisie directement sur internet, un code d\'autorisation doit être obtenu par téléphone directement de la banque du client.';
$string['anavs'] = 'Address Verification System';
$string['anavsdesc'] = 'Cochez cette option si vous avez activé l\'Address Verification System (AVS) dans votre compte marchand Authorize.Net. Lorsque l\'utilisateur remplit le formulaire de paiement, il lui sera alors demandé de saisir les champs de l\'adresse, par exemple la rue, le code postal, le pays, etc.';
$string['ancaptureday'] = 'Date de saisie';
$string['ancapturedaydesc'] = 'Saisir les données de la carte de crédit automatiquement, à moins qu\'un enseignant ou un administrateur ne contrôle la commande dans l\'intervalle de temps indiqué. <b> Le cron doit être actif.</b><br />(0 jour signifie que la saisie programmée sera désactivée. Un contrôle par un enseignant ou administrateur est alors nécessaire. Dans ce cas, la transaction sera annulée si elle n\'est pas contrôlée dans les 30 jours.)';
$string['anemailexpired'] = 'Notification d\'échéance';
$string['anemailexpireddesc'] = 'Ce réglage est utile si vous avez choisi la saisie manuelle. Les administrateurs sont avertis par courriel le nombre de jours spécifié avant l\'échéance des commandes en attente de traitement.';
$string['anemailexpiredteacher'] = 'Notification d\'échéance (enseignant)';
$string['anemailexpiredteacherdesc'] = 'Si vous avez activé la saisie manuelle (voir ci-dessus) et si les enseignants peuvent gérer les paiements, ceux-ci peuvent être en outre avertis des commandes en suspens en voie d\'expiration. Un message leur sera envoyé par courriel contenant le nombre de commandes en suspens.';
$string['anlogin'] = 'Authorize.Net : nom d\'utilisateur';
$string['anpassword'] = 'Authorize.Net : mot de passe';
$string['anreferer'] = 'Référenceur';
$string['anrefererdesc'] = 'Saisissez ici une URL (référenceur) si vous avez mis en place cette fonctionnalité dans votre compte marchand Authorize.Net. Ceci enverra une entête « Referer: URL » incluse dans la requête web.';
$string['anreview'] = 'Contrôle';
$string['anreviewdesc'] = 'Contrôle de la commande avant envoi des données de la carte de crédit.';
$string['antestmode'] = 'Mode test';
$string['antestmodedesc'] = 'Traiter les transactions en mode test (aucun montant ne sera prélevé)';
$string['antrankey'] = 'Authorize.Net : clef de transaction';
$string['approvedreview'] = 'Contrôle approuvé';
$string['authcaptured'] = 'Autorisé / Saisi';
$string['authcode'] = 'Code d\'autorisation';
$string['authorize:config'] = 'Configurer les instances d\'inscription Authorize.Net';
$string['authorizedpendingcapture'] = 'Autorisé / En attente de saisie';
$string['authorizeerror'] = 'Erreur Authorize.Net : {$a}';
$string['authorize:manage'] = 'Gérer les utilisateurs inscrits';
$string['authorize:managepayments'] = 'Gérer les paiements';
$string['authorize:unenrol'] = 'Désinscrire les utilisateurs d\'un cours';
$string['authorize:unenrolself'] = 'Se désinscrire d\'un cours';
$string['authorize:uploadcsv'] = 'Télécharger un fichier CSV';
$string['avsa'] = 'L\'adresse (rue) correspond, mais pas le code postal';
$string['avsb'] = 'L\'adresse n\'est pas renseignée';
$string['avse'] = 'Erreur du système de vérification d\'adresse (AVS)';
$string['avsg'] = 'Carte provenant d\'une banque non U.S.';
$string['avsn'] = 'Ni l\'adresse (rue), ni le code postal ne correspondent';
$string['avsp'] = 'Le système de vérification d\'adresse (AVS) ne peut pas fonctionner';
$string['avsr'] = 'Veuillez essayer à nouveau, le système n\'est actuellement pas disponible';
$string['avsresult'] = 'Résultat AVS : {$a}';
$string['avss'] = 'Ce service n\'est pas supporté par la banque';
$string['avsu'] = 'Les informations d\'adresse ne sont pas disponibles';
$string['avsw'] = 'Le code postal à 9 chiffres correspond, mais pas l\'adresse (rue)';
$string['avsx'] = 'L\'adresse (rue) et le code postal à 9 chiffres correspondent';
$string['avsy'] = 'L\'adresse (rue) et le code postal à 5 chiffres correspondent';
$string['avsz'] = 'Le code postal à 5 chiffres correspond, mais pas l\'adresse (rue)';
$string['canbecredit'] = 'Remboursable à concurrence de {$a->upto}';
$string['cancelled'] = 'Annulé';
$string['capture'] = 'Saisie';
$string['capturedpendingsettle'] = 'Saisi / En attente de règlement';
$string['capturedsettled'] = 'Saisi / Réglé';
$string['captureyes'] = 'Les données de la carte de crédit vont être saisies et l\'étudiant sera inscrit au cours. Voulez-vous continuer ?';
$string['cccity'] = 'Ville';
$string['ccexpire'] = 'Date d\'échéance';
$string['ccexpired'] = 'La carte de crédit est échue';
$string['ccinvalid'] = 'Numéro de carte non valable';
$string['cclastfour'] = 'Quatre derniers chiffres CC';
$string['ccno'] = 'Numéro de carte de crédit';
$string['ccstate'] = 'État';
$string['cctype'] = 'Type de carte de crédit';
$string['ccvv'] = 'Code vérification';
$string['ccvvhelp'] = 'Au verso de votre carte (les 3 derniers chiffres)';
$string['choosemethod'] = 'Tapez la clef d\'inscription à ce cours.<br />Si vous n\'avez pas cette clef, ce cours vous sera accessible contre paiement.';
$string['chooseone'] = 'Veuillez remplir l\'un des deux champs ci-dessous ou tous les deux. Le mot de passe n\'est pas affiché.';
$string['cost'] = 'Coût';
$string['costdefaultdesc'] = 'Pour utiliser ce prix par défaut, <strong>tapez -1 dans le champ du coût</strong> des paramètres du cours.';
$string['currency'] = 'Devise';
$string['cutofftime'] = 'Date butoir de transaction';
$string['cutofftimedesc'] = 'Date butoir de transaction. Quand la dernière transaction doit-elle être traitée pour règlement ?';
$string['dataentered'] = 'Données saisies';
$string['delete'] = 'Détruire';
$string['description'] = 'Le module Authorize.net permet de mettre en place des cours payants via des fournisseurs de paiement. Le prix des cours peut être fixé de deux manières : (1) le prix défini globalement est le prix par défaut pour tous les cours du site, (2) le prix de chaque cours peut être fixé individuellement. S\'il est défini, le prix spécifique d\'un cours remplace le prix par défaut.';
$string['echeckabacode'] = 'Numéro bancaire ABA';
$string['echeckaccnum'] = 'Numéro de compte bancaire';
$string['echeckacctype'] = 'Type de compte bancaire';
$string['echeckbankname'] = 'Nom de la banque';
$string['echeckbusinesschecking'] = 'Business checking';
$string['echeckchecking'] = 'Checking';
$string['echeckfirslasttname'] = 'Titulaire du compte bancaire';
$string['echecksavings'] = 'Économie';
$string['enrolenddate'] = 'Date de fin';
$string['enrolenddaterror'] = 'La date de fin d\'inscription ne peut pas être antérieure à la date de début';
$string['enrolname'] = 'Passerelle de paiement Authorize.Net';
$string['enrolperiod'] = 'Durée d\'inscription';
$string['enrolstartdate'] = 'Date de début';
$string['expired'] = 'Échu';
$string['expiremonth'] = 'Mois d\'échéance';
$string['expireyear'] = 'Année d\'échéance';
$string['firstnameoncard'] = 'Prénom sur la carte';
$string['haveauthcode'] = 'J\'ai déjà un code d\'autorisation';
$string['howmuch'] = 'Combien ?';
$string['httpsrequired'] = 'Votre requête ne peut pas être traitée. Les réglages du site n\'ont pas pu être configurés correctement.<br /><br />Veuillez NE PAS taper votre numéro de carte de  crédit, à moins que vous ne voyez un cadenas au bas de la fenêtre ou dans la barre d\'adresse de votre navigateur. Ce cadenas indique que toutes les données transmises entre votre ordinateur et le serveur sont chiffrées, et que les informations échangées entre ces deux ordinateurs sont protégées et ne peuvent pas être interceptées sur Internet.';
$string['invalidaba'] = 'Numéro ABA non valide';
$string['invalidaccnum'] = 'Numéro de compte non valide';
$string['invalidacctype'] = 'Type de compte non valide';
$string['isbusinesschecking'] = 'Vérification entreprise ?';
$string['lastnameoncard'] = 'Nom sur la carte';
$string['logindesc'] = 'Cette option doit impérativement être activée !<br /><br />Veuillez vous assurer que l\'option « <a href="{$a->url}">loginhttps</a> » soit activée dans les paramètres de l\'administration, section Sécurité.<br /><br />L\'activation de cette option permettra à Moodle d\'utiliser une connexion sécurisée pour l\'affichage et le traitement des pages de connexion et de paiement.';
$string['logininfo'] = 'Lors de la configuration de votre compte Authorize.Net, le nom d\'utilisateur est requis et vous devez saisir <strong>soit</strong> la clef de transaction, <strong>soit</strong> le mot de passe dans le champ approprié. Nous vous recommandons de saisir la clef de transaction, pour plus de sécurité.';
$string['messageprovider:authorize_enrolment'] = 'Messages de la méthode d\'inscription Authorize.Net';
$string['methodcc'] = 'Carte de crédit';
$string['methodccdesc'] = 'Sélectionner la carte de crédit et les types acceptés';
$string['methodecheck'] = 'eCheck (ACH)';
$string['methodecheckdesc'] = 'Sélectionner eCheck et les types acceptés';
$string['missingaba'] = 'Le numéro ABA n\'est pas renseigné';
$string['missingaddress'] = 'L\'adresse n\'est pas renseignée';
$string['missingbankname'] = 'Le nom de la banque n\'est pas renseigné';
$string['missingcc'] = 'Le numéro de carte n\'est pas renseigné';
$string['missingccauthcode'] = 'Le code d\'autorisation n\'est pas renseigné';
$string['missingccexpiremonth'] = 'Mois d\'échéance non renseigné';
$string['missingccexpireyear'] = 'Année d\'échéance non renseignée';
$string['missingcctype'] = 'Le type de carte n\'est pas renseigné';
$string['missingcvv'] = 'Le numéro de vérification n\'est pas renseigné';
$string['missingzip'] = 'Le code postal n\'est pas renseigné';
$string['mypaymentsonly'] = 'N\'afficher que mes paiements';
$string['nameoncard'] = 'Nom sur la carte';
$string['new'] = 'Nouveau';
$string['nocost'] = 'Aucun montant n\'est associé à l\'inscription de ce cours via Authorize.Net !';
$string['noreturns'] = 'Pas de retour !';
$string['notsettled'] = 'Non réglé';
$string['orderdetails'] = 'Détails de la commande';
$string['orderid'] = 'No de commande';
$string['paymentmanagement'] = 'Gestion des paiements';
$string['paymentmethod'] = 'Méthode de paiement';
$string['paymentpending'] = 'Votre paiement pour ce cours est en attente de traitement. Son numéro de commande est {$a->orderid}. Voir les <a href=\'{$a->url}\'>détails de la commande</a>.';
$string['pendingecheckemail'] = 'Cher administrateur,

Il y a actuellement {$a->count} eChecks en attente. Vous devez déposer un fichier CSV afin d\'inscrire les étudiants.

Veuillez cliquer sur le lien ci-dessous et lire le fichier d\'aide sur la page affichée :
{$a->url}';
$string['pendingechecksubject'] = '{$a->course} : eChecks en attente ({$a->count})';
$string['pendingordersemail'] = 'Cher administrateur,

{$a->pending} transactions pour le cours {$a->course} arriveront à échéance
dans les {$a->days} jours, à moins que vous n\'acceptiez le paiement.

Ceci est un message d\'avertissement, car vous n\'avez pas activé
la saisie programmée. Vous devez donc accepter ou refuser les paiements
manuellement.

Pour accepter ou refuser les paiements en attente de traitement, veuillez
visiter la page

{$a->url}

Pour activer la saisie programmée, afin que vous ne receviez plus de
tels messages davertissement, veuillez visiter la page

{$a->enrolurl}';
$string['pendingordersemailteacher'] = 'Cher enseignant,

{$a->pending} transactions d\'un montant total de {$a->currency} {$a->sumcost},
pour le cours {$a->course}, arriveront à échéance dans les {$a->days} jours,
à moins que vous n\'acceptiez le paiement.

Vous devez donc accepter ou refuser les paiements manuellement, car
l\'administrateur n\'a pas activé leur saisie programmée.

Pour accepter ou refuser les paiements en attente de traitement, veuillez
visiter la page

{$a->url}';
$string['pendingorderssubject'] = 'ATTENTION : {$a->course}, {$a->pending} commande(s) arriveront à échéance dans {$a->days} jour(s).';
$string['pluginname'] = 'Authorize.Net';
$string['reason11'] = 'Un doublon de transaction a été transmis.';
$string['reason13'] = 'L\'identifiant de connexion n\'est pas valide ou le compte est inactif.';
$string['reason16'] = 'La transaction n\'a pas été trouvée.';
$string['reason17'] = 'Le marchand n\'accepte pas ce type de carte de crédit.';
$string['reason245'] = 'Ce type de eCheck n\'est pas permis lors de l\'utilisation du formulaire de paiement hébergé par la passerelle de paiement.';
$string['reason246'] = 'Ce type de eCheck n\'est pas permis.';
$string['reason27'] = 'La transaction a abouti à un problème AVS. L\'adresse fournie ne correspond à l\'adresse de facturation du détenteur de la carte.';
$string['reason28'] = 'Le marchand n\'accepte pas ce type de carte de crédit.';
$string['reason30'] = 'Une telle configuration n\'est pas valable. Veuillez appeler votre fournisseur.';
$string['reason39'] = 'Le code de devise fourni est soit non valide, non supporté, non autorisé ou ne possède pas de taux de change.';
$string['reason43'] = 'Le marchand n\'a pas été réglé correctement lors du traitement. Veuillez appeler votre fournisseur de service marchand.';
$string['reason44'] = 'Cette transaction a été déclinée. Erreur du filtre de carte !';
$string['reason45'] = 'Cette transaction a été déclinée. Erreur du filtre de code de carte / AVS !';
$string['reason47'] = 'Le montant requis pour le règlement ne peut pas être plus grand que le montant autorisé initialement.';
$string['reason5'] = 'Un montant valide est requis.';
$string['reason50'] = 'Cette transaction est en attente de règlement et ne peut être remboursée.';
$string['reason51'] = 'La somme de tous les crédits concernant cette transaction est plus grande que le montant original de la transaction.';
$string['reason54'] = 'La transaction référencée ne satisfait pas les critères permettant de délivrer un crédit.';
$string['reason55'] = 'La somme de tous les crédits concernant cette transaction dépasserait le montant dû initialement.';
$string['reason56'] = 'Ce marchand n\'accepte que les transactions eCheck (ACH). Aucune transaction par carte de crédit n\'est acceptée.';
$string['refund'] = 'Remboursement';
$string['refunded'] = 'Remboursé';
$string['returns'] = 'Retour';
$string['reviewfailed'] = 'Échec du contrôle';
$string['reviewnotify'] = 'Votre paiement va être contrôlé. Votre enseignant vous contactera par courriel dans quelques jours.';
$string['sendpaymentbutton'] = 'Envoyer paiement';
$string['settled'] = 'Réglé';
$string['settlementdate'] = 'Date de règlement';
$string['shopper'] = 'Client';
$string['status'] = 'Permettre les inscriptions Authorize.Net';
$string['subvoidyes'] = 'La transaction remboursée {$a->transid} sera annulée et votre compte sera ainsi crédité de {$a->amount}. Voulez-vous continuer ?';
$string['tested'] = 'Testé';
$string['testmode'] = '[MODE TEST]';
$string['testwarning'] = 'Les opérations de saisie/annulation/crédit semblent fonctionner correctement en mode test. Aucun enregistrement n\'a cependant été mis à jour ni inséré dans la base de données.';
$string['transid'] = 'No de transaction';
$string['underreview'] = 'En cours de contrôle';
$string['unenrolselfconfirm'] = 'Voulez-vous vraiment vous désinscrire du cours « {$a} »?';
$string['unenrolstudent'] = 'Désinscrire l\'étudiant ?';
$string['uploadcsv'] = 'Déposer un fichier CSV';
$string['usingccmethod'] = 'S\'inscrire par <a href="{$a->url}"><strong>carte de crédit</strong></a>';
$string['usingecheckmethod'] = 'S\'inscrire par <a href="{$a->url}"><strong>eCheck</strong></a>';
$string['verifyaccount'] = 'Vérifier votre compte marchand Authorize.Net';
$string['verifyaccountresult'] = '<b>Résultat de la vérification :</b> {$a}';
$string['void'] = 'Nul';
$string['voidyes'] = 'La transaction sera annulée. Voulez-vous continuer ?';
$string['welcometocoursesemail'] = 'Bonjour,

Nous vous remercions de votre paiement. Vous vous êtes inscrits aux cours suivants

{$a->courses}

Nous vous invitons à modifier votre profil :
{$a->profileurl}

Vous pouvez consulter les détails de votre paiement à l\'adresse
{$a->paymenturl}';
$string['youcantdo'] = 'Vous ne pouvez pas effectuer ceci : {$a->action}';
$string['zipcode'] = 'Code postal';
