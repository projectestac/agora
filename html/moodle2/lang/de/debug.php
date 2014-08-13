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
 * Strings for component 'debug', language 'de', branch 'MOODLE_26_STABLE'
 *
 * @package   debug
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['authpluginnotfound'] = 'Authentifierung {$a} nicht gefunden';
$string['blocknotexist'] = 'Block {$a} existiert nicht!';
$string['cannotbenull'] = '{$a} darf nicht Null sein!';
$string['cannotdowngrade'] = 'Ein Downgrade {$a->plugin} von {$a->oldversion} nach {$a->newversion} ist nicht möglich.';
$string['cannotfindadmin'] = 'Kein Admin-Nutzer gefunden!';
$string['cannotinitpage'] = 'Die Seite konnte nicht vollständig initialisiert werden. Ungültige {$a->name} ID {$a->id}';
$string['cannotsetuptable'] = '{$a} Tabellen konnten nicht erfolgreich erstellt werden!';
$string['codingerror'] = 'Fehler in der Kodierung gefunden, den nur ein Programmierer korrigieren kann: {$a}';
$string['configmoodle'] = 'Moodle ist noch nicht konfiguriert. Sie müssen zuerst die Datei config.php bearbeiten.';
$string['erroroccur'] = 'Ein Fehler ist während des Vorgangs aufgetreten.';
$string['invalidarraysize'] = 'Falsche Feldgröße bei den Einstellungen von {$a}';
$string['invalideventdata'] = 'Falscher Kalendereintrag übermittelt: {$a}';
$string['invalidparameter'] = 'Ungültiger Parameterwert gefunden';
$string['invalidresponse'] = 'Ungültiger Rückgabewert gefunden';
$string['missingconfigversion'] = 'Der Vorgang wird abgebrochen, weil die Konfigurationstabelle keine Versionsangabe beinhaltet.';
$string['modulenotexist'] = 'Modul {$a} existiert nicht';
$string['morethanonerecordinfetch'] = 'Mehr als einen Datensatz in fetch() gefunden!';
$string['mustbeoveride'] = 'Die Funktion {$a} muss geändert werden.';
$string['noadminrole'] = 'Keine Admin-Rolle gefunden!';
$string['noblocks'] = 'Keine Blöcke installiert!';
$string['nocate'] = 'Keine Kursbereiche!';
$string['nomodules'] = 'Keine Module gefunden!';
$string['nopageclass'] = 'Importierte {$a}, fand aber keine page classes.';
$string['noreports'] = 'Kein Zugriff auf Berichte';
$string['notables'] = 'Keine Tabellen!';
$string['phpvaroff'] = 'Die PHP-Variable \'{$a->name}\' sollte ausgeschaltet werden: {$a->link}';
$string['phpvaron'] = 'Die PHP-Variable \'{$a->name}\' sollte eingeschaltet werden: {$a->link}';
$string['sessionmissing'] = 'Objekt {$a} fehlt für Session';
$string['sqlrelyonobsoletetable'] = 'Dieses SQL beinhaltet fehlerhafte Tabellen: {$a}! Ein Entwickler muss den Code korrigieren.';
$string['withoutversion'] = 'Die Datei version.php ist nicht lesbar oder nicht vorhanden.';
$string['xmlizeunavailable'] = 'Funktionen xmlize sind nicht verfügbar.';
