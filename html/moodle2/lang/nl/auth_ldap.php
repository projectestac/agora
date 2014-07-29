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
 * Strings for component 'auth_ldap', language 'nl', branch 'MOODLE_26_STABLE'
 *
 * @package   auth_ldap
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_ldap_ad_create_req'] = 'Kan de nieuwe account niet aanmaken in de Active Directory. Zorg ervoor dat alle vereisten om dit mogelijk te maken voorzien zijn (LDAPS-verbinding, bind-gebruiker met de juiste rechten enz.)';
$string['auth_ldap_attrcreators'] = 'Lijst van groepen of contexten waarvan de leden het recht hebben attributen aan te maken. Gebruik een \';\' als scheidingsteken tussen meerdere groepen. Gewoonlijk wordt dat iets als \'cn=leraars,ou=personeel,o=mijn_organisatie\'';
$string['auth_ldap_attrcreators_key'] = 'Wie attributen mag aanmaken';
$string['auth_ldap_auth_user_create_key'] = 'Maak gebruikers extern aan';
$string['auth_ldap_bind_dn'] = 'Als je \'bind-user\' wilt gebruiken om gebruikers te zoeken, dan moet je dat hier aangeven. Bijvoorbeeld \'cn=ldapuser,ou=public,o=org\'';
$string['auth_ldap_bind_dn_key'] = 'Unieke naam';
$string['auth_ldap_bind_pw'] = 'Wachtwoord voor de \'bind-user\'';
$string['auth_ldap_bind_pw_key'] = 'Wachtwoord';
$string['auth_ldap_bind_settings'] = 'Bind instellingen';
$string['auth_ldap_changepasswordurl_key'] = 'URL om wachtwoord te wijzigen';
$string['auth_ldap_contexts'] = 'Lijst met contexten waar de gebruikers gelocaliseerd zijn. Scheid verschillende contexten met \';\'. Bijvoorbeeld: \'ou=users,o=org; ou=others,o=org\'';
$string['auth_ldap_contexts_key'] = 'Contexten';
$string['auth_ldap_create_context'] = 'Als je het aanmaken van gebruikers met e-mailbevestiging aanzet, moet je de context aangeven waarin gebruikers worden aangemaakt. Deze context moet verschillen van andere contexten om beveiligingsproblemen te vermijden. Deze context hoef je niet toe te voegen aan ldap_context_variable. Moodle zoekt automatisch de gebruikers uit deze context.<br /><b>Merk op!</b> Je moet de functie auth_user_create() in het bestand auth/ldap/lib.php wijzigen om er voor te zorgen dat het aanmaken van gebruikers werkt.';
$string['auth_ldap_create_context_key'] = 'Context voor nieuwe gebruikers';
$string['auth_ldap_create_error'] = 'Fout bij het aanmaken van de gebruiker in LDAP';
$string['auth_ldap_creators'] = 'Lijst met groepen gebruikers. De leden van de groepen mogen nieuwe cursussen aanmaken. Scheid verschillende groepen met \';\'. Meestal iets als \'cn=leraren,ou=medewerkers,o=mijnorganisatie\'';
$string['auth_ldap_creators_key'] = 'Aanmakers';
$string['auth_ldapdescription'] = 'Deze methode levert authenticatie door middel van een externe LDAP-server.
Als de gebruikersnaam en wachtwoord geldig zijn maakt Moodle een nieuwe gebruiker aan in zijn database. Deze module kan gebruikerseigenschappen vanuit LDAP lezen en bepaalde velden in Moodle alvast invullen. Bij latere aanmeldingen worden alleen de gebruikersnaam en het wachtwoord gecontroleerd.';
$string['auth_ldap_expiration_desc'] = 'Kies nee om de controle op verlopen wachtwoorden uit te schakelen of om LDAP de geldigheidsduur van de wachtwoorden rechtstreeks uit LDAP te laten lezen';
$string['auth_ldap_expiration_key'] = 'Wachtwoord verloopt';
$string['auth_ldap_expiration_warning_desc'] = 'Aantal dagen op voorhand dat er een waarschuwing voor het verlopen van het wachtwoord gegeven wordt.';
$string['auth_ldap_expiration_warning_key'] = 'Waarschuwing verloop wachtwoord';
$string['auth_ldap_expireattr_desc'] = 'Optioneel: gaat voor op het LDAP-attribuut dat de wachtwoordverlooptijd bewaart.';
$string['auth_ldap_expireattr_key'] = 'Attribuut verloop wachtwoord';
$string['auth_ldapextrafields'] = 'Deze velden zijn niet verplicht. Je kunt ervoor kiezen om sommige Moodle-gebruikersvelden van te voren in te vullen met informatie uit de <b>LDAP-velden</b> die je hier kunt aangeven. <p>Als je deze velden leeg laat zal er niets vanuit LDAP worden overgebracht en worden de standaardwaarden van Moodle gebruikt.<p> In beide gevallen kan de gebruiker al deze velden wijzigingen zodra hij/zij ingelogd is.</p>';
$string['auth_ldap_graceattr_desc'] = 'Optioneel: gaat voor op het gracelogin-attribuut';
$string['auth_ldap_gracelogin_key'] = 'Grace login attribuut';
$string['auth_ldap_gracelogins_desc'] = 'Schakel de gracelogin-ondersteuning voor LDAP in. Nadat een wachtwoord is verlopen kan een gebruiker nog aanmelden tot de teller van gracelogin 0 is geworden. Door deze instelling  in te schakelen, wordt de gracelogin-boodschap getoond als het wachtwoord verlopen is.';
$string['auth_ldap_gracelogins_key'] = 'Grace logins';
$string['auth_ldap_groupecreators'] = 'Lijst van groepen of contexten waarvan de leden het recht hebben groepen aan te maken. Gebruik een \';\' als scheidingsteken tussen meerdere groepen. Gewoonlijk wordt dat iets als \'cn=leraars,ou=personeel,o=mijn_organisatie\'';
$string['auth_ldap_groupecreators_key'] = 'Wie groepen mag aanmaken';
$string['auth_ldap_host_url'] = 'Geef de LDAP-host in de vorm van een URL zoals bijvoorbeeld: \'ldap://ldap.myorg.com/\' of \'ldaps://ldap.myorg.com/\'  Com/\'or \'ldaps://ldap.myorg.com/\'';
$string['auth_ldap_host_url_key'] = 'Host URL';
$string['auth_ldap_ldap_encoding'] = 'Specifier de encoding van de LDAP-server. Waarschijnlijk utf-8, MS AD v2 gebruikt default platform encoding zoals cp1252, cp 1250, enz.';
$string['auth_ldap_ldap_encoding_key'] = 'LDAP-encoding';
$string['auth_ldap_login_settings'] = 'login instellingen';
$string['auth_ldap_memberattribute'] = 'Geef gebruiker lid attribuut, voor als gebruikers tot een groep behoren. Meestal \'member\'';
$string['auth_ldap_memberattribute_isdn'] = 'Optioneel: overschrijft de behandeling van lidmaatschapsattributen, kan 0 of 1 zijn.';
$string['auth_ldap_memberattribute_isdn_key'] = 'Lidmaatschapsattribuut gebruikt dn';
$string['auth_ldap_memberattribute_key'] = 'Lidmaatschapsattribuut';
$string['auth_ldap_noconnect'] = 'LDAP-module kan niet met de server verbinden: {$a}';
$string['auth_ldap_noconnect_all'] = 'LDAP-module kan met geen enkele server verbinden: {$a}';
$string['auth_ldap_noextension'] = 'Waarschuwing: De PHP LDAP module is blijkbaar niet geïnstalleerd. Zorg er voor dat ze geïnstalleerd en ingeschakeld is.';
$string['auth_ldap_no_mbstring'] = 'Je hebt de mbstring-extentie nodig in Active Directory om gebruikers te kunnen aanmaken.';
$string['auth_ldapnotinstalled'] = 'Kan de LDAP-authenticatie niet gebruiken. De PHP LDAP module is niet geïnstalleerd';
$string['auth_ldap_objectclass'] = 'De filter om namen/gebruiker te zoeken. Gewoonlijk zet je dit op iets als objectClass=posixAccount. Staat standaard op objectclass=*, wat alle objecten van LDAP geeft.';
$string['auth_ldap_objectclass_key'] = 'Object klasse';
$string['auth_ldap_opt_deref'] = 'Bepaalt hoe aliassen tijdens het zoeken behandeld worden. Kies één van volgende waarden: "Nee" (LDAP_DEREF_NEVER) of "Ja" (LDAP_DEREF_ALWAYS)';
$string['auth_ldap_opt_deref_key'] = 'Bepaalt hoe aliassen tijdens het zoeken behandeld worden. Kies één van volgende waarden: "Nee" (LDAP_DEREF_NEVER) of "Ja" (LDAP_DEREF_ALWAYS)
Dereference aliases';
$string['auth_ldap_passtype'] = 'Geef de opmaak voor nieuwe of gewijzigde wachtwoorden in de LDAP-server';
$string['auth_ldap_passtype_key'] = 'Wachtwoordopmaak';
$string['auth_ldap_passwdexpire_settings'] = 'Instellingen voor het verlopen van het LDAP-wachtwoord';
$string['auth_ldap_preventpassindb'] = 'Kies ja om te verhinderen dat wachtwoorden in de Moodle databank bewaard worden.';
$string['auth_ldap_preventpassindb_key'] = 'Verberg wachtwoorden';
$string['auth_ldap_search_sub'] = 'Zet waarde <> 0 als je gebruikers wilt kunnen zoeken in subcontexten.';
$string['auth_ldap_search_sub_key'] = 'Zoek subcontexten';
$string['auth_ldap_server_settings'] = 'LDAP-server instellingen';
$string['auth_ldap_unsupportedusertype'] = 'auth: ldap user_create() ondersteunt het geselecteerde gebruikerstype "{$a}" niet.';
$string['auth_ldap_update_userinfo'] = 'Werk de gebruikersinformatie bij (voornaam, achternaam, adres, ..) van LDAP naar Moodle. Bekijk /auth/ldap/attr_mappings.php om informatie te vinden over de \'mapping\'.';
$string['auth_ldap_user_attribute'] = 'Het attribuut dat wordt gebruikt om gebruikers te benoemen of te zoeken. Meestal \'cn\'.';
$string['auth_ldap_user_attribute_key'] = 'Gebruikersattribuut';
$string['auth_ldap_user_exists'] = 'LDAP gebruikersnaam bestaat al';
$string['auth_ldap_user_settings'] = 'Instellingen voor het opzoeken van gebruikers';
$string['auth_ldap_user_type'] = 'Kies hoe gebruikers in LDAP bewaard worden. Deze instelling geeft ook aan hoe verlopen wachtwoorden, grace logins en het aanmaken van nieuwe gebruikers zal werken.';
$string['auth_ldap_user_type_key'] = 'Gebruikerstype';
$string['auth_ldap_usertypeundefined'] = 'config.user_type is niet gedefinieerd of de functie ldap_expirationtime2unix ondersteunt het geselecteerde type niet!';
$string['auth_ldap_usertypeundefined2'] = 'config.user_type is niet gedefinieerd of de functie ldap_expirationtime ondersteunt het geselecteerde type niet!';
$string['auth_ldap_version'] = 'De versie van het LDAP-protocol die jouw server gebruikt.';
$string['auth_ldap_version_key'] = 'Versie';
$string['auth_ntlmsso'] = 'NTLM SSO';
$string['auth_ntlmsso_enabled'] = 'Zet dit op Ja om Single-sign-on met het NTLM-domein te bekomen.<strong>Opmerking</strong>dit vereist bijkomende instellingen op de webserver. Zie <a href="http://docs.moodle.org/nl/NTLM_authenticatie">http://docs.moodle.org/nl/NTLM_authenticatie</a';
$string['auth_ntlmsso_enabled_key'] = 'Inschakelen';
$string['auth_ntlmsso_ie_fastpath'] = 'Zet op ja om NTLM SSO fast path in in te schakelen (slaat sommige stappen over als de browser MS Internet Explorer is).';
$string['auth_ntlmsso_ie_fastpath_attempt'] = 'Probeer NTLM met alle browsers';
$string['auth_ntlmsso_ie_fastpath_key'] = 'MS IE fast path?';
$string['auth_ntlmsso_ie_fastpath_yesattempt'] = 'Ja, probeer NTLM met alle browsers';
$string['auth_ntlmsso_ie_fastpath_yesform'] = 'Ja, alle andere browsers gebruiken een standaard loginformulier';
$string['auth_ntlmsso_maybeinvalidformat'] = 'Kon de gebruikersnaam niet uit de REMOTE_USER header halen. Is de geconfigureerde format correct?';
$string['auth_ntlmsso_missing_username'] = 'Je moet minstens %username% gebruiken in externe gebruikersnaam format.';
$string['auth_ntlmsso_remoteuserformat'] = 'Als je \'NTLM\' in \'Authenticatietype\' gekozen hebt, dan kun je hier de opmaak van de externe gebruikersnaam opgeven. Als je dit leeg laat, dan zal de standaard DOMAINusername opmaak gebruikt worden. Je kunt de optionele <b>%domain%</b> plaatshouder gebruiken om op te geven waar de gebruikersnaam komt en de verplichte <b>%username%</b> plaatshouder om te tonen waar de gebruikersnaam komt. <br /><br />Enkele voorbeelden van veelgebruikte opmaak zijn
<tt>%domain%%username%</tt> (MS Windows standaard), <tt>%domain%/%username%</tt>, <tt>%domain%+%username%</tt> of gewoon <tt>%username%</tt> (als er geen domeindeel is)';
$string['auth_ntlmsso_remoteuserformat_key'] = 'Format externe gebruikersnaam';
$string['auth_ntlmsso_subnet'] = 'Indien ingeschakeld, zal alleen SSO geprobeerd worden met clients in dit subnet. Opmaak: xxx.xxx.xxx.xxx/bitmask. Verschillende subnets worden gescheiden met een \',\' (komma).';
$string['auth_ntlmsso_subnet_key'] = 'Subnet';
$string['auth_ntlmsso_type'] = 'De authenticatiemethode die in de webserver is geconfigureerd om de gebruikers te authenticeren (kies bij twijfel NTLM)';
$string['auth_ntlmsso_type_key'] = 'Authenticatietype';
$string['connectingldap'] = 'Verbinden met LDAP-server';
$string['creatingtemptable'] = 'Tijdelijke tabel {$a} aanmaken';
$string['didntfindexpiretime'] = 'password_expire() vond de verlooptijd niet';
$string['didntgetusersfromldap'] = 'Kreeg geen enkele gebruiker van LDAP. Configuratiefout?';
$string['gotcountrecordsfromldap'] = 'Kreeg {$a} records van LDAP';
$string['morethanoneuser'] = 'Meer dan één gebruikersrecord gevonden in LDAP. Alleen de eerste wordt gebruikt.';
$string['needbcmath'] = 'Je hebt de BCMath extentie nodig op grace logins te gebruiken met Active Directory';
$string['needmbstring'] = 'Je hebt de mbstring extentie nodig om wachtwoorden te kunnen wijzigen in Active Directory';
$string['nodnforusername'] = 'Fout in user_update_password(). Geen DN voor: {$a->username}';
$string['noemail'] = 'Probeerde je een e-mail te zenden maar het zenden is mislukt!';
$string['notcalledfromserver'] = 'Zou niet mogen aangeroepen worden vanaf de webserver!';
$string['noupdatestobedone'] = 'Geen updates te doen';
$string['nouserentriestoremove'] = 'Geen gebruikers te verwijderen';
$string['nouserentriestorevive'] = 'Geen gebruikers opnieuw te activeren';
$string['nouserstobeadded'] = 'Geen gebruikers toe te voegen';
$string['ntlmsso_attempting'] = 'Single sign on via NTLM wordt geprobeerd...';
$string['ntlmsso_failed'] = 'Auto-login mislukt, probeer de gewone loginpagina...';
$string['ntlmsso_isdisabled'] = 'NTLM SSO is uitgeschakeld';
$string['ntlmsso_unknowntype'] = 'Onbekend ntimsso type!';
$string['pagedresultsnotsupp'] = 'Gepagineerde LDAP-resultaten niet ondersteund (ofwel ondersteunt je PHP-versie het niet, ofwel heb je Moodle geconfigureerd om LDAP protocol versie 2 te gebruiken)';
$string['pagesize'] = 'Zorg ervoor dat deze waarde kleiner is dan je LDAP-server result set size limit (het maximale aantal items dat via één query opgehaald kan worden)';
$string['pagesize_key'] = 'Paginagrootte';
$string['pluginname'] = 'LDAP-server';
$string['pluginnotenabled'] = 'Plugin niet ingeschakeld!';
$string['renamingnotallowed'] = 'Hernoemen van gebruiker niet toegelaten in LDAP';
$string['rootdseerror'] = 'Fout bij het bevragen van de rootDSE voor Active Directory';
$string['start_tls'] = 'Gebruik de gewone LDAP-service (poort 389) met TLS-encryptie.';
$string['start_tls_key'] = 'Gebruik TLS';
$string['updatepasserror'] = 'Fout in user_update_password(). Foutcode {$a->errno}; Foutstring: {$a->errstring}';
$string['updatepasserrorexpire'] = 'Fout in user_update_password() bij het lezen van de verlooptijd voor het wachtwoord. Foutcode: {$a->errno}; Foutstring: {$a->errstring}';
$string['updatepasserrorexpiregrace'] = 'Fout in user_update_password() bij het wijzigen van de verlooptijd en/of gracelogins.  Foutcode: {$a->errno}; Foutstring: {$a->errstring}';
$string['updateremfail'] = 'Fout updaten LDAP-record  Foutcode: {$a->errno}; Foutstring: {$a->errstring}<br />Sleutel ({$a->key}) - oude moodle-waarde: \'{$a->ouvalue}\' nieuwe waarde: \'{$a->nuvalue}\'';
$string['updateremfailamb'] = 'LDAP updaten met abigu veld {$a->key} mislukt; oude Moodle waarde: \'{$a->ouvalue}\', nieuwe waarde: \'{$a->nuvalue}\'';
$string['updateusernotfound'] = 'Kon gebruiker niet vinden tijdens extern updaten. Details volgen: zoek base: \'{$a->userdn}\'; zoek filter: \'(objectClass=*)\'; zoek attributen: {$a->attribs}';
$string['useracctctrlerror'] = 'Fout bij het verkrijgen van userAccountControl voor {$a}';
$string['user_activatenotsupportusertype'] = 'auth: ldap user_activate() ondersteunt het gekozen gebruikerstype niet: {$a}';
$string['user_disablenotsupportusertype'] = 'auth: ldap user_disable() ondersteunt het gekozen gebruikerstype niet: {$a}';
$string['userentriestoadd'] = 'Toe te voegen gebruikers: {$a}';
$string['userentriestoremove'] = 'Te verwijderen gebruikers: {$a}';
$string['userentriestorevive'] = 'Te activeren gebruikers: {$a}';
$string['userentriestoupdate'] = 'Aan te passen gebruikers: {$a}';
$string['usernotfound'] = 'Gebruiker niet gevonden in LDAP';
