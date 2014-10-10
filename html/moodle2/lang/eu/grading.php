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
 * Strings for component 'grading', language 'eu', branch 'MOODLE_26_STABLE'
 *
 * @package   grading
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activemethodinfo'] = '\'{$a->method}\' metodoa dago aukeratuta kalifikazio-metodo gisa \'{$a->area}\' eremuan';
$string['activemethodinfonone'] = '\'{$a->method}\' metodoa dago aukeratuta kalifikazio-metodo gisa \'{$a->area}\' eremuan';
$string['changeactivemethod'] = 'Aldatu kalifikazio-metodoa beste honetara';
$string['clicktoclose'] = 'sakatu ixteko';
$string['exc_gradingformelement'] = 'Ezin da kalifikazio-formularioa sortu';
$string['formnotavailable'] = 'Kalifikazio aurreratua metodoa erabiltzea aukeratu da baina kalifikazio formularioa ez dago eskuragarri. Lehehnik hori definitu beharko zenuke Ezarpenak blokeko esteka erabilita.';
$string['gradingformunavailable'] = 'Mesedez, ohartu une honetan kalifikazio aurreraturako formularioa ez dagoela prest. Kalifikazio arrunta metodoa erabiliko da formularioa egoki egon arte.';
$string['gradingmanagement'] = 'Kalifikazio aurreratua';
$string['gradingmanagementtitle'] = 'Kalifikazio aurreratua: {$a->component} ({$a->area})';
$string['gradingmethod'] = 'Kalifikazio-metodoa';
$string['gradingmethod_help'] = 'Aukeratu testuinguru honetako kalifikazioak kalkulatzeko erabiliko den kalifikazio-metodo aurreratua.

Kalifikazio aurreratua desgaitu eta berezko kalifikazio metodoa berriz erabiltzeko, aukeratu \'Kalifikazio zuzen arrunta\'.';
$string['gradingmethodnone'] = 'Kalifikazio zuzen arrunta';
$string['gradingmethods'] = 'Kalifikazio-metodoak';
$string['manageactionclone'] = 'Sortu beste kalifikazio-metodo bat txantiloi batetik';
$string['manageactiondelete'] = 'Ezabatu definitutako formularioa';
$string['manageactiondeleteconfirm'] = '\'{$a->formname}\' kalifikazio-formularioa eta \'{$a->component} ({$a->area})\'-(r)ekin erlazionaturiko informazio guztia ezabatzera zoaz. Mesedez ziurtatu hurrengo ondorioak ulertzen dituzula:

* Ekintza honek ez dauka atzera bueltarik.
* Beste kalifikazio-metodo bat aukera dezakezu, \'Kalifikazio zuzen arrunta\' barne, formulario hau ezabatu gabe.
* Kalifikazio-formularioak nola bete azaltzen duen informazio guztia galduko da.
* Kalifikazio-liburuan kalkulaturiko kalifikazioek ez dute eraginik izango. Dena den, nola kalkulatu diren deskribatzen duen azalpena ez da eskuragarri egongo.
* Ekintza honek ez dauka eraginik beste jardueratan egindako formulario honen kopietan.';
$string['manageactiondeletedone'] = 'Formularioa ondo ezabatu da';
$string['manageactionedit'] = 'Editatu oraingo formularioaren definizioa';
$string['manageactionnew'] = 'Definitu beste kalifikazio-metodo bat hasieratik';
$string['manageactionshare'] = 'Argitaratu formularioa txantiloi berri gisa';
$string['manageactionshareconfirm'] = '\'{$a}\' kalifikazio-formularioaren kopia bat txantiloi publiko gisa gordetzera zoaz. Zure guneko beste erabiltzaileek txantiloi hori erabiliz kalifikazio formulario berriak sortzeko aukera izango dute.';
$string['manageactionsharedone'] = 'Formularioa onod gorde da txantiloi berri gisa';
$string['noitemid'] = 'Ezin da kalifikatu. Kalifikatzeko elementua ez da existitzen.';
$string['nosharedformfound'] = 'Ez da itxurarik aurkitu';
$string['searchownforms'] = 'Neure formularioak ere barne';
$string['searchtemplate'] = 'Bilatu kalifikazio-formularioak';
$string['searchtemplate_help'] = 'Hemen kalifikazio-formulario bat bilatu eta txantiloi gisa erabil dezakezu. Formularioaren izenenan agertu beharko liratekeen hitzak idatzi, bere deskribapena edo formularioaren edukiak berak. Esaldi bat bilatzeko. idatz ezazu kontsulta osoa komatxo bikoitzen barruan.

Berez, partekatutako txantiloi gisa gordetako kalifikazio-formularioak bakarrik agertuko dira bilaketaren emaitzetan. Zure kalifikazio-formularioak ere bilaketaren emaitzetan gehi ditzakezu. Modu honetan, zure kalifikazio-formularioak partekatu gabe berrerabil ditzakezu. Modu honetan \'Erabiltzeko prest\' bezala gordetako formularioak bakarrik berrerabil daitezke.';
$string['statusdraft'] = 'Zirroborroa';
$string['statusready'] = 'Erabiltzeko prest';
$string['templatedelete'] = 'Ezabatu';
$string['templatedeleteconfirm'] = 'Partekatutako \'{$a}\' txantiloia ezabatzera zoaz. Txantiloia ezabatzeak ez die horretan oinarrituriko formularioei eragiten.';
$string['templateedit'] = 'Editatu';
$string['templatepick'] = 'Erabili itxura hau';
$string['templatepickconfirm'] = '\'{$a->formname}\' izeneko kalifikazio-formularioa txantiloi gisa erabili nahi duzu \'{$a->component} ({$a->area})\'-ko kalifikazio-formulariorako?';
$string['templatepickownform'] = 'Erabili formulario hau txantiloi gisa';
$string['templatesource'] = 'Kokapena: {$a->component} ({$a->area})';
$string['templatetypeown'] = 'Norberaren formularioa';
$string['templatetypeshared'] = 'Partekatutako txantiloia';
