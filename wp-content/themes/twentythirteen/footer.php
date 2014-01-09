<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>

		</div><!-- #main -->
		
	</div><!-- #page -->

  <?php wp_footer(); ?>
  
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/betterthis-base.js"></script>
  <script type="text/javascript">
  if(window.location.href.indexOf('/contact') > 0 || window.location.href.indexOf('/about') > 0) {
    jQuery('#comments').hide();
    jQuery('#tertiary').hide();
  }
  </script>
  

  </body>
</html>
