<?php

/*************************************************************
METABOX per triar títol, metadades, etc...
**************************************************************/

/**
 * Adds a box to the main column on the Post and Page edit screens.
 */
function metabox1_add() {

	$screens = array( 'post');

	foreach ( $screens as $screen ) {

		add_meta_box(
			'metabox1',
			__( 'Paràmetres', 'metabox1_textdomain' ),
			'metabox1_callback',
			$screen
		);
	}
}
add_action( 'add_meta_boxes', 'metabox1_add' );

/**
 * Prints the box content.
 * 
 * @param WP_Post $post The object for the current post/page.
 */
function metabox1_callback( $post ) {

	// Add an nonce field so we can check for it later.
	wp_nonce_field( 'metabox1', 'metabox1_nonce' );

	/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$check1 = get_post_meta( $post->ID, '_amaga_titol', true );
	$check2 = get_post_meta( $post->ID, '_amaga_metadata', true );
	$check3 = get_post_meta( $post->ID, '_bloc_html', true );

	/*echo '<label for="myplugin_new_field">';
	_e( 'Mostrar títol', 'metabox1_textdomain' );
	echo '</label> ';
	echo '<input type="text" id="mostrar_titol" name="mostrar_titol" value="' . esc_attr( $value ) . '" size="25" /><br>';*/
	//echo $check1;
	echo '<input type="checkbox" id="amaga_titol" name="amaga_titol" '.checked( $check1,'on', false ).' /> Amaga títol<br>';
	echo '<input type="checkbox" id="amaga_metadata" name="amaga_metadata" '.checked( $check2,'on',false ).'/> Amaga metadades<br>';
	echo '<input type="checkbox" id="bloc_html" name="bloc_html" '.checked( $check3,'on' ,false ).'/> Mostra el contingut sencer';
}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function metabox1_savedata( $post_id ) {

	/*
	 * We need to verify this came from our screen and with proper authorization,
	 * because the save_post action can be triggered at other times.
	 */

	// Check if our nonce is set.
	if ( ! isset( $_POST['metabox1_nonce'] ) ) {
		return;
	}

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['metabox1_nonce'], 'metabox1' ) ) {
		return;
	}

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// Check the user's permissions.
	if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}

	} else {

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}

	/* OK, it's safe for us to save the data now. */
	
	// Make sure that it is set.
	/*if ( ! isset( $_POST['mostrar_titol'] ) ) {
		return;
	}*/

	
	$mostrar_titol= $_POST['amaga_titol'] ;
	$mostrar_metadata= $_POST['amaga_metadata'] ;
	$bloc_html= $_POST['bloc_html'] ;

	// Update the meta field in the database.
	update_post_meta( $post_id, '_amaga_titol', $mostrar_titol);
	update_post_meta( $post_id, '_amaga_metadata', $mostrar_metadata);
	update_post_meta( $post_id, '_bloc_html', $bloc_html);
	
}
add_action( 'save_post', 'metabox1_savedata' );
?>
