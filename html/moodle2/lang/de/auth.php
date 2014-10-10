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
 * Strings for component 'auth', language 'de', branch 'MOODLE_26_STABLE'
 *
 * @package   auth
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actauthhdr'] = 'Aktive Plugins zur Authentifizierung';
$string['alternatelogin'] = 'Bei der Eingabe einer URL wird diese als alternative Login-Seite verwandt. Die Seite sollte ein Formular enthalten, dessen Aktionsfunktion auf <strong>\'{$a}\'</strong> gesetzt ist und außerdem Eingabefelder für den <strong>Anmeldenamen</strong> und das <strong>Kennwort</strong> zurück liefert.<br />Seien Sie sehr sorgfältig bei der Eingabe der URL, denn mit einer falschen URL schließen Sie sich vom Zugriff zur Website aus.<br />Lassen Sie das Feld leer, um die standardmäßige Anmeldeseite zu verwenden.';
$string['alternateloginurl'] = 'URL für alternatives Login';
$string['auth_changepasswordhelp'] = 'Hilfe zur Kennwortänderung';
$string['auth_changepasswordhelp_expl'] = 'Nutzerhilfe für vergessene {$a} Kennworte anzeigen. Diese Hilfe wird neben oder statt der <strong>URL zur Kennwortänderung</strong> oder der Moodle internen Kennwortänderung angezeigt.';
$string['auth_changepasswordurl'] = 'URL zur Kennwortänderung';
$string['auth_changepasswordurl_expl'] = 'Tragen Sie hier eine URL ein, unter der ein neues Kennwort für \'{$a}\' angefordert werden kann. Wenn Sie diese Option nutzen, sollten Sie die Einstellung "Standardseite zur Kennwortänderung benutzen" auf "Nein" setzen.';
$string['auth_changingemailaddress'] = 'Sie möchten Ihre E-Mail-Adresse von {$a->oldemail} nach {$a->newemail} ändern. Aus Sicherheitsgründen wird eine Nachricht an Ihre neue E-Mail-Adresse gesendet. Ihre E-Mail-Adresse wird erst geändert, wenn Sie die in der Nachricht enthaltene URL aufrufen und damit die Änderung bestätigen.';
$string['auth_common_settings'] = 'Allgemein';
$string['auth_data_mapping'] = 'Datenzuordnung';
$string['authenticationoptions'] = 'Authentifizierungsoptionen';
$string['auth_fieldlock'] = 'Feld sperren';
$string['auth_fieldlock_expl'] = '<p><b>Feld sperren:</b> Wenn diese Option aktiviert ist, verhindert Moodle die Änderung des Feldinhalts. Dies ist sinnvoll, wenn die Daten in einer externen Datenbank verwaltet werden. </p>';
$string['auth_fieldlocks'] = 'Nutzerdatenfelder sperren';
$string['auth_fieldlocks_help'] = '<p>Sie können Datenfelder im Nutzerprofil sperren. Dies ist sinnvoll, wenn die Nutzerdaten von Administratoren gepflegt werden, manuell angelegt oder im Bulkupload (Hochladen über Textdatei) hochgeladen werden. Falls Sie von Moodle benötigte Datenfelder sperren, müssen Sie sicher stellen, dass diese Datenfelder beim Anlegen der Nutzerprofile sinnvoll belegt werden.</p><p>Um Probleme zu vermeiden, achten Sie darauf, dass die Einstellung auf "Bearbeitbar (wenn leer)" gesetzt ist.</p>';
$string['authinstructions'] = 'Wenn dieses Textfeld leer ist, wird auf der Anmeldeseite der Standardtext angezeigt. Falls Sie eine eigene Anleitung anbieten möchten, welche Anmeldenamen und Kennworte verwendet werden sollen, schreiben Sie hier Ihren Text.';
$string['auth_invalidnewemailkey'] = 'Fehler: Falls Sie versuchen, die Änderung Ihrer E-Mail-Adresse zu bestätigen, haben Sie eventuell einen Fehler beim Kopieren der zugesandten URL gemacht. Bitte kopieren Sie die URL noch einmal und versuchen es erneut.';
$string['auth_multiplehosts'] = 'Mehrere Adressen können angegeben werden (z.B. host1.com;host2.de;xxx.xxx.xxx.xxx)';
$string['auth_outofnewemailupdateattempts'] = 'Sie haben die zulässige Zahl von Versuchen überschritten, Ihre E-Mail-Adresse zu ändern. Der Änderungsvorgang wurde abgebrochen.';
$string['auth_passwordisexpired'] = 'Ihr Kennwort ist abgelaufen. Wollen Sie Ihr Kennwort jetzt aktualisieren?';
$string['auth_passwordwillexpire'] = 'Ihr Kennwort wird in {$a} Tagen ablaufen. Wollen Sie Ihr Kennwort nun aktualisieren?';
$string['auth_remove_delete'] = 'Intern löschen';
$string['auth_remove_keep'] = 'Nur intern zugänglich';
$string['auth_remove_suspend'] = 'Intern sperren';
$string['auth_remove_user'] = 'Legen Sie fest, was mit einem internen Nutzerprofil passieren soll, wenn bei einer Massensynchronisierung dieser Account im externen System entfernt wurde.  Nur gesperrte Nutzer werden automatisch reaktiviert, wenn sie in der externen Quelle wieder erscheinen.';
$string['auth_remove_user_key'] = 'Entfernte externe Nutzer/innen';
$string['auth_sync_script'] = 'Cron-Synchronisierungsskript';
$string['auth_updatelocal'] = 'Lokal aktualisieren';
$string['auth_updatelocal_expl'] = '<p><b>Lokal aktualisieren:</b> Wenn diese Option aktiviert ist, wird das Feld jedes Mal von extern (external auth) aktualisiert, wenn der Teilnehmer sich einloggt oder eine Nutzersynchronisation erfolgt. Dateneinträge sollten gesperrt sein, wenn sie lokal aktualisiert werden.</p>';
$string['auth_updateremote'] = 'Extern aktualisieren';
$string['auth_updateremote_expl'] = '<p><b>Extern aktualisieren:</b> Wenn diese Option aktiviert ist, wird die externe Datenbank aktualisiert, sobald der Nutzerdatensatz aktualisiert wird. Die Felder sollten bearbeitbar bleiben, um Datenänderungen zuzulassen.</p>';
$string['auth_updateremote_ldap'] = '<p><b>Anmerkung:</b> Das Update externer LDAP-Daten erfordert die Einstellung \'binddn\' und \'bindpw\' für einen Bind-Nutzer mit Schreibrechten für alle Nutzerdatensätze. Aktuell werden mehrfach gesetzte Eigenschaften nicht unterstützt und die zusätzlichen Werte bei einem Update entfernt.</p>';
$string['auth_user_create'] = 'Nutzererstellung aktivieren';
$string['auth_user_creation'] = 'Neue (anonyme) Nutzer können Nutzerkonten außerhalb der Authentifizierungsquelle erstellen und per E-Mail bestätigen. Wenn Sie diese Option aktivieren, müssen Sie außerdem modulspezifische Optionen zur Erstellung neuer Nutzerkonten konfigurieren.';
$string['auth_usernameexists'] = 'Der Anwendername existiert bereits. Bitte ändern Sie Ihre Eingabe.';
$string['auto_add_remote_users'] = 'Automatisches Hinzufügen externer Nutzer';
$string['changepassword'] = 'URL zur Kennwortänderung';
$string['changepasswordhelp'] = 'Hier können Sie eine Adresse angeben, über die die Nutzer ihren Anmeldenamen erfahren und ihr Kennwort zurücksetzen können, sofern sie diese Daten vergessen haben. Diese Option wird als Schaltfläche auf der Anmeldungsseite angeboten. Wenn Sie dieses Feld leer lassen, wird die Option nicht angeboten.';
$string['chooseauthmethod'] = 'Authentifizierung';
$string['chooseauthmethod_help'] = 'Diese Einstellung legt die Authentifizierung für das Nutzerkonto fest. Falls Sie hier eine deaktivierte Authentifizierung auswählen, kann sich diese Person nicht mehr anmelden. Um ein Nutzerkonto vorübergehend zu sperren, wählen Sie die Authentifizierung "Kein Login".';
$string['createpassword'] = 'Kennwort erzeugen und Nutzer/in benachrichtigen';
$string['createpasswordifneeded'] = 'Kennwort anlegen, falls erforderlich';
$string['emailchangecancel'] = 'E-Mail-Änderung abbrechen';
$string['emailchangepending'] = 'Die Änderung ist noch nicht abgeschlossen. Öffnen Sie den zugesandten Link in {$a->preference_newemail}';
$string['emailnowexists'] = 'Die E-Mail-Adresse, die Sie in Ihrem Nutzerprofil eintragen möchten, wird bereits von jemand anders verwendet. Der Änderungsvorgang wird abgebrochen, aber Sie können die Eingabe einer weiteren Adresse versuchen.';
$string['emailupdate'] = 'Änderung der E-Mail-Adresse';
$string['emailupdatemessage'] = 'Hallo {$a->fullname},

Sie möchten die E-Mail-Adresse für Ihr Nutzerkonto bei {$a->site} ändern. Bitte öffnen Sie die folgende URL in Ihrem Browser, um die Änderung zu bestätigen.

{$a->url}';
$string['emailupdatesuccess'] = 'Die E-Mail-Adresse von <em>{$a->fullname}</em> wurde erfolgreich aktualisiert: <em>{$a->email}</em>.';
$string['emailupdatetitle'] = 'Bestätigung der E-Mail-Änderung bei {$a->site}';
$string['enterthenumbersyouhear'] = 'Geben Sie die gehörten Zahlen ein';
$string['enterthewordsabove'] = 'Geben Sie die gezeigten Worte ein';
$string['errormaxconsecutiveidentchars'] = 'Kennworte dürfen maximal {$a} aufeinander folgende identische Zeichen besitzen.';
$string['errorminpassworddigits'] = 'Kennworte müssen mindestens {$a} Ziffer(n) enthalten.';
$string['errorminpasswordlength'] = 'Kennworte müssen mindestens {$a} Zeichen lang sein.';
$string['errorminpasswordlower'] = 'Kennworte müssen mindestens {$a} Kleinbuchstaben enthalten.';
$string['errorminpasswordnonalphanum'] = 'Kennworte müssen mindestens {$a} Sonderzeichen enthalten, z.B. :#_!§-%&*+?@.';
$string['errorminpasswordupper'] = 'Kennworte müssen mindestens {$a} Großbuchstaben enthalten.';
$string['errorpasswordupdate'] = 'Fehler: Kennwort konnte nicht geändert werden!';
$string['event_user_loggedin'] = 'Nutzer/in ist angemeldet';
$string['eventuserloggedinas'] = 'Nutzer/in ist als andere Person angemeldet';
$string['forcechangepassword'] = 'Kennwortänderung fordern';
$string['forcechangepasswordfirst_help'] = 'Nutzer/innen werden aufgefordert, ihr Kennwort beim ersten Anmelden zu ändern.';
$string['forcechangepassword_help'] = 'Nutzer/innen werden aufgefordert, ihr Kennwort beim nächsten Anmelden zu ändern.';
$string['forgottenpassword'] = 'Wenn hier eine URL eintragen ist, wird eine Anfrage zur Kennwortrücksetzung zur angegebenen Adresse weitergeleitet, z.B. wenn die Kennworte außerhalb von Moodle verwaltet werden. Lassen Sie das Feld leer, damit die Moodle-Standardfunktion für diesen Zweck verwendet wird.';
$string['forgottenpasswordurl'] = 'URL für vergessene Kennworte';
$string['getanaudiocaptcha'] = 'Audio-Captcha laden';
$string['getanimagecaptcha'] = 'Bild-Captcha laden';
$string['getanothercaptcha'] = 'Neues Captcha laden';
$string['guestloginbutton'] = 'Taste für Gast-Login';
$string['incorrectpleasetryagain'] = 'Leider falsch! Bitte probieren Sie es nochmal.';
$string['infilefield'] = 'Erforderliches Feld in Datei';
$string['informminpassworddigits'] = '{$a} Ziffer(n)';
$string['informminpasswordlength'] = 'mindestens {$a} Zeichen';
$string['informminpasswordlower'] = '{$a} Kleinbuchstabe(n)';
$string['informminpasswordnonalphanum'] = '{$a} Sonderzeichen';
$string['informminpasswordupper'] = '{$a} Großbuchstabe(n)';
$string['informpasswordpolicy'] = 'Kennwortregeln: <br />{$a}';
$string['instructions'] = 'Anleitung';
$string['internal'] = 'Intern';
$string['locked'] = 'Gesperrt';
$string['md5'] = 'MD5-Verschlüsselung';
$string['nopasswordchange'] = 'Kennwort kann nicht geändert werden';
$string['nopasswordchangeforced'] = 'Ohne die Kennwortänderung können Sie den Vorgang nicht fortsetzen. Die Seite für die Kennwortänderung ist allerdings nicht verfügbar. Fragen Sie die Administrator/innen.';
$string['noprofileedit'] = 'Das Profil darf nicht bearbeitet werden';
$string['ntlmsso_attempting'] = 'Single-Sign-On über NTLM versuchen ...';
$string['ntlmsso_failed'] = 'Die automatische Anmeldung ist fehlgeschlagen. Versuchen Sie das normale Login ...';
$string['ntlmsso_isdisabled'] = 'NTLM SSO ist deaktiviert.';
$string['passwordhandling'] = 'Nutzung des Kennwortfeldes';
$string['plaintext'] = 'Reiner Text';
$string['pluginnotenabled'] = 'Authentifizierungsplugin \'{$a}\' ist nicht aktiviert.';
$string['pluginnotinstalled'] = 'Authentifizierungsplugin \'{$a}\' ist nicht installiert.';
$string['potentialidps'] = 'Nutzen Sie Ihre Anmeldung auf:';
$string['recaptcha'] = 'ReCaptcha';
$string['recaptcha_help'] = 'Das Captcha versucht Missbrauch durch automatisierte Programme zu verhindern. Tragen Sie einfach die Worte in das Eingabefeld ein, in der richtigen Reihenfolge und getrennt durch ein Leerzeichen.

Sollten Sie nicht sicher sein, welche Worte zu sehen sind, holen Sie sich einfach ein neues Captcha oder versuchen Sie es mit einem Audio-Captcha.';
$string['selfregistration'] = 'Selbstregistrierung';
$string['selfregistration_help'] = 'Wenn die Selbstregistrierung (z.B. \'E-Mail basiert\') aktiviert ist, können sich alle Personen selbst registrieren und ein Nutzerkonto anlegen. Auf diese Weise könnten aber auch Spammer ein Nutzerkonto erhalten und Einträge in Foren, Blogs oder Profilen  missbrauchen. Um dieses Risiko zu vermeiden, können Sie die Selbstregistrierung ausschalten oder auf bestimmte E-Mail-Domains (z.B. meinefirma.de) beschränken.';
$string['sha1'] = 'SHA-1 hash';
$string['showguestlogin'] = 'Sie können auf der Anmeldeseite die Taste zum Gast-Login anzeigen oder verbergen. Wenn die Taste verborgen ist, wird ein Gast-Login für die Website untersagt.';
$string['stdchangepassword'] = 'Standardseite zur Kennwortänderung nutzen';
$string['stdchangepassword_expl'] = 'Stellen Sie \'Ja\' ein, wenn das externe Authentifizierungssystem eine Änderung des Kennwortes durch Moodle zulässt. Die Einstellungen überschreiben \'URL zur Kennwortänderung\'';
$string['stdchangepassword_explldap'] = 'Achtung: Es wird dringend empfohlen, LDAP ausschließlich SSL-verschlüsselt zu benutzen (ldaps://), wenn ein externer LDAP-Server verwendet wird.';
$string['suspended'] = 'Gesperrtes Nutzerkonto';
$string['suspended_help'] = 'Gesperrte Nutzer/innen können sich nicht einloggen und auch keine Webservices benutzen. Alle ausgehenden Mitteilungen werden gelöscht.';
$string['testsettings'] = 'Testeinstellungen';
$string['testsettingsheading'] = 'Authentifizierungseinstellungen prüfen - {$a}';
$string['unlocked'] = 'Bearbeitbar';
$string['unlockedifempty'] = 'Bearbeitbar (wenn leer)';
$string['update_never'] = 'Nie';
$string['update_oncreate'] = 'Beim Anlegen';
$string['update_onlogin'] = 'Bei jedem Login';
$string['update_onupdate'] = 'Bei Aktualisierung';
$string['user_activatenotsupportusertype'] = 'auth: ldap user_activate() unterstützt den ausgewählten Nutzertyp nicht: \'{$a}\'';
$string['user_disablenotsupportusertype'] = 'auth: ldap user_disable() unterstützt den ausgewählten Nutzertyp nicht: \'{$a}\'';
