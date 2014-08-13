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
 * Strings for component 'qtype_stack', language 'nl', branch 'MOODLE_26_STABLE'
 *
 * @package   qtype_stack
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addanothernode'] = 'Voeg een knoop toe';
$string['addanothertestcase'] = 'Voeg nog een testcase toe...';
$string['addatestcase'] = 'Voeg een testcase toe...';
$string['addingatestcase'] = 'Een testcase aan een vraag toevoegen {$a}';
$string['alg_indices_fact'] = 'De volgende regels beslaan het manipuleren van een index:
[a^ma^n = a^{m+n}]
[frac{a^m}{a^n} = a^{m-n}]
[(a^m)^n = a^{mn}]
[a^0 = 1]
[a^{-m} = frac{1}{a^m}]
[a^{frac{1}{n}} = sqrt[n]{a}]
[a^{frac{m}{n}} = left(sqrt[n]{a}right)^m]';
$string['alg_indices_name'] = 'De regels van indices';
$string['alg_inequalities_fact'] = '[a>b hbox{ betekent } a hbox{ is groter dan } b]
<br />
[ a < b hbox{ betekent } a hbox{ is kleiner dan } b]
<br />
[ageq b hbox{ betekent } a hbox{ is groter dan of gelijk aan } b]
<br />
[aleq b hbox{ betekent } a hbox{ is kleiner dan of gelijk aan } b]';
$string['alg_inequalities_name'] = 'Ongelijkheden';
$string['alg_logarithms_fact'] = 'Voor een willekeurig grondtal (b) (met (b (b neq 1)):
[log_b(a) = c mbox{, betekent } a = b^c]
[log_b(a) + log_b(b) = log_b(ab)]
[log_b(a) - log_b(b) = log_bleft(frac{a}{b}right)]
[nlog_b(a) = log_bleft(a^nright)]
[log_b(1) = 0]
[log_b(b) = 1]
Omreken naar een ander grondtal gaat volgens:
[log_a(x) = frac{log_b(x)}{log_b(a)}]
Logaritmen met het grondtal $e$, genoteerd als $log_e$ of anders $ln$ noem je natuurlijk logaritmen.  De letter $e$ staat voor een belangrijke wiskundige constante, met een waarde van ongeveer 2,718.';
$string['alg_logarithms_name'] = 'De rekenregels bij logaritmen';
$string['allnodefeedbackmustusethesameformat'] = 'Alle feedback voor alle nodes in een PRT moeten hetzelfde tekstformat hebben.';
$string['alreadydeployed'] = 'Er is al een vraagversie in gebruik met dezelfde vraag-toevoeging';
$string['answernote'] = 'Feedbacknotitie';
$string['answernotedefaultfalse'] = '{$->prtname}-{$a->nodename}-F';
$string['answernotedefaulttrue'] = '{$->prtname}-{$a->nodename}-G';
$string['answernote_err'] = 'Antwoorden mogen het teken | niet bevatten. Dit teken wordt door STACK ingevoerd en wordt later gebruikt om antwoorden automatisch te splitsen.';
$string['answernote_help'] = 'Dit is een tag voor rapport-doeleinden. Het is gemaakt om een uniek pad door de vertakkingen van elke antwoordcontrôle vast te leggen. Het wordt automatisch gegenereerd, maar kan gewijzigd worden in iets wat een duidelijkere betekening heeft.';
$string['answernoterequired'] = 'Feedback-toevoeging mag niet leeg zijn.';
$string['answertest'] = 'Antwoordcontrole';
$string['answertest_help'] = 'Een antwoordcontrole wordt gebruikt om twee expressies te vergelijken, om te controleren of ze voldoen aan gestelde wiskundige criteria.';
$string['ATDiff_error_list'] = 'De antwoordcontrole ging mis. Breng de beheerder hiervan op de hoogte.';
$string['AT_EmptySA'] = 'Er is geprobeerd een antwoordcontrole uit te voeren met een leeg studentantwoord, waarschijnlijk is er sprake van een CAS validatie probleem tijdens het bewerken van de vraag.';
$string['AT_EmptyTA'] = 'Er is geprobeerd een antwoordcontrole uit te voeren met een leeg docentantwoord, waarschijnlijk is er sprake van een CAS validatieprobleem tijdens het bewerken van de vraag.';
$string['ATFacForm_error_list'] = 'De antwoordcontrole ging mis. Breng de beheerder hiervan op de hoogte.';
$string['ATFacForm_notfactored'] = 'Jouw antwoord is niet vermenigvuldigd.';
$string['ATInequality_backwards'] = 'Jouw ongelijkheid lijkt omgekeerd te zijn.';
$string['ATInequality_nonstrict'] = 'Je moet een strikte ongelijkheid hebben, maar dit is niet strikt!';
$string['ATInt_diff'] = 'Het lijkt er op dat je ten onrechte gedifferentieerd hebt.';
$string['ATInt_error_list'] = 'De antwoordcontrole ging mis. Breng de beheerder hiervan op de hoogte.';
$string['AT_NOTIMPLEMENTED'] = 'Deze antwoordcontrole is nog niet in gebruik.';
$string['ATNumDecPlaces_Wrong_DPs'] = 'Jouw antwoord is afgerond op het verkeerde aantal decimalen.';
$string['ATNumSigFigs_error_list'] = 'De antwoordcontrole ging mis. Breng de beheerder hiervan op de hoogte.';
$string['ATNumSigFigs_Inaccurate'] = 'De nauwkeurigheid van jouw antwoord is niet juist. Ofwel je hebt verkeerd afgerond, danwel een afronding gedaan tijdens de berekening, die doorwerkt in je antwoord.';
$string['ATNumSigFigs_WrongDigits'] = 'Jouw antwoord bevat niet het juiste aantal decimalen.';
$string['ATPartFrac_denom_ret'] = 'Als je antwoord is geschreven als een enkele breuk, dan zou de noemer {$a->m0} zijn. Echter,  {$a->m1} is het juiste antwoord.';
$string['ATPartFrac_diff_variables'] = 'De variabelen in jouw antwoord verschillen van die van de vraagtekst, controleer ze nogmaals.';
$string['ATPartFrac_error_list'] = 'De antwoordcontrole ging mis. Breng de beheerder hiervan op de hoogte.';
$string['ATPartFrac_ret_expression'] = 'Jouw antwoord onder een noemer gebracht is {$a->m0}';
$string['ATPartFrac_single_fraction'] = 'Jouw antwoord lijkt onder een noemer gebracht, het is de bedoeling dit te verdelen in meerdere breuken.';
$string['ATSingleFrac_error_list'] = 'De antwoordcontrole ging mis. Breng de beheerder hiervan op de hoogte.';
$string['ATSingleFrac_part'] = 'Jouw antwoord wordt in de vorm van ( {a} gedeeld door {b} ) verwacht.';
$string['ATSingleFrac_ret_exp'] = 'Jouw antwoord is algebraïsch niet gelijk aan het juiste antwoord. Je moet een fout gemaakt hebben.';
$string['autosimplify'] = 'Auto-vereenvoudig';
$string['autosimplify_help'] = 'Bepaald de waarde van de variabele "simp" binnen Maxima voor deze vraag. Dat is voor vraagvariabelen, vraagtekst e.d..
De waarde die opgegeven wordt in elke PRT zal deze waarde overschrijven voor de expressies in de vertakkingen.';
$string['autosimplifyprt'] = 'Auto-vereenvoudig';
$string['booleangotunrecognisedvalue'] = 'Ongeldige input.';
$string['boxsize'] = 'Grootte inputbox';
$string['boxsize_help'] = 'Breedte van het html-invulveld.';
$string['branchfeedback'] = 'Knoopvertakking feedback';
$string['branchfeedback_help'] = 'Deze CAS-tekst gebruik mag maken van alle vraagvariabelen, input-elementen of feedbackvariablen. Het wordt eerst geëvalueerd en dan weergegeven aan de student als deze vertakking wordt aangesproken.';
$string['calc_chain_rule_name'] = 'De kettingregel';
$string['calc_diff_linearity_rule_name'] = 'De kettingregel';
$string['calc_diff_standard_derivatives_name'] = 'Standaard afgeleiden';
$string['calc_int_linearity_rule_name'] = 'De kettingregel bij integreren';
$string['calc_int_standard_integrals_name'] = 'Standaard integralen';
$string['calc_product_rule_name'] = 'De productregel';
$string['calc_quotient_rule_name'] = 'De quotiëntregel';
$string['createtestcase'] = 'Maak een testcase';
$string['currentlyselectedvariant'] = 'Dit is de variant die hieronder wordt weergegeven.';
$string['debuginfo'] = 'Debug info';
$string['defaultprtcorrectfeedback'] = 'Goed gedaan.';
$string['defaultprtincorrectfeedback'] = 'Niet goed beantwoord.';
$string['defaultprtpartiallycorrectfeedback'] = 'Jouw antwoord is gedeeltelijk correct.';
$string['deletetestcase'] = 'Verwijder testcase ($a->no} for question {$a->question}';
$string['deletetestcaseareyousure'] = 'Weet je zeker dat je testcase {$a->no} voor vraag {$a->question}?';
$string['deletethistestcase'] = 'Verwijder deze testcase';
$string['editingtestcase'] = 'Bewerk testcase {$a->no} voor vraag {$a->question}';
$string['editthistestcase'] = 'Bewerk deze testcase...';
$string['errors'] = 'Error';
$string['exceptionmessage'] = '{$a}';
$string['expectedanswernote'] = 'Verwachte vraagnotitie';
$string['expectedoutcomes'] = 'Verwachte resultaat';
$string['expectedpenalty'] = 'Verwachte strafpunten';
$string['expectedscore'] = 'Verwachte score';
$string['FacForm_UnPick_intfac'] = 'Je moet een gemene deler wegdelen.';
$string['false'] = 'Fout';
$string['falsebranch'] = 'Fout-vertakking';
$string['falsebranch_help'] = 'Met deze velden bepaal je wat er gebeurt als de antwoordcontrôle een antwoord fout rekent.
### Modus en score
Hoe de beoordeling wordt aangepast: = betekent, ken een bepaalde score toe, +/- betekent tel op bij/haal af van de huidige totale score.

### Strafpunten
In adaptieve of interactieve modus, ken zoveel strafpunten toe.

### Volgende
Hier geef je een link naar de volgende node, of anders \'stop\'.

### Feedback-toevoeging
Dit is een tag voor rapport-doeleinden. Het is gemaakt om een uniek pad door de vertakkingen van elke antwoordcontrôle vast te leggen. Het wordt automatisch gegenereerd, maar kan gewijzigd worden in iets wat een duidelijkere betekening heeft.';
$string['feedbackvariables_help'] = 'De feedbackvariabelen maken het mogelijk om de inputs en/of de vraagvariabelen te verwerken alvorens verder te gaan in de vertakkingen. Variabelen die hier worden gedefinieerd mogen in onderliggende hierna overal in de boom gebruikt worden.';
$string['forbidwords'] = 'Verboden woorden';
$string['forbidwords_help'] = 'Dit is een kommagescheiden lijst van tekstfragmenten die verboden zijn in het antwoord van de leerling.';
$string['generalfeedback'] = 'Algemene feedback';
$string['generalfeedback_help'] = 'Algemene feedback is CAS-tekst.
Algemene feedback, vaak ook "uitwerkingen" genoemd, wordt aan de student laten zien, nadat zij de vraag hebben gedaan. Anders dan bij feedback die op het antwoord van de student wordt toegespitst, wordt deze feedback weergegeven aan alle studenten. Het kan wel afhangen van de vraagvariabelen die gebruikt worden in de versie van de vraag.';
$string['greek_alphabet_fact'] = '<center>
<table>
<tr><td>
hoofdletters, (quad) </td><td>  kleine letters, (quad) </td><td>  naam </td> </tr>   <tr> <td>
 (A)  </td><td>  (alpha)  </td><td>  alpha  </td> </tr>   <tr> <td>
 (B)  </td><td>  (beta)  </td><td>  beta </td> </tr>   <tr> <td>
 (Gamma)  </td><td>  (gamma)  </td><td>  gamma </td> </tr>   <tr> <td>
 (Delta)  </td><td>  (delta)  </td><td>  delta </td> </tr>   <tr> <td>
 (E)  </td><td>  (epsilon)  </td><td>  epsilon </td> </tr>   <tr> <td>
 (Z)  </td><td>  (zeta)  </td><td>  zeta </td> </tr>   <tr> <td>
 (H)  </td><td>  (eta)  </td><td>  eta </td> </tr>   <tr> <td>
 (Theta)  </td><td>  (theta)  </td><td>  theta </td> </tr>   <tr> <td>
 (K)  </td><td>  (kappa)  </td><td>  kappa </td> </tr>   <tr> <td>
 (M)  </td><td>  (mu)  </td><td>  mu </td> </tr>   <tr> <td>
 (N)  </td><td>  ) u)  </td><td>  nu </td> </tr>   <tr> <td>
 (Xi)  </td><td>  (xi)  </td><td>  xi </td> </tr>   <tr> <td>
 (O)  </td><td>  (o)  </td><td>  omicron </td> </tr>   <tr> <td>
 (Pi)  </td><td>  (pi)  </td><td>  pi </td> </tr>   <tr> <td>
 (I)  </td><td>  (iota)  </td><td>  iota </td> </tr>   <tr> <td>
 (P)  </td><td>  (rho) </td><td>  rho </td> </tr>   <tr> <td>
 (Sigma)  </td><td>  (sigma)  </td><td>  sigma </td> </tr>   <tr> <td>
 (Lambda)  </td><td>  (lambda)  </td><td>  lambda </td> </tr>   <tr> <td>
 (T)  </td><td>  (tau)  </td><td>  tau </td> </tr>   <tr> <td>
 (Upsilon)  </td><td>  (upsilon)  </td><td>  upsilon </td> </tr>   <tr> <td>
 (Phi)  </td><td>  (phi)  </td><td>  phi </td> </tr>   <tr> <td>
 (X)  </td><td>  (chi)  </td><td>  chi </td> </tr>   <tr> <td>
 (Psi)  </td><td>  (psi)  </td><td> psi </td> </tr>   <tr> <td>
 (Omega)  </td><td>  (omega)  </td><td>  omega </td></tr>
</table></center>';
$string['greek_alphabet_name'] = 'Het griekse alfabet';
$string['healthcheck'] = 'STACK healthcheck';
$string['healthcheckcache_db'] = 'CAS resultaten worden gecached in de database';
$string['healthcheckconfig'] = 'Maxima configuratiebestand';
$string['hyp_identities_name'] = 'Hyperbolische identiteiten';
$string['hyp_inverse_functions_name'] = 'Inverse hyperbolische functies';
$string['illegalcaschars'] = 'De tekens @ en $ zijn niet toegestaan in CAS input.';
$string['Illegal_floats'] = 'Jouw antwoord bevat decimale waarden, die niet gevraagd worden in deze vraag. Geef je antwoorden zonder het getal te benaderen. Bijvoorbeeld 1/3 en niet 0,33333 wat een benadering zou zijn van een derde.';
$string['inputdisplayed'] = 'Weergeven als';
$string['inputentered'] = 'Ingevulde waarde';
$string['inputexpression'] = 'Testinput';
$string['inputextraoptions'] = 'Extra opties';
$string['inputextraoptions_help'] = 'Sommige inputtypes vereisen extra opties om te werken. Je kunt die hier invoegen. Het gaat hier om een CAS expressie.';
$string['inputheading'] = 'Input: {$a}';
$string['inputname'] = 'Inputnaam';
$string['inputs'] = 'Inputs';
$string['inputstatus'] = 'Status';
$string['inputstatusname'] = 'Leeg';
$string['inputstatusnameinvalid'] = 'Ongeldig';
$string['inputstatusnamescore'] = 'Score';
$string['inputstatusnamevalid'] = 'Geldig';
$string['inputtest'] = 'Inputtest';
$string['inputtype'] = 'Inputtype';
$string['inputtypealgebraic'] = 'Algebraïsche input';
$string['inputtypeboolean'] = 'Goed/Fout';
$string['inputtypedropdown'] = 'Rolmenu';
$string['inputtype_help'] = 'Dit bepaalt het type inputelement, bijvoorbeeld: invulveld, goed/fout, tekstgebied.';
$string['inputtypematrix'] = 'Matrix';
$string['inputtypesinglechar'] = 'Enkel teken';
$string['inputtypetextarea'] = 'Tekstgebied';
$string['Maxima_DivisionZero'] = 'Deling door nul.';
$string['multcross'] = 'Kruis';
$string['multdot'] = 'Punt';
$string['multiplicationsign'] = 'Vermenigvuldigingsteken';
$string['multiplicationsign_help'] = 'Bepaalt hoe het vermenigvuldigingsteken wordt weergeven.';
$string['mustverify'] = 'Student moet verifiëren';
$string['namealreadyused'] = 'Deze naam is al eerder gebruikt.';
$string['newnameforx'] = 'Nieuwe naam voor \'{$a}';
$string['next'] = 'Volgende';
$string['nextcannotbeself'] = 'Een knoop kan niet linken naar zichzelf als volgende knoop.';
$string['nodehelp'] = 'Antwoordboom knoop';
$string['nodehelp_help'] = '### Antwoordtest
Een antwoordtest wordt gebruikt om twee expressies te vergelijken zodat gecontroleerd kan worden of de twee voldoen aan de gestelde wiskundige criteria.

### SAns
Dit is de eerste expressie die nodig is voor de antwoordtest functie. In asymetrische tests hoort hier het antwoord van de student in te staan (STANDAARD: ans1) hoewel er elke geldige CAS expressie kan worden ingevuld. Dit is afhankelijk van de vraagvariabelen of de feedbackvariabelen.

### TAns
Dit is de tweede expressie die nodig is voor de antwoordtest functie. In asymetrische tests is dit het antwoord van de leraar, er kan elke geldige CAS expressie worden ingevuld. Dit is afhankelijk van de vraagvariabelen of de feedbackvariabelen.

### Testopties
Dit veld maakt het mogelijk om extra opties aan de antwoordtest toe te voegen, zoals:een variabele of een numerieke precisie.

### Stil
Wanneer dit op ja staat, wordt de feedback automatisch gegenereerd, maar de antwoordtest wordt achtergehouden en niet getoond aan de leerling. De feedbackvelden in de takken worden niet gewijzigd door deze optie.';
$string['nodex'] = 'Knoop {$a}';
$string['nodexdelete'] = 'Verwijder knoop {$a}';
$string['nodexfalsefeedback'] = 'Knoop {$a} \'fout\'-feedback';
$string['nodextruefeedback'] = 'Knoop {$a} \'goed\'-feedback';
$string['nodexwhenfalse'] = 'Knoop {$a} als \'fout\'';
$string['nodexwhentrue'] = 'Knoop {$a} als \'goed\'';
$string['nonempty'] = 'Dit mag niet leeg zijn.';
$string['noprtsifnoinputs'] = 'Een vraag zonder inputs kan geen PRT\'s hebben.';
$string['notanswered'] = 'Onbeantwoord';
$string['notavalidname'] = 'Geen geldige naam';
$string['notestcasesyet'] = 'Er zijn nog geen testcases toegevoegd.';
$string['options'] = 'Opties';
$string['optionsnotrequired'] = 'Dit input type behoeft geen verdere opties';
$string['overallresult'] = 'Het eindresultaat';
$string['penalty'] = 'Strafpunten';
$string['questionnotempty'] = 'De vraagtoevoeging kan niet leeg gelaten worden als gebruik gemaakt wordt van rand(). De vraagtoevoeging wordt gebruikt om onderscheid te maken tussen verschillende willekeurige versies van de vraag.';
$string['questionvariables'] = 'Vraagvariabelen';
$string['quiet_help'] = 'Wanneer hier voor \'ja\' wordt gekozen, wordt alle automatisch gegenereerde feedback onderdrukt en niet weergegeven aan de student. De feedback velden in de vertakkingen worden niet beïnvloed door deze instelling.';
$string['sans_help'] = 'Dit is de eerste expressie die nodig is voor de antwoordcontrôle functie. In asymetrische tests hoort hier het antwoord van de student in te staan (STANDAARD: ans1) hoewel er elke geldige CAS expressie kan worden ingevuld. Dit is afhankelijk van de vraagvariabelen of de feedbackvariabelen.';
$string['settingusefullinks'] = 'Handige links';
$string['specificfeedback'] = 'Specifieke feedback';
$string['stackCas_apostrophe'] = 'Aanhalingstekens zijn niet toegestaan in antwoorden.';
$string['stackDoc_docs'] = 'STACK Documentatie';
$string['stackDoc_docs_desc'] = '<a href="{$a->link}">Documentatie voor STACK</a>: een lokale statische wiki.';
$string['stackDoc_home'] = 'Documentatie startpagina';
$string['stackDoc_index'] = 'Categorie-index';
$string['stackDoc_parent'] = 'Bovenliggend';
$string['stackDoc_siteMap'] = 'Site map';
$string['stackInstall_testsuite_choose'] = 'Selecteer een antwoordcontrôle';
$string['stackInstall_testsuite_intro'] = 'Deze pagina maakt het voor je mogelijk om te testen of de STACK antwoordcontrole functie goed werkt. Let op dat alleen antwoordcontroles kunnen worden getest door de webinterface. Andere Maxima commands moeten getest worden via de commandline: bekijk unittest.mac.';
$string['stackInstall_testsuite_title'] = 'Een testomgeving voor de STACK antwoordcontrole functie';
$string['stackInstall_testsuite_title_desc'] = 'Het <a href="{$a->link}">Antwoordcontrole testscript</a> bepaalt of de antwoordcontrolefunctie goed werkt. Het script is ook handig om te leren van voorbeelden, hoe elke antwoordcontrole gebruikt kan worden.';
$string['stackOptions_AnsTest_values_AlgEquiv'] = 'AlgEquiv';
$string['stackOptions_AnsTest_values_CasEqual'] = 'CasEqual';
$string['stackOptions_AnsTest_values_CompSquare'] = 'CompletedSquare';
$string['stackOptions_AnsTest_values_Diff'] = 'Diff';
$string['stackOptions_AnsTest_values_EqualComAss'] = 'EqualComAss';
$string['stackOptions_AnsTest_values_Expanded'] = 'Expanded';
$string['tans_help'] = 'Dit is de tweede expressie die nodig is voor de antwoordcontrole functie. In asymmetrische tests is dit het antwoord van de leraar, er kan elke geldige CAS expressie worden ingevuld. Dit is afhankelijk van de vraagvariabelen of de feedbackvariabelen.';
$string['tansinvalid'] = 'TAns is ongeldig: {$a}';
$string['tansrequired'] = 'TAns mag niet leeg zijn.';
$string['teacheranswer'] = 'Leraarantwoord';
$string['teachersanswer'] = 'Modelantwoord';
$string['teachersanswer_help'] = 'De docent moet een modelantwoord opgeven voor elke input. Dit moet een geldige Maxima expressie zijn, waarbij gebruik gemaakt mag worden van de vraagvariabelen.';
$string['testcasexresult'] = 'Testcase {$a->no}{$a->result}';
$string['TEST_FAILED'] = 'De antwoordcontrole heeft niet juist gewerkt: waarschuw je leraar. {$a->errors}';
$string['testingquestion'] = 'Vraag aan het testen {$a}';
$string['testinputs'] = 'Testinputs';
$string['testinputsimpwarning'] = 'Let op dat de test inputs altijd <em>onvereenvoudigd</em> zijn, ongeacht de vraag- of PRT-optie-instellingen. Gebruik <tt>ev(....,simp)</tt> om een gedeelte of de gehele testinput te vereenvoudigen.';
$string['testoptions'] = 'Test opties';
$string['testoptions_help'] = 'Dit veld maakt het mogelijk voor om een extra optie op te geven voor de antwoordcontrole functie; b.v. een variabele of een numerieke precisie.';
$string['truebranch_help'] = 'Met deze velden bepaal je wat er gebeurt als de antwoordcontrole een antwoord goed rekent.
### Modus en score
Hoe de beoordeling wordt aangepast: = betekent, ken een bepaalde score toe, +/- betekent tel op bij/haal af van de huidige totale score.

### Strafpunten
In adaptieve of interactieve modus, ken zoveel strafpunten toe.

### Volgende
Hier geef je een link naar de volgende node, of anders \'stop\'.

### Feedback-toevoeging
Dit is een tag voor rapportdoeleinden. Het is gemaakt om een uniek pad door de vertakkingen van elke antwoordcontrole vast te leggen. Het wordt automatisch gegenereerd, maar kan gewijzigd worden in iets wat een duidelijkere betekenis heeft.';
