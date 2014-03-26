<?php 
global $VAN;
get_header();
if(isset($_GET['author_name'])) :
$author = get_userdatabylogin($author_name);
else :
$author = get_userdata(intval($author));
endif;
?>

<div id="container">

    <!--Author Archive-->
    <section id="content" class="page-area">
       <div class="wrapper">
           <hgroup class="title">
              <h1><?php echo __('Author: ','SimpleKey').'<strong>'.$author->display_name.'</strong>'; ?></h1>
              <p><?php echo __( 'Browsing all posts of ','SimpleKey').'<strong>'.$author->display_name.'</strong>';?></p>
           </hgroup>
         
           <div class="line"></div>
           
           <?php get_template_part('content','loop');?> 
       </div>
    </section>
    
    <?php get_template_part('content','contact');?>
</div>
<?php get_footer();?>