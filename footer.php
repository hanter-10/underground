   <hr>
   <p>© 2013 PK-Brothers. </p>

   <!-- Grab Google CDN's jQuery. fall back to local if necessary -->
   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
   <script>window.jQuery || document.write("<script src='scripts/jquery-1.8.2.min.js'>\x3C/script>")</script>

   <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/metro/google-code-prettify/prettify.js"></script>
   <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/metro/jquery.mousewheel.js"></script>
   <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/metro/jquery.scrollTo.js"></script>
   <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/metro/bootstrap.min.js"></script>
   <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/metro/bootmetro.js"></script>
   <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/metro/bootmetro-charms.js"></script>
   <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/metro/demo.js"></script>
   <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/metro/holder.js"></script>

   <script type="text/javascript">
      $(".metro").metro();
   </script>
   <?php //if ( false ) :?>
   <?php if ( is_archive() || is_single() ) :?>
   <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/cycle/jquery.cycle.all.js"></script>
   <script type="text/javascript">
	jQuery( function() {
	    jQuery( '.slider' ) .cycle({
	    	fx: 'fade',
	        speed: 2000,
	        timeout: 3000,
	        sync: 1
		});
	} );
	</script>
	<?php endif;?>

</body>
</html>