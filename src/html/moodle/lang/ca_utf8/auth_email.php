<?php

// All of the language strings in this file should also exist in
// auth.php to ensure compatibility in all versions of Moodle.

$string['auth_changingemailaddress'] = 'Heu sol·licitat un canvi d\'adreça de correu. Adreça actual: $a->oldemail. Adreça nova: $a->newemail. Per a més seguretat us enviarem un missatge de correu a l\'adreça nova, de manera que puguem confirmar que us pertany. El canvi d\'adreça de correu només es farà efectiu si seguiu l\'enllaç que figura en aquell missatge.';
$string['auth_emailchangecancel'] = 'Cancel·la el canvi de correu';
$string['auth_emailchangepending'] = 'Canvi pendent. Obriu l\'enllaç que us hem enviat a l\'adreça $a->preference_newemail.';
$string['auth_emaildescription'] = 'La confirmació per correu electrònic és el mètode d\'autenticació per defecte. Quan l\'usuari es registra i tria el seu nom d\'usuari i contrasenya, se li envia un missatge per confirmar les dades. Aquest missatge conté un enllaç segur a una pàgina en la qual l\'usuari pot confirmar el seu compte. En les connexions següents simplement es compara el nom d\'usuari i la contrasenya amb els valors guardats a la base de dades de Moodle.';
$string['auth_emailnoemail'] = 'No ha estat possible enviar-vos un correu electrònic.';
$string['auth_emailnoinsert'] = 'No ha estat possible afegir el vostre registre a la base de dades.';
$string['auth_emailnowexists'] = 'L\'adreça de correu que heu intentat vincular al vostre perfil ha estat assignada a un altre compte des que vau fer la sol·licitud de canvi de correu. Per tant s\'ha cancel·lat aquesta sol·licitud. Podeu tornar a intentar-ho amb una altra adreça.';
$string['auth_emailrecaptcha'] = 'Afegeix un element de confirmació visual o sonor al formulari de registre, per a usuaris de l\'autoregistre per correu electrònic. Això protegeix el lloc contra la brossa i a més a més contribueix a una bona causa. Vegeu <a href=\"http://recaptcha.net/learnmore.html\">http://recaptcha.net/learnmore.html</a> per a més informació.';
$string['auth_emailrecaptcha_key'] = 'Habilita element reCAPTCHA';
$string['auth_emailsettings'] = 'Paràmetres';
$string['auth_emailtitle'] = 'Autenticació basada en el correu electrònic';
$string['auth_emailupdate'] = 'Actualització de l\'adreça de correu';
$string['auth_emailupdatemessage'] = '$a->fullname,

Heu sol·licitat el canvi d\'adreça de correu electrònic del vostre compte d\'usuari en $a->site. Obriu si us plau l\'enllaç següent amb el vostre navegador per confirmar el canvi:

$a->url';
$string['auth_emailupdatesuccess'] = 'L\'adreça de correu electrònic de l\'usuari <em>$a->fullname</em> ha estat actualitzada i ara és <em>$a->email</em>.';
$string['auth_emailupdatetitle'] = 'Confirmació d\'actualització d\'adreça de correu en $a->site';
$string['auth_invalidnewemailkey'] = 'Error: si esteu intentant confirmar un canvi d\'adreça de correu, probablement heu copiat malament l\'enllaç que havíeu rebut. Copieu l\'enllaç complet i torneu a intentar-ho.';
$string['auth_outofnewemailupdateattempts'] = 'Heu esgotat els intents d\'actualització de la vostra adreça de correu electrònic. La vostra sol·licitud s\'ha cancel·lat.';