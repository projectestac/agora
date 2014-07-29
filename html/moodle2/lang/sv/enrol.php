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
 * Strings for component 'enrol', language 'sv', branch 'MOODLE_26_STABLE'
 *
 * @package   enrol
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actenrolshhdr'] = 'Tillgängliga plugin-program för  registrering ';
$string['addinstance'] = 'Lägg till metod';
$string['ajaxnext25'] = 'Nästa 25...';
$string['ajaxoneuserfound'] = 'Det finns 1 användare';
$string['ajaxxusersfound'] = '{$a} användare hittade';
$string['assignnotpermitted'] = 'Du har inte tillstånd eller kan inte tilldela roller i den här kursen';
$string['bulkuseroperation'] = 'Bulk användarhantering';
$string['configenrolplugins'] = 'Var snäll och välj alla de obligatoriska plugin-programmen och arrangera dem sedan i lämplig ordning.';
$string['custominstancename'] = 'Förvalt standardnamn på instans';
$string['defaultenrol'] = 'Lägg till instans till nya kurser';
$string['defaultenrol_desc'] = 'Det är möjligt att lägga till det här plugin-programmet till alla nya kurser som standard.';
$string['deleteinstanceconfirm'] = 'Vill Du verkligen ta bort instansen "{$a->name}" av plugin-programmet för registrering och som innehåller {$a->users} registrerade användare?';
$string['deleteinstancenousersconfirm'] = 'Du håller på att ta bort registreringsmetoden "{$a->name}". Är du säker på att du vill fortsätta?';
$string['durationdays'] = '%d dagar';
$string['editenrolment'] = 'Ändra registrering';
$string['enrol'] = 'Registrera';
$string['enrolcandidates'] = 'Inga registrerade användare';
$string['enrolcandidatesmatching'] = 'Matchar inte-registrerade användare';
$string['enrolcohort'] = 'Registrera kohort';
$string['enrolcohortusers'] = 'Registrera användare';
$string['enrollednewusers'] = ' {$a}  nya användare registrerades framgångsrikt';
$string['enrolledusers'] = 'Registrerade användare';
$string['enrolledusersmatching'] = 'Matchar registrerade användare';
$string['enrolme'] = 'Registrera mig på den här kursen';
$string['enrolmentinstances'] = 'Metoder för registrering';
$string['enrolmentnew'] = 'Ny registrering på {$a}';
$string['enrolmentnewuser'] = '{$a->user} har registrerat sig på kursen "{$a->course}"';
$string['enrolmentoptions'] = 'Alternativ för registrering';
$string['enrolments'] = 'Registreringar';
$string['enrolnotpermitted'] = 'Du har inte tillstånd eller har inte rätt att registrera någon på den här kursen.';
$string['enrolperiod'] = 'Registreringsperiod';
$string['enroltimecreated'] = 'Registrering skapad';
$string['enroltimeend'] = 'Registrering avslutas';
$string['enroltimestart'] = 'Registrering påbörjas';
$string['enrolusage'] = 'Instanser/registreringar';
$string['enrolusers'] = 'Registrera användare';
$string['errajaxfailedenrol'] = 'Det gick inte att registrera användare';
$string['errajaxsearch'] = 'Fel vid sökning användare';
$string['erroreditenrolment'] = 'Ett fel inträffade när försök att ändra en användares registrering gjordes';
$string['errorenrolcohort'] = 'Fel vid skapande av instans för kohortsynkning för registrering i denna kurs.';
$string['errorenrolcohortusers'] = 'Fel vid registrering av kohortmedlemmar i denna kurs.';
$string['errorthresholdlow'] = 'Meddelandetröskel måste vara minst 1 dag.';
$string['errorwithbulkoperation'] = 'Ett fel inträffade när din ändring av bulkregistrering processades.';
$string['expirynotify'] = 'Meddela innan registrering går ut.';
$string['expirynotifyall'] = 'Registrerare och registrerad användare';
$string['expirynotifyenroller'] = 'Registrerare endast';
$string['expirynotify_help'] = 'Denna inställning avgör om meddelande om registreringens förfall ska sändas.';
$string['expirynotifyhour'] = 'Timme för att sända meddelande om utgång av registrering';
$string['expirythreshold'] = 'Meddelandetröskel';
$string['expirythreshold_help'] = 'Hur lång tid före utgång ska användaren meddelas?';
$string['extremovedaction'] = 'Extern avregistreringsåtgärd';
$string['extremovedaction_help'] = 'Välj åtgärd att vidta då användarregistrering försvinner från extern källa för registrering. Notera att vissa användardata och inställningar rensas från kurs under avregistreringen.';
$string['extremovedkeep'] = 'Behåll användare registrerade';
$string['extremovedsuspend'] = 'Avaktivera kursregistrering';
$string['extremovedsuspendnoroles'] = 'Avaktivera kursregistrering och ta bort roller';
$string['extremovedunenrol'] = 'Avregistrera användare från kurs';
$string['finishenrollingusers'] = 'Slutför registrering';
$string['invalidenrolinstance'] = 'Felaktig registreringsinstans';
$string['invalidrole'] = 'Felaktig roll';
$string['manageenrols'] = 'Hantera insticksmodul för registrering';
$string['manageinstance'] = 'Hantera';
$string['nochange'] = 'Ingen förändring';
$string['noexistingparticipants'] = 'Inga befintliga deltagare';
$string['noguestaccess'] = 'Gäster inte kan komma åt den här kursen, försök att logga in';
$string['none'] = 'Inga';
$string['notenrollable'] = 'Det går inte att registrera sig på den här kursen';
$string['notenrolledusers'] = 'Andra användare';
$string['otheruserdesc'] = 'Följande användare är inte registrerade i kursen men har roller, ärvda eller tilldelade.';
$string['participationactive'] = 'Aktiv';
$string['participationstatus'] = 'Status';
$string['participationsuspended'] = 'Spärrad';
$string['periodend'] = 'tills';
$string['periodnone'] = 'registrerad {$a}';
$string['periodstart'] = 'från {$a}';
$string['periodstartend'] = 'från {$a->start} till {$a->end}';
$string['recovergrades'] = 'Återställ användarens betyg om möjligt';
$string['rolefromcategory'] = '{$a->role} (Ärvd från kurskategori)';
$string['rolefrommetacourse'] = '{$a->role} (Ärvd från föräldrakurs)';
$string['rolefromsystem'] = '{$a->role} (Tilldelad på webbplatsnivå)';
$string['rolefromthiscourse'] = '{$a->role} (Tilldelad i denna kurs)';
$string['startdatetoday'] = 'Idag';
$string['synced'] = 'Synkroniserad';
$string['totalenrolledusers'] = '{$a} registrerade användare';
$string['totalotherusers'] = '{$a} andra användare';
$string['unassignnotpermitted'] = 'Du har inte tillstånd att frånta roller i denna kurs';
$string['unenrol'] = 'Avregistrera';
$string['unenrolconfirm'] = 'Vill du verkligen avregistrera användare "{$a->user}" från kurs "{$a->course}"?';
$string['unenrolme'] = 'Avregistrera mig från {$a}';
$string['unenrolnotpermitted'] = 'Du har inte tillstånd eller kan inte avregistrera denna användare från denna kurs.';
$string['unenrolroleusers'] = 'Avregistrera användare';
$string['uninstallmigrating'] = 'Migrerar "{$a}" registreringar';
$string['unknowajaxaction'] = 'Okänd åtgärd';
$string['unlimitedduration'] = 'Obegränsad';
$string['usersearch'] = 'Sök';
$string['withselectedusers'] = 'Med utvalda användare';
