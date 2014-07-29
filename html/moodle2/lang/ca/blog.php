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
 * Strings for component 'blog', language 'ca', branch 'MOODLE_26_STABLE'
 *
 * @package   blog
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addnewentry'] = 'Afegeix una nova entrada';
$string['addnewexternalblog'] = 'Registra un blog extern';
$string['assocdescription'] = 'Si esteu escrivint sobre un curs i/o mòduls d\'activitat, seleccioneu-los aquí.';
$string['associated'] = 'Associada {$a}';
$string['associatewithcourse'] = 'Blog sobre el curs {$a->coursename}';
$string['associatewithmodule'] = 'Blog sobre {$a->modtype}: {$a->modname}';
$string['association'] = 'Associació';
$string['associations'] = 'Associacions';
$string['associationunviewable'] = 'Aquesta entrada no podrà ser vista per altres fins que li associeu un curs o que canvieu el camp \'Publica a\'';
$string['autotags'] = 'Afegeix aquestes etiquetes';
$string['autotags_help'] = 'Introduïu una o més etiquetes locals (separades per comes) que vulgueu afegir automàticament a cada entrada del blog copiada des del blog extern, cap al teu blog.';
$string['backupblogshelp'] = 'Si habiliteu aquesta opció els blogs s\'inclouran en les còpies de seguretat automàtiques del lloc.';
$string['blockexternalstitle'] = 'Blogs externs';
$string['blocktitle'] = 'Títol del bloc d\'etiquetes dels blogs';
$string['blog'] = 'Blog';
$string['blogaboutthis'] = 'Blog sobre aquest {$a->type}';
$string['blogaboutthiscourse'] = 'Afegiu una entrada sobre aquest curs';
$string['blogaboutthismodule'] = 'Afegiu una entrada sobre aquest {$a}';
$string['blogadministration'] = 'Administració del blog';
$string['blogdeleteconfirm'] = 'Suprimiu aquesta entrada del blog?';
$string['blogdisable'] = 'Els blogs estan inhabilitats!';
$string['blogentries'] = 'Entrades del blog';
$string['blogentriesabout'] = 'Entrades del blog sobre {$a}';
$string['blogentriesbygroupaboutcourse'] = 'Entrades del blog sobre {$a->course} fetes per {$a->group}';
$string['blogentriesbygroupaboutmodule'] = 'Entrades del blog sobre {$a->mod} fetes per {$a->group}';
$string['blogentriesbyuseraboutcourse'] = 'Entrades del blog sobre {$a->course} fetes per {$a->user}';
$string['blogentriesbyuseraboutmodule'] = 'Entrades del blog sobre {$a->mod} fetes per {$a->user}';
$string['blogentrybyuser'] = 'Entrada del blog feta per {$a}';
$string['blogpreferences'] = 'Preferències del blog';
$string['blogs'] = 'Blogs';
$string['blogscourse'] = 'Blogs del curs';
$string['blogssite'] = 'Blogs del lloc';
$string['blogtags'] = 'Etiquetes del blog';
$string['cannotviewcourseblog'] = 'No teniu permís per a veure blogs en aquest curs';
$string['cannotviewcourseorgroupblog'] = 'No teniu permís per a veure blogs en aquest curs/grup';
$string['cannotviewsiteblog'] = 'No teniu permís per a veure tots els blogs del lloc';
$string['cannotviewuserblog'] = 'No teniu permís per a veure els blogs dels usuaris';
$string['configexternalblogcrontime'] = 'Freqüència en què el Moodle comprova els blogs externs cercant noves entrades';
$string['configmaxexternalblogsperuser'] = 'El nombre de blogs externs que cada usuari té permès d\'enllaçar amb el seu blog del Moodle.';
$string['configuseblogassociations'] = 'Habilita l\'associació d\'entrades del blog amb cursos i mòduls de cursos.';
$string['configuseexternalblogs'] = 'Permet als usuaris especificar agrecacions (feeds) de blogs externs. El Moodle comprova regularment aquestes agregacions i copia les noves entrades al blog local d\'aquell usuari.';
$string['courseblog'] = 'Blog del curs: {$a}';
$string['courseblogdisable'] = 'Els blogs d\'un curs no estan habilitats';
$string['courseblogs'] = 'Els usuaris sols poden veure els blogs de gent que comparteix un curs';
$string['deleteblogassociations'] = 'Esborra associacions de blogs';
$string['deleteblogassociations_help'] = 'Si el marqueu, les entrades del blog no s\'associaran més amb aquest curs ni cap activitat o recurs del curs. Les entrades del blog pròpiament dites no s\'esborraran.';
$string['deleteexternalblog'] = 'Desvincula aquest blog extern';
$string['deleteotagswarn'] = 'Segur que voleu suprimir aquestes etiquetes de totes les entrades del blog i suprimir-les del sistema?';
$string['description'] = 'Descripció';
$string['description_help'] = 'Introduïu una frase o dues que resumeixi els continguts del vostre blog. Si no oferiu cap descripció, s\'usarà la descripció gravada al vostre blog extern.';
$string['donothaveblog'] = 'Disculpeu, però no teniu cap blog personal.';
$string['editentry'] = 'Edita una entrada del blog';
$string['editexternalblog'] = 'Edita aquest blog extern';
$string['emptybody'] = 'No es pot deixar buit el cos d\'una entrada del blog';
$string['emptyrssfeed'] = 'L\'URL que heu introduït no apunta a un canal RSS vàlid';
$string['emptytitle'] = 'No es pot deixar buit el títol d\'una entrada del blog';
$string['emptyurl'] = 'Heu d\'especificar un URL d\'un canal RSS vàlid';
$string['entrybody'] = 'Text de l\'entrada';
$string['entrybodyonlydesc'] = 'Descripció de l\'entrada';
$string['entryerrornotyours'] = 'Aquesta entrada no és vostra';
$string['entrysaved'] = 'S\'ha desat la vostra entrada';
$string['entrytitle'] = 'Títol de l\'entrada';
$string['evententryadded'] = 'S\'ha afegit l\'entrada al blog';
$string['evententrydeleted'] = 'S\'ha suprimida l\'entrada del blog';
$string['evententryupdated'] = 'S\'ha actualitzat aquesta entrada';
$string['externalblogcrontime'] = 'Planificació del cron pels blogs externs';
$string['externalblogdeleteconfirm'] = 'Voleu anul·lar el registre d\'aquest blog extern?';
$string['externalblogdeleted'] = 'El blog extern s\'ha desvinculat';
$string['externalblogs'] = 'Blogs externs';
$string['feedisinvalid'] = 'Aquesta agregació no és vàlida';
$string['feedisvalid'] = 'Aquesta agregació és vàlida';
$string['filterblogsby'] = 'Filtreu entrades per ...';
$string['filtertags'] = 'Filtra etiquetes';
$string['filtertags_help'] = 'Podeu usar aquesta característica per filtrar les entrades que voleu usar. Si especifiqueu etiquetes (separades per comes) aquí, aleshores només es copiaran del blog externales entrades amb aquestes etiquetes.';
$string['groupblog'] = 'Blog del grup: {$a}';
$string['groupblogdisable'] = 'El blog del grup no està habilitat';
$string['groupblogentries'] = 'Entrades del blog associades amb {$a->coursename} del grup {$a->groupname}';
$string['groupblogs'] = 'Usuaris que sols poden veure blogs de gent que comparteix amb un grup';
$string['incorrectblogfilter'] = 'S\'ha especificat un tipus incorrecte de filtre del blog';
$string['intro'] = 'Aquest canal RSS ha estat generat automàticament a partir d\'un o més blogs.';
$string['invalidgroupid'] = 'ID de grup invàlid';
$string['invalidurl'] = 'la URL és inaccessible';
$string['linktooriginalentry'] = 'Enllaça a l\'entrada del blog original';
$string['maxexternalblogsperuser'] = 'Nombre màxim de blogs externs per usuari';
$string['name'] = 'Nom';
$string['name_help'] = 'Introduïu un nom descriptiu del vostre blog extern. Si no s\'especifica cap nom, s\'usarà el títol del vostre blog extern.';
$string['noentriesyet'] = 'Aquí no hi ha entrades visibles';
$string['noguestpost'] = 'Els visitants no poden publicar blogs.';
$string['nopermissionstodeleteentry'] = 'No teniu els permisos adients per esborrar aquesta entrada del blog';
$string['norighttodeletetag'] = 'No teniu drets per a suprimir aquesta etiqueta: {$a}';
$string['nosuchentry'] = 'No existeix tal entrada del blog';
$string['notallowedtoedit'] = 'No teniu permís per a editar aquesta entrada';
$string['numberofentries'] = 'Entrades: {$a}';
$string['numberoftags'] = 'Nombre d\'etiquetes per visualitzar';
$string['page-blog-edit'] = 'Pàgines d\'edició del blog';
$string['page-blog-index'] = 'Pàgina de llistat del blog';
$string['page-blog-x'] = 'Totes les pàgines del blog';
$string['pagesize'] = 'Nombre d\'entrades per pàgina';
$string['permalink'] = 'Enllaç permanent';
$string['personalblogs'] = 'Els usuaris només poden veure el seu propi blog';
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
$string['relatedblogentries'] = 'Entrades del blog relacionades';
$string['retrievedfrom'] = 'Agafada de';
$string['rssfeed'] = 'Sindicació RSS dels blogs';
$string['searchterm'] = 'Cerca: {$a}';
$string['settingsupdatederror'] = 'S\'ha produït un error. El paràmetre no s\'ha pogut actualitzar.';
$string['siteblog'] = 'Blog del lloc: {$a}';
$string['siteblogdisable'] = 'El blog del lloc no està habilitat';
$string['siteblogs'] = 'Tots els usuaris del lloc poden veure totes les entrades dels blogs';
$string['tagdatelastused'] = 'Darrera utilització de l\'etiqueta';
$string['tagparam'] = 'Etiqueta: {$a}';
$string['tags'] = 'Etiquetes';
$string['tagsort'] = 'Ordena la visualització de les etiquetes per';
$string['tagtext'] = 'Text de l\'etiqueta';
$string['timefetched'] = 'Hora de la darrera sincronització';
$string['timewithin'] = 'Mostra etiquetes utilitzades en aquest període';
$string['updateentrywithid'] = 'S\'està actualitzant l\'entrada';
$string['url'] = 'URL de la sindicació RSS';
$string['url_help'] = 'Introduïu l\'URL del canal RSS del vostre blog extern';
$string['useblogassociations'] = 'Habilita les associacions dels blogs';
$string['useexternalblogs'] = 'Habilita els blogs externs';
$string['userblog'] = 'Blog d\'usuari: {$a}';
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
$string['wrongpostid'] = 'L\'ID de l\'entrada del blog és incorrecte';
