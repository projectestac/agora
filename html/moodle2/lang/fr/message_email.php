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
 * Strings for component 'message_email', language 'fr', branch 'MOODLE_24_STABLE'
 *
 * @package   message_email
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['allowusermailcharset'] = 'Autoriser les utilisateurs à choisir un jeu de caractères';
$string['configallowusermailcharset'] = 'L\'activation de cette option permettra à chaque utilisateur du site de spécifier son propre encodage des messages par courriel.';
$string['configmailnewline'] = 'Caractère de nouvelle ligne à utiliser dans les messages par courriel. Selon la RFC 822bis, CRLF est obligatoire. Certains serveurs de courriel effectuent une conversion automatique de LF (LineFeed) vers CRLF (CarriageReturn et LineFeed), tandis que d\'autres effectuent une conversion incorrecte de CRLF vers CRCRLF. D\'autres encore rejettent les messages comprenant LF seulement (par exemple qmail). Si vous avez des problèmes de messages non délivrés ou contenant des lignes vides, essayez de modifier ce réglage.';
$string['confignoreplyaddress'] = 'Les courriels sont parfois envoyés au nom d\'un utilisateur (par exemple les messages des forums). L\'adresse de courriel spécifiée ici sera utilisée comme adresse de l\'expéditeur lorsqu\'il n\'est pas souhaitable que les utilisateurs répondent directement à l\'auteur du message (par exemple s\'il ne veut pas que son adresse de courriel soit divulguée).';
$string['configsitemailcharset'] = 'Tous les courriels générés par votre site seront envoyés dans l\'encodage de caractères spécifié ici. Toutefois, chaque utilisateur pourra ajuster son encodage si la variable suivante est activée.';
$string['configsmtphosts'] = 'Indiquer le nom complet d\'un ou plusieurs serveurs SMTP locaux que Moodle devra utiliser pour envoyer des courriels (par exemple, « mail.a.com » ou « mail.a.com;mail.b.com »). Pour indiquer un port non standard (c\'est-à-dire autre que le port 25), utiliser la syntaxe [server]:[port], par exemple « mail.a.com:587. Pour des connexions sécurisées, le port 465 est habituellement utilisé avec SSL, et le port 587 est habituellement utilisé avec TLS ; veuillez si nécessaire indiquer le protocole sécurisé ci-dessous. Si ce paramètre est laissé vide, Moodle utilisera la méthode par défaut de PHP pour envoyer des courriels.';
$string['configsmtpmaxbulk'] = 'Nombre maximum de messages de courriel envoyés lors d\'une session SMTP. En groupant les messages dans une session, on peut accélérer l\'envoi des messages par courriel. Une valeur inférieure à 2 force la création d\'une session SMTP pour chaque message.';
$string['configsmtpsecure'] = 'Si le serveur SMTP requiert des connexions sécurisées, spécifiez le type de protocole correct.';
$string['configsmtpuser'] = 'Si vous avez indiqué un nom de serveur SMTP ci-dessus et qu\'il requiert une authentification, entrez ici le nom d\'utilisateur et le mot de passe à utiliser.';
$string['email'] = 'Envoyer les notifications par courriel à';
$string['ifemailleftempty'] = 'Laisser vide pour envoyer les notifications à {$a}';
$string['mailnewline'] = 'Caractère de fin de ligne des courriels';
$string['none'] = 'Aucun';
$string['noreplyaddress'] = 'Adresse de non-réponse';
$string['pluginname'] = 'Courriel';
$string['sitemailcharset'] = 'Jeu de caractères';
$string['smtphosts'] = 'Hôtes SMTP';
$string['smtpmaxbulk'] = 'Limite de session SMTP';
$string['smtppass'] = 'Mot de passe SMTP';
$string['smtpsecure'] = 'Sécurité SMTP';
$string['smtpuser'] = 'Nom d\'utilisateur SMTP';
