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
 * Strings for component 'plagiarism_urkund', language 'sv', branch 'MOODLE_24_STABLE'
 *
 * @package   plagiarism_urkund
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['defaultsdesc'] = 'Följande inställningar är de förvalda inställningarna vid aktivering av URKUND som en aktivitetsmodul.';
$string['defaultupdated'] = 'Förvalda värden uppdaterade';
$string['filereset'] = 'En fil har återställts för förnyad granskning till URKUND';
$string['noreceiver'] = 'Ingen mottagaradress angavs';
$string['optout'] = 'hoppa av';
$string['pending'] = 'Denna fil väntar på inlämning till URKUND';
$string['pluginname'] = 'URKUND instiksmodul mot plagiarism';
$string['previouslysubmitted'] = 'Tidigare inskickad som';
$string['processing'] = 'Denna fil har skickats in till URKUND, och väntar nu på att analysen ska bli tillgänglig';
$string['report'] = 'rapportera';
$string['savedconfigfailed'] = 'Ett inkorrekt användarnamns-/lösenordskombination har angivits, URKUND har blivit avaktiverat, försök igen.';
$string['savedconfigsuccess'] = 'Plagiarisminställningar sparade';
$string['showwhenclosed'] = 'När aktiviteten stängde';
$string['similarity'] = 'URKUND';
$string['studentdisclosure'] = 'Elevavslöjande';
$string['studentdisclosuredefault'] = 'Alla filer som laddas upp kommer att lämnas in för plagiarismsökning med URKUND, om du vill förhindra att ditt dokument används som källa för analys utanför denna webbplats av andra organisationer kan du använda hoppa av länken som visas efter att rapporten har genererats.';
$string['studentdisclosure_help'] = 'Denna text kommer att visas för alla elever på filuppladdningssidan.';
$string['studentemailcontent'] = 'Filen du skickade in till {$a->modulename} i {$a->coursename} har nu granskats av antiplagiarismverktyget URKUND. {$a->modulelink}

Om du vill förhindra att ditt dokument används som en källa för analys utanför denna webbplats av andra organisationer kan du använda denna länk för att hoppa av:. {$a->optoutlink}';
$string['studentemailsubject'] = 'Filen processad av URKUND';
$string['submitondraft'] = 'Skicka in fil vid första uppladdning';
$string['submitonfinal'] = 'Skicka in fil när elev skickar in för betygsättning';
$string['toolarge'] = 'Denna fil är för stor för att processas av URKUND';
$string['unknownwarning'] = 'Ett fel inträffade vid försök att skicka denna fil till URKUND';
$string['unsupportedfiletype'] = 'Denna filtyp stöds inte av URKUND';
$string['urkund'] = 'URKUND instiksmodul mot plagiarism';
$string['urkund_api'] = 'URKUND integrationsadress';
$string['urkund_api_help'] = 'Detta är adressen till URKUND API';
$string['urkunddefaults'] = 'URKUND förinställningar';
$string['urkund_draft_submit'] = 'När ska filen skickas in till URKUND';
$string['urkund:enable'] = 'Tillåt läraren att aktivera/inaktivera URKUND inuti en aktivitet';
$string['urkund_enableplugin'] = 'Aktivera URKUND för {$a}';
$string['urkundexplain'] = 'För mer information om denna insticksmodul, se: <a href="http://www.urkund.com/int/en/" target="_blank">http://www.urkund.com/int/en/</a>';
$string['urkund_lang'] = 'Språk';
$string['urkund_lang_help'] = 'Språkkod tillhandahållen av URKUND';
$string['urkund_password'] = 'Lösenord';
$string['urkund_password_help'] = 'Lösenord tillhandahållet av URKUND för att få åtkomst till API.et';
$string['urkund_receiver'] = 'Mottagaradress';
$string['urkund_receiver_help'] = 'Detta är den unika adressen för läraren tillhandahållen av URKUND';
$string['urkund:resetfile'] = 'Tillåt läraren att skicka filen till Urkund efter ett fel';
$string['urkund_show_student_report'] = 'Visa likhetsrapport för elev';
$string['urkund_show_student_report_help'] = 'Likhetsrapporten ger en nedbrytning av vilka delar av inskickningen som är plagiat och platsen där URKUND först såg detta innehåll';
$string['urkund_show_student_score'] = 'Visa likhetspoäng för elev';
$string['urkund_show_student_score_help'] = 'Likhetspoäng är det procenttal av inskickningen som har matchats mot annat innehåll.';
$string['urkund_studentemail'] = 'Skicka elev e-post';
$string['urkund_studentemail_help'] = 'Detta kommer skicka ett e-postmeddelande till eleven när en fil har processats för att låta eleven veta att en rapport är tillgänglig, e-postmeddelandet inkluderar även opt-out länken.';
$string['urkund_username'] = 'Användarnamn';
$string['urkund_username_help'] = 'Användarnamn tillhandahållet av URKUND för åtkomst till API:et';
$string['urkund:viewreport'] = 'Tillåt läraren att se den fullständiga rapporten från URKUND';
$string['useurkund'] = 'Aktivera URKUND';
