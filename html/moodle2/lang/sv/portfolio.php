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
 * Strings for component 'portfolio', language 'sv', branch 'MOODLE_24_STABLE'
 *
 * @package   portfolio
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activeportfolios'] = 'Tillgängliga portfolios';
$string['addalltoportfolio'] = 'Exportera allt till portfolio';
$string['addnewportfolio'] = 'Lägg till en ny portfolio';
$string['addtoportfolio'] = 'Exportera till portfolio';
$string['availableformats'] = 'Tillgängliga format för export';
$string['callbackclassinvalid'] = 'Den klass \'callback\' som angavs var ogiltig eller inte del av hierarkin för \'portfolio_caller\'';
$string['callercouldnotpackage'] = 'Det gick inte att packa upp Dina data för export: det ursprungliga felet var {$a}';
$string['cannotsetvisible'] = 'Det går inte att ställa in det här till synlig - plugin-programmet har avaktiverats helt p g a felaktig konfiguration';
$string['commonportfoliosettings'] = 'Vanliga inställningar för portfolio';
$string['commonsettingsdesc'] = '<p>Om en överföring anses ta godtagbar eller lång tid beror på om användaren kan vänta eller inte tills överföringen är klar.</p><p>Storlekar upp till värdet för godtagbar tid händer direkt utan att användaren tillfrågas, och godtagbar resp. lång överföringstid innebär att de erbjuds möjligheten men varnas för att det kan ta lite tid.</p><p>Dessutom kan vissa portfolioplugins ignorera denna inställning totalt och tvinga alla överföringar att ställas i kö.</p>';
$string['configexport'] = 'Konfigurera exporterade data';
$string['configplugin'] = 'Konfigurera plugin-program för portfolio';
$string['configure'] = 'Konfigurera';
$string['confirmcancel'] = 'Är Du säker på att Du vill avbryta den här exporten?';
$string['confirmexport'] = 'Var snäll och bekräfta den här exporten';
$string['confirmsummary'] = 'Sammanfattning av Din export';
$string['continuetoportfolio'] = 'Fortsätt till Din portfolio';
$string['deleteportfolio'] = 'Ta bort instans av portfolio';
$string['destination'] = 'Destination';
$string['disabled'] = 'Export av portfolio är inte aktiverade på den här webbplatsen';
$string['disabledinstance'] = 'Avaktiverad';
$string['displayarea'] = 'Område för export';
$string['displayexpiry'] = 'Överför utgående tid';
$string['displayinfo'] = 'Info om export';
$string['dontwait'] = 'Vänta inte';
$string['enabled'] = 'Aktivera portfolios';
$string['enableddesc'] = 'Det här kommer att tillåta administratörer att konfigurera fjärrsystem som användare kan exportera innehåll till';
$string['err_uniquename'] = 'Namnet på portfolion måste vara unikt (per plugin-program)';
$string['exportalreadyfinished'] = 'Exporten av portfolio är fullföljd!';
$string['exportcomplete'] = 'Exporten av portfolio är fullföljd!';
$string['exportedpreviously'] = 'Tidigare exporter';
$string['exportexpired'] = 'Exporten av portfolio gick ut';
$string['exporting'] = 'Exporterar till portfolio';
$string['exportingcontentfrom'] = 'Exporterar innehåll från {$a}';
$string['exportingcontentto'] = 'Exporterar innehåll till {$a}';
$string['exportqueued'] = 'Portfolioexport har framgångsrikt köats för överföring';
$string['exportqueuedforced'] = 'Portfolioexport har framgångsrikt köats för överföring (fjärrsystemet har tvingat köade överföringar)';
$string['failedtopackage'] = 'Det gick inte att hitta filer till paketet';
$string['filedenied'] = 'Tillgång nekas till filen';
$string['filenotfound'] = 'Det gick inte att hitta filen';
$string['fileoutputnotsupported'] = 'Omskrivning av filresultatet stöds inte för detta format';
$string['format_document'] = 'Dokument';
$string['format_file'] = 'Fil';
$string['format_image'] = 'Bild';
$string['format_leap2a'] = 'Leap2A portfolio format';
$string['format_mbkp'] = 'Moodle Backup Format';
$string['format_pdf'] = 'PDF';
$string['format_plainhtml'] = 'HTML';
$string['format_presentation'] = 'Presentation';
$string['format_richhtml'] = 'HTML med bilagor';
$string['format_spreadsheet'] = 'Kalkylblad';
$string['format_text'] = 'Vanlig text';
$string['format_video'] = 'Video';
$string['hidden'] = 'Dold';
$string['highdbsizethreshold'] = 'Hög överföring dbstorlek';
$string['highdbsizethresholddesc'] = 'Antal db poster vilka kommer att anses ta lång tid att överföra';
$string['highfilesizethreshold'] = 'Filstorlek hög överföringshastighet';
$string['highfilesizethresholddesc'] = 'Filstorlekar över detta tröskelvärde kommer att anses ta lång tid att överföra';
$string['insanebody'] = 'Hej! Du får detta meddelande eftersom du är administratör för {$a->sitename}. Någon portfolioplugin instans har automatiskt avaktiverats på grund av felkonfiguration. Detta innebär att användare för närvarande inte kan exportera innehåll till dessa prtfolios. Listan över portfolioinstanser som har avaktiverats är: {$a->textlist} Detta bör åtgärdas snarast möjligt genom att besöka {$a->fixurl}.';
$string['insanebodyhtml'] = '<p>Hej! Du får detta meddelande eftersom du är administratör för {$a->sitename}.</p> <p>Någon instans av portfolioplugin har automatiskt avaktiverats på grund av felkonfiguration. Detta innebär att användare för närvarande inte kan exportera innehåll till dessa portfolios.</p> <p>Listan över instanser av portfolioplugins som har avaktiverats är:</p> {$a->htmllist} <p>Detta bör åtgärdas snarast möjligt genom att besöka <a href="{$a->fixurl}">sidorna för konfiguration av portfolio</a></p>';
$string['insanebodysmall'] = 'Hej! Du får detta meddelande eftersom du är administratör för {$a->sitename}. Någon instans av portfolio plugin har automatiskt avaktiverats på grund av felkonfiguration. Detta innebär att användare för närvarande inte kan exportera innehåll till dessa portfolios. Detta bör åtgärdas snarast möjligt genom att besöka {$a->fixurl}.';
$string['insanesubject'] = 'Några portfolioinstanser har avaktiverats automatiskt';
$string['instancedeleted'] = 'Portfolio borttaget';
$string['instanceismisconfigured'] = 'Portfolio instansen är felkonfigurerad, hoppar över. Felet var: {$a}';
$string['instancenotsaved'] = 'Misslyckades att spara portfolio';
$string['instancesaved'] = 'Portfolio sparat';
$string['invalidbuttonproperty'] = 'Kunde inte hitta denna egenskap ({$a}) för portfolio_button';
$string['invalidconfigproperty'] = 'Kunde inte hitta den konfigureringsegenskapen ({$a->property} för {$a->class})';
$string['invalidexportproperty'] = 'Kunde inte hitta den egenskapen för exportkonfigration ({$a->property} för {$a->class})';
$string['invalidformat'] = 'Något exporterar ett felaktigt format, {$a}';
$string['invalidinstance'] = 'Kunde inte hitta denna instans av portfolio';
$string['invalidproperty'] = 'Kunde inte hitta denna egenskap ({$a->property} för {$a->class})';
$string['invalidtempid'] = 'Felaktigt export id. Det kanske är för gammalt.';
$string['invaliduserproperty'] = 'Kunde inte hitta denna egenskap för användarkonfiguration ({$a->property} för {$a->class})';
$string['leap2a_emptyselection'] = 'Nödvändigt värde ej valt';
$string['leap2a_entryalreadyexists'] = 'Du försökte lägga till en Leap2A post med ett id ({$a}) som redan existerar i denna feed';
$string['leap2a_feedtitle'] = 'Leap2A export från Moodle för {$a}';
$string['leap2a_filecontent'] = 'Försökte ange innehållet i en Leap2A post till en fil istället för att använda underklassen file';
$string['leap2a_invalidentryfield'] = 'Du försökte ange ett inmatningsfält som inte existerade ({$a}) eller som inte kan anges direkt directly';
$string['leap2a_invalidentryid'] = 'Du försökte komma åt en post med ett id som inte finns ({$a})';
$string['leap2a_missingfield'] = 'Nödvändigt Leap2A inmatningsfält {$a} saknas';
$string['leap2a_nonexistantlink'] = 'En Leap2A post ({$a->from}) försökte länka till en post som inte finns ({$a->to}) med rel {$a->rel}';
$string['leap2a_overwritingselection'] = 'Skriver över orginaltypen för en post ({$a}) till val i make_selection';
$string['leap2a_selflink'] = 'En Leap2A post ({$a->id}) försökte länka till sig själv med rel {$a->rel}';
$string['logs'] = 'Överföringsloggar';
$string['logsummary'] = 'Tidigare framgångsrika överföringar';
$string['manageportfolios'] = 'Hantera portfolios';
$string['manageyourportfolios'] = 'Hantera dina portfolios';
$string['mimecheckfail'] = 'Portfoliopluginen {$a->plugin} stödjer inte denna MIME-typ {$a->mimetype}';
$string['missingcallbackarg'] = 'Saknat callback argument {$a->arg} för klass {$a->class}';
$string['moderatedbsizethreshold'] = 'Dbstorlek för måttlig överföringshastighet';
$string['moderatedbsizethresholddesc'] = 'Antal db poster som kommer att anses ta måttlig tid att överföra';
$string['moderatefilesizethreshold'] = 'Filstorlek för måttlig överföringshastighet';
$string['moderatefilesizethresholddesc'] = 'Filstorlekar över detta tröskelvärde kommer att anses ta måttlig tid att överföra';
$string['multipleinstancesdisallowed'] = 'Försöker skapa en ny instans av en plugin som inte tillåter multipla instanser ({$a})';
$string['noavailableplugins'] = 'Tyvärr, det finns inga tillgängliga portfolios för dig att exportera till';
$string['nocallbackclass'] = 'Kunde inte hitta klassen för callback som ska användas ({$a})';
$string['noclassbeforeformats'] = 'Du måste ställa in callback klassen före anrop av set_formats in portfolio_button';
$string['noinstanceyet'] = 'Ännu inte valt';
$string['nologs'] = 'Det finns inga loggar att visa!';
$string['nomultipleexports'] = 'Tyvärr, portfoliodestinationen ({$a->plugin}) stödjer inte multipla exporter på samma gång. Vänligen <a href="{$a->link}">avsluta nuvarande först</a> och försök sedan igen';
$string['nonprimative'] = 'Ett icke primitivt värde skickades som ett callback argument till portfolio_add_button. Kan inte fortsätta. Nyckel var {$a->key} och värdet var {$a->value}';
$string['nopermissions'] = 'Du har tyvärr inte tillräckliga rättigheter för att exportera filer från den här platsen';
$string['notexportable'] = 'Den typ av innehåll du försöker exportera är tyvärr inte exporterbart';
$string['notimplemented'] = 'Du försöker exportera innehåll i något format som tyvärr ännu inte är implementerat ({$a})';
$string['notyours'] = 'Du försöker återuppta en portfolioexport som inte tillhör dig!';
$string['off'] = 'Aktiverad men dold';
$string['on'] = 'Aktiverad och synlig';
$string['plugin'] = 'Portfolio plugin';
$string['plugincouldnotpackage'] = 'Misslyckades med att packa din data för export: ursprungligt fel var {$a}';
$string['pluginismisconfigured'] = 'Portfolio pluginen är felkonfigurerad, hoppar över. Felet var: {$a}';
$string['portfolio'] = 'Portfolio';
$string['portfolios'] = 'Portfolios';
$string['queuesummary'] = 'Nuvarande köade överföringar';
$string['returntowhereyouwere'] = 'Återgå till där du var';
$string['save'] = 'Spara';
$string['selectedformat'] = 'Välj exportformat';
$string['selectedwait'] = 'Valde att vänta?';
$string['selectplugin'] = 'Valde att vänta?';
$string['singleinstancenomultiallowed'] = 'Endast en instans av portfolio plugin är tillgänglig och den stödjer inte multipla exporter per session. Det finns redan en aktiv export i sessionen som använder denna plugin!';
$string['somepluginsdisabled'] = 'Några hela portfolio plugins har avaktiverats på grund av att de är felkonfigurerade eller är beroende av något annat som är det:';
$string['sure'] = 'Är du säker på att du vill ta bort \'{$a}? Detta kan inte ångras.';
$string['transfertime'] = 'Överföringstiden';
$string['unknownplugin'] = 'Okänd (kan ha sedan tagits bort av en administratör)';
$string['wait'] = 'Vänta';
$string['wanttowait_high'] = 'Det rekommenderas inte att du väntar på att denna överföring ska slutföras, men du kan göra så om du är säker på vad du gör';
$string['wanttowait_moderate'] = 'Vill du vänta på denna överföring? Det kan ta några minuter';
