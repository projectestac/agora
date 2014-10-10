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
 * Strings for component 'qtype_algebra', language 'ca', branch 'MOODLE_26_STABLE'
 *
 * @package   qtype_algebra
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addmoreanswerblanks'] = 'Espais en blanc per {no} respostes més';
$string['addmorevariableblanks'] = 'Espais en blanc per {no} variables més';
$string['algebraoptions'] = 'Opcions';
$string['allfunctions'] = 'Totes les funcions';
$string['allowedfuncs'] = 'Funcions permeses';
$string['allowedfuncs_help'] = '** NO IMPLEMENTAT ENCARA **

Aquests controls poden emprar-se per restringir les funcions que els estudiants poden utilitzar en les seves respostes. Si la casella "Totes" està marcada, no hi haurà cap restricció en les funcions que els estudiants poden utilitzar en les seves respostes. Aquesta és l\'opció per defecte. Per tal de restringir les funcions permeses, desmarqueu la casella "Totes" i seleccioneu les funcions que vulgueu permetre.';
$string['allowedfunctions'] = 'Funcions permeses';
$string['answer'] = 'Resposta: {$a}';
$string['answerboxprefix'] = 'Cadena que s\'usarà com a prefix de l\'àrea de resposta en mostrar la pregunta';
$string['answermustbegiven'] = 'Cal que introduïu una resposta si hi ha una qualificació o retroalimentació.';
$string['answerno'] = 'Resposta {$a}';
$string['answerprefix'] = 'Prefix de l\'àrea de resposta';
$string['answerprefix_help'] = 'El text introduït aquí es mostrarà al davant de la caixa d\'entada on els estudiants introdueixen les seves respostes. Per exemple, si en una pregunta es demana l\'expressió d\'una certa funció f(x), aleshores podríeu posar "f(x) = " en aquest camp.';
$string['badclosebracket'] = 'S\'ha trobat un parèntesi de tancament no vàlid';
$string['badequivtype'] = 'Tipus invàlid: només es poden comparar termes d\'anàlisi amb altres termes d\'anàlisi';
$string['badfuncargs'] = 'Els arguments de la funció \'{$a}\' no són vàlids';
$string['brackets'] = '[...]';
$string['checktolerance'] = 'Tolerància de comprovació';
$string['compalgorithm'] = 'Algorisme de comparació';
$string['compareby'] = 'Algorisme de comparació';
$string['compareby_help'] = 'Això selecciona el mètode que s\'utilitza per comparar les respostes dels estudiants amb totes les respostes de la pregunta. Les diferents possibilitats són:

SAGE: Utilitza el programari lliure <a href="http://www.sagemath.org/">SAGE</a> per efectuar una comparació algebraica simbòlica completa.

Avaluació: Aquest mètode genera valors aleatoris per les variables de la pregunta i amb aquests valors avalua i compara la resposta de l\'estudiant amb la resposta programada.

Equivalència: És el més senzill dels mètodes. Efectua només la comparació més bàsica entre l\'expressió introduïda per l\'estudiant i la que hi ha programada a la pregunta.';
$string['compareequiv'] = 'Equivalència';
$string['compareeval'] = 'Avaluació';
$string['comparesage'] = 'SAGE';
$string['correctansweris'] = 'La resposta correcta és: {$a}, que dóna';
$string['correctanswers'] = 'Respostes correctes';
$string['decimal'] = '.';
$string['defaultmethod'] = 'Mètode de comparació per defecte';
$string['disallow'] = 'Resposta no permesa';
$string['disallowans'] = 'Resposta no permesa';
$string['disallowanswer'] = 'Resposta no permesa';
$string['disallow_help'] = 'Conté una expressió que no serà permesa com a resposta.
Els estudiants que introdueixin respostes que concordin amb aquesta no obtindran cap puntuació de la pregunta encara que la resposta concordi amb alguna de les programades.';
$string['displayresponse'] = 'Previsualitza la resposta';
$string['dollars'] = '$$...$$';
$string['duplicatevar'] = 'Nom de variable duplicat: «{$a}» ja està definit.';
$string['editingalgebra'] = 'S\'està editant una pregunta d\'Àlgebra';
$string['evalchecks'] = 'Comprovacions d\'avaluació';
$string['filloutoneanswer'] = 'Heu de proporcionar com a mínim una possible resposta. Les respostes en blanc no s\'utilitzaran. Podeu usar el comodí \'*\' per tal que concordi amb qualsevol caràcter. La primera resposta que concordi serà la que s\'utiltizarà per determinar la puntuació i la retroalimentació. Només estan permeses les variables que s\'han definit a sobre.';
$string['filloutonevariable'] = 'Heu de proporcionar una variable com a mínim.';
$string['host'] = 'URL del servidor que hostatja el SAGE';
$string['illegalplusminus'] = 'S\'ha trobat un + o un - en una posició no vàlida';
$string['illegalvarname'] = 'El nom de variable «{$a}» no és legal: és el mateix nom que el d\'una funció o constant especial.';
$string['mismatchedbracket'] = 'Claudàtors discordants: Els claudàtors d\'obertura i tancament no són del mateix tipus «{$a}»';
$string['mismatchedcloseb'] = 'Claudàtors discordants: S\'ha trobat un claudàtor de tancament sense el corresponent claudàtor d\'obertura';
$string['mismatchedopenb'] = 'Claudàtors discordants: S\'ha trobat un claudàtor d\'obertura sense el corresponent claudàtor de tancament';
$string['missingonearg'] = 'Error de sintaxi: A l\'operador «{$a}» li manca l\'argument';
$string['missingtwoargs'] = 'Error de sintaxi: L\'operador «{$a}» necessita dos argument';
$string['morethantwoargs'] = 'Provant de comparar un terme amb més de dos arguments - aquesta casuística no està prevista a la programació!';
$string['multiply'] = 'vegades';
$string['nargswrong'] = 'Nombre incorrecte d\'arguments pel terme «{$a}»';
$string['nchecks'] = 'Nombre de comprovacions d\'avaluació';
$string['nchecks_help'] = 'Nombre de comprovacions d\'avaluació que s\'utilitzaran en l\'algorisme de comparació d\'avaluacions';
$string['noevaluate'] = 'El mètode d\'avaluació pel terme «{$a}» encara no està implementat';
$string['notanumber'] = 'Valor invàlid: cal un nombre.';
$string['notenoughanswers'] = 'Heu d\'introduir una resposta com a mínim.';
$string['notenoughvars'] = 'Heu d\'introduir una variable com a mínim.';
$string['notopterm'] = 'Error de sintaxi: No es pot condensar en un operador únic de primer nivell';
$string['novarmax'] = 'No s\'ha especificat el valor màxim de la variable.';
$string['novarmin'] = 'No s\'ha especificat el valor mínim de la variable.';
$string['options'] = 'Opcions';
$string['parseerror'] = 'Error en analitzar la funció: «{$a}»';
$string['pluginname'] = 'àlgebra';
$string['pluginnameadding'] = 'S\'està afegint una pregunta d\'Àlgebra';
$string['pluginnameediting'] = 'S\'està editant una pregunta d\'Àlgebra';
$string['pluginname_help'] = 'L\'estudiant introdueix com a resposta una fórmula que inclou una o més variables. La correctesa s\'avalua utilitzant un dels 3 mètodes diferents disponibles';
$string['pluginnamesummary'] = 'L\'estudiant introdueix una fórmula que pot incloure una o més variables. La correctesa s\'avalua utilitzant un dels 3 mètodes diferents disponibles';
$string['port'] = 'Port del servidor SAGE';
$string['restoreqdbfailed'] = 'Ha fallat la restauració d\'una pregunta d\'àlgebra: Error d\'escriptura a la base de dades';
$string['restorevardbfailed'] = 'Ha fallat la restauració d\'una variable d\'una pregunta d\'àlgebra: Error d\'escriptura a la base de dades';
$string['texdelimiters'] = 'Delimitadors de les expressions TeX';
$string['tolerance'] = 'Tolerància per les comprovacions d\'avaluació';
$string['tolerance_help'] = 'Determina la diferència màxima admissible entre les avaluacions numèriques de la resposta de l\'estudiant i la programada per tal d\'acceptar la resposta com a vàlida.';
$string['toleranceltzero'] = 'Cal que la tolerància sigui més gran o igual a zero';
$string['undeclaredvar'] = 'S\'ha trobat la variable «{$a}» sense declarar';
$string['undefinedfunction'] = 'Funció no definida «{$a}»';
$string['undefinedvar'] = 'Variable(s) no definida(es) {$a} utilitzades en una o més respostes.';
$string['undefinedvariable'] = 'S\'ha trobat la variable no definida «{$a}» mentre s\'estava avaluant numèricament una expressió';
$string['unknownterm'] = 'Error de sintaxi: S\'ha trobat el terme desconegut «{$a}» a l\'expressió';
$string['unusedvar'] = 'Aquesta variable no s\'utilitza en cap de les respostes';
$string['uri'] = 'URI del servidor SAGE';
$string['variable'] = 'Variable';
$string['variable_help'] = 'Heu d\'introduir aquí tots els noms de les variables utilitzades a les respostes. Els valors mínims i màxims només són necessaris si s\'utilitza l\'algorisme de comparació d\'avaluacions.';
$string['variablename'] = 'Nom';
$string['variableno'] = 'Variable {$a}';
$string['variables'] = 'Variables';
$string['variablex'] = 'Variable {no}';
$string['varmax'] = 'Valor màxim';
$string['varmin'] = 'Valor mínim';
$string['varmingtmax'] = 'El valor mínim ha de ser inferior al màxim.';
