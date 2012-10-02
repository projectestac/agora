<?PHP // $Id: portfolio_mahara.php,v 1.3 2010/03/24 17:04:10 andreabix Exp $ 
      // portfolio_mahara.php - created with Moodle 2.0 dev (Build: 20100324) (2010031900)


$string['err_invalidhost'] = 'Il plugin non è configurato correttamente, punta a un host ment non valido oppure eliminato. Questo plugin necessita di peer Moodle Networking che offrano il servizio SSO IDP e  sottoscrivino il servizio portfolio e SSO SP.';
$string['err_networkingoff'] = 'Il Moodle Networking è disabilitato. Prima di usare questo plugin dovete abilitare il Moodle Betworking. Qualsiasi istanza di questo plugin non sarà visibile fino alla abilitazione del Networking, quando potrete rendere nuovamente visibile il plugin manualmente.';
$string['err_nomnetauth'] = 'Il  plugin di autenticazione mnet, necessario per usare questo servizio, è disabilitato';
$string['err_nomnethosts'] = 'Questo plugin necessita di peer Moodle Networking che offrano il servizio SSO IDP, sottoscrivino il servizio portfolio e SSO SP, e del plugin mnet di autenticazione. Qualsiasi istanza di questo plugin non sarà visibile fino alla abilitazione del Networking, quando potrete rendere nuovamente visibile il plugin manualmente.';
$string['failedtojump'] = 'Non è stato possibile avviare la comunicazione con il server remoto';
$string['failedtoping'] = 'Non è stato possibile avviare la comunicazione con il server remoto: $a';
$string['mnet_nofile'] = 'Non è stato possibile trovare il file nell\'oggetto trasferito - errore insolito.';
$string['mnet_nofilecontents'] = 'Nell\'oggetto trasferito è stato trovato un file ma non è stato possibile ottenere il contenuto - errore insolito: $a';
$string['mnet_noid'] = 'Non è stato possibile trovare il record di trasferimento che corrisponda a questo token';
$string['mnet_notoken'] = 'Non è stato possibile trovare un token che corrisponda a questo trasferimento';
$string['mnet_wronghost'] = 'L\'host remoto non corrisponde al record di trasferimento di questo token';
$string['mnethost'] = 'Moodle Networking Host';
$string['pf_description'] = 'Tramite questo servizio potete autorizzare gli utenti a trasferire materiali su questo host.<br />Per consentire agli utenti autenticati nel tuo sito di trasferire materiali nel sito $a, dovete sottoscrivere questo servizio.<br /><ul><li><em>Requisito</em>: è necessario <strong>offrire</strong> il Servizio SSO (Identify Provider) al sito $a.</li><li><em>Requisito</em>: è necessario <strong>sottoscrivere</strong> il Servizio SSO (Service Provider) offerto dal sito $a</li><li><em>Requisito</em>: è è anche necessario abilitare la plugin di autenticazione Moodle Network.</li></ul><br />';
$string['pf_name'] = 'Servizio di Portfolio';
$string['pluginname'] = 'Mahara ePortfolio';
$string['senddisallowed'] = 'Al momento non è possibile trasferire file su Mahara';
$string['url'] = 'URL';

?>
