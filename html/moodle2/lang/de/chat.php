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
 * Strings for component 'chat', language 'de', branch 'MOODLE_24_STABLE'
 *
 * @package   chat
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activityoverview'] = 'Es gibt einen angekündigten Chat.';
$string['ajax'] = 'Chat mit Ajax';
$string['autoscroll'] = 'Automatisch scrollen';
$string['beep'] = 'beep';
$string['cantlogin'] = 'Anmeldung im Chat fehlgeschlagen!!';
$string['chat:addinstance'] = 'Neuen Chat hinzufügen';
$string['chat:chat'] = 'Chat betreten';
$string['chat:deletelog'] = 'Chat-Logdaten löschen';
$string['chat:exportparticipatedsession'] = 'Chat-Sitzung mit eigener Teilnahme exportieren';
$string['chat:exportsession'] = 'Alle Chat-Sitzungen exportieren';
$string['chatintro'] = 'Beschreibung';
$string['chatname'] = 'Name des Chats';
$string['chat:readlog'] = 'Chat-Logdaten sehen';
$string['chatreport'] = 'Chat-Protokolle';
$string['chat:talk'] = 'Im Chat sprechen';
$string['chattime'] = 'Nächster Chat';
$string['composemessage'] = 'Mitteilung schreiben';
$string['configmethod'] = 'Die Methode \'Ajax-Chat\'  bietet eine ajaxbasierte Oberfläche, die sich regelmäßig mit dem Server zur Aktualisierung verbindet. Diese Methode funktioniert nur mit modernen Browsern und aktiviertem Ajax/JavaScript.
<br />Bei der Methode \'Standard-Chat\' laden alle Clients regelmäßig die gesamte Chat-Seite neu vom Server, was zwar keine Konfiguration erfordert und immer funktioniert, aber durch dauernde Anfragen zu einer sehr hohen Serverbelastung führen kann.
<br />Die Verwendung eines speziellen Chat-Server-Daemons erfordert eine zusätzliche Installation auf dem Server, aber liefert eine schnelle skalierbare Chat-Umgebung.';
$string['confignormalupdatemode'] = 'Chat-Aktualisierungen arbeiten normalerweise mit dem Modus <em>KeepAlive</em> von HTTP 1.1, was aber den Server sehr stark beansprucht. Eine andere Variante nutzt den Modus <em>Stream</em> zur Aktualisierung der Anzeige. <em>Stream</em> arbeitet wesentlich besser (ähnlich wie chatd), aber eventuell unterstützt Ihr Server diese Methode nicht.';
$string['configoldping'] = 'Nach welcher Zeit (in Sekunden) kann jemand aus der Nutzerliste gelöscht werden, wenn die Kommunikation abgebrochen scheint? Dieser Wert legt die maximale Zeit dafür fest, denn normalerweise werden Kommunikationsabbrüche schnell erkannt. Zu kleine Werte führen zu einer sehr hohen Serverbelastung! Setzen Sie den Wert für den "Standard-Chat"  <strong>niemals</strong> kleiner als 2 * chat_refresh_room!!';
$string['configrefreshroom'] = 'Nach welcher Zeit (in Sekunden) soll der Chat aktualisiert werden? Ein niedriger Wert lässt den Chat schneller erscheinen, führt aber bei hohen Nutzerzahlen zu einer wesentlich höheren Serverbelastung. Falls Sie den Modus <em>Stream</em> verwenden, können Sie kleinere Werte wählen (probieren Sie es mit 2 Sekunden).';
$string['configrefreshuserlist'] = 'Nach welcher Zeit (in Sekunden) soll die Nutzerliste aktualisiert werden?';
$string['configserverhost'] = 'Hostname des Chat-Servers';
$string['configserverip'] = 'IP-Adresse des Chat-Servers';
$string['configservermax'] = 'Maximal erlaubte Nutzerzahl im Chat';
$string['configserverport'] = 'Server-Port des Chat-Servers';
$string['currentchats'] = 'Aktive Chat-Sitzungen';
$string['currentusers'] = 'Aktuelle Nutzer/innen';
$string['deletesession'] = 'Diese Sitzung löschen';
$string['deletesessionsure'] = 'Möchten Sie diese Sitzung wirklich löschen?';
$string['donotusechattime'] = 'Keinen Termin anzeigen';
$string['enterchat'] = 'Chat betreten';
$string['entermessage'] = 'Schreiben Sie Ihre Nachricht.';
$string['errornousers'] = 'Niemanden gefunden!';
$string['explaingeneralconfig'] = 'Diese Einstellungen werden <strong>immer</strong> benutzt';
$string['explainmethoddaemon'] = 'Diese Einstellungen sind <strong>nur erforderlich</strong>, wenn Sie die Methode \'Chat-Server-Daemon\' gewählt haben';
$string['explainmethodnormal'] = 'Diese Einstellungen sind <strong>nur erforderlich</strong>, wenn Sie die Methode \'Standard-Chat\' gewählt haben.';
$string['generalconfig'] = 'Grundeinstellungen';
$string['idle'] = 'Leerlauf';
$string['inputarea'] = 'Eingabefeld';
$string['invalidid'] = 'Chat-Raum wurde nicht gefunden!';
$string['list_all_sessions'] = 'Alle Sitzungen auflisten';
$string['list_complete_sessions'] = 'Beendete Sitzungen auflisten';
$string['listing_all_sessions'] = 'Alle Sitzungen werden aufgelistet';
$string['messagebeepseveryone'] = '{$a} piepst jeden an!';
$string['messagebeepsyou'] = '{$a} hat Sie angepiepst!';
$string['messageenter'] = '{$a} hat den Chat gerade betreten';
$string['messageexit'] = '{$a} hat den Chat verlassen';
$string['messages'] = 'Mitteilungen';
$string['messageyoubeep'] = 'Sie haben {$a} angepiepst';
$string['method'] = 'Chat-Methode';
$string['methodajax'] = 'Ajax-Chat';
$string['methoddaemon'] = 'Chat-Server-Daemon';
$string['methodnormal'] = 'Standard-Chat';
$string['modulename'] = 'Chat';
$string['modulename_help'] = 'Im Chat diskutieren kleine Gruppen bis zu sechs Personen aktuelle Lerninhalte und Aufgaben.

Die Chat-Funktion in Moodle ist für den Einsatz mit kleinen Gruppen konzipiert. Bei großen Gruppen entsteht eine hohe Belastung auf den Webservern.

Ein Chat kann eine einmalige Aktivität sein, täglich oder wöchentlich wiederholt werden. Chat-Sitzungen können gespeichert und veröffentlicht werden.';
$string['modulenameplural'] = 'Chats';
$string['neverdeletemessages'] = 'Nie löschen';
$string['nextsession'] = 'Nächste Sitzung';
$string['nochat'] = 'Kein Chat gefunden';
$string['no_complete_sessions_found'] = 'Keine beendete Sitzung gefunden';
$string['noguests'] = 'Der Chat ist für Gäste nicht zugänglich';
$string['nomessages'] = 'Bisher keine Mitteilungen';
$string['nopermissiontoseethechatlog'] = 'Sie sind nicht berechtigt, die Chat-Protokolle anzusehen.';
$string['normalkeepalive'] = 'KeepAlive';
$string['normalstream'] = 'Stream';
$string['noscheduledsession'] = 'Kein Termin vorgesehen';
$string['notallowenter'] = 'Sie dürfen den Chat nicht betreten.';
$string['notlogged'] = 'Nicht angemeldet!';
$string['oldping'] = 'Timeout';
$string['page-mod-chat-x'] = 'Jede Chat-Seite';
$string['pastchats'] = 'Vorherige Chat-Sitzungen';
$string['pluginadministration'] = 'Chat-Administration';
$string['pluginname'] = 'Chat';
$string['refreshroom'] = 'Aktualisierung Chat';
$string['refreshuserlist'] = 'Aktualisierung Nutzerliste';
$string['removemessages'] = 'Alle Mitteilungen entfernen';
$string['repeatdaily'] = 'Täglich zur gleichen Zeit';
$string['repeatnone'] = 'Nur zum angegebenen Termin';
$string['repeattimes'] = 'Wiederholungen';
$string['repeatweekly'] = 'Wöchentlich zur gleichen Zeit';
$string['saidto'] = 'sagte zu';
$string['savemessages'] = 'Sitzungen speichern';
$string['seesession'] = 'Sitzung ansehen';
$string['send'] = 'Senden';
$string['sending'] = 'wird gesendet';
$string['serverhost'] = 'Servername';
$string['serverip'] = 'Server-IP';
$string['servermax'] = 'Maximale Nutzerzahl';
$string['serverport'] = 'Server-Port';
$string['sessions'] = 'Chat-Sitzungen';
$string['sessionstart'] = 'Chat beginnt in: {$a}';
$string['strftimemessage'] = '%H:%M';
$string['studentseereports'] = 'Chat-Protokolle sichtbar für alle';
$string['studentseereports_help'] = 'Mit der Einstellung \'Nein\' dürfen nur Nutzer/innen mit der Berechtigung mod/chat:readlog die Chat-Protokolle sehen.';
$string['talk'] = 'Sprechen';
$string['updatemethod'] = 'Aktualisierungsmodus';
$string['updaterate'] = 'Aktualisierungsrate:';
$string['userlist'] = 'Teilnehmerliste';
$string['usingchat'] = 'Chat verwenden';
$string['usingchat_help'] = 'Das Modul \'Chat\' besitzt Fähigkeiten, die das Chatten schöner machen.

* Smileys - Alle Smileys (emoticons), die in Moodle nutzbar sind, werden auch im Chat angezeigt, z.B. :-)
* Links - Webadressen werden automatisch in Links umgewandelt
* Personalisierung - Wenn eine Zeile mit "/me" oder ":" beginnt, wird dies durch Ihren Namen ersetzt. Wenn Ihr Name beispielsweise Kim ist und Sie geben ein: ":lacht!" oder "/me lacht!", dann werden alle sehen: "Kim lacht!"
* Beep - Signale werden an andere gesendet, wenn Sie den Link "beep" oben neben deren Namen anklicken. Um ein Signal an alle zu senden, tippen Sie "beep all" ins Chat-Fenster.
* HTML - Wenn Sie sich ein bisschen mit HTML-Code auskennen, können Sie damit auch Bilder in Ihren Text einfügen, Farben ändern oder Sounds abspielen';
$string['viewreport'] = 'Chat-Protokolle anzeigen';
