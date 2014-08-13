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
 * Strings for component 'questionnaire', language 'es', branch 'MOODLE_26_STABLE'
 *
 * @package   questionnaire
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['action'] = 'Acción';
$string['additionalinfo'] = 'Información adicional';
$string['additionalinfo_help'] = 'Texto a mostrar en la parte superior de la primera página de esta encuesta. (por ejemplo, instrucciones, información general, etc)';
$string['addnewquestion'] = 'Añadir una pregunta del tipo {$a}';
$string['addquestions'] = 'Añadir preguntas';
$string['addselqtype'] = 'Añadir una pregunta de este tipo';
$string['alignment'] = 'Alineación de los botones de radio';
$string['alignment_help'] = 'Selección de botones de alineación: vertical (por defecto) u horizontal.';
$string['all'] = 'Todo';
$string['alreadyfilled'] = 'Usted ya ha cumplimentado la encuesta {$a}. Gracias';
$string['andaveragevalues'] = 'y valores medios';
$string['anonymous'] = 'Anónimo';
$string['answerquestions'] = 'Responda a las preguntas...';
$string['attemptstillinprogress'] = 'En curso. Guardado en:';
$string['autonumbering'] = 'Numeración automática';
$string['average'] = 'Media';
$string['averagerank'] = 'Rango de la media';
$string['bodytext'] = 'Cuerpo del texto';
$string['boxesnbexact'] = 'exactamente {$a} casilla(s).';
$string['boxesnbmax'] = 'un máximo de {$a} casilla(s).';
$string['boxesnbmin'] = 'un mínimo de {$a} casilla(s).';
$string['boxesnbreq'] = 'Para esta pregunta debe marcar la casilla';
$string['by'] = 'por';
$string['checkallradiobuttons'] = '¡Por favor, compruebe todos los <strong>{$a}</strong> botones de radio!';
$string['checkboxes'] = 'Comprobar Casillas';
$string['clicktoswitch'] = '(Haga click para activar)';
$string['closed'] = 'La encuesta se cerró el {$a}. Gracias.';
$string['closedate'] = 'Fecha de cierre';
$string['closedate_help'] = 'Aquí puede especificar una fecha para cerrar la encuesta. Marque la casilla y seleccione la fecha y la hora que desee.
Los usuarios no podrán cumplimentar la encuesta después de esta fecha. Si no se selecciona esta opción, la encuesta no se cerrará nunca.';
$string['confalts'] = '- O - <br />Página de confirmación';
$string['confirmdelallresp'] = '¿Está seguro que quiere eliminar TODAS las respuestas de la encuesta?';
$string['confirmdelgroupresp'] = '¿Está seguro que quiere eliminar TODAS las respuestas de{$a}?';
$string['confirmdelresp'] = '¿Está seguro que desea eliminar la respuesta de {$a}?';
$string['confpage'] = 'Texto de título';
$string['confpagedesc'] = 'Título (en negrita) y cuerpo del texto para la página de "confirmación" mostrada después de que el usuario haya finalizado la encuesta. (La URL, si existe, tiene prioridad sobre el texto de confirmación.)';
$string['confpage_help'] = 'Título (en negrita) y cuerpo del texto para la página de "confirmación" mostrada después de que el usuario haya finalizado la encuesta. (La URL, si existe, tiene prioridad sobre el texto de confirmación.). Si deja este campo vacío, se mostrará un mensaje sobre la finalización de la encuesta (Gracias por realizar esta encuesta)';
$string['contentoptions'] = 'Tipo de Cuestionario';
$string['couldnotdelresp'] = 'No ha sido posible borrar las respuestas';
$string['createcontent'] = 'Definir nuevo contenido';
$string['createnew'] = 'Crear un nuevo cuestionario';
$string['date'] = 'Fecha';
$string['dateformatting'] = 'dateformatting';
$string['deleteallresponses'] = 'Borrar TODAS las respuestas';
$string['deletecurrentquestion'] = 'Borrar la pregunta {$a}';
$string['deletedallgroupresp'] = 'Todas las respuestas del grupo {$a} han sido borradas';
$string['deletedallresp'] = 'Respuestas eliminadas';
$string['deletedisabled'] = 'Esta pregunta no se puede eliminar';
$string['deletedresp'] = 'Respuestas borradas';
$string['deleteresp'] = 'Borrar esta respuesta';
$string['deletingresp'] = 'Supresión de respuestas';
$string['displaymethod'] = 'El método de visualización no se ha definido para este tipo de pregunta.';
$string['download'] = 'Descargar';
$string['downloadtextformat'] = 'Descargar en formato de texto';
$string['downloadtextformat_help'] = 'Esta opción permite guardar todas las respuestas de una encuesta en un archivo de texto (CSV). Este archivo se puede importar a una hoja de cálculo (por ejemplo, MS Excel o Open Office Calc) o un paquete estadístico para el procesamiento de los datos.';
$string['dropdown'] = 'Lista desplegable';
$string['edit'] = 'Editar';
$string['editingquestionnaire'] = 'Modificación de cuestionario - página General';
$string['editquestion'] = 'Edición de la pregunta {$a}';
$string['email'] = 'Correo';
$string['errnewname'] = 'Lo sentimos, ese nombre ya está en uso. Seleccione un nuevo nombre.';
$string['erroropening'] = 'Error al abrir el cuestionario.';
$string['errortable'] = 'Error de sistema (tabla corrupta).';
$string['essaybox'] = 'Texto amplio';
$string['essaybox_help'] = 'Esta pregunta se mostrará en un cuadro de texto sin formato con x columnas (ancho) e y filas (líneas de texto).

Si deja ambos valores x e y con valor 0 (su valor por defecto), el editor de texto HTML de Moodle se mostrará con los valores estándar de altura y longitud (si está disponible en contexto de usuario/curso y/o en el perfil del usuario)';
$string['field'] = 'Pregunta {$a}';
$string['fieldlength'] = 'Longitud de la caja de texto';
$string['grade'] = 'Nota para este cuestionario';
$string['headingtext'] = 'Texto del título';
$string['horizontal'] = 'Horizontal';
$string['id'] = 'ID';
$string['includechoicecodes'] = 'Incluir los números de las respuestas seleccionadas';
$string['includechoicetext'] = 'Incluir el texto de las respuestas seleccionadas';
$string['incorrectcourseid'] = 'El identificador (ID) del curso es incorrecto';
$string['incorrectmodule'] = 'El identificador del módulo del curso es incorrecto';
$string['incorrectquestionnaire'] = 'La encuesta es incorrecta';
$string['invalidresponse'] = 'Respuesta no válida.';
$string['invalidresponserecord'] = 'Registro de respuesta no válida.';
$string['invalidsurveyid'] = 'ID de la encuesta no válido';
$string['kindofratescale'] = 'Tipo de escala';
$string['length'] = 'Longitud';
$string['managequestions'] = 'Gestionar preguntas';
$string['managequestions_help'] = 'En la esta sección se puede llevar a cabo una serie de operaciones de edición, añadido y borrado de preguntas del cuestionario.';
$string['maxdigitsallowed'] = 'Número máximo de dígitos permitidos';
$string['maxforcedresponses'] = 'Número máximo de casillas que se pueden seleccionar';
$string['maxtextlength'] = 'Longitud máxima del texto';
$string['messageprovider:message'] = 'Recordatorio';
$string['minforcedresponses'] = 'Número mínimo de casillas que se han de seleccionar';
$string['minforcedresponses_help'] = 'Use estos parámetros para forzar a los encuestados a marcar un mínimo de **Min.** casillas de verificación y un máximo de **Max** casillas de verificación. Para forzar un número exacto de casillas de verificación marcar ajuste **Min.** y  **Max.** con el mismo valor.
Si sólo desea un valor mínimo o máximo deje el otro valor con el valor **0** predeterminado.
Si establece **Mín.** o **Max.** en un valor diferente al predeterminado **0**, se le mostrará un mensaje de advertencia si el encuestado no cumple con los requisitos. Obviamente es necesario plantear todos los requisitos de forma clara para el encuestado, ya se en las instrucciones generales de la encuesta o en el texto de las correspondientes preguntas.';
$string['misconfigured'] = 'El curso está mal configurado';
$string['missingquestion'] = 'Por favor, conteste a esta pregunta que es obligatoria';
$string['modulename'] = 'Encuesta';
$string['modulename_help'] = 'El módulo Encuesta le permite construir encuestas empleando diversos tipos de preguntas, con el propósito de recopilar información de sus usuarios.';
$string['modulenameplural'] = 'Encuestas';
$string['myresponses'] = 'Todas sus respuestas';
$string['myresponsetitle'] = 'Sus resultados para {$a} respuestas';
$string['myresults'] = 'Mis resultados';
$string['name'] = 'Nombre';
$string['next'] = 'Siguiente';
$string['nextpage'] = 'Página siguiente';
$string['noanswer'] = 'No respuesta';
$string['nodata'] = 'No se ha enviado ningún dato.';
$string['noduplicates'] = 'Elección única';
$string['non_respondents'] = 'Usuarios que aún no han respondido el cuestionario';
$string['nopublicsurveys'] = 'No hay encuestas públicas';
$string['noresponsedata'] = 'No hay respuestas para esta pregunta.';
$string['noresponses'] = 'Sin respuestas';
$string['normal'] = 'Normal';
$string['notanumber'] = '<strong>{$a}</strong> no es un formato de número válido.';
$string['notapplicable'] = 'NS/NC';
$string['notapplicablecolumn'] = 'Columna NS/NC';
$string['notavail'] = 'Esta encuesta no esta aún disponible. Inténtelo más tarde.';
$string['noteligible'] = 'Usted no ha sido seleccionado para responder a esta encuesta';
$string['notemplatesurveys'] = 'No hay plantillas de encuesta';
$string['notopen'] = 'Esta encuesta no se abrirá hasta {$a}';
$string['notrequired'] = 'Respuesta no obligatoria';
$string['num'] = 'nº';
$string['numberfloat'] = 'El número que introdujo,<strong>{$a->number}</strong> ha sido redondeado con <strong>{$a->precision}</strong> decimal(es).';
$string['numberofdecimaldigits'] = 'Número de decimales';
$string['numberscaleitems'] = 'Número de ítem en la escala';
$string['numeric'] = 'Numérico';
$string['of'] = 'de';
$string['opendate'] = 'Fecha de apertura';
$string['opendate_help'] = 'Aquí puede especificar una fecha para abrir la encuesta. Marque la casilla y seleccione la fecha y la hora que desee.
Los usuarios no podrán cumplimentar la encuesta antes de esta fecha. Si no se selecciona esta opción, la encuesta se abrirá inmediatamente.';
$string['option'] = 'opción {$a}';
$string['optionalname'] = 'Nombre de la pregunta';
$string['optionalname_help'] = 'El nombre de pregunta sólo se utiliza al exportar las respuestas al formato CSV/Excel.
Si nunca va a exportar a CSV, entonces no tiene que preocuparse acerca de los nombres de las preguntas.
Si va a exportar regularmente sus datos de las encuestas a CSV, entonces usted tiene dos opciones para nombrar la pregunta.';
$string['or'] = '- O -';
$string['order_ascending'] = 'Ordenación ascendente';
$string['order_default'] = 'Ordenación por defecto';
$string['order_descending'] = 'Ordenación descendente';
$string['orderresponses'] = 'Otras respuestas';
$string['orderresponses_help'] = 'Cuando se muestran todas las respuestas usted puede ordenarlas  por número de respuestas (la columna de Media) para los siguientes 4 tipos de preguntas.

 * botón de respuesta unica
 * lista desplegable con respuesta única
* múltiples opciones (casillas de verificación)
* preguntas tipo (incluyendo las escalas de Likert).

Cuando llegue a la página con todas las respuestas, por defecto todas las respuestas se ordenan en el orden en que el creador de la encuesta introdujo las opciones de selección.
Usted puede ordenar en orden ascendente o descendente.';
$string['other'] = 'Otro';
$string['otherempty'] = 'Si selecciona esta opción debe escribir algún contenido en la caja de texto.';
$string['overviewnumresplog'] = 'respuestas';
$string['overviewnumresplog1'] = 'respuesta';
$string['overviewnumrespvw'] = 'respuestas';
$string['overviewnumrespvw1'] = 'respuesta';
$string['owner'] = 'Propietario';
$string['page'] = 'Página';
$string['pageof'] = 'Página {$a->page} de {$a->totpages}';
$string['pluginadministration'] = 'Administración de encuestas';
$string['pluginname'] = 'Encuesta';
$string['position'] = 'posición';
$string['possibleanswers'] = 'Introduzca las respuestas posibles (si es necesario).';
$string['posteddata'] = '<br />Esta página ha sido lograda con los siguientes datos enviados:<br />';
$string['previewing'] = 'Previsualizando encuesta';
$string['preview_label'] = 'Previsualización';
$string['previous'] = 'Previa';
$string['previouspage'] = 'Página anterior';
$string['print'] = 'Imprimir';
$string['printblank'] = 'Imprimir un cuestionario en blanco';
$string['printblanktooltip'] = 'Abre una ventana de impresión con la encuesta en blanco';
$string['printtooltip'] = 'Abrir una ventana preparada para la impresión de un cuestionario en blanco';
$string['private'] = 'Privado';
$string['public'] = 'Público';
$string['qtype'] = 'Frecuencia de participación';
$string['qtypedaily'] = 'responder diariamente';
$string['qtype_help'] = 'Selecciones si los usuarios podrán responder una vez, diariamente, semanalmente, mensualmente o un número ilimitado de veces.';
$string['qtypemonthly'] = 'responder mensualmente';
$string['qtypeonce'] = 'responder una sola vez';
$string['qtypeunlimited'] = 'responder sin límite de intentos';
$string['qtypeweekly'] = 'responder semanalmente';
$string['questionnaire:addinstance'] = 'Añadir una nueva encuesta';
$string['questionnaireadministration'] = 'Administración de encuestas';
$string['questionnairecloses'] = 'Encuestas cerradas';
$string['questionnaire:copysurveys'] = 'Copiar plantillas y encuestas privadas';
$string['questionnaire:createpublic'] = 'Crear encuestas públicas';
$string['questionnaire:createtemplates'] = 'Crear plantillas de encuestas';
$string['questionnaire:deleteresponses'] = 'Borrar todas las respuestas';
$string['questionnaire:downloadresponses'] = 'Exportar las respuestas en formato de texto CSV';
$string['questionnaire:editquestions'] = 'Crear y editar preguntas de la encuesta';
$string['questionnaire:manage'] = 'Crear y editar encuestas';
$string['questionnaireopens'] = 'Encuestas abiertas';
$string['questionnaire:preview'] = 'Vista previa de los cuestionarios';
$string['questionnaire:printblank'] = 'Imprimir encuesta en blanco';
$string['questionnaire:readallresponseanytime'] = 'Ver todas las respuestas en cualquier momento';
$string['questionnaire:readallresponses'] = 'Ver los resúmenes de las respuestas en función de la fecha de apertura del cuestionario';
$string['questionnaire:readownresponses'] = 'Ver las respuestas propias';
$string['questionnairereport'] = 'Informe de la encuesta';
$string['questionnaire:submit'] = 'Cumplimentar y enviar una encuesta';
$string['questionnaire:view'] = 'Ver una encuesta';
$string['questionnaire:viewsingleresponse'] = 'Ver las respuestas individuales';
$string['questionnum'] = 'Pregunta #';
$string['questions'] = 'Preguntas';
$string['questiontypes'] = 'Tipos de preguntas';
$string['radiobuttons'] = 'Botones de radio';
$string['radiobuttons_help'] = 'En este tipo de pregunta el usuario debe seleccionar una de entre las opciones mostradas.';
$string['rank'] = 'Rango';
$string['ratescale'] = 'Escala Likert (1..5)';
$string['realm'] = 'Tipo de Encuesta';
$string['realm_help'] = '* ** Hay tres tipos de encuesta:**

* Privada  - pertenece solo al curso en el que se ha definido

* Plantilla * - puede ser copiada y editada.

* Pública  - se puede compartir entre cursos.';
$string['redirecturl'] = 'La URL a la que el usuario será redireccionado después de completar esta encuesta.';
$string['remove'] = 'Suprimir';
$string['removeallquestionnaireattempts'] = 'Eliminar todas las respuestas del cuestionario';
$string['required_help'] = 'Si selecciona ***Sí***, la respuesta a esta pregunta será obligatotia, es decir, el encuestado no podrá enviar la encuesta hasta haber contestado esta pregunta.';
$string['requiredparameter'] = 'Falta un parámetro obligatorio.';
$string['reset'] = 'Reinicializar';
$string['respeligiblerepl'] = '(reemplazado por la gestión de roles)';
$string['respondent'] = 'Encuestado';
$string['respondenteligibleall'] = 'Todo el mundo';
$string['respondenteligiblestudents'] = 'Sólamente los estudiantes';
$string['respondenteligibleteachers'] = 'Sólamente los profesores';
$string['respondents'] = 'Encuestados';
$string['respondenttype'] = 'Tipo de encuestado (Anónimo o Nominativo)';
$string['respondenttypeanonymous'] = 'anónimo';
$string['respondenttypefullname'] = 'nominativo';
$string['response'] = 'Respuesta';
$string['responseoptions'] = 'Opciones de respuesta';
$string['responses'] = 'Respuestas';
$string['responseview'] = 'Ver las respuestas';
$string['responseview_help'] = 'Puede especificar quién puede ver las respuestas de los encuestados en las encuestas enviados (tablas estadísticas generales).';
$string['responseviewstudentsalways'] = 'Siempre';
$string['responseviewstudentsnever'] = 'Nunca';
$string['responseviewstudentswhenanswered'] = 'Después de responder a la encuesta';
$string['responseviewstudentswhenclosed'] = 'Después de que la encuesta se cierre';
$string['restrictedtoteacher'] = 'Estas funciones están restringidas a los profesores';
$string['resume'] = 'Guardar / Continuar';
$string['resume_help'] = 'Esta opción permite a los usuarios guardar sus respuestas a una encuesta antes de enviarla. Los usuarios pueden dejar sin terminar la encuesta y reanudarla posteriormente desde el punto de guardador.';
$string['resumesurvey'] = 'Reanudar encuesta';
$string['return'] = 'Volver';
$string['save'] = 'Guardar';
$string['saveasnew'] = 'Guardar como nueva pregunta';
$string['saveeditedquestion'] = 'Guardar la pregunta {$a}';
$string['savesettings'] = 'Guardar la configuración';
$string['section'] = 'Descripción';
$string['sectionbreak'] = '----- Salto de página -----';
$string['sectionbreak_help'] = '----- Salto de página -----';
$string['sectiontext'] = 'Descripción';
$string['selecttheme'] = 'Seleccione un tema gráfico (css) para utilizar en esta encuesta';
$string['send'] = 'Enviar';
$string['sendemail'] = 'Envía una copia de cada cuestionario a esta dirección (o déjelo en blanco si no quiere recibir nada).';
$string['send_message'] = 'Enviar un mensaje a los usuarios seleccionados';
$string['settings'] = 'Configuración';
$string['settingssaved'] = 'Configuración guardada';
$string['show_nonrespondents'] = 'No respondieron';
$string['started'] = 'comenzado';
$string['strfdate'] = '%d/%m/%Y';
$string['strfdateformatcsv'] = 'd/m/Y H:i:s';
$string['subject'] = 'Asunto';
$string['submitoptions'] = 'Opciones de envío';
$string['submitsurvey'] = 'Enviar encuesta';
$string['submitted'] = 'Enviado el:';
$string['subtitle'] = 'Subtítulo';
$string['subtitle_help'] = 'Subtítulo de esta encuesta. Se muestra solo debajo del título de la primera página.';
$string['summary'] = 'Resumen';
$string['surveynotexists'] = 'la encuesta no existe';
$string['surveyowner'] = 'Debe ser propietario de la encuesta para realizar esta operación';
$string['surveyresponse'] = 'Respueta a la encuesta';
$string['template'] = 'Plantilla';
$string['templatenotviewable'] = 'No se pueden mostrar las plantillas de encuesta';
$string['text'] = 'Texto';
$string['textareacolumns'] = 'Número de columnas de texto';
$string['textarearows'] = 'Número de filas de texto';
$string['textbox'] = 'Cuadro de texto';
$string['textdownloadoptions'] = 'Opciones de la descarga de texto (CSV)';
$string['thank_head'] = 'Gracias por realizar esta encuesta';
$string['theme'] = 'Tema';
$string['thismonth'] = 'este mes';
$string['thisweek'] = 'esta semana';
$string['title'] = 'Título';
$string['title_help'] = 'Título de la encuesta que aparecerá en la parte superior de cada página. Por defecto Título será el nombre de la encuesta, pero podrá editarlo si lo desea.';
$string['today'] = 'hoy';
$string['total'] = 'Total';
$string['type'] = 'Tipo de pregunta';
$string['unknown'] = 'Desconocido';
$string['unknownaction'] = 'Se ha especificado una acción sobre la encuesta no válida...';
$string['url'] = 'URL';
$string['url_help'] = 'La URL a la que el usuario será redireccionado después de completar esta encuesta.';
$string['usepublic'] = 'Utilizar un cuestionario público';
$string['usetemplate'] = 'Copiar un cuestionario existente';
$string['vertical'] = 'Vertical';
$string['view'] = 'Vista';
$string['viewallresponses'] = 'Ver todas las respuestas';
$string['viewallresponses_help'] = 'Si la encuesta está en **Modo de grupo**: *Grupos Visibles* o *Grupos separados* y el usuario actual tiene la capacidad (en el contexto actual)  *moodle/site:accessallgroups* , y se han definido grupos en el curso actual, entonces el usuario tiene acceso a una lista desplegable de grupos.

Esta lista desplegable permite al usuario "filtrar"  las respuestas a la encuesta por grupos.

Si el ajuste es **Modo de grupo**: *Grupos separados *, los usuarios que no tienen la capacidad *moodle/site:accessallgroups capacidad* (por lo general, los  Estudiantes o los Profesores sin capacidad de edición, etc), sólo podrán ver las respuestas de los grupos a los que pertenecen.';
$string['viewbyresponse'] = 'Lista de respuestas';
$string['viewresponses'] = 'Todas las respuestas ({$a})';
$string['viewyourresponses'] = 'Sus respuestas: ver {$a}';
$string['warning'] = 'Atención: se ha encontrado un error.';
$string['wrongdateformat'] = 'El formato de fecha introducida: <strong>{$a}</strong> no se corresponde con el mostrado en el ejemplo.';
$string['wrongdaterange'] = '¡ERROR! El año debe estar en el rango comprendido entre 1902 y 2037.';
$string['yesno'] = 'Sí/No';
$string['yesno_help'] = 'Pregunta simple Sí/No';
$string['yourresponses'] = 'Sus respuestas';
