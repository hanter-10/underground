<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, Twenty Twelve already
 * has tag.php for Tag archives, category.php for Category archives, and
 * author.php for Author archives.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage underground
 * @since underground
 */

get_header(); ?>

		<?php
		// タームの記事一覧取得
// 		$postID = get_the_ID();
// 		$terms = get_the_terms($postID,'press');

// 		foreach ( $terms as $term ) {
// 			$tslug = esc_html($term->slug);
// 			$tname = esc_html($term->name);
// 			break;
// 		}

		// 取得情報
		$args = array(
				'post_type' => get_post_type(),
				'showposts' => 6,
		);

		// クエリ発行
		query_posts( $args );
		?>

	<div class="container-fluid">
      <div class="row-fluid">
         <div class="metro span12">
			<h2><u>New Arrival</u></h2>
				<?php $new_arrival_data = get_new_arrival(); ?>
				<?php if ( have_posts() ) : ?>
					<?php $_count = 0; ?>
					<?php while ( have_posts() ) : the_post(); ?>

						<?php
						// アイキャッチ画像の情報を取得
						$eye_img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
						list( $src, $width, $height ) = $eye_img;
						$thum_eye_img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail' );
						list( $thum_src, $thum_width, $thum_height ) = $thum_eye_img;
						?>

						<a class="tile app bg-color-<?php echo $new_arrival_data[$_count]['color']; ?>" href="<?php the_permalink(); ?>">
							<div class="image-wrapper" style="height: 125px; margin-top:0; padding:0;">
								<!--<span class="icon icon-list-2"></span> -->
								<img src="<?php echo $thum_src;?>" style="max-width: none; max-height:none;">
							</div>
							<div class="textover-wrapper bg-color-blue" style="padding-left: 5px;">
								<strong><?php the_title(); ?></strong>
							</div>
							<!--<span class="app-label"><?php the_title(); ?></span>-->
						</a>

					<?php $_count++; ?>
					<?php endwhile; ?>
				<?php else : ?>
					新着記事はありません。
				<?php endif; ?>

				<?php wp_reset_query(); ?>
		 </div>
      </div>
      <br />
      <div class="row-fluid">
		 <div class="metro span12">
			<h2><u>Shop Archive</u></h2>
				<?php $shop_archive_data = get_shop_archive(); ?>
				<?php
				// タームの記事一覧取得
				$postID = get_the_ID();
				$tax_args = array (
					'public' => true,
					'object_type' => array( get_post_type() ),
				);
				$taxonomies = get_taxonomies( $tax_args, 'names' );
				foreach ( $taxonomies as $taxonomie ) {
					$tax_slug = $taxonomie;
				}
				$tmp_terms = get_terms( $tax_slug, "get=all" );

				?>

				<?php $_count = 0; ?>
				<?php foreach ( $tmp_terms as $tmp_term ) : ?>

					<?php
					$tslug = esc_html($tmp_term->slug);
					$tname = esc_html($tmp_term->name);
					?>

					<?php
// 					pr(get_post_thumbnail_id());
// 					// アイキャッチ画像の情報を取得
// 					$eye_img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'medium' );
// 					list( $src, $width, $height ) = $eye_img;
// 					$thum_eye_img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail' );
// 					list( $thum_src, $thum_width, $thum_height ) = $thum_eye_img;
					?>

					<?php
					// 件数
					$_page = 2;
					// 取得情報
					$args = array(
							'post_type' => get_post_type(),
							'taxonomy' => $tax_slug,
							'term' => $tslug,
							'posts_per_page' => $_page,
					);
					// クエリ発行
					query_posts( $args );
					?>

					<?php if ( have_posts() ) : ?>
						<?php while ( have_posts() ) : the_post(); ?>

							<?php
							// アイキャッチ画像の情報を取得
							$eye_img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
							list( $src, $width, $height ) = $eye_img;
							$thum_eye_img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail' );
							list( $thum_src, $thum_width, $thum_height ) = $thum_eye_img;
							?>

							<?php // ショップアーカイブ ?>
							<?php if ( 0 === $wp_query->current_post ) :?>
							<a class="tile wide imagetext wideimage bg-color-<?php echo $shop_archive_data[$_count]['color']; ?>" href="<?php echo home_url() . '/' . $tax_slug . '/' . $tslug; ?>">
				                 <div class="image-wrapper" id="slider1">
				                    <img src="<?php echo $src;?>" style="max-width: none; max-height:none; width: 310px;">
				                 </div>
				                 <div class="textover-wrapper bg-color-blue">
				                    <div class="app-label"><?php echo $tmp_term->name; ?></div>
				                 	<div class="app-count"><?php echo $tmp_term->count; ?></div>
				                 </div>
							</a>
							<?php endif; ?>

							<?php // 記事詳細  ?>
							<a class="tile app bg-color-<?php echo $new_arrival_data[$_count]['color']; ?>" href="<?php the_permalink(); ?>">
								<div class="image-wrapper" style="height: 125px; margin-top:0; padding:0;">
									<!--<span class="icon icon-list-2"></span> -->
									<img src="<?php echo $thum_src;?>" style="max-width: none; max-height:none;">
								</div>
								<div class="textover-wrapper bg-color-blue" style="padding-left: 5px;">
									<strong><?php the_title(); ?></strong>
								</div>
								<!--<span class="app-label"><?php the_title(); ?></span>-->
							</a>

							<?php $_count++; ?>
							<?php if ( $_count > 5 ) $_count = 0; ?>
						<?php endwhile; ?>
					<?php else: ?>
						店舗はありません。
					<?php endif; ?>

				<?php endforeach; ?>
				<?php wp_reset_query(); ?>

		 </div>
      </div>
   </div>
<?php get_footer(); ?>