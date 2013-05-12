<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

<div role="main">
	<section class="wrap center" id="error-404">
		<div class="container">
		<figure><img src="<?php echo get_template_directory_uri(); ?>/images/common/icn_404.png" alt="Page not found"></figure>
		<h1><?php _e( 'Page not found', 'gengo' ); ?></h1>
		<p><?php _e( 'Sorry - we can’t find the page you’ve tried to access. Please check you’ve typed or pasted the address correctly.<br>
			If you think there’s an error on our end - please', 'gengo' ); ?> <a href="#">contact us.</a></p>
			</div>
	</section>
</div>
<!-- /main -->

<?php get_footer(); ?>