<?php

function add_direccio( $wp_admin_bar ) {

	$args = array(
		'id'     => 'nomCentre',     
		'title'  => 'Escola L\'Arany',
		'href'=>'http://ies-sabadell.cat/webdecentre',
		'parent' => false,          
	);

	$wp_admin_bar->add_node( $args );
	
	/*
	$args = array(
		'id'     => 'iconMapsCentre',     
		'title' => '<a href="https://www.google.com/maps/dir//41.554484,2.085249/@41.5544914,2.0831204,17z/data=!4m4!4m3!1m0!1m0!3e0?hl=ca">&nbsp;</a>',
		'parent' => false,          
	);

	$wp_admin_bar->add_node( $args );*/
	
	$args = array(
		'id'     => 'direccioCentre',     
		'title' => 'Juvenal,1 Sabadell',
		'parent' => false,          
	);

	$wp_admin_bar->add_node( $args );
	
	
	$wp_admin_bar->add_node( $args );
	$args = array(
		'id'     => 'telCentre',     
		//'title'  => '<a href="tel:937233905">93 723 39 05</a>', 
		'title'  => '93 723 39 05', 
		'parent' => false,          
	);

	$wp_admin_bar->add_node( $args );
	
	$args = array(
		'id'     => 'titularitat',     
		'title'  => 'Centre públic',
		'href' => 'http://www20.gencat.cat/portal/site/ensenyament/menuitem.a735c8413184c341c65d3082b0c0e1a0/?vgnextoid=fd48f9cd4d7e9310VgnVCM1000008d0c1e0aRCRD&vgnextchannel=fd48f9cd4d7e9310VgnVCM1000008d0c1e0aRCRD&vgnextfmt=default',
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