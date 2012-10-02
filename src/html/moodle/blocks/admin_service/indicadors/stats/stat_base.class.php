<?php
/**
 * classe bàsica per a les estadístiques
 */
class stat_base {
	function nom () {
		//return get_string ('elegir_data','admupc');
		return "Selecció del període  i filtres";
	}
	
	function descripcio () {
		//return get_string ('elegir_data_desc','admupc');
		return "Aquest formulari permet elegir el rang de temps i " .
				"el filtratge que s'aplicarà a les estadístiques.";
	}
	
	/**
	 * tracta el formulari. S'executa abans de printar res per pantalla
	 * @return Boolean (fals si retorna error, true si be)
	 */
	function tractament () {
	}
	
	/**retorna el formulari associat a l'indicador
	 * @return String
	 */
	function form () {
	}
	
	/**
	 * mostra el contingut de la estadística
	 * @param: dades de la selecció de temps
	 */
	function contingut ($seleccio) {
		
		//mirem si es professor
		$form = '<form action="index.php" method="post">';
		//cris afegeixo els selector dels entorns disponibles
		$form.= get_selector_entorns();
		$form.= get_selector_temps ();
		//$form.= get_selector_filtres ();
		$form.= '<input type="submit" value="Salvar Període"/>';
		$form.= '</form>';
		
		return $form;
	}
	
	/**
	 * algunes estadistiques nomes es mostren a vegades
	 * @return boolean o int (0=invisible, 1=visible, 2=visible pero no lincable)
	 */
	function visible () {
		return true;
	}
	
	/**
	 * Per defecte sempre es mostra el dia en la forquilla de temps
	 */
	function mostra_dia(){
		return true;
	}
	
}
?>