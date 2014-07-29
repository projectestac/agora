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
 * Strings for component 'auth', language 'sv', branch 'MOODLE_26_STABLE'
 *
 * @package   auth
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actauthhdr'] = 'Tillgängliga plugins för autenticering';
$string['alternatelogin'] = 'Om Du skriver in en URL här så kommer den att användas som sida för inloggning på den här webbplatsen. Sidan bör innehålla ett formulär som har egenskapen för händelse inställd till <strong>\'{$a}\'</strong><br />Var försiktig så att Du inte skriver in en felaktig URL eftersom Du då kan stänga Dig själv ute från webbplatsen. <br />Låt den här inställningen vara tom om Du vill använda standardsidan för inloggning.';
$string['alternateloginurl'] = 'Alternativ URL för inloggning';
$string['auth_changepasswordhelp'] = 'Hjälp angående ändring av lösenord';
$string['auth_changepasswordhelp_expl'] = 'Visa det förlorade lösenordet för dem som har blivit av med sitt {$a} lösenord. Det här kommer att visas antingen som, likaväl som, eller istället för <strong>Ändra lösenord URL</strong> eller för ändring av lösenord internt i Moodle.';
$string['auth_changepasswordurl'] = 'Ändra lösenord URL';
$string['auth_changepasswordurl_expl'] = 'Ange den url som Du vill skicka till de användare som har förlorat sina lösenord. Ställ in <strong>Använd standardsidan för att ändra lösenord</strong> till <strong>Nej</strong>.';
$string['auth_changingemailaddress'] = 'Du har begärt en ändring av e-postadress, från {$a->oldemail} till {$a->newemail}. Av säkerhetsskäl skickar vi dig ett e-postmeddelande till din nya adress för att försäkra att den tillhör dig. Din e-postadress kommer att uppdateras så snart du öppnar URL adressen som skickats till dig i det meddelandet.';
$string['auth_common_settings'] = 'Vanliga inställningar';
$string['auth_data_mapping'] = 'Kartor över data';
$string['authenticationoptions'] = 'Autenticering tillval';
$string['auth_fieldlock'] = 'Värde för låsningen';
$string['auth_fieldlock_expl'] = '<p><b>Värde för låsningen:</b>Om detta är aktiverat så kommer det att hindra användare och administratörer av Moodle från att redigera detta fält direkt. Använd detta fält om Du underhåller dessa data i det externa systemet för autenticering.';
$string['auth_fieldlocks'] = 'Låsning av användarfält';
$string['auth_fieldlocks_help'] = '<p>Du kan låsa användarnas datafält. Detta är användbart för webbplatser där administratörerna underhåller användardata manuellt genom att redigera användarposter eller genom att använda komponenten "Ladda upp användare".  Om Du låser de fält som Moodle kräver så ska Du säkerställa att Du fyller i dessa data när Du skapar användarkonton för annars kommer kontona att bli oanvändbara.</p><p>Överväg om Du ska ställa in låsningsläget till "Olåst om fältet är tomt" för att undvika detta problem.</p>';
$string['authinstructions'] = 'Lämna detta tomt för att visa standardinloggningsinstruktioner på inloggningssidan. Om du vill tillhandahålla egna inloggningsinstruktioner, ange dem här.';
$string['auth_invalidnewemailkey'] = 'Fel: om du försöker bekräfta ett byte av e-postadress kan du ha gjort ett misstag när du kopierat URL adressen vi skickade till dig med e-post. Vänligen kopiera adressen igen och försök på nytt.';
$string['auth_multiplehosts'] = 'Du kan ange flera värdar(t ex host1.com;host2.com;host3.com)';
$string['auth_outofnewemailupdateattempts'] = 'Fel: om du försöker bekräfta ett byte av e-postadress kan du ha gjort ett misstag när du kopierat URL adressen vi skickade till dig med e-post. Vänligen kopiera adressen igen och försök på nytt.';
$string['auth_passwordisexpired'] = 'Ditt lösenord gäller inte längre. Vill Du ändra Ditt lösenord nu?';
$string['auth_passwordwillexpire'] = 'Ditt lösenord kommer att upphöra att gälla om {$a} dagar. Vill Du ändra Ditt lösenord nu?';
$string['auth_remove_delete'] = 'Komplett internt borttagande';
$string['auth_remove_keep'] = 'Behåll internt';
$string['auth_remove_suspend'] = 'Stäng av internt';
$string['auth_remove_user'] = 'Ange vad Du vill ska hända med interna användarkonton under mass-synkronisering när användare flyttas från en extern källa. Endast avstängda användare kommer att automatiskt återställas om de dyker upp igen i en extern källa.';
$string['auth_remove_user_key'] = 'Tog bort extern användare';
$string['auth_sync_script'] = 'Skript för synkronisering av cron';
$string['auth_updatelocal'] = 'Uppdatera lokala data';
$string['auth_updatelocal_expl'] = '<p><b>Uppdatera lokala data:</b> Om detta är aktiverat så kommer fältet att uppdateras (från extern autenticering) varje gång användaren loggar in eller när det förekommer synkronisering av användare. Fält som är inställda att uppdatera lokalt bör vara låsta.</p>';
$string['auth_updateremote'] = 'Uppdatera externa data';
$string['auth_updateremote_expl'] = '<p><b>Uppdatera externa data:</b> Om detta är aktiverat så kommer den externa autenticeringen att uppdateras när en användarpost uppdateras. Fält bör vara olåsta så att redigering är tillåten.</p>';
$string['auth_updateremote_ldap'] = '<p><b>OBS!</b> Om Du uppdaterar externa LDAP-data så måste Du ställa in \'binddn\' och \'bindpw\' till en \'bind-user\' med rättigheter att  redigera alla posterna för användare. F.n. bevarar detta inte attribut med flerfaldiga värden, och det tar bort extra värden vid uppdateringar.</p>';
$string['auth_user_create'] = 'Aktivera';
$string['auth_user_creation'] = 'Nya (anonyma) användare kan utnyttja en extern källa för autenticering och skapa användarkonton som bekräftas med e-post. Om Du aktiverar detta får Du inte glömma att också konfigurera de modulspecifika valmöjligheterna som användare ska kunna skapa.';
$string['auth_usernameexists'] = 'Det valda användarnamnet finns redan. Du måste välja ett annat.';
$string['auto_add_remote_users'] = 'Lägg till fjärranvändare automatiskt';
$string['changepassword'] = 'URL   till sida för att ändra lösenord';
$string['changepasswordhelp'] = 'Här kan Du specificera en plats där Dina användare kan återställa eller ändra sina användarnamn/lösenord om de har glömt det. Detta kommer att visas för användarna som en knapp på sidan för inloggning och på deras användarsidor. Om Du lämnar detta tomt kommer inte knappen att visas.';
$string['chooseauthmethod'] = 'Välj en metod för autenticering:';
$string['chooseauthmethod_help'] = '<p>Den h&auml;r menyn l&aring;ter Dig &auml;ndra metoden f&ouml;r autenticering
   f&ouml;r den h&auml;r specifike/a anv&auml;ndaren.</p>
<p>Var sn&auml;ll och l&auml;gg m&auml;rke till att detta i h&ouml;g grad beror  p&aring; vilken metod f&ouml;r autenticering
som Du har valt f&ouml;r den h&auml;r webbplatsen och vilka inst&auml;llningar den anv&auml;nder.</p>
<p>En felaktig &auml;ndring h&auml;r kan g&ouml;ra det om&ouml;jligt f&ouml;r anv&auml;ndare att logga in eller
 t.o.m. ta bort deras konton helt och h&aring;llet s&aring; Du b&ouml;r bara genomf&ouml;ra detta om Du vet vad Du g&ouml;r.</p>';
$string['createpassword'] = 'Generera lösenord och meddela användare';
$string['createpasswordifneeded'] = 'Skapa  ett lösenord om så behövs';
$string['emailchangecancel'] = 'Avbryt ändring av e-postadress';
$string['emailchangepending'] = 'Aktivera ändringen av Din e-postadress. Öppna länken som Du har fått i {$a->preference_newemail}.';
$string['emailnowexists'] = 'Den e-postadress som Du försökte lägga till till Din profil har tilldelats någon annan efter Din ursprungliga begäran. Denna begäran har härmed avbrutits men Du kan pröva igen med en annan adress.';
$string['emailupdate'] = 'Uppdatering av e-postadress';
$string['emailupdatemessage'] = 'Käre/a  {$a->fullname},
Du har begärt en ändring av Din e-postadress för Ditt användarkonto på  {$a->site}. Var snäll och öppna länken nedan i Din webbläsare för att bekräfta den här ändringen.

 {$a->url},';
$string['emailupdatesuccess'] = 'Användaren <em>{$a->fullname}</em>s e-postadress har framgångsrikt uppdaterats till <em>{$a->email}</em>.';
$string['emailupdatetitle'] = 'Bekräftelse av uppdatering av e-postadress vid {$a->site}';
$string['enterthenumbersyouhear'] = 'Mat a in de tal du hör';
$string['enterthewordsabove'] = 'Mata in de ovanstående orden';
$string['errormaxconsecutiveidentchars'] = 'Lösenord måste ha som mest {$a} på varandra följande identiska tecken.';
$string['errorminpassworddigits'] = 'Lösenord måste innehålla minst {$a} siff/ror';
$string['errorminpasswordlength'] = 'Lösenord måste innehålla minst {$a} tecken';
$string['errorminpasswordlower'] = 'Lösenord måste innehålla minst {$a} små bokstäver';
$string['errorminpasswordnonalphanum'] = 'Lösenord måste innehålla minst {$a} icke-alfanumeriska tecken.';
$string['errorminpasswordupper'] = 'Lösenord måste innehålla minst {$a} stora bokstäver.';
$string['errorpasswordupdate'] = 'Det uppstod ett fel i samband med uppdatering av lösenord, lösenordet ändrades inte.';
$string['event_user_loggedin'] = 'Användaren har loggat in';
$string['eventuserloggedinas'] = 'Användaren är inloggad som en annan användare';
$string['forcechangepassword'] = 'Tvinga fram ändring av lösenord';
$string['forcechangepasswordfirst_help'] = 'Tvinga användare att byta lösenord första gången som de loggar in på Moodle.';
$string['forcechangepassword_help'] = 'Tvinga användare att byta lösenord nästa gång de loggar in på Moodle.';
$string['forgottenpassword'] = 'Om du matar in en URL här så kommer den att användas som sidan för att återvinna förlorade lösenord på den här webbplatsen. Detta är avsett för webbplatser där lösenord hanteras helt och hållet utanför Moodle. Låt detta vara tomt om du vill använda den förvalda standardmetoden för att återvinna lösenord.';
$string['forgottenpasswordurl'] = 'URL för förlorade lösenord';
$string['getanaudiocaptcha'] = 'Skaffa en  CAPTCHA i audioformat';
$string['getanimagecaptcha'] = 'Skaffa en  CAPTCHA i bildformat';
$string['getanothercaptcha'] = 'Skaffa en  CAPTCHA till';
$string['guestloginbutton'] = 'Knapp för inlgoggning för gäster';
$string['incorrectpleasetryagain'] = 'Felaktigt. Var snäll och försök igen.';
$string['infilefield'] = 'Det måste finnas ett fält i filen';
$string['informminpassworddigits'] = 'minst {$a} siffra/or';
$string['informminpasswordlength'] = 'minst {$a} tecken';
$string['informminpasswordlower'] = 'minst {$a} tecken';
$string['informminpasswordnonalphanum'] = 'minst {$a} icke-alfanumeriska tecken';
$string['informminpasswordupper'] = 'minst {$a} stor/a bokstav/stäver';
$string['informpasswordpolicy'] = 'Lösenordet måste innehåll {$a} ';
$string['instructions'] = 'Instruktioner';
$string['internal'] = 'Intern';
$string['locked'] = 'Låst';
$string['md5'] = 'MD5-kryptering';
$string['nopasswordchange'] = 'Det går inte att ändra lösenordet';
$string['nopasswordchangeforced'] = 'Du kan inte gå vidare utan att ändra Ditt lösenord, men det finns inte någon sida tillgänglig för att ändra det. Var snäll och kontakta Din administratör för Moodle.';
$string['noprofileedit'] = 'Det går inte att redigera profilen';
$string['ntlmsso_attempting'] = 'Försöker med enkel inloggning via NTLM...';
$string['ntlmsso_failed'] = 'Det fungerade inte med automatisk inloggning, försök med den vanliga sidan för inloggning...';
$string['ntlmsso_isdisabled'] = 'NTLM SSO är avaktiverat';
$string['passwordhandling'] = 'Administration av fält för lösenord';
$string['plaintext'] = 'Ren text';
$string['pluginnotenabled'] = 'Plugin-programmet för autenticering \'{$a}\' är inte aktiverat.';
$string['pluginnotinstalled'] = 'Plugin-programmet för autenticering \'{$a}\' är inte installerat.';
$string['potentialidps'] = 'Logga in med ditt konto på:';
$string['recaptcha'] = 'reCAPTCHA';
$string['recaptcha_help'] = 'CAPATCHA är till för att förhindra missbruk av automatiserade program. Ange orden i rutan i rätt ordning och separerade med ett mellanslag.

Om du inte är säker på vilka ord det är kan du försöka med att få en ny CAPATCHA eller en audio CAPATCHA.';
$string['selfregistration'] = 'Själv-registrering';
$string['selfregistration_help'] = 'Välj vilket plugin-program för autenticering som ska hantera själv-registrering.';
$string['sha1'] = 'SHA-1 grind (hash)';
$string['showguestlogin'] = 'Du kan gömma eller visa knappen för inloggning för gäster på sidan för inloggning.';
$string['stdchangepassword'] = 'Använd standardsidan för \'Ändra lösenord\'.';
$string['stdchangepassword_expl'] = 'Om det externa systemet för autenticering tillåter ändring av lösenord via Moodle så ska Du ändra detta till \'Yes\' (Ja). Den här inställningen har förträde över inställningen \'URL till sida för att ändra lösenord\'.';
$string['stdchangepassword_explldap'] = 'OBS! Vi rekommenderar att Du använder LDAP via en SSL-krypterad kanal (ldaps://) om Du använder en fjärrserver för LDAP.';
$string['suspended'] = 'Avaktiverat konto';
$string['suspended_help'] = 'Avaktiverade användarkonton kan inte användas för inloggning eller för att använda webbplatsen samt att alla utgående meddelanden förkastas.';
$string['testsettings'] = 'testinställningar';
$string['unlocked'] = 'Olåst';
$string['unlockedifempty'] = 'Olåst om det är tomt';
$string['update_never'] = 'Aldrig';
$string['update_oncreate'] = 'Vid skapande';
$string['update_onlogin'] = 'Vid varje inloggning';
$string['update_onupdate'] = 'Vid uppdatering';
$string['user_activatenotsupportusertype'] = 'auth: ldap user_activate() stödjer inte vald användartyp: {$a}';
$string['user_disablenotsupportusertype'] = 'auth: ldap user_disable() stödjer inte vald användartyp (..ännu)';
