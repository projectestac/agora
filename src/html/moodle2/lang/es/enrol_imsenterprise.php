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
 * Strings for component 'enrol_imsenterprise', language 'es', branch 'MOODLE_23_STABLE'
 *
 * @package   enrol_imsenterprise
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['aftersaving...'] = 'Una vez que haya guardado sus ajustes, quizás quiera';
$string['allowunenrol'] = 'Permitir a los datos IMS <strong>desmatricular</strong> a estudiantes/profesores';
$string['allowunenrol_desc'] = '<p>Los datos Enterprise pueden agregar o quitar matriculaciones en el curso tanto de estudiantes como de profesores. Si la opción está deshabilitada, Moodle llevará a cabo las desmatriculaciones cuando así se especifique en los datos.</p>

<p>Hay tres modos de dar de baja a los estudiantes con los datos IMS:</p>

<ul><li>Un elemento &lt;miembro&gt; que especifica el estudiante y el curso, y con el atributo "recstatus" del elemento &lt;rol&gt; fijado a 3 (lo que significa "eliminar"). ESTA CARACTERÍSTICA AÚN NO ESTÁ IMPLEMENTADA EN EL PLUGIN DE MOODLE.</li>

<li> Un elemento &lt;miembro&gt; que especifica el estudiante y el curso, y con el elemento &lt;status&gt; fijado a 0 (que significa "inactivo").</li></ul>

<p>El tercer método es algo diferente. No requiere que el ajuste de configuración esté activado, y puede especificarse antes de la fecha de matriculación :</p>

<ul><li>Un elemento <member> que especifica un <timeframe> para la matriculación puede especificar la fecha inicial y/o final de matriculación de ese estudiante en particular. Estas fechas se cargan en la tabla de datos de matriculación de Moodle si está presente, de modo que después de la fecha final el estudiante no podrá acceder al curso.</li></ul>';
$string['basicsettings'] = 'Ajustes básicos';
$string['coursesettings'] = 'Opciones de datos del curso';
$string['createnewcategories'] = 'Crear categorías nuevas (ocultas) de curso si no se encuentran en Moodle';
$string['createnewcategories_desc'] = '<p>Si el elemento &lt;org&gt;&lt;orgunit&gt; está presente en los datos de entrada de un curso, su contenido se usará para especificar una categoría en el caso de que el curso haya sido creado desde cero.</p>

<p>Este \'plugin\' no recategorizará cursos ya existentes.</p>

<p>Si no existe ninguna categoría con el nombre deseado, se creará una categoría OCULTA.</p>';
$string['createnewcourses'] = 'Crear cursos nuevos (ocultas) si no se encuentran en Moodle';
$string['createnewcourses_desc'] = '<p>El \'plugin\' de matriculación de IMS Enterprise puede crear nuevos cursos para cualquiera que encuentre en los datos IMS, pero no en la base de datos de Moodle si esta opción está activada.</p>

<p>Los cursos son en primer lugar buscados por su "idnumber" - un campo alfanumérico en la tabla de cursos de Moodle, que puede especificar el código usado para identificar el curso en el Sistema de Información del Estudiante (por ejemplo). Si no se encuentra, se buscará en la tabla de cursos la "descripción corta" que en Moodle es el identificador de curso tal como se muestra, por ejemplo, en los \'breadcrumbs\' (en algunos sistemas estos dos campos pueden ser idénticos). Sólo cuando la búsqueda no haya tenido resultado podrá opcionalmente el \'plugin\' crear nuevos cursos.</p>

<p>Los cursos nuevos así generados estarán OCULTOS cuando son creados, a fin de evitar que los estudiantes deambulen por cursos enteramente vacíos sin que el profesor tenga constancia de ello.</p>';
$string['createnewusers'] = 'Crear cuentas de usuario para usuarios aún no registrados en Moodle';
$string['createnewusers_desc'] = 'Los datos de matriculación de IMS Enterprise típicamente describen a un conjunto de usuarios. Si esta opción está activada, pueden crearse cuentas para cualquier usuario que no se encuentre en la base de datos de Moodle.

Los usuarios se buscan en primer lugar por su "idnumber", y en segundo lugar por su nombre de usuario en Moodle. Las contraseñas no son importadas por el \'plugin\' de IMS Enterprise. Recomendamos utilizar los \'plugins\' de identificación de Moodle para autentificar a los usuarios.';
$string['cronfrequency'] = 'Frecuencia de procesamiento';
$string['deleteusers'] = 'Eliminar cuentas de usuario cuando se especifique en los datos IMS';
$string['deleteusers_desc'] = '<p>Los datos de matriculación de IMS Enterprise pueden especificar la eliminación de cuentas de usuario (si el ajuste de "recstatus" es 3, lo que indica la eliminación de una cuenta), en el caso de que tal opción esté activada.</p>

<p>Como sucede de modo estándar en Moodle, el registro del usuario no es realmente eliminado de la base de datos de Moodle, pero se introduce un indicador de que la cuenta está eliminada.</p>';
$string['doitnow'] = 'ejecutar ahora mismo una importación IMS Enterprise';
$string['filelockedmail'] = 'El texto que usted está utilizando para las matriculaciones basadas en archivo IMS ({$a}) no pueden ser eliminadas por el proceso del cron. Esto normalmente significa que los permisos son erróneos. Por favor, repare los permisos de modo que Moodle pueda eliminar el archivo (de otro modo, podría ser procesado una y otra vez).';
$string['filelockedmailsubject'] = 'Error importante. Archivo de matriculación';
$string['fixcasepersonalnames'] = 'Cambie los nombres personales a Mayúsculas';
$string['fixcaseusernames'] = 'Cambie los nombres de usuario a minúsculas';
$string['ignore'] = 'Ignorar';
$string['importimsfile'] = 'Importar archivo IMS Enterprise';
$string['imsrolesdescription'] = 'La especificación IMS Enterprise incluye 8 distintos tipos de rol. Por favor, seleccione cómo quiere que se le asignen en Moodle, incluyendo si alguno debe ser omitido.';
$string['location'] = 'Ubicación del archivo';
$string['logtolocation'] = 'Ubicación del archivo \'log\' de salida (déjelo en blanco si no hay registro)';
$string['mailadmins'] = 'Notificar al administrador por email';
$string['mailusers'] = 'Notificar a los usuarios por email';
$string['miscsettings'] = 'Miscelánea';
$string['pluginname'] = 'Archivo IMS Enterprise';
$string['processphoto'] = 'Agregar foto de usuario al perfil';
$string['processphotowarning'] = 'ATENCIÓN: El procesamiento de imágenes probablemente agregará una carga significativa al servidor. Se recomienda no activar esta opción si se espera procesar un número elevado de estudiantes.';
$string['restricttarget'] = 'Procesar los datos sólo si es especificado el objetivo siguiente';
$string['restricttarget_desc'] = '<p>Podría pensarse en un archivo de datos IMS Enterprise como dirigido a múltiples objetivos ("targets"), e.g., diferentes LMS, o diferentes sistemas dentro de una universidad u otra instirución. Es posible especificar en el archivo Enterprise que los datos se refieren a uno o más sistemas dándoles una denominación en las marcas &lt;target&gt; contenidas en la marca &lt;properties&gt;.</p>

<p>En muchos casos esto no debería preocuparle. Deje en blanco el ajuste config y Moodle procesará siempre el archivo de datos, sin que importe que un objetivo (\'target\') esté o no especificado. En caso contrario, escriba el nombre exacto que será devuelto dentro de la marca &lt;target&gt;.
</p>';
$string['roles'] = 'Roles';
$string['sourcedidfallback'] = 'Usar el "sourcedid" para el userid de una persona si no se encuentra el campo "userid"';
$string['truncatecoursecodes'] = 'Truncar los códigos del curso a esta longitud';
$string['truncatecoursecodes_desc'] = '<p>En determinadas situaciones usted tendrá códigos de curso que desee truncar a una determinada longitud antes de su procesamiento. Si éste fuera el caso, escriba el número de caracteres en esta caja. En caso contrario, déjela <strong>en blanco</strong>.</p>';
$string['usecapitafix'] = 'Marcar esta caja si se usa "Capita" (su formato XML es ligeramente erróneo)';
$string['usecapitafix_desc'] = '<p>Se ha encontrado un ligero error en la salida XML del sistema de datos de estudiantes producido por Capita. Si utiliza Capita deberá activar esta opción. En caso contrario, déjela desactivada.</p>';
$string['usersettings'] = 'Opciones de datos del usuario';
$string['zeroisnotruncation'] = '0 indica que no se truncan los códigos';
