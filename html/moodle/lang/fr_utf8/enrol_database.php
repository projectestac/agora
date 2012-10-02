<?php // $Id$ 

$string['autocreate'] = 'Les cours peuvent être créés automatiquement si des inscriptions ont lieu pour un cours qui n\'existe pas encore dans le Moodle.';
$string['autocreation_settings'] = 'Réglages de création automatique';
$string['category'] = 'Catégorie des cours créés automatiquement';
$string['course_fullname'] = 'Nom du champ dans lequel est stocké le nom du cours.';
$string['course_id'] = 'Nom du champ dans lequel est stocké l\'identifiant du cours. Les valeurs de ce champ sont utilisées pour effectuer la correspondance avec le champ « enrol_db_l_coursefield » de la table « course » de Moodle.';
$string['course_shortname'] = 'Nom du champ dans lequel est stocké le nom abrégé du cours.';
$string['course_table'] = 'Nom de la table où l\'on s\'attend à trouver la description du cours (nom, nom abrégé, identifiant, etc.)';
$string['dbhost'] = 'Adresse IP ou nom de domaine du serveur';
$string['dbname'] = 'Nom de la base de données';
$string['dbpass'] = 'Mot de passe du serveur';
$string['dbtable'] = 'Table de la base de données';
$string['dbtype'] = 'Type de base de données';
$string['dbuser'] = 'Utilisateur du serveur';
$string['defaultcourseroleid'] = 'Rôle devant être attribué par défaut, si aucun autre rôle n\'est spécifié.';
$string['description'] = 'Vous pouvez utiliser une base de données externe (de presque n\'importe quel type) pour contrôler les inscriptions. La base de données externe doit posséder un champ contenant l\'identifiant du cours et un champ contenant l\'identifiant de l\'utilisateur. Ces deux champs sont comparés aux champs que vous choisissez dans les tables locales des cours et des utilisateurs.';
$string['disableunenrol'] = 'En activant ce réglage, vous empêcherez les utilisateurs inscrits à l\'aide de la méthode base de données externe d\'être désinscrits par cette même méthode, indépendamment du contenu de la base de données.';
$string['enrol_database_autocreation_settings'] = 'Création automatique des nouveaux cours';
$string['enrolname'] = 'Base de données externe';
$string['general_options'] = 'Options générales';
$string['host'] = 'Nom d\'hôte du serveur de base de données';
$string['ignorehiddencourse'] = 'Si cette option est activée, les utilisateurs ne seront pas inscrits aux cours non disponibles pour les étudiants.';
$string['local_fields_mapping'] = 'Champs de la BDD Moodle (local)';
$string['localcoursefield'] = 'Nom du champ de la table des cours du Moodle utilisé pour faire correspondre les cours avec la base de données distante (par exemple « idnumber »)';
$string['localrolefield'] = 'Nom du champ de la table des rôles utilisé pour faire correspondre les cours avec la base de données distante (par exemple « shortname »).';
$string['localuserfield'] = 'Nom du champ de la table des utilisateurs utilisé pour faire correspondre les cours avec la base de données distante (par exemple « idnumber »).';
$string['name'] = 'Nom de la base de données';
$string['pass'] = 'Mot de passe pour accéder à la base de données';
$string['remote_fields_mapping'] = 'Champs de la BDD externe';
$string['remotecoursefield'] = 'Nom du champ de la table distante utilisé pour faire la correspondance dans la table des cours.';
$string['remoterolefield'] = 'Nom du champ de la table distante utilisé pour faire la correspondance dans la table des rôles.';
$string['remoteuserfield'] = 'Nom du champ de la table distante utilisé pour faire la correspondance dans la table des utilisateurs.';
$string['server_settings'] = 'Réglages du serveur de BDD externe';
$string['student_coursefield'] = 'Nom du champ de la table d\'inscription des étudiants où trouver l\'identifiant du cours (course ID).';
$string['student_l_userfield'] = 'Nom du champ (de la table des utilisateurs du Moodle) utilisé pour faire correspondre les utilisateurs à un enregistrement de la BDD distante pour étudiants (par exemple « idnumber »).';
$string['student_r_userfield'] = 'Nom du champ (de la table d\'inscription des étudiants de la BDD externe) où trouver l\'identifiant de l\'utilisateur (user ID).';
$string['student_table'] = 'Nom de la table dans laquelle sont stockés les inscriptions des étudiants.';
$string['teacher_coursefield'] = 'Nom du champ de la table d\'inscription des enseignants où trouver l\'identifiant du cours (course ID).';
$string['teacher_l_userfield'] = 'Nom du champ (de la table des utilisateurs du Moodle) utilisé pour faire correspondre les utilisateurs à un enregistrement de la BDD distante pour étudiants (par exemple « idnumber »).';
$string['teacher_r_userfield'] = 'Nom du champ (de la table d\'inscription des enseignants de la BDD externe) où trouver l\'identifiant de l\'utilisateur (user ID).';
$string['teacher_table'] = 'Nom de la table dans laquelle sont stockés les inscriptions des enseignants.';
$string['template'] = 'Facultatif : les cours créés automatiquement peuvent hériter leurs réglages d\'un cours modèle';
$string['type'] = 'Type de serveur de base de données';
$string['user'] = 'Nom d\'utilisateur pour accéder à la base de données';

?>