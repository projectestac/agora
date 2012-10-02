<?PHP // $Id: question.php,v 1.5 2008/04/03 12:50:07 carlesbellver Exp $ 
      // question.php - created with Moodle 1.9 + (Build: 20080304) (2007101509)


$string['adminreport'] = 'Informe sobre possibles problemes en la vostra base de dades de preguntes';
$string['broken'] = 'Aquest enllaç no funciona. Apunta a un fitxer que no existeix.';
$string['byandon'] = '<em>$a->user</em> <em>$a->time</em>';
$string['categorycurrent'] = 'Categoria actual';
$string['categorycurrentuse'] = 'Utilitza aquesta categoria';
$string['categorydoesnotexist'] = 'Aquesta categoria no existeix';
$string['categorymoveto'] = 'Desa en la categoria';
$string['changepublishstatuscat'] = 'Es canviarà l\'estat de publicació de la categoria <a href=\"$a->caturl\">\"$a->name\"</a>, en el curs \"$a->coursename\", de <strong>$a->changefrom a $a->changeto</strong>.';
$string['copy'] = 'Copia des de: $a i canvia enllaços';
$string['created'] = 'Creació';
$string['createdmodifiedheader'] = 'Creació / darrera modificació';
$string['cwrqpfs'] = 'Preguntes aleatòries que seleccionen preguntes de subcategories';
$string['cwrqpfsinfo'] = '<p>Durant l\'actualització a Moodle 1.9 se separaran les categories de preguntes en diferents contextos. Caldrà canviar l\'estat de publicació d\'algunes preguntes i categories de preguntes del vostre lloc. Això és necessari en casos com el vostre, quan hi ha preguntes \"aleatòries\" en un qüestionari definides de manera que trien preguntes de subcategories i alguna d\'aquestes subcategories té un estat de publicació diferent de l\'estat de la categoria mare on està creada la pregunta aleatòria.</p>
<p>Es canviarà l\'estat de publicació de les categories següents, d\'on treuen preguntes les preguntes \"aleatòries\" de categories mare, a l\'estat de publicació de la categoria que conté la pregunta aleatòria. Les preguntes afectades continuaran funcionant en tots els qüestionaris existents.</p>';
$string['cwrqpfsnoprob'] = 'El vostre lloc no conté categories afectades pel problema de les \"preguntes aleatòries que seleccionen preguntes de subcategories\".';
$string['defaultfor'] = 'Categoria per defecte en $a';
$string['defaultinfofor'] = 'La categoria per defecte per a preguntes compartides en el context \'$a\'';
$string['donothing'] = 'No copiïs ni moguis fitxers, ni canviïs enllaços';
$string['editingcategory'] = 'S\'està editant una categoria';
$string['editingquestion'] = 'S\'està editant una pregunta';
$string['erroraccessingcontext'] = 'Error: no hi ha accés al context';
$string['errorfilecannotbecopied'] = 'Error: no s\'ha pogut copiar el fitxer $a';
$string['errorfilecannotbemoved'] = 'Error: no s\'ha pogut moure el fitxer $a';
$string['errorfileschanged'] = 'Error: alguns fitxers enllaçats en les preguntes han canviat des de la visualització del formulari.';
$string['exportcategory'] = 'Exporta categoria';
$string['filesareacourse'] = 'l\'àrea de fitxers del curs';
$string['filesareasite'] = 'l\'àrea de fitxers del lloc';
$string['filestomove'] = 'Voleu copiar o moure els fitxers a $a?';
$string['fractionsnomax'] = 'Una de les respostes ha de tenir una puntuació del 100%% de manera que sigui possible aconseguir tots els punts en aquesta pregunta.';
$string['getcategoryfromfile'] = 'Agafa la categoria del fitxer';
$string['getcontextfromfile'] = 'Agafa el context del fitxer';
$string['ignorebroken'] = 'Ignora enllaços trencats';
$string['linkedfiledoesntexist'] = 'El fitxer enllaçat $a no existeix';
$string['makechildof'] = 'Fes filla de: \'$a\'';
$string['maketoplevelitem'] = 'Mou al primer nivell';
$string['missingimportantcode'] = 'A aquest tipus de pregunta li falta un codi important: $a.';
$string['modified'] = 'Darrera modificació';
$string['move'] = 'Mou des de: $a i canvia enllaços';
$string['movecategory'] = 'Mou categoria';
$string['movelinksonly'] = 'No copiïs ni moguis fitxers, només canvia la destinació dels enllaços';
$string['moveq'] = 'Mou pregunta/es';
$string['moveqtoanothercontext'] = 'Mou la pregunta a un altre context';
$string['movingcategory'] = 'S\'està movent la categoria';
$string['movingcategoryandfiles'] = 'Segur que voleu moure la categoria {$a->name}, i totes les categories que en són filles, al context \"{$a->contextto}\"?<br />S\'han detectat {$a->urlcount} fitxers enllaçats des de preguntes en {$a->fromareaname}. Voleu copiar o moure aquests fitxers a {$a->toareaname}?';
$string['movingcategorynofiles'] = 'Segur que voleu moure la categoria {$a->name}, i totes les categories que en són filles, al context \"{$a->contextto}\"?';
$string['movingquestions'] = 'S\'estan movent les preguntes i fitxers';
$string['movingquestionsandfiles'] = 'Segur que voleu moure les preguntes {$a->questions} al context <strong>\"{$a->tocontext}\"</strong>?<br />S\'han detectat {<strong>{$a->urlcount} fitxers</strong> enllaçats des d\'aquestes preguntes en {$a->fromareaname}. Voleu copiar o moure aquests fitxers a {$a->toareaname}?';
$string['movingquestionsnofiles'] = 'Segur que voleu moure les preguntes {$a->questions} al context <strong>\"{$a->tocontext}\"</strong>?<br />No s\'ha detectat <strong>cap fitxer</strong> enllaçat des d\'aquestes preguntes en {$a->fromareaname}.';
$string['needtochoosecat'] = 'Heu de triar una categoria on moure aquesta pregunta o cancel·lar.';
$string['nopermissionadd'] = 'No teniu permís per a afegir preguntes aquí.';
$string['noprobs'] = 'No s\'han trobat problemes en la vostra base de dades de preguntes.';
$string['notenoughdatatoeditaquestion'] = 'No s\'han especificat l\'identificador de la pregunta, ni el de la categoria i el tipus de pregunta.';
$string['notenoughdatatomovequestions'] = 'Heu de proporcionar els identificadors de les preguntes que voleu moure.';
$string['permissionedit'] = 'Edita aquesta pregunta';
$string['permissionmove'] = 'Mou aquesta pregunta';
$string['permissionsaveasnew'] = 'Desa com a pregunta nova';
$string['permissionto'] = 'Teniu permís per a:';
$string['published'] = 'pública';
$string['questionaffected'] = 'La pregunta <a href=\"$a->qurl\">\"$a->name\" ($a->qtype)</a> es troba en aquesta categoria, però també és utilitzada al qüestionari <a href=\"$a->qurl\">\"$a->quizname\"</a> d\'un altre curs (\"$a->coursename\").';
$string['questionbank'] = 'Banc de preguntes';
$string['questioncatsfor'] = 'Categories de preguntes en \'$a\'';
$string['questiondoesnotexist'] = 'Aquesta pregunta no existeix';
$string['questionuse'] = 'Usa pregunta en aquesta activitat';
$string['shareincontext'] = 'Publica en el context $a';
$string['tofilecategory'] = 'Inclou la categoria al fitxer';
$string['tofilecontext'] = 'Inclou el context al fitxer';
$string['unknown'] = 'Desconegut';
$string['unknownquestiontype'] = 'Tipus de pregunta desconegut: $a.';
$string['unpublished'] = 'no pública';

?>
