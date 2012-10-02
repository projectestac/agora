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
 * Strings for component 'glossary', language 'ca', branch 'MOODLE_23_STABLE'
 *
 * @package   glossary
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addcomment'] = 'Afegeix un comentari';
$string['addentry'] = 'Afegeix una entrada';
$string['addingcomment'] = 'S\'està afegint un comentari';
$string['alias'] = 'paraula clau';
$string['aliases'] = 'Paraula o paraules clau';
$string['aliases_help'] = '<p>Cada entrada del glossari pot tenir associada una llista de paraules clau (o àlies).</p>

<p><b>Introduïu cada àlies en una nova línia</b> (no separades per comes).</p>

<p>Les paraules i frases que fan d\'àlies poden utilitzar-se com a maneres alternatives de referir-se a l\'entrada. Per exemple, si esteu emprant el filtre d\'enllaços automàtics al glossari, els àlies s\'utilitzaran també (així com el nom principal de l\'entrada) per decidir quines paraules s\'enllacen a aquesta entrada.</p>';
$string['allcategories'] = 'Totes les categories';
$string['allentries'] = 'TOTES';
$string['allowcomments'] = 'Permeteu comentaris en les entrades?';
$string['allowcomments_help'] = '<p>Es pot permetre que l\'estudiantat afegeixi comentaris a les entrades del glossari.</p>

<p>Podeu triar si aquesta característica s\'habilita o no.</p>

<p>El professorat sempre pot afegir comentaris a les entrades d\'un glossari.</p>';
$string['allowduplicatedentries'] = 'Permeteu entrades duplicades?';
$string['allowduplicatedentries_help'] = '<p>Si activeu aquesta opció, diferents entrades poden utilitzar el mateix nom de concepte.</p>';
$string['allowprintview'] = 'Permeteu visualització per a imprimir?';
$string['allowprintview_help'] = '<p>Es pot permetre que l\'estudiantat utilitzi la visualització per a imprimir del glossari.</p>

<p>Podeu triar si aquesta característica s\'habilita o no.</p>

<p>El professorat sempre pot utilitzar la visualització per a imprimir.</p';
$string['andmorenewentries'] = 'i més de {$a} noves entrades.';
$string['answer'] = 'Resposta';
$string['approvaldisplayformat'] = 'Format de visualització d\'aprovació';
$string['approvaldisplayformat_help'] = 'Quan aproveu elements del glossari pot ser que vulgueu utilitzar un format de visualització diferent';
$string['approve'] = 'D\'acord';
$string['areaattachment'] = 'Fitxers adjunts';
$string['areaentry'] = 'Definicions';
$string['areyousuredelete'] = 'Segur que voleu suprimir aquesta entrada?';
$string['areyousuredeletecomment'] = 'Segur que voleu suprimir aquest comentari?';
$string['areyousureexport'] = 'Segur que voleu exportar aquesta entrada a';
$string['ascending'] = 'ascendent';
$string['attachment'] = 'Fitxer adjunt';
$string['attachment_help'] = '<p>Opcionalment, podeu adjuntar UN fitxer des del vostre ordinador a qualsevol entrada de glossari. Aquest fitxer es penja en el servidor i s\'emmagatzema amb l\'entrada.</p>

<p>Això és útil si voleu compartir una imatge, per exemple, o un document PDF.</p>

<p>El fitxer pot ser de qualsevol tipus, però en tot cas s\'aconsella que els noms d\'aquests fitxers incloguin els sufixos estàndard de tres lletres emprats en Internet, com ara .pdf per a un document PDF, .jpg o .png per a una imatge, etc. Això facilitarà que els fitxers es baixin i es vegin correctament en els navegadors.</p>

<p>Si torneu a editar una entrada i adjunteu un nou fitxer, qualsevol fitxer adjunt anterior serà reemplaçat.</p>

<p>Si torneu a editar una entrada amb un fitxer adjunt i deixeu aquest espai en blanc, es conservarà l\'adjunt original.</p>';
$string['author'] = 'autor/a';
$string['authorview'] = 'Ordenat per autor';
$string['back'] = 'Enrere';
$string['cantinsertcat'] = 'No s\'ha pogut inserir la categoria';
$string['cantinsertrec'] = 'No s\'ha pogut inserir el registre';
$string['cantinsertrel'] = 'No s\'ha pogut inserir la relació categoria-entrada';
$string['casesensitive'] = 'Distingeix majúscules i minúscules';
$string['casesensitive_help'] = '<p>Aquest paràmetre especifica si cal que coincideixin exactament majúscules i minúscules quan es creen enllaços automàtics a aquestes entrades.</p>

<p>Per exemple, si s\'activa, un mot com &quot;html&quot; en un missatge d\'un fòrum NO s\'enllaçarà a una entrada de glossari anomenada &quot;HTML&quot;.</p>';
$string['cat'] = 'cat';
$string['categories'] = 'Categories';
$string['category'] = 'Categoria';
$string['categorydeleted'] = 'La categoria s\'ha suprimit';
$string['categoryview'] = 'Navega per categories';
$string['changeto'] = 'canvia a {$a}';
$string['cnfallowcomments'] = 'Definiu si els glossaris acceptaran comentaris en les entrades per defecte';
$string['cnfallowdupentries'] = 'Definiu si els glossaris permetran entrades duplicades per defecte';
$string['cnfapprovalstatus'] = 'Definiu si les entrades enviades pels estudiants quedaran aprovades per defecte';
$string['cnfcasesensitive'] = 'Definiu si per establir un enllaç automàtic es distingeixen per defecte majúscules i minúscules';
$string['cnfdefaulthook'] = 'Seleccioneu la selecció que es mostra per defecte quan el glossari és vist per primera vegada';
$string['cnfdefaultmode'] = 'Seleccioneu el marc que es mostra per defecte quan el glossari és vist per primera vegada.';
$string['cnffullmatch'] = 'Definiu si per establir un enllaç automàtic ha de coincidir  per defecte la paraula completa';
$string['cnflinkentry'] = 'Definiu si les entrades s\'han d\'enllaçar automàticament per defecte';
$string['cnflinkglossaries'] = 'Definiu si els glossaris s\'han d\'enllaçar automàticament per defecte';
$string['cnfrelatedview'] = 'Seleccioneu el format de visualització dels enllaços automàtics i de les entrades.';
$string['cnfshowgroup'] = 'Especifiqueu si el canvi de grup s\'ha de mostrar o no.';
$string['cnfsortkey'] = 'Seleccioneu el criteri d\'ordenació per defecte.';
$string['cnfsortorder'] = 'Selecciona el sentit d\'ordenació per defecte.';
$string['cnfstudentcanpost'] = 'Definiu si els estudiants poden enviar entrades per defecte o no.';
$string['comment'] = 'Comentari';
$string['commentdeleted'] = 'S\'ha suprimit el comentari.';
$string['comments'] = 'Comentaris';
$string['commentson'] = 'Comentaris actius';
$string['commentupdated'] = 'S\'ha actualitzat el comentari';
$string['completionentries'] = 'Cal que els alumnes creïn entrades:';
$string['completionentriesgroup'] = 'Entrades requerides';
$string['concept'] = 'Concepte';
$string['concepts'] = 'Conceptes';
$string['configenablerssfeeds'] = 'Aquest commutador habilita la possibilitat de tenir RSS en tots els glossaris. Haureu d\'activar manualment l\'RSS en els paràmetres de cada glossari.';
$string['current'] = 'Ordenació actual {$a}';
$string['currentglossary'] = 'Glossari actual';
$string['date'] = 'data';
$string['dateview'] = 'Navega per data';
$string['defaultapproval'] = 'Estat d\'aprovació per defecte';
$string['defaultapproval_help'] = '<p>Aquest paràmetre permet que el professorat defineixi què passa amb les noves entrades afegides per l\'estudiantat: es poden fer disponibles automàticament a tothom, o també es pot fer que el professor les hagi d\'aprovar una per una.</p>';
$string['defaulthook'] = 'Enganxament per defecte';
$string['defaultmode'] = 'Mode per defecte';
$string['defaultsortkey'] = 'Clau d\'ordenació per defecte';
$string['defaultsortorder'] = 'Ordenació per defecte';
$string['definition'] = 'Definició';
$string['definitions'] = 'Definicions';
$string['deleteentry'] = 'Suprimeix entrada';
$string['deletenotenrolled'] = 'Suprimeix les entrades d\'usuaris no inscrits';
$string['deletingcomment'] = 'S\'està suprimint un comentari';
$string['deletingnoneemptycategory'] = 'Suprimir aquesta categoria no suprimirà les entrades que conté: simplement aquestes es marcaran com a no categoritzades.';
$string['descending'] = 'descendent';
$string['destination'] = 'Destinació de les entrades importades';
$string['destination_help'] = '<p>Podeu especificar on voleu importar les entrades:</p>

<ul>
	<li><b>Glossari actual:</b> les entrades importades s\'afegiran al glossari obert actualment.</li>
	<li><b>Nou glossari:</b> es crearà un glossari nou basat en la informació que es trobi en el fitxer i les noves entrades s\'hi inseriran.</li>
</ul';
$string['displayformat'] = 'Format de visualització';
$string['displayformatcontinuous'] = 'Continu sense autor';
$string['displayformatdefault'] = 'Per defecte el mateix que el format de visualització';
$string['displayformatdictionary'] = 'Simple, tipus diccionari';
$string['displayformatencyclopedia'] = 'Enciclopèdia';
$string['displayformatentrylist'] = 'Llista d\'entrades';
$string['displayformatfaq'] = 'PMF (FAQ)';
$string['displayformatfullwithauthor'] = 'Complet amb autor';
$string['displayformatfullwithoutauthor'] = 'Complet sense autor';
$string['displayformat_help'] = '<p>Hi ha 7 formats que són:</p>

<blockquote>
<dl>
<dt><b>Diccionari simple</b>:</dt>
<dd>Sembla un diccionari convencional amb entrades separades. No es visualitzen els autors i els fitxers adjunts apareixen com a enllaços.</dd>

<dt><b>Continu sense autor</b>:</dt>
<dd>Les entrades es mostren una rere l\'altra sense cap separació llevat de les icones d\'edició</dd>

<dt><b>Complet amb autor</b>:</dt>
<dd>Un format de visualització estil fòrum amb les dades de l\'autor. Els fitxers adjunts es mostren com a enllaços.</dd>

<dt><b>Complet sense autor</b>:</dt>
<dd>Un format de visualització estil fòrum, sense dades de l\'autor. Els fitxers adjunts es mostren com a enllaços.</dd>

<dt><b>Enciclopèdia</b>:</dt>
<dd>Com el \'Complet amb autor\' però les imatges adjuntes es visualitzen dins de l\'entrada.</dd>

<dt><b>Llista d\'entrades</b>:</dt>
<dd>Els conceptes estan llistats amb enllaços</dd>

<dt><b>PMF</b>:</dt>
<dd>Les paraules PREGUNTA i RESPOSTA encapçalen el concepte i la definició respectivament.</dd>

</dl>
</blockquote>';
$string['displayformats'] = 'Formats de visualització';
$string['displayformatssetup'] = 'Configuració dels formats de visualització';
$string['duplicatecategory'] = 'Categoria duplicada';
$string['duplicateentry'] = 'Entrada duplicada';
$string['editalways'] = 'Edita sempre';
$string['editalways_help'] = '<p>Aquesta opció us permet decidir si els estudiants poden editar les seves entrades en qualsevol moment.</p>

<p>Podeu seleccionar:</p>

<ul>
<li><b>Sí:</b> les entrades es poden editar sempre.</li>
<li><b>No:</b> les entrades es poden editar durant un temps configurable.</li>
</ul>';
$string['editcategories'] = 'Edita categories';
$string['editentry'] = 'Edita entrada';
$string['editingcomment'] = 'S\'està editant un comentari';
$string['entbypage'] = 'Nombre d\'entrades per pàgina';
$string['entries'] = 'Entrades';
$string['entrieswithoutcategory'] = 'Entrades sense categoritzar';
$string['entry'] = 'Entrada';
$string['entryalreadyexist'] = 'L\'entrada ja existeix';
$string['entryapproved'] = 'S\'ha aprovat aquesta entrada';
$string['entrydeleted'] = 'S\'ha suprimit l\'entrada';
$string['entryexported'] = 'L\'entrada s\'ha exportat amb èxit';
$string['entryishidden'] = '(aquesta entrada actualment està oculta)';
$string['entryleveldefaultsettings'] = 'Paràmetres per defecte al nivell d\'entrada';
$string['entrysaved'] = 'S\'ha desat aquesta entrada';
$string['entryupdated'] = 'S\'ha actualitzat aquesta entrada';
$string['entryusedynalink'] = 'Aquesta entrada s\'ha d\'enllaçar automàticament';
$string['entryusedynalink_help'] = '<p>Activar aquesta característica fa que es creïn automàticament enllaços a aquesta entrada sempre que apareguin les paraules o les frases dels concepte en qualsevol part del mateix curs. Aix&ograve; inclou els missatges dels fòrums, recursos interns, resums de setmanes o temes, etc.</p>

<p>Si no voleu que s\'enllaci cert text (p. ex. en un missatge d\'un fòrum), podeu afegir les etiquetes &lt;nolink&gt; i &lt;/nolink&gt; al voltant d\'aquest text.</p>

<p>Per poder activar aquesta característica, els enllaços automàtics han d\'estar habilitats en el glossari.</p>';
$string['errcannoteditothers'] = 'No podeu editar les entrades d\'altres persones.';
$string['errconceptalreadyexists'] = 'El concepte ja existeix. Aquest glossari no permet entrades duplicades.';
$string['errdeltimeexpired'] = 'No podeu esborrar això. El temps ha expirat.';
$string['erredittimeexpired'] = 'El temps d\'edició d\'aquesta entrada ha vençut.';
$string['errorparsingxml'] = 'S\'han produït errors en analitzar el fitxer. Assegureu-vos que és XML vàlid.';
$string['explainaddentry'] = 'Afegiu una nova entrada al glossari actual.<br />El concepte i la definició són camps obligatoris.';
$string['explainall'] = 'Visualitzeu TOTES les entrades en una pàgina';
$string['explainalphabet'] = 'Navegueu pel glossari utilitzant aquest índex';
$string['explainexport'] = 'S\'ha creat un fitxer.<br/ >Baixeu-lo i deseu-lo en lloc segur. Podeu importar-lo en qualsevol moment en aquest curs o en un altre.';
$string['explainimport'] = 'Heu d\'especificar el fitxer que voleu importar i definir els criteris del procés.<p>Trameteu la vostra sol·licitud i reviseu els resultats.';
$string['explainspecial'] = 'Visualitzeu totes les entrades que no comencen per una lletra';
$string['exportedentry'] = 'Entrada exportada';
$string['exportentries'] = 'Exporta entrades';
$string['exportentriestoxml'] = 'Exporta entrades a un fitxer XML';
$string['exportfile'] = 'Exporta entrades a un fitxer';
$string['exportglossary'] = 'Glossari exportat';
$string['exporttomainglossary'] = 'Exporta al glossari principal';
$string['filetoimport'] = 'Fitxer per importar';
$string['filetoimport_help'] = '<p>Seleccioneu el fitxer XML del vostre ordinador que conté les entrades per a importar.</p>';
$string['fillfields'] = 'El concepte i la definició són camps obligatoris.';
$string['filtername'] = 'Enllaços automàtics a glossaris';
$string['fullmatch'] = 'Enllaça només paraules completes';
$string['fullmatch_help'] = '<p>Si s\'han habilitat els enllaços automàtics, activant aquest paràmetre imposareu que només s\'enllacin paraules completes.</p>

<p>Per exemple, una entrada del glossari anomenada "pedagog" no crearà un enllaç des de "pedagogia".</p>';
$string['glossary:addinstance'] = 'Afegeix un glossari nou';
$string['glossary:approve'] = 'Aprovar entrades pendents';
$string['glossary:comment'] = 'Crear comentaris';
$string['glossary:export'] = 'Exportar entrades';
$string['glossary:exportentry'] = 'Exporta entrada senzilla';
$string['glossary:exportownentry'] = 'Exporteu la entrada senzilla vostra';
$string['glossary:import'] = 'Importar entrades';
$string['glossaryleveldefaultsettings'] = 'Paràmetres per defecte al nivell de glossari';
$string['glossary:managecategories'] = 'Gestionar categories';
$string['glossary:managecomments'] = 'Gestionar comentaris';
$string['glossary:manageentries'] = 'Gestionar entrades';
$string['glossary:rate'] = 'Valorar entrades';
$string['glossarytype'] = 'Tipus de glossari';
$string['glossarytype_help'] = '<p>El sistema de glossaris permet exportar entrades dels glossaris secundaris al glossari principal del curs.</p>

<p>Per a fer això, heu d\'especificar quin és el glossari principal. </p>

<p>Avís: només pot haver-hi un glossari principal per curs i només el professorat pot actualitzar-lo.</p>';
$string['glossary:view'] = 'Veure glossari';
$string['glossary:viewallratings'] = 'Visualitzar totes les valoracions fetes individualment';
$string['glossary:viewanyrating'] = 'Visualitzar les valoracions totals que tothom ha rebut';
$string['glossary:viewrating'] = 'Visualitzar les valoracions totals que he rebut';
$string['glossary:write'] = 'Crear entrades noves';
$string['guestnoedit'] = 'Els convidats no tenen permís per editar glossaris';
$string['importcategories'] = 'Importa categories';
$string['importedcategories'] = 'Categories importades';
$string['importedentries'] = 'Entrades importades';
$string['importentries'] = 'Importa entrades';
$string['importentriesfromxml'] = 'Importa entrades d\'un fitxer XML';
$string['includegroupbreaks'] = 'Inclou marcador de grup';
$string['isglobal'] = 'Aquest glossari és global?';
$string['isglobal_help'] = 'Les entrades d\'un glossari global s\'enllacen des de tot el lloc, no sols des del curs al qual pertany el glossari. Només els administradors poden fer que un glossari sigui global.';
$string['letter'] = 'lletra';
$string['linkcategory'] = 'Enllaça automàticament aquesta categoria';
$string['linkcategory_help'] = '<p>Podeu especificar si voleu que les categories s\'enllacin automàticament o no.</p>

<p>Avís: les categories s\'enllacen diferenciant majúscules i minúscules i només si coincideix la paraula completa.</p>';
$string['linking'] = 'Enllaços automàtics';
$string['mainglossary'] = 'Glossari principal';
$string['maxtimehaspassed'] = 'El temps màxim per editar aquest comentari ({$a}) ja ha passat!';
$string['modulename'] = 'Glossari';
$string['modulename_help'] = 'L\'activitat glossari permet als participants crear i mantindre una llista de definicions, com un diccionari, o recollir i organitzar recursos o informació.

El professorat pot permetre adjuntar fitxers a les entrades del glossari. Les imatges adjuntes es visualitzen directament en la entrada. Les entrades es poden cercar o navegar alfabèticament o per categoria, data o autoria. Les entrades es poden aprovar per defecte o requerir una aprovació del professorat abans que siguin visibles per a tothom.

Si el filtre d\'enllaç automàtic al glossari està activat, les entrades del glossari s\'enllaçaran automàticament quan les paraules o frases del concepte apareguin en el curs.

El professorat pot permetre comentaris en les entrades. Tant el professorat com l\'estudiantat (avaluació d\'iguals) poden qualificar les entrades. Les qualificacions es poden agregar per a formar la qualificació final que queda registrada en el butlletí de qualificacions.

Els glossaris poden tenir diversos usos, com ara

* Un banc col·laboratiu de termes clau
* Un espai \'coneixent-te\' on l\'estudiantat nou afegeix el seu nom i dades personals
* Un recurs de \'consells pràctics\' de les millors pràctiques d\'una assignatura
* Una zona per compartir fitxers de vídeo, imatge i àudio útils.
* Un recurs de revisió de fets a recordar';
$string['modulenameplural'] = 'Glossaris';
$string['newentries'] = 'Entrades noves del glossari';
$string['newglossary'] = 'Nou glossari';
$string['newglossarycreated'] = 'S\'ha creat un nou glossari.';
$string['newglossaryentries'] = 'Noves entrades del glossari:';
$string['nocomment'] = 'No s\'ha trobat cap comentari';
$string['nocomments'] = '(No s\'han trobat comentaris referents a aquesta entrada)';
$string['noconceptfound'] = 'No s\'ha trobat cap concepte ni definició.';
$string['noentries'] = 'No s\'han trobat entrades en aquesta secció';
$string['noentry'] = 'No s\'ha trobat cap entrada.';
$string['notapproved'] = 'L\'entrada al glossari no està aprovada encara.';
$string['notcategorised'] = 'No categoritzat';
$string['numberofentries'] = 'Nombre d\'entrades';
$string['onebyline'] = '(una per línia)';
$string['page-mod-glossary-edit'] = 'Afegeix  glossari / edita pàgina d\'entrada';
$string['page-mod-glossary-view'] = 'Mostra la pàgina d\'edició del glossari';
$string['page-mod-glossary-x'] = 'Qualsevol pàgina del modul glossari';
$string['pluginadministration'] = 'Gestió del glossari';
$string['pluginname'] = 'Glossari';
$string['popupformat'] = 'Format emergent';
$string['printerfriendly'] = 'Versió per imprimir';
$string['printviewnotallowed'] = 'La visualització per a impressora no està autoritzada';
$string['question'] = 'Qüestió';
$string['rejectedentries'] = 'Entrades rebutjades';
$string['rejectionrpt'] = 'Informe de rebuigs';
$string['resetglossaries'] = 'Suprimeix entrades de';
$string['resetglossariesall'] = 'Suprimeix entrades de tots els glossaris';
$string['rssarticles'] = 'Nombre d\'articles RSS recents';
$string['rssarticles_help'] = '<p>Aquesta opció us permet seleccionar el nombre d\'articles que s\'inclouran en l\'alimentació RSS.</p>

<p>Un nombre entre 5 i 20 seria normal en la majoria de glossaris. Augmenteu el nombre si el glossari s\'actualitza molt sovint.</p>';
$string['rsssubscriberss'] = 'Visualitza l\'RSS \'{$a}\'';
$string['rsstype'] = 'Canal RSS d\'aquesta activitat';
$string['rsstype_help'] = '<p>Aquesta opció us permet habilitar alimentacions RSS d\'aquest glossari.</p>

<p>Podeu triar dos tipus d\'alimentacions:</p>

<ul>
<li><b>Amb autor:</b> les alimentacions generades inclouran el nom de l\'autor de cada article.</li>
<li><b>Sense autor:</b> les alimentacions generades no inclouran el nom de l\'autor de cada article.</li>
</ul>';
$string['searchindefinition'] = 'Cerca en tot el text';
$string['secondaryglossary'] = 'Glossari secundari';
$string['showall'] = 'Mostra l\'enllaç \'Tot\'';
$string['showall_help'] = '<p>Podeu personalitzar l\'estil de navegació d\'un glossari. Sempre es pot navegar i cercar, però podeu definir tres opcions més:</p>

<p><b>MOSTRA ESPECIAL</b> Habilita o inhabilita la navegació de caràcters especials com ara @, #, etc.</p>

<p><b>MOSTRA ALFABET</b> Habilita o inhabilita la navegació per les lletres de l\'alfabet.</p>

<p><b>MOSTRA TOT</b> Habilita o inhabilita la navegació de totes les entrades a l\'hora.</p>';
$string['showalphabet'] = 'Mostra l\'alfabet';
$string['showalphabet_help'] = '<p>Podeu personalitzar l\'estil de navegació d\'un glossari. Sempre es pot navegar i cercar, però podeu definir tres opcions més:</p>

<p><b>MOSTRA ESPECIAL</b> Habilita o inhabilita la navegació de caràcters especials com ara @, #, etc.</p>

<p><b>MOSTRA ALFABET</b> Habilita o inhabilita la navegació per les lletres de l\'alfabet.</p>

<p><b>MOSTRA TOT</b> Habilita o inhabilita la navegació de totes les entrades a l\'hora.</p>';
$string['showspecial'] = 'Mostra l\'enllaç \'Especial\'';
$string['showspecial_help'] = '<p>Podeu personalitzar l\'estil de navegació d\'un glossari. Sempre es pot navegar i cercar, però podeu definir tres opcions més:</p>

<p><b>MOSTRA ESPECIAL</b> Habilita o inhabilita la navegació de caràcters especials com ara @, #, etc.</p>

<p><b>MOSTRA ALFABET</b> Habilita o inhabilita la navegació per les lletres de l\'alfabet.</p>

<p><b>MOSTRA TOT</b> Habilita o inhabilita la navegació de totes les entrades a l\'hora.</p>';
$string['sortby'] = 'Ordena per';
$string['sortbycreation'] = 'Per data de creació';
$string['sortbylastupdate'] = 'Per l\'última actualització';
$string['sortchronogically'] = 'Ordena cronològicament';
$string['special'] = 'Especial';
$string['standardview'] = 'Navega alfabèticament';
$string['studentcanpost'] = 'Els estudiants poden afegir entrades';
$string['totalentries'] = 'Total d\'entrades';
$string['usedynalink'] = 'Enllaça automàticament les entrades del glossari';
$string['usedynalink_help'] = '<p>Activar aquesta característica permet que es creïn enllaços automàtics a les entrades del glossari sempre que apareguin les paraules o frases del concepte en qualsevol part del mateix curs: en els missatges dels fòrums, en recursos interns, en els resums de les setmanes o temes, etc.</p>

<p>Teniu en compte que habilitar els enllaços al glossari no activa automàticament els enllaços a cada entrada, sinó que cal habilitar els enllaços en cada entrada.</p>

<p>Si no voleu que s\'enllaci cert text (p. ex. en un missatge d\'un fòrum), podeu afegir les etiquetes &lt;nolink&gt; i &lt;/nolink&gt; al voltant d\'aquest text.</p>

<p>Teniu en compte que els noms de les categories també s\'enllacen.</p>';
$string['waitingapproval'] = 'Esperant aprovació';
$string['warningstudentcapost'] = '(Aplicable només en cas que no sigui el glossari principal)';
$string['withauthor'] = 'Conceptes amb autor';
$string['withoutauthor'] = 'Conceptes sense autor';
$string['writtenby'] = 'Escrit per';
$string['youarenottheauthor'] = 'No sou l\'autor d\'aquest comentari, de manera que no podeu editar-lo.';
