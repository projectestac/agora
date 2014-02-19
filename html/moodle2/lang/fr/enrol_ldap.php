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
 * Strings for component 'enrol_ldap', language 'fr', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol_ldap
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['assignrole'] = 'Attribuer le rôle « {$a->role_shortname} » à l\'utilisateur « {$a->user_username} » dans le cours « {$a->course_shortname} » (identifiant {$a->course_id})';
$string['assignrolefailed'] = 'Échec de l\'attribution du rôle « {$a->role_shortname} » à l\'utilisateur « {$a->user_username} » dans le cours « {$a->course_shortname} » (identifiant {$a->course_id})';
$string['autocreate'] = 'Des cours peuvent être créés automatiquement si des inscriptions existent pour un cours qui n\'existe pas encore dans Moodle.';
$string['autocreate_key'] = 'Créer automatiquement';
$string['autocreation_settings'] = 'Réglages de la création automatique de cours';
$string['bind_dn'] = 'Si vous voulez utiliser bind-user pour rechercher des utilisateurs, veuillez le spécifier ici, par exemple sous la forme « cn=ldapuser,ou=public,o=org »';
$string['bind_dn_key'] = 'Nom complet du « Bind user »';
$string['bind_pw'] = 'Mot de passe pour bind-user.';
$string['bind_pw_key'] = 'Mot de passe';
$string['bind_settings'] = 'Réglages bind';
$string['cannotcreatecourse'] = 'Impossible de créer le cours : données requises manquantes dans l\'enregistrement LDAP !';
$string['category'] = 'Catégorie des cours créés automatiquement.';
$string['category_key'] = 'Catégorie';
$string['contexts'] = 'Contextes LDAP';
$string['couldnotfinduser'] = 'Utilisateur « {$a} » introuvable, ignoré';
$string['course_fullname'] = 'Facultatif : champ LDAP d\'où tirer le nom complet du cours.';
$string['course_fullname_key'] = 'Nom complet';
$string['course_idnumber'] = 'Champ correspondant avec l\'identificateur unique LDAP, D\'habitude <em>cn</em> ou <em>uid</em>. On recommande de verrouiller cette valeur lors de l\'utilisation de la création automatique de cours.';
$string['course_idnumber_key'] = 'Identifiant du cours';
$string['coursenotexistskip'] = 'Le cours « {$a} » n\'existe pas et l\'auto-création des cours est désactivée, ignoré';
$string['course_search_sub'] = 'Rechercher les affiliations à des groupes dans les sous-contextes';
$string['course_search_sub_key'] = 'Rechercher dans les sous-contextes';
$string['course_settings'] = 'Réglages de l\'inscription aux cours';
$string['course_shortname'] = 'Facultatif : champ LDAP d\'où tirer le nom abrégé du cours.';
$string['course_shortname_key'] = 'Nom abrégé';
$string['course_summary'] = 'Facultatif : champ LDAP d\'où tirer le résumé du cours.';
$string['course_summary_key'] = 'Résumé';
$string['createcourseextid'] = 'Utilisateur inscrit dans un cours inexistant « {$a->courseextid} »';
$string['createnotcourseextid'] = 'Utilisateur inscrit dans un cours inexistant « {$a->courseextid} »';
$string['creatingcourse'] = 'Création du cours « {$a} »';
$string['duplicateshortname'] = 'La création du cours a échoué, car le nom abrégé du cours existe déjà. Le cours d\'identifiant « {$a->idnumber} » a été ignoré...';
$string['editlock'] = 'Verrouiller la valeur';
$string['emptyenrolment'] = 'Inscription vide pour le rôle « {$a->role_shortname} » dans le cours « {$a->course_shortname} »';
$string['enrolname'] = 'LDAP';
$string['enroluser'] = 'Inscrire l\'utilisateur « {$a->user_username} » dans le cours « {$a->course_shortname} » (id {$a->course_id})';
$string['enroluserenable'] = 'Inscription activée pour l\'utilisateur « {$a->user_username} » dans le cours « {$a->course_shortname} » (id {$a->course_id})';
$string['explodegroupusertypenotsupported'] = 'La fonction ldap_explode_group() ne supporte pas le type d\'utilisateur selectionné : {$a}';
$string['extcourseidinvalid'] = 'L\'identifiant du cours externe n\'est pas valide !';
$string['extremovedsuspend'] = 'Inscription désactivée pour l\'utilisateur « {$a->user_username} » dans le cours « {$a->course_shortname} » (id {$a->course_id})';
$string['extremovedsuspendnoroles'] = 'Inscription désactivée et rôles retirés pour l\'utilisateur « {$a->user_username} » dans le cours « {$a->course_shortname} » (id {$a->course_id})';
$string['extremovedunenrol'] = 'Désinscrire l\'utilisateur « {$a->user_username} » du cours « {$a->course_shortname} » (id {$a->course_id})';
$string['failed'] = 'Échec !';
$string['general_options'] = 'Options générales';
$string['group_memberofattribute'] = 'Nom de l\'attribut spécifiant à quel groupe appartient un utilisateur ou un groupe (par exemple, memberOf, groupMembership, etc.)';
$string['group_memberofattribute_key'] = 'Attribut « Membre de »';
$string['host_url'] = 'Indiquez l\'hôte LDAP en format URL, par exemple « ldap://ldap.myorg.com/ » ou « ldaps://ldap.myorg.com/ »';
$string['host_url_key'] = 'URL du serveur';
$string['idnumber_attribute'] = 'Si l\'affiliation à un groupe contient des noms distingués, indiquez le même attribut que vous avez utilisé pour la correspondance de l\'« ID Number » de l\'utilisateur dans les réglages d\'authentification LDAP';
$string['idnumber_attribute_key'] = 'Attribut « ID Number »';
$string['ldap_encoding'] = 'Indiquez l\'encodage utilisé par le serveur LDAP. Il s\'agit le plus probablement de utf-8. MS Active Directory utilise l\'encodage par défaut de la plateforme, comme cp1252, cp1250, etc.';
$string['ldap_encoding_key'] = 'Encodage LDAP';
$string['ldap:manage'] = 'Gérer les instances d\'inscription LDAP';
$string['memberattribute'] = 'Attribut appartenance LDAP';
$string['memberattribute_isdn'] = 'Si l\'affiliation à un groupe contient des noms distingués, vous devez le spécifier ici. Dans ce cas, vous devez également configurer les réglages restants de cette section.';
$string['memberattribute_isdn_key'] = 'L\'attribut « membre » utilise dn';
$string['nested_groups'] = 'Voulez-vous utiliser les groupes imbriqués (groupes de groupes) pour les inscriptions ?';
$string['nested_groups_key'] = 'Groupes imbriqués';
$string['nested_groups_settings'] = 'Réglages groupes imbriqués';
$string['nosuchrole'] = 'Pas de tel rôle : {$a}';
$string['objectclass'] = 'Classe objectClass utilisée pour la recherche de cours. D\'habitude « posixGroup ».';
$string['objectclass_key'] = 'Classe objet';
$string['ok'] = 'OK';
$string['opt_deref'] = 'Si l\'affiliation à un groupe contient des noms distingués, indiquez comment les alias sont traités durant la recherche. Choisissez l\'une des valeurs suivantes : « Non » (LDAP_DEREF_NEVER) ou « Oui » (LDAP_DEREF_ALWAYS)';
$string['opt_deref_key'] = 'Dé-référencer les alias';
$string['phpldap_noextension'] = '<em>L\'extension LDAP de PHP ne semble pas être présente. Veuillez vous assurer qu\'elle est installée et activée si vous souhaitez utiliser ce plugin d\'inscription.</em>';
$string['pluginname'] = 'Inscriptions LDAP';
$string['pluginname_desc'] = '<p>Vous pouvez utiliser un serveur LDAP pour contrôler les inscriptions aux cours. On suppose que votre arbre LDAP contient des groupes correspondant aux cours, et que chacun de ces groupes/cours contiendra les inscriptions à faire correspondre avec les étudiants.</p>
<p>On suppose que dans LDAP, les cours sont définis comme des groupes, et que chaque groupe comporte plusieurs champs indiquant l\'appartenance (<em>member</em> ou <em>memberUid</em>), contenant un identificateur unique de l\'utilisateur.</p>
<p>Pour pouvoir utiliser les inscriptions par LDAP, les utilisateurs <strong>doivent</strong> avoir un champ idnumber valide. Les groupes LDAP doivent comporter cet idnumber dans le champ définissant l\'appartenance afin que l\'utilisateur soit inscrit à ce cours. Cela fonctionne bien si vous utilisez déjà l\'authentification par LDAP.</p>
<p>Les inscriptions sont mises à jour lors de la connexion de l\'utilisateur. Il est aussi possible de lancer un script pour synchroniser les inscriptions. Voyez pour cela le fichier <em>enrol/ldap/enrol_ldap_sync.php</em>.</p>
<p>Cette extension peut également servir à la création automatique de nouveaux cours lorsque de nouveaux groupes apparaissent dans LDAP.</p>';
$string['pluginnotenabled'] = 'Plugin pas activé !';
$string['role_mapping'] = '<p> Pour chaque rôle que vous souhaitez attribuer à partir de LDAP, vous devez spécifier la liste des contextes où les groupes des rôles du cours sont situés. Séparez les différents contextes avec un point-virgule (;).</p><p> Vous devez également spécifier l\'attribut que votre serveur LDAP utilise pour les membres d\'un groupe. Habituellement « member » ou « memberUid »</p>';
$string['role_mapping_attribute'] = 'Attribut de membre LDAP pour {$a}';
$string['role_mapping_context'] = 'Contextes LDAP pour {$a}';
$string['role_mapping_key'] = 'Faire correspondre les rôles LDAP';
$string['roles'] = 'Correspondance des rôles';
$string['server_settings'] = 'Réglages du serveur LDAP';
$string['synccourserole'] = '== synchronisation du cours « {$a->idnumber} » pour le rôle « {$a->role_shortname} »';
$string['template'] = 'Facultatif : les cours créés automatiquement peuvent copier leurs réglages sur un cours modèle.';
$string['template_key'] = 'Modèle';
$string['unassignrole'] = 'Retrait de l\'attribution du rôle « {$a->role_shortname} » de l\'utilisateur « {$a->user_username} » du cours « {$a->course_shortname} » (id {$a->course_id})';
$string['unassignrolefailed'] = 'Échec du retrait de l\'attribution du rôle « {$a->role_shortname} » de l\'utilisateur « {$a->user_username} » du cours « {$a->course_shortname} » (id {$a->course_id})';
$string['unassignroleid'] = 'Retrait du rôle d\'identifant « {$a->role_id} » de l\'utilisateur d\'identifiant « {$a->user_id} »';
$string['updatelocal'] = 'Mettre à jour les données locales';
$string['user_attribute'] = 'Si l\'affiliation à un groupe contient des noms distingués, indiquez l\'attribut utilisés pour nommer/rechercher les utilisateurs. Si vous utilisez l\'authentification LDAP, cette valeur doit correspondre à l\'attribut spécifié dans la correspondance « ID Number » dans le plugin d\'authentification LDAP';
$string['user_attribute_key'] = 'Attribut ID numérique';
$string['user_contexts'] = 'Si l\'affiliation à un groupe contient des noms distingués, indiquez la liste des contextes où sont situés les utilisateurs. Séparez les différents contextes avec un point-virgule (;). Par exemple : « ou=users,o=org; ou=others,o=org »';
$string['user_contexts_key'] = 'Contextes';
$string['user_search_sub'] = 'Si l\'affiliation à un groupe contient des noms distingués, indiquez si la recherche des utilisateurs est effectuée dans les sous-contextes également';
$string['user_search_sub_key'] = 'Rechercher les sous-contextes';
$string['user_settings'] = 'Réglages de recherche d\'utilisateur';
$string['user_type'] = 'Si l\'affiliation au groupe contient les noms distingués, indiquez comment les utilisateurs sont stockés dans LDAP';
$string['user_type_key'] = 'Type d\'utilisateur';
$string['version'] = 'La version du protocole LDAP qu\'utilise votre serveur.';
$string['version_key'] = 'Version';
