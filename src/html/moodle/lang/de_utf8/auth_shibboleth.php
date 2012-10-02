<?php

// All of the language strings in this file should also exist in
// auth.php to ensure compatibility in all versions of Moodle.

$string['auth_shib_auth_method'] = 'Bezeichnung der Authentifizierungemethode';
$string['auth_shib_auth_method_description'] = 'Vergeben Sie für die verwendete Shibboleth-Methode einen Titel, der den Nutzern vertraut ist, z.B. der Titel des Shibboleth-Verbunds (<tt>SWITCHaai Login</TT> oder <tt>Gemeinsamer Login</tt>.';
$string['auth_shib_changepasswordurl'] = 'URL zur Kennwortänderung';
$string['auth_shib_convert_data'] = 'Datenmodifikation APU';
$string['auth_shib_convert_data_description'] = 'Sie können diese API nutzen, um Daten von Shibboleth zu bearbeiten. <a href=\"../auth/shibboleth/README.txt\" target=\"_blank\">Hier</a> finden Sie weitere Hinweise.';
$string['auth_shib_convert_data_warning'] = 'Die Datei existiert nicht oder ist vom Server nicht lesbar.';
$string['auth_shib_idp_list'] = 'Identity-Provider';
$string['auth_shib_idp_list_description'] = 'Stellen Sie eine Liste der Identity-Provider zur Verfügung aus der die Nutzer auf der Loginseite auswählen können. <br />In jeder Zeile muss ein kommagetrenntes Tupple für identityID der IdP (siehe Shibboleth Medatadtendatei) und Name des IdP wie es in der Drowndopwnliste gezeigt werden soll eingetragen werden.<br />
Als optionaler dritter Parameter kann der Ort des Shibboleth Session Initators eingetragen werden falls die Moodle-Installation im Verbund genutzt wird.';
$string['auth_shib_instructions'] = 'Nutzen Sie den <a href=\"$a\">Shibboleth Login</a>, um Zugang über Shibboleth zu erhalten, wenn Ihr Unternehmen dies unterstützt. <br />Sonst verwenden Sie das normale hier angezeigte Loginformular.';
$string['auth_shib_instructions_help'] = 'Tragen Sie hier Informationen für Ihre Nutzer/innen ein, die ihnen den Zugang mit Hilfe von Shibboleth erklären. Diese werden auf der Loginseite angzeigt. Der Text sollte einen Link \"<b>$a</b>\" enthalten, damit ein einfachere Login möglich ist. Wenn Sie das Feld leer lassen, werden die Standard-Texte angezeigt und keine Hinweise auf den Shibboleth Login.';
$string['auth_shib_integrated_wayf'] = 'Moodle WAYF Service';
$string['auth_shib_integrated_wayf_description'] = 'Nach der Aktivierung verwendet Moodle den eigenen WAYF Service an Stelle des für Shibboleth konfigurierten. Moodle zeigt dann eine Dropdownliste der verfügbaren alternativen Login-Seiten wo der Nutzer seinen Identity Provider auszuwählen hat.';
$string['auth_shib_logout_return_url'] = 'Alternative URL nach Logout';
$string['auth_shib_logout_return_url_description'] = 'Auf diese Seite werden Shibboleth-Nutzer nach dem Logout geleitet.<br />Bleibt das Feld leer wird die Standardseite von Moodle genutzt.';
$string['auth_shib_logout_url'] = 'Shibboleth Service Provider Logout URL Handler';
$string['auth_shib_logout_url_description'] = 'Tragen Sie die URL für den Shibboleth Service Provider Logout Handler ein. Typischerweise ist dies <tt>Shibboleth.sso/Logout</tt>';
$string['auth_shib_no_organizations_warning'] = 'Wenn Sie den integrierten WAYF Dienst verwenden wollen, ist es erforderlich eine kommaseparierte Liste von Identity Provider entityIDs, ihren Namen und Optional einen Session Initiator einzutragen.';
$string['auth_shib_only'] = 'nur Shibboleth';
$string['auth_shib_only_description'] = 'Checken Sie diese Option, wenn eine Shibboleth-Authentifizierung bevorzugt wird.';
$string['auth_shib_username_description'] = 'Name der Shibboleth Umgebungsvariable, die als Moodle-Nutzername verwandt werden soll';
$string['auth_shibboleth_contact_administrator'] = 'Falls Sie keiner der angegebenen Organisationen angehören und Zugang zu einem Kurs auf diesem Server benötigen, wenden Sie sich bitte an den';
$string['auth_shibboleth_errormsg'] = 'Bitte wählen Sie die Organisation aus, bei der Sie Mitglied sind!';
$string['auth_shibboleth_login'] = 'Shibboleth Login';
$string['auth_shibboleth_login_long'] = 'Login für Moodle über Shibboleth';
$string['auth_shibboleth_manual_login'] = 'Manueller Login';
$string['auth_shibboleth_select_member'] = 'Ich bin Mitglied von ...';
$string['auth_shibboleth_select_organization'] = 'Wählen Sie bitte aus dem Aufklappmenü die Organisation aus, der Sie angehören:';
$string['auth_shibbolethdescription'] = 'Mit diesem Verfahren können Sie die Verbindung zu einem bestehenden Shibboleth Server herstellen, um  Zugänge zu prüfen und anzulegen.';
$string['auth_shibbolethtitle'] = 'Shibboleth';
$string['shib_no_attributes_error'] = 'Sie versuchen vermutlich, die Shibboleth Authentifizierung zu verwenden. Moodle hat jedoch keine Attribute für die Nutzer/innen erhalten. Prüfen Sie bitte, ob der Identity Provider die erforderlichen Attribute ($a) dem Moodle-Serviceprovider zur Verfügung stellt oder informieren Sie den Webmaster des Servers.';
$string['shib_not_all_attributes_error'] = 'Moodle benötigt einige Shibboleth-Attribute, die derzeit nicht bereitgestellt werden. Es handelt sich um die Attribute: $a<br />Benachrichtigen Sie bitte den Webmaster des Servers oder Ihren Identity Provider.';
$string['shib_not_set_up_error'] = 'Die Shibboleth-Authentifizierung scheint nicht richtig eingerichtet zu sein. Beachten Sie die <a href=\"README.txt\">README-Datei</a> mit weiteren Informationen zur Einrichtung der Shibboleth-Authentifizierung.';