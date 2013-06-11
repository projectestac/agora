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
 * Strings for component 'assignment', language 'gl', branch 'MOODLE_24_STABLE'
 *
 * @package   assignment
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activityoverview'] = 'Hai tarefas que requiren da súa atención';
$string['addsubmission'] = 'Engadir entrega';
$string['allowdeleting'] = 'Permitir eliminar';
$string['allowdeleting_help'] = 'Se activa esta opción, os alumnos poderán eliminar ficheiros enviados en calquera momento antes de entregalos para cualificación.';
$string['allowmaxfiles'] = 'Número máximo de ficheiros enviados';
$string['allowmaxfiles_help'] = 'Número máximo de ficheiros que se pode enviar. Como este número non é presentado en ningún lugar, suxerímoslle que o mencione na descrición das tarefa.';
$string['allownotes'] = 'Permitir notas';
$string['allownotes_help'] = 'Se activa esta opción, os alumnos poden escribir notas nunha área de texto, como nunha tarefa de texto en liña.';
$string['allowresubmit'] = 'Permitir entregar de novo';
$string['allowresubmit_help'] = 'Se activa esta opción, os alumnos poderán entregar de novo as tarefas despois de que teñan sido cualificadas (para que poidan ser cualificadas de novo).';
$string['alreadygraded'] = 'A súa tarefa xa foi cualificada. Non se permite entregala de novo.';
$string['assignment:addinstance'] = 'Engadir unha nova tarefa';
$string['assignmentdetails'] = 'Detalles da tarefa';
$string['assignment:exportownsubmission'] = 'Exportar a propia entrega';
$string['assignment:exportsubmission'] = 'Exportar a entrega';
$string['assignment:grade'] = 'Cualificación da tarefa';
$string['assignmentmail'] = 'O profesor {$a->teacher} fixo algúns comentarios
na entrega da súa tarefa «{$a->assignment}»

Pode velos anexos a entrega da tarefa:

    {$a->url}';
$string['assignmentmailhtml'] = 'O profesor {$a->teacher} fixo algúns comentarios
na entrega da súa tarefa «<i>{$a->assignment}</i>»<br /><br />
Pode velos anexos a entrega <a href="{$a->url}">da tarefa</a>.';
$string['assignmentmailsmall'] = 'O profesor {$a->teacher} fixo algúns comentarios
na entrega da súa tarefa «{$a->assignment}». pode velos anexos a entrega da tarefa';
$string['assignmentname'] = 'Nome da tarefa';
$string['assignmentsubmission'] = 'Entrega de tarefas';
$string['assignment:submit'] = 'Entregar tarefa';
$string['assignmenttype'] = 'Tipo de tarefa';
$string['assignment:view'] = 'Ver tarefa';
$string['availabledate'] = 'Dispoñíbel desde';
$string['cannotdeletefiles'] = 'Produciuse un erro e non foi posíbel eliminar os ficheiros';
$string['cannotviewassignment'] = 'Vostede non pode ver esta tarefa';
$string['closedassignment'] = 'The submission date for this assignment has been closed.';
$string['comment'] = 'Comentario';
$string['commentinline'] = 'Comentario directo';
$string['commentinline_help'] = 'Se está activado, o texto da entrega  copiarase no campo de observacións durante a cualificación, facilitando os comentarios directos (por medio dunha cor diferente) ou a edición do texto orixinal.';
$string['configitemstocount'] = 'Natureza dos elementos que se teñen que contar para entregas dos alumnos nas tarefas en liña.';
$string['configmaxbytes'] = 'O tamaño máximo predeterminado de todas as tarefas do sitio (suxeito ao límite do curso e a outra configuración local)';
$string['configshowrecentsubmissions'] = 'Calquera pode ver as notificacións das entregas nos informes de actividade recente.';
$string['confirmdeletefile'] = 'Confirma definitivamente que quere eliminar este ficheiro?<br /><strong>{$a}</strong>';
$string['coursemisconf'] = 'O curso está mal configurado';
$string['currentgrade'] = 'Cualificación actual no libro de cualificacións';
$string['deleteallsubmissions'] = 'Eliminar todas as entregas';
$string['deletefilefailed'] = 'Non foi posíbel eliminar o ficheiro.';
$string['description'] = 'Descrición';
$string['downloadall'] = 'Descargar todas as tarefas nun arquivo zip';
$string['draft'] = 'Versión preliminar';
$string['due'] = 'Data límite da tarefa';
$string['duedate'] = 'Data límite';
$string['duedateno'] = 'Sen data límite';
$string['early'] = '{$a} en prazo';
$string['editmysubmission'] = 'Editar a miña entrega';
$string['editthesefiles'] = 'Editar estes ficheiros';
$string['editthisfile'] = 'Actualizar este ficheiro';
$string['emailstudents'] = 'Alertas por correo para alumnos';
$string['emailteachermail'] = 'O usuario {$a->username} actualizou a súa entrega de tarefa
para «{$a->assignment}» en {$a->timeupdated}

Está dispoñíbel aquí:

    {$a->url}';
$string['emailteachermailhtml'] = 'O usuario {$a->username} actualizou a entrega de tarefa
para <i>«{$a->assignment}»  en {$a->timeupdated}</i><br /><br />
Está <a href="{$a->url}">dispoñíbel no sitio web</a>.';
$string['emailteachers'] = 'Alertas por correo para profesores';
$string['emailteachers_help'] = 'Se está activado, os profesores recibirán un correo sempre que os alumnos engadan ou actualicen a entrega dunha tarefa.

Só se notificará aos profesores con permiso para cualificar esa entrega en particular. Deste modo, se, por exemplo, un curso emprega grupos separados, os profesores asignados a un determinado grupo non recibirán información sobre os alumnos pertencentes a outros grupos.';
$string['emptysubmission'] = 'Aínda non entregou nada';
$string['enablenotification'] = 'Enviar notificacións';
$string['enablenotification_help'] = 'Se está activado, os alumnos serán notificados cando as súas entregas de tarefas sexan cualificadas.';
$string['errornosubmissions'] = 'Non hai entregas que descargar';
$string['existingfiledeleted'] = 'O ficheiro existente foi eliminado: {$a}';
$string['failedupdatefeedback'] = 'Non foi posíbel actualizar a entrega de comentarios para o usuario {$a}';
$string['feedback'] = 'Comentarios';
$string['feedbackfromteacher'] = 'Comentario de {$a}';
$string['feedbackupdated'] = 'Comentarios de entregas actualizados para {$a} persoas';
$string['finalize'] = 'Impedir a actualización de entregas';
$string['finalizeerror'] = 'Produciuse un erro e non foi posíbel completar a entrega';
$string['graded'] = 'Cualificado';
$string['guestnosubmit'] = 'Aos convidados non lles está permitido entregar unha tarefa. Ten que acceder antes para poder entregar a súa resposta.';
$string['guestnoupload'] = 'Aos convidados non lles está permitido facer envíos';
$string['helpoffline'] = '<p>Isto é útil cando a tarefa se efectúa fóra de Moodle. Pode ser
   noutro lugar da web ou cara a cara (presencial).</p><p>Os alumnos poden ver a descrición da tarefa,
   mais non poden enviar ficheiros. Os traballos cualifícanse, e os alumnos recibirán as notificacións das
   súas cualificacións.</p>';
$string['helponline'] = '<p>Este tipo de tarefa implica que os usuarios editen un texto utilizando as
   ferramentas de edición normais. Os profesores poden cualificalos en liña, e ata engadir ou modificar comentarios directos.</p>
   <p>(Se está familiarizado con versións máis antigas de Moodle, esta tarefa
   fai o mesmo que o antigo módulo Journal.)</p>';
$string['helpupload'] = '<p>Este tipo de tarefa permite a cada participante enviar un ou máis ficheiros en calquera formato.
   Estes poden ser documentos de texto, imaxes, un sitio Web comprimido, ou calquera cousa que vostede solicite que entreguen.</p>
   <p>Este tipo tamén lle permite enviar varios ficheiros de resposta. Os ficheiros de resposta tamén poden ser enviados antes da entrega;
   deste xeito pódese dar a cada participante un ficheiro diferente co que traballar.</p>
   <p>Os participantes tamén poden introducir notas para describir os ficheiros entregados, o progreso ou calquera outra información.</p>
   <p>A entrega deste tipo de tarefa debe ser finalizado manualmente polo participante. Pode revisar o estado actual
   en calquera momento, as tarefas incompletas márcanse como versión preliminar. Pode reverter calquera tarefa sen cualificar para o estado de versión preliminar.</p>';
$string['helpuploadsingle'] = '<p>Este tipo de tarefa permite a cada participante enviar un só ficheiro
  de calquera tipo.</p> <p>Este pode ser un documento de texto, unha imaxe,
   un sitio Web comprimido, ou calquera cousa que vostede solicite que entreguen.</p>';
$string['hideintro'] = 'Agochar a descrición antes da data dispoñíbel';
$string['hideintro_help'] = 'Se esta activado, a descrición da tarefa permanece agochada nas datas anteriores a data «Dispoñíbel desde». Só se presenta o nome da tarefa.';
$string['invalidassignment'] = 'Tarefa incorrecta';
$string['invalidfileandsubmissionid'] = 'Non se atopa o ficheiro ou o ID da entrega';
$string['invalidid'] = 'ID de tarefa incorrecto';
$string['invalidsubmissionid'] = 'ID da entrega incorrecto';
$string['invalidtype'] = 'Tipo de tarefa incorrecto';
$string['invaliduserid'] = 'ID de usuario incorrecto';
$string['itemstocount'] = 'Cantidade';
$string['lastgrade'] = 'Última cualificación';
$string['late'] = '{$a} fora de prazo';
$string['maximumgrade'] = 'Cualificación máxima';
$string['maximumsize'] = 'Tamaño máximo';
$string['maxpublishstate'] = 'Visibilidade máxima para a entrada do blog antes da data límite';
$string['messageprovider:assignment_updates'] = 'Notificación de tarefas (2.2)';
$string['modulename'] = 'Tarefa (2.2)';
$string['modulename_help'] = 'O módulo de tarefas permite que o profesor asigne unha tarefa, que pode ser cualificada, xa sexa para traballar en liña ou desconectado.';
$string['modulenameplural'] = 'Tarefas (2.2)';
$string['newsubmissions'] = 'Tarefas entregadas';
$string['noassignments'] = 'Aínda non hai tarefas';
$string['noattempts'] = 'Non houbo tentativas nesta tarefa';
$string['noblogs'] = 'Non ten artigos de blog para entregar';
$string['nofiles'] = 'Os ficheiros non foron entregados';
$string['nofilesyet'] = 'Os ficheiros aínda non foron entregados';
$string['nomoresubmissions'] = 'Non se permiten máis entregas';
$string['norequiregrading'] = 'Non hai tarefas que requiran cualificación';
$string['nosubmisson'] = 'Non foi entregada ningunha tarefa';
$string['notavailableyet'] = 'Esta tarefa aínda non está dispoñíbel.<br />As instrucións das tarefas presentarase aquí, na data amosada embaixo.';
$string['notes'] = 'Notas';
$string['notesempty'] = 'Sen entrada';
$string['notesupdateerror'] = 'Produciuse un erro ao actualizar as notas';
$string['notgradedyet'] = 'Aínda non cualificada';
$string['notsubmittedyet'] = 'Aínda non entregada';
$string['onceassignmentsent'] = 'Unha vez que a tarefa sexa enviada para corrixir, xa non poderá eliminar ou engadir ficheiros. Desexa continuar?';
$string['operation'] = 'Operación';
$string['optionalsettings'] = 'Configuración opcional';
$string['overwritewarning'] = 'Aviso: ao enviar de novo SUBSTITUIRÁ a súa entrega actual';
$string['page-mod-assignment-submissions'] = 'Páxina de entregas do módulo de tarefas';
$string['page-mod-assignment-view'] = 'Páxina principal do módulo de tarefas';
$string['page-mod-assignment-x'] = 'Calquera páxina do módulo de tarefas';
$string['pagesize'] = 'Entregas amosadas por páxina';
$string['pluginadministration'] = 'Administración de tarefas';
$string['pluginname'] = 'Tarefa (2.2)';
$string['popupinnewwindow'] = 'Abrir nunha xanela emerxente';
$string['preventlate'] = 'Evitar entregas fora de prazo';
$string['quickgrade'] = 'Permitir avaliación rápida';
$string['quickgrade_help'] = 'Se está activado, poden ser cualificadas varias tarefas nunha páxina. Engada as cualificacións e comentarios e prema no botón «Gardar todos os meus comentarios» para gardar todos os cambios desa páxina.';
$string['requiregrading'] = 'Require cualificación';
$string['responsefiles'] = 'Ficheiros de resposta';
$string['reviewed'] = 'Revisadas';
$string['saveallfeedback'] = 'Gardar todos os meus comentarios';
$string['selectblog'] = 'Seleccione que entrada do blog desexa entregar';
$string['sendformarking'] = 'Enviar para corrixir';
$string['showrecentsubmissions'] = 'Amosar as entregas recentes';
$string['submission'] = 'Entrega';
$string['submissiondraft'] = 'Vista previa da entrega';
$string['submissionfeedback'] = 'Comentario da entrega';
$string['submissions'] = 'Entregas';
$string['submissionsaved'] = 'As súas modificacións foron gardadas';
$string['submissionsnotgraded'] = '{$a} entregas sen cualificar';
$string['submitassignment'] = 'Entregue a súa tarefa empregando este formato';
$string['submitedformarking'] = 'A tarefa xa foi entregada para corrixir e non pode ser actualizada';
$string['submitformarking'] = 'Entrega final para corrixir a tarefa';
$string['submitted'] = 'Entregada';
$string['submittedfiles'] = 'Ficheiros entregados';
$string['subplugintype_assignment'] = 'Tipo de tarefa';
$string['subplugintype_assignment_plural'] = 'Tipos de tarefas';
$string['trackdrafts'] = 'Activar o botón «Enviar para corrixir»';
$string['trackdrafts_help'] = 'O botón «Enviar para corrixir» permítelle aos alumno indicar aos profesores que remataron o traballo nunha tarefa. Os profesores poden escoller se devolven a tarefa ao estado de versión preliminar (por exemplo, se precisa mellorar).';
$string['typeblog'] = 'Artigo de blog';
$string['typeoffline'] = 'Actividade desconectado';
$string['typeonline'] = 'Texto en liña';
$string['typeupload'] = 'Envío avanzado de ficheiros';
$string['typeuploadsingle'] = 'Enviar só un ficheiro';
$string['unfinalize'] = 'Reverter para versión preliminar';
$string['unfinalizeerror'] = 'Produciuse un erro e non foi posíbel reverter a entrega ao estado de versión preliminar';
$string['unfinalize_help'] = 'Reverter a versión preliminar permite que o alumno poida facer actualizacións na súa tarefa';
$string['upgradenotification'] = 'Esta actividade basease nun módulo de tarefas antigo.';
$string['uploadafile'] = 'Enviar un ficheiro';
$string['uploadbadname'] = 'Este nome de ficheiro contiña caracteres estraños e non foi posíbel envialo';
$string['uploadedfiles'] = 'ficheiros enviados';
$string['uploaderror'] = 'Produciuse un erro mentres se gardaba o ficheiro no servidor';
$string['uploadfailnoupdate'] = 'O ficheiro foi enviado correctamente mais non pode actualizar a súa entrega.';
$string['uploadfiles'] = 'Enviar ficheiros';
$string['uploadfiletoobig'] = 'O ficheiro é grande de máis (o límite é {$a} bytes)';
$string['uploadnofilefound'] = 'Non foi atopado ningún ficheiro. Está seguro de que seleccionou algún para enviar?';
$string['uploadnotregistered'] = '«{$a}» foi enviado correctamente mais a entrega non foi rexistrada';
$string['uploadsuccess'] = '«{$a}» foi enviado correctamente';
$string['usermisconf'] = 'O usuario está mal configurado';
$string['usernosubmit'] = 'Vostede non ten permiso para entregar unha tarefa.';
$string['viewassignmentupgradetool'] = 'Ver a utilidade de anovación de tarefas';
$string['viewfeedback'] = 'Ver cualificacións e comentarios sobre as tarefas';
$string['viewmysubmission'] = 'Ver a miña entrega';
$string['viewsubmissions'] = 'Ver {$a} tarefas entregadas';
$string['yoursubmission'] = 'A súa entrega';
