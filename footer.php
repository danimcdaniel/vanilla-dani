</div> <!-- END #content -->

<div id="footer">
   <div class="footer-widgets">
      <div class="block four">
            <?php dynamic_sidebar('footer-four'); ?>
      </div>
      <div class="block three">
            <?php dynamic_sidebar('footer-three'); ?>
      </div>
      <div class="block one">
            <?php dynamic_sidebar('footer-one'); ?>
      </div>
      <div class="block two">
            <?php dynamic_sidebar('footer-two'); ?>
      </div>
   </div>

   <div class="footer-content">
      <div class="right">
         <ul>
            <li><a href="#wrapper">Back to Top</a></li>
         </ul>
      </div>
      <div class="left">
         <?php wp_nav_menu( 
            array(
                  'theme_location' => 'footer-menu',
                  'container' => '',
                  )
         ); ?>
         <ul>
            <li><a href="http://anidandesign.com">Theme Created by Dani</a></li>
            <li><?php echo stripslashes(get_option('dm_rights_text')); ?></li>
         </ul>
      </div>
   </div>
</div> <!-- END #footer -->
<?php wp_footer(); //leave for plugins ?>
<?php echo stripslashes(get_option('dm_ga_code')); ?>
</body>
</html>