<?php

function add_serveis( $wp_admin_bar ) {

	$args = array(
		'id'     => 'serveisXTEC',     
		'title'  => '<img src=http://ies-sabadell.cat/webdecentre/wp-content/uploads/2014/07/agora2.png>', 
		'parent' => false,         
		'meta'=>array('class' =>'ab-top-secondary ab-top-menu')
	);

	$wp_admin_bar->add_node( $args );

	$args = array(
		'id'     => 'Moodle',     
		'title'  => 'Moodle', 
		'href' => 'http://agora.xtec.cat/',
		'parent' => 'serveisXTEC',          
	);

	$wp_admin_bar->add_node( $args );

	$args = array(
		'id'     => 'nodes',     
		'title'  => 'Nodes', 
		'href'	=> 'http://agora.xtec.cat/',
		'parent' => 'serveisXTEC',          
	);

	$wp_admin_bar->add_node( $args );

	$args = array(
		'id'     => 'xtecblocs',     
		'title'  => 'XtecBlocs', 
		'href' => 'http://blocs.xtec.cat/',
		'parent' => 'serveisXTEC',          
	);

	$wp_admin_bar->add_node( $args );

	$args = array(
		'id'     => 'intraweb',     
		'title'  => 'Intraweb', 
		'href'	=> 'http://agora.xtec.cat/',
		'parent' => 'serveisXTEC',          
	);

	$wp_admin_bar->add_node( $args );
	
	/*
	$args = array(
		'id'     => 'sep',     
		'title'  => '<hr>', 
		'parent' => 'serveisXTEC',          
	);

	$wp_admin_bar->add_node( $args );

	$args = array(
		'id'     => 'aboutAgora',     
		'title'  => 'Què és Àgora', 
		'parent' => 'serveisXTEC',          
	);

	$wp_admin_bar->add_node( $args );
	*/
}

?>