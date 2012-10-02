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
 * Strings for component 'ouwiki', language 'de', branch 'MOODLE_23_STABLE'
 *
 * @package   ouwiki
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actionheading'] = 'Aktionen';
$string['add'] = 'Hinzufügen';
$string['addannotation'] = 'Anmerkung hinzufügen';
$string['addedbegins'] = '<strong>[Hinzugefügter Text]</strong>';
$string['addedends'] = '<strong>[Ende des hinzugefügten Textes]</strong>';
$string['addnewsection'] = 'Neuen Bereich hinzufügen';
$string['advice_annotate'] = '<p>Anmerkung zur nachfolgenden Seite hinzufügen
</p>
<ul>
<li>Um eine Anmerkung zu schreiben, klicken Sie auf das entsprechende Icon und geben Sie den notwendigen Text ein.</li>
<li>Neue und vorhandene Anmerkungen können gelöscht werden, indem Sie den gesamten Text aus dem Formularfeld entfernen.</li></ul>';
$string['advice_diff'] = 'Die ältere Version ist links <span class=\'accesshide\'> unter der Überschrift \'Ältere Version\'</span>  zu sehen. Gelöschter Text ist hervorgehoben. Hinzugefügter Text wird in der neueren Version rechts <span class=\'accesshide\'> unter der Überschrift \'Neuere Version\'</span> angezeigt. <span class=\'accesshide\'>Jede Änderung wird von einem entsprechenden Icons eingerahmt.</span>';
$string['advice_edit'] = '<p>Seite bearbeiten</p>
<ul>
<li>Für einen Link zu einer anderen Seite setzen Sie den Seitennamen in eckigen Klammern: [[Seitenname]].</li>
<li>Zum Erstellen einer neuen Seite setzen Sie den neuen Seitennamen ein. Die neue Seite wird automatisch erstellt, sobald jemand klickt, etwas schreibt und die neue Seite sichert.{$a}</li>
</ul>
</p>';
$string['advice_history'] = '<p>Die Übersicht zeigt alle Änderungen der <a href="{$a}">aktuellen Seite</a>.</p>
<p>Sie können ältere Versionen anzeigen oder nachschauen, was in einer bestimmten Version geändert wurde. Wenn Sie zwei Versionen vergleichen möchten, wählen Sie die entsprechenden Schaltflächen aus und klicken auf \'Auswahl vergleichen\'</p>';
$string['advice_missingpage'] = 'Diese Seite wurde verlinkt, aber bisher noch nicht erstellt.';
$string['advice_missingpages'] = 'Diese Seiten wurden verlinkt, aber bisher noch nicht erstellt.';
$string['advice_viewdeleted'] = 'Sie sehen sich eine gelöschte Version dieser Seite an.';
$string['advice_viewold'] = 'Sie sehen sich eine alte Version dieser Seite an.';
$string['advice_wikirecentchanges_changes'] = '<p>Die Übersicht zeigt alle Änderungen auf den Seiten dieses Wikis beginnend mit den letzten Änderungen. Die neueste Version jeder Seite ist hervorgehoben.</p>
<p>Mit Hilfe der Links kann man sehen, wie die Seite nach einer bestimmten Änderung aussah und was sich im Moment ändert.</p>';
$string['advice_wikirecentchanges_changes_nohighlight'] = '<p>Diese Übersicht zeigt alle Seitenänderungen im Wikis, beginnend mit den letzten Änderungen.</p>
<p>Über die Links können Sie sehen, wie die Seite bei einer bestimmten Änderung aussah und was sich in diesem Moment geändert hat.</p>';
$string['advice_wikirecentchanges_pages'] = '<p>Diese Übersicht zeigt, wann jede Seite zum Wiki hinzugefügt wurde, beginnend mit der zuletzt angelegten Seite.</p>';
$string['ajaxnotenabled'] = 'AJAX ist in Ihrem Nutzerprofil nicht aktiviert.';
$string['allowediting_help'] = '<p>Wenn diese Option aktiviert ist, wird das Wiki bis zum angegebenen Datum schreibgeschützt. Nutzer/innen können in diesem Modus alle Seiten und Versionen sehen, sich an der Diskussion beteiligen, aber keine Änderungen vornehmen.</p>

<h2>Änderungen verhindern ab</h2>
Wenn diese Option aktiviert ist, wird das Wiki ab dem angegebenen Datum schreibgeschützt.</p>';
$string['annotate'] = 'Anmerken';
$string['annotatingpage'] = 'Seite für Anmerkungen';
$string['annotationmarker'] = 'Anmerkungshinweis';
$string['annotations'] = 'Anmerkungen';
$string['annotationsystem'] = 'Anmerkungssystem';
$string['attachments'] = 'Anhänge';
$string['cannotlockpage'] = 'Die Seite konnte nicht gesperrt werden. Ihre Änderungen wurden nicht gesichert.';
$string['changebutton'] = 'Ändern';
$string['changedby'] = 'geändert von';
$string['changes'] = 'Änderungen';
$string['changesnav'] = 'Änderungen';
$string['collapseallannotations'] = 'Anmerkungen einklappen';
$string['collapseannotation'] = 'Anmerkung einklappen';
$string['compare'] = 'Vergleichen';
$string['compareselected'] = 'Auswahl vergleichen';
$string['completionedits'] = 'Änderungen müssen vorgenommen werden:';
$string['completioneditsgroup'] = 'Änderungen notwendig';
$string['completioneditshelp'] = 'Änderungen sind notwendig, um die Aktivität abschließen zu können.';
$string['completionpages'] = 'Neue Seiten müssen erstellen:';
$string['completionpagesgroup'] = 'Neue Seiten notwendig';
$string['completionpageshelp'] = 'Um die Aktivität abschließen zu können, müssen neue Seiten erstellt werden.';
$string['contributions'] = '<strong>{$a->pages}</strong> neue Seite{$a->pagesplural}, <strong>{$a->changes}</strong> andere Änderungen{$a->changesplural}.';
$string['contributionsbyuser'] = 'Beiträge nach Nutzer/in';
$string['contributionsgrouplabel'] = 'Gruppe';
$string['countdowntext'] = 'Das Wiki erlaubt Änderungen nur innerhalb von {$a} Minuten. Sichern Sie Ihre Änderungen, bevor die erlaubte Zeit (Anzeige rechts) bei Null angekommen ist.';
$string['countdownurgent'] = 'Bitte sichern Sie jetzt Ihre Änderungen oder brechen Sie die Bearbeitung ab. Wenn die Zeit abgelaufen ist, werden die Änderungen automatisch gesichert.';
$string['create'] = 'Erstellen';
$string['createdbyon'] = 'Erstellt von {$a->name} am {$a->date}';
$string['createlinkedwiki'] = 'Neue Seite wird erstellt';
$string['createnewpage'] = 'Neue Seite hinzufügen';
$string['createpage'] = 'Seite erstellen';
$string['csvdownload'] = 'Als Tabelle herunterladen (.csv, utf-8)';
$string['current'] = 'aktuell';
$string['currentversion'] = 'Aktuelle Version';
$string['currentversionof'] = 'Aktuelle Version von';
$string['deletedbegins'] = '<strong>[Gelöschter Text]</strong>';
$string['deletedends'] = '<strong>[Ende des gelöschten Textes]</strong>';
$string['deleteorphanedannotations'] = 'Verlorene Anmerkungen löschen';
$string['deleteversionerror'] = 'Fehler beim Löschen der Version';
$string['deleteversionerrorversion'] = 'Eine nicht vorhandene Version kann nicht gelöscht werden';
$string['detail'] = 'Detail';
$string['diff_nochanges'] = 'Bei dieser Bearbeitung wurden keine Änderungen im Text vorgenommen, so dass keine Unterschiede markiert sind. Es könnte Änderungen in der Darstellung geben.';
$string['diff_someannotations'] = 'Bei dieser Bearbeitung wurden keine Änderungen im Text vorgenommen, so dass keine Unterschiede markiert sind. Es wurden allerdings Anmerkungen vorgenommen. Außerdem könnte es Änderungen in der Darstellung geben.';
$string['displayversion'] = 'OU Wiki-Version: <strong>{$a}</strong>';
$string['downloadspreadsheet'] = 'Als Tabelle herunterladen';
$string['duplicatepagetitle'] = 'Der Titel der neuen Seite darf nicht mit dem einer vorhandenen Seite übereinstimmen.';
$string['editbegin'] = 'Änderungen erlauben ab';
$string['editbegin_help'] = '<p>Wenn diese Option aktiviert ist, wird das Wiki bis zum angegebenen Datum schreibgeschützt. Nutzer/innen können in diesem Modus alle Seiten und Versionen sehen, sich an der Diskussion beteiligen, aber keine Änderungen vornehmen.</p>';
$string['editedby'] = 'Bearbeitet von {$a}';
$string['editend'] = 'Änderungen verhindern ab';
$string['editend_help'] = 'Wenn diese Option aktiviert ist, wird das Wiki ab dem angegebenen Datum schreibgeschützt.';
$string['editingpage'] = 'Seite wird bearbeitet';
$string['editingsection'] = 'Abschnitt \'{$a}\' wird bearbeitet';
$string['editpage'] = 'Seite bearbeiten';
$string['editsection'] = 'Abschnitt bearbeiten';
$string['emptypagetitle'] = 'Der Titel der neuen Seite darf nicht leer sein.';
$string['emptysectiontitle'] = 'Der Bereichsname darf nicht leer sein.';
$string['endannotation'] = 'Ende der Anmerkung';
$string['entirewiki'] = 'Gesamtes Wiki';
$string['error_export'] = 'Fehler beim Exportieren der Wikidaten';
$string['excelcsvdownload'] = 'Als Tabelle herunterladen (.csv)';
$string['expandallannotations'] = 'Anmerkungen aufklappen';
$string['expandannotation'] = 'Anmerkung aufklappen';
$string['externaldashboardadd'] = 'Wiki zur Steuerung hinzufügen';
$string['externaldashboardremove'] = 'Wiki aus der Steuerung entfernen';
$string['feedalt'] = 'Atom Feed abonnieren';
$string['feedchange'] = 'Geändert von {$a->name} (<a href=\'{$a->url}\'>Änderungen zeigen</a>)';
$string['feeddescriptionchanges'] = 'Liste aller Änderungen im Wiki. Abonnieren Sie diesen Feed, wenn Sie über jede Änderung informiert sein möchten.';
$string['feeddescriptionhistory'] = 'Liste aller Änderungen dieser Seite im Wikis. Abonnieren Sie diesen Feed, wenn Sie informiert werden möchten, sobald jemand die Seite bearbeitet.';
$string['feeddescriptionpages'] = 'Liste aller neuen Seiten im Wikis. Abonnieren Sie diesen Feed, wenn Sie informiert werden möchten, sobald jemand eine neue Seite hinzufügt.';
$string['feeditemdescriptiondate'] = '{$a->main} am {$a->date}.';
$string['feeditemdescriptionnodate'] = '{$a->main}';
$string['feednewpage'] = 'Erstellt von {$a->name}';
$string['feedsubscribe'] = 'Sie können einen Feed mit diesen Informationen abonnieren: <a href=\'{$a->atom}\'>Atom</a> oder <a href=\'{$a->rss}\'>RSS</a>.';
$string['feedtitle'] = '{$a->course} Wiki: {$a->name} - {$a->subtitle}';
$string['format_html'] = 'Online anzeigen';
$string['format_rtf'] = 'Im Textformat herunterladen';
$string['format_template'] = 'Als Wiki-Vorlage herunterladen';
$string['frompage'] = 'von {$a}';
$string['frompages'] = 'von {$a}';
$string['gradesupdated'] = 'Bewertungen aktualisiert';
$string['hideannotationicons'] = 'Anmerkungen verbergen';
$string['historycompareaccessibility'] = '{$a->lastdate} {$a->createdtime} auswählen';
$string['historyfor'] = 'Versionen für';
$string['index'] = 'Übersicht';
$string['jsajaxrequired'] = 'Für diese Anmerkungsseite muss Javascript in Ihrem Browser aktiviert sein. Außerdem muss in Ihrem Nutzerprofil die Einstellung für AJAX und Javascript gesetzt sein auf \'Erweiterte Web-Features nutzen\'.';
$string['jsnotenabled'] = 'Javascript ist in Ihrem Browser nicht aktiviert.';
$string['lastchange'] = 'Letzte Änderung: {$a->date} / {$a->userlink}';
$string['linkedfrom'] = 'Seiten, die zu dieser Seite verlinken';
$string['linkedfromsingle'] = 'Seite, die zu dieser Seite verlinkt';
$string['lockcancelled'] = 'Ihre Bearbeitungssperre wurde überschrieben und ein anderer Nutzer bearbeitet die Seite nun. Wenn Sie Ihre Änderungen erhalten möchten, sollten Sie sie markieren und kopieren, dann Abbrechen klicken und dann erneut versuchen, die Seite zu bearbeiten.';
$string['lockediting'] = 'Wiki sperren - keine Änderungen möglich';
$string['lockpage'] = 'Seite sperren';
$string['missingpages'] = 'Fehlende Seiten';
$string['modulename'] = 'OU Wiki';
$string['modulename_help'] = '<p>Ein Wiki ist ein webbasiertes System, das Nutzer/innen erlaubt, eine Menge von verlinkten Seiten zu bearbeiten. In Moodle wird ein Wiki normalerweise benutzt, wenn Teilnehmer/innen Texte schreiben sollen.</p>
<p>Das OU Wiki verfügt über eine Vielfalt an Optionen. Bitte schauen Sie in die Einzelhilfen zu jeder Einstellmöglichkeit, um weitere Informationen zu erhalten.</p>';
$string['modulenameplural'] = 'OU Wikis';
$string['mustspecify2'] = 'Sie müssen zwei Versionen auswählen, um sie zu vergleichen.';
$string['myparticipation'] = 'Meine Mitarbeit';
$string['newerversion'] = 'Neuere Version';
$string['newpage'] = 'Erste Version';
$string['next'] = 'Frühere Änderungen';
$string['nextversion'] = 'Nächste: {$a}';
$string['noattachments'] = 'Keine Anhänge';
$string['nochanges'] = 'Nutzer/innen, die nicht mitgearbeitet haben';
$string['nojsbrowser'] = 'Leider wird Ihr Browser nicht vollständig unterstützt.';
$string['nojsdisabled'] = 'Sie haben in Ihrem Browser JavaScript ausgeschaltet.';
$string['nojswarning'] = 'Sie können die Seite nur für {$a->minutes} Minuten halten. Achten Sie bitte darauf, dass Sie Ihre Änderungen vor {$a->deadline} sichern (aktuell ist es {$a->now}). Andernfalls könnten andere die Seite bearbeiten und Ihre Änderungen würden verloren gehen.';
$string['noparticipation'] = 'Keine Mitarbeit anzeigbar';
$string['nousersingroup'] = 'Die gewählte Gruppe enthält keine Nutzer/innen.';
$string['nowikipages'] = 'Dieses Wiki hat noch keine Seite.';
$string['numedits'] = 'Änderungen: {$a}';
$string['numwords'] = 'Worte: {$a}';
$string['olderversion'] = 'Ältere Version';
$string['oldversion'] = 'Alte Version';
$string['onepageview'] = 'Sie können zum Ausdrucken oder als Referenz alle Seiten des Wikis anzeigen lassen.';
$string['orphanedannotations'] = 'Verlorene Anmerkungen';
$string['orphanpages'] = 'Nicht verlinkte Seiten';
$string['ouwiki:addinstance'] = 'OU Wiki anlegen';
$string['ouwiki:annotate'] = 'Anmerkungen erlauben';
$string['ouwiki:deletepage'] = 'Wikiseiten löschen';
$string['ouwiki:edit'] = 'Wikiseiten bearbeiten';
$string['ouwiki:grade'] = 'Nutzer/innen bewerten, die Zugang zum Wiki haben';
$string['ouwiki:lock'] = 'Wikiseiten sperren und entsperren';
$string['ouwiki:overridelock'] = 'Gesperrte Wikiseiten überschreiben';
$string['ouwiki:view'] = 'Wikis anzeigen';
$string['ouwiki:viewallindividuals'] = 'Nutzer Subwikis: alle zeigen';
$string['ouwiki:viewcontributions'] = 'Liste von Beträgen ansehen, sortiert nach Nutzer/innen';
$string['ouwiki:viewgroupindividuals'] = 'Nutzer Subwikis: gleiche Gruppe zeigen';
$string['ouwiki:viewparticipation'] = 'Mitarbeit aller Nutzer/innen anzeigen, die Zugriff zum Wiki haben';
$string['overridelock'] = 'Wikisperre übergehen';
$string['overviewnumentrysince'] = 'Neue Wikieinträge seit dem letzten Login';
$string['overviewnumentrysince1'] = 'Neuer Wikieintrag seit dem letzten Login';
$string['page'] = 'Seite';
$string['pagedeletedinfo'] = 'Die Liste zeigt einige gelöschte Versionen, die nur für Nutzer/innen mit dem Recht sichtbar sind, Versionen löschen zu dürfen. Normale Nutzer/innen sehen die Versionen nicht.';
$string['pagedoesnotexist'] = 'Die Seite gibt es in diesem Wiki noch nicht';
$string['pageedits'] = 'Seitenänderungen';
$string['pagelockeddetails'] = '{$a->name} hat begonnen diese Seite zu bearbeiten um {$a->lockedat} und wird noch {$a->seenat} weiter daran arbeiten. Sie können keine Änderungen vornehmen bevor er oder sie fertig ist.';
$string['pagelockeddetailsnojs'] = '{$a->name} hat begonnen diese Seite zu bearbeiten um {$a->lockedat} und wird weiter daran arbeiten bis {$a->nojs}. Sie können keine Änderungen vornehmen bevor er oder sie fertig ist.';
$string['pagelockedoverride'] = 'Sie haben die Berechtigung Änderungen anderer rückgängig zu machen und die Seitensperre aufzuheben.
Wenn Sie das machen, werden alle Änderungen der anderen verloren sein, was immer diese auch eingegeben haben.
Bitte überlegen Sie es sich also gut, bevor Sie den Überschreiben-Knopf anklicken.';
$string['pagelockedtimeout'] = 'Ihr Bearbeitungszeitraum endet um {$a}';
$string['pagelockedtitle'] = 'Diese Seite wurde von jemand anders geändert';
$string['pagenameisstartpage'] = 'Der Name der Seite ist identisch mit dem der Startseite. Bitte ändern Sie den Namen.';
$string['pagenametoolong'] = 'Der Name der Seite ist zu lang. Bitte kürzen Sie den Namen.';
$string['pagescreated'] = 'Seiten wurden erstellt';
$string['participation'] = 'Mitarbeit';
$string['participationbyuser'] = 'Mitarbeit';
$string['pluginadministration'] = 'OU Wiki Administration';
$string['pluginname'] = 'OU Wiki';
$string['preview'] = 'Vorschau';
$string['previewwarning'] = 'Die Vorschau Ihrer Änderungen wurde noch nicht gespeichert.
<strong>Wenn Sie nicht speichern, geht Ihre Arbeit verloren.</strong> Speichern können Sie, indem Sie \'Änderungen speichern\' am Ende der Seite anklicken.';
$string['previous'] = 'Neuere Änderungen';
$string['previousversion'] = 'Vorherige: {$a}';
$string['recentchanges'] = 'Letzte Änderungen';
$string['returntohistory'] = '(<a href=\'{$a}\'>Zurück zu Versionen</a>.)';
$string['returntopage'] = 'Zurück zur Wikiseite';
$string['returntoview'] = 'Aktuelle Seite anzeigen';
$string['revert'] = 'Zurücksetzen';
$string['reverterrorcapability'] = 'Sie sind nicht berechtigt, die Seite auf eine frühere Version zurückzusetzen.';
$string['reverterrorversion'] = 'Auf eine nicht existierende Seitenversion kann nicht zurückgesetzt werden';
$string['revertversion'] = 'Zurücksetzen';
$string['revertversionconfirm'] = '<p>Diese Seite wird in den Zustand vom {$a} zurückgesetzt. Alle Änderungen, die seit dem vorgenommen wurden, gehen dabei verloren. Die verlorenen Änderungen sind allerdings über die Versionen weiter verfügbar.</p><p>Sind Sie sicher, dass Sie die Seite auf diese Version zurücksetzen möchten?</p>';
$string['savedat'] = 'gesichert am {$a}';
$string['savedby'] = 'gesichert von {$a}';
$string['savefailcontent'] = 'Ihre Version der Seite ist unten angezeigt, so dass Sie mit kopieren und einfügen die relevanten Teile in einem anderen Programm bearbeiten können. Wenn Sie es später zurück ins Wiki kopieren möchten, seien Sie bitte vorsichtig und achten Sie darauf, dass Sie die Änderungen anderer nicht überschreiben.';
$string['savefaildesynch'] = 'Während Sie diese Seite bearbeiten, hat noch jemand anders Änderungen vorgenommen. (Das kann passieren, wenn Sie einen ungewöhnlichen Browser verwenden oder Javascript abgeschaltet wurde.)
Leider können Ihre Änderungen deshalb nicht gespeichert werden, weil dann die Änderungen von jemand anderem überschrieben würden.';
$string['savefaillocked'] = 'Während Sie diese Seite bearbeiten, hat jemand anders die Blockierung der Seite veranlasst. (Das kann passieren, wenn Sie einen ungewöhnlichen Browser verwenden oder Javascript abgeschaltet wurde.)
Leider können Ihre Änderungen deshalb im Moment nicht gespeichert werden.';
$string['savefailtitle'] = 'Seite kann nicht gespeichert werden';
$string['savegrades'] = 'Bewertungen sichern';
$string['savetemplate'] = 'Wiki als Vorlage sichern';
$string['search'] = 'Wiki durchsuchen';
$string['search_help'] = 'Geben Sie Ihren Suchbegriff ein.

Um exakte Ausdrücke zu suchen, nutzen Sie bitte die Anführungszeichen.

Um ein Wort aus der Suche auszuschließen, setzen Sie ein Minuszeichen direkt vor das Wort.

Beispiel:
Der Suchbegriff <tt>picasso -skulptur "frühe werke"</tt> wird Ergebnisse liefern für ‘picasso’ oder für ‘frühe werke’, aber alle Elemente ausschließen, in denen ‘skulptur’ vorkommt.';
$string['seedetails'] = 'Alle Versionen';
$string['showannotationicons'] = 'Anmerkungen zeigen';
$string['showwordcounts'] = 'Wortanzahl zeigen';
$string['showwordcounts_help'] = 'Wenn diese Option aktiviert ist, wird die Wortanzahl jeder Seite bestimmt und am unteren Ende des Textes angezeigt.';
$string['sizewarning'] = 'Diese Wikiseite ist sehr groß und könnte sehr langsam reagieren. Wenn möglich sollten Sie den Inhalt in logische Abschnitte aufteilen und ihn auf mehrere verlinkte Seiten verteilen.';
$string['startpage'] = 'Startseite';
$string['startpagedoesnotexist'] = 'Die Startseite des Wikis wurde noch nicht erstellt.';
$string['subwikis'] = 'Teilwikis';
$string['subwikis_groups'] = 'Getrennte Wikis für jede Gruppe';
$string['subwikis_help'] = '<ul>
<li><strong>Wiki für den gesamten Kurs</strong><br />
Dieses Wiki verhält sich wie ein einzelnes Wiki. Jede Person im Kurs sieht die gleichen Wikiseiten.</li>
<li><strong>Getrennte Wikis für jede Gruppe</strong><br />
Die Mitglieder jeder Gruppe sehen eine völlig unterschiedliche Kopie des Wikis (Teilwiki), u.z. bezogen auf ihre Gruppe. Sie können nur auf Seiten zugreifen, die von Mitgliedern der gleichen Gruppe erstellt wurden. Wenn Sie Mitglied in mehr als eine Gruppe sind oder wenn Sie das Recht besitzen, alle Gruppen anzuzeigen, können Sie die Gruppen über ein Menü auswählen.
<li><strong>Getrennte Wikis für alle Nutzer/innen</strong><br />
Alle Einzelnutzer/innen erhalten ein völlig anderes Wiki. Alle können nur sein eigenes Wiki sehen und bearbeiten. Wenn Sie das Recht besitzen, alle Personen anzuzeigen, können Sie die Personen über ein Menü auswählen.   (This can be used as a way for students to contribute work, although you should
consider other ways to achieve this such as the Assessment activity.)</li>
</ul>

<p>
Note that the group option works with the chosen grouping. It will ignore groups in other
groupings.
</p>';
$string['subwikis_individual'] = 'Getrennte Wikis für alle Nutzer/innen';
$string['subwikis_single'] = 'Wiki für den gesamten Kurs';
$string['summary'] = 'Beschreibung';
$string['summary_help'] = '<p>Wenn Sie eine Beschreibung eintragen, wird diese Beschreibung auf der Startseite des Wikis angezeigt, u.z. oberhalb des normalen bearbeitbaren Wikitextes. </p>

<p>Eine Beschreibung ist optional. Sie kann von Teilnehmer/innen nicht geändert werden. Wenn Sie keine Beschreibung brauchen, lassen Sie das Textfeld einfach leer.</p>';
$string['system'] = 'das System';
$string['tab_annotate'] = 'Anmerken';
$string['tab_discuss'] = 'Diskussion';
$string['tab_edit'] = 'Bearbeiten';
$string['tab_history'] = 'Versionen';
$string['tab_index_alpha'] = 'Alphabetisch';
$string['tab_index_changes'] = 'Alle Änderungen';
$string['tab_index_pages'] = 'Neue Seiten';
$string['tab_index_tree'] = 'Struktur';
$string['tab_view'] = 'Anzeigen';
$string['template'] = 'Vorlagen';
$string['thispageislocked'] = 'Diese Wikiseite ist zur Zeit gesperrt und kann nicht bearbeitet werden.';
$string['timelocked_after'] = 'Dieses Wiki ist zur Zeit gesperrt und kann nicht weiter bearbeitet werden.';
$string['timelocked_before'] = 'Dieses Wiki ist zur Zeit gesperrt. Es kann ab {$a} bearbeitet werden.';
$string['timeout'] = 'Zugelassene Bearbeitungszeit';
$string['timeout_none'] = 'Kein Timeout';
$string['tryagain'] = 'Nochmal versuchen';
$string['typeinpagename'] = 'Seitenname';
$string['typeinsectionname'] = 'Bereichsname';
$string['undelete'] = 'Wiederherstellen';
$string['unlockpage'] = 'Seite entsperren';
$string['userdetails'] = 'Detail für {$a}';
$string['usergrade'] = 'Nutzerbewertung';
$string['userparticipation'] = 'Mitarbeit der Nutzer/innen';
$string['viewdeletedversionerrorcapability'] = 'Fehler beim Anzeigen der Seitenversion';
$string['viewparticipationerrror'] = 'Die Mitarbeit der Nutzer/innen kann nicht angezeigt werden.';
$string['viewwikichanges'] = 'Änderungen für {$a}';
$string['viewwikistartpage'] = '{$a} anzeigen';
$string['wikifor'] = 'Wiki anzeigen für:';
$string['wikifullchanges'] = 'Alle Änderungen anzeigen';
$string['wikirecentchanges'] = 'Änderungen';
$string['wikirecentchanges_from'] = 'Änderungen (Seite {$a})';
$string['words'] = 'Worte';
$string['wordsadded'] = 'Worte hinzugefügt';
$string['wordsdeleted'] = 'Worte gelöscht';
$string['wouldyouliketocreate'] = 'Wollen Sie das erstellen?';
