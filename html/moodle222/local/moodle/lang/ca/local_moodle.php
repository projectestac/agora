<?php

// Customized language file for Agora

defined('MOODLE_INTERNAL') || die();

$string['diskquotaerror'] = '<strong>ATENCIÓ</strong>: Aquest Moodle ha excedit la quota de disc assignada.<br /> No es podrà pujar cap fitxer ni generar cap còpia de seguretat fins que no s\'alliberi espai i/o es demani una ampliació de la quota.';
$string['rush_hour'] = 'Aquesta operació no està permesa en hores punta. Podeu realitzar-la de dilluns a divendres abans de les 9:00, de 14:00 a 14:59 i després de les 17:00, així com els caps de setmana durant tot el dia.';

// Quotas report
$string['coursequotas:view'] = 'Veure les quotes d\'ocupació del disc';
$string['coursequotas'] = 'Ocupació del disc';
$string['total_data'] = 'Total';
$string['disk_used'] = 'Espai ocupat';
$string['disk_free'] = 'Espai lliure';
$string['category_data'] = 'Categories';
$string['larger_courses'] = 'Cursos';
$string['course_name'] = 'Nom del curs';
$string['category_name'] = 'Nom de la categoria';
$string['disk_consume_explain'] = 'Actualment s\'estan utilitzant <b>$a->diskConsume MB</b> dels <b>$a->diskSpace MB</b> disponibles.';
$string['total_description'] = 'Percentatge de disc ocupat en relació amb el total de la quota assignada';
$string['category_description'] = 'Mida total de les categories i subcategories calculada a partir de la mida dels cursos que contenen';
$string['courses_description'] = 'Llista de tots els cursos, ordenada de major a menor segons la mida dels seus fitxers';
