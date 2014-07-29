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
 * Strings for component 'install', language 'es', branch 'MOODLE_26_STABLE'
 *
 * @package   install
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['admindirerror'] = 'El directorio especificado para admin es incorrecto';
$string['admindirname'] = 'Directorio Admin';
$string['admindirsetting'] = '<p>Muy pocos servidores web usan /admin como URL especial para permitirle acceder a un panel de control o similar. Desgraciadamente, esto entra en conflicto con la ubicación estándar de las páginas de administración de Moodle Usted puede corregir esto renombrando el directorio admin en su instalación, y poniendo aquí ese nuevo nombre. Por ejemplo: <blockquote> moodleadmin</blockquote>.
Así se corregirán los enlaces admin en Moodle.</p>';
$string['admindirsettinghead'] = 'Seleccionar el directorio admin...';
$string['admindirsettingsub'] = 'Muy pocos servidores web usan /admin como URL especial para permitirle acceder
    a un panel de control o similar. Desgraciadamente, esto entra en conflicto con la ubicación estándar
    de las páginas de administración de Moodle. Usted puede corregir esto renombrando el directorio admin
    en su instalación, y poniendo aquí ese nuevo nombre. Por ejemplo: <br /> <br /><b>moodleadmin</b><br /> <br />
    Así se corregirán los enlaces admin en Moodle.';
$string['availablelangs'] = 'Lista de idiomas disponibles';
$string['caution'] = 'Precaución';
$string['chooselanguage'] = 'Seleccionar idioma';
$string['chooselanguagehead'] = 'Seleccionar idioma';
$string['chooselanguagesub'] = 'Por favor, seleccione un idioma para el proceso de instalación. Este idioma se usará también como idioma por defecto del sitio, si bien puede cambiarse más adelante.';
$string['cliadminpassword'] = 'Nueva contraseña de usuario admin';
$string['cliadminusername'] = 'Nombre de usuario de la cuenta del administrador';
$string['clialreadyconfigured'] = 'El archivo config.php ya existe. Por favor, utilice admin/cli/upgrade.php si desea actualizar su sitio web.';
$string['clialreadyinstalled'] = 'El archivo config.php ya existe. Por favor, utilice admin/cli/upgrade.php si desea actualizar su sitio web.';
$string['cliinstallfinished'] = 'La instalación se completo exitosamente.';
$string['cliinstallheader'] = 'Programa de instalación Moodle de línea de comando {$a}';
$string['climustagreelicense'] = 'En modo no interactivo debe aceptar la licencia especificando la opción --agree-license';
$string['clitablesexist'] = 'Tablas de base de datos ya existentes, la instalación CLI no puede continuar.';
$string['compatibilitysettings'] = 'Comprobando sus ajustes PHP...';
$string['compatibilitysettingshead'] = 'Comprobando sus ajustes PHP...';
$string['compatibilitysettingssub'] = 'Su servidor debería pasar todos estas comprobaciones para que Moodle pueda funcionar correctamente.';
$string['configfilenotwritten'] = '<p>El script de instalación no ha podido crear automáticamente un archivo config.php con las especificaciones elegidas. Por favor, copie el siguiente código en un archivo llamado config.php y coloque ese archivo en el directorio raíz de Moodle.</p>';
$string['configfilewritten'] = 'config.php se ha creado con éxito';
$string['configurationcomplete'] = 'Configuración finalizada';
$string['configurationcompletehead'] = 'Configuración finalizada';
$string['configurationcompletesub'] = 'Moodle ha creado su fichero de configuración. ';
$string['database'] = 'Base de datos';
$string['databasehead'] = 'Ajustes de base de datos';
$string['databasehost'] = 'Servidor de la base de datos';
$string['databasename'] = 'Nombre de la base de datos';
$string['databasepass'] = 'Contraseña de la base de datos';
$string['databaseport'] = 'Puerto de la base de datos';
$string['databasesocket'] = 'Socket Unix';
$string['databasetypehead'] = 'Seleccione el controlador de la base de datos';
$string['databasetypesub'] = 'Moodle soporta varios tipos de servidores de base de datos. Por favor, póngase en contacto con el administrador del servidor si no sabe qué tipo usar.';
$string['databaseuser'] = 'Usuario de la base de datos';
$string['dataroot'] = 'Directorio de Datos';
$string['datarooterror'] = 'El \'Directorio de Datos\' no pudo ser encontrado o creado. Corrija la ruta o cree el directorio manualmente.';
$string['datarootpermission'] = 'Permiso directorios de datos';
$string['datarootpublicerror'] = 'El \'Directorio de datos\' que ha especificado es directamente accesible vía web: debe utilizar un directorio diferente.';
$string['dbconnectionerror'] = 'Error de conexión con la base de datos. Por favor, compruebe los ajustes de la base de datos.';
$string['dbcreationerror'] = 'Error al crear la base de datos. No se ha podido crear la base de datos con el nombre y ajustes suministrados';
$string['dbhost'] = 'Servidor';
$string['dbpass'] = 'Contraseña';
$string['dbport'] = 'Puerto';
$string['dbprefix'] = 'Prefijo de tablas';
$string['dbtype'] = 'Tipo';
$string['directorysettings'] = '<p>Por favor, confirme las direcciones de la instalación de Moodle.</p>

<p><b>Dirección Web:</b>
Especifique la dirección web completa en la que se accederá a Moodle. Si su sitio web es accesible a través de varias URLs, seleccione la que resulte de acceso más natural a sus estudiantes.  No incluya la diagonal invertida final ().</p>
<p><b>Directorio de Moodle:</b>
Especifique la ruta completa de esta instalación. Asegúrese de que las mayúsculas/minúsculas son correctas.
<p><b>Directorio de datos:</b>
Usted necesita un lugar en el que Moodle pueda guardar los archivos subidos. Este directorio debe ser leible Y ESCRIBIBLE por el usuario del servidor web (normalmente \'nobody\', \'apache\', \'www-data\'), pero no debería ser directamente accesible desde la web. El instalador tratará crearlo si no existe.</p>';
$string['directorysettingshead'] = 'Por favor, confirme las siguientes direcciones de la instalación de Moodle';
$string['directorysettingssub'] = '<b>Dirección Web:</b>
Especifique la dirección web completa en la que se accederá a Moodle.
Si su sitio es accesible desde diferentes URLs entonces elija
la más natural que sus estudiantes deberían utilizar. No incluya la diagonal invertida final ().
<br />
<br />
<b>Directorio Moodle:</b>
Especifique la ruta completa de esta instalación. Asegúrese de que las mayúsculas/minúsculas son correctas.
<br />
<br />
<b>Directorio de Datos:</b>
Usted necesita un espacio donde Moodle puede guardar los archivos subidos. En este directorio debe poder LEER y ESCRIBIR el usuario del servidor web (por lo general \'nobody\',  \'apache\' o \'www-data\'), pero no debe poderse acceder a esta carpeta directamente a través de la web. El instalador tratará de crearla si no existe.';
$string['dirroot'] = 'Directorio Moodle';
$string['dirrooterror'] = 'El \'Directorio de Moodle\' parece incorrecto. No se puede encontrar una instalación de Moodle. El valor ha sido restablecido.';
$string['download'] = 'Descargar';
$string['downloadlanguagebutton'] = 'Descargar el paquete de idioma "{$a}"';
$string['downloadlanguagehead'] = 'Descargar paquete de idioma';
$string['downloadlanguagenotneeded'] = 'Puede continuar el proceso de instalación con el idioma por defecto, "{$a}".';
$string['downloadlanguagesub'] = 'Ahora tiene la opción de descargar su paquete de idioma y continuar con el proceso de instalación en ese idioma.<br /><br />Si no es posible la descarga el proceso de instalación continuará en inglés (una vez que la instalación haya finalizado, tendrá la oportunidad de descargar e instalar otros idiomas adicionales).';
$string['doyouagree'] = '¿Está de acuerdo? (sí/no):';
$string['environmenthead'] = 'Comprobando su entorno';
$string['environmentsub'] = 'Estamos comprobando si los diferentes componentes de su servidor cumplen con los requerimientos mínimos de sistema';
$string['environmentsub2'] = 'Cada versión de Moodle tiene algún requisito mínimo de la versión de PHP y un número obligatorio de extensiones de PHP.
Una comprobación del entorno completo se realiza antes de cada instalación y actualización. Por favor, póngase en contacto con el administrador del servidor si no sabes cómo instalar la nueva versión o habilitar las extensiones PHP.';
$string['errorsinenvironment'] = 'La comprobación del entorno fallo!';
$string['fail'] = 'Fallo';
$string['fileuploads'] = 'Subidas de archivos';
$string['fileuploadserror'] = 'Debe estar activado';
$string['fileuploadshelp'] = '<p>La subida de archivos parece estar desactivada en su servidor.</p>

<p>Moodle aún puede ser instalado, pero usted no podrá subir archivos a los cursos ni imágenes nuevas de perfil de usuario.</p>

<p>Para habilitar la subida de archivos, usted (o el administrador del sistema) necesita editar el archivo php.ini principal y cambiar el ajuste de <b>file_uploads</b> a \'1\'.</p>';
$string['inputdatadirectory'] = 'Directorio de Datos:';
$string['inputwebadress'] = 'Dirección Web:';
$string['inputwebdirectory'] = 'Directorio Moodle:';
$string['installation'] = 'Instalación';
$string['langdownloaderror'] = 'El idioma "{$a}" no pudo ser instalado. El proceso de instalación continuará en inglés.';
$string['langdownloadok'] = 'El idioma "{$a}" ha sido instalado correctamente. El proceso de instalación continuará en este idioma.';
$string['magicquotesruntime'] = 'Magic Quotes Run Time';
$string['magicquotesruntimeerror'] = 'Debe estar desactivado';
$string['magicquotesruntimehelp'] = '<p>Magic quotes runtime debe estar desactivado para que Moodle funcione adecuadamente.</p>

<p>Normalmente está desactivado por defecto... Vea el ajuste <b>magic_quotes_runtime</b> en su archivo php.ini.</p>

<p>Si usted no tiene acceso a php.ini, debería poder escribir la siguiente línea en un archivo denominado .htaccess dentro del directorio Moodle:
<blockquote>php_value magic_quotes_runtime Off</blockquote>
</p>';
$string['memorylimit'] = 'Límite de memoria';
$string['memorylimiterror'] = 'El límite de memoria PHP esta fijado demasiado bajo... Puede tener problemas más tarde.';
$string['memorylimithelp'] = '<p>El límite de memoria PHP en su servidor es actualmente {$a}.</p>

<p>Esto puede ocasionar que Moodle tenga problemas de memoria más adelante, especialmente si usted tiene activados muchos módulos y/o muchos usuarios.</p>

<p>Recomendamos que configure PHP con el límite más alto posible, e.g. 40M.
Hay varias formas de hacer esto:</p>
<ol>
<li>Si puede hacerlo, recompile PHP con <i>--enable-memory-limit</i>.
Esto hace que Moodle fije por sí mismo el límite de memoria.</li>
<li>Si usted tiene acceso al archivo php.ini, puede cambiar el ajuste <b>memory_limit</b>
a, digamos, 40M. Si no lo tiene, pida a su administrador que lo haga por usted.</li>
<li>En algunos servidores PHP usted puede crear en el directorio Moodle un archivo .htaccess que contenga esta línea:
<p><blockquote>php_value memory_limit 40M</blockquote></p>
<p>Sin embargo, en algunos servidores esto hace que <b>todas</b> las páginas PHP dejen de funcionar
(podrá ver los errores cuando mire las páginas) de modo que tendrá que eliminar el archivo .htaccess.</p></li>
</ol>';
$string['mssqlextensionisnotpresentinphp'] = 'PHP no se ha configurado adecuadamente con la extensión MSSQL de modo que pueda comunicarse con el SQL*Server. Por favor, compruebe el archivo php.ini o vuelva a compilar PHP.';
$string['mysqliextensionisnotpresentinphp'] = 'PHP no ha sido configurado adecuadamente con la extensión MySQLi de forma que se pueda comunicar con MySQL. Por favor, compruebe su archivo php.ini o recompile PHP. La extensión MySQLi no está disponible en PHP 4.';
$string['nativemariadb'] = 'MariaDB (nativo/mariadb)';
$string['nativemariadbhelp'] = 'Ahora necesita configurar la base de datos donde se almacenarán la mayoría de los datos de Moodle. La base de datos se puede crear si el usuario de la base de datos tiene los permisos necesarios, el nombre de usuario y la contraseña deben existir. El prefijo de la tabla es opcional. Este controlador no es compatible con el antiguo motor MyISAM.';
$string['nativemssql'] = 'SQL*Server FreeTDS (native/mssql)';
$string['nativemssqlhelp'] = 'Ahora tiene que configurar la base de datos donde se almacenarán la mayoría de los datos de Moodle. Esta base de datos debe estar creada previamente, al igual que un nombre de usuario y su contraseña, para poder acceder a ella. El prefijo de la tabla es obligatorio.';
$string['nativemysqli'] = 'MySQL mejorado (native/mysqli)';
$string['nativemysqlihelp'] = 'Ahora tiene que configurar la base de datos donde se almacenarán la mayoría de los datos de Moodle.
La base de datos solo podrá crearse si el usuario de la base de datos tiene los permisos necesarios. El nombre de usuario y la contraseña ya deben existir. El prefijo de la tabla es opcional.';
$string['nativeoci'] = 'Oracle (native/oci)';
$string['nativeocihelp'] = 'Ahora tiene que configurar la base de datos donde se almacenarán la mayoría de los datos de Moodle. Esta base de datos debe estar creada previamente, al igual que un nombre de usuario y su contraseña, para poder acceder a ella. El prefijo de la tabla es obligatorio.';
$string['nativepgsql'] = 'PostgreSQL (native/pgsql)';
$string['nativepgsqlhelp'] = 'Ahora tiene que configurar la base de datos donde se almacenarán la mayoría de los datos de Moodle. Esta base de datos debe estar creada previamente, al igual que un nombre de usuario y su contraseña, para poder acceder a ella. El prefijo de la tabla es obligatorio.';
$string['nativesqlsrv'] = 'SQL*Server Microsoft (native/sqlsrv)';
$string['nativesqlsrvhelp'] = 'Ahora tiene que configurar la base de datos donde se almacenarán la mayoría de los datos de Moodle. Esta base de datos debe estar creada previamente, al igual que un nombre de usuario y su contraseña, para poder acceder a ella. El prefijo de la tabla es obligatorio.';
$string['nativesqlsrvnodriver'] = 'Los drivers Microsoft del servidor SQL para PHP no están instalados o configurados adecuadamente.';
$string['nativesqlsrvnonwindows'] = 'Los drivers Microsoft del servidor SQL para PHP solamente están disponibles para Sistemas Operativos Windows.';
$string['ociextensionisnotpresentinphp'] = 'PHP no ha sido adecuadamente configurado con la extensión OCI8 de modo que pueda comunicarse con Oracle. Por favor, compruebe el archivo php.ini o vuelva a compilar PHP.';
$string['pass'] = 'Correcto';
$string['paths'] = 'Rutas';
$string['pathserrcreatedataroot'] = 'El directorio de los datos ({$a->dataroot}) no puede ser creado por el instalador.';
$string['pathshead'] = 'Confirme las rutas';
$string['pathsrodataroot'] = 'El directorio dataroot no tiene permisos de escritura.';
$string['pathsroparentdataroot'] = 'El directorio padre ({$a->parent}) no tiene permisos de escritura. El directorio de los datos ({$a->dataroot}) no puede ser creado por el instalador.';
$string['pathssubadmindir'] = 'Muy pocos servidores web usan /admin como un URL especial para acceder a un
panel de control o algo similar. Lamentablemente, esto entra en conflicto con la ubicación estándar para las páginas de administración de Moodle. Usted puede solucionar este problema, renombrando el directorio admin en su instalación Moodle, poniendo un nuevo nombre aquí. Por ejemplo: <em> moodleadmin </em>. Esto solucionará los enlaces de administración en instalación Moodle.';
$string['pathssubdataroot'] = 'Usted necesita un espacio donde Moodle puede guardar los archivos subidos. En este directorio debe poder LEER y ESCRIBIR el usuario del servidor web (por lo general \'nobody\',  \'apache\' o \'www-data\'), pero no debe poderse acceder a esta carpeta directamente a través de la web. El instalador tratará de crearla si no existe.';
$string['pathssubdirroot'] = 'Ruta completa del directorio de instalación de Moodle.';
$string['pathssubwwwroot'] = 'Dirección web completa para acceder a Moodle. No es posible acceder a Moodle utilizando múltiples direcciones. Si su sitio tiene varias direcciones públicas debe configurar redirecciones permanentes en todas ellas, excepto en ésta. Si su sitio web es accesible tanto desde una intranet como desde Internet, escriba aquí la dirección pública y configure su DNS para que los usuarios de su intranet puedan también utilizar la dirección pública.';
$string['pathsunsecuredataroot'] = 'La ubicación de dataroot no es segura';
$string['pathswrongadmindir'] = 'El directorio admin no existe';
$string['pgsqlextensionisnotpresentinphp'] = 'PHP no ha sido adecuadamente configurado con la extensión PGSQL de modo que pueda comunicarse con PostgreSQL. Por favor, compruebe el archivo php.ini o vuelva a compilar PHP.';
$string['phpextension'] = 'Extensión PHP {$a}';
$string['phpversion'] = 'Versión PHP';
$string['phpversionhelp'] = '<p>Moodle requiere al menos una versión de PHP 4.3.0 o 5.1.0 ((5.0.x tiene una serie de problemas conocidos).</p>
<p>En este momento está ejecutando la versión {$a}</p>
<p>¡Debe actualizar PHP o trasladarse a otro servidor con una versión más reciente de PHP!<br />
(En caso de 5.0.x podría también revertir a la versión 4.4.x)</p>';
$string['releasenoteslink'] = 'Para obtener información acerca de esta versión de Moodle, consulte las Notas de la Versión en {$a}';
$string['safemode'] = 'Modo Seguro (Safe Mode)';
$string['safemodeerror'] = 'Moodle puede tener problemas con Modo Seguro (\'safe mode\') activado';
$string['safemodehelp'] = '<p>Moodle puede tener varios problemas  Modo Seguro (\'safe mode\') activado, y probablemente no pueda crear nuevos archivos.</p>

<p>Normalmente el Modo Seguro (\'safe mode\') sólo es activado por servidores web públicos paranoides, así que lo que usted debe hacer es encontrar otra compañía para su sitio Moodle.</p>

<p>Si lo desea, puede seguir con la instalación, pero experimentará problemas más adelante.</p>';
$string['sessionautostart'] = 'Inicio automático de sesión';
$string['sessionautostarterror'] = 'Esto debe estar desactivado';
$string['sessionautostarthelp'] = '<p>Moodle requiere apoyo de sesión y no funcionará sin él.</p>

<p>Las sesiones deben estar activadas en el archhivo php.ini para el parámetro session.auto_start.</p>';
$string['sqliteextensionisnotpresentinphp'] = 'PHP no ha sido adecuadamente configurado con la extensión SQLite. Por favor, compruebe su archivo php.ini o recompile PHP.';
$string['upgradingqtypeplugin'] = 'Actualizando el Plugin Pregunta/tipo';
$string['welcomep10'] = '{$a->installername} ({$a->installerversion})';
$string['welcomep20'] = 'Si está viendo esta página es porque ha podido ejecutar el paquete <strong>{$a->packname} {$a->packversion}</strong> en su ordenador. !Enhorabuena!';
$string['welcomep30'] = 'Esta versión de <strong>{$a->installername}</strong> incluye las
    aplicaciones necesarias para que <strong>Moodle</strong> funcione en su ordenador,
    principalmente:';
$string['welcomep40'] = 'El paquete también incluye <strong>Moodle {$a->moodlerelease} ({$a->moodleversion})</strong>.';
$string['welcomep50'] = 'El uso de todas las aplicaciones del paquete está gobernado por sus respectivas
    licencias. El programa <strong>{$a->installername}</strong> es
    <a href="http://www.opensource.org/docs/definition_plain.html">código abierto</a> y se distribuye
    bajo licencia <a href="http://www.gnu.org/copyleft/gpl.html">GPL</a>.';
$string['welcomep60'] = 'Las siguientes páginas le guiarán a través de algunos sencillos pasos para configurar
    y ajustar <strong>Moodle</strong> en su ordenador. Puede utilizar los valores por defecto sugeridos o,
    de forma opcional, modificarlos para que se ajusten a sus necesidades.';
$string['welcomep70'] = 'Pulse en el botón "Siguiente" para continuar con la configuración de <strong>Moodle</strong>.';
$string['wwwroot'] = 'Dirección Web';
$string['wwwrooterror'] = 'La \'Dirección Web\' parece incorrecta. No se pudo encontrar una instalación de Moodle. El valor ha sido cambiado por el original.';
