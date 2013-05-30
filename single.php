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
		<div class="span8">
			<?php while ( have_posts() ) : the_post(); 	// シングルページ出力 ?>

				<!-- <p class="marketing-byline" style="text-decoration: underline; text-align: left; margin-bottom:0;">
					<strong>店舗名</strong>
				</p> -->

				<h1 style="text-align: left;"><?php the_title(); ?></h1>
				<div class="ninja_onebutton">
					<script type="text/javascript">
					//<![CDATA[
					(function(d){
					if(typeof(window.NINJA_CO_JP_ONETAG_BUTTON_7dc259188404fd2e3cc678fc40d3192f)=='undefined'){
					    document.write("<sc"+"ript type='text\/javascript' src='http:\/\/omt.shinobi.jp\/b\/7dc259188404fd2e3cc678fc40d3192f'><\/sc"+"ript>");
					}else{
					    window.NINJA_CO_JP_ONETAG_BUTTON_7dc259188404fd2e3cc678fc40d3192f.ONETAGButton_Load();}
					})(document);
					//]]>
					</script><span class="ninja_onebutton_hidden" style="display:none;"><?php the_permalink(); ?></span><span style="display:none;" class="ninja_onebutton_hidden"><?php the_title(); ?></span>
				</div>
				<p style="text-align: left; text-decoration: underline; position: relative; top: -40px; width: 180px;">
					<?php the_time( 'Y年m月d日（D）' ); ?>
				</p>
				<?php the_post_thumbnail(); ?>
				<div style="text-align: left; padding-bottom:40px;">
				<?php the_content(); ?>
				</div>
				<div class="ninja_onebutton">
					<script type="text/javascript">
					//<![CDATA[
					(function(d){
					if(typeof(window.NINJA_CO_JP_ONETAG_BUTTON_7dc259188404fd2e3cc678fc40d3192f)=='undefined'){
					    document.write("<sc"+"ript type='text\/javascript' src='http:\/\/omt.shinobi.jp\/b\/7dc259188404fd2e3cc678fc40d3192f'><\/sc"+"ript>");
					}else{
					    window.NINJA_CO_JP_ONETAG_BUTTON_7dc259188404fd2e3cc678fc40d3192f.ONETAGButton_Load();}
					})(document);
					//]]>
					</script><span class="ninja_onebutton_hidden" style="display:none;"><?php the_permalink(); ?></span><span style="display:none;" class="ninja_onebutton_hidden"><?php the_title(); ?></span>
				</div>

			<?php endwhile; // end of the loop. ?>

			<?php wp_reset_query(); ?>
		</div>
		<!-- sidebar -->
		<?php get_sidebar(); ?>
		<!-- sidebar end -->
	</div>
</div>

<?php get_footer(); ?>