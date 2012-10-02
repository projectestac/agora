<?PHP // $Id: portfolio.php,v 1.8 2009/05/24 13:39:42 koenr Exp $ 
      // portfolio.php - created with Moodle 2.0 dev (Build: 20090514) (2009051200)


$string['activeportfolios'] = 'Actieve portfolio\'s';
$string['addalltoportfolio'] = 'Bewaar alles ...';
$string['addnewportfolio'] = 'Voeg een nieuw portfolio toe';
$string['addtoportfolio'] = 'Bewaar...';
$string['alreadyexporting'] = 'Je hebt al een actieve portfolio-export in deze sessie. Voor je verder doet, moet je ofwel deze eerst afwerken of annuleren. Wil je verder doen? (Nee zal annuleren)';
$string['availableformats'] = 'Beschikbare exportformats';
$string['callercouldnotpackage'] = 'Inpakken van je gegevens voor export mislukt';
$string['cannotsetvisible'] = 'Kan dit niet zichtbaar zetten - de plugin is volledig uitgeschakeld door een foute configuratie';
$string['commonsettingsdesc'] = '<p>Of een transfer beschouwd wordt als één die een \'matige\' of \'lange\' tijd gaat innemen is afhankelijk van de mogelijkheid van de gebruiker om te wachten tot die transfer afgerond is of niet.</p><p>De groote van de transfer tot aan de \'matig\'-grens zullen onmiddellijk gebeuren zonder iets aan de gebruiker te vragen. Voor \'matige\' tot \'lange\' transfers  zal de optie geboden worden, maar er zal ook gewaarschuwd worden dat het lang kan duren.</p><p>Sommige portfolie-plugins kunnen deze optie negeren en alle transfers in en wachtrij plaatsen.</p>';
$string['configexport'] = 'configureer geëxporteerde gegevens';
$string['configplugin'] = 'Configureer portfolioplugin';
$string['configure'] = 'Configureer';
$string['confirmexport'] = 'Bevestig deze export';
$string['confirmsummary'] = 'Samenvatting van je export';
$string['continuetoportfolio'] = 'Ga verder naar je portfolio';
$string['deleteportfolio'] = 'Verwijder portfolio';
$string['destination'] = 'Bestemming';
$string['disabled'] = 'Het exporteren van portfolio\'s is niet ingeschakeld voor deze site';
$string['displayarea'] = 'Exportzone';
$string['displayexpiry'] = 'Maximum transfertijd';
$string['displayinfo'] = 'Export informatie';
$string['dontwait'] = 'Wacht niet';
$string['enabled'] = 'Portfolio\'s inschakelen';
$string['enableddesc'] = 'Hiermee kunnen beheerders systemen op afstand configureren, zodat gebruikers er inhoud naartoe kunnen exporteren';
$string['err_uniquename'] = 'Portfolionaam moet uniek zijn (per plugin)';
$string['exportcomplete'] = 'Portfolioexport klaar!';
$string['exportedpreviously'] = 'Vorige exports';
$string['exportexpired'] = 'Portfolio export vervallen';
$string['exportexpireddesc'] = 'Je hebt geprobeerd een export te herhalen of je hebt een lege export gestart. Om dit correct te doen moet je teruggaan naar je oorspronkelijke locatie en de export opnieuw starten. Dit kan gebeuren wanneer je de terugknop in je browser gebruikt nadat een export was afgerond of door het gebruiken van een bladwijzer naar een foute URL.';
$string['exporting'] = 'Exporteren naar portfolio';
$string['exportingcontentfrom'] = 'Inhoud aan het exporteren van $a';
$string['exportqueued'] = 'Portfolio-export is klaargezet voor transfer';
$string['exportqueuedforced'] = 'De portfolio export is met succes in een wachtrij voor transfer gezet (de server vereist transfers via een wachtrij)';
$string['failedtopackage'] = 'Kon geen bestanden vinden om te verpakken';
$string['failedtosendpackage'] = 'Gegevens sturen naar het geselecteerde portfoliosysteem mislukt!';
$string['filedenied'] = 'Toegang tot dit bestand geweigerd';
$string['filenotfound'] = 'Bestand niet gevonden';
$string['format_file'] = 'Bestand';
$string['format_image'] = 'Afbeelding';
$string['format_mbkp'] = 'Moodle backup';
$string['format_plainhtml'] = 'HTML';
$string['format_richhtml'] = 'HTML met bijlagen';
$string['format_text'] = 'Platte tekst';
$string['format_video'] = 'Video';
$string['hidden'] = 'Verborgen';
$string['highdbsizethreshold'] = 'Lange transfer databankgrootte';
$string['highdbsizethresholddesc'] = 'Aantal databankrecords die beschouwd zullen worden als een lange tijd in beslag nemen om een transfer ervan te doen';
$string['highfilesizethreshold'] = 'Lange transfer bestandsgrootte';
$string['highfilesizethresholddesc'] = 'Bestanden groter dan dit zullen beschouwd worden als bestanden die een lange tijd in beslag nemen om een transfer ervan te doen';
$string['insanebody'] = 'Hallo,
Je krijgt dit bericht als beheerder van $a->sitename.

Sommige portfolio plugins zijn automatisch uitgeschakeld omdat ze fout geconfigureerd zijn. Dat betekent dat gebruikers hun inhoud niet naar deze portfolio\'s kunnen exporteren.

De lijst van uitgeschakelde portfolio plugins is:

$a->textlist

Dit zou zo snel mogelijk gecorrigeerd moeten worden op $a->fixurl.';
$string['insanebodyhtml'] = '<p>Hallo,
Je krijgt dit bericht als beheerder van $a->sitename.</p>
$a->htmllist
<p>Dit zou zo snel mogelijk gecorrigeerd moeten worden op <a href=\"$a->fixurl\">de portfolio configuratiepagina\'s</a></p>.';
$string['insanebodysmall'] = 'Hallo,
Je krijgt dit bericht als beheerder van $a->sitename. Sommige portfolio plugins zijn automatisch uitgeschakeld omdat ze fout geconfigureerd zijn. Dat betekent dat gebruikers hun inhoud niet naar deze portfolio\'s kunnen exporteren. Dit zou zo snel mogelijk gecorrigeerd moeten worden op $a->fixurl.';
$string['insanesubject'] = 'Sommige portfolioplugins zijn automatisch uitgeschakeld';
$string['instancedeleted'] = 'Portfolio met succes verwijderd';
$string['instanceismisconfigured'] = 'Portfolio is fout geconfigureerd, overgeslagen. De fout was: $a';
$string['instancenotdelete'] = 'Portfolio verwijderen mislukt';
$string['instancenotsaved'] = 'Portfolio bewaren mislukt';
$string['instancesaved'] = 'Portfolio bewaren gelukt';
$string['invalidaddformat'] = 'Ongeldig add format gegeven aan portfolio_add_button. ($a) Moet er één zijn van PORTFOLIO_ADD_XXX';
$string['invalidbuttonproperty'] = 'Kon die eigenschap ($a) van de portfolio_button niet vinden';
$string['invalidconfigproperty'] = 'Kon die configuratie-eigenschap ($a->property van $a->class) niet vinden';
$string['invalidexportproperty'] = 'Kon die exportconfiguratie-eigenschap ($a->property van $a->class) niet vinden';
$string['invalidfileareaargs'] = 'Ongeldige bestandsloctieargumenten doorgegeven aan set_file_and_format_data - moet contextid, bestandslocatie en itimID bevatten';
$string['invalidfileargument'] = 'Ongeldig bestandsargument doorgegeven aan portfolio_format_from_file - moet stored_file-object zijn';
$string['invalidformat'] = 'Iets is een ongelige format aan het exporteren, $a';
$string['invalidinstance'] = 'Kon dat portfolio-item niet vinden';
$string['invalidpreparepackagefile'] = 'Ongeldige aanroep aan prepare_package_file - ofwel single ofwel multifiles moet ingesteld zijn';
$string['invalidproperty'] = 'Kon eigenschap niet vinden ($a->property van $a->class)';
$string['invalidsha1file'] = 'Ongeldige aanroep naar get_sh1_file - ofwel single ofwel multifiles moet ingesteld zijn';
$string['invalidtempid'] = 'Ongeldig tijdelijke ID';
$string['invaliduserproperty'] = 'Kon die gebruikerconfiguratie-eigenschap niet vinden  ($a->property van $a->class)';
$string['logs'] = 'Transferlogs';
$string['logsummary'] = 'Vorige succesvolle transfers';
$string['manageportfolios'] = 'Beheer portfolio\'s';
$string['manageyourportfolios'] = 'Beheer jouw portfolio\'s';
$string['missingcallbackarg'] = 'Ontbrekend callback argument  $a->arg voor klasse $a->class';
$string['moderatedbsizethreshold'] = 'Matige transfer databankgroote';
$string['moderatedbsizethresholddesc'] = 'Aantal databankrecords die beschouwd zullen worden als een matige tijd in beslag nemen om een transfer ervan te doen';
$string['moderatefilesizethreshold'] = 'Matige transfer bestandsgrootte';
$string['moderatefilesizethresholddesc'] = 'Bestanden groter dan dit zullen beschouwd worden als bestanden die een matige tijd in beslag nemen om een transfer ervan te doen';
$string['multipledisallowed'] = 'Geprobeerd een nieuwe instantie te maken van een plugin die meerder instanties niet toelaat ($a)';
$string['mustsetcallbackoptions'] = 'Je moet callback opties ofwel in de portfolio_add_button constructor instellen of door gebruik te maken van de set_callback_options methode';
$string['noavailableplugins'] = 'Er zijn voor jou geen portfolio\'s beschikbaar om naar te exporteren';
$string['nocallbackclass'] = 'Kon de nodig callback klasse niet vinden ($a)';
$string['nocallbackfile'] = 'Iets in de module van waaruit je wil exporteren werkt niet - kon een vereist bestan ($a) niet vinden';
$string['noclassbeforeformats'] = 'Je moet de callback klasse instellen voor je set_formats aanroept in de portfolio_button';
$string['nocommonformats'] = 'Geen gemeenschappelijke formaten tussen de portfolio plugin en de vragende locatie $a';
$string['nonprimative'] = 'Een niet-primative waarde is doorgegeven als callback argument aan de portfolio_add_button. Gestopt. De sleutel was $a->key en de waarde was $a->value';
$string['nopermissions'] = 'Je hebt niet de juiste rechten om van hieruit bestanden te exporteren';
$string['notexportable'] = 'Het type inhoud dat je probeert te exporteren is niet exporteerbaar';
$string['notimplemented'] = 'Je probeert een format te exporteren naar een format die nog niet geïmplementeerd is ($a)';
$string['notyetselected'] = 'Nog niet geselekteerd';
$string['notyours'] = 'Je probeert een portfolio export te herstarten die niet van jouw is!';
$string['nouploaddirectory'] = 'Kon geen tijdelijke map maken om je gegevens in te verpakken';
$string['plugin'] = 'Portfolio Plugin';
$string['plugincouldnotpackage'] = 'Inpakken van je gegevens voor export mislukt';
$string['pluginismisconfigured'] = 'De portfolio plugin is fout geconfigureerd, overgeslagen. De fout was: $a';
$string['portfolio'] = 'Portfolio';
$string['portfolios'] = 'Portfolio\'s';
$string['queuesummary'] = 'Transfers in wachtrij';
$string['returntowhereyouwere'] = 'Keer terug';
$string['save'] = 'Bewaar';
$string['selectedformat'] = 'Gekozen export-format';
$string['selectedwait'] = 'Gekozen om te wachten?';
$string['selectplugin'] = 'Kies bestemming';
$string['someinstancesdisabled'] = 'Sommige geconfigureerde plugins zijn uitgeschakeld, ofwel omdat ze fout geconfigureerd zijn of omdat ze afhankelijk zijn van iets anders dat fout geconfigureerd is';
$string['somepluginsdisabled'] = 'Sommige plugins zijn volledig uitgeschakeld omdat ze fout geconfigureerd zijn of omdat ze afhankelijk zijn van iets anders dat fout geconfigureerd is';
$string['sure'] = 'Weet je zeker dat je \'$a\' wil verwijderen? Dit is definitief.';
$string['thirdpartyexception'] = 'Er werd een uitzonderingsfout gemaakt door een module tijdens de portfolio export ($a) Opgevangen en teruggezonden, maar dit moet hersteld worden';
$string['transfertime'] = 'Transfertijd';
$string['unknownplugin'] = 'Onbekend (kan verwijderd zijn door de beheerder)';
$string['wait'] = 'Wacht';
$string['wanttowait_high'] = 'Het wordt niet aangeraden te wachten om deze transfer af te ronden, maar je kunt wachten als je zeker weet wat je doet.';
$string['wanttowait_moderate'] = 'Wil je op deze transfer wachten? Het kan een aantal minuten duren';
$string['format_html'] = 'HTML'; // ORPHANED
$string['portfolionotfile'] = 'Exporteer naar een portfolio, eerder dan naar een bestand'; // ORPHANED

?>
