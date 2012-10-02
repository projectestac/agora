<?PHP // $Id$ 
      // enrol_database.php - created with Moodle 1.9 Beta 4 (2007101508)


$string['autocreate'] = 'Es poden crear els cursos automàticament si hi ha inscripcions a cursos que encara no existeixen en aquest Moodle.';
$string['autocreation_settings'] = 'Paràmetres de creació automàtica';
$string['category'] = 'Categoria per als cursos creats automàticament';
$string['course_fullname'] = 'Nom del camp on s\'emmagatzema el nom complet del curs.';
$string['course_id'] = 'Nom del camp on s\'emmagatzema l\'ID del curs. Els valors d\'aquest camp s\'aparellen amb els del camp \"enrol_db_l_coursefield\" de la taula de cursos de Moodle.';
$string['course_shortname'] = 'Nom del camp on s\'emmagatzema el nom curt del curs.';
$string['course_table'] = 'Nom de la taula on hi ha les dades del curs (nom curt, nom complet, ID, etc.)';
$string['dbhost'] = 'Nom o número IP del servidor';
$string['dbname'] = 'Nom de la base de dades';
$string['dbpass'] = 'Contrasenya del servidor';
$string['dbtable'] = 'Taula de la base de dades';
$string['dbtype'] = 'Tipus de base de dades';
$string['dbuser'] = 'Usuari del servidor';
$string['defaultcourseroleid'] = 'El rol que s\'assignarà per defecte si no se n\'especifica un altre.';
$string['description'] = 'Podeu fer servir una base de dades externa (gairebé de qualsevol mena) per controlar les inscripcions. Se suposa que la base de dades externa té un camp que conté un ID de curs i un altre camp amb un ID d\'usuari. Aquests camps es comparen amb els camps que trieu de les taules locals de cursos i d\'usuaris.';
$string['disableunenrol'] = 'SI activeu aquest paràmetre, la inscripció dels usuaris prèviament inscrits pel connector de base de dades externa ja no podrà ser cancel·lada per aquest mateix connector, independentment del contingut de la base de dades.';
$string['enrol_database_autocreation_settings'] = 'Creació automàtica de cursos nous';
$string['enrolname'] = 'Base de dades externa';
$string['general_options'] = 'Opcions generals';
$string['host'] = 'Servidor de bases de dades';
$string['ignorehiddencourse'] = 'Si activeu aquesta opció, els usuaris no seran inscrits en cursos que no estiguin disponibles per a estudiantat.';
$string['local_fields_mapping'] = 'Camps de la base de dades (interna) de Moodle';
$string['localcoursefield'] = 'El nom del camp de la taula de cursos que s\'utilitzarà per aparellar els registres amb la base de dades remota (p. ex. idnumber).';
$string['localrolefield'] = 'El nom del camp de la taula de rols que s\'utilitzarà per aparellar els registres amb la base de dades remota (p. ex. idnumber).';
$string['localuserfield'] = 'El nom del camp de la taula d\'usuaris que s\'utilitzarà per aparellar els registres amb la base de dades remota (p. ex. idnumber).';
$string['name'] = 'La base de dades concreta que cal utilitzar.';
$string['pass'] = 'Contrasenya per a accedir al servidor.';
$string['remote_fields_mapping'] = 'Camps de la base de dades (externa) d\'inscripcions';
$string['remotecoursefield'] = 'El nom del camp de la taula remota que s\'utilitzarà per aparellar els registres amb la taula de cursos.';
$string['remoterolefield'] = 'El nom del camp de la taula remota que s\'utilitzarà per aparellar els registres amb la taula de rols.';
$string['remoteuserfield'] = 'El nom del camp de la taula remota que s\'utilitzarà per aparellar els registres amb la taula d\'usuaris.';
$string['server_settings'] = 'Paràmetres del servidor de bases de dades extern';
$string['student_coursefield'] = 'Nom del camp de la taula d\'inscripcions d\'estudiantat on esperem trobar l\'ID del curs.';
$string['student_l_userfield'] = 'Nom del camp de la taula interna d\'usuaris que s\'utilitzarà per aparellar l\'usuari amb un registre extern d\'estudiants (p. ex. idnumber).';
$string['student_r_userfield'] = 'Nom de la taula externa d\'inscripcions d\'estudiantat on esperem trobar l\'ID de l\'usuari.';
$string['student_table'] = 'Nom de la taula on s\'emmagatzemen les inscripcions d\'estudiantat.';
$string['teacher_coursefield'] = 'Nom de la taula d\'inscripcions de professorat on esperem trobar l\'ID del curs.';
$string['teacher_l_userfield'] = 'Nom del camp de la taula interna d\'usuaris que s\'utilitzarà per aparellar l\'usuari amb un registre extern de professors (p. ex. idnumber).';
$string['teacher_r_userfield'] = 'Nom de la taula externa d\'inscripcions de professorat on esperem trobar l\'ID de l\'usuari.';
$string['teacher_table'] = 'Nom de la taula on s\'emmagatzemen les inscripcions de professorat.';
$string['template'] = 'Opcional: els cursos creats automàticament poden copiar els seus paràmetres de configuració d\'un curs model. Introduïu aquí el nom curt d\'aquest curs model.';
$string['type'] = 'Tipus de servidor de bases de dades.';
$string['user'] = 'Nom d\'usuari per a accedir al servidor.';
$string['local_coursefield'] = 'Nom del camp de la taula de cursos que s\'utilitzarà per aparellar les entrades amb la base de dades externa (p. ex. idnumber).'; // ORPHANED

?>
