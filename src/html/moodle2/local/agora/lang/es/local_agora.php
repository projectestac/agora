<?php

$string['pluginname'] = 'Agora';

//IMPORT19
$string['import19'] = 'Restaurar desde Moodle 1.9';
$string['choosefilefrommoodle19'] = 'Restaurar desde Moodle 1.9';
$string['choosefilefrommoodle19_help'] = 'Restauración directa del curso seleccionado desde Moodle 1.9';

$string['import19_nocourses'] = 'No hay ningún curso del Moodle 1.9 disponible o bien el usuario/a actual no existe en el Moodle 1.9 o existe y no tiene acceso como profesorado editor a ningún curso.';
$string['import19_nodbconnect'] = 'No está disponible la importación de cursos desde el Moodle 1.9. No ha sido posible conectar a la base de datos del Moodle 1.9.';

// Disk quota
$string['diskquotaerror'] = '<strong>ATENCIÓN</strong>: Este Moodle ha superado la cuota de espacio disponible.<br /> No se podrá subir ningún fichero ni generar ninguna copia de seguridad hasta que no se libere espacio y/o se solicite una ampliación de la cuota.';

// Rush hour
$string['rush_hour'] = 'Esta operación no está permitida en horas punta. Puede realizarse de lunes a viernes antes de las 9:00, de 14:00 a 14:59 y después de las 17:00, así como los fines de semana durante todo el día.';

// Quotas report
$string['coursequotas'] = 'Ocupación del disco';
$string['total_data'] = 'Total';
$string['disk_used'] = 'Espacio ocupado';
$string['disk_free'] = 'Espacio libre';
$string['category_data'] = 'Categorías';
$string['larger_courses'] = 'Cursos';
$string['course_name'] = 'Nombre del curso';
$string['category_name'] = 'Nombre de la categoría';
$string['front_page'] = 'Página inicial';
$string['disk_consume_explain'] = 'Actualmente se están utilitzando <strong>{$a->diskConsume} MB</strong> de los <strong>{$a->diskSpace} MB</strong> disponibles, de los cuales:';
$string['disk_consume_repofiles'] = '<strong>{$a->figure} {$a->unit}</strong> están en el repositorio "Fitxers"';
$string['disk_consume_courses'] = '<strong>{$a->figure} {$a->unit}</strong> están en los cursos';
$string['total_description'] = 'A continuación se muestra el porcentaje de cuota de disco ocupado en relación con el total';
$string['category_description'] = 'A continuación se muestran los cursos de las diferentes categorias junto con el tamaño total de los ficheros que lo componen';
$string['courses_description'] = 'A continuación se muestran todos los cursos junto con su categoría y el tamaño de sus ficheros ordenados de mayor a menor según este último dato';
