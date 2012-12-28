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
 * Strings for component 'enrol_authorize', language 'de', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol_authorize
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['adminacceptccs'] = 'Welche Kreditkartentypen sollen akzeptiert werden?';
$string['adminaccepts'] = 'Zulässig Zahlungsverfahren und -typen auswählen';
$string['adminauthorizeccapture'] = 'Einstellungen für Zahlungsübersicht und Zahlungsabwicklung';
$string['adminauthorizeemail'] = 'E-Mail-Einstellungen';
$string['adminauthorizesettings'] = 'Authorize.net-Händlerkonto';
$string['adminauthorizewide'] = 'Grundeinstellungen';
$string['adminconfighttps'] = 'Bitte stellen Sie sicher, dass Sie die Einstellung "<a href="{$a->url}">loginhttps EIN</a>" gewählt haben, um dieses Plugin zu nutzen.<br />Admin >> Variablen >> Sicherheit >> HTTP-Sicherheit';
$string['adminconfighttpsgo'] = 'Gehen Sie auf diese <a href="{$a->url}">sichere Seite</a>, um dieses Plugin zu konfigurieren.';
$string['admincronsetup'] = 'Das Wartungsscript cron.php wurde in den letzten 24 Stunden nicht ausgeführt.<br />Der Cronjob muss richtig konfiguriert sein, um die automatische Abwicklung zu nutzen.<br />Konfigurieren Sie den Cronjob richtig oder deaktivieren Sie die Option <b>an_review</b> wieder.<br />Wenn Sie die automatische Abwicklung deaktivieren, werden Transaktionen zurückgewiesen, die Sie nicht innerhalb von 30 Tagen manuell bestätigen.<br />Aktivieren Sie die Option <b>an_review</b> und geben Sie \'0\' im Feld <b>an_capture_day</b>ein, wenn Sie innerhalb von 30 Tagen Zahlungen <b>manuell</b> akzeptieren/zurückweisen möchten.';
$string['adminemailexpiredsort'] = 'Wenn die zu bearbeitenden Zahlungsvorgänge an die Trainer/innen per E-Mail gesendet werden, welches Kriterium ist relevant?';
$string['adminemailexpiredsortcount'] = 'Zahl der Zahlungsvorgänge';
$string['adminemailexpiredsortsum'] = 'Gesamtbetrag der Zahlungen';
$string['adminemailexpsetting'] = '(0=keine E-Mail, default=2, max=5)<br />(E-Mail-Einstellungen bei manueller Abwicklung: cron=aktiviert, an_review=aktiviert, an_capture_day=0, an_emailexpired=1-5)';
$string['adminhelpcapturetitle'] = 'Tag für automatische Zahlungsabwicklung';
$string['adminhelpreviewtitle'] = 'Zahlungsübersicht';
$string['adminneworder'] = 'Guten Tag,

Eine neue Zahlung ist registriert worden:

ID-Nummer der Zahlung: {$a->orderid}
ID-Nummer der Transaktion: {$a->transid}
Nutzer/in: {$a->user}
Kurs: {$a->course}
Betrag: {$a->amount}

Automatische Zahlungsabwicklung aktiviert?: {$a->acstatus}

Wenn die automatische Zahlungsabwicklung aktiviert wurde, wird die Kreditkarte zum {$a->captureon} angenommen und die Einschreibung erfolgt. Andernfalls wird die Karte zum {$a->expireon} zurückgewiesen und kann danach nicht mehr akzeptiert werden.

Sie können die Zahlung unmittelbar annehmen / zurückweisen, indem Sie diesem Link folgen:
{$a->url}';
$string['adminnewordersubject'] = '{$a->course}: Neue offene Zahlungen ({$a->orderid})';
$string['adminpendingorders'] = 'Sie haben die automatische Zahlungsabwicklung deaktiviert. <br />Insgesamt {$a->count} Transaktionen mit dem Status \'in Bearbeitung\' werden zurückgewiesen, wenn Sie diese nicht prüfen.<br />Gehen Sie zur <a href=\'{$a->url}\'>Zahlungsabwicklung</a>, um diese Zahlungsvorgänge zu bearbeiten.';
$string['adminteachermanagepay'] = 'Trainer/innen können die Zahlungsvorgänge im Kurs abwickeln.';
$string['allpendingorders'] = 'Alle offenen Aufträge';
$string['amount'] = 'Betrag';
$string['anauthcode'] = 'Authorisierungscode erhalten';
$string['anauthcodedesc'] = 'Wenn die Kreditkarte von Nutzer/innen nicht direkt über das Internet erfasst werden kann, erhalten Sie den Authorisierungscode telefonisch von der Kundenbank.';
$string['anavs'] = 'Address Verification System';
$string['anavsdesc'] = 'Aktivieren Sie diese Option, wenn in Ihrem Händlerkonto bei Authorize.net das Address Verification System eingetragen wurde. Auf diese Weise ist das Ausfüllen der Adressfelder (Straße, PLZ und Land) im Zahlungsformular erforderlich.';
$string['ancaptureday'] = 'Zahlungstag';
$string['ancapturedaydesc'] = 'Die Kreditkarte wird automatisch belastet sofern keine Trainer/in oder Administrator/in dem Auftrag während der angegebenen Frist widerspricht. Der Cronjob muss aktiviert sein.
<br />(0 Tage deaktiviert die automatische Zahlung und eine manuelle Prüfung ist erforderlich. Die Zahlung wird widerrufen, wenn Sie die automatische Zahlung deaktivieren und nicht innerhalb von 30 Tagen prüfen.)';
$string['anemailexpired'] = 'Verfallsmitteilung';
$string['anemailexpireddesc'] = 'Bei manueller Zahlungsabwicklung ist es sinnvoll, dass Administrator/innen eine gewisse Zeit vor dem Verfall ausstehender Aufträge benachrichtigt werden.';
$string['anemailexpiredteacher'] = 'Verfallsmitteilung - Trainer/in';
$string['anemailexpiredteacherdesc'] = 'Falls Sie eine manuelle Zahlungsabwicklung eingestellt haben (siehe oben) und Trainer/innen die Zahlungen verwalten, dann können sie ebenfalls über den Verfall ausstehender Aufträge benachrichtigt werden. Alle Kurstrainer/innen erhalten eine E-Mail mit der Anzahl möglicherweise verfallender Aufträge.';
$string['anlogin'] = 'Authorize.net: Anmeldename';
$string['anpassword'] = 'Authorize.net: Kennwort';
$string['anreferer'] = 'Referer';
$string['anrefererdesc'] = 'Tragen Sie hier den möglichen URL-Referer zu Ihrem Händlerkonto bei Authorize.net ein. Auf diese Weise wird eine "Referer:URL" in der Webanfrage mitgesendet.';
$string['anreview'] = 'Prüfung';
$string['anreviewdesc'] = 'Prüfauftrag vor der Abwicklung der Kartenzahlung';
$string['antestmode'] = 'Testmodus';
$string['antestmodedesc'] = 'Transaktionen nur im Testmodus laufen lassen (es wird kein Geld abgebucht)
';
$string['antrankey'] = 'Authorize.net: Transaktionsschlüssel';
$string['approvedreview'] = 'Überprüfung erfolgreich';
$string['authcaptured'] = 'Bestätigte / Gezahlte';
$string['authcode'] = 'Authorisierungscode';
$string['authorize:config'] = 'Authorize.net-Einschreibung konfigurieren';
$string['authorizedpendingcapture'] = 'Bestätigte / Offene Zahlungen';
$string['authorizeerror'] = 'Fehler bei Authorize.net: {$a}';
$string['authorize:manage'] = 'Eingeschriebene Nutzer/innen verwalten';
$string['authorize:managepayments'] = 'Zahlungsmethoden verwalten';
$string['authorize:unenrol'] = 'Nutzer/innen aus dem Kurs abmelden';
$string['authorize:unenrolself'] = 'Sich selbst aus dem Kurs abmelden';
$string['authorize:uploadcsv'] = 'CSV-Datei hochladen';
$string['avsa'] = 'Adresse (Straße) stimmt überein, PLZ nicht';
$string['avsb'] = 'Adressinformation fehlt';
$string['avse'] = 'Fehler bei der Adressprüfung';
$string['avsg'] = 'Karte nicht von US-Bank ausgestellt';
$string['avsn'] = 'Keine Übereinstimmung von Adresse (Straße) und PLZ';
$string['avsp'] = 'Adressprüfung nicht verfügbar';
$string['avsr'] = 'Wiederholen - System nicht verfügbar oder Zeitüberschreitung';
$string['avsresult'] = 'AVS Ergebnis: {$a}';
$string['avss'] = 'Service wird vom Aussteller der Karte nicht unterstützt';
$string['avsu'] = 'Adressinformation nicht verfügbar';
$string['avsw'] = 'PLZ stimmt überein, Adresse (Straße) nicht';
$string['avsx'] = 'Adresse (Straße) und PLZ stimmen überein';
$string['avsy'] = 'Adresse (Straße) und PLZ stimmen überein';
$string['avsz'] = 'PLZ stimmt überein, Adresse (Straße) nicht';
$string['canbecredit'] = 'Kann erstattet werden an {$a->upto}';
$string['cancelled'] = 'Zurückgewiesen';
$string['capture'] = 'Zahlungen';
$string['capturedpendingsettle'] = 'Bestätigte / Offene Zahlungen';
$string['capturedsettled'] = 'Bestätigt/ gezahlt';
$string['captureyes'] = 'Die Kreditkarte wird angenommen und die Einschreibung soll erfolgen. Bist du sicher?';
$string['cccity'] = 'Stadt';
$string['ccexpire'] = 'Gültig bis';
$string['ccexpired'] = 'Kreditkarte ist abgelaufen';
$string['ccinvalid'] = 'Ungültige Kreditkartennummer';
$string['cclastfour'] = 'CC letzte vier';
$string['ccno'] = 'Kreditkartennummer';
$string['ccstate'] = 'Land';
$string['cctype'] = 'Kreditkartentyp';
$string['ccvv'] = 'Kreditkartenprüfung';
$string['ccvvhelp'] = 'Schauen Sie auf der Kartenrückseite nach (letzte drei Zeichen).';
$string['choosemethod'] = 'Wenn Sie den Einschreibeschlüssel des Kurses kennen, tragen Sie ihn hier ein. Andernfalls müssen Sie erst die Kursgebühr bezahlen.';
$string['chooseone'] = 'Füllen Sie eines oder beide Felder aus. Das Kennwort wird nicht angezeigt.';
$string['cost'] = 'Kosten';
$string['costdefaultdesc'] = 'Geben Sie bei den Kurseinstellungen den <strong>Wert -1 </strong> ein, um die Standardentgelt zu verwenden.';
$string['currency'] = 'Währung';
$string['cutofftime'] = 'Transaktionsende';
$string['cutofftimedesc'] = 'Transaktionsende. Wann wird die letzte Transaktion zur Abrechnung angenommen?';
$string['dataentered'] = 'Daten eingegeben';
$string['delete'] = 'Löschen';
$string['description'] = 'Das Authorize.net-Anmeldeverfahren ermöglicht es Ihnen, entgeltpflichtige Kurse anzulegen und die Kursentgelte über Kreditkarten abzurechnen. Wenn die Kursentgelte eines Kurses auf \'0\' gesetzt werden, dann erhalten die Teilnehmer/innen keine Zahlungsaufforderung bei der Einschreibung in den Kurs.<br />Sie können eine Entgeltvoreinstellung vornehmen, die für alle Kurse als Standardentgelt übernommen wird. Dieses Standardentgelt kann in den Kurseinstellungen für jeden Kurs individuell überschrieben werden.';
$string['echeckabacode'] = 'Bank ABA Nummer';
$string['echeckaccnum'] = 'Kontonummer';
$string['echeckacctype'] = 'Bankkontentyp';
$string['echeckbankname'] = 'Name der Bank';
$string['echeckbusinesschecking'] = 'Businessprüfung';
$string['echeckchecking'] = 'Prüfung';
$string['echeckfirslasttname'] = 'Konteninhaber';
$string['echecksavings'] = 'Guthaben';
$string['enrolenddate'] = 'Endzeit';
$string['enrolenddaterror'] = 'Das Ende der Einschreibung kann nicht früher als der Beginn liegen';
$string['enrolname'] = 'Authorize.net Kreditkartenabrechnung';
$string['enrolperiod'] = 'Teilnahmedauer';
$string['enrolstartdate'] = 'Startzeit';
$string['expired'] = 'Abgelaufen';
$string['expiremonth'] = 'Ablaufmonat';
$string['expireyear'] = 'Ablaufjahr';
$string['firstnameoncard'] = 'Vorname auf der Karte';
$string['haveauthcode'] = 'Ich habe bereits einen Autorisierungscode';
$string['howmuch'] = 'Wieviel?';
$string['httpsrequired'] = 'Ihre Anfrage kann leider zur Zeit nicht bearbeitet werden. Die Konfiguration der Seite weist einen Fehler auf. <br /><br />
Warten Sie mit der Eingabe Ihrer Kreditkartennummer solange, bis Sie ein gelbes Schloss in der Fußzeile des Browsers sehen können. Wenn das Symbol erscheint, werden alle Daten zwischen Ihrem Rechner und dem Server verschlüsselt gesendet. Damit wird die Datenübertragung geschützt und Ihre Kreditkartendaten können nicht in falsche Hände geraten.';
$string['invalidaba'] = 'Ungültige ABA Nummer';
$string['invalidaccnum'] = 'Ungültige Kontonummer';
$string['invalidacctype'] = 'Ungültiger Kontentyp';
$string['isbusinesschecking'] = 'Ist Geschäftsvorgang geprüft?';
$string['lastnameoncard'] = 'Nachname auf der Karte';
$string['logindesc'] = 'Diese Option MUSS aktiviert sein. Stellen Sie sicher, dass die Einstellung <a href="{$a->url}">loginhttps</a> unter Website Administration - Variablen konfigurieren - Sicherheit aktiviert ist.
<br /><br />
Wenn diese Option aktiviert ist, verwendet Moodle für die Login- und Zahlungsvorgänge eine sichere HTTPS-Verbindung.';
$string['logininfo'] = 'Wenn Sie Ihr Konto bei Authorize.net konfigurieren, müssen Sie Ihren Anmeldenamen und zusätzlich <strong>entweder</strong> den Transaktionschlüssel <strong>oder</strong> das Kennwort in das entsprechende Feld eingeben. Bei Sicherheitsabfragen empfehlen wir die Eingabe des Transaktionsschlüssels.';
$string['messageprovider:authorize_enrolment'] = 'Authorize.Net Einschreibemitteilungen';
$string['methodcc'] = 'Kreditkarte';
$string['methodccdesc'] = 'Kreditkarte und akzeptierte Typen auswählen';
$string['methodecheck'] = 'eCheck (ACH)';
$string['methodecheckdesc'] = 'eCheck und akzeptierte Typen auswählen';
$string['missingaba'] = 'ABA-Nummer fehlt';
$string['missingaddress'] = 'Adresse fehlt';
$string['missingbankname'] = 'Bankname fehlt';
$string['missingcc'] = 'Kartennummer fehlt';
$string['missingccauthcode'] = 'Autorisierungscode fehlt';
$string['missingccexpiremonth'] = 'Ablaufmonat fehlt';
$string['missingccexpireyear'] = 'Ablaufjahr fehlt';
$string['missingcctype'] = 'Kartentyp fehlt';
$string['missingcvv'] = 'Prüfnummer fehlt';
$string['missingzip'] = 'PLZ fehlt';
$string['mypaymentsonly'] = 'Nur meine Zahlungsvorgänge anzeigen';
$string['nameoncard'] = 'Karteninhaber';
$string['new'] = 'Neu';
$string['nocost'] = 'Es entstehen keine Kosten, wenn Sie sich über Authorize.net in diesen Kurs einschreiben!';
$string['noreturns'] = 'Kein Rückgabe!';
$string['notsettled'] = 'Nicht bearbeitet';
$string['orderdetails'] = 'Vorgangsdetails';
$string['orderid'] = 'ID-Nummer der Zahlung';
$string['paymentmanagement'] = 'Zahlungsmanagement';
$string['paymentmethod'] = 'Zahlungsverfahren';
$string['paymentpending'] = 'Ihre Zahlung für diesen Kurs wird unter der ID-Nummer {$a->orderid} bearbeitet.';
$string['pendingecheckemail'] = 'Guten Tag,

zur Zeit gibt es {$a->count} wartende eChecks. Laden Sie die Nutzer/innen mittels CSV-Datei ins System hoch.

Weitere Informationen finden Sie in der Hilfedatei auf der folgenden Seite {$a->url}.';
$string['pendingechecksubject'] = '{$a->course}: Wartende eChecks ({$a->count})';
$string['pendingordersemail'] = 'Guten Tag,

{$a->pending} Transaktionen für den Kurs {$a->course} werden zurückgewiesen, wenn Sie sie nicht innerhalb von {$a->days} Tagen bearbeiten.

Dies ist eine Warn-E-Mail, weil Sie die automatische Zahlungsabwicklung nicht aktiviert haben. Die Zahlungen müssen daher manuell von Ihnen bestätigt oder zurückgewiesen werden.

Die Zahlungen können unter {$a->url} bearbeitet werden.

Unter {$a->enrolurl} können Sie die automatische Zahlungsabwicklung aktivieren, damit Sie künftig keine Warn-E-Mails mehr erhalten.';
$string['pendingordersemailteacher'] = 'Guten Tag,

{$a->pending} Zahlungsvorgänge im Wert von {$a->currency} {$a->sumcost} für Kurs {$a->course} werden zurückgewiesen, wenn Sie sie nicht innerhalb von {$a->days} Tagen bearbeiten.
Sie müssen innerhalb dieses Zeitraums die Zahlungen manuell akzeptieren oder zurückweisen.

Die Zahlungen können unter {$a->url} bearbeitet werden.';
$string['pendingorderssubject'] = 'Warnhinweis: {$a->course}, {$a->pending} Zahlung(en) werden zurückgewiesen, wenn sie nicht innerhalb von {$a->days} Tag(en) bearbeitet werden.';
$string['pluginname'] = 'Authorize.net';
$string['reason11'] = 'Eine Transaktion wurde doppelt beantragt.';
$string['reason13'] = 'Die Anbieter-Login-ID ist ungültig oder das Konto ist inaktiv.';
$string['reason16'] = 'Die Transaktion wurde nicht gefunden.';
$string['reason17'] = 'Der Anbieter akzeptiert diesen Kreditkartentyp nicht.';
$string['reason245'] = 'Dieser eChecktyp ist hier nicht zulässig.';
$string['reason246'] = 'Dieser eChecktyp ist hier nicht zulässig.';
$string['reason27'] = 'Die Transaktion führte zu einem Fehler bei der Adressprüfung. Die angegebene Adresse stimmt nicht mit der hinterlegten Anschrift des Karteninhabers überein.';
$string['reason28'] = 'Der Anbieter akzeptiert diesen Kreditkartentyp nicht.';
$string['reason30'] = 'Die Konfiguration des Abrechnungssystems ist ungültig. Bitte nehmen Sie mit dem Anbieter Kontakt auf.';
$string['reason39'] = 'Der eingetragene Währungscode ist ungültig, wird nicht unterstützt, wird von diesem Anbieter nicht akzeptiert oder kann nicht umgerechnet werden.';
$string['reason43'] = 'Der Anbieter ist nicht richtig an das Abrechnungssystem angebunden. Bitte nehmen Sie mit dem Anbieter Kontakt auf.';
$string['reason44'] = 'Die Transaktion wurde abgelehnt. Fehler: Kartencode-Filter';
$string['reason45'] = 'Die Transaktion wurde abgelehnt. Fehler: Kartencode/Adressprüfung-Filter';
$string['reason47'] = 'Der angeforderte Betrag sollte nicht höher sein als der ursprünglich geforderte Betrag.';
$string['reason5'] = 'Geben Sie bitte einen gültigen Betrag ein.';
$string['reason50'] = 'Die Transaktion wartet auf Bestätigung und kann nicht rückgängig gemacht werden.';
$string['reason51'] = 'Die Summe alle Kredite der Transaktion übersteigt die ursprüngliche Transaktionssumme.';
$string['reason54'] = 'Die angegebene Transaktion erfüllt nicht die Kriterien zur Kreditabwicklung.';
$string['reason55'] = 'Die Summe der Kreditabwicklungen übersteigt das Kreditvolumen.';
$string['reason56'] = 'Dieser Händler akzeptiert nur eCheck (ACH) Tarnsaktionen. Kreditkartenzahlungen sind nicht möglich.';
$string['refund'] = 'Rückzahlung';
$string['refunded'] = 'Zurückgezahlt';
$string['returns'] = 'Rückläufe';
$string['reviewfailed'] = 'Überprüfung fehlgeschlagen';
$string['reviewnotify'] = 'Ihre Zahlung wird geprüft. Sie erhalten in einigen Tagen eine E-Mail von Ihrer Trainer/in.';
$string['sendpaymentbutton'] = 'Zahlung ausführen';
$string['settled'] = 'Erledigt';
$string['settlementdate'] = 'Erledigungstermin';
$string['shopper'] = 'Einkäufer';
$string['status'] = 'Authorize.net-Einschreibungen erlauben';
$string['subvoidyes'] = 'Zurückgezahlte Transaktionen {$a->transid} werden aufgehoben, und Ihr Konto wird mit {$a->amount} belastet. Sind Sie sicher?';
$string['tested'] = 'Getestet';
$string['testmode'] = '[TEST MODUS]';
$string['testwarning'] = 'Die Zahlungsabwicklung arbeitet anscheinend im Testmodus. Es wurde jedoch kein Datensatz aktualisiert oder in der Datenbank angelegt.';
$string['transid'] = 'ID-Nummer der Transaktion';
$string['underreview'] = 'Überprüfung läuft';
$string['unenrolselfconfirm'] = 'Möchten Sie sich wirklich selbst aus dem Kurs \'{$a}\' abmelden?';
$string['unenrolstudent'] = 'Teilnehmer/in aus dem Kurs löschen?';
$string['uploadcsv'] = 'Eine CSV-Datei hochladen';
$string['usingccmethod'] = 'Eintragung verwendet <a href="{$a->url}"><strong> Kreditkarte</strong></a>';
$string['usingecheckmethod'] = 'Eintragung verwendet <a href="{$a->url}"><strong> eCheck</strong></a>';
$string['verifyaccount'] = 'Ihre Händlerdaten bei Authorize.net werden geprüft';
$string['verifyaccountresult'] = '<b/>Prüfergebnis:</b> {$a}';
$string['void'] = 'Gültig';
$string['voidyes'] = 'Möchten Sie diesen Transaktion wirklich abbrechen?';
$string['welcometocoursesemail'] = 'Guten Tag {$a->name},

vielen Dank für Ihre Zahlung. Sie sind nun als Teilnehmer/in in folgenden Kursen eingetragen:
{$a->courses}

Bearbeiten Sie bitte Ihr persönliches Profil, falls Sie dies noch nicht getan haben:
{$a->profileurl}

Alle Details zu Ihrer Entgeltzahlung finden Sie unter:
{$a->paymenturl}

Viel Erfolg!';
$string['youcantdo'] = 'Sie können diese Aktion nicht ausführen: {$a->action}';
$string['zipcode'] = 'PLZ';
