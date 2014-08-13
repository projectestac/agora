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
 * Strings for component 'report_performance', language 'de', branch 'MOODLE_26_STABLE'
 *
 * @package   report_performance
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['check_backup'] = 'Automatische Sicherung';
$string['check_backup_comment_disable'] = 'Die Leistung kann während des Sicherungsvorgangs beeinträchtigt sein. Wenn die Option aktiviert ist, sollten die Sicherungen in verkehrarmen Zeiten eingeplant werden.';
$string['check_backup_comment_enable'] = 'Die Leistung kann während des Sicherungsvorgangs beeinträchtigt sein. Die Sicherungen sollten in verkehrarmen Zeiten eingeplant werden.';
$string['check_backup_details'] = 'Wenn automatische Sicherungen aktiviert sind, werden zum angegebenen Zeitpunkt automatisch von allen Kursen Sicherungen angelegt. Während dieses Vorgangs werden Serverressourcen benötigt und die Leistung beeinträchtigt.';
$string['check_cachejs_comment_disable'] = 'Wenn aktiviert, wird die Leistung zum Laden der Seite verbessert.';
$string['check_cachejs_comment_enable'] = 'Wenn deaktiviert, kann die Seite langsam laden.';
$string['check_cachejs_details'] = 'Javascript Caching und Kompression kann die Leistung beim Laden der Seite positiv beeinflussen. Für produktive Seiten wird dies empfohlen.';
$string['check_debugmsg_comment_developer'] = 'Wenn diese Option nicht auf DEVELOPER gesetzt ist, kann die Leistung geringfügig verbessert werden.';
$string['check_debugmsg_comment_nodeveloper'] = 'Wenn diese Option auf DEVELOPER gesetzt ist, kann die Leistung geringfügig beeinträchtigt sein.';
$string['check_debugmsg_details'] = 'Wenn Sie kein Entwickler sind, gibt es eigentlich keinen Grund, den Developer-Level zu aktivieren. Für Entwickler ist es jedoch durchaus emphehlenswert.<p>Nachdem Sie eine Fehlermeldung gesehen haben, sollten Sie sich diese kopieren und abspeichern. Stellen Sie dann den Entwickler-Debug-Modus wird auf Keine zurück.Debug-Fehlermeldung werden auch von anderren Nutzern gesehen. Hacker können daraus Schlüsse über die Konfiguration Ihrer Seite und Schwachstellen ziehen. Der Debug-Modus kann sich auch auf die Performance auswirken.</p>';
$string['check_enablestats_comment_disable'] = 'Statistische Berechnungen können die Leistung beeinflussen. Die Einstellungen sollten daher mit Vorsicht vorgenommen werden.';
$string['check_enablestats_comment_enable'] = 'Statistische Berechnungen können die Leistung beeinflussen. Die Einstellungen sollten daher mit Vorsicht vorgenommen werden.';
$string['check_enablestats_details'] = 'Die Aktivierung dieser Option führt dazu, dass bei der Abarbeitung des Cron-Jobs die Logdaten ausgewertet werden, um statistische Auswertungen zu erstellen.Je nachdem wie viel Betrieb auf Ihrer Plattform ist, kann dies einige Zeit in Ansprucch nehmen.<p>Während des Prozesses werden mehr Serverressourcen in Anspruch genommen. Dies kann die Leistung beeinflussen.</p>';
$string['check_themedesignermode_comment_disable'] = 'Wenn aktiviert, werden Bilder und Style Sheets nicht gecacht. Das führt zu spürbaren Leistungseinbussen.';
$string['check_themedesignermode_comment_enable'] = 'Wenn aktiviert, werden Bilder und Style Sheets gecacht. Das führt zu spürbaren Leistungsverbesserungen.';
$string['check_themedesignermode_details'] = 'Dies ist bei langsamen Moodle-Sites oft der Fall.<p>Durchschnittlich erfordert die Aktivierung des Designer-Modus die doppelte CPU-Kraft wie der sonstige Betrieb.</p>';
$string['comments'] = 'Kommentare';
$string['disabled'] = 'Deaktiviert';
$string['edit'] = 'Bearbeiten';
$string['enabled'] = 'Aktiviert';
$string['issue'] = 'Ausgabe';
$string['morehelp'] = 'weitere Hilfe';
$string['performancereportdesc'] = 'Diese Übersicht zeigt Faktoren auf, die sich auf die Performance der Website {$a} auswirken könnten.';
$string['performance:view'] = 'Performanceübersicht anzeigen';
$string['pluginname'] = 'Performanceübersicht';
$string['value'] = 'Wert';
