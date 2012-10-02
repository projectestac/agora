<?PHP // $Id: portfolio_mahara.php,v 1.6 2009/02/22 18:59:05 ralf-bonn Exp $ 
      // portfolio_mahara.php - created with Moodle 2.0 dev (Build: 20090109) (2009010801)


$string['err_invalidhost'] = 'Dieses Plugin ist falsch konfiguriert. Es verweist auf einen ungültigen (oder gelöschten) mnet Host. Dieses Plugin verwendet Moodle Network Peers mit SSO IDP Veröffentlichung und Portfolio und SSO_SP Eintrag.';
$string['err_networkingoff'] = 'Vor der Konfiguration dieses Plugins muss Moodle Network aktiviert werden. Moodle Network ist zur Zeit vollständig ausgeschaltet. Die Instanzen dieses Plugins werden auf unsichtbar gesetzt bis dies korrigiert ist. Danach müssen Sie die Instanzen manuell sichtbar schalten, bevor sie genutzt werden können.';
$string['err_nomnetauth'] = 'Mnet Authentifizierung ist deaktiviert. Sie wird für diesen Service jedoch benötigt.';
$string['err_nomnethosts'] = 'Dieses Plugin basiert auf Moodle Network Peers mit SSO IDP Veröffentlichung und Portfolio sowie SSO SP Eintrag und zusätzlich Mnet Authentifizierung. Die Instanzen dieses Plugins werden auf unsichtbar gesetzt bis dies korrigiert ist. Danach müssen Sie die Instanzen manuell sichtbar schalten, bevor sie genutzt werden können.';
$string['failedtojump'] = 'Die Kommunikation mit dem externen Server konnte nicht gestartet werden.';
$string['failedtoping'] = 'Die Kommunikation mit dem externen Server ($a) konnte nicht gestartet werden.';
$string['mnet_nofile'] = 'Datei zum Transfer konnte nicht gefunden werden.';
$string['mnet_nofilecontents'] = 'Datei im Transferobjekt gefunden, Fehler aufgetreten: $a';
$string['mnet_noid'] = 'Passender Transferdatensatz für diesen Token nicht gefunden';
$string['mnet_notoken'] = 'Passender Token für diesen Transfer nicht gefunden';
$string['mnet_wronghost'] = 'Remote Host konnte den Transferdatensatz dem Token nicht zuordnen';
$string['mnethost'] = 'Moodle Netzwerk-Server';
$string['pf_description'] = 'Erlaubt Nutzern Moodle-Inhalte an diesen Host zu übertragen <br />Bestätigen Sie diesen Service, damit authentifizierte Nutzer/innen Ihrer Site Inhalte übertragen können nach $a<br /><em>Bedingungen</em>: </br><ul><li>Sie müssen zusätzlich den SSO (Identify Provider)Service für $a <strong>bekanntgeben</strong>.</li><li>Sie müssen zusätzlich den SSO (Identify Provider)Service für $a <strong>eintragen</strong>.</li>
<li>Sie müssen die mnet Authentifizierung aktivieren.</li></ul><br />';
$string['pf_name'] = 'Portfolio-Dienste';
$string['pluginname'] = 'Mahara ePortfolio';
$string['senddisallowed'] = 'Sie können zu diesem Zeitpunkt keine Daten zu Mahara übertragen';
$string['url'] = 'URL';

?>
