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
 * Strings for component 'blog', language 'sv', branch 'MOODLE_26_STABLE'
 *
 * @package   blog
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addnewentry'] = 'Lägg till ett nytt inlägg';
$string['addnewexternalblog'] = 'Registrera en extern blogg';
$string['associated'] = 'Kopplad till {$a}';
$string['associatewithcourse'] = 'Blogg om kurs {$a->coursename}';
$string['associatewithmodule'] = 'Blogg om  {$a->modtype}: {$a->modname}';
$string['association'] = 'Koppling';
$string['associations'] = 'Kopplingar';
$string['associationunviewable'] = 'Det här inlägget kan inte ses av andra förrän en kurs associerats med det eller att \'Publicera till\'-fältet ändrats';
$string['autotags'] = 'Lägg till de här etiketterna';
$string['autotags_help'] = 'Skriv in en eller flera lokala etiketter (separerade med kommatecken) som du vill automatiskt ska läggas till varje blogginlägg som kopieras från den externa bloggen in i din lokala blogg.';
$string['backupblogshelp'] = 'Om detta är aktiverat så kommer bloggar att tas med i automatiska säkerhetskopieringar på webbplatsnivå.';
$string['blockexternalstitle'] = 'Externa bloggar';
$string['blocktitle'] = 'Blockrubrik för bloggetiketter';
$string['blog'] = 'Blogg';
$string['blogaboutthis'] = 'Blogga om det här {$a->type}';
$string['blogaboutthiscourse'] = 'Lägg till ett inlägg om den här kursen';
$string['blogaboutthismodule'] = 'Lägg till ett inlägg om det här  {$a}';
$string['blogadministration'] = 'Administration av blogg';
$string['blogdeleteconfirm'] = 'Ta bort den här bloggen?';
$string['blogdisable'] = 'Bloggande är avaktiverat';
$string['blogentries'] = 'Inlägg i blogg/ar';
$string['blogentriesabout'] = 'Inlägg i blogg/ar om {$a}';
$string['blogentriesbygroupaboutcourse'] = 'Inlägg i blogg/ar om {$a->course} av {$a->group}';
$string['blogentriesbygroupaboutmodule'] = 'Blogginlägg om {$a->mod} av {$a->group}';
$string['blogentriesbyuseraboutcourse'] = 'Blogginlägg om {$a->course} av {$a->user}';
$string['blogentriesbyuseraboutmodule'] = 'Blogginlägg om denna {$a->mod} av {$a->user}';
$string['blogentrybyuser'] = 'Inlägg i blogg av {$a}';
$string['blogpreferences'] = 'Blogginställningar';
$string['blogs'] = 'Bloggar';
$string['blogscourse'] = 'Kursbloggar';
$string['blogssite'] = 'Site bloggar';
$string['blogtags'] = 'Bloggetiketter';
$string['cannotviewcourseblog'] = 'Du har inte behörighet att visa bloggar i denna kurs';
$string['cannotviewcourseorgroupblog'] = 'Du har inte behörighet att visa bloggar i denna kurs/grupp';
$string['cannotviewsiteblog'] = 'Du har inte behörighet att visa alla site-bloggar';
$string['cannotviewuserblog'] = 'Du har inte behörighet att läsa användarnas bloggar';
$string['configexternalblogcrontime'] = 'Hur ofta Moodle kontrollerar de externa bloggar för nya inlägg.';
$string['configmaxexternalblogsperuser'] = 'Antalet externa bloggar varje användare får länka till deras Moodle blogg.';
$string['configuseblogassociations'] = 'Aktiverar associationen mellan blogginlägg och kurser samt kursmoduler.';
$string['configuseexternalblogs'] = 'Möjliggör för användare att ange externa bloggflöden. Moodle kontrollerar regelbundet dessa bloggflöden och kopierar nya poster till den lokala användarens blogg.';
$string['courseblog'] = 'Kursblogg: {$a}';
$string['courseblogdisable'] = 'Kursbloggar är inte aktiverade';
$string['courseblogs'] = 'Användare kan endast se bloggar av kursdeltagare';
$string['deleteblogassociations'] = 'Ta bort kopplingar mellan bloggar';
$string['deleteblogassociations_help'] = 'Om ikryssad så kommer blogginlägg inte längre vara associerade med den här kursen, några kursaktiviteter eller resurser.  Själva blogginläggen kommer inte tas bort.';
$string['deleteexternalblog'] = 'Avregistrera den här externa bloggen';
$string['deleteotagswarn'] = 'Är Du säker på att Du vill ta bort den/de här etiketten/erna från alla inlägg i bloggen och ta bort den/dem från systemet?';
$string['description'] = 'Beskrivning';
$string['description_help'] = 'Skriv in en mening eller två som sammanfattar innehållet i din externa blogg. (Om ingen beskrivning tillhandahålls så kommer beskrivningen från din externa blogg användas).';
$string['donothaveblog'] = 'Du har tyvärr ingen egen blogg.';
$string['editentry'] = 'Redigera ett inlägg i en blogg';
$string['editexternalblog'] = 'Redigera den här externa bloggen';
$string['emptybody'] = 'Brödtexten till ett inlägg i en blogg kan inte vara tom';
$string['emptyrssfeed'] = 'Webbadressen som du angav pekar inte på eyy giltigt RSS-flöde';
$string['emptytitle'] = 'Titeln till en blogg kan inte vara tom';
$string['emptyurl'] = 'Du måste ange en webbadress till ett giltigt RSS-flöde';
$string['entrybody'] = 'Bloggtext';
$string['entrybodyonlydesc'] = 'Beskrivning av inlägg';
$string['entryerrornotyours'] = 'Detta inlägg är inte ditt';
$string['entrysaved'] = 'Ditt inlägg har sparats';
$string['entrytitle'] = 'Titel på inlägg';
$string['evententryupdated'] = 'Inlägget är uppdaterat';
$string['externalblogcrontime'] = 'Cron-schema för extern blogg';
$string['externalblogdeleted'] = 'Ej registrerad extern blogg';
$string['externalblogs'] = 'Externa bloggar';
$string['feedisinvalid'] = 'Det här inflödet är ogiltigt';
$string['feedisvalid'] = 'Det här inflödet är giltigt';
$string['filterblogsby'] = 'Filtera inlägg av...';
$string['filtertags'] = 'Etiketter för filter';
$string['filtertags_help'] = 'Du kan använda den här funktionen för att filtrera inläggen som du vill använda. Om du specificerar etiketter här (separerade med kommatecken) så kommer endast inläggen med dessa etiketter kopieras från den externa bloggen.';
$string['groupblog'] = 'Gruppblogg: {$a}';
$string['groupblogdisable'] = 'Gruppblogg är inte aktiverat';
$string['groupblogs'] = 'Användare kan endast se bloggar av gruppdeltagare';
$string['intro'] = 'Denna RSS genererades automatiskt från en eller flera bloggar';
$string['invalidgroupid'] = 'Ogiltigt gruppID';
$string['invalidurl'] = 'Det går inte att nå den här URLen';
$string['linktooriginalentry'] = 'Länk till ursprungligt inlägg i blogg';
$string['maxexternalblogsperuser'] = 'Maximalt antal externa bloggar per användare';
$string['name'] = 'Namn';
$string['name_help'] = 'Ange ett beskrivande namn för din externa blogg. (Om inget namn anges, kommer titeln på din externa blogg att användas).';
$string['noentriesyet'] = 'Inga synliga inlägg här';
$string['noguestpost'] = 'Gäster kan ej skriva bloggar!';
$string['nopermissionstodeleteentry'] = 'Du saknar behörighet för att ta bort detta blogginlägg';
$string['norighttodeletetag'] = 'Du har inga rättigheter att ta bort denna etikett - {$a}';
$string['nosuchentry'] = 'Inget sådant inlägg i blogg';
$string['notallowedtoedit'] = 'Du är inte tillåten att ändra detta inlägg';
$string['numberofentries'] = 'Inlägg: {$a}';
$string['numberoftags'] = 'Antal etiketter som visas';
$string['page-blog-edit'] = 'Redigeringssidor för bloggar';
$string['page-blog-index'] = 'Sidor med blogglistor';
$string['page-blog-x'] = 'Alla bloggsidor';
$string['pagesize'] = 'Antal inlägg per sida';
$string['permalink'] = 'Permalänk';
$string['personalblogs'] = 'Användare kan endast se deras egen blogg';
$string['preferences'] = 'Preferenser';
$string['publishto'] = 'Publicera för';
$string['publishtocourse'] = 'Användare som delar en kurs med Dig';
$string['publishtocourseassoc'] = 'Deltagare i den kopplade kursen';
$string['publishtocourseassocparam'] = 'Deltagare i {$a}';
$string['publishtogroup'] = 'Användare som delar en grupp med Dig';
$string['publishtogroupassoc'] = 'Dina gruppmedlemmar i den kopplade kursen';
$string['publishtogroupassocparam'] = 'Dina gruppmedlemmar i {$a}';
$string['publishto_help'] = '<p>Det finns tre möjliga inställningar här</p>

<p><b>Dig själv (utkast)</b> - Bara du och administratörer kan se inlägget.</p>

<p><b>Vem som helst på denna webbplats</b> - Alla som är registrerade användare på sajten kan se inlägget.</p>

<p><b>Vem som helst (Även för gäster)</b> - Alla, inklusive gäster, kan se inlägget.</p>';
$string['publishtonoone'] = 'Dig själv (utkast)';
$string['publishtosite'] = 'Vem som helst på denna sajt';
$string['publishtoworld'] = 'Vem som helst (även för gäster)';
$string['readfirst'] = 'Läs detta först';
$string['relatedblogentries'] = 'Relaterade inlägg i bloggar';
$string['retrievedfrom'] = 'Hämtad från';
$string['rssfeed'] = 'RSS-flöde för Blogg';
$string['searchterm'] = 'Sök: {$a}';
$string['settingsupdatederror'] = 'Ett fel har hänt, blogginställningar kunde inte uppdateras';
$string['siteblog'] = 'Sajtblogg: {$a}';
$string['siteblogdisable'] = 'Blogg på webbplatsnivå är inte aktiverad';
$string['siteblogs'] = 'Användare på sajten kan se alla inlägg';
$string['tagdatelastused'] = 'Datum för senaste användning av etikett';
$string['tagparam'] = 'Etikett: {$a}';
$string['tags'] = 'Etiketter';
$string['tagsort'] = 'Sortera etiketter efter';
$string['tagtext'] = 'Etikettnamn';
$string['timefetched'] = 'Tidpunkt för senaste synk';
$string['timewithin'] = 'Visa etiketter som använts inom detta antal dagar';
$string['updateentrywithid'] = 'Uppdaterar inlägg';
$string['url'] = 'URL';
$string['url_help'] = 'Skriv in URLen för RSS inflöde från Din externa blogg.';
$string['useblogassociations'] = 'Aktivera kopplingar mellan bloggar';
$string['useexternalblogs'] = 'Aktivera externa bloggar';
$string['userblog'] = 'Användarblogg: {$a}';
$string['userblogentries'] = 'Inlägg i blogg av {$a}';
$string['valid'] = 'Giltig';
$string['viewallblogentries'] = 'Alla inlägg om detta {$a}';
$string['viewallmodentries'] = 'Visa alla inlägg om detta {$a->type}';
$string['viewallmyentries'] = 'Visa alla mina inlägg';
$string['viewblogentries'] = 'Inlägg om detta {$a}';
$string['viewblogsfor'] = 'Visa alla inlägg för...';
$string['viewcourseblogs'] = 'Visa alla inlägg för den här kursen';
$string['viewentriesbyuseraboutcourse'] = 'Visa inlägg om den här kursen av {$a}';
$string['viewgroupblogs'] = 'Visa inlägg för grupp...';
$string['viewgroupentries'] = 'Gruppinlägg';
$string['viewmodblogs'] = 'Visa inlägg för modul';
$string['viewmodentries'] = 'Inlägg av typ modul';
$string['viewmyentries'] = 'Mina inlägg';
$string['viewmyentriesaboutcourse'] = 'Visa mina inlägg om den här kursen';
$string['viewmyentriesaboutmodule'] = 'Visa mina inlägg om detta {$a}';
$string['viewsiteentries'] = 'Visa alla inlägg ';
$string['viewuserentries'] = 'Visa alla inlägg av {$a}';
$string['worldblogs'] = 'Alla på internet kan läsa inlägg som gjorts tillgängliga för vem som helst';
$string['wrongpostid'] = 'Felaktigt ID för inlägg i blogg';
