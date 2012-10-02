<?php

// All of the language strings in this file should also exist in
// auth.php to ensure compatibility in all versions of Moodle.

$string['CASform'] = 'Authenticatiekeuze';
$string['accesCAS'] = 'CAS-gebruikers';
$string['accesNOCAS'] = 'andere gebruikers';
$string['auth_cas_auth_user_create'] = 'Creëer gebruikers extern';
$string['auth_cas_baseuri'] = 'URI van de server (leeg laten als er geen baseUri is)<br />Als de CAS-server bijvoorbeeld antwoordt op host.domein.be/CAS/ dan <br />cas_baseuri=CAS/';
$string['auth_cas_baseuri_key'] = 'Basis URI';
$string['auth_cas_broken_password'] = 'Je kunt niet verder doen zonder het wijzigen van je wachtwoord, hoewel de mogelijkheid om dat te doen niet voorzien is. Neem contact op met de beheerder.';
$string['auth_cas_cantconnect'] = 'LDAP-gedeelte van de CAS-module kan geen verbinding maken met de server: $a';
$string['auth_cas_casversion'] = 'Versie';
$string['auth_cas_changepasswordurl'] = 'URL om wachtwoord te wijzigen';
$string['auth_cas_create_user'] = 'Schakel dit in als je gebruikers met CAS-authenticatie in de Moodle-databank wil zetten. Indien niet ingeschakeld zullen enkel gebruikers die al in de Moodle-databank bestaan, kunnen aanmelden.';
$string['auth_cas_create_user_key'] = 'Maak gebruiker';
$string['auth_cas_enabled'] = 'Schakel dit in als je CAS-authenticatie wil gebruiken.';
$string['auth_cas_hostname'] = 'Server-naam van de CAS-server<br />vb: host.domein.nl';
$string['auth_cas_hostname_key'] = 'Host-naam';
$string['auth_cas_invalidcaslogin'] = 'Sorry, je login is mislukt - je kon niet geauthoriseerd worden';
$string['auth_cas_language'] = 'Gekozen taal';
$string['auth_cas_language_key'] = 'Taal';
$string['auth_cas_logincas'] = 'Toegang met veilige verbinding';
$string['auth_cas_logoutcas'] = 'Zet deze instelling op \'Ja\' als je wil uitloggen uit CAS wanneer je Moodle verlaat.';
$string['auth_cas_logoutcas_key'] = 'CAS uitloggen';
$string['auth_cas_multiauth'] = 'Zet deze instelling op \'Ja\' als je multi-authenticatie wil gebruiken (CAS samen met een andere authenticatiemethode)';
$string['auth_cas_multiauth_key'] = 'Multi-authenticatie';
$string['auth_cas_port'] = 'Poort van de CAS-server';
$string['auth_cas_port_key'] = 'Poort';
$string['auth_cas_proxycas'] = 'Zet deze instelling op \'Ja\' als je CAS in proxy-modus gebruikt.';
$string['auth_cas_proxycas_key'] = 'Proxy-modus';
$string['auth_cas_server_settings'] = 'CAS-serverconfiguratie';
$string['auth_cas_text'] = 'Veilige verbinding';
$string['auth_cas_use_cas'] = 'Gebruik CAS';
$string['auth_cas_version'] = 'CAS-versie';
$string['auth_casdescription'] = 'Deze methode gebruikt een CAS-server (Central Authentication Service) om gebruikers in een Single Sign On omgeving (SSO) te authenticeren. Als de ingegeven gebuikersnaam en wachtwoord volgens CAS kloppen, dan zal Moodle een nieuwe gebruiker in zijn databank maken en de gebruikersgegevens uit LDAP overnemen indien nodig. Bij volgende aanmeldingen worden dan enkel de gebruikersnaam en wachtwoord gecontroleerd.';
$string['auth_casnotinstalled'] = 'Kan CAS-authenticatie niet gebruiken. De PHP LDAP-module is niet geïnstalleerd.';
$string['auth_castitle'] = 'CAS-server (SSO)';