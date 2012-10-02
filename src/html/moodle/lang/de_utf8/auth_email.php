<?php

// All of the language strings in this file should also exist in
// auth.php to ensure compatibility in all versions of Moodle.

$string['auth_changingemailaddress'] = 'Sie haben eine Änderung der E-Mail-Adresse von $a->oldemail nach $a->newemail beantragt. Aus Sicherheitsgründen senden wir Ihnen eine Nachricht an Ihre neue E-Mail-Adresse. Sobald Sie zur Bestätigung die in der Nachricht enthaltene URL öffnen, wird Ihre E-Mail-Adresse aktualisiert.';
$string['auth_emailchangecancel'] = 'E-Mail-Änderung abbrechen';
$string['auth_emailchangepending'] = 'Die Änderung ist noch nicht abgeschlossen. Öffnen Sie den zugesandten Link in $a->preference_newemail';
$string['auth_emaildescription'] = 'E-Mail-Bestätigung ist die Standard-Authentifizierungsmethode. Wenn sich Nutzer/innen neu anmelden, ihren eigenen Anmeldenamen und ihr Passwort auswählen, dann wird zur Bestätigung eine E-Mail an die angegebene E-Mail-Adresse gesendet. Diese E-Mail enthält einen sicheren Verweis auf eine Seite, wo die Nutzer/innen ihren Zugang bestätigen müssen. Spätere Anmeldungen prüfen nur  Anmeldenamen und Kennwort anhand der in der Moodle-Datenbank gespeicherten Daten.';
$string['auth_emailnoemail'] = 'Der Versuch Ihnen eine E-Mail zu senden ist gescheitert!';
$string['auth_emailnoinsert'] = 'Der Datensatz konnte nicht zur Datenbank hinzugefügt werden!';
$string['auth_emailnowexists'] = 'Die E-Mail-Adresse, die Sie in Ihrem Nutzerprofil zuweisen wollten, wird bereits von jemand anders verwendet. Der Änderungsvorgang wird hiermit abgebrochen, wobei Sie aber nochmals versuchen können, eine andere Adresse einzugeben.';
$string['auth_emailrecaptcha'] = 'Die E-Mail-Adresse, die Sie in Ihrem Nutzerprofil zuweisen wollten, wird bereits von jemand anders verwendet. Diese Einstellung fügt dem Anmeldeformular für die E-Mail-Selbstregistierung ein Kontrollelement hinzu. Dabei handelt es sich um ein Bild- oder Audio-Element, um Sie wirksam gegen Spammer zu schützen. Weitere Informationen finden Sie unter http://recaptcha.net/learnmore.html. <br /><em>PHP cURL Erweiterung ist erforderlich.</em>';
$string['auth_emailrecaptcha_key'] = 'ReCaptcha einschalten';
$string['auth_emailsettings'] = 'Einstellungen';
$string['auth_emailtitle'] = 'E-Mail basiert';
$string['auth_emailupdate'] = 'Aktualisierung der E-Mail-Adresse';
$string['auth_emailupdatemessage'] = 'Guten Tag $a->fullname,

Sie haben eine Änderung der E-Mail-Adresse für Ihr Nutzerkonto bei $a->site angefragt. Bitte öffnen Sie die folgende URL in Ihrem Browser, um die Änderung zu bestätigen.

$a->url';
$string['auth_emailupdatesuccess'] = 'Die E-Mail-Adresse von <em>$a->fullname</em> wurde erfolgreich aktualisiert: <em>$a->email</em>.';
$string['auth_emailupdatetitle'] = 'Bestätigung der E-Mail-Änderung bei $a->site';
$string['auth_invalidnewemailkey'] = 'Fehler: Falls Sie versuchen, die Änderung Ihrer E-Mail-Adresse zu bestätigen, dann haben Sie einen Fehler beim Kopieren der Ihnen zugesandten URL gemacht. Bitte kopieren Sie die URL noch einmal und versuchen es erneut.';
$string['auth_outofnewemailupdateattempts'] = 'Sie haben die zulässige Zahl der Versuche zur Aktualisierung Ihrer E-Mail-Adresse überschritten. Der Änderungsvorgang wurde abgebrochen.';