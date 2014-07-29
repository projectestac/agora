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
 * Strings for component 'block_configurable_reports', language 'fr', branch 'MOODLE_26_STABLE'
 *
 * @package   block_configurable_reports
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activitypost'] = 'Affichages de l\'activité';
$string['activityview'] = 'Vues de l\'activité';
$string['addreport'] = 'Ajouter un rapport';
$string['anyone'] = 'Tous';
$string['anyone_summary'] = 'Tous les utilisateurs sur le campus pourront voir ce rapport';
$string['availablemarks'] = 'Marques disponibles';
$string['average'] = 'Moyenne';
$string['badconditionexpr'] = 'Expression logique relative à la condition incorrecte';
$string['badsize'] = 'Dimension incorrecte, devrait être en &#37; ou px';
$string['badtablewidth'] = 'Largeur incorrecte, devrait être en &#37; ou valeur absolue';
$string['blockname'] = 'Rapports personnalisables';
$string['calcs'] = 'Calculs';
$string['categories'] = 'Catégories';
$string['categoryfield'] = 'Champ Catégorie';
$string['categoryfieldorder'] = 'Tri par champ Catégorie';
$string['ccoursefield'] = 'Condition sur le champ Cours';
$string['cellalign'] = 'Alignement de la cellule';
$string['cellsize'] = 'Dimension de la cellule';
$string['cellwrap'] = 'Retour à la ligne automatique de la cellule';
$string['column'] = 'Colonne';
$string['columnandcellproperties'] = 'Propriétés des colonnes et cellules';
$string['columncalculations'] = 'Calculs des colonnes';
$string['columns'] = 'Colonnes';
$string['comp_calcs'] = 'Calculs';
$string['comp_calcs_help'] = '<p>Ici, vous pouvez ajouter les calculs pour les colonnes, c.-à-d. : la moyenne du nombre d\'utilisateurs inscrits aux cours.</p>

<p>Aide supplémentaire : <a href="http://docs.moodle.org/en/blocks/configurable_reports/" target="_blank">Documentation du module d\'extension</a></p>';
$string['comp_calculations'] = 'Calculs';
$string['comp_calculations_help'] = '<p>Ici, vous pouvez ajouter les calculs pour les colonnes, c.-à-d. : la moyenne du nombre d\'utilisateurs inscrits aux cours.</p>';
$string['comp_columns'] = 'Colonnes';
$string['comp_columns_help'] = '<p>Ici, vous pouvez choisir les différentes colonnes de votre rapport en fonction du type de rapport.</p>

<p>Aide supplémentaire : <a href="http://docs.moodle.org/en/blocks/configurable_reports/" target="_blank">Documentation du plugin</a></p>';
$string['comp_conditions'] = 'Conditions';
$string['comp_conditions_help'] = '<p>Ici, vous pouvez définir les conditions (c.-à-d., seulement les cours de cette catégorie, uniquement les utilisateurs originaires de l\'Espagne, etc.). </p>

<p>Vous pouvez ajouter une expression logique si vous appliquez plus d\'une condition.</p>

<p>Aide supplémentaire : <a href="http://docs.moodle.org/en/blocks/configurable_reports/" target="_blank">Documentation du module d\'extension</a></p>';
$string['comp_customsql'] = 'Rapport SQL personnalisé';
$string['comp_customsql_help'] = '<p>Ajouter une requête SQL active. N\'utilisez pas le préfixe de la base de données moodle $CFG->prefix; à la place utilisez "prefix_" sans les guillemets.</p>
<p>Example: SELECT * FROM prefix_course</p>

<p>Vous trouverez beaucoup de rapports SQL sous : <a href="http://docs.moodle.org/en/blocks/configurable_reports/" target="_blank">Rapports ad-hoc contribués</a></p>

<p>Étant donné que ce bloc prend en charge les rapports de requêtes SQL personnalisés de Tim Hunt, vous pouvez utiliser n\'importe quelle requête.</p>

<p>N\'oubliez pas d\'ajouter un « filtre temporel » si vous utilisez les rapports avec des jetons de temps. </p>

<p>Pour l\'utilisation des filtres, voir sous : <a href="http://docs.moodle.org/en/blocks/configurable_reports/#Creating_a_SQL_Report" target="_blank">Créer un tutoriel sur les rapports SQL</a></p>';
$string['comp_filters'] = 'Filtres';
$string['comp_filters_help'] = '<p>Ici, vous pouvez choisir les filtres qui seront affichés.</p>

<p>Un filtre permet à l\'utilisateur de choisir des colonnes du rapport pour filtrer les résultats du rapport.</p>

<p>Pour utiliser les filtres si votre type de rapport est SQL, voir sous : <a href="http://docs.moodle.org/en/blocks/configurable_reports/#Creating_a_SQL_Report" target="_blank">Créer un tutoriel sur les rapports SQL</a></p>

<p>Aide supplémentaire : <a href="http://docs.moodle.org/en/blocks/configurable_reports/" target="_blank">Documentation du module d\'extension</a></p>';
$string['componenthelp'] = 'Aide sur le composant';
$string['comp_ordering'] = 'Tri';
$string['comp_ordering_help'] = '<p>Ici, vous pouvez choisir comment trier le rapport en utilisant des champs et des directions</p>

<p>Aide supplémentaire : <a href="http://docs.moodle.org/en/blocks/configurable_reports/" target="_blank">Documentation du module d\'extension</a></p>';
$string['comp_permissions'] = 'Permissions';
$string['comp_permissions_help'] = '<p>Ici, vous pouvez choisir la ou les personnes qui seront autorisées à voir le rapport.</p>

<p>Vous pouvez ajouter une expression logique pour calculer la permission finale si vous appliquez plus d\'une condition.</p>

<p>Aide supplémentaire : <a href="http://docs.moodle.org/en/blocks/configurable_reports/" target="_blank">Documentation du module d\'extension</a></p>';
$string['comp_plot'] = 'Tracer - Graphiques';
$string['comp_plot_help'] = '<p>Ici, vous pouvez ajouter des graphiques à votre rapport en fonction des colonnes et des valeurs relatives au rapport.</p>

<p>Aide supplémentaire : <a href="http://docs.moodle.org/en/blocks/configurable_reports/" target="_blank">Documentation du module d\'extension</a></p>';
$string['comp_template'] = 'Modèle';
$string['comp_template_help'] = '<p>Vous pouvez modifier la configuration du rapport en créant un modèle.</p>

<p>Pour créer un modèle, considérez les marques de remplacement que vous pouvez utiliser dans l\'en-tête, le bas de page et pour chaque enregistrement dans le rapport, à l\'aide des boutons d\'aide ou de l\'information affichée sur la même page.</p>

<p>Aide supplémentaire : <a href="http://docs.moodle.org/en/blocks/configurable_reports/" target="_blank">Documentation du module d\'extension</a></p>';
$string['conditionexpr'] = 'Conditions';
$string['conditionexpr_conditions'] = 'Conditions';
$string['conditionexpr_conditions_help'] = '<p>Vous pouvez combiner les conditions en utilisant une expression logique</p>

<p>Entrez une expression logique valide avec ces opérateurs : and, or.</p>';
$string['conditionexprhelp'] = 'Fournir une condition valide, par ex. : (c1 and c2) or (c4 and c3)';
$string['conditionexpr_permissions'] = 'Conditions';
$string['conditionexpr_permissions_help'] = '<p>Vous pouvez combiner les conditions en utilisant une expression logique.</p>

<p>Entrez une expression logique valide avec ces opérateurs : et, ou.</p>';
$string['conditions'] = 'Conditions';
$string['configurable_reports:addinstance'] = 'Ajouter un bloc Rapports personnalisables';
$string['configurable_reports:manageownreports'] = 'Gérer ses propres rapports';
$string['configurable_reports:managereports'] = 'Gérer les rapports';
$string['configurable_reports:managesqlreports'] = 'Gérer les rapports SQL';
$string['configurable_reports:viewreports'] = 'Afficher les rapports';
$string['confirmdeletereport'] = 'Voulez-vous vraiment supprimer ce rapport ?';
$string['coursecategories'] = 'Filtre de catégorie de cours';
$string['coursecategory'] = 'Cours dans la catégorie';
$string['coursechild'] = 'Cours qui sont les enfants de';
$string['coursededicationtime'] = 'Temps affecté au cours';
$string['coursefield'] = 'Champ Cours';
$string['coursefieldorder'] = 'Tri par le champ Cours';
$string['courseparent'] = 'Cours dont le parent est';
$string['courses'] = 'Cours';
$string['coursestats'] = 'Statistiques relatives aux cours';
$string['cron'] = 'Lancer automatiquement chaque jour';
$string['crondescription'] = 'Planifier le lancement de cette requête chaque jour (la nuit)';
$string['cron_help'] = 'Planifier le lancement de cette requête chaque jour (la nuit)';
$string['crrepository'] = 'Dépôt de rapports';
$string['currentreportcourse'] = 'Rapport de cours courant';
$string['currentreportcourse_summary'] = 'Cours pour lequel le rapport a été créé';
$string['currentuser'] = 'Utilisateur courant';
$string['currentusercourses'] = 'Cours auxquels l\'utilisateur courant est inscrit';
$string['currentusercourses_summary'] = 'Liste des cours auxquels l\'utilisateur courant est inscrit (seulement les cours visibles)';
$string['currentuserfinalgrade'] = 'Note finale du cours pour l\'utilisateur courant';
$string['currentuserfinalgrade_summary'] = 'Cette colonne affiche la note finale de l\'utilisateur courant dans la rangée du cours';
$string['currentuser_summary'] = 'L\'utilisateur qui consulte le rapport';
$string['cuserfield'] = 'Condition appliquée à un champ Utilisateur';
$string['custom'] = 'Personnalisé';
$string['customdateformat'] = 'Format de date personnalisé';
$string['customsql'] = 'Rapport SQL personnalisé';
$string['datatables'] = 'Autoriser la librairie JS DataTables';
$string['datatablesinfo'] = 'Librairie JS DataTables (tri des colonnes, entête fixe, recherche, pagination...)';
$string['date'] = 'Date';
$string['dateformat'] = 'Format de la date';
$string['dbhost'] = 'Hôte BDD';
$string['dbhostinfo'] = 'Nom d\'hôte de la base de données externe (sur laquelle les requêtes SQL seront exécutées)';
$string['dbname'] = 'Nom BDD';
$string['dbnameinfo'] = 'Nom de la base de données (sur laquelle les requêtes SQL seront exécutées) sur la base de données externe';
$string['dbpass'] = 'Mot de passe BDD';
$string['dbpassinfo'] = 'Mot de passe (de cet utilisateur) sur la base de données externe';
$string['dbuser'] = 'Nom utilisateur BDD';
$string['dbuserinfo'] = 'Nom d\'utilisateur de la base de données externe (il faut les privilèges SELECT sur cette BDD)';
$string['direction'] = 'Direction';
$string['disabled'] = 'Désactivé';
$string['displayglobalreports'] = 'Afficher les rapports globaux';
$string['displayreportslist'] = 'Afficher la liste des rapports au sein du bloc';
$string['donotshowtime'] = 'Ne pas afficher l\'information relative à la date';
$string['download'] = 'Télécharger';
$string['downloadreport'] = 'Télécharger le rapport';
$string['email_message'] = 'Message';
$string['email_send'] = 'Envoyer';
$string['email_subject'] = 'Sujet';
$string['enabled'] = 'Activé';
$string['enableglobal'] = 'Ceci est un rapport global (accessible depuis n\'importe quel cours)';
$string['enablejsordering'] = 'Activer le tri de JavaScript';
$string['enablejspagination'] = 'Activer la pagination de JavaScript';
$string['endtime'] = 'Date de fin';
$string['enrolledstudents'] = 'Étudiants inscrits';
$string['error_field'] = 'Champ non autorisé';
$string['error_operator'] = 'Opérateur non autorisé';
$string['error_value_expected_integer'] = 'Valeur entière prévue';
$string['executeat'] = 'Exécuter à';
$string['executeatinfo'] = 'Le Cron Moodle lancera les requêtes SQL planifiées après l\'heure sélectionnée. Une fois par 24h.';
$string['export_csv'] = 'Exporter au format CSV';
$string['export_ods'] = 'Exporter en format ODS';
$string['exportoptions'] = 'Options d\'exportation';
$string['exportreport'] = 'Exporter le rapport';
$string['export_xls'] = 'Exporter en format XLS';
$string['fcoursefield'] = 'Filtre du champ Cours';
$string['field'] = 'Champ';
$string['filter'] = 'Filtre';
$string['filter_all'] = 'Tout';
$string['filter_apply'] = 'Appliquer';
$string['filtercategories'] = 'Filtre des catégories';
$string['filtercategories_summary'] = 'Filtrer par catégorie';
$string['filtercoursecategories'] = 'Filtre de catégorie de cours';
$string['filtercourses'] = 'Cours';
$string['filtercourses_summary'] = 'Ce filtre propose une liste de cours. Un seul cours à la fois peut être sélectionné.';
$string['filterrole'] = 'rôle';
$string['filters'] = 'Filtres';
$string['filtersemester'] = 'Semestre (Hébreu)';
$string['filterstartendtime_summary'] = 'Filtre date de début ou de fin';
$string['filtersubcategories'] = 'Catégorie (incluant les sous catégories)';
$string['filteryearhebrew'] = 'Année (Hébreu)';
$string['filteryearnumeric'] = 'Année (numérique)';
$string['filteryearnumeric_summary'] = 'Le filtre utilise des années numériques (2013...)';
$string['filteryears'] = 'Année (numérique)';
$string['filteryears_list'] = '2010,2011,2012,2013,2014,2015';
$string['filteryears_summary'] = 'Filtrer par années (représentation numérique : 2013...)';
$string['fixeddate'] = 'Date fixes';
$string['footer'] = 'Bas de page';
$string['forcemidnight'] = 'Forcer plage horaire à minuit';
$string['fuserfield'] = 'Filtre du champ Utilisateur';
$string['global'] = 'Rapport global';
$string['globalstatsshouldbeenabled'] = 'Les statistiques relatives au site doivent être activées. Aller à Admin. -> Serveur -> Statistiques';
$string['groupseries'] = 'Grouper séries';
$string['groupvalues'] = 'Groupe de mêmes valeurs (somme)';
$string['header'] = 'En-tête';
$string['importfromrepository'] = 'Importer le rapport depuis le dépôt';
$string['importreport'] = 'Importer le rapport';
$string['includesubcats'] = 'Inclure les sous-catégories';
$string['jsordering'] = 'Tri JavaScript';
$string['jsordering_help'] = 'La fonction de tri de JavaScript vous permet de trier le tableau du rapport sans avoir à recharger la page';
$string['lastexecutiontime'] = 'Temps d\'exécution = {$a} (Sec)';
$string['line'] = 'Graphique linéaire';
$string['linesummary'] = 'Un graphique linéaire avec plusieurs séries de données';
$string['listofsqlreports'] = '<a href="http://docs.moodle.org/en/ad-hoc_contributed_reports" target="_blank">Liste des rapports SQL contribués</a>';
$string['managereports'] = 'Gérer les rapports';
$string['max'] = 'Maximum';
$string['min'] = 'Minimum';
$string['missingcolumn'] = 'Une colonne est requise';
$string['module'] = 'Module';
$string['newreport'] = 'Nouveau rapport';
$string['nocalcsyet'] = 'Aucun calcul';
$string['nocolumnsyet'] = 'Aucune colonne';
$string['noconditionsyet'] = 'Aucune condition';
$string['noexplicitprefix'] = 'Pas de préfixe explicite';
$string['nofiltersyet'] = 'Aucun filtre';
$string['nofilteryet'] = 'Aucun filtre';
$string['noorderingyet'] = 'Aucun tri';
$string['nopermissionsyet'] = 'Aucune permission';
$string['noplotyet'] = 'Aucun tracé';
$string['norecordsfound'] = 'Aucun enregistrement trouvé';
$string['noreportsavailable'] = 'Aucun rapport disponible';
$string['norowsreturned'] = 'Pas de lignes renvoyées';
$string['nosemicolon'] = 'Pas de point-virgule';
$string['notallowedwords'] = 'Mots non autorisés';
$string['operator'] = 'Opérateur';
$string['ordering'] = 'Tri';
$string['pagination'] = 'Pagination';
$string['pagination_help'] = 'Nombre d\'enregistrements à afficher par page. Zéro signifie qu\'il n\'y a pas de pagination';
$string['parentcategory'] = 'Catégorie parente';
$string['permissions'] = 'Permissions';
$string['pie'] = 'Graphique circulaire';
$string['pieareaname'] = 'Nom';
$string['pieareavalue'] = 'Valeur';
$string['piesummary'] = 'Un graphique circulaire';
$string['plot'] = 'Tracer - Graphiques';
$string['pluginname'] = 'Rapports personnalisables';
$string['previousdays'] = 'Jours précédents';
$string['previousend'] = 'Date de fin précédente';
$string['previousstart'] = 'Date de début précédente';
$string['printreport'] = 'Imprimer le rapport';
$string['puserfield'] = 'Valeur du champ Utilisateur';
$string['puserfield_summary'] = 'Utilisateur avec la valeur sélectionnée dans le champ sélectionné';
$string['queryfailed'] = 'Échec de la requête';
$string['querysql'] = 'Requête SQL';
$string['remotequerysql'] = 'Requête SQL';
$string['report'] = 'Rapport';
$string['reportcategories'] = '1) Choisissez une catégorie de rapports distant';
$string['report_categories'] = 'Rapport de catégories';
$string['reportcolumn'] = 'Colonne Autre rapport';
$string['report_courses'] = 'Rapport sur les cours';
$string['reportcreated'] = 'Rapport correctement créé';
$string['reports'] = 'Rapports';
$string['reportscapabilities'] = 'Capacités du rapport';
$string['reportscapabilities_summary'] = 'Utilisateurs avec la capacité <i>moodle/site:viewreports</i> activée';
$string['reportsincategory'] = '2) Choisissez un rapport dans la liste';
$string['report_sql'] = 'Rapport SQL';
$string['reporttable'] = 'Tableau du rapport';
$string['reporttable_help'] = '<p>Il s\'agit de la largeur du tableau qui affiche les enregistrements du rapport.</p>

<p>Si vous utilisez un modèle, cette option n\'a pas d\'effet.</p>';
$string['report_timeline'] = 'Rapport de la ligne du temps';
$string['report_users'] = 'Rapport sur les utilisateurs';
$string['repository'] = 'Dépôt de rapports';
$string['role'] = 'Rôle';
$string['roleincourse'] = 'Utilisateurs avec les rôles sélectionnés dans le rapport de cours courant';
$string['roleusersn'] = 'Nombre d\'utilisateurs avec le rôle...';
$string['semester'] = 'Semestre (Hébreu)';
$string['serieid'] = 'Colonne de la série';
$string['sharedsqlrepository'] = 'Dépôt SQL partagé';
$string['sharedsqlrepositoryinfo'] = 'Nom du compte GitHub + "/" + nom du dépôt';
$string['sqlsecurity'] = 'Sécurité SQL';
$string['sqlsecurityinfo'] = 'Désactiver pour exécuter des requêtes SQL permettant d\'insérer des données (Nom du compte GitHub + "/" + nom du dépôt)';
$string['startendtime'] = 'Filtre date de début ou de fin';
$string['starttime'] = 'Date de début';
$string['stat'] = 'Statistiques';
$string['statsactiveenrolments'] = 'Inscriptions actives (dernière semaine)';
$string['statslogins'] = 'Connexion à la plateforme';
$string['statstotalenrolments'] = 'Nombre total d\'inscriptions';
$string['student'] = 'Étudiant';
$string['subcategories'] = 'Catégorie (incluant les sous catégories)';
$string['sum'] = 'Somme';
$string['tablealign'] = 'Alignement du tableau';
$string['tablecellpadding'] = 'Remplissage des cellules';
$string['tablecellspacing'] = 'Espacement des cellules';
$string['tableclass'] = 'Classe du tableau';
$string['tablewidth'] = 'Largeur du tableau';
$string['template'] = 'Modèle';
$string['template_marks'] = 'Marques du modèle';
$string['template_marks_help'] = '<p>Vous pouvez utiliser n\'importe laquelle de ces marques de remplacement :</p>

<ul>
<li>##reportname## - Pour inclure le nom du rapport</li>
<li>##reportsummary## - Pour inclure le rapport sommaire</li>
<li>##graphs## - Pour inclure les graphiques</li>
<li>##exportoptions## - Pour inclure les options d\'exportation</li>
<li>##calculationstable## - Pour inclure la table des calculs</li>
<li>##pagination## - Pour inclure la pagination</li>

</ul>';
$string['templaterecord'] = 'Enregistrer le modèle';
$string['timeinterval'] = 'Intervalle de temps';
$string['timeline'] = 'Ligne du temps';
$string['timemode'] = 'Mode sélection ligne du temps';
$string['totalrecords'] = 'Nombre total d\'enregistrements = {$a->totalrecords}';
$string['type'] = 'Type de rapport';
$string['typeofreport'] = 'Type de rapport';
$string['typeofreport_help'] = 'Choisissez le type de rapport que vous voulez créer.
Par sécurité, le rapport SQL nécessite une capacité supplémentaire';
$string['userfield'] = 'Champ de profil d\'utilisateur';
$string['userfieldorder'] = 'Tri par champ utilisateur';
$string['usermodactions'] = 'Actions de l\'utilisateur';
$string['usermodoutline'] = 'Statistiques d\'utilisation du module';
$string['usersincohorts'] = 'Utilisateurs membres d\'une cohorte (ou plusieurs)';
$string['usersincohorts_summary'] = 'Uniquement les utilisateurs membres des cohortes sélectionnées';
$string['usersincoursereport'] = 'Tout utilisateur dans le rapport de cours courant';
$string['usersincoursereport_summary'] = 'Tout utilisateur dans le rapport de cours actuel';
$string['usersincurrentcourse'] = 'Utilisateurs du rapport de cours courant';
$string['usersincurrentcourse_summary'] = 'Utilisateurs avec les rôles sélectionnés dans le rapport de cours';
$string['userstats'] = 'Statistiques de l\'utilisateur';
$string['value'] = 'Valeur';
$string['viewreport'] = 'Afficher le rapport';
$string['xaxis'] = 'Axe des x';
$string['yaxis'] = 'Axe des y';
$string['yearhebrew'] = 'Année (Hébreu)';
$string['yearnumeric'] = 'Année (Numérique)';
$string['years'] = 'Année (Numérique)';
$string['youmustselectarole'] = 'Au moins un rôle est requis';
