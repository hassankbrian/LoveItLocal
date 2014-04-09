<?php global $VAN;?>
<?php if(!isset($VAN['hide_foot']) || $VAN['hide_foot']==1):?>
<footer id="footer">

<div class="subscribe" 
     style="margin-top:-20px;
            margin-right:auto;
            margin-left: auto;
            display: inline;
            text-align:center;
            color:#FFFFFF;">
  <h2 style="font-size:medium;text-transform:none;">Accede a LoveItLocal.</h2>
  <form action="http://loveitlocal.us8.list-manage.com/subscribe/post?u=fb544d00cf079b60f28a516f7&id=c9ae7f4fa1" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
    <input type="text" id="mce-EMAIL" name="EMAIL" class="subscribe-input" value="" placeholder="Email" required />
    <button type="submit" name="submit" id="mc-embedded-subscribe" class="large_btn subscribe-btn">Únete</button>
  </form>
</div>

</br>

 <div class="wrapper">
      <div class="footer-l">
        <?php echo $VAN['copyright'];?>
        <?php if($VAN['theme_credit']==1):?><br/>Designed by <a href="http://www.themevan.com" target="_blank" title="Premium WordPress Themes">Oscar Pierre</a><?php endif;?>
      </div>
      <div class="footer-r menu">        
        <?php wp_nav_menu(array(
				  'theme_location' => 'footer_navi',
				  'echo' => true,
				  'fallback'=>false,
                  'depth' => 1 ) );
		 ?>
        
      </div>
 </div>
</footer>
<?php endif;?>
<?php if(!isset($VAN['hide_backtoTop']) || $VAN['hide_backtoTop']==1):?>
<a href="#top" id="backtoTop"></a>
<?php endif;?>
<?php wp_footer();?>
</body>
</html>
