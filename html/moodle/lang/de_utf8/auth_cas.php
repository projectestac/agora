<?php

// All of the language strings in this file should also exist in
// auth.php to ensure compatibility in all versions of Moodle.

$string['CASform'] = 'Wahl der Authentifizierung';
$string['accesCAS'] = 'CAS-Nutzer/innen';
$string['accesNOCAS'] = 'Weitere Nutzer/innen';
$string['auth_cas_auth_user_create'] = 'Nutzer/innen extern anlegen';
$string['auth_cas_baseuri'] = 'URI des Servers (kein Eintrag, falls es keine baseUri gibt)<br />z.B., wenn der CAS Server an host.domaine.fr/CAS/ dann<br />cas_baseuri = CAS/';
$string['auth_cas_baseuri_key'] = 'Basis URI';
$string['auth_cas_broken_password'] = 'Sie müssen zunächst Ihr Kennwort ändern. Falls dafür keine Seite verfügbar ist, nehmen Sie bitte mit dem Admin Kontakt auf.';
$string['auth_cas_cantconnect'] = 'LDAP-Teil des CAS-Moduls kann keine Verbindung mit dem Server herstellen: $a';
$string['auth_cas_casversion'] = 'Version';
$string['auth_cas_changepasswordurl'] = 'URL zur Kennwortänderung';
$string['auth_cas_create_user'] = 'Aktivieren Sie die Einstellung, um CAS authentifizierte Nutzer/innen in die Moodle-Datenbank einzufügen. Wenn nicht, können sich nur die Nutzer/innen einloggen, die in der Moodle-Datenbank eingetragen sind.';
$string['auth_cas_create_user_key'] = 'Nutzer anlegen';
$string['auth_cas_enabled'] = 'Aktivieren Sie die Funktion, um die CAS Authentifizierung zu verwenden';
$string['auth_cas_hostname'] = 'Hostname des CAS-Servers <br />z.B.: host.domain.fr';
$string['auth_cas_hostname_key'] = 'Hostname';
$string['auth_cas_invalidcaslogin'] = 'Entschuldigung, Ihr Login ist gescheitert - Ihr Zugang konnte nicht bestätigt werden.';
$string['auth_cas_language'] = 'Ausgewählte Sprache';
$string['auth_cas_language_key'] = 'Sprache';
$string['auth_cas_logincas'] = 'Sicherer Zugang';
$string['auth_cas_logoutcas'] = 'Wählen Sie für diese Einstellung \"Ja\", falls Sie sich vom CAS abmelden möchten, wenn die Verbindung zu Moodle unterbrochen wird.';
$string['auth_cas_logoutcas_key'] = 'CAS abmelden';
$string['auth_cas_multiauth'] = 'Wählen Sie für diese Einstellung \"ja\", falls Sie eine Mehrfach-Authentifizierung wünschen (CAS + andere Authentifizierung)';
$string['auth_cas_multiauth_key'] = 'Mehrfach-Authentifizierung';
$string['auth_cas_port'] = 'Port des CAS-Servers';
$string['auth_cas_port_key'] = 'Port';
$string['auth_cas_proxycas'] = 'Wählen Sie für diese Einstellung \"ja\", falls Sie CAS im Proxy-Modus verwenden.';
$string['auth_cas_proxycas_key'] = 'Proxy-Modus';
$string['auth_cas_server_settings'] = 'CAS-Server-Konfiguration';
$string['auth_cas_text'] = 'Sichere Verbindung';
$string['auth_cas_use_cas'] = 'CAS verwenden';
$string['auth_cas_version'] = 'CAS-Version';
$string['auth_casdescription'] = 'Dieses Verfahren verwendet einen CAS Server (Central Authentification Service) zur Authentifizierung von Nutzer/innen in einer Single-Sign-On Umgebung (SSO). Sie können jedoch auch eine einfache LDAP Authentifizierung verwenden. Wenn der verwandte Anmeldename und das Passwort auf CAS als gültig erkannt werden, erstellt Moodle einen neuen Nutzereintrag in seiner Datenbank und weitere Nutzerdaten von LDAP, falls erforderlich. Bei späteren Logins werden nur Anmeldename und Passwort geprüft.';
$string['auth_casnotinstalled'] = 'CAS Authentifizierung kann nicht verwendet werden. Das PHP-Modul für LDAP ist nicht installiert.';
$string['auth_castitle'] = 'CAS-Server (SSO)';