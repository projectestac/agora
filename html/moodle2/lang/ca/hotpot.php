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
 * Strings for component 'hotpot', language 'ca', branch 'MOODLE_24_STABLE'
 *
 * @package   hotpot
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['abandoned'] = 'Abandonat';
$string['activitygrade'] = 'Qualificació de l\'activitat';
$string['added'] = 'Afegida';
$string['addquizchain'] = 'Afegeix una cadena de qüestionaris';
$string['addquizchain_help'] = 'Cal afegir tots els qüestionaris de la cadena de qüestionaris?

**No**
: tan sols s\'afegirà un qüestionari al curs

**Sí**
: si el fitxer font és un **fitxer quiz**,  aquest es tracta com el començament d\'una cadena de qüestionaris i tots els qüestionaris de la cadena s\'afegiran al curs amb paràmetres idèntics. Cal que cada qüestionari de la cadena tingui un enllaç amb el següent fitxer de la cadena.

Si el fitxer font és una **carpeta**, tots els qüestionaris reconeixibles de la carpeta s\'afegiran al curs per formar una cadena de qüestionaris amb paràmetres idèntics.

Si el fitxer font és un **fitxer unitat**, com per exemple un fitxer Hot Potatoes o un index.html, els qüestionaris llistats en la unitat s\'afegiran al curs com una cadena de qüestionaris amb paràmetres idèntics.';
$string['allowreview'] = 'Permet la revisió';
$string['allowreview_help'] = 'Si ho habiliteu els estudiants podran revisar llurs intents després que el qüestionari s\'hagi tancat.';
$string['analysisreport'] = 'Anàlisi dels elements';
$string['attemptlimit'] = 'Límit d\'intents';
$string['attemptlimit_help'] = 'El nombre màxim d\'intents que l\'estudiant pot fer en aquesta activitat HotPot';
$string['attemptnumber'] = 'Número d\'intent';
$string['attempts'] = 'Intents';
$string['attemptscore'] = 'Puntuació de l\'intent';
$string['attemptsunlimited'] = 'Intents il·limitats';
$string['average'] = 'Mitjana';
$string['averagescore'] = 'Puntuació mitjana';
$string['cacherecords'] = 'Registres de la memòria cau HotPot';
$string['checks'] = 'Comprovacions';
$string['checksomeboxes'] = 'Si us plau marqueu algunes quadres';
$string['clearcache'] = 'Neteja la memòria cau HotPot';
$string['cleardetails'] = 'Neteja els detalls HotPot';
$string['clearedcache'] = 'S\'ha esborrat la memòria cau';
$string['cleareddetails'] = 'S\'han esborrat els detalls HotPot';
$string['clickreporting'] = 'Habilita els informes dels clics';
$string['clickreporting_help'] = 'Si s\'habilita, es guarda un registre separat cada vegada que es clica damunt d\'un botó de «pista» o «comprova». Això permet al professor veure un informe molt detallat de l\'estat del qüestionari a cada clic. Altrament només es guardarà un registre per cada intent del qüestionari.';
$string['clicktrailreport'] = 'Rastres dels clics';
$string['closed'] = 'L\'activitat està tancada';
$string['clues'] = 'Pistes';
$string['completed'] = 'Completada';
$string['configenablecache'] = 'Mantenir una memòria cau de qüestionaris HotPot pot augmentar dramàticament la velocitat de lliurament dels qüestionaris als estudiants.';
$string['configenablecron'] = 'Especifiqueu a quines hores de la vostra zona horària es pot executar l\'script del cron del Hot Potatoes';
$string['configenablemymoodle'] = 'Aquest paràmetre controla si els qüestionaris Hot Potatoes es llisten a la pàgina de MyMoodle o no';
$string['configenableobfuscate'] = 'La ofuscació de codi javascript per inserir reproductors multimèdia fa més difícil determinar el nom de fitxer i provar d\'esbrinar que conté.';
$string['configenableswf'] = 'Permet la incrustació de fitxers SWF en les activitats HotPot. Si s\'habilita, aquest paràmetre sobreescriurà el filter_mediaplugin_enable_swf.';
$string['configfile'] = 'Fitxer de configuració';
$string['configframeheight'] = 'Quan un qüestionari es visualitza dins d\'un marc, aquest valor és l\'alçada (en píxels) del marc superior que conté la barra de navegació del Moodle.';
$string['configlocation'] = 'Localització del fitxer de configuració';
$string['configlockframe'] = 'Si aquest paràmetre s\'habilita, quan s\'utilitzi el marc de navegació es blocarà per que sigui no desplaçable, no redimensionable i no tingui vora.';
$string['configmaxeventlength'] = 'Si el HotPot té especificades alhora una data d\'obertura i una data de tancament, i la diferencia entre els dues dates és més gran que el nombre de dies especificat aquí, llavors s\'afegiran al calendari del curs dos esdeveniments separats en el calendari .
Per duracions més curtes, o si només s\'especifica una data, tan sols s\'afegirà un esdeveniment al calendari. Si no s\'especifica cap data no s\'afegirà cap esdeveniment al calendari.';
$string['configstoredetails'] = 'Si s\'habilita aquest paràmetre, llavors es desarà a la taula hotpot_details l\'XML amb els detalls dels intents dels qüestionaris HotPot. Això permet que els intents del qüestionari siguin requalificats en un futur per reflectir els canvis en el sistema de puntuació de qüestionaris HotPot. Tanmateix, si habiliteu aquesta opció en un lloc ocupat podeu provocar que la taula hotpot_details creixi molt ràpidament.';
$string['confirmdeleteattempts'] = 'Voleu de veritat suprimir aquests intents?';
$string['confirmstop'] = 'Esteu segurs de voler abandonar la navegació per aquesta pàgina?';
$string['correct'] = 'Correcte';
$string['couldnotinsertsubmissionform'] = 'No es pot inserir el formulari d\'enviament';
$string['delay1'] = 'Retard 1';
$string['delay1_help'] = 'El mínim retard entre el primer i el segon intent.';
$string['delay1summary'] = 'Temps de retard entre el primer i el segon intent.';
$string['delay2'] = 'Retard 2';
$string['delay2_help'] = 'El mínim retard entre intents després del segon intent.';
$string['delay2summary'] = 'Temps de retard entre intents posteriors.';
$string['delay3'] = 'Retard 3';
$string['delay3afterok'] = 'Espera fins que l\'estudiant premi D\'acord';
$string['delay3disable'] = 'No continua de forma automàtica';
$string['delay3_help'] = 'El paràmetre especifica el retard entre finalitzar el qüestionari i retornar el control de la visualització al Moodle.

**Usa una durada específica (en segons)**
: el control retornarà a Moodle després del nombre de segons especificat.

**Usa els paràmetres del fitxer font/plantilla**
: el control retornarà a Moodle després del nombre de segons especificat al fitxer font o als fitxers de plantilla per aquest format de sortida.

**Espera fins que l\'estudiant premi D\'acord**
: el control retorna a Moodle després que l\'estudiant cliqui el botó D\'acord del missatge de compleció del qüestionari.

**No continua de forma automàtica**
: el control no retorna a Moodle després de finalitzar el qüestionari. L\'estudiant tindrà llibertat per navegar enllà de la pàgina del qüestionari.

Nota: Les qualificacions són enviades a Moodle immediatament després que el qüestionari s\'hagi completat o abandonat, malgrat aquest paràmetre.';
$string['delay3specific'] = 'Utilitza un temps específic (en segons)';
$string['delay3summary'] = 'Temps de retard al final del qüestionari';
$string['delay3template'] = 'Usa els paràmetres del fitxer font/plantilla';
$string['deleteattempts'] = 'Suprimeix els intents';
$string['detailsrecords'] = 'Registres dels detalls HotPot';
$string['d_index'] = 'Índex de discriminació';
$string['duration'] = 'Durada';
$string['enablecache'] = 'Habilita la memòria cau del HotPot';
$string['enablecron'] = 'Habilita el cron del HotPot';
$string['enablemymoodle'] = 'Mostra HotPots en El Meu Moodle';
$string['enableobfuscate'] = 'Habilita l\'ofuscació del codi del reproductor multimèdia';
$string['enableswf'] = 'Permet incrustar fitxers SWF a les activitats HotPot';
$string['entry_attempts'] = 'Intents';
$string['entrycm'] = 'Activitat prèvia';
$string['entrycmcourse'] = 'Activitat prèvia en aquest curs';
$string['entrycm_help'] = 'Aquest paràmetre especifica una activitat de Moodle i una qualificació mínima per aquesta activitat que cal assolir abans que aquest Quizport es pugui fer.

El professor pot seleccionar un activitat especifica, o un dels següents paràmetres d\'àmbit general:

* Activitat prèvia en aquest curs
* Activitat prèvia en aquesta secció
* HotPot previ en aquest curs
* HotPot previ en aquesta secció';
$string['entrycmsection'] = 'Activitat prèvia en aquesta secció de curs';
$string['entrycompletionwarning'] = 'Abans de començar l\'activitat, cal que mireu {$a}.';
$string['entry_dates'] = 'Dates';
$string['entrygrade'] = 'Qualificació prèvia de l\'activitat';
$string['entrygradewarning'] = 'No podeu començar aquesta activitat fins que la vostra qualificació sigui {$a->entrygrade}% en {$a->entryactivity}. Actualment la vostra qualificació per aquesta activitat és {$a->usergrade}%';
$string['entry_grading'] = 'S\'està qualificant';
$string['entryhotpotcourse'] = 'HotPot previ en aquest curs';
$string['entryhotpotsection'] = 'HotPot previ en aquesta secció de curs';
$string['entryoptions'] = 'Opcions de la pàgina d\'entrada';
$string['entryoptions_help'] = 'Aquesta casella de selecció habilita i deshabilita la visualització dels elements de la pàgina d\'entrada de HotPot.

** Nom de la unitat com a títol**
: Si s\'habilita, a la pàgina d\'entrada es mostrarà el nom de la unitat com a títol.

**Qualificació**
: Si s\'habilita, a la pàgina d\'entrada  es mostrarà la informació de qualificació de HotPot.

**Dates**
: Si s\'habilita, a la pàgina d\'entrada es mostraran les dates de començament i acabament.

**Intents**
: Si s\'habilita, a la pàgina d\'entrada es mostrarà una taula amb els detalls dels intents previs de l\'usuari en aquest HotPot. Els intents que es poden reprendre tenen un botó a la columna de més a la dreta.';
$string['entrypage'] = 'Mostra la pàgina d\'entrada';
$string['entrypagehdr'] = 'Pàgina d\'entrada';
$string['entrypage_help'] = 'Cal mostrar als estudiants una pàgina inicial abans de començar l\'activitat HotPot?

**Sí**
: els estudiants veuran una pàgina d\'entrada abans d\'iniciar el HotPot. Els continguts de la pàgina estan determinats per les opcions de la pàgina d\'entrada.

**No**
: els estudiants no veuran cap pàgina d\'entrada, i començaran el HotPot immediatament.

Al professor sempre se li mostra una pàgina d\'entrada per proporcionar-li accés als informes i a la pàgina d\'edició dels qüestionaris.';
$string['entrytext'] = 'Text de la pàgina d\'entrada';
$string['entry_title'] = 'El nom de la unitat és el títol';
$string['exit_areyouok'] = 'Hola, encara sou aquí?';
$string['exit_attemptscore'] = 'La puntuació per aquest intent ha estat de {$a}';
$string['exitcm'] = 'Activitat següent';
$string['exitcmcourse'] = 'Activitat següent en aquest curs';
$string['exitcm_help'] = 'Aquest paràmetre especifica una activitat de Moodle a fer després que el Quizport s\'hagi completat.
El professor pot seleccionar una activitat específica o una dels següents paràmetres d\'àmbit general:

* Activitat següent en aquest curs
* Activitat següent en aquesta secció
* HotPot següent en aquest curs
* HotPot següent en aquest secció

Si s\'han deshabilitat altres opcions de la pàgina de sortida, l\'estudiant anirà directe a la següent activitat. Altrament l\'estudiant veurà un enllaç cap a la següent activitat quan estigui a punt.';
$string['exitcmsection'] = 'Activitat següent en aquesta secció del curs';
$string['exit_course'] = 'Curs';
$string['exit_course_text'] = 'Retorna a la pàgina principal del curs';
$string['exit_encouragement'] = 'Encoratjament';
$string['exit_excellent'] = 'Excel·lent!';
$string['exit_feedback'] = 'Surt de la pàgina de retroacció';
$string['exit_feedback_help'] = 'Aquestes opcions habiliten i deshabiliten la visualització d\'elements de retroacció en la pàgina de sortida de HotPot.

** Nom de la unitat com a títol**
: Si s\'habilita es mostrarà el nom de la unitat com a títol de la pàgina.

**Encoratjament**
: Si s\'habilita es mostrarà a la pàgina alguna mena d\'encoratjament. Aquest dependrà de la qualificació HotPot:
: **> 90%**: Excel·lent!
: **> 60%**: Ben fet
: **> 0%**: Bon intent
: **= 0%**: Esteu bé?

**Qualificació de l\'intent de la unitat**
: Si s\'habilita es mostrarà la qualificació per l\'intent de la unitat que s\'acaba de completar a la pàgina de sortida.

**Qualificació de la unitat**
: Si s\'habilita es mostrarà la qualificació HotPot a la pàgina de sortida.

A més a més, si el mètode de qualificació de la unitat és «el més gran», es mostrarà a l\'usuari un missatge per informar-lo de si l\'intent més recent ha sigut igual o millor al seu intent previ.';
$string['exit_goodtry'] = 'Bon intent!';
$string['exit_grades'] = 'Notes';
$string['exit_grades_text'] = 'Mireu les notes assolides fins ara en aquest curs';
$string['exithotpotcourse'] = 'Següent HotPot en aquest curs';
$string['exit_hotpotgrade'] = 'La vostra nota per aquesta activitat és {$a}';
$string['exit_hotpotgrade_average'] = 'La vostra qualificació mitjana per a aquesta activitat és {$a}';
$string['exit_hotpotgrade_highest'] = 'La vostra nota més elevada per a aquesta activitat ha estat {$a}';
$string['exit_hotpotgrade_highest_equal'] = 'Heu igualat la vostra millor nota per a aquesta activitat!';
$string['exit_hotpotgrade_highest_previous'] = 'La vostra nota prèvia més elevada per a aquesta activitat havia estat {$a}';
$string['exit_hotpotgrade_highest_zero'] = 'No heu aconseguit encara superar el rècord {$a} per a aquesta activitat';
$string['exithotpotsection'] = 'Hot Potatoes següent en aquesta secció del curs';
$string['exit_index'] = 'Índex';
$string['exit_index_text'] = 'Aneu a l\'índex d\'activitats';
$string['exit_links'] = 'Enllaços de la pàgina de sortida';
$string['exit_links_help'] = 'Aquestes opcions habiliten i deshabiliten la visualització de certs enllaços de navegació en la pàgina de sortida de HotPot.

**Reintenta**
: Si estan permesos múltiples intents per aquest HotPot i l\'estudiant encara disposa d\'alguns intents, es mostrarà un enllaç per permetre a l\'estudiant reintentar el HotPot.

**Índex**
: Si s\'habilita es mostrarà un enllaç a la pàgina índex de HotPot.

**Curs**
: Si s\'habilita es mostrarà un enllaç a la pàgina de curs del Moodle.

**Qualificacions**
: Si s\'habilita es mostrarà un enllaç al llibre de qualificacions de Moodle.';
$string['exit_next'] = 'Següent';
$string['exit_next_text'] = 'Intenta la següent activitat';
$string['exit_noscore'] = 'Heu completat l\'activitat amb èxit!';
$string['exitoptions'] = 'Opcions de la pàgina de sortida';
$string['exitpage'] = 'Mostra la pàgina de sortida';
$string['exitpagehdr'] = 'Pàgina de sortida';
$string['exitpage_help'] = 'S\'hauria de mostrar una pàgina de sortida després de completar el qüestionari Hot Potatoes?

**Sí**
Es mostrarà una pàgina de sortida als estudiants quan hagin completat el qüestionari Hot Potatoes. Els continguts de la pàgina vindran determinats per la configuració de la retroacció de la pàgina de sortida i enllaços del Hot Potatoes.

**No**
No es mostrarà cap pàgina de sortida als estudiants, sinó que hauran de continuar amb l\'activitat següent o tornar a la pàgina d\'inici del curs.';
$string['exit_retry'] = 'Torna a intentar';
$string['exit_retry_text'] = 'Torna a intentar aquesta activitat';
$string['exittext'] = 'Text de la pàgina de sortida';
$string['exit_welldone'] = 'Ben fet!';
$string['exit_whatnext_0'] = 'Què us agradaria fer a continuació?';
$string['exit_whatnext_1'] = 'Trieu la vostra destinació ...';
$string['exit_whatnext_default'] = 'Trieu una de les següents:';
$string['feedbackdiscuss'] = 'Debatre aquest qüestionari en un fòrum';
$string['feedbackformmail'] = 'Formulari de retroacció';
$string['feedbackmoodleforum'] = 'Fòrum de Moodle';
$string['feedbackmoodlemessaging'] = 'Missatgeria de Moodle';
$string['feedbacknone'] = 'Cap';
$string['feedbacksendmessage'] = 'Enviar un missatge al vostre instructor';
$string['feedbackwebpage'] = 'Pàgina web';
$string['firstattempt'] = 'Primer intent';
$string['forceplugins'] = 'Imposa connectors multimèdia';
$string['forceplugins_help'] = 'Si s\'habilita, els fitxers com avi, mpeg, mpg, mp3 mov i wmv seran reproduïts per reproductors multimèdia compatibles amb Moodle. Altrament, Moodle no canviarà els paràmetres de cap reproductor multimèdia del qüestionari.';
$string['frameheight'] = 'Alçada del marc';
$string['giveup'] = 'Abandona';
$string['grademethod'] = 'Mètode de qualificació';
$string['grademethod_help'] = 'Aquesta configuració determina com es calcula la qualificació del qüestionari Hot Potatoes segons les puntuacions dels intents.

**Qualificació més alta**
S\'establirà la qualificació a la puntuació més alta obtinguda en els intents del Hot Potatoes.

**Qualificació mitjana**
S\'establirà la qualificació a la mitjana de puntuacions obtingudes en els intents del Hot Potatoes.

**Primer intent**
S\'establirà la qualificació a la puntuació obtinguda en el primer intent del Hot Potatoes.

**Darrer intent**
S\'establirà la qualificació a la puntuació obtinguda en l\'últim intent del Hot Potatoes.';
$string['gradeweighting'] = 'Ponderació de qualificacions';
$string['gradeweighting_help'] = 'Les qualificacions d\'aquesta activitat Hot Potatoes seran escalades al seu valor numèric en el llibre de qualificacions de Moodle.';
$string['highestscore'] = 'Qualificació més alta';
$string['hints'] = 'Suggeriments';
$string['hotpot:attempt'] = 'Realitzar un qüestionari Hot Potatoes i entregar els resultats';
$string['hotpot:deleteallattempts'] = 'Esborrar tots els intents de l\'usuari en el Hot Potatoes';
$string['hotpot:deletemyattempts'] = 'Esborrar els intents propis del Hot Potatoes';
$string['hotpot:ignoretimelimits'] = 'Ignorar la limitació de temps en el Hot Potatoes';
$string['hotpot:manage'] = 'Actualitzar la configuració de Hot Potatoes';
$string['hotpotname'] = 'Nom de l\'activitat de Hot Potatoes';
$string['hotpot:preview'] = 'Previsualitzar una activitat de Hot Potatoes';
$string['hotpot:reviewallattempts'] = 'Veure els intents d\'una activitat de Hot Potatoes de tots els usuaris';
$string['hotpot:reviewmyattempts'] = 'Veure els intents propis d\'una activitat de Hot Potatoes';
$string['hotpot:view'] = 'Veure la pàgina d\'entrada d\'una activitat de Hot Potatoes';
$string['ignored'] = 'Ignorat';
$string['inprogress'] = 'En curs';
$string['isgreaterthan'] = 'és superior a';
$string['islessthan'] = 'és inferior a';
$string['lastaccess'] = 'Últim accés';
$string['lastattempt'] = 'Últim intent';
$string['lockframe'] = 'Bloqueja el marc';
$string['maxeventlength'] = 'Nombre màxim de dies per a un únic event del calendari';
$string['mediafilter_hotpot'] = 'Filtre multimèdia Hot Potatoes';
$string['mediafilter_moodle'] = 'Filtres multimèdia estàndard de Moodle';
$string['migratingfiles'] = 'S\'estan migrant els fitxers del qüestionari Hot Potatoes';
$string['missingsourcetype'] = 'Al registre de Hot Potatotes manca el tipus d\'origen';
$string['modulename'] = 'Qüestionari Hot Potatoes';
$string['modulenameplural'] = 'Qüestionaris Hot Potatoes';
$string['nameadd'] = 'Nom';
$string['nameadd_help'] = 'El nom pot ser un text specfic introduït pel professor o pot ser generat de forma automàtica.

**Obtenir des del fitxer font**
El nom serà extret de l\'arxiu d\'origen.

**Utilitza el nom del fitxer font**
El nom del fitxer d\'origen s\'utilitza com a nom.

**Utilitza la ruta del fitxer font**
La ruta del fitxer d\'origen s\'utilitza com a nom. Les barres a la ruta del fitxer seran substituïdes per espais.

**Text específic**
El text introduït pel professor s\'utilitzarà com a nom.';
$string['nameedit'] = 'Nom';
$string['nameedit_help'] = 'El text específic que es mostra als estudiants';
$string['navigation'] = 'Navegació';
$string['navigation_embed'] = 'Pàgina web incrustada';
$string['navigation_frame'] = 'Marc de navegació de Moodle';
$string['navigation_give_up'] = 'Un sol botó d\'abandonar';
$string['navigation_help'] = 'Aquesta configuració indica la navegació que s\'utilitzarà en el qüestionari:

**Barra de navegació Moodle**
La barra de navegació Moodle es mostrarà en la mateixa finestra que el qüestionari a la part superior de la pàgina

**Marc de navegació Moodle**
La barra de navegació Moodle es mostrarà en una nova finestra a la part superior del qüestionari

**Incrustat en pàgina web**
La barra de navegació Moodle es mostrarà, amb el qüestionari Hot Potatoes, incrustada en una finestra

**Ajudes originals a la navegació**
El qüestionari es mostrarà amb els botons de navegació, en el cas que s\'hagin definit en el qüestionari

**Un únic botó "Entrega"**
El qüestionari es mostrarà amb un únic botó "Entrega" a la part superior de la pàgina

**Cap**
El qüestionari es mostrarà sense cap ajuda de navegació, per tant quan totes les preguntes hagin estat contestades correctament, depenent de la configuració de "Mostrar el següent qüestionari?", Moodle tornarà a la pàgina del curs o mostrarà el següent qüestionari';
$string['navigation_moodle'] = 'Barres de navegació estàndard de Moodle (a la part superior i lateral)';
$string['navigation_none'] = 'Cap';
$string['navigation_original'] = 'Ajudes de navegació originals';
$string['navigation_topbar'] = 'Únicament la barra superior de navegació (no la lateral)';
$string['noactivity'] = 'No hi ha activitat';
$string['nohotpots'] = 'No s\'ha trobat cap qüestionari Hot Potatotes';
$string['nomoreattempts'] = 'No us queden més intents en aquesta activitat';
$string['noresponses'] = 'No s\'ha trobat informació sobre preguntes i respostes individuals.';
$string['noreview'] = 'No teniu accés per veure els detalls per aquest intent de qüestionari';
$string['noreviewafterclose'] = 'El qüestionari és tancat. Ja no es permet veure els detalls per aquest intent de qüestionari.';
$string['noreviewbeforeclose'] = 'No es permet veure els detalls de l\'intent en aquest qüestionari fins a {$a}';
$string['nosourcefilesettings'] = 'A la gravació del qüestionari Hot Potatotes li manca la informació del fitxer font';
$string['notavailable'] = 'No teniu accés per aquesta activitat';
$string['outputformat'] = 'Format de sortida';
$string['outputformat_best'] = 'El millor possible';
$string['outputformat_help'] = 'El format de sortida especifica com es mostra el contingut a l\'estudiant.

Els formats de sortida disponibles depenen del tipus de fitxer d\'origen. Alguns tipus de fitxer d\'origen tenen un sol format de sortida, mentre que altres tipus de fitxer d\'origen tenen diversos formats de sortida.

La configuració a "El millor possible" mostrarà el contingut utilitzant el format de sortida més òptim pel navegador de l\'estudiant.';
$string['outputformat_hp_6_jcloze_html'] = 'JCloze HP6 html: estàndard';
$string['outputformat_hp_6_jcloze_xml_anctscan'] = 'JCloze des de XML HP6: ANCT-Scan';
$string['outputformat_hp_6_jcloze_xml_dropdown'] = 'JCloze from HP6 xml: Rottmeier llista desplegable';
$string['outputformat_hp_6_jcloze_xml_findit_a'] = 'JCloze from HP6 xml: Rottmeier FindIt (a)';
$string['outputformat_hp_6_jcloze_xml_findit_b'] = 'JCloze from HP6 xml: Rottmeier FindIt (b)';
$string['outputformat_hp_6_jcloze_xml_jgloss'] = 'JCloze des de XML HP6: Glossari Rottmeier';
$string['outputformat_hp_6_jcloze_xml_v6'] = 'JCloze from HP6 xml: estàndard';
$string['outputformat_hp_6_jcross_html'] = 'JCross HP6 html';
$string['outputformat_hp_6_jcross_xml_v6'] = 'JCross des de XML HP6';
$string['outputformat_hp_6_jmatch_html'] = 'JMatch des de html';
$string['outputformat_hp_6_jmatch_xml_flashcard'] = 'JMatch des de XML HP6: Joc de targetes';
$string['outputformat_hp_6_jmatch_xml_jmemori'] = 'JMatch des de XML HP6: Memòria Rottmeier';
$string['outputformat_hp_6_jmatch_xml_v6'] = 'JMatch des de XML HP6: Estàndard';
$string['outputformat_hp_6_jmatch_xml_v6_plus'] = 'JMatch from HP6 xml: arrossega i deixa anar';
$string['outputformat_hp_6_jmix_html'] = 'JMix des de HP6 html';
$string['outputformat_hp_6_jmix_xml_v6'] = 'JMix from HP6 xml: estàndard';
$string['outputformat_hp_6_jmix_xml_v6_plus'] = 'JMix from HP6 xml: arrossega i deixa anar';
$string['outputformat_hp_6_jmix_xml_v6_plus_keypress'] = 'JMix from HP6 xml: arrossega i deixa anar prement una tecla';
$string['outputformat_hp_6_jquiz_html'] = 'JQuiz HP6 html';
$string['outputformat_hp_6_jquiz_xml_v6'] = 'JQuiz from HP6 xml: estàndard';
$string['outputformat_hp_6_jquiz_xml_v6_autoadvance'] = 'JQuiz des de XML HP6: Auto-avanç';
$string['outputformat_hp_6_jquiz_xml_v6_exam'] = 'JQuiz from HP6 xml: examen';
$string['outputformat_hp_6_rhubarb_html'] = 'WebRhubarb (v6) des de html';
$string['outputformat_hp_6_rhubarb_xml'] = 'WebRhubarb (v6) des de html';
$string['outputformat_hp_6_sequitur_html'] = 'WebSequitur (v6) des de html';
$string['outputformat_hp_6_sequitur_html_incremental'] = 'WebSequitur (v6) des de html, puntuació incremental';
$string['outputformat_hp_6_sequitur_xml'] = 'WebSequitur (v6) des de xml';
$string['outputformat_hp_6_sequitur_xml_incremental'] = 'WebSequitur (v6) des de xml, puntuació incremental';
$string['overviewreport'] = 'Informació general';
$string['penalties'] = 'Penalitzacions';
$string['percent'] = 'Percentatge';
$string['pluginadministration'] = 'Administració del qüestionari Hot Potatoes';
$string['pluginname'] = 'Qüestionari Hot Potatoes';
$string['pressoktocontinue'] = 'Prem OK per continuar, o Cancel·la per continuar en aquesta pàgina';
$string['questionshort'] = 'P-{$a}';
$string['quizname_help'] = 'Text d\'ajuda pel nom del qüestionari';
$string['quizzes'] = 'Qüestionaris';
$string['removegradeitem'] = 'Elimina l\'element de qualificació';
$string['removegradeitem_help'] = 'Es podria eliminar l\'element de qualificació per aquesta activitat?

**No**
L\'element de qualificació per aquesta activitat no es pot eliminar del llibre de qualificacions

**Sí**
Si la qualificació màxima o la ponderació de qualificacions per a aquest qüestionari Hot Potatoes és zero, llavors l\'element de qualificació per a aquesta activitat serà esborrat del llibre de qualificacions de Moodle';
$string['responsesreport'] = 'Respostes';
$string['score'] = 'Puntuació';
$string['scoresreport'] = 'Puntuacions';
$string['selectattempts'] = 'Trieu intents';
$string['showerrormessage'] = 'Hot Potatoes error: {$a}';
$string['sourcefile'] = 'Nom del fitxer font';
$string['sourcefile_help'] = 'Aquest paràmetre especifica el fitxer el contingut del qual es mostrarà als estudiants.

Normalment el fitxer font s\'ha creat fora de Moodle, i pujat a l\'àrea de fitxers del curs de Moodle.

Pot ser un fitxer html, o pot ser un altre tipus de fitxer que hagi sigut creat amb programari d\'autoria com Hot Patatoes o Qedoc.

El fitxer font pot ser especificat com una carpeta i el camí a l\'àrea del curs de Moodle, o pot ser una url que comenci amb http:// or https://

Per als materials de Qedoc, el fitxer font pot ser la url del mòdul Qedoc que ha sigut pujat al servidor Qedoc.

*exemple: http://www.qedoc.net/library/ABCDE_123.zip

* Per cercar més informació sobre com carregar els mòduls Qedoc mireu: [Documentació Qedoc: Carregat de mòduls](http://www.qedoc.org/en/index.php?title=Uploading_modules)';
$string['sourcefilenotfound'] = 'No s\'ha trobat el fitxer font (o buit): {$a}';
$string['status'] = 'Estat';
$string['stopbutton'] = 'Mostra el botó atura';
$string['stopbutton_langpack'] = 'Del paquet d\'idioma';
$string['stopbutton_specific'] = 'Utilitza el text específic';
$string['stoptext'] = 'Text del botó atura';
$string['storedetails'] = 'Emmagatzema la fila XML amb els detalls dels intents del qüestionari HotPot';
$string['studentfeedback'] = 'Retroacció de l\'estudiant';
$string['studentfeedback_help'] = 'Si s\'habilita un enllaç a finestra emergent amb retroacció es mostrarà sempre que l\'alumne premi el botó «Comprova». La finestra de retroacció permet als estudiants comentar aquest qüestionari amb el seu professor i els seus companys d\'alguna de les formes següents:

**Pàgina web**
: Cal la URL de la pàgina web, per exemple http://elmeuservidor.com/formularideretroaccio.html

**Formulari de retroacció**
: Cal la URL del script del formulari, per exemple http://elmeuservidor.com/cgi-bin/formulari.pl

**Fòrum Moodle**
: L\'index al fòrum del curs es mostrarà.

**Missatges de Moodle**
: Es mostra la finestra de missatgeria instantània de Moodle. Si el curs té varis professors l\'estudiant cal que n\'esculli un abans que la finestra de missatges es mostri.';
$string['submits'] = 'Enviaments';
$string['textsourcefile'] = 'Obtenir del fitxer font';
$string['textsourcefilename'] = 'Utilitza el nom del fitxer font';
$string['textsourcefilepath'] = 'Utilitza la ruta del fitxer font';
$string['textsourcequiz'] = 'Obtenir del qüestionari';
$string['textsourcespecific'] = 'Text expecífic';
$string['timeclose'] = 'Disponible fins a';
$string['timedout'] = 'Temps esgotat';
$string['timelimit'] = 'Temps límit';
$string['timelimitexpired'] = 'El límit de temps per aquest intent s\'ha esgotat';
$string['timelimit_help'] = 'Aquest paràmetre especifica la duració màxima d\'un intent.

**Utilitza els paràmetres de la font/fitxer plantilla**
: El temps limit serà pres del fitxer font o del fitxer plantilla per a aquest format de sortida.


**Utilitza temps especific**
: El temps limit especificat als paràmetres del qüestionari HotPot serà utilitzat com temps limit per un intent en aquest qüestionari. Aquest paràmetre sobreescriu el temps limit del fitxer font, fitxer de configuració o fitxer plantilla per a aquest format de sortida.

**Deshabilita**
: No hi ha temps limit per als intents d\'aquest qüestionari.

Avís: Si un intent es reprèn el temps continua des de l\'intent en que prèviament va ser aturat.';
$string['timelimitspecific'] = 'Utilitza temps especific';
$string['timelimitsummary'] = 'Temps límit per un intent';
$string['timelimittemplate'] = 'Utilitza els paràmetres de la font/fitxer plantilla';
$string['timeopen'] = 'Disponible des de';
$string['timeopenclose'] = 'Temps d\'obertura i clausura';
$string['timeopenclose_help'] = 'Podeu especificar el temps durant el qual el qüestionari serà obert per fer intents per a la gent. Abans de l\'obertura i després del tancament de la data el qüestionari no estarà disponible.';
$string['title'] = 'Títol';
$string['title_help'] = 'Aquest paràmetre especifica el títol que es mostrarà en la pàgina web.

**Nom de l\'activitat HotPot**
: El nom de l\'activitat HotPot que es mostrarà al títol de la pàgina web.

**Agafa des del fitxer font**
: El títol, si en hi ha, definit al fitxer font s\'utilitzarà com títol de la pàgina web.

**Utilitza el nom del fitxer font**
: El nom del fitxer font, excloent qualsevol nom de directori, s\'utilitzarà com títol de la pàgina web.

**Utilitza el camí al fitxer font**
: El camí al fitxer font, incloent-hi qualsevol directori, s\'utilitzarà com títol de la pàgina web.';
$string['unitname_help'] = 'text d\'ajuda per al nom de la unitat';
$string['updated'] = 'Actualitzat';
$string['usefilters'] = 'Ús dels filtres';
$string['usefilters_help'] = 'Si aquest paràmetre s\'habilita, el contingut es passarà pels filtres de Moodle abans de enviar-ho al navegador.';
$string['useglossary'] = 'Ús del glossari';
$string['useglossary_help'] = 'Si s\'habilita aquest paràmetre, el contingut es passarà pel filtre Glossari de Moodle auto-enllaçat abans d\'enviar-ho al navegador.

Avís: Aquest paràmetre sobreescriu el paràmetre d\'administració per habilitar o deshabilitar el filtre Glossari auto-enllaçat.';
$string['usemediafilter'] = 'Ús de filtre multimèdia';
$string['usemediafilter_help'] = 'Aquest paràmetre especifica el filtre multimèdia a utilitzar.

**cap**
: El contingut no es passarà per cap filtre multimèdia.

**Filtres estàndard de Moodle**
: El contingut es passarà per filtres estàndard de Moodle. Aquests filtres cerquen enllaços amb tipus comuns de só i fitxers de vídeo, i converteixen aquests enllaços per als reproductors multimèdia.

**Filtre multimèdia HotPot**
: El contingut  es passarà per filtres que detecten enllaços, imatges, sons i vídeos que s\'especifiquen utilitzant una notació de claudàtors.

La notació de claudàtor té la següent sintaxi: <code>[url reproductor amb opcions d\'amplada i alçada]</code>

**url**
: El camí relatiu o absolut al fitxer multimèdia

**Reproductor ** (Opcional)
: El nom del reproductor a inserir. El valor per defecte per a aquest paràmetre de "Moodle". La versió estàndard del mòdul HotPot també ofereix els següents reproductors:
: **dew**: Un reproductor mp3
: **dyer**: Reproductor mp3 de Bernard Dyer
: **hbs**: Reproductor mp3 de Half-Baked Software
: **imatge**: Insereix una imatge en la web
: **enllaç**: Insereix un enllaç a una altra web

**Amplària** (Opcional)
: L\'amplària que li cal al reproductor.

**Alçaria** (Opcional)
: L\'alçaria que li cal al reproductor. Si s\'omet aquest valor s\'utilitzarà el mateix valor que tingui l\'amplària.

**Opcions** (Opcional)
: Una llista separada per comes amb opcions per passar al reproductor. Cadascuna de les opcions pot ser un simple actiu/inactiu o un parell de valor conegut.
: **nom: valor
: **nom="un valor amb espais"';
$string['utilitiesindex'] = 'Índex de les utilitats Hot Potatoes';
$string['viewreports'] = 'Visualitza els informes de {$a} usuaris';
$string['views'] = 'Vistes';
$string['weighting'] = 'Ponderació';
$string['wrong'] = 'Incorrecte';
$string['zeroduration'] = 'Sense durada';
$string['zeroscore'] = 'Puntuació zero';
