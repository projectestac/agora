<?php

// Customized language file for Agora

defined('MOODLE_INTERNAL') || die();

$string['diskquotaerror'] = '<strong>WARNING</strong>: This Moodle site has expired its disk quote.<br />It won\'t be possible to upload files or do backups before freeing some disk space or requesting an increase of the quote.';
$string['rush_hour'] = 'This operation is not allowed in rush hours. You can do it from monday to friday before 9:00, from 14:00 to 14:59 and after 17:00. All day on weekends.';

// Quotas report
$string['coursequotas:view'] = 'View disk usage quotas';
$string['coursequotas'] = 'Disk usage';
$string['total_data'] = 'Total';
$string['disk_used'] = 'Busy disk';
$string['disk_free'] = 'Free disk';
$string['category_data'] = 'Categories';
$string['larger_courses'] = 'Courses';
$string['course_name'] = 'Course name';
$string['category_name'] = 'Category name';
$string['disk_consume_explain'] = 'Now there are <b>$a->diskConsume MB</b> busy of <b>$a->diskSpace MB</b> available.';
$string['total_description'] = 'A continuación se muestra el porcentaje de cuota de disco ocupado en relación con el total';
$string['category_description'] = 'A continuación se muuestran los cursos de las diferentes categorias junto con el tamaño total de los ficheros que lo componen';
$string['courses_description'] = 'A continuación se muestran todos los cursos junto con su categoría y el tamaño de sus ficheros ordenados de mayor a menor según este último dato';
