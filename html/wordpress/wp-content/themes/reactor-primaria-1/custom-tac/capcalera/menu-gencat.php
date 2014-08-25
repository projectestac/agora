<?php

function add_corporatiu( $wp_admin_bar ) {

	$args = array(
		'id'     => 'gencat',     // id of the existing child node (New > Post)
		'title'  => '<img src=http://ies-sabadell.cat/webdecentre/wp-content/uploads/2014/07/ensenyament_bn_30.png>', // alter the title of existing node
		'parent' => false,          // set parent to false to make it a top level (parent) node
	);

	$wp_admin_bar->add_menu( $args );

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
}
?>