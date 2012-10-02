<?PHP // $Id: enrol_imsenterprise.php,v 1.3 2007/08/24 19:42:32 stronk7 Exp $ 
      // enrol_imsenterprise.php - created with Moodle 1.7 (2006101007)


$string['aftersaving...'] = 'Una vez que haya guardado sus ajustes, quizás quiera';
$string['allowunenrol'] = 'Permitir a los datos IMS <strong>desmatricular</strong> a estudiantes/profesores';
$string['basicsettings'] = 'Ajustes básicos';
$string['coursesettings'] = 'Opciones de datos del curso';
$string['createnewcategories'] = 'Crear categorías nuevas (ocultas) de curso si no se encuentran en Moodle';
$string['createnewcourses'] = 'Crear cursos nuevos (ocultas) si no se encuentran en Moodle';
$string['createnewusers'] = 'Crear cuentas de usuario para usuarios aún no registrados en Moodle';
$string['cronfrequency'] = 'Frecuencia de procesamiento';
$string['deleteusers'] = 'Eliminar cuentas de usuario cuando se especifique en los datos IMS';
$string['description'] = 'Este método comprobará y procesará repetidamente un archivo de texto especialmente formateado en el lugar que usted especifique. El archivo debe las <a href=\'../help.php?module=enrol/imsenterprise&amp;file=formatoverview.html\' target=\'_blank\'>especificaciones IMS Enterprise</a> que contienen elementos XML relativos a la persona, grupo y pertenencia.';
$string['doitnow'] = 'ejecutar ahora mismo una importación IMS Enterprise';
$string['enrolname'] = 'archivo IMS Enterprise';
$string['filelockedmail'] = 'El texto que usted está utilizando para las matriculaciones basadas en archivo IMS ($a) no pueden ser eliminadas por el proceso del cron. Esto normalmente significa que los permisos son erróneos. Por favor, repare los permisos de modo que Moodle pueda eliminar el archivo (de otro modo, podría ser procesado una y otra vez).';
$string['filelockedmailsubject'] = 'Error importante. Archivo de matriculación';
$string['fixcasepersonalnames'] = 'Cambie los nombres personales a Mayúsculas';
$string['fixcaseusernames'] = 'Cambie los nombres de usuario a minúsculas';
$string['imsrolesdescription'] = 'La especificación IMS Enterprise incluye 8 distintos tipos de rol. Por favor, seleccione cómo quiere que se le asignen en Moodle, incluyendo si alguno debe ser omitido.';
$string['location'] = 'Ubicación del archivo';
$string['logtolocation'] = 'Ubicación del archivo \'log\' de salida (déjelo en blanco si no hay registro)';
$string['mailadmins'] = 'Notificar al administrador por email';
$string['mailusers'] = 'Notificar a los usuarios por email';
$string['miscsettings'] = 'Miscelánea';
$string['processphoto'] = 'Agregar foto de usuario al perfil';
$string['processphotowarning'] = 'ATENCIÓN: El procesamiento de imágenes probablemente agregará una carga significativa al servidor. Se recomienda no activar esta opción si se espera procesar un número elevado de estudiantes.';
$string['restricttarget'] = 'Procesar los datos sólo si es especificado el objetivo siguiente';
$string['sourcedidfallback'] = 'Usar el \"sourcedid\" para el userid de una persona si no se encuentra el campo \"userid\"';
$string['truncatecoursecodes'] = 'Truncar los códigos del curso a esta longitud';
$string['usecapitafix'] = 'Marcar esta caja si se usa \"Capita\" (su formato XML es ligeramente erróneo)';
$string['usersettings'] = 'Opciones de datos del usuario';
$string['zeroisnotruncation'] = '0 indica que no se truncan los códigos';

?>
