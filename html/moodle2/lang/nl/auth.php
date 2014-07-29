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
 * Strings for component 'auth', language 'nl', branch 'MOODLE_26_STABLE'
 *
 * @package   auth
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actauthhdr'] = 'Actieve authenticatieplugins';
$string['alternatelogin'] = 'Als je hier een URL ingeeft, dan zal die dienen als loginpagina voor deze site. De pagina moet een formulier bevatten met de actie ingesteld op <strong>\'{$a}\'</strong> en die de velden <strong>username</strong> en <strong>password</strong> teruggeeft.<br />Let er op dat je een juiste URL ingeeft. Zoniet sluit je jezelf uit de site.<br />Laat deze instelling leeg als je de standaard loginpagina wil gebruiken.';
$string['alternateloginurl'] = 'URL van de alternatieve loginpagina';
$string['auth_changepasswordhelp'] = 'Hulp bij wijzigen wachtwoord';
$string['auth_changepasswordhelp_expl'] = 'Toon hulp aan gebruikers die hun {$a} wachtwoord niet meer hebben. Deze tekst zal getoond worden ofwel in de plaats van, ofwel samen met de <strong>Wijzig wachtwoord</strong>-link of het interne Moodle-mechanisme om wachtwoorden te wijzigen.';
$string['auth_changepasswordurl'] = 'URL voor het wijzigen van het wachtwoord';
$string['auth_changepasswordurl_expl'] = 'Specifieer de url waarnaar gebruikers gestuurd worden als ze hun {$a} wachtwoord verloren zijn. Verzet de instelling <strong>Gebruik standaard pagina voor wachtwoordwijziging</strong> naar <strong>Nee</strong>';
$string['auth_changingemailaddress'] = 'Je hebt gevraagd om je e-mailadres wijzigen van {$a->oldemail} naar {$a->newemail}. Als veiligheidsmaatregel sturen we je een e-mailbericht naar het nieuwe adres om te bevestigen dat dit adres van jouw is. Je e-mailadres zal gewijzigd worden zodra je de URL opent die in dat bericht staat.';
$string['auth_common_settings'] = 'Algemene instellingen';
$string['auth_data_mapping'] = 'Data mapping';
$string['authenticationoptions'] = 'Opties voor authenticatie';
$string['auth_fieldlock'] = 'Blokkeer waarde';
$string['auth_fieldlock_expl'] = '<p><b>Blokkeerwaarde:</b>Indien ingeschakeld zal Moodle verhinderen dat gebruikers en beheerders dit veld rechtstreeks kunnen bewerken. Gebruik deze optie als je deze gegevens in het externe authentificatiesysteem wil bewaren.</p>';
$string['auth_fieldlocks'] = 'Blokkeer gebruikersvelden';
$string['auth_fieldlocks_help'] = '<p>Je kunt gegevensvelden van de gebruikers blokkeren. Dit is nuttig voor sites waar het beheer van de gegevens van de gebruikers manueel of door de \'Upload gebruikers\'-functie gebeurt. Als je door Moodle vereiste velden blokkeert, zorg er dan voor dat je die gegevens voorziet wanneer je gebruikers aanmaakt of de accounts zullen onbruikbaar zijn.</p><p>Overweeg om de blokkeermodus in te stellen op \'Niet geblokkeerd als leeg\' om dit probleem te voorkomen.</p>';
$string['authinstructions'] = 'Laat dit leeg om de standaard login instructies op de loginpagina te tonen. Als je aangepaste login-instructies wil weergeven, zet ze dan hier.';
$string['auth_invalidnewemailkey'] = 'Fout. Als je probeert een wijziging van e-mailadres te bevestigen, dan heb je misschien een fout gemaakt bij het kopieëren van de URL van de e-mail die we je toezonden. Probeer opnieuw.';
$string['auth_multiplehosts'] = 'Je kunt verschillende hosts ingeven (bijv. host1.com;host2.com;host3.com)';
$string['auth_outofnewemailupdateattempts'] = 'Je hebt het maximale aantal pogingen om je wijziging van e-mailadres te bevestigen bereikt. Je wijzigingsaanvraag is geannuleerd.';
$string['auth_passwordisexpired'] = 'Je wachtwoord is verlopen. Wil je het nu wijzigen?';
$string['auth_passwordwillexpire'] = 'Je wachtwoord zal binnen {$a} dagen verlopen. Wil je het nu wijzigen?';
$string['auth_remove_delete'] = 'Verwijder interne gegevens volledig';
$string['auth_remove_keep'] = 'Behoud interne gegevens';
$string['auth_remove_suspend'] = 'Blokkeer interne gegevens';
$string['auth_remove_user'] = 'Geef op wat er moet gebeuren met interne gebruikersaccounts gedurende een volledige synchronisatie wanneer de gebruiker verwijderd was van de externe bron.
Enkel geblokkeerde gebruikers worden automatisch terug geactiveerd wanneer ze terug in de externe bron verschijnen.';
$string['auth_remove_user_key'] = 'Externe gebruiker verwijderd';
$string['auth_sync_script'] = 'Cron synchronisatirscript';
$string['auth_updatelocal'] = 'Update lokale gegevens';
$string['auth_updatelocal_expl'] = '<p><b>Update lokale gegevens:</b>Als je dit inschakelt, dan zal het veld (van de externe authenticatie) automatisch geüpdatet worden telkens de gebruiker zich aanmeldt of wanneer er een gebruikerssynchronisatie gebeurt. Velden die lokaal worden geüpdatet moeten geblokkeerd worden.</p>';
$string['auth_updateremote'] = 'Update externe gegevens';
$string['auth_updateremote_expl'] = '<p><b>Update de externe gegevens:</b>Als dit ingeschakeld is dan zal de externe authenticatie geüpdatet worden als een gebruikersrecord geüpdatet wordt. De velden mogen niet geblokkeerd zijn om bewerken mogelijk te maken.</p>';
$string['auth_updateremote_ldap'] = '<p><b>Merk op:</b>Voor het updaten van externe LDAP-gegevens is het nodig dat je binddn en bindpw instelt bij een bind-gebruiker met bewerkrechten op alle gebruikersrecords. Op dit ogenblik behoud het geen attributen met meerdere waarden en dus zullen extra waarden bij update verwijderd worden.</p>';
$string['auth_user_create'] = 'Zet het aanmaken van gebruikers aan';
$string['auth_user_creation'] = 'Nieuwe (anonieme) gebruikers kunnen gebruikersaccounts aanmaken op de externe authenticatiebron en bevestigen via e-mail. Als je dit aanzet, vergeet dan niet ook de module specifieke opties voor het aanmaken van gebruikers te configureren.';
$string['auth_usernameexists'] = 'De gekozen gebruikersnaam bestaat al. Kies alsjeblieft een andere gebruikersnaam.';
$string['auto_add_remote_users'] = 'Voeg externe gebruikers automatisch toe';
$string['changepassword'] = 'URL voor het veranderen van het wachtwoord';
$string['changepasswordhelp'] = 'Hier kun je een locatie aangeven waar gebruikers hun gebruikersnaam/wachtwoord kunnen terugkrijgen als ze deze vergeten zijn. De gebruikers zullen op hun inlogpagina en op hun gebruikerspagina een knop krijgen. Als je dit leeg laat zal de knop niet verschijnen.';
$string['chooseauthmethod'] = 'Kies een methode van authenticatie:';
$string['chooseauthmethod_help'] = '<p>Met dit menu kun je de authenticatiemethode voor deze gebruiker wijzigen.</p>

<p>Let op dat dit sterk afhankelijk is van de authenticatiemethodes die je ingesteld hebt voor de site en welke instellingen je gebruikt.</p>

<p>Hier een fout maken kan ervoor zorgen dat de gebruiker niet meer aangemeld geraakt of kan zelfs de account helemaal verwijderen. Gebruik dit alleen als je echt weet wat je doet.</p>';
$string['createpassword'] = 'Genereer wachtwoord en verwittig gebruiker';
$string['createpasswordifneeded'] = 'Maak een wachtwoord indien nodig';
$string['emailchangecancel'] = 'Annuleer e-mailwijziging';
$string['emailchangepending'] = 'De wijziging is in behandeling. Open de link in het bericht dat gestuurd is naar {$a->preference_newemail}.';
$string['emailnowexists'] = 'Het e-mailadres dat je probeert te gebruiken, is al in gebruik door iemand anders. Daarom wordt deze wijziging geannuleerd. Je kunt wel opnieuw proberen met een ander e-mailadres.';
$string['emailupdate'] = 'E-mailadres aanpassen';
$string['emailupdatemessage'] = 'Beste {$a->fullname},

Je hebt gevraagd om je e-mailadres te wijzigen voor je account op {$a->site}. Open volgende URL in je browser om deze wijziging te bevestigen.

{$a->url}';
$string['emailupdatesuccess'] = 'Het e-mail adres van gebruiker <em>{$a->fullname}</em> is gewijzigd naar <em>{$a->email}</em>.';
$string['emailupdatetitle'] = 'Bevestiging van wijziging e-mailadres op  {$a->site}';
$string['enterthenumbersyouhear'] = 'Vul hier de cijfers in die je hoort';
$string['enterthewordsabove'] = 'Vul hier bovenstaande woorden in';
$string['errormaxconsecutiveidentchars'] = 'Wachtwoorden mogen maximaal {$a} opeenvolgende gelijke tekens hebben';
$string['errorminpassworddigits'] = 'Wachtwoorden moeten minstens {$a} cijfers hebben.';
$string['errorminpasswordlength'] = 'Wachtwoorden moeten minstens {$a} tekens lang zijn.';
$string['errorminpasswordlower'] = 'Wachtwoorden moeten minstens {$a} kleine letters hebben.';
$string['errorminpasswordnonalphanum'] = 'Wachtwoorden moeten minstens {$a} niet-alphanumerieke tekens hebben.';
$string['errorminpasswordupper'] = 'Wachtwoorden moeten minstens {$a} hoofdletters hebben.';
$string['errorpasswordupdate'] = 'Fout tijdens het updaten van het wachtwoord, wachtwoord niet gewijzigd.';
$string['event_user_loggedin'] = 'Gebruiker ingelogd';
$string['eventuserloggedinas'] = 'Gebruiker ingelogd als een andere gebruiker';
$string['forcechangepassword'] = 'Verplicht het wijzigen van het wachtwoord';
$string['forcechangepasswordfirst_help'] = 'Verplicht gebruikers om hun wachtwoord te wijzigen bij hun eerste aanmelding bij Moodle.';
$string['forcechangepassword_help'] = 'Verplicht gebruikers om hun wachtwoord te wijzigen bij hun volgende aanmelding bij Moodle';
$string['forgottenpassword'] = 'Als je hier een URL ingeeft, dan zal die gebruikt worden als pagina voor verloren wachtwoorden voor deze site. Dit is bedoeld voor sites waar de wachtwoorden volledig buiten Moodle afgehandeld worden. Laat leeg om de standaardprocedure voor vergeten wachtwoorden te gebruiken.';
$string['forgottenpasswordurl'] = 'URL voor vergeten wachtwoorden';
$string['getanaudiocaptcha'] = 'Vraag een audio CAPTCHA';
$string['getanimagecaptcha'] = 'Vraag een afbeelding CAPTCHA';
$string['getanothercaptcha'] = 'Vraag een andere CAPTCHA';
$string['guestloginbutton'] = 'Knop om in te loggen als gast';
$string['incorrectpleasetryagain'] = 'Fout. Probeer opnieuw';
$string['infilefield'] = 'Veld vereist in bestand';
$string['informminpassworddigits'] = 'minstens {$a} getal(len)';
$string['informminpasswordlength'] = 'minstens {$a} teken(s)';
$string['informminpasswordlower'] = 'minstens {$a} kleine letter(s)';
$string['informminpasswordnonalphanum'] = 'minstens {$a} niet-alphanummerieke teken(s)';
$string['informminpasswordupper'] = 'minstens {$a} hoofdletter(s)';
$string['informpasswordpolicy'] = 'Het wachtwoord moet {$a} hebben';
$string['instructions'] = 'Instructies';
$string['internal'] = 'Intern';
$string['locked'] = 'Geblokkeerd';
$string['md5'] = 'MD5-encryptie';
$string['nopasswordchange'] = 'Wachtwoord kan niet gewijzigd worden';
$string['nopasswordchangeforced'] = 'Je kunt niet verdergaan zonder je wachtwoord te wijzigen, hoewel er geen pagina voorzien is om dat te doen. Neem contact op met je Moodlebeheerder';
$string['noprofileedit'] = 'Profiel kan niet bewerkt worden';
$string['ntlmsso_attempting'] = 'Single sign on via NTLM wordt geprobeerd...';
$string['ntlmsso_failed'] = 'Auto-login mislukt, probeer de gewone loginpagina...';
$string['ntlmsso_isdisabled'] = 'NTLM SSO is uitgeschakeld';
$string['passwordhandling'] = 'Behandeling van het wachtwoordveld';
$string['plaintext'] = 'Platte tekst';
$string['pluginnotenabled'] = 'Authenticatieplugin \'{$a}\' is niet ingeschakeld.';
$string['pluginnotinstalled'] = 'Authenticatieplugin \'{$a}\' is niet geïnstalleerd';
$string['potentialidps'] = 'Login met je account op:';
$string['recaptcha'] = 'reCAPTCHA';
$string['recaptcha_help'] = '<h2>Beschrijving</h2>
<p>Een CAPTCHA is een computer dat het onderscheid kan maken tussen een computer en een mens. CAPTCHAs worden door veel websites gebruikt om misbruik van  "bots," of geautomatiseerde programma\'s voor het genereren van spam te voorkomen. Een computerprogramma kan vervormde tekst niet zo goed lezen als een mens dat kan. Daarom kunnen die bots niet navigeren over sites die beschermd zijn door  CAPTCHAs.</p>

<h2>Instructies</h2>
<p>Vul de woorden in die je ziet in de box, in de juiste volgorde en gescheiden door een spatie. Deze procedure helpt het voorkomen van misbruik van deze site door geautomatiseerde programma\'s.</p>

<p>Als je niet zeker bent wat de woorden zijn, maak dan een gokje of volg de link "Geef nog een CAPTCHA". </p>

<p>Visueel beperkte gebruikers kunnen de link "Geef een audio-CAPTCHA" volgen om een reeks tekens te horen die ingevuld kunnen worden in de plaats van de visuele test.</p>';
$string['selfregistration'] = 'Zelfregistratie';
$string['selfregistration_help'] = 'Als een authenticatieplugin, zoals e-mailgebaseerde zelfregistratie, is geselecteerd, dan kunnen potentiele gebruikers zichzelf registreren en accounts maken. Dit zorgt ervoor dat spammers accounts kunnen maken om forums en blogs te gaan gebruiken voor spam. Om dit risico te beperken zou zelfregistratie moeten uitgeschakeld worden of beperkt worden door de <em>Toegestane e-maildomeinen</em>-instelling.';
$string['sha1'] = 'SHA1 hash';
$string['showguestlogin'] = 'Je kunt de knop om in te loggen als gast verbergen of laten zien op de inlogpagina.';
$string['stdchangepassword'] = 'Gebruik de standaardpagina om het wachtwoord te wijzigen';
$string['stdchangepassword_expl'] = 'Zet dit op ja als het externe systeem toelaat om wachtwoorden via Moodle te wijzigen. Deze instelling gaat voor op de "Verander wachtwoord-URL"';
$string['stdchangepassword_explldap'] = 'Merk op: het is aan te raaden om LDAP te gebruiken met een SSL geëncrypteerde tunnel (ldaps://) als de LDAP-server op afstand staat.';
$string['suspended'] = 'Geschorste account';
$string['suspended_help'] = 'Geschorste gebruikersaccounts kunnne niet inloggen via webservices en uitgaande berichten worden verworpen.';
$string['testsettings'] = 'Test instellingen';
$string['testsettingsheading'] = 'Test authenticatie-instellingen - {$a}';
$string['unlocked'] = 'Niet geblokkeerd';
$string['unlockedifempty'] = 'Niet geblokkeerd indien leeg';
$string['update_never'] = 'Nooit';
$string['update_oncreate'] = 'Bij het  aanmaken';
$string['update_onlogin'] = 'Bij elke aanmelding';
$string['update_onupdate'] = 'Bij het updaten';
$string['user_activatenotsupportusertype'] = 'auth: ldap user_activate() ondersteunt het geselecteerde gebruikerstype niet: {$a}';
$string['user_disablenotsupportusertype'] = 'auth: ldap user_disable() ondersteunt het geselecteerde gebruikerstype (nog) niet';
