<?php 
global $VAN;
get_header();

// Hack. Set $post so that the_date() works.
$post = $posts[0]; 

//Get the value of custom category field
$cat_ID = get_cat_ID(single_cat_title('', false)); 
$cat = get_category($cat_ID);
$cat_id = get_query_var('cat');
$cat_data = get_option("category_$cat_id");
$cat_headTitle=$cat_data['headtitle'];
?>

<div id="container">

    <!--Blog Archive-->
    <section id="content" class="page-area">
       <div class="wrapper">
         <?php if(is_category()):?>
           <hgroup class="title">
              <h1><?php if(isset($cat_headTitle) && $cat_headTitle<>''){echo $cat_headTitle;}else{echo __('Archive for','SimpleKey').' <strong>'.$cat->cat_name.'</strong>';}?></h1>
              <p><?php echo category_description();?></p>
           </hgroup>
         <?php elseif( is_tag()):?>
           <hgroup class="title">
              <h1><?php printf(__('Tagged <strong>%s</strong>', 'SimpleKey'), single_tag_title('', false) ); ?></h1>
              <p><?php printf(__('Browsing all posts tagged with %s', 'SimpleKey'), single_tag_title('', false) ); ?></p>
           </hgroup>
         <?php elseif (is_day()):?>
           <hgroup class="title">
              <h1><?php printf(_c('On <strong>%s</strong>', 'SimpleKey'), get_the_time(__('F jS, Y', 'SimpleKey'))); ?></h1>
              <p><?php printf(_c('Browsing all posts on <strong>%s</strong>', 'SimpleKey'), get_the_time(__('F jS, Y', 'SimpleKey'))); ?></p>
           </hgroup>
         <?php elseif (is_month()):?>
           <hgroup class="title">
              <h1><?php printf(_c('On <strong>%s</strong>', 'SimpleKey'), get_the_time(__('F, Y', 'SimpleKey'))); ?></h1>
              <p><?php printf(_c('Browsing all posts on <strong>%s</strong>', 'SimpleKey'), get_the_time(__('F, Y', 'Simple'))); ?></p>
           </hgroup>
          <?php elseif (is_year()):?>
           <hgroup class="title">
              <h1><?php printf(_c('On year <strong>%s</strong>', 'SimpleKey'), get_the_time(__('Y', 'SimpleKey'))); ?></h1>
              <p><?php printf(_c('Browsing all posts on <strong>%s</strong>', 'SimpleKey'), get_the_time(__('Y', 'SimpleKey'))); ?></p>
           </hgroup>
         <?php endif;?>
         
         <div class="line"></div>
         <?php get_template_part('content','loop');?> 
       </div>
    </section>
    
    <?php get_template_part('content','contact');?>
</div>
<?php get_footer();?>