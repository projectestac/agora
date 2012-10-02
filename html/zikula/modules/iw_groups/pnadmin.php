<?php
/**
 * Show the list of groups
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @return:	The list of groups
*/
function iw_groups_admin_main()
{
	$dom = ZLanguage::getModuleDomain('iw_groups');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_groups::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}

	//get all groups infortion
	$groups = pnModAPIFunc('iw_groups', 'user', 'getall');
	
	if (empty($groups)) {
		return LogUtil::registerError (__('There isn\'t any group defined', $dom));
	}

	//Transfer to template
	// Create output object
	$pnRender = pnRender::getInstance('iw_groups',false);
	$pnRender->assign('groups', $groups);
	
	$pnRender->assign('content', $content);
	return $pnRender->fetch('iw_groups_admin_main.htm');

}


/**
 * Show the module information
 * @author	Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @return	The module information
 */
function iw_groups_admin_module()
{
	$dom = ZLanguage::getModuleDomain('iw_groups');
	// Security check
	if(!SecurityUtil::checkPermission('iw_groups::', "::", ACCESS_ADMIN)){
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	// Create output object
	$pnRender = pnRender::getInstance('iw_groups',false);

	$module = pnModFunc('iw_main', 'user', 'module_info',
	                     array('module_name' => 'iw_groups',
							   'type' => 'admin'));

	$pnRender->assign('module', $module);
	return $pnRender->fetch('iw_groups_admin_module.htm');
}

/*
Funciï¿œ que presenta el formulari des d'on es demanen la dades del nou
grup que es vol crear
*/
function iw_groups_admin_new(){
	$dom = ZLanguage::getModuleDomain('iw_groups');
	// Security check
	if(!SecurityUtil::checkPermission('iw_groups::', "::", ACCESS_ADMIN)){
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	$sortida =& new pnHTML();

	//Iniciem el formulari per la creaciï¿œ d'un nou grup.
	//Enviem les dades a la funciï¿œ iw_groups_admin_create($arg)
	$sortida->FormStart(pnModURL('iw_groups', 'admin', 'create'));

	//Afegim un identificatiu d'autoritzaciï¿œ en un camp ocult
	$sortida->FormHidden('authid', pnSecGenAuthKey());
    
	//Iniciem la taula amb el formulari
	$sortida->TableStart();
	$sortida->TableRowStart();
	$sortida->TableColStart(1,'left');
	$sortida->Text(pnVarPrepForDisplay(__('Group name', $dom)));
	$sortida->TableColEnd();
	$sortida->TableColStart(1,'left');
	$sortida->FormText('nom_grup', '', 32, 55); //Nom del grup
	$sortida->TableColEnd();
	$sortida->TableRowEnd();

	$sortida->TableRowStart();
	$sortida->TableColStart(1,'left');
	$sortida->Text(pnVarPrepForDisplay(__('Description', $dom)));
	$sortida->TableColEnd();
	$sortida->TableColStart(1,'left');
	$sortida->FormText('descriu', '', 50, 200); //Descripciï¿œ del grup
	$sortida->TableColEnd();
	$sortida->TableRowEnd();

	//Tanquem la taula del formulari
	$sortida ->TableEnd();

	//Final del formulari
	$sortida->Linebreak(2);
	$sortida->FormSubmit(__('Create the group', $dom));
	$sortida->FormEnd();

	$content = $sortida->GetOutput();

	//Transfer to template
	// Create output object
	$pnRender = pnRender::getInstance('iw_groups',false);
	$pnRender->assign('content', $content);
	return $pnRender->fetch('iw_groups_admin_new.htm');
}

/*
Funciï¿œ que comprova que les dades enviades des del formulari de creaciï¿œ d'un
nou grup s'ajusten al que ha de ser i envia l'ordre de crear el registre a la
funciï¿œ new de l'API
*/
function iw_groups_admin_create($args)
{
	$dom = ZLanguage::getModuleDomain('iw_groups');
	//Agafem els parï¿œmetres enviats des del formulari
	list($nom_grup,$descriu) = pnVarCleanFromInput('nom_grup','descriu');
	extract($args);

	// Security check
	if(!SecurityUtil::checkPermission('iw_groups::', "::", ACCESS_ADMIN)){
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	// Confirm authorisation code
	if (!SecurityUtil::confirmAuthKey()) {
		return LogUtil::registerAuthidError (pnModURL('iw_groups', 'user', 'main'));
	}

	//Comprovem que s'han complimentat les dades requerides del formulari
	//En aquests cas nomï¿œs ï¿œs obligat posar el nom
	if (empty($nom_grup)) {
		$sortida =& new pnHTML();
		$sortida->Title(__('Groups', $dom));
		$sortida->Text(__('You didn\'t state the group name.', $dom));
		$sortida->Linebreak(2);
		$sortida->URL(pnVarPrepForDisplay(pnModURL('iw_groups','admin','new')),__('Return to the previous form', $dom));
		return $sortida->GetOutput();
	}

	//Es crida la funciï¿œ API amb les dades extretes del formulari
	$lid = pnModAPIFunc('iw_groups', 'admin', 'create',
	                     array('nom_grup' => $nom_grup,
							   'descriu' => $descriu));

	if ($lid != false) {
		//S'ha creat un nou grup correctament
		LogUtil::registerStatus (__('A group ha been created', $dom));
	}

	return pnRedirect(pnModURL('iw_groups', 'admin', 'main'));
}

/*
Funciï¿œ que gestiona l'esborrament d'un grup i envia les dades a la
funciï¿œ API corresponent per fer l'ordre efectiva
*/
function iw_groups_admin_delete($args)
{
	$dom = ZLanguage::getModuleDomain('iw_groups');
	//Recollim els parï¿œmetres per poder fer l'esborrament de l'espai
	list($gid,$obid,$confirmacio) = pnVarCleanFromInput('gid','obid','confirmation');
         
	extract($args);

	if (!empty($obid)) {$gid = $obid;}

	// Security check
	if(!SecurityUtil::checkPermission('iw_groups::', "::", ACCESS_ADMIN)){
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
 
	//Cridem la funciï¿œ de l'API de l'usuari que ens retornarï¿œ la informaciï¿œ del registre demanat
	$registre = pnModAPIFunc('iw_groups', 'user', 'get',
	                          array('gid' => $gid));
	if ($registre == false) {
		$sortida =& new pnHTML();
		$sortida->Text(__('The group where the action had to be carried out hasn\'t been found', $dom));
		return $sortida->GetOutput();
	}


	//Demanem confirmaciï¿œ per l'esborrament del registre, si no s'ha demanat abans
	if (empty($confirmacio)) {
		$sortida =& new pnHTML();
		$pnRender = pnRender::getInstance('iw_groups', false);

		$pnRender->assign('groupName', $registre['nom_grup']);

		//Afegim la confirmaciï¿œ a la sortida per pantalla
		$sortida->ConfirmAction(__('Confirm the deletion of the group', $dom),pnModURL('iw_groups', 'admin', 'delete'), __('Cancel the deletion', $dom), pnVarPrepForDisplay(pnModURL('iw_groups', 'admin', 'main')), array('gid' => $gid));

		//Retornem el que ha estat generat per aquesta funciï¿œ
		$content = $sortida->GetOutput();

		//Transfer to template
		// Create output object
		$pnRender->assign('content', $content);
		return $pnRender->fetch('iw_groups_admin_delete.htm');
	}

	//L'usuari ha confirmat l'esborrament del registre i procedim a fer-hoefectiu
	// Confirm authorisation code
	if (!SecurityUtil::confirmAuthKey()) {
		return LogUtil::registerAuthidError (pnModURL('iw_groups', 'user', 'main'));
	}
	
	//Cridem la funciï¿œ API que farï¿œ l'esborrament del registre
	if (pnModAPIFunc('iw_groups', 'admin', 'delete',
	                  array('gid' => $gid))) {
		//L'esborrament ha estat un ï¿œxit i ho notifiquem
		LogUtil::registerStatus (__('Group deleted', $dom));
	}

	//Enviem a l'usuari a la taula de grups
	return pnRedirect(pnModURL('iw_groups', 'admin', 'main'));
}

/*
Funciï¿œ que presenta el formulari que ens mostra i permet editar les dades del
grup que es vol modificar
*/
function iw_groups_admin_edita($args)
{
	$dom = ZLanguage::getModuleDomain('iw_groups');
	//Agafem la id de l'espai a modificar
	list($gid,$obid)= pnVarCleanFromInput('gid','obid');
	extract($args);
	if(!empty($obid)){$gid=$obid;}

	// Security check
	if(!SecurityUtil::checkPermission('iw_groups::', "::", ACCESS_ADMIN)){
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	$sortida =& new pnHTML();

	$registre = pnModAPIFunc('iw_groups','user','get',
	                          array('gid' => $gid));
	if ($registre == false) {
		$sortida->Text(__('The group where the action had to be carried out hasn\'t been found', $dom));
		return $sortida->GetOutput();
	}

	$nom_grup = $registre['nom_grup'];

	//Iniciem el formulari que enviarï¿œ les dades a la funciï¿œ update
	$sortida->FormStart(pnModURL('iw_groups', 'admin', 'update'));

	//Afegim un camp ocult amb la id de l'espai a modificar
	$sortida->FormHidden('gid', pnVarPrepForDisplay($gid));

	//Afegim un identificatiu d'autoritzaciï¿œ en un camp ocult
	$sortida->FormHidden('authid', pnSecGenAuthKey());
    
	//Iniciem la taula amb el formulari
	$sortida->TableStart();
    
	$sortida->TableRowStart();
	$sortida->TableColStart(1,'left');
	$sortida->Text(pnVarPrepForDisplay(__('Group name', $dom)));
	$sortida->TableColEnd();
	$sortida->TableColStart(1,'left');
	$sortida->FormText('nom_grup', $nom_grup, 32, 55); //Nom del grup
	$sortida->TableColEnd();
	$sortida->TableRowEnd();

	$sortida->TableRowStart();
	$sortida->TableColStart(1,'left');
	$sortida->Text(pnVarPrepForDisplay(__('Description', $dom)));
	$sortida->TableColEnd();
	$sortida->TableColStart(1,'left');
	$sortida->FormText('descriu', $registre['description'], 50, 200);  //Descripciï¿œ del grup
	$sortida->TableColEnd();
	$sortida->TableRowEnd();

	//Tanquem la taula que acabem de crear
	$sortida->TableEnd();

	//Final del formulari
	$sortida->Linebreak(2);
	$sortida->FormSubmit(__('Modify', $dom));
	$sortida->FormEnd();

	$content = $sortida->GetOutput();

	//Transfer to template
	// Create output object
	$pnRender = pnRender::getInstance('iw_groups',false);
	$pnRender->assign('content', $content);
	return $pnRender->fetch('iw_groups_admin_edit.htm');
}


/*
FunciÃ³ que comprova que les dades enviades des del formulari de modificaciï¿œ d'un
grup s'ajusten al que ha de ser i envia l'ordre de crear el registre a la
funciï¿œ update de l'API
*/
function iw_groups_admin_update($args)
{
	$dom = ZLanguage::getModuleDomain('iw_groups');
	//Recollim els parï¿œmetres enviats des del formulari
	list($gid,$obid,$nom_grup,$descriu) = pnVarCleanFromInput('gid','obid','nom_grup','descriu');
	extract($args);

	// Security check
	if(!SecurityUtil::checkPermission('iw_groups::', "::", ACCESS_ADMIN)){
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	if(!empty($obid)){$mdid=$obid;}

	// Confirm authorisation code
	if (!SecurityUtil::confirmAuthKey()) {
		return LogUtil::registerAuthidError (pnModURL('iw_groups', 'user', 'main'));
	}
	
	//Comprovem que s'han complimentat les dades requerides del formulari
	//En aquests cas nomï¿œs ï¿œs obligat posar el nom
	if (empty($nom_grup)) {
		$sortida =& new pnHTML();
		$sortida->Title(__('Groups', $dom));
		$sortida->Text(__('You didn\'t state the group name.', $dom));
		$sortida->Linebreak(2);
		$sortida->URL(pnVarPrepForDisplay(pnModURL('iw_groups', 'admin', 'edita',
		                                            array('gid' => $gid))),
		                                                   __('Return to the previous form', $dom));
		return $sortida->GetOutput();
	}	


	if(pnModAPIFunc('iw_groups', 'admin', 'update',
	                 array('gid' => $gid,
						   'nom_grup' => $nom_grup,
						   'descriu' => $descriu))) {
		//La modificaciÃ³ s'ha fet amb Ãšxit
		LogUtil::registerStatus (__('Group updated', $dom));
	}
	
	//Enviem l'usuari a la taula de grups
	return pnRedirect(pnModURL('iw_groups', 'admin', 'main'));
}

/*
FunciÃ³ que carrega els membres d'un grup i permet iniciar-ne la gestiÃ³
*/
function iw_groups_admin_membres($args)
{
	$dom = ZLanguage::getModuleDomain('iw_groups');
	//Recollim els parÃ metres del grup del qual volem editar els membres
	list($gid,$obid,$gid1) = pnVarCleanFromInput('gid','obid','gid1');
	extract($args);

	if (!empty($obid)) {$gid = $obid;}

	// Security check
	if(!SecurityUtil::checkPermission('iw_groups::', "::", ACCESS_ADMIN)){
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	$sortida =& new pnHTML();	

	//Carreguem el grup inicial
	if ($gid == ''){
		$gid = pnModGetVar('iw_groups', 'grupinici');
	}

	if($gid != '' && $gid != 0){
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		$membres = pnModFunc('iw_main', 'user', 'getMembersGroup',
		                      array('sv' => $sv,
									'gid' => $gid,
									'onlyId' => 1));
	}else{
		$membres = pnModAPIFunc('iw_groups','user','get_sense_grup');	
	}

	if(empty($membres)){$nomembres = __('Empty Group ', $dom);}


	// check if user can access the forum throug the group
	// get user groups
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$grups = pnModFunc('iw_main', 'user', 'getAllGroups',
	                    array('sv' => $sv,
							  'less' => $gid1,
							  'plus' => __('Choose a group...', $dom)));
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$grups1 = pnModFunc('iw_main', 'user', 'getAllGroups',
	                     array('sv' => $sv,
							   'less' => $gid,
							   'plus' => __('Choose a group...', $dom)));
	if($gid1!='' && $gid1!=0){
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		$membres1 = pnModFunc('iw_main', 'user', 'getMembersGroup',
		                       array('sv' => $sv,
									 'gid' => $gid1,
									 'onlyId' => 1));
	}else{
		$membres1 = pnModAPIFunc('iw_groups','user','get_sense_grup');
	}

	asort($membres1);
	asort($membres);

	$membresList = array_merge($membres,$membres1);

	$usersList = '$$';
	
	foreach($membresList as $member){
		$usersList .= $member['id'].'$$';
	}

	//get all users information
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$usersInfo = pnModFunc('iw_main', 'user', 'getAllUsersInfo',
	                        array('sv' => $sv,
								  'list' => $usersList,
								  'info' => 'ccn'));

	if(empty($membres1)){$nomembres1 = __('Empty Group ', $dom);}
	if($gid != 0 && $gid != ''){$nom_grup = pnModAPIFunc('iw_groups', 'user', 'get', array('gid' => $gid));}
	if($gid1 != 0 && $gid1 != ''){$nom_grup1 = pnModAPIFunc('iw_groups', 'user', 'get', array('gid' => $gid1));}

	//Iniciem la taula amb les funcions per als membres del grup
	$sortida->FormStart(pnModURL('iw_groups', 'admin', 'grups'));

	//Afegim un identificatiu d'autoritzaciï¿œ en un camp ocult
	$sortida->FormHidden('authid', pnSecGenAuthKey());

	$sortida->TableStart();
		$sortida->TableRowStart();
			$sortida->TableColStart('','','top');
			$sortida->BoldText(__('Group', $dom).' '.$nom_grup['nom_grup']);
			$sortida->TableColEnd('','','top');
			$sortida->TableColStart('','','top');
			$sortida->BoldText(__('Options', $dom));
			$sortida->TableColEnd('','','top');
			$sortida->TableColStart('','','top');
			$sortida->BoldText(__('Group', $dom).' '.$nom_grup1['nom_grup']);
			$sortida->TableColEnd('','','top');
		$sortida->TableRowEnd();
		$sortida->TableRowStart();
			$sortida->TableColStart('','','top');
			//$sortida->FormSelectMultiple('gid',$grups,'','',$gid);
			$sortida->SetInputMode(_PNH_VERBATIMINPUT);
			$sortida->Text('<select name="gid">');
			foreach($grups as $g){
				$selected = ($g['id'] == $gid) ? 'selected' : '';
				$sortida->Text('<option ' . $selected . ' value=' . $g['id'] . '>' . $g['name']. '</option>');
			}
			$sortida->Text('</select>');
			$sortida->SetInputMode(_PNH_PARSEINPUT);
			$sortida->Text(' ');
			$sortida->FormSubmit(__('Change', $dom),'','submit');
			$sortida->TableColEnd('','','top');
			$sortida->TableColStart('','','top');
			$sortida->TableColEnd('','','top');
			$sortida->TableColStart('','','top');
			//$sortida->FormSelectMultiple('gid1',$grups1,'','',$gid1);
			$sortida->SetInputMode(_PNH_VERBATIMINPUT);
			$sortida->Text('<select name="gid1">');
			foreach($grups1 as $g){
				$selected = ($g['id'] == $gid1) ? 'selected' : '';
				$sortida->Text('<option ' . $selected . ' value=' . $g['id'] . '>' . $g['name']. '</option>');
			}
			$sortida->Text('</select>');
			$sortida->SetInputMode(_PNH_PARSEINPUT);			
			$sortida->Text(' ');
			$sortida->FormSubmit(__('Change', $dom),'','submit');
			$sortida->TableColEnd('','','top');
		$sortida->TableRowEnd();
		$sortida->TableRowStart();
			$sortida->TableColStart('','','top');
				$sortida->TableStart('','',0,'200');
						if(isset($nomembres)){
							$sortida->TableRowStart();
							$sortida->TableColStart();
							$sortida->Text($nomembres);
							$sortida->TableColEnd();
							$sortida->TableColStart();
							$sortida->TableColEnd();
							$sortida->TableRowEnd();
						}else{
							if($gid == '' || $gid == 0){
								$sortida->TableRowStart();
								$sortida->TableColStart(2);
								$sortida->BoldText(__('Without group', $dom));
								$sortida->TableColEnd();
								$sortida->TableRowEnd();
							}
							foreach($membres as $membre){
								$nom_usuari = $usersInfo[$membre['id']];
								$sortida->TableRowStart();
								$sortida->TableColStart();
								$sortida->Text($nom_usuari);
								$sortida->TableColEnd();
								$sortida->TableColStart();
								$sortida->FormCheckbox('uid0[]', 0 ,$membre['id']); //Permetrï¿œ seleccionar l'usuari
								$sortida->TableColEnd();
								$sortida->TableRowEnd();
							}
						}
				$sortida->TableEnd();
			$sortida->TableColEnd();
			$sortida->TableColStart('','','top');
				$sortida->TableStart('','',0,'10');
					$sortida->TableRowStart();	
						$sortida->TableColStart();
							$sortida->FormSubmit(__('Move to the group >> ', $dom),'','submit');
						$sortida->TableColEnd();
					$sortida->TableRowEnd();

					$sortida->TableRowStart('','');
						$sortida->TableColStart();
						    $sortida->FormSubmit(__('Add to the group >> ', $dom),'','submit');
						$sortida->TableColEnd();
					$sortida->TableRowEnd();

					$sortida->TableRowStart();
						$sortida->TableColStart();
						    $sortida->SetInputMode(_PNH_VERBATIMINPUT);
						    $sortida->Text('<hr>');
						    $sortida->SetInputMode(_PNH_PARSEINPUT);
						$sortida->TableColEnd();
					$sortida->TableRowEnd();

					$sortida->TableRowStart();
						$sortida->TableColStart();
						    $sortida->FormSubmit(__('<< Move to the group', $dom),'','submit');
						$sortida->TableColEnd();
					$sortida->TableRowEnd();
					$sortida->TableRowStart();
						$sortida->TableColStart();
						    $sortida->FormSubmit(__('<< add to the group', $dom),'','submit');
						$sortida->TableColEnd();
					$sortida->TableRowEnd();
					$sortida->TableRowStart();
						$sortida->TableColStart();
						    $sortida->SetInputMode(_PNH_VERBATIMINPUT);
						    $sortida->Text('<hr>');
						    $sortida->SetInputMode(_PNH_PARSEINPUT);
						$sortida->TableColEnd();
					$sortida->TableRowEnd();
					$sortida->TableRowStart();
						$sortida->TableColStart();
						    $sortida->FormSubmit(__('Remove from the groups', $dom),'','submit');
						$sortida->TableColEnd();
					$sortida->TableRowEnd();
					$sortida->TableRowStart();	
						$sortida->TableColStart();
						    $sortida->FormSubmit(__('Member of the following groups', $dom),'','submit');
						$sortida->TableColEnd();
					$sortida->TableRowEnd();
				$sortida->TableEnd();
			$sortida->TableColEnd();				

			$sortida->TableColStart('','','top');
				$sortida->TableStart('','',0,'200');
						if(isset($nomembres1)){
							$sortida->TableRowStart();
							$sortida->TableColStart();
							$sortida->Text($nomembres1);
							$sortida->TableColEnd();								
							$sortida->TableRowEnd();
						}else{
							if($gid1 == '' || $gid1 == 0){
								$sortida->TableRowStart();
								$sortida->TableColStart(2);
								$sortida->BoldText(__('Without group', $dom));
								$sortida->TableColEnd();
								$sortida->TableRowEnd();
							}
							foreach($membres1 as $membre1){
								$nom_usuari = $usersInfo[$membre1['id']];
								$sortida->TableRowStart();
								$sortida->TableColStart();
								$sortida->Text($nom_usuari);
								$sortida->TableColEnd();						
								$sortida->TableColStart();
								$sortida->FormCheckbox('uid1[]', 0 ,$membre1['id']); //Permetrï¿œ seleccionar l'usuari
								$sortida->TableColEnd();
								$sortida->TableRowEnd();
							}
						}
				$sortida->TableEnd();
			$sortida->TableColEnd();
		$sortida->TableRowEnd();
	$sortida->TableEnd();
	$sortida->FormEnd();
	$content = $sortida->GetOutput();

	//Transfer to template
	// Create output object
	$pnRender = pnRender::getInstance('iw_groups', false);
	$pnRender->assign('content', $content);
	return $pnRender->fetch('iw_groups_admin_members.htm');
}

/*
Funciï¿œ que recull les dades enviades per la funciï¿œ membres i les gestiona
*/
function iw_groups_admin_grups($args)
{
	$dom = ZLanguage::getModuleDomain('iw_groups');
	list($submit,$uid0,$gid,$gid1,$uid1,$confirmacio) = pnVarCleanFromInput('submit','uid0','gid','gid1','uid1','confirmation');
	$sortida =& new pnHTML();
	//Si els dos grup estan buits. Cancelem l'acciï¿œ
	if(($gid == 0 || $gid == '') && ($gid1 == 0 || $gid1 == '')){
		pnSessionSetVar('errormsg', __('Incorrect action during the group change', $dom));
		return pnRedirect(pnModURL('iw_groups', 'admin', 'membres',
		                            array('gid' => $gid,
										  'gid1' => $gid1)));
	}

	// Security check
	if(!SecurityUtil::checkPermission('iw_groups::', "::", ACCESS_ADMIN)){
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	
	// Confirm authorisation code
	if (!SecurityUtil::confirmAuthKey()) {
		return LogUtil::registerAuthidError (pnModURL('iw_groups', 'user', 'main'));
	}

	$pnRender = pnRender::getInstance('iw_groups',false);

	switch($submit){
		case __('Move to the group >> ', $dom):
			if(empty($uid0)){
				$sortida->Text(__('No user selected', $dom));
				$sortida->Linebreak(2);
				$sortida->URL(pnVarPrepForDisplay(pnModURL('iw_groups', 'admin', 'membres',
				                                            array('gid' => $gid,
															      'gid1' => $gid1))),
															      __('Return to the previous form', $dom));
				$content = $sortida->GetOutput();
				$pnRender->assign('content', $content);
				return $pnRender->fetch('iw_groups_admin_grups.htm');
			}
			//Si el grup de destï¿œ ï¿œs el buit. Cancelï¿œlem l'acciï¿œ
			if(($gid1 == 0 || $gid1 == '')){
				pnSessionSetVar('errormsg', __('Incorrect action during the group change', $dom));
				return pnRedirect(pnModURL('iw_groups', 'admin', 'membres',
				                            array('gid' => $gid,
												  'gid1' => $gid1)));
			}

			//Si l'usuari provï¿œ del grup buit no es demana confirmaciï¿œ i simplement s'afegeix al grup de destï¿œ
			if($gid == '' || $gid == 0){
				$afegit = pnModAPIFunc('iw_groups', 'admin', 'afegeix_membres',
				                        array('gid' => $gid1,
										      'uid' => $uid0));
				return pnRedirect(pnModURL('iw_groups', 'admin', 'membres',
				                            array('gid' => $gid,
												  'gid1' => $gid1)));
			}

			//Si no cal demanar confirmaciï¿œ segons la configuraciï¿œ posem $comfirmacio=true
			if(pnModGetVar('iw_groups', 'confmou') == 0){$confirmacio = true;}
			if (empty($confirmacio)) {

				//get all users information
				$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
				$usersInfo = pnModFunc('iw_main', 'user', 'getAllUsersInfo',
				                        array('sv' => $sv,
											  'info' => 'ncc'));
	        		//Tï¿œtol
				$sortida->Title(__('Move users between groups', $dom));

				//Agafem el nom dels grups
				$grup1 = pnModAPIFunc('iw_groups', 'user', 'get',
				                       array('gid' => $gid));
				$grup2 = pnModAPIFunc('iw_groups', 'user', 'get',
				                       array('gid' => $gid1));

				//Mostrem la llista dels membres a moure
				$sortida->TableStart($grup1['nom_grup'].'->'.$grup2['nom_grup']);
				foreach($uid0 as $id){
					//Agafem el nom dels usuari
					$sortida->TableRowStart();
					$sortida->TableColStart();
					$sortida->Text($usersInfo[$id]);
					$sortida->TableColEnd();
					$sortida->TableRowEnd();
				}
				$sortida->TableEnd();
        		//Afegim la confirmaciï¿œ a la sortida per pantalla
	        	$sortida->ConfirmAction(__('Confirm the transfer of users between groups', $dom), pnModURL('iw_groups', 'admin', 'grups',
	        	                                                                                            array('submit' => $submit,
	        	                                                                                                  'uid0' => $uid0,
	        	                                                                                                  'gid' => $gid,
	        	                                                                                                  'uid1' => $uid1,
	        	                                                                                                  'gid1' => $gid1)),
	        	                                                                                                  __('Cancel the action', $dom),pnVarPrepForDisplay(pnModURL('iw_groups', 'admin', 'membres',
	        	                                                                                                                                                              array('gid' => $gid,
	        	                                                                                                                                                                    'gid1' => $gid1))),
	        	                                                                                                                                                                     array('gid' => $gid,
	        	                                                                                                                                                                           'gid1' => $gid1));
				//Retornem el que ha estat generat per aquesta funciï¿œ
				$content = $sortida->GetOutput();
				$pnRender->assign('content', $content);
				return $pnRender->fetch('iw_groups_admin_grups.htm');

			}

			//Cridem la funciï¿œ API que farï¿œ l'esborrament del registre
			if (pnModAPIFunc('iw_groups', 'admin', 'mou_membres',
			                  array('gid' => $gid,
								    'uid' => $uid0,
									'gid1' => $gid1))) {
				//L'esborrament ha estat un ï¿œxit i ho notifiquem
				LogUtil::registerStatus (_GRUPSMEMBRESESBORRATS);
			}
			break;			
		
		case __('Add to the group >> ', $dom):
			if(empty($uid0)){
				$sortida->Text(__('No user selected', $dom));
				$sortida->Linebreak(2);
				$sortida->URL(pnVarPrepForDisplay(pnModURL('iw_groups', 'admin', 'membres',
				                                            array('gid' => $gid,
															      'gid1' => $gid1))),
														          __('Return to the previous form', $dom));
				$content = $sortida->GetOutput();
				$pnRender->assign('content', $content);
				return $pnRender->fetch('iw_groups_admin_grups.htm');
			}
			
			//Si el grup de destï¿œ ï¿œs el buit. Cancelï¿œlem l'acciï¿œ
			if(($gid1==0 || $gid1=='')){
				pnSessionSetVar('errormsg', __('Incorrect action during the group change', $dom));
				return pnRedirect(pnModURL('iw_groups', 'admin', 'membres',
				                            array('gid' => $gid,
												  'gid1' => $gid1)));
			}			
			
			$afegit = pnModAPIFunc('iw_groups', 'admin', 'afegeix_membres',
			                        array('gid' => $gid1,
										  'uid' => $uid0));
			break;
			
		case __('<< Move to the group', $dom):
			if(empty($uid1)){
				$sortida->Text(__('No user selected', $dom));
				$sortida->Linebreak(2);
				$sortida->URL(pnVarPrepForDisplay(pnModURL('iw_groups', 'admin', 'membres',
				                                            array('gid' => $gid,
															      'gid1' => $gid1))),
														          __('Return to the previous form', $dom));
				$content = $sortida->GetOutput();
				$pnRender->assign('content', $content);
				return $pnRender->fetch('iw_groups_admin_grups.htm');
			}


			//Si el grup de destï¿œ ï¿œs el buit. Cancelï¿œlem l'acciï¿œ
			if(($gid == 0 || $gid == '')){
        			pnSessionSetVar('errormsg', __('Incorrect action during the group change', $dom));
				return pnRedirect(pnModURL('iw_groups', 'admin', 'membres',
				                            array('gid' => $gid,
												  'gid1' => $gid1)));
			}

			//Si l'usuari provï¿œ del grup buit no es demana confirmaciï¿œ i simplement s'afegeix al grup de destï¿œ
			if($gid1 == '' || $gid1 == 0){
				$afegit = pnModAPIFunc('iw_groups', 'admin', 'afegeix_membres',
				                        array('gid' => $gid,
											  'uid' => $uid1));
				pnRedirect(pnModURL('iw_groups', 'admin', 'membres',
				                     array('gid' => $gid,
										   'gid1' => $gid1)));
			}

			//Si no cal demanar confirmaciï¿œ segons la configuraciï¿œ posem $comfirmacio=true
			if(pnModGetVar('iw_groups', 'confmou') == 0){$confirmacio = true;}
			if (empty($confirmacio)) {
				//get all users information
				$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
				$usersInfo = pnModFunc('iw_main', 'user', 'getAllUsersInfo',
				                        array('sv' => $sv,
											  'info' => 'ncc'));

				//Tï¿œtol
				$sortida->Title(__('Move users between groups', $dom));

				//Agafem el nom dels grups
				$grup1 = pnModAPIFunc('iw_groups', 'user', 'get',
				                       array('gid' => $gid1));
				$grup2 = pnModAPIFunc('iw_groups', 'user', 'get',
				                       array('gid' => $gid));
				//Mostrem la llista dels membres a moure
				$sortida->TableStart($grup1['nom_grup'].'->'.$grup2['nom_grup']);
				foreach($uid1 as $id){
					//Agafem el nom dels usuari
					$nom_usuari = $usersInfo[$id];
					$sortida->TableRowStart();
					$sortida->TableColStart();
					$sortida->Text($nom_usuari);
					$sortida->TableColEnd();
					$sortida->TableRowEnd();
				}
				$sortida->TableEnd();				//Afegim la confirmaciï¿œ a la sortida per pantalla
				$sortida->ConfirmAction(__('Confirm the transfer of users between groups', $dom),pnModURL('iw_groups', 'admin', 'grups',
				                                                                                           array('submit' => $submit,
				                                                                                                 'uid' => $uid,
				                                                                                                 'gid' => $gid,
				                                                                                                 'uid1' => $uid1,
				                                                                                                 'gid1' => $gid1)),
				                                                                                                 __('Cancel the action', $dom),pnVarPrepForDisplay(pnModURL('iw_groups', 'admin', 'membres',
				                                                                                                                                                             array('gid' => $gid,
				                                                                                                                                                                   'gid1' => $gid1))),
				                                                                                                                                                                    array('gid' => $gid,
				                                                                                                                                                                          'gid1' => $gid1));

				//Retornem el que ha estat generat per aquesta funciï¿œ
				$content = $sortida->GetOutput();
				$pnRender->assign('content', $content);
				return $pnRender->fetch('iw_groups_admin_grups.htm');
			}

			//Cridem la funciï¿œ API que farï¿œ l'esborrament del registre
			if (pnModAPIFunc('iw_groups', 'admin', 'mou_membres',
			                  array('gid'=>$gid1,
			                        'uid' => $uid1,
			                        'gid1' => $gid))) {
				//L'esborrament ha estat un ï¿œxit i ho notifiquem
				LogUtil::registerStatus (_GRUPSMEMBRESESBORRATS);
			}
			break;
		case __('<< add to the group', $dom):
			if(empty($uid1)){
		    		$sortida->Text(__('No user selected', $dom));
	   	    		$sortida->Linebreak(2);
		    		$sortida->URL(pnVarPrepForDisplay(pnModURL('iw_groups', 'admin', 'membres',
		    		                                            array('gid' => $gid,
		    		                                                  'gid1' => $gid1))),
		    		                                                  __('Return to the previous form', $dom));
				$content = $sortida->GetOutput();
				$pnRender->assign('content', $content);
				return $pnRender->fetch('iw_groups_admin_grups.htm');
			}

			//Si el grup de destï¿œ ï¿œs el buit. Cancelï¿œlem l'acciï¿œ
			if(($gid == 0 || $gid == '')){
				pnSessionSetVar('errormsg', __('Incorrect action during the group change', $dom));
				return pnRedirect(pnModURL('iw_groups', 'admin', 'membres',
				                            array('gid' => $gid,
												  'gid1' => $gid1)));
			}
			$afegit = pnModAPIFunc('iw_groups', 'admin', 'afegeix_membres',
			                        array('gid' => $gid,
										  'uid' => $uid1));
			break;

		case __('Remove from the groups', $dom):
			if(empty($uid0) && empty($uid1)){
				$sortida->Text(__('No user selected', $dom));
				$sortida->Linebreak(2);
				$sortida->URL(pnVarPrepForDisplay(pnModURL('iw_groups', 'admin', 'membres',
				                                            array('gid' => $gid,
															      'gid1' => $gid1))), 
														          __('Return to the previous form', $dom));
				$content = $sortida->GetOutput();
				$pnRender->assign('content', $content);
				return $pnRender->fetch('iw_groups_admin_grups.htm');
			}
			
			//Si no cal demanar confirmaciï¿œ segons la configuraciï¿œ posem $comfirmacio=true
			if (pnModGetVar('iw_groups', 'confesb')==0) {$confirmacio=true;}
			if (empty($confirmacio)) {
				//get all users information
				$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
				$usersInfo = pnModFunc('iw_main', 'user', 'getAllUsersInfo',
				                        array('sv' => $sv,
											  'info' => 'ncc'));
				//Tï¿œtol
				$sortida->Title(__('Delete the members of the groups ', $dom));

				//Muntem la llista dels membres a esborrar
				$sortida->TableStart();
				$sortida->TableRowStart();
				$sortida->TableColStart();
				//Membres de la llista de l'esquerra
				if(!empty($uid0)){
					//Agafem el nom del grup
					$grup=pnModAPIFunc('iw_groups', 'user', 'get',
					                    array('gid'=>$gid));
					$sortida->TableStart($grup['nom_grup']);
					foreach($uid0 as $id){
						//Agafem el nom dels usuari
						$nom_usuari = $usersInfo[$id];
						$sortida->TableRowStart();
						$sortida->TableColStart();
						$sortida->Text($nom_usuari);
						$sortida->TableColEnd();
						$sortida->TableRowEnd();
					}
					$sortida->TableEnd();
				}
				$sortida->TableColEnd();
				$sortida->TableColStart();				

				//Membres de la llista de la dreta
				if(!empty($uid1)){
					//Agafem el nom del grup
					$grup = pnModAPIFunc('iw_groups', 'user', 'get',
					                      array('gid' => $gid1));
					$sortida->TableStart($grup['nom_grup']);
					foreach ($uid1 as $id) {
						//Agafem el nom dels usuari
						$nom_usuari = $usersInfo[$id];
						$sortida->TableRowStart();
						$sortida->TableColStart();
						$sortida->Text($nom_usuari);
						$sortida->TableColEnd();
						$sortida->TableRowEnd();
					}
					$sortida->TableEnd();
				}
				$sortida->TableColEnd();					
				$sortida->TableRowEnd();				
				$sortida->TableEnd();
				//Afegim la confirmaciï¿œ a la sortida per pantalla
				$sortida->ConfirmAction(__('Confirm the action', $dom),pnModURL('iw_groups', 'admin', 'grups',
				                                                                 array('submit' => $submit,
				                                                                       'uid0' => $uid0,
				                                                                       'gid' => $gid,
				                                                                       'uid1' => $uid1,
				                                                                       'gid1' => $gid1)),
				                                                                       __('Cancel the deletion', $dom),
				                                                                       pnVarPrepForDisplay(pnModURL('iw_groups', 'admin', 'membres',
				                                                                                                     array('gid' => $gid,
				                                                                                                           'gid1' => $gid1))),
				                                                                                                            array('gid' => $gid,
				                                                                                                                  'gid1' => $gid1));

				//Retornem el que ha estat generat per aquesta funciï¿œ
				$content = $sortida->GetOutput();
				$pnRender->assign('content', $content);
				return $pnRender->fetch('iw_groups_admin_grups.htm');
			}
			//Cridem la funciï¿œ API que farï¿œ l'esborrament del registre
			if (pnModAPIFunc('iw_groups', 'admin', 'esborra_membres',
			                  array('uid' => $uid0,
								    'gid' => $gid,
									'uid1' => $uid1,
									'gid1' => $gid1))) {
				//L'esborrament ha estat un ï¿œxit i ho notifiquem
				LogUtil::registerStatus (_GRUPSMEMBRESESBORRATS);
			}
			break;
		case __('Member of the following groups', $dom):
			if(empty($uid0) && empty($uid1)){
				$sortida->Text(__('No user selected', $dom));
				$sortida->Linebreak(2);
				$sortida->URL(pnVarPrepForDisplay(pnModURL('iw_groups', 'admin', 'membres',
				                                            array('gid' => $gid,
															      'gid1' => $gid1))), 																__('Return to the previous form', $dom));
				$content = $sortida->GetOutput();
				$pnRender->assign('content', $content);
				return $pnRender->fetch('iw_groups_admin_grups.htm');
			}

			if (!empty($uid0) && !empty($uid1)) {
				$usuaris = array_merge($uid0,$uid1);
			} elseif (!empty($uid0)) {
				$usuaris = $uid0;
			} else {
				$usuaris = $uid1;
			}
			$quins = pnModFunc('iw_groups', 'admin', 'quins', array('usuaris' => $usuaris));
			$sortida->SetInputMode(_PNH_VERBATIMINPUT);
			$sortida->text($quins);
			$sortida->SetInputMode(_PNH_PARSEINPUT);			
			$sortida->Linebreak(2);
			$sortida->URL(pnVarPrepForDisplay(pnModURL('iw_groups', 'admin', 'membres',
			                                            array('gid' => $gid,
														      'gid1' => $gid1))),
														      __('Return to the previous form', $dom));
			$content = $sortida->GetOutput();
			$pnRender->assign('content', $content);
			return $pnRender->fetch('iw_groups_admin_grups.htm');
			break;
		case _GRUPSCANVIA:
			if($gid == ''){$gid = 0;};
			if($gid1 == ''){$gid1 = 0;};
			break;
	}

	return pnRedirect(pnModURL('iw_groups', 'admin', 'membres',
	                            array('gid' => $gid,
									  'gid1' => $gid1)));				
}

/*
Funcio que retorna els grups i subgrups als quals pertany un usuari
*/
function iw_groups_admin_quins($args)
{
	$dom = ZLanguage::getModuleDomain('iw_groups');
	list($usuaris) = pnVarCleanFromInput('usuaris');
	$sortida =& new pnHTML();	
	extract($args);

	// Security check
	if(!SecurityUtil::checkPermission('iw_groups::', "::", ACCESS_ADMIN)){
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	//Si els dos grup estan buits. Cancelem l'acciï¿œ
	if(empty($usuaris)){
		pnSessionSetVar('errormsg', __('Incorrect action during the group change', $dom));
		return pnRedirect(pnModURL('iw_groups', 'admin', 'membres',
		                            array('gid'=>$gid,
		                                  'gid1'=>$gid1)));
	}

	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$usersInfo = pnModFunc('iw_main', 'user', 'getAllUsersInfo',
	                        array('sv' => $sv,
								  'info' => 'ccn'));

	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$groups = pnModFunc('iw_main', 'user', 'getAllGroupsInfo',
	                     array('sv' => $sv));

	$sortida->title(__('Groups to which the users belong ', $dom));
	//Treiem per pantalla la taula amb els grups dels usuaris seleccionats
	foreach($usuaris as $id){
		$nom_usuari = $usersInfo[$id];			
		$sortida->TableStart($nom_usuari,array(__('Groups', $dom)), 1, 10);
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		$quinsgrups = pnModFunc('iw_main', 'user', 'getAllUserGroups',
		                         array('sv' => $sv,
									   'uid' => $id));
		foreach ($quinsgrups as $group) {
			$sortida->TableRowStart();
			$sortida->TableColStart('','','top');
			$sortida->Text($groups[$group['id']]);
			$sortida->TableColend();
			$sortida->Tablerowend();
		}
		$sortida->TableEnd();
		$sortida->LineBreak(1);
	}
	return $sortida->GetOutput();			
}

/*
Modificaciï¿œ de la configuraciï¿œ del mï¿œdul de grups
*/
function iw_groups_admin_configura()
{
	$dom = ZLanguage::getModuleDomain('iw_groups');
	$sortida =& new pnHTML();

	// Security check
	if(!SecurityUtil::checkPermission('iw_groups::', "::", ACCESS_ADMIN)){
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	//Agafem les dades de configuraciï¿œ
	$grupinici = pnModGetVar('iw_groups', 'grupinici');
	$confesb = pnModGetVar('iw_groups', 'confesb');
	$confmou = pnModGetVar('iw_groups', 'confmou');

	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$grups = pnModFunc('iw_main', 'user', 'getAllGroups',
	                    array('sv' => $sv));
	if(empty($grups)){
		$sortida->text(__('No groups found', $dom));
		return $sortida->GetOutput();
	}
	$sortida->FormStart(pnModURL('iw_groups', 'admin', 'conf_modifica'));
	$sortida->FormHidden('authid', pnSecGenAuthKey());
	$sortida->TableStart();
	$sortida->TableRowStart();
	$sortida->TableColStart();	
	$sortida->Text(__('Initial group', $dom));
	$sortida->TableColEnd();
	$sortida->TableColStart();		
	$sortida->FormSelectMultiple('grupinici', $grups, 0, 0, $grupinici);
	$sortida->TableColEnd();		
	$sortida->TableRowEnd();
	$sortida->TableRowStart();
	$sortida->TableColStart();	
	$sortida->Text(__('Confirm the deletion of groups membership', $dom));
	$sortida->TableColEnd();
	$sortida->TableColStart();		
	$sortida->FormCheckbox('confesb', $confesb);
	$sortida->TableColEnd();		
	$sortida->TableRowEnd();
	$sortida->TableRowStart();
	$sortida->TableColStart();	
	$sortida->Text(__('Confirm the transfer of members between groups', $dom));
	$sortida->TableColEnd();
	$sortida->TableColStart();		
	$sortida->FormCheckbox('confmou', $confmou);
	$sortida->TableColEnd();		
	$sortida->TableRowEnd();
	$sortida->TableEnd();
	$sortida->Linebreak(2);	
	$sortida->FormSubmit(__('Modify', $dom));
	$sortida->FormEnd();
	$content = $sortida->GetOutput();
	//Transfer to template
	// Create output object
	$pnRender = pnRender::getInstance('iw_groups', false);
	$pnRender->assign('content', $content);
	return $pnRender->fetch('iw_groups_admin_conf.htm');
}

/*
Canvi de la configuraciï¿œ del mï¿œdul
*/
function iw_groups_admin_conf_modifica($args)
{
	$dom = ZLanguage::getModuleDomain('iw_groups');
	list($grupinici, $obid, $confesb, $confmou)= pnVarCleanFromInput('grupinici','obid','confesb','confmou');
	if(!isset($confesb)){$confesb = 0;}
	if(!isset($confmou)){$confmou = 0;}
	// Security check
	if(!SecurityUtil::checkPermission('iw_groups::', "::", ACCESS_ADMIN)){
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	// Confirm authorisation code
	if (!SecurityUtil::confirmAuthKey()) {
		return LogUtil::registerAuthidError (pnModURL('iw_groups', 'user', 'main'));
	}
	if (!isset($grupinici)) {$grupinici = 0;}
	//Establim les variables de configuraciï¿œ
	pnModSetVar('iw_groups', 'grupinici', $grupinici);
	pnModSetVar('iw_groups', 'confesb', $confesb);
	pnModSetVar('iw_groups', 'confmou', $confmou);
	LogUtil::registerStatus (__('Configuration updated', $dom));
	return pnRedirect(pnModURL('iw_groups', 'admin', 'main'));
}