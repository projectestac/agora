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
 * Strings for component 'condition', language 'de', branch 'MOODLE_23_STABLE'
 *
 * @package   condition
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addcompletions'] = '{no} Aktivitätsbedingungen hinzufügen';
$string['addgrades'] = '{no} Bewertungsbedingungen hinzufügen';
$string['availabilityconditions'] = 'Bedingte Verfügbarkeit';
$string['availablefrom'] = 'Verfügbar ab';
$string['availablefrom_help'] = 'Die Verfügbarkeitsdauer (von/bis) bestimmt den Zeitraum, in dem im Kurs auf die Aktivität zugegriffen werden kann.

Im Gegensatz zu den Verfügbarkeitsbedingungen, die den Teilnehmerzugriff an die Erfüllung von Lernfortschritten oder Bewertungen knüpfen, verhindert eine eingestellte  Verfügbarkeitsdauer (von/bis) den Zugriff außerhalb des gesetzten Zeitraums vollständig.';
$string['availableuntil'] = 'Verfügbar bis';
$string['badavailabledates'] = 'Ungültige Daten! Wenn Sie beide Daten eintragen, muss der Eintrag \'Verfügbar ab\' zeitlich vor dem Eintrag \'Verfügbar bis\' liegen.';
$string['badgradelimits'] = 'Wenn Sie eine obere und eine untere Bewertungsgrenze festlegen, muss die obere Grenze größer als die untere sein.';
$string['completion_complete'] = 'muss als abgeschlossen markiert sein';
$string['completioncondition'] = 'Aktivitätsabschlussbedingung';
$string['completioncondition_help'] = 'Diese Einstellung legt Bedingungen von anderen Aktivitäten fest, die erfüllt sein müssen, bevor diese Aktivität für die Teilnehmer/innen verfügbar wird. Beachten Sie, dass hierzu die Funktion Abschlussverfolgung auf Systemebene aktiviert sein muss.

Eventuell kann auch eine Kombination aus mehreren Aktivitätsabschlussbedingungen sinnvoll sein. Es müssen dann alle angegebenen ALLE Aktivitätsabschlussbedingungen erfüllt sein.  ';
$string['completionconditionsection'] = 'Bedingung für Aktivitätsabschluss';
$string['completionconditionsection_help'] = 'Hier legen Sie fest welche Abschlußbedingungen bei Aktivitäten in anderen Kursabschlüssen Voraussetzung für einen Zugriff auf den Inhalt dieses Themen-/Wochenabschnitts sind. Die Funktion Abschlußverfolgung muß zuvor in den Kurseinstellungen aktiviert worden sein.

Wenn mehrere Aktivitäten als Voraussetzung definiert werden, müssen alle erfüllt sein, bevor ein Zugriff möglich wird.';
$string['completion_fail'] = 'muss erfolglos abgeschlossen sein';
$string['completion_incomplete'] = 'darf nicht als abgeschlossen markiert sein';
$string['completion_pass'] = 'muss erfolgreich abgeschlossen sein';
$string['configenableavailability'] = 'Diese Option erlaubt die Festlegung von Bedingungen (basierend auf Zeit, Bewertung oder Fertigstellung), die die Verfügbarkeit von Aktivitäten in Kursen steuern.';
$string['enableavailability'] = 'Bedingte Verfügbarkeit';
$string['grade_atleast'] = 'mehr als';
$string['gradecondition'] = 'Bewertungsbedingung';
$string['gradecondition_help'] = 'Diese Einstellung legt Bewertungsbedingungen fest, die erfüllt sein müssen, bevor diese Aktivität für die Teilnehmer/innen verfügbar wird.

Eventuell kann auch eine Kombination aus mehreren Bewertungsbedingungen sinnvoll sein, wobei aber dann die Aktivität nur verfügbar ist, wenn wirklich ALLE Bewertungsbedingungen erfüllt sind.';
$string['gradeconditionsection'] = 'Bewertungsbedingung';
$string['gradeconditionsection_help'] = 'Diese Einstellung legt fest, welche Bewertungen in anderen Aktivitäten erzielt werden müssen, um auf diesen Kursabschnitt Zugriff zu erhalten.

Wenn mehrere Bewertungen als Voraussetzung definiert werden, müssen alle erfüllt sein, bevor ein Zugriff möglich wird.';
$string['gradeitembutnolimits'] = 'Sie müssen eine obere oder untere Grenze, oder beide, festelegen.';
$string['gradelimitsbutnoitem'] = 'Sie müssen einen Bewertung auswählen';
$string['gradesmustbenumeric'] = 'Die Mindest- oder Höchstbewertung muss eine Zahl (oder ein leeres Feld) sein.';
$string['grade_upto'] = 'weniger als';
$string['groupingnoaccess'] = 'Sie gehören derzeit nicht zu einer Gruppe mit Zugriff auf diesen Kursabschnitt.';
$string['none'] = '(keine)';
$string['notavailableyet'] = 'Aktuell nicht verfügbar';
$string['requires_completion_0'] = 'Verfügbar solange die Aktivität <strong>{$a}</strong> nicht abgeschlossen ist.';
$string['requires_completion_1'] = 'Verfügbar sobald die Aktivität <strong>{$a}</strong> abgeschlossen ist.';
$string['requires_completion_2'] = 'Verfügbar sobald die Aktivität <strong>{$a}</strong> erfolgreich abgeschlossen ist.';
$string['requires_completion_3'] = 'Verfügbar sobald Aktivität <strong>{$a}</strong> erfolglos abgeschlossen ist.';
$string['requires_date'] = 'Verfügbar ab {$a}';
$string['requires_date_before'] = 'Verfügbar bis {$a}';
$string['requires_date_both'] = 'Verfügbar von {$a->from} bis {$a->until}.';
$string['requires_date_both_single_day'] = 'Verfügbar am {$a}';
$string['requires_grade_any'] = 'Verfügbar sobald <strong>{$a}</strong> bewertet ist.';
$string['requires_grade_max'] = 'Verfügbar sobald der vorgegebene Wert für <strong>{$a}</strong> erreicht ist.';
$string['requires_grade_min'] = 'Verfügbar sobald der vorgegebene Wert für <strong>{$a}</strong> erreicht ist.';
$string['requires_grade_range'] = 'Verfügbar solange der Wert für <strong>{$a}</strong> in den Grenzen liegt.';
$string['showavailability'] = 'Vor der Verfügbarkeit';
$string['showavailability_hide'] = 'Aktivität vollständig verbergen';
$string['showavailabilitysection'] = 'Bevor Sie auf diesen Kursabschnitt zugreifen können';
$string['showavailabilitysection_hide'] = 'Kursabschnitt völlig verbergen';
$string['showavailabilitysection_show'] = 'Kursabschnitt grau darstellen (mit Hinweis auf Zugriffsbeschränkung)';
$string['showavailability_show'] = 'Aktivität grau mit Sperrhinweis zeigen';
$string['userrestriction_hidden'] = 'Bedingt verfügbar (unsichtbar): ‘{$a}’';
$string['userrestriction_visible'] = 'Bedingt verfügbar: ‘{$a}’';
