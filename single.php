<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage underground
 * @since underground
 */

get_header(); ?>

<div class="container-fluid metro marketing">
	<div class="row-fluid">
		<!-- sidebar -->
		<?php get_sidebar(); ?>
		<!-- sidebar end -->
		<div class="span8">
			<p class="marketing-byline" style="text-decoration: underline; text-align: left; margin-bottom:0;"><strong>店舗名</strong></p>
			<?php while ( have_posts() ) : the_post(); 	// シングルページ出力 ?>

				<h1 style="text-align: left;"><?php the_title(); ?></h1>
				<p style="text-align: right; text-decoration: underline;"><?php the_time( 'Y年m月d日（D）' ); ?></p>
				<?php the_post_thumbnail(); ?>
				<div style="text-align: left;">
				<?php the_content(); ?>
				</div>

			<?php endwhile; // end of the loop. ?>

			<?php wp_reset_query(); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>