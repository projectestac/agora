<?php

$string['pluginname'] = 'Agora';

//IMPORT19
$string['import19'] = 'Restore from Moodle 1.9';
$string['choosefilefrommoodle19'] = 'Restore from Moodle 1.9';
$string['choosefilefrommoodle19_help'] = 'Restore a course directly from Moodle 1.9';

$string['import19_nocourses'] = 'There isn\'t any available course';
$string['import19_nodbconnect'] = 'Restore from Moodle 1.9 isn\'t available. It\'s not possible to connect to Moodle 1.9 database.';

// Disk quota
$string['diskquotaerror'] = '<strong>WARNING</strong>: This Moodle site has expired its disk quota.<br />It won\'t be possible to upload files or do backups before freeing some disk space or requesting an increase of the quota.';

// Rush hour
$string['rush_hour'] = 'This operation is not allowed in rush hours. You can do it from monday to friday before 9:00, from 14:00 to 14:59 and after 17:00. All day on weekends.';

// Quotas report
$string['coursequotas'] = 'Disk usage';
$string['total_data'] = 'Total';
$string['disk_used'] = 'Busy disk';
$string['disk_free'] = 'Free disk';
$string['category_data'] = 'Categories';
$string['larger_courses'] = 'Courses';
$string['course_name'] = 'Course name';
$string['category_name'] = 'Category name';
$string['front_page'] = 'Front page';
$string['disk_consume_explain'] = 'There are currently <strong>{$a->diskConsume} MB</strong> used of <strong>{$a->diskSpace} MB</strong> available, where:';
$string['disk_consume_repofiles'] = '<strong>{$a->figure} {$a->unit}</strong> are in repository "Fitxers"';
$string['disk_consume_courses'] = '<strong>{$a->figure} {$a->unit}</strong> are in the courses';
$string['total_description'] = 'Percentage of used disk versus the total disk space';
$string['category_description'] = 'Courses of each category with the total size of its files';
$string['courses_description'] = 'All courses with its category and the size of its files ordered decreasing';
