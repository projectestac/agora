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
 * Strings for component 'lti', language 'ca', branch 'MOODLE_26_STABLE'
 *
 * @package   lti
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['accept'] = 'Accepta';
$string['accept_grades'] = 'Accepta qualificacions de l\'eina';
$string['accept_grades_admin'] = 'Accepta qualificacions de l\'eina';
$string['accept_grades_admin_help'] = 'Especifiqueu de quina forma el subministrador de l\'eina pot afegir, actualitzar, llegir, i suprimir qualificacions associades amb les instàncies d\'aquest tipus d\'eina.

Alguns subministradors d\'eina donen suport a retornar informes de qualificacions a Moodle basades en accions preses dins l\'eina, creant una experiència més integrada.';
$string['accept_grades_help'] = 'Especifiqueu de quina forma el subministrador de l\'eina pot afegir, actualitzar, llegir, i suprimir qualificacions associades sols amb aquesta instància externa de l\'eina.

Alguns subministradors d\'eina donen suport a retornar informes de qualificacions a Moodle basades en accions preses dins l\'eina, creant una experiència més integrada.

Fixeu-vos que aquest paràmetre pot ser sobreescrit en la configuració de l\'eina.';
$string['action'] = 'Acció';
$string['active'] = 'Activa';
$string['activity'] = 'Activitat';
$string['addnewapp'] = 'Habilita l\'aplicació externa';
$string['addserver'] = 'Afegeix un servidor confiable nou';
$string['addtype'] = 'Afegeix la configuració externa de l\'eina';
$string['allow'] = 'Permet';
$string['allowinstructorcustom'] = 'Permet als professors afegir paràmetres personalitats';
$string['allowsetting'] = 'Permet a l\'eina emmagatzemar 8K de paràmetres en Moodle';
$string['always'] = 'Sempre';
$string['automatic'] = 'Automàtic, basada en al llançament de URL';
$string['baseurl'] = 'URL base';
$string['basiclti'] = 'LTI';
$string['basicltiactivities'] = 'Activitats LTI';
$string['basiclti_base_string'] = 'Cadena base de OAuth LTI';
$string['basiclti_endpoint'] = 'Llançament del protocol endpoint LTI';
$string['basicltifieldset'] = 'Paràmetre d\'exemple personalitzat';
$string['basiclti_in_new_window'] = 'La vostra activitat ha sigut oberta en una finestra nova.';
$string['basicltiintro'] = 'Descripció de l\'activitat';
$string['basicltiname'] = 'Nom de l\'activitat';
$string['basiclti_parameters'] = 'Paràmetres de llançament LTI';
$string['basicltisettings'] = 'Paràmetres de interoperabilitat de l\'eina d\'aprenentatge bàsic';
$string['cannot_delete'] = 'No podeu suprimir aquesta configuració de l\'eina';
$string['cannot_edit'] = 'No podeu editar aquesta configuració de l\'eina';
$string['comment'] = 'Comentari';
$string['configpassword'] = 'Contrasenya de l\'eina remota per defecte';
$string['configpreferheight'] = 'Alçada preferida per defecte';
$string['configpreferwidget'] = 'Configura el giny per llaçar-se per defecte.';
$string['configpreferwidth'] = 'Amplada preferida per defecte';
$string['configresourceurl'] = 'URL per defecte';
$string['configtoolurl'] = 'URL de l\'eina remota per defecte';
$string['configtypes'] = 'Habilita aplicacions LTI';
$string['courseid'] = 'Nombre d\'ID de curs';
$string['coursemisconf'] = 'El curs està desconfigurat';
$string['course_tool_types'] = 'Tipus d\'eines al curs';
$string['createdon'] = 'Creat amb';
$string['curllibrarymissing'] = 'La biblioteca CURL de PHP cal que estigui instal·lada per utilitzar LTI';
$string['custom'] = 'Paràmetres personalitzats';
$string['custom_config'] = 'S\'està utilitzant la configuració de l\'eina personalitzada';
$string['custom_help'] = 'Els paràmetres personalitzats són paràmetres utilitzats pel proveïdor de l\'eina. Per exemple, un paràmetre personalitzat pot ser utilitzat per mostrar un recurs especific del proveïdor.

És segur deixar aquest camp sense canvis llevat que el canvi el dugui el proveïdor de l\'eina.';
$string['custominstr'] = 'Paràmetres personalitzats.';
$string['debuglaunch'] = 'Opció de depuració';
$string['debuglaunchoff'] = 'Llançament normal';
$string['debuglaunchon'] = 'Llançament amb depuració';
$string['default'] = 'Per defecte';
$string['default_launch_container'] = 'Contenidor de llançament per defecte';
$string['default_launch_container_help'] = 'El contenidor de llançament afecta la visualització de l\'eina quan es llança des del curs. Alguns contenidors de llançament proporcionen més pantalles reals de l\'eina, i altres proporcionen una sensació més integrada amb el Moodle.

* **Per defecte** - Utilitza el contenidor de llançament especificat en l\'eina de configuració.

* **Incrustat** -  L\'eina es mostra amb la finestra de Moodle, de forma semblant a altres tipus d\'activitats.

* **Incrustat, sense blocs** - L\'eina es mostra dins la finestra de Moodle, amb els controls de a la part superior de la pàgina.

* **Finestra nova** - L\'eina s\'obre en una finestra nova, ocupant tot l\'espai disponible.

Depenent del navegador, es pot obrir una finestra emergent o una pestanya.

Es possible que alguns navegador impedeixin l\'obertura de finestra noves.';
$string['delegate'] = 'Delega al professor';
$string['delete'] = 'Suprimeix';
$string['delete_confirmation'] = 'Esteu segurs de voler suprimir aquesta configuració externa de l\'eina ?';
$string['deletetype'] = 'Suprimeix la configuració externa de l\'eina';
$string['display_description'] = 'Mostra la descripció de l\'activitat quan es llanci.';
$string['display_description_help'] = 'Si s\'habilita, la descripció de l\'activitat  mostrarà amunt el contingut del proveïdor de l\'eina.

La descripció pot ser utilitzada per proporcionar instruccions addicionals als llançadors de l\'eina, però no cal fer-ho obligatòriament.

La descripció mai es mostra quan el contenidor de llançament de l\'eina està en una finestra nova.';
$string['display_name'] = 'Mostra el nom de l\'activitat quan es llanci.';
$string['display_name_help'] = 'Si s\'habilita el nom de l\'activitat es mostrarà dalt del contingut del proveïdor de l\'eina.

Es possible que el proveïdor de l\'eina mostri el títol. Aquesta opció pot impedir que el títol de l\'activitat es mostri dues vegades.

El títol mai es mostra quan el llançador de l\'activitat està en una finestra nova.';
$string['domain_mismatch'] = 'El llançador de dominis de URL no concorda amb la configuració de l\'eina.';
$string['donot'] = 'No enviïs';
$string['donotaccept'] = 'No acceptis';
$string['donotallow'] = 'No permetis';
$string['edittype'] = 'Edita la configuració externa de l\'eina.';
$string['embed'] = 'Incrustada';
$string['embed_no_blocks'] = 'Incrustada sense blocs';
$string['enableemailnotification'] = 'Envia qualificacions per correu';
$string['enableemailnotification_help'] = 'Si s\'habilita, els alumnes rebran un correu amb els enviaments qualificats.';
$string['errormisconfig'] = 'Eina no configurada. Si us plau demaneu a l\'administrador de Moodle de fixar la configuració de l\'eina.';
$string['extensions'] = 'Serveis d\'extensió LTI';
$string['external_tool_type'] = 'Tipus d\'eina externa';
$string['external_tool_type_help'] = 'El propòsit principal de la configuració de l\'eina es establir un canal de comunicació segur entre Moodle i el proveïdor de l\'eina.

Això proporciona una oportunitat per les configuracions per defecte i aixecar serveis addicionals proporcionats per l\'eina.

* **Automàtica, basada en el llançament de URL** - Aquest paràmetre pot ser utilitzats en la majoria de casos. Moodle selecciona la configuració més adequada per l\'eina basada en el llançament  URL. eines configurades per un administrador o dins d\'aquest curs poden utilitzar-se.

Quan el llançament URL s\'especifica, Moodle proporciona realimentació. Si Moodle no reconeix el llançament URL us caldrà entrar la configuració de l\'eina de forma manual.

* **Un tipus d\'eina especifica** - Si seleccioneu un tipus d\'eina especifica, podeu forçar Moodle a utilitzar la configuració de l\'eina quan es comuniqui amb el proveïdor de l\'eina externa.

Si la URL de llançament no pareix pertànyer al proveïdor de l\'eina es mostrarà un missatge d\'avís. En alguns casos no cal entrar una URL de llançament quan es proporciona un tipus especific d\'eina.

* **Configuració personalitzada** - Per configurar els paràmetres de configuració de l\'eina, Mostreu Opcions avançades, i entreu la clau i la contrasenya. Si no teniu una clau i contrasenya se us demanarà que ompliu un formulari del subministrador de servei.
No tots els serveis requereixen una clau i una contrasenya, i en aquests casos els camps es deixaran sense omplir.

### Edició de tipus d\'eina

Es mostraran tres icones després del menú desplegable:

* **Afegeix** - Crea una configuració d\'eina al curs. Tots les instàncies d\'eina externa en aquest curs podran utilitzar la configuració de l\'eina.

 * **Edita** - Selecciona un tipus d\'eina per al curs de la llista, prem aquesta icona. Els detalls de la configuració de l\'eina es poden editar.

 * **Suprimeix** - Suprimeix el tipus d\'eina al curs seleccionat.';
$string['external_tool_types'] = 'Tipus d\'eines externes';
$string['failedtoconnect'] = 'Moodle no pot comunicar-se amb el sistema "{$a}"';
$string['filter_basiclti_configlink'] = 'Configureu els vostres llocs favorits i les contrasenyes.';
$string['filter_basiclti_password'] = 'La contrasenya és obligatòria';
$string['filterconfig'] = 'Administració de LTI';
$string['filtername'] = 'LTI';
$string['fixexistingconf'] = 'Utilitzeu una configuració ja existent per la instància sense configurar';
$string['fixnew'] = 'Configuració nova';
$string['fixnewconf'] = 'Definiu una configuració nova per la instància sense configurar';
$string['fixold'] = 'Usa l\'existent';
$string['forced_help'] = 'Aquest paràmetre es obligatori en aquest curs o configuració d\'eina. No podeu canviar-lo amb aquesta interfície.';
$string['force_ssl'] = 'Força SSL';
$string['force_ssl_help'] = 'Al seleccionar aquest opció forceu que tots els llançaments amb aquesta eina utilitzin SSL

A més a més, totes les peticions de serveis web des del proveïdor de l\'eina utilitzaran SSL.

Si escolliu aquesta opció, confirmeu que el lloc web Moodle i el proveïdor de l\'eina suporten SSL.';
$string['global_tool_types'] = 'Tipus d\'eina globals';
$string['grading'] = 'Encaminament de la qualificació';
$string['icon_url'] = 'URL de l\'icona';
$string['icon_url_help'] = 'La URL de la icona permet a la icona mostrar el llistat del curs per a aquesta activitat per a ser modificat. En lloc d\'utilitzar la icona per defecte, es mostrarà una icona que transporta el tipus d\'activitat.';
$string['id'] = 'id';
$string['invalidid'] = 'La identificació de LTI és incorrecta';
$string['launch_in_moodle'] = 'Llança l\'eina en moodle';
$string['launchinpopup'] = 'Llança contenidor';
$string['launch_in_popup'] = 'Llança eina emergent';
$string['launchinpopup_help'] = 'El contenidor llançador afecta la visualització de l\'eina quan es llança des del curs. Alguns contenidors de llançament proporcionen més pantalles d\'estat a l\'eina i altres proporcionen una sensació més integrada amb Moodle.

* **Per defecte** - utilitza el llançador especificat per la configuració de l\'eina.

* **Incrustat** - L\'eina és mostra dins de la finestra de Moodle, de forma semblant a altres activitats de Moodle.

* **Incrustada sense blocs** - L\'eina és mostra dins la finestra de Moodle, amb els controls de navegació a la part superior de la pàgina.

* **Finestra nova** - L\'eina s\'obri en una finestra nova, ocupant tot l\'espai disponible.

Depenent del navegador es possible que s\'obrin finestres emergents o pestanyes.

Es possible que alguns navegadors bloquegin l\'obertura de finestres noves.';
$string['launchoptions'] = 'Opcions de llançament';
$string['launch_url'] = 'URL de llançament';
$string['launch_url_help'] = 'La URL de llançament indica l\'adreça web de l\'eina externa, i pot tindre informació addicional com algun recurs per visualitzar.

Si no esteu segurs de quina URL de llançament posar, comproveu el proveïdor de l\'eina per cercar més informació.

Si heu seleccionat un tipus especific d\'eina, pot ser no us cal posar la URL. Es pot donar el cas que l\'enllaç de l\'eina s\'utilitzi per llançar al sistema del proveïdor, i no a un recurs especific';
$string['lti'] = 'LTI';
$string['lti:addcoursetool'] = 'Qualifica activitats LTI';
$string['lti:addinstance'] = 'Afegeix una activitat LTI nova';
$string['lti_administration'] = 'Gestió LTI';
$string['lti_errormsg'] = 'L\'eina ha retornat el següent missatge d\'error: "{$a}"';
$string['lti:grade'] = 'Qualifica activitats LTI';
$string['lti_launch_error'] = 'Ha succeït un error quan es llançava l\'eina externa.';
$string['lti_launch_error_tool_request'] = '<p> Per enviar una petició a un administrador completeu la configuració de l\'eina, premeu<a href="{$a->admin_request_url}" target="_top">aquí</a>. </p>';
$string['lti_launch_error_unsigned_help'] = '<p>
Aquest error pot ser resultat de la manca de la clau i de la contrasenya al proveïdor de l\'eina.
 </p>
<p>
Si teniu la clau i la contrasenya cal que l\'entreu quan s\'estigui editant l\'instància de l\'eina externa ( comproveu que les opcions avançades són visibles).<br />
De forma alternativa, podeu crear una configuració per l\'eina del curs <a href="{$a->course_tool_editor}">aquí</a>.
 </p>';
$string['lti:manage'] = 'Edita activitats LTI';
$string['lti:requesttooladd'] = 'Envia una eina als admins per configurar';
$string['lti_tool_request_added'] = 'La petició de configuració de l\'eina ha sigut enviat amb èxit. Podeu contactar amb l\'administrador per completar la configuració de l\'eina.';
$string['lti_tool_request_existing'] = 'Una configuració d\'eina per al domini de l\'eina ha sigut enviat.';
$string['lti:view'] = 'Mostra activitats LTI';
$string['main_admin'] = 'Ajuda general';
$string['main_admin_help'] = 'Les eines externes permeten als usuaris de Moodle interactuar de forma fluida amb recursos situats en servidors remots. Mitjançant un protocol de llançament especial, l\'eina remota té accés a informació general sobre l\'usuari que la llança. Per exemple, el nom de la institució, la ID del curs, la ID de l\'usuari, i altres informacions com el nom de l\'usuari o l\'adreça de correu electrònic.

Els tipus d\'eines llistades en aquesta pàgina estan en tres categories:

* **Activa** - Aquest proveïdor d\'eines ha sigut aprovat i configurat per l\'administrador. Pot utilitzar-se dins de qualsevol curs de Moodle. Si la clau i la contrasenya han sigut entrades, s\'ha establert una relació entre Moodle i l\'eina remota, proporcionant un canal segur de comunicació.

* **Pendent** - Aquest proveïdor d\'eines ha enviat un paquet, però no ha sigut configurat per l\'administrador. Els professors poden utilitzar eines d\'aquests proveïdors si tenen una clau i una contrasenya, o si  no en cal.

* **Rebutjat** - Aquest proveïdor d\'eines ha sigut marcat per un administrador de Moodle com no recomanable per un us global dins Moodle. Els professors poden utilitzar eines de d\'aquest proveïdor si tenen la clau i la contrasenya, o si no en cal.';
$string['miscellaneous'] = 'Miscel·lania';
$string['misconfiguredtools'] = 'S\'han detectat instàncies d\'eina sense configurar.';
$string['missingparameterserror'] = 'Aquesta pàgina no està configurada: "{$a}"';
$string['module_class_type'] = 'Tipus de modul de Moodle';
$string['modulename'] = 'Eina externa';
$string['modulename_help'] = 'Les eines externes permeten als usuaris de Moodle interactuar amb recursos d\'aprenentatge i activitats d\'altre llocs webs. Per exemple una eina externa pot proporcionar accés  a un tipus d\'activitat nou o a materials d\'aprenentatge d\'un editor.

Per configurar una instància d\'eina externa d\'un proveïdor d\'eines cal que suporte LTI (interoperabilitat d\'eines d\'aprenentatge). Si trobeu un proveïdor d\'eines que suporte LTI, us proporcionarà instruccions per configurar l\'eina externa. A més a més, els tipus d\'eina configurats per un administrador de lloc també estaran disponibles per al seu ús.

Les eines externes diferiran en els recursos URL en alguns aspectes:
* **Informació de context** - Les eines externes tenen accés a informació sobre l\'usuari que llança l\'eina, com institució, curs, nom i altra informació.

* **Integració avançada** - Les eines externes suporten llegir, actualitzar, i suprimir qualificacions associades amb la activitat de que es tracti. Es planegen més punts d\'integració en un futures versions.

* **Seguretat** - Les configuracions de les eines externes creen relacions de confiança entre Moodle i  l\'eina, permetent una comunicació segura entre ells.';
$string['modulenameplural'] = 'LTIs bàsics';
$string['modulenamepluralformatted'] = 'Instàncies';
$string['never'] = 'Mai';
$string['new_window'] = 'Finestra nova';
$string['noattempts'] = 'No s\'han fet intents amb aquest eina';
$string['no_lti_configured'] = 'No hi ha eines externes actives configurades.';
$string['no_lti_pending'] = 'No hi ha eines externes pendents.';
$string['no_lti_rejected'] = 'No hi ha eines externes rebutjades.';
$string['noltis'] = 'No hi ha instàncies LTI';
$string['noservers'] = 'No s\'han trobat servidors';
$string['notypes'] = 'No hi ha eines LTI configurades actualment en Moodle. Premeu l\'enllaç d\'instal·lació i afegiu-ne alguna.';
$string['noviewusers'] = 'No s\'han trobat usuaris amb permís per utilitzar aquesta eina.';
$string['optionalsettings'] = 'Paràmetres opcionals';
$string['organization'] = 'Detalls de l\'organització';
$string['organizationdescr'] = 'Descripció de l\'organització';
$string['organizationid'] = 'ID de l\'organització';
$string['organizationid_help'] = 'Un únic identificador per a aquesta instància de Moodle. De forma típica s\'utilitza el nom de DNS de l\'organització.

Si deixeu aquest camp en blanc s\'utilitzarà el nom del servidor del vostre lloc Moodle per defecte.';
$string['organizationurl'] = 'URL de l\'organització';
$string['organizationurl_help'] = 'La URL base per aquesta instància de Moodle.

Si deixeu aquest camp en blanc, s\'utilitzarà el valor per defecte en la configuració del lloc.';
$string['pagesize'] = 'Enviaments mostrats a la pàgina';
$string['password'] = 'Contrasenya';
$string['password_admin'] = 'Contrasenya (admin)';
$string['password_admin_help'] = 'La contrasenya s\'utilitza per autenticar l\'usuari en l\'accés a l\'eina. Es sol proporcionar amb una clau pel proveïdor de l\'eina.

Les eines que no demanen comunicació segura amb Moodle i no proporcionen serveis addicionals (com informes de qualificacions) poden no exigir una contrasenya.';
$string['password_help'] = 'Per les eines preconfigurades, no cal entrar la contrasenya aquí, si la contrasenya ha sigut proporcionada com a part del procés de configuració.

El camp hauria d\'entrar-se si la creació de l\'enllaç al proveïdor de l\'eina no ha sigut configurat realment. Si l\'eina s\'utilitza més d\'una vegada en aquest curs, es una bona idea afegir una configuració d\'eina per al curs.

La contrasenya s\'utilitza per autenticar l\'accés a l\'eina. Es sol proporcionar amb una clau pel proveïdor de l\'eina.

Les eines que no requereixen una comunicació segura amb Moodle i que no proporcionen serveis addicionals ( com els informes de qualificacions) no els cal la contrasenya.';
$string['pending'] = 'Pendent';
$string['pluginadministration'] = 'Gestió de LTI';
$string['pluginname'] = 'LTI';
$string['preferheight'] = 'Altura preferida';
$string['preferwidget'] = 'Llança el giny preferit';
$string['preferwidth'] = 'Amplada preferida';
$string['press_to_submit'] = 'Prem per llaçar aquesta activitat';
$string['privacy'] = 'Privacitat';
$string['quickgrade'] = 'Permet la qualificació fàcil';
$string['quickgrade_help'] = 'Si s\'habilita, eines múltiples podran qualificar en cada pàgina. Afegeix qualificacions i comentaris i llavors prem el botó "Desa tota la meva realimentació" per desar tots els canvis per aquesta pàgina.';
$string['redirect'] = 'Sereu redireccionat en pocs segons. Si no sou redireccionat, premeu el botó.';
$string['reject'] = 'Rebutja';
$string['rejected'] = 'Rebutjat';
$string['resource'] = 'Recurs';
$string['resourcekey'] = 'Clau';
$string['resourcekey_admin'] = 'Clau (admin)';
$string['resourcekey_admin_help'] = 'La clau permet a l\'usuari autenticar-se per accedir a l\'eina. Pot utilitzar-se sols per identificar el lloc Moodle des del qual els usuaris llancen l\'eina.

La clau serà proporcionada pel proveïdor de l\'eina. El mètode d\'obtenció d\'una clau varia entre els proveïdors d\'eines. Pot ser un procés automatitzat, o pot caldre el diàleg amb el proveïdor de l\'eina.

Les eines que no utilitzen la comunicació segura amb Moodle i no proporcionen serveis addicionals ( com els informes de qualificacions) no els cal l\'ús de la clau.';
$string['resourcekey_help'] = 'A les eines preconfigurades, no serà necessari entrar la clau, si la clau ha sigut proporcionada durant el procés de configuració.

El camp s\'hauria de crear si la creació de l\'enllaç amb l\'eina no ha estat configurat. Si l\'eina es utilitzada més d\'una vegada al curs es una bona idea afegir la configuració de l\'eina per al curs.

La clau s\'utilitza pels usuaris per autenticar l\'accés a l\'eina.  Pot ser utilitzada per identificar sols el lloc Moodle on els usuaris llancen l\'eina.

La clau cal que sigui proporcionada pel proveïdor de l\'eina. El mètode d\'obtenció de la clau varia entre els proveïdors. Pot ser un procés automàtic, o caldre el diàleg amb el proveïdor de l\'eina.

Eines que no requereixen la comunicació segura amb Moodle i que no proporcionen serveis addicionals (com els informes de qualificacions) no requeriran l\'ús de la clau.';
$string['resourceurl'] = 'URL del recurs';
$string['return_to_course'] = 'Prem <a href="{$a->link}" target="_top">aquí</a> per tornar al curs.';
$string['saveallfeedback'] = 'Desa totes les meves realimentacions';
$string['secure_icon_url'] = 'Icona de URL segura';
$string['secure_icon_url_help'] = 'Semblant a la icona de URL però utilitzada quan l\'usuari accedeix a Moodle mitjançant SSL. El propòsit principal per aquest camp es previndre amb un avís a l\'usuari al navegador que ha accedit amb SSL, i preguntant-li si vol mostrar una imatge insegura.';
$string['secure_launch_url'] = 'URL de llançament segur';
$string['secure_launch_url_help'] = 'Semblant al llançament URL, però utilitzat quan el llançament de alta seguretat és obligatòri. Moodle utilitzarà el llançament de URL segura en lloc del llançament URL si el lloc Moodle s\'accedeix amb SSL, o si la eina de configuració està configurada per llançar sempre mitjançant SSL.

El llançament de URL pot també configurar-se cap una adreça https de forma obligatòria i aquest camp és deixarà en blanc.';
$string['send'] = 'Envia';
$string['setupoptions'] = 'Opcions de configuració';
$string['share_email'] = 'Comparteix el llançador de correus electrònics amb l\'eina';
$string['share_email_admin'] = 'Comparteix el llançador de correus electrònics amb l\'eina (admin)';
$string['share_email_admin_help'] = 'Especifica de quina forma l\'adreça de correu de l\'usuari que llança l\'eina serà compartida amb el proveïdor de l\'eina.
L\'eina pot necessitar adreces de correu dels usuaris per distingir usuaris amb el mateix nom a la UI o enviar correus electrònics als usuaris basades en les accions de l\'eina.';
$string['share_email_help'] = 'Especifica de quina forma l\'adreça de correu de l\'usuari que llança l\'eina serà compartida amb el proveïdor de l\'eina.
L\'eina pot necessitar adreces de correu dels usuaris per distingir usuaris amb el mateix nom  o enviar correus electrònics als usuaris basades en les accions de l\'eina.

Fixeu-vos que aquesta paràmetre pot ser sobreescrit en la configuració de l\'eina.';
$string['share_name'] = 'Comparteix el noms dels llançadors amb l\'eina';
$string['share_name_admin'] = 'Comparteix el noms dels llançadors amb l\'eina';
$string['share_name_admin_help'] = 'Especifica de quina forma el nom complet de l\'usuari que llança l\'eina serà compartida amb el proveïdor de l\'eina.
L\'eina pot necessitar els noms dels llançadors per mostrar informació significativa dins de l\'eina.';
$string['share_name_help'] = 'Especifica de quina forma el nom complet de l\'usuari que llança l\'eina serà compartida amb el proveïdor de l\'eina. L\'eina pot necessitar els noms dels llançadors per mostrar informació significativa dins de l\'eina.

Fixeu-vos que aquest paràmetre pot ser sobreescrit en la configuració de l\'eina.';
$string['share_roster'] = 'Permet a l\'eina l\'accés a aquesta llista del curs';
$string['share_roster_admin'] = 'L\'eina pot accedir a la llista del curs';
$string['share_roster_admin_help'] = 'Especifica de quina forma l\'eina pot accedir a la llista d\'usuaris inscrits al curs des que l\'eina es llançada.';
$string['share_roster_help'] = 'Especifica de quina forma l\'eina pot accedir a la llista d\'usuaris inscrits  a aquest curs.

Fixeu-vos que aquest paràmetre pot ser sobreescrit en la configuració de l\'eina.';
$string['show_in_course'] = 'Mostra el tipus d\'eina quan es creïn instàncies d\'eina.';
$string['show_in_course_help'] = 'Si ho seleccioneu, aquesta configuració d\'eina apareixerà en el desplegable "Tipus d\'eina externa" quan els professors configuren eines externes dins dels seus cursos.

En molts casos, aquesta opció no cal que sigui seleccionada. Els professors poden utilitzar la configuració d\'eina basada en el llançament de URL cercant l\'eina basada en URL, la qual és el mètode preferit.

El únic cas en el qual aquesta opció hauria de ser seleccionada és si la configuració de l\'eina es fa sols per una mostra. Per exemple, si tots els llançaments de l\'eina porten l\'usuari a una pàgina de prova en lloc de a un recurs especific.';
$string['size'] = 'Mida dels parametres';
$string['submission'] = 'Submissió';
$string['submissions'] = 'Trameses';
$string['toggle_debug_data'] = 'Commuta dades de depuració';
$string['tool_config_not_found'] = 'La configuració de l\'eina no s\'ha trobat per aquesta URL';
$string['tool_settings'] = 'Configuració de l\'eina';
$string['toolsetup'] = 'Configuració de l\'eina externa';
$string['toolurl'] = 'URL base de l\'eina';
$string['toolurl_help'] = 'La URL base de l\'eina s\'utilitza per cercar URLs de llançament de eines per configurar correctament l\'eina.
Posar el prefix amb http(s) és opcional.

A més amés, la URL base s\'utilitza com URL de llançament si la URL de llançament no està especificada en la instància de l\'eina externa.

 <table>
<thead>
<tr>
<td>
<b>URL base</b>
 </td>
 <td>
<b>Cerques</b>
 </td>
 </tr>
</thead>
<tbody>
<tr>
<td> tool.com </td>
 <td> tool.com, tool.com/quizzes, tool.com/quizzes/quiz.php?id=10, www.tool.com/quizzes </td>
 </tr>
 <tr>
<td> www.tool.com/quizzes
</td>
<td> tool.com/quizzes, tool.com/quizzes/take.php?id=10, www.tool.com/quizzes
</td>
</tr>
<tr>
<td> quiz.tool.com
</td>
<td> quiz.tool.com, quiz.tool.com/take.php?id=10
</td>
 </tr>
</tbody>
 </table>

Si dos configuracions d\'eines tenen el mateix domini, s\'usarà la cerca més especifica.';
$string['typename'] = 'Nom de l\'eina';
$string['typename_help'] = 'El nom de l\'eina s\'utilitza per identificar el proveïdor de l\'eina dins de Moodle. Els nom entrat serà visible per als professors quan afegeixin eines noves dins dels cursos.';
$string['types'] = 'Tipus';
$string['update'] = 'Actualitza';
$string['using_tool_configuration'] = 'S\'està utilitzant la configuració de l\'eina:';
$string['validurl'] = 'Una URL vàlida cal que comenci amb http(s)://';
$string['viewsubmissions'] = 'Mostra enviaments i qualificacions a la pantalla';
