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
 * Strings for component 'enrol_imsenterprise', language 'es', branch 'MOODLE_26_STABLE'
 *
 * @package   enrol_imsenterprise
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['aftersaving...'] = 'Una vez que haya guardado sus ajustes, quizás quiera';
$string['allowunenrol'] = 'Permitir a los datos IMS <strong>desmatricular</strong> a estudiantes/profesores';
$string['allowunenrol_desc'] = 'Si está activado, las matriculaciones en cursos serán eliminadas cuando así se especifique en los datos de empresa.';
$string['basicsettings'] = 'Ajustes básicos';
$string['coursesettings'] = 'Opciones de datos del curso';
$string['createnewcategories'] = 'Crear categorías nuevas (ocultas) de curso si no se encuentran en Moodle';
$string['createnewcategories_desc'] = '<p>Si el elemento &lt;org&gt;&lt;orgunit&gt; está presente en los datos de entrada de un curso, su contenido se usará para especificar una categoría en el caso de que el curso haya sido creado desde cero.</p>

<p>Este \'plugin\' no recategorizará cursos ya existentes.</p>

<p>Si no existe ninguna categoría con el nombre deseado, se creará una categoría OCULTA.</p>';
$string['createnewcourses'] = 'Crear cursos nuevos (ocultas) si no se encuentran en Moodle';
$string['createnewcourses_desc'] = 'Si está activado, la matriculación IMS Enterprise puede crear nuevos cursos para aquellos cursos que  encuentre en los datos de IMS, pero no en la base de datos de Moodle. Cualquier curso de nueva creación estará inicialmente oculto.';
$string['createnewusers'] = 'Crear cuentas de usuario para usuarios aún no registrados en Moodle';
$string['createnewusers_desc'] = 'Los datos de matriculación de IMS Enterprise típicamente describen a un conjunto de usuarios. Si esta opción está activada, pueden crearse cuentas para cualquier usuario que no se encuentre en la base de datos de Moodle.

Los usuarios se buscan en primer lugar por su "idnumber", y en segundo lugar por su nombre de usuario en Moodle. Las contraseñas no son importadas por el \'plugin\' de IMS Enterprise. Recomendamos utilizar los \'plugins\' de identificación de Moodle para autentificar a los usuarios.';
$string['cronfrequency'] = 'Frecuencia de procesamiento';
$string['deleteusers'] = 'Eliminar cuentas de usuario cuando se especifique en los datos IMS';
$string['deleteusers_desc'] = '<p>Los datos de matriculación de IMS Enterprise pueden especificar la eliminación de cuentas de usuario (si el ajuste de "recstatus" es 3, lo que indica la eliminación de una cuenta), en el caso de que tal opción esté activada.</p>

<p>Como sucede de modo estándar en Moodle, el registro del usuario no es realmente eliminado de la base de datos de Moodle, pero se introduce un indicador de que la cuenta está eliminada.</p>';
$string['doitnow'] = 'ejecutar ahora mismo una importación IMS Enterprise';
$string['emptyattribute'] = 'Dejarlo vacío';
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
$string['messageprovider:imsenterprise_enrolment'] = 'Mensajes de matriculación IMS Enterprise';
$string['miscsettings'] = 'Miscelánea';
$string['pluginname'] = 'Archivo IMS Enterprise';
$string['pluginname_desc'] = 'Este método comprobará y procesará un archivo de texto con formato especial en la ubicación que usted especifique. El archivo debe seguir las especificaciones IMS Enterprise que contienen los elementos XML persona, grupo y pertenencia.';
$string['processphoto'] = 'Agregar foto de usuario al perfil';
$string['processphotowarning'] = 'ATENCIÓN: El procesamiento de imágenes probablemente agregará una carga significativa al servidor. Se recomienda no activar esta opción si se espera procesar un número elevado de estudiantes.';
$string['restricttarget'] = 'Procesar los datos sólo si es especificado el objetivo siguiente';
$string['restricttarget_desc'] = '<p>Podría pensarse en un archivo de datos IMS Enterprise como dirigido a múltiples objetivos ("targets"), e.g., diferentes LMS, o diferentes sistemas dentro de una universidad u otra instirución. Es posible especificar en el archivo Enterprise que los datos se refieren a uno o más sistemas dándoles una denominación en las marcas &lt;target&gt; contenidas en la marca &lt;properties&gt;.</p>

<p>En muchos casos esto no debería preocuparle. Deje en blanco el ajuste config y Moodle procesará siempre el archivo de datos, sin que importe que un objetivo (\'target\') esté o no especificado. En caso contrario, escriba el nombre exacto que será devuelto dentro de la marca &lt;target&gt;.
</p>';
$string['roles'] = 'Roles';
$string['settingfullname'] = 'Etiqueta de descripción IMS para el nombre completo curso';
$string['settingfullnamedescription'] = 'El nombre completo del curso es un campo necesario por lo que tiene que definir la etiqueta de descripción IMS  seleccionada en su archivo IMS Enterprise';
$string['settingshortname'] = 'Etiqueta de descripción IMS para el nombre corto curso';
$string['settingshortnamedescription'] = 'El nombre corto del curso es un campo necesario por lo que tiene que definir la etiqueta de descripción IMS  seleccionada en su archivo IMS Enterprise';
$string['settingsummary'] = 'Etiqueta de descripción IMS para el resumen del curso';
$string['settingsummarydescription'] = 'Es un campo opcional, seleccione \'Dejarlo vacio\' si no quiere especificar un resumen del curso';
$string['sourcedidfallback'] = 'Usar el "sourcedid" para el userid de una persona si no se encuentra el campo "userid"';
$string['sourcedidfallback_desc'] = 'En los datos IMS, el campo <sourcedid> representa el código de identificación persistente para una persona tal como se utiliza en el sistema de origen. El campo <userid> es un campo independiente, que debe contener el código de identificación utilizado por el usuario al iniciar sesión. En muchos casos, estos dos códigos pueden ser el mismo - pero no siempre.

Algunos sistemas de información de estudiantes no generan el campo <userid>. Si este es el caso, debe habilitar esta configuración para permitir el uso de la <sourcedid> como el ID de usuario de Moodle. De lo contrario, deje esta opción desactivada.';
$string['truncatecoursecodes'] = 'Truncar los códigos del curso a esta longitud';
$string['truncatecoursecodes_desc'] = '<p>En determinadas situaciones usted tendrá códigos de curso que desee truncar a una determinada longitud antes de su procesamiento. Si éste fuera el caso, escriba el número de caracteres en esta caja. En caso contrario, déjela <strong>en blanco</strong>.</p>';
$string['usecapitafix'] = 'Marcar esta caja si se usa "Capita" (su formato XML es ligeramente erróneo)';
$string['usecapitafix_desc'] = '<p>Se ha encontrado un ligero error en la salida XML del sistema de datos de estudiantes producido por Capita. Si utiliza Capita deberá activar esta opción. En caso contrario, déjela desactivada.</p>';
$string['usersettings'] = 'Opciones de datos del usuario';
$string['zeroisnotruncation'] = '0 indica que no se truncan los códigos';
