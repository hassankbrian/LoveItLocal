<?php
/**
 * Portfolio Post Type
 * @package VAN Framework
 */

/*Create Portfolio Post Type*/
function create_portfolio() {
	
  $labels = array(
    'name' => __('Portfolios','SimpleKey'),
    'singular_name' => __('All Portfolios','SimpleKey'),
    'add_new' => __('Add Portfolio','SimpleKey'),
    'add_new_item' => __('Add New Portfolio','SimpleKey'),
    'edit_item' => __('Edit Portfolio','SimpleKey'),
    'new_item' => __('Add New','SimpleKey'),
    'view_item' => __('Browse Portfolio','SimpleKey'),
    'search_items' => __('Search Portfolio','SimpleKey'),
    'not_found' =>  __('No portfolios found.','SimpleKey'),
    'not_found_in_trash' => __('No portfolios found in trash.','SimpleKey'),
    'parent_item_colon' => ''
  );
 
  $supports = array('title','thumbnail','editor','comments','author','excerpt');
 
  register_post_type( 'portfolio',
    array(
      'labels' => $labels,
      'public' => true,
	  'publicly_queryable' => true,
	  'query_var' => true,
      'supports' => $supports,
	  'menu_position' => 20,
	  'has_archive' => true,
	  'rewrite' => array( 'slug' => 'portfolio' ),
	  'capability_type' => 'post',
	  'show_in_nav_menus'=>false
    )
  );
}
add_action( 'init', 'create_portfolio' );

/*Portfolio Category*/
add_action( 'init', 'create_set' );
function create_set() {
 $labels = array(
    'name' => __( 'Portfolio category', 'SimpleKey'),
    'singular_name' => __( 'Portfolio category','SimpleKey'),
    'search_items' =>  __( 'Search category','SimpleKey'),
    'all_items' => __( 'All portfolio categories','SimpleKey'),
    'parent_item' => __( 'Parent portfolio category','SimpleKey'),
    'parent_item_colon' => __( 'Parent portfolio category','SimpleKey'),
    'edit_item' => __( 'Edit category','SimpleKey'),
    'update_item' => __( 'Update category','SimpleKey'),
    'add_new_item' => __( 'Add new category','SimpleKey'),
    'new_item_name' => __( 'New category name','SimpleKey'),
  );

  register_taxonomy('portfolios','portfolio',array(
    'hierarchical' => true,
    'labels' => $labels,
	'public'=>true,
	'show_ui' => true,
	'rewrite' => true,
	'rewrite' => array( 'slug' => 'portfolios' ),
	'query_var' => 'portfolios',
  ));
}
add_action('admin_init', 'flush_rewrite_rules');

$portfolio_meta_boxes =
array(
	"portfolio_type" => array(
	"name" => "portfolio_type",
	"types" => "select",
	'std'=>'Image',
	'desc'=>'',
	'options'=>array('Image','Video','Audio'),
	"title" => __('portfolio type','SimpleKey')),
	
	"portfolio_gallery" => array(
	"name" => "portfolio_gallery",
	"types" => "checkbox",
	'std'=>'',
	'options'=>array('Yes'),
	'desc'=>__('Not Recommended, if you want to insert the gallery,video or audio into content, please check it.','SimpleKey'),
	"title" => __('Disable The Default Gallery/Video/Audio Stage of This Portfolio ','SimpleKey')),
	
	"portfolio_layout" => array(
	"name" => "portfolio_layout",
	"types" => "select",
	'std'=>'Slider',
	'desc'=>'',
	'options'=>array('Slider','Grid View'),
	"title" => __('Portfolio Layout','SimpleKey')),
	
	"portfolio_col" => array(
	"name" => "portfolio_col",
	"types" => "select",
	'std'=>'3',
	'desc'=>'',
	'options'=>array('3','4','5'),
	"title" => __('Portfolio Columns','SimpleKey')),
	
	"portfolio_video" => array(
	"name" => "portfolio_video",
	"types" => "textarea",
	'std'=>'',
	'desc'=>'<a href="'.get_template_directory_uri().'/functions/images/help/video.jpg" target="_blank">'.__('How to get Youtube/Vimeo code?','SimpleKey').'</a>',
	"title" => __("Youtube or Vimeo Iframe Embed Code",'SimpleKey')),
	
	"portfolio_audio" => array(
	"name" => "portfolio_audio",
	"types" => "textarea",
	'std'=>'',
	'desc'=>'<a href="'.get_template_directory_uri().'/functions/images/help/sc.jpg" target="_blank">'.__('Example: How to get SoundCloud code?').'</a> - <a href="http://soundcloud.com" target="_blank">'.__('Go to SoundCloud now!','SimpleKey').'</a>',
	"title" => __("SoundCloud or MixCloud Iframe Embed Code",'SimpleKey')),
	
	"portfolio_link" => array(
	"name" => "portfolio_link",
	"types" => "text",
	'std'=>'',
	'desc'=>__('The page will redirect to the external website when user click the portfolio thumbnail ','SimpleKey'),
	"title" => __("External links",'SimpleKey')),
);

function van_portfolio_meta_boxes() {
    global $post, $portfolio_meta_boxes;
    foreach($portfolio_meta_boxes as $meta_box) {
        $meta_box_value = get_post_meta($post->ID, $meta_box['name'].'_value', true);
        if($meta_box_value == "")
            $meta_box_value = $meta_box['std'];
        echo'<div id="'.$meta_box['name'].'" class="metabox">';
		echo'<input type="hidden" name="'.$meta_box['name'].'_noncename" id="'.$meta_box['name'].'_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
        echo'<h4>'.$meta_box['title'].'</h4>';
		switch($meta_box['types']){
		  case 'textarea':
            echo '<textarea cols="80" rows="3" name="'.$meta_box['name'].'_value" style="width:70%;height:100px;">'.$meta_box_value.'</textarea><br /><span>'.$meta_box['desc'].'</span>';
			break;
		  case 'text':
		    echo '<input type="text" name="'.$meta_box['name'].'_value" value="'.$meta_box_value.'" style="width:20%" /><span>'.$meta_box['desc'].'</span>';
			break;
		  case 'colorpicker':
		    echo '<input type="text" id="'.$meta_box['name'].'_value" name="'.$meta_box['name'].'_value" value="'.$meta_box_value.'" style="width:10%" /><span>'.$meta_box['desc'].'</span>';
			echo ' <div class="colorpicker" id="colorpicker_'.$meta_box['name'].'_value"></div>';
			?>
            <script type="text/javascript">
			 jQuery(document).ready(function() {
				jQuery('#colorpicker_<?php echo $meta_box['name']; ?>_value').farbtastic("#<?php echo $meta_box['name']; ?>_value");
				jQuery("#<?php echo $meta_box['name']; ?>_value").click(function(){jQuery('#colorpicker_<?php echo $meta_box['name']; ?>_value').slideToggle()});
				
			  });
			 </script>
            <?php
			break;
	      case 'select':
		    echo '<select name="'.$meta_box['name'].'_value">';
			if(!empty($meta_box['options']))
			{
				foreach ($meta_box['options'] as $option)
				{
					 $select = '';
				     if($meta_box_value==$option) {
					  $select = 'selected=selected"';
				     }
					echo '<option value="'.$option.'" '.$select.'>'.$option.'</option>';
				}
			}
			echo'</select><span>'.$meta_box['desc'].'</span>';
			break;
		 case 'checkbox':
		    foreach ($meta_box['options'] as $option){
				$checkyes = '';
				if(strpos($meta_box_value, $option) !== false) {
					$checkyes = 'checked="checked"';
				}
		       echo'<input type="checkbox" name="'.$meta_box['name'].'_value[]" value="'.$option.'" '.$checkyes.' /> '.$option.'&nbsp;&nbsp;';
			}
			echo'<span>'.$meta_box['desc'].'</span>';
			break;
		 case 'radio':
		    foreach ($meta_box['options'] as $option){
		  ?>
		       <input type="radio" name="<?php echo $meta_box['name']?>_value" value="<?php echo $option;?>" <?php if ($option==$meta_box_value) { echo ' checked="checked"'; } ?> /> <?php echo $option; ?> &nbsp;&nbsp;
		  <?php	
            }
			echo'<span>'.$meta_box['desc'].'</span>';
			break;
		}
		echo'</div>';
		?>
        <?php
    }
}

function van_portfolio_create_meta_box() {
    global $theme_name;

    if ( function_exists('add_meta_box') ) {
        add_meta_box( 'portfolio-meta-boxes', __('Portfolio Setting','SimpleKey'), 'van_portfolio_meta_boxes', 'portfolio', 'normal', 'high' );
    }
}

function van_portfolio_save_postdata( $post_id ) {
    global $post, $portfolio_meta_boxes;
    foreach($portfolio_meta_boxes as $meta_box) {
		$noncename=$_POST[$meta_box['name'].'_noncename'];
        if ( !wp_verify_nonce($noncename, plugin_basename(__FILE__) ))  {
            return $post_id;
        }

        if ( 'page' == $_POST['post_type'] ) {
            if ( !current_user_can( 'edit_page', $post_id ))
                return $post_id;
        } 

        else {
            if ( !current_user_can( 'edit_post', $post_id ))
                return $post_id;
        }

        //$data = $_POST[$meta_box['name'].'_value'];
		if ($meta_box['types'] == 'checkbox' && is_array($_POST[$meta_box['name'].'_value'])) {
			$data = implode(",",$_POST[$meta_box['name'].'_value']);
	    }else{
			$data = $_POST[$meta_box['name'].'_value'];
		}

        if(get_post_meta($post_id, $meta_box['name'].'_value') == "")
            add_post_meta($post_id, $meta_box['name'].'_value', $data, true);
        elseif($data != get_post_meta($post_id, $meta_box['name'].'_value', true))
            update_post_meta($post_id, $meta_box['name'].'_value', $data);
        elseif($data == "")
            delete_post_meta($post_id, $meta_box['name'].'_value', get_post_meta($post_id, $meta_box['name'].'_value', true));
    }
}

add_action('admin_menu', 'van_portfolio_create_meta_box');
add_action('save_post', 'van_portfolio_save_postdata');
?>