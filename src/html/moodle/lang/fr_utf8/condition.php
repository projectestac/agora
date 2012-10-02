<?php // $Id: condition.php,v 1.8 2009/08/09 10:51:23 martignoni Exp $

$string['addgrades'] = 'Ajouter au formulaire {no} conditions de note';
$string['addcompletions'] = 'Ajouter au formulaire {no} conditions d\'activité';
$string['availabilityconditions'] = 'Restreindre la disponibilité';
$string['availablefrom'] = 'Seulement disponible à partir du';
$string['availableuntil'] = 'Seulement disponible jusqu\'à fin';
$string['badavailabledates'] = 'Dates non valables. Si vous définissez les deux dates, assurez-vous que la date de début de disponibilité soit antérieure à celle de fin.';
$string['completion_complete'] = ' doit être marqué comme terminé';
$string['completion_incomplete'] = ' ne doit pas être marqué comme terminé';
$string['completion_pass'] = ' doit être terminé avec une note de réussite';
$string['completion_fail'] = ' doit être terminé avec une note d\'échec';
$string['configenableavailability'] = 'Permet de définir des conditions (basées sur la date, une note ou la fin d\'une activité) qui déterminent si une activité est disponible.';
$string['enableavailability'] = 'Activer la disponibilité conditionnelle';
$string['grade_atleast'] = 'doit être supérieur à';
$string['grade_upto'] = 'et inférieur à';
$string['gradecondition'] = 'Condition de note';
$string['completioncondition'] = 'Condition de fin d\'activité';
$string['help_conditiondates'] = 'les dates de disponibilité';
$string['help_showavailability'] = 'l\'affichage des activités non disponibles';
$string['none'] = '(aucune)';
$string['notavailableyet'] = 'Pas encore disponible';
$string['requires_completion_0'] = 'Non disponible à moins que l\'activité <strong>$a</strong> soit pas terminée.';
$string['requires_completion_1'] = 'Non disponible avant que l\'activité <strong>$a</strong> soit marquée comme terminée.';
$string['requires_completion_2'] = 'Non disponible avant que l\'activité <strong>$a</strong> soit terminée et réussie.';
$string['requires_completion_3'] = 'Non disponible à moins que l\'activité <strong>$a</strong> soit terminée et ratée.';
$string['requires_date'] = 'Disponible dès le $a.';
$string['requires_date_before'] = 'Disponible jusqu\'au $a.';
$string['requires_date_both'] = 'Disponible du $a->from au $a->until.';
$string['requires_grade_any'] = 'Non disponible avant que vous receviez une note pour <strong>$a</strong>.';
$string['requires_grade_min'] = 'Non disponible avant que vous obteniez une note requise dans <strong>$a</strong>.';
$string['requires_grade_max'] = 'Non disponible à moins que vous obteniez une note adéquate dans <strong>$a</strong>.';
$string['requires_grade_range'] = 'Non disponible à moins que vous obteniez une note déterminée dans <strong>$a</strong>.';
$string['showavailability'] = 'Avant que l\'activité soit disponible';
$string['showavailability_show'] = 'Afficher l\'activité en gris, avec une information sur la restriction';
$string['showavailability_hide'] = 'Cacher complètement l\'activité';
$string['userrestriction_visible'] = 'Restreinte : « {$a} »';
$string['userrestriction_hidden'] = 'Restreinte (cachée complètement, pas de message) : « {$a} »';

?>