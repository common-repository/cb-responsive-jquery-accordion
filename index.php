<?php 

/*
Plugin Name: CB Responsive jQuery Accordion
Plugin URI: http://www.codingbank.com/plugins/cb-responsive-jquery-accordion
Description: This is full responsive Accordion or FAQ Plugin for wordpress theme with shortcode support. shortcode is [cb-jquery-faq].
Version: 1.2
Author: Md Abul Bashar
Author URI: http://www.codingbank.com/

*/

include_once plugin_dir_path(__FILE__) . '/inc/cb-faq-post.php';

function cb_faq_accordion_script(){
	
	wp_enqueue_style( 'cb-res-faq-font-awesome',  'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css', array(), '1.1' );
	wp_enqueue_style( 'cb-res-faq-accordion',  plugin_dir_url( __FILE__ ) . '/css/style.css', array(), '1.1' );
	
	wp_enqueue_script('jquery');
	
	wp_enqueue_script( 'cb_js',  plugin_dir_url( __FILE__ ) . '/js/cb_js.js', array( 'jquery' ), '1.1', true );
	
}
add_action('wp_enqueue_scripts', 'cb_faq_accordion_script');


function cb_res_faq_acc($atts){
	extract( shortcode_atts( array(
		'count' => 10,
		'posttype' => 'cb_faqs',
	), $atts ) );
	
    $q = new WP_Query(
        array('posts_per_page' => $count, 'post_type' => $posttype)
        );		
		
		
	$list = '<div class="accordion_area fix" id="accordion">';
	while($q->have_posts()) : $q->the_post();
		$list .= '			
			<div class="single_accordion fix">
				<div class="accordion_hearder fix">
					<h2>'.get_the_title().'</h2>
					<span class="accordion_icon">
						<i class="fa fa-plus"></i>
						<i class="fa fa-minus"></i>
					</span>
				</div>
				<div class="accordion_content fix">
					<p>'.get_the_content().'</p>
				</div>
			</div>		
		';        
	endwhile;
	$list.= '</div>';
	wp_reset_query();
	return $list;
}
add_shortcode('cb-jquery-faq', 'cb_res_faq_acc');	


// Add settings link on plugin page
function cp_faqs_pluginlink($links) { 
  $settings_link = '<a href="https://www.codingbank.com/item/cb-responsive-jquery-accordion-pro/" style="color:red;font-weight:bold;" target="_blank">Premium Version</a>'; 
  array_unshift($links, $settings_link); 
  return $links; 
}
 
$plugin = plugin_basename(__FILE__); 
add_filter("plugin_action_links_$plugin", 'cp_faqs_pluginlink' );	


/*----------------------------------------------------------
Custom metabox
------------------------------------------------------------*/

function cb_faq_custom_metabox() {

	add_meta_box('cbfaqpronot', '<span style="color:red">Premium Version Available</span>', 'cb_faqcustom_metabox_output', 'cb_faqs', 'side', 'high');

}
add_action('add_meta_boxes', 'cb_faq_custom_metabox');

function cb_faqcustom_metabox_output(){
	

	echo '#Responsive<br/>#Custom Post with shortcode support<br/>#Full Color Customization<br/>#Custom Title<br/>#Custom Contents<br/>And More only $5<br/> <a href="https://www.codingbank.com/item/cb-responsive-jquery-accordion-pro/" style="color:red;font-weight:bold;" target="_blank">Click Here</a> For Details<br/> You can <a href="http://code.realwebcare.com/item/cb-responsive-jquery-accordion-pro/" target="_blank" style="color:red;font-weight:bold;">Buy Now</a><br/><iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Ffacebook.com%2Fcodingbank&width=200px&layout=standard&action=like&size=small&show_faces=false&share=true&height=35&appId=242933392551977" width="200px" height="35" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>';

}
	
?>