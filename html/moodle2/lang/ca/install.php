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
 * Strings for component 'install', language 'ca', branch 'MOODLE_26_STABLE'
 *
 * @package   install
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['admindirerror'] = 'El directori d\'administració especificat és incorrecte';
$string['admindirname'] = 'Directori d\'administració';
$string['admindirsetting'] = 'Alguns serveis d\'allotjament web (pocs) utilitzen un URL especial /admin p. ex. per a accedir a un tauler de control o quelcom semblant. Malauradament això entra en conflicte amb la ubicació estàndard de les pàgines d\'administració de Moodle. Podeu arreglar aquest problema canviant el nom del directori d\'administració de Moodle en la vostra instal·lació i posant el nou nom aquí. Per exemple:<br /> <br /><b>moodleadmin</b><br /> <br />
Això modificarà els enllaços d\'administració de Moodle.';
$string['admindirsettinghead'] = 'S\'està configurant el directori d\'administració...';
$string['admindirsettingsub'] = 'Alguns serveis d\'allotjament web (pocs) utilitzen un URL especial /admin p. ex. per a accedir a un tauler de control o quelcom semblant. Malauradament això entra en conflicte amb la ubicació estàndard de les pàgines d\'administració de Moodle. Podeu arreglar aquest problema canviant el nom del directori d\'administració de Moodle en la vostra instal·lació i posant el nou nom aquí. Per exemple:<br /> <br /><b>moodleadmin</b><br /> <br />
Això modificarà els enllaços d\'administració de Moodle.';
$string['availablelangs'] = 'Llista d\'idiomes disponibles';
$string['caution'] = 'Alerta';
$string['chooselanguage'] = 'Trieu un idioma';
$string['chooselanguagehead'] = 'Trieu un idioma';
$string['chooselanguagesub'] = 'Trieu un idioma per a la instal·lació. S\'utilitzarà també com a idioma per defecte del lloc, tot i que després podeu canviar-lo.';
$string['cliadminpassword'] = 'Nova contrasenya de l\'usuari d\'administració';
$string['cliadminusername'] = 'Nom d\'usuari del compte d\'administració';
$string['clialreadyconfigured'] = 'El fitxer config.php ja existeix, feu servir dmin/cli/install_database.php si voleu instal·lar aquest lloc web.';
$string['clialreadyinstalled'] = 'El fitxer config.php ja existeix, feu servir admin/cli/upgrade.php si voleu actualitzar aquest lloc web.';
$string['cliinstallfinished'] = 'La instal·lació ha finalitzat amb èxit.';
$string['cliinstallheader'] = 'Programa d\'instal·lació de línia d\'ordres de Moodle {$a}';
$string['climustagreelicense'] = 'En el mode no interactiu heu d\'estar d\'acord amb la llicència especificant l\'opció --d\'acord-';
$string['clitablesexist'] = 'Les taules de la base de dades ja existeixen. La instal·lació per línia d\'ordres no pot continuar.';
$string['compatibilitysettings'] = 'S\'estan comprovant els paràmetres del PHP...';
$string['compatibilitysettingshead'] = 'S\'estan comprovant els paràmetres del PHP...';
$string['compatibilitysettingssub'] = 'El vostre servidor hauria de passar totes aquestes proves per tal que Moodle funcioni correctament.';
$string['configfilenotwritten'] = 'La seqüència d\'instal·lació no ha estat capaç de crear automàticament un fitxer config.php que contingui els paràmetres que heu triat, probablement perquè no pugui escriure al directori de Moodle. Podeu copiar a mà el codi següent en un fitxer anomenat config.php dins del directori arrel de Moodle.';
$string['configfilewritten'] = 'S\'ha creat correctament el fitxer config.php';
$string['configurationcomplete'] = 'S\'ha completat la configuració';
$string['configurationcompletehead'] = 'S\'ha completat la configuració';
$string['configurationcompletesub'] = 'Moodle ha intentat desar la configuració en un fitxer en l\'arrel de la vostra instal·lació de Moodle.';
$string['database'] = 'Base de dades';
$string['databasehead'] = 'Paràmetres de la base de dades';
$string['databasehost'] = 'Servidor de base de dades:';
$string['databasename'] = 'Nom de la base de dades:';
$string['databasepass'] = 'Contrasenya de la base de dades:';
$string['databaseport'] = 'Port de la base de dades';
$string['databasesocket'] = 'Sòcol Unix';
$string['databasetypehead'] = 'Trieu el controlador de la base de dades';
$string['databasetypesub'] = 'Moodle funciona amb diversos tipus de servidors de base de dades. Contacteu amb l\'administrador de la base de dades si no sabeu quin tipus heu d\'utilitzar.';
$string['databaseuser'] = 'Usuari de la base de dades:';
$string['dataroot'] = 'Directori de dades';
$string['datarooterror'] = 'No s\'ha pogut trobar o crear el directori de dades que heu especificat. Corregiu el camí o creeu el directori a mà.';
$string['datarootpermission'] = 'Permisos dels directoris de dades';
$string['datarootpublicerror'] = 'El directori de dades que heu especificat és accessible directament per web. Utilitzeu una altra ubicació.';
$string['dbconnectionerror'] = 'No es pot obrir la connexió amb la base de dades que heu especificat. Comproveu els paràmetres de la base de dades.';
$string['dbcreationerror'] = 'Error en la creació de la base de dades. No s\'ha pogut crear la base de dades amb els paràmetres proporcionats.';
$string['dbhost'] = 'Ordinador servidor';
$string['dbpass'] = 'Contrasenya';
$string['dbport'] = 'Port';
$string['dbprefix'] = 'Prefix de taules';
$string['dbtype'] = 'Tipus';
$string['directorysettings'] = '<p>Confirmeu les ubicacions d\'aquesta instal·lació de Moodle.</p>

<p><b>Adreça web:</b>
Especifiqueu l\'adreça web completa per a accedir a Moodle. Si el vostre lloc és accessible per mitjà de diversos URL, trieu el més natural per als estudiants. No inclogueu la barra final.</p>

<p><b>Directori de Moodle:</b>
Especifiqueu el camí complet del directori d\'aquesta instal·lació. Assegureu-vos que les majúscules/minúscules són correctes.</p>

<p><b>Directori de dades:</b>
Necessiteu un lloc on Moodle pugui desar els fitxers que es pengin. L\'usuari del servidor web (generalment \'nobody\' o \'apache\') ha de tenir permisos de lectura i d\'ESCRIPTURA en aquest directori, però no hauria de ser accessible directament per web.</p>';
$string['directorysettingshead'] = 'Confirmeu les ubicacions d\'aquesta instal·lació de Moodle.';
$string['directorysettingssub'] = '<b>Adreça web:</b>
Especifiqueu l\'adreça web completa per a accedir a Moodle. Si el vostre lloc és accessible per mitjà de diversos URL, trieu el més natural per als estudiants. No inclogueu la barra final.</p>
<br /><br />
<b>Directori de Moodle:</b>
Especifiqueu el camí complet del directori d\'aquesta instal·lació. Assegureu-vos que les majúscules/minúscules són correctes.</p>
<br /><br />
<b>Directori de dades:</b>
Necessiteu un lloc on Moodle pugui desar els fitxers que es pengin. L\'usuari del servidor web (generalment \'nobody\' o \'apache\') ha de tenir permisos de lectura i d\'ESCRIPTURA en aquest directori, però no hauria de ser accessible directament via web.</p>';
$string['dirroot'] = 'Directori de Moodle';
$string['dirrooterror'] = 'El paràmetre \'Directori de Moodle\' sembla incorrecte: no s\'hi ha pogut trobat cap instal·lació de Moodle. S\'ha reiniciat el valor del paràmetre.';
$string['download'] = 'Baixa';
$string['downloadlanguagebutton'] = 'Baixa el paquet d\'idioma "{$a}"';
$string['downloadlanguagehead'] = 'Baixa paquet d\'idioma';
$string['downloadlanguagenotneeded'] = 'Podeu continuar el procés d\'instal·lació amb el paquet d\'idioma per defecte "{$a}".';
$string['downloadlanguagesub'] = 'Ara teniu l\'opció de baixar un paquet d\'idioma i continuar el procés d\'instal·lació en aquest idioma.<br /><br />Si no podeu baixar el paquet, el procés d\'instal·lació prosseguirà en anglès. (Després que s\'hagi completat la instal·lació, tindreu l\'oportunitat de baixar i instal·lar paquets d\'idioma addicionals.)';
$string['doyouagree'] = 'Esteu d\'acord (sí/no)?';
$string['environmenthead'] = 'S\'està comprovant el vostre entorn';
$string['environmentsub'] = 'S\'està comprovant si els diferents components del vostre sistema satisfan els requeriments';
$string['environmentsub2'] = 'Cada versió de Moodle té uns requeriments mínims de versió de PHP i un nombre d\'extensions de PHP necessàries.
Abans de cada instal·lació o actualització es realitza una comprovació exhaustiva de l\'entorn. Contacteu amb l\'administrador si no sabeu com instal·lar una nova versió de PHP o com habilitar les extensions.';
$string['errorsinenvironment'] = 'La comprovació de l\'entorn ha fallat.';
$string['fail'] = 'Error';
$string['fileuploads'] = 'Càrrega de fitxers';
$string['fileuploadserror'] = 'Hauria d\'estar habilitada';
$string['fileuploadshelp'] = '<p>Sembla que la càrrega de fitxers està inhabilitada al vostre servidor.</p>

<p>Moodle es pot instal·lar igualment, però sense aquesta capacitat no podreu penjar fitxers als cursos o imatges dels usuaris.</p>

<p>Per habilitar la càrrega de fitxers cal editar el fitxer php.ini principal del sistema i posar el paràmetre <b>file_uploads</b> a \'1\'.</p>';
$string['inputdatadirectory'] = 'Directori de dades:';
$string['inputwebadress'] = 'Adreça web:';
$string['inputwebdirectory'] = 'Directori de Moodle';
$string['installation'] = 'Instal·lació';
$string['langdownloaderror'] = 'Dissortadament l\'idioma "{$a}" no es pot baixar. La instal·lació prosseguirà en anglès.';
$string['langdownloadok'] = 'L\'dioma "{$a}" s\'ha instal·lat amb èxit. La instal·lació prosseguirà en aquest idioma.';
$string['magicquotesruntime'] = 'Magic Quotes Run Time';
$string['magicquotesruntimeerror'] = 'Hauria d\'estar desactivat';
$string['magicquotesruntimehelp'] = '<p>Aquest paràmetre hauria d\'estar desactivat per tal que Moodle funcioni correctament.</p>

<p>Normalment està desactivat per defecte. Comproveu el valor de <b>magic_quotes_runtime</b> al vostre fitxer php.ini.</p>

<p>Si no teniu accés al php.ini, hauríeu de col·locar la línia següent en un fitxer anomenat .htaccess dins del directori de Moodle:
<blockquote>php_value magic_quotes_runtime Off</blockquote>
</p>';
$string['memorylimit'] = 'Límit de memòria';
$string['memorylimiterror'] = 'El límit de memòria del PHP està definit una mica baix. Podeu tenir problemes més endavant.';
$string['memorylimithelp'] = '<p>El límit de memòria del PHP del vostre servidor actualment està definit en {$a}.</p>

<p>Això pot causar que Moodle tingui problemes de memòria més endavant, especialment si teniu molts mòduls habilitats i/o molts usuaris.</p>

<p>És recomanable que configureu el PHP amb un límit superior, com ara 40 MB, sempre que sigui possible. Hi ha diverses maneres de fer això:</p>
<ol>
<li>Si podeu, recompileu el PHP amb <i>--enable-memory-limit</i>. Això permetrà que Moodle defineixi el límit de memòria per si mateix.</li>
<li>Si teniu accés al fitxer php.ini, podeu canviar el paràmetre <b>memory_limit</b> a 40 MB. Si no hi teniu accés podeu demanar al vostre administrador que ho faci ell.</li>
<li>En alguns servidors PHP podeu crear un fitxer .htaccess dins del directori de Moodle amb aquesta línia:
<p><blockquote>php_value memory_limit 40M</blockquote></p>
<p>Tanmateix, en alguns servidors això farà que no funcioni <b>cap</b> pàgina PHP (es visualitzaran errors) en el qual cas hauríeu de suprimir el fitxer .htaccess.</p></li>
</ol>';
$string['mssqlextensionisnotpresentinphp'] = 'El PHP no s\'ha configurat correctament amb l\'extensió MSSQL de manera que pugui comunicar-se amb SQL*Server. Reviseu el fitxer php.ini o recompileu PHP.';
$string['mysqliextensionisnotpresentinphp'] = 'El PHP no ha estat configurat adequadament amb l\'extensió MySQLi de manera que pugui comunicar-se amb MySQL. Reviseu el fitxer php.ini o recompileu el PHP. L\'extensió MySQLi no està disponible per a PHP 4.';
$string['nativemariadb'] = 'MariaDB (native/MariaDB)';
$string['nativemariadbhelp'] = 'Ara heu de configurar la base de dades on s\'emmagatzemaran les dades de Moodle.
La base de dades es podrà crear si l\'usuari de la base de dades té els permisos necessaris i el nom d\'usuari i la contrasenya existeixen. El prefix de les taules és opcional.
El controlador no és compatible amb el motor MyISAM heretat.';
$string['nativemssql'] = 'SQL*Server FreeTDS (native/mssql)';
$string['nativemssqlhelp'] = 'Heu de configurar la base de dades on s\'emmagatzemarà la majoria de dades de Moodle. La base de dades i un nom d\'usuari i contrasenya amb accés s\'han de crear abans. El prefix de les taules és obligatori.';
$string['nativemysqli'] = 'Improved MySQL (native/mysqli)';
$string['nativemysqlihelp'] = 'Heu de configurar la base de dades on s\'emmagatzemarà la majoria de dades de Moodle. La base de dades es pot crear si l\'usuari de la base de dades té els permisos necessaris. El nom d\'usuari i contrasenya ja han d\'existir. El prefix de les taules és opcional.';
$string['nativeoci'] = 'Oracle (native/oci)';
$string['nativeocihelp'] = 'Heu de configurar la base de dades on s\'emmagatzemarà la majoria de dades de Moodle. La base de dades i un nom d\'usuari i contrasenya amb accés s\'han de crear abans. El prefix de les taules és obligatori.';
$string['nativepgsql'] = 'PostgreSQL (native/pgsql)';
$string['nativepgsqlhelp'] = 'Ara cal configurar els paràmetres de la base de dades on s\'emmagatzemarà la majoria de dades de Moodle.
La base de dades i un nom d\'usuari i contrasenya amb accés s\'han de crear abans. El prefix de les taules és obligatori.';
$string['nativesqlsrv'] = 'SQL*Server Microsoft (native/sqlsrv)';
$string['nativesqlsrvhelp'] = 'Ara cal configurar els paràmetres de la base de dades on s\'emmagatzemarà la majoria de dades de Moodle.
La base de dades i un nom d\'usuari i contrasenya amb accés s\'han de crear abans. El prefix de les taules és obligatori.';
$string['nativesqlsrvnodriver'] = 'Els controladors Microsoft del SQL Server per a PHP no estan instal·lats o no s\'han configurat correctament.';
$string['nativesqlsrvnonwindows'] = 'Els controladors Microsoft del SQL Server per a PHP només estan disponibles per a sistemes operatius Windows.';
$string['ociextensionisnotpresentinphp'] = 'El PHP no s\'ha configurat correctament amb l\'extensió OCI8 de manera que pugui comunicar-se amb Oracle. Reviseu el fitxer php.ini o recompileu el PHP.';
$string['pass'] = 'Correcte';
$string['paths'] = 'Camins';
$string['pathserrcreatedataroot'] = 'L\'instal·lador no pot crear el directori de dades ({$a->dataroot}).';
$string['pathshead'] = 'Confirmeu els camins';
$string['pathsrodataroot'] = 'No es pot escriure en el directori dataroot.';
$string['pathsroparentdataroot'] = 'No es pot escriure en el directori pare ({$a->parent}). L\'instal·lador no pot crear el directori ({$a->dataroot}).';
$string['pathssubadmindir'] = 'Alguns serveis d\'allotjament web (pocs) utilitzen un URL especial /admin p. ex. per a accedir a un tauler de control o quelcom semblant. Malauradament això entra en conflicte amb la ubicació estàndard de les pàgines d\'administració de Moodle. Podeu arreglar aquest problema canviant el nom del directori d\'administració de Moodle en la vostra instal·lació i posant el nou nom aquí. Per exemple <em>moodleadmin</em>. Això modificarà els enllaços d\'administració de Moodle.';
$string['pathssubdataroot'] = 'Necessiteu un espai on Moodle pugui desar els fitxers penjats. Aquest directori hauria de tenir permisos de lectura I ESCRIPTURA per a l\'usuari del servidor web (normalment \'nobody\' o \'apache\'), però no cal que sigui accessible directament via web. L\'instal·lador provarà de crear-lo si no existeix.';
$string['pathssubdirroot'] = 'Camí complet del directori d\'instal·lació de Moodle.';
$string['pathssubwwwroot'] = 'L\'adreça web completa on s\'accedirà a Moodle.
No és possible accedir a Moodle en diferents adreces.
Si el vostre lloc té múltiples adreces públiques haureu de configurar redireccions permanents per a totes excepte aquesta.
Si el vostre lloc és accessible tant des d\'Internet com des d\'una intranet, utilitzeu aquí l\'adreça pública i configureu el DNS de manera que els usuaris de la intranet puguin utilitzar també l\'adreça pública.
Si l\'adreça no és correcta, canvieu l\'URL en el vostre navegador per reiniciar la instal·lació amb un altre valor.';
$string['pathsunsecuredataroot'] = 'La ubicació del dataroot no és segura.';
$string['pathswrongadmindir'] = 'No existeix el directori d\'administració';
$string['pgsqlextensionisnotpresentinphp'] = 'El PHP no s\'ha configurat correctament amb l\'extensió PGSQL de manera que pugui comunicar-se amb PostgreSQL. Reviseu el fitxer php.ini o recompileu el PHP.';
$string['phpextension'] = 'Extensió PHP {$a}';
$string['phpversion'] = 'Versió PHP';
$string['phpversionhelp'] = '<p>Moodle necessita una versió de PHP 4.3.0 o 5.1.0 (les versions 5.0.x tenien uns quants problemes coneguts).</p>
<p>A hores d\'ara esteu utilitzant la versió {$a}.</p>
<p>Us cal actualitzar el PHP o traslladar Moodle a un ordinador amb una versió de PHP més recent.<br />(Si esteu utilitzant la versió 5.0.x, alternativament també podríeu tornar enrere a la 4.4.x)</p>';
$string['releasenoteslink'] = 'Per a més informació sobre aquesta versió de Moodle, consulteu les notes de llançament en {$a}';
$string['safemode'] = 'Mode segur';
$string['safemodeerror'] = 'Moodle pot tenir problemes amb el mode segur activat';
$string['safemodehelp'] = '<p>Moodle pot tenir diversos problemes amb el mode segur activat. Probablement no podrà crear fitxers nous.</p>

<p>Normalment el mode segur només està habilitat en servidors webs públics una mica paranoics, de manera que és probable que hàgiu de buscar un altre servei d\'allotjament per al vostre Moodle.</p>

<p>Podeu continuar la instal·lació si voleu, però trobareu problemes de funcionament més endavant.</p>';
$string['sessionautostart'] = 'Inici automàtic de sessió';
$string['sessionautostarterror'] = 'Hauria d\'estar desactivat';
$string['sessionautostarthelp'] = '<p>Moodle necessita suport per a sessions i no funcionarà sense.</p>

<p>Les sessions es poden habilitar en el fitxer php.ini. Comproveu el paràmetre session.auto_start.</p>';
$string['sqliteextensionisnotpresentinphp'] = 'El PHP no ha estat configurat correctament amb l\'extensió SQLite. Reviseu el fitxer php.ini o torneu a compilar el PHP.';
$string['upgradingqtypeplugin'] = 'S\'està actualitzant el connector de tipus de preguntes';
$string['welcomep10'] = '{$a->installername} ({$a->installerversion})';
$string['welcomep20'] = 'Esteu veient aquesta pàgina perquè heu instal·lat amb èxit i heu executat el paquet <strong>{$a->packname} {$a->packversion}</strong>. Felicitacions.';
$string['welcomep30'] = 'Aquesta versió de <strong>{$a->installername}</strong> inclou les aplicacions necessàries per crear un entorn en el qual funcioni <strong>Moodle</strong>:';
$string['welcomep40'] = 'El paquet inclou també <strong>Moodle {$a->moodlerelease} ({$a->moodleversion})</strong>.';
$string['welcomep50'] = 'L\'ús de totes les aplicacions d\'aquest paquet és governat per les seves llicències respectives. El paquet <strong>{$a->installername}</strong> complet és
<a href="http://www.opensource.org/docs/definition_plain.html">codi font obert</a> i es distribueix
sota llicència <a href="http://www.gnu.org/copyleft/gpl.html">GPL</a>.';
$string['welcomep60'] = 'Les pàgines següents us guiaran per una sèrie de passos fàcils de seguir per configurar <strong>Moodle</strong> en el vostre ordinador. Podeu acceptar els paràmetres per defecte o, opcionalment, modificar-los perquè s\'ajustin a les vostres necessitats.';
$string['welcomep70'] = 'Feu clic en el botó "Següent" per continuar la configuració de <strong>Moodle</strong>.';
$string['wwwroot'] = 'Adreça web';
$string['wwwrooterror'] = 'L\'adreça web no sembla vàlida. La instal·lació de Moodle no sembla que sigui en aquesta ubicació. Aquest valor s\'ha reiniciat.';
