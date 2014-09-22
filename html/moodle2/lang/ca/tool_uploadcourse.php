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
 * Strings for component 'tool_uploadcourse', language 'ca', branch 'MOODLE_26_STABLE'
 *
 * @package   tool_uploadcourse
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['allowdeletes'] = 'Permet supressions';
$string['allowdeletes_help'] = 'Si el camp d\'esborrament s\'accepta o no.';
$string['allowrenames'] = 'Permet canvis de nom';
$string['allowrenames_help'] = 'Si el camp de reanomenament s\'accepta o no.';
$string['allowresets'] = 'Permet reinicis';
$string['allowresets_help'] = 'Si el camp de reinici s\'accepta o no.';
$string['cannotdeletecoursenotexist'] = 'No es pot eliminar un curs que no existeix';
$string['cannotgenerateshortnameupdatemode'] = 'No es pot generar el nom curt quan les actualitzacions estan permeses';
$string['cannotreadbackupfile'] = 'No es pot llegir el fitxer de còpia de seguretat';
$string['cannotrenamecoursenotexist'] = 'No es pot canviar el nom d\'un curs que no existeix';
$string['cannotrenameidnumberconflict'] = 'No es pot canviar el nom del curs, el número ID crea conflicte amb un curs existent';
$string['cannotrenameshortnamealreadyinuse'] = 'No es pot canviar el nom al curs, el nom curt ja s\'està fent servir';
$string['cannotupdatefrontpage'] = 'No es pot modificar la pàgina principal';
$string['canonlyrenameinupdatemode'] = 'Només es pot canviar el nom d\'un curs quan es permet l\'actualització';
$string['canonlyresetcourseinupdatemode'] = 'Només es pot reiniciar un curs en mode actualització';
$string['couldnotresolvecatgorybyid'] = 'No s\'ha pogut resoldre la categoria per ID';
$string['couldnotresolvecatgorybyidnumber'] = 'No s\'ha pogut resoldre la categoria pel número ID';
$string['couldnotresolvecatgorybypath'] = 'No s\'ha pogut resoldre la categoria a partir de la ruta';
$string['coursecreated'] = 'S\'ha creat el curs';
$string['coursedeleted'] = 'S\'ha esborrat el curs';
$string['coursedeletionnotallowed'] = 'No està permès esborrar cursos';
$string['coursedoesnotexistandcreatenotallowed'] = 'El curs no existeix i no està permesa la creació de cursos';
$string['courseexistsanduploadnotallowed'] = 'El curs ja existeix i l\'actualització no està permesa';
$string['coursefile'] = 'Fitxer';
$string['coursefile_help'] = 'Ha de ser un fitxer CSV.';
$string['courseidnumberincremented'] = 'Nombre ID del curs incrementat {$a->from} -> {$a->to}';
$string['courseprocess'] = 'Procés del curs';
$string['courserenamed'] = 'S\'ha canviat el nom del curs';
$string['courserenamingnotallowed'] = 'No està permès canviar el nom del curs';
$string['coursereset'] = 'S\'ha reiniciat el curs';
$string['courseresetnotallowed'] = 'No està permès reiniciar el curs';
$string['courserestored'] = 'S\'ha restaurat el curs';
$string['coursescreated'] = 'Cursos creats: {$a}';
$string['coursesdeleted'] = 'Cursos esborrats: {$a}';
$string['courseserrors'] = 'Cursos amb errors: {$a}';
$string['courseshortnamegenerated'] = 'S\'ha generat el nom curt del curs: {$a}';
$string['courseshortnameincremented'] = 'S\'ha incrementat el nom curt del curs {$a->from} -> {$a->to}';
$string['coursestotal'] = 'Total de cursos: {$a}';
$string['coursesupdated'] = 'Cursos actualitzats: {$a}';
$string['coursetemplatename'] = 'Restaura des d\'aquest curs després de la càrrega';
$string['coursetemplatename_help'] = 'Introduïu un nom curt d\'un curs existent per fer-lo servir com a plantilla per a la creació de tots els cursos.';
$string['coursetorestorefromdoesnotexist'] = 'El curs des del que voleu restaurar no existeix';
$string['courseupdated'] = 'S\'ha actualitzat el curs';
$string['createall'] = 'Crea\'ls tots, incrementa el nom curt si és necessari';
$string['createnew'] = 'Crea només els cursos nous, omet els ja existents';
$string['createorupdate'] = 'Crea els cursos nous, o actualitza els ja existents';
$string['csvdelimiter'] = 'Delimitador CSV';
$string['csvdelimiter_help'] = 'Delimiador CSV del fitxer CSV.';
$string['csvfileerror'] = 'Hi ha algun error amb el format del fitxer CSV. Comproveu que  el nombre de capçaleres i columnes coincideixen, i que el delimitador i la codificació del fitxer siguin correctes: {$a}';
$string['csvline'] = 'Línia';
$string['defaultvalues'] = 'Valors per defecte del curs';
$string['encoding'] = 'Codificació';
$string['encoding_help'] = 'Codificació del fitxer CSV.';
$string['errorwhiledeletingcourse'] = 'S\'ha produït un error mentre s\'esborrava el curs';
$string['errorwhilerestoringcourse'] = 'S\'ha produït un error mentre es restaurava el curs';
$string['generatedshortnamealreadyinuse'] = 'El nom curt generat ja s\'està fent servir';
$string['generatedshortnameinvalid'] = 'El nom curt generat no és vàlid';
$string['id'] = 'ID';
$string['idnumberalreadyinuse'] = 'El número ID ja s\'està fent servir a un curs';
$string['importoptions'] = 'Opcions d\'importació';
$string['invalidbackupfile'] = 'El fitxer de còpia de seguretat no és vàlid';
$string['invalidcourseformat'] = 'El format de curs no és vàlid';
$string['invalidcsvfile'] = 'El fitxer CSV d\'entrada no és vàlid';
$string['invalidencoding'] = 'La codificació no és vàlida';
$string['invalideupdatemode'] = 'El mode d\'actualització seleccionat no és vàlid';
$string['invalidmode'] = 'El mode seleccionat no és vàlid';
$string['invalidroles'] = 'Els noms dels rols no són vàlids: {$a}';
$string['invalidshortname'] = 'El nom curt no és vàlid';
$string['missingmandatoryfields'] = 'Falten valors pels camps obligatoris: {$a}';
$string['missingshortnamenotemplate'] = 'Falta nom curt i no s\'ha triat la plantilla de nom curt';
$string['mode'] = 'Mode de càrrega';
$string['mode_help'] = 'Permet especificar si els cursos es poden crear i/o actualitzar.';
$string['nochanges'] = 'Sense canvis';
$string['pluginname'] = 'S\'ha carregat el curs';
$string['preview'] = 'Previsualitza';
$string['reset'] = 'Reinicia el curs després de carregar-lo';
$string['reset_help'] = 'Si el curs es reiniciarà o no després de crear-lo/carregar-lo.';
$string['restoreafterimport'] = 'Restaura després d\'importar';
$string['result'] = 'Resultat';
$string['rowpreviewnum'] = 'Previsualització de files';
$string['rowpreviewnum_help'] = 'Nombre de files del fitxer CSV que es previsualitzaran a la pàgina següent. Aquesta opció existeix per limitar la mida de la pàgina següent.';
$string['shortnametemplate'] = 'Plantilla per generar un nom curt';
$string['shortnametemplate_help'] = 'El nom curt del curs es mostra a la navegació. Podeu fer servir plantilles aquí (%f = nom complet, %i = nombre ID), o posar un valor inicial que s\'incrementarà.';
$string['templatefile'] = 'Restaura d\'aquest fitxer després de la càrrega';
$string['templatefile_help'] = 'Seleccioneu un fitxer per fer servir com a plantilla per a la creació de tots els cursos.';
$string['unknownimportmode'] = 'Mode d\'importació desconegut';
$string['updatemissing'] = 'Ompliu els termes que falten a les dades CSV i als paràmetres per defecte';
$string['updatemode'] = 'Mode d\'actualització';
$string['updatemodedoessettonothing'] = 'Aquest mode d\'actualització no permet que s\'actualitzi res';
$string['updatemode_help'] = 'Si permeteu que els cursos s\'actualitzin, també heu d\'especificar l\'eina amb què s\'han d\'actualitzar els cursos.';
$string['updateonly'] = 'Actualitza només els cursos existents';
$string['updatewithdataonly'] = 'Actualitza només amb les dades del fitxer CSV';
$string['updatewithdataordefaults'] = 'Actualitza amb les dades i valors predeterminats del fitxer CSV';
$string['uploadcourses'] = 'Carrega cursos';
$string['uploadcourses_help'] = 'Els cursos s\'han de carregar amb un fitxer de text. El format d\'aquest fitxer ha de ser de la forma següent:

* Cada línia ha de contenir un registre
* Cada registre és una serie de dades separada per comes (o altres delimitadors)
* El primer registre ha de contenir una llista dels noms dels camps, definint així la resta del fitxer
* Els camps requerits són nom curt, nom complet i categoria';
$string['uploadcoursespreview'] = 'Previsualització de la càrrega de cursos';
$string['uploadcoursesresult'] = 'Resultat de la càrrega de cursos';
