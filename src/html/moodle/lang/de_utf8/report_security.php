<?PHP // $Id: report_security.php,v 1.8 2009/11/27 15:30:46 ralf-bonn Exp $ 
      // report_security.php - created with Moodle 1.9.7 (Build: 20091126) (2007101570)


$string['check_configrw_details'] = '<p>Nach der Installation sollten die Zugriffsrechte für die Datei config.php so gesetzt werden, dass der Webserver diese Datei nicht mehr verändern kann. Bitte beachten Sie, dass dieser Schritt die Server-Sicherheit nicht entscheidend verbessert, aber dass  generelle Angriffe behindert und in ihrer Wirkung begrenzt werden könnten.</p>';
$string['check_configrw_name'] = 'Zugriff auf config.php';
$string['check_configrw_ok'] = 'PHP-Skripte können die config.php nicht verändern';
$string['check_configrw_warning'] = 'PHP-Skripte könnten die Datei config.php verändern';
$string['check_cookiesecure_details'] = '<p>Zusätzlich zur Aktivierung der Datenübertragung über https sollte auch die Funktion sichere Cookies aktiviert werden. Die permanenete Umleitung von http nach https sollte ebenfalls eingerichtet werden.</p>';
$string['check_cookiesecure_error'] = 'Bitte erlauben Sie sichere Cookies';
$string['check_cookiesecure_name'] = 'Sichere Cookies';
$string['check_cookiesecure_ok'] = 'Sichere Cookies erlaubt';
$string['check_courserole_anything'] = 'Die Berechtigung \"doanything\" (alles tun) darf nicht in diesem <a href=\"$a\">Kontext</a> erlaubt werden';
$string['check_courserole_details'] = '<p>Jeder Kurs hat eine Standardrolle für Nutzer definiert (meistens Teilnehmer/in). Achten Sie darauf, dass für diese Rolle keine unsicheren Berechtigungen erlaubt sind.</p>
<p>Die einzige Rolle auf die das zutrifft ist die <em>Standard-Teilnehmerrolle</em>.</p>';
$string['check_courserole_error'] = 'Fehlerhaft definierte Standardrolle für Kurse entdeckt!';
$string['check_courserole_name'] = 'Standardrollen (für Kurse)';
$string['check_courserole_notyet'] = 'In Kursen werden nur Standardrollen verwendet';
$string['check_courserole_ok'] = 'Die Standardrollendefinitionen sind ok';
$string['check_courserole_risky'] = 'Bedenkliche Berechtigungen wurden entdeckt! <a href=\"$a\">Zusammenhang anzeigen</a>';
$string['check_courserole_riskylegacy'] = 'Bedenkliche Vererbung wurde entdeckt! <a href=\"$a->url\">$a->shortname</a>';
$string['check_defaultcourserole_anything'] = 'Die Berechtigung \'alles erlaubt\' sollte nicht zugelassen werden! <a href=\"$a\">Zusammenhang anzeigen</a>';
$string['check_defaultcourserole_details'] = '<p>Die standardmäßige Teilnehmerrolle bei der Kurseinschreibung bestimmt die Standardrolle für alle Kurse. Bitte stellen Sie sicher, dass keine bedenklichen Fähigkeiten für diese Rolle erlaubt sind!</p>
<p>Der einzig unterstützte Standardtyp für diese Rolle ist <em>Teilnehmer/in (Student)</em>';
$string['check_defaultcourserole_error'] = 'Fehlerhaft definierte Standardrolle \'$a\' entdeckt';
$string['check_defaultcourserole_legacy'] = 'Ein nicht unterstützer Legacy-Typ wurde entdeckt';
$string['check_defaultcourserole_name'] = 'Standardrolle (global)';
$string['check_defaultcourserole_notset'] = 'Die Standardrolle ist nicht festgelegt';
$string['check_defaultcourserole_ok'] = 'Die Standardrolle auf System-Ebene ist OK';
$string['check_defaultcourserole_risky'] = 'Bedenkliche Berechtigungen wurden entdeckt! <a href=\"$a\">Zusammenhang anzeigen</a>.';
$string['check_defaultuserrole_details'] = '<p>Jeder eingeloggte Nutzer hat zunächst Rechte aus der Standardrolle für Nutzer. Für diese Rolle sollten keine bedenklichen Berechtigungen vergeben worden sein.</p>
<p>Die einzige Rolle, für die das zunächst zutrifft, ist die Rolle <em>authentifizierte/r Nutzer/in</em>. Die Berechtigung \'Kurse sehen\' (course view) muss dazu nicht aktiviert sein.</p>';
$string['check_defaultuserrole_error'] = 'Eine falsche Definition der Standardrolle wurde festgestellt! \"$a\"';
$string['check_defaultuserrole_name'] = 'Registrierte Nutzerrolle';
$string['check_defaultuserrole_notset'] = 'Die Standardrolle ist nicht gesetzt';
$string['check_defaultuserrole_ok'] = 'Die Rollendefinition für registrierte Nutzer ist OK';
$string['check_displayerrors_details'] = '<p>Die Aktivierung der PHP-Einstellung <code>display_errors</code> wird auf produktiven Websites nicht empfohlen, weil die Fehlermeldungen u.U. sensible Informationen zu Ihrem Server preisgeben könnten. Setzen Sie also <code>display_errors=off</code>.</p>';
$string['check_displayerrors_error'] = 'Die PHP-Einstellung für die Anzeige von Fehlern ist aktiviert. Es wird empfohlen, dies zu deaktivieren';
$string['check_displayerrors_name'] = 'Anzeige von PHP-Fehlern';
$string['check_displayerrors_ok'] = 'Die Anzeige von PHP-Fehlern ist deaktiviert';
$string['check_emailchangeconfirmation_details'] = '<p>Es wird empfohlen, eine E-Mail-Bestätigung einzufordern, wenn Nutzer/innen ihre E-Mail-Adresse im Nutzerprofil ändern. Falls diese Einstellung deaktiviert ist, könnten Spammer versuchen, den Webserver zum Versenden von Spam zu missbrauchen.</p>';
$string['check_emailchangeconfirmation_error'] = 'Es dürfen beliebige E-Mail-Adressen eintragen werden';
$string['check_emailchangeconfirmation_info'] = 'Es dürfen ausschließlich E-Mail-Adressen von zugelassenen Domains eingetragen werden';
$string['check_emailchangeconfirmation_name'] = 'E-Mail-Adressänderungen';
$string['check_emailchangeconfirmation_ok'] = 'Änderungen von E-Mail-Adressen müssen bestätigt werden';
$string['check_embed_details'] = '<p>Die uneingeschränkte Nutzung von EMBED/OBJECT ist äußerst gefährlich, weil alle registrierten Nutzer/innen einen XSS-Angriff gegen andere Servernutzer starten könnten. Diese Einstellung sollte auf produktiven Servern deaktiviert sein.</p>';
$string['check_embed_error'] = 'Die uneingeschränkte Nutzung von EMBED/OBJECT ist aktiviert. Diese Einstellung ist für meisten Webserver sehr gefährlich.';
$string['check_embed_name'] = 'EMBED/OBJECT';
$string['check_embed_ok'] = 'Die uneingeschränkte Nutzung von EMBED/OBJECT ist nicht erlaubt';
$string['check_frontpagerole_details'] = '<p>Die standardmäßige Rolle für die Startseite erhalten alle registrierten Nutzer. Bitte achten Sie, dass für die Startseite keine bedenklichen Berechtigungen vergeben werden dürfen.</p>
<p>Es wird empfohlen, eine spezielle Rolle neu anzulegen und keine der vorgegebenen Rollen zu verändern.</p>';
$string['check_frontpagerole_error'] = 'Fehlerhafte Rollendefinition für die Startseite \"$a\" entdeckt!';
$string['check_frontpagerole_name'] = 'Rolle für die Startseite';
$string['check_frontpagerole_notset'] = 'Keine Rollendefinition für die Startseite eingerichtet';
$string['check_frontpagerole_ok'] = 'Die Rollendefinition für die Startseite ist OK';
$string['check_globals_details'] = '<p>register_globals gilt als eine sehr unsichere Einstellung für PHP</p>
<p>Die PHP-Einstellung <code>register_globals=off </code> muss unbedingt gesetzt sein. Dies Einstellung können Sie in der Datei <code>php.ini</code>, Apache/IIS Konfiguration oder der Datei <code>.htaccess</code> vornehmen.</p>';
$string['check_globals_error'] = 'Die Einstellung register_globals muss deaktiviert sein. Bitte passen Sie Ihre PHP Einstellungen sofort an!';
$string['check_globals_name'] = 'register_globals';
$string['check_globals_ok'] = 'register_globals ist deaktiviert';
$string['check_google_details'] = '<p>Die Einstellung \'Offen für Google\' erlaubt es Google und anderen Suchmaschinen, mit der Gastberechtigung alle offenen Kurse zu durchsuchen. Es ist nicht sinnvoll diese Funktion zu aktivieren, wenn der Gastzugang deaktiviert ist.</p>';
$string['check_google_error'] = 'Der Zugriff für Suchmaschinen ist aktiviert, wobei der Gastzugang aber deaktiviert ist.';
$string['check_google_info'] = 'Suchmaschinen könnten auf Ihre Kursinhalte als Gäste zugreifen.';
$string['check_google_name'] = 'Offen für Google';
$string['check_google_ok'] = 'Gastzugang für Suchmaschinen nicht aktiv';
$string['check_guestrole_details'] = '<p>Die Gastrolle wird für Gäste, nichteingeloggte Nutzer und den zeitweisen Gastzugang zu Kursen verwandt. Bitte achten Sie darauf, keine unsicheren Berechtigungen für diese Rolle zuzulassen.<p>
</p>Der einzige unterstützte Legacytyp für die Gastrolle ist <em>Gast</em>.</p>';
$string['check_guestrole_error'] = 'Die Rollendefinition der Gastrolle \"$a\" ist fehlerhaft!';
$string['check_guestrole_name'] = 'Gastrolle';
$string['check_guestrole_notset'] = 'Die Gastrolle ist nicht gesetzt';
$string['check_guestrole_ok'] = 'Die Rollendefinition der Gastrolle ist OK';
$string['check_mediafilterswf_details'] = '<p>Die automatische Einbindung von Flash-Dateien im Format .swf ist sehr gefährlich. Jeder registrierte Nutzer könnte damit eine XSS-Attacke gegen den Server auslösen. Bitte deaktivieren Sie diese Funktion unbedingt auf produktiven Servern.</p>';
$string['check_mediafilterswf_error'] = 'Der Flash-Mediafilter .swf ist aktiviert - dies ist für die meisten Webserver sehr gefährlich';
$string['check_mediafilterswf_name'] = 'Mediafilter .swf';
$string['check_mediafilterswf_ok'] = 'Der Flash-Mediafilter .swf ist nicht aktiv';
$string['check_noauth_details'] = '<p>Das Plugin \"Ohne Authentifizierung\" ist nicht für produktive Seiten gedacht. Deaktivieren Sie diese Funktion unbedingt, es sei denn Sie betreiben eine Testseite zu Entwicklungszwecken.</p>';
$string['check_noauth_error'] = 'Das Plugin \"Ohne Authentifizierung\" darf auf produktiven Seiten nicht verwandt werden';
$string['check_noauth_name'] = 'Ohne Authentifizierung';
$string['check_noauth_ok'] = 'Das Plugin \"Ohne Authentifizierung\" ist ausgeschaltet';
$string['check_openprofiles_details'] = '<p>Öffentlich sichtbare Nutzerprofile können von Spammern missbraucht werden. Aktivieren Sie am besten die Einstellung \'Login erforderlich\'  bzw. \'Login erforderlich, um Profile zu sehen\'.</p>';
$string['check_openprofiles_error'] = 'Jeder kann zur Zeit Nutzerprofile sehen, ohne sich zuvor einzuloggen';
$string['check_openprofiles_name'] = 'Offene Nutzerprofile';
$string['check_openprofiles_ok'] = 'Login ist erforderlich, um Nutzerprofile sehen zu können';
$string['check_passwordpolicy_details'] = '<p>Kennwortregeln sollten unbedingt festgelegt werden. Oft ist es ziemlich einfach, Kennworte zu erraten und so unberechtigten Zugang zu Systemen zu bekommen. Die Regeln sollten aber nicht zu kompliziert sein. Besonders strenge Regeln führen nämlich häufig dazu, dass Nutzer sich die Kennworte nicht merken können, sie vergessen oder sie sich aufschreiben.</p>';
$string['check_passwordpolicy_error'] = 'Die Kennwortregeln sind nicht eingerichtet';
$string['check_passwordpolicy_name'] = 'Kennwortregeln';
$string['check_passwordpolicy_ok'] = 'Die Kennwortregeln sind aktiviert';
$string['check_passwordsaltmain_details'] = '<p>Die Kennwortverschlüsselung reduziert zuverlässig das Risiko von Kennwortdiebstahl.</p>
<p>Um die Kennwortverschlüsselung zu konfigurieren, fügen Sie bitte die folgende Zeile in Ihre Datei config.php:</p>
<code>&#36;CFG->passwordsaltmain = \'some long random string here with lots of characters!A1234567890!\';</code>
<p>Der Zufallstext sollte aus einem Mix von Buchstaben, Zahlen und Sonderzeichen bestehen und mindestens 40 Zeichen lang sein. Bitte beachten Sie die <a href=\"$a\" target=\"_blank\">Dokumentation zur Kennwortverschlüsselung</a>, falls Sie diesen Parameter verändern möchten. Löschen Sie auf keinen Fall den Kennwortschlüssel, sobald Sie ihn einmal verwendet haben - andernfalls können Sie sich auch als Admin nicht mehr in Ihrem eigenen Moodle einloggen!</p>';
$string['check_passwordsaltmain_name'] = 'Kennwortverschlüsselung';
$string['check_passwordsaltmain_ok'] = 'Die Kennwortverschlüsselung ist OK';
$string['check_passwordsaltmain_warning'] = 'Die Kennwortverschlüsselung wurde nicht konfiguriert';
$string['check_passwordsaltmain_weak'] = 'Die Kennwortverschlüsselung ist zu schwach';
$string['check_riskadmin_detailsok'] = '<p>Bitte prüfen Sie die folgende Liste von Serveradministrator(en):</p>$a';
$string['check_riskadmin_detailswarning'] = '<p>Bitte prüfen Sie die folgende Liste von Serveradministrator(en):</p>$a->admins
<p>Es wird empfohlen, die Administratorenrolle nur auf Systemebene zu vergeben. Die folgenden Nutzer verfügen über nicht unterstützte Zuweisungen zur Administratorrolle:</p>$a->unsupported';
$string['check_riskadmin_name'] = 'Administratoren';
$string['check_riskadmin_ok'] = '$a Serveradministrator(en) gefunden';
$string['check_riskadmin_unassign'] = 'Rollenzuweisung überprüfen bei <a href=\"$a->url\">$a->fullname ($a->email)</a>';
$string['check_riskadmin_warning'] = '$a->admincount Serveradministrator(en) und $a->unsupcount nicht unterstützte Zuweisung(en) zur Administratorrolle gefunden';
$string['check_riskbackup_details_overriddenroles'] = '<p>Diese aktivierten Änderungen geben Nutzer/innen die Möglichkeit, auch Nutzerdaten in eine Kurssicherung einzubeziehen. Bitte prüfen Sie, ob diese Berechtigung nötig ist</p> $a';
$string['check_riskbackup_details_systemroles'] = '<p>Die folgenden Systemrollen erlauben es aktuell, Nutzerdaten in eine Kurssicherung einzubeziehen. Bitte prüfen Sie, ob diese Berechtigung nötig ist</p> $a';
$string['check_riskbackup_details_users'] = '<p>Wegen der obigen Rollen oder lokalen Rollenänderungen besitzen die nachfolgenden Nutzerkonten die Berechtigung, persönliche Daten von allen in ihren Kursen eingetragenen Nutzer/innen in Kurssicherungen einzubeziehen. Stellen Sie unbedingt sicher, dass diese Konten (a) vertrauenswürdig und (b) mit starken Kennworten gesichert sind:</p> $a';
$string['check_riskbackup_detailsok'] = 'Keine Rolle erlaubt das Sichern von Nutzerdaten. Beachten Sie aber, dass Admins mit der Berechtigung \"doanything\" (alles tun) auch weiterhin dazu befähigt sind.';
$string['check_riskbackup_editoverride'] = '<a href=\"$a->url\">$a->name in $a->contextname</a>';
$string['check_riskbackup_editrole'] = '<a href=\"$a->url\">$a->name</a>';
$string['check_riskbackup_name'] = 'Sicherung von Nutzerdaten';
$string['check_riskbackup_ok'] = 'Keine Rolle erlaubt das Sichern von Nutzerdaten';
$string['check_riskbackup_unassign'] = '<a href=\"$a->url\">$a->fullname ($a->contextname)</a>';
$string['check_riskbackup_warning'] = '$a->rolecount Rolle(n), $a->overridecount Rollenänderung(en) und $a->usercount Nutzer mit der Möglichkeit zur Sicherung von Nutzerdaten gefunden';
$string['check_riskxss_details'] = '<p>RISK_XSS bezeichnet alle bedenklichen Berechtigungen, die ausschließlich absolut vertrauenswürdige Nutzer ausführen dürfen.</p>
<p>Bitte prüfen Sie die folgende Nutzerliste und stellen Sie sicher, dass Sie ihnen völlig trauen können:</p>$a';
$string['check_riskxss_name'] = 'XSS-vertrauenswürdige Nutzer';
$string['check_riskxss_warning'] = '$a Nutzer gefunden, denen bezüglich XSS vertraut werden muss!';
$string['check_unsecuredataroot_details'] = '<p>Das Verzeichnis \'dataroot\' sollte nicht aus dem Internet aufrufbar sein. Am besten legen Sie es außerhalb des öffentlich zugänglichen Verzeichnisses, beim Webserver Apache also üblicherweise außerhalb von \'htdocs\'.</p>
<p>Wenn Sie das Verzeichnis \'dataroot\' verschieben, müssen Sie auch unbedingt den Eintrag <code>\$CFG->dataroot</code> in der Datei  <code>config.php</code> entsprechend anpassen.</p>';
$string['check_unsecuredataroot_error'] = 'Ihr Verzeichnis \'dataroot\'  liegt an der falschen Stelle <code>$a</code> und ist aus dem Web aufrufbar!';
$string['check_unsecuredataroot_name'] = 'dataroot';
$string['check_unsecuredataroot_ok'] = 'Das Verzeichnis \'dataroot\' ist nicht aus dem Web erreichbar';
$string['check_unsecuredataroot_warning'] = 'Ihr moodledata-Verzeichnis <code>$a</code> liegt an der falschen Stelle. Es sollte nicht aus dem Web aufrufbar sein.';
$string['configuration'] = 'Konfiguration';
$string['description'] = 'Beschreibung';
$string['details'] = 'Details';
$string['issue'] = 'Ausgabe';
$string['reportsecurity'] = 'Sicherheitsbericht';
$string['security:view'] = 'Sicherheitsbericht ansehen';
$string['status'] = 'Status';
$string['statuscritical'] = 'Kritisch';
$string['statusinfo'] = 'Information';
$string['statusok'] = 'OK';
$string['statusserious'] = 'Schwerwiegend';
$string['statuswarning'] = 'Warnung';
$string['timewarning'] = 'Haben Sie bitte Geduld, denn die Bearbeitung kann etwas länger dauern...';
$string['check_courserole_legacy'] = 'Nicht unterstützter Legacy-Typ entdeckt in a href=\"$a\">role</a>.'; // ORPHANED

?>
