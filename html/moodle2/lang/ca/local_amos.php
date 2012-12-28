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
 * Strings for component 'local_amos', language 'ca', branch 'MOODLE_24_STABLE'
 *
 * @package   local_amos
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['about'] = '<p> AMOS vol dir Automated Manipulation Of Strings, manipulació automatitzada de cadenes. AMOS és el repositori central de les cadenes de Moodle i el seu historial. Realitza un seguiment de l\'addició de cadenes d\'Anglès en el codi de Moodle, recull les traduccions, s\'ocupa de les tasques comunes de traducció i genera paquets d\'idioma que s\'implementa en els servidors Moodle. </p> <p>Veure la documentació<a href = "http://docs.moodle.org/es/AMOS ">  d\'AMOS </a> per més informació. </p>';
$string['amos'] = 'AMOS - Eina de traducció de Moodle';
$string['amos:commit'] = 'Envia les cadenes emmagatzemades a la pila al repositori central';
$string['amos:importfile'] = 'Importa les cadenes des d\'un fitxer carregat';
$string['amos:manage'] = 'Configura el portal AMOS';
$string['amos:stage'] = 'Utilitza la eina de traducció AMOS i emmagatzema les cadenes a la pila';
$string['amos:stash'] = 'Emmagatzema la pila actual de cadenes al magatzem persistent';
$string['commitstage'] = 'Confirma les cadenes a la pila';
$string['commitstage_help'] = 'Emmagatzema totes les traduccions desades a la pila al repositori central d\'AMOS.  Totes les cadenes de la pila són podades i depurades abans de ser enviades. Sols les cadenes confirmades s\'emmagatzemen. Això significa que sols les cadenes ressaltades per sota en verd s\'emmagatzemen. La pila és neteja després de l\'enviament.';
$string['committableall'] = 'totes les llengües';
$string['committablenone'] = 'No hi ha llengües autoritzades - si us plau contacteu amb l\'administrador d\'AMOS';
$string['confirmaction'] = 'Això no és pot desfer. Voleu continuar ?';
$string['contribaccept'] = 'Accepta';
$string['contribactions'] = 'Accions de traducció a les contribucions';
$string['contribactions_help'] = 'Depenent dels vostres drets i del flux de treball contribuït, podreu tenir disponibles algunes de les accions següents:

* Aplica - Còpia la traducció a la vostra pila, no es pot modificar la contribució emmagatzemada
*Assigna-me-la - Assigna\'t la contribució a si mateix, aquesta és la persona responsable de la revisió i la integració
*Reassigna - Assigna a qualsevol la contribució
*Inicia revisió - Assigna la contribució nova a si mateix, aquest és el estat "En revisió" i copia la traducció enviada a la teva pila
*Accepta - Marca la contribució com acceptada
*Rebutja - Marca la contribució com rebutjada, si us plau escriviu els motius en el comentari adjunt.

El traductor que ha contribuït serà informat per correu en quan l\'estat de la seva contribució canvií';
$string['contribapply'] = 'Aplica';
$string['contribassignee'] = 'Assignada';
$string['contribassigneenone'] = '-';
$string['contribassigntome'] = 'Assigna\'m';
$string['contribauthor'] = 'Autor';
$string['contribclosedno'] = 'Amaga contribucions resoltes';
$string['contribclosedyes'] = 'Mostra contribucions resoltes';
$string['contribcomponents'] = 'Components';
$string['contribid'] = 'ID';
$string['contribincomingnone'] = 'No hi han contribucions d\'entrada';
$string['contribincomingsome'] = 'Contribucions d\'entrada ({$a})';
$string['contriblanguage'] = 'Llengua';
$string['contribreject'] = 'Rebutja';
$string['contribresign'] = 'Reassigna';
$string['contribstartreview'] = 'Inicia la revisió';
$string['contribstatus'] = 'Estat';
$string['contribstatus0'] = 'Nou';
$string['contribstatus10'] = 'En revisió';
$string['contribstatus20'] = 'Rebutjada';
$string['contribstatus30'] = 'Acceptada';
$string['contribstatus_help'] = 'El flux de treball de les contribucions d\'una traducció tenen els següents estats:

*Nou - La contribució ha sigut assignada a un mantenidor d\'idioma però no ha sigut revisada encara

*En revisió - La contribució ha sigut assignada a un mantenidor d\'idioma i ha sigut desada a  la pila per revisió

*Rebutjada - El mantenidor de l\'idioma ha rebutjat la contribució i probablement ha deixat una explicació en un comentari

*Acceptada - La contribució ha sigut acceptada pel mantenidor de l\'idioma';
$string['contribstrings'] = 'Cadenes';
$string['contribstringseq'] = '{$a->orig} nou';
$string['contribstringsnone'] = '{$a->orig} ( totes elles estan traduïdes al paquet de llengua)';
$string['contribstringssome'] = '{$a->orig} ({$a->same} d\'elles tenen una traducció més recent)';
$string['contribsubject'] = 'Assumpte';
$string['contribsubmittednone'] = 'No hi ha contribucions enviades';
$string['contribsubmittedsome'] = 'Les vostres contribucions ({$a})';
$string['contribtimemodified'] = 'Modificat';
$string['contributions'] = 'Contribucions';
$string['emailacceptbody'] = 'El mantenidor de l\'idioma {$a->assignee} ha acceptat la vostra traducció #{$a->id} {$a->subject}.

Visiteu {$a->url} per cercar més detalls.';
$string['emailacceptsubject'] = '[Contribució AMOS] Acceptada';
$string['emailcontributionbody'] = 'L\'usuari {$a->author} ha enviat la nova traducció #{$a->id} {$a->subject}.

Visiteu {$a->url} per cercar més detalls.';
$string['emailcontributionsubject'] = '[Contribució AMOS] Nova traducció enviada';
$string['emailrejectbody'] = 'El mantenidor de l\'idioma del paquet {$a->assignee} ha rebutjat la vostra traducció #{$a->id} {$a->subject}.

Visiteu {$a->url} per cercar més detalls.';
$string['emailrejectsubject'] = '[Contribució AMOS] Rebutjada';
$string['emailreviewbody'] = 'El mantenidor de l\'idioma del paquet {$a->assignee} ha iniciat una revisió de la vostra traducció #{$a->id} {$a->subject}.

Visiteu {$a->url} per cercar més detalls.';
$string['emailreviewsubject'] = '[Contribució AMOS]  Revisió iniciada';
$string['err_exception'] = 'Error: {$a}';
$string['err_invalidlangcode'] = 'Codi d\'idioma invàlid';
$string['err_parser'] = 'Error d\'anàlisi sintàctic: {$a}';
$string['filtercmp'] = 'Components';
$string['filtercmp_desc'] = 'Mostra les cadenes d\'aquests components';
$string['filterlng'] = 'Idiomes';
$string['filterlng_desc'] = 'Visualitza les traduccions en aquestos idiomes';
$string['filtermis'] = 'Miscel·lània';
$string['filtermis_desc'] = 'Condicions addicionals de les cadenes per ser visualitzades';
$string['filtermisfglo'] = 'sols cadenes de la llista grisa';
$string['filtermisfhlp'] = 'sols cadenes d\'ajuda';
$string['filtermisfmis'] = 'sols cadenes perdudes o obsoletes';
$string['filtermisfstg'] = 'sols cadenes encuades';
$string['filtermisfwog'] = 'cadenes que no pertanyen a la llista grisa';
$string['filtersid'] = 'Identificador de cadena';
$string['filtersid_desc'] = 'La clau de la matriu de cadenes';
$string['filtertxt'] = 'Subcadena';
$string['filtertxtcasesensitive'] = 'distingeix majúscules de minúscules';
$string['filtertxt_desc'] = 'La cadena ha de contenir text';
$string['filtertxtregex'] = 'expressions regulars';
$string['filterver'] = 'Versions';
$string['filterver_desc'] = 'Visualitza les cadenes d\'aquesta versió de Moodle';
$string['found'] = 'Trobat: {$a->found}
   &nbsp;&nbsp;&nbsp; Perdut:
{$a->missing} ({$a->missingonpage})';
$string['foundinfo'] = 'Nombre de cadenes trobades';
$string['foundinfo_help'] = 'Visualitza el nombre total de files a la taula de traducció, el nombre de traduccions perdudes i el nombre de traduccions perdudes a la pàgina actual.';
$string['gotofirst'] = 'vés a la pàgina principal';
$string['gotoprevious'] = 'vés a la pàgina prèvia';
$string['greylisted'] = 'Cadenes de la llista grisa';
$string['greylisted_help'] = 'Per raons de compatibilitat, un paquet d\'idioma de Moodle pot tenir cadenes que ja no són utilitzades però que encara no han estat suprimides.
Aquestes cadenes pertanyen  a la \'llista gris\'. Quan s\'ha confirmat que una cadena de la llista gris no s\'utilitza, es suprimeix del paquet d\'idioma.

Si coneixeu una cadena de la llista gris que encara s\'utilitza en Moodle, informeu-nos al fòrum amb un missatge al curs de traducció de Moodle d\'aquest lloc.
D\'aquest forma, podeu estalviar temps traduint cadenes que són les més activament utilitzades en Moodle i ignorant les llistes grises.';
$string['greylistedwarning'] = 'la cadena és a la llista grisa';
$string['importfile'] = 'Importa cadenes traduïdes des d\'un fitxer';
$string['importfile_help'] = 'Si teniu cadenes traduïdes fora de línia, podeu enviar-les a la pila d\'aquesta forma.

*El fitxer ha de ser un fitxer de cadenes vàlid per Moodle en format PHP. Mireu al directori d\'instal·lació `/lang/en/` del vostre Moodle per exemple.
El nom del fitxer ha de coincidir amb el anglés amb les cadenes definides per al component (com `moodle.php`, `assignment.php` o `enrol_manual.php`).

Totes les cadenes trobades al fitxer es desaran a la pila de la mateixa versió i idioma.';
$string['language'] = 'Idioma';
$string['languages'] = 'Idiomes';
$string['log'] = 'Registre';
$string['logfilterbranch'] = 'Versions';
$string['logfiltercommithash'] = 'git hash';
$string['logfiltercommitmsg'] = 'Confirma missatge que conté';
$string['logfiltercommits'] = 'Confirma filtre';
$string['logfiltercommittedafter'] = 'Confirmat després';
$string['logfiltercommittedbefore'] = 'Confirmat abans';
$string['logfiltercomponent'] = 'Components';
$string['logfilterlang'] = 'Idiomes';
$string['logfiltershow'] = 'Visualitza el enviaments filtrats i les cadenes';
$string['logfiltersource'] = 'Font';
$string['logfiltersourceamos'] = 'amos (traducció basada en la web)';
$string['logfiltersourcecommitscript'] = 'commitscript  (AMOScript al missatge enviat)';
$string['logfiltersourcegit'] = 'git (mirall git del codi font de Moodle i paquets 1.x )';
$string['logfiltersourcerevclean'] = 'revclean (procés de neteja invers)';
$string['logfilterstringid'] = 'Identificador de cadena';
$string['logfilterstrings'] = 'Filtre de cadena';
$string['logfilterusergrp'] = 'Confirmació feta per';
$string['logfilterusergrpor'] = 'o';
$string['maintainers'] = 'Mantenidors';
$string['markuptodate'] = 'Marca la traducció com actualitzada';
$string['markuptodate_help'] = 'AMOS ha detectat que la cadena pot estar obsoleta ja que la versió anglesa ha sigut modificada després que hagi sigut traduïda. Reviseu la traducció. Si la trobeu actualitzada, premeu la casella de verificació. Editeu-la si és el cas.';
$string['merge'] = 'Combina';
$string['mergestrings'] = 'Combina cadenes des d\'una altra branca';
$string['mergestrings_help'] = 'Això seleccionarà i desarà a la pila totes les cadenes de la branca de la font que que no estan traduïdes a la branca actual i que són utilitzades aquí.
Podeu utilitzar aquesta eina per copiar una cadena traduïda en altres versions del paquet. Sols els mantenidors de l\'idioma poden utilitzar aquesta eina.';
$string['newlanguage'] = 'Nou idioma';
$string['nofiletoimport'] = 'Si us plau, us cal un fitxer per importar des d\'ell.';
$string['nologsfound'] = 'No s\'han trobat cadenes, si us plau modifiqueu els filtres.';
$string['nostringsfound'] = 'No s\'han trobat cadenes';
$string['nostringsfoundonpage'] = 'No s\'han trobat cadenes a la pàgina {$a}';
$string['nostringtoimport'] = 'No s\'ha trobat cap cadena vàlida al fitxer. Comproveu que el fitxer té el nom correcte i té el format adequat.';
$string['nothingtomerge'] = 'La branca de la font no conté noves cadenes que s\'hagin perdut a la branca. No hi ha res per combinar.';
$string['numofcommitsabovelimit'] = 'Trobades {$a->found} confirmacions concordants amb el filtre enviat. utilitzant el més recent {$a->limit}';
$string['numofcommitsunderlimit'] = 'Trobades {$a->found} confirmacions que concorden amb el filtre enviat';
$string['numofmatchingstrings'] = 'D\'elles, {$a->strings} modificades a les {$a->commits}  confirmacions que concorden amb el filtre de cadena.';
$string['outdatednotcommitted'] = 'Cadena obsoleta';
$string['outdatednotcommitted_help'] = 'AMOS ha detectat que la cadena pot estar obsoleta doncs la versió anglesa ha estat modificada després de la traducció d\'aquesta cadena. Si us plau reviseu la traducció.';
$string['outdatednotcommittedwarning'] = 'obsoleta';
$string['ownstashactions'] = 'Accions del magatzem persistent';
$string['ownstashactions_help'] = '* Aplica - Copia les cadenes traduïdes des del magatzem permanent a la pila i manté el magatzem permanent sense modificació. Si la cadena està realment a la pila, aquesta és sobreescriu amb les cadenes del magatzem permanent.
* Desempila - Mou les cadenes traduïdes des del magatzem permanent a la pila temporal i depura el magatzem permanent (això és equivalent a Aplica i Depura).
* Depura - Llança la cadenes desades al magatzem permanent.
* Envia - Obre un formulari per enviar la cadena permanent al mantenidor oficial del paquet de llengua per incloure\'l la vostra contribució al paquet de llengua oficial.';
$string['ownstashes'] = 'Les vostres cadenes desades al magatzem permanent';
$string['ownstashes_help'] = 'Aquesta és la llista de totes les cadenes que heu desat al magatzem permanent';
$string['ownstashesnone'] = 'No s\'han trobat cadenes pròpies desades al magatzem permanent';
$string['permalink'] = 'enllaç permenent';
$string['placeholder'] = 'Marcadors de posició';
$string['placeholder_help'] = 'Els marcadors de posició són estructures especials com `{$a}` o `{$a->something}` dins de la cadena. Son reemplaçats per un valor quan la cadena es mostra en pantalla.

Es important copiar-los exactament igual a com estan en la cadena original. No els traduïu i no canvieu la orientació esquerra a dreta.';
$string['placeholderwarning'] = 'cadena que conté un marcador de posició';
$string['pluginclasscore'] = 'Subsistema bàsic';
$string['pluginclassnonstandard'] = 'Connector no estàndard';
$string['pluginclassstandard'] = 'Connector estàndard';
$string['pluginname'] = 'AMOS';
$string['presetcommitmessage'] = 'Contribució a la traducció #{$a->id} per {$a->author}';
$string['privileges'] = 'Els vostres privilegis';
$string['privilegesnone'] = 'Sols teniu accés de lectura a la informació pública.';
$string['requestactions'] = 'Acció';
$string['requestactions_help'] = '*Aplica - Copia les cadenes traduïdes del formulari d\'entrada a la vostra pila de traducció. Si la cadena està realment a la pila, es sobreescriurà amb la cadena del magatzem permanent.
*Amaga - Bloca el formulari d\'entrada i no el mostra més.';
$string['sourceversion'] = 'Versió de la font';
$string['stage'] = 'Desa a la pila';
$string['stageactions'] = 'Accions a la pila';
$string['stageactions_help'] = '* Edita les cadenes de la pila - Modifica els paràmetres dels filtres de traducció ja que sols les traduccions de la pila es mostren.
* Poda les cadenes no confirmades - Treu de la pila totes les traduccions de les quals no teniu permís de confirmació. La pila es poda de forma automàtica abans de ser confirmada.
*Depura - Treu de la pila totes les traduccions que no modifiquen la traducció actual o que són més velles que la més recent traducció del repositori. La pila es depurada de forma automàtica abans de ser confirmada.
*Treu-ho tot de la pila - Neteja tota la pila, totes les traduccions de la pila es perdran.';
$string['stageedit'] = 'Edita les cadenes desades a la pila';
$string['stagelang'] = 'Llengua';
$string['stageoriginal'] = 'Original';
$string['stageprune'] = 'Poda les no confirmades';
$string['stagerebase'] = 'Depura';
$string['stagestring'] = 'Cadena';
$string['stagestringsnocommit'] = 'Hi ha {$a->staged} cadenes desades a la pila';
$string['stagestringsnone'] = 'No hi ha cadenes desades a la pila';
$string['stagestringssome'] = 'Hi ha {$a->staged} cadenes desades a la pila, {$a->committable} d\'elles poden ser confirmades';
$string['stagesubmit'] = 'Envia als mantenidors';
$string['stagetranslation'] = 'Traducció';
$string['stagetranslation_help'] = 'Visualitza la traducció de la pila que serà confirmada. El color de fons significa:

* Verd - heu modificat una cadena o afegit una traducció i teniu permís per confirmar la traducció.
* Blau - Heu modificat la traducció o afegit una traducció perduda però no teniu permís per confirmar-la a l\'idioma actual.
* Sense color - La traducció a la pila és la mateixa que l\'actual i no ha sigut confirmada.';
$string['stageunstageall'] = 'Treu-ho tot de la pila';
$string['stashactions'] = 'Accions del magatzem permannent';
$string['stashactions_help'] = 'El magatzem permanent és una captura de la pila actual. Les cadenes del magatzem permanent poden ser enviades al mantenidor oficial del paquet de l\'idioma per incloure-les al paquet de llengua.';
$string['stashapply'] = 'Aplica';
$string['stashautosave'] = 'Copia de seguretat desada de forma automàtica al magatzem permanent';
$string['stashautosave_help'] = 'Aquest magatzem permanent conté la captura més recent de la vostra pila de treball. Podeu utilitzar-la com una còpia de seguretat per als casos en que les cadenes es treuen de la pila per accident. Utilitzeu l\'acció \'Aplica\' per copiar totes les cadenes del magatzem permanent a la pila (sobreescriurà la cadena si ja estava a la pila).';
$string['stashcomponents'] = '<span>Components:</span> {$a}';
$string['stashdrop'] = 'Depura';
$string['stashes'] = 'Magatzem permanent';
$string['stashlanguages'] = '<span>Idiomes:</span> {$a}';
$string['stashpop'] = 'Desempila';
$string['stashpush'] = 'Mou totes les cadenes de la pila a un nou diposit al magatzem permanent';
$string['stashstrings'] = '<span>Nombre de cadenes:</span> {$a}';
$string['stashsubmit'] = 'Envia als mantenidors';
$string['stashsubmitdetails'] = 'Detalls de l\'enviament';
$string['stashsubmitmessage'] = 'Missatge';
$string['stashsubmitsubject'] = 'Assumpte';
$string['stashtitle'] = 'Títol del diposit desat al magatzem permanent';
$string['stashtitledefault'] = 'WIP - {$a->time}';
$string['stringhistory'] = 'Historial';
$string['strings'] = 'Cadenes';
$string['submitting'] = 'Envia una contribució';
$string['submitting_help'] = 'Això enviarà les cadenes traduïdes als mantenidors oficials del paquet de llengua. Es necessari per aplicar el vostre treball a la pila, revisar-lo i eventualment confirmar-lo. Si us plau envieu un missatge als mantenidors descrivint el vostre treball i per què voldríeu incloure la vostra contribució.';
$string['targetversion'] = 'Versió requerida';
$string['translatorlang'] = 'Llengua';
$string['translatorlang_help'] = 'Visualitza el codi de l\'idioma de la cadena a traduir. Premeu <strong>+-</strong> per visualitzar l\'historial de la cadena.';
$string['translatororiginal'] = 'Original';
$string['translatororiginal_help'] = 'Visualitza l\'anglés original de la cadena. A sota, podeu veure un enllaç per traduir la cadena de forma automàtica amb el traductor de Google (si el idioma està suportat i el vostre navegador té Javascript habilitat). També podeu trobar informació addicional afegida, com si les cadenes contenen marcadors de posició.';
$string['translatorstring'] = 'Cadena';
$string['translatorstring_help'] = 'Visualitza la branca de Moodle (versió), l\'identificador de cadena i el component al qual aquesta cadena pertany.';
$string['translatortool'] = 'Traductor';
$string['translatortranslation'] = 'Traducció';
$string['translatortranslation_help'] = 'Prem la caixa per enviar-la a l\'editor d\'entrada. Insereix la traducció i prem fora la caixa per desar a la pila la traducció. El color de fons de la caixa significa:

* Verd - La cadena ha estat realment traduïda i teniu permís per modificar la traducció i confirmar-la.
* Groc - La cadena es pot confirmar però està obsoleta. La cadena anglesa pot haver estat modificada després de la traducció feta.
* Vermell - La cadena no està traduïda i teniu permís per traduir-la i confirmar la traducció.
* Blau - Heu modificat la traducció i aquesta està de nou a la pila. No oblideu confirmar la traducció de la pila abans de sortir del sistema.
* Sense color - Encara que podeu desar a la pila la traducció, no teniu permís per confirmar aquests idiomes. Teniu permís per exportar la pila a un fitxer.';
$string['typecontrib'] = 'Connectors no estàndard';
$string['typecore'] = 'Subsistema bàsic';
$string['typestandard'] = 'Connectors estàndard';
$string['version'] = 'Versió';
