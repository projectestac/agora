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
 * Strings for component 'block_course_overview_campus', language 'ca', branch 'MOODLE_26_STABLE'
 *
 * @package   block_course_overview_campus
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['academicyear_desc'] = 'Any acadèmic (el calendari anual no està dividit)';
$string['all'] = 'Tots';
$string['appearancesettingheading'] = 'Aparença';
$string['blocktitle'] = 'Títol del bloc';
$string['blocktitle_desc'] = 'Aquest nom de pantalla es mostra com el títol del bloc';
$string['category'] = 'Categoria';
$string['categorycoursefilter'] = 'Activa filtre de categoria';
$string['categorycoursefilter_desc'] = 'Permet als usuaris filtrar cursos per categoria';
$string['categorycoursefilterdisplayname'] = 'Pren el nom de pantalla com a filtre de categoria';
$string['categorycoursefilterdisplayname_desc'] = 'Aquest nom de pantalla es mostra per sobre del filtre de categoria <br /> <em>Aquesta funció només es processa quan s\'activa el filtre de categoria</em>';
$string['categorycoursefiltersettingheading'] = 'Filtre de categoria: Activació del filtre';
$string['coursenewsdefault'] = 'Oculta les notícies del curs per defecte';
$string['coursenewsdefault_desc'] = 'Si està habilitat, les notícies del curs estan ocultes per defecte per evitar les llistes de cursos enutjoses. Si està desactivat, les notícies del curs es mostren / s\'expandeixen per defecte per captar l\'atenció dels usuaris. Des que un usuari opta per ocultar / mostrar les notícies d\'un curs, aquesta configuració deixa de ser operativa per a aquest curs <br /> <em>Aquesta funció només es processa quan s\'activen les notícies del curs</em>';
$string['coursenewsheading'] = 'Notícies del curs';
$string['course_overview_campus:addinstance'] = 'Afegeix un nou bloc Llista dels cursos del campus\'';
$string['course_overview_campus:myaddinstance'] = 'Afegeix un nou bloc Llista dels cursos del campus a La meva pàgina inicial';
$string['defaultterm'] = 'Utilitza el terme per defecte';
$string['defaultterm_desc'] = 'Si la persona usuària no ha seleccionat un període per filtrar períodes, el període és escollit per ella. La primera tria és el període actual. Si la persona usuària no està inscrita a cap dels cursos del període actual, l\'anterior més proper és l\'escollit.<br /><em> Aquesta funció només es processa quan el filtre periode està activat.';
$string['enablecoursenews'] = 'Habilita les notícies del curs';
$string['enablecoursenews_desc'] = 'Habilita les notícies del curs a continuació del nom del curs a la llista de cursos si hi hagués notícies al curs.';
$string['firstrowcoursename'] = 'Primera fila: Estil del nom del curs';
$string['firstrowcoursename_desc'] = 'Mostra el nom complet del curs o el nom curt del curs a la primera fila de l\'entrada de llista de resum del curs';
$string['hiddencourses'] = 'Cursos ocults';
$string['hidecourse'] = 'Oculta curs';
$string['hidenews'] = 'Oculta les notícies del curs';
$string['listentriessettingheading'] = 'Entrades de la llista general del curs';
$string['managehiddencourses'] = 'Gestiona cursos ocults';
$string['mergehomonymouscategories'] = 'Combina categories homònimes';
$string['mergehomonymouscategories_desc'] = 'Si hi ha diverses categories en diferents categories mare, però amb el mateix nom, el filtre de categoria s\'emplenarà amb múltiples categories amb el mateix nom per defecte. Això pot ser confús per a l\'usuari. Si voleu combinar totes les categories homònimes en una categoria quan s\'utilitza el filtre de categories, activeu aquest paràmetre <br /> <em>Aquesta funció només es processa quan s\'activa el filtre de categoria</em>';
$string['mergehomonymouscategoriessettingheading'] = 'Filtre categoria: Combina categories homònimes';
$string['nocourses'] = 'Actualment, no esteu inscrit/a en cap curs.';
$string['noteacher'] = 'No hi ha professorat incrit.';
$string['noteachertext'] = 'Text No hi ha professorat inscrit';
$string['noteachertext_desc'] = 'Aquest text es mostra en comptes dels noms del professorat si no n\'hi ha d\'inscrit al curs. Si no voleu que aparegui un text de marcador de posició, simplement esborreu aquest text aquí <br /> <em>Aquesta funció només es processa quan s\'activa mostra el nom del professor/a</em>';
$string['ordersettingheading'] = 'Ordre de la llista general de cursos';
$string['other'] = 'Altres';
$string['pluginname'] = 'Resum de cursos al campus';
$string['prioritizemyteachedcourses'] = 'Dóna prioritat als cursos on jo ensenyo';
$string['prioritizemyteachedcourses_desc'] = 'Els cursos en què la persona usuària té un paper docent es mostren primer a la llista de resum de cursos';
$string['secondrowshowcategoryname'] = 'Segona fila: Mostra el nom de la categoria';
$string['secondrowshowcategoryname_desc'] = 'Mostra el nom de la categoria del curs en una segona fila de l\'entrada de llista de resum de cursos';
$string['secondrowshowshortname'] = 'Segona fila: Mostra\'n nom curt';
$string['secondrowshowshortname_desc'] = 'Mostra el nom curt del curs en una segona fila de l\'entrada de llista de resum de cursos';
$string['secondrowshowteachername'] = 'Segona fila: Mostra el nom del professorat';
$string['secondrowshowteachername_desc'] = 'Mostra el nom (s) del professor/a en una segona fila de l\'entrada de llista resum de cursos';
$string['secondrowshowtermname'] = 'Segona fila: Mostra el nom del període';
$string['secondrowshowtermname_desc'] = 'Mostra el nom del període del curs en una segona fila de l\'entrada de llista de resum de cursos';
$string['semester_desc'] = 'Semestre (el calendari anual es divideix en dos períodes)';
$string['showcourse'] = 'Mostra el curs';
$string['shownews'] = 'Mostra les notícies del curs';
$string['skipcoursenews'] = 'Omet les notícies del curs';
$string['skipcoursenews_desc'] = 'En recollir i mostrar les notícies del curs, les notícies de les activitats seleccionades s\'ometran <br /> <em>Aquesta funció només es processa quan està activada l\'opció notícies del curs</em>';
$string['stopmanaginghiddencourses'] = 'Aturar la gestió dels cursos ocults.';
$string['submitfilter'] = 'Filtrar els meus cursos!';
$string['teachercoursefilter'] = 'Activa el filtre de professorat';
$string['teachercoursefilter_desc'] = 'Permet que les persones usuàries filtrin cursos per professorat';
$string['teachercoursefilterdisplayname'] = 'Mostra el nom del filtre de professorat';
$string['teachercoursefilterdisplayname_desc'] = 'Aquest nom es mostra per sobre del filtre professorat <br /> <em>Aquesta funció només es processa quan s\'activa el filtre professorat</em>';
$string['teachercoursefiltersettingheading'] = 'Filtre professorat: Filtre d\'activació';
$string['teacherroles'] = 'Els rols del professorat';
$string['teacherroles_desc'] = 'Definiu els rols que aquest connector ha de gestionar com els rols del professorat <br /> <em>Aquesta funció només es processa quan s\'activa mostra el nom del professorat o quan s\'activa el filtre professorat o quan s\'activa la priorització de cursos en què jo ensenyo</em>';
$string['teacherrolessettingheading'] = 'Els rols del professorat';
$string['term'] = 'Període';
$string['term1'] = 'Període 1';
$string['term1name'] = 'Nom del període 1';
$string['term1name_desc'] = 'Nom descriptiu per al període 1, si us plau, canvieu-ne el nom d\'acord amb la terminologia del vostre campus (o deixeu en blanc si voleu utilitzar només números anuals en mode d\'any acadèmic) <br /> <em>Aquesta funció només es processa quan s\'activa el filtre professorat</em>';
$string['term1startday'] = 'Dia d\'inici del període 1';
$string['term1startday_desc'] = 'Dia i mes d\'inici del període 1<br /> <em>Aquesta funció només es processa quan s\'activa el filtre per-íode</em>';
$string['term2'] = 'Període 2';
$string['term2name'] = 'Nom del període 2';
$string['term2name_desc'] = 'Nom descriptiu per al període 2, si us plau, canvieu-ne el nom d\'acord amb la terminologia del vostre campus (o deixeu en blanc si voleu utilitzar només números anuals en mode d\'any acadèmic) <br /> <em>Aquesta funció només es processa quan s\'activa el filtre professorat</em>';
$string['term2startday'] = 'Dia d\'inici del període 2';
$string['term2startday_desc'] = 'Dia i mes d\'inici del període 2<br /> <em>Aquesta funció només es processa quan s\'activa el filtre per-íode</em>';
$string['term3'] = 'Període 3';
$string['term3name'] = 'Nom del període 3';
$string['term3name_desc'] = 'Nom descriptiu per al període 3, si us plau, canvieu-ne el nom d\'acord amb la terminologia del vostre campus (o deixeu en blanc si voleu utilitzar només números anuals en mode d\'any acadèmic) <br /> <em>Aquesta funció només es processa quan s\'activa el filtre professorat</em>';
$string['term3startday'] = 'Dia d\'inici del període 3';
$string['term3startday_desc'] = 'Dia i mes d\'inici del període 3<br /> <em>Aquesta funció només es processa quan s\'activa el filtre per-íode</em>';
$string['term4'] = 'Període 4';
$string['term4name'] = 'Nom del període 4';
$string['term4name_desc'] = 'Nom descriptiu per al període 4, si us plau, canvieu-ne el nom d\'acord amb la terminologia del vostre campus (o deixeu en blanc si voleu utilitzar només números anuals en mode d\'any acadèmic) <br /> <em>Aquesta funció només es processa quan s\'activa el filtre professorat</em>';
$string['term4startday'] = 'Dia d\'inici del període 4';
$string['term4startday_desc'] = 'Dia i mes d\'inici del període 4<br /> <em>Aquesta funció només es processa quan s\'activa el filtre per-íode</em>';
$string['termbehavioursettingheading'] = 'Filtre període: Comportament període';
$string['termcoursefilter'] = 'Activa filtre període';
$string['termcoursefilter_desc'] = 'Permet les persones usuàries que filtrin per període';
$string['termcoursefilterdisplayname'] = 'Mostra nom per al filtre període';
$string['termcoursefilterdisplayname_desc'] = 'Aquest nom es mostra per sobre del filtre període <br /> <em>Aquesta funció només es processa quan s\'activa el filtre període</em>';
$string['termcoursefiltersettingheading'] = 'Filtre període: Activació del filtre';
$string['termmode'] = 'Mode període';
$string['termmode_desc'] = 'Ajusta el mode de període per al filtre període <br /> <em>Aquesta funció només es processa quan s\'activa el filtre període</em>';
$string['termnamesettingheading'] = 'Filtre període: Noms del període';
$string['termsettingerror'] = 'Les dates de configuració del període són incoherents. Si us plau, verifiqueu que el període 2 comença després del període 1 i així successivament. El filtre de període no estarà disponible per als usuaris fins que ho corregiu.';
$string['termsettingheading'] = 'Filtre període: Definició del període';
$string['termyearpos'] = 'Posició del període dins de l\'any';
$string['termyearpos_desc'] = 'Defineix si l\'any del període ha de ser afegit com a sufix o prefix al nom del període <br /> <em>Aquesta funció només es processa quan s\'activa el filtre professorat</em>';
$string['termyearposprefixnospace_desc'] = 'L\'any s\'agrega com a prefix al nom del període sense espai (Exemple: "2013S")';
$string['termyearposprefixspace_desc'] = 'L\'any s\'agrega com a prefix al nom del període amb l\'espai (Exemple: "2013 període estiu)';
$string['termyearpossuffixnospace_desc'] = 'L\'any s\'agrega com a sufix al nom del període sense espai (Exemple: "S2013")';
$string['termyearpossuffixspace_desc'] = 'L\'any s\'agrega com a sufix al nom del període amb l\'espai (Exemple: "període estiu 2013)';
$string['termyearseparation'] = 'Nom del segon període separació de l\'any';
$string['termyearseparation_desc'] = 'Si l\'interval del període inclou el dia d\'Any Nou, definiu com s\'ha de separar aquest segon any del primer <br /> <em>Aquesta funció només es processa quan s\'activa el filtre professorat</em>';
$string['termyearseparationhyphen_desc'] = 'Separa amb un guió (Exemple: "2013-2014")';
$string['termyearseparationnosecondyear_desc'] = 'No afegeixis el 2n any (Exemple:"2013")';
$string['termyearseparationslash_desc'] = 'Separa amb una barra (Exemple:"2013/2014")';
$string['termyearseparationunderscore_desc'] = 'Separa amb un guió baix (Exemple:"2013_2014")';
$string['tertial_desc'] = 'Quadrimestral (El calendari anual es divideix en tres períodes)';
$string['timelesscourses'] = 'Cursos sense terminis';
$string['timelesscourses_desc'] = 'Activa el suport per als cursos sense terminis al filtre període. Cursos sense terminis apereixen no aassociats a cap període específic<br /> <em>Aquesta funció només es processa quan s\'activa el filtre període</em>';
$string['timelesscoursesname'] = 'Nom per als cursos sense terminis';
$string['timelesscoursesname_desc'] = 'Aquest nom es mostra al filtre període per a cursos que són intemporals <br /> <em>Aquesta funció només es processa quan s\'activa el filtre període i quuan s\'activen els cursos sense terminis</em>';
$string['timelesscoursessettingheading'] = 'Filtre període: Cursos sense terminis';
$string['timelesscoursesthreshold'] = 'Llindar dels cursos sense terminis';
$string['timelesscoursesthreshold_desc'] = 'Defineix els cursos amb un any d\'inici abans (i no és igual a) com a cursos sense terminis <br /> <em>Aquesta funció només es processa quan s\'activa el filtre període i quan els cursos sense terminis s\'activen</em>';
$string['trimester_desc'] = 'Trimestral (El calendari anual es divideix en quatre períodes)';
$string['youhave'] = 'Teniu';
