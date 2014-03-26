<?php 
global $VAN;
$col=$VAN['portfolio_columns'];
?>
<?php if (have_posts()):?>
<div class="portfolios columns<?php echo $col;?>">
 <?php
 while (have_posts()) : the_post(); 
    $portfolio_link=trim(strip_tags(get_post_meta($post->ID, "portfolio_link_value", true)));
	$layout='';
	if($col==4){
		$thumbnail='portfolio_thumbnail_4';
		$limit=120;
	}elseif($col==5){
		$thumbnail='portfolio_thumbnail_5';
		$limit=80;
	}else{
		$thumbnail='portfolio_thumbnail';
		$limit=180;
	}
	if(van_is_mobile()){
		$thumbnail='portfolio_thumbnail';
	}
	
	if($portfolio_link==''){
	   $link="javascript:void(0);";
	   $target="_self";
	   $ajax=" ajax";
	}else{
	   $link=$portfolio_link;
	   $target="_blank";
	   $ajax="";
	}
	
    $terms = get_the_terms( $post->ID, 'portfolios');
	$slug=array();
 ?>
 <?php
  if(has_post_thumbnail($post->ID)){
			$image_id = get_post_thumbnail_id(get_the_ID());
			$thumbnail_url = wp_get_attachment_image_src($image_id, $thumbnail, true);
  if ( $terms && ! is_wp_error( $terms ) ){
    foreach ( $terms as $term ){
		$slug[] = $term->slug;
	}
	$on_slug = join( " ", $slug);
 ?>
 <div id="portfolio-<?php the_ID(); ?>" class="portfolio-item <?php echo $on_slug;?>" data-url="<?php the_permalink();?>">
       <a class="overlay<?php echo $ajax;?>" href="<?php echo $link;?>" target="<?php echo $target;?>">
         <h3><?php the_title();?></h3>
         <p><?php echo van_truncate(strip_tags(get_the_content()),$limit)?></p>
       </a>
       <div class="tools">
       <?php if($portfolio_link==''):?>
       <span data-url="<?php the_permalink();?>"><a href="javascript:void(0);" class="zoomin ajax">ZoomIn</a></span>
       <a href="<?php the_permalink();?>" class="info">Info</a>
       <?php else:?>
        <a href="<?php echo $link;?>" class="info">Info</a>
       <?php endif;?>
      
       </div>
       <a href="<?php echo $$link;?>" class="item"><img src="<?php echo $thumbnail_url[0];?>" alt="<?php the_title();?>" /></a>        
 </div>
  <?php 
   }
  } 
  endwhile;
 ?>
  <div class="clearfix"></div>
 </div>
 <?php echo van_pagenavi();?>
<?php else:?>
      <div class="entry">
            <?php _e( 'Apologies, no portfolios found.', 'SimpleKey' ); ?>
       </div>
  </article>
<?php endif;?>