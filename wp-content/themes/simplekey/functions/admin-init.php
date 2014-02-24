<?php
/** 
 * Admin Init
 * @package VAN Framework 
 */
 

/*Integration Head in dashbroad*/
add_action('admin_init', 'van_admin_init');
function van_admin_init(){
	wp_enqueue_script('jquery');
	wp_enqueue_style( 'farbtastic' );
	wp_enqueue_script( 'farbtastic' );
	wp_enqueue_style("van-admin", get_template_directory_uri()."/functions/css/admin.css", false, "1.0", "all");
	wp_enqueue_script("admin_script", get_template_directory_uri()."/functions/js/admin_script.js");
}

add_action('wp_footer', 'van_integrated_init');
function van_integrated_init(){
?>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/functions/js/jquery.van.js"></script>
<?php
} 
?>