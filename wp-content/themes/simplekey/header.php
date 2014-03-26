<?php 
ob_start();
global $VAN;
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="utf-8"> 
<?php if(!isset($VAN['isResponsive']) || $VAN['isResponsive']==1):?>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1"/>
<?php endif;?>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<title><?php /*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'SimpleKey' ), max( $paged, $page ) );?></title>
<link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet" type="text/css" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_enqueue_script('jquery');?>
<?php wp_head();?>
</head>

<body <?php body_class();?>>
<div id="ajax-load">
  <div id="close">X</div>
  <div id="ajax-content"></div>
</div>
<header id="top">
  <?php if(is_home()):?>
  <div class="wrapper">
      <?php echo van_social();?>
  </div>
  <?php endif;?>
  
  <nav id="primary-menu">
   <div class="wrapper">
    <h1 id="site-logo"><a href="<?php echo home_url();?>/#top" title="<?php echo bloginfo('description');?>"></a></h1>
    <div id="primary-menu-container">
         <?php wp_nav_menu(array(
				  'theme_location' => 'primary_navi',
				  'container' => '',
				  'menu_class' => 'sf-menu',
				  'fallback_cb' => 'van_scroll_pagemenu',
				  'echo' => true,
				  'walker'=> new Description_Walker,
                  'depth' => 4) );
		 ?>
    </div>
    <div id="mobileMenu"></div>
   </div>
  </nav>
  
  <?php if(is_home())get_template_part('content','slider');?>
  
</header>