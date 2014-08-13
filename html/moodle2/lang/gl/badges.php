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
 * Strings for component 'badges', language 'gl', branch 'MOODLE_26_STABLE'
 *
 * @package   badges
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actions'] = 'Accións';
$string['activate'] = 'Activar o acceso';
$string['activatesuccess'] = 'O acceso ás distincións activouse correctamente.';
$string['addbadgecriteria'] = 'Engadir criterios para distinción';
$string['addcourse'] = 'Engadir cursos';
$string['addcourse_help'] = 'Seleccionar todos os curso que deberían engadirse a este requirimento de distinción. Manteña premida a tecla CTRL para seleccionar múltiplos elementos.';
$string['addcriteria'] = 'Engadir criterios';
$string['addcriteriatext'] = 'Para comezar a engadir criterios, seleccione unha das opcións do menú despregábel.';
$string['addtobackpack'] = 'Engadir á mochila';
$string['adminonly'] = 'Esta páxina é de acceso restrinxido só para administradores.';
$string['after'] = 'despois da data recepción.';
$string['aggregationmethod'] = 'Método de agregación';
$string['all'] = 'Todos';
$string['allmethod'] = 'Dánse todas as condicións seleccionadas';
$string['allmethodactivity'] = 'Todas as actividades seleccionadas están completas';
$string['allmethodcourseset'] = 'Todos os cursos seleccionados están completos';
$string['allmethodmanual'] = 'Todos os roles seleccionados reciben a distinción';
$string['allmethodprofile'] = 'Completáronse todos os campos do perfil seleccionado';
$string['allowcoursebadges'] = 'Activar as distincións de curso';
$string['allowcoursebadges_desc'] = 'Permitir que se creen distincións e se concedan no contexto do curso.';
$string['allowexternalbackpack'] = 'Activar a conexión con mochilas externas';
$string['allowexternalbackpack_desc'] = 'Permitir que os usuarios estabelezan conexións e presenten as distincións dos seus fornecedores externos de mochilas.

Nota: Recoméndase deixar esta opción desactivada se non é posíbel acceder ao sitio web desde Internet (i.e. por culpa da devasa).';
$string['any'] = 'Calquera';
$string['anymethod'] = 'Dánse algunha das condicións seleccionadas';
$string['anymethodactivity'] = 'Algunha das actividades seleccionadas están completas';
$string['anymethodcourseset'] = 'Algún dos cursos seleccionados están completos';
$string['anymethodmanual'] = 'Algún dos roles seleccionados reciben a distinción';
$string['anymethodprofile'] = 'Completáronse algúns dos campos do perfil seleccionado';
$string['attachment'] = 'Anexar a distinción á mensaxe';
$string['attachment_help'] = 'De estar marcado, anexarase a distinción recibida ao correo do destinatario para a súa descarga. (teñen que estar activados os anexos en Administración do sitio > Engadidos > Mensaxes saíntes > Correo para poder usar esta opción)';
$string['award'] = 'Distinción recibida';
$string['awardedtoyou'] = 'Emitida para min';
$string['awardoncron'] = 'Activouse correctamente o acceso ás distincións. Moitos dos usuarios poden gañar instantaneamente esta distinción. Para asegurar o rendemento do sitio, esta acción procesarase con tempo.';
$string['awards'] = 'Destinatarios';
$string['backpackavailability'] = 'Comprobación da distinción externa';
$string['backpackavailability_help'] = 'Para que os destinatarios de distincións poidan probar que gañaron as súas distincións, un servizo de mochila externa debe acceder ao seu sitio para comprobar as distincións emitidas desde el. Actualmente, o seu sitio no parece que sexa accesíbel neste momento, o que significa que as distincións que emitise ou que se emitan no futuro no se poderán comprobar.

##Por que estou a ver esta mensaxe?

Pode ser que a súa devasa impida o acceso de usuarios externos á súa rede, que o seu sitio estea protexido por contrasinal, o que estea executando o sitio nun computador que no está dispoñíbel na Internet (como una máquina local para o desenvolvemento).

##É isto un problema?

Debería solucionar esta incidencia en todos os sitios en produción onde pretenda emitir distincións, do contrario os destinatarios no serán quen de probar que gañaron as distincións que vostede emite. No caso de que o seu sitio non estea aínda activo pode crear e emitir distincións de proba, en tanto que o sitio estea accesíbel antes de poñelo en produción.

##Que pasa se non consigo facer que todo o meu sitio sexa accesíbel publicamente?

O único URL necesario para a comprobación é [url-do-seu-sitio]/badges/assertion.php, así que se vostede pode modificar a devasa para permitir o acceso externo a ese ficheiro, seguirá funcionando a comprobación das distincións.';
$string['backpackbadges'] = 'Ten {$a->totalbadges} distinción(s) en pantalla de {$a->totalcollections} colección(s). <a href="mybackpack.php">Cambiar a configuración da mochila</a>.';
$string['backpackconnection'] = 'Conexión coa mochila';
$string['backpackconnection_help'] = 'Esta páxina permítelle configurar conexións a un fornecedor externo de mochilas. A conexión cunha mochila permítelle presentar en pantalla distincións externas dentro deste sitio e enviar as distincións gañadas á súa mochila.

Actualmente, soamente é compatíbel <a href="http://backpack.openbadges.org">Mozilla OpenBadges Backpack</a>. Cómpre que se rexistre nun servizo de mochila antes de tentar configurar unha conexión de mochila nesta páxina.';
$string['backpackdetails'] = 'Configuración da mochila';
$string['backpackemail'] = 'Enderezo de correo';
$string['backpackemail_help'] = 'Enderezo de correo asociado coa súa mochila. Mentres estea conectado, as distincións gañadas neste sitio asociaranse con esta conta de correo.';
$string['backpackimport'] = 'Configuración de importación de distinción';
$string['backpackimport_help'] = 'Tras unha conexión de mochila correcta, as distincións da súa mochila presentaranse na súa páxina «Distincións persoais» e na súa páxina de perfil.

Nesta área, pode seleccionar as coleccións de distincións da súa mochila que lle gustaría presentar no seu perfil.';
$string['badgedetails'] = 'Detalles da distinción';
$string['badgeimage'] = 'Imaxe';
$string['badgeimage_help'] = 'Esta é unha imaxe que se utilizará cando se emita a distinción.

Para engadir unha nova imaxe, navegue e seleccione unha imaxe (en formato JPG ou PNG), logo prema en «Gardar cambios». A imaxe recórtase en cadrado e redimensiónase para coincidir cos requirimentos das imaxes das distincións.';
$string['badgeprivacysetting'] = 'Configuración de privacidade da distinción';
$string['badgeprivacysetting_help'] = 'As distincións que gañe poden presentarse na súa páxina de perfil. Esta configuración permítelle estabelecer automaticamente a visibilidade de novas distincións gañadas.

Aínda pode controlar a configuración de distincións privadas individuais na súa páxina «Distincións persoais».';
$string['badgeprivacysetting_str'] = 'Amosar automaticamente as distincións que gañe na miña páxina de perfil';
$string['badgesalt'] = 'Salgar para a cadea de control do enderezo de correo do receptor';
$string['badgesalt_desc'] = 'A utilización dunha cadea de control permítelle aos servizos de mochila confirmar o gañador da distinción sen ter que expoñer o seu enderezo de correo. Esta configuración só debería utilizar números e letras.

Nota: A efecto de verificar o destinatario, evite cambiar esta configuración unha ves comece a emisión de distincións.';
$string['badgesdisabled'] = 'As distincións non están activas neste sitio.';
$string['badgesearned'] = 'Número de distincións gañadas: {$a}';
$string['badgesettings'] = 'Configuración de distincións';
$string['badgestatus_0'] = 'Non está dispoñíbel para os usuarios';
$string['badgestatus_1'] = 'Dispoñíbel para os usuarios';
$string['badgestatus_2'] = 'Non está dispoñíbel para os usuarios';
$string['badgestatus_3'] = 'Dispoñíbel para os usuarios';
$string['badgestatus_4'] = 'Arquivado';
$string['badgestoearn'] = 'Número de distincións dispoñíbeis: {$a}';
$string['badgesview'] = 'Distincións do curso';
$string['badgeurl'] = 'Ligazón da distinción emitida';
$string['bawards'] = 'Destinatarios ({$a})';
$string['bcriteria'] = 'Criterios';
$string['bdetails'] = 'Editar os detalles';
$string['bmessage'] = 'Mensaxe';
$string['boverview'] = 'Vista xeral';
$string['bydate'] = 'completado por';
$string['clearsettings'] = 'Limpar a configuración';
$string['completioninfo'] = 'Esta distinción emitiuse polo completado de:';
$string['completionnotenabled'] = 'O completado do curso non está activado para este curso, así non é posíbel incluílo nos criterios da distinción. O completado do curso pode activarse na configuración do curso.';
$string['configenablebadges'] = 'Cando está activada, esta funcionalidade permítelle crear distincións e premiar con elas aos usuarios do sitio.';
$string['configuremessage'] = 'Mensaxe da distinción';
$string['connect'] = 'Conectar';
$string['connected'] = 'Conectado';
$string['connecting'] = 'Conectando...';
$string['contact'] = 'Contacto';
$string['contact_help'] = 'Un enderezo de correo asociado co emisor da distinción.';
$string['copyof'] = 'Copia de {$a}';
$string['coursebadges'] = 'Distincións';
$string['coursebadgesdisabled'] = 'As distincións do curso non están activas neste sitio.';
$string['coursecompletion'] = 'Os alumnos deben completar este curso.';
$string['create'] = 'Nova distinción';
$string['createbutton'] = 'Crear unha distinción';
$string['creatorbody'] = '<p>{$a->user} completou todos os requirimentos da distinción e premióuselle coa distinción. Ver a distinción emitida en {$a->link} </p>';
$string['creatorsubject'] = '«{$a}» ven de ser premiado!';
$string['criteria_0'] = 'Esta distinción concédese cando...';
$string['criteria_1'] = 'Completado da actividade';
$string['criteria_1_help'] = 'Permite conceder unha distinción a usuario baseada no completado dun conxunto de actividades dentro dun curso.';
$string['criteria_2'] = 'Emisión manual por rol';
$string['criteria_2_help'] = 'Permite conceder unha distinción manualmente a usuarios que teñan un rol particular dentro do sitio ou curso.';
$string['criteria_3'] = 'Participación social';
$string['criteria_3_help'] = 'Social';
$string['criteria_4'] = 'Completado do curso';
$string['criteria_4_help'] = 'Permite conceder unha distinción a usuarios que completasen o curso. Este criterio pode ter parámetros adicionais como unha cualificación mínima e unha data de completado do curso.';
$string['criteria_5'] = 'Completando un conxunto de cursos';
$string['criteria_5_help'] = 'Permite conceder unha distinción a usuarios que completasen un conxunto de cursos. Cada curso pode ter parámetros adicionais como unha cualificación mínima e unha data de completado do curso.';
$string['criteria_6'] = 'Perfil de completado';
$string['criteria_6_help'] = 'Permite conceder unha distinción a usuarios por completar certos campos no seu perfil. Pode seleccionar tanto campos personalizados como predeterminados do perfil que están dispoñíbeis para os usuario.';
$string['criteriacreated'] = 'Criterios das distincións creados correctamente';
$string['criteriadeleted'] = 'Criterios das distincións eliminados correctamente';
$string['criteria_descr'] = 'Os alumnos reciben esta distinción cando completan o seguinte requirimento:';
$string['criteria_descr_0'] = 'Os alumnos reciben esta distinción cando completan <strong>{$a}</strong> dos requirimentos listados.';
$string['criteria_descr_1'] = '<strong>{$a}</strong> das actividades seguintes están completadas:';
$string['criteria_descr_2'] = 'Esta distinción debe concederse aos usuarios con <strong>{$a}</strong> dos seguintes roles:';
$string['criteria_descr_4'] = 'Os alumnos deben completar o curso';
$string['criteria_descr_5'] = '<strong>{$a}</strong> dos seguintes cursos teñen que ser completados:';
$string['criteria_descr_6'] = '<strong>{$a}</strong> dos seguinte campos do perfil do usuario teñen que ser completados:';
$string['criteria_descr_bydate'] = 'por <em>{$a}</em>';
$string['criteria_descr_grade'] = 'cunha cualificación mínima de <em>{$a}</em>';
$string['criteria_descr_short0'] = 'Completar <strong>{$a}</strong> de:';
$string['criteria_descr_short1'] = 'Completar <strong>{$a}</strong> de:';
$string['criteria_descr_short2'] = 'Concedida por <strong>{$a}</strong> de:';
$string['criteria_descr_short4'] = 'Completar o curso';
$string['criteria_descr_short5'] = 'Completar <strong>{$a}</strong> de:';
$string['criteria_descr_short6'] = 'Completar <strong>{$a}</strong> de:';
$string['criteria_descr_single_1'] = 'Ten que completar a seguinte actividade:';
$string['criteria_descr_single_2'] = 'Debe concederse esta distinción ao usuario co seguinte rol:';
$string['criteria_descr_single_4'] = 'Os alumnos deben completar este curso';
$string['criteria_descr_single_5'] = 'Ten que completar o seguinte curso:';
$string['criteria_descr_single_6'] = 'Ten que completar o seguinte campo do perfil de usuario:';
$string['criteria_descr_single_short1'] = 'Completar:';
$string['criteria_descr_single_short2'] = 'Concedido por:';
$string['criteria_descr_single_short4'] = 'Completar o curso';
$string['criteria_descr_single_short5'] = 'Completar:';
$string['criteria_descr_single_short6'] = 'Completar:';
$string['criteriasummary'] = 'Resumo de criterios';
$string['criteriaupdated'] = 'Criterios das distincións actualizados correctamente';
$string['criterror'] = 'Incidencias cos parámetros actuais';
$string['criterror_help'] = 'Este conxunto de campos amosa todos os parámetros que inicialmente se lle engadiron aos requirimentos da distinción pero que xa no están dispoñíbeis. Recoméndase que estes parámetros se desactiven para asegurarse de que os alumnos poidan obter esta distinción no futuro.';
$string['currentimage'] = 'Imaxe actual';
$string['currentstatus'] = 'Estado actual:';
$string['dateawarded'] = 'Data da emisión';
$string['dateearned'] = 'Data: {$a}';
$string['day'] = 'Día(s)';
$string['deactivate'] = 'Desactivar o acceso';
$string['deactivatesuccess'] = 'O acceso ás distincións desactivouse correctamente.';
$string['defaultissuercontact'] = 'Detalles predeterminados de contacto do emisor da distinción';
$string['defaultissuercontact_desc'] = 'Un enderezo de correo asociado co emisor da distinción.';
$string['defaultissuername'] = 'Nome predeterminado do emisor da distinción';
$string['defaultissuername_desc'] = 'Nome do axente ou autoridade emisores.';
$string['delbadge'] = 'Confirma que quere eliminar a distinción «{$a}», e retirar todas as distincións emitidas xa existentes?';
$string['delconfirm'] = 'Confirma que quere eliminar a distinción «{$a}»?';
$string['delcritconfirm'] = 'Confirma que quere eliminar este criterio?';
$string['delparamconfirm'] = 'Confirma que quere eliminar este parámetro?';
$string['description'] = 'Descrición';
$string['disconnect'] = 'Desconectar';
$string['donotaward'] = 'Actualmente, esta distinción non está activa, de modo que non é posíbel concederlla aos usuarios. Se quere conceder esta distinción, poña o seu estado como activo.';
$string['editsettings'] = 'Editar a configuración';
$string['enablebadges'] = 'Activar as distincións';
$string['error:backpackdatainvalid'] = 'A data devolvida pola mochila é incorrecta';
$string['error:backpackemailnotfound'] = 'O enderezo de correo «{$a}» non está asociado a unha mochila. É necesario <a href="http://backpack.openbadges.org">crear unha mochila</a> para esa conta ou acceder con outro enderezo de correo.';
$string['error:backpackloginfailed'] = 'Non pode estar conectado a unha mochila externa pola seguinte razón: {$a}';
$string['error:backpacknotavailable'] = 'O seu sitio non é accesíbel desde a Internet, de modo que calquera distinción emitida por este sitio non é posíbel comprobala por un servizo externo de mochila.';
$string['error:backpackproblem'] = 'Hai un problema para conectar co seu fornecedor de servizo de mochila. Ténteo de novo máis adiante.';
$string['error:badjson'] = 'O intento de conexión devolveu datos incorrectos.';
$string['error:cannotact'] = 'Non foi posíbel activar a distinción.';
$string['error:cannotawardbadge'] = 'Non foi posíbel conceder a distinción a un usuario.';
$string['error:clone'] = 'Non foi posíbel clonar a distinción.';
$string['error:connectionunknownreason'] = 'Fracasou a conexión, mais non se coñecen as razóns.';
$string['error:duplicatename'] = 'Xa existe unha distinción con ese nome no sistema.';
$string['error:externalbadgedoesntexist'] = 'Non se atopa a distinción';
$string['error:guestuseraccess'] = 'Neste momento está usando o acceso para convidados. Para ver as distincións ten que acceder coa súa conta de usuario.';
$string['error:invalidbadgeurl'] = 'O formato do URL do emisor da distinción é incorrecto.';
$string['error:invalidcriteriatype'] = 'Tipo de criterio incorrecto.';
$string['error:invalidexpiredate'] = 'A data de caducidade ten que situarse no futuro.';
$string['error:invalidexpireperiod'] = 'O período de caducidade non pode ser negativo nin igual a 0.';
$string['error:noactivities'] = 'Non hai actividades con criterio de completado activado neste curso.';
$string['error:noassertion'] = 'Persona non devolveu ningunha aseveración. É probábel que pechara a xanela de diálogo antes de completar o proceso de acceso.';
$string['error:nocourses'] = 'O completado do curso non está activado en ningún dos curso deste sitio, así que non se pode presentar ningún. O completado do curso pode activarse na configuración do curso.';
$string['error:nogroups'] = '<p>Non hai coleccións públicas de distincións dispoñíbeis na súa mochila. </p>
<p>Só se amosan as coleccións públicas, <a href="http://backpack.openbadges.org">visite a súa mochila</a> para crear algunhas coleccións públicas.</p>';
$string['error:nopermissiontoview'] = 'Non ten permisos para ver os receptores de distincións';
$string['error:nosuchbadge'] = 'A distinción co ID {$a} non existe.';
$string['error:nosuchcourse'] = 'Aviso: Este curso xa non está dispoñíbel.';
$string['error:nosuchfield'] = 'Aviso: este campo de usuario xa non está dispoñíbel.';
$string['error:nosuchmod'] = 'Aviso: Esta actividade xa non está dispoñíbel.';
$string['error:nosuchrole'] = 'Aviso: Este rol xa non está dispoñíbel.';
$string['error:nosuchuser'] = 'O usuario con este enderezo de correo non ten unha conta no fornecedor de mochilas actual.';
$string['error:notifycoursedate'] = 'Aviso: As distincións asociadas co completado de curso e actividade non se emitiran ata a data de comezo do curso.';
$string['error:parameter'] = 'Aviso: Cando menos, debería seleccionarse un dos parámetros para asegurar o correcto fluxo de emisión da distinción.';
$string['error:personaneedsjs'] = 'Para conectar coa súa mochila, actualmente, requírese JavaScript. Active o JavaScript e recargue a páxina.';
$string['error:requesterror'] = 'A solicitude de conexión fracasou (código de erro {$a}).';
$string['error:requesttimeout'] = 'A solicitude de conexión esgotou o tempo antes de completarse.';
$string['error:save'] = 'Non foi posíbel gardar a distinción.';
$string['error:userdeleted'] = '{$a->user} (Este usuario xa non existe en {$a->site})';
$string['evidence'] = 'Evidencia';
$string['existingrecipients'] = 'Destinatarios de distincións existentes';
$string['expired'] = 'Caducada';
$string['expiredate'] = 'Esta distinción caduca o {$a}.';
$string['expireddate'] = 'Esta distinción caducou o {$a}.';
$string['expireperiod'] = 'Esta distinción caduca {$a} día(s) despois de ser emitida.';
$string['expireperiodh'] = 'Esta distinción caduca {$a} hora(s) despois de ser emitida.';
$string['expireperiodm'] = 'Esta distinción caduca {$a} minuto(s) despois de ser emitida.';
$string['expireperiods'] = 'Esta distinción caduca {$a} segundo(s) despois de ser emitida.';
$string['expirydate'] = 'Data de caducidade';
$string['expirydate_help'] = 'Opcionalmente, as distincións poden caducar nunha data específica, ou a data pode calcularse segundo a data na que se emitiu a distinción para un usuario.';
$string['externalbadges'] = 'As miñas distincións doutros sitios web';
$string['externalbadges_help'] = 'Esta área presenta as distincións da súa mochila externa.';
$string['externalbadgesp'] = 'Distincións doutros sitios web:';
$string['externalconnectto'] = 'Para presentar distincións persoais externas, necesita <a href="{$a}">conectar cunha mochila</a>.';
$string['fixed'] = 'Data fixa';
$string['hidden'] = 'Agochada';
$string['hiddenbadge'] = 'Desafortunadamente, o propietario da distinción non puxo esta información dispoñíbel.';
$string['issuancedetails'] = 'Caducidade da distinción';
$string['issuedbadge'] = 'Información da distinción emitida';
$string['issuerdetails'] = 'Detalles do emisor';
$string['issuername'] = 'Nome do emisor';
$string['issuername_help'] = 'Nome do axente ou autoridade emisores.';
$string['issuerurl'] = 'URL do emisor';
$string['localbadges'] = 'As miñas distincións do sitio web {$a}';
$string['localbadgesh'] = 'As miñas distincións deste sitio web';
$string['localbadgesh_help'] = 'Todas as distincións gañadas dentro deste sitio ao completar cursos, actividades de curso e outros requirimentos.

Pode xestionar as súas distincións aquí facéndoas públicas ou privadas para a súa páxina de perfil.

Pode descargar todas as súas distincións por cada páxina separadamente e gardalas no seu computador. As distincións descargadas poden engadirse ao seu servizo externo de mochila.';
$string['localbadgesp'] = 'Distinción de {$a}:';
$string['localconnectto'] = 'Para compartir estas distincións fóra deste sitio web, necesita <a href="{$a}">conectar cunha mochila</a>.';
$string['makeprivate'] = 'Facer privada';
$string['makepublic'] = 'Facer pública';
$string['managebadges'] = 'Xestionar as distincións';
$string['message'] = 'Corpo da mensaxe';
$string['messagebody'] = '<p>Concedéuselle unha distinción «% badgename»!</p>
<p>Pode atopar máis información sobre esta distinción en %badgelink%.</p>
<p>Se non atopa a distinción anexa a este correo electrónico, pode xestionala e descargala da páxina {$a}.</p>';
$string['messagesubject'] = 'Parabéns! Ven de concedérselle unha distinción!';
$string['method'] = 'Este criterio está completo cando...';
$string['mingrade'] = 'Cualificación mínima requirida';
$string['month'] = 'Mes(es)';
$string['mybackpack'] = 'Configuración da mochila persoal';
$string['mybadges'] = 'Distincións persoais';
$string['never'] = 'Nunca';
$string['newbadge'] = 'Engadir unha nova distinción';
$string['newimage'] = 'Nova imaxe';
$string['noawards'] = 'Aínda non gañou esta distinción.';
$string['nobackpack'] = 'Non hai ningún servizo de mochila conectado a esta conta.<br/>';
$string['nobackpackbadges'] = 'Non hai distincións nas coleccións que seleccionou. <a href="mybackpack.php">Engadir máis coleccións</a>.';
$string['nobackpackcollections'] = 'Non hai coleccións seleccionadas. <a href="mybackpack.php">Engadir máis coleccións</a>.';
$string['nobadges'] = 'Non hai distincións dispoñíbeis.';
$string['nocriteria'] = 'Os criterios para esta distinción aínda non foron configurados.';
$string['noexpiry'] = 'Esta distinción non ten unha data de caducidade.';
$string['noparamstoadd'] = 'Non hai parámetros adicionais dispoñíbeis para engadir a este requirimento da distinción.';
$string['notacceptedrole'] = 'O seu rol de tarefas non está entre os roles que poden emitir manualmente esta distinción.<br/>
Se lle gustaría ver usuarios que xa gañasen esta distincións, pode visitar a páxina {$a}.';
$string['notconnected'] = 'Non conectado';
$string['nothingtoadd'] = 'Non hai criterios dispoñíbeis para engadir.';
$string['notification'] = 'Notificarlle ao creador da distinción';
$string['notification_help'] = 'Esta opción xestiona as notificacións enviadas a un creador de distincións para permitirlles saber que se emitiu a distinción.

Están dispoñíbeis as seguintes opcións:

* **NUNCA** - Non enviar notificacións.

* **SEMPRE** - Enviar unha notificación cada vez que se concede esta distinción.

* **DIARIAMENTE** - Enviar notificacións unha vez cada día.

* **SEMANALMENTE** - Enviar notificacións una vez cada semana.

*** MENSUALMENTE** - Enviar notificacións unha vez cada mes.';
$string['notifydaily'] = 'Diaria';
$string['notifyevery'] = 'Sempre';
$string['notifymonthly'] = 'Mensual';
$string['notifyweekly'] = 'Semanal';
$string['numawards'] = 'Esta distinción foi emitida para <a href="{$a->link}">{$a->count}</a> usuarios(s).';
$string['numawardstat'] = 'Esta distinción foi emitida para {$a} usuario(s).';
$string['overallcrit'] = 'dos criterios seleccionados están completados.';
$string['personaconnection'] = 'Rexístrese aquí co seu correo';
$string['personaconnection_help'] = 'Persona é un sistema para a súa identificación na web, usando un enderezo de correo da súa propiedade. A mochila de Open Badges utiliza Persona como sistema de acceso, polo que para conectarse a unha mochila necesita unha conta de Persona.

Para obter máis información sobre Persona visite <a href="https://login.persona.org/about">https://login.persona.org/about</a>.';
$string['potentialrecipients'] = 'Destinatarios potenciais da distinción';
$string['recipientdetails'] = 'Detalles do receptor';
$string['recipientidentificationproblem'] = 'Non foi posíbel atopar un destinatario desta distinción entre os usuarios existentes.';
$string['recipients'] = 'Destinatarios da distinción';
$string['recipientvalidationproblem'] = 'Non é posíbel confirmar que o usuario actual é o receptor da distinción.';
$string['relative'] = 'Data relativa';
$string['requiredcourse'] = 'Cando menos, debería engadirse un curso ao criterio de conxunto de curso.';
$string['reviewbadge'] = 'Cambios no acceso as distincións';
$string['reviewconfirm'] = '<p>Con isto, fará que a súa distinción sexa visíbel para os usuarios e permítelles comezar a gañala.</p>

<p>É posíbel que algúns usuarios xa cumpran os criterios desta distinción e que se lles entregue inmediatamente despois de que a active.</p>

<p>Unha vez que a distinción sexa emitida será <strong>bloqueada</strong> - certos axustes, incluíndo os criterios e os axustes de caducidade, xa non se poderán modificar.</p>

<p>Confirma que quere permitir o acceso á distinción «{$a}»?</p>';
$string['save'] = 'Gardar';
$string['searchname'] = 'Buscar por nome';
$string['selectaward'] = 'Seleccione o rol que lle gustaría usar para emitir esta distinción:';
$string['selectgroup_end'] = 'Soamente se amosan as coleccións públicas, <a href="http://backpack.openbadges.org">visite a súa mochila</a> para crear máis coleccións públicas.';
$string['selectgroup_start'] = 'Seleccione coleccións da súa mochila que presentar neste sitio:';
$string['selecting'] = 'Coas distincións seleccionadas...';
$string['setup'] = 'Configurar a conexión';
$string['signinwithyouremail'] = 'Acceda co seu correo';
$string['sitebadges'] = 'Distincións do sitio';
$string['sitebadges_help'] = 'As distincións só poden serlles concedidas aos usuarios por actividades relacionadas co sitio. Isto inclúe o completado dunha serie de cursos ou partes dos perfís de usuarios. As distincións do sitio tamén se poden emitir manualmente dun usuario a outro.

As distincións por actividades relacionadas co curso débense crear no nivel do curso. As distincións do curso pódense atopar en Administración do curso > Distincións.';
$string['status'] = 'Estado da distinción';
$string['status_help'] = 'O estado dunha distinción determina o seu comportamento no sistema:

*** DISPOÑÍBEL ** - Significa que esta distinción a poden gañar os usuarios. Namentres unha distinción estea dispoñíbel para os usuarios, non se poden modificar os criterios.

*** NO DISPOÑÍBEL ** - Significa que esta distinción non está dispoñíbel para os usuarios e non se pode gañar nin emitir manualmente. Se esa tal distinción nunca se emitise anteriormente, pódense cambiar os criterios.

Logo de que se emita unha distinción a un primeiro usuario, pasa automaticamente a **BLOQUEADA**. Os usuarios aínda poden obter distincións bloqueadas pero os seus criterios xa no se poden cambiar. Se necesita modificar detalles ou criterios dunha distinción bloqueada, pode duplicar esta distinción e facer todos os cambios necesarios.

*Por que bloqueamos distincións?*

Queremos asegurarnos de que todos os usuarios teñan os mesmos requirimentos para gañar una distinción. Actualmente, non é posíbel revogar distincións. Se permitimos que os requirimentos das distincións se poidan modificar en calquera momento, o máis probábel é que acabemos con que ao final usuarios que teñen a mesma distinción tivesen que satisfacer requirimentos completamente diferentes.';
$string['statusmessage_0'] = 'Esta distinción non está actualmente dispoñíbel para os usuarios. Active o acceso se quere que os usuarios consigan esta distinción.';
$string['statusmessage_1'] = 'Esta distinción está actualmente dispoñíbel para os usuarios. Desactive o acceso para facer calquera cambio.';
$string['statusmessage_2'] = 'Esta distinción non está actualmente dispoñíbel para os usuarios e os seus criterios están bloqueados. Active o acceso se quere que os usuarios consigan esta distinción.';
$string['statusmessage_3'] = 'Esta distinción está actualmente dispoñíbel para os usuarios, e os seus criterios están bloqueados.';
$string['statusmessage_4'] = 'Esta distinción está arquivada actualmente.';
$string['subject'] = 'Asunto da mensaxe';
$string['variablesubstitution'] = 'Substitución de variábel nas mensaxes.';
$string['variablesubstitution_help'] = 'Nunha mensaxe de comunicación da distinción, pódense inserir algunhas variábeis no asunto e/ou no corpo da mensaxe para que se poidan substituír por valores reais cando se envía a mensaxe. As variábeis deben inserirse no texto tal e como se amosa a seguir. Pódense utilizar as seguintes variábeis:

%badgename%
:  Substituirase polo nome completo da distinción.

%username%
:  Substituirase polo nome completo do destinatario.

%badgelink%
:  Substituirase polo URL público con información sobre a distinción emitida.';
$string['viewbadge'] = 'Ver a distinción emitida';
$string['visible'] = 'Visíbel';
$string['warnexpired'] = '(Esta distinción caducou!)';
$string['year'] = 'Ano(s)';
