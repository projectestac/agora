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
 * Strings for component 'completion', language 'sv', branch 'MOODLE_26_STABLE'
 *
 * @package   completion
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['achievinggrade'] = 'Uppnå resultat';
$string['activities'] = 'Aktiviteter';
$string['activitiescompleted'] = 'Fullföljda aktiviteter';
$string['activitycompletion'] = 'Fullföljande av aktivitet';
$string['aggregationmethod'] = 'Metod för aggregation';
$string['all'] = 'Allt';
$string['any'] = 'Vilken/a som helst';
$string['approval'] = 'Godkännande';
$string['badautocompletion'] = 'När du väljer automatisk markering av fullföljning, måste även ställa in minst ett kriterie (nedan).';
$string['completed'] = 'Slutfört';
$string['completedunlocked'] = 'Alternativen för fullföljning är upplåsta';
$string['completedunlockedtext'] = 'När du sparar ändringarna nollställs markeringarna av fullföljande för alla kursdeltagare. Om du inte är säker på att detta ska göras, välj att avbryta.';
$string['completedwarning'] = 'Alternativen för fullföljande är låsta';
$string['completedwarningtext'] = 'En eller flera kursdeltagare ({$a}) har redan markerat denna aktivitet som fullföljd. Ändringar av inställningarna tar bort dessa markeringar. Därför har inställningarna låsts, och ska inte låsas upp om det inte är absolut nödvändigt.';
$string['completion'] = 'Spårning av fullföljande';
$string['completion-alt-auto-enabled'] = 'Systemet markerar automatiskt denna aktivitet som fullföljd baserat på uppställda kriterier.';
$string['completion-alt-auto-fail'] = 'Fullföljd (uppnådde inte godkänt resultat)';
$string['completion-alt-auto-n'] = 'Inte avslutad: {$a}';
$string['completion-alt-auto-pass'] = 'Fullföljd (godkänt resultat)';
$string['completion-alt-auto-y'] = 'Fullföljd';
$string['completion-alt-manual-enabled'] = 'Kursdeltagare kan själv markera denna aktivitet som fullföljd';
$string['completion-alt-manual-n'] = 'Ej fullföljd; välj för att markera som fullföljd';
$string['completion-alt-manual-y'] = 'Fullföljd; välj för att markera som ej fullföljd';
$string['completion_automatic'] = 'Visa aktivitet som fullföljd när kriterier är uppnådda.';
$string['completiondisabled'] = 'Avaktiverad, visas inte i aktiviteternas inställningar';
$string['completionenabled'] = 'Aktiverad, hanteras via inställningar för aktiviteter och fullföljande';
$string['completionexpected'] = 'Fullföljning förväntad vid';
$string['completionexpected_help'] = 'Denna inställning specificerar det datum då aktiviteten förväntas vara fullföljd. Datumet visas inte för kursdeltagare, utan visas bara i aktivitets-fullföljningsrapporten.';
$string['completion-fail'] = 'Slutfört (inte uppnått godkänt betyg)';
$string['completion_help'] = 'Om aktiverad blir fullföljande av aktivitet markerad, manuellt eller automatiskt, beroende på angivna kriterier. Flera kriterier kan anges, och om så görs blir aktiviteten betraktad som genomför då <strong>samtliga</strong> dessa uppfylls. En bock vid sidan av aktivitetens namn på kurssidan indikerar när aktiviteten är fullföljd.';
$string['completionicons'] = 'Kryssrutor för att markera fullföljning';
$string['completionicons_help'] = 'En kryssruta bredvid en aktivitet kan användas för att indikera när aktiviteten är fullföljd. Om en svagt markerad bock visas, kan du själv kryssa för att du har fullföljt aktiviteten (om du klickar en gång till tas markeringen bort igen). Markeringen är ett sätt att följa din progression i kursen. Om en helt tom kryssruta visas, kommer den att markeras automatiskt då du har fullföljt aktiviteten enligt kriterier uppsatta av läraren.';
$string['completion_manual'] = 'Kursdeltagare kan själva markera aktiviteten som fullföljd.';
$string['completionmenuitem'] = 'Fullföljning';
$string['completion-n'] = 'Inte slutfört';
$string['completion_none'] = 'Indikera inte fullföljande av aktivitet.';
$string['completionnotenabled'] = 'Fullföljning är inte aktiverad';
$string['completionnotenabledforcourse'] = 'Fullföljning är inte aktiverad för den här kursen';
$string['completionnotenabledforsite'] = 'Fullföljning är inte aktiverad för den här webbplatsen';
$string['completion-pass'] = 'Slutfört (uppnått godkänt betyg)';
$string['completionsettingslocked'] = 'Alternativen för fullföljning är låsta';
$string['completion-title-manual-n'] = 'Markera som fullföjd: {$a}';
$string['completion-title-manual-y'] = 'Markera som inte fullföjd: {$a}';
$string['completionusegrade'] = 'Begär ett resultat';
$string['completionusegrade_desc'] = 'Studenten måste få betyg för att slutföra denna verksamhet';
$string['completionusegrade_help'] = 'Om denna inställning aktiveras anses aktiviteten fullföljd då kursdeltagare får ett resultat/betyg. Godkänd-/underkändsymboler visas om en godkänd-nivå är inställd.';
$string['completionview'] = 'Begär visning';
$string['completionview_desc'] = 'Då kursdeltagaren öppnar aktiviteten anses den fullföljd';
$string['completion-y'] = 'Slutfört';
$string['configenablecompletion'] = 'När denna aktiverats kan du aktivera spårning av fullföljning (progression) på kursnivå.';
$string['confirmselfcompletion'] = 'Bekräfta eget fullföljande';
$string['coursealreadycompleted'] = 'Du har redan fullföljt denna kurs.';
$string['coursecomplete'] = 'Kursens fullföljande';
$string['coursecompleted'] = 'Kursen fullföljd';
$string['coursegrade'] = 'Kursbetyg/omdöme';
$string['coursesavailable'] = 'Tillgängliga kurser';
$string['criteria'] = 'Kriterier';
$string['criteriagroup'] = 'Kriterier för grupp';
$string['criteriarequiredall'] = 'Alla kriterier är obligatoriska';
$string['criteriarequiredany'] = 'Alla kriterier nedan är obligatoriska';
$string['csvdownload'] = 'Ladda ned som datafil (UTF-8 .csv)';
$string['datepassed'] = 'Datum för godkännande';
$string['days'] = 'Dagar';
$string['daysoftotal'] = '{$a->days} av {$a->total}';
$string['dependencies'] = 'Beroenden';
$string['editcoursecompletionsettings'] = 'Redigera inställningar för fullföljande av kurs';
$string['enablecompletion'] = 'Aktivera spårning av fullföljande';
$string['enrolmentduration'] = 'Återstående dagar';
$string['err_noactivities'] = 'Information om fullföljande är inte inställd för någon aktivitet, så ingen sådan kan visas. Du kan aktivera spårning av fullföljande via inställningarna för en aktivitet.';
$string['err_nocourses'] = 'Spårning av fullföljande av kurs är inte aktiverad för någon annan kurs, så detta kan inte visas. Du kan aktivare spårning av fullföljande av kurs under kursens inställningar.';
$string['err_nograde'] = 'Ett reultatkriterium/betyg för att anses ha fullföljt kursen har inte angivits. För att möjliggöra detta  måste du ange ett godkänd-kriterium/betyg för kursen.';
$string['err_noroles'] = 'Det finns inga roller med förmågan moodle/course:markcomplete i den här kursen.';
$string['err_nousers'] = 'Det finns inga kursdeltagare i den här kursen eller gruppen för vilka genomförandeinformation visas. (Som förinställning visa genomförandeinformation bara för kursdeltagare, så om kursen inte har några deltagare ser du detta meddelande. Administratörer kan ändra den inställningen i administrationsgränssnittet.)';
$string['err_settingslocked'] = 'En eller flera kursdeltagare har redan markerat denna aktivitet som fullföljd, därför har alternativen låsts. Ändringar av inställningarna tar bort dessa markeringar, vilket kan orsaka förvirring.';
$string['err_system'] = 'Ett internt fel uppstod. Kontakta en systemadministratör. (System administrators can enable debugging information to see more detail.)';
$string['excelcsvdownload'] = 'Ladda ned i Excelkompatibelt format (.csv)';
$string['gradexrequired'] = '{$a} krävs';
$string['inprogress'] = 'Pågår';
$string['manualcompletionbynote'] = 'Notera: Förmågan moodle/course:markcomplete måste tillåtas för att en roll ska synas i listan.';
$string['manualselfcompletion'] = 'Studenten markerar själv som fullföljd';
$string['markcomplete'] = 'Markera som fullföljd';
$string['markedcompleteby'] = 'Markerad som fullföljd av {$a}';
$string['markingyourselfcomplete'] = 'Markera dig själv som klar';
$string['moredetails'] = 'Mer detaljer';
$string['nocriteriaset'] = 'Inga kriterier för genomförande är satta för den här kursen.';
$string['notcompleted'] = 'Inte slutfört';
$string['notenroled'] = 'Du är inte registrerad i den här kursen';
$string['notyetstarted'] = 'Har ännu inte påbörjats';
$string['pending'] = 'Avvaktar';
$string['progress'] = 'Kursdeltagares progression';
$string['progress-title'] = '{$a->user}, {$a->activity}: {$a->state} {$a->date}';
$string['progresstotal'] = 'Progress: {$a->complete} / {$a->total}';
$string['remainingenroleduntildate'] = 'Fortsätter vara kopplad till kursen fram till ett angivet datum';
$string['reportpage'] = 'Visar användare {$a->from} till {$a->to} av {$a->total}.';
$string['requiredcriteria'] = 'Obligatoriskt kriterium';
$string['saved'] = 'Sparad';
$string['seedetails'] = 'Se detaljer';
$string['self'] = 'Själv';
$string['selfcompletion'] = 'Studenten markerar själv';
$string['showinguser'] = 'Visar användare';
$string['unenrolingfromcourse'] = 'Avregistrerar från kurs';
$string['unenrolment'] = 'Avregistrering';
$string['unit'] = 'Enhet';
$string['unlockcompletion'] = 'Lås upp inställningar för genomförande';
$string['unlockcompletiondelete'] = 'Lås upp inställningar för genomförande och radera användarnas genomförandedata';
$string['usealternateselector'] = 'Använd alternativ kursväljare';
$string['usernotenroled'] = 'Användaren är inte kopplad till den här kursen';
$string['viewcoursereport'] = 'Visa kursrapport';
$string['viewingactivity'] = 'Visar {$a}';
$string['xdays'] = '{$a} dagar';
$string['yourprogress'] = 'Din progression';
