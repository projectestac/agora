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
 * Strings for component 'scorm', language 'gl', branch 'MOODLE_24_STABLE'
 *
 * @package   scorm
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activation'] = 'Activación';
$string['activityloading'] = 'Vostede será encamiñado automaticamente á actividade en';
$string['activitypleasewait'] = 'Cargando a actividade, agarde ...';
$string['adminsettings'] = 'Configuración de administración';
$string['advanced'] = 'Parámetros';
$string['aicchacpkeepsessiondata'] = 'Datos de sesión AICC HACP';
$string['aicchacpkeepsessiondata_desc'] = 'Período de tempo en días no que se manterán os datos da sesión externa AICC HACP (un valor alto encherá a táboa con datos antigos, mais pode ser útil á hora de depurar)';
$string['aicchacptimeout'] = 'Tempo de espera AICC HACP';
$string['aicchacptimeout_desc'] = 'Período de tempo en minutos no se manterá aberta que unha sesión externa AICC HACP';
$string['allowapidebug'] = 'Activar a depuración e o seguimento do API (axustar a máscara de captura con apidebugmask)';
$string['allowtypeaicchacp'] = 'Activar AICC HACP externo';
$string['allowtypeaicchacp_desc'] = 'Se está activado, permite comunicacións externas AICC HACP sen requirir o acceso do usuario para facer peticións dun paquete AICC externo';
$string['allowtypeexternal'] = 'Activar o tipo de paquete externo';
$string['allowtypeexternalaicc'] = 'Activar URL AICC directo';
$string['allowtypeexternalaicc_desc'] = 'Se está activado, permite un URL directo a un paquete simple AICC';
$string['allowtypeimsrepository'] = 'Activar o tipo de paquete IMS';
$string['allowtypelocalsync'] = 'Activar o tipo de paquete descargado';
$string['apidebugmask'] = 'Máscara de captura de depuración API; empregue unha expresión regular simple en &lt;username&gt;:&lt;activityname&gt; p.ex. admin:.* para depurar só o usuario admin';
$string['areacontent'] = 'Ficheiros de contidos';
$string['areapackage'] = 'Ficheiro de paquete';
$string['asset'] = 'Recurso';
$string['assetlaunched'] = 'Recurso - Visto';
$string['attempt'] = 'Intentar';
$string['attempt1'] = '1 intento';
$string['attempts'] = 'Intento';
$string['attemptsx'] = '{$a} intentos';
$string['attr_error'] = 'Valor incorrecto para o atributo ({$a->attr}) na etiqueta {$a->tag}.';
$string['autocontinue'] = 'Continuación automática';
$string['autocontinuedesc'] = 'Esta preferencia estabelece a continuación automática predeterminada da actividade';
$string['autocontinue_help'] = 'Se está activado, os seguintes obxectos de aprendizaxe inícianse automaticamente, senón debe empregarse o botón Continuar.';
$string['averageattempt'] = 'Media de intentos';
$string['badmanifest'] = 'Algúns erros de manifesto: ver o rexistro de erros';
$string['badpackage'] = 'O paquete/manifesto non e correcto. Compróbeo e tenteo de novo.';
$string['browse'] = 'Vista previa';
$string['browsed'] = 'Examinado';
$string['browsemode'] = 'Modo de vista previa';
$string['browserepository'] = 'Examinar o repositorio';
$string['cannotfindsco'] = 'Non foi posíbel atopar SCO';
$string['chooseapacket'] = 'Escoller ou o actualizar un paquete';
$string['completed'] = 'Completado';
$string['completionscorerequired'] = 'Requirir puntuación mínima';
$string['completionscorerequired_help'] = 'Activando este axuste, requirirase que o usuario teña polo menos a puntuación mínima rexistrada para que se marque a actividade SCORM como finalizada, así como calquera outro requirimento de Finalización de actividade.';
$string['completionstatus_completed'] = 'Completado';
$string['completionstatus_passed'] = 'Aprobado';
$string['completionstatusrequired'] = 'Requirir o estado';
$string['completionstatusrequired_help'] = 'Ao marcar un ou mais estados, requirirase que o alumno cumpra polo menos con un deses estados para que se marque como finalizada esta  actividade SCORM, así como calquera outro requirimento de Finalización de actividad';
$string['confirmloosetracks'] = 'ATENCIÓN: O paquete semella ter sido modificado. Se foi cambiada a estrutura do paquete o seguimento de algúns usuarios pode terse perdido durante o proceso de actualización.';
$string['contents'] = 'Contidos';
$string['coursepacket'] = 'Paquete de curso';
$string['coursestruct'] = 'Estrutura de curso';
$string['currentwindow'] = 'Xanela actual';
$string['datadir'] = 'Erro do sistema de ficheiros: Non é posíbel crear o directorio de datos do curso';
$string['defaultdisplaysettings'] = 'Configuración predeterminada da presentación';
$string['defaultgradesettings'] = 'Configuración predeterminada da cualificación';
$string['defaultothersettings'] = 'Outras configuracións predeterminadas';
$string['deleteallattempts'] = 'Eliminar todos os intentos SCORM';
$string['deleteattemptcheck'] = 'Confirma definitivamente que quere eliminar completamente estes intentos?';
$string['deleteuserattemptcheck'] = 'Confirma definitivamente que quere eliminar todos os seus intentos?';
$string['details'] = 'Detalles do seguimento';
$string['directories'] = 'Amosar as ligazóns de directorio';
$string['disabled'] = 'Desactivado';
$string['display'] = 'Presentar o paquete';
$string['displayattemptstatus'] = 'Presentar o estado dos intentos';
$string['displayattemptstatusdesc'] = 'Esta preferencia estabelece o valor predeterminado para presentar a configuración do estado de intentos';
$string['displaycoursestructure'] = 'Presentar a estrutura do curso na páxina de entrada';
$string['displaycoursestructuredesc'] = 'Esta preferencia estabelece o valor predeterminado para presentar a estrutura do curso no axuste da páxina de entrada';
$string['displaycoursestructure_help'] = 'Se está activado, o índice presentarase na páxina de esquema SCORM.';
$string['displaydesc'] = 'Esta preferencia estabelece o valor predeterminado para presentar ou non o paquete dunha actividade';
$string['displaysettings'] = 'Configuración da presentación';
$string['dnduploadscorm'] = 'Engade un paquete SCORM';
$string['domxml'] = 'Biblioteca externa DOMXML';
$string['duedate'] = 'Data límite';
$string['element'] = 'Elemento';
$string['elementdefinition'] = 'Definición do elemento';
$string['enter'] = 'Introducir';
$string['entercourse'] = 'Introducir o curso';
$string['errorlogs'] = 'Rexisto de erros';
$string['everyday'] = 'Todos os días';
$string['everytime'] = 'Cada vez que se use';
$string['exceededmaxattempts'] = 'Acadou o número máximo de intentos';
$string['exit'] = 'Saír do curso';
$string['exitactivity'] = 'Saír da actividade';
$string['expired'] = 'Mágoa, esta actividade pechouse o {$a} e xa non está dispoñíbel';
$string['external'] = 'Actualizar os tempos dos paquetes externos';
$string['failed'] = 'Fallou';
$string['finishscorm'] = 'Se xa rematou de ver este recurso, {$a}';
$string['finishscormlinkname'] = 'prema aquí para volver á páxina do curso';
$string['firstaccess'] = 'Primeiro acceso';
$string['firstattempt'] = 'Primeiro intento';
$string['forcecompleted'] = 'Forzar finalización';
$string['forcecompleteddesc'] = 'Esta preferencia estabelece o valor predeterminado para forzar o axuste de finalización';
$string['forcecompleted_help'] = 'Se está activado, o estado do intento actual forzase a «completado». Este axuste aplicase só aos paquetes SCORM 1.2. É útil se o paquete SCORM non fai a revisión do intento correctamente, sexa na revisión ou no modo de exame, ou de producirse calquera outro funcionamento incorrecto no estado de completado';
$string['forcejavascript'] = 'Forzar aos usuarios a ter JavaScript activado';
$string['forcejavascript_desc'] = 'Se está activado (recomendado), impide o acceso aos obxectos SCORM cando JavaScript non está admitido/activado no navegador do usuario. Se está desactivado, o usuario pode ver o SCORM, mais a comunicación co API fallará e non se gardará a información da cualificación.';
$string['forcejavascriptmessage'] = 'Requírese de JavaScript para ver este obxecto, active JavaScript no seu navegador e tenteo de novo.';
$string['forcenewattempt'] = 'Forzar un novo intento';
$string['forcenewattemptdesc'] = 'Esta preferencia estabelece o valor predeterminado para forzar o axuste de novo intento';
$string['forcenewattempt_help'] = 'Se está activado, cada vez que se acceda a un paquete SCORM contarase como un novo intento.';
$string['found'] = 'Atopouse o manifesto';
$string['frameheight'] = 'Esta preferencia determina a altura predeterminada para o cadro ou xanela da etapa';
$string['framewidth'] = 'Esta preferencia determina a largura predeterminado para o cadro ou xanela da etapa';
$string['fullscreen'] = 'Encher toda a pantalla';
$string['general'] = 'Datos xerais';
$string['gradeaverage'] = 'Cualificación media';
$string['gradeforattempt'] = 'Cualificación por intento';
$string['gradehighest'] = 'Cualificación máis alta';
$string['grademethod'] = 'Método de cualificación';
$string['grademethoddesc'] = 'Esta preferencia estabelece o valor predeterminado do método de cualificación dunha actividade';
$string['grademethod_help'] = 'O método de cualificación define como se determina a cualificación dun intento único nunha actividade.

Hai 4 métodos de cualificación:

* Obxectos de aprendizaxe - Número de obxectos de aprendizaxe completados/aprobados
* Cualificación máis alta: A puntuación máxima obtida  entre todos os obxectos de aprendizaxe aprobados
* Cualificación media: A media de todas as puntuacións
* Cualificacións sumadas: A suma de todas as puntuacións';
$string['gradereported'] = 'Cualificación informada';
$string['gradescoes'] = 'Obxectos de aprendizaxe';
$string['gradesettings'] = 'Configuración da cualificación';
$string['gradesum'] = 'Cualificacións sumadas';
$string['height'] = 'Altura';
$string['hidden'] = 'Agochado';
$string['hidebrowse'] = 'Desactivar o modo de vista previa';
$string['hidebrowsedesc'] = 'Esta preferencia estabelece o valor predeterminado sobre activar o desactivar o modo de vista previa';
$string['hidebrowse_help'] = 'O modo de vista previa permite a un alumno examinar unha actividade antes de intentalo. Se o modo de vista previa está desactivado, o botón de vista previa estará agochado.';
$string['hideexit'] = 'Agochar a ligazón de saída';
$string['hidenav'] = 'Agochar os botóns de navegación';
$string['hidenavdesc'] = 'Esta preferencia estabelece o valor predeterminado sobre amosar ou non os botóns de navegación';
$string['hidereview'] = 'Agochar o botón de revisión';
$string['hidetoc'] = 'Presentar a estrutura do curso no reprodutor';
$string['hidetocdesc'] = 'Esta preferencia estabelece o valor predeterminado para amosar ou non  a estrutura do curso (índice) no reprodutor SCORM';
$string['hidetoc_help'] = 'Esta configuración especifica como se presenta o índice no reprodutor de SCORM.';
$string['highestattempt'] = 'Intento máis alto';
$string['identifier'] = 'Identificador de preguntas';
$string['incomplete'] = 'Incompleto';
$string['info'] = 'Info';
$string['interactions'] = 'Interaccións';
$string['interactionscorrectcount'] = 'Número de resultados correctos para a pregunta';
$string['interactionsid'] = 'ID do elemento';
$string['interactionslatency'] = 'Tempo transcorrido entre o momento en que se pon <br />a interacción a disposición do alumno para <br />responder e o momento da primeira resposta';
$string['interactionslearnerresponse'] = 'Resposta de aprendizaxe';
$string['interactionspattern'] = 'Patrón de resposta correcta';
$string['interactionsresponse'] = 'Resposta do alumno';
$string['interactionsresult'] = 'Resultado en base á resposta do alumno e <br />o resultado correcto';
$string['interactionsscoremax'] = 'Valor máximo no intervalo de puntuación en bruto';
$string['interactionsscoremin'] = 'Valor mínimo no intervalo de puntuación en bruto';
$string['interactionsscoreraw'] = 'Número que reflicte o resultado do alumno en relación<br /> co intervalo delimitado polos valores de mínimo e máximo';
$string['interactionssuspenddata'] = 'Fornece un espazo para almacenar e recuperar <br />datos entre sesións de aprendizaxe';
$string['interactionstime'] = 'Hora na que se iniciou o intento';
$string['interactionstype'] = 'Tipo de pregunta';
$string['interactionsweight'] = 'Ponderación asignada ao elemento';
$string['invalidactivity'] = 'A actividade SCORM é incorrecta';
$string['invalidhacpsession'] = 'Sesión HACP incorrecta';
$string['invalidmanifestresource'] = 'AVISO: Os seguintes recursos son mencionados no manifesto, mais non é posíbel atopalos:';
$string['invalidurl'] = 'Especificouse un URL incorrecto';
$string['last'] = 'Último acceso as';
$string['lastaccess'] = 'Último acceso';
$string['lastattempt'] = 'Último intento de completado';
$string['lastattemptlock'] = 'Bloquear despois do intento final';
$string['lastattemptlockdesc'] = 'Esta preferencia estabelece o valor predeterminado para o bloqueo despois de axustar o intento final';
$string['lastattemptlock_help'] = 'Se está activado, impídeselle ao alumno iniciar o reprodutor SCORM despois de ter empregado todos os intentos que tiña asignados.';
$string['location'] = 'Amosar a barra de localización';
$string['max'] = 'Puntuación máxima';
$string['maximumattempts'] = 'Número de intentos';
$string['maximumattemptsdesc'] = 'Esta preferencia estabelece o valor predeterminado sobre o número máximo de intentos nunha actividade';
$string['maximumattempts_help'] = 'Este axuste activa que o número de intentos sexa restrinxido. Isto só é aplicábel para SCORM 1.2 e paquetes AICC.';
$string['maximumgradedesc'] = 'Esta preferencia estabelece o valor predeterminado sobre a cualificación máxima dunha actividade';
$string['menubar'] = 'Amosar a barra de menú';
$string['min'] = 'Puntuación mínima';
$string['missing_attribute'] = 'Non se atopa o atributo ({$a->attr}) na etiqueta {$a->tag}';
$string['missingparam'] = 'Un elemento requirido falta ou é erroneo';
$string['missing_tag'] = 'Non se atopa a etiqueta {$a->tag}';
$string['mode'] = 'Modo';
$string['modulename'] = 'Paquete SCORM';
$string['modulename_help'] = 'Un paquete SCORM é un conxunto de ficheiros que se empaquetan segundo unha norma acordada para os obxectos de aprendizaxe. O módulo de actividade SCORM activa os paquetes SCORM ou AICC para seren cargados como un ficheiro zip e engadilos a un curso.

O contido amosase normalmente en varias páxinas, con navegación entre as páxinas. Hai varias opcións para ver o contido nunha xanela emerxente, cun índice, con botóns navegación, etc. As actividades SCORM xeralmente inclúen preguntas, con cualificacións que se rexistran no libro de cualificacións.

As actividades de SCORM pódense empregar

* Para a presentación de contidos multimedia e animacións
* Como unha ferramenta de avaliación';
$string['modulename_link'] = 'mod/scorm/view';
$string['modulenameplural'] = 'Paquetes SCORM';
$string['navigation'] = 'Navegación';
$string['newattempt'] = 'Comezar un novo intento';
$string['next'] = 'Continuar';
$string['noactivity'] = 'Non hai nada que informar';
$string['noattemptsallowed'] = 'Número de intentos permitidos';
$string['noattemptsmade'] = 'Número de intentos realizados';
$string['no_attributes'] = 'A etiqueta {$a->tag} debe ter atributos';
$string['no_children'] = 'A etiqueta {$a->tag} debe ter fillas';
$string['nolimit'] = 'Intentos ilimitados';
$string['nomanifest'] = 'Non se atopou o manifesto';
$string['noprerequisites'] = 'Sentímolo, mais vostede non acadou os requisitos previos para acceder a este obxecto de aprendizaxe';
$string['noreports'] = 'Non hai informes que presentar';
$string['normal'] = 'Normal';
$string['noscriptnoscorm'] = 'O seu navegador non admite JavaScript, ou ten a opción JavaScript desactivada. Este paquete SCORM non pode reproducir ou gardar os datos correctamente.';
$string['notattempted'] = 'Sen intentos';
$string['not_corr_type'] = 'Non coincide o tipo para a etiqueta {$a->tag}';
$string['notopenyet'] = 'Mágoa, esta actividade non está dispoñíbel ata {$a}';
$string['objectives'] = 'Obxectivos';
$string['optallstudents'] = 'todos os usuarios';
$string['optattemptsonly'] = 'só usuarios con intentos';
$string['options'] = 'Opcións (non admitidas por algúns navegadores)';
$string['optionsadv'] = 'Opcións (Avanzadas)';
$string['optionsadv_desc'] = 'Se está marcada, a xanela de opcións estabelecese como opcións avanzadas no formulario';
$string['optnoattemptsonly'] = 'só usuarios sen intentos';
$string['organization'] = 'Organización';
$string['organizations'] = 'Organizacións';
$string['othersettings'] = 'Configuración adicional';
$string['othertracks'] = 'Outros seguimentos';
$string['package'] = 'Ficheiro de paquete';
$string['packagedir'] = 'Erro do sistema de ficheiros: Non é posíbel crear o directorio de paquetes';
$string['packagefile'] = 'Non especificou ningún ficheiro de paquete';
$string['package_help'] = 'O ficheiro de paquete é un arquivo zip (ou pif) que conten ficheiros de definición do curso SCORM/AICC.';
$string['packageurl'] = 'URL';
$string['packageurl_help'] = 'Este axuste activa un URL para especificar o paquete SCORM no canto de escoller un ficheiro a través do selector de ficheiros.';
$string['page-mod-scorm-x'] = 'Calquera páxina do módulo SCORM';
$string['pagesize'] = 'Tamaño da páxina';
$string['passed'] = 'Aprobado';
$string['php5'] = 'PHP 5 (biblioteca nativa DOMXML)';
$string['pluginadministration'] = 'Administración SCORM/AICC';
$string['pluginname'] = 'Paquete SCORM';
$string['popup'] = 'Nova xanela';
$string['popupmenu'] = 'Nun menú emerxente';
$string['popupopen'] = 'Abrir o paquete nunha xanela nova';
$string['popupsblocked'] = 'Semella que están bloqueadas as xanelas emerxentes, detendo a execución deste módulo SCORM. Comprobe a configuración do navegador antes de comezar de novo.';
$string['position_error'] = 'A etiqueta {$a->tag} non pode ser filla da etiqueta {$a->parent}';
$string['preferencespage'] = 'Preferencias só para esta páxina';
$string['preferencesuser'] = 'Preferencias para este informe';
$string['prev'] = 'Anterior';
$string['raw'] = 'Puntuación en bruto';
$string['regular'] = 'Manifesto normal';
$string['report'] = 'Informe';
$string['reportcountallattempts'] = '{$a->nbattempts} intentos de {$a->nbusers} usuarios, dun total de {$a->nbresults} resultados';
$string['reportcountattempts'] = '{$a->nbresults} resultados ({$a->nbusers} users)';
$string['reports'] = 'Informes';
$string['resizable'] = 'Permitir o cambio de tamaño da xanela';
$string['result'] = 'Resultado';
$string['results'] = 'Resultados';
$string['review'] = 'Revisar';
$string['reviewmode'] = 'Modo revisión';
$string['scoes'] = 'Obxectos de aprendizaxe';
$string['score'] = 'Puntuación';
$string['scorm:addinstance'] = 'Engadir un paquete novo de SCORM';
$string['scormcourse'] = 'Curso de aprendizaxe';
$string['scorm:deleteownresponses'] = 'Eliminar os seus intentos';
$string['scorm:deleteresponses'] = 'Eliminar intentos SCORM';
$string['scormloggingoff'] = 'Acceso ao API desconectado';
$string['scormloggingon'] = 'Acceso ao API conectado';
$string['scormresponsedeleted'] = 'Eliminados os intentos do usuario';
$string['scorm:savetrack'] = 'Gardar seguimentos';
$string['scorm:skipview'] = 'Omitir a vista xeral';
$string['scormtype'] = 'Tipo';
$string['scormtype_help'] = 'Este axuste determina como se inclúe o paquete no el curso. Hai 4 opcións:

* Paquete enviado - Posibilita escoller un paquete SCORM por medio do selector de ficheiros
* Manifesto SCORM externo - Posibilita especificar un URL imsmanifest.xml. Nora: Se o URL ten un nome de dominio distinto do do seu sitio, entón a mellor opción é «Paquete descargado», xa que noutro caso as cualificacións non son gardadas.
* Paquete descargado - Posibilita especificar un URL do paquete. O paquete será descomprimido e gardado localmente, e actualizado cando se actualice o paquete SCORM externo.
* Repositorio local de contido IMS - Posibilita seleccionar un paquete dun repositorio IMS.
* URL AICC externo - Este URL é o URL de execución para unha soa actividade AICC. Construirase un pseudo paquete arredor del.';
$string['scorm:viewreport'] = 'Ver informes';
$string['scorm:viewscores'] = 'Ver puntuacións';
$string['scrollbars'] = 'Permitir o desprazamento na xanela';
$string['selectall'] = 'Seleccionar todo';
$string['selectnone'] = 'Desmarcar todo';
$string['show'] = 'Amosar';
$string['sided'] = 'Lateral';
$string['skipview'] = 'Omitir para o alumno a páxina de estrutura de contidos';
$string['skipviewdesc'] = 'Esta preferencia estabelece o valor predeterminado sobre cando omitir a estrutura do contido dunha páxina';
$string['skipview_help'] = 'Este axuste especifica se a páxina de estrutura de contido nunca debe ser omitido (non se presenta). Se o paquete conten só un obxecto de aprendizaxe, a páxina de estrutura de contidos pódese omitir sempre.';
$string['slashargs'] = 'AVISO: os argumentos «slash» (barrados) están desactivados neste sitio e é probábel que os obxectos non se comporten como se agarda.';
$string['stagesize'] = 'Tamaño da etapa';
$string['stagesize_help'] = 'Estes dous axustes definen a altura e a largura do marco ou xanela do obxecto de aprendizaxe.</p>';
$string['started'] = 'Arrancado o';
$string['status'] = 'Estado';
$string['statusbar'] = 'Amosar a barra de estado';
$string['student_response'] = 'Resposta';
$string['subplugintype_scormreport'] = 'Informe';
$string['subplugintype_scormreport_plural'] = 'Informes';
$string['suspended'] = 'Suspendido';
$string['syntax'] = 'Erro de sintaxe';
$string['tag_error'] = 'Etiqueta descoñecida ({$a->tag}) con este contido: {$a->value}';
$string['time'] = 'Hora';
$string['title'] = 'Título';
$string['toc'] = 'Índice';
$string['toolbar'] = 'Amosar a barra de ferramentas';
$string['too_many_attributes'] = 'A etiqueta {$a->tag} ten atributos de máis';
$string['too_many_children'] = 'A etiqueta {$a->tag} ten fillos de máis';
$string['totaltime'] = 'Hora';
$string['trackingloose'] = 'ATENCIÓN: Os datos de seguimento deste paquete perderanse!';
$string['type'] = 'Tipo';
$string['typeaiccurl'] = 'URL AICC externo';
$string['typeexternal'] = 'Manifiesto SCORM externo';
$string['typeimsrepository'] = 'Repositorio de contido IMS local';
$string['typelocal'] = 'Paquete enviado';
$string['typelocalsync'] = 'Paquete descargado';
$string['unziperror'] = 'Produciuse un erro durante a descompresión do paquete';
$string['updatefreq'] = 'Frecuencia de actualización automática';
$string['updatefreqdesc'] = 'Esta preferencia estabelece o valor predeterminado sobre a frecuencia de actualización automática dunha actividade';
$string['updatefreq_help'] = 'Isto permite que o paquete externo poida ser descargado e actualizado automaticamente';
$string['validateascorm'] = 'Validar un paquete';
$string['validation'] = 'Resultado da validación';
$string['validationtype'] = 'Esta preferencia estabelece que sexa empregada a biblioteca DOMXML para validar un Manifesto SCORM. Se ten dúbidas, deixe a opción seleccionada.';
$string['value'] = 'Valor';
$string['versionwarning'] = 'A versión do manifesto é anterior á 1.3, atención á etiqueta {$a->tag}';
$string['viewallreports'] = 'Ver informes para {$a} intentos';
$string['viewalluserreports'] = 'Ver os informes de {$a} usuarios';
$string['whatgrade'] = 'Intentos de cualificación';
$string['whatgradedesc'] = 'Esta preferencia estabelece o valor predeterminado sobre a cualificación de intentos';
$string['width'] = 'Largura';
$string['window'] = 'Xanela';
