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
 * Strings for component 'grades', language 'es', branch 'MOODLE_24_STABLE'
 *
 * @package   grades
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activities'] = 'Actividades';
$string['addcategory'] = 'Añadir categoría';
$string['addcategoryerror'] = 'No se pudo añadir categoría.';
$string['addexceptionerror'] = 'Ocurrió un error al añadir una excepción a userid:gradeitem';
$string['addfeedback'] = 'Agregar retroalimentación';
$string['addgradeletter'] = 'Añadir letra de calificación';
$string['addidnumbers'] = 'Añadir números ID';
$string['additem'] = 'Añadir ítem de calificación';
$string['addoutcome'] = 'Agregar un resultado';
$string['addoutcomeitem'] = 'Agregar ítem de resultado';
$string['addscale'] = 'Agregar una escala';
$string['aggregateextracreditmean'] = 'Media de calificaciones (con créditos extra)';
$string['aggregatemax'] = 'Calificación más alta';
$string['aggregatemean'] = 'Media de calificaciones';
$string['aggregatemedian'] = 'Mediana de calificaciones';
$string['aggregatemin'] = 'Calificación más baja';
$string['aggregatemode'] = 'Moda de calificaciones';
$string['aggregateonlygraded'] = 'Agregar sólo calificaciones no vacías';
$string['aggregateonlygraded_help'] = '<p>Las calificaciones no existentes son tratadas como calificaciones mínimas o no son incluidas en la agregación.</p>';
$string['aggregateoutcomes'] = 'Incluir resultados en cálculo total';
$string['aggregateoutcomes_help'] = '<p>La inclusión de resultados en la agregación puede no conducir a la calificafión global deseada, de modo que usted tiene la opción de incluirlos o desecharlos.</p>';
$string['aggregatesonly'] = 'Sólo cálculos totales';
$string['aggregatesubcats'] = 'Agregar subcategorías incluyentes';
$string['aggregatesubcats_help'] = '<p>La agregación se realiza normalmente sólo con los \'hijos\' inmediatos; es asimismo posible agregar calificaciones en todas las subcategorías excluyendo otras calificaciones agregadas.</p>';
$string['aggregatesum'] = 'Suma de calificaciones';
$string['aggregateweightedmean'] = 'Media ponderada de calificaciones';
$string['aggregateweightedmean2'] = 'Media ponderada simple de calificaciones';
$string['aggregation'] = 'Cálculo total';
$string['aggregationcoef'] = 'Coeficiente';
$string['aggregationcoefextra'] = 'Puntos extra';
$string['aggregationcoefextra_help'] = '<h2>Para Agregación de Suma de Calificaciones</h2>

<p>Cuando la estrategia de agregación de "suma de las calificaciones" se utiliza, un ítem de calificación puede actuar como crédito Extra para la categoría. Esto significa que la calificación máxima del ítem no será agregada a la calificación máxima total de la categoría, pero la calificación del item si lo será. Lo que sigue es un ejemplo:
</p>
<ul>
    <li>Ítem 1 es calificado entre 0-100</li>
    <li>Ítem 2 es calificado entre 0-75</li>
    <li>El Ítem 1 tiene la casilla de verificación "Actuar como crédito extra" marcada, el Ítem 2 no la tiene.</li>
    <li>Ambos ítems pertenecen a la Categoría 1, que tiene "Suma de calificaciones" como su estrategia de agregación.</li>
    <li>La categoría 1 será calificada de forma total entre 0-75</li>
    <li>Un estudiante obtiene una calificación de 20 en el Ítem 1 y 70 en el Ítem 2</li>
    <li>La calificación total del estudiante para la Categoría 1 será de 75/75 (aunque 20+70 = 90 pero como el Ítem 1 sólo actúa como crédito extra, hace que el total total de la categoría llegue al máximo solamente)</li>
</ul>

<h2>Para Media de Calificaciones (con Créditos Extra)</h2>
<p>Un valor mayor a 0 tratará a este ítem de calificación como de crédito Extra durante la agregación. El número es un factor por el cual el valor de la calificación se multiplicará antes de que se agregue a la suma de todas las calificaciones, pero el ítem mismo no será contabilizado en la división. Por ejemplo:</p>

<ul>
    <li>Ítem 1 será calificado entre 0-100 y su valor de "Crédito Extra esta fijado a 2</li>
    <li>Ítem 2 será calificado entre 0-100 y su valor de "Crédito Extra es dejado en 0.0000</li>
    <li>Ítem 3 será calificado entre 0-100 y su valor de "Crédito Extra es dejado en 0.0000</li>
    <li>Todos los 3 ítems pertenecen a la Categoría 1, que tiene "Media de calificaciones (con créditos extra)" como su estrategia de agregación</li>
    <li>Un estudiante es calificado con 20 en el Ítem 1, 40 en el Ítem 2 y 70 en el Ítem 3</li>
    <li>La calificación total del estudiante para la Categoría 1 será de 95/100 debido a que 20*2 + (40 + 70)/2 = 95</li>
</ul>';
$string['aggregationcoefextrasum'] = 'Actuar como puntos extra';
$string['aggregationcoefextrasum_help'] = 'Si está marcada la casilla de verificación Crédito extra, la calificación máxima del elemento de calificación no se agrega a la calificación máxima de la categoría, con el resultado de que es posible alcanzar la calificación máxima en la categoría (o una calificación superior a la máxima si lo ha habilitado el administrador) sin tener la calificación máxima en todos los elementos de calificación.';
$string['aggregationcoefextraweight'] = 'Ponderación del crédito extra';
$string['aggregationcoefextraweight_help'] = '<p>Un valor mayor que 0 trata las calificaciones de este elemento de calificación como crédito extra durante la agregación. El número es un factor por el cual se multiplicará el valor de la calificación antes de agregarse a la suma de todas las calificaciones, pero el elemento en sí mismo no será contado en la división. Por ejemplo:</p>

<ul>
    <li>El elemento 1 es calificado de 0 a 100 y el valor de su "crédito extra" se fija en 2</li>
    <li>El elemento 2 es calificado de 0 a 100 y el valor de su "crédito extra" se deja en 0.0000</li>
    <li>El elemento 2 es calificado de 0 a 100 y el valor de su "crédito extra" se deja en 0.0000</li>
    <li>Los 3 elementos pertenecen a la Categoría 1, que tiene como estrategia de agregación "Media de las calificaciones (con créditos extra)"</li>
    <li>Un estudiante consigue una calificación de 20 en el elemento 1, 40 en el 2 y 70 en el 3</li>
    <li>El total del estudiante en la Categoría 1 será de 95/100 puesto que 20*2 + (40 + 70)/2 = 95</li>
</ul>';
$string['aggregationcoefweight'] = 'Peso del ítem';
$string['aggregationcoefweight_help'] = '<p>Ponderación aplicada a todas las calificaciones en este elemento de calificación durante la agregación con otros elementos de calificación.</p>';
$string['aggregation_help'] = 'El Cálculo total determina cómo las calificaciones que forman parte de  una categoría se combinan para consolidarse en una calificación global. Pueden ser de diferente tipo

 * Media - La suma de todos las calificaciones dividida por el número total de calificaciones
* Mediana de las calificaciones - El valor del elemento medio cuando las calificaciones se ordenan de menor a mayor
* Calificación más baja
* Calificación más alta
* Moda - La calificación que se produce con más frecuencia
* Suma  - La suma de todas las calificaciones, ignorando los valores de la escala establecida';
$string['aggregationposition'] = 'Posición del resultado del cálculo';
$string['aggregationposition_help'] = 'Este parámetro valor determina si las columnas de totales de las categorías y los cursos se muestran al principio o al final en los informes del libro de calificaciones.';
$string['aggregationsvisible'] = 'Tipos de estrategias de cálculo';
$string['aggregationsvisiblehelp'] = 'Seleccione todos los tipos de cálculo que deberían estar disponibles. Mantenga pulsada la tecla Control para seleccionar múltiples ítems.';
$string['allgrades'] = 'Todas las calificaciones por categoría';
$string['allstudents'] = 'Todos los estudiantes';
$string['allusers'] = 'Todos los usuarios';
$string['autosort'] = 'Ordenación automática';
$string['availableidnumbers'] = 'Números ID disponibles';
$string['average'] = 'Promedio';
$string['averagesdecimalpoints'] = 'Nº de decimales en el promedio de las columnas';
$string['averagesdecimalpoints_help'] = '<p>Especifica el número de decimales a mostrar en la media de cada columna. Si se selecciona Heredar, se usará el tipo de vista para cada columna.</p>';
$string['averagesdisplaytype'] = 'Modo de visualización en el promedio de las columnas';
$string['averagesdisplaytype_help'] = '<o>Especifica como se presenta la media para cada columna. Si se selecciona Heredar, se usará el tipo de vista para cada columna.</p>';
$string['backupwithoutgradebook'] = 'La copia de seguridad no contiene la configuración del Libro de Calificaciones';
$string['badgrade'] = 'La calificación suministrada no es válida';
$string['badlyformattedscale'] = 'Por favor, escriba una lista de valores separados por comas (se requieren al menos dos valores).';
$string['baduser'] = 'El usuario suministrado no es válido';
$string['bonuspoints'] = 'Puntos bonif.';
$string['bulkcheckboxes'] = 'Casillas de verificación masivas';
$string['calculatedgrade'] = 'Calificación calculada';
$string['calculation'] = 'Cálculo';
$string['calculationadd'] = 'Agregar cálculo';
$string['calculationedit'] = 'Editar cálculo';
$string['calculation_help'] = 'Un cálculo de calificaciones es una fórmula usada para determinar las calificaciones. La fórmula debería comenzar con el signo igual (=) y puede usar operadores matemáticos comunes tales como valor máximo, valor mínimo o suma. Si se desea, pueden incluirse otros ítems de calificación en el cálculo tecleando los números ID encerrados entre corchetes dobles.';
$string['calculationsaved'] = 'Cálculo guardado';
$string['calculationview'] = 'Ver cálculo';
$string['cannotaccessgroup'] = 'Lo sentimos, no se puede acceder a las calificaciones del grupo seleccionado.';
$string['categories'] = 'Categorías';
$string['categoriesanditems'] = 'Categorías e ítems';
$string['categoriesedit'] = 'Editar categorías e ítems';
$string['category'] = 'Categoría';
$string['categoryedit'] = 'Editar categoría';
$string['categoryname'] = 'Nombre de la categoría';
$string['categorytotal'] = 'Total categoría';
$string['categorytotalfull'] = 'Total {$a->category}';
$string['categorytotalname'] = 'Nombre de la categoría total';
$string['changedefaults'] = 'Cambiar valores por defecto';
$string['changereportdefaults'] = 'Cambiar valores por defecto del informe';
$string['chooseaction'] = 'Seleccione una acción...';
$string['choosecategory'] = 'Seleccionar categoría';
$string['combo'] = 'Tabuladores y menú desplegable';
$string['compact'] = 'Compactar';
$string['componentcontrolsvisibility'] = 'El hecho que este ítem de calificación esté oculto o no, es controlado por la configuración de la actividad.';
$string['contract'] = 'Contraer categoría';
$string['controls'] = 'Controles';
$string['courseavg'] = 'Promedio del curso';
$string['coursegradecategory'] = 'Categoría de calificación de curso';
$string['coursegradedisplaytype'] = 'Forma de mostrar calificación del curso';
$string['coursegradedisplayupdated'] = 'La forma de mostrar la calificación del curso ha sido actualizada.';
$string['coursegradesettings'] = 'Ajustes de la calificación del curso';
$string['coursename'] = 'Nombre del curso';
$string['coursescales'] = 'Escalas del curso';
$string['coursesettings'] = 'Ajustes del curso';
$string['coursesettingsexplanation'] = 'Los ajustes del curso determinan cómo aparece el libro de calificaciones a todos los participantes del curso.';
$string['coursetotal'] = 'Total del curso';
$string['createcategory'] = 'Crear categoría';
$string['createcategoryerror'] = 'No se ha podido crear una categoría nueva';
$string['creatinggradebooksettings'] = 'Creando ajustes del libro de calificaciones';
$string['csv'] = 'CSV';
$string['currentparentaggregation'] = 'Agregación padre actual.';
$string['curveto'] = 'Curvar a';
$string['decimalpoints'] = 'Puntos decimales globales';
$string['decimalpoints_help'] = '<p>Especifica el número de decimales a mostrar para cada calificación. Este ajuste no tiene efecto en los cálculos de las calificaciones, que se hacen con una precisión de 5 decimales. </p>';
$string['default'] = 'Por defecto';
$string['defaultprev'] = 'Valor por defecto ({$a})';
$string['deletecategory'] = 'Eliminar categoría';
$string['disablegradehistory'] = 'Deshabilitar historial de calificaciones';
$string['disablegradehistory_help'] = 'Deshabilitar el historial de rastreo de cambios en la tablas de calificaciones relacionadas. Esto puede agilizar algo el funcionamiento del servidor y conservar espacio en la base de datos.';
$string['displaylettergrade'] = 'Mostrar calificaciones con letra';
$string['displaypercent'] = 'Mostrar porcentajes';
$string['displaypoints'] = 'Mostrar puntos';
$string['displayweighted'] = 'Mostrar calificaciones ponderadas';
$string['dropdown'] = 'Menú desplegable';
$string['droplow'] = 'Descartar las más bajas';
$string['droplowestvalue'] = 'Configurar descartar el menor valor de calificación';
$string['droplow_help'] = '<p>Si se activa, esta opción descartará las X calificaciones más bajas, donde X es el valor seleccionado por esta opción. </p>';
$string['dropped'] = 'Descartadas';
$string['dropxlowest'] = 'Descartar X más bajas';
$string['dropxlowestwarning'] = 'Nota: Si usa \'descartar x más bajas\', la calificación asume que todos los ítems de la categoría tienen el mismo valor en puntos. Si dichos valores difieren, los resultados serán impredecibles';
$string['duplicatescale'] = 'Duplicar escala';
$string['edit'] = 'Editar';
$string['editcalculation'] = 'Editar cálculo';
$string['editcalculationverbose'] = 'Editar cáculo para {$a->category} {$a->itemmodule} {$a->itemname}';
$string['editfeedback'] = 'Editar retroalimentación';
$string['editgrade'] = 'Editar calificación';
$string['editgradeletters'] = 'Editar letras de calificación';
$string['editoutcome'] = 'Editar resultado';
$string['editoutcomes'] = 'Editar resultados';
$string['editscale'] = 'Editar escala';
$string['edittree'] = 'Categorías e ítems';
$string['editverbose'] = 'Editar {$a->category} {$a->itemmodule} {$a->itemname}';
$string['enableajax'] = 'Habilitar AJAX';
$string['enableajax_help'] = 'Agrega una capa de funcionalidad AJAX al informe del calificador, simplificando y agilizando las operaciones comunes. Depende de que Javascript esté activado en el navegador del usuario.';
$string['enableoutcomes'] = 'Habilitar resultados';
$string['enableoutcomes_help'] = 'Apoyo para los Resultados (también conocidos como \'competencias\', \'objetivos\', \'estándars\' o \'criterios\'). Significa que calificamos usando una o más escalas que están conectadas a las declaraciones de resultados. La activación de los resultados posibilita esta forma especial de calificación en todo el sitio.';
$string['encoding'] = 'Codificación';
$string['errorcalculationbroken'] = 'Probablemente una referencia circular o una fórmula de cálculo errónea';
$string['errorcalculationnoequal'] = 'La fórmula debe comenzar por el signo \'igual\' (=1+2)';
$string['errorcalculationunknown'] = 'Fórmula no válida';
$string['errorgradevaluenonnumeric'] = 'Recibido valor no numérico para calificación baja o alta para';
$string['errornocalculationallowed'] = 'No se permiten cálculos para este ítem';
$string['errornocategorisedid'] = 'No se ha podido conseguir una ID no categorizada.';
$string['errornocourse'] = 'No se pudo obtener información del curso';
$string['errorreprintheadersnonnumeric'] = 'Recibido valor no numérico para cabeceras de reimpresión';
$string['errorsavegrade'] = 'Lo sentimos, no se pudo guardar la calificación.';
$string['errorupdatinggradecategoryaggregateonlygraded'] = 'Error al actualizar el ajuste "Agregar sólo ítems calificados" de la categoría de calificación ID {$a->id}';
$string['errorupdatinggradecategoryaggregateoutcomes'] = 'Error al actualizar el ajuste "Agregar resultados" de la categoría de calificación ID {$a->id}';
$string['errorupdatinggradecategoryaggregatesubcats'] = 'Error al actualizar el ajuste "Agregar subcategorías" de la categoría de calificación ID {$a->id}';
$string['errorupdatinggradecategoryaggregation'] = 'Error al actualizar el tipo de agregación de la categoría de calificación ID {$a->id}';
$string['errorupdatinggradeitemaggregationcoef'] = 'Error al actualizar el coeficiente de agregación (ponderación o crédito extra) de la categoría de calificación ID {$a->id}';
$string['excluded'] = 'Excluídos';
$string['excluded_help'] = '<p>Si la opción de exclusión está habilitada, esta calificación será excluída de cualquier agregación ejecutada por cualquier elemento o categoría de orden superior.</p>';
$string['expand'] = 'Expandir categoría';
$string['export'] = 'Exportar';
$string['exportalloutcomes'] = 'Exportar todos los resultados';
$string['exportfeedback'] = 'Incluir retroalimentación en la exportación';
$string['exportonlyactive'] = 'Requiere una matrícula activa';
$string['exportonlyactive_help'] = 'Solo incluye en la exportación, aquellos estudiantes cuya matrícula no haya sido suspendida';
$string['exportplugins'] = 'Conectores de exportación';
$string['exportsettings'] = 'Exportar ajustes';
$string['exportto'] = 'Exportar a';
$string['extracreditvalue'] = 'Valor de crédito extra para {$a}';
$string['extracreditwarning'] = 'Nota: Si se adscribe un crédito extra a todos los ítems de una categoría, se eliminarán del cálculo de la calificación, por lo que no existirá una puntuación total';
$string['feedback'] = 'Retroalimentación';
$string['feedbackadd'] = 'Agregar retroalimentación';
$string['feedbackedit'] = 'Editar retroalimentación';
$string['feedback_help'] = '<p>Comentarios añadidos por el profesor a la calificación. Pueden ser extensos, personalizados o un simple código que se refiere a un sistema de retroalimentación interno.</p>';
$string['feedbacksaved'] = 'Retroalimentación guardada';
$string['feedbackview'] = 'Ver retroalimentación';
$string['finalgrade'] = 'Calificación final';
$string['finalgrade_help'] = '<p>La calificación final después de que todos los cálculos han sido realizados.<p>';
$string['fixedstudents'] = 'Columna de estudiantes fijada';
$string['fixedstudents_help'] = 'Fija la columna de estudiantes en el informe del calificador, permitiendo que las calificaciones se desplacen horizontalmente.';
$string['forceoff'] = 'Forzar: Desconectar';
$string['forceon'] = 'Forzar: Conectar';
$string['forelementtypes'] = 'para el {$a} seleccionado';
$string['forstudents'] = 'Para los estudiantes';
$string['full'] = 'Completo';
$string['fullmode'] = 'Vista completa';
$string['fullview'] = 'Vista completa';
$string['generalsettings'] = 'Ajustes generales';
$string['grade'] = 'Calificación';
$string['gradeadministration'] = 'Administración de calificaciones';
$string['gradeanalysis'] = 'Análsisis de calificaciones';
$string['gradebook'] = 'Libro de calificaciones';
$string['gradebookhiddenerror'] = 'El libro de calificaciones está ajustado de modo que no se mostrará nada a los estudiantes.';
$string['gradebookhistories'] = 'Historias de calificación';
$string['gradeboundary'] = 'Límite de la calificación con letra';
$string['gradeboundary_help'] = '<p>Un límite porcentual con el que a las calificaciones se les asignará una calificación con letra (si el tipo de visualización de calificación con Letra es utilizado). </p>';
$string['gradecategories'] = 'Categorías de calificación';
$string['gradecategory'] = 'Categoría de calificación';
$string['gradecategoryonmodform'] = 'Categoría de calificación';
$string['gradecategoryonmodform_help'] = 'Este parámetro controla la categoría en la que las calificaciones de esta actividad están ubicadas en el libro de calificaciones';
$string['gradecategorysettings'] = 'Ajustes de categoría de calificación';
$string['gradedisplay'] = 'Mostrar calificación';
$string['gradedisplaytype'] = 'Modo de mostrar calificación';
$string['gradedisplaytype_help'] = 'Especifica cómo se verán las calificaciones en el calificador y reportes de usuario. Estas calificaciones pueden mostrarse como:

* Calificaciones reales
* Como porcentajes (en referencia a las calificaciones mínima y máxima)
* Como letras';
$string['gradedon'] = 'Calificados {$a}';
$string['gradeexport'] = 'Exportar calificaciones';
$string['gradeexportcustomprofilefields'] = 'Campos de perfil personalizados en exportación de calificaciones';
$string['gradeexportcustomprofilefields_desc'] = 'Incluir estos campos personalizados de perfil en la exportación de calificaciones, separados por comas.';
$string['gradeexportdecimalpoints'] = 'Puntos decimales en la exportación de calificaciones';
$string['gradeexportdecimalpoints_desc'] = 'Número de decimales a mostrar en el archivo exportado. Puede pasarse por alto durante la exportación.';
$string['gradeexportdisplaytype'] = 'Forma de mostrar exportación de calificaciones';
$string['gradeexportdisplaytype_desc'] = 'Las calificaciones pueden mostrarse como calificaciones reales, como porcentajes (en relación a las calificaciones mínima y máxima) o como letras (A, B, C, &c.) durante la exportación. Puede pasarse por alto durante la exportación.';
$string['gradeexportuserprofilefields'] = 'Campos de perfil de usuario en exportación de calificaciones';
$string['gradeexportuserprofilefields_desc'] = 'Incluir estos campos de perfil de usuario en la exportación de calificaciones, separados por comas.';
$string['gradeforstudent'] = '{$a->student}<br />{$a->item}$a->feedback';
$string['gradehelp'] = 'Ayuda sobre las calificaciones';
$string['gradehistorylifetime'] = 'Duración del historial de calificaciones';
$string['gradehistorylifetime_help'] = 'Esta opción especifica durante cuánto tiempo desea mantener el historial de cambios en las tablas de calificaciones relacionadas. Se recomienda mantenerlo todo el tiempo posible. Si experimenta problemas de funcionamiento o tiene un espacio limitado en la base de datos, pruebe con un valor más bajo.';
$string['gradeimport'] = 'Importar calificaciones';
$string['gradeitem'] = 'Ítem de calificación';
$string['gradeitemaddusers'] = 'Excluir de calificación';
$string['gradeitemadvanced'] = 'Opciones avanzadas de ítems de calificación';
$string['gradeitemadvanced_help'] = 'Seleccionar todos los ítems que se mostrarán al editar los ítems de calificación.';
$string['gradeitemislocked'] = 'Esta actividad está bloqueada en el libro de calificaciones. Los cambios realizados a las calificaciones en esta actividad no se copiarán al libro de calificaciones hasta que no se desbloquée.';
$string['gradeitemlocked'] = 'Calificación bloqueada';
$string['gradeitemmembersselected'] = 'Excluídos de calificación';
$string['gradeitemnonmembers'] = 'Incluídos en calificación';
$string['gradeitemremovemembers'] = 'Incluir en calificación';
$string['gradeitems'] = 'Ítems de calificación';
$string['gradeitemsettings'] = 'Ajustes de ítems de calificación';
$string['gradeitemsinc'] = 'Ítems de calificación a incluir';
$string['gradeletter'] = 'Letra de calificación';
$string['gradeletter_help'] = '<p>Una letra u otro símbolo utilizado para representar un rango de calificaciones.</p>';
$string['gradeletternote'] = 'Para eliminar una letra de calificación, simplemente vacíe cualquiera de las<br />tres áreas de texto de dicha letra y haga clic en guardar cambios.';
$string['gradeletters'] = 'Letras de calificación';
$string['gradelocked'] = 'La calificación está bloqueada';
$string['gradelong'] = '{$a->grade} / {$a->max}';
$string['grademax'] = 'Calif. máxima';
$string['grademax_help'] = 'Este parámetro determina la calificación máxima cuando se usa \'Valor\' como \'Tipo de calificación\'. El valor máximo para cada actividad calificable se establece en la página de configuración de la actividad.';
$string['grademin'] = 'Calif. mínima';
$string['grademin_help'] = 'Este parámetro determina la calificación mínima cuando se usa \'Valor\' como \'Tipo de calificación\'. ';
$string['gradeoutcomeitem'] = 'Ítem de resultado de calificación';
$string['gradeoutcomes'] = 'Resultados';
$string['gradeoutcomescourses'] = 'Resultados del curso';
$string['gradepass'] = 'Calificación para aprobar';
$string['gradepass_help'] = '<p>Si un ítem tiene una calificación que los usuarios deben igualar o superar para aprobar
   un ítem, puede fijarla en este campo.</p>';
$string['gradepreferences'] = 'Preferencias de Calificación';
$string['gradepreferenceshelp'] = 'Ayuda sobre preferencias de calificación';
$string['gradepublishing'] = 'Habilitar publicación';
$string['gradepublishing_help'] = 'Habilitar la publicación en exportaciones e importaciones: Puede accederse a las calificaciones exportadas accediendo a una URL, sin tener que almacenarlas en un sitio Moodle. Las calificaciones pueden importarse accediendo a dicha URL (lo que significa que un sitio Moodle puede importar calificaciones publicadas por otro sitio).';
$string['gradereport'] = 'Informe de calificaciones';
$string['graderreport'] = 'Informe del calificador';
$string['grades'] = 'Calificaciones';
$string['gradesforuser'] = 'Calificaciones de {$a->user}';
$string['gradesonly'] = 'Sólo calificaciones';
$string['gradessettings'] = 'Ajustes';
$string['gradetype'] = 'Tipo de calificación';
$string['gradetype_help'] = '<p>Especifica el tipo de calificación usado: <b>Ninguno</b> (no se permite calificar),
   <b>Valor</b> (habilita los ajustes de calificación máximo y mínimo), <b>Escala</b>
   (habilita los ajustes de escala) o <b>Texto</b> (comentarios solamente). Solamente
   los tipos de calificación de <em>valor</em> y <em>escala</em> pueden ser agregados.
   El tipo de calificación para un ítem de calificación basado en una actividad es
   establecido en la página de actualización de la actividad.</p>';
$string['gradeview'] = 'Ver calificación';
$string['gradeweighthelp'] = 'Ayuda sobre ponderación de calificaciones';
$string['groupavg'] = 'Promedio del grupo';
$string['hidden'] = 'Ocultar';
$string['hiddenasdate'] = 'Mostrar fecha de envío para calificaciones ocultas';
$string['hiddenasdate_help'] = 'Si el usuario no puede ver las calificaciones ocultas, muestre la fecha de envío en lugar de \'-\'.';
$string['hidden_help'] = 'Si se marca esta opción, las calificaciones se ocultarán a los estudiantes. Se pueden ocultar si se desea hasta en día en que se hagan públicas las calificaciones una vez completado el proceso.';
$string['hiddenuntil'] = 'Ocultar hasta';
$string['hiddenuntildate'] = 'Ocultas hasta: {$a}';
$string['hideadvanced'] = 'Ocultar características avanzadas';
$string['hideaverages'] = 'Ocultar promedios';
$string['hidecalculations'] = 'Ocultar cálculos';
$string['hidecategory'] = 'Ocultos';
$string['hideeyecons'] = 'Ocultar iconos \'mostrar/ocultar\'';
$string['hidefeedback'] = 'Ocultar retroalimentación';
$string['hideforcedsettings'] = 'Ocultar ajustes forzados';
$string['hideforcedsettings_help'] = 'No mostrar ajustes forzados al calificar UI.';
$string['hidegroups'] = 'Ocultar grupos';
$string['hidelocks'] = 'Ocultar bloqueos';
$string['hidenooutcomes'] = 'Mostrar resultados';
$string['hidequickfeedback'] = 'Ocultar Retroalimentación Rápida';
$string['hideranges'] = 'Ocultar rangos';
$string['hidetotalifhiddenitems'] = '¿Ocultar totales si contienen ítems ocultos?';
$string['hidetotalifhiddenitems_help'] = 'Este ajuste especifica si los totales que contienen ítems de calificación oculta se muestran a los estudiantes, o bien si se reemplazan con un guión (-). Si se muestran, el total puede calcularse excluyendo o incluyendo dichos ítems.

Si se excluyen los ítems ocultos, el total será diferente al que el profesor ve en el informe del calificador, puesto que el profesor siempre ve los totales calculados con todos los ítems, ocultos o visibles. Si se incluyen los ítems ocultos, los estudiatnes podrán calcular estos ítems.';
$string['hidetotalshowexhiddenitems'] = 'Mostrar totales excluyendo ítems ocultos';
$string['hidetotalshowinchiddenitems'] = 'Mostrar totales incluyendo ítems ocultos';
$string['hideverbose'] = 'Ocultar {$a->category} {$a->itemmodule} {$a->itemname}';
$string['highgradeascending'] = 'Ordenar por calificación ascendente';
$string['highgradedescending'] = 'Ordenar por calificación descendente';
$string['highgradeletter'] = 'Altas';
$string['identifier'] = 'Identificar al usuario por';
$string['idnumbers'] = 'Números ID';
$string['import'] = 'Importar';
$string['importcsv'] = 'Importar CSV';
$string['importcustom'] = 'Importar como resultados personalizados (sólo este curso)';
$string['importerror'] = 'Ha ocurrido un error: este script no se ha invocado con los parámetros correctos.';
$string['importfailed'] = 'Importación fallida';
$string['importfeedback'] = 'Importar retroalimentación';
$string['importfile'] = 'Importar archivo';
$string['importfilemissing'] = 'No se ha recibido ningún archivo. Regrese al formulario y asegúrese de que sube un archivo válido.';
$string['importfrom'] = 'Importar de';
$string['importoutcomenofile'] = 'El archivo subido está vacío o corrupto. Por favor, verifique que es un archivo válido. El problema se detectó en la línea {$a}; esto sucede cuando las líneas de datos no tienen tantas columnas como la primera línea (cabecera) o cuando el archivo importado carece de las cabeceras esperadas. Examine el archivo exportado para ver un ejemplo de archivo con cabecera válida.';
$string['importoutcomes'] = 'Importar resultados';
$string['importoutcomes_help'] = 'Los resultados pueden importarse en un archivo csv, al igual que exportarse (archivo csv).';
$string['importoutcomesuccess'] = 'Resultado importado "{$a->name}" con ID #{$a->id}';
$string['importplugins'] = 'Conectores de importación';
$string['importpreview'] = 'Vista previa de la importación';
$string['importsettings'] = 'Importar ajustes';
$string['importskippednomanagescale'] = 'No tiene permiso para agregar una nueva escala. El resultado "{$a}" se ha pasado por alto puesto que requiere crear una nueva escala';
$string['importskippedoutcome'] = 'Ya existe un resultado con el nombre corto "{$a}" en este contexto; el archivo importado ha sido pasado por alto.';
$string['importstandard'] = 'Importar como resultados estándar';
$string['importsuccess'] = 'Importación de calificaciones exitosa';
$string['importxml'] = 'Importar XML';
$string['includescalesinaggregation'] = 'Incluir escalas en la agregación';
$string['includescalesinaggregation_help'] = 'Puede incluir las escalas como números en todas las calificaciones agregadas de todos los libros de calificaciones en cada curso. PRECAUCIÓN: si modifica este ajuste todas las calificaciones serán recalculadas.';
$string['incorrectcourseid'] = 'La ID del curso es incorrecta';
$string['incorrectcustomscale'] = '(Escala personalizada incorrecta: cámbiela, por favor)';
$string['incorrectminmax'] = 'El mínimo debe ser menor que el máximo';
$string['inherit'] = 'Heredar';
$string['intersectioninfo'] = 'Info Estudiante/Calificación';
$string['item'] = 'Ítem';
$string['iteminfo'] = 'Info ítem';
$string['iteminfo_help'] = '<p>Espacio para introducir información sobre el ítem. El texto introducido no aparece en ningún otro lugar.</p>';
$string['itemname'] = 'Nombre del ítem';
$string['itemnamehelp'] = 'Nombre de este ítem, suministrado por el módulo.';
$string['items'] = 'Ítems';
$string['itemsedit'] = 'Editar ítem de calificación';
$string['keephigh'] = 'Mantener las más altas';
$string['keephigh_help'] = 'Si se activa la opción, solo se  conservarán las X calificaciones más altas, siendo X el valor seleccionado en esta copació.';
$string['keymanager'] = 'Gestor de claves';
$string['lessthanmin'] = 'La calificación otorgada en {$a->itemname} a {$a->username} es menor que el mínimo permitido';
$string['letter'] = 'Letra';
$string['lettergrade'] = 'Calificación por letra';
$string['lettergradenonnumber'] = 'Calificaciones bajas y/o altas no numéricas para';
$string['letterpercentage'] = 'Letra (porcentaje)';
$string['letterreal'] = 'Letra (real)';
$string['letters'] = 'Letras';
$string['linkedactivity'] = 'Actividad vinculada';
$string['linkedactivity_help'] = '<p>Especifica una actividad opcional en la que este ítem de resultado esta vinculada.
   Esto se utiliza para medir el rendimiento del estudiante en criterios no medidos por
   la calificación de la actividad.</p>';
$string['linktoactivity'] = 'Enlazar a la actividad {$a->name}';
$string['lock'] = 'Bloquear';
$string['locked'] = 'Bloquear';
$string['locked_help'] = 'Si se señala esta opción, las calificaciones ya no podrán ser actualizadas automáticamente por la actividad relacionada.';
$string['locktime'] = 'Bloquear desde';
$string['locktimedate'] = 'Bloqueada desde: {$a}';
$string['lockverbose'] = 'Bloquear {$a->category} {$a->itemmodule} {$a->itemname}';
$string['lowest'] = 'Más baja';
$string['lowgradeletter'] = 'Baja';
$string['manualitem'] = 'Ítem manual';
$string['mapfrom'] = 'Mapa desde';
$string['mappings'] = 'Mapeos de ítems de calificación';
$string['mapto'] = 'Mapa a';
$string['max'] = 'Más alta';
$string['maxgrade'] = 'Calif. máx.';
$string['meanall'] = 'Todas las calificaciones';
$string['meangraded'] = 'Calificaciones no vacías';
$string['meanselection'] = 'Calificaciones seleccionadas para promedios de columna';
$string['meanselection_help'] = 'Seleccione qué tipo de calificaciones se incluirán en los promedios de columna. Las celdas sin calificación se pasarán por alto, o serán calificadas con 0 (ajuste por defecto).';
$string['median'] = 'Mediana';
$string['min'] = 'Más baja';
$string['missingscale'] = 'La escala debe estar seleccionada';
$string['mode'] = 'Moda';
$string['morethanmax'] = 'La calificación otorgada en {$a->itemname} a {$a->username} es mayor que el máximo permitido';
$string['moveselectedto'] = 'Mover los ítems seleccionados a';
$string['movingelement'] = 'Moviendo {$a}';
$string['multfactor'] = 'Multiplicador';
$string['multfactor_help'] = '<p>Es el factor por el que se multiplicarán todas las calificaciones de este elemento de calificación, con un valor máximo para la calificación del establecido como máximo. Por ejemplo, si el multiplicador es 2 y la calificación máxima es de 100,  todos los grados menores de 50 se multiplican por dos, y todos los grados 50 y superiores se establecerán en 100.</p>';
$string['multfactorvalue'] = 'Valor multiplicador para {$a}';
$string['mypreferences'] = 'Mis preferencias';
$string['myreportpreferences'] = 'Mis preferencias de informe';
$string['navmethod'] = 'Método de navegación';
$string['neverdeletehistory'] = 'Nunca eliminar historial';
$string['newcategory'] = 'Categoría nueva';
$string['newitem'] = 'Nuevo ítem de calificación';
$string['newoutcomeitem'] = 'Nuevo ítem de resultado';
$string['no'] = 'No';
$string['nocategories'] = 'No se han añadido o no se han encontrado las categorías de calificación para este curso';
$string['nocategoryname'] = 'No se ha dado nombre de categoría';
$string['nocategoryview'] = 'No categoría para ver por';
$string['nocourses'] = 'Aún no hay cursos';
$string['noforce'] = 'No forzar';
$string['nogradeletters'] = 'No se han ajustado las letras de calificación';
$string['nogradesreturned'] = 'No se han devuelto calificaciones';
$string['noidnumber'] = 'No número ID';
$string['nolettergrade'] = 'No calificación por letra para';
$string['nomode'] = 'NA';
$string['nonnumericweight'] = 'Recibido valor no numérico para';
$string['nonunlockableverbose'] = 'Esta calificación no puede desbloquearse hasta que {$a->itemname} sea desbloqueado.';
$string['nonweightedpct'] = '% no ponderado';
$string['nooutcome'] = 'No resultado';
$string['nooutcomes'] = 'Los ítems de resultados deben estar vinculados a un resultado de curso, pero no existen resultados para este curso. ¿Desea agregar uno?';
$string['nopublish'] = 'No publicar';
$string['norolesdefined'] = 'No hay roles definidos en Administración > Calificaciones > Ajustes generales > Roles calificados';
$string['noscales'] = 'Los resultados deben estar vinculados a una escala (de curso o global), pero no existe ninguna. ¿Desea agregar una?';
$string['noselectedcategories'] = 'no se han seleccionado categorías';
$string['noselecteditems'] = 'no se han seleccionado ítems.';
$string['notteachererror'] = 'Sólo los profesores pueden usar esta opción.';
$string['nousersloaded'] = 'No se han subido usuarios';
$string['numberofgrades'] = 'Número de calificaciones';
$string['onascaleof'] = 'en una escala de {$a->grademin} a {$a->grademax}';
$string['operations'] = 'Operaciones';
$string['options'] = 'Opciones';
$string['others'] = 'Otros';
$string['outcome'] = 'Resultado';
$string['outcomeassigntocourse'] = 'Asignar otro resultado a este curso';
$string['outcomecategory'] = 'Crear resultados en categoría';
$string['outcomecategorynew'] = 'Nueva categoría';
$string['outcomeconfirmdelete'] = '¿Está seguro de que desea eliminar el resultado "{$a}"?';
$string['outcomecreate'] = 'Agregar nuevo resultado';
$string['outcomedelete'] = 'Eliminar Resultado';
$string['outcomefullname'] = 'Nombre completo';
$string['outcome_help'] = 'Resultado que representa este ítem de calificación.';
$string['outcomeitem'] = 'Ítem de resultado';
$string['outcomeitemsedit'] = 'Editar ítem de resultado';
$string['outcomereport'] = 'Informe del resultado';
$string['outcomes'] = 'Resultados';
$string['outcomescourse'] = 'Resultados usados en el curso';
$string['outcomescoursecustom'] = 'Uso personal (no quitar)';
$string['outcomescoursenotused'] = 'Estándar no usado';
$string['outcomescourseused'] = 'Usado estándar (no quitar)';
$string['outcomescustom'] = 'Resultados personalizados';
$string['outcomeshortname'] = 'Nombre corto';
$string['outcomesstandard'] = 'Resultados estándar';
$string['outcomesstandardavailable'] = 'Resultados estándar disponibles';
$string['outcomestandard'] = 'Resultado disponible';
$string['outcomestandard_help'] = '<p>Un resultado estándar esta disponible globalmente en el sitio, para todos los cursos.</p>';
$string['overallaverage'] = 'Promedio general';
$string['overridden'] = 'Anuladas';
$string['overridden_help'] = '<p>Cuando este activa, la bandera de anuladas previene intentos futuros de ajustar
   automáticamente el valor de la calificación. Esta bandera es generalmente fijada
   de forma interna por el libro de calificaciones, pero puede ser conmutada manualmente
   a encendida o apagada usando este elemento en el formulario.</p>';
$string['overriddennotice'] = 'La calificación final de esta actividad ha sido ajustada manualmente.';
$string['overridesitedefaultgradedisplaytype'] = 'Pasar por alto los valores por defecto del sitio';
$string['overridesitedefaultgradedisplaytype_help'] = '<p>Marque esta casilla de verificación para habilitar la anulación de los valores
   por defecto del sitio al visualizar las calificaciones en el libro de calificaciones.
   Esto activa elementos en la forma que le permiten a usted definir las calificaciones
   en letra y los límites de su elección.</p>';
$string['parentcategory'] = 'Categoría padre';
$string['pctoftotalgrade'] = '% de la calificación total';
$string['percent'] = 'Porcentaje';
$string['percentage'] = 'Porcentaje';
$string['percentageletter'] = 'Porcentaje (letra)';
$string['percentagereal'] = 'Porcentaje (real)';
$string['percentascending'] = 'Clasificar por porcentaje ascendente';
$string['percentdescending'] = 'Ordenar por porcentaje descendente';
$string['percentshort'] = '%';
$string['plusfactor'] = 'Compensar';
$string['plusfactor_help'] = '<p>Es el valor que se sumará a cada calificación de este elemento de calificación, después de haber aplicado el multiplicador.</p>';
$string['plusfactorvalue'] = 'Valor de compensación para {$a}';
$string['points'] = 'puntos';
$string['pointsascending'] = 'Clasificar por puntos ascendente';
$string['pointsdescending'] = 'Clasificar por puntos descendente';
$string['positionfirst'] = 'Primero';
$string['positionlast'] = 'Último';
$string['preferences'] = 'Preferencias';
$string['prefgeneral'] = 'General';
$string['prefletters'] = 'Letras de calificación y límites';
$string['prefrows'] = 'Filas especiales';
$string['prefshow'] = 'Mostrar/ocultar conmutadores';
$string['previewrows'] = 'Previsualizar filas';
$string['profilereport'] = 'Informe de perfil de usuario';
$string['profilereport_help'] = 'Informe de calificaciones usado en la página del perfil del usuario.';
$string['publishing'] = 'Publicando';
$string['quickfeedback'] = 'Retroalimentación rápida';
$string['quickgrading'] = 'Calificación rápida';
$string['quickgrading_help'] = '<p>La calificación rápida agrega un elemento de entrada de texto en cada celda
   de calificación en el informe del calificador, permitiéndole editar varias
   calificaciones al mismo tiempo. Usted puede luego hacer clic en el botón de
   <b>Actualizar</b> para realizar todos estos cambios de una vez, en lugar de
    uno a la vez.</p>';
$string['range'] = 'Rango';
$string['rangedecimals'] = 'Rango de puntos decimales';
$string['rangedecimals_help'] = 'El número de puntos decimales a mostrar para rango';
$string['rangesdecimalpoints'] = 'Decimales en los rangos';
$string['rangesdecimalpoints_help'] = '<p>Especifica el número de puntos decimales que se visualizaran para cada
   rango. Esta opción puede ser anulada por cada ítem de calificación de
   manera individual.</p>';
$string['rangesdisplaytype'] = 'Tipo de visualización del rango';
$string['rangesdisplaytype_help'] = '<p>Especifica como visualizar los rangos. Sí Heredar es seleccionada,
   el tipo de visualización para cada columna es usado.</p>';
$string['rank'] = 'Rango';
$string['rawpct'] = '% bruto';
$string['real'] = 'Real';
$string['realletter'] = 'Real (letra)';
$string['realpercentage'] = 'Real (porcentaje)';
$string['recovergradesdefault'] = 'Recuperar las calificaciones por defecto';
$string['recovergradesdefault_help'] = 'Por defecto recuperar las calificaciones antiguas cuando se matricula de nuevo a un usuario en un curso.';
$string['regradeanyway'] = 'Recalificar de todos modos';
$string['removeallcoursegrades'] = 'Eliminar todas las calificaciones';
$string['removeallcourseitems'] = 'Eliminar todos los ítems y categorías';
$string['report'] = 'Informe';
$string['reportdefault'] = 'Valor por defecto del informe ({$a})';
$string['reportplugins'] = 'Conectores de informe';
$string['reportsettings'] = 'Ajustes de informe';
$string['reprintheaders'] = 'Reimprimir cabeceras';
$string['respectingcurrentdata'] = 'la configuración actual queda sin modificar';
$string['rowpreviewnum'] = 'Previsualizar filas';
$string['savechanges'] = 'Guardar cambios';
$string['savepreferences'] = 'Guardar preferencias';
$string['scaleconfirmdelete'] = '¿Está seguro de que desea eliminar la escala "{$a}"?';
$string['scaledpct'] = 'Escalado %';
$string['seeallcoursegrades'] = 'Ver todas las calificaciones del curso';
$string['select'] = 'Seleccionar {$a}';
$string['selectalloroneuser'] = 'Seleccionar todos o un usuario';
$string['selectauser'] = 'Seleccionar un usuario';
$string['selectdestination'] = 'Seleccionar destino de {$a}';
$string['separator'] = 'Separador';
$string['sepcomma'] = 'Coma';
$string['septab'] = 'Tabulador';
$string['setcategories'] = 'Ajusstar categorías';
$string['setcategorieserror'] = 'Debe ajustar las categorías del curso antes de poder asignarles ponderaciones.';
$string['setgradeletters'] = 'Ajustar letras de calificación';
$string['setpreferences'] = 'Ajustar preferencias';
$string['setting'] = 'Ajuste';
$string['settings'] = 'Ajustes';
$string['setweights'] = 'Ajustar pesos';
$string['showactivityicons'] = 'Mostrar iconos de actividad';
$string['showactivityicons_help'] = '<p>Permite mostrar iconos de actividad junto a los nombres de la actividad.</p>';
$string['showallhidden'] = 'Mostrar ocultos';
$string['showallstudents'] = 'Mostrar a todos los estudiantes';
$string['showanalysisicon'] = 'Mostrar icono de análisis de calificaciones';
$string['showanalysisicon_desc'] = 'Si se muestra por omisión el icono de análisis de calificaciones. Si el módulo lo permite, el icono de análisis de calificaciones enlazara a una página con una explicación más detallada de la calificación y la forma en la que se obtuvo.';
$string['showanalysisicon_help'] = 'Si se muestra por omisión el icono de análisis de calificaciones. Si el módulo lo permite, el icono de análisis de calificaciones enlazara a una página con una explicación más detallada de la calificación y la forma en la que se obtuvo.';
$string['showaverage'] = 'Mostrar promedio';
$string['showaverage_help'] = '¿Mostrar la columna de promedio? Los estudiantes pueden estar capacitados para estimar las calificaciones de otros estudiantes si el promedio es calculado a partir de un pequeño número de calificaciones. Por motivos de rendimiento el promedio es aproximado si depende de elementos ocultos.';
$string['showaverages'] = 'Mostrar promedios de columna';
$string['showaverages_help'] = 'Muestra las medias de las columnas en el informe del calificador.';
$string['showcalculations'] = 'Mostrar cálculos';
$string['showcalculations_help'] = 'Mostrar o no iconos de cálculo junto a cada ítem y categoría de calificación, herramientas sobre los ítems calculados e indicador visual de que una columna es calculada.';
$string['showeyecons'] = 'Mostrar iconos \'mostrar/ocultar\'';
$string['showeyecons_help'] = 'Mostrar o no un icono de \'mostrar/ocultar\' junto a cada calificación (controlando que el usuario pueda verlo).';
$string['showfeedback'] = 'Mostrar retroalimentación';
$string['showfeedback_help'] = '¿Mostrar la columna de retroalimentación?';
$string['showgrade'] = 'Mostrar calificaciones';
$string['showgrade_help'] = '¿Mostrar la columna de calificaciones?';
$string['showgroups'] = 'Mostrar grupos';
$string['showhiddenitems'] = 'Mostrar ítems ocultos';
$string['showhiddenitems_help'] = 'Si estan totalmente ocultos los elementos de calificación  o si los nombres de los elementos de calificación ocultos son visibles para los estudiantes.

* Mostrar ocultos - Los nombres de los elementos de califiación ocultos se muestran, pero las calificaciones de los estudiante están ocultas
* Sólo se oculta hasta - Los elementos de calificación con "ocultar hasta" la fecha prevista se ocultan por completo hasta la fecha fijada, después de lo cual todo el elemento se muestra
* No mostrar - Los elementos de calificación ocultos grado están completamente ocultos';
$string['showhiddenuntilonly'] = 'Ocultos sólo hasta';
$string['showlettergrade'] = 'Mostrar calificaciones con letras';
$string['showlettergrade_help'] = '¿Mostrar la columna de calificaciones con letras?';
$string['showlocks'] = 'Mostrar bloqueos';
$string['showlocks_help'] = 'Mostrar o no un icono de \'bloquear/desbloquear\' junto a cada calificación.';
$string['shownohidden'] = 'No mostrar';
$string['shownooutcomes'] = 'Ocultar resultados';
$string['shownumberofgrades'] = 'Mostrar número de calificaciones en los promedios';
$string['shownumberofgrades_help'] = 'Muestra el número de calificaciones que se están agregando junto a cada promedio, entre paréntesis. Ejemplo: 45 (34).';
$string['showpercentage'] = 'Mostrar porcentaje';
$string['showpercentage_help'] = '¿Mostrar el porcentaje de cada ítem de calificación.?';
$string['showquickfeedback'] = 'Mostrar retroalimentación rápida';
$string['showquickfeedback_help'] = 'La Retroalimentación Rápida agrega un ítem de texto a cada celda de calificación en el informe del calificador, permitiéndole editar los comentarios de muchas calificaciones a la vez. Puede entonces hacer clic en el botón Actualizar para ejecutar todos estos cambios de una vez en lugar de hacerlo uno a uno.';
$string['showrange'] = 'Mostrar rangos';
$string['showrange_help'] = '¿Mostrar la columna de rangos?';
$string['showranges'] = 'Mostrar rangos';
$string['showranges_help'] = 'Muestra una fila que contiene el rango de calificaciones posibles para cada ítem en el informe del calificador.';
$string['showrank'] = 'Mostrar rango';
$string['showrank_help'] = '¿Mostrar la posición del estudiante en relación con el resto de la clase para cada elemento de calificación?';
$string['showuserimage'] = 'Mostrar imágenes de perfil del usuario';
$string['showuserimage_help'] = 'Mostrar o no la imagen del perfil del usuario junto a su nombre en el informe del calificador.';
$string['showverbose'] = 'Mostrar {$a->category} {$a->itemmodule} {$a->itemname}';
$string['showweight'] = 'Mostrar ponderaciones';
$string['showweight_help'] = '¿Mostrar la columna de ponderaciones?';
$string['simpleview'] = 'Vista simple';
$string['sitewide'] = 'Todo el sitio';
$string['sort'] = 'ordenar';
$string['sortasc'] = 'Ordenar (ascendente)';
$string['sortbyfirstname'] = 'Ordenar por nombre';
$string['sortbylastname'] = 'Ordenar por apellido';
$string['sortdesc'] = 'Ordenar (descendente)';
$string['standarddeviation'] = 'Desviación típica';
$string['stats'] = 'Estadísticas';
$string['statslink'] = 'Estadísticas';
$string['student'] = 'Estudiante';
$string['studentsperpage'] = 'Estudiantes por página';
$string['studentsperpage_help'] = 'Número de estudiantes a mostrar por página en el informe del calificador.';
$string['studentsperpagereduced'] = 'Se redujo el número máximo de estudiantes por página de  {$a->originalstudentsperpage} a {$a->studentsperpage}. Considere aumentar la variable PHP max_input_vars de {$a->maxinputvars}.';
$string['subcategory'] = 'Categoría normal';
$string['submissions'] = 'Envíos';
$string['submittedon'] = 'Enviado: {$a}';
$string['switchtofullview'] = 'Cambiar a vista completa';
$string['switchtosimpleview'] = 'Cambiar a vista simple';
$string['tabs'] = 'Tabuladores';
$string['topcategory'] = 'Categoría super';
$string['total'] = 'Total';
$string['totalweight100'] = 'El peso total es igual a 100';
$string['totalweightnot100'] = 'El peso total no es igual a 100';
$string['turnfeedbackoff'] = 'Desactivar retroalimentación';
$string['turnfeedbackon'] = 'Activar retroalimentación';
$string['typenone'] = 'Ninguno';
$string['typescale'] = 'Escala';
$string['typescale_help'] = 'Este parámetro determina la escala utilizada cuando se usa \'Escala\' como \'Tipo de calificación\'. La escala para cada actividad calificable se establece en la página de configuración de la actividad.';
$string['typetext'] = 'Texto';
$string['typevalue'] = 'Valor';
$string['uncategorised'] = 'Sin categorizar';
$string['unchangedgrade'] = 'Calificación sin cambios';
$string['unenrolledusersinimport'] = 'Esta importación incluye las siguientes calificaciones de los usuarios no matriculados actualmente en este curso: {$a}';
$string['unlimitedgrades'] = 'Calificaciones no limitadas';
$string['unlimitedgrades_help'] = 'Por defecto, las calificaciones están limitadas por los valores máximo y mínimo del ítem de calificación. Si se activa esta opción se eliminará ese límite, y se permitirá introducir directamente en el \'gradebook\' calificaciones por encima del 100%. Se recomienda habilitar esta opción en un momento de baja demanda, puesto que recalcular todas las calificaciones puede resultar en una sobrecarga del servidor.';
$string['unlock'] = 'Desbloquear';
$string['unlockverbose'] = 'Desbloquear {$a->category} {$a->itemmodule} {$a->itemname}';
$string['unused'] = 'Sin uso';
$string['updatedgradesonly'] = 'Exportar sólo calificaciones nuevas o actualizadas';
$string['uploadgrades'] = 'Subir calificaciones';
$string['useadvanced'] = 'Usar características avanzadas';
$string['usedcourses'] = 'Cursos usados';
$string['usedgradeitem'] = 'Ítem de calificación usado';
$string['usenooutcome'] = 'No usar resultado';
$string['usenoscale'] = 'No usar escala';
$string['usepercent'] = 'Usar porcentaje';
$string['user'] = 'Usuario';
$string['userenrolmentsuspended'] = 'Matriculación de usuarios suspendida';
$string['usergrade'] = 'Usuario {$a->fullname} ({$a->useridnumber}) en el ítem {$a->gradeidnumber}';
$string['userid'] = 'ID de usuario';
$string['userpreferences'] = 'Preferencias del usuario';
$string['useweighted'] = 'Usar ponderación';
$string['verbosescales'] = 'Escalas de texto';
$string['viewbygroup'] = 'Grupo';
$string['viewgrades'] = 'Ver calificaciones';
$string['warningexcludedsum'] = 'Advertencia: la exclusión de calificaciones no es compatible con la agregación.';
$string['weight'] = 'Peso';
$string['weightcourse'] = 'Usar calificaciones no ponderadas para el curso';
$string['weightedascending'] = 'Clasificar por porcentaje ponderado ascendente';
$string['weighteddescending'] = 'Clasificar por porcentaje ponderado descendente';
$string['weightedpct'] = '% ponderada';
$string['weightedpctcontribution'] = 'contribución % ponderada';
$string['weightorextracredit'] = 'Ponderación o crédito extra';
$string['weights'] = 'Ponderaciones';
$string['weightsedit'] = 'Editar ponderaciones y créditos extra';
$string['weightuc'] = 'Peso';
$string['writinggradebookinfo'] = 'Escribiendo ajustes del libro de calificaciones';
$string['xml'] = 'XML';
$string['yes'] = 'Sí';
$string['yourgrade'] = 'Su calificación';
