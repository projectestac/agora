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
 * Strings for component 'url', language 'sv', branch 'MOODLE_26_STABLE'
 *
 * @package   url
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['chooseavariable'] = 'Välj en variabel...';
$string['clicktoopen'] = 'Klicka på {$a} för att öppna resurs';
$string['configdisplayoptions'] = 'Välj alla alternativ som bör vara tillgängliga, gällande inställningar modifieras inte. Håll ner CTRL tangenten för att välja flera fält åt gången.';
$string['configframesize'] = 'När en webbsida eller en uppladdad fil visas i en inbäddad ram, är detta värde höjden (i pixlar) för toppramen (som innehåller navigationen).';
$string['configrolesinparams'] = 'Aktivera om du vill inkludera lokalanpassade namn för roller i listan över tillgängliga parametervariabler.';
$string['configsecretphrase'] = 'Den hemliga frasen änvänds för att skapa krypterad kod som kan skickas till vissa servrar som en parameter. Den krypterade koden skapas med ett md5 värde för nuvarande användares IP adress sammanfogad med din hemliga fras. Exvis kod = md5(IP.hemligfras). Notera att detta är inte pålitligt på grund av att IP adress kan ändras och delas ofta av olika datorer.';
$string['contentheader'] = 'Innehåll';
$string['createurl'] = 'Skapa en webbadress';
$string['displayoptions'] = 'Tillgängliga alternativ för visning';
$string['displayselect'] = 'Visa';
$string['displayselectexplain'] = 'Välj visningstyp, tyvärr är inte alla typer lämpliga för alla URL:er.';
$string['displayselect_help'] = 'DEnna inställning, tillsammans med URL filtyp samt om webbläsaren tillåter inbäddning, avgör hur URL:en visas. Alternativen kan inkludera:

* Automatisk - Det bästa visningsalternativet för URL:en väljs automatiskt
* Bädda in - URL:en visa på sidan nedanför navigeringsmenyn tillsammans med URL beskrivningen och eventuella block
* Tvinga nedladdning - Användaren uppmanas att ladda ner URL:ens fil
* Öppna - Bara URL:ens mål visas i webbläsarfönstret
* I popup - URL:en visas i ett nytt webbläsarfönster utan menyer eller adressrad
* I ram - URL:en visas i en ram nedanför navigationsmenyn och URL beskrivningen
* Nytt fönster - URL:en visas i ett nytt webbläsarfönster med menyer och adressrad';
$string['externalurl'] = 'Extern URL';
$string['framesize'] = 'Höjd på ram';
$string['invalidstoredurl'] = 'Kan inte visa denna resurs, URL är felaktig';
$string['invalidurl'] = 'Inmatad URL är felaktig';
$string['modulename'] = 'URL';
$string['modulename_help'] = 'Med URL-(uniform resource locater) eller webbadress-modulen kan en lärare skapa en en webblänk som en kursresurs.

Allt som är fritt tillgängliga på nätet, såsom dokument eller bilder, kan länkas. URL/webbadressen behöver inte vara startsidan på en webbplats. Webbadressen till önskat webbsida kan kopieras och klistras eller en lärare kan använda "filepicker" och välja en länk från ett arkiv som Flickr, YouTube eller Wikimedia (beroende på vilka förråd är aktiverade för webbplatsen).

Det finns ett antal visningsalternativ för URL, till exempel "inbäddad" eller "öppna i ett nytt fönster".

Det finns även avancerade inställningsalternativ som gör det möjligt att definiera informationsöverföring till webbadressen (t.ex. elevs namn) om det behövs eller önskas.

Observera att URL/webbadresser även kan läggas till andra resurser eller aktiviteter genom att använda sig av textredigeraren i respektive element.';
$string['modulenameplural'] = 'URLer';
$string['neverseen'] = 'Aldrig visad';
$string['page-mod-url-x'] = 'Valfri URL modulsida';
$string['parameterinfo'] = 'parameter=variabel';
$string['parametersheader'] = 'Parametrar';
$string['parametersheader_help'] = 'Vissa interna Moodlevariabler kan bli automatiskt bifogade till URL:en. Skriv ditt namn för parametern i varje textruta(or) och välj sedan den nödvändiga matchande variabeln.';
$string['pluginadministration'] = 'Administration av modulen URL';
$string['pluginname'] = 'URL';
$string['popupheight'] = 'Höjd på popup-fönster (i pixlar)';
$string['popupheightexplain'] = 'Anger standardhöjden på popup-fönster';
$string['popupwidth'] = 'Bredd på popup-fönster (i pixlar)';
$string['popupwidthexplain'] = 'Anger standardbredden på popup-fönster';
$string['printintro'] = 'Visa beskrivning för URL';
$string['printintroexplain'] = 'Visa URL beskrivning nedanför innehållet? Vissa visningstyper kanske inte visas beskrivningen även om detta är valt.';
$string['rolesinparams'] = 'Ta med namn på roller i parametrar';
$string['serverurl'] = 'URL till server';
$string['url:addinstance'] = 'Lägg till en ny URL/webbadress';
$string['url:view'] = 'Visa URL';
