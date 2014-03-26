<?php
/** 
 * Theme Initialize
 * @package VAN Framework
 * You can initialize this theme functions like menu,sidebar,thumbnail size,post format and so on.
 * And you can also include more advanced extendsions like custom post type or widgets here. 
 */

 /*The path of widgets an extendsions*/
$widgets_path = get_template_directory() . '/includes/widgets/';
$extendsions_path = get_template_directory() . '/includes/extendsions/';

/*Add custom field at post,page or category edit page*/
require_once($extendsions_path."theme-page-field.php");
require_once($extendsions_path."theme-category-field.php");
require_once($extendsions_path."portfolio-type.php");
require_once($extendsions_path."slider-type.php");
 
/*Add some useful support*/
add_editor_style('editor-style.css');
add_theme_support( 'automatic-feed-links' );
load_theme_textdomain( 'SimpleKey', get_template_directory().'/languages' ); 
$locale = get_locale(); 
$locale_file = get_template_directory_uri()."/languages/$locale.php"; 
if ( is_readable($locale_file) ) require_once($locale_file);

if ( ! isset( $content_width ) ) $content_width = 980;
remove_filter('the_content', 'wptexturize');
add_filter('widget_text', 'do_shortcode');

/*Add diffierent size for post thumbnails*/
add_theme_support('post-thumbnails');
if ( function_exists( 'add_image_size')){  
    add_image_size('blog_thumbnail', 260, 218,true);
	add_image_size('slider_thumbnail', 400, 510,true);
	add_image_size('image_single_slider', 980, 730,true);
	add_image_size('portfolio_thumbnail', 320, 320,true);
	add_image_size('portfolio_thumbnail_4', 241, 241,true);
	add_image_size('portfolio_thumbnail_5', 195, 195,true);
}
/*Init nav menus*/
register_nav_menus(array('primary_navi' => 'Primary Menu'));
register_nav_menus(array('footer_navi' => 'Footer Menu'));

/*Init widget*/
add_action( 'widgets_init', 'van_widgets_init' );
function van_widgets_init() {
	register_sidebar(array(
		'name' => __( 'Blog sidebar', 'SimpleKey' ),
		'id' => 'blog-sidebar',
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h5>',
		'after_title' => '</h5>',
	));
}

/*Load priority scripts*/
add_action('wp_enqueue_scripts', 'van_prior_scripts');
function van_prior_scripts(){
	global $VAN;
	wp_register_script( 'jpreloader', get_template_directory_uri() . '/js/jpreloader.min.js', null, null, false );
	wp_enqueue_script( 'jpreloader' );
	
	if(is_home()){ if($VAN['isLoad']==1 || !isset($VAN['isLoad'])){$isLoad=1;}else{$isLoad=0;}}else{$isLoad=0;}
	if(van_is_mobile()){$isMobile=1;}else{$isMobile=0;}
	if(isset($VAN['slideTransitionSpeed']) && $VAN['slideTransitionSpeed']<>''){$slideTransitionSpeed=$VAN['slideTransitionSpeed'];}else{$slideTransitionSpeed='600';}
	if(isset($VAN['slidespeed']) && $VAN['slidespeed']<>''){$slidePlayingSpeed=$VAN['slidespeed'];}else{$slidePlayingSpeed='7000';}
	if(!isset($VAN['isResponsive']) || $VAN['isResponsive']==1){$isResponsive='1';}else{$isResponsive='0';}
	
	$args='<script type="text/javascript">
	  var isLoad='.$isLoad.';
	  var isMobile='.$isMobile.';
	  var slidePlayingSpeed='.$slidePlayingSpeed.';
	  var slideTransitionSpeed='.$slideTransitionSpeed.';
	  var isResponsive='.$isResponsive.';
	</script>'.PHP_EOL;
		
	echo $args;
}

/*Load secondary scripts*/
add_action('wp_footer', 'van_secondary_scripts');
function van_secondary_scripts(){
    global $VAN;
    if(!isset($VAN['isRetina']) || $VAN['isRetina']==1):
	wp_register_script( 'retina', get_template_directory_uri() . '/js/retina.js', null, null, true );
	endif;
	wp_register_script( 'placeholder', get_template_directory_uri() . '/js/jquery.placeholder.js', null, null, true );
	wp_register_script( 'hoverIntent-1', get_template_directory_uri() . '/js/jquery.hoverIntent.js', null, null, true );
	wp_register_script( 'scrollTo', get_template_directory_uri() . '/js/jquery.scrollTo-1.4.3.1-min.js', null, null, true );
	wp_register_script( 'localscroll', get_template_directory_uri() . '/js/jquery.localscroll-1.2.7-min.js', null, null, true );
	wp_register_script( 'nicescroll', get_template_directory_uri() . '/js/jquery.nicescroll.min.js', null, null, true );
	wp_register_script( 'sticky', get_template_directory_uri() . '/js/jquery.sticky.js', null, null, true );
	wp_register_script( 'lazyload', get_template_directory_uri() . '/js/jquery.lazyload.min.js', null, null, true );
	wp_register_script( 'FlexSlider', get_template_directory_uri() . '/js/FlexSlider/jquery.flexslider-min.js', null, null, true );
	wp_register_script( 'colorbox', get_template_directory_uri() . '/js/colorbox/jquery.colorbox.js', null, null, true );
	wp_register_script( 'isotope', get_template_directory_uri() . '/js/jquery.isotope.min.js', null, null, true );
	wp_register_script( 'contact-form', get_template_directory_uri() . '/js/jquery.contact-form.js', null, null, true );
	wp_register_script( 'tweet', get_template_directory_uri() . '/js/jquery.tweet.js', null, null, true );
	wp_register_script( 'mobilemenu', get_template_directory_uri() . '/js/jquery.mobilemenu.js', null, null, true );
	wp_register_script( 'superfish', get_template_directory_uri() . '/js/jquery.superfish.js', null, null, true );
	wp_register_script( 'simplekey', get_template_directory_uri() . '/js/jquery.simplekey.js', null, null, true );
	
	wp_enqueue_script( 'retina' );
	wp_enqueue_script( 'placeholder' );
	wp_enqueue_script( 'hoverIntent-1' );
	wp_enqueue_script( 'scrollTo' );
	wp_enqueue_script( 'localscroll' );
	wp_enqueue_script( 'nicescroll' );
	wp_enqueue_script( 'sticky' );
	wp_enqueue_script( 'lazyload' );
	wp_enqueue_script( 'FlexSlider' );
	wp_enqueue_script( 'colorbox' );
	wp_enqueue_script( 'isotope' );
	wp_enqueue_script( 'contact-form' );
	wp_enqueue_script( 'tweet' );
	wp_enqueue_script( 'mobilemenu' );
	wp_enqueue_script( 'superfish' );
	wp_enqueue_script( 'simplekey' );
	
	if(!isset($VAN['isNiceScroll']) || $VAN['isNiceScroll']=='1'){
	  $nicescroll=1;
	}else{
	  $nicescroll=0;
	}
	
	$args='<script type="text/javascript">
	  var pixel="'.get_template_directory_uri().'/functions/images/pixel.gif";
	  var loadimg="'.get_template_directory_uri().'/functions/images/loader2.gif";
	  var isNiceScroll='.$nicescroll.';
	</script>'.PHP_EOL;
		
	echo $args;
	
}

/*Load Plugins CSS*/
add_action('wp_enqueue_scripts', 'van_plugins_css');
function van_plugins_css(){
   wp_enqueue_style("reset", get_template_directory_uri()."/functions/css/shortcodes.css", false, "1.2", "all");
   wp_enqueue_style("mgrid", get_template_directory_uri()."/js/FlexSlider/flexslider.css", false, "1.2", "all");
   wp_enqueue_style("layout", get_template_directory_uri()."/js/colorbox/colorbox.css", false, "1.2", "all");
   wp_enqueue_style("javascript", get_template_directory_uri()."/css/fonts.css", false, "1.2", "all");
}
?>