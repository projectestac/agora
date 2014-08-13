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
 * Strings for component 'enrol_ldap', language 'ca', branch 'MOODLE_26_STABLE'
 *
 * @package   enrol_ldap
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['assignrole'] = 'S\'està assignant el rol  \'{$a->role_shortname}\' de l\'usuari \'{$a->user_username}\' al curs \'{$a->course_shortname}\' (id {$a->course_id})';
$string['assignrolefailed'] = 'No s\'ha pogut assignar el rol \'{$a->role_shortname}\'  a l\'usuari \'{$a->user_username}\' en el curs \'{$a->course_shortname}\' (id {$a->course_id})';
$string['autocreate'] = '<p>Els cursos poden crear-se automàticament si hi ha inscripcions a un curs que encara no existeix en Moodle.</p><p>Si utilitzeu creació de cursos automàtica, es recomana que suprimiu les següents capacitats:
moodle/course:changeidnumber, moodle/course:changeshortname, moodle/course:changefullname i moodle/course:changesummary, dels rols pertinents per tal d\'evitar modificacions dels quatre camps de curs especificats abans (número ID, nom curt, nom complet i resum).</p>';
$string['autocreate_key'] = 'Auto crea';
$string['autocreation_settings'] = 'Paràmetres de creació automàtica de cursos';
$string['autoupdate_settings'] = 'Configuració de l\'actualització automàtica dels cursos';
$string['autoupdate_settings_desc'] = '<p>Selecció de camps que s\'actualitzen quan s\'executa l\'script de sincronització (enrol/ldap/cli/sync.php).</p><p>L\'actualització es produirà si seleccioneu almenys un camp.</p>';
$string['bind_dn'] = 'Si voleu utilitzar el bind-user per cercar usuaris, especifiqueu-ho aquí. P. ex. \'cn=ldapuser,ou=public,o=org\'';
$string['bind_dn_key'] = 'Nom distingit de l\'usuari a Bind';
$string['bind_pw'] = 'Contrasenya del bind-user.';
$string['bind_pw_key'] = 'Contrasenya';
$string['bind_settings'] = 'Paràmetres del lligam (bind)';
$string['cannotcreatecourse'] = 'No es pot crear el curs: Cal una dada perduda a LDAP !';
$string['cannotupdatecourse'] = 'No s\'ha pogut actualitzar el curs: manquen dades necessàries del registre LDAP. Número ID del curs: \'{$a->idnumber}\'';
$string['cannotupdatecourse_duplicateshortname'] = 'No s\'ha pogut actualitzar el curs: nom curt duplicat. S\'ometrà el curs amb número ID \'{$a->idnumber}\'...';
$string['category'] = 'Categoria per als cursos creats automàticament.';
$string['category_key'] = 'Categoria';
$string['contexts'] = 'Contextos LDAP';
$string['couldnotfinduser'] = 'No es pot trobar l\'usuari \'{$a}\', s\'està ometent.';
$string['course_fullname'] = 'Opcional: camp del LDAP d\'on es pot treure el nom complet.';
$string['course_fullname_key'] = 'Nom complet';
$string['course_fullname_updateonsync'] = 'Actualitza el nom complet durant l\'execució de l\'script de sincronització';
$string['course_fullname_updateonsync_key'] = 'Actualitza el nom complet';
$string['course_idnumber'] = 'Identificador únic en el LDAP, generalment <em>cn</em> o <em>uid</em>. Es recomana blocar aquest valor si utilitzeu la creació automàtica de cursos.';
$string['course_idnumber_key'] = 'Nombre d\'identificació';
$string['coursenotexistskip'] = 'El curs \'{$a}\' no existeix i la creació automàtica està inhabilitada. S\'ha omès.';
$string['course_search_sub'] = 'Cerca membres del grup al subcontext';
$string['course_search_sub_key'] = 'Cerca subcontexts';
$string['course_settings'] = 'Paràmetres d\'inscripció de cursos';
$string['course_shortname'] = 'Opcional: camp del LDAP d\'on es pot treure el nom curt.';
$string['course_shortname_key'] = 'Nom curt';
$string['course_shortname_updateonsync'] = 'Actualitza el nom curt durant l\'execució de l\'script de sincronització';
$string['course_shortname_updateonsync_key'] = 'Actualitza el nom curt';
$string['course_summary'] = 'Opcional: camp del LDAP d\'on es pot treure el resum.';
$string['course_summary_key'] = 'Resum';
$string['course_summary_updateonsync'] = 'Actualitza el resum durant l\'execució de l\'script de sincronització';
$string['course_summary_updateonsync_key'] = 'Actualitza el resum';
$string['courseupdated'] = 'S\'ha actualitzat amb èxit el curs amb número ID \'{$a->idnumber}\'';
$string['courseupdateskipped'] = 'No cal actualitzar el curs amb número ID \'{$a->idnumber}\'. S\'ha omès.';
$string['createcourseextid'] = 'CREA l\'usuari inscrit en un curs que no existeix \'{$a->courseextid}\'';
$string['createnotcourseextid'] = 'Usuari inscrit en un curs que no existeix \'{$a->courseextid}\'';
$string['creatingcourse'] = 'S\'està creant el curs \'{$a}\'...';
$string['duplicateshortname'] = 'Error en la creació del curs. Nom curt duplicat. S\'ometrà el curs amb número ID \'{$a->idnumber}\'...';
$string['editlock'] = 'Bloca valor';
$string['emptyenrolment'] = 'Inscripció buida per al rol \'{$a->role_shortname}\' al curs  \'{$a->course_shortname}\'';
$string['enrolname'] = 'LDAP';
$string['enroluser'] = 'Inscriu l\'usuari \'{$a->user_username}\' al curs \'{$a->course_shortname}\' (id {$a->course_id})';
$string['enroluserenable'] = 'Habilitada l\'inscripció per l\'usuari  \'{$a->user_username}\' al curs \'{$a->course_shortname}\' (id {$a->course_id})';
$string['explodegroupusertypenotsupported'] = 'ldap_explode_group() no suporta el tipus seleccionat per l\'usuari: {$a}';
$string['extcourseidinvalid'] = 'La identificació externa del curs és invalida!';
$string['extremovedsuspend'] = 'Deshabilitada la inscripció de l\'usuari  \'{$a->user_username}\' al curs \'{$a->course_shortname}\' (id {$a->course_id})';
$string['extremovedsuspendnoroles'] = 'S\'ha suprimit la inscripció i els rols de l\'usuari \'{$a->user_username}\' al curs  \'{$a->course_shortname}\' (id {$a->course_id})';
$string['extremovedunenrol'] = 'Suprimeix la inscripció de l\'usuari \'{$a->user_username}\' al curs \'{$a->course_shortname}\' (id {$a->course_id})';
$string['failed'] = 'Fallada !';
$string['general_options'] = 'Opcions generals';
$string['group_memberofattribute'] = 'Nom de l\'atribut que especifica a quins grups  pertany un usuari (exemple:  membreDe , membreDeGrup, etc.)';
$string['group_memberofattribute_key'] = 'Atribut « Membre de »';
$string['host_url'] = 'Especifiqueu el servidor LDAP en forma d\'URL, p. ex. \'ldap://ldap.myorg.com/\' o \'ldaps://ldap.myorg.com/\'.';
$string['host_url_key'] = 'URL del servidor';
$string['idnumber_attribute'] = 'Si els membres del grup contenen noms distingits , especifiqueu el mateix atribut que heu utilitzat per al mapat  de l\'usuari «Nombre d\'identificació » als paràmetres d\'autenticació LDAP.';
$string['idnumber_attribute_key'] = 'Atribut amb nombre ID';
$string['ldap_encoding'] = 'Especifica la codificació utilitzada pel servidor LDAP. Molt probablement sigui utf-8, MS AD v2 utilitza la codificació per defecte de la plataforma, això és, cp1252, cp1250, etc.';
$string['ldap_encoding_key'] = 'Codificació LDAP';
$string['ldap:manage'] = 'Gestiona les instàncies d\'inscripció LDAP';
$string['memberattribute'] = 'Atribut de membre LDAP';
$string['memberattribute_isdn'] = 'Si el membre del grup conté noms distingits cal que ho especifiqueu aquí. Si això és així, us caldrà configurar els paràmetres que quedin en aquesta secció.';
$string['memberattribute_isdn_key'] = 'L\'atribut del membre utilitza nom distingit';
$string['nested_groups'] = 'Voleu utilitzar grups jerarquitzats (grups de grups) en la inscripció ?';
$string['nested_groups_key'] = 'Grups jerarquitzats';
$string['nested_groups_settings'] = 'Configuració de grups jerarquitzats';
$string['nosuchrole'] = 'No s\'ha trobat aquest rol: \'{$a}\'';
$string['objectclass'] = 'objectClass utilitzada per cercar cursos. Generalment \'posixGroup\'.';
$string['objectclass_key'] = 'Classe objecte';
$string['ok'] = 'D\'acord!';
$string['opt_deref'] = 'Si el membre del grup conté noms distingits, especifiqueu com s\'utilitzen els àlies  durant la cerca. Seleccioneu un dels següents valors: \'No\' (LDAP_DEREF_NEVER) o \'Sí\' (LDAP_DEREF_ALWAYS)';
$string['opt_deref_key'] = 'Àlies referits';
$string['phpldap_noextension'] = '<em>El modul LDAP de PHP sembla que no estigui instal·lat. Si us plau comproveu que és instal·lat si voleu utilitzar el connector d\'inscripció.</em>';
$string['pluginname'] = 'Inscripcions LDAP';
$string['pluginname_desc'] = '<p>Podeu utilitzar un servidor LDAP per controlar les inscripcions. S\'assumeix que el vostre arbre LDAP conté grups que es corresponen als cursos i que cada grup/curs tindrà entrades membres corresponents als estudiants.</p>
<p>S\'assumeix que els cursos estan definits com a grups en el LDAP i que cada grup té múltiples camps de membre (<em>member</em> o <em>memberUid</em>) que contenen una identificació única de l\'usuari.</p>
<p>Per a utilitzar inscripció per LDAP, <strong>cal</strong> que els vostres usuaris tinguin un camp idnumber vàlid. Els grups LDAP han de tenir aquest idnumber en els camps de membre perquè un usuari sigui inscrit en el curs. Si ja esteu utilitzant autenticació per LDAP, generalment això us funcionarà.</p>
<p>Les inscripcions s\'actualitzen quan entra l\'usuari. També podeu executar una seqüència per mantenir sincronitzades les inscripcions. Doneu una ullada a <em>enrol/ldap/enrol_ldap_sync.php</em>.</p>
<p>Aquest connector també es pot configurar per crear automàticament nous cursos quan apareixen nous grups en el LDAP.</p>';
$string['pluginnotenabled'] = 'Connector no habilitat!';
$string['role_mapping'] = '<p>Per a cada rol que vulgueu assignar a LDAP us caldrà especificar la llista de contexts on el rol del curs està situat. Separeu diferents contexts amb  \';\'.</p><p>Us caldrà també especificar l\'atribut que el vostre servidor LDAP utilitza per mantindre els membre d\'un grup. Normalment  \'membre\' o \'membreUid\'</p>';
$string['role_mapping_attribute'] = 'Atribut de membre de LDAP per a {$a}';
$string['role_mapping_context'] = 'Context LDAP per a {$a}';
$string['role_mapping_key'] = 'Fes el mapatge de rols de LDAP';
$string['roles'] = 'Mapatge de rols';
$string['server_settings'] = 'Configuració del servidor LDAP';
$string['synccourserole'] = '== S\'està sincronitzant el curs \'{$a->idnumber}\' per al rol \'{$a->role_shortname}\'';
$string['template'] = 'Opcional: els cursos creats automàticament poden copiar els seus paràmetres d\'un curs plantilla.';
$string['template_key'] = 'Plantilla';
$string['unassignrole'] = 'S\'està suprimint l\'assignació del rol \'{$a->role_shortname}\' a l\'usuari \'{$a->user_username}\' del curs  \'{$a->course_shortname}\' (id {$a->course_id})';
$string['unassignrolefailed'] = 'No s\'ha pogut suprimir l\'assignació del rol \'{$a->role_shortname}\' a l\'usuari \'{$a->user_username}\'  en el curs \'{$a->course_shortname}\' (id {$a->course_id})';
$string['unassignroleid'] = 'S\'està suprimint l\'assignació del rol id \'{$a->role_id}\' a l\'usuari id  \'{$a->user_id}\'';
$string['updatelocal'] = 'Actualitza dades locals';
$string['user_attribute'] = 'Si el membre del grup conté noms distingits, especifiqueu l\'atribut utilitzat en nom/cerca d\'usuaris. Si esteu utilitzant autenticació LDAP, aquest valor sol trobar l\'atribut especificat al mapatge \'Nombre ID\' al connector d\'autenticació de LDAP.';
$string['user_attribute_key'] = 'Atribut del número ID';
$string['user_contexts'] = 'Si el membre del grup conté noms distingits , especifiqueu la llista de contexts on els usuaris seran situats. Separeu els diferents contexts amb \';\'. Per exemple: \'ou=usuaris,o=org; ou=altres,o=org\'';
$string['user_contexts_key'] = 'Contexts';
$string['user_search_sub'] = 'Si el membre del grup conté noms distingits, especifiqueu si la cerca dels usuaris també es fa en subcontexts';
$string['user_search_sub_key'] = 'Subcontexts de cerca';
$string['user_settings'] = 'Configuració de la cerca d\'usuaris';
$string['user_type'] = 'Si el membre del grup conté noms distingits, especifiqueu com els usuaris s\'emmagatzemen en LDAP';
$string['user_type_key'] = 'Tipus d\'usuari';
$string['version'] = 'La versió del protocol LDAP que utilitza el vostre servidor.';
$string['version_key'] = 'Versió';
