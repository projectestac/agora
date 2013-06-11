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
 * Strings for component 'auth_email', language 'it', branch 'MOODLE_24_STABLE'
 *
 * @package   auth_email
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_emaildescription'] = '<p>La creazione di account via email consente ai visitatori del sito di creare un account tramite il pulsante "Crea un account" presente nella pagina di login. Il visitatore riceverà un email contenente un link sicuro ad un pagina di conferma. Dopo aver confermato il proprio account l\'utente potrà eseguire il login usando il proprio username e password memorizzati nel database degli utenti di Moodle.</p><p>Nota: oltre ad abilitare il plugin Account via email, è anche necessario scegliere lo stesso pluign nel menu a discesa "Auto creazione di account" presente nella pagina "Gestione autenticazione"</p>';
$string['auth_emailnoemail'] = 'Fallito il tentativo di inviarti una email !';
$string['auth_emailrecaptcha'] = 'Nella pagina di creazione account è possibile far comparire un elemento di conferma audio/visuale. La presenza di tale elemento evita la creazione automatica di account da parte di spammer, contribuendo al tempo stesso ad una buona causa. Per maggiori informazioni su reCAPTCHA vedi http://www.google.com/recaptcha/learnmore.<br/><me> <em>Prerequisito per il funzionamento è l\'estensione cURL del PHP</em>';
$string['auth_emailrecaptcha_key'] = 'Abilita reCAPTCHA';
$string['auth_emailsettings'] = 'Impostazioni';
$string['pluginname'] = 'Account via email';
