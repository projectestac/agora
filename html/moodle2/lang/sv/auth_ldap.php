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
 * Strings for component 'auth_ldap', language 'sv', branch 'MOODLE_24_STABLE'
 *
 * @package   auth_ldap
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_ldap_ad_create_req'] = 'Det går inte att skapa ett nytt konto i den aktiva katalogen. Se till att Du uppfyller alla krav för att detta ska fungera (LDAPS connection, bind user med de rättigheter som krävs etc.)';
$string['auth_ldap_attrcreators'] = 'Lista över grupper eller sammanhang vars medlemmar har tillstånd att skapa attribut. Separera grupper med \':\'. Vanligen något i stil med \'cn=lärare,ou=personal,o=minorg\'';
$string['auth_ldap_attrcreators_key'] = 'Attribut för skapare';
$string['auth_ldap_auth_user_create_key'] = 'Skapa användare externt';
$string['auth_ldap_bind_dn'] = 'Om Du vill bruka \'bind\'-användare för att söka användare, så ska Du specificera det här. Något som \'cn=ldapuser,ou=public,o=org\'';
$string['auth_ldap_bind_dn_key'] = 'Urskiljt namn';
$string['auth_ldap_bind_pw'] = 'Lösenord för \'bind\'-användare.';
$string['auth_ldap_bind_pw_key'] = 'Lösenord';
$string['auth_ldap_bind_settings'] = 'Inställningar för \'bind\'';
$string['auth_ldap_changepasswordurl_key'] = 'URL till sida för att ändra lösenord';
$string['auth_ldap_contexts'] = 'Lista av kontexter där användarna finns med. Separera olika kontexter med \';\'.  Till exempel: \'ou=users,o=org; ou=others,o=org\'';
$string['auth_ldap_contexts_key'] = 'Sammanhang';
$string['auth_ldap_create_context'] = 'Om Du aktiverar \'Skapa användare\' med e-postbekräftelse så ska Du specifiera den kontext där användare skapas. Denna kontext bör vara en annan än den vanliga för att undvika säkerhetsrisker. Du behöver inte lägga till denna kontext till variabeln \'ldap_context\'. Moodle letar automatiskt efter användare från den här kontexten.<br /><b>OBS!</b> Du måste modifiera metoden \'ser_create\' i filen \'auth/ldap/auth.php för att se till att \'skapa användare\' fungerar.';
$string['auth_ldap_create_context_key'] = 'Sammanhang för nya användare';
$string['auth_ldap_create_error'] = 'Fel i samband med en användare skulle skapas i LDAP';
$string['auth_ldap_creators'] = 'Lista av grupper som har behörighet att skapa nya kurser. Skilj på grupperna med \';\'. Vanligtvis något liknande \'ch=utbildare, ou=personal, o=minOrg\'';
$string['auth_ldap_creators_key'] = 'Skapare';
$string['auth_ldapdescription'] = 'Denna metod ger autenticering mot en extern LDAP-server. Om det givna användarnamnet och lösenordet är giltiga skapar Moodle en plats för en ny användare i databasen. Denna modul kan läsa användarattribut från LDAP och fylla i på förhand önskade fält i Moodle. För följande inloggning är endast användarnamn och lösenord kontrollerade.';
$string['auth_ldap_expiration_desc'] = 'Välj \'Nej\' för att avaktivera kontroll av lösenord som har gått ut eller LDAP för att läsa \'passwordexpiration time\' direkt från LDAP. Kom ihåg att fylla i namnet på attributet, nämligen \'ldap_expireattr\'.';
$string['auth_ldap_expiration_key'] = 'Giltighetstiden går ut';
$string['auth_ldap_expiration_warning_desc'] = 'Antal dagar innan det skickas en varning om att giltighetstiden för lösenordet går ut.';
$string['auth_ldap_expiration_warning_key'] = 'Varning om att  giltighetstiden går ut.';
$string['auth_ldap_expireattr_desc'] = 'Valfritt: detta överskrider det LDAP-attribut som lagrar den giltighetstid då lösenordet går ut.';
$string['auth_ldap_expireattr_key'] = 'Attribut för att giltighetstiden går ut';
$string['auth_ldapextrafields'] = 'Dessa fält är valfria. Du kan välja att på förhand fylla i några användarfält för Moodle med information från <b>LDAP-fält</b> som Du kan specificera här. <p>Om Du lämnar dessa fält tomma, så kommer inget att föras över från LDAP och standardvärden för Moodle kommer att användas istället. I vilket fall som helst, kommer användaren kunna redigera alla dessa fält efter det att de loggat in.</p>';
$string['auth_ldap_graceattr_desc'] = 'Valfritt: Överskrider LDAP-attributet  \'gracelogin\'';
$string['auth_ldap_gracelogin_key'] = 'Attribut för \'grace\' inloggning';
$string['auth_ldap_gracelogins_desc'] = 'Aktivera stöd för LDAP \'gracelogin\'. När tiden för ett lösenord har gått ut så kan användaren logga in tills räknaren för \'gracelogin\' är 0. Att aktivera denna inställning visar ett \'grace login\'-meddelande om lösenordet har gått ut.';
$string['auth_ldap_gracelogins_key'] = '\'Grace\' inloggningar';
$string['auth_ldap_groupecreators'] = 'Lista över grupper eller sammanhang vars medlemmar har tillstånd att skapa grupper. Separera multipla grupper med \';\'. Vanligen något i stil med \'cn=lärare,ou=personal,o=minorg\'';
$string['auth_ldap_groupecreators_key'] = 'Gruppera skapare';
$string['auth_ldap_host_url'] = 'Specificera en LDAP-värd i URL-form som \'ldap://ldap.myorg.com/\' eller \'ldaps://ldap.myorg.com/\'';
$string['auth_ldap_host_url_key'] = 'URL till värd';
$string['auth_ldap_ldap_encoding'] = 'Specificera den teckenuppsättning som används av LDAP-servern. Det är mest sannolikt utf-8 men MS AD v2 använder förvald standard för teckenuppsättning som t.ex. cp1252, cp1250 etc.';
$string['auth_ldap_ldap_encoding_key'] = 'Teckenuppsättning enligt LDAP';
$string['auth_ldap_login_settings'] = 'Inställningar för inloggning';
$string['auth_ldap_memberattribute'] = 'Specificera en medlems egenskaper när användare tillhör en grupp. Vanligtvis \'medlem\'';
$string['auth_ldap_memberattribute_isdn'] = 'Valfritt: Detta överskrider hantering av värden för medlemmars attribut, antingen 0 eller 1.';
$string['auth_ldap_memberattribute_isdn_key'] = 'medlems attribut använder dn';
$string['auth_ldap_memberattribute_key'] = 'medlems attribut';
$string['auth_ldap_noconnect'] = 'Det gick inte att ansluta LDAP-modulen till server: {$a}';
$string['auth_ldap_noconnect_all'] = 'Det gick inte att ansluta LDAP-modulen till några servrar: {$a}';
$string['auth_ldap_noextension'] = 'Varning! Det verkar som om det inte finns någon PHP LDAP-modul. Var snäll och säkerställ att den är installerad och aktiverad.';
$string['auth_ldap_no_mbstring'] = 'Du behöver komplementeringen mbstring för att skapa användare i den aktiva katalogen.';
$string['auth_ldapnotinstalled'] = 'Det går inte att använda autenticering via LDAP. PHP-modulen för LDAP är inte installerad.';
$string['auth_ldap_objectclass'] = 'Valfritt: Detta överskrider det \'objectClass\' som används för att namnge/söka användare på \'ldap_user_type\'. Normalt sett så behöver Du inte ändra på detta.';
$string['auth_ldap_objectclass_key'] = 'Klass på objekt';
$string['auth_ldap_opt_deref'] = 'Detta avgör hur alias hanteras under sökning. Markera ett av det följande värdena: "No" (LDAP_DEREF_NEVER) eller "Yes" (LDAP_DEREF_ALWAYS)';
$string['auth_ldap_opt_deref_key'] = 'Alias för \'dereference\'';
$string['auth_ldap_passtype'] = 'Ange formatet på nya eller ändrade lösenord i LDAP-servern.';
$string['auth_ldap_passtype_key'] = 'Format för lösenord';
$string['auth_ldap_passwdexpire_settings'] = 'Inställningar för lösenords giltighetstid enligt LDAP';
$string['auth_ldap_preventpassindb'] = 'Markera "Ja" för att förhindra lösenord från att lagras i Moodles databas.';
$string['auth_ldap_preventpassindb_key'] = 'Dölj lösenord';
$string['auth_ldap_search_sub'] = 'Sätt in ett värde <> 0 om Du vill söka användare från subkontexter.';
$string['auth_ldap_search_sub_key'] = 'Sök i lägre sammanhang';
$string['auth_ldap_server_settings'] = 'Inställningar för LDAP-server';
$string['auth_ldap_unsupportedusertype'] = '\'auth: ldap user_create()\' stödjer inte den valda användartypen: \'{$a}\' ';
$string['auth_ldap_update_userinfo'] = 'Uppdatera användarinformation (förnamn, efternamn, adress..) från LDAP till Moodle.  Se \'/auth/ldap/attr_mappings.php\' för mappnings-information';
$string['auth_ldap_user_attribute'] = 'Attributet som används för namn/sökning av användare. Vanligtvis \'cn\'.';
$string['auth_ldap_user_attribute_key'] = 'Attribut för användare';
$string['auth_ldap_user_exists'] = 'Användarnamnet finns redan i LDAP';
$string['auth_ldap_user_settings'] = 'Inställningar för \'slå upp användare\'';
$string['auth_ldap_user_type'] = 'Välj hur användare ska lagras i LDAP. Den här inställningen anger hur upphörande av login, \'grace\'-login och skapande av användare ska gå till.';
$string['auth_ldap_user_type_key'] = 'Typ av användare';
$string['auth_ldap_usertypeundefined'] = '\'config.user_type\' är inte definierad eller också stödjer funktionen \'ldap_expirationtime2unix\' inte den valda typen!';
$string['auth_ldap_usertypeundefined2'] = '\'config.user_type\' är inte definierad eller också stödjer funktionen \'ldap_unixi2expirationtime\' inte den valda typen!';
$string['auth_ldap_version'] = 'Detta är den version av LDAP-protokollet som Din server använder.';
$string['auth_ldap_version_key'] = 'Version';
$string['auth_ntlmsso'] = 'NTLM SSO';
$string['auth_ntlmsso_enabled'] = 'Ställ in detta till Ja för att försöka Enkel inloggning med hjälp av domänen NTLM. <strong>OBS!</strong>Detta kräver en kompletterande inställning på webbservern för att det ska fungera, se <a href="http://docs.moodle.org/en/NTLM_authentication">http://docs.moodle.org/en/NTLM_authentication</a>';
$string['auth_ntlmsso_enabled_key'] = 'Aktivera';
$string['auth_ntlmsso_ie_fastpath_key'] = 'Snabbväg till MS IE?';
$string['auth_ntlmsso_subnet'] = 'Om detta är inställt så kommer det bara att försöka med SSO med klienter i det här undernätet. Format: xxx.xxx.xxx.xxx/bitmask';
$string['auth_ntlmsso_subnet_key'] = 'Undernät';
$string['auth_ntlmsso_type_key'] = 'Typ av autenticering';
$string['connectingldap'] = 'Ansluter till en LDAP-server';
$string['creatingtemptable'] = 'Skapar en tillfällig tabell {$a} ';
$string['didntfindexpiretime'] = 'password_expire() kunde inte hitta någon utgående tid';
$string['didntgetusersfromldap'] = 'Hittade inga användare från LDAP - fel? - avslutar';
$string['gotcountrecordsfromldap'] = 'Hittade {$a} datauppgifter som kommer från LDAP';
$string['morethanoneuser'] = 'Konstigt!?! Mer än en datauppgift för användare hittades i LDAP. Endast den första används.';
$string['noemail'] = 'Vi försökte att skicka e-post till Dig men det misslyckades!';
$string['notcalledfromserver'] = 'Detta borde inte anropas från webbservern!';
$string['noupdatestobedone'] = 'Det finns inga uppdateringar att göra';
$string['nouserentriestoremove'] = 'Det finns inga inlägg från användare att ta bort';
$string['nouserentriestorevive'] = 'Det finns inga inlägg från användare att re-aktivera';
$string['nouserstobeadded'] = 'Det finns inga användare att lägga till';
$string['ntlmsso_attempting'] = 'Försöker med enkel inloggning via NTLM...';
$string['ntlmsso_failed'] = 'Det fungerade inte med automatisk inloggning, försök med den vanliga sidan för inloggning...';
$string['ntlmsso_isdisabled'] = 'NTLM SSO är avaktiverat';
$string['ntlmsso_unknowntype'] = 'Okänd typ av ntlmsso!';
$string['pluginname'] = 'Använd en LDAP-server';
$string['pluginnotenabled'] = 'Denna plugin har inte aktiverats!';
$string['renamingnotallowed'] = 'Den användare som återstår är inte tillåten i LDAP';
$string['userentriestoadd'] = 'Inlägg från användare som ska läggas till: {$a}';
$string['userentriestoremove'] = 'Inlägg från användare som ska tas bort: {$a}';
$string['userentriestorevive'] = 'Inlägg från användare som ska re-aktiveras: {$a}';
$string['userentriestoupdate'] = 'Inlägg från användare som ska uppdateras: {$a}';
$string['usernotfound'] = 'Det gick inte att hitta användaren i LDAP';
