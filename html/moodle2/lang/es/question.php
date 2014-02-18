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
 * Strings for component 'question', language 'es', branch 'MOODLE_24_STABLE'
 *
 * @package   question
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['action'] = 'Acción';
$string['addanotherhint'] = 'Añadir otra pista';
$string['addcategory'] = 'Añadir Categoría';
$string['adminreport'] = 'Informe sobre posibles problemas en su base de datos de preguntas.';
$string['answer'] = 'Respuesta';
$string['answersaved'] = 'Respuesta guardada';
$string['attemptfinished'] = 'Intento finalizado';
$string['attemptfinishedsubmitting'] = 'Intento finalizado entregado:';
$string['attemptoptions'] = 'Opciones de los intentos';
$string['availableq'] = '¿Disponible?';
$string['badbase'] = 'Base errónea antes de **: {$a}**';
$string['behaviour'] = 'Comportamiento';
$string['behaviourbeingused'] = 'Comportamiento utilizado: {$a}';
$string['broken'] = 'Éste es un enlace roto: apunta a un archivo inexistente.';
$string['byandon'] = 'por <em>{$a->user}</em> en <em>{$a->time}</em>';
$string['cannotcopybackup'] = 'No se ha podido copiar el archivo de copia de seguridad';
$string['cannotcreate'] = 'No se ha podido crear una nueva entrada en la tabla question_attempts';
$string['cannotcreatepath'] = 'No se puede crear la ruta: {$a}';
$string['cannotdeletebehaviourinuse'] = 'No puede borrar el comportamiento \'{$a}\'. Es empleado por intentos de preguntas.';
$string['cannotdeletecate'] = 'No puede eliminar la categoría porque es la categoría por defecto para este contexto.';
$string['cannotdeletemissingbehaviour'] = 'No puede desinstalar el comportamiento que falta. Lo necesita el sistema.';
$string['cannotdeletemissingqtype'] = 'No puede eliminar el tipo de pregunta ausente. El sistema la necesita.';
$string['cannotdeleteneededbehaviour'] = 'No se puede eliminar el comportamiento de pregunta \'{$a}\'. Existen otros comportamientos instalados que dependen de él.';
$string['cannotdeleteqtypeinuse'] = 'No puede eliminar la pregunta de tipo \'{$a}\'. Hay preguntas de ese tipo en el banco de preguntas.';
$string['cannotdeleteqtypeneeded'] = 'No puede eliminar la pregunta de tipo \'{$a}\'. Hay otros tipos de preguntas que dependen de ella.';
$string['cannotenable'] = 'El tipo de pregunta {$a} no se puede crear directamente';
$string['cannotenablebehaviour'] = 'El comportamiento de pregunta {$a} no puede emplearse directamente. Es para uso interno exclusivamente.';
$string['cannotfindcate'] = 'No se ha podido encontrar el registro de la categoría';
$string['cannotfindquestionfile'] = 'No se ha podido encontrar el archivo de preguntas en el zip';
$string['cannotgetdsfordependent'] = 'No se puede conseguir el conjunto de datos especificado para la pregunta dependiente (pregunta: {$a->id}, datasetitem: {$a->item})';
$string['cannotgetdsforquestion'] = 'No se puede conseguir el conjunto de datos para una pregunta calculada (pregunta: {$a})';
$string['cannothidequestion'] = 'No se ha podido ocultar la pregunta';
$string['cannotimportformat'] = 'Lo sentimos, aún no está implementada la importación en este formato.';
$string['cannotinsertquestion'] = 'No se ha podido insertar una nueva pregunta';
$string['cannotinsertquestioncatecontext'] = 'No se ha podido insertar la nueva categoría de preguntas {$a->cat} illegal contextid {$a->ctx}';
$string['cannotloadquestion'] = 'No se ha podido cargar la pregunta';
$string['cannotmovequestion'] = 'No puede usar este script para trasladar preguntas que tienen archivos asociados provenientes de distintas áreas.';
$string['cannotopenforwriting'] = 'No puede abrirse para escritura : {$a}';
$string['cannotpreview'] = 'No puede previsualizar estas preguntas.';
$string['cannotread'] = 'No se puede leer el archivo importado (o está vacío)';
$string['cannotretrieveqcat'] = 'No se ha podido recuperar la categoría de preguntas';
$string['cannotunhidequestion'] = 'Error al descubrir la pregunta.';
$string['cannotunzip'] = 'No se ha podido descomprimir el archivo.';
$string['cannotwriteto'] = '{$a}';
$string['category'] = 'Categoría';
$string['categorycurrent'] = 'Categoría actual';
$string['categorycurrentuse'] = 'Usar esta categoría';
$string['categorydoesnotexist'] = 'Esta categoría no existe';
$string['categoryinfo'] = 'Información sobre la categoría';
$string['categorymove'] = 'La categoría \'{$a->name}\' contiene {$a->count} preguntas (algunas de las cuales pueden ser preguntas  antiguas ocultas que todavía se usan en exámenes existentes). Por favor elija otra categoría a donde moverlas..';
$string['categorymoveto'] = 'Guardar en categoría';
$string['categorynamecantbeblank'] = 'El nombre de la categoría no puede estar en blanco';
$string['changeoptions'] = 'Cambiar opciones';
$string['changepublishstatuscat'] = '<a href="{$a->caturl}">La categoría "{$a->name}"</a> en curso "{$a->coursename}" cambiará su estatus de intercambio <strong>{$a->changefrom} a {$a->changeto}</strong>.';
$string['check'] = 'Comprobar';
$string['chooseqtypetoadd'] = 'Elija un tipo de pregunta a agregar';
$string['clearwrongparts'] = 'Borrar respuestas incorrectas';
$string['clickflag'] = 'Marcar pregunta';
$string['clicktoflag'] = 'Marcar esta pregunta para su referencia futura';
$string['clicktounflag'] = 'Desmarcar';
$string['clickunflag'] = 'Desmarcar';
$string['closepreview'] = 'Cerrar vista previa';
$string['combinedfeedback'] = 'Retroalimentación combinada';
$string['comment'] = 'Comentario';
$string['commented'] = 'Comentado: {$a}';
$string['commentormark'] = 'Escribir comentario o corregir la calificación';
$string['comments'] = 'Comentarios';
$string['commentx'] = 'Comentario: {$a}';
$string['complete'] = 'Finalizado';
$string['contexterror'] = 'No debería estar aquí si no está moviendo una categoría a otro contexto.';
$string['copy'] = 'Copiar de {$a} y cambiar los enlaces.';
$string['correct'] = 'Correcta';
$string['correctfeedback'] = 'Para cualquier respuesta correcta';
$string['created'] = 'Creado';
$string['createdby'] = 'Creado por';
$string['createdmodifiedheader'] = 'Creado / Último guardado';
$string['createnewquestion'] = 'Crear una nueva pregunta...';
$string['cwrqpfs'] = 'Preguntas aleatorias seleccionando preguntas de sub-categorías.';
$string['cwrqpfsinfo'] = '<p>Durante la actualización a Moodle 1.9 separaremos las categorías de pregunta en diferentes contextos. Algunas categorías y preguntas de su sitio verán su estatus de intercambio modificado. Esto es necesario en los raros casos en que una o más preguntas aleatorias se seleccionan a partir de una mezcla de categorías compartidas y no compartidas (como sucede en el caso de este sitio). Esto sucede cuando una pregunta aleatoria se ajusta para seleccionar a partir de subcategorías, y una o más subcategorías tienen diferente estatus de intercambio con la categoría padre en la que se crea la pregunta aleatoria.</p> <p>Las siguientes categorías, de las cuales las preguntas aleatorias de las categorías superiores seleccionan las preguntas, tendrán -en la actualización a Moodle 1.9- su estatus de intercambio modificado al mismo estatus que la categoría que contiene la pregunta aleatoria. Las categorías que aparecen a continuación tendrán su estatus de intercambio modificado. Las preguntas afectadas continuarán funcionando en todos los exámenes existentes hasta que usted las elimine de tales exámenes.';
$string['cwrqpfsnoprob'] = 'No existen categorías en su sitio afectadas por la opción \'Preguntas aleatorias seleccionando preguntas de subcategorías\'.';
$string['decimalplacesingrades'] = 'Decimales en las calificaciones';
$string['defaultfor'] = 'Por defecto en {$a}';
$string['defaultinfofor'] = 'Categoría por defecto para preguntas compartidas en el contexto {$a}.';
$string['defaultmark'] = 'Puntuación por defecto';
$string['defaultmarkmustbepositive'] = 'La puntuación por defecto debe ser positiva';
$string['deletebehaviourareyousure'] = 'Eliminar comportamiento {$a}: ¿está seguro?';
$string['deletebehaviourareyousuremessage'] = 'Está a punto de eliminar por completo el comportamiento de la pregunta {$a}. Esta acción eliminará de la base de datos todo aquello asociado al comportamiento de esta pregunta . ¿Seguro de que desea continuar?';
$string['deletecoursecategorywithquestions'] = 'Hay preguntas en el banco de preguntas asociadas con esta categoría de curso. Si continúa, serán eliminadas. Quizás quiera trasladarlas primero, usando la interfaz del banco de preguntas.';
$string['deleteqtypeareyousure'] = '¿Está seguro que desea eliminar el tipo de pregunta \'{$a} "';
$string['deleteqtypeareyousuremessage'] = 'Usted está a punto de eliminar por completo el tipo de pregunta \'{$a}\'. ¿Desea continuar?';
$string['deletequestioncheck'] = '¿Está totalmente seguro que quiere borrar \'{$a}\'?';
$string['deletequestionscheck'] = '¿Está totalmente seguro que quiere borrar las siguientes preguntas?<br /><br />{$a}';
$string['deletingbehaviour'] = 'Borrando el comportamiento de pregunta \'{$a}';
$string['deletingqtype'] = 'Eliminando el tipo de pregunta \'{$a} "';
$string['didnotmatchanyanswer'] = '[No concordó con ninguna respuesta]';
$string['disabled'] = 'Desactivado';
$string['displayoptions'] = 'Opciones de visualización';
$string['disterror'] = 'La distribución {$a} ha causado problemas';
$string['donothing'] = 'No copie o mueva archivos ni cambie enlaces.';
$string['editcategories'] = 'Editar categorías';
$string['editcategories_help'] = '<p>En lugar de guardar todas sus preguntas en una lista, puede crear categorías para distribuirlas mejor.</p> <p>Las categorías pueden crearse o eliminarse a voluntad. Pero: <ul><li> Debe haber al menos una categoría en cada contexto. De este modo, usted no puede eliminar la última categoría de un contexto.</li> <li>Cuando intente eliminar una categoría que contiene preguntas, se le pedirá que especifique otra categoría a la que trasladarlas.</li></ul></p> <p>Usted puede ordenar sus categorías en una jerarquía de modo que resulten de fácil manejo. La edición de categorías se hace en la pestaña \'Categorías\' en el banco de preguntas.</p> <ul><li>En la página principal  (portada)bajo la pestaña \'Categorías\' en el banco de preguntas: <ul><li>las flechas arriba y abajo cambian el orden en que se listan las categorías que pertenecen al mismo nivel.</li> <li>En la pestaña \'Categorías\' del banco de preguntas, podrá asimismo trasladar una categoría a un nuevo contexto mediante las flechas arriba y abajo.</li> <li>Las flechas izquierda y derecha se usan para cambiar la categoría padre de una categoría determinada.</li></ul></li> <li>Tal vez una forma más rápida de mover las categorías sea pulsar en el icono de edición de la pestaña \'Categorías\' del banco de preguntas y usar seguidamente la casilla de selección para seleccionar una nueva categoría padre.</li></ul></p> <p>Vea también:</p> <ul> <li><a href="help.php?module=question&file=categorycontexts.html">Contextos de categorías</a></li> <li><a href="help.php?module=question&file=permissions.html">Permisos (preguntas)</a></li> <li><a href="http://docs.moodle.org/en/Question_categories">Ayuda sobre categorías de preguntas en Moodle Docs</a></li> </ul>';
$string['editcategory'] = 'Ediar categoría';
$string['editingcategory'] = 'Edición de una categoría';
$string['editingquestion'] = 'Edición de una pregunta';
$string['editquestion'] = 'Editar pregunta';
$string['editquestions'] = 'Editar pregunta';
$string['editthiscategory'] = 'Editar esta categoría';
$string['emptyxml'] = 'Error desconocido - imsmanifest.xml vacío';
$string['enabled'] = 'Activado';
$string['erroraccessingcontext'] = 'No se puede acceder al contexto';
$string['errordeletingquestionsfromcategory'] = 'Error al eliminar preguntas de la categoría {$a}.';
$string['errorduringpost'] = 'Ha ocurrido un error durante el post-procesamiento';
$string['errorduringpre'] = 'Ha ocurrido un error durante el pre-procesamiento';
$string['errorduringproc'] = 'Ha ocurrido un error durante el procesamiento';
$string['errorduringregrade'] = 'No se ha podido recalificar la pregunta {$a->qid}, se va al estado {$a->stateid}.';
$string['errorfilecannotbecopied'] = 'Error: no se puede copiar el archivo {$a}.';
$string['errorfilecannotbemoved'] = 'Error: no se puede mover el archivo {$a}.';
$string['errorfileschanged'] = 'Los archivos de error enlazados desde preguntas han cambiado desde que se ha mostrado el formato.';
$string['errormanualgradeoutofrange'] = 'La calificación {$a->grade} no está entre 0 y {$a->maxgrade} para la pregunta {$a->name}. La puntuación y el comentario no se han guardado.';
$string['errormovingquestions'] = 'Error al trasladar preguntas con IDs {$a}.';
$string['errorpostprocess'] = 'Ha ocurrido un error durante el post-procesamiento';
$string['errorpreprocess'] = 'Ha ocurrido un error durante el pre-procesamiento';
$string['errorprocess'] = 'Ha ocurrido un error durante el procesamiento';
$string['errorprocessingresponses'] = 'Ha ocurrido un error al procesar sus respuestas.({$a}). Elija continuar para regresar a la página en donde estaba y volver a intentarlo.';
$string['errorsavingcomment'] = 'Error al guardar el comentario para la pregunta {$a->name} en la base de datos.';
$string['errorsavingflags'] = 'Error al guardar el estado.';
$string['errorupdatingattempt'] = 'Error al actualizar el intento {$a->id} en la base de datos.';
$string['exportcategory'] = 'Exportar categoría';
$string['exportcategory_help'] = '<p align="center"><b>Categoría de exportación</b></p>

<p>Se utiliza el menú emergente <b>Categoría:</b> para seleccionar la categoría de la que se tomarán las preguntas exportadas.</p>

<p>Algunos formatos de importación (GIFT y XML) permiten incluir la categoría en el archivo escrito, posibilitando así que las categorías puedan opcionalmente ser recreadas al importarlas. Para que esto suceda, es preciso marcar la casilla <b>Escribir categoría a un archivo</b>.</p>';
$string['exporterror'] = 'Ha ocurrido un error durante la exportación';
$string['exportfilename'] = 'preguntas';
$string['exportnameformat'] = '%Y%m%d-%H%M';
$string['exportquestions'] = 'Exportar preguntas a un archivo';
$string['exportquestions_help'] = '<P>Esta función permite exportar una categoría completa de preguntas a un archivo de texto.</p> <p>Por favor, advierta que en muchos formatos de archivo se pierde alguna información cuando se exportan las preguntas. Esto se debe a que muchos formatos no poseen todas las características existentes en las preguntas de Moodle. No puede esperarse exportar preguntas y luego importarlas de modo que ambas sean idénticas. Asimismo, algunos tipos de preguntas no pueden exportarse en absoluto. Compruebe los datos exportados antes de usarlos en un servidor de producción.</p> <P>Los formatos posibles actualmente son:</p> <P><B>Formato GIFT</B></P> <ul> <p>GIFT es el formato de importación/exportación más completo de que se dispone para exportar preguntas Moodle a un archivo de texto. Fue diseñado para que los profesores escribieran fácilmente preguntas en un archivo de texto. Soporta los formatos de elección múltiple, verdadero-falso, respuesta corta, relacionar columnas, preguntas numéricas, así como la inserción de _______ en el formato de "palabra faltante". Advierta que las preguntas incrustadas ("cloze") no se incluyen por el momento. En un archivo de texto pueden mezclarse preguntas de distinto tipo, y el formato soporta asimismo comentarios, nombres de las preguntas, retroalimentación y calificaciones ponderadas (en porcentajes). He aquí algunos ejemplos:</p> <pre> ¿En qué mes de 1492 Colón descubrió América?{~Noviembre ~Septiembre =Octubre} Colón descubrió América el 12 de {~noviembre =octubre ~septiembre} de 1492. Colón descubrió América el 12 de noviembre de 1492.{FALSE} ¿Quién descubrió América el 12 de octubre de 1492?{=Colón =Cristóbal Colón} ¿En qué año llegó Colón a América?{#1492} </pre> <p class="moreinfo"><a href="help.php?file=formatgift.html&amp;module=quiz">Más sobre el formato "GIFT"</a></p> </ul> <p><b>Formato XML Moodle XML</b></p> <ul> <p>Este formato específico de Moodle exporta preguntas en formato simple XML. Esas preguntas pueden luego importarse a cualquier categoría del examen, o usarse en cualquier otro proceso, tal como una transformación XSLT.</p> </ul> <p><b>IMS QTI 2.0</b></p> <ul> <p>Las preguntas se exportan en el formato IMS QTI estándar (version 2.0) format. Note que este modo de exportación genera un grupo de archivos dentro de un único archivo \'zip\'.</p> <p class="moreinfo"><a href="http://www.imsglobal.org/question/" target="_qti">Más información sobre el sitio IMS QTI</a> (sitio externo en una ventana nueva)</p> </ul> <p><b>XHTML</b></p> <ul> <p>Exporta la categoría en una única página de XHTML \'estricto\'. Cada una de las preguntas es ubicada en su propia marca &lt;div&gt;. Si desea usar esta página tal cual, necesitará al menos editar la marca &lt;form&gt; al comienzo de la sección &lt;body&gt; para posibilitar acciones tales como \'mailto\'.</p> </ul> <P>¡Pronto se dispondrá de más formatos, incluyendo WebCT y cualesquiera otros que los usuarios de Moodle quieran incorporar! </p>';
$string['feedback'] = 'Retroalimentación';
$string['filecantmovefrom'] = 'Los archivos de preguntas no se pueden mover porque usted no tiene permiso para trasladar archivos del lugar desde el que está intentando hacerlo.';
$string['filecantmoveto'] = 'Los archivos de preguntas no se pueden mover o copiar porque usted no tiene permiso para añadir archivos del lugar al que está intentando hacerlo.';
$string['fileformat'] = 'Formato de archivo';
$string['filesareacourse'] = 'área de archivos del curso';
$string['filesareasite'] = 'área de archivos del sitio';
$string['filestomove'] = '¿Mover / copiar archivos a {$a}?';
$string['fillincorrect'] = 'Rellenar con las respuestas correctas';
$string['flagged'] = 'Marcadas';
$string['flagthisquestion'] = 'Marcar esta pregunta';
$string['formquestionnotinids'] = 'Pregunta contenida en formulario que no está en questionids.';
$string['fractionsnomax'] = 'Una de las respuestas debería tener una puntuación del 100% de modo que sea posible conseguir la calificación máxima en esta pregunta.';
$string['generalfeedback'] = 'Retroalimentación general';
$string['generalfeedback_help'] = 'La retroalimentación general se muestra al estudiante después de haber respondido a la pregunta. A diferencia de la retroalimentación para la respuesta, que depende del tipo de pregunta y de la respuesta dada por el estudiante, aquí se muestra siempre el mismo texto en todos los casos.

Se puede utilizar la retroalimentación general para proporcionar a los estudiantes una respuesta de ejemplo correcta, o tal vez para una liga hacia información complementaria que puedan utilizar en el caso de que no hubieran entendido bien la pregunta.';
$string['getcategoryfromfile'] = 'Obtener categoría de archivo';
$string['getcontextfromfile'] = 'Obtener contexto de archivo';
$string['hidden'] = 'Oculto/a';
$string['hintn'] = 'Pista {no}';
$string['hinttext'] = 'Texto de la pista';
$string['howquestionsbehave'] = 'Comportamiento de las preguntas';
$string['howquestionsbehave_help'] = 'Los estudiantes pueden interactuar con las preguntas en el cuestionario de varias maneras diferentes. Por ejemplo, usted puede desear que los estudiantes introduzcan una respuesta a cada pregunta y posteriormente envien el cuestionario completo, antes de que se realice ninguna calificación o de que se envíe ninguna retroalimentación. Ese sería el modo de \'retroalimentación diferida\'. En otra situación, usted puede desear que los estudiantes respondan una pregunta y sobre la marcha obtengan retroalimentación inmediata, y si la respuesta no es correcta, tengan otra otra oportunidad con menor puntuación. Este modo sería \'interactivo con varios intentos\' .';
$string['ignorebroken'] = 'Pasar por alto enlaces rotos';
$string['importcategory'] = 'Categoría a donde importar';
$string['importcategory_help'] = '<p>Se utiliza el menú emergente <b>Categoría:</b> para seleccionar la categoría en la que irán las preguntas importadas.</p>

<p>Algunos formatos de importación (GIFT y XML) permiten especificar la categoría dentro del archivo de importación. Para que esto suceda, debe estar marcada la casilla <b>desde archivo</b>. En caso contrario, la pregunta irá a la categoría seleccionada independientemente de las instrucciones del archivo.</p>

<p>Cuando se especifican las categorías dentro de un archivo de importación, se crearán en el caso de que no existan.</p>';
$string['importerror'] = 'Ocurrió un error durante el proceso de importación';
$string['importerrorquestion'] = 'Error al importar pregunta';
$string['importfromcoursefiles'] = '... o elija un archivo de curso para importar.';
$string['importfromupload'] = 'Elija un archivo para subir ...';
$string['importingquestions'] = 'Importando {$a} preguntas desde archivo';
$string['importparseerror'] = 'Error(es) encontrado(s) al analizar el archivo de importación. No se han importado las preguntas. Para importar las preguntas que puedan rescatarse, inténtelo de nuevo con la configuración de NO en el parámetro "Detenerse en error"';
$string['importquestions'] = 'Importar preguntas de un archivo';
$string['importquestions_help'] = 'Esta función posibilita la importación de preguntas en distintos formatos por medio de un archivo de texto. Advierta que el archivo debe tener la codificación UTF-8.';
$string['importwrongfiletype'] = 'El tipo de archivo elegido ({$a->actualtype}) no coincide con el tipo esperado por el formato de importación ({$a->expectedtype}).';
$string['impossiblechar'] = 'Se ha detectado un carácter imposible {$a} como carácter de paréntesis';
$string['includesubcategories'] = 'Mostrar también preguntas de las sub-categorías';
$string['incorrect'] = 'Incorrecta';
$string['incorrectfeedback'] = 'Para cualquier respuesta incorrecta';
$string['information'] = 'Información';
$string['invalidanswer'] = 'Respuesta incompleta';
$string['invalidarg'] = 'No se han suministrado argumentos válidos, o la configuración del servidor es incorrecta';
$string['invalidcategoryidforparent'] = 'El ID de la categoría padre no es válido.';
$string['invalidcategoryidtomove'] = 'El ID de la categoría a mover no es válido.';
$string['invalidconfirm'] = 'La cadena de confirmación es incorrecta';
$string['invalidcontextinhasanyquestions'] = 'Contexto no válido pasado a question_context_has_any_questions.';
$string['invalidgrade'] = 'Las calificaciones no coinciden con las opciones de calificación - se saltaron preguntas';
$string['invalidpenalty'] = 'Penalización no válida';
$string['invalidwizardpage'] = 'La página asistente es incorrecta o no está especificada.';
$string['lastmodifiedby'] = 'Última modificación por';
$string['linkedfiledoesntexist'] = 'El archivo enlazado {$a} no existe';
$string['makechildof'] = 'Crear una categoría "hija" de \'{$a}\'';
$string['makecopy'] = 'Crear copia';
$string['maketoplevelitem'] = 'Mover al nivel superior';
$string['manualgradeoutofrange'] = 'La calificación se encuentra fuera del rango válido.';
$string['manuallygraded'] = 'Calificada manualmente {$a->mark} con comentario: {$a->comment}';
$string['mark'] = 'Puntuación';
$string['markedoutof'] = 'Puntúa como';
$string['markedoutofmax'] = 'Puntúa como {$a}';
$string['markoutofmax'] = 'Puntúa {$a->mark} sobre {$a->max}';
$string['marks'] = 'Puntos';
$string['matchgrades'] = 'Coincidir calificaciones';
$string['matchgradeserror'] = 'Error si la calificación no está en la lista';
$string['matchgrades_help'] = '<p>Las calificaciones importadas <b>deben</b> corresponderse con alguna de las que figuran en la lista fija de calificaciones válidas, de este modo:</p>

<ul>
  <li>100%</li>
  <li>90%</li>
  <li>80%</li>
  <li>75%</li>
  <li>70%</li>
  <li>66.666%</li>
  <li>60%</li>
  <li>50%</li>
  <li>40%</li>
  <li>33.333</li>
  <li>30%</li>
  <li>25%</li>
  <li>20%</li>
  <li>16.666%</li>
  <li>14.2857</li>
  <li>12.5%</li>
  <li>11.111%</li>
  <li>10%</li>
  <li>5%</li>
  <li>0%</li>
</ul>

<p>se admiten asimismo los valores negativos de la lista anterior.</p>

<p>Esta opción tiene dos posibilidades, que afectan a la forma en que la rutina de importación trata los valores que no se corresponden <strong>exactamente</strong> con cualquiera de los valores de la lista</p>

<ul>
  <li><strong>Error si la calificación no está en la lista</strong><br />
  Si una pregunta contiene cualesquiera calificaciones que no se correspondan con los valores de la lista, se mostrará un mensaje de error y esa pregunta no se importará.</li>
  <li><strong>Calificación más próxima si no está en la lista</strong><br />
  Si se encuentra una calificación que no se corresponde con uno de los valores de la lista, se toma el valor más próximo de la lista</li>
</ul>

<p><i>Nota: algunos formatos de importación personalizados pueden escribir directamente en la base de datos y no quedar afectados por esta comprobación</i></p>';
$string['matchgradesnearest'] = 'Calificación más próxima si no está en lista';
$string['missingcourseorcmid'] = 'Es necesario proporcionar courseid o cmid a print_question';
$string['missingcourseorcmidtolink'] = 'Es necesario proporcionar courseid o cmid a get_question_edit_link';
$string['missingimportantcode'] = 'Este tipo de pregunta carece de un código importante: {$a}.';
$string['missingoption'] = 'La multipregunta CLOZE {$a} no tiene las opciones necesarias';
$string['modified'] = 'Último guardado';
$string['move'] = 'Mover desde {$a} y cambiar enlaces.';
$string['movecategory'] = 'Mover categoría';
$string['movedquestionsandcategories'] = 'Trasladadas preguntas y categorías de preguntas de {$a->oldplace} a {$a->newplace}.';
$string['movelinksonly'] = 'Limitarse a cambiar el lugar al que apuntan los enlaces, no mover ni copiar archivos.';
$string['moveq'] = 'Mover pregunta(a)';
$string['moveqtoanothercontext'] = 'Mover pregunta a otro contexto.';
$string['moveto'] = 'Mover a >>';
$string['movingcategory'] = 'Moviendo categoría';
$string['movingcategoryandfiles'] = '¿Está seguro de que quiere mover la categoría {$a->name} y todas sus categorías subordinadas al contexto de "{$a->contextto}"?<br /> Hemos detectado {$a->urlcount} archivos enlazados desde preguntas en {$a->fromareaname}; ¿desea copiarlas o moverlas a {$a->toareaname}?';
$string['movingcategorynofiles'] = '¿Está seguro de que quiere mover la categoría "{$a->name}" y todas sus categorías subordinadas al contexto para "{$a->contextto}"?';
$string['movingquestions'] = 'Moviendo preguntas y cualquier archivo';
$string['movingquestionsandfiles'] = '¿Está seguro de que quiere mover la(s) pregunta(s) {$a->questions} al contexto de <strong>"{$a->tocontext}"</strong>?<br /> Hemos detectado <strong>{$a->urlcount} archivos</strong> enlazados con esta(s) pregunta(s) en {$a->fromareaname}; ¿desea copiarlos o moverlos a {$a->toareaname}?';
$string['movingquestionsnofiles'] = '¿Está seguro de que quiere mover la(s) pregunta(s) {$a->questions} al contexto de <strong>"{$a->tocontext}"</strong>?<br /> No hay <strong>ningún archivo</strong> enlazado desde esta(s) pregunta(s) en {$a->fromareaname}.';
$string['needtochoosecat'] = 'Necesita elegir una categoría para mover esta pregunta o presionar \'cancelar\'.';
$string['nocate'] = 'No existe esa categoría {$a}';
$string['nopermissionadd'] = 'No tiene permiso para agregar preguntas aquí.';
$string['nopermissionmove'] = 'Usted no tiene permiso para trasladar preguntas desde este lugar. Debe guardar la pregunta en esta categoría o guardarla como pregunta nueva.';
$string['noprobs'] = 'No se han encontrado problemas en su base de datos de preguntas.';
$string['noquestions'] = 'No se encontraron preguntas que pudiesen ser exportadas. Asegúrese de que ha seleccionado una categoría para exportar que contenga preguntas.';
$string['noquestionsinfile'] = 'No hay preguntas en el archivo de importación';
$string['noresponse'] = '[Sin respuesta]';
$string['notanswered'] = 'Sin contestar';
$string['notchanged'] = 'Sin cambios desde el último intento';
$string['notenoughanswers'] = 'Este tipo de pregunta requiere al menos {$a} respuestas';
$string['notenoughdatatoeditaquestion'] = 'No se ha especificado ni el id de la pregunta ni el de la categoría y tipo de pregunta.';
$string['notenoughdatatomovequestions'] = 'Necesita proporcionar los ids de las preguntas que quiere mover.';
$string['notflagged'] = 'No marcadas';
$string['notgraded'] = 'Sin calificar';
$string['notshown'] = 'No se muestra';
$string['notyetanswered'] = 'Sin responder aún';
$string['notyourpreview'] = 'Esta vista previa no le corresponde';
$string['novirtualquestiontype'] = 'No existe un tipo de pregunta virtual para el tipo de pregunta {$a}';
$string['numqas'] = 'Número de  intentos de pregunta';
$string['numquestions'] = 'Número de preguntas';
$string['numquestionsandhidden'] = '{$a->numquestions} (+{$a->numhidden} ocultas)';
$string['options'] = 'Opciones';
$string['orphanedquestionscategory'] = 'Preguntas guardadas de categorías eliminadas';
$string['orphanedquestionscategoryinfo'] = 'Ocasionalmente, debido a errores del software, las preguntas pueden quedarse en la base de datos a pesar de que la categoría de pregunta correspondiente haya sido eliminada. Por supuesto, esto no debería de pasar, pero ha sucedido en este sito en el pasado. Esta categoría ha sido creada automáticamente, y las preguntas huérfanas se han trasladado aquí para que pueda gestionarlas. Observe que cualquier imagen o archivo multimedia empleado por estas preguntas seguramente se hayan perdido.';
$string['page-question-category'] = 'Página de categoría de preguntas';
$string['page-question-edit'] = 'Página de edición de preguntas';
$string['page-question-export'] = 'Página de exportación de preguntas';
$string['page-question-import'] = 'Página de importación de preguntas';
$string['page-question-x'] = 'Cualquier página de preguntas';
$string['parent'] = 'Padre';
$string['parentcategory'] = 'Categoría padre';
$string['parentcategory_help'] = '<h2>Padre</h2> <p>Categoría en la que se colocará. \'Superior\' significa que esta categoría no está contenida en ninguna otra categoría.</p> <p>Normalmente verá algunos \'contextos\' de categoría en negrita; advierta que cada contexto contiene la jerarquía de su propia categoría. Más abajo hay más información sobre los contextos. Si usted no ve varios contextos, puede deberse a que no tiene permiso para acceder a otros contextos.</p> <p>Si en un contexto hay una sola categoría, no podrá mover dicha categoría, toda vez que debe haber al menos una categoría en cada contexto.</p>';
$string['parenthesisinproperclose'] = 'El paréntesis antes de ** no se ha cerrado correctamente en {$a}**';
$string['parenthesisinproperstart'] = 'El paréntesis antes de ** no se ha abierto correctamente en {$a}**';
$string['parsingquestions'] = 'Procesando las preguntas del archivo importado.';
$string['partiallycorrect'] = 'Parcialmente correcta';
$string['partiallycorrectfeedback'] = 'Para cualquier respuesta parcialmente correcta';
$string['penaltyfactor'] = 'Factor de penalización';
$string['penaltyfactor_help'] = '<p>Puede especificar qué fracción de la puntuación obtenida debería substraerse por cada respuesta errónea. Esto sólo resulta relevante si el examen se ejecuta en modo adaptativo, de forma que se permite al estudiante repetir las respuestas a la pregunta.

El factor de penalización debería ser un número entre 0 y 1. Un factor de penalización de 1 significa que el estudiante ha de dar la respuesta correcta al primer intento para conseguir la calificación máxima. Un factor de penalización de 0 significa que el estudiante puede intentar responder cuantas veces quiera y aun así puede conseguir la calificación máxima.</p>';
$string['penaltyforeachincorrecttry'] = 'Penalización por cada intento incorrecto';
$string['penaltyforeachincorrecttry_help'] = 'Cuando se responden preguntas configuradas con "Intentos múltiples" o en "Modo adaptativo", de manera que el alumno puede realizar varios intentos para responder a la pregunta de forma correcta, esta opción define el valor de la penalización que se aplica por cada intento incorrecto.

La penalización es proporcional a la calificación total de la pregunta; así, si la pregunta vale tres puntos, y la penalización es de 0.3333333 (33,33%), el estudiante obtiene los 3 puntos si responde correctamente al primer intento, 2 si lo hacen en un segundo intento, y 1 si lo hace en el tercero.';
$string['permissionedit'] = 'Editar esta pregunta';
$string['permissionmove'] = 'Mover esta pregunta';
$string['permissionsaveasnew'] = 'Guardarla como pregunta nueva';
$string['permissionto'] = 'Usted tiene permiso para:';
$string['previewquestion'] = 'Vista previa de la pregunta';
$string['published'] = 'compartida';
$string['qbehaviourdeletefiles'] = 'Todos los datos relacionados con el comportamiento de pregunta \'{$a->behaviour}\' han sido borrados de la base de datos. Para completar la eliminación (y para evitar que el comportamiento de  pregunta se vuelva a reinstalar por sí misma), debería eliminar ahora este directorio de su servidor: {$a->directory}';
$string['qtypedeletefiles'] = 'Todos los datos relacionados con el tipo de pregunta \'{$a->qtype}\' han sido borrados de la base de datos. Para completar la eliminación (y para evitar el tipo de pregunta se vuelva a reinstalar por sí misma), debería eliminar ahora este directorio de su servidor: {$a->directory}';
$string['qtypeveryshort'] = 'T';
$string['questionaffected'] = '<a href="{$a->qurl}">La pregunta "{$a->name}" ({$a->qtype})</a> está en esta categoría, pero está también siendo usada en <a href="{$a->qurl}">el cuestionario "{$a->quizname}"</a> en otro curso "{$a->coursename}".';
$string['questionbank'] = 'Banco de preguntas';
$string['questionbehaviouradminsetting'] = 'Configuraciones del comportamiento de preguntas';
$string['questionbehavioursdisabled'] = 'Comportamiento de preguntas a deshabilitar';
$string['questionbehavioursdisabledexplained'] = 'Teclee una lista (separada por comas)  de comportamientos que no desea que aparezcan en el menú desplegable';
$string['questionbehavioursorder'] = 'Orden del comportamiento de preguntas';
$string['questionbehavioursorderexplained'] = 'Teclee una lista (separada por comas)  de comportamientos en el orden que quiere que aparezcan en el menú desplegable';
$string['questioncategory'] = 'Categoría de pregunta';
$string['questioncatsfor'] = 'Categorías de pregunta para \'{$a}\'';
$string['questiondoesnotexist'] = 'Esta pregunta no existe.';
$string['questionidmismatch'] = 'Error en los IDs de las preguntas';
$string['questionname'] = 'Nombre de la pregunta';
$string['questionno'] = 'Pregunta {$a}';
$string['questions'] = 'Preguntas';
$string['questionsaveerror'] = 'Se han producido errores al guardar la pregunta - ({$a})';
$string['questionsinuse'] = '{*Las preguntas marcadas con un asterisco ya están en uso en algún cuestionario. Estas preguntas no serán borradas de estos cuestionarios, solo de la lista de la categoría}';
$string['questionsmovedto'] = 'Preguntas aún en uso trasladadas a "{$a}" en la categoría de curso padre.';
$string['questionsrescuedfrom'] = 'Preguntas guardadas del contexto {$a}.';
$string['questionsrescuedfrominfo'] = 'Estas preguntas (alguna de las cuales puede estar oculta) se han guardado cuando el contexto {$a} fue eliminado debido a que aún están siendo utilizadas por algún cuestionario o por otras actividades.';
$string['questiontext'] = 'Texto de la pregunta';
$string['questiontype'] = 'Tipo de pregunta';
$string['questionuse'] = 'Usar pregunta en esta actividad';
$string['questionvariant'] = 'Variante de la pregunta';
$string['questionx'] = 'Pregunta {$a}';
$string['requiresgrading'] = 'Requiere calificación';
$string['responsehistory'] = 'Historial de respuestas';
$string['restart'] = 'Comenzar de nuevo';
$string['restartwiththeseoptions'] = 'Comenzar de nuevo con estas opciones';
$string['reviewresponse'] = 'Revisar respuesta';
$string['rightanswer'] = 'Respuesta correcta';
$string['rightanswer_help'] = 'un resumen generado automáticamente de las respuestas correctas. Pudiera estar limitado, por lo que podría desear explicar la solución correcta en la retroalimentación general para la pregunta, y deshabilitar esta opción.';
$string['save'] = 'Guardar';
$string['saved'] = 'Guardada: {$a}';
$string['saveflags'] = 'Guardar el estado en las marcas';
$string['selectacategory'] = 'Seleccionar una categoría:';
$string['selectaqtypefordescription'] = 'Seleccionar un tipo de pregunta para ver su descripción.';
$string['selectcategoryabove'] = 'Seleccione una categoría';
$string['selectquestionsforbulk'] = 'Seleccionar preguntas de acciones en masa';
$string['settingsformultipletries'] = 'Configuración para múltiples intentos';
$string['shareincontext'] = 'Compartir en contexto para {$a}';
$string['showhidden'] = 'Mostrar también preguntas antiguas';
$string['showmarkandmax'] = 'Mostrar puntuacion y máximo';
$string['showmaxmarkonly'] = 'Mostrar solo puntuación máxima';
$string['shown'] = 'Se muestra';
$string['shownumpartscorrect'] = 'Mostrar el número de respuestas correctas';
$string['shownumpartscorrectwhenfinished'] = 'Mostrar el número de respuestas correctas en cuanto se termine la pregunta';
$string['showquestiontext'] = 'Mostrar el texto de la pregunta en la lista de preguntas';
$string['specificfeedback'] = 'Retroalimentación específica';
$string['specificfeedback_help'] = 'Retroalimentación que depende de las respuestas dadas por el estudiante.';
$string['started'] = 'Iniciado/a';
$string['state'] = 'Estado';
$string['step'] = 'Paso';
$string['stoponerror'] = 'Detenerse si se produce un error';
$string['stoponerror_help'] = 'Esta opción determina si el proceso de importación se detiene cuando se detecta un error (lo que resulta en que no se importan preguntas), o si cualesquiera preguntas que contengan errores se pasen por alto y se importen sólo preguntas válidas.';
$string['submissionoutofsequence'] = 'Acceso fuera de secuencia. Por favor no haga clic en el botón de regresar del navegador web cuando esté trabajando con las preguntas del examen';
$string['submissionoutofsequencefriendlymessage'] = 'Ha introducido datos fuera de la secuencia normal. Esto puede ocurrir si utiliza los botones Atrás o Adelante de su navegador; por favor no los utilice durante la prueba. También puede ocurrir si hace clic sobre algo mientras se carga una página. Haga clic en <strong>Continuar</strong> para <strong>seguir.</strong>';
$string['submit'] = 'Enviar';
$string['submitandfinish'] = 'Enviar y terminar';
$string['submitted'] = 'Enviar: {$a}';
$string['technicalinfo'] = 'Información técnica';
$string['technicalinfo_help'] = 'Esta información técnica probablemente solo le sea útil a los desarrolladores que trabajan en nuevos tipos de preguntas. Tambén podría serle útil a quienes tratan de diagnosticar problemas con las preguntas.';
$string['technicalinfominfraction'] = 'Fracción mínima: {$a}';
$string['technicalinfoquestionsummary'] = 'Resumen de pregunta: {$a}';
$string['technicalinforightsummary'] = 'Resumen de respuesta correcta: {$a}';
$string['technicalinfostate'] = 'Estado de pregunta: {$a}';
$string['tofilecategory'] = 'Escribir categoría a archivo';
$string['tofilecontext'] = 'Escribir contexto a archivo';
$string['uninstallbehaviour'] = 'Desinstalar este comportamiento de pregunta';
$string['uninstallqtype'] = 'Desinstalar este tipo de pregunta';
$string['unknown'] = 'Desconocido';
$string['unknownbehaviour'] = 'Comportamiento desconocido: {$a}.';
$string['unknownorunhandledtype'] = 'Tipo de pregunta desconocida o no controlada: {$a}';
$string['unknownquestion'] = 'Pregunta desconocida: {$a}.';
$string['unknownquestioncatregory'] = 'Categoría de pregunta desconocida: {$a}';
$string['unknownquestiontype'] = 'Tipo de pregunta desconocido: {$a}.';
$string['unknowntolerance'] = 'Tipo de tolerancia desconocido: {$a}.';
$string['unpublished'] = 'no compartida';
$string['updatedisplayoptions'] = 'Actualizar opciones de visualización';
$string['upgradeproblemcategoryloop'] = 'Se ha detectado un problema al actualizar las categorías de preguntas. Hay un bucle (\'loop\') en el árbol de categorías. Las IDs de categorías afectadas son {$a}.';
$string['upgradeproblemcouldnotupdatecategory'] = 'No se ha podido actualizar la categoría de pregunta {$a->name} ({$a->id}).';
$string['upgradeproblemunknowncategory'] = 'Se ha detectado un problema al actualizar las categorías de preguntas. La catogoría {$a->id} se refiere al padre {$a->parent}, que no existe. Se ha cambiado el padre para solucionar el problema.';
$string['whethercorrect'] = 'Si fuese correcta';
$string['whethercorrect_help'] = 'Esto cubre tanto la descripción textual \'Correcta\' , \'Parcialmente correcta\' o \'Incorrecta\', y cualquier resaltado coloreado que transmita la misma información.';
$string['withselected'] = 'Con seleccionadas';
$string['wrongprefix'] = 'Prefijo de nombre formateado erróneamente {$a}.';
$string['xoutofmax'] = '{$a->mark} sobre {$a->max}';
$string['yougotnright'] = 'Ha seleccionado correctamente {$a->num}.';
$string['youmustselectaqtype'] = 'Debe seleccionar un tipo de pregunta';
$string['yourfileshoulddownload'] = 'Su archivo de exportación debería comenzar a descargarse en seguida. De no ser así, por favor <a href="{$a}">haga clic aquí</a>. Se ha cambiado el padre para solucionar el problema.';
