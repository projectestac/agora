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
 * Strings for component 'tool_uploaduser', language 'de', branch 'MOODLE_23_STABLE'
 *
 * @package   tool_uploaduser
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['allowdeletes'] = 'Löschen erlauben';
$string['allowrenames'] = 'Umbenennen erlauben';
$string['allowsuspends'] = 'Nutzersperrung und -aktivierung erlauben';
$string['csvdelimiter'] = 'CSV Trennzeichen';
$string['defaultvalues'] = 'Standardwerte';
$string['deleteerrors'] = 'Fehler löschen';
$string['encoding'] = 'Encoding';
$string['errors'] = 'Fehler';
$string['nochanges'] = 'Keine Änderungen';
$string['pluginname'] = 'Nutzerupload';
$string['renameerrors'] = 'Fehler beim Umbenennen';
$string['requiredtemplate'] = 'Erforderlich. Geben Sie hier die Vorlagestruktur ein (%l = Nachname, %f = Vorname, %u = Anmeldename). In der Hilfedatei finden Sie weitere Details und Beispiele.';
$string['rowpreviewnum'] = 'Vorschau für Zeilen';
$string['uploadpicture_baduserfield'] = 'Die angegebene Nutzereigenschaft ist ungültig. Bitte versuchen Sie es noch einmal.';
$string['uploadpicture_cannotmovezip'] = 'Die ZIP-Datei kann nicht in das temporäre Verzeichnis verschoben werden.';
$string['uploadpicture_cannotprocessdir'] = 'Die entzippten Dateien können nicht verarbeitet werden.';
$string['uploadpicture_cannotsave'] = 'Das Nutzerbild für {$a} kann nicht gespeichert werden. Prüfen Sie die ursprüngliche Bilddatei.';
$string['uploadpicture_cannotunzip'] = 'Die Bilddateien können nicht entpackt werden.';
$string['uploadpicture_invalidfilename'] = 'Die Bilddatei {$a} enthält ungültige Zeichen im Namen und wird nicht benutzt.';
$string['uploadpicture_overwrite'] = 'Vorhandene Nutzerbilder überschreiben?';
$string['uploadpictures'] = 'Nutzerbilder hochladen';
$string['uploadpictures_help'] = '<h2>Nutzerbilder gepackt hochladen</h2>

<p>Nutzerbilder können als gezipptes Paket mit mehreren Dateien hochgeladen werden. Moodle kann dann die darin enthaltenen Dateien den einzelnen Nutzern als Portrait zuordnen. Die Bilddateien müssen dazu in geeigneter Weise benannt sein <i>gewählte Nutzerattribut-Erweiterung</i>. Wenn Sie als Nutzerattribut den Nutzernammen gewählt haben und dieser lautet nutzer1234, dann muss die Bilddatei nutzer1234.jpg heißen.</p>
<p>zulässige Bilddateitypen sind gif, jpg und png.</p>
<p>Groß- und Kleinschreibung bei den Dateinamen wird nicht berücksichtigt.</p>';
$string['uploadpicture_userfield'] = 'Nutzereigenschaft, die fürdie Zuordnung der Nutzerbilder verwandt werden soll:';
$string['uploadpicture_usernotfound'] = 'Nutzer/in mit \'{$a->userfield}\'-Wert von \'{$a->uservalue}\' existiert nicht. Wird übersprungen.';
$string['uploadpicture_userskipped'] = 'Nutzerbild {$a} exitiert bereits und wird nicht überschrieben.';
$string['uploadpicture_userupdated'] = 'Nutzerbild {$a} aktualisiert';
$string['uploadusers'] = 'Nutzerliste hochladen';
$string['uploadusers_help'] = 'Nutzer/innen können als Textdatei hochgeladen (und optional auch in Kurse eingeschrieben) werden.

Das Format der Textdatei sollte folgendermaßen aussehen:
* Jede Zeile der Datei enthält genau einen Datensatz
* Jeder Datensatz besteht aus einer Reihe von Datenfeldern, die durch Kommas (oder andere Trennzeichen) getrennt sind
* Der erste Datensatz der Datei enthält eine Liste der benutzten Feldnamen und legt die Struktur der restlichen Zeilen fest
* Notwendige Feldnamen sind
username, password, firstname, lastname, email';
$string['uploaduserspreview'] = 'Vorschau Nutzer-Upload';
$string['uploadusersresult'] = 'Ergebnisse Nutzer-Upload';
$string['useraccountupdated'] = 'Nutzer/in aktualisiert';
$string['useraccountuptodate'] = 'Nutzer/in aktuell';
$string['userdeleted'] = 'Nutzer/in gelöscht';
$string['userrenamed'] = 'Nutzer/in umbenannt';
$string['userscreated'] = 'Nutzer/innen angelegt';
$string['usersdeleted'] = 'Nutzer/innen gelöscht';
$string['usersrenamed'] = 'Nutzer/innen umbenannt';
$string['usersskipped'] = 'Nutzer/innen übersprungen';
$string['usersupdated'] = 'Nutzer/innen aktualisiert';
$string['usersweakpassword'] = 'Nutzer/innen mit schwachem Kennwort';
$string['uubulk'] = 'Für Bulkprozess auswählen';
$string['uubulkall'] = 'Alle Nutzer/innen';
$string['uubulknew'] = 'Neue Nutzer/innen';
$string['uubulkupdated'] = 'Aktualisierte Nutzer/innen';
$string['uucsvline'] = 'CSV-Zeile';
$string['uulegacy1role'] = '(Original Student) typeN=1';
$string['uulegacy2role'] = '(Original Teacher) typeN=2';
$string['uulegacy3role'] = '(Original Non-editing teacher) typeN=3';
$string['uunoemailduplicates'] = 'Doppelte E-Mail-Adressen verhindern';
$string['uuoptype'] = 'Upload Typ';
$string['uuoptype_addinc'] = 'Alle hinzufügen, bei Bedarf einen Zähler beim Anmeldenamen anhängen';
$string['uuoptype_addnew'] = 'Neue hinzufügen, vorhandene überspringen';
$string['uuoptype_addupdate'] = 'Neue hinzufügen, vorhandene aktualisieren';
$string['uuoptype_update'] = 'Nur vorhandene aktualisieren';
$string['uupasswordcron'] = 'Erstellt in Cron';
$string['uupasswordnew'] = 'Neues Kennwort';
$string['uupasswordold'] = 'Existierendes Kennwort';
$string['uustandardusernames'] = 'Anmeldenamen standardisieren';
$string['uuupdateall'] = 'Mit Datei- und Standardwerten überschreiben';
$string['uuupdatefromfile'] = 'Mit Dateiwerten überschreiben';
$string['uuupdatemissing'] = 'Fehlendes aus Datei- und Standardwerten übernehmen';
$string['uuupdatetype'] = 'Vorhandene Nutzerdetails';
$string['uuusernametemplate'] = 'Vorlage für Anmeldenamen';
