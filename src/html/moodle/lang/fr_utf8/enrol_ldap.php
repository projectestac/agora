<?php // $Id$ 

$string['description'] = '<p>Vous pouvez utiliser un serveur LDAP pour contrôler les inscriptions aux cours. On suppose que votre arbre LDAP contient des groupes correspondant aux cours, et que chacun de ces groupes/cours contiendra les inscriptions à faire correspondre avec les étudiants.</p>
<p>On suppose que dans LDAP, les cours sont définis comme des groupes, et que chaque groupe comporte plusieurs champs indiquant l\'appartenance (<em>member</em> ou <em>memberUid</em>), contenant un identificateur unique de l\'utilisateur.</p>
<p>Pour pouvoir utiliser les inscriptions par LDAP, les utilisateurs <strong>doivent</strong> avoir un champ idnumber valide. Les groupes LDAP doivent comporter cet idnumber dans le champ définissant l\'appartenance afin que l\'utilisateur soit inscrit à ce cours. Cela fonctionne bien si vous utilisez déjà l\'authentification par LDAP.</p>
<p>Les inscriptions sont mises à jour lors de la connexion de l\'utilisateur. Il est aussi possible de lancer un script pour synchroniser les inscriptions. Voyez pour cela le fichier <em>enrol/ldap/enrol_ldap_sync.php</em>.</p>
<p>Cette extension peut également servir à la création automatique de nouveaux cours lorsque de nouveaux groupes apparaissent dans LDAP.</p>';
$string['enrolname'] = 'LDAP';
$string['enrol_ldap_autocreate'] = 'Des cours peuvent être créés automatiquement si des inscriptions existent pour un cours qui n\'existe pas encore dans Moodle.';
$string['enrol_ldap_autocreation_settings'] = 'Réglages de la création automatique de cours';
$string['enrol_ldap_bind_dn'] = 'Si vous voulez utiliser bind-user pour rechercher des utilisateurs, veuillez le spécifier ici, par exemple sous la forme « cn=ldapuser,ou=public,o=org »';
$string['enrol_ldap_bind_pw'] = 'Mot de passe pour bind-user.';
$string['enrol_ldap_category'] = 'Catégorie des cours créés automatiquement.';
$string['enrol_ldap_contexts'] = 'Contextes LDAP';
$string['enrol_ldap_course_fullname']  = 'Facultatif : champ LDAP d\'où tirer le nom complet du cours.';
$string['enrol_ldap_course_idnumber'] = 'Champ correspondant avec l\'identificateur unique LDAP, D\'habitude <em>cn</em> ou <em>uid</em>. On recommande de verrouiller cette valeur lors de l\'utilisation de la création automatique de cours.';
$string['enrol_ldap_course_settings'] = 'Réglages de l\'inscription aux cours';
$string['enrol_ldap_course_shortname'] = 'Facultatif : champ LDAP d\'où tirer le nom abrégé du cours.';
$string['enrol_ldap_course_summary'] = 'Facultatif : champ LDAP d\'où tirer le résumé du cours.';                                                                                                                                                
$string['enrol_ldap_editlock'] = 'Verrouiller la valeur';
$string['enrol_ldap_general_options'] = 'Options générales';
$string['enrol_ldap_host_url'] = 'Indiquez l\'hôte LDAP en format URL, par exemple « ldap://ldap.myorg.com/ » ou « ldaps://ldap.myorg.com/ »';
$string['enrol_ldap_memberattribute'] = 'Attribut appartenance LDAP';
$string['enrol_ldap_objectclass'] = 'Classe objectClass utilisée pour la recherche de cours. D\'habitude « posixGroup ».';
$string['enrol_ldap_roles'] = 'Correspondance des rôles';
$string['enrol_ldap_search_sub'] = 'Rechercher les affiliations aux groupes à partir des sous-contextes.';
$string['enrol_ldap_server_settings'] = 'Réglages du serveur LDAP';
$string['enrol_ldap_student_contexts'] = 'Liste des contextes où sont placés les groupes contenant les inscriptions des étudiants. Séparez les différents contextes par des « ; ». Par exemple : « ou=courses,o=org; ou=others,o=org »';
$string['enrol_ldap_student_memberattribute'] = 'Nom de l\'attribut d\'appartenance (inscription) d\'un étudiant à un groupe (cours). D\'habitude « member » ou « memberUid ».';
$string['enrol_ldap_student_settings'] = 'Réglages pour l\'inscription des étudiants';
$string['enrol_ldap_teacher_contexts'] = 'Liste des contextes où sont placés les groupes contenant les inscriptions des enseignants. Séparez les différents contextes par des « ; ». Par exemple : « ou=courses,o=org; ou=others,o=org »';
$string['enrol_ldap_teacher_memberattribute'] = 'Nom de l\'attribut d\'appartenance (inscription) d\'un enseignant à un groupe (cours). D\'habitude « member » ou « memberUid ».';
$string['enrol_ldap_teacher_settings'] = 'Réglages pour l\'inscription des enseignants';
$string['enrol_ldap_template'] = 'Facultatif : les cours créés automatiquement peuvent copier leurs réglages sur un cours modèle.';
$string['enrol_ldap_updatelocal'] = 'Mettre à jour les données locales';
$string['enrol_ldap_version'] = 'La version du protocole LDAP qu\'utilise votre serveur.';

?>
