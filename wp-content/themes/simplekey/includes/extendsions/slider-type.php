<?php
/**
 * Slider Post Type
 * @package VAN Framework
 */

/*Create slider Post Type*/
function create_slider() {
	
  $labels = array(
    'name' => __('sliders','SimpleKey'),
    'singular_name' => __('All sliders','SimpleKey'),
    'add_new' => __('Add slider','SimpleKey'),
    'add_new_item' => __('Add New slider','SimpleKey'),
    'edit_item' => __('Edit slider','SimpleKey'),
    'new_item' => __('Add New','SimpleKey'),
    'view_item' => __('Browse slider','SimpleKey'),
    'search_items' => __('Search slider','SimpleKey'),
    'not_found' =>  __('No sliders found.','SimpleKey'),
    'not_found_in_trash' => __('No sliders found in trash.','SimpleKey'),
    'parent_item_colon' => ''
  );
 
  $supports = array('title','thumbnail');
 
  register_post_type( 'slider',
    array(
      'labels' => $labels,
      'public' => true,
	  'publicly_queryable' => true,
	  'query_var' => true,
      'supports' => $supports,
	  'menu_position' => 20,
	  'has_archive' => true,
	  'capability_type' => 'post',
	  'show_in_nav_menus'=>false,
	  'rewrite' => true
    )
  );
}
add_action( 'init', 'create_slider' );


$slider_meta_boxes =
array(
    "slider_custom" => array(
	"name" => "slider_custom",
	"types" => "select",
	'std'=>'no',
	'options'=>array('No','Yes'),
	'desc'=>__('Advanced user feature','SimpleKey'),
	'title' => __('Custom Slider','SimpleKey')),

	"slider_bg" => array(
	"name" => "slider_bg",
	"types" => "text",
	'std'=>'',
	'desc'=>__('Optimal size 1600 X 950px','SimpleKey'),
	"title" => __('Slider Background Image','SimpleKey')),
	
	"mobile_slider_bg" => array(
	"name" => "mobile_slider_bg",
	"types" => "text",
	'std'=>'',
	'desc'=>__('Minsize 640 X 960px','SimpleKey'),
	"title" => __('Optional: Slider Background Image for Mobile Phone','SimpleKey')),
	
	"pad_slider_bg" => array(
	"name" => "pad_slider_bg",
	"types" => "text",
	'std'=>'',
	'desc'=>__('Optimal size 1024 X 800px','SimpleKey'),
	"title" => __('Optional: Slider Background Image for tablet(iPad)','SimpleKey')),
	
	"slider_mainHeading" => array(
	"name" => "slider_mainHeading",
	"types" => "text",
	'std'=>'',
	'desc'=>'',
	"title" => __('Slider Main Heading','SimpleKey')),
	
	"slider_subHeading" => array(
	"name" => "slider_subHeading",
	"types" => "text",
	'std'=>'',
	'desc'=>'',
	"title" => __("Slider Sub Heading",'SimpleKey')),
	
	"slider_excerpt" => array(
	"name" => "slider_excerpt",
	"types" => "textarea",
	'std'=>'',
	'desc'=>'',
	"title" => __("Slider Excerpt",'SimpleKey')),
	
	"slider_button" => array(
	"name" => "slider_button",
	"types" => "textarea",
	'std'=>'',
	'desc'=>__('You can use button shortcode here,e.g.','SimpleKey').'[button href="http://" text_color="#fff" bg_color="#55ac4a" text="More Details" target="_blank"] or [android href="http://"] [appstore href="http://"]',
	"title" => __('Slider Button Shortcode here','SimpleKey')),
	
	"slider_link" => array(
	"name" => "slider_link",
	"types" => "text",
	'std'=>'',
	'desc'=>__('Do not forget the prefix: http://','SimpleKey'),
	"title" => __('Slider link','SimpleKey')),
	
	"slider_content" => array(
	"name" => "slider_content",
	"types" => "textarea",
	'std'=>'',
	'desc'=>__('You can use shortcodes and HTML to custom slider content here and the featured thumbnail will be invalid.','SimpleKey'),
	"title" => __("Slider custom",'SimpleKey')),
);

function van_slider_meta_boxes() {
    global $post, $slider_meta_boxes;
    foreach($slider_meta_boxes as $meta_box) {
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
			echo '<option value="" '.$select.'>Choose</option>';
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
<!--        <script type="text/javascript">
			jQuery(document).ready(function() {
			//Show custom slider
			var slider_custom=jQuery('select[name="slider_custom_value"]');
			function custom_slider(){
				if(slider_custom.val()=='Yes'){
				   jQuery('#postdivrich').show();
				   jQuery('#slider_bg').add('#slider_subHeading').add('#slider_excerpt').add('#slider_button').hide();
				}else{
				   jQuery('#postdivrich').hide();
				   jQuery('#slider_bg').add('#slider_subHeading').add('#slider_excerpt').add('#slider_button').show();
				}
			}custom_slider();
			
			slider_custom.change(function(){
				custom_slider();
			});
			})
        </script>-->
        <?php
    }
}

function van_slider_create_meta_box() {
    global $theme_name;

    if ( function_exists('add_meta_box') ) {
        add_meta_box( 'slider-meta-boxes', __('Slider Setting','SimpleKey'), 'van_slider_meta_boxes', 'slider', 'normal', 'high' );
    }
}

function van_slider_save_postdata( $post_id ) {
    global $post, $slider_meta_boxes;
    foreach($slider_meta_boxes as $meta_box) {
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

add_action('admin_menu', 'van_slider_create_meta_box');
add_action('save_post', 'van_slider_save_postdata');
?>