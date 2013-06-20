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
 * Strings for component 'data', language 'ca', branch 'MOODLE_24_STABLE'
 *
 * @package   data
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['action'] = 'Acció';
$string['add'] = 'Afegeix una entrada';
$string['addcomment'] = 'Afegeix un comentari';
$string['addentries'] = 'Afegeix entrades';
$string['addtemplate'] = 'Plantilla d\'introducció';
$string['advancedsearch'] = 'Cerca avançada';
$string['alttext'] = 'Text alternatiu';
$string['approve'] = 'Aprova';
$string['approved'] = 'Acceptat';
$string['areacontent'] = 'Camps';
$string['ascending'] = 'Ascendent';
$string['asearchtemplate'] = 'Plantilla de cerca avançada';
$string['atmaxentry'] = 'Heu introduït el nombre màxim d\'entrades permès';
$string['authorfirstname'] = 'Nom de l\'autor/autora';
$string['authorlastname'] = 'Cognoms de l\'autor/autora';
$string['autogenallforms'] = 'Genera totes les plantilles per defecte';
$string['autolinkurl'] = 'Enllaça l\'URL automàticament';
$string['availablefromdate'] = 'Disponible des de';
$string['availabletags'] = 'Etiquetes disponibles';
$string['availabletags_help'] = 'Les etiquetes són marcadors de posició a la plantilla, que seran substituïts per les dades o altres elements, com ara una icona d\'edició, quan les entrades siguin editades o visualitzades.

Els camps tenen el format [[fieldname]]. Totes les altres etiquetes tenen el format ##sometag ##.

Només les etiquetes que es troben a la llista "Etiquetes disponibles" poden ser utilitzades en aquesta plantilla.';
$string['availabletodate'] = 'Disponible fins a';
$string['blank'] = 'Blanc';
$string['buttons'] = 'Accions';
$string['bynameondate'] = 'per {$a->name} - {$a->date}';
$string['cancel'] = 'Cancel·la';
$string['cannotaccesspresentsother'] = 'No us està permès d\'accedir als valors predefinits d\'altres usuaris';
$string['cannotadd'] = 'No es poden afegir entrades!';
$string['cannotdeletepreset'] = 'Error en esborrar un valor predifinit!';
$string['cannotoverwritepreset'] = 'Hi ha hagut un error en sobreescriure els valors predefinits';
$string['cannotunziptopreset'] = 'No es pot descomprimir el directori predefinit';
$string['checkbox'] = 'Casella de selecció';
$string['chooseexportfields'] = 'Marqueu els camps que voleu exportar:';
$string['chooseexportformat'] = 'Marqueu el format al qual voleu exportar:';
$string['chooseorupload'] = 'Tria un fitxer';
$string['columns'] = 'columnes';
$string['comment'] = 'Comentari';
$string['commentdeleted'] = 'S\'ha suprimit el comentari.';
$string['commentempty'] = 'El comentari és buit';
$string['comments'] = 'Comentaris';
$string['commentsaved'] = 'S\'ha desat el comentari';
$string['commentsn'] = '{$a} comentari(s)';
$string['commentsoff'] = 'No està habilitada la funció de comentaris';
$string['configenablerssfeeds'] = 'Aquest commutador habilita la possibilitat de canals RSS de les bases de dades. Però cal activar manualment els canals en els paràmetres de cada base de dades.';
$string['confirmdeletefield'] = 'Segur que voleu suprimir aquest camp?';
$string['confirmdeleterecord'] = 'Segur que voleu suprimir aquesta entrada?';
$string['csstemplate'] = 'Plantilla CSS';
$string['csvfailed'] = 'No es poden llegir les dades del fitxer CSV';
$string['csvfile'] = 'Fitxer CSV:';
$string['csvimport'] = 'Importació d\'un fitxer CSV';
$string['csvimport_help'] = '<p align="center"><strong>Importació d\'un fitxer CSV</strong></p>

<p>CSV significa <em>Comma-Separated-Values</em> (valors separats per comes) i és un format habitual d\'intercanvi de dades.</p>

<p>El format CSV consisteix en un fitxer de text amb una llista de noms de camps en el primer registre. Tot seguit hi ha les dades, amb un registre per línia.</p>

<p>Per defecte, el delimitador de camp és una coma, i no s\'utilitza cap caràcter de tancament per envoltar el contingut de cada camp.</p>

<p>Els registres es delimiten amb salts de línia (com els que es generen habitualment en l\'editor de text mitjançant la tecla de retorn). Es poden especificar les tabulacions amb t i els salts de línia amb n. </p>

<p>Fitxer de mostra:

<pre>
  nom,alt,pes
  Jaume,175cm,80kg
  Jordi,170cm,75kg
  Maria,172cm,70kg
</pre>
</p>

<p>Avís: potser no es podran importar tots els tipus de camps.</p>';
$string['csvwithselecteddelimiter'] = 'Delimitador de text <acronym title="Comma Separated Values">CSV</acronym>:';
$string['data:addinstance'] = 'Afegeix una nova base de dades';
$string['data:approve'] = 'Aprovar entrades pendents';
$string['data:comment'] = 'Escriure comentaris';
$string['data:exportallentries'] = 'Exporta totes les entrades de la base de dades';
$string['data:exportentry'] = 'Exporta una entrada de la base de dades';
$string['data:exportownentry'] = 'Exporta l\'entrada de la base de dades pròpia';
$string['data:exportuserinfo'] = 'Exporta la informació de l\'usuari';
$string['data:managecomments'] = 'Gestionar comentaris';
$string['data:manageentries'] = 'Gestionar entrades';
$string['data:managetemplates'] = 'Gestionar plantilles';
$string['data:manageuserpresets'] = 'Gestionar totes les plantilles predefinides';
$string['data:rate'] = 'Valorar les entrades';
$string['data:readentry'] = 'Llegir les entrades';
$string['data:viewallratings'] = 'Visualitzar totes les valoracions fetes individualment';
$string['data:viewalluserpresets'] = 'Veure predefinits de tots els usuaris';
$string['data:viewanyrating'] = 'Visualitzar les valoracions total rebudes per tothom';
$string['data:viewentry'] = 'Veure entrades';
$string['data:viewrating'] = 'Visualitzar la valoració total rebuda per l\'usuari';
$string['data:writeentry'] = 'Escriure entrades';
$string['date'] = 'Data';
$string['dateentered'] = 'Data d\'introducció';
$string['defaultfielddelimiter'] = '(per defecte és una coma)';
$string['defaultfieldenclosure'] = '(per defecte no s\'utilitza)';
$string['defaultsortfield'] = 'Camp d\'ordenació per defecte';
$string['delete'] = 'Suprimeix';
$string['deleteallentries'] = 'Suprimeix totes les entrades';
$string['deletecomment'] = 'Segur que voleu suprimir aquest comentari?';
$string['deleted'] = 'suprimit';
$string['deletefield'] = 'Suprimeix un camp existent';
$string['deletenotenrolled'] = 'Suprimeix les entrades d\'usuaris no inscrits';
$string['deletewarning'] = 'Segur que voleu suprimir aquest predefinit?';
$string['descending'] = 'Descendent';
$string['directorynotapreset'] = '{$a->directory} No és un predefinit: falten fitxers: {$a->missing_files}';
$string['download'] = 'Baixa';
$string['edit'] = 'Edita';
$string['editcomment'] = 'Edita comentari';
$string['editentry'] = 'Edita entrada';
$string['editordisable'] = 'Inhabilita l\'editor';
$string['editorenable'] = 'Habilita l\'editor';
$string['emptyadd'] = 'La plantilla d\'afegir dades és buida. S\'està generant un formulari per defecte...';
$string['emptyaddform'] = 'No heu emplenat cap camp';
$string['entries'] = 'Entrades';
$string['entrieslefttoadd'] = 'Heu d\'afegir {$a->entriesleft} una entrada o més per completar aquesta activitat';
$string['entrieslefttoaddtoview'] = 'Heu d\'afegir {$a->entrieslefttoview} una entrada o més abans que pugueu veure les entrades d\'altres participants';
$string['entry'] = 'Entrada';
$string['entrysaved'] = 'S\'ha desat la vostra entrada';
$string['errormustbeteacher'] = 'Per a utilitzar aquesta pàgina heu de ser professor/a';
$string['errorpresetexists'] = 'Ja existeix un valor predefinit amb el nom que heu seleccionat';
$string['example'] = 'Exemple del mòdul de bases de dades';
$string['excel'] = 'Excel';
$string['expired'] = 'Ho sento, aquesta activitat tenia termini a {$a} i no es troba disponible';
$string['export'] = 'Exporta';
$string['exportaszip'] = 'Exporta com a zip';
$string['exportaszip_help'] = 'La capacitat d\'exportar a fitxer comprimit zip us permet plantilles i camps com a fitxer zip. El comprimit es pot importar més endavant en un altre curs.';
$string['exportedtozip'] = 'S\'ha exportat a un zip temporal...';
$string['exportentries'] = 'Exporta entrades';
$string['exportownentries'] = 'Exporta només les entrades pròpies?';
$string['failedpresetdelete'] = 'S\'ha produït un error en suprimir el predefinit';
$string['fieldadded'] = 'S\'ha afegit el camp';
$string['fieldallowautolink'] = 'Permet enllaços automàtics';
$string['fielddeleted'] = 'S\'ha suprimit el camp';
$string['fielddelimiter'] = 'Delimitador de camps:';
$string['fielddescription'] = 'Descripció del camp';
$string['fieldenclosure'] = 'Tancament de camp:';
$string['fieldheight'] = 'Alçada';
$string['fieldheightlistview'] = 'Alçada en visualització de llistes';
$string['fieldheightsingleview'] = 'Alçada en visualització d\'una entrada';
$string['fieldids'] = 'ID dels camps';
$string['fieldmappings'] = 'Mapatge de camps';
$string['fieldmappings_help'] = 'Aquest menú us ajuda a preservar les dades de la base de dades. Per mantenir les dades d\'un camp, l\'heu de mapar en un altre camp, on apareixeran les dades. Qualsevol camp es pot deixar en blanc, sense informació copiada des d\'un altre. Qualsevol camp de l\'original que no estigui mapat en un altre es perdrà i totes les seves dades s\'esborraran.
Només podeu mapar camps que tinguin el mateix tipus, i cada selector contindrà camps diferents. També heu de tenir cura de no mapar un camp original en més d\'un camp dels nous.';
$string['fieldname'] = 'Nom del camp';
$string['fieldnotmatched'] = 'Aquests camps del fitxer no es troben en aquesta base de dades: {$a}';
$string['fieldoptions'] = 'Opcions (una per línia)';
$string['fields'] = 'Camps';
$string['fieldupdated'] = 'S\'ha actualitzat el camp';
$string['fieldwidth'] = 'Amplada';
$string['fieldwidthlistview'] = 'Amplada en visualització de llistes';
$string['fieldwidthsingleview'] = 'Amplada en visualització d\'una entrada';
$string['file'] = 'Fitxer';
$string['fileencoding'] = 'Codificació';
$string['filesnotgenerated'] = 'No s\'han pogut generar tots els fitxers: {$a}';
$string['filtername'] = 'Enllaços automàtics a bases de dades';
$string['footer'] = 'Peu de pàgina';
$string['forcelinkname'] = 'Nom imposat a l\'enllaç';
$string['foundnorecords'] = 'No s\'han trobat registres (<a href="{$a->reseturl}">Reinicialitza filtres</a>)';
$string['foundrecords'] = 'S\'han trobat els registres:{$a->num}/{$a->max} (<a href="{$a->reseturl}">Reinicialitza filtres</a>)';
$string['fromfile'] = 'Importa d\'un fitxer zip';
$string['fromfile_help'] = 'La importació des de la funció fitxer zip us permet navegar i carregar un zip predefinit de plantilles i camps';
$string['generateerror'] = 'No s\'han generat tots els fitxers!';
$string['header'] = 'Capçalera';
$string['headeraddtemplate'] = 'Defineix la interfície en afegir noves entrades';
$string['headerasearchtemplate'] = 'Defineix la interfície de cerques avançades';
$string['headercsstemplate'] = 'Defineix estils CSS locals per a les altres plantilles';
$string['headerjstemplate'] = 'Defineix Javascript personalitzat per a les altres plantilles';
$string['headerlisttemplate'] = 'Defineix la interfície per a la navegació per múltiples entrades';
$string['headerrsstemplate'] = 'Defineix l\'aparença de l\'entrades en els canals RSS';
$string['headersingletemplate'] = 'Defineix la interfície de visualització d\'entrades individuals';
$string['importentries'] = 'Importa les entrades';
$string['importsuccess'] = 'La predefinició s\'ha aplicat amb èxit';
$string['includeapproval'] = 'Inclou l\'estat d\'aprovació';
$string['includetime'] = 'Inclou el temps afegit/modificat';
$string['includeuserdetails'] = 'Inclou els detalls de l\'usuari';
$string['insufficiententries'] = 'fan falta més entrades per veure aquesta base de dades';
$string['intro'] = 'Introducció';
$string['invalidaccess'] = 'No heu accedit a aquesta pàgina correctament';
$string['invalidfieldid'] = 'El camp ID és incorrecte';
$string['invalidfieldname'] = 'Trieu un altre nom per a aquest camp';
$string['invalidfieldtype'] = 'El tipus de camp és incorrecte';
$string['invalidid'] = 'Dada ID incorrecta';
$string['invalidpreset'] = '{$a} no és un valor predefinit';
$string['invalidrecord'] = 'Registre incorrecte';
$string['invalidurl'] = 'L\'URL que heu introduït no és vàlid';
$string['jstemplate'] = 'Plantilla Javascript';
$string['latitude'] = 'Latitud';
$string['latlong'] = 'Latitud/longitud';
$string['latlongdownloadallhint'] = 'Enllaç per a baixar totes les entrades com a KML';
$string['latlongkmllabelling'] = 'Com etiquetar els elements en fitxers KML (Google Earth)';
$string['latlonglinkservicesdisplayed'] = 'Enllaços a serveis';
$string['latlongotherfields'] = 'Altres camps';
$string['list'] = 'Visualitza llista';
$string['listtemplate'] = 'Plantilla de llista';
$string['longitude'] = 'Longitud';
$string['mapexistingfield'] = 'Mapa a {$a}';
$string['mapnewfield'] = 'Crea un camp nou';
$string['mappingwarning'] = 'Tots els camps vells que no s\'hagin pogut mapar a camps nous es perdran i totes les dades d\'aquests camps seran suprimides.';
$string['maxentries'] = 'Nombre màxim d\'entrades';
$string['maxentries_help'] = '<p align="center"><strong>Nombre màxim d\'entrades</strong></p>

<p>El nombre màxim d\'entrades que un participant pot trametre en aquesta activitat.</p>';
$string['maxsize'] = 'Mida màxima';
$string['menu'] = 'Menú (selecció única)';
$string['menuchoose'] = 'Trieu...';
$string['missingdata'] = 'Cal que afegiu dades id o objecte al camp';
$string['missingfield'] = 'Error de programació: heu d\'especicar un camp i/o dades en definir la classe de camp';
$string['modulename'] = 'Base de dades';
$string['modulename_help'] = 'El mòdul d\'activitat de base de dades permet als participants crear, mantenir i cercar una col·lecció d\'entrades (p.ex., registres). L\'estructura de les entrades les defineix el professorat com un nombre de camps. Els tipus de camps inclouen caselles de selecció, botons d\'opció, menús desplegables, àrees de text, URL, imatges i fitxers carregats.

La disposició visual de la informació quan es llisten, visualitzen o editen entrades de la base de dades pot controlar-se mitjançant plantilles. Les activitats de base de dades poden compartir-se entre cursos com a predefinides i un docent també pot importar i exportar les entrades de la base de dades.

Si el filtre d\'autoenllaç de la base de dades està activat, qualsevol entrada s\'enllaçarà automàticament quan les paraules o frases apareguin en el curs.

El professorat pot permetre comentaris per a les entrades. Les entrades també es poden valorar pel professorat o l\'estudiantat (avaluació d\'iguals). Les valoracions poden agregar-se per a formar una qualificació final que es registre en el butlletí de qualificacions.

Les activitats de base de dades tenen moltes aplicacions, com ara
* Una col·lecció col·laborativa d\'enllaços web, llibres, ressenyes de llibres, referències de revistes, etc.
* Per visualitzar fotos, pòsters, llocs web o poemes creats per l\'estudiantat i per a la revisió d\'iguals';
$string['modulenameplural'] = 'Bases de dades';
$string['more'] = 'Més';
$string['moreurl'] = 'Més (URL)';
$string['movezipfailed'] = 'No es pot moure el fitxer comprimit';
$string['multientry'] = 'Entrada repetida';
$string['multimenu'] = 'Menú (selecció múltiple)';
$string['multipletags'] = 'S\'han trobat múltiples etiquetes. No s\'ha desat la plantilla.';
$string['namecheckbox'] = 'Casella de selecció';
$string['namedate'] = 'Data';
$string['namefile'] = 'Fitxer';
$string['namelatlong'] = 'Camp de latitud/longitud';
$string['namemenu'] = 'Menú';
$string['namemultimenu'] = 'Menú de selecció múltiple';
$string['namenumber'] = 'Nombre';
$string['namepicture'] = 'Imatge';
$string['nameradiobutton'] = 'Botó de grup';
$string['nametext'] = 'Text';
$string['nametextarea'] = 'Text';
$string['nameurl'] = 'URL';
$string['newentry'] = 'Nova entrada';
$string['newfield'] = 'Crea un nou camp';
$string['newfield_help'] = '<p align="center"><strong>Camps</strong></p>

<p>En aquesta pantalla podeu crear els camps que formaran part de la vostra base de dades.</p>

<p>Cada camp permet diferents tipus de dades, amb diverses interfícies.</p>';
$string['noaccess'] = 'No teniu accés a aquesta pàgina';
$string['nodefinedfields'] = 'El nou predefinit no té camps';
$string['nofieldcontent'] = 'No e stroba el contingut del camp';
$string['nofieldindatabase'] = 'No s\'han definit camps en aquesta base de dades. Afegiu-ne algun.';
$string['nolisttemplate'] = 'Encara no s\'ha definit la plantilla de llista.';
$string['nomatch'] = 'No s\'han trobat entrades que coincideixin';
$string['nomaximum'] = 'No hi ha un valor màxim';
$string['norecords'] = 'No hi ha entrades en la base de dades';
$string['nosingletemplate'] = 'Encara no s\'ha definit la plantilla d\'entrada única';
$string['notapproved'] = 'L\'entrada encara no està aprovada.';
$string['notinjectivemap'] = 'No hi ha un mapa d\'injecció';
$string['notopenyet'] = 'Disculpeu, aquesta activitat no estarà disponible fins a {$a}';
$string['number'] = 'Nombre';
$string['numberrssarticles'] = 'Articles RSS';
$string['numnotapproved'] = 'Pendents';
$string['numrecords'] = '{$a} entrades';
$string['ods'] = '<acronym title="Full de càlcul de l\'OpenDocument ">ODS</acronym> (OpenOffice)';
$string['optionaldescription'] = 'Descripció breu (opcional)';
$string['optionalfilename'] = 'Nom del fitxer (opcional)';
$string['other'] = 'Un altre';
$string['overrwritedesc'] = 'Sobreescriu el valor predefinit, si és que n\'hi ha';
$string['overwrite'] = 'Sobreescriu';
$string['overwritesettings'] = 'Sobreescriu els paràmetres actuals';
$string['page-mod-data-x'] = 'Pàgina qualsevol del mòdul d\'activitat de la base de dades';
$string['pagesize'] = 'Entrades per pàgina';
$string['participants'] = 'Participants';
$string['picture'] = 'Imatge';
$string['pleaseaddsome'] = 'Creeu-los més avall o <a href="{$a}">trieu un conjunt predefinit</a> per començar.';
$string['pluginadministration'] = 'Administració de l\'activitat de la base de dades';
$string['pluginname'] = 'Base de dades';
$string['portfolionotfile'] = 'Exporta a un portafolis abans que a un fitxer (només csv i leap2a)';
$string['presetinfo'] = 'Desar la plantilla com a predefinida farà que es publiqui. Altres usuaris podran utilitzar-la en les seves bases de dades.';
$string['presets'] = 'Predefinits';
$string['radiobutton'] = 'Botons d\'opció';
$string['recordapproved'] = 'S\'ha aprovat l\'entrada';
$string['recorddeleted'] = 'S\'ha suprimit l\'entrada';
$string['recordsnotsaved'] = 'No s\'ha desat cap entrada. Comproveu el format del fitxer.';
$string['recordssaved'] = 'entrada/es';
$string['requireapproval'] = 'Requereix aprovació?';
$string['requireapproval_help'] = '<p align="center"><strong>Requerir aprovació</strong></p>

<p>Cal que el professorat aprovi les entrades abans que l\'estudiantat pugui visualitzar-les? Això és útil per moderar continguts potencialment ofensius o inadequats.</p>';
$string['requiredentries'] = 'Entrades requerides';
$string['requiredentries_help'] = '<p align="center"><strong>Entrades requerides</strong></p>

<p>El nombre d\'entrades que cal que trameti cada participant. Als usuaris que no hagin tramès aquest nombre d\'entrades se\'ls mostrarà un recordatori quan visualitzin la base de dades.</p>

<p>A més a més, no es considerarà que hagin completat aquesta activitat fins que no hagin tramès el nombre d\'entrades requerit.</p>';
$string['requiredentriestoview'] = 'Entrades requerides per visualitzar';
$string['requiredentriestoview_help'] = '<p align="center"><strong>Entrades requerides per visualitzar</strong></p>

<p>El nombre d\'entrades que cal que trameti un participant abans que se li permeti visualitzar cap entrada en aquesta activitat de base de dades.</p>';
$string['resetsettings'] = 'Reinicialitza els filtres';
$string['resettemplate'] = 'Reinicia la plantilla';
$string['resizingimages'] = 'S\'estan redimensionant les miniatures...';
$string['rows'] = 'files';
$string['rssglobaldisabled'] = 'Inhabilitat. Vegeu les variables de configuració del lloc.';
$string['rsstemplate'] = 'Plantilla RSS';
$string['rsstitletemplate'] = 'Plantilla títol RSS';
$string['save'] = 'Desa';
$string['saveandadd'] = 'Desa i afegeix-ne un altre';
$string['saveandview'] = 'Desa i visualitza';
$string['saveaspreset'] = 'Desa com a predefinit';
$string['saveaspreset_help'] = 'La funció Desa com a predefinit publica les plantilles i els camps com un predifinit que d\'altres usuaris poden fer servir. (En qualsevol moment el podeu esborrar de la llista de predefinits.)';
$string['savesettings'] = 'Desa els paràmetres';
$string['savesuccess'] = 'S\'ha desat amb èxit. El vostre predefinit estarà disponible per a tot el lloc.';
$string['savetemplate'] = 'Desa la plantilla';
$string['search'] = 'Cerca';
$string['selectedrequired'] = 'Cal que estigui tot seleccionat';
$string['showall'] = 'Mostra totes les entrades';
$string['single'] = 'Visualitza una entrada';
$string['singletemplate'] = 'Plantilla d\'entrada única';
$string['subplugintype_datafield'] = 'Tipus de camp de la base de dades';
$string['subplugintype_datafield_plural'] = 'Els tipus de camp de la base de dades';
$string['subplugintype_datapreset'] = 'Predefinit';
$string['subplugintype_datapreset_plural'] = 'Predefinits';
$string['teachersandstudents'] = '{$a->teachers} i {$a->students}';
$string['templates'] = 'Plantilles';
$string['templatesaved'] = 'S\'ha desat la plantilla';
$string['text'] = 'Text';
$string['textarea'] = 'Àrea de text';
$string['timeadded'] = 'Hora de la incorporació';
$string['timemodified'] = 'Hora de la modificació';
$string['todatabase'] = 'en aquesta base de dades';
$string['type'] = 'Tipus de camp';
$string['undefinedprocessactionmethod'] = 'No hi ha un mètode definit en Data_Preset per gestionar l\'acció "{$a}"';
$string['unsupportedexport'] = '({$a->fieldtype}) no pot ser exportat.';
$string['updatefield'] = 'Actualitza un camp existent';
$string['uploadfile'] = 'Penja un fitxer';
$string['uploadrecords'] = 'Carrega entrades';
$string['uploadrecords_help'] = 'Es poden carregar les entrades mitjançant un fitxer de text. El format del fitxer ha de ser el següent:


* Cada línia del fitxer contér un sol registre
* Cada registre és una sèrie de dades separades per comes (o d\'altres delimitadors)
*El primer registre conté una llista dels noms de camp i defineix el format de la resta del fitxer

El tancament és un caràcter que envolta cada camp en cada registre. Normalment es pot deixar desactivat.';
$string['url'] = 'URL';
$string['usedate'] = 'Inclou en la cerca.';
$string['usestandard'] = 'utilitza un predefinit';
$string['usestandard_help'] = 'Per utilitzar un predefinit disponible arreu del lloc, seleccioneu-lo de la llista. (Si heu afegit un predefinit a la llista utilitzant la funció Desa com a predefinit, aleshores teniu l\'opció d\'esborrar-lo).';
$string['viewfromdate'] = 'Visualitza des de';
$string['viewtodate'] = 'Visualitza fins';
$string['wrongdataid'] = 'L\'ID de dades proporcionat és erroni';
