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
 * Strings for component 'grades', language 'ca', branch 'MOODLE_24_STABLE'
 *
 * @package   grades
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activities'] = 'Activitats';
$string['addcategory'] = 'Afegeix categoria';
$string['addcategoryerror'] = 'No s\'ha pogut afegir la categoria.';
$string['addexceptionerror'] = 'S\'ha produït un error en afegir l\'excepció per a userid:gradeitem';
$string['addfeedback'] = 'Afegeix retroacció';
$string['addgradeletter'] = 'Afegeix una lletra de qualificació';
$string['addidnumbers'] = 'Afegeix números ID';
$string['additem'] = 'Afegeix element de qualificació';
$string['addoutcome'] = 'Afegeix una competència';
$string['addoutcomeitem'] = 'Afegeix un element de competència';
$string['addscale'] = 'Afegeix una escala';
$string['aggregateextracreditmean'] = 'Mitjana de les qualificacions (amb crèdits extra)';
$string['aggregatemax'] = 'Qualificació més alta';
$string['aggregatemean'] = 'Mitjana de les qualificacions';
$string['aggregatemedian'] = 'Mediana de les qualificacions';
$string['aggregatemin'] = 'Qualificació més baixa';
$string['aggregatemode'] = 'Moda de les qualificacions';
$string['aggregateonlygraded'] = 'Agrega només les qualificacions no buides';
$string['aggregateonlygraded_help'] = '<p>Les qualificacions buides es poden tractar com a qualificacions mínimes o bé no incloure\'s en l\'agregació.</p>';
$string['aggregateoutcomes'] = 'Inclou les competències en l\'agregació';
$string['aggregateoutcomes_help'] = '<p> Incloure les competències en l\'agregació pot no conduir a la qualificació final desitjada, de manera que teniu l\'opció d\'incloure-les o deixar-les fora. </p>';
$string['aggregatesonly'] = 'Només agregats';
$string['aggregatesubcats'] = 'Agrega incloent subcategories';
$string['aggregatesubcats_help'] = '<p>Generalment l\'agregació inclou només els fills immediats, però també és possible agregar les qualificacions de totes les subcategories excloent altres qualificacions agregades.</p>';
$string['aggregatesum'] = 'Suma de qualificacions';
$string['aggregateweightedmean'] = 'Mitjana ponderada de les qualificacions';
$string['aggregateweightedmean2'] = 'Mitjana ponderada simple de les qualificacions';
$string['aggregation'] = 'Agregació';
$string['aggregationcoef'] = 'Coeficient d\'agregació';
$string['aggregationcoefextra'] = 'Coeficient de crèdit extra';
$string['aggregationcoefextra_help'] = 'Si l\'agregació és la \'Suma de les qualificacions\' o la \'Mitjana ponderada simple\' i està marcada la casella de verificació de \'Crèdit extra\', el valor màxim de l\'element de qualificació no s\'afegeix a la qualificació màxima de la categoria, resultant així que existeix la possibilitat d\'assolir la puntuació màxima en la categoria (o puntuacions per sobre del màxim si l\'administrador del lloc ha habilitat aquesta opció) sense tenir necessàriament la puntuació màxima en tots els elements de qualificació.

Si l\'agregació és la  \'Mitjana de les qualificacions (amb crèdits extra)\' i el \'Crèdit extra\' es fixa en un valor més gran que zero, el valor del \'Crèdit extra\' és el factor pel qual es multiplica la qualificació abans d\'afegir-la al total un cop calculada la mitjana.';
$string['aggregationcoefextrasum'] = 'Actua com a crèdit extra';
$string['aggregationcoefextrasum_help'] = '<p>Quan s\'utilitza l\'estratègia d\'agregació "Suma de qualificacions", un element de qualificació pot actuar com a crèdit extra per a la categoria. Això vol dir que la qualificació màxima de l\'element no s\'afegirà a la qualificació màxima total de la categoria, però la qualificació de l\'element sí que es comptarà. Per exemple:</p>

<ul>
    <li>Element 1 qualificat 0-100</li>
    <li>Element 2 qualificat 0-75</li>
    <li>L\'element 1 té activada la casella "Actua com a crèdit extra" checkbox. L\'element 2 no.</li>
    <li>Tots dos elements pertanyen a la categoria 1, amb estratègia d\'agregació "Suma de qualificacions"</li>
    <li>El total de la category 1 es qualificarà 0-75</li>
    <li>Un estudiant obté una qualificació de 20 punts en l\'element 1 i 70 en l\'element 2</li>
    <li>La qualificació total d\'aquest estudiant en la categoria 1 serà 75/75 (20+70 = 90, però l\'element 1 només compta com a crèdit extra, de manera que puja el total fins al màxim)</li>
</ul>';
$string['aggregationcoefextraweight'] = 'Pes del crèdit extra';
$string['aggregationcoefextraweight_help'] = '<p>Un valor major que 0 tracta les qualificacions d\'aquest element de qualificació com a crèdit extra en l\'agregació. El nombre que definiu s\'utilitzarà com a factor pel qual es multiplicarà la qualificació abans d\'afegir-la a la suma de qualificacions, però l\'element no es comptarà per a la divisió. Per exemple:</p>

<ul>
    <li>Element 1 qualificat 0-100 amb crèdit extra = 2</li>
    <li>Element 2 qualificat 0-100 amb crèdit extra = 0.0000</li>
    <li>Element 3 qualificat 0-100 amb crèdit extra = 0.0000</li>
    <li>Els tres elements pertanyen a la categoria 1, amb estratègia d\'agregació "Mitjana de qualificacions (amb crèdit extra)"</li>
    <li>Un estudiant obté una qualificació de 20 punts en l\'element 1, 40 en l\'element 2 i 70 en l\'element 3</li>
    <li>La qualificació total d\'aquest estudiant en la categoria 1 serà de 95/100, ja que 20*2 + (40 + 70)/2 = 95</li>
</ul>';
$string['aggregationcoefweight'] = 'Ponderació de l\'element';
$string['aggregationcoefweight_help'] = '<p>Ponderació aplicada a totes les qualificacions d\'aquest element de qualificació durant l\'agregació amb altres elements de qualificació.</p>';
$string['aggregation_help'] = '<p>Aquest menú us permet triar l\'estratègia d\'agregació que s\'utilitzarà per calcular la qualificació global de cada participant en aquesta categoria. Més avall us expliquem les diferents opcions.</p>

<p>En primer lloc, les qualificacions es converteixen en valors de percentatge (interval de 0 a 1: d\'això se\'n diu normalització). Després són agregades mitjançant una de les funcions que s\'expliquen més avall. Finalment, es converteixen en un valor dins la gamma de la categoria associada a l\'element (un valor entre la <em>qualificació mínima</em> i la <em>qualificació màxima</em>.</p>

<p><strong>Important</strong>: una qualificació buida no és més que una entrada buida en el butlletí de qualificacions. Això pot significar coses diverses. Per exemple: el participant encara no ha tramès la tasca, o la tasca sí que ha estat tramesa però el professorat encara no l\'ha qualificada, o l\'administrador del butlletí de qualificacions ha suprimit manualment aquesta qualificació per algun motiu, etc. etc. Per tant, s\'aconsella tenir una certa precaució a l\'hora d\'interpretar aquestes "qualificacions buides".</p>

<dl id="grade-aggregation-help">
    <dt>Mitjana de les qualificacions</dt>
    <dd>La suma de totes les qualificacions, dividida pel nombre total de qualificacions.</dd>
    <dd class="example">A1 70/100, A2 20/80, A3 10/10, màxim de la categoria 100:<br />
                     <code>(0.7 + 0.25 + 1.0)/3 = 0.65 --> 65/100</code></dd>

    <dt>Mitjana ponderada</dt>
        <dd>Es pot donar a cada element de qualificació un pes diferent, que després s\'utilitzarà en el càlcul de la mitjana per modificar la importància relativa de cada element en el resultat final.</dd>
        <dd class="example">A1 70/100 pes 10, A2 20/80 pes 5, A3
                         10/10 pes 3, màxim de la categoria 100:<br /><code>(0.7*10 + 0.25*5 + 1.0*3)/18 = 0.625 --> 62.5/100</code></dd>

    <dt>Mitjana ponderada simple</dt>
        <dd>La diferència amb la <em>mitjana ponderada</em> és que el pes de cada element es calcula automàticament així: <em>qualificació màxima</em> - <em>qualificació mínima</em>. Una tasca qualificada sobre 100 punts té un pes 100, una tasca qualificada sobre 10 punts té un pes 10.</dd>
        <dd class="example">A1 70/100, A2 20/80, A3 10/10, màxim de la categoria 100:<br />
                         <code>(0.7*100 + 0.25*80 + 1.0*10)/190 = 0.526 --> 52.6/100</code></dd>

    <dt>Mitjana de les qualificacions (amb crèdits extra)</dt>
        <dd>Mitjana aritmètica "trucada". Una estratègia d\'agregació antiga, inclosa aquí només per garantir la compatibilitat amb activitats velles.</dd>

    <dt>Mediana de les qualificacions</dt>
        <dd>La qualificació situada al centre de la seqüència ordenada de qualificacions (o la mitjana de les dues qualificacions centrals). L\'avantatge de la mediana respecte a la mitjana és que no és afectada per qualificacions rares que s\'allunyen molt de la mitjana.</dd>
        <dd class="example">A1 70/100, A2 20/80, A3 10/10, màxim de la categoria 100:<br />
                         <code>0.7 + 0.25 + 1.0 --> 0.25 --> 25/100</code></dd>

    <dt>Qualificació més baixa</dt>
        <dd>La qualificació més baixa, després de la normalització. Generalment s\'utilitza en combinació amb <em>Agrega només les qualificacions no buides</em>.</dd>
        <dd class="example">A1 70/100, A2 20/80, A3 10/10, màxim de la categoria 100:<br />
                         <code>min(0.7 + 0.25 + 1.0) = 0.25 --> 25/100</code></dd>

    <dt>Qualificació més alta</dt>
        <dd>La qualificació més baixa, després de la normalització.</dd>
        <dd class="example">A1 70/100, A2 20/80, A3 10/10, màxim de la categoria 100:<br />
                         <code>max(0.7 + 0.25 + 1.0) = 1.0 --> 100/100</code></dd>

    <dt>Moda de les qualificacions</dt>
        <dd>La moda és la qualificació més freqüent. S\'utilitza més habitualment per a qualificacions no numèriques. L\'avantatge respecte a la mitjana és que no és afectada per qualificacions rares que s\'allunyen molt de la mitjana. Tanmateix, perd tot el sentit si hi ha més d\'un valor freqüent (sols se\'n conserva un), o quan cada qualificació és diferent de totes les altres.</dd>
        <dd class="example">A1 70/100, A2 35/50, A3 20/80, A4 10/10, A5 7/10 màxim de la categoria 100:<br />
                         <code>mode(0.7; 0.7; 0.25; 1.0; 0.7) = 0.7 --> 70/100</code></dd>

    <dt>Suma de qualificacions</dt>
        <dd>La suma de totes les qualificacions. Les escales s\'ignoren. Aquest és l\'únic mètode d\'agregació que no normalitza les qualificacions (no les converteix internament en percentatges). La <em>qualificació màxima</em> de l\'element de la categoria associada es calcula automàticament com a suma dels màxims de tots els elements agregats.</dd>
        <dd class="example">A1 70/100, A2 20/80, A3 10/10:<br />
                         <code>70 + 20 + 10 = 100/190</code></dd>
</dl>';
$string['aggregationposition'] = 'Posició de l\'agregació';
$string['aggregationposition_help'] = '<p>Defineix la posició de la columna del total d\'agregació en l\'informe, amb relació a les qualificacions agregades.</p>';
$string['aggregationsvisible'] = 'Tipus d\'agregació disponibles';
$string['aggregationsvisiblehelp'] = 'Seleccioneu tpts els tipus d\'agregació que han d\'estar disponibles. Amb la tecla de control (ctrl) podreu seleccioneu múltiples elements.';
$string['allgrades'] = 'Totes les qualificacions per categoria';
$string['allstudents'] = 'Tot l\'estudiantat';
$string['allusers'] = 'Tots els usuaris';
$string['autosort'] = 'Ordenació automàtica';
$string['availableidnumbers'] = 'Números ID disponibles';
$string['average'] = 'Mitjana';
$string['averagesdecimalpoints'] = 'Decimals en les mitjanes de columnes';
$string['averagesdecimalpoints_help'] = '<p>Especifica el nombre de decimals que es visualitzaran en la mitjana de cada columna. Si seleccioneu \'Hereta\' s\'utilitzarà el tipus de visualització de cada columna.</p>';
$string['averagesdisplaytype'] = 'Tipus de visualització de les mitjanes de columnes';
$string['averagesdisplaytype_help'] = '<p>Especifica com visualitzar la mitjana de cada columna. Si seleccioneu Hereta, s\'utilitzarà el tipus de visualització de cada columna.</p>';
$string['backupwithoutgradebook'] = 'La còpia de seguretat no conté la configuració del butlletí de qualificacions';
$string['badgrade'] = 'La qualificació proporcionada no és vàlida';
$string['badlyformattedscale'] = 'Escriviu una llista de valors separats per comes (calen dos valors com a mínim).';
$string['baduser'] = 'L\'usuari proporcionat no és vàlid';
$string['bonuspoints'] = 'Punts extra';
$string['bulkcheckboxes'] = 'Caselles de selecció en massa';
$string['calculatedgrade'] = 'Qualificació calculada';
$string['calculation'] = 'Càlcul';
$string['calculationadd'] = 'Afegeix càlcul';
$string['calculationedit'] = 'Edita càlcul';
$string['calculation_help'] = 'El càlcul de la qualificació és una fórmula que s\'utilitza per a calcular qualificacions. La fórmula ha de començar amb un signe igual (=) i pot utilitzar els operadors matemàtics comuns, com ara el màxim (max), el mínim (min) i la suma (sum). Si ho desitgeu, podeu incloure en el càlcul altres elements de qualificació simplement escrivint els seus números d\'ID entre dobles claudàtors. Exemple: [[1234]]';
$string['calculationsaved'] = 'S\'ha desat el càlcul';
$string['calculationview'] = 'Visualitza el càlcul';
$string['cannotaccessgroup'] = 'No es pot accedit a les qualificacions del grup seleccionat.';
$string['categories'] = 'Categories';
$string['categoriesanditems'] = 'Categories i elements';
$string['categoriesedit'] = 'Edita categories i elements';
$string['category'] = 'Categoria';
$string['categoryedit'] = 'Edita categoria';
$string['categoryname'] = 'Nom de la categoria';
$string['categorytotal'] = 'Total de la categoria';
$string['categorytotalfull'] = 'Total {$a->category}';
$string['categorytotalname'] = 'Nom de la categoria total';
$string['changedefaults'] = 'Canvia opcions per defecte';
$string['changereportdefaults'] = 'Canvia opcions per defecte dels informes';
$string['chooseaction'] = 'Trieu una acció...';
$string['choosecategory'] = 'Selecciona categoria';
$string['combo'] = 'Pestanyes i Menú desplegable';
$string['compact'] = 'Compacte';
$string['componentcontrolsvisibility'] = 'Si l\'element de qualificació es troba ocult, es controla a través dels paràmetres d\'activitat.';
$string['contract'] = 'Categoria de contracte';
$string['controls'] = 'Controls';
$string['courseavg'] = 'Mitjana del curs';
$string['coursegradecategory'] = 'Categoria de qualificació';
$string['coursegradedisplaytype'] = 'Tipus de visualització de les qualificacions del curs';
$string['coursegradedisplayupdated'] = 'S\'ha actualitzat el tipus de visualització de les qualificacions del curs.';
$string['coursegradesettings'] = 'Paràmetres de les qualificacions del curs';
$string['coursename'] = 'Nom del curs';
$string['coursescales'] = 'Escales del curs';
$string['coursesettings'] = 'Paràmetres del curs';
$string['coursesettingsexplanation'] = 'Els paràmetres del curs determinen com es mostrarà el butlletí de qualificacions a tots els participants del curs.';
$string['coursetotal'] = 'Total del curs';
$string['createcategory'] = 'Crea categoria';
$string['createcategoryerror'] = 'No s\'ha pogut crear una nova categoria';
$string['creatinggradebooksettings'] = 'S\'estan creant els paràmetres del butlletí de qualificacions';
$string['csv'] = 'CSV';
$string['currentparentaggregation'] = 'Agregació pare actual';
$string['curveto'] = 'Corba a';
$string['decimalpoints'] = 'Nombre de decimals global';
$string['decimalpoints_help'] = '<p>Especifica el nombre de decimals que es visualitzaran en cada qualificació. Aquest paràmetre no té efecte en els càlculs de qualificacions, que sempre es fan amb una precisió de cinc decimals.</p>';
$string['default'] = 'Per defecte';
$string['defaultprev'] = 'Per defecte ({$a})';
$string['deletecategory'] = 'Suprimeix categoria';
$string['disablegradehistory'] = 'Inhabilita l\'històric de qualificacions';
$string['disablegradehistory_help'] = 'Inhabilita l\'històric de canvis de les taules de qualificacions. Pot accelerar una mica el servidor i conserva espai en la base de dades.';
$string['displaylettergrade'] = 'Mostra quaificacions alfabètiques';
$string['displaypercent'] = 'Mostra percentatges';
$string['displaypoints'] = 'Mostra punts';
$string['displayweighted'] = 'Mostra qualificacions ponderades';
$string['dropdown'] = 'Menú desplegable';
$string['droplow'] = 'Omet qualificacions baixes';
$string['droplowestvalue'] = 'Configura l\'omissió de les qualificacions més baixes';
$string['droplow_help'] = '<p>Si activeu aquesta opció s\'ometran les n qualificacions més baixes (n és el nombre que definiu aquí).</p>';
$string['dropped'] = 'Omesos';
$string['dropxlowest'] = 'Omet els X més baixos';
$string['dropxlowestwarning'] = 'Nota: si ometeu els x més baixos la qualificació assumeix que tots els elements de la categoria tenen el mateix valor en punts. Si els valors en punts difereixen, els resultats poden ser impredictibles.';
$string['duplicatescale'] = 'Duplica escala';
$string['edit'] = 'Edita';
$string['editcalculation'] = 'Edita càlcul';
$string['editcalculationverbose'] = 'Edita càlcul en {$a->category}$a->itemmodule {$a->itemname}';
$string['editfeedback'] = 'Edita retroacció';
$string['editgrade'] = 'Edita qualificació';
$string['editgradeletters'] = 'Edita quaificacions alfabètiques';
$string['editoutcome'] = 'Edita competència';
$string['editoutcomes'] = 'Edita competències';
$string['editscale'] = 'Edita l\'escala';
$string['edittree'] = 'Categories i elements';
$string['editverbose'] = 'Edita {$a->category}$a->itemmodule {$a->itemname}';
$string['enableajax'] = 'Habilita AJAX';
$string['enableajax_help'] = 'Afegeix una capa de funcions AJAX en l\'informe de qualificacions, cosa que simplifica i agilita les operacions més habituals. Requereix que el Javascript estigui activat en el navegador de l\'usuari.';
$string['enableoutcomes'] = 'Habilita competències';
$string['enableoutcomes_help'] = 'El suport per a competències (objectius, estàndards, criteris...) significa que es pot avaluar coses mitjançant una o més escales vinculades a declaracions de competències. Habilitar les competències fa possible utilitzar aquest tipus de qualificació a tot el lloc.';
$string['encoding'] = 'Codificació';
$string['errorcalculationbroken'] = 'Probablement una referència circular o formula de càlcul errònia.';
$string['errorcalculationnoequal'] = 'La fórmula ha de començar per un signe igual (=1+2)';
$string['errorcalculationunknown'] = 'La fórmula no es vàlida';
$string['errorgradevaluenonnumeric'] = 'S\'ha rebut un valor no numèric per a la qualificació més alta o més baixa en';
$string['errornocalculationallowed'] = 'No es permeten càlculs en aquest element';
$string['errornocategorisedid'] = 'No s\'ha pogut obtenir un ID no categoritzat';
$string['errornocourse'] = 'No s\'ha pogut obtenir la informació del curs';
$string['errorreprintheadersnonnumeric'] = 'S\'ha rebut un valor no-numèric per a les capçaleres reimpreses';
$string['errorsavegrade'] = 'No es pot desar la qualificació.';
$string['errorupdatinggradecategoryaggregateonlygraded'] = 'S\'ha produït un error en actualitzar l\'opció "Agrega només les qualificacions no buides" de la categoria de qualificació ID {$a->id}';
$string['errorupdatinggradecategoryaggregateoutcomes'] = 'S\'ha produït un error en actualitzar l\'opció "Inclou les competències en l\'agregació" de la categoria de qualificació ID {$a->id}';
$string['errorupdatinggradecategoryaggregatesubcats'] = 'S\'ha produït un error en actualitzar l\'opció "Agrega incloent les subcategories" de la categoria de qualificació ID {$a->id}';
$string['errorupdatinggradecategoryaggregation'] = 'S\'ha produït un error en actualitzar el tipus d\'agregació de la categoria de qualificació ID {$a->id}';
$string['errorupdatinggradeitemaggregationcoef'] = 'S\'ha produït un error en actualitzar el coeficient d\'agregació (ponderació o crèdit extra) de l\'element de qualificació ID {$a->id}';
$string['excluded'] = 'Exclosa';
$string['excluded_help'] = '<p>Si seleccioneu aquesta opció, aquesta qualificació s\'exclourà de qualsevol agregació realitzada en qualsevol qualificació o categoria mare d\'aquesta.</p>';
$string['expand'] = 'Amplia categoria';
$string['export'] = 'Exporta';
$string['exportalloutcomes'] = 'Exporta totes les competències';
$string['exportfeedback'] = 'Inclou la retroacció en l\'exportació';
$string['exportonlyactive'] = 'Requereix inscripció activa';
$string['exportonlyactive_help'] = 'Inclou només estudiants en l\'exportació quan la seva inscripció no s\'hagi suspès';
$string['exportplugins'] = 'Connectors d\'exportació';
$string['exportsettings'] = 'Exporta paràmetres';
$string['exportto'] = 'Exporta a';
$string['extracreditvalue'] = 'Valor del crèdit addicional per a {$a}';
$string['extracreditwarning'] = 'Nota: Si s\'estableixen crèdits extra a tots els elements d\'una categoria, aquests elements s\'eliminaran del càlcul de la qualificació. A partir de llavors no hi haurà puntuació total.';
$string['feedback'] = 'Retroacció';
$string['feedbackadd'] = 'Afegeix retroacció';
$string['feedbackedit'] = 'Edita retroacció';
$string['feedback_help'] = '<p>Comentari afegit pel professorat a la qualificació. Pot ser un comentari extens, personalitzat, o un simple codi que correspongui a un sistema intern de retroacció.</p>';
$string['feedbacksaved'] = 'S\'ha desat la retroacció';
$string['feedbackview'] = 'Visualitza la retroacció';
$string['finalgrade'] = 'Qualificació final';
$string['finalgrade_help'] = '<p> La qualificació final (desada en memòria cau) després de realitzar tots els càlculs. </p>';
$string['fixedstudents'] = 'Columna dels estudiants estàtica';
$string['fixedstudents_help'] = 'Permet desplaçar horitzontalment les qualificacions sense perdre de vista la columna dels estudiants tot fent-la estàtica.';
$string['forceoff'] = 'Imposa: activat';
$string['forceon'] = 'Imposa: desactivat';
$string['forelementtypes'] = 'per als elements tipus {$a} seleccionats';
$string['forstudents'] = 'Per als estudiants';
$string['full'] = 'Completa';
$string['fullmode'] = 'Vista completa';
$string['fullview'] = 'Vista completa';
$string['generalsettings'] = 'Paràmetres generals';
$string['grade'] = 'Qualificació';
$string['gradeadministration'] = 'Administració de les qualificacions';
$string['gradeanalysis'] = 'Anàlisi de les qualificacions';
$string['gradebook'] = 'Butlletí de qualificacions';
$string['gradebookhiddenerror'] = 'El butlletí de qualificacions està configurat de manera que no mostra res als estudiants.';
$string['gradebookhistories'] = 'Històrics de qualificacions';
$string['gradeboundary'] = 'Límit de qualificació';
$string['gradeboundary_help'] = '<p>Percentatge per damunt del qual a una qualificació se li assigna una lletra (si s\'està utilitzant la visualització per lletres).</p>';
$string['gradecategories'] = 'Categories de qualificació';
$string['gradecategory'] = 'Categoria de qualificació';
$string['gradecategoryonmodform'] = 'Categoria de qualificació';
$string['gradecategoryonmodform_help'] = 'Aquesta opció controla la categoria a la que estan assignades les qualificacions d\'aquesta activitat al butlletí.';
$string['gradecategorysettings'] = 'Paràmetres de la categoria de qualificació';
$string['gradedisplay'] = 'Visualització de les qualificacions';
$string['gradedisplaytype'] = 'Tipus de visualització de les qualificacions';
$string['gradedisplaytype_help'] = '<p>Especifica com visualitzar les qualificacions en el qualificador i en els informes d\'usuari. Les qualificacions es poden mostrar com a qualificacions reals, com a percentatges (referits a les qualificacions mínima i màxima) o amb lletres (A, B, C, etc.).</p>';
$string['gradedon'] = 'Qualificat: {$a}';
$string['gradeexport'] = 'Exporta qualificacions';
$string['gradeexportcustomprofilefields'] = 'Camps de perfil personalitzats en l\'exportació de qualificacions';
$string['gradeexportcustomprofilefields_desc'] = 'Inclou aquests camps de perfil personalitzats en l\'exportació de qualificacions, separats per comes.';
$string['gradeexportdecimalpoints'] = 'Nombre de decimals per a l\'exportació';
$string['gradeexportdecimalpoints_desc'] = 'Nombre de decimals que es visualitzaran per a l\'exportació. Es pot canviar durant l\'exportació.';
$string['gradeexportdisplaytype'] = 'Tipus de visualització per a l\'exportació';
$string['gradeexportdisplaytype_desc'] = 'Les qualificacions es poden mostrar en l\'exportació com a qualificacions reals, com a percentatges (referits a les qualificacions mínima i màxima) o amb lletres (A, B, C, etc.). Aquest paràmetre es pot modificar durant l\'exportació.';
$string['gradeexportuserprofilefields'] = 'Camp del perfil d\'usuari en l\'exportació de qualificacions';
$string['gradeexportuserprofilefields_desc'] = 'Inclou aquests camps del perfil d\'usuari en l\'exportació de qualificacions, separats per comes.';
$string['gradeforstudent'] = '{$a->estudiant}<br />{$a->element}$a->retroacció';
$string['gradehelp'] = 'Ajuda referent a la qualificació';
$string['gradehistorylifetime'] = 'Durada de l\'històric de qualificacions';
$string['gradehistorylifetime_help'] = 'Especifica quant temps voleu mantenir l\'històric de canvis de les taules de qualificacions. Es recomana mantenir-lo tant temps com sigui possible. Si experimenteu problemes de rendiment o teniu limitacions d\'espai per a la base de dades, proveu un valor més baix.';
$string['gradeimport'] = 'Importa qualificacions';
$string['gradeitem'] = 'Element de qualificació';
$string['gradeitemaddusers'] = 'Exclou de la qualificació';
$string['gradeitemadvanced'] = 'Opcions avançades de l\'element de qualificació';
$string['gradeitemadvanced_help'] = 'Seleccioneu tots els elements que cal visualitzar com a avançats quan s\'editen els elements de qualificació';
$string['gradeitemislocked'] = 'Aquesta activitat està blocada en el butlletí de qualificacions. Els canvis que es facin en les qualificacions d\'aquesta activitat no es copiaran al butlletí de qualificacions fins que es desbloqui.';
$string['gradeitemlocked'] = 'Qualificació blocada';
$string['gradeitemmembersselected'] = 'Exclòs de la qualificació';
$string['gradeitemnonmembers'] = 'Inclòs en la qualificació';
$string['gradeitemremovemembers'] = 'Inclou en la qualificació';
$string['gradeitems'] = 'Elements de qualificació';
$string['gradeitemsettings'] = 'Paràmetres de l\'element de qualificació';
$string['gradeitemsinc'] = 'Elements de qualificació per incloure';
$string['gradeletter'] = 'Qualificació alfabètica';
$string['gradeletter_help'] = '<p>Es poden utilitzar lletres o altres símbols per representar una gamma de qualificacions.</p>';
$string['gradeletternote'] = 'Per a suprimir un element de l\'escala alfabètica només heu de deixar buit<br /> qualsevol dels camps d\'aquest element i fer clic en "Desa els canvis".';
$string['gradeletters'] = 'Lletres de qualificació';
$string['gradelocked'] = 'La qualificació està blocada';
$string['gradelong'] = '{$a->grade} / {$a->max}';
$string['grademax'] = 'Qualificació màxima';
$string['grademax_help'] = '<p>Quan utilitzeu un tipus de qualificació per valor, podeu definir una qualificació màxima. La qualificació màxima d\'un element de qualificació basat en una activitat es defineix a la pàgina d\'actualització de l\'activitat.</p>';
$string['grademin'] = 'Qualificació mínima';
$string['grademin_help'] = '<p>Quan utilitzeu un tipus de qualificació per valor, podeu definir una qualificació mínima.</p>';
$string['gradeoutcomeitem'] = 'Qualifica element de competència';
$string['gradeoutcomes'] = 'Competències';
$string['gradeoutcomescourses'] = 'Competències del curs';
$string['gradepass'] = 'Qualificació per a aprovar';
$string['gradepass_help'] = '<p>Si voleu que un element tingui una qualificació mínima que els usuaris han d\'obtenir per a superar aquest element, podeu definir-la aquí.</p>';
$string['gradepreferences'] = 'Preferències de qualificació';
$string['gradepreferenceshelp'] = 'Ajuda quant a les preferències de qualificació';
$string['gradepublishing'] = 'Habilita publicació';
$string['gradepublishing_help'] = 'Habilita la publicació per a exportacions i importacions. Es podrà accedir a les qualificacions exportades per mitjà d\'un URL, sense necessitat d\'entrar al Moodle. D\'una manera semblant, també es podrà importar qualificacions mitjançant un URL, cosa que vol dir que un lloc Moodle pot importar qualificacions publicades per un altre lloc). Per defecte, només els administradors poden utilitzar aquesta característica. Formeu els vostres usuaris abans d\'afegir aquesta capacitat a altres rols.';
$string['gradereport'] = 'Informe de qualificacions';
$string['graderreport'] = 'Informe del qualificador';
$string['grades'] = 'Qualificacions';
$string['gradesforuser'] = 'Qualificacions de {$a->user}';
$string['gradesonly'] = 'Només qualificacions';
$string['gradessettings'] = 'Paràmetres de qualificacions';
$string['gradetype'] = 'Tipus de qualificació';
$string['gradetype_help'] = '<p>Especifica el tipus de qualificació utilitzat: cap (no és possible qualificar), valor (habilita els paràmetres de qualificació màxima i mínima), escala (habilita el paràmetre escala) o text (només retroacció). Únicament es poden agregar els tipus de qualificació per valor i escala. El tipus de qualificació d\'un element de qualificació basat en una activitat es defineix a la pàgina d\'actualització de l\'activitat.</p>';
$string['gradeview'] = 'Mostra qualificació';
$string['gradeweighthelp'] = 'Ajuda referent a la ponderació';
$string['groupavg'] = 'Mitjana del grup';
$string['hidden'] = 'Ocult';
$string['hiddenasdate'] = 'Mostra la data de tramesa en les qualificacions ocultes';
$string['hiddenasdate_help'] = 'Si l\'usuari no pot veure qualificacions ocultes, mostra la data de tramesa en lloc d\'un guió \'-\'.';
$string['hidden_help'] = 'Si s\'activa, les qualificacions estan ocultes als estudiants. Si es vol es pot establir un \'Oculta fins a\' una data determinada per no publicar  les qualificacions fins que s\'hagi completat la correcció.';
$string['hiddenuntil'] = 'Oculta fins';
$string['hiddenuntildate'] = 'Oculta fins: {$a}';
$string['hideadvanced'] = 'Oculta característiques avançades';
$string['hideaverages'] = 'Oculta mitjanes';
$string['hidecalculations'] = 'Oculta càlculs';
$string['hidecategory'] = 'Ocult';
$string['hideeyecons'] = 'Oculta icones mostra/oculta';
$string['hidefeedback'] = 'Oculta retroacció';
$string['hideforcedsettings'] = 'Oculta els paràmetres imposats';
$string['hideforcedsettings_help'] = 'Oculta els paràmetres imposats en la interfície de l\'usuari del qualificador.';
$string['hidegroups'] = 'Oculta grups';
$string['hidelocks'] = 'Oculta blocatges';
$string['hidenooutcomes'] = 'Mostra competències';
$string['hidequickfeedback'] = 'Oculta retroacció ràpida';
$string['hideranges'] = 'Oculta gammes';
$string['hidetotalifhiddenitems'] = 'Oculta els totals si contenen
elements ocults';
$string['hidetotalifhiddenitems_help'] = 'Aquesta opció especifica si es mostren als estudiants els totals que contenen elements ocults de qualificació o bé són substituïts per un guió (-). Si es mostra, el total pot ser calculat excloent o bé incloent els elements ocults.

Si s\'exclouen els elements ocults, el total serà diferent del total que veu el professorat a l\'informe de les qualificacions, ja que el professorat sempre veu els totals calculats a partir de tots els elements, siguin ocults o siguin visibles Si s\'inclouen els elements ocults, els estudiants poden arribar a calcular les seves qualificacions als elements ocults.';
$string['hidetotalshowexhiddenitems'] = 'Mostra els totals excloent els
elements ocults';
$string['hidetotalshowinchiddenitems'] = 'Mostra els totals incloent els
elements ocults';
$string['hideverbose'] = 'Oculta {$a->category}$a->itemmodule {$a->itemname}';
$string['highgradeascending'] = 'Ordena per qualificació més alta ascendent';
$string['highgradedescending'] = 'Ordena per qualificació més alta descendent';
$string['highgradeletter'] = 'Alta';
$string['identifier'] = 'Identifica usuari per';
$string['idnumbers'] = 'Números ID';
$string['import'] = 'Importa';
$string['importcsv'] = 'Importa CSV';
$string['importcustom'] = 'Importa com a competències personalitzades (només en aquest curs)';
$string['importerror'] = 'S\'ha produït un error. L\'script no ha estat cridat amb els paràmetres correctes.';
$string['importfailed'] = 'La importació ha fallat';
$string['importfeedback'] = 'Importa retroacció';
$string['importfile'] = 'Importa un fitxer';
$string['importfilemissing'] = 'No s\'ha rebut cap fitxer. Torneu enrere al formulari i assegureu-vos de penjar un fitxer vàlid.';
$string['importfrom'] = 'Importa de';
$string['importoutcomenofile'] = 'El fitxer que heu penjat està buit o corrupte. Comproveu que sigui un fitxer vàlid. El problema s\'ha detectat a la línia {$a}. Això passa quan una línia de dades no té el mateix nombre de columnes que la primera línia del fitxer (la línia de capçalera) o quan falten les capçaleres. Com a exemple de fitxer amb una capçalera vàlida, podeu examinar el fitxer exportat.';
$string['importoutcomes'] = 'Importa competències';
$string['importoutcomes_help'] = 'Es poden importar competències mitjançant un fitxer csv amb format o un fitxer csv d\'exportació de competències.';
$string['importoutcomesuccess'] = 'S\'ha importat la competència "{$a->name}" amb el núm. ID {$a->id}';
$string['importplugins'] = 'Connectors d\'importació';
$string['importpreview'] = 'Previsualització de la importació';
$string['importsettings'] = 'Paràmetres d\'importació';
$string['importskippednomanagescale'] = 'No teniu permís per a afegir una nova escala, de manera que la competència "{$a}" serà omesa, ja que requeria crear una nova escala.';
$string['importskippedoutcome'] = 'Ja existeix una competència amb nom curt "{$a}" en aquest context. La que contenia el fitxer importat s\'ha omès.';
$string['importstandard'] = 'Importa com a competències estàndard';
$string['importsuccess'] = 'La importació ha tingut èxit';
$string['importxml'] = 'Importa XML';
$string['includescalesinaggregation'] = 'Inclou escales en l\'agregació';
$string['includescalesinaggregation_help'] = 'Podeu determinar si les escales s\'inclouran o no com a nombres en totes les qualificacions agregades de tots els butlletins de qualificació de tots els cursos.';
$string['incorrectcourseid'] = 'El ID del curs és incorrecte';
$string['incorrectcustomscale'] = 'Escala personal incorrecta. Cal que la canvieu.';
$string['incorrectminmax'] = 'El mínim ha de ser més baix que el màxim';
$string['inherit'] = 'Hereta';
$string['intersectioninfo'] = 'Informació Estudiant/Qualificació';
$string['item'] = 'Element';
$string['iteminfo'] = 'Informació de l\'element';
$string['iteminfo_help'] = '<p>Un espai per a introduir informació sobre l\'element. El text que introduïu aquí no apareix enlloc més.</p>';
$string['itemname'] = 'Nom de l\'element';
$string['itemnamehelp'] = 'El nom d\'aquest element, definit pel mòdul';
$string['items'] = 'Elements';
$string['itemsedit'] = 'Edita element de qualificació';
$string['keephigh'] = 'Conserva les més altes';
$string['keephigh_help'] = 'Si activeu aquesta opció, només es conservaran les n qualificacions més altes (n és el nombre que definiu aquí).';
$string['keymanager'] = 'Gestió de claus';
$string['lessthanmin'] = 'La qualificació de l\'element {$a->itemname} per a l\'usuari {$a->username} és menor que el mínim permès';
$string['letter'] = 'Lletra';
$string['lettergrade'] = 'Qualificació per lletres';
$string['lettergradenonnumber'] = 'La qualificació baixa o alta no és numèrica per a';
$string['letterpercentage'] = 'Lletra (percentatge)';
$string['letterreal'] = 'Lletra (real)';
$string['letters'] = 'Lletres';
$string['linkedactivity'] = 'Activitat vinculada';
$string['linkedactivity_help'] = '<p>Especifica una activitat opcional vinculada a aquest element de competència. S\'utilitza per mesurar el rendiment de l\'estudiantat sobre la base de criteris no avaluats per la qualificació de l\'activitat.</p>';
$string['linktoactivity'] = 'Enllaç a l\'activitat {$a->name}';
$string['lock'] = 'Bloca';
$string['locked'] = 'Blocat';
$string['locked_help'] = 'Si està marcat les qualificacions no es tornaran a actualitzar automàticament per l\'activitat relacionada.';
$string['locktime'] = 'Bloca després de';
$string['locktimedate'] = 'Blocat després de: {$a}';
$string['lockverbose'] = 'Bloca {$a->category}$a->itemmodule {$a->itemname}';
$string['lowest'] = 'La més baixa';
$string['lowgradeletter'] = 'Baixa';
$string['manualitem'] = 'Element manual';
$string['mapfrom'] = 'De';
$string['mappings'] = 'Mapatge d\'elements de qualificació';
$string['mapto'] = 'A';
$string['max'] = 'La més alta';
$string['maxgrade'] = 'Qualificació màx.';
$string['meanall'] = 'Totes les qualificacions';
$string['meangraded'] = 'Qualificacions no buides';
$string['meanselection'] = 'Qualificacions seleccionades per a les mitjanes de columnes';
$string['meanselection_help'] = 'Incloure o no les cel·les sense qualificació en el càlcul de la mitjana de cada columna.';
$string['median'] = 'Punt mitjà';
$string['min'] = 'La més baixa';
$string['missingscale'] = 'Heu de seleccionar una escala';
$string['mode'] = 'Moda';
$string['morethanmax'] = 'La qualificació de l\'element {$a->itemname} per a l\'usuari {$a->username} supera el màxim permès';
$string['moveselectedto'] = 'Mou els elements seleccionats a';
$string['movingelement'] = 'S\'està movent {$a}';
$string['multfactor'] = 'Multiplicador';
$string['multfactor_help'] = '<p>Factor pel qual es multiplicaran totes les qualificacions d\'aquest element de qualificació.</p>';
$string['multfactorvalue'] = 'Valor multiplicador per a {$a}';
$string['mypreferences'] = 'Les meves preferències';
$string['myreportpreferences'] = 'Les meves preferències d\'informes';
$string['navmethod'] = 'Mètode de navegació';
$string['neverdeletehistory'] = 'No suprimeixis mai l\'històric';
$string['newcategory'] = 'Nova categoria';
$string['newitem'] = 'Nou element de qualificació';
$string['newoutcomeitem'] = 'Nou element de competència';
$string['no'] = 'No';
$string['nocategories'] = 'Les categories de qualificació no s\'han pogut afegir o trobar per a aquest curs';
$string['nocategoryname'] = 'No heu proporcionat un nom de categoria.';
$string['nocategoryview'] = 'Cap categoria per a veure per';
$string['nocourses'] = 'Encara no hi ha cursos';
$string['noforce'] = 'No imposis';
$string['nogradeletters'] = 'No s\'han definit lletres per a la qualificació';
$string['nogradesreturned'] = 'No s\'han retornat qualificacions';
$string['noidnumber'] = 'Falta el número d\'ID';
$string['nolettergrade'] = 'No s\'ha definit cap lletra per a';
$string['nomode'] = 'n/d';
$string['nonnumericweight'] = 'S\'ha rebut un valor no numèric per a';
$string['nonunlockableverbose'] = 'Aquesta qualificació no es pot desblocar mentre estigui blocat {$a->itemname}';
$string['nonweightedpct'] = '% no ponderat';
$string['nooutcome'] = 'Sense competències';
$string['nooutcomes'] = 'Els elements de competència han d\'estar vinculats a competències del curs, però no hi ha competències definides per a aquest curs. Voleu crear-les?';
$string['nopublish'] = 'No publiquis';
$string['norolesdefined'] = 'No s\'han definits rols a Administració > Qualificacions > Paràmetres generals > Rols qualificats';
$string['noscales'] = 'Les competències han d\'estar vinculades a una escala del curs, o a una escala global, però no n\'hi ha cap. Voleu crear-ne una?';
$string['noselectedcategories'] = 'No heu seleccionat cap categoria.';
$string['noselecteditems'] = 'No heu seleccionat cap element.';
$string['notteachererror'] = 'Per a usar aquesta característica heu de ser professor o professora';
$string['nousersloaded'] = 'No s\'han carregat usuaris';
$string['numberofgrades'] = 'Nombre de qualificacions';
$string['onascaleof'] = 'en una escala {$a->grademin} - {$a->grademax}';
$string['operations'] = 'Operacions';
$string['options'] = 'Opcions';
$string['outcome'] = 'Competència';
$string['outcomeassigntocourse'] = 'Assigna una altra competència a aquest curs';
$string['outcomecategory'] = 'Crea competències en la categoria';
$string['outcomecategorynew'] = 'Nova categoria';
$string['outcomeconfirmdelete'] = 'Segur que voleu suprimir la competència "{$a}"?';
$string['outcomecreate'] = 'Afegeix una nova competència';
$string['outcomedelete'] = 'Suprimeix competència';
$string['outcomefullname'] = 'Nom complet';
$string['outcome_help'] = 'Especifica quina competència representarà al butlletí aquest element de qualificació. Únicament estan disponibles les competències associades al curs i les competències globals de tot el lloc.';
$string['outcomeitem'] = 'Element de competència';
$string['outcomeitemsedit'] = 'Edita element de competència';
$string['outcomereport'] = 'Informe de competència';
$string['outcomes'] = 'Competències';
$string['outcomescourse'] = 'Competències utilitzades al curs';
$string['outcomescoursecustom'] = 'Competències personalitzades utilitzades (no les suprimiu)';
$string['outcomescoursenotused'] = 'Competències estàndard no utilitzades';
$string['outcomescourseused'] = 'Competències estàndard utilitzades (no les suprimiu)';
$string['outcomescustom'] = 'Competències personalitzades';
$string['outcomeshortname'] = 'Nom curt';
$string['outcomesstandard'] = 'Competències estàndard';
$string['outcomesstandardavailable'] = 'Competències estàndard disponibles';
$string['outcomestandard'] = 'Competència estàndard';
$string['outcomestandard_help'] = '<p>Una competència estàndard està disponible per a tots els cursos del lloc.</p>';
$string['overallaverage'] = 'Mitjana total';
$string['overridden'] = 'Rectificat';
$string['overridden_help'] = '<p>Si aquest indicador està activat, el valor de la qualificació no es tornarà a ajustar automàticament en endavant. El butlletí de qualificacions sol activar internament aquest indicador, però també podeu commutar-lo manualment mitjançant el formulari.</p>';
$string['overriddennotice'] = 'La vostra qualificació final en aquesta activitat s\'ha modificat manualment.';
$string['overridesitedefaultgradedisplaytype'] = 'Invalida opcions per defecte del lloc';
$string['overridesitedefaultgradedisplaytype_help'] = '<p>Activeu aquesta casella per poder definir les vostres opcions de visualització de les qualificacions en el butlletí, en compte d\'utilitzar els paràmetres per defecte del lloc. Amb això habilitareu elements del formulari que us permetran definir les lletres de qualificació i els límits que vulgueu.</p>';
$string['parentcategory'] = 'Categoria mare';
$string['pctoftotalgrade'] = '% de la qualificació total';
$string['percent'] = 'Percentatge';
$string['percentage'] = 'Percentatge';
$string['percentageletter'] = 'Percentatge (lletra)';
$string['percentagereal'] = 'Percentatge (real)';
$string['percentascending'] = 'Ordena per percentatge ascendent';
$string['percentdescending'] = 'Ordena per percentatge descendent';
$string['percentshort'] = '%';
$string['plusfactor'] = 'Compensació';
$string['plusfactor_help'] = '<p>Quantitat que se sumarà a cada qualificació en aquest element, després d\'aplicar el multiplicador.</p>';
$string['plusfactorvalue'] = 'Valor de desplaçament per a {$a}';
$string['points'] = 'punts';
$string['pointsascending'] = 'Ordena per punts ascendent';
$string['pointsdescending'] = 'Ordena per punts descendent';
$string['positionfirst'] = 'Principi';
$string['positionlast'] = 'Final';
$string['preferences'] = 'Preferències';
$string['prefgeneral'] = 'Generals';
$string['prefletters'] = 'Lletres de qualificació i límits';
$string['prefrows'] = 'Files especials';
$string['prefshow'] = 'Commutadors mostra/oculta';
$string['previewrows'] = 'Previsualitza files';
$string['profilereport'] = 'Informe del perfil d\'usuari';
$string['profilereport_help'] = 'Informe de qualificacions utilitzat a la pàgina de perfil d\'usuari';
$string['publishing'] = 'Publicació';
$string['quickfeedback'] = 'Retroacció ràpida';
$string['quickgrading'] = 'Qualificació ràpida';
$string['quickgrading_help'] = '<p>La qualificació ràpida afegeix un camp d\'entrada de text en cada casella de qualificació de l\'informe del qualificador, de manera que podeu editar moltes qualificacions d\'una vegada. Després feu clic en el botó Actualitza per efectuar tots aquests canvis d\'una vegada, en lloc de fer-los un per un.</p>';
$string['range'] = 'Gamma';
$string['rangedecimals'] = 'Xifres decimals del rang';
$string['rangedecimals_help'] = 'Nombre de xifres decimals que es mostraran al rang.';
$string['rangesdecimalpoints'] = 'Decimals en les gammes';
$string['rangesdecimalpoints_help'] = '<p>Especifica el nombre de decimals que es mostren en cada element de la gamma. Aquest nombre es pot canviar després per a cada element de qualificació.</p>';
$string['rangesdisplaytype'] = 'Tipus de visualització de les gammes';
$string['rangesdisplaytype_help'] = '<p>Especifica com visualitzar les gammes. Si seleccioneu Hereta, s\'utilitzarà el tipus de visualització de cada columna.</p>';
$string['rank'] = 'Posició';
$string['rawpct'] = '% brut';
$string['real'] = 'Real';
$string['realletter'] = 'Real (lletra)';
$string['realpercentage'] = 'Real (percentatge)';
$string['recovergradesdefault'] = 'Restableix les qualificacions per defecte';
$string['recovergradesdefault_help'] = 'Per defecte restableix les qualificacions antigues quan es torna a inscriure un usuari en un curs.';
$string['regradeanyway'] = 'Torna a qualificar igualment';
$string['removeallcoursegrades'] = 'Suprimeix totes les qualificacions';
$string['removeallcourseitems'] = 'Suprimeix tots els elements i les categories';
$string['report'] = 'Informe';
$string['reportdefault'] = 'Opció per defecte de l\'informe ({$a})';
$string['reportplugins'] = 'Connectors d\'informes';
$string['reportsettings'] = 'Paràmetres de l\'informe';
$string['reprintheaders'] = 'Repeteix capçaleres';
$string['respectingcurrentdata'] = 'la configuració actual no es modificarà';
$string['rowpreviewnum'] = 'Previsualització de files';
$string['savechanges'] = 'Desa els canvis';
$string['savepreferences'] = 'Desa les preferències';
$string['scaleconfirmdelete'] = 'Esteu segur que voleu eliminar l\'escala "{$a}"?';
$string['scaledpct'] = '% a escala';
$string['seeallcoursegrades'] = 'Mostra totes les qualificacions del curs';
$string['select'] = 'Selecciona {$a}';
$string['selectalloroneuser'] = 'Selecciona tots els usuaris o un usuari';
$string['selectauser'] = 'Seleccioneu un usuari';
$string['selectdestination'] = 'Selecciona una destinació per a {$a}';
$string['separator'] = 'Separador';
$string['sepcomma'] = 'Coma';
$string['septab'] = 'Tabulació';
$string['setcategories'] = 'Categories';
$string['setcategorieserror'] = 'Heu de seleccionar les categories per al vostre curs abans de ponderar-les.';
$string['setgradeletters'] = 'Qualificació alfabètica';
$string['setpreferences'] = 'Preferències';
$string['setting'] = 'Paràmetre';
$string['settings'] = 'Paràmetres';
$string['setweights'] = 'Ponderació';
$string['showactivityicons'] = 'Mostra icones d\'activitat';
$string['showactivityicons_help'] = '<p>Mostrar o no les icones de les activitats al costat dels noms de les activitats.</p>';
$string['showallhidden'] = 'Mostra tots els elements ocults';
$string['showallstudents'] = 'Mostra tots els estudiants';
$string['showanalysisicon'] = 'Mostra la icona d\'anàlisi de qualificacions';
$string['showanalysisicon_desc'] = 'Determina si per defecte es mostra la icona d\'anàlisi de qualificacions. Si el mòdul d\'activitat ho suporta, la icona d\'anàlisi de qualificacions enllaça amb una pàgina amb l\'explicació molt més detallada de les qualificacions i de com s\'han obtingut.';
$string['showanalysisicon_help'] = 'Si el mòdul d\'activitat ho suporta, la icona d\'anàlisi de qualificacions enllaça amb una pàgina amb l\'explicació molt més detallada de les qualificacions i de com s\'han obtingut.';
$string['showaverage'] = 'Mostra la mitjana';
$string['showaverage_help'] = 'Voleu mostrar la columna mitjana? Els estudiants poden estimar les qualificacions d\'altres estudiants si la mitjana es calcula a partir d\'un petit nombre de qualificacions. Per motius de rendiment la mitjana és aproximada si depèn d\'algun element ocult.';
$string['showaverages'] = 'Mostra mitjanes de columnes';
$string['showaverages_help'] = 'Mostrar o no la mitjana de cada columna.';
$string['showcalculations'] = 'Mostra càlculs';
$string['showcalculations_help'] = 'Mostrar o no icones de calculadora al costat de cada element i categoria de qualificació, indicadors sobre els elements calculats i un senyal visual que indiqui que una columna és calculada.';
$string['showeyecons'] = 'Mostra icones mostra/oculta';
$string['showeyecons_help'] = 'Mostrar o no una icona de mostra/oculta al costat de cada qualificació (per controlar que sigui visible o no per a l\'usuari).';
$string['showfeedback'] = 'Mostra retroacció';
$string['showfeedback_help'] = 'Voleu mostrar la columna retroacció?';
$string['showgrade'] = 'Mostra qualificacions';
$string['showgrade_help'] = 'Voleu mostrar la columna qualificacions?';
$string['showgroups'] = 'Mostra grups';
$string['showhiddenitems'] = 'Mostra elements ocults';
$string['showhiddenitems_help'] = 'Especifica si els elements de qualificació ocults s\'oculten completament o si els noms dels elements de qualificació ocults són visibles per als estudiants.

* Mostra els elements de qualificació ocults: els noms dels elements de qualificació ocults es mostren, però les qualificacions resten ocultes.
* Mostra només els elements "oculta
fins": els elements de qualificació amb una data "oculta fins" s\'oculten completament fins aquesta data. Després d\'aquesta data es mostrarà l\'element complet.
* No mostris cap element ocult: els elements de qualificació ocults s\'oculten completament.';
$string['showhiddenuntilonly'] = 'Mostra només els elements "oculta
fins"';
$string['showlettergrade'] = 'Mostra qualificacions en lletra';
$string['showlettergrade_help'] = 'Voleu mostrar la columna qualificacions en lletra?';
$string['showlocks'] = 'Mostra blocatges';
$string['showlocks_help'] = 'Mostrar o no una icona de bloca/desbloca al costat de cada qualificació.';
$string['shownohidden'] = 'No mostris cap element ocult';
$string['shownooutcomes'] = 'Oculta competències';
$string['shownumberofgrades'] = 'Mostra el nombre de qualificacions en les mitjanes';
$string['shownumberofgrades_help'] = 'Mostrar o no entre parèntesis, a continuació de cada mitjana, el nombre de qualificacions utilitzades per a calcular-la. P. ex. 45 (34).';
$string['showpercentage'] = 'Mostra percentatge';
$string['showpercentage_help'] = 'Cal mostrar el valor en percentatge de cada element de qualificació?';
$string['showquickfeedback'] = 'Mostra retroacció ràpida';
$string['showquickfeedback_help'] = 'La retroacció ràpida afegeix un camp d\'entrada de text en cada casella de qualificació de l\'informe del qualificador, de manera que podeu editar la retroacció de moltes qualificacions d\'una vegada. Després feu clic al botó Actualitza per efectuar tots aquests canvis d\'una vegada, en lloc de fer-los un per un.';
$string['showrange'] = 'Mostra rangs';
$string['showrange_help'] = 'Voleu mostrar la columna de rangs?';
$string['showranges'] = 'Mostra gammes';
$string['showranges_help'] = 'Mostrar o no la gamma de qualificacions de cada columna en una fila addicional.';
$string['showrank'] = 'Mostra posició';
$string['showrank_help'] = 'Mostrar o no la posició de l\'usuari amb relació a la resta de la classe, en cada element de qualificació.';
$string['showuserimage'] = 'Mostra la imatge del perfil de l\'usuari';
$string['showuserimage_help'] = 'Mostrar o no la imatge del perfil de l\'usuari, al costat del nom, en l\'informe del qualificador.';
$string['showverbose'] = 'Mostra {$a->category}$a->itemmodule {$a->itemname}';
$string['showweight'] = 'Mostra ponderacions';
$string['showweight_help'] = 'Voleu mostrar la columna de ponderacions de les qualificacions?';
$string['simpleview'] = 'Vista simple';
$string['sitewide'] = 'Tot el lloc';
$string['sort'] = 'ordena';
$string['sortasc'] = 'Ordena en ordre ascendent';
$string['sortbyfirstname'] = 'Ordena per nom';
$string['sortbylastname'] = 'Ordena per cognom';
$string['sortdesc'] = 'Ordena en ordre descendent';
$string['standarddeviation'] = 'Desviació estàndard';
$string['stats'] = 'Estadístiques';
$string['statslink'] = 'Estad.';
$string['student'] = 'Estudiant';
$string['studentsperpage'] = 'Estudiants per pàgina';
$string['studentsperpage_help'] = 'Nombre d\'estudiants que es mostren per pàgina en l\'informe del qualificador.';
$string['studentsperpagereduced'] = 'Redueix el màxim d\'estudiants per pàgina de {$a->originalstudentsperpage} a {$a->studentsperpage}. Penseu d\'incrementar el paràmetre PHP max_input_vars des de {$a->maxinputvars}.';
$string['subcategory'] = 'Categoria normal';
$string['submissions'] = 'Trameses';
$string['submittedon'] = 'Tramès: {$a}';
$string['switchtofullview'] = 'Canvia a la vista completa';
$string['switchtosimpleview'] = 'Canvia a la vista simple';
$string['tabs'] = 'Pestanyes';
$string['topcategory'] = 'Supercategoria';
$string['total'] = 'Total';
$string['totalweight100'] = 'El total és igual a 100';
$string['totalweightnot100'] = 'El total no és igual a 100';
$string['turnfeedbackoff'] = 'Desactiva la retroacció';
$string['turnfeedbackon'] = 'Activa la retroacció';
$string['typenone'] = 'Cap';
$string['typescale'] = 'Escala';
$string['typescale_help'] = '<p>Quan utilitzeu un tipus de qualificació d\'escala, podeu seleccionar l\'escala. L\'escala d\'un element de qualificació basat en una activitat es defineix a la pàgina d\'actualització de l\'activitat.</p>';
$string['typetext'] = 'Text';
$string['typevalue'] = 'Valor';
$string['uncategorised'] = 'Sense categoria';
$string['unchangedgrade'] = 'Qualificació no modificada';
$string['unenrolledusersinimport'] = 'Aquesta importació incloïa les qualificacions següents d\'usuaris a hores d\'ara no inscrits en aquest curs: {$a}';
$string['unlimitedgrades'] = 'Qualficacions il·limitades';
$string['unlimitedgrades_help'] = 'Per defecte les qualificacions estan limitades pels valors màxim i mínim dels element de qualificació. Si habiliteu aquesta opció eliminareu aquest límit, i podreu introduir  directament al butlletí de qualificacions qualificacions superiors al 100%. Es recomana que aquesta opció s\'activi en un horari de poca activitat perquè es tornaran a calcular totes les qualificacions, acció que pot provocar una sobrecàrrega del servidor.';
$string['unlock'] = 'Desbloca';
$string['unlockverbose'] = 'Desbloca {$a->category}$a->itemmodule {$a->itemname}';
$string['unused'] = 'No utilitzat';
$string['updatedgradesonly'] = 'Exporta només les qualificacions noves o actualitzades';
$string['uploadgrades'] = 'Carrega qualificacions';
$string['useadvanced'] = 'Utilitza les característiques avançades';
$string['usedcourses'] = 'Cursos utilitzats';
$string['usedgradeitem'] = 'Element de qualificació utilitzats';
$string['usenooutcome'] = 'No utilitzis competències';
$string['usenoscale'] = 'No utilitzis escales';
$string['usepercent'] = 'Utilitza percentatge';
$string['user'] = 'Usuari';
$string['userenrolmentsuspended'] = 'S\'ha suspès la inscripció d\'usuaris';
$string['usergrade'] = 'Usuari {$a->fullname} ({$a->useridnumber}) en l\'element {$a->gradeidnumber}';
$string['userpreferences'] = 'Preferències de l\'usuari';
$string['useweighted'] = 'Utilitza ponderació';
$string['verbosescales'] = 'Escales detallades';
$string['viewbygroup'] = 'Grup';
$string['viewgrades'] = 'Mostra les qualificacions';
$string['warningexcludedsum'] = 'Advertència: l\'exclusió de les qualificacions no és compatible amb l\'agregació de tipus \'suma\'.';
$string['weight'] = 'ponderació';
$string['weightcourse'] = 'Utilitza qualificacions ponderades per al curs';
$string['weightedascending'] = 'Ordena per percentatge ponderat ascendent';
$string['weighteddescending'] = 'Ordena per percentatge ponderat descendent';
$string['weightedpct'] = '% ponderat';
$string['weightedpctcontribution'] = '% ponderat de la contribució';
$string['weightorextracredit'] = 'Pomderació o crèdit extra';
$string['weights'] = 'Ponderacions';
$string['weightsedit'] = 'Edita les ponderacions i els crèdits extres';
$string['weightuc'] = 'Ponderació';
$string['writinggradebookinfo'] = 'S\'estan escrivint els paràmetres del butlletí de qualificacions';
$string['xml'] = 'XML';
$string['yes'] = 'Sí';
$string['yourgrade'] = 'La vostra qualificació';
