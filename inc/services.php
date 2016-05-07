<?php
// REGISTER NEW POSTTYPE
 function create_new_posttypes() {
	
			register_post_type( 'services', array(
					'labels' => array(
						'name' => __( 'Services', 'my-theme' ),
						'singular_name' => __( 'Service', 'my-theme' ),
						'add_new_item' => __( 'Add New Service', 'my-theme' ),
						'not_found' => __( 'No Services Found', 'my-theme' ),
					),
					'menu_icon'=> 'dashicons-tag',
					'public' => true,
					'supports' => array( 'title', 'editor', 'thumbnail' ),
					'has_archive' => true,
					'rewrite' => array('slug' => 'service'),
				)
			);
		
		
}	add_action( 'init', 'create_new_posttypes' );

// REGISTER METABOX
function services_add_post_meta_boxes() {
  add_meta_box(
    'services-post-class',    
    esc_html__( 'Service Icon', 'example' ),    
    'services_post_class_meta_box',  
    'services', 
    'side',
    'default'     
  );
}

// SETUP METABOXES ON PAGE LOAD
function services_post_meta_boxes_setup() {
  add_action( 'add_meta_boxes', 'services_add_post_meta_boxes' );
  add_action( 'save_post', 'services_save_post_class_meta', 10, 2 );
}

add_action( 'load-post.php', 'services_post_meta_boxes_setup' );
add_action( 'load-post-new.php', 'services_post_meta_boxes_setup' );

// HTML OUTPUT INPUT FIELD
function services_post_class_meta_box( $object, $box ) {
	wp_nonce_field( basename( __FILE__ ), 'services_post_class_nonce' ); 
	?>	
		<p style="margin-top: 18px;"><i>Example: map-marker</i></p>	
		<input style="padding: 7px;" type="text" placeholder="map-marker" name="services-post-class" id="services-post-class" value="<?php echo esc_attr( get_post_meta( $object->ID, 'services_post_class', true ) ); ?>" size="30">
		<p style="padding-bottom: 25px;">Go to <a href="http://fontawesome.io/icons/" target="_blank">http://fontawesome.io/icons</a> for a complete list.</p>
	<?php 
}

// SAVE INPUT FIELD ON SAVE POST
function services_save_post_class_meta( $post_id, $post ) {
	// CHECK NONCE
	if ( !isset( $_POST['services_post_class_nonce'] ) || !wp_verify_nonce( $_POST['services_post_class_nonce'], basename( __FILE__ ) ) )
    	return $post_id;

	$post_type = get_post_type_object( $post->post_type );

	if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
    	return $post_id;

	$new_meta_value = ( isset( $_POST['services-post-class'] ) ? sanitize_html_class( $_POST['services-post-class'] ) : '' );
	$meta_key = 'services_post_class';
	$meta_value = get_post_meta( $post_id, $meta_key, true );
	
	// CLEAN WAY TO SAVE POST META
	if ( $new_meta_value && '' == $meta_value )
    	add_post_meta( $post_id, $meta_key, $new_meta_value, true );

	elseif ( $new_meta_value && $new_meta_value != $meta_value )
		update_post_meta( $post_id, $meta_key, $new_meta_value );

	elseif ( '' == $new_meta_value && $meta_value )
		delete_post_meta( $post_id, $meta_key, $meta_value );
}

// REGISTER SHORTCODE
function register_services_shortcode(){
	add_shortcode('services','embed_service_shortcode');
} add_action( 'init', 'register_services_shortcode');

// OUTPUT SHORTCODE
function embed_service_shortcode(){
		
	$args = array( 'post_type' => 'services' );
	
	ob_start();
	
	echo '<div id="services">';
		echo '<div class="row">';
	
				$loop = new wp_query( $args );
				while ( $loop->have_posts() ) : $loop->the_post();
					$post_id = get_the_ID();
					$icon = get_post_meta( $post_id , 'services_post_class', true);
					$title = get_the_title();
				
					echo '<div class="col-md-4">';					
						
						echo '<div class="service-icon"><i class="fa fa-'.$icon.'"></i></div>';
						echo '<h1 class="service-title">'.$title.'</h1>';
						echo '<p class="service-desc">'.the_content().'</p>';
						
					echo '</div>'; // col
				endwhile; // end while
				
		echo '</div>';
	echo '</div>';
	
	$output_string = ob_get_contents();
	ob_end_clean();
	
	return $output_string;
		 
}
