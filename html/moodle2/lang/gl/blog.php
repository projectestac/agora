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
 * Strings for component 'blog', language 'gl', branch 'MOODLE_26_STABLE'
 *
 * @package   blog
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addnewentry'] = 'Engadir un novo artigo';
$string['addnewexternalblog'] = 'Rexistrar un blog externo';
$string['assocdescription'] = 'Se está escribindo sobre un curso e/ou módulos de actividade, seleccióneos aquí.';
$string['associated'] = 'Asociado {$a}';
$string['associatewithcourse'] = 'Blog do curso {$a->coursename}';
$string['associatewithmodule'] = 'Blog sobre {$a->modtype}: {$a->modname}';
$string['association'] = 'Asociación';
$string['associations'] = 'Asociacións';
$string['associationunviewable'] = 'Este artigo non pode ser visto por outros ata que se asocie un curso con el ou se cambie o campo «Publicar en»';
$string['autotags'] = 'Engadir estas etiquetas';
$string['autotags_help'] = 'Escriba unha ou máis etiquetas locais (separadas por comas) que queira engadir automaticamente a cada artigo do blog copiado dun blog externo ao seu blog local.';
$string['backupblogshelp'] = 'Se está activada esta opción, os blogs incluiranse nas copias de seguranza automatizadas do SITIO';
$string['blockexternalstitle'] = 'Blogs externos';
$string['blocktitle'] = 'Título de bloque de etiquetas do blog';
$string['blog'] = 'Blog';
$string['blogaboutthis'] = 'Blog sobre {$a->type}';
$string['blogaboutthiscourse'] = 'Engadir un artigo sobre este curso';
$string['blogaboutthismodule'] = 'Engadir un artigo sobre {$a}';
$string['blogadministration'] = 'Administración do blog';
$string['blogdeleteconfirm'] = 'Eliminar este artigo do blog?';
$string['blogdisable'] = 'A publicación en blog está desactivada';
$string['blogentries'] = 'Artigos do blog';
$string['blogentriesabout'] = 'Artigos do blog sobre {$a}';
$string['blogentriesbygroupaboutcourse'] = 'Artigos do blog sobre {$a->course} por {$a->group}';
$string['blogentriesbygroupaboutmodule'] = 'Artigos do blog sobre {$a->mod} por {$a->group}';
$string['blogentriesbyuseraboutcourse'] = 'Artigos do blog sobre {$a->course} por {$a->user}';
$string['blogentriesbyuseraboutmodule'] = 'Artigos do blog sobre {$a->mod} por {$a->user}';
$string['blogentrybyuser'] = 'Artigo do blog por {$a}';
$string['blogpreferences'] = 'Preferencias do blog';
$string['blogs'] = 'Blogs';
$string['blogscourse'] = 'Blogs de curso';
$string['blogssite'] = 'Blogs do sitio';
$string['blogtags'] = 'Etiquetas do blog';
$string['cannotviewcourseblog'] = 'Non ten permisos para ver os blogs deste curso';
$string['cannotviewcourseorgroupblog'] = 'Non ten permisos para ver os blogs deste curso/grupo';
$string['cannotviewsiteblog'] = 'Non ten permisos para ver todos os blogs deste sitio';
$string['cannotviewuserblog'] = 'Non ten permisos para ler os blogs dos usuarios';
$string['configexternalblogcrontime'] = 'Con que frecuencia comproba Moodle os blogs externos para artigos novos.';
$string['configmaxexternalblogsperuser'] = 'Número de blogs externos que se lle permite a cada usuario ligar ao seu blog en Moodle.';
$string['configuseblogassociations'] = 'Activa a asociación dos artigos do blog con cursos e módulos de curso.';
$string['configuseexternalblogs'] = 'Permítelle aos usuarios engadir ligazóns a blogs externos. Moodle comproba regularmente estes blogs, e a seguir copia os artigos novos ao blog local dese usuario.';
$string['courseblog'] = 'Blog do curso: {$a}';
$string['courseblogdisable'] = 'Os blogs de curso están desactivados';
$string['courseblogs'] = 'Os usuarios só poden ver os blogs das persoas que comparten un curso';
$string['deleteblogassociations'] = 'Eliminar as asociacións do blog';
$string['deleteblogassociations_help'] = 'Se marca esta opción, os artigos do blog quedarán desvinculados deste curso ou das actividades ou recursos do curso. Os artigos do blog non serán eliminados.';
$string['deleteexternalblog'] = 'Dar de baixa este blog externo';
$string['deleteotagswarn'] = 'Confirma que quere eliminar estas etiquetas de todas as mensaxes do blog e retiralo do sistema?';
$string['description'] = 'Descrición';
$string['description_help'] = 'Escriba unha frase ou dúas resumindo o contido do seu blog externo. (Se non se fornece ningunha descrición, empregarase a descrición rexistrada no seu blog externo).';
$string['donothaveblog'] = 'Sentímolo, vostede non ten o seu propio blog.';
$string['editentry'] = 'Editar un artigo do blog';
$string['editexternalblog'] = 'Editar este blog externo';
$string['emptybody'] = 'O corpo do artigo do blog non pode estar baleiro';
$string['emptyrssfeed'] = 'O URL introducido non apunta a unha fonte de novas RSS correcta';
$string['emptytitle'] = 'O título do artigo do blog non pode estar baleiro';
$string['emptyurl'] = 'Debe especificar un URL a unha fonte de novas RSS correcto';
$string['entrybody'] = 'Corpo de artigo do blog';
$string['entrybodyonlydesc'] = 'Escriba a descrición';
$string['entryerrornotyours'] = 'Este artigo non é seu';
$string['entrysaved'] = 'Gardouse o seu artigo';
$string['entrytitle'] = 'Título do artigo';
$string['evententryadded'] = 'O artigo foi engadido';
$string['evententrydeleted'] = 'O artigo foi eliminado';
$string['evententryupdated'] = 'O artigo foi actualizado';
$string['externalblogcrontime'] = 'Programa de cron do blog externo';
$string['externalblogdeleteconfirm'] = 'Dar de baixa este blog externo?';
$string['externalblogdeleted'] = 'Blog externo dado de baixa';
$string['externalblogs'] = 'Blogs externos';
$string['feedisinvalid'] = 'Esta fonte de novas non é correcta';
$string['feedisvalid'] = 'Esta fonte de novas é correcta';
$string['filterblogsby'] = 'Filtrar os artigos por...';
$string['filtertags'] = 'Etiquetas de filtro';
$string['filtertags_help'] = 'Pode empregar esta opción para filtrar os artigos que quere usar. Se especifica aquí as etiquetas (separadas por comas), unicamente os artigos con esas etiquetas marcas serán copiados desde o blog externo.';
$string['groupblog'] = 'Blog do grupo: {$a}';
$string['groupblogdisable'] = 'O blog de grupo non está activado';
$string['groupblogentries'] = 'Artigos do blog asociados con {$a->coursename} polo grupo {$a->groupname}';
$string['groupblogs'] = 'Os usuarios só poden ver os blogs das persoas que comparten un grupo';
$string['incorrectblogfilter'] = 'Especificouse un tipo incorrecto de filtro de blog';
$string['intro'] = 'Esta fonte de novas RSS foi xerada a partir dun ou máis blogs.';
$string['invalidgroupid'] = 'ID de grupo incorrecto';
$string['invalidurl'] = 'Non é posíbel acceder ao URL';
$string['linktooriginalentry'] = 'Ligazón ao artigo do blog orixinal';
$string['maxexternalblogsperuser'] = 'Número máximo de blogs externos por usuario';
$string['name'] = 'Nome';
$string['name_help'] = 'Escriba un nome descritivo do seu blog externo. (Se no fornece ningún nome, empregarase o título do seu blog externo).';
$string['noentriesyet'] = 'Aquí non hai ningún artigo visíbel';
$string['noguestpost'] = 'Os convidados non poden enviar blogs';
$string['nopermissionstodeleteentry'] = 'Non ten os permisos necesario para eliminar este artigo do blog';
$string['norighttodeletetag'] = 'Vostede non ten permisos para eliminar esta etiqueta; {$a}';
$string['nosuchentry'] = 'Non existe ese artigo de blog';
$string['notallowedtoedit'] = 'Non está autorizado para editar este artigo';
$string['numberofentries'] = 'Artigos: {$a}';
$string['numberoftags'] = 'Número de etiquetas que presentar';
$string['page-blog-edit'] = 'Páxinas de edición de blog';
$string['page-blog-index'] = 'Páxinas de listado de blog';
$string['page-blog-x'] = 'Todas as páxinas de blog';
$string['pagesize'] = 'Número de artigos de blog por páxina';
$string['permalink'] = 'Ligazón permanente';
$string['personalblogs'] = 'Os usuarios só poden ver o seu propio blog';
$string['preferences'] = 'Preferencias';
$string['publishto'] = 'Publicar en';
$string['publishtocourse'] = 'Usuarios que comparten curso con vostede';
$string['publishtocourseassoc'] = 'Membros do curso asociado';
$string['publishtocourseassocparam'] = 'Membros de {$a}';
$string['publishtogroup'] = 'Usuarios que comparten grupo con vostede';
$string['publishtogroupassoc'] = 'Membros do seu grupo no curso asociado';
$string['publishtogroupassocparam'] = 'Membros do seu grupo en {$a}';
$string['publishto_help'] = 'Hai tres posibilidades:

* Vostede (versión preliminar) - Só vostede e os administradores poden ver este artigo.
* Todos neste sitio - Calquera rexistrado no sitio pode ler este artigo.
* Todo o mundo - Calquera (incluídos os convidados) pode ler este artigo.';
$string['publishtonoone'] = 'Vostede (borrador)';
$string['publishtosite'] = 'Todos neste sitio';
$string['publishtoworld'] = 'Todo o mundo';
$string['readfirst'] = 'Lea isto antes';
$string['relatedblogentries'] = 'Artigos de blog relacionados';
$string['retrievedfrom'] = 'Recuperado de';
$string['rssfeed'] = 'Fonte de novas RSS do blog';
$string['searchterm'] = 'Buscar: {$a}';
$string['settingsupdatederror'] = 'Produciuse un erro: non foi posíbel actualizar o axuste de preferencias do blog';
$string['siteblog'] = 'Blog do sitio: {$a}';
$string['siteblogdisable'] = 'O blog do sitio non está activado';
$string['siteblogs'] = 'Todos os usuarios do sitio poden ver todos os artigos do blog';
$string['tagdatelastused'] = 'Última data empregada na etiqueta';
$string['tagparam'] = 'Etiqueta: {$a}';
$string['tags'] = 'Etiquetas';
$string['tagsort'] = 'Ordenar a presentación de etiquetas por';
$string['tagtext'] = 'Texto de etiqueta';
$string['timefetched'] = 'Hora da última sincronización';
$string['timewithin'] = 'Presentar as etiquetas empregadas dentro destes días';
$string['updateentrywithid'] = 'Actualizando o artigo';
$string['url'] = 'URL da fonte de novas RSS';
$string['url_help'] = 'Escriba o URL da fonte de novas RSS do seu blog externo';
$string['useblogassociations'] = 'Activar as asociacións de blog';
$string['useexternalblogs'] = 'Activar blogs externos';
$string['userblog'] = 'Blog do usuario: {$a}';
$string['userblogentries'] = 'Artigos do blog por {$a}';
$string['valid'] = 'Correcto';
$string['viewallblogentries'] = 'Todos os artigos sobre este {$a}';
$string['viewallmodentries'] = 'Ver todos os artigos sobre este {$a->type}';
$string['viewallmyentries'] = 'Ver todos os meus artigos';
$string['viewblogentries'] = 'Artigos sobre este {$a->type}';
$string['viewblogsfor'] = 'Ver todos os artigos para...';
$string['viewcourseblogs'] = 'Ver todos os artigos deste curso';
$string['viewentriesbyuseraboutcourse'] = 'Ver os artigos sobre este curso por {$a}';
$string['viewgroupblogs'] = 'Ver os artigos para o grupo...';
$string['viewgroupentries'] = 'Artigos do grupo';
$string['viewmodblogs'] = 'Ver os artigos para o módulo...';
$string['viewmodentries'] = 'Artigos do módulo';
$string['viewmyentries'] = 'Os meus artigos';
$string['viewmyentriesaboutcourse'] = 'Ver todos os meus artigos sobre este curso';
$string['viewmyentriesaboutmodule'] = 'Ver todos os meus artigos sobre este {$a}';
$string['viewsiteentries'] = 'Ver todos os artigos';
$string['viewuserentries'] = 'Ver todos os artigos por {$a}';
$string['worldblogs'] = 'Calquera pode ver os artigos entradas definidos como accesíbeis a todo o mundo';
$string['wrongpostid'] = 'ID de mensaxe de blog erróneo';
