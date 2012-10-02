<?php

// All of the language strings in this file should also exist in
// auth.php to ensure compatibility in all versions of Moodle.

$string['auth_mnet_auto_add_remote_users'] = 'Die Einstellung \"Ja\" bewirkt, dass ein lokaler Datensatz automatisch angelegt wird, sobald sich ein Remote-Nutzer erstmalig einloggt.';
$string['auth_mnet_roamin'] = 'Nutzer/innen dieses Hosts können Ihre Website durchsuchen';
$string['auth_mnet_roamout'] = 'Ihre Nutzer/innen können diese Websites durchsuchen';
$string['auth_mnet_rpc_negotiation_timeout'] = 'Timeout in Sekunden für die Authentifizierung über den XMLRPC Transfer.';
$string['auth_mnetdescription'] = 'Nutzer/innen werden als vertrauensvoll authentifiziert, wenn sie in den MNET-Einstellungen (Moodle Network) definiert wurden.';
$string['auth_mnettitle'] = 'MNET Authentifizierung';
$string['auto_add_remote_users'] = 'Automatisches Hinzufügen externer Nutzer';
$string['rpc_negotiation_timeout'] = 'RPC negotiation timeout';
$string['sso_idp_description'] = 'Veröffentlichen Sie diesen Dienst, um den Nutzer/innen Ihres Moodles einen Wechsel zu $a zu ermöglichen, ohne dass sich diese dort erneut anmelden müssen.
<ul><li><em>Voraussetzung</em>: Sie müssen ebenfalls den SSO-Dienst (Service Provider) auf $a <strong>abonnieren </strong>.</li></ul>

<br />Abonnieren Sie diesen Dienst, um allen angemeldeten Nutzer/innen von $a zu erlauben, auf Ihre Website zuzugreifen, ohne sich hier erneut anmelden zu müssen.
<ul><li><em>Voraussetzung</em>: Sie müssen zusätzlich den SSO-Dienst (Service Provider) für $a <strong>veröffentlichen </strong>.</li></ul>';
$string['sso_idp_name'] = 'SSO (Identity Provider)';
$string['sso_mnet_login_refused'] = 'Der Anmeldename $a[0] ist zum Login auf $a[1] nicht zugelassen.';
$string['sso_sp_description'] = 'Veröffentlichen Sie diesen Dienst, um authetifizierten Nutzer/innen aus dem Moodle $a einen Zugriff auf Ihre Website zu gewähren, ohne dass sich diese hier erneut anmelden müssen.
<ul><li><em>Voraussetzung</em>: Sie müssen ebenfalls den SSO-Dienst (Identity Provider) auf $a <strong>abonnieren </strong>.</li></ul>

<br />Abonnieren Sie diesen Dienst, um den Nutzer/innen Ihres Moodles einen Wechsel zu $a zu ermöglichen, ohne dass sich diese dort erneut anmelden müssen.
<ul><li><em>Voraussetzung</em>: Sie müssen zusätzlich den SSO-Dienst (Identity Provider) für $a <strong> veröffentlichen </strong>.</li></ul>';
$string['sso_sp_name'] = 'SSO (Service Provider)';