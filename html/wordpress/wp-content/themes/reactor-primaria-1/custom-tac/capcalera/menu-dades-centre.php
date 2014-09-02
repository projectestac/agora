<?php

function add_dades_centre( $wp_admin_bar ) {
	
	$args = array(
		'id'     => 'direccioCentre',     
		'title' => reactor_option('direccioCentre', 'Direcció centre'),
		'parent' => false,          
	);

	$wp_admin_bar->add_node( $args );
	
	$args = array(
		'id'     => 'telCentre',     
		'title'  => reactor_option('telCentre', '0000000'), 
		'parent' => false,          
	);

	$wp_admin_bar->add_node( $args );
	
	$args = array(
		'id'     => 'titularitat',     
		'title'  => 'Centre públic',
		'href' => 'http://www10.gencat.net/pls/ense_ensenyam/p01.menu',
		'parent' => false,          
	);

	$wp_admin_bar->add_node( $args );
		

	/*
	$wp_admin_bar->add_node( $args );
	$args = array(
		'id'     => 'emailCentre',     // id of the existing child node (New > Post)
		'title'  => 'bustia@ies-sabadell.cat ', // alter the title of existing node
		'parent' => false,          // set parent to false to make it a top level (parent) node
	);

	$wp_admin_bar->add_node( $args );
	*/
}
?>