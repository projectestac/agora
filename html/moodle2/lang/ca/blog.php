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
 * Strings for component 'blog', language 'ca', branch 'MOODLE_24_STABLE'
 *
 * @package   blog
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addnewentry'] = 'Afegeix una nova entrada';
$string['addnewexternalblog'] = 'Registra una bitàcola externa';
$string['assocdescription'] = 'Si esteu escrivint sobre un curs i/o mòduls d\'activitat, seleccioneu-los aquí.';
$string['associated'] = 'Associada {$a}';
$string['associatewithcourse'] = 'Bitàcola sobre el curs {$a->coursename}';
$string['associatewithmodule'] = 'Bitàcola sobre {$a->modtype}: {$a->modname}';
$string['association'] = 'Associació';
$string['associations'] = 'Associacions';
$string['associationunviewable'] = 'Aquesta entrada no podrà ser vista per altres fins que li associeu un curs o que canvieu el camp \'Publica a\'';
$string['autotags'] = 'Afegeix aquestes etiquetes';
$string['autotags_help'] = 'Introduïu una o més etiquetes locals (separades per comes) que vulgueu afegir automàticament a cada entrada de bitàcola copiada des de la bitàcola externa a la vostra bitàcola.';
$string['backupblogshelp'] = 'Si habiliteu aquesta opció les bitàcoles s\'inclouran en les còpies de seguretat automàtiques del lloc.';
$string['blockexternalstitle'] = 'Bitàcoles externes';
$string['blocktitle'] = 'Títol del bloc d\'etiquetes de bitàcoles';
$string['blog'] = 'Bitàcola';
$string['blogaboutthis'] = 'Bitàcola sobre aquest {$a->type}';
$string['blogaboutthiscourse'] = 'Afegiu una entrada sobre aquest curs';
$string['blogaboutthismodule'] = 'Afegiu una entrada sobre aquest {$a}';
$string['blogadministration'] = 'Administració de la bitàcola';
$string['blogdeleteconfirm'] = 'Suprimiu aquesta entrada de la bitàcola?';
$string['blogdisable'] = 'Les bitàcoles estan inhabilitades!';
$string['blogentries'] = 'Entrades de bitàcola';
$string['blogentriesabout'] = 'Entrades de bitàcola sobre {$a}';
$string['blogentriesbygroupaboutcourse'] = 'Entrades de bitàcola sobre {$a->course} fetes per {$a->group}';
$string['blogentriesbygroupaboutmodule'] = 'Entrades de bitàcola sobre {$a->mod} fetes per {$a->group}';
$string['blogentriesbyuseraboutcourse'] = 'Entrades de bitàcola sobre {$a->course} fetes per {$a->user}';
$string['blogentriesbyuseraboutmodule'] = 'Entrades de bitàcola sobre {$a->mod} fetes per {$a->user}';
$string['blogentrybyuser'] = 'Entrada de bitàcola feta per {$a}';
$string['blogpreferences'] = 'Preferències de la bitàcola';
$string['blogs'] = 'Bitàcoles';
$string['blogscourse'] = 'Bitàcoles de curs';
$string['blogssite'] = 'Bitàcoles del lloc';
$string['blogtags'] = 'Etiquetes de la bitàcola';
$string['cannotviewcourseblog'] = 'No teniu permís per a veure bitàcoles en aquest curs';
$string['cannotviewcourseorgroupblog'] = 'No teniu permís per a veure bitàcoles en aquest curs/grup';
$string['cannotviewsiteblog'] = 'No teniu permís per a veure totes les bitàcoles del lloc';
$string['cannotviewuserblog'] = 'No teniu permís per a veure les bitàcoles dels usuaris';
$string['configexternalblogcrontime'] = 'Freqüència en què el Moodle comprova les bitàcoles externes cercant noves entrades';
$string['configmaxexternalblogsperuser'] = 'El nombre de bitàcoles externes que cada usuari és permès d\'enllaçar amb la seva bitàcola del Moodle.';
$string['configuseblogassociations'] = 'Habilita l\'associació d\'entrades de bitàcola amb cursos i mòduls de cursos.';
$string['configuseexternalblogs'] = 'Permet als usuaris especificar agrecacions (feeds) de bitàcoles externes. El Moodle comprova regularment aquestes agregacions i copia les noves entrades a la bitàcola local d\'aquell usuari.';
$string['courseblog'] = 'Bitàcola de curs: {$a}';
$string['courseblogdisable'] = 'Les bitàcoles del curs no estan habilitades';
$string['courseblogs'] = 'Els usuaris sols poden veure bitàcoles de gent que comparteix un curs';
$string['deleteblogassociations'] = 'Esborra associacions de bitàcoles';
$string['deleteblogassociations_help'] = 'Si el marqueu, les entrades de la bitàcola no s\'associaran més amb aquest curs ni cap activitat o recurs del curs. Les entrades de la bitàcola pròpiament dites no s\'esborraran.';
$string['deleteexternalblog'] = 'Desvincula aquesta bitàcola externa';
$string['deleteotagswarn'] = 'Segur que voleu suprimir aquestes etiquetes de totes les entrades de bitàcola i suprimir-les del sistema?';
$string['description'] = 'Descripció';
$string['description_help'] = 'Introduïu una frase o dues que resumeixi els continguts de la vostra bitàcola externa. Si no oferiu cap descripció, s\'usarà la descripció gravada a la vostra bitàcola externa.';
$string['donothaveblog'] = 'Disculpeu, però no teniu cap bitàcola personal.';
$string['editentry'] = 'Edita una entrada de bitàcola';
$string['editexternalblog'] = 'Edita aquesta bitàcola externa';
$string['emptybody'] = 'No es pot deixar buit el cos d\'una entrada de bitàcola';
$string['emptyrssfeed'] = 'L\'URL que heu introduït no apunta a un canal RSS vàlid';
$string['emptytitle'] = 'No es pot deixar buit el títol d\'una entrada de bitàcola';
$string['emptyurl'] = 'Heu d\'especificar un URL d\'un canal RSS vàlid';
$string['entrybody'] = 'Text de l\'entrada';
$string['entrybodyonlydesc'] = 'Descripció de l\'entrada';
$string['entryerrornotyours'] = 'Aquesta entrada no és vostra';
$string['entrysaved'] = 'S\'ha desat la vostra entrada';
$string['entrytitle'] = 'Títol de l\'entrada';
$string['entryupdated'] = 'S\'ha actualitzat aquesta entrada';
$string['externalblogcrontime'] = 'Planificació del cron per les bitàcoles externes';
$string['externalblogdeleteconfirm'] = 'Voleu anul·lar el registre d\'aquesta bitàcola externa?';
$string['externalblogdeleted'] = 'La bitàcola externa s\'ha desvinculat';
$string['externalblogs'] = 'Bitàcoles externes';
$string['feedisinvalid'] = 'Aquesta agregació no és vàlida';
$string['feedisvalid'] = 'Aquesta agregació és vàlida';
$string['filterblogsby'] = 'Filtreu entrades per ...';
$string['filtertags'] = 'Filtra etiquetes';
$string['filtertags_help'] = 'Podeu usar aquesta característica per filtrar les entrades que voleu usar. Si especifiqueu etiquetes (separades per comes) aquí, aleshores només es copiaran de la bitàcola externa les entrades amb aquestes etiquetes.';
$string['groupblog'] = 'Bitàcola de grup: {$a}';
$string['groupblogdisable'] = 'La bitàcola del grup no està habilitada';
$string['groupblogentries'] = 'Entrades de bitàcola associades amb {$a->coursename} del grup {$a->groupname}';
$string['groupblogs'] = 'Usuaris que sols poden veure bitàcoles de gent que comparteix amb un grup';
$string['incorrectblogfilter'] = 'S\'ha especificat un tipus incorrecte de filtre de bitàcola';
$string['intro'] = 'Aquest canal RSS ha estat generat automàticament a partir d\'una o més bitàcoles.';
$string['invalidgroupid'] = 'ID de grup invàlid';
$string['invalidurl'] = 'la URL és inaccessible';
$string['linktooriginalentry'] = 'Enllaça a l\'entrada de bitàcola original';
$string['maxexternalblogsperuser'] = 'Nombre màxim de bitàcoles externes per usuari';
$string['mustassociatecourse'] = 'Si esteu publicant a un curs o a un grup de membres, cal que associeu un curs amb aquesta entrada';
$string['name'] = 'Nom';
$string['name_help'] = 'Introduïu un nom descriptiu de la vostra bitàcola externa. Si no s\'especifica cap nom, s\'usarà el títol de la vostra bitàcola externa.';
$string['noentriesyet'] = 'Aquí no hi ha entrades visibles';
$string['noguestpost'] = 'Els visitants no poden publicar bitàcoles.';
$string['nopermissionstodeleteentry'] = 'No teniu els permisos adients per esborrar aquesta entrada de bitàcola';
$string['norighttodeletetag'] = 'No teniu drets per a suprimir aquesta etiqueta: {$a}';
$string['nosuchentry'] = 'No existeix tal entrada de bitàcola';
$string['notallowedtoedit'] = 'No teniu permís per a editar aquesta entrada';
$string['numberofentries'] = 'Entrades: {$a}';
$string['numberoftags'] = 'Nombre d\'etiquetes per visualitzar';
$string['page-blog-edit'] = 'Pàgines d\'edició de la bitàcola';
$string['page-blog-index'] = 'Pàgina de llistat de bitàcoles';
$string['page-blog-x'] = 'Totes les pàgines de les bitàcoles';
$string['pagesize'] = 'Nombre d\'entrades per pàgina';
$string['permalink'] = 'Enllaç permanent';
$string['personalblogs'] = 'Els usuaris només poden veure la seva pròpia bitàcola';
$string['preferences'] = 'Preferències';
$string['publishto'] = 'Publica per a';
$string['publishtocourse'] = 'Usuaris que comparteixen un curs amb vosté';
$string['publishtocourseassoc'] = 'Membres del curs associat';
$string['publishtocourseassocparam'] = 'Membres de {$a}';
$string['publishtogroup'] = 'Usuaris que comparteixen un grup amb vosté';
$string['publishtogroupassoc'] = 'El vostre grup de membres al curs associat';
$string['publishtogroupassocparam'] = 'El vostre grup de membres a {$a}';
$string['publishto_help'] = '<p>Aquí hi ha tres opcions possibles.</p>

<p><b>Privat (esborrany)</b>: aquest apunt només podran veure\'l l\'autor/a i els administradors.</p>

<p><b>Usuaris del lloc</b>: aquest apunt podran llegir-lo tots els usuaris que tinguin un compte en aquest lloc.</p>

<p><b>Tothom</b>: tothom, inclosos els usuaris visitants, podran llegir aquest apunt.</p>';
$string['publishtonoone'] = 'Privat (esborrany)';
$string['publishtosite'] = 'Usuaris del lloc';
$string['publishtoworld'] = 'Tothom';
$string['readfirst'] = 'Llegiu això primer';
$string['relatedblogentries'] = 'Entrades de bitàcola relacionades';
$string['retrievedfrom'] = 'Agafada de';
$string['rssfeed'] = 'Sindicació RSS de les bitàcoles';
$string['searchterm'] = 'Cerca: {$a}';
$string['settingsupdatederror'] = 'S\'ha produït un error. El paràmetre no s\'ha pogut actualitzar.';
$string['siteblog'] = 'Bitàcola del lloc: {$a}';
$string['siteblogdisable'] = 'La bitàcola del lloc no està habilitada';
$string['siteblogs'] = 'Tots els usuaris del lloc poden veure totes les entrades de bitàcoles';
$string['tagdatelastused'] = 'Darrera utilització de l\'etiqueta';
$string['tagparam'] = 'Etiqueta: {$a}';
$string['tags'] = 'Etiquetes';
$string['tagsort'] = 'Ordena la visualització de les etiquetes per';
$string['tagtext'] = 'Text de l\'etiqueta';
$string['timefetched'] = 'Hora de la darrera sincronització';
$string['timewithin'] = 'Mostra etiquetes utilitzades en aquest període';
$string['updateentrywithid'] = 'S\'està actualitzant l\'entrada';
$string['url'] = 'URL de la sindicació RSS';
$string['url_help'] = 'Introduïu l\'URL del canal RSS de la vostra bitàcola externa.';
$string['useblogassociations'] = 'Habilita les associacions de bitàcoles';
$string['useexternalblogs'] = 'Habilita les bitàcoles externes';
$string['userblog'] = 'Bitàcola d\'usuari: {$a}';
$string['userblogentries'] = 'Entrades del bloc de {$a}';
$string['valid'] = 'Vàlida';
$string['viewallblogentries'] = 'Totes les entrades sobre aquest {$a}';
$string['viewallmodentries'] = 'Mostra totes les entrades sobre aquest {$a->type}';
$string['viewallmyentries'] = 'Mostra totes les meves entrades';
$string['viewblogentries'] = 'Entrades sobre aquest {$a->type}';
$string['viewblogsfor'] = 'Visualitza totes les entrades per ...';
$string['viewcourseblogs'] = 'Mostra totes les entrades per aquest curs';
$string['viewentriesbyuseraboutcourse'] = 'Mostra les meves entrades sobre aquest curs per {$a}';
$string['viewgroupblogs'] = 'Visualitza les entrades per al grup...';
$string['viewgroupentries'] = 'Entrades del grup';
$string['viewmodblogs'] = 'Visualitza entrades per al mòdul...';
$string['viewmodentries'] = 'Entrades del mòdul';
$string['viewmyentries'] = 'Les meves entrades';
$string['viewmyentriesaboutcourse'] = 'Mostra les meves entrades sobre aquest curs';
$string['viewmyentriesaboutmodule'] = 'Mostra les meves entrades sobre aquest {$a}';
$string['viewsiteentries'] = 'Mostra totes les entrades';
$string['viewuserentries'] = 'Mostra totes les entrades per {$a}';
$string['worldblogs'] = 'El món pot llegir les entrades marcades com a accessibles globalment';
$string['wrongpostid'] = 'L\'ID de l\'entrada de la bitàcola és incorrecte';
