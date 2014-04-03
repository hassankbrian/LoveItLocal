<?php global $VAN;?>
<section id="featured" class="flexslider">
    <ul class="slides">
      <?php 
	  $i=0;
	  query_posts(array('posts_per_page'=>20,'post_type'=>'slider','order'=>'desc','orderby'=>'date','post_status' => 'publish'));  
	  while(have_posts()) : the_post();$i++;
	  $slider_custom=trim(strip_tags(get_post_meta($post->ID, "slider_custom_value", true)));
	  $slider_mainheading=trim(strip_tags(get_post_meta($post->ID, "slider_mainHeading_value", true)));
	  $slider_subheading=trim(strip_tags(get_post_meta($post->ID, "slider_subHeading_value", true)));
	  $slider_navcolor=trim(strip_tags(get_post_meta($post->ID, "slider_navcolor_value", true)));
	  $slider_bg=trim(strip_tags(get_post_meta($post->ID, "slider_bg_value", true)));
	  $mobile_slider_bg=trim(strip_tags(get_post_meta($post->ID, "mobile_slider_bg_value", true)));
	  $pad_slider_bg=trim(strip_tags(get_post_meta($post->ID, "pad_slider_bg_value", true)));
	  $slider_excerpt=trim(get_post_meta($post->ID, "slider_excerpt_value", true));
	  $slider_button=trim(get_post_meta($post->ID, "slider_button_value", true));
	  $slider_content=trim(get_post_meta($post->ID, "slider_content_value", true));
	  $slider_link=trim(get_post_meta($post->ID, "slider_link_value", true));
	  if(has_post_thumbnail()){
		$class=" twoColumns";
	  }else{
		$class=" oneColumn";
		$thumbnail='';
	  }
	  ?>
      <li id="slider-<?php the_ID();?>">
        <div class="slide_content<?php echo $class;?>">
         <?php if($slider_custom=='No' || $slider_custom==''):?>
           <?php if(has_post_thumbnail()):?>
           <div class="thumbnail"><?php the_post_thumbnail('slider_thumbnail');?></div>
           <?php endif;?>
           
           <?php if(isset($slider_mainheading) && $slider_mainheading<>''):?>
           <img src="<?php echo get_template_directory_uri();?>/images/taller.jpg">
           <!--<h1 id="firstTitle"> <?php if($slider_link<>''){?><a href="<?php echo $slider_link;?>" target="_blank"><?php }?><?php echo _e(apply_filters(' ', _($slider_mainheading)));?> <?php if($slider_link<>''){?></a><?php }?></h1>
           -->
           <?php endif;?>
           
           <?php if(isset($slider_subheading) && $slider_subheading<>''):?>
           <h2 id="secondTitle"><?php if($slider_link<>''){?><a href="<?php echo $slider_link;?>" target="_blank"><?php }?><?php echo _e(apply_filters(' ', _($slider_subheading)));?> <?php if($slider_link<>''){?></a><?php }?></h2>
           <?php endif;?>
           
           <?php if(isset($slider_excerpt) && $slider_excerpt<>''):?>
           <p id="excerpt">
           <?php echo _e(apply_filters(' ', _($slider_excerpt)));?>
           </p>
           <?php endif;?>
           
           <?php if(isset($slider_button) && $slider_button<>''):?>
           <p id="btns">
             <?php echo do_shortcode($slider_button);?>
           </p>
           <?php endif;?>
                     
          <?php elseif($slider_custom=='Yes'):?>
            <?php echo do_shortcode($slider_content);?>
          <?php endif;?>
        </div>
        <?php
		$mobile_url='';
		$pad_url='';
		if($mobile_slider_bg<>''){
		   $mobile_url=' data-mobile="'.$mobile_slider_bg.'"';
		   $mobile_class=' mobile_bg';
		}else{
		   $mobile_url='';
		   $mobile_class='';
		}
		if($pad_slider_bg<>''){
		   $pad_url=' data-ipad="'.$pad_slider_bg.'"';
		}
		?>
        <div class="slide_bg<?php echo $mobile_class;?>">
		  <?php if(isset($slider_bg) && $slider_bg<>''):?><img src="<?php echo $slider_bg;?>"<?php echo $mobile_url;?><?php echo $pad_url;?> alt="" /><?php endif;?>
        </div>
      </li>

      <?php
	   endwhile;
	   wp_reset_query();
	  ?>
      
      <?php if($i==0):?>
        <li>
        <div class="slide_content oneColumn">
                      <!--<?php if(isset($VAN['first-title']) && $VAN['first-title']<>''):?><h1 id="firstTitle"><?php echo $VAN['first-title'];?></h1><?php endif;?>-->
                      <img src="<?php echo get_template_directory_uri();?>/images/logobarcelonacomingsoon.png" width="200" height="85" alt="Computer Hope"></img>
                      <?php if(isset($VAN['second-title']) && $VAN['second-title']<>''):?><h2 id="secondTitle"><?php echo $VAN['second-title'];?></h2><?php endif;?>
                      <p></br></p>
		      <p></br></p>
                      <?php if(isset($VAN['subscribe_form']) && $VAN['subscribe_form']<>''):?>
                         <div class="subscribe">
                            <?php if(isset($VAN['subscribe_intro_title']) && $VAN['subscribe_intro_title']<>''):?>
                            <h2><?php echo $VAN['subscribe_intro_title'];?></h2>
                            <?php endif;?>
                            <p>
                              <?php echo stripslashes($VAN['subscribe_form']);?>
                            </p>
                         </div>
                       <?php endif;?>
                      <?php if(isset($VAN['intro']) && $VAN['intro']<>''):?>
                      <p id="excerpt">
                         <?php echo $VAN['intro'];?>
                      </p>
                      <?php endif;?>
        </div>
        <div class="slide_bg"><img src="<?php echo get_template_directory_uri();?>/images/taller.jpg" /></div>
        </li>
      <?php endif;?>
    </ul>
  </section>
