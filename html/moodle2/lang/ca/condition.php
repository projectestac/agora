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
 * Strings for component 'condition', language 'ca', branch 'MOODLE_26_STABLE'
 *
 * @package   condition
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addcompletions'] = 'Agrega {no} condicions de l\'activitat per al formulari';
$string['addgrades'] = 'Agrega {no} condicions de qualificació per al formulari';
$string['adduserfields'] = 'Afegeix al formulari {no} condicions de camp d\'usuari';
$string['availabilityconditions'] = 'Restriccions d\'accés';
$string['availablefrom'] = 'Permet l\'accés des del';
$string['availablefrom_help'] = 'L\'accés des de/fins a les dates determina quan poden els alumnes accedir a l\'activitat mitjançant un enllaç a la pàgina del curs.

La diferència entre l\'accés des de/fins a les dates  i la disponibilitat dels paràmetres per aquesta activitat és que fora de les dates configurades, l\'última permet als estudiants veure la descripció de l\'activitat, mentre que l\'accés des de /fins a les dates impedeix l\'accés per complet.';
$string['availableuntil'] = 'Permet l\'accés fins el';
$string['badavailabledates'] = 'Dates no vàlides. Si poseu ambdues dates, la data \'Permet accés des de\' hauria de ser-hi abans de la data \'fins\'.';
$string['badgradelimits'] = 'Si establiu un límit superior i inferior per a la puntuació, el límit superior ha de ser major que el límit inferior.';
$string['completion_complete'] = 'cal marcar-ho com finalitzat';
$string['completioncondition'] = 'Condició de compleció de l\'activitat';
$string['completioncondition_help'] = 'Aquest paràmetre determina les condicions de compleció de l\'activitat que s\'han de complir per accedir a l\'activitat. Fixeu-vos que el seguiment de la compleció s\'ha de configurar abans de definir la condició de compleció d\'una activitat.

Si es desitja es poden configurar múltiples condicions de compleció d\'activitat. Si es fa així, l\'accés a l\'activitat sols es permetrà quan TOTES les condicions de compleció de l\'activitat s\'hagin complit.';
$string['completionconditionsection'] = 'Condició de compleció de l\'activitat';
$string['completionconditionsection_help'] = 'Aquest paràmetre determina les condicions de compleció de l\'activitat que s\'han de complir per accedir a la secció. Fixeu-vos que el seguiment de la compleció s\'ha de configurar abans de definir la condició de compleció d\'una activitat.

Si es desitja es poden configurar múltiples condicions de compleció d\'activitat. Si es fa així, l\'accés a la secció sols es permetrà quan TOTES les condicions de compleció de l\'activitat s\'hagin complit.';
$string['completion_fail'] = 'ha d\'estar completada amb qualificació suspesa.';
$string['completion_incomplete'] = 'no s\'ha de marcar com completada';
$string['completion_pass'] = 'ha d\'estar completada amb qualificació aprovada';
$string['configenableavailability'] = 'Si s\'activa, això us permet establir les condicions que controlen si es pot accedir a una activitat o un recurs  (segons la data, la qualificació o la compleció).';
$string['contains'] = 'conté';
$string['doesnotcontain'] = 'no conté';
$string['enableavailability'] = 'Habilitar l\'accés condicional';
$string['endswith'] = 'acaba en';
$string['fielddeclaredmultipletimes'] = 'No podeu declarar el mateix camp més d\'una vegada per activitat';
$string['grade_atleast'] = 'ha de ser com a mínim';
$string['gradecondition'] = 'Condició de qualificació';
$string['gradecondition_help'] = 'Aquest paràmetre determina les condicions de qualificació que s\'han de complir per accedir a l\'activitat.

Si es desitja es poden posar múltiples condicions de qualificació. Si és fa així, l\'activitat sols permetrà l\'accés quan es compleixin totes les condicions de qualificació.';
$string['gradeconditionsection'] = 'Condició de qualificació';
$string['gradeconditionsection_help'] = 'Aquest paràmetre determina les condicions de qualificació que s\'han de complir per accedir a la secció.

Si es desitja es poden posar múltiples condicions de qualificació. Si és fa així, la secció sols permetrà l\'accés quan es compleixin totes les condicions de qualificació.';
$string['gradeitembutnolimits'] = 'Heu d\'introduir un límit superior, o un límit inferior, o ambdues coses.';
$string['gradelimitsbutnoitem'] = 'Heu de triar un element de qualificació.';
$string['gradesmustbenumeric'] = 'La puntuació màxima i mínima han de ser numèriques (o deixar-les en blanc)';
$string['grade_upto'] = 'i menys de';
$string['groupingnoaccess'] = 'Actualment no pertanyeu a un grup que pugui accedir a aquesta secció.';
$string['isempty'] = 'està buit';
$string['isequalto'] = 'és igual a';
$string['isnotempty'] = 'no està buit';
$string['none'] = '(cap)';
$string['notavailableyet'] = 'No disponible encara';
$string['requires_completion_0'] = 'No estarà disponible a menys que l\'activitat <strong>{$a}</strong> estigui incompleta.';
$string['requires_completion_1'] = 'No estarà disponible fins que l\'activitat <strong>{$a}</strong> sigui marcada com finalitzada.';
$string['requires_completion_2'] = 'No estarà disponible fins que l\'activitat <strong>{$a}</strong> sigui finalitzada i aprovada.';
$string['requires_completion_3'] = 'No estarà disponible a menys que l\'activitat <strong>{$a}</strong> sigui finalitzada i suspesa. ';
$string['requires_date'] = 'Disponible des de {$a}.';
$string['requires_date_before'] = 'Disponible fins {$a}.';
$string['requires_date_both'] = 'Disponible des de {$a->from} fins {$a->until}';
$string['requires_date_both_single_day'] = 'Disponible en {$a}';
$string['requires_grade_any'] = 'No disponible fins que tingueu una qualificació de <strong>{$a}</strong>.';
$string['requires_grade_max'] = 'No disponible a menys que tingueu una puntuació apropiada en <strong>{$a}</strong>.';
$string['requires_grade_min'] = 'No disponible fins que assoliu la puntuació requerida en <strong>{$a}</strong>.';
$string['requires_grade_range'] = 'No disponible a menys que tingueu una puntuació especial en <strong>{$a}</strong>.';
$string['requires_user_field_contains'] = 'No disponible llevat que el vostre <strong>{$a->field}</strong> contingui <strong>{$a->value}</strong>.';
$string['requires_user_field_doesnotcontain'] = 'No disponible si el vostre <strong>{$a->field}</strong> conté <strong>{$a->value}</strong>.';
$string['requires_user_field_endswith'] = 'No disponible llevat que el vostre <strong>{$a->field}</strong> acabi amb <strong>{$a->value}</strong>.';
$string['requires_user_field_isempty'] = 'No disponible llevat que el vostre <strong>{$a->field}</strong> estigui buit.';
$string['requires_user_field_isequalto'] = 'No disponible llevat que el vostre <strong>{$a->field}</strong> sigui igual a <strong>{$a->value}</strong>.';
$string['requires_user_field_isnotempty'] = 'No disponible si el vostre <strong>{$a->field}</strong> és buit.';
$string['requires_user_field_startswith'] = 'No disponible llevat que el vostre <strong>{$a->field}</strong> comenci amb <strong>{$a->value}</strong>.';
$string['showavailability'] = 'Abans que l\'activitat pugui ser accessible';
$string['showavailability_hide'] = 'Amaga l\'activitat sencera';
$string['showavailabilitysection'] = 'Abans que la secció pugui ser accessible';
$string['showavailabilitysection_hide'] = 'Amaga la secció sencera';
$string['showavailabilitysection_show'] = 'Mostra de gris la secció, amb restricció d\'informació';
$string['showavailability_show'] = 'Mostra de gris l\'activitat, amb restricció d\'informació';
$string['startswith'] = 'comença per';
$string['userfield'] = 'Camp d\'usuari';
$string['userfield_help'] = 'Podeu restringir l\'accés basant-vos en qualsevol camp del perfil d\'usuari.';
$string['userrestriction_hidden'] = 'Restringida (completament amagada, cap missatge): ‘{$a}’';
$string['userrestriction_visible'] = 'Restringida: &lsquo;{$a}&rsquo;';
