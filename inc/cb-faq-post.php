<?php 

function cb_res_faq_ac() {
	register_post_type( 'cb_faqs', 
			array(
			'labels' => array(
				'name' => __( 'FAQs', 'cb_faqs' ),
				'singular_name' => __( 'FAQ', 'cb_faqs' ),
				'add_new' => __( 'Add New FAQ', 'cb_faqs' ),
				'add_new_item' => __( 'Add New FAQ', 'cb_faqs' ),
				'edit_item'		=> __('Edit FAQ Info', 'cb_faqs'),
				'view_item'		=> __('View FAQ Info', 'cb_faqs'), 				
				'not_found' => __( 'Sorry, we couldn\'t find the FAQ you are looking for.', 'cb_faqs' )
			),
			'public' => true,
			'menu_icon'	=> 'dashicons-admin-users',
			'supports' => array('title','editor'),
			'has_archive' => true,
			'rewrite' => array('slug' => 'cb-faqs'),
			'capability_type' => 'page', 
		)
	
	
	);
	
}
add_action('after_setup_theme', 'cb_res_faq_ac');


?>