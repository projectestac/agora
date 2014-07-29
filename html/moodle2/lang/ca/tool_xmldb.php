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
 * Strings for component 'tool_xmldb', language 'ca', branch 'MOODLE_26_STABLE'
 *
 * @package   tool_xmldb
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actual'] = 'Actual';
$string['aftertable'] = 'Després de la taula:';
$string['back'] = 'Enrere';
$string['backtomainview'] = 'Torna a l\'inici';
$string['cannotuseidfield'] = 'No és pot inserir el camp "id". És una columna auto numèrica automàtica.';
$string['change'] = 'Canvia';
$string['charincorrectlength'] = 'Longitud incorrecta per a camp de tipus caràcter';
$string['checkbigints'] = 'Comprova enters';
$string['check_bigints'] = 'Cerca nombres enters incorrectes en la base de dades';
$string['checkdefaults'] = 'Comprova valors per defecte';
$string['check_defaults'] = 'Cerca valors per defecte inconsistents';
$string['checkforeignkeys'] = 'Comprova claus foranes';
$string['check_foreign_keys'] = 'Cerca violacions de claus foranes';
$string['checkindexes'] = 'Comprova índexs';
$string['check_indexes'] = 'Cerca índexs desapareguts en la base dades';
$string['checkoraclesemantics'] = 'Comprova la semàntica';
$string['check_oracle_semantics'] = 'Cerca semàntiques de longitud incorrectes';
$string['completelogbelow'] = '(Visualitza més avall el registre complet de la cerca.)';
$string['confirmcheckbigints'] = 'Aquesta funció cercarà <a href="http://tracker.moodle.org/browse/MDL-11038"> camps d\'enters potencialment incorrectes</a> en el vostre servidor Moodle. Generarà automàticament (però sense executar-les) les sentències SQL necessàries per a tenir correctament definits tots els enters en la vostra base de dades.<br /><br />
Una vegada generades, podeu copiar les sentències i executar-les de forma segura amb la vostra interfície SQL favorita (no oblideu fer abans una còpia de seguretat de les dades).<br /><br />
És molt recomanable estar utilitzant la darrera actualització disponible (versions +) de la vostra versió de Moodle (1.8, 1.9, 2.x...) abans d\'executar la cerca d\'enters incorrectes.<br /><br />
Aquesta funció no realitza cap canvi en la base de dades (sols hi llegeix), així que pot executar-se de forma segura en tot moment.';
$string['confirmcheckdefaults'] = 'Aquesta funció cercarà valors per defecte inconsistents en el vostre servidor Moodle. Generarà automàticament (però sense executar-les) les sentències SQL necessàries per a tenir tots els valors per defectament correctament definits.<br /><br />
Una vegada generades, podeu copiar les sentències i executar-les de forma segura amb la vostra interfície SQL favorita (no oblideu fer abans una còpia de seguretat de les dades).<br /><br />
És molt recomanable estar utilitzant la darrera actualització disponible (versions +) de la vostra versió de Moodle (1.8, 1.9, 2.x...) abans d\'executar la cerca de valors per defecte inconsistents.<br /><br />
Aquesta funció no realitza cap canvi en la base de dades (sols hi llegeix), així que pot executar-se de forma segura en tot moment.';
$string['confirmcheckforeignkeys'] = 'Aquesta funció cercarà violacions potencials de les claus foranes definides en el fitxer install.xml. (Moodle no genera actualment restriccions de claus foranes en la base de dades, raó per la qual cosa pot haver-hi dades invàlides.)<br /><br />
És molt recomanable estar utilitzant la darrera actualització disponible (versions +) de la vostra versió de Moodle (1.8, 1.9, 2.x...) abans d\'executar la cerca d\'índexs desapareguts.<br /><br />
Aquesta funció no realitza cap canvi en la base de dades (sols hi llegeix), així que pot executar-se de forma segura en tot moment.';
$string['confirmcheckindexes'] = 'Aquesta funció cercarà índexs potencialment desapareguts en el vostre servidor Moodle. Generarà automàticament (però sense executar-les) les sentències SQL necessàries per a mantenir-ho tot actualitzat.<br /><br />
Una vegada generades, podeu copiar les sentències i executar-les de forma segura amb la vostra interfície SQL favorita (no oblideu fer abans una còpia de seguretat de les dades).<br /><br />
És molt recomanable estar utilitzant la darrera actualització disponible (versions +) de la vostra versió de Moodle (1.8, 1.9, 2.x...) abans d\'executar la cerca d\'índexs desapareguts.<br /><br />
Aquesta funció no realitza cap canvi en la base de dades (només hi llegeix), així que pot executar-se de forma segura en tot moment.';
$string['confirmcheckoraclesemantics'] = 'Aquesta funció cercarà en el vostre servidor Moodle <a href="http://tracker.moodle.org/browse/MDL-29322">columnes varchar2 d\'Oracle que utilitzen semàntica BYTE</a>. Generarà automàticament (però sense executar-les) les sentències SQL necessàries per a passar totes les columnes a semàntica CHAR (millor per a la compatibilitat creuada entre bases de dades i augmenta la longitud màxima dels continguts).<br /><br />
Una vegada generades, podeu copiar les sentències i executar-les de forma segura amb la vostra interfície SQL favorita (no oblideu fer abans una còpia de seguretat de les dades).<br /><br />
És molt recomanable estar utilitzant la darrera actualització disponible (versions +) de la versió de la vostra versió de Moodle (2.2, 2.3, 2.x...) abans d\'executar la cerca de semàntiques BYTE .<br /><br />
Aquesta funció no realitza cap canvi en la base de dades (només hi llegeix), així que es pot executar de forma segura en tot moment.';
$string['confirmdeletefield'] = 'Esteu absolutament segur que voleu suprimir aquest camp:';
$string['confirmdeleteindex'] = 'Esteu absolutament segur que voleu suprimir aquest índex:';
$string['confirmdeletekey'] = 'Esteu absolutament segur que voleu suprimir aquesta clau:';
$string['confirmdeletetable'] = 'Esteu absolutament segur que voleu suprimir aquesta taula:';
$string['confirmdeletexmlfile'] = 'Esteu absolutament segur que voleu suprimir aquest fitxer:';
$string['confirmrevertchanges'] = 'Esteu absolutament segur que voleu revertir els canvis fets sobre:';
$string['create'] = 'Crea';
$string['createtable'] = 'Crea taula:';
$string['defaultincorrect'] = 'Valor per defecte incorrecte';
$string['delete'] = 'Suprimeix';
$string['delete_field'] = 'Suprimeix camp';
$string['delete_index'] = 'Suprimeix índex';
$string['delete_key'] = 'Elimina la clau';
$string['delete_table'] = 'Suprimeix taula';
$string['delete_xml_file'] = 'Suprimeix fitxer XML';
$string['doc'] = 'Doc';
$string['docindex'] = 'Índex de la documentació:';
$string['documentationintro'] = 'Aquesta documentació és generada automàticament a partir de la definició de la base de dades XMLDB. Només està disponible en anglès.';
$string['down'] = 'Avall';
$string['duplicate'] = 'Duplica';
$string['duplicatefieldname'] = 'Existeix un altre camp amb aquest nom';
$string['duplicatefieldsused'] = 'Camps duplicats en ús';
$string['duplicateindexname'] = 'Duplica nom d\'índex';
$string['duplicatekeyname'] = 'Existeix una altra clau amb aquest nom';
$string['duplicatetablename'] = 'Existeix una altra taula amb aquest nom';
$string['edit'] = 'Edita';
$string['edit_field'] = 'Edita camp';
$string['edit_field_save'] = 'Desa camp';
$string['edit_index'] = 'Edita índex';
$string['edit_index_save'] = 'Desa índex';
$string['edit_key'] = 'Edita la clau';
$string['edit_key_save'] = 'Desa la clau';
$string['edit_table'] = 'Edita taula';
$string['edit_table_save'] = 'Desa taula';
$string['edit_xml_file'] = 'Edita fitxer XML';
$string['enumvaluesincorrect'] = 'Valors incorrectes per a camp de tipus enum';
$string['expected'] = 'Esperat';
$string['extensionrequired'] = 'Per a aquesta acció es requereix l\'extensió de PHP \'{$a}\' per fer aquesta acció. Instal·leu-la si voleu utilitzar aquesta característica.';
$string['field'] = 'Camp';
$string['fieldnameempty'] = 'Nom de camp buit';
$string['fields'] = 'Camps';
$string['fieldsnotintable'] = 'El camp no existeix en la taula';
$string['fieldsusedinindex'] = 'Aquest camp s\'utilitza com a índex';
$string['fieldsusedinkey'] = 'Aquest camp s\'utilitza com a clau.';
$string['filemodifiedoutfromeditor'] = 'Avís: el fitxer s\'ha modificat localment mentre s\'utilitzava l\'editor XMLDB. Si deseu es sobreescriuran els canvis locals.';
$string['filenotwriteable'] = 'Fitxer sense permís d\'escriptura';
$string['fkviolationdetails'] = 'La clau forana {$a->keyname} en la taula {$a->tablename} és violada en  {$a->numviolations} de {$a->numrows} files.';
$string['float2numbernote'] = 'Avís: tot i que els camps "float" són 100% compatibles amb XMLDB, es recomana migrar a camps "number".';
$string['floatincorrectdecimals'] = 'Nombre incorrecte de decimals per a camp float';
$string['floatincorrectlength'] = 'Longitud incorrecta per a camp float';
$string['generate_all_documentation'] = 'Tota la documentació';
$string['generate_documentation'] = 'Documentació';
$string['gotolastused'] = 'Vés al darrer fitxer utilitzat';
$string['incorrectfieldname'] = 'Nom incorrecte';
$string['incorrectindexname'] = 'Nom d\'índex incorrecte';
$string['incorrectkeyname'] = 'Nom de clau incorrecte';
$string['incorrecttablename'] = 'Nom de taula incorrecte';
$string['index'] = 'Índex';
$string['indexes'] = 'Índexs';
$string['indexnameempty'] = 'El nom d\'índex és buit';
$string['integerincorrectlength'] = 'Longitud incorrecta per a camp integer';
$string['key'] = 'Clau';
$string['keynameempty'] = 'El nom de la clau no pot estar buit';
$string['keys'] = 'Claus';
$string['listreservedwords'] = 'Llista de paraules reservades <br />(s\'utilitza per a mantenir actualitzat <a href="http://docs.moodle.org/en/XMLDB_reserved_words" target="_blank">paraules reservades XMLDB</a>)';
$string['load'] = 'Carrega';
$string['main_view'] = 'Vista principal';
$string['masterprimaryuniqueordernomatch'] = 'Els camps de la vostra clau forana s\'han de llistar en el mateix ordre en què es llisten en la CLAU ÚNICA  de la taula referenciada.';
$string['missing'] = 'Falten';
$string['missingindexes'] = 'Índexs desapareguts';
$string['mustselectonefield'] = 'Heu de seleccionar un camp per a veure les accions relatives a camps';
$string['mustselectoneindex'] = 'Heu de seleccionar un índex per a veure les accions relatives a índexs';
$string['mustselectonekey'] = 'Heu de seleccionar una clau per a veure les accions relatives a claus';
$string['newfield'] = 'Camp nou';
$string['newindex'] = 'Índex nou';
$string['newkey'] = 'Afegeix una clau';
$string['newtable'] = 'Taula nova';
$string['newtablefrommysql'] = 'Taula nova des de MySQL';
$string['new_table_from_mysql'] = 'Taula nova des de MySQL';
$string['nofieldsspecified'] = 'No heu especificat camps';
$string['nomasterprimaryuniquefound'] = 'La columna o columnes referenciades per la vostra clau forana han d\'estar incloses com a CLAU primària o única en la taula referenciada. Fixeu-vos que no és suficient que la columna estigui en un ÍNDEX ÚNIC.';
$string['nomissingindexesfound'] = 'No s\'han detectat índexs desapareguts. La vostra base de dades no necessita cap acció.';
$string['noreffieldsspecified'] = 'No heu especificat camps de referència';
$string['noreftablespecified'] = 'No s\'ha trobat la taula de referència especificada';
$string['noviolatedforeignkeysfound'] = 'No s\'han trobat clau foranes violades';
$string['nowrongdefaultsfound'] = 'No s\'han trobat valor per defecte inconsistents. La vostra base de dades no necessita cap acció.';
$string['nowrongintsfound'] = 'No s\'han trobat enters incorrectes. La vostra base de dades no necessita cap acció.';
$string['nowrongoraclesemanticsfound'] = 'No s\'han trobat columnes Oracle que utilitzin semàntica BYTE. La vostra base de dades no necessita cap acció.';
$string['numberincorrectdecimals'] = 'Nombre de decimals incorrectes per a camp numèric';
$string['numberincorrectlength'] = 'Longitud incorrecta per a camp númèric';
$string['pendingchanges'] = 'Nota: heu fet canvis en aquest fitxer. Es poden desar en qualsevol moment.';
$string['pendingchangescannotbesaved'] = 'Hi ha canvis en aquest fitxer però no es poden desar. Verifiqueu que tant el directori com el fitxer "install.xml" tenen permisos d\'escriptura per al servidor web.';
$string['pendingchangescannotbesavedreload'] = 'Hi ha canvis en aquest fitxer però no es poden desar. Verifiqueu que tant el directori com el fitxer "install.xml" tenen permisos d\'escriptura per al servidor web. Després torneu a carregar aquesta pàgina i llavors hauríeu de poder desar aquests canvis.';
$string['pluginname'] = 'Editor XMLDB';
$string['primarykeyonlyallownotnullfields'] = 'Les claus primàries no poden ser null';
$string['reserved'] = 'Reservat';
$string['reservedwords'] = 'Paraules reservades';
$string['revert'] = 'Reverteix';
$string['revert_changes'] = 'Reverteix els canvis';
$string['save'] = 'Desa';
$string['searchresults'] = 'Cerca resultats';
$string['selectaction'] = 'Selecciona acció:';
$string['selectdb'] = 'Selecciona base de dades:';
$string['selectfieldkeyindex'] = 'Selecciona camp/clau/índex:';
$string['selectonecommand'] = 'Seleccioneu una acció de la llista per veure el codi PHP';
$string['selectonefieldkeyindex'] = 'Seleccioneu un camp/clau/índex de la llista per veure el codi PHP';
$string['selecttable'] = 'Selecciona taula:';
$string['table'] = 'Taula:';
$string['tablenameempty'] = 'El nom de taula no pot estar buit';
$string['tables'] = 'Taules';
$string['unload'] = 'Descarrega';
$string['up'] = 'Amunt';
$string['view'] = 'Mostra';
$string['viewedited'] = 'Mostra editat';
$string['vieworiginal'] = 'Mostra original';
$string['viewphpcode'] = 'Mostra codi PHP';
$string['view_reserved_words'] = 'Mostra paraules reservades';
$string['viewsqlcode'] = 'Mostra codi SQL';
$string['view_structure_php'] = 'Mostra estructura PHP';
$string['view_structure_sql'] = 'Mostra estructura SQL';
$string['view_table_php'] = 'Mostra taula PHP';
$string['view_table_sql'] = 'Mostra taula SQL';
$string['viewxml'] = 'XML';
$string['violatedforeignkeys'] = 'Claus foranes violades';
$string['violatedforeignkeysfound'] = 'Trobades claus alienes violades';
$string['violations'] = 'Violacions';
$string['wrong'] = 'Incorrecte';
$string['wrongdefaults'] = 'Valors per defecte incorrectes';
$string['wrongints'] = 'Enters incorrectes';
$string['wronglengthforenum'] = 'Longitud incorrecta per a camp enum';
$string['wrongnumberofreffields'] = 'Nombre incorrecte de camps de referència';
$string['wrongoraclesemantics'] = 'Semàntiques BYTE d\'Oracle incorrectes';
$string['wrongreservedwords'] = 'Paraules reservades utilitzades actualment<br />(teniu en compte que els noms de taules no són importants si s\'està utilitzant  $CFG->prefix)';
$string['yesmissingindexesfound'] = 'S\'han detectat alguns índexs desapareguts en la vostra base de dades. Aquí teniu els detalls i les sentències SQL necessàries que podeu executar amb la vostra interfície SQL favorita per a crear-los tots (no oblideu fer abans una còpia de seguretat de les dades).<br /><br /> Després de fer això, és altament recomanable executar una altra vegada aquesta utilitat per comprovar que no hi ha més índexs desapareguts.';
$string['yeswrongdefaultsfound'] = 'S\'han trobat valors per defecte inconsistents en la vostra base de dades. Aquí teniu els detalls i les sentències SQL necessàries que podeu executar amb la vostra interfície SQL favorita per a arreglar-los tots (no oblideu fer abans una còpia de seguretat de les dades).<br /><br /> Després de fer això, és altament recomanable executar una altra vegada aquesta utilitat per comprovar que no hi ha més valors per defecte inconsistents.';
$string['yeswrongintsfound'] = 'S\'han trobat alguns enters incorrectes en la vostra base de dades. Aquí teniu els detalls i les sentències SQL necessàries que podeu executar amb la vostra interfície SQL favorita per a arreglar-los tots (no oblideu fer abans una còpia de seguretat de les dades).<br /><br />Després de fer això, és altament recomanable executar una altra vegada aquesta utilitat per comprovar que no hi ha més enters incorrectes.';
$string['yeswrongoraclesemanticsfound'] = 'S\'han trobat algunes columnes d\'Oracle que utilitzen semàntica BYTE en la vostra base de dades. Aquí teniu els detalls i les sentències SQL necessàries que podeu executar amb la vostra interfície SQL favorita per a arreglar-les totes (no oblideu fer abans una còpia de seguretat de les dades).<br /><br />Després de fer això, és altament recomanable executar una altra vegada aquesta utilitat per comprovar que no hi ha més semàntiques incorrectes.';
