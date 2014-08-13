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
 * Strings for component 'workshop', language 'eu', branch 'MOODLE_26_STABLE'
 *
 * @package   workshop
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['aggregategrades'] = 'Kalifikazoak birkalkulatu';
$string['aggregation'] = 'Kalifikazioen agregazioa';
$string['allocate'] = 'Esleitu bidalketak';
$string['allocatedetails'] = 'hainbeste espero dira: {$a->expected}<br />bidalitakoak: {$a->submitted}<br />esleitzekoak: {$a->allocate}';
$string['allocation'] = 'Aurkezpena';
$string['allocationconfigured'] = 'Esleipena konfiguratuta';
$string['allocationdone'] = 'Esleipena eginda';
$string['allocationerror'] = 'Esleipen-errorea';
$string['allsubmissions'] = 'Bidalketa guztiak ({$a})';
$string['alreadygraded'] = 'Kalifikatuta dagoeneko';
$string['areaconclusion'] = 'Ondorio-testua';
$string['areainstructauthors'] = 'Bidalketarako argibideak';
$string['areainstructreviewers'] = 'Ebaluaziorako argibideak';
$string['areaoverallfeedbackattachment'] = 'Feedback orokorraren eranskinak';
$string['areaoverallfeedbackcontent'] = 'Feedback orokorraren testuak';
$string['areasubmissionattachment'] = 'Bidalketaren eranskinak';
$string['areasubmissioncontent'] = 'Bidalketaren testuak';
$string['assess'] = 'Ebaluatu';
$string['assessedexample'] = 'Ebaluatutako ereduaren bidalketa';
$string['assessedsubmission'] = 'Ebaluatutakoaren bidalketa';
$string['assessingexample'] = 'Ebaluatutako ereduaren bidalketa';
$string['assessingsubmission'] = 'Ebaluatutakoaren bidalketa';
$string['assessment'] = 'Ebaluazioa';
$string['assessmentby'] = 'egilea <a href="{$a->url}">{$a->name}</a>';
$string['assessmentbyfullname'] = '{$a} -ren ebaluazioa';
$string['assessmentbyyourself'] = 'Zeuk egindako ebaluazioa';
$string['assessmentdeleted'] = 'Esleipena kendutako ebaluazioa';
$string['assessmentend'] = 'Ebaluazioetarako amaierako data';
$string['assessmentendbeforestart'] = 'Ezin da ebaluazioa egiteko epea zehaztu, ebaluaziorako data ireki baino lehen';
$string['assessmentenddatetime'] = 'Ebaluaziorako azken eguna: {$a->daydatetime} ({$a->distanceday})';
$string['assessmentendevent'] = '{$a} {Ebaluaziorako azken eguna}';
$string['assessmentform'] = 'Ebaluaziorako formularioa';
$string['assessmentofsubmission'] = '<a href="{$a->assessmenturl}">Ebaluazioa</a> of <a href="{$a->submissionurl}">{$a->submissiontitle}</a>';
$string['assessmentreference'] = 'Erreferentziazko ebaluazioa';
$string['assessmentreferenceconflict'] = 'Ezin zaio adibidezko bidalketarik ebaluatu erreferentziazko bidalketa egin duenari.';
$string['assessmentreferenceneeded'] = 'Zuk bidalketa hau ebaluatu behar duzu erreferentziazko ebaluazioa sortzeko. Sakatu "Jarraitu" botoiari bidalketa ebaluatzeko.';
$string['assessmentsettings'] = 'Ebaluazioaren ezarpenak';
$string['assessmentstart'] = 'Noiztik irekita ebaluaziorako';
$string['assessmentstartdatetime'] = 'Zabalik ebaluatzeko: {$a->daydatetime} ({$a->distanceday})';
$string['assessmentstartevent'] = '{$a} (zabalduko da ebaluaziorako)';
$string['assessmentweight'] = 'Ebaluazioaren pisua';
$string['assignedassessments'] = 'Ebaluatzeko esleitutako bidalketak';
$string['assignedassessmentsnone'] = 'Ez duzu ebaluatzeko bidalketarik esleituta';
$string['backtoeditform'] = 'Itzuli edizio-formulariora';
$string['byfullname'] = 'egilea: <a href="{$a->url}">{$a->name}</a>';
$string['calculategradinggrades'] = 'Kalkulatu ebaluazioaren kalifikazioak';
$string['calculategradinggradesdetails'] = 'hainbeste espero dira: {$a->expected}<br />kalkulatutakoak: {$a->calculated}';
$string['calculatesubmissiongrades'] = 'Kalkulatu bidalketaren kalifikazioak';
$string['calculatesubmissiongradesdetails'] = 'hainbeste espero dira: {$a->expected}<br />kalkulatutakoak: {$a->calculated}';
$string['chooseuser'] = 'Aukeratu erabiltzailea...';
$string['clearaggregatedgrades'] = 'Garbitu ebaluazioaren kalifikazio guztiak';
$string['clearaggregatedgradesconfirm'] = 'Ziur al zaude kalkulatutako kalifikazioak eta ebaluazioaren kalifikazioak ezabatu nahi dituzula?';
$string['clearaggregatedgrades_help'] = 'Berrezarri egingo dira bidalketetan batutako kalifikazioak eta baita ebaluazioetakoak ere. Kalifikazio hauek berkalkula ditzakezu berriro, kalifikazioen ebaluazio-fasean.';
$string['clearassessments'] = 'Garbitu ebaluazioak';
$string['clearassessmentsconfirm'] = 'Ziur al zaude ebaluazioaren kalifikazio guztiak ezabatu nahi dituzula? Ezin izango duzu berriz informazio hau eskuratu, ebaluatzaileek esleitutako lanak berriz kalifikatu beharko dituzte.';
$string['clearassessments_help'] = 'Bidalketan batutako kalifikazioak eta ebaluazioetakoak berrabiaraziko dira. Gorde egingo da ebaluazio-formularioen informazioa, aztertzaileek, ordea, ebaluazio-formularioa berriro zabaldu beharko dute, eta gorde, emandako kalifikazioak berriro kalkulatzeko.';
$string['conclusion'] = 'Ondorioak';
$string['conclusion_help'] = 'Erabiltzaileari ondorioak agertuko zaizkio zeregina amaitutakoan.';
$string['configexamplesmode'] = 'Tailerretako ebaluazio-adibideen berezko modua';
$string['configgrade'] = 'Berezko gehienezko kalifikazioa bidalketetarako tailerretan';
$string['configgradedecimals'] = 'Berez puntuaren atzetik erakutsi behar diren zenbakiak kalifikazioak erakustean';
$string['configgradinggrade'] = 'Berezko gehienezko kalifikazioa ebaluazioetarako tailerretan';
$string['configmaxbytes'] = 'Guneko tailer guztietarako berezko bidalketetarako fitxategien gehienezko tamaina (ikastaroko eta bestelako ezarpen lokalen menpekoa)';
$string['configstrategy'] = 'Berezko kalifikazio-estrategia tailerretan';
$string['createsubmission'] = 'Hasi zure bidalketa prestatzen';
$string['daysago'] = 'duela {$a} egun';
$string['daysleft'] = '{$a} egun falta dira';
$string['daystoday'] = 'gaur';
$string['daystomorrow'] = 'bihar';
$string['daysyesterday'] = 'atzo';
$string['deadlinesignored'] = 'Denbora-muga ez zaizu zeuri aplikatuko';
$string['editassessmentform'] = 'Editatu ebaluazio-formularioa';
$string['editassessmentformstrategy'] = 'Editatu ({$a}) ebaluazio-formularioa';
$string['editingassessmentform'] = 'Ebaluazio-formularioa editatzen';
$string['editingsubmission'] = 'Bidalketa editatzen';
$string['editsubmission'] = 'Bidalketa editatu';
$string['err_multiplesubmissions'] = 'Formulario hau bete bitartean bidalketaren beste bertsio bat gorde da. Erabiltzaile bakoitzak bidalketa bakarra egin dezake.';
$string['evaluategradeswait'] = 'Mesedez, itxaron ebaluazioak ebaluatu eta kalifikazioak kalkulatu arte';
$string['evaluation'] = 'Ebaluazioa kalifikatzen';
$string['evaluationmethod'] = 'Ebaluazioa kalifikatzeko metodoa';
$string['evaluationmethod_help'] = 'Kalifikazioa ebaluatzeko metodoak zehazten du nola kalkulatzen den ebaluazioen kalifikazioa. Kalifikazioak ezarpen ezberdinekin nahi beste aldiz berkalkulatu daitezke emaitzarekin ados egon arte.';
$string['evaluationsettings'] = 'Kalifikazioa ebaluatzeko ezarpenak';
$string['event_assessable_uploaded'] = 'Bidalketa igo da.';
$string['example'] = 'Adibide motako bidalketa';
$string['exampleadd'] = 'Gehitu adibide motako bidalketa';
$string['exampleassess'] = 'Ebaluatu adibide motako bidalketa';
$string['exampleassessments'] = 'Ebaluatzeko adibide motako bidalketak';
$string['exampleassesstask'] = 'Ebaluatu adibideak';
$string['exampleassesstaskdetails'] = 'hainbeste espero dira: {$a->expected}<br />ebaluatutakoak: {$a->assessed}';
$string['examplecomparing'] = 'Adibide motako bidalketen ebaluazioak alderatzen';
$string['exampledelete'] = 'Ezabatu adibidea';
$string['exampledeleteconfirm'] = 'Ziur al zaude adibide motako bidalketa hau ezabatu nahi duzula? \'Jarraitu\' botoia sakatu bidalketa hau ezabatzeko.';
$string['exampleedit'] = 'Editatu adibidea';
$string['exampleediting'] = 'Adibidea editatzen';
$string['exampleneedassessed'] = 'Lehenengo adibidezko bidalketa guztiak ebaluatu behar dituzu.';
$string['exampleneedsubmission'] = 'Lehenago zure lana bidali eta adibidezko bidalketa guztiak ebaluatu behar dituzu.';
$string['examplesbeforeassessment'] = 'Adibideak eskuragarri daude norberaren bidalketa egin aurretik, eta berdinen arteko ebaluazioa egin aurretik ebaluatu behar dira';
$string['examplesbeforesubmission'] = 'Norberaren bidalketa egin aurretik,  ebaluatu behar dira adibideak';
$string['examplesmode'] = 'Ebaluazio-adibideen modua';
$string['examplesubmissions'] = 'Adibide motako bidalketa';
$string['examplesvoluntary'] = 'Adibide-bidalketen ebaluazioa borondatezkoa da';
$string['feedbackauthor'] = 'Egilearentzako feedbacka';
$string['feedbackauthorattachment'] = 'Eranskina';
$string['feedbackby'] = 'Ondokoaren feedbacka: {$a}';
$string['feedbackreviewer'] = 'Ebaluatzaileak emandako feedbacka';
$string['feedbacksettings'] = 'Feedbacka';
$string['formataggregatedgrade'] = '{$a->grade}';
$string['formataggregatedgradeover'] = '<del>{$a->grade}</del><br /><ins>{$a->over}</ins>';
$string['formatpeergrade'] = '<span class="grade">{$a->grade}</span> <span class="gradinggrade">({$a->gradinggrade})</span>';
$string['formatpeergradeover'] = '<span class="grade">{$a->grade}</span> <span class="gradinggrade">(<del>{$a->gradinggrade}</del> / <ins>{$a->gradinggradeover}</ins>)</span>';
$string['formatpeergradeoverweighted'] = '<span class="grade">{$a->grade}</span> <span class="gradinggrade">(<del>{$a->gradinggrade}</del> / <ins>{$a->gradinggradeover}</ins>)</span> @ <span class="weight">{$a->weight}</span>';
$string['formatpeergradeweighted'] = '<span class="grade">{$a->grade}</span> <span class="gradinggrade">({$a->gradinggrade})</span> @ <span class="weight">{$a->weight}</span>';
$string['givengrades'] = 'Emandako kalifikazioak';
$string['gradecalculated'] = 'Bidalketarako kalkulatutako kalifikazioa';
$string['gradedecimals'] = 'Hamartar-kopurua kalifikazioetan';
$string['gradegivento'] = '&gt;';
$string['gradeinfo'] = 'Kalifikazioa: {$a->received}  {$a->max}-tik';
$string['gradeitemassessment'] = '{$a->workshopname} (ebaluazioa)';
$string['gradeitemsubmission'] = '{$a->workshopname} (bidalketa)';
$string['gradeover'] = 'Indargabetu kalifikazioa bidalketarako';
$string['gradereceivedfrom'] = '&lt;';
$string['gradesreport'] = 'Tailerraren kalifikazio-txostena';
$string['gradinggrade'] = 'Ebaluazioaren kalifikazioa';
$string['gradinggradecalculated'] = 'Kalkulatutako kalifikazioa ebaluaziorako';
$string['gradinggrade_help'] = 'Ezarpen honek bidalketa baten ebaluazioan lor daitekeen gehienezko kalifikazioa zehazten du.';
$string['gradinggradeof'] = 'Ebaluazioaren kalifikazioa ({$a}(e)tik)';
$string['gradinggradeover'] = 'Indargabetu kalifikazioa ebaluaziorako';
$string['gradingsettings'] = 'Kalifikazioen ezarpenak';
$string['groupnoallowed'] = 'Ez duzu tailer honetako talderen batean sartzeko baimenik';
$string['iamsure'] = 'Bai, ziur nago';
$string['info'] = 'Info';
$string['instructauthors'] = 'Bidalketarako argibideak';
$string['instructreviewers'] = 'Ebaluaziorako argibideak';
$string['introduction'] = 'Deskribapena';
$string['latesubmissions'] = 'Azken orduko bidalketak';
$string['latesubmissionsallowed'] = 'Azken orduko bidalketak baimenduta daude';
$string['latesubmissions_desc'] = 'Baimendu epez kanpoko bidalketak';
$string['latesubmissions_help'] = 'Gaituz gero, egileek bidalketak epez kanpo edo ebaluazio-aldian egin ditzakete. Hala ere, berandu egindako bidalketak ezin dira editatu.';
$string['maxbytes'] = 'Bidalketa eranskinaren gehienezko tamaina';
$string['modulename'] = 'Tailerra';
$string['modulename_help'] = 'Tailerra jarduerak ikasleen lanak jaso, berrikusi eta berdinen ebaluazioa egiteko aukera ematen du.

Ikasleak edozein eduki digital bidal dezake (fitxategiak), hala nola testu-fitxategiak, eta Moodle-n zuzenean ere idatz dezake testu editorea erabilita.

Bidalitako lanak irakasleak zehazturiko irizpide anitzeko ebaluazio-formulario bat erabilita kalifikatzen dira. Aurretik berdinen ebaluazio prozesua eta ebaluazio formularioa ulertzeko praktikak egin daitezke irakasleak emandako bidalketa-adibideak erabilita, ebaluazio-erreferentzia batekin batera. Ikasleek kide baten edo gehiagoren ebaluazioa egiteko aukera du. Bidalketak eta berrikusketak anonimoak izan daitezke nahi izanez gero.

Ikasleak bi kalifikazio lortuko ditu tailerra jardueran, bat euren bidalketarena eta bestea beste kideei eginiko kalifikazioarena. Biak kalifikatzailean gordetzen dira.';
$string['modulenameplural'] = 'Tailerrak';
$string['mysubmission'] = 'Nire bidalketa';
$string['nattachments'] = 'Gehienezko eranskin-kopurua bidalketako';
$string['noexamples'] = 'Oraindik ez dago adibiderik tailer honetan';
$string['noexamplesformready'] = 'Ebaluazio-moldea zehaztu behar duzu adibide-bidalketak eman aurretik';
$string['nogradeyet'] = 'Ez da oraindik kalifikatu';
$string['nosubmissionfound'] = 'Ez da erabiltzaile honen bidalketarik aurkitu';
$string['nosubmissions'] = 'Oraindik ez dago bidalketarik tailer honetan';
$string['notassessed'] = 'Ebaluatu gabea';
$string['nothingtoreview'] = 'Ez dago berrikusteko ezer';
$string['notoverridden'] = 'Baliogabetu gabea';
$string['noworkshops'] = 'Ez dago tailerrik ikastaro honetan';
$string['noyoursubmission'] = 'Oraindik ez duzu lanik bidali';
$string['nullgrade'] = '-';
$string['overallfeedback'] = 'Feedback orokorra';
$string['overallfeedbackfiles'] = 'Feedback orokorraren gehienezko eranskin-kopurua';
$string['overallfeedbackmaxbytes'] = 'Feedback orokorraren eranskinen gehienezko tamaina.';
$string['overallfeedbackmode'] = 'Feedback orokorraren modua';
$string['overallfeedbackmode_0'] = 'Desgaituta';
$string['overallfeedbackmode_1'] = 'Gaituta eta hautazkoa';
$string['overallfeedbackmode_2'] = 'Gaituta eta derrigorrezkoa';
$string['overallfeedbackmode_help'] = 'Gaituz gero, ebaluazio-formularioaren beheko aldean testu-koadro bat erakutsiko da. Ebaluatzaileek bertan ebaluazio orokorra idatz edo euren ebaluazioaren azalpen gehigarria eman dezakete.';
$string['page-mod-workshop-x'] = 'Tailerraren edozein orri';
$string['participant'] = 'Partaidea';
$string['participantrevierof'] = 'Partaidea ondokoen ebaluatzailea da';
$string['participantreviewedby'] = 'Ondokoek ebaluatu dute partaidea';
$string['phaseassessment'] = 'Ebaluazio-aldia';
$string['phaseclosed'] = 'Itxita';
$string['phaseevaluation'] = 'Kalifikazioa ebaluatzeko aldia';
$string['phasesetup'] = 'Ezarpenak zehazteko aldia';
$string['phasesoverlap'] = 'Bidalketa-aldia eta ebaluazio-aldia ezin dira gainjarri';
$string['phasesubmission'] = 'Bidalketa-aldia';
$string['pluginadministration'] = 'Tailerraren kudeaketa';
$string['pluginname'] = 'Tailerra';
$string['prepareexamples'] = 'Prestatu adibide motako bidalketak';
$string['previewassessmentform'] = 'Aurreikusi';
$string['publishedsubmissions'] = 'Argitaratutako bidalketak';
$string['publishsubmission'] = 'Argitaratu bidalketa';
$string['publishsubmission_help'] = 'Publikatutako bidalketak besteentzat eskuragarri egongo dira tailerra ixten denean';
$string['reassess'] = 'Berriro ebaluatu';
$string['receivedgrades'] = 'Jasotako kalifikazioak';
$string['recentassessments'] = 'Tailerraren ebaluazioak:';
$string['recentsubmissions'] = 'Tailerraren bidalketak:';
$string['saveandclose'] = 'Gorde eta itxi';
$string['saveandcontinue'] = 'Gorde eta jarraitu editatzen';
$string['saveandpreview'] = 'Gorde eta aurreikusi';
$string['saveandshownext'] = 'Gorde eta erakutsi hurrengoa';
$string['selfassessmentdisabled'] = 'Auto-ebaluazioa desgaituta';
$string['showingperpage'] = '{$a} elementu erakusten orriko';
$string['showingperpagechange'] = 'Aldatu...';
$string['someuserswosubmission'] = 'Gutxienez egileetako batek ez du lanik bidali';
$string['sortasc'] = 'Behetik gora ordenatu';
$string['sortdesc'] = 'Goitik behera ordenatu';
$string['strategy'] = 'Kalifikazio-estrategia';
$string['strategy_help'] = 'Kalifikazioa estrategiak ebaluazio formularioa eta bidalketak kalifikatzeko metodoa zehazten ditu.

* Metatutako kalifikazioa - Iruzkinak eta kalifikazio bat ematen dira zehaztutako arlo bakoitzean
* Iruzkinak - Iruzkinak ematen dira zehaztutako arlo bakoitzean baina ez da kalifikaziorik ematen
* Errore-kopurua - Iruzkinak eta Bai/Ez ebaluazioa egiten da zehaztutako baieztapen bakoitzean
* Argibideak - Mailakatze-ebaluazioa egiten da zehaztutako irizpide bakoitzean';
$string['submission'] = 'Bidalketa';
$string['submissionattachment'] = 'Eranskina';
$string['submissionby'] = '{$a} -ren bidalketa';
$string['submissioncontent'] = 'Bidalketaren edukia';
$string['submissionend'] = 'Bidalketetarako azken eguna';
$string['submissionendbeforestart'] = 'Bidalketak egiteko azken eguna ezin da bidalketak egiteko hasiera baino lehenagokoa izan.';
$string['submissionenddatetime'] = 'Bidalketetarako azken eguna: {$a->daydatetime} ({$a->distanceday})';
$string['submissionendevent'] = '{$a} (bidalketetarako azken eguna)';
$string['submissionendswitch'] = 'Hurrengo aldira igaro bidalketetarako azken eguna igarotzean';
$string['submissionendswitch_help'] = 'Bidalketak egiteko azken eguna zehaztuta badago eta aukera hau markatuta badago, tailerra hurrengo aldira automatikoki igaroko da azken eguna igarotzean.

Aukera hau gaituz gero, esleipen automatikoa konfiguratzea gomendatzen da. Bidalketak ez badira esleitzen ezin da ebaluaziorik egin ebaluazio-aldian egon arren.';
$string['submissiongrade'] = 'Bidalketaren kalifikazioa';
$string['submissiongrade_help'] = 'Ezarpen honek bidalitako lanetan lor daitekeen gehienezko kalifikazioa zehazten du.';
$string['submissiongradeof'] = 'Bidalketaren kalifikazioa ({$a}(e)tik)';
$string['submissionsettings'] = 'Bidalketaren ezarpenak';
$string['submissionstart'] = 'Bidalketetarako lehen eguna';
$string['submissionstartdatetime'] = 'Bidalketetarako lehen eguna {$a->daydatetime} ({$a->distanceday})';
$string['submissionstartevent'] = '{$a} (bidalketetarako lehen eguna)';
$string['submissiontitle'] = 'Izenburua';
$string['subplugintype_workshopallocation'] = 'Bidalketak esleitzeko metodoa';
$string['subplugintype_workshopallocation_plural'] = 'Bidalketak esleitzeko metodoak';
$string['subplugintype_workshopeval'] = 'Ebaluazioa kalifikatzeko metodoa';
$string['subplugintype_workshopeval_plural'] = 'Kalifikazioa ebaluatzeko metodoak';
$string['subplugintype_workshopform'] = 'Kalifikazio-estrategia';
$string['subplugintype_workshopform_plural'] = 'Kalifikazio-estrategiak';
$string['switchingphase'] = 'Aldaketa-aldia';
$string['switchphase'] = 'Aldatu aldia';
$string['switchphase10info'] = 'Tailerra <strong>Ezarpenak zehazteko aldi</strong>ra eramango duzu. Aldi honetan erabiltzaileek ezin dituzte aldatu euren bidalketak edo ebaluazioak.Tailerraren ezarpenak, ebaluazio-formularioetan ezarritako kalifikazio-estrategiak eta ebaluazio-formularioak aldatzeko erabil dezakete irakasleek aldi hau.';
$string['switchphase20info'] = 'Tailerra <strong>Bidalketa-aldi</strong>ra eramango duzu. Aldi honetan ikasleek lanak bidal ditzakete (sarbide-kontrolerako epeen barruan, ezarpen hori ezarrita badago). Irakasleek aurkezpenak eslei ditzakete berrikusketarako.';
$string['switchphase30auto'] = 'Tailerra ebaluazio-aldira automatikoki igaroko da {$a->daydatetime} ({$a->distanceday}) ondoren';
$string['switchphase30info'] = 'Tailerra <strong>Ebaluazio-aldi</strong>ra eramango duzu. Aldi honetan ebaluatzaileek esleitu zaizkien lanak ebalua ditzakete (sarbide-kontrolerako epeen barruan, ezarpen hori ezarrita badago).';
$string['switchphase40info'] = 'Tailerra <strong>Kalifikazioa ebaluatzeko aldi</strong>ra eramango duzu. Aldi honetan erabiltzaileek ezin dituzte beren bidalketa edo ebaluazioak aldatu. Irakasleek ebaluazio-tresnak erabil ditzakete azken kalifikazioak kalkulatzeko eta ebaluatzaileei feedbacka emateko.';
$string['switchphase50info'] = 'Tailerra itxi egingo duzu. Horren ondorioz, kalkulatutako kalifikazioak kalifikazio-liburuan agertuko dira. Ikasleek beren bidalketak eta ebaluazioak ikus ditzakete.';
$string['taskassesspeers'] = 'Ebaluatu kideak';
$string['taskassesspeersdetails'] = 'denera: {$a->total}<br />bidali gabe: {$a->todo}';
$string['taskassessself'] = 'Ebaluatu zeure burua';
$string['taskconclusion'] = 'Eman itxiera bat jarduerari';
$string['taskinstructauthors'] = 'Eman bidalketa egiteko argibideak';
$string['taskinstructreviewers'] = 'Eman ebaluazioa egiteko argibideak';
$string['taskintro'] = 'Zehaztu tailerraren deskribapena';
$string['tasksubmit'] = 'Bidali zure lana';
$string['toolbox'] = 'Tailerraren tresna-kutxa';
$string['undersetup'] = 'Tailerra ez da oraindik abian jarri. Itxaron, mesedez, hurrengo aldira igaro arte.';
$string['useexamples'] = 'Erabili adibideak';
$string['useexamples_desc'] = 'Ebaluazioa praktikatzeko adibideak eskainiko dira';
$string['useexamples_help'] = 'Gaituz gero, erabiltzaileek ebaluazioa  adibide moldeko ebaluazio bat edo gehiagorekin proba dezakete eta beren ebaluazioa erreferentzia gisako beste batekin alderatu ahal dute. Kalifikazio hau ez da ebaluazioan kontuan hartuko.';
$string['usepeerassessment'] = 'Erabili berdinen arteko ebaluazioa';
$string['usepeerassessment_desc'] = 'Ikasleek beste batzuen lana ebalua dezakete';
$string['usepeerassessment_help'] = 'Gaituz gero, erabiltzaile bat izenda daiteke beste batzuen ebaluazioa egiteko. Kalifikazio bat jasoko du ebaluazioa egiteko, bere aurkezpenerako kalifikazioaz gain.';
$string['userdatecreated'] = 'noiz bidalia: <span>{$a}</span>';
$string['userdatemodified'] = 'noiz aldatua: <span>{$a}</span>';
$string['userplan'] = 'Tailerraren planifikazioa';
$string['userplan_help'] = 'Tailerraren planifikazioak jardueraren aldiak erakusten ditu eta aldi bakoitzaren lanak zerrendatzen ditu. Uneko aldia nabarmenduta dago eta lanen osaketa marka batez adierazten da.';
$string['useselfassessment'] = 'Erabili auto-ebaluazioa';
$string['useselfassessment_desc'] = 'Ikasleek beren lana ebalua dezakete';
$string['useselfassessment_help'] = 'Gaituz gero, erabiltzaile bat izenda daiteke bere aurkezpena kalifikatzeko. Kalifikazio bat jasoko du ebaluazioa egiteko, bere aurkezpenerako kalifikazioaz gain.';
$string['weightinfo'] = 'Pisua: {$a}';
$string['withoutsubmission'] = 'Bidalketarik esleitu ez zaion ebaluatzailea';
$string['workshop:addinstance'] = 'Gehitu beste tailer bat';
$string['workshop:allocate'] = 'Esleitu bidalketak ebaluazioarako';
$string['workshop:editdimensions'] = 'Editatu ebaluazio-formularioa';
$string['workshop:ignoredeadlines'] = 'Denbora mugak kontuan ez hartu';
$string['workshop:manageexamples'] = 'Kudeatu adibide motako bidalketak';
$string['workshopname'] = 'Tailerraren izena';
$string['workshop:overridegrades'] = 'Gainidatzi kalkulaturiko kalifikazioak';
$string['workshop:peerassess'] = 'Ebaluatutako kideak';
$string['workshop:publishsubmissions'] = 'Argitaratu bidalketak';
$string['workshop:submit'] = 'Bidali';
$string['workshop:switchphase'] = 'Aldatu aldia';
$string['workshop:view'] = 'Tailerra ikusi';
$string['workshop:viewallassessments'] = 'Ikusi ebaluazio guztiak';
$string['workshop:viewallsubmissions'] = 'Ikusi bidalketa guztiak';
$string['workshop:viewauthornames'] = 'Ikusi egileen izenak';
$string['workshop:viewauthorpublished'] = 'Ikusi argitaratutako bidaldeten egileak';
$string['workshopviewed'] = 'Tailerra ikusita';
$string['workshop:viewpublishedsubmissions'] = 'Ikusi argitaratutako bidalketak';
$string['workshop:viewreviewernames'] = 'Ikusi ebaluatzaileen izenak';
$string['yourassessment'] = 'Zure ebaluazioa';
$string['yourgrades'] = 'Zure kalifikazioak';
$string['yoursubmission'] = 'Zure bidalketak';
