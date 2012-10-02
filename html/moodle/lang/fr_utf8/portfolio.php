<?php // $Id: portfolio.php,v 1.36 2009/04/10 19:28:53 martignoni Exp $ 

$string['activeexport'] = 'Résoudre les exportations actives';
$string['activeportfolios'] = 'Portfolios actifs';
$string['addalltoportfolio'] = 'Tout enregistrer...';
$string['addnewportfolio'] = 'Ajouter un portfolio';
$string['addtoportfolio'] = 'Enregistrer...';
$string['alreadyalt'] = 'Exportation en cours. Veuillez cliquer ici.';
$string['alreadyexporting'] = 'Vous avez déjà entamé une exportation vers un portfolio durant cette session. Veuillez la terminer d\'abord, ou l\'annuler.';
$string['availableformats'] = 'Formats d\'exportation disponibles';
$string['callercouldnotpackage'] = 'Échec de la préparation de vos données pour l\'exportation : l\'erreur originale est $a';
$string['cannotsetvisible'] = 'Impossible de rendre visible ceci. Le plugin a été désactivé en raison d\'un problème de configuration';
$string['commonsettingsdesc'] = '<p>En indiquant si la durée d\'un transfert doit être considérée comme <i>Modérée</i> ou comme <i>Élevée</i>, vous spécifiez si les utilisateurs pourront attendre la fin du transfert ou non.</p><p>Les transferts jusqu\'à une taille <i>Modérée</i> ont lieu immédiatement sans intervention de l\'utilisateur. Les transferts de taille supérieure sont mis dans la file d\'attente, avec l\'option de commencer, avec un avertissement que le transfert pourra durer un certain temps.</p><p>Il est possible que certains plugins de portfolio ignorent ce réglage et impose la mise en file d\'attente de tous les transferts.</p>';
$string['configexport'] = 'Configurer les données exportées';
$string['configplugin'] = 'Configurer le plugin portfolio';
$string['configure'] = 'Configurer';
$string['confirmexport'] = 'Veuillez confirmer l\'exportation';
$string['confirmsummary'] = 'Résumé de votre exportation';
$string['continuetoportfolio'] = 'Continuer vers votre portfolio';
$string['deleteportfolio'] = 'Supprimer le portfolio';
$string['destination'] = 'Destination';
$string['disabled'] = 'Désolé, les exportations de portfolio ne sont pas activées sur ce site';
$string['displayarea'] = 'Zone d\'exportation';
$string['displayinfo'] = 'Infos d\'exportation';
$string['displayexpiry'] = 'Durée d\'échéance des transferts';
$string['dontwait'] = 'Ne pas attendre';
$string['enabled'] = 'Activer les portfolios';
$string['enableddesc'] = 'Cette option permet aux administrateurs de configurer les systèmes distants vers lesquels les utilisateurs exportent des contenus';
$string['err_uniquename'] = 'Le nom du portfolio doit être unique (par plugin)';
$string['exportcomplete'] = 'Exportation portfolio terminée !';
$string['exportedpreviously'] = 'Exportations précédentes';
$string['exportexceptionnoexporter'] = 'Une exception portfolio_export_exception a été levée lors d\'une session active, mais il n\'a pas d\'objet exporter';
$string['exportexpired'] = 'L\'exportation vers le portfolio a déjà eu lieu';
$string['exportexpireddesc'] = 'Vous avez tenté de répéter l\'exportation de données ou de démarrer une exportation vide. Veuillez essayer à nouveau en reprenant depuis la page originale. Cette erreur peut arriver si vous avez utiliser le bouton Retour après la fin d\'une exportation ou si vous avez copié une URL incorrecte.';
$string['exporting'] = 'Exportation vers le portfolio';
$string['exportingcontentfrom'] = 'Exportation de contenus depuis $a';
$string['exportqueued'] = 'L\'exportation du portfolio a été mise en file d\'attente pour transfert';
$string['exportqueuedforced'] = 'L\'exportation du portfolio a été mise en file d\'attente pour transfert (le système impose une file d\'attente pour les transferts)';
$string['failedtopackage'] = 'Impossible de trouver les fichiers à empaqueter';
$string['failedtosendpackage'] = 'Échec de l\'envoi de vos données aux système de portfolio sélectionné : l\'erreur originale est $a';
$string['filedenied'] = 'Accès au fichier refusé';
$string['filenotfound'] = 'Fichier introuvable';
$string['format_file'] = 'Fichier';
$string['format_image'] = 'Image';
$string['format_mbkp'] = 'Format de sauvegarde Moodle';
$string['format_plainhtml'] = 'HTML';
$string['format_richhtml'] = 'HTML avec annexes';
$string['format_text'] = 'Texte pur';
$string['format_video'] = 'Vidéo';
$string['hidden'] = 'Caché';
$string['highdbsizethreshold'] = 'Taille de base de donnée élevée';
$string['highdbsizethresholddesc'] = 'Nombre d\'enregistrements de la base de données au delà duquel le temps de transfert est considéré comme élevé';
$string['highfilesizethreshold'] = 'Taille de transfert élevée';
$string['highfilesizethresholddesc'] = 'Les fichiers dépassant cette taille seront considérés comme nécessitant un temps de transfert élevé';
$string['insanesubject'] = 'Des instances portfolio ont été désactivées automatiquement';
$string['insanebody'] = 'Bonjour, Vous recevez ce message en tant qu\'administrateur de $a->sitename.

Des instances de plugin de portfolio ont été automatiquement désactivées en raison de problèmes de configuration. Cela signifie que les utilisateurs ne peuvent actuellement exporter de contenus vers ces portfolios.

La liste des instances désactivées est la suivante :

$a->textlist

Veuillez corriger ce problème au plus vite, en vous rendant sur la page $a->fixurl.
';
$string['insanebodyhtml'] = '<p>Bonjour, Vous recevez ce message en tant qu\'administrateur de $a->sitename.</p>
$a->htmllist
<p>Veuillez corriger ce problème au plus vite, en vous rendant sur <a href=\"$a->fixurl\">les pages de configuration des portfolios</a>.</p>';
$string['insanebodysmall'] = 'Bonjour, Vous recevez ce message en tant qu\'administrateur de $a->sitename. Des instances de plugin de portfolio ont été automatiquement désactivées en raison de problèmes de configuration. Cela signifie que les utilisateurs ne peuvent actuellement exporter de contenus vers ces portfolios. Veuillez corriger ce problème au plus vite, en vous rendant sur la page $a->fixurl.';
$string['instancedeleted'] = 'Le portfolio a été supprimé';
$string['instanceismisconfigured'] = 'La configuration du portfolio n\'est pas correcte. Erreur : $a';
$string['instancenotdelete'] = 'Échec de la suppression du portfolio';
$string['instancenotsaved'] = 'Échec de la sauvegarde du portfolio';
$string['instancesaved'] = 'Le portfolio a été enregistré';
$string['invalidaddformat'] = 'Format à ajouter non valide envoyé à la fonction portfolio_add_button. $a doit être de la forme PORTFOLIO_ADD_XXX';
$string['invalidbuttonproperty'] = 'Impossible de trouver cette propriété ($a) de portfolio_button';
$string['invalidconfigproperty'] = 'Impossible de trouver cette propriété de configuration ($a->property de $a->class)';
$string['invalidexportproperty'] = 'Impossible de trouver cette propriété de la configuration d\'exportation ($a->property de $a->class)';
$string['invalidfileareaargs'] = 'Paramètre de zone de fichier non valide passé à la fonction set_file_and_format_data. Ce paramètre doit contenir contextid, filearea et itemid';
$string['invalidfileargument'] = 'Paramètre de fichier non valide passé à la fonction portfolio_format_from_file. Ce paramètre doit être un objet stored_file';
$string['invalidformat'] = 'L\'exportation a lieu dans un format non valide, $a';
$string['invalidinstance'] = 'Impossible de trouver ce portfolio';
$string['invalidpreparepackagefile'] = 'Appel non valide de la fonction prepare_package_file. Il faut spécifier soit un simple fichier, soit plusieurs fichiers';
$string['invalidproperty'] = 'Impossible de trouver cette propriété ($a->property de $a->class)';
$string['invalidsha1file'] = 'Appel non valide de la fonction get_sha1_file. Il faut spécifier soit un simple fichier, soit plusieurs fichiers';
$string['invalidtempid'] = 'Identifiant d\'exportation non valide.';
$string['invaliduserproperty'] = 'Impossible de trouver cette propriété de la configuration de l\'utilisateur ($a->property de $a->class)';
$string['logs'] = 'Historique de transfert';
$string['logsummary'] = 'Transferts antérieurs réussis';
$string['manageportfolios'] = 'Gérer les portfolios';
$string['manageyourportfolios'] = 'Gérer vos portfolios';
$string['missingcallbackarg'] = 'Paramètre de rappel (callback) $a->arg manquant pour la classe $a->class';
$string['moderatedbsizethreshold'] = 'Taille de base de donnée modérée';
$string['moderatedbsizethresholddesc'] = 'Nombre d\'enregistrements de la base de données en-deçà duquel le temps de transfert est considéré comme modéré';
$string['moderatefilesizethreshold'] = 'Taille de transfert modérée';
$string['moderatefilesizethresholddesc'] = 'Les fichiers ne dépassant pas cette taille seront considérés comme nécessitant un temps de transfert modéré';
$string['multipledisallowed'] = 'Impossible de créer une autre instance de ce plugin, qui n\'autorise pas des instances multiples ($a)';
$string['mustsetcallbackoptions'] = 'Vous devez indiquer les options de rappel (callback) soit dans le constructeur portfolio_add_button soit en utilisant la méthode set_callback_options';
$string['noavailableplugins'] = 'Désolé, il n\'y a aucun portfolio disponible vers lequel exporter';
$string['nocallbackclass'] = 'Impossible de trouver la classe de rappel (callback) à utiliser ($a)';
$string['nocallbackfile'] = 'Un problème est présent dans le module depuis lequel vous essayez d\'exporter des données (callback). Impossible de trouver un fichier requis ($a)';
$string['noclassbeforeformats'] = 'Vous devez définir la classe de rappel (callback) avant de faire appel à set_formats dans portfolio_button';
$string['nocommonformats'] = 'Aucun format en commun entre les plugins de portfolio et le site appelant $a';
$string['nonprimative'] = 'Une valeur incorrecte a été passée comme paramètre à portfolio_add_button. Impossible de continuer. La clef était $a->key et la valeur $a->value';
$string['nopermissions'] = 'Vous n\'avez pas les permissions requises pour exporter des fichiers depuis cette zone';
$string['notexportable'] = 'Désolé, le type de contenu que vous essayez d\'exporter n\'est pas exportable';
$string['notimplemented'] = 'Désolé, vous essayez d\'exporter du contenu dans un format non encore implémenté ($a)';
$string['notyetselected'] = 'Pas encore sélectionné';
$string['notyours'] = 'Vous essayez de reprendre l\'exportation d\'un portfolio ne vous appartenant pas !';
$string['nouploaddirectory'] = 'Impossible de créer un dossier temporaire dans lequel préparer vos données';
$string['plugin'] = 'Plugin de portfolio';
$string['plugincouldnotpackage'] = 'Échec de la préparation de vos données pour exportation : l\'erreur originale est $a';
$string['pluginismisconfigured'] = 'Le plugin de portfolio est mal configuré et a été ignoré. L\'erreur était $a';
$string['portfolio'] = 'Portfolio';
$string['portfolios'] = 'Portfolios';
$string['queuesummary'] = 'Transferts actuellement en attente';
$string['returntowhereyouwere'] = 'Retour à la page précédente';
$string['save'] = 'Enregistrer';
$string['selectedformat'] = 'Format d\'exportation sélectionné';
$string['selectedwait'] = 'Sélection à attendre ?';
$string['selectplugin'] = 'Sélectionner la destination';
$string['someinstancesdisabled'] = 'Certaines instances de plugin de portfolio ont été désactivées, soit parce qu\'elles ne sont pas correctement configurées, soit parce qu\'elles requièrent d\'autres composants, à savoir';
$string['somepluginsdisabled'] = 'Certains plugins de portfolio ont été désactivés, soit parce qu\'ils ne sont pas correctement configurés, soit parce qu\'ils requièrent d\'autres composants. Il s\'agit des plugins suivants.';
$string['sure'] = 'Voulez-vous vraiment supprimer « {$a} »? L\'action est irrémédiable.';
$string['thirdpartyexception'] = 'Une exception (logiciel tierce partie) a été levée par durant l\'exportation du portfolio ($a). L\'erreur a pu être récupérée mais ceci doit être corrigé.';
$string['transfertime'] = 'Durée de transfert';
$string['unknownplugin'] = 'Inconnu (a été peut-être supprimé par l\'administrateur)';
$string['wait'] = 'Attendre';
$string['wanttowait_high'] = 'Il n\'est pas recommandé la fin du transfert. Vous pouvez cependant le faire, si vous êtes sûr de ce que vous faites';
$string['wanttowait_moderate'] = 'Voulez-vous attendre la fin de ce transfert ? Cela pourrait prendre quelques minutes';

?>
