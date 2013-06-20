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
 * Strings for component 'blog', language 'nl', branch 'MOODLE_24_STABLE'
 *
 * @package   blog
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addnewentry'] = 'Voeg een nieuw item toe';
$string['addnewexternalblog'] = 'Registreer een externe blog';
$string['assocdescription'] = 'Als je schrijft over een cursus en/of activiteitsmodule, selecteer die dan hier';
$string['associated'] = 'Geassocieerd {$a}';
$string['associatewithcourse'] = 'Blog over cursus {$a->coursename}';
$string['associatewithmodule'] = 'Blog over {$a->modtype}: {$a->modname}';
$string['association'] = 'Associatie';
$string['associations'] = 'Associaties';
$string['associationunviewable'] = 'Dit item kan niet door anderen bekeken worden tot er een cursus mee geassocieerd is of tot het \'Publiceer naar\'-veld gewijzigd is';
$string['autotags'] = 'Voeg deze tags toe';
$string['autotags_help'] = 'Geef één of meer lokale tags in (gescheiden door komma\'s) die je automatisch wil toevoegen aan elk blogitem dat van de externe blog naar je lokale blog gekopieëerd wordt.';
$string['backupblogshelp'] = 'Als dit ingeschakeld is, dan zullen blogs in de automatische site-back-ups opgenomen worden';
$string['blockexternalstitle'] = 'Externe blogs';
$string['blocktitle'] = 'Bloktitel voor blogtags';
$string['blog'] = 'Blog';
$string['blogaboutthis'] = 'Blog over deze {$a->type}';
$string['blogaboutthiscourse'] = 'Voeg een item toe over deze cursus';
$string['blogaboutthismodule'] = 'Voeg een item toe over dit {$a}';
$string['blogadministration'] = 'Blogbeheer';
$string['blogdeleteconfirm'] = 'Dit blog-item verwijderen?';
$string['blogdisable'] = 'Bloggen is uitgeschakeld';
$string['blogentries'] = 'Blogitems';
$string['blogentriesabout'] = 'Blogitems over {$a}';
$string['blogentriesbygroupaboutcourse'] = 'Blogitems over {$a->course} door {$a->group}';
$string['blogentriesbygroupaboutmodule'] = 'Blogitems over {$a->mod} door {$a->group}';
$string['blogentriesbyuseraboutcourse'] = 'Blogitems over {$a->course} door {$a->user}';
$string['blogentriesbyuseraboutmodule'] = 'Blogitems over deze {$a->mod} door {$a->user}';
$string['blogentrybyuser'] = 'Blogitem door {$a}';
$string['blogpreferences'] = 'Blog voorkeuren';
$string['blogs'] = 'Blogs';
$string['blogscourse'] = 'Cursus blogs';
$string['blogssite'] = 'Site blogs';
$string['blogtags'] = 'Blogtags';
$string['cannotviewcourseblog'] = 'Je hebt niet de juiste rechten om blog in deze cursus te zien.';
$string['cannotviewcourseorgroupblog'] = 'Je hebt niet de juiste rechten om blog in deze cursus/groep te zien.';
$string['cannotviewsiteblog'] = 'Je hebt niet de juiste rechten om alle site-blogs te zien.';
$string['cannotviewuserblog'] = 'Je hebt niet de juiste rechten om gebruikersblogs te lezen.';
$string['configexternalblogcrontime'] = 'Hoe vaak Moodle de externe blogs moet controleren voor nieuwe items.';
$string['configmaxexternalblogsperuser'] = 'Het aantal externe blogs dat elke gebruiker mag linken aan zijn Moodle blog.';
$string['configuseblogassociations'] = 'Schakelt de associatie in van blogitems met cursussen en cursusmodules';
$string['configuseexternalblogs'] = 'Maakt het mogelijk voor gebruikers om externe blogs op te geven. Moodle controleert regelmatig deze blogs en kopieert nieuwe items naar de lokale blog van die gebruiker.';
$string['courseblog'] = 'Cursusblog: {$a}';
$string['courseblogdisable'] = 'Cursusblogs zijn niet ingeschakeld';
$string['courseblogs'] = 'Gebruikers kunnen enkel blogs zien van andere gebruikers van de cursus';
$string['deleteblogassociations'] = 'Verwijder blogassociaties';
$string['deleteblogassociations_help'] = 'Indien geselecteerd zullen blogitems niet langer geassocieerd zijn met deze cursus of met gelijk welke cursusactiviteit of bron. De blogitems zelf worden niet verwijderd.';
$string['deleteexternalblog'] = 'Verwijder de registratie van een externe blog';
$string['deleteotagswarn'] = 'Weet je zeker dat je deze tag(s) wil verwijderen uit alle geposte blogs en dat je ze wil verwijderen uit het systeem?';
$string['description'] = 'Beschrijving';
$string['description_help'] = 'Geef enkele zinnen waarmee je de inhoud van je externe blog samenvat. (als je geen beschrijving geeft, dan zal de beschrijving die in je externe blog is gegeven, gebruikt worden).';
$string['donothaveblog'] = 'Je hebt geen blog.';
$string['editentry'] = 'Bewerk een blogitem';
$string['editexternalblog'] = 'Bewerk deze externe blog';
$string['emptybody'] = 'Het tekstveld van een blog mag niet leeg zijn';
$string['emptyrssfeed'] = 'De URL die je opgeeft verwijst niet naar een geldige RSS-feed';
$string['emptytitle'] = 'De titel van een blog mag niet leeg zijn';
$string['emptyurl'] = 'Je moet een URL naar een geldige RSS-feed opgeven';
$string['entrybody'] = 'Blog tekstveld';
$string['entrybodyonlydesc'] = 'Beschrijving van deze tekst';
$string['entryerrornotyours'] = 'Deze tekst is niet van jouw';
$string['entrysaved'] = 'Je tekst is bewaard';
$string['entrytitle'] = 'Titel van deze tekst';
$string['entryupdated'] = 'Blog aangepast';
$string['externalblogcrontime'] = 'Externe blog cron planning';
$string['externalblogdeleteconfirm'] = 'Registratie van externe blog verwijderen?';
$string['externalblogdeleted'] = 'Registratie van externe blog verwijderd';
$string['externalblogs'] = 'Externe blogs';
$string['feedisinvalid'] = 'Deze feed is niet geldig';
$string['feedisvalid'] = 'Deze feed is geldig';
$string['filterblogsby'] = 'Filter items per...';
$string['filtertags'] = 'Filter tags';
$string['filtertags_help'] = 'Je kunt deze mogelijkheid gebruiken om items te die je wil gebruiken te filteren. als je tags hier opgeeft (gescheiden door komma\'s) dan zullen enkel die items met deze tags van de externe naar de lokale blog gekopieerd worden.';
$string['groupblog'] = 'Groepblog: {$a}';
$string['groupblogdisable'] = 'Groepblog is niet ingeschakeld';
$string['groupblogentries'] = 'Blogitems geassocieerd met {$a->coursename} door groep {$a->groupname}';
$string['groupblogs'] = 'Gebruikers kunnen enkel blogs zien van groepsleden';
$string['incorrectblogfilter'] = 'Fout blog filtertype ingeschakeld';
$string['intro'] = 'Deze RSS-feed is automatisch gegenereerd uit één of meer blogs';
$string['invalidgroupid'] = 'Ongeldig groep-ID';
$string['invalidurl'] = 'Deze URL is onbereikbaar';
$string['linktooriginalentry'] = 'Link naar het originele blogitem';
$string['maxexternalblogsperuser'] = 'Maximale aantal externe blogs per gebruiker';
$string['mustassociatecourse'] = 'Als je publiceert naar cursus- of groepsleden, dan moet je een cursus met dit item associëren';
$string['name'] = 'Naam';
$string['name_help'] = 'Geef een beschrijvende naam voor je extene blog. (Als je geen naam opgeeft, zal de titel van je externe blog gebruikt worden).';
$string['noentriesyet'] = 'Hier zijn geen zichtbare teksten';
$string['noguestpost'] = 'Gasten kunnen geen blogs posten';
$string['nopermissionstodeleteentry'] = 'Je hebt het recht niet om dit blogitem te verwijderen';
$string['norighttodeletetag'] = 'Je mag deze blogtag niet verwijderen - {$a}';
$string['nosuchentry'] = 'Dit blog-item niet gevonden';
$string['notallowedtoedit'] = 'Je mag deze tekst niet bewerken';
$string['numberofentries'] = 'Teksten: {$a}';
$string['numberoftags'] = 'Aantal te tonen tags';
$string['page-blog-edit'] = 'Blog bewerk pagina\'s';
$string['page-blog-index'] = 'Blog lijstpagina\'s';
$string['page-blog-x'] = 'Alle blogpagina\'s';
$string['pagesize'] = 'Aantal blogberichten per pagina';
$string['permalink'] = 'Permanente link';
$string['personalblogs'] = 'Gebruikers kunnen enkel hun eigen blogs zien';
$string['preferences'] = 'Voorkeuren';
$string['publishto'] = 'Publiceer naar';
$string['publishtocourse'] = 'Gebruikers die een cursus met je delen';
$string['publishtocourseassoc'] = 'Leden van de geassocieerde cursus';
$string['publishtocourseassocparam'] = 'Leden van {$a}';
$string['publishtogroup'] = 'Gebruikers die een groep met jou delen';
$string['publishtogroupassoc'] = 'Jouw groepsleden in de geassocieerde cursus';
$string['publishtogroupassocparam'] = 'Jouw groepsleden in {$a}';
$string['publishto_help'] = 'Er zijn 3 opties

* Jezelf (klad) - Enkel jij en de beheerders kunnen dit item zien
* Iedereen op deze site - Iedreen die geregistreerd si op deze site kan dit blogbericht lezen
* Iedereen ter wereld - Iedereen, gasten ook, kunnen dit blogbericht lezen';
$string['publishtonoone'] = 'jezelf (klad)';
$string['publishtosite'] = 'iedereen op deze site';
$string['publishtoworld'] = 'de hele wereld';
$string['readfirst'] = 'Lees dit eerst';
$string['relatedblogentries'] = 'Verwante blogitems';
$string['retrievedfrom'] = 'Verkregen van';
$string['rssfeed'] = 'Blog RSS-feed';
$string['searchterm'] = 'Zoek: {$a}';
$string['settingsupdatederror'] = 'Er is een fout gebeurt: de voorkeursinstellingen voor deze blog konden niet aangepast worden';
$string['siteblog'] = 'Siteblog: {$a}';
$string['siteblogdisable'] = 'Site blog is niet ingeschakeld';
$string['siteblogs'] = 'Alle site-gebruikers kunnen alle blogs zien';
$string['tagdatelastused'] = 'Laatst gebruiker datumtag';
$string['tagparam'] = 'Tag: {$a}';
$string['tags'] = 'Tags';
$string['tagsort'] = 'Sorteer het tonen van tags op';
$string['tagtext'] = 'Tag tekst';
$string['timefetched'] = 'Laatste synchronisatiemoment';
$string['timewithin'] = 'Toon tags gebruikt binnen zoveel dagen';
$string['updateentrywithid'] = 'Tekst aanpassen';
$string['url'] = 'RSS-feed URL';
$string['url_help'] = 'Geef de RSS-feed URL voor je externe blog';
$string['useblogassociations'] = 'Blogassociaties inschakelen';
$string['useexternalblogs'] = 'Externe blogs inschakelen';
$string['userblog'] = 'Gebruikersblog: {$a}';
$string['userblogentries'] = 'Blogitems door {$a}';
$string['valid'] = 'Geldig';
$string['viewallblogentries'] = 'Alle items over dit {$a}';
$string['viewallmodentries'] = 'Bekijk alle items over dit {$a->type}';
$string['viewallmyentries'] = 'Bekijk al mijn blogitems';
$string['viewblogentries'] = 'Items over dit {$a->type}';
$string['viewblogsfor'] = 'Bekijk alle items voor ...';
$string['viewcourseblogs'] = 'Bekijk alle items voor deze cursus';
$string['viewentriesbyuseraboutcourse'] = 'Bekijk items over deze cursus door {$a}';
$string['viewgroupblogs'] = 'Bekijk items voor groep...';
$string['viewgroupentries'] = 'Groepitems';
$string['viewmodblogs'] = 'Bekijk items voor module...';
$string['viewmodentries'] = 'Moduleitems';
$string['viewmyentries'] = 'Bekijk mijn eigen blogs';
$string['viewmyentriesaboutcourse'] = 'Bekijk mijn items over deze cursus';
$string['viewmyentriesaboutmodule'] = 'Bekijk mijn items over dit {$a}';
$string['viewsiteentries'] = 'Bekijk de blogs van de site';
$string['viewuserentries'] = 'Bekijk alle items door {$a}';
$string['worldblogs'] = 'Blog-items die als Wereldtoegankelijk aangeduid zijn, kunnen door alle internetgebruikers gelezen worden';
$string['wrongpostid'] = 'Fout blog post ID';
