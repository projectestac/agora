<?php

function add_gencat( $wp_admin_bar ) {

	$args = array(
		'id'     => 'gencat',     // id of the existing child node (New > Post)
		'title'  => '<img src="'.get_bloginfo('template_directory').'-primaria-1/custom-tac/imatges/logo_gene.png"',
		//'href' =>'http://www20.gencat.cat',
		'parent' => false,          // set parent to false to make it a top level (parent) node
	);

	$wp_admin_bar->add_menu( $args );
	/*
	$args = array(
		'id'     => 'gencat-web',     // id of the existing child node (New > Post)
		'title'  => 'Generalitat de Catalunya', // alter the title of existing node
		'href' =>'http://www20.gencat.cat',
		'parent' => 'gencat',          // set parent to false to make it a top level (parent) node
	);

	$wp_admin_bar->add_node( $args );
	
	$args = array(
		'id'     => 'dep-ensenyament',     
		'title'  => 'Departament d\'ensenyament', // alter the title of existing node
		'href' =>'http://www20.gencat.cat/portal/site/ensenyament',
		'parent' => 'gencat',          // set parent to false to make it a top level (parent) node
	);

	$wp_admin_bar->add_node( $args );

	$args = array(
			'id'     => 'atri',     
			'title'  => 'ATRI', 
			'href' => 'https://atri.gencat.cat/',
			'parent' => 'gencat',          
		);
	
	$wp_admin_bar->add_node( $args );
	
	$wp_admin_bar->add_node( $args );

	$args = array(
			'id'     => 'saga',     
			'title'  => 'SAGA', 
			'href' => 'https://saga.xtec.cat/entrada',
			'parent' => 'gencat',          
		);
	
	$wp_admin_bar->add_node( $args );

	$args = array(
		'id'     => 'familia-escola',     
		'title'  => 'Familia i Escola', 
		'href'=>'http://www20.gencat.cat/portal/site/familiaescola/',
		'parent' => 'gencat',          
	);
	
	$wp_admin_bar->add_node( $args );

	$args = array(
			'id'     => 'portal',     
			'title'  => 'Intranet · Portal de centre', 
			'href' => 'http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Benvinguda',
			'parent' => 'gencat',          
		);
	
	$wp_admin_bar->add_node( $args );
	*/
}
?>
