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
 * Strings for component 'scheduler', language 'fr', branch 'MOODLE_26_STABLE'
 *
 * @package   scheduler
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['action'] = 'Action';
$string['addappointment'] = 'Ajouter un autre étudiant';
$string['addondays'] = 'Ajouter des rendez-vous';
$string['addscheduled'] = 'Ajouter un étudiant au rendez-vous';
$string['addscheduled_help'] = '<h3>Ajouter un entretien </h3>
<p>En utilisant ce lien, vous ajouterez un utilisateur à la liste de rendez-vous définie par l\'information de ce créneau. Cela peut être un moyen simple et rapide d\'attribuer un rendez-vous collectif. </p>';
$string['addsession'] = 'Ajouter des créneaux';
$string['addsingleslot'] = 'Ajouter un créneau';
$string['addslot'] = 'Vous pouvez ajouter des tranches horaires à tout moment.';
$string['addstudenttogroup'] = 'Ajouter un étudiant au groupe';
$string['allappointments'] = 'Tous les rendez-vous';
$string['allowgroup'] = 'Créneau exclusif - cliquer pour changer';
$string['allslotsincloseddays'] = 'Tous les créneaux sont dans des jours invalidés';
$string['allteachersgrading'] = 'Les enseignants peuvent noter tous les entretiens';
$string['allteachersgrading_desc'] = 'Si cette option est activée, les enseignants peuvent noter des travaux de créneaux attribués à d\'autres enseignants.';
$string['alreadyappointed'] = 'Impossible de fixer un entretien. Le créneau est déjà plein.';
$string['appointagroup'] = 'Rendez-vous de groupe';
$string['appointagroup_help'] = 'Choisir si vous voulez prendre rendez-vous pour vous seul ou pour un groupe entier.';
$string['appointfor'] = 'Prendre rendez-vous pour';
$string['appointformygroup'] = 'Prendre rendez-vous pour mon groupe entier';
$string['appointingstudent'] = 'Ajouter un rendez-vous';
$string['appointingstudentinnew'] = 'Ajouter un rendez-vous';
$string['appointmentmode'] = 'Option sur le mode de rendez-vous';
$string['appointmentmode_help'] = '<p>Vous pouvez choisir ici des variantes sur la façon dont les rendez-vous peuvent être pris. </p>
<p><ul>
<li><b>Mode «&nbsp;Un seul rendez-vous&nbsp;»&nbsp;:</b> L\'étudiant ne peut prendre qu\'un seul rendez-vous dans ce module. Une fois qu\'il a été reçu par l\'enseignant, il ne sera plus autorisé à choisir aucun nouveau rendez-vous plus tard. Le seul moyen de lui permettre de choisir un rendez-vous à nouveau, est d\'effacer l\'ancien enregistrement «&nbsp;Vue&nbsp;».</li>
<li><b>Mode «&nbsp;Un seul à la fois&nbsp;»&nbsp;:</b> L\'étudiant peut choisir une seule date (future). Une fois la rencontre terminée, il peut de nouveau prendre un rendez-vous. Ce mode est utile pour arbitrer des rendez-vous dans un projet sur le long terme, spécialement quand de multiples phases de rendez-vous sont offertes.</li>
</ul>
</p>';
$string['appointmentno'] = 'Séance {$a}';
$string['appointmentnotes'] = 'Notes de séance';
$string['appointments'] = 'Réservations';
$string['appointsolo'] = 'moi seulement';
$string['appointsomeone'] = 'Ajouter un étudiant';
$string['attendable'] = 'Elèves potentiels';
$string['attendablelbl'] = 'Nombre d\'élèves total pouvant être reçus';
$string['attended'] = 'Elèves reçus';
$string['attendedlbl'] = 'Nombre d\'élèves total ayant été reçus';
$string['attendedslots'] = 'Créneaux soutenus';
$string['availableslots'] = 'Créneaux ouverts';
$string['availableslotsall'] = 'Tous les créneaux';
$string['availableslotsnotowned'] = 'Au nom des autres';
$string['availableslotsowned'] = 'Pour soi-même';
$string['bookwithteacher'] = 'Interlocuteur';
$string['bookwithteacher_help'] = 'Choisir un enseignant pour le rendez-vous.';
$string['break'] = 'Pause entre les créneaux';
$string['breaknotnegative'] = 'La durée de la pause ne peut pas être négative';
$string['cancelledbystudent'] = '{$a} : Rendez-vous annulé ou déplacé par un étudiant';
$string['cancelledbyteacher'] = '{$a} : Rendez-vous annulé par votre professeur';
$string['choice'] = 'Choix';
$string['chooseexisting'] = 'Choisir un créneau existant';
$string['choosingslotstart'] = 'Choisir le début';
$string['choosingslotstart_help'] = 'Changer (ou choisir) l\'heure de début du rendez-vous. Si ce rendez-vous est en conflit avec d\'autres créneaux, il vous sera demandé
si ce créneau remplace les rendez-vous avec lesquels il est en conflit. Notez que les paramètres du nouveau créneau va prendre le pas sur les paramètres précédents.';
$string['comments'] = 'Commentaires';
$string['complete'] = 'Complet';
$string['composeemail'] = 'Composer un courriel&nbsp;:';
$string['confirmdelete'] = 'Vous ne pourrez plus annuler la suppression. Continuer ?';
$string['conflictingslots'] = 'Il y a des tranches horaires incompatibles :<br/>';
$string['course'] = 'Cours';
$string['csvencoding'] = 'Encodage texte du fichier';
$string['csvfieldseparator'] = 'Séparateur de champs csv';
$string['csvparms'] = 'Paramètres csv';
$string['csvrecordseparator'] = 'Séparateur d\'enregistrements csv';
$string['cumulatedduration'] = 'Durée cumulée des rendez-vous';
$string['date'] = 'Date';
$string['datelist'] = 'Synthèse';
$string['defaultslotduration'] = 'Durée du créneau par défaut';
$string['defaultslotduration_help'] = 'La durée par défaut (en minutes) pour les créneaux que vous ajoutez.';
$string['deleteallslots'] = 'Tous les créneaux';
$string['deleteallunusedslots'] = 'Tous les créneaux non utilisés';
$string['deletemyslots'] = 'Tous mes propres créneaux';
$string['deleteselection'] = 'Supprimer la sélection de créneaux';
$string['deletetheseslots'] = 'Supprimer ces créneaux';
$string['deleteunusedslots'] = 'Mes créneaux non utilisés';
$string['department'] = 'D\'où ?';
$string['disengage'] = 'Annuler mes rendez-vous';
$string['displayfrom'] = 'Afficher le rendez-vous aux étudiants à partir de';
$string['distributetoslot'] = 'Distribuer à tout le groupe';
$string['divide'] = 'Diviser en tranches&nbsp;?';
$string['dontforgetsaveadvice'] = 'Vous avez modifié la liste temporaire des rendez-vous. N\'oubliez pas de sauvegarder ce formulaire pour enregistrer définitivement les modifications';
$string['downloadexcel'] = 'Exports vers Excel';
$string['downloads'] = 'Exports';
$string['duration'] = 'Durée';
$string['durationrange'] = 'La durée d\'un créneau doit se trouver entre {$a->min} et {$a->max} minutes.';
$string['email_applied_html'] = '<p>Un rendez-vous a été pris le {$a->date} à {$a->time},<br/>
par l\'étudiant <a href="{$a->attendee_url}">{$a->attendee}</a> pour le cours :

<p>{$a->course_short}: <a href="{$a->course_url}">{$a->course}</a></p>

<p>dans le planning de "<i>{$a->module}</i>" sur le site : <a href="{$a->site_url}">{$a->site}</a>.</p>';
$string['email_applied_plain'] = 'Un rendez-vous a été pris le {$a->date} à {$a->time},
par l\'étudiant {$a->attendee} pour le cours :

{$a->course_short}: {$a->course}

dans le planning de "{$a->module}" sur le site : {$a->site}.';
$string['email_applied_subject'] = '{$a->course_short}: Nouveau rendez-vous';
$string['email_cancelled_html'] = '<p>Votre rendez-vous du <b>{$a->date}</b> à <b>{$a->time}</b>,<br/>
avec l\'étudiant <b><a href="{$a->attendee_url}">{$a->attendee}</a></b> pour le cours&nbsp;:</p>

<p><b>{$a->course_short}&nbsp;: <a href="{$a->course_url}">{$a->course}</a></b></p>

<p>dans le planning de «&nbsp;<i>{$a->module}</i>&nbsp;» sur le site&nbsp;: <b><a href="{$a->site_url}">{$a->site}</a></b></p>

<p><b><span style="color: red">a été annulé ou déplacé</span></b>.</p>';
$string['email_cancelled_plain'] = 'Votre rendez-vous du {$a->date} à {$a->time},
avec l\'étudiant {$a->attendee} pour le cours&nbsp;:

{$a->course_short}&nbsp;: {$a->course}

dans le planning de «&nbsp;{$a->module}&nbsp;» sur le site&nbsp;: {$a->site}

a été annulé ou déplacé.';
$string['email_cancelled_subject'] = '{$a->course_short}: Rendez-vous annulé ou déplacé par un étudiant';
$string['emailreminder'] = 'Rappel par courriel';
$string['email_reminder_html'] = '<p>Vous avez un rendez-vous prévu prochainement le <b>{$a->date}</b>
de <b>{$a->time}</b> à <b>{$a->endtime}</b><br/>
avec <b><a href="{$a->attendant_url}">{$a->attendant}</a></b>.</p>

<p>Lieu : <b>{$a->location}</b></p>';
$string['emailreminderondate'] = 'Envoyer un rappel le';
$string['email_reminder_plain'] = 'Vous avez un rendez-vous prévu prochainement
le {$a->date} de {$a->time} à {$a->endtime}
avec {$a->attendant}.

Lieu : {$a->location}';
$string['email_reminder_subject'] = '{$a->course_short}: Rappel de rendez-vous';
$string['email_teachercancelled_html'] = '<p>Votre rendez-vous du <b>{$a->date}</b> à <b>{$a->time} </b>,<br/>
avec le {$a->staffrole} <b><a href="{$a->attendant_url}">{$a->attendant}</a></b> pour le cours&nbsp;:</p>

<p><b>{$a->course_short}&nbsp;: <a href="{$a->course_url}">{$a->course}</a></b></p>

<p>dans le planning «&nbsp;<i>{$a->module}</i>&nbsp;» sur le site&nbsp;: <b><a href="{$a->site_url}">{$a->site}</a></b></p>

<p><b><span style="color : red">a été annulé</span></b>. Veuillez choisir un nouveau créneau, s\'il vous plait.</p>';
$string['email_teachercancelled_plain'] = 'Votre rendez-vous du {$a->date} à {$a->time},
avec le {$a->staffrole} {$a->attendant} pour le cours&nbsp;:

{$a->course_short}&nbsp;: {$a->course}

dans le planning intitulé «&nbsp;{$a->module}&nbsp;» sur le site&nbsp;: {$a->site}

a été annulé. Veuillez choisir un nouveau créneau, s\'il vous plait.';
$string['email_teachercancelled_subject'] = '{$a->course_short}: Rendez-vous annulé par l\'enseignant';
$string['end'] = 'Fin';
$string['enddate'] = 'Répéter le créneau jusqu\'à';
$string['endtime'] = 'Heure de fin';
$string['exclusive'] = 'Exclusif';
$string['exclusivity'] = 'Exclusivitée';
$string['exclusivity_help'] = '<p>Vous pouvez fixer un nombre de places limité pour une plage horaire donnée.</p>
<p>Fixer la limite à 1 (par défaut) fera basculer la plage horaire en mode exclusif.</p>
<p>Si on fixe la plage horaire à un nombre illimité (0), elle ne sera jamais prise en compte dans l’évaluation des contraintes, même si d’autres plages horaires sont exclusives ou limitées dans la même période de temps.</p>';
$string['exclusivitylockedto'] = 'Vous ne pouvez pas changer le mode du créneau lors d\'une planification. La limite du créneau de destination s\'appliquera. si le créneau est nouveau, une limite de 1 sera appliquée par défaut.';
$string['exclusivityoverload'] = 'Le créneau possède {$a} étudiants inscrits, ce qui est plus que la valeur permise par ce paramètre.';
$string['explaingeneralconfig'] = 'Ces options sont réglables au niveau site et sont applicables à tous les Rendez-vous actifs sur cette plate-forme.';
$string['exportinstructions'] = 'De préférence, enregistrez le fichier exporté sur votre disque dur avant de l\'exploiter.';
$string['finalgrade'] = 'Note de l\'activité';
$string['firstslotavailable'] = 'Le premier créneau pour réserver sera ouvert le :';
$string['for'] = 'pour';
$string['forbidgroup'] = 'Créneau de groupe - cliquer pour changer';
$string['forcewhenoverlap'] = 'Forcer si recouvrements';
$string['forcewhenoverlap_help'] = '<p>Cette fonction permet de forcer l’ajout de plages horaires lorsque la séance entre en conflit avec d’autres. Dans ce cas, seules les plages horaires adéquates seront ajoutées. Les conflits seront ignorés.</p>
<p>Si la fonction n’est pas activée, la détection de tout chevauchement interrompra le processus d’ajout. Pour qu’il reprenne, on vous demandera d’abord de supprimer les plages horaires précédentes.</p>';
$string['forcourses'] = 'Cours concernés';
$string['friday'] = 'Vendredi';
$string['generalconfig'] = 'Configuration générale';
$string['grade'] = 'Note';
$string['gradingstrategy'] = 'Stratégie de notation';
$string['gradingstrategy_help'] = 'Dans un planning où les étudiants peuvent avoir plusieurs entretiens, choisissez comment la notation doit être affichée.<br/> Le carnet de notes peut afficher soit <ul><li>la note moyenne ou</li><li>la note maximale</li></ul> que l\'étudiant a reçue.';
$string['group'] = 'groupe';
$string['groupbreakdown'] = 'Par taille de groupe';
$string['groupscheduling'] = 'Autoriser les rendez-vous collectifs';
$string['groupscheduling_desc'] = 'Permet à des groupes entiers d\'être en rendez-vous d\'un coup.
(En plus de l\'option globale, l\'option de groupe de l\'activité doit être «&nbsp;Groupes visibles&nbsp;» ou «&nbsp;Groupes séparés&nbsp;» pour activer cette fonctionnalité.)';
$string['groupsession'] = 'Rendez-vous collectif';
$string['groupsize'] = 'Taille du groupe';
$string['guestscantdoanything'] = 'Les invités ne peuvent pas utiliser cette activité.';
$string['howtoaddstudents'] = 'Pour ajouter des étudiants à un planificateur global, utilisez le réglage des rôles du module.<br/>Vous pouvez également définir par les rôles les personnes qui pourront accueillir vos étudiants.';
$string['ignoreconflicts'] = 'Ignorer les conflits de plannings';
$string['ignoreconflicts_help'] = 'Si cette case est cochée, alors le créneau sera déplacé à la date et l\'heure demandées, même si d\'autres créneaux existent au même moment.
Cela peut provoquer des chevauchements d\'entretiens pour certains enseignants ou étudiants, et doit donc être utilisé avec précaution.';
$string['incourse'] = 'dans le cours';
$string['introduction'] = 'Introduction';
$string['invitation'] = 'Invitation';
$string['invitationtext'] = 'Veuillez choisir une tranche horaire pour un rendez-vous ici :';
$string['isnonexclusive'] = 'Non exclusif';
$string['lengthbreakdown'] = 'Par longueur de créneau';
$string['limited'] = 'Limité (reste {$a})';
$string['location'] = 'Lieu';
$string['location_help'] = 'Spécifier le lieu prévu pour le rendez-vous.';
$string['markasseennow'] = 'Marquer comme lu maintenant';
$string['markseen'] = 'Après le rendez-vous avec un étudiant, veuillez le marquer comme «&nbsp;Vu&nbsp;» en cochant la case adéquate dans le tableau ci-dessus.';
$string['maxgrade'] = 'Prendre la plus haute des notes';
$string['maxstudentlistsize'] = 'Taille maximum de la liste des étudiants';
$string['maxstudentlistsize_desc'] = 'La taille maximum de la liste d\'étudiants qui doivent prendre un rendez-vous, affichée dans la vue Enseignant. S\'il y a plus d\'étudiants que cela, aucune liste ne sera affichée.';
$string['maxstudentsperslot'] = 'Nombre maximum d\'étudiants par créneau';
$string['maxstudentsperslot_desc'] = 'Les créneaux de groupes / les groupes non-exclusif peuvent contenir au plus ce nombre d\'étudiant. Notez, en outre, que le paramètre «&nbsp;illimité&nbsp;» peut toujours être défini pour un créneau en particulier.';
$string['meangrade'] = 'Prendre la moyenne des notes';
$string['meetingwith'] = 'Rendez-vous avec votre';
$string['meetingwithplural'] = 'Rendez-vous avec vos';
$string['mins'] = 'minutes';
$string['minutes'] = 'minutes';
$string['minutesperslot'] = 'minutes par tranche';
$string['missingstudents'] = '{$a} étudiant(s) doivent encore prendre rendez-vous';
$string['missingstudentsmany'] = '{$a} étudiant(s) doivent encore prendre rendez-vous. La liste n\'est pas affichée à cause de sa taille trop importante.';
$string['mode'] = 'Mode';
$string['modulename'] = 'Rendez-vous';
$string['modulename_help'] = 'L\'activité Rendez-vous a pour but de vous aider à programmer des entretiens avec vos étudiants.

Les enseignants spécifient des créneaux horaires pour les entretiens, crénaux que les étudiants choisissent alors sur Moodle.
Les enseignants peuvent en retour enregistrer le résultat de l\'entretien - et, de façon optionnelle, une note - dans le planning.

Il est possible de faire un planning de groupe ; c\'est à dire, chaque créneau peut accueillir plusieurs étudiants, et, de façon optionnelle, il est possible de proposer des séance pour des groupes entiers au même moment.';
$string['modulename_link'] = 'mod/scheduler/view';
$string['modulenameplural'] = 'Rendez-vous';
$string['monday'] = 'Lundi';
$string['move'] = 'Modifier';
$string['moveslot'] = 'Déplacer le créneau';
$string['multiplestudents'] = 'Autoriser plusieurs étudiants par créneau';
$string['myappointments'] = 'Mes rendez-vous';
$string['name'] = 'Titre du planning';
$string['needteachers'] = 'Les créneaux ne peuvent pas être ajoutés car ce cours n\'a pas d\'enseignant';
$string['negativerange'] = 'Plage négative impossible';
$string['never'] = 'Jamais';
$string['newappointment'] = '{$a} : Nouveau rendez-vous';
$string['noappointments'] = 'Aucun rendez-vous enregistré';
$string['noexistingstudents'] = 'Aucun étudiant ni étudiante';
$string['nogroups'] = 'Aucun groupe disponible';
$string['noresults'] = 'Pas de rendez-vous.';
$string['noschedulers'] = 'Personne dans le planning';
$string['noslots'] = 'Aucune tranche horaire n\'est disponible pour un rendez-vous. Veuillez contacter votre enseignant pour fixer un rendez-vous.';
$string['noslotsavailable'] = 'Pas de rendez-vous programmés actuellement, ou tous les rendez-vous annoncés sont complets.';
$string['noslotsopennow'] = 'Aucune tranche horaire n\'est encore disponible à cette date.';
$string['nostudents'] = 'Aucun étudiant';
$string['nostudenttobook'] = 'Aucun élève à planifier';
$string['note'] = 'Note';
$string['noteacherforslot'] = 'Vous n\'avez pas choisi d\'enseignant';
$string['noteachershere'] = 'Aucun enseignant disponible';
$string['notes'] = 'Commentaires';
$string['notifications'] = 'Notifications';
$string['notifications_help'] = 'Lorsque cette option est cochée, les enseignants et les étudiants reçoivent des notifications lorsque des rendez-vous sont pris ou annulés.';
$string['notselected'] = 'Vous n\'avez pas encore fait de choix';
$string['now'] = 'Maintenant';
$string['occurrences'] = 'Occurrences';
$string['on'] = 'le';
$string['oneappointmentonly'] = 'Les étudiants ne peuvent prendre qu\'un seul rendez-vous';
$string['oneatatime'] = 'Les étudiants ne peuvent prendre qu\'un rendez-vous à la fois';
$string['onedaybefore'] = '1 jour avant le rendez-vous';
$string['oneslotadded'] = '1 créneau ajouté';
$string['oneweekbefore'] = '1 semaine avant le rendez-vous';
$string['onthemorningofappointment'] = 'Le matin du rendez-vous';
$string['overall'] = 'Vue d\'ensemble';
$string['overlappings'] = 'Collisions';
$string['pluginadministration'] = 'Administration Rendez-vous';
$string['pluginname'] = 'Rendez-vous';
$string['registeredlbl'] = 'Elèves enregistrés en rendez-vous';
$string['reminder'] = 'Rappel';
$string['remindertext'] = 'Ce message pour vous rappeler que vous n\'avez pas encore fixé votre rendez-vous. Veuillez choisir une tranche horaire aussi vite que possible ici&nbsp;:';
$string['remindtitle'] = '{$a}: Rappel de rendez-vous';
$string['remindwhere'] = 'Lieu du rendez-vous :';
$string['remindwithwhom'] = 'Votre rendez-vous avec :';
$string['resetappointments'] = 'Effacer les séances et les notes';
$string['resetslots'] = 'Effacer les créneaux';
$string['return'] = 'Revenir au cours';
$string['reuse'] = 'Créneau réutilisable ?';
$string['reuseguardtime'] = 'Délai de garde des créneaux';
$string['reuseguardtime_help'] = '<p>Ce paramètre définit le temps de garde pour conserver les plages horaires incertaines.</p>
<p>Les plages horaires considérées comme incertaines (non réutilisables) seront automatiquement supprimées lorsqu’un ou une étudiante changera son rendez-vous, libérant ainsi la plage horaire en entier, ou qu’un enseignant ou une enseignante y annulera tous les rendez-vous. La suppression se produit lorsque la plage horaire commence trop près de la date actuelle.</p>
<p>Le paramètre définit le délai «&nbsp;dès maintenant&nbsp;», pour lequel une plage horaire sera supprimée et rendue inaccessible pour d’éventuels rendez-vous.</p>';
$string['reuse_help'] = '<p>L’ordonnanceur conservera une plage horaire <i>réutilisable</i> même si quiconque annule un rendez-vous. L’emplacement libéré redevient disponible pour la prise de rendez-vous.</p>
<p>Une plage horaire <i>incertaine</i> sera automatiquement supprimée de la case ci-dessus si la date de départ est trop près de la date actuelle (il est possible que vous ne vouliez pas ajouter une contrainte aussi près de «&nbsp;maintenant&nbsp;»). Le délai de garde peut être fixé à l’aide du paramètre de configuration de l’instance «&nbsp;Réutiliser le temps de garde&nbsp;».</p>';
$string['revoke'] = 'Révoquer le rendez-vous';
$string['saturday'] = 'Samedi';
$string['save'] = 'Enregistrer';
$string['savechoice'] = 'Enregistrer mon choix';
$string['savecomment'] = 'Sauvegarder le commentaire';
$string['saveseen'] = 'Mémoriser les présences';
$string['schedule'] = 'Planifier';
$string['scheduleappointment'] = 'Planifier un rendez-vous pour {$a}';
$string['schedulecancelled'] = '{$a} : Votre rendez-vous annulé ou déplacé';
$string['schedulegroups'] = 'Planifier par groupe';
$string['scheduleinnew'] = 'Planifier dans un nouveau créneau';
$string['scheduler'] = 'Carnet';
$string['scheduler:addinstance'] = 'Ajouter un nouveau carnet de rendez-vous';
$string['scheduler:appoint'] = 'Prendre rendez-vous';
$string['scheduler:attend'] = 'Recevoir les rendez-vous';
$string['scheduler:canscheduletootherteachers'] = 'Prendre des rendez-vous pour d\'autres membres de l\'encadrement';
$string['scheduler:canseeotherteachersbooking'] = 'Voir les rendez-vous des autres membres de l\'encadrement';
$string['scheduler:disengage'] = 'Annuler ses rendez-vous (étudiants)';
$string['scheduler:manage'] = 'Gérer ses données de rendez-vous';
$string['scheduler:manageallappointments'] = 'Gérer toutes les données de rendez-vous';
$string['scheduler:seeotherstudentsbooking'] = 'Voir les autres étudiants du créneau';
$string['scheduler:seeotherstudentsresults'] = 'Voir les notes des autres étudiants du créneau';
$string['schedulestudents'] = 'Planifier par étudiant';
$string['seen'] = 'Vu';
$string['setreused'] = 'Rendre le créneau réutilisable';
$string['setunreused'] = 'Rendre le créneau volatile';
$string['showemailplain'] = 'Afficher les adresses de courriel en texte clair';
$string['showemailplain_desc'] = 'Dans la vue enseignant du planning, afficher les adresses e-mails des étudiants voulant un entretien de façon textuelle, en plus des liens mailto:.';
$string['slot_is_just_in_use'] = 'Désolé, cette tranche horaire vient d\'être choisie par un autre étudiant&nbsp;!<br />Veuillez recommencer.';
$string['slots'] = 'Créneaux';
$string['slotsadded'] = '{$a} créneau(x) ajouté(s)';
$string['slottype'] = 'Exclusivité';
$string['slotupdated'] = '1 créneau modifié';
$string['slotwarning'] = '<b>Attention&nbsp;!</b> Déplacer ce créneau à l\'heure voulue entre en conflit avec le(s) créneau(x) listé(s) ci-dessous. Cocher «&nbsp;Ignorer les conflits&nbsp;» si vous voulez déplacer le créneau malgré-tout.';
$string['staffbreakdown'] = 'Par {$a}';
$string['staffmember'] = 'Enseignant';
$string['staffrolename'] = 'Nom du rôle de l\'interlocuteur';
$string['staffrolename_help'] = 'L’étiquette pour la personne qui assiste les étudiantes et étudiants. Il ne s’agit pas nécessairement d’un «&nbsp;enseignant&nbsp;».';
$string['start'] = 'Début';
$string['startpast'] = 'Il est impossible de fixer le début d\'un rendez-vous dans le passé';
$string['starttime'] = 'Heure de début';
$string['statistics'] = 'Statistiques';
$string['strdownloadcsvgrades'] = 'Export des notes au format cvs';
$string['strdownloadcsvslots'] = 'Export des créneaux au format cvs';
$string['strdownloadexcelsingle'] = 'Export vers une feuille excel';
$string['strdownloadexcelteachers'] = 'Export vers excel par {$a}';
$string['strdownloadodssingle'] = 'Export vers une feuille OpenDocument';
$string['strdownloadodsteachers'] = 'Export OpenDocument par {$a}';
$string['student'] = 'Étudiant';
$string['studentbreakdown'] = 'Par étudiant';
$string['studentcomments'] = 'Notes de l\'Etudiant';
$string['studentdetails'] = 'Détail de l\'étudiant';
$string['studentmultiselect'] = 'Chaque étudiant ne peut être sélectionné qu\'une seule fois dans ce créneau';
$string['studentnotes'] = 'Vos commentaires pour  <br/> ce rendez-vous';
$string['students'] = 'Étudiants';
$string['sunday'] = 'Dimanche';
$string['teacher'] = 'Enseignant';
$string['thursday'] = 'Jeudi';
$string['tuesday'] = 'Mardi';
$string['unattended'] = 'Elèves à recevoir';
$string['unlimited'] = 'Sans limite';
$string['unregisteredlbl'] = 'Elèves sans rendez-vous';
$string['updategrades'] = 'Enregistrer les notes';
$string['updatesingleslot'] = 'Modifier un créneau';
$string['updatingappointment'] = 'Modification d\'un rendez-vous';
$string['wednesday'] = 'Mercredi';
$string['welcomebackstudent'] = 'La ligne en gras dans le tableau ci-dessous met en évidence votre date de rendez-vous. Vous pouvez changer cette date pour n\'importe quelle autre tranche horaire disponible.';
$string['welcomenewstudent'] = 'Le tableau ci-dessous montre toutes les tranches horaires disponibles pour fixer un rendez-vous. Faites votre choix en cliquant sur un bouton et n\'oubliez pas de cliquer ensuite sur «&nbsp;Enregistrer mon choix&nbsp;». Si vous devez par la suite effectuer une modification, vous pouvez revenir sur cette page.';
$string['welcomenewteacher'] = 'Cliquez sur le bouton ci-dessous pour ajouter des tranches horaires vous permettant de rencontrer tous vos étudiants.';
$string['what'] = 'Pourquoi ?';
$string['whathappened'] = 'Notes';
$string['whatresulted'] = 'Résultat';
$string['when'] = 'Quand ?';
$string['where'] = 'Où ?';
$string['who'] = 'Avec qui ?';
$string['whosthere'] = 'Qui est là ?';
$string['xdaysbefore'] = '{$a} jours avant le créneau';
$string['xweeksbefore'] = '{$a} semaines avant le créneau';
$string['yourappointmentnote'] = 'Commentaire sur votre prestation individuelle';
$string['yourslotnotes'] = 'Commentaires généraux de séance';
