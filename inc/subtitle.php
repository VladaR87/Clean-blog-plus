<?php 

/**
 * Add metabox for subtitle
 */
function cbp_subtitle_metabox(){

	add_meta_box( 
		'subtitle-metabox', 
		__( 'Add Subtitle', 'clean-blog-plus' ), 
		'cbp_subtitle', 
		array( 'page' ), 
		'side', 
		'high' 
	);

}
add_action( 'add_meta_boxes', 'cbp_subtitle_metabox' );

/**
 * Meta box display callback.
 */
function cbp_subtitle( $post ){ 
	// Add a nonce field so we can check for it later.
    wp_nonce_field( 'subtitle_nonce', 'subtitle_nonce' );

    $value = get_post_meta( $post->ID, '_subtitle', true );

    echo '<textarea style="width:100%" id="subtitle" name="subtitle">' . esc_attr( $value ) . '</textarea>';
}


/**
 * Save meta box content.
 */
function save_subtitle_meta_box_data( $post_id ) {

    // Check if our nonce is set.
    if ( ! isset( $_POST['subtitle_nonce'] ) ) {
        return;
    }

    // Verify that the nonce is valid.
    if ( ! wp_verify_nonce( $_POST['subtitle_nonce'], 'subtitle_nonce' ) ) {
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

    }
    else {

        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }
    }

    /* OK, it's safe for us to save the data now. */

    // Make sure that it is set.
    if ( ! isset( $_POST['subtitle'] ) ) {
        return;
    }

    // Sanitize user input.
    $my_data = sanitize_text_field( $_POST['subtitle'] );

    // Update the meta field in the database.
    update_post_meta( $post_id, '_subtitle', $my_data );
}

add_action( 'save_post', 'save_subtitle_meta_box_data' );