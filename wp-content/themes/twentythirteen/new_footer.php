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

<div class="layer-info" style="display:none" id="layer-info">
</div>

  <script type="text/javascript" src="//platform.twitter.com/widgets.js"></script>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/betterthis-base.js"></script>
  <script>
	jQuery(document).ready(function( $ ) {
		$(document).on('click', '.share.fb', function(e) {
			FB.ui({
				method: 'feed',
				name: $(this).data('name'),
				link: $(this).data('link'),
				picture: $(this).data('pic'),
				caption: $(this).data('caption'),
				description: $(this).data('desc'),
			});
		});
	});
  </script>
  </body>
</html>
