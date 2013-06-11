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
 * Strings for component 'data', language 'sv', branch 'MOODLE_24_STABLE'
 *
 * @package   data
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['action'] = 'Handling';
$string['add'] = 'Lägg till bidrag';
$string['addcomment'] = 'Lägg till kommentarer';
$string['addentries'] = 'Lägg till bidrag';
$string['addtemplate'] = 'Lägg till en mall';
$string['advancedsearch'] = 'Avancerad sökning';
$string['alttext'] = 'Alternativ text';
$string['approve'] = 'Godkänn';
$string['approved'] = 'Godkänd';
$string['areacontent'] = 'Fält';
$string['ascending'] = 'Stigande';
$string['asearchtemplate'] = 'Mall för avancerad sökning';
$string['atmaxentry'] = 'Du har lagt till det maximala antal bidrag som är tillåtna!';
$string['authorfirstname'] = 'Författarens förnamn';
$string['authorlastname'] = 'Författarens efternamn';
$string['autogenallforms'] = 'Skapa alla standardmallar';
$string['autolinkurl'] = 'Autolänk till URLen';
$string['availablefromdate'] = 'Tillgänglig från';
$string['availabletags'] = 'Tillgängliga taggar';
$string['availabletags_help'] = '<p align="center"><strong>Tillgängliga etiketter</strong></p>
<p>Etiketter är platshållare i mallen som kommer att ersättas av fält eller knappar när bidrag redigeras eller visas.</p>
<p>Fält har följande format: [[fieldname]]</p>
<p>Knappar har följande format: ##somebutton##</p>
<p>Endast de etiketter som finns in listan "Tillgängliga etiketter" kan användas för den aktuella mallen.</p>';
$string['availabletodate'] = 'Tillgänglig till';
$string['blank'] = 'Tom';
$string['buttons'] = 'Åtgärder';
$string['bynameondate'] = 'av {$a->name} - {$a->date}';
$string['cancel'] = 'Avbryt';
$string['cannotaccesspresentsother'] = 'Du har inte tillstånd att läsa andra användares förinställningar ';
$string['cannotadd'] = 'Det går inte att lägga till bidrag';
$string['cannotdeletepreset'] = 'Fel vid borttagande av en förinställd mall!';
$string['cannotoverwritepreset'] = 'Fel vid överskrivning av förinställning';
$string['cannotunziptopreset'] = 'Det går inte att packa upp den förinställda mallen';
$string['checkbox'] = 'Kryssruta';
$string['chooseexportfields'] = 'Välj de fält som Du vill exportera:';
$string['chooseexportformat'] = 'Välj det format som Du vill exportera till:';
$string['chooseorupload'] = 'Välj en fil';
$string['columns'] = 'Kolumner';
$string['comment'] = 'Kommentar';
$string['commentdeleted'] = 'Kommentaren har tagits bort';
$string['commentempty'] = 'Kommentaren var tom';
$string['comments'] = 'Kommentarer';
$string['commentsaved'] = 'Kommentaren har sparats';
$string['commentsn'] = '{$a} kommentarer';
$string['commentsoff'] = 'Kommentarsfunktionen är avaktiverad.';
$string['configenablerssfeeds'] = 'Den här omkopplaren kommer att aktivera möjligheten att välja RSS-matningar för alla databaser. Du måste ändå aktivera matningar manuellt i inställningarna för varje enskild databas.';
$string['confirmdeletefield'] = 'Du håller på att ta bort det här fältet, är Du säker?';
$string['confirmdeleterecord'] = 'Är Du säker på att Du vill ta bort det här bidraget?';
$string['csstemplate'] = 'CSS-mall';
$string['csvfailed'] = 'Det går inte att läsa rådata från CSV-filen';
$string['csvfile'] = 'CVS-fil';
$string['csvimport'] = 'Import av CVS-fil';
$string['csvimport_help'] = '<p align="center"><strong>Importera från en CSV-fil</strong></p>

<p>CSV betyder (C)komma-Separarerade-Värden och det är ett vanligt format för textutbyte.</p>

<p>Det förväntade filfomatet är en vanlig textfil med en lista över fältnamn
som den första posten. Därefter följer data i form av en post per rad.</p>

<p>Fältavgränsaren är normalt sett ett kommatecken medan det inte finns någon standard (t.ex. parenteser) för att omsluta varje fält i varje post. </p>

<p>Posterna ska vara avskilda med nya rader (vanligtvis genererade genom att man trycker på RETURN
   eller ENTER i ordbehandlingsprogrammet). Tabbar kan anges genom att man använder t och nya rader med n. </p>

<p>Exempel på fil:</p>

<pre>
  namn,längd,vikt
  Kai,180cm,80kg
  Kim,170cm,60kg
  Koo,190cm,20kg
</pre>

<p>OBS! Det kanske inte finns stöd för alla fälttyper.</p>';
$string['csvwithselecteddelimiter'] = '<acronym title="Comma Separated Values">CSV</acronym> text med vald avskiljare:';
$string['data:addinstance'] = 'Lägg till en ny databas';
$string['data:approve'] = 'Godkänn icke-godkända bidrag';
$string['data:comment'] = 'Skriv kommentar';
$string['data:exportallentries'] = 'Exportera alla bidrag till databasen';
$string['data:exportentry'] = 'Exportera ett bidrag till databasen';
$string['data:exportownentry'] = 'Exportera Ditt eget bidrag till databasen';
$string['data:exportuserinfo'] = 'Exportera information om användare';
$string['data:managecomments'] = 'Administrera kommentarer';
$string['data:manageentries'] = 'Administrera bidrag';
$string['data:managetemplates'] = 'Administrera mallar';
$string['data:manageuserpresets'] = 'Administrera alla förinställda mallar';
$string['data:rate'] = 'Betygssätt bidrag';
$string['data:readentry'] = 'Läs bidrag';
$string['data:viewallratings'] = 'Visa alla \'råa\' bedömningar/värderingar som individer har avgivit';
$string['data:viewalluserpresets'] = 'Visa förinställda från alla användare';
$string['data:viewanyrating'] = 'Visa de sammanlagda bedömningar/värderingar som någon har fått';
$string['data:viewentry'] = 'Visa bidrag';
$string['data:viewrating'] = 'Visa de sammanlagda bedömningar/värderingar som Du har fått';
$string['data:writeentry'] = 'Skriv bidrag';
$string['date'] = 'Datum';
$string['dateentered'] = 'Datum för bidrag';
$string['defaultfielddelimiter'] = '(standard är kommatecknet)';
$string['defaultfieldenclosure'] = '(standard är ingen)';
$string['defaultsortfield'] = 'Standardfält för sortering';
$string['delete'] = 'Ta bort';
$string['deleteallentries'] = 'Ta bort alla bidrag';
$string['deletecomment'] = 'Är Du säker på att Du vill ta bort den här kommentaren?';
$string['deleted'] = 'Borttaget';
$string['deletefield'] = 'Ta bort ett befintligt fält';
$string['deletenotenrolled'] = 'Ta bort bidrag som kommer från användare som inte är registrerade';
$string['deletewarning'] = 'Är Du säker på att Du vill ta bort den här förinställningen?';
$string['descending'] = 'Fallande';
$string['directorynotapreset'] = '{$a->directory} Inte en förinställning: saknade filer: {$a->missing_files}';
$string['download'] = 'Ladda ner';
$string['edit'] = 'Redigera';
$string['editcomment'] = 'Redigera kommentar';
$string['editentry'] = 'Redigera bidrag';
$string['editordisable'] = 'Avaktivera redigerare';
$string['editorenable'] = 'Aktivera redigerare';
$string['emptyadd'] = 'Mallen Lägg till är tom, skapar ett standardformulär...';
$string['emptyaddform'] = 'Du fyllde inte i alla fält!';
$string['entries'] = 'Bidrag';
$string['entrieslefttoadd'] = 'Du måste lägga till {$a->entriesleft} fler bidrag för att fullfölja den här aktiviteten.';
$string['entrieslefttoaddtoview'] = 'Du måste lägga till {$a->entrieslefttoview} fler bidrag innan Du kan få se de andra deltagarnas bidrag.';
$string['entry'] = 'Bidrag';
$string['entrysaved'] = 'Ditt bidrag har sparats';
$string['errormustbeteacher'] = 'Du måste vara lärare för att få använda den här sidan!';
$string['errorpresetexists'] = 'Det finns redan en förinställning med det namnet';
$string['example'] = 'Exempel för modulen databas';
$string['excel'] = 'Excel';
$string['expired'] = 'Den här aktiviteten stängdes tyvärr den {$a} och är inte längre tillgänglig.';
$string['export'] = 'Exportera';
$string['exportaszip'] = 'Exportera som zip';
$string['exportaszip_help'] = '<p align="center"><strong>Exportera som Zip</strong></p>
<p>Det här gör det möjligt för dig att ladda ner mallarna till din egen dator.
Senare kan du ladda upp dem till en annan databas med hjälp av egenskapen
Importera från Zip.</p>';
$string['exportedtozip'] = 'Exporterade som tillfällig zip...';
$string['exportentries'] = 'Exportera inlägg';
$string['exportownentries'] = 'Exportera endast Dina egna bidrag?
({$a->mine}/{$a->all})';
$string['failedpresetdelete'] = 'Fel i samband med att en förinställning skulle tas bort';
$string['fieldadded'] = 'Det har lagts till ett fält';
$string['fieldallowautolink'] = 'Tillåt autolänk';
$string['fielddeleted'] = 'Fältet har tagits bort';
$string['fielddelimiter'] = 'Avgränsare för fält';
$string['fielddescription'] = 'Beskrivning av fält';
$string['fieldenclosure'] = 'Inramning av fält';
$string['fieldheight'] = 'Höjd';
$string['fieldheightlistview'] = 'Höjd vid visning av lista';
$string['fieldheightsingleview'] = 'Höjd vid visning av ett enskilt bidrag';
$string['fieldids'] = 'Id för fält';
$string['fieldmappings'] = 'Kartläggning av fält';
$string['fieldmappings_help'] = '<p align="center"><strong>Mallar för fält</strong></p>
<p>Den här menyn gör det möjligt för dig att behålla data
från den befintliga databasen. För att bevara data i ett fält
så måste du göra en mall så att datan hamnar i och visas i ett
nytt fält. Alla fält kan även lämnas tomma utan att det kopieras
någon information till dem. Alla ursprungliga fält som inte finns
med i den nya mallen kommer att gå förlorade och alla de data som
fanns där kommer att tas bort.</p>
<p>
Du kan bara göra mallar med fält av samma typ så varje
"dropdown" kommer att ha olika fält i sig. Dessutom måste
du vara aktsam så att du inte försöker att göra en mall
för ett gammalt fält som ska leda till mer än ett nytt fält.

</p>';
$string['fieldname'] = 'Fältnamn';
$string['fieldnotmatched'] = 'Följande fält i Din fil saknas i den här databasen:{$a}';
$string['fieldoptions'] = 'Alternativ (ett per rad)';
$string['fields'] = 'Fält';
$string['fieldupdated'] = 'Fält uppdaterat';
$string['fieldwidth'] = 'Vidd';
$string['fieldwidthlistview'] = 'Vidd vid visning av lista';
$string['fieldwidthsingleview'] = 'Vidd vid visning av enskilt bidrag';
$string['file'] = 'Fil';
$string['fileencoding'] = 'Inkodning';
$string['filesnotgenerated'] = 'Alla filer skapades inte: {$a}';
$string['filtername'] = 'Auto-länkning av databas';
$string['footer'] = 'Sidfot';
$string['forcelinkname'] = 'Tvinga fram ett namn för länken';
$string['foundnorecords'] = 'Inga poster funna (<a href="{$a->reseturl}">Filter för återställning</a>)';
$string['foundrecords'] = 'Funna poster: {$a->num}/{$a->max} (<a href="{$a->reseturl}">Filter för återställning</a>)';
$string['fromfile'] = 'Importera från .zip-fil.';
$string['fromfile_help'] = 'Importera från zip-filen gör att du kan leta efter och ladda upp en förinställd zip-fil av mallar och fält.';
$string['generateerror'] = 'Alla filer skapades inte!';
$string['header'] = 'Sidhuvud';
$string['headeraddtemplate'] = 'Definierar det gränssnitt som ska användas för att redigera bidrag';
$string['headerasearchtemplate'] = 'Definierar gränssnittet för avancerade sökningar';
$string['headercsstemplate'] = 'Definierar de lokala CSS-stilarna för de andra mallarna';
$string['headerjstemplate'] = 'Definierar specialskrivna JavaScript för andra mallar.';
$string['headerlisttemplate'] = 'Definierar gränssnittet för att bläddra genom flerfaldiga bidrag';
$string['headerrsstemplate'] = 'Definierar hur bidragen presenteras i RSS-utmatningar';
$string['headersingletemplate'] = 'Definierar det gränssnitt som ska användas för ett enskilt bidrag';
$string['importentries'] = 'Importera inlägg';
$string['importsuccess'] = 'Förinställningen har framgångsrikt tillämpats.';
$string['includeapproval'] = 'Ta med status ang acceptans';
$string['includetime'] = 'Ange tidpunkt för tillägg/modifiering';
$string['includeuserdetails'] = 'Ange även detaljinfo om användare';
$string['insufficiententries'] = 'det behövs fler bidrag för att visa den här databasen';
$string['intro'] = 'Beskrivning';
$string['invalidaccess'] = 'Den här sidan visades inte på ett giltigt sätt';
$string['invalidfieldid'] = 'Fält-ID är felaktigt';
$string['invalidfieldname'] = 'Var snäll och välj ett annat namn för det här fältet';
$string['invalidfieldtype'] = 'Fälttypen är felaktig';
$string['invalidid'] = 'Data-ID är felaktigt';
$string['invalidpreset'] = '{$a} är inte en förinställning.';
$string['invalidrecord'] = 'Felaktig post';
$string['invalidurl'] = 'Den URL som Du just matade in är inte giltig';
$string['jstemplate'] = 'Mall för Javascript';
$string['latitude'] = 'Latitud';
$string['latlong'] = 'Latitud/longitud';
$string['latlongdownloadallhint'] = 'Ladda ner länk för alla bidrag i form av KML';
$string['latlongkmllabelling'] = 'Hur Du sätter etiketter på komponenter i KML-filer (Google Earth)';
$string['latlonglinkservicesdisplayed'] = 'Visning av tjänster som är länkade utåt';
$string['latlongotherfields'] = 'Andra fält';
$string['list'] = 'Visa lista';
$string['listtemplate'] = 'Mall för lista';
$string['longitude'] = 'Longitud';
$string['mapexistingfield'] = 'Kartlägg till {$a}';
$string['mapnewfield'] = 'Skapa ett nytt fält';
$string['mappingwarning'] = 'Alla gamla fält som inte är kartlagda till ett nytt fält kommer försvinna och alla data i det fältet kommer att tas bort.';
$string['maxentries'] = 'Maximalt antal bidrag';
$string['maxentries_help'] = 'Det maximala antalet bidrag som en deltagare kan skicka in för den här aktiviteten.';
$string['maxsize'] = 'Maximal storlek';
$string['menu'] = 'Meny';
$string['menuchoose'] = 'Välj...';
$string['missingdata'] = 'Det måste finnas ett data-ID eller objekt som tilldelas klassen för fältet';
$string['missingfield'] = 'Programmerarfel: Du måste ange fält och/eller data när Du definierar klassen för fältet. ';
$string['modulename'] = 'Databas';
$string['modulename_help'] = 'Modulen för aktiviteten databas gör det möjligt för deltagare att skapa, underhålla och söka en bank av inlagda poster. Formatet och strukturen på dessa bidrag kan vara nästan vilket som helst, som t ex bilder, filer, URLer, tal, texter osv.';
$string['modulenameplural'] = 'Databaser';
$string['more'] = 'Fler';
$string['moreurl'] = 'Fler URLer';
$string['movezipfailed'] = 'Det gick inte att flytta zip-filen';
$string['multientry'] = 'Dubblerat bidrag';
$string['multimenu'] = 'Meny (välj flera)';
$string['multipletags'] = 'Det fanns flerfaldiga taggar! Mallen har inte sparats';
$string['namecheckbox'] = 'Fält för kryssruta';
$string['namedate'] = 'Fält för datum';
$string['namefile'] = 'Fält för fil';
$string['namelatlong'] = 'Fält för latitud/longitud';
$string['namemenu'] = 'Fält för meny';
$string['namemultimenu'] = 'Fält för flervalsmeny';
$string['namenumber'] = 'Fält för tal';
$string['namepicture'] = 'Fält för bild';
$string['nameradiobutton'] = 'Fält för radioknapp';
$string['nametext'] = 'Fält för text';
$string['nametextarea'] = 'Fält för textyta';
$string['nameurl'] = 'Fält för URL';
$string['newentry'] = 'Nytt bidrag';
$string['newfield'] = 'Skapa ett nytt fält';
$string['newfield_help'] = '<p align="center"><strong>Fält</strong></p>

<p>På den här skärmen kan Du skapa de fält som kommer att vara del av Din databas. </p>

<p>Varje fält tillåter olika typer av data med olika gränssnitt.</p>';
$string['noaccess'] = 'Du har inte tillträde till den här sidan';
$string['nodefinedfields'] = 'Den nya förinställningen har inga definierade fält!';
$string['nofieldcontent'] = 'Det gick inte att hitta innehållet i fältet';
$string['nofieldindatabase'] = 'Det finns inga fält definierade för den här databasen';
$string['nolisttemplate'] = 'Mallen för lista är ännu inte definierad';
$string['nomatch'] = 'Det gick inte att hitta några matchande bidrag!';
$string['nomaximum'] = 'Ingen maxgräns';
$string['norecords'] = 'Det finns inga bidrag i databasen';
$string['nosingletemplate'] = 'Det har inte definierats någon mall för enskilda bidrag ännu';
$string['notapproved'] = 'Bidraget är inte godkänt än';
$string['notinjectivemap'] = 'Detta är inte en injektiv karta';
$string['notopenyet'] = 'Den här aktiviteten är tyvärr inte tillgänglig förrän {$}';
$string['number'] = 'Tal';
$string['numberrssarticles'] = 'RSS-artiklar';
$string['numnotapproved'] = 'Avvaktar';
$string['numrecords'] = '{$a} bidrag';
$string['ods'] = '<acronym title="OpenDocument Spreadsheet">ODS</acronym> (OpenOffice)';
$string['optionaldescription'] = 'Kort beskrivning (valfri)';
$string['optionalfilename'] = 'Filnamn (valfritt)';
$string['other'] = 'Övrigt';
$string['overrwritedesc'] = 'Skriv över förinställningen om den redan existerar';
$string['overwrite'] = 'Skriv över';
$string['overwritesettings'] = 'Skriv över de aktuella inställningarna';
$string['page-mod-data-x'] = 'Valfri sida för databasmodul';
$string['pagesize'] = 'Bidrag per sida';
$string['participants'] = 'Deltagare';
$string['picture'] = 'Bild';
$string['pleaseaddsome'] = 'Var snäll och skapa något/några här nedan eller <a href="{$a}">välj en förinställd uppsättning</a> för att komma igång.';
$string['pluginadministration'] = 'Administration av aktivitet av typ databas';
$string['pluginname'] = 'Databas';
$string['portfolionotfile'] = 'Exportera hellre till en portfolio än till en fil (endast csv och leap2)';
$string['presetinfo'] = 'Om Du sparar detta som en förinställning så kommer mallen att göras öppet tillgänglig. Andra användare kommer att kunna använda den i sina databaser.';
$string['presets'] = 'Förinställda mallar';
$string['radiobutton'] = 'Radioknappar';
$string['recordapproved'] = 'Bidraget har godkänts';
$string['recorddeleted'] = 'Bidraget har tagits bort';
$string['recordsnotsaved'] = 'Inget bidrag sparades. Var snäll och kontrollera vilket format den uppladdade filen har.';
$string['recordssaved'] = 'bidragen har sparats';
$string['requireapproval'] = 'Kräva godkännande?';
$string['requireapproval_help'] = '<p align="center"><strong>Kräv godkännande</strong></p>

<p>Ska bidrag godkännas av en lärare innan de kan visas för studenterna/eleverna/deltagarna/de lärande? Detta är användbart när Du vill moderera innehåll som skulle kunna vara olämpligt eller provocerande.</p>';
$string['requiredentries'] = 'Obligatoriska bidrag';
$string['requiredentries_help'] = '<p align="center"><strong>Obligatoriska bidrag</strong></p>

<p>Det antal bidrag som varje deltagare förväntas skicka in. Om de inte har skickat in de obligatoriska bidragen kommer deltagarna att få se en påminnelse om detta i samband med att de använder databasen.
   </p>

<p>Aktiviteten kommer inte att godkännas som fullgjord förrän deltagaren har skickat in sina obligatoriska bidrag.</p>';
$string['requiredentriestoview'] = 'Det krävs att man gör bidrag innan man får se innehållet i databasen';
$string['requiredentriestoview_help'] = '<p align="center"><strong>Obligatoriska bidrag för att få visa databasen</strong></p>

<p>Det antal obligatoriska bidrag som en deltagare måste skicka in innan han/hon får lov att se några bidrag överhuvudtaget i aktiviteten databas.</p>';
$string['resetsettings'] = 'Filter för återställning';
$string['resettemplate'] = 'Återställ mall';
$string['resizingimages'] = 'Återställer storleken på minibilder';
$string['rows'] = 'Rader';
$string['rssglobaldisabled'] = 'Avaktiverad. Kontrollera hur webbplatsens variabler är inställda.';
$string['rsstemplate'] = 'RSS-mall';
$string['rsstitletemplate'] = 'Mall för titel på RSS';
$string['save'] = 'Spara';
$string['saveandadd'] = 'Spara och lägg till ett annat bidrag';
$string['saveandview'] = 'Spara och visa';
$string['saveaspreset'] = 'Spara som en förinställd mall';
$string['saveaspreset_help'] = '<p align="center"><strong>Spara som en förinställd mall</strong></p>
<p>Detta publicerar den aktuella mallen som en förinställd sådan som vem som helst på webbplatsen kan visa och använda. Den kommer att dyka upp i listan över förinställda mallar. Du kommer att kunna ta bort den när du vill. </p>';
$string['savesettings'] = 'Spara inställningar';
$string['savesuccess'] = 'Detta sparades framgångsrikt. Din förinställda mall kommer nu att vara tillgänglig på hela webbplatsen.';
$string['savetemplate'] = 'Spara mall';
$string['search'] = 'Sök';
$string['selectedrequired'] = 'Alla de valda är obligatoriska';
$string['showall'] = 'Visa alla bidrag';
$string['single'] = 'Visa enskilt bidrag';
$string['singletemplate'] = 'Mall för enskilda bidrag';
$string['subplugintype_datafield'] = 'Fälttyp i databas';
$string['subplugintype_datafield_plural'] = 'Fälttyper i databas';
$string['subplugintype_datapreset'] = 'Förinställning';
$string['subplugintype_datapreset_plural'] = 'Förinställda mallar';
$string['teachersandstudents'] = '{$a->teachers} och  {$a->students}';
$string['templates'] = 'Mallar';
$string['templatesaved'] = 'Mallen har sparats';
$string['text'] = 'Text';
$string['textarea'] = 'Textyta';
$string['timeadded'] = 'Tillagd när';
$string['timemodified'] = 'Modifierad när';
$string['todatabase'] = 'till den här databasen';
$string['type'] = 'Typ av fält';
$string['undefinedprocessactionmethod'] = 'Ingen metod för händelser har definierats i Data_Preset för att hantera händelsen "{$a}".';
$string['unsupportedexport'] = 'Det går inte att exportera ({$a->fieldtype})';
$string['updatefield'] = 'Uppdatera ett befintligt fält';
$string['uploadfile'] = 'Ladda upp fil';
$string['uploadrecords'] = 'Ladda upp bidrag från en fil';
$string['uploadrecords_help'] = 'Det går att ladda upp inlägg via en textfil. Filen bör ha något av följande format:

* Varje rad i filen innehåller en post
* Varje post består av en serie data som sinsemellan är kommaseparerade
* Den första posten innehåller en lista med fältnamn som definierar formatet på resten av filen.

Det som omsluter fältet är ett tecken som omsluter varje fält i varje post. Det går normalt sett att avstå från att ange detta tecken.';
$string['url'] = 'URL';
$string['usedate'] = 'Ta med i sökning';
$string['usestandard'] = 'Använd en förinställd mall';
$string['usestandard_help'] = '<p align="center"><strong>Använd en förinställd mall</strong></p>
<p> Detta använder en mall som är tillgänglig på hela webbplatsen.</p>
<p> Om du dessutom har sparat mallen till en databas med hjälp av \'Spara som förinställd mall\' så kan du ta bort den när du vill.</p>';
$string['viewfromdate'] = 'Möjlig att endast läsa fr.o.m.';
$string['viewtodate'] = 'Möjlig att endast läsa t.o.m.';
$string['wrongdataid'] = 'Det data-id som har angivits är felaktigt';
