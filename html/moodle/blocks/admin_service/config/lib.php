<?php


/*---------------- funcions genèriques de connexió als diferents entorns ------------------*/
/**
 * funció de connexió a l'entorn actual
 *
 * @return boolean
 */








/**
 * realitza un insert a la taula que es digui (amb prefix)
 *
 * @param String $table: nom de la taula
 * @param String $query: la query d el'insert on es posa $id en el lloc de l'id
 * @return l'id de la row o false
 */
/*
function saurus_insert($table, $query){
	global $ADM;
	if(!$ADM->saurushandler){
		if(!saurus_connect()){
			return false;
		}
	}
	//mirem si li ha posat el prefix a la taula o no
	if (strpos($table,saurus_prefix())!==0) $table = saurus_prefix().$table;
	//busquem l'id
	$nextval = saurus_query("SELECT NEXTVAL('{$table}_id_seq')");
	$nextval=saurus_fetch($nextval);
	$nextval=$nextval->nextval;
	//canviem $id o &id pel que toqui
	$q=str_replace('$id', $nextval, $query);
	$q=str_replace('&id', $nextval, $q);
	//mirem si el tio ha posat insert o no
	if (strpos($q,'insert')!==0 AND strpos($q,'INSERT')!==0) $q = "INSERT INTO $table ".$q;
	//echo $q.'<br/>';
	if(!$res_query=saurus_query($q)){
		return false;
	}
	return $nextval;
}
*/



/*---------------- funcions concretes per consultar les bd locals -------------------------*/





/*---------------- formulari ----------------------*/

//----- CLASSE PER A GENERAR FORMULARIS AMB EL QUICKFORMS ------

require_once($CFG->libdir.'/formslib.php');

class form_service extends moodleform {

    function definition() {
        global $COURSE;
        $mform    =& $this->_form;
     }
    
    function estat_serveis(){
		global $CFG;
		$row = array();
		$servernames = array();
		//$semImage = '';
		$rows = array();
		$serverresult = array();
    	$mform    =& $this->_form;
    	//per cada servei busquem les seves dades:
   		$entorns = entorns_disponibles(true);
   		//controlarem la ubicació de les diferents entrades de clients
     	//a la posició 0 sempre tindrem la configuració del sistema base
   		$i = 1;   		
   		foreach ($entorns as $e) {
   			//preparem la imatge segons semafor
	     	$semImage = imatge_semafor($e->semafor);
	     	
     		/*if($e->nom != 'ADMIN_SERVER'){
   				//anem a buscar les sessions de moodle que es troben a la taula concreta
	     		//$select ="select * from {$CFG->prefix}analytics_{$e->nom}_sessions where id = (select max(id) from mdl_analytics_{$e->nom}_sessions)";
	     		 * $select ="select * from {$CFG->prefix}analytics_{$e->id}_sessions where id = (select max(id) from mdl_analytics_{$e->id}_sessions)";
	     		$sessions = get_record_sql($select); 
   			}*/
     		
     		//el cas del servei bàsic és diferent de la resta de clients
     		if($e->nom_client == 'SERVER'){
     			$aux = clone($e);//array ('<span style="color:grey">'.$e->nom.'</span>',$semImage,'<span style="color:grey"></span>');
     			$aux->semImage = $semImage; 
				if(!isset($servernames["$e->server_name"])){
					$servernames["$e->server_name"] = new object;
					$servernames["$e->server_name"]->id  = $e->id;
					$servernames["$e->server_name"]->nom_client  = $e->nom_client;
					$servernames["$e->server_name"]->semImage  = $aux->semImage = $semImage;
					$servernames["$e->server_name"]->smoodle  = 0;
				}
				//array_unshift($rows, array ('<a href="index.php?select='.$e->id.'"><span style="color:grey">'.$aux->nom_client.'</span></a>',$aux->semImage,'<span style="color:grey">'.$servernames["$e->server_name"].'</span>'));
				//$rows[0] = array ('<a href="index.php?select='.$e->id.'"><span style="color:grey">'.$aux->nom_client.'</span></a>',$aux->semImage,'<span style="color:grey">'.$aux->smoodle.'</span>');
     		}else{
     			//anem a buscar les sessions de moodle que es troben a la taula concreta
	     		//$select ="select * from {$CFG->prefix}analytics_{$e->nom}_sessions where id = (select max(id) from {$CFG->prefix}analytics_{$e->nom}_sessions)";
	     		$select ="select * from {$CFG->prefix}analytics_{$e->id}_sessions where id = (select max(id) from {$CFG->prefix}analytics_{$e->id}_sessions)";
	     		$sessions = get_record_sql($select); 
     			//en la primera instalació no existeix $sessions->smoodle 
     			if(!isset($sessions->smoodle)) $sessions->smoodle =0;
     			$servernames["$e->server_name"]->smoodle += $sessions->smoodle; 
     			$row = array ('<a href="index.php?select='.$e->id.'">'.$e->nom_client.'</a>',$semImage,$sessions->smoodle);
				array_push($rows, $row);
     		}
//    		$rows[$i]=$row;
     		$i ++;
        }
    	//Actualizar el numero de sessiones.
        foreach ($servernames as $key => $server){
        	$serverresult[$key]=  array ('<a href="index.php?select='.$server->id.'"><span style="color:grey">'.$server->nom_client.'</span></a>',$server->semImage,'<span style="color:grey">'.$server->smoodle.'</span>');
        	array_unshift($rows, $serverresult[$key]);	
        }
        
    	$table_consult = new stdClass;
    	$table_consult->head= array (get_string('instance', 'block_admin_service'),get_string('semafor', 'block_admin_service'),get_string('smoodle', 'block_admin_service'));
    	$table_consult->wrap = array ('nowrap','');
		$table_consult->align = array ('center','center','center','center','center','center');
		$table_consult->data = $rows;
		$table_consult->width = '80%';
		print_table($table_consult);
    }
    
    
     
     
    function basic(){
    	$mform    =& $this->_form;
    /*	$entorns = array();
    	$entorn[-1]='Selecciona un entorn';
        $entorns = entorns_disponibles(true);
     	foreach ($entorns as $e) {
            $entorn[$e->id] = $e->nom;
        }
        if($entorns){
        	$buttonarray = array();
    		$buttonarray[] = &$mform->createElement('select', 'id_entorn','a', $entorn);
    		$buttonarray[] = &$mform->createElement('submit','escull','Enviar');
        	$mform->addGroup($buttonarray, 'buttonar', 'Escull l\'entorn', array(' '), false);
        	$mform->setType('buttonar', PARAM_RAW);
        	
        }
        else
        	$mform->addElement('static', 'escull', 'No hi ha cap entorn configurat');*/
		$mform->addElement('submit','nou','Crea un nou entorn','align="center"');
    }
    
    function &get_mform () {
    	return $this->_form;
    }
    
    /**
     * posa els botons de guardar i cancel·lar al formulari
     */
	function add_action_buttons() {
		$mform =& $this->_form;
		$buttonarray = array();
    	$buttonarray[] = &$mform->createElement('submit', 'guardar', 'Guardar');
    	$buttonarray[] = &$mform->createElement('cancel','cancel', 'Cancel·lar');
        $mform->addGroup($buttonarray, 'buttonar', '', array(' '), false);
        $mform->setType('buttonar', PARAM_RAW);
        $mform->closeHeaderBefore('buttonar');
    }
    
    
    
    
    /**
     * afegeix un botó de modificar
     */
    function add_modify_button () {
    	$mform =& $this->_form;
		$buttonarray = array();
    		$buttonarray[] = &$mform->createElement('submit', 'update', 'Modificar');
    		$buttonarray[] = &$mform->createElement('cancel','cancel', 'Acceptar');
        	$mform->addGroup($buttonarray, 'buttonar', '', array(' '), false);
        	$mform->setType('buttonar', PARAM_RAW);
        	$mform->closeHeaderBefore('buttonar');
    }
    
    
/**
     * afegeix un botó d'acceptar per no fer cap acció sobre l'element
     */
    function add_accept_button () {
    	$mform =& $this->_form;
    	$mform->closeHeaderBefore('cancel');
    	$mform->addElement('submit','cancel','Acceptar');
    }
    
    
    function camps_entorn($info=null,$bloquejat= false,$modificacio=false){
    		
    	global $CFG;
    	$mform =& $this->_form;
    	
    	if(!$info){
    		
    		$info = new stdClass;
    		$info->nom = '';
    		$info->nom_client ='';
    		$info->usuaris_concurrents='';
    		$info->permissibilitat = '';
    		$info->observacions = '';
    		$info->id = '';
    		//$info->dbtype = 'postgres';
    		$info->dbtype = $CFG->dbtype;
    		$info->dbhost = '';
    		$info->dbuser = '';
    		$info->dbpass = '';
    		//$info->dbport = '5432';
    		//si no tenim $CFG->dbport i és postgres posem el per defecte, altrament 0
    		//cal que el dbtype inclogui la paraula postgres
    		$pattern = '/.*postgres.*/';
    		if(isset($CFG->dbport)) $info->dbport = $CFG->dbport;
    		else if(!isset($CFG->dbport) && preg_match($pattern,$CFG->dbtype)){
    			$info->dbport ='5432';
    		}else{
    			$info->dbport=0;
    		}
    		$info->dbname = '';
    		(isset($CFG->dbpersist)&& $CFG->dbpersist)?$info->dbpersist = 'true':$info->dbpersist='false';
    		(isset($CFG->prefix))?$info->prefix = $CFG->prefix:$info->prefix = 'mdl_';
    		$info->server_name = '';
    	}
    	
    	    	
     	//preparem la imatge segons semafor
     	if(!isset($info->semafor)) $info->semafor=0;
    	$semImage = imatge_semafor($info->semafor);
    	
    	//si es el per defecte cal modificar uns altres camps
    	if($info->nom_client == 'SERVER' || $info->nom == 'ADMIN_SERVER') {
    		//dades client
    		$mform->addElement('header', 'dades_server', ucwords(get_string('dadesservei','block_admin_service')));
    		$max = get_field('config','value','name','maxpostgres'.$info->id);
    		$critic = get_field('config','value','name','limitcritic'.$info->id);
    		$warning = get_field('config','value','name','limitwarning'.$info->id);
    		$mform->addElement('hidden','nom',$info->nom);
    		if(!$bloquejat ){ 
    			$estat = 'static';
    			$mform->addElement('hidden','id_un',$info->id);
    			$mform->addElement($estat,'maxpostgres','maxpostgres',$max);
    			$mform->addElement($estat,'limitcritic','limitcritic',$critic);
    			$mform->addElement($estat,'limitwarning','limitwarning',$warning);
    		}else{
    			$estat = 'text';
    			$mform->addElement('hidden','id_dos',$info->id);
    			$mform->addElement($estat,'maxpostgres','maxpostgres','value='.$max);
    			$mform->addElement($estat,'limitcritic','limitcritic','value='.$critic);
    			$mform->addElement($estat,'limitwarning','limitwarning','value='.$warning);
    		}
    		
    	}else{
    		//dades client
    		$mform->addElement('header', 'dades_client', ucwords(get_string('dadesclient','block_admin_service')));
	    	if(!$bloquejat ){ 
	    		$estat = 'static';
	    		$mform->addElement($estat,'nom_client',get_string('nomclient','block_admin_service'),$info->nom_client);
	    		$mform->addElement($estat,'usuaris_concurrents',get_string('usuconcurrents','block_admin_service'),$info->usuaris_concurrents);
	    		$mform->addElement($estat,'permissibilitat',get_string('permisibilitat','block_admin_service'),$info->permissibilitat);
	    		//$mform->addElement($estat,'semafor','Semàfor',$info->semafor);
	    		$mform->addElement('static','semafor',get_string('semafor','block_admin_service'), $semImage);
	    		//--
	    		/*if (!empty($CFG->gdversion)) {
	                $image_el =& $mform->getElement('semafor');
	                $image_el->setValue($semImage);
	            }*/
	            //--
	    		//$mform->addElement($estat,'semafor','Semàfor', '1');
	    		$mform->addElement($estat,'observacions',get_string('observacions','block_admin_service'),$info->observacions);
	    	}else{
	    		$estat = 'text';
	    		if($modificacio)
	    			$mform->addElement('static','nom_client',get_string('nomclient','block_admin_service'),$info->nom_client);
	    		else
	    			$mform->addElement('text','nom_client',get_string('nomclient','block_admin_service'),'value='.$info->nom_client);
	    		$mform->addElement($estat,'usuaris_concurrents',get_string('usuconcurrents','block_admin_service'),'value='.$info->usuaris_concurrents);
	    		$mform->addElement($estat,'permissibilitat',get_string('permisibilitat','block_admin_service'),'value='.$info->permissibilitat);
	    		//$mform->addElement('static','semafor','Semàfor',$info->semafor);
	    		$mform->addElement('static','semafor',get_string('semafor','block_admin_service'), $semImage);
	    		//--
	    		/*if (!empty($CFG->gdversion)) {
	                $image_el =& $mform->getElement('semafor');
	                $image_el->setValue($semImage);
	            }*/
	            //--
	    		$mform->addElement('textarea','observacions',get_string('observacions','block_admin_service'), array('rows'=>6, 'cols'=>60));
	    		$mform->setDefault('observacions',$info->observacions);
	 			
	    	}
	    	//$mform->setDefault('semafor','0');
	    	//$mform->setDefault('semafor',$r, true);
	    	
	    	//dades conexio
	    	$mform->addElement('header', 'dades_connexio', ucwords(get_string('dadesconexio','block_admin_service')));
	    	if(!$bloquejat){ 
	    		$estat = 'static';
	    		//$mform->addElement('hidden','id_mod',$info->id);
	    		$mform->addElement('hidden','id_un',$info->id); 
	    		$mform->addElement($estat,'nom',get_string('nomentorn','block_admin_service'),$info->nom);
	    		$mform->addElement($estat,'dbtype',get_string('tipusbd','block_admin_service'), $info->dbtype);
	   			$mform->addElement($estat,'dbhost',get_string('hostbd','block_admin_service'), $info->dbhost);
	   			$mform->addElement($estat,'dbuser',get_string('usuaribd','block_admin_service'), $info->dbuser);
	   			//TIPO PASSWORD: $mform->addElement($estat,'dbpass',get_string('pswbd','block_admin_service'), $info->dbpass);
	   			$mform->addElement($estat,'dbport',get_string('portbd','block_admin_service'), $info->dbport);
	   			$mform->addElement($estat,'dbname',get_string('nombd','block_admin_service'), $info->dbname);
	   			$mform->addElement($estat,'dbpersist',get_string('persistenciabd','block_admin_service'), $info->dbpersist);
	   			$mform->addElement($estat,'prefix',get_string('prefix','block_admin_service'),$info->prefix);
	   			$mform->addElement($estat,'server_name',get_string('server_name','block_admin_service'),$info->server_name);
	   		}
	    	else{
	    		$estat = 'text';
	    		$mform->addElement('hidden','id_dos',$info->id);
	    		//$mform->addElement('text','id_element','id_element',$info->id);
	    		if($modificacio)
	    			$mform->addElement('static','nom',get_string('nomentorn','block_admin_service'),$info->nom);
	    		else	
	    			$mform->addElement('text','nom',get_string('nomentorn','block_admin_service'),'value='.$info->nom);
	    			
	    		
	   			$mform->addElement($estat,'dbtype',get_string('tipusbd','block_admin_service'), 'value='.$info->dbtype);
	   			/*if(!isset($info->dbtype))
	   				$mform->setDefault('dbtype','postgres');*/
	   			$mform->addElement($estat,'dbhost',get_string('hostbd','block_admin_service'), 'value='.$info->dbhost);
	   			$mform->addElement($estat,'dbuser',get_string('usuaribd','block_admin_service'), 'value='.$info->dbuser);
	   			//TIPO PASSWORD: //$mform->addElement($estat,'dbpass',get_string('pswbd','block_admin_service'), 'value='.$info->dbpass);
	   			$mform->addElement('passwordunmask','dbpass',get_string('pswbd','block_admin_service'), 'value='.$info->dbpass);
	   			$mform->addElement($estat,'dbport',get_string('portbd','block_admin_service'), 'value='.$info->dbport);
	   			/*if(!isset($info->dbport))
	   				$mform->setDefault('dbport','5432');*/
	   			$mform->addElement($estat,'dbname',get_string('nombd','block_admin_service'), 'value='.$info->dbname);
	   			$mform->addElement($estat,'dbpersist',get_string('persistenciabd','block_admin_service'), 'value='.$info->dbpersist);
	   		/*	if(!isset($info->dbpersist))
	   				$mform->setDefault('dbpersist','false');*/
	   			$mform->addElement($estat,'prefix',get_string('prefix','block_admin_service'),'value='.$info->prefix);
	   			$mform->addElement($estat,'server_name',get_string('server_name','block_admin_service'),'value='.$info->server_name);
	   		/*	if(!isset($info->prefix))
	   				$mform->setDefault('prefix','mdl_');*/
	    	}
    	}
    }
    

    function is_cancelled(){
    	$mform =& $this->_form;
        if ($mform->isSubmitted()){
        	if (optional_param('cancel', 0, PARAM_RAW)){
            	return true;
            }
        }
        return false;
    }

    /*
     * indica si s'ha premut el boto per salvar les dades
     */
    function salvar(){
    	$mform =& $this->_form;
        if ($mform->isSubmitted()){
        	if (optional_param('guardar', 0, PARAM_RAW)){
            	return true;
            }
        }
        return false;
    	
    }
    
	/*
     * indica si s'ha premut el boto per salvar les dades
     */
    function modificar(){
    	$mform =& $this->_form;
        if ($mform->isSubmitted()){
        	if (optional_param('update', 0, PARAM_RAW)){
            	return true;
            }
        }
        return false;
    	
    }
    
    
    /*
     * guarda l'objecte que li pasen per parametre a la bd
     * 
     * 
     */
    function save($dades){
    	$connexio = new stdClass;
    	if(!$dades){
    		return false;
    	}
    	else{
    		
    		
    		
    		//si tenim dades del SERVER hem de guardar a la config
    		//sino és el normal
    		$server = false;
    		if(isset($dades->maxpostgres)){
    			$server = true;
                if (get_field('config','value','name','maxpostgres'.$dades['id'])!=null){
                    if(!set_field('config','value',$dades['maxpostgres'],'name','maxpostgres'.$dades['id'])){
        				return false;                    
                    }
                }else {
                    $record['name']='maxpostgres'.$dades['id'];
                    $record['value']=$dades['maxpostgres'];
                    if (!insert_record('config', $record)){
        				return false;                                            
                    }
    			}
    		}
    		if(isset($dades->limitcritic)){
    			$server = true;
                if (get_field('config','value','name','limitcritic'.$dades['id'])!=null){
                    if(!set_field('config','value',$dades['limitcritic'],'name','limitcritic'.$dades['id'])){
        				return false;                    
                    }
                }else {
                    $record['name']='limitcritic'.$dades['id'];
                    $record['value']=$dades['limitcritic'];
                    if (!insert_record('config', $record)){
        				return false;                                            
                    }
    			}
    		}
    		if(isset($dades->limitwarning)){
    			$server = true;
                if (get_field('config','value','name','limitwarning'.$dades['id'])!=null){
                    if(!set_field('config','value',$dades['limitwarning'],'name','limitwarning'.$dades['id'])){
        				return false;                    
                    }
                }else {
                    $record['name']='limitwarning'.$dades['id'];
                    $record['value']=$dades['limitwarning'];
                    if (!insert_record('config', $record)){
        				return false;                                            
                    }
    			}
    		}
    		
    		if(!$server){
    			//muntem els dos vectors amb dades 
	    		foreach($dades as $nom=>$dada){
	    			$connexio->$nom=$dada;
	    		}
				//print_object($connexio);
	    		//si tenim id entorn es que es una modificació
	    		//print_object($connexio);
	    		if(isset($connexio->id)){
	    			if(!update_record('analytics',addslashes_object($connexio))){
	    				return false;
	    			}
	    		}else{
	    		
	    			if(!$connexio->nom || $connexio->nom ==''){
	    				return false;
	    			}
	    			
	    			//comprovem que no hi hagi un entorn amb el mateix nom
	    			if(get_record('analytics','nom',$connexio->nom)){
	    				return false;
	    			}
	    			
	    			
	    			//creem les taules auxiliars per aquesta nova connexio
	    			$resultatId = insert_record ('analytics',addslashes_object($connexio));
	    		
	    			//print_object($resultat);
	    			if ($resultatId){
		    			//$resultat = crea_taules($dades['nom'],$dades['dbtype']);
		    			$resultat = crea_taules($resultatId,$dades['dbtype']);
		    			
		    	
		    			if(!$resultat){
		    				//borrem les taules
		    				borra_taules($resultat);
		    				return false;
		    			}
		    			//$resultat = insert_record ('analytics',addslashes_object($connexio));
		    		
		    			/*if(!$resultat){
		    				//borrem les taules
		    				borra_taules($dades['nom']);
		    				return false;
		    			}*/
		    			$dades['id']=$resultatId;
	    			}	
	    		}
    		
    		
    			
    		}
    	}
    	return $dades;
    }
    
/*
     * obte les dades d'un registre concret
     * 
     */
    function dades_entorn($id){
    	
    	if(!$id){
    		return false;
    	}
    	$resultat = new stdClass;
    	$resultat = get_record('analytics','id',$id);
    	if(!$resultat){
    		return false;
    	}
    	else{
    		return $resultat;
    	}
    		
    }
    
    function get_dades(){    	
    	$mform = $this->get_mform();
    	$fromform = $mform->_submitValues;
    	unset($fromform['sesskey']); // we do not need to return sesskey
        unset($fromform['_qf__'.$this->_formname]);   // we do not need the submission marker too
        unset($fromform['MAX_FILE_SIZE']);
    	return $fromform;
    }
    
    
    function is_validated(){
    	return true;
    }
}
?>