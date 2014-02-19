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
 * Strings for component 'block_quickmail', language 'de', branch 'MOODLE_24_STABLE'
 *
 * @package   block_quickmail
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actions'] = 'Aktionen';
$string['add_all'] = 'Alle hinzufügen';
$string['add_button'] = 'Hinzufügen';
$string['allowstudents'] = 'Studenten dürfen Quickmail nutzen';
$string['all_sections'] = 'Alle Gruppen';
$string['alternate'] = 'Alternative Email';
$string['alternate_body'] = '<p>
{$a->fullname} hat die Adresse {$a->address} als alternative Adresse für den Kurs {$a->course} hinzugefügt.
</p>

<p>
Der Zweck dieser Email ist die Überprüfung, dass diese Adresse tatsächlich existiert und ihr Besitzer die erforderlichen Berechtigungen hierfür im Moodle hat.
</p>

<p>
Wenn Sie den Prozess der Überprüfung abschließen möchten, so rufen Sie bitte den folgenden Link in Ihrem Browser auf: {$a->url}
</p>

<p>
Sollte die Beschreibung in dieser Email für Sie keinen Sinn ergeben, so haben Sie diese Email versehentlich bekommen. Dann können Sie diese Nachricht getrost ignorieren.
</p>

Herzlichen Dank.';
$string['alternate_from'] = 'Moodle: Quickmail';
$string['alternate_new'] = 'Alternative Adresse hinzufügen';
$string['alternate_subject'] = 'Überprüfung der alternativen Email Adresse';
$string['approved'] = 'Angenommen';
$string['are_you_sure'] = 'Sind Sie sicher, dass Sie {$a->title} löschen wollen? Dieser Vorgang kann nicht widerrufen werden!';
$string['attachment'] = 'Anhänge';
$string['backup_history'] = 'Quickmail Verlauf einschließen';
$string['composenew'] = 'Neue E-Mail erstellen';
$string['config'] = 'Konfiguration';
$string['courseferpa'] = 'Gruppenmodus respektieren';
$string['courselayout'] = 'Kurs Layout';
$string['courselayout_desc'] = 'Passt das Kurs Layout an, welches zur Darstellung der Quickmail Seiten genutzt wird. Aktivieren Sie diese Einstellung, fallls Sie Probleme mit festen Breiten in Moodle-Formularen haben.';
$string['default_flag'] = 'Standard';
$string['delete_confirm'] = 'Wollen Sie wirklich folgende Nachricht löschen: {$a}';
$string['delete_failed'] = 'Konnte E-Mail nicht löschen';
$string['download_all'] = 'Alle herunterladen';
$string['drafts'] = 'Entwürfe';
$string['email'] = 'E-Mail';
$string['entry_activated'] = 'Die alternative E-Mail {$a->address} kann nun im Kurs {$a->course} verwendet werden.';
$string['entry_failure'] = 'Die E-Mail an {$a->address} kann nicht versandt werden. Bitte überprüfen Sie, ob die Adresse {$a->address} existiert, und versuchen Sie es dann erneut.';
$string['entry_key_not_valid'] = 'Der Aktivierungslink für {$a->address} ist nicht mehr gültig. Im nächsten Schritt wird der Aktivierungslink erneut gesendet.';
$string['entry_saved'] = 'Die alternative Adresse {$a->address} wurde gespeichert.';
$string['entry_success'] = 'Um ihre E-Mail Adresse zu überprüfen wurde eine E-Mail an {$a->address} gesendet. Befolgen Sie die weiteren Hinweise in ihrer E-Mail um ihre E-Mail Adresse zu bestätigen.';
$string['ferpa'] = 'FERPA Modus';
$string['ferpa_desc'] = 'Quickmail wird entsprechend dieser Einstellung entweder den Gruppenmodus des Kurses beachten, alle Gruppenmodi bis auf separate Gruppen ignorieren oder Gruppen komplett ignorieren.';
$string['from'] = 'Von';
$string['history'] = 'Verlauf';
$string['log'] = 'Verlauf';
$string['message'] = 'Nachricht';
$string['moodle_attachments'] = 'Moodle Anhänge ({$a})';
$string['no_alternates'] = 'Keine alternativen E-Mails für {$a->fullname} gefunden. Erstellen Sie eine im nächsten Schritt.';
$string['no_course'] = 'Ungültige Kurs-ID ({$a})';
$string['no_drafts'] = 'Sie haben keine gespeicherten Entwürfe.';
$string['no_email'] = 'Konnte E-Mail an {$a->firstname} {$a->lastname} nicht versenden.';
$string['noferpa'] = 'Gruppen ignorieren';
$string['no_filter'] = 'Kein Filter';
$string['no_log'] = 'Ihr Verlauf ist noch leer.';
$string['no_permission'] = 'Sie haben derzeit keine Berechtigung, mit Quickmail E-Mails zu versenden.';
$string['no_section'] = 'Keine Gruppe';
$string['no_selected'] = 'Sie müssen einen oder mehrere Empfänger auswählen, um eine E-Mail zu versenden.';
$string['no_subject'] = 'Sie müssen einen Betreff angeben';
$string['not_valid'] = 'Dieser Betrachtungsmodus existiert nicht ({$a})';
$string['not_valid_action'] = 'Sie müssen eine gültige Aktion angeben: {$a}';
$string['not_valid_typeid'] = 'Sie müssen eine gültige E-Mail-ID angeben: {$a}';
$string['not_valid_user'] = 'Sie haben derzeit keine Berechtigung, den Verlauf von anderen Nutzern zu betrachten.';
$string['no_type'] = 'Dieser Betrachtungsmodus existiert nicht ({$a})';
$string['no_usergroups'] = 'Es gibt in Ihrer Gruppe keine Nutzer, denen Sie eine E-Mail schreiben könnten.';
$string['no_users'] = 'Es gibt keine Benutzer, die sie anschreiben könnten.';
$string['overwrite_history'] = 'Überschreibe den Quickmail Verlauf';
$string['pluginname'] = 'Quickmail';
$string['potential_sections'] = 'Potentielle Gruppen';
$string['potential_users'] = 'Potentielle Empfänger';
$string['prepend_class'] = 'Kursname vorne anfügen';
$string['prepend_class_desc'] = 'Fügt den Kurzname des Kurses zum Betreff der E-Mail vorne hinzu.';
$string['qm_contents'] = 'Dateiinhalt herunterladen';
$string['quickmail:addinstance'] = 'Neuen Block \'Quickmail\' hinzufügen';
$string['quickmail:allowalternate'] = 'Erlaubt den Benutzern eine alternative Email-Adresse in diesem Kurs zu hinterlegen.';
$string['quickmail:canconfig'] = 'Erlaubt Benutzern das Konfigurieren ihrer Quickmail Instanz.';
$string['quickmail:candelete'] = 'Erlaubt Benutzern, E-Mails aus Ihrem Verlauf zu löschen.';
$string['quickmail:canimpersonate'] = 'Erlaubt Benutzern, sich als ein anderer Benutzer anzumelden und den Quickmail Verlauf ansehen';
$string['quickmail:cansend'] = 'Erlaubt Benutzern das Senden von E-Mails durch Quickmail';
$string['receipt'] = 'Kopie an mich';
$string['receipt_help'] = 'Sendet eine Kopie der E-Mail an meine E-Mail-Adresse';
$string['remove_all'] = 'Alle entfernen';
$string['remove_button'] = 'Entfernen';
$string['required'] = 'Bitte füllen Sie die erforderlichen Felder aus.';
$string['reset'] = 'Auf Standardeinstellungen zurücksetzen';
$string['restore_history'] = 'Wiederherstellen des Quickmail Verlaufs';
$string['role_filter'] = 'Rollen';
$string['save_draft'] = 'Entwurf speichern';
$string['selected'] = 'Empfänger';
$string['select_groups'] = 'Gruppen auswählen ...';
$string['select_roles'] = 'Nur Nutzer mit folgenden Rollen anzeigen';
$string['select_users'] = 'Nutzer auswählen ...';
$string['send_email'] = 'E-Mail senden';
$string['sig'] = 'Signatur';
$string['signature'] = 'Signaturen';
$string['strictferpa'] = 'Separate Gruppen zulassen';
$string['subject'] = 'Betreff';
$string['sure'] = 'Sind Sie sicher, dass Sie {$a->address} löschen wollen? Dieser Vorgang kann nicht widerrufen werden!';
$string['title'] = 'Titel';
$string['valid'] = 'Aktivierungsstatus';
$string['waiting'] = 'Warten...';
