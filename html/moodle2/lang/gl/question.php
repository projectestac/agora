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
 * Strings for component 'question', language 'gl', branch 'MOODLE_26_STABLE'
 *
 * @package   question
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['action'] = 'Acción';
$string['addanotherhint'] = 'Engadir outra pista';
$string['addcategory'] = 'Engadir categoría';
$string['addmorechoiceblanks'] = 'En branco para {non} Máis Escollas';
$string['adminreport'] = 'Informe sobre posíbeis problemas na súa base de datos de preguntas.';
$string['answer'] = 'Resposta';
$string['answers'] = 'Respostas';
$string['answersaved'] = 'Resposta gardada';
$string['attemptfinished'] = 'Intento finalizado';
$string['attemptfinishedsubmitting'] = 'O intento finalizou entregado:';
$string['attemptoptions'] = 'Opcións do intento';
$string['availableq'] = 'Dispoñíbel?';
$string['badbase'] = 'Base mala antes de que **: {$a}**';
$string['behaviour'] = 'Comportamento';
$string['behaviourbeingused'] = 'Comportamento utilizado: {$a}';
$string['broken'] = 'É unha "ligazón rota", indica un ficheiro inexistente.';
$string['byandon'] = 'por <em>{$a->user}</em> en <em>{$a->time}</em>';
$string['cannotcopybackup'] = 'Non se puido copiar o ficheiro da copia de seguranza';
$string['cannotcreate'] = 'Non se puido crear unha nova entrada na táboa question_attempts';
$string['cannotcreatepath'] = 'Non se puido crear a ruta: {$a}';
$string['cannotdeletebehaviourinuse'] = 'Non pode eliminar o comportamento \'{$a}\'. Úsase para intentos de preguntas.';
$string['cannotdeletecate'] = 'Non pode eliminar esa categoría porque é a categoría predeterminada para este contexto.';
$string['cannotdeleteneededbehaviour'] = 'Non pode eliminar o comportamento da pregunta \'{$a}\'. Hai outros comportamentos instalados que dependen del.';
$string['cannotdeleteqtypeinuse'] = 'Non pode eliminar o tipo de pregunta \'{$a}\'. Hai preguntas deste tipo no banco de preguntas.';
$string['cannotdeleteqtypeneeded'] = 'Non pode eliminar o tipo de pregunta \'{$a}\'. Hai outros tipos de preguntas instalados que dependen del.';
$string['cannotenable'] = 'Non se pode crear directamente o tipo de pregunta {$a}.';
$string['cannotenablebehaviour'] = 'Non se pode usar directamente o tipo de comportamento {$a}. Soamente para uso interno.';
$string['cannotfindcate'] = 'Non se puido atopar o rexistro da categoría';
$string['cannotfindquestionfile'] = 'Non se pode atopar o ficheiro de datos da pregunta en zip';
$string['cannotgetdsfordependent'] = 'Non se pode obter o conxunto de datos especificado para un conxunto de datos dependente da pregunta! (pregunta: {$a->id}, datasetitem: {$a->item})';
$string['cannotgetdsforquestion'] = 'Non se pode obter o conxunto de datos especificado para unha pregunta calculada! (pregunta: {$a})';
$string['cannothidequestion'] = 'Non foi quen de agochar a pregunta';
$string['cannotimportformat'] = 'Mágoa, a importación deste formato aínda non está implementada!';
$string['cannotinsertquestion'] = 'Non foi posíbel inserir unha nova pregunta!';
$string['cannotinsertquestioncatecontext'] = 'Non foi posíbel inserir a nova categoría da pregunta {$a->cat} por ter id de contexto anormal {$a->ctx}';
$string['cannotloadquestion'] = 'Non foi posíbel cargar a pregunta';
$string['cannotmovequestion'] = 'Non é posíbel usar este script para mover preguntas que teñen ficheiros asociados con eles de diferentes áreas.';
$string['cannotopenforwriting'] = 'Non é posíbel abrir para escribir: {$a}';
$string['cannotpreview'] = 'Non é posíbel previsualizar estas preguntas!';
$string['cannotread'] = 'Non é posíbel ler o ficheiro de importación (ou o ficheiro está baleiro)';
$string['cannotretrieveqcat'] = 'Non foi posíbel recuperar a categoría da pregunta';
$string['cannotunhidequestion'] = 'Produciuse un fallo ao volver amosar a pregunta.';
$string['cannotunzip'] = 'Non foi posíbel descomprimir o ficheiro.';
$string['cannotwriteto'] = 'Non é posíbel escribir as preguntas exportadas a {$a}';
$string['category'] = 'Categoría';
$string['categorycurrent'] = 'Categoría actual';
$string['categorycurrentuse'] = 'Usar esta categoría';
$string['categorydoesnotexist'] = 'Esta categoría non existe';
$string['categoryinfo'] = 'Info da categoría';
$string['categorymove'] = 'A categoría «{$a->name}» contén {$a->count} preguntas (algunhas das cales poden ser vellas, estaren agochadas ou seren preguntas que aínda están en uso nalgúns exames). Escolla outra categoría á cal movelas.';
$string['categorymoveto'] = 'Gardar na categoría';
$string['categorynamecantbeblank'] = 'O nome da categoría non se pode deixar en branco.';
$string['changeoptions'] = 'Cambiar opcións';
$string['changepublishstatuscat'] = '<a href="{$a->caturl}">A categoría "{$a->name}"</a> no curso "{$a->coursename}" cambiará o seu estado de compartición desde <strong>{$a->changefrom} a {$a->changeto}</strong>.';
$string['check'] = 'Comprobar';
$string['chooseqtypetoadd'] = 'Escolla o tipo de pregunta que engadir';
$string['clearwrongparts'] = 'Despexar respostas incorrectas';
$string['clickflag'] = 'Indicar a pregunta';
$string['clicktoflag'] = 'Indicar esta pregunta para referencia futura';
$string['clicktounflag'] = 'Retirar o indicador';
$string['clickunflag'] = 'Retirar o indicador';
$string['closepreview'] = 'Pechar a previsualización';
$string['combinedfeedback'] = 'Comentario combinado';
$string['comment'] = 'Comentario';
$string['commented'] = 'Comentado: {$a}';
$string['commentormark'] = 'Facer comentario ou cambiar a puntuación';
$string['comments'] = 'Comentarios';
$string['commentx'] = 'Comentar: {$a}';
$string['complete'] = 'Completa';
$string['contexterror'] = 'Non debería ter chegado aquí se non estivese movendo unha categoría a outro contexto.';
$string['copy'] = 'Copia de {$a} e cambiar ligazóns.';
$string['correct'] = 'Corrixir';
$string['correctfeedback'] = 'Cada resposta correcta';
$string['correctfeedbackdefault'] = 'A súa resposta é correcta.';
$string['created'] = 'Creada';
$string['createdby'] = 'Creada por';
$string['createdmodifiedheader'] = 'Creada / última gardada';
$string['createnewquestion'] = 'Crear unha nova pregunta ...';
$string['cwrqpfs'] = 'Preguntas aleatorias seleccionando preguntas de subcategorías.';
$string['cwrqpfsinfo'] = '<p>Durante a actualización a Moodle 1.9 separaremos categorías de preguntas en
diferentes contextos. Nalgunhas categorías de preguntas do seu sitio terá que
cambiarse o seu
estado de compartición.
Isto é necesario no caso raro de que unha ou máis preguntas \'aleatorias\' compartidas dunha proba estean configuradas para se seleccionar de entre unha mestura
de categorías compartidas e non compartidas (como é o caso deste sitio). Isto sucede cando unha pregunta \'aleatoria\' está configurada para seleccionar
de entre subcategorías e unha ou máis subcategorías teñen diferente estado de compartición respecto da categoría pai
na cal a pregunta aleatoria se crea.</p>
<p>As seguintes categorías de preguntas, de entre as que veñen as preguntas \'aleatorias\' nas categorías pai,
cambiarán o seu estado de compartición ao mesmo estado de compartición que a categoría que teña a pregunta «aleatoria»
teña na actualización a Moodle 1.9. As seguintes categorías cambiarán o seu estado de compartición. As preguntas afectadas
continuarán a funcionar en calquera das probas existentes ata que as retire desas probas.</p>';
$string['cwrqpfsnoprob'] = 'Non hai categorías de preguntas afectadas no seu sitio polo problema de \'Preguntas aleatorias que seleccionan preguntas de subcategorías\'.';
$string['decimalplacesingrades'] = 'Posicións decimais nas táboas';
$string['defaultfor'] = 'Predeterminado/a para: {$a}';
$string['defaultinfofor'] = 'A categoría predeterminada para preguntas compartidas no contexto \'{$a}\'.';
$string['defaultmark'] = 'Marca predeterminada';
$string['deletecoursecategorywithquestions'] = 'Hai preguntas no banco de preguntas asociadas con esta categoría de curso. De proseguir, eliminaranse. Pode querer movelas primeiro, usando a interface do banco de preguntas.';
$string['deletequestioncheck'] = 'Confirma definitivamente que quere eliminar \'{$a}\'?';
$string['deletequestionscheck'] = 'Confirma definitivamente que quere eliminar as seguintes preguntas?<br /><br />{$a}';
$string['deletingbehaviour'] = 'Eliminando o comportamento de pregunta \'{$a}';
$string['deletingqtype'] = 'Eliminado o tipo de pregunta \'{$a}';
$string['didnotmatchanyanswer'] = '[Non coincide ningunha resposta]';
$string['disabled'] = 'Desactivado';
$string['displayoptions'] = 'Opcións de presentación:';
$string['disterror'] = 'A distribución {$a} causou problemas';
$string['donothing'] = 'Non copiar nin mover ficheiros nin cambiar ligazóns.';
$string['editcategories'] = 'Editar categorías';
$string['editcategories_help'] = 'Mellor que gardalo todo nunha gran lista, as preguntas pódense colocar en categorías e subcategorías.

Cada categoría ten un contexto que determina onde se poden usar as preguntas na categoría:

* Contexto da actividade - As preguntas soamente están dispoñíbeis no módulo da actividade
* Contexto do curso - As preguntas están dispoñíbeis en todos os módulos do curso.
* Contexto de categoría do curso - As preguntas están dispoñíbeis en todos os módulos de actividade e cursos na categoría do curso
* Contexto do sistema - As preguntas están dispoñíbeis en todos os cursos e actividades do sitio

As categorías úsanse tamén para preguntas aleatorias, as preguntas selecciónanse dunha categoría particular.';
$string['editcategories_link'] = 'pregunta/categoría';
$string['editcategory'] = 'Editar categoría';
$string['editingcategory'] = 'Edición dunha categoría';
$string['editingquestion'] = 'Edición dunha pregunta';
$string['editquestion'] = 'Edición dunha pregunta';
$string['editquestions'] = 'Edición de preguntas';
$string['editthiscategory'] = 'Editar esta categoría';
$string['emptyxml'] = 'Erro descoñecido - imsmanifest.xml está baleiro';
$string['enabled'] = 'Activado';
$string['erroraccessingcontext'] = 'Non se pode acceder ao contexto';
$string['errordeletingquestionsfromcategory'] = 'Produciuse un erro ao eliminar preguntas da categoría {$a}.';
$string['errorduringpost'] = 'Produciuse un erro durante o post-procesamento!';
$string['errorduringpre'] = 'Produciuse un erro durante o pre-procesamento!';
$string['errorduringproc'] = 'Produciuse un erro durante o procesamento!';
$string['errorduringregrade'] = 'Non se pode recualificar a pregunta {$a->qid}, estabelecendo o estado {$a->stateid}.';
$string['errorfilecannotbecopied'] = 'Erro: non é posíbel copiar o ficheiro {$a}.';
$string['errorfilecannotbemoved'] = 'Erro: non é posíbel mover o ficheiro {$a}.';
$string['errorfileschanged'] = 'Erro: os ficheiros están ligados a preguntas que cambiaron desde que se presentou o formulario.';
$string['errormanualgradeoutofrange'] = 'A cualificación {$a->grade} non está entre 0 e {$a->maxgrade} para a pregunta {$a->name}. A puntuación e o comentario non se gardaron.';
$string['errormovingquestions'] = 'Produciuse un erro ao mover preguntas con estes id {$a}.';
$string['errorpostprocess'] = 'Produciuse un erro durante o post-procesamento!';
$string['errorpreprocess'] = 'Produciuse un erro durante o pre-procesamento!';
$string['errorprocess'] = 'Produciuse un erro durante o procesamento!';
$string['errorprocessingresponses'] = 'Produciuse un erro ao procesar as súas respostas ({$a}). Prema en continuar para volver á páxina onde estivo e intentalo outra vez.';
$string['errorsavingcomment'] = 'Produciuse un erro ao gardar o comentario da pregunta {$a->name} na base de datos.';
$string['errorsavingflags'] = 'Produciuse un erro ao gardar o indicador de estado';
$string['errorupdatingattempt'] = 'Produciuse un erro ao actualizar o intento {$a->id} na base de datos.';
$string['exportcategory'] = 'Exportar categoría';
$string['exportcategory_help'] = 'Este axuste determina a categoría da que se tomarán as preguntas para exportar.

Certos formatos de importación, tales como GIFT e Moodle XML, permiten que se inclúan a categoría e os datos de contexto no ficheiro de exportación, activándoos para (opcionalmente) seren recreados ou importados. De se requirir, as caixas de selección apropiadas deberían ser marcadas.';
$string['exporterror'] = 'Producíronse erros na exportación!';
$string['exportfilename'] = 'preguntas';
$string['exportnameformat'] = '%d/%m/%Y-%H:%M';
$string['exportquestions'] = 'Exportar preguntas no ficheiro';
$string['exportquestions_help'] = 'Esta función activa a exportación dunha categoría completa (e calquera subcategoría) de preguntas no ficheiro. Note que, consonte o formato de ficheiro seleccionado, algúns datos de preguntas e certos tipos de preguntas pode ser que non se exporten.';
$string['exportquestions_link'] = 'pregunta/exportar';
$string['feedback'] = 'Comentarios';
$string['filecantmovefrom'] = 'Os ficheiros das preguntas non se poden mover porque non ten permiso para retirar ficheiros do lugar desde onde está intentando mover preguntas.';
$string['filecantmoveto'] = 'Os ficheiros de preguntas non se poden mover nin copiar porque non ten permiso para engadir ficheiros ao lugar a onde está intentando mover as preguntas.';
$string['fileformat'] = 'Formato de ficheiro';
$string['filesareacourse'] = 'a área de ficheiros do curso';
$string['filesareasite'] = 'a área de ficheiros do sitio';
$string['filestomove'] = 'Mover / copiar ficheiros a {$a}?';
$string['fillincorrect'] = 'Cubrir nas respostas correctas';
$string['flagged'] = 'Indicado';
$string['flagthisquestion'] = 'Indicar esta pregunta';
$string['formquestionnotinids'] = 'Formulario contido en pregunta que non está nos id de preguntas';
$string['fractionsnomax'] = 'Unha das respostas debería de ter unha puntuación de 100% de modo que sexa posíbel obter puntuacións completas nesta pregunta.';
$string['generalfeedback'] = 'Comentarios xerais';
$string['generalfeedback_help'] = 'Os comentarios xerais amósanselle ao alumno despois de eles completaren a pregunta. Ao contrario do comentario específico, que depende do tipo de pregunta e da resposta que o alumno dese, amósase o mesmo texto de comentario xeral a todos os alumnos.

Pode usar o comentario xeral para darlles aos alumnos unha resposta totalmente traballada e quizais unha ligazón para obteren máis información que poidan usar se non comprenden as preguntas.';
$string['getcategoryfromfile'] = 'Obter a categoría do ficheiro';
$string['getcontextfromfile'] = 'Obter o contexto do ficheiro';
$string['hidden'] = 'Agochado';
$string['hintn'] = 'Aviso {no}';
$string['hinttext'] = 'Aviso de texto';
$string['howquestionsbehave'] = 'Como se comportan as preguntas';
$string['howquestionsbehave_help'] = 'Os alumnos poden interactuar coas preguntas na proba de varias maneira diferentes. Por exemplo, pode querer que os alumnos introduzan unha resposta para cadansúa pregunta e logo entregar a proba enteira, antes de que cualificar nada ou de que eles teñan comentarios. Iso poderiamos chamalo modo de «Comentario diferido».

Alternativamente, pode querer que os alumnos entreguen cada pregunta así como vaian avanzando para obter comentarios inmediatos e se non o conseguen facer correctamente, que teñan outro intento cunha puntuación menor. Iso poderiamos chamalo modo «Interactivo con múltiplos intentos».

Eses son probabelmente os dous modos máis comúns de comportamento usados.';
$string['ignorebroken'] = 'Ignorar ligazóns rotas';
$string['importcategory'] = 'Importar categoría';
$string['importcategory_help'] = 'Este axuste determina a categoría dentro da cal se poñerán as preguntas importadas.

Certos formatos de importación, tales como GIFT e XML de Moodle, poden incluír categoría e datos contextuais no ficheiro de importación. Para facer uso destes datos, antes ca a categoría seleccionada, as caixas de selección apropiadas deberían marcarse. De non existiren as categorías especificadas no ficheiro de importación, crearanse.';
$string['importerror'] = 'Produciuse un erro durante o proceso da importación';
$string['importerrorquestion'] = 'Produciuse un erro ao importar a pregunta';
$string['importfromcoursefiles'] = '... ou escolla un ficheiro de curso que importar.';
$string['importfromupload'] = 'Seleccionar un ficheiro que enviar ...';
$string['importingquestions'] = 'Importando {$a} preguntas do ficheiro';
$string['importparseerror'] = 'Atopáronse erro(s) ao procesar o ficheiro de importación. Non se importou ningunha pregunta. Para importar algunhas preguntas boas inténteo outra vez co axuste \'Alto no erro\' como \'Non';
$string['importquestions'] = 'Importar preguntas do ficheiro';
$string['importquestions_help'] = 'Esta función activa preguntas nunha variedade de formatos que importar mediante un ficheiro de texto. Note que o ficheiro debe de usar a codificación UTF-8.';
$string['importquestions_link'] = 'pregunta/importar';
$string['importwrongfiletype'] = 'O tipo de ficheiro que seleccionou ({$a->actualtype}) non coincide co tipo esperado por este formato de importación ({$a->expectedtype}).';
$string['impossiblechar'] = 'Detectouse o carácter imposíbel {$a} como carácter de paréntese';
$string['includesubcategories'] = 'Amosar tamén preguntas de subcategorías';
$string['incorrect'] = 'Incorrecto';
$string['incorrectfeedback'] = 'Para cada resposta incorrecta';
$string['information'] = 'Información';
$string['invalidanswer'] = 'Resposta incompleta';
$string['invalidarg'] = 'Non se forneceron argumentos válidos ou a configuración do servidor non é correcta';
$string['invalidcategoryidforparent'] = 'O id da categoría é incorrecto para ese pai!';
$string['invalidcategoryidtomove'] = 'O id da categoría é incorrecto para movela!';
$string['invalidconfirm'] = 'A cadea de confirmación era incorrecta';
$string['invalidcontextinhasanyquestions'] = 'O contexto pasado a question_context_has_any_questions é incorrecto.';
$string['invalidgrade'] = 'Grades ({$a}) do not match grade options - question skipped.';
$string['invalidpenalty'] = 'Penalización incorrecta';
$string['invalidwizardpage'] = 'Ou é incorrecta ou non se especificou un asistente de páxina!';
$string['lastmodifiedby'] = 'Última modificación de';
$string['linkedfiledoesntexist'] = 'O ficheiro ligado {$a} non existe';
$string['makechildof'] = 'Facer fillo de \'{$a}';
$string['makecopy'] = 'Facer copia';
$string['maketoplevelitem'] = 'Mover ao nivel superior';
$string['manualgradeoutofrange'] = 'Esta cualificación está alén do intervalo correcto.';
$string['manuallygraded'] = 'Cualificado manualmente {$a->mark} co comentario: {$a->comment}';
$string['mark'] = 'Puntuación';
$string['markedoutof'] = 'Puntuado fóra de';
$string['markedoutofmax'] = 'Puntuado fóra de {$a}';
$string['markoutofmax'] = 'Puntuar {$a->mark} fóra de {$a->max}';
$string['marks'] = 'Puntuacións';
$string['matchgrades'] = 'Coincidir cualificacións';
$string['matchgradeserror'] = 'Prodúcese un erro se a cualificación non está listada';
$string['matchgrades_help'] = 'Os graos importados teñen que coincidir cun da lista fixada de graos válidos - 100, 90, 80, 75, 70, 66.666, 60, 50, 40, 33.333, 30, 25, 20, 16.666, 14.2857, 12.5, 11.111, 10, 5, 0 (tamén valores negativos). Se non, hai dúas opcións:

*  Prodúcese un erro se o grao non está listado - Se unha pregunta contén calquera grao non atopado na lista amósase un erro e infórmase de que a pregunta non se cualificará
* A cualificación máis próxima non se lista - Se unha cualificación non coincide cun valor na lista, a cualificación cámbiase ao valor coincidente máis próximo da lista';
$string['matchgradesnearest'] = 'Cualificación máis próxima se non está listada';
$string['missingcourseorcmid'] = 'É necesario fornecer o id do curso ou cmid para imprimir a pregunta.';
$string['missingcourseorcmidtolink'] = 'É necesario fornecer o id do curso ou cmig para get_question_edit_link.';
$string['missingimportantcode'] = 'Este tipo de pregunta carece de código importante: {$a}.';
$string['missingoption'] = 'Faltan as opcions da pregunta máis próxima {$a}';
$string['modified'] = 'Último gardado';
$string['move'] = 'Mover desde {$a} e cambiar ligazóns.';
$string['movecategory'] = 'Mover categoría';
$string['movedquestionsandcategories'] = 'Mover preguntas e categorías de preguntas desde {$a->oldplace} a {$a->newplace}.';
$string['movelinksonly'] = 'Soamente cambiar onde as ligazóns apuntan, non mover nin copiar ficheiros.';
$string['moveq'] = 'Mover pregunta(s)';
$string['moveqtoanothercontext'] = 'Mover pregunta a outro contexto.';
$string['moveto'] = 'Mover a >>';
$string['movingcategory'] = 'Movendo a categoría';
$string['movingcategoryandfiles'] = 'Confirma que quere mover a categoría {$a->name} e todas as categorías fillas ao contexto de "{$a->contextto}"?<br />Detectouse {$a->urlcount} ficheiros ligados desde preguntas en {$a->fromareaname}, quere copialos ou movelos a {$a->toareaname}?';
$string['movingcategorynofiles'] = 'Confirma que quere mover a categoría "{$a->name}" e todas as categorías fillas ao contexto "{$a->contextto}"?';
$string['movingquestions'] = 'Movendo preguntas e calquera ficheiro';
$string['movingquestionsandfiles'] = 'Confirma que quere mover as pregunta(s) {$a->questions} ao contexto de <strong>"{$a->tocontext}"</strong>?<br />Detectouse <strong>{$a->urlcount} ficheiros</strong> ligados desde estas pregunta(s) en {$a->fromareaname}, quere copiar ou movelos a {$a->toareaname}?';
$string['movingquestionsnofiles'] = 'Confirma que quere mover as pregunta(s) {$a->questions} ao contexto de <strong>"{$a->tocontext}"</strong>?<br /><strong>Non hai ficheiros</strong> ligados desde estas pregunta(s) en {$a->fromareaname}.';
$string['needtochoosecat'] = 'É necesario escoller unha categoría a onde mover esta pregunta ou prema «Cancelar».';
$string['nocate'] = 'Non hai tal categoría {$a}!';
$string['nopermissionadd'] = 'Non ten permiso para engadir preguntas aquí.';
$string['nopermissionmove'] = 'Non ten permiso para mover preguntas desde aquí. Debe gardar a pregunta nesta categoría ou gardala como unha pregunta nova.';
$string['noprobs'] = 'Non se atoparon problemas na súa base de datos de preguntas.';
$string['noquestions'] = 'Non se atoparon preguntas que poidan exportarse. Asegúrese de ter seleccionada unha categoría que exportar que conteña as preguntas.';
$string['noquestionsinfile'] = 'Non hai preguntas no ficheiro de importación';
$string['noresponse'] = '[Sen resposta]';
$string['notanswered'] = 'Non respondida';
$string['notenoughanswers'] = 'Este tipo de pregunta require cando menos {$a} respostas';
$string['notenoughdatatoeditaquestion'] = 'Non se especificou nin un id de pregunta, nin un id de categoría nin tipo de pregunta.';
$string['notenoughdatatomovequestions'] = 'É necesario que forneza os id da pregunta ou preguntas que queira mover.';
$string['notflagged'] = 'Sen indicador';
$string['notgraded'] = 'Sen cualificar';
$string['notshown'] = 'Non amosado';
$string['notyetanswered'] = 'Aínda non respondido';
$string['notyourpreview'] = 'Esta previsualización non lle corresponde';
$string['novirtualquestiontype'] = 'Non hai tipo de pregunta virtual par o tipo de pregunta {$a}';
$string['numqas'] = 'Núm. dos intentos da pregunta';
$string['numquestions'] = 'Núm. preguntas';
$string['numquestionsandhidden'] = '{$a->numquestions} (+{$a->numhidden} agochadas)';
$string['options'] = 'Opcións';
$string['orphanedquestionscategory'] = 'Preguntas gardadas das categorías eliminadas';
$string['orphanedquestionscategoryinfo'] = 'Ocasionalmente, debido tipicamente a erros antigos de software, as preguntas poden quedar na base de datos aínda que a correspondente categoría da pregunta teña sido eliminada. Por suposto, non debería de suceder pero sucedeu no pasado neste sitio. Esta categoría creouse automaticamente e as preguntas orfas movéronse aquí de modo que poida manexalas. Nótese que calquera imaxe ou ficheiros multimedia usados por estas preguntas é probábel que se teñan perdido.';
$string['page-question-category'] = 'Páxina da categoría de pregunta';
$string['page-question-edit'] = 'Páxina de edición da pregunta';
$string['page-question-export'] = 'Páxina de exportación da pregunta';
$string['page-question-import'] = 'Páxina de importación da pregunta';
$string['page-question-x'] = 'Calquera páxina da pregunta';
$string['parent'] = 'Pai';
$string['parentcategory'] = 'Categoría principal';
$string['parentcategory_help'] = 'A categoría de pai é aquela na que se colocará a categoría nova. "Superior" significa que esta categoría non é contida por ningunha outra categoría. Os contextos de categoría amósanse en letra grosa. Debe de haber cando menos unha categoría en cada contexto.';
$string['parentcategory_link'] = 'pregunta/categoría';
$string['parenthesisinproperclose'] = 'Paréntese anterior ** non se pechou apropiadamente en {$a}**';
$string['parenthesisinproperstart'] = 'Paréntese anterior ** non se abriu apropiadamente en {$a}**';
$string['parsingquestions'] = 'Procesando preguntas do ficheiro de importación.';
$string['partiallycorrect'] = 'Parcialmente correcto';
$string['partiallycorrectfeedback'] = 'Por calquera resposta parcialmente correcta';
$string['penaltyfactor'] = 'Factor de penalización';
$string['penaltyfactor_help'] = 'Este axuste determina que fracción da puntuación acadada se resta por cada resposta incorrecta. Soamente se aplica cando a proba se executa en modo adaptativo.

O factor de penalización debería ser un número entre 0 e 1. Un factor de penalización 1 significa que o alumno ten que conseguir dar a resposta correcta na súa primeira contestación para obter o rendemento completo por ela. Un factor de penalización de 0 significa que o alumno/a pode volver intentalo tantas veces como queira que aínda así poderá obter as puntuacións completas.';
$string['penaltyforeachincorrecttry'] = 'Penalización por cadanseu intento incorrecto';
$string['penaltyforeachincorrecttry_help'] = 'Cando executa preguntas que usan os comportamentos «Interactivo con múltiplos intentos» ou «Modo adaptativo», de modo que o alumno/a ten varios intentos para acertar, esta opción controla canto son penalizados por cadanseu intento incorrecto.

A penalización é unha proporción da cualificación total da pregunta, de modo que se a pregunta tivese cando menos tres puntos, e a penalización é 0.3333333, entón os alumno/as puntuarán 3 se conseguen acertar a primeira vez, 2 se conseguen acertar no segundo intento e 1 se acertan no terceiro intento.';
$string['permissionedit'] = 'Editar esta pregunta';
$string['permissionmove'] = 'Mover esta pregunta';
$string['permissionsaveasnew'] = 'Gardar isto como unha nova pregunta';
$string['permissionto'] = 'Ten permiso para:';
$string['previewquestion'] = 'Previsualizar a pregunta: {$a}';
$string['published'] = 'compartido';
$string['qtypeveryshort'] = 'T';
$string['questionaffected'] = '<a href="{$a->qurl}">Pregunta "{$a->name}" ({$a->qtype})</a> está nesta categoría pero tamén se usa na <a href="{$a->qurl}">proba "{$a->quizname}"</a> destoutro curso "{$a->coursename}".';
$string['questionbank'] = 'Banco da pregunta';
$string['questionbehaviouradminsetting'] = 'Configuración do comportamento da pregunta';
$string['questionbehavioursdisabled'] = 'Comportamentos da pregunta que desactivar';
$string['questionbehavioursdisabledexplained'] = 'Introducir unha lista separada por comas de comportamentos que non que non queira que aparezan no menú despregábel';
$string['questionbehavioursorder'] = 'Orde de comportamentos da pregunta';
$string['questionbehavioursorderexplained'] = 'Introduza unha lista separada por comas de comportamentos na orde que os queira ver no menú despregábel';
$string['questioncategory'] = 'Categoría de pregunta';
$string['questioncatsfor'] = 'Categorías de pregunta para \'{$a}';
$string['questiondoesnotexist'] = 'Esta pregunta non existe';
$string['questionidmismatch'] = 'Os id da pregunta non coinciden';
$string['questionname'] = 'Nome da pregunta';
$string['questionno'] = 'Pregunta {$a}';
$string['questions'] = 'Preguntas';
$string['questionsaveerror'] = 'Producíronse erros durante o proceso de gardar a pregunta - ({$a})';
$string['questionsinuse'] = '(* As preguntas marcadas cun asterisco xa se usan nalgunhas probas. Estas preguntas non se eliminarán destas probas, soamente da lista da categoría.)';
$string['questionsmovedto'] = 'As preguntas que aínda se usan que se moveron a "{$a}" na categoría pai do curso.';
$string['questionsrescuedfrom'] = 'As preguntas gardadas desde o contexto {$a}.';
$string['questionsrescuedfrominfo'] = 'Estas preguntas (algunha das cales poden estar agochadas) gardáronse cando se eliminou o contexto {$a} porque aínda se usan nalgunhas probas ou outras actividades.';
$string['questiontext'] = 'Texto da pregunta';
$string['questiontype'] = 'Tipo de pregunta';
$string['questionuse'] = 'Use a pregunta nesta actividade';
$string['questionvariant'] = 'Variante da pregunta';
$string['questionx'] = 'Pregunta {$a}';
$string['requiresgrading'] = 'Require cualificación';
$string['responsehistory'] = 'Historial de contestación';
$string['restart'] = 'Comezar outra vez';
$string['restartwiththeseoptions'] = 'Comezar outra vez con estas opcións';
$string['reviewresponse'] = 'Revisar a contestación';
$string['rightanswer'] = 'Resposta correcta';
$string['rightanswer_help'] = 'un resumo coa contestación correcta xerado automaticamente. Isto pode ser insuficiente, así que quizais queira dar unha explicación da solución correcta no comentario xeral da pregunta, e apagar esta opción.';
$string['save'] = 'Gardar';
$string['saved'] = 'Gardado: {$a}';
$string['saveflags'] = 'Gardar o estado dos indicadores';
$string['selectacategory'] = 'Seleccionar unha categoría:';
$string['selectaqtypefordescription'] = 'Seleccionar un tipo de pregunta para ver a súa descrición.';
$string['selectcategoryabove'] = 'Seleccionar unha categoria superior';
$string['selectquestionsforbulk'] = 'Seleccionar preguntas para accións globais';
$string['shareincontext'] = 'Compartir no contexto de {$a}';
$string['showhidden'] = 'Amosar tamén as preguntas antigas';
$string['showmarkandmax'] = 'Amosar puntuación e máx.';
$string['showmaxmarkonly'] = 'Amosar soamente a máx. puntuación';
$string['shown'] = 'Amosada';
$string['shownumpartscorrect'] = 'Amosar o número de contestacións correctas';
$string['shownumpartscorrectwhenfinished'] = 'Amosar o número de contestacións correctas logo de finalizar a pregunta';
$string['showquestiontext'] = 'Amosar o texto da pregunta na lista de preguntas';
$string['specificfeedback'] = 'Comentario específico';
$string['specificfeedback_help'] = 'Comentario que depende de que contestación dese o alumno/a.';
$string['started'] = 'Arrancada';
$string['state'] = 'Estado';
$string['step'] = 'Paso';
$string['stoponerror'] = 'Alto no erro';
$string['stoponerror_help'] = 'Este axuste determina que o proceso de importación se deterá ao detectarse un erro, de modo que ningunha pregunta se importará ou que calquera pregunta que conteña erros se ignorará mentres que calquera pregunta correcta se importará.';
$string['submissionoutofsequence'] = 'Acceso contrario á secuencia. Por favor, non prema no botón de volver atrás ao traballar nas preguntas da proba.';
$string['submissionoutofsequencefriendlymessage'] = 'Introduciu datos nunha secuencia contraria á normal. Isto pode ocorrer se usa o botón de Volver atrás ou Adiante do seu navegador; por favor, non os use durante o test. Tamén pode suceder se preme en algo mentres se carga a páxina. Prema <strong>Continuar</strong> para continuar.';
$string['submit'] = 'Entregar';
$string['submitandfinish'] = 'Entregar e finalizar';
$string['submitted'] = 'Entregar: {$a}';
$string['technicalinfo'] = 'Información técnica';
$string['technicalinfo_help'] = 'Esta información técnica probablemente só é práctica para desenvolvedores que estean a traballar en novos tipos de preguntas. Tamén pode ser de axuda ao intentar diagnosticar problemas coas preguntas.';
$string['technicalinfominfraction'] = 'Fracción mínima: {$a}';
$string['technicalinfoquestionsummary'] = 'Resumo da pregunta: {$a}';
$string['technicalinforightsummary'] = 'Resumo da resposta correcta: {$a}';
$string['technicalinfostate'] = 'Estado da pregunta: {$a}';
$string['tofilecategory'] = 'Escribir a categoría no ficheiro';
$string['tofilecontext'] = 'Escribir o contexto no ficheiro';
$string['uninstallbehaviour'] = 'Desinstalar este comportamento de pregunta.';
$string['uninstallqtype'] = 'Desinstalar este tipo de pregunta.';
$string['unknown'] = 'Descoñecido';
$string['unknownbehaviour'] = 'Comportamento descoñecido: {$a}.';
$string['unknownquestion'] = 'Pregunta descoñecida: {$a}.';
$string['unknownquestioncatregory'] = 'Categoría de pregunta descoñecida: {$a}.';
$string['unknownquestiontype'] = 'Tipo de pregunta descoñecida: {$a}.';
$string['unknowntolerance'] = 'Tipo de tolerancia descoñecida {$a}';
$string['unpublished'] = 'descompartido';
$string['upgradeproblemcategoryloop'] = 'Detectouse un problema ao actualizar as categorías de preguntas. Hai un bucle na árbore de categorías. Os id das categoría afectadas son {$a}.';
$string['upgradeproblemcouldnotupdatecategory'] = 'Non foi posíbel actualizar a categoría da pregunta {$a->name} ({$a->id}).';
$string['upgradeproblemunknowncategory'] = 'Detectouse un problema ao anovar as categorías de preguntas. A categoría {$a->id} refírese ao pai {$a->parent}, que non existe. Cambiouse o pai para arranxar este problema.';
$string['whethercorrect'] = 'Cando correcto';
$string['whethercorrect_help'] = 'Isto cobre ambas descricións, tanto a textual \'Correcta\', \'Parcialmente correcta\' ou \'Incorrecta\', e calquera realce de cor que transmita a mesma información.';
$string['withselected'] = 'Co seleccionado';
$string['wrongprefix'] = 'nameprefix {$a} erradamente formatado';
$string['xoutofmax'] = '{$a->mark} fóra de {$a->max}';
$string['yougotnright'] = 'Seleccionou correctamente {$a->num}.';
$string['youmustselectaqtype'] = 'Debe seleccionar un tipo de pregunta.';
$string['yourfileshoulddownload'] = 'O seu ficheiro de exportación debería comezar a descargarse axiña. Se non o fai, <a href="{$a}">prema aquí</a>.';
