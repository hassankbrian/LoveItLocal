<?php 
global $VAN;
get_header();
?>

<div id="container">

    <!--Blog Archive-->
    <section id="content" class="page-area">
       <div class="wrapper">
           <hgroup class="title">
              <h1><?php printf(__('Result of <strong>%s</strong>', 'SimpleKey'), $_GET['s']); ?></h1>
              <p><?php printf(__('Browsing all posts about <strong>%s</strong>', 'SimpleKey'), $_GET['s']); ?></p>
           </hgroup>
         
         <div class="line"></div>
         <?php get_template_part('content','loop');?> 
       </div>
    </section>
    
    <?php get_template_part('content','contact');?>
</div>
<?php get_footer();?>