<?php global $VAN;?>

<?php
  while(have_posts() ) : the_post();
  
  //Set Heading text
  $mainHeading=get_post_meta($post->ID, "page_mainheading_value", true);
  $subHeading=get_post_meta($post->ID, "page_subHeading_value", true);
  $hideTitle=get_post_meta($post->ID, "hide_title_value", true);
  $fullEmbed=get_post_meta($post->ID, "page_full_embed_value", true);
  if($mainHeading=='')$mainHeading=get_the_title();
  
  //Set background theme
  $pageBackground=get_post_meta($post->ID, "page_bgcolor_value", true);
  $pageCustom=get_post_meta($post->ID, "page_custom_value", true);
  $customColor=get_post_meta($post->ID, "page_custom_bgcolor_value", true);
  $fontColor=get_post_meta($post->ID, "page_custom_fontcolor_value", true);
  $pageImg=get_post_meta($post->ID, "page_custom_img_value", true);
  $bgRepeat=get_post_meta($post->ID, "page_bg_repeat_value", true);
  $bgFixed=get_post_meta($post->ID, "page_bg_fixed_value", true);
  
  //Choose integrated background theme
  if($pageCustom=='No' || $pageCustom==''){
	  $style='';
	  $font='';
	  $bgClass='';
	  if($pageBackground==''){
		 $bgClass='';
	  }elseif($pageBackground=='Light'){
		 $bgClass=' blockbg0';
	  }elseif($pageBackground=='Dark'){
		 $bgClass=' blockbg1';
	  }elseif($pageBackground=='Minium Red'){
		 $bgClass=' blockbg2';
	  }elseif($pageBackground=='Sand Paper'){
		 $bgClass=' blockbg3';
	  }elseif($pageBackground=='Diamond'){
		 $bgClass=' blockbg4';
	  }elseif($pageBackground=='Dark Cross'){
		 $bgClass=' blockbg5';
	  }elseif($pageBackground=='Tactile Noise'){
		 $bgClass=' blockbg6';
	  }elseif($pageBackground=='Picture1'){
		 $bgClass=' blockbg7';
	  }elseif($pageBackground=='Picture2'){
		 $bgClass=' blockbg8';
	  }elseif($pageBackground=='Picture3'){
		 $bgClass=' blockbg9';
	  }
  }
  //Custom background theme
  elseif($pageCustom=='Yes'){
	  $bgClass='';
	  if($fontColor==''){
		 $font='';
	  }else{
		 $font=' style="color:'.$fontColor.';"';
	  }
	  if($pageImg==''){
		 $bgImg='';
	  }else{
		 if($bgRepeat=='')$bgRepeat='repeat';
		 if($bgFixed=='')$bgFixed='fixed';
		 $bgImg=' url('.$pageImg.') '.$bgRepeat.' center '.$bgFixed.'';
	  }
	  $padding='';
	  if($fullEmbed<>''){
		 if($hideTitle=='Yes'){
	       $padding=' padding:0';
		 }else{
		   $padding=' padding-bottom:0';
		 }
	  }
	  if($customColor==''){
		 $style='';
	  }else{
		 $style=' style="background:'.$customColor.$bgImg.$padding.';"';
	  }
  }
?>
    <section id="<?php echo $post->post_name;?>" class="page-area<?php echo $bgClass;?>"<?php echo $style;?>>
       <div class="wrapper"<?php if($fullEmbed<>''):?> style="width:100%"<?php endif;?>>
         <?php if($hideTitle!='Yes'):?>
           <hgroup class="title">
              <h1<?php echo $font;?>><strong><?php echo _e(apply_filters(' ', _($mainHeading)));?></strong></h1>
              <?php if($subHeading<>''):?><p<?php echo $font;?>><?php echo _e(apply_filters(' ', _($subHeading)));?></p><?php endif;?>
           </hgroup>
         <?php endif;?>
         <?php if($fullEmbed<>''):?>
           <div class="full-embed"><?php echo van_shortcode($fullEmbed);?></div>
         <?php else:?>
           <div class="entry"<?php echo $font;?>>
           <?php van_content(true,true);?>
           </div>
          <?php endif;?>
       </div>
    </section>
    
 <?php endwhile;?>