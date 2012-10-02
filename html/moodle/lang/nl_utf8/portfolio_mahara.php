<?PHP // $Id: portfolio_mahara.php,v 1.2 2009/01/05 22:23:43 koenr Exp $ 
      // portfolio_mahara.php - created with Moodle 2.0 dev (Build: 20090102) (2008123102)


$string['err_invalidhost'] = 'Deze plugin is fout geconfigureerd en wijst naar een foute (of verwijderde) mnet host. Deze plugin steunt op de Moodle Netwerk servers met SSO IDP gepubliceerd en portfolio en SSO_SP ingeschreven.';
$string['err_networkingoff'] = 'Moodle Netwerk is volledig uitgeschakeld. Schakel dit in voor je deze plugin probeert te configureren. Alle instanties van deze plugin zijn op onzichtbaar gezet tot dit is hersteld - je zult ze manueel terug zichtbaar moeten zetten. Ze kunnen niet gebruikt worden tot dit gebeurd is.';
$string['err_nomnetauth'] = 'De mnet authentictieplugin is uitgeschakeld, maar is vereist voor deze service';
$string['err_nomnethosts'] = 'Deze plugin steunt op Moodle Netwerk peers met SSO IDP gepubliceerd en portfolio en SSO SP ingeschreven in ook de mnet authenticatieplugin. Alle instanties van deze plugin zijn op niet zichtbaar gezet tot dit is hersteld - je zult ze manueel terug zichtbaar moeten zetten. Ze kunnen niet gebruikt worden tot dit gebeurd is.';
$string['failedtojump'] = 'Het starten van de communicatie met de andere server is mislukt';
$string['failedtoping'] = 'Het starten van de communicatie met server $a is mislukt';
$string['mnet_nofile'] = 'Kon geen bestand vinden in het transfer object.';
$string['mnet_nofilecontents'] = 'Bestand in tranfer object gevonden, maar kon de inhoud niet ophalen: $a';
$string['mnet_noid'] = 'Kon het overeenkomstige transfer record voor dit token niet vinden';
$string['mnet_notoken'] = 'Kon geen token vinden dat overeenkomt met deze transfer';
$string['mnet_wronghost'] = 'De andere server kwam niet overeen met het transfer record voor dit token';
$string['mnethost'] = 'Moodle netwerk host';
$string['pf_description'] = 'Laat gebruikers toe Moodle-inhoud naar deze server te sturen<br />Schrijf in op deze service om geauthenticeerde gebruikers van jouw site toe te laten om inhoud te sturen naar $a<br /><ul><li><em>Noodzakelijk</em>: je moet ook de SSO (Identiteitsprovider) service <strong>publiceren</strong> aan $a </li><li><em>Noodzakelijk</em>: je moet <strong>inschrijven</strong> op de SSO (Service provider) service op $a</li><li><em>Noodzakelijk</em>: je moet de mnet authenticatieplugin inschakelen</li></ul><br />';
$string['pf_name'] = 'Portfolio diensten';
$string['pluginname'] = 'Mahara ePortfolio';
$string['senddisallowed'] = 'Je kunt nu geen bestanden naar Mahara overzetten';
$string['url'] = 'URL';

?>
