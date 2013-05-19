         <!-- sidebar -->
         <div class="span4">
            <h2 style="text-decoration: underline;">OTHER NEWS</h2>
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
              $terms = get_the_terms($postID,$tax_slug);
              foreach ( $terms as $term ) {
              	$tslug = esc_html($term->slug);
              	$tname = esc_html($term->name);
              	break;
              }

              // 取得情報
              $args = array(
              		'post_type' => get_post_type(),
              		'taxonomy' => $tax_slug,
              		'term' => $tslug,
              		'posts_per_page' => 4,
              		'post__not_in' => array( $postID ),
              );
              // クエリ発行
              query_posts( $args );
              ?>

				<?php if ( have_posts() ) : ?>
					<?php $other_news_data= get_other_news(); ?>
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
					<?php if ( $_count > 5 ) $_count = 0; ?>
					<?php endwhile; ?>
					<?php if ( $_count%2 !== 0 ) :?>
						<a class="tile app" href="javascript:void(0)" style="visibility: hidden;">
							<div class="image-wrapper">
								<span class="icon icon-list-2"></span>
							</div>
							<span class="app-label"></span>
						</a>
					<?php endif;?>
				<?php else : ?>
					他の記事はありません。
				<?php endif; ?>

				<?php wp_reset_query(); ?>

            <h2 style="text-decoration: underline;">OTHER SHOPS</h2>
            	<?php $other_shop_data = get_other_shops(); ?>
            	<?php
				// タームの記事一覧取得
				$postID = get_the_ID();
				foreach ( $taxonomies as $taxonomie ) {
					$tax_slug = $taxonomie;
				}
				$terms = get_terms( $tax_slug, "get=all" );
				?>

				<?php $_count = 0; ?>
				<?php foreach ( $terms as $term ) : ?>

					<?php
					$tslug = esc_html($term->slug);
					$tname = esc_html($term->name);

					$term_data = get_terms( $tax_slug, "get=$tslug" );
					foreach ( $term_data as $tdata ){
						$term_count = $tdata->count;
					}
					?>

					<?php
					// アイキャッチ画像の情報を取得
					$eye_img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'medium' );
					list( $src, $width, $height ) = $eye_img;
					$thum_eye_img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail' );
					list( $thum_src, $thum_width, $thum_height ) = $thum_eye_img;
					?>

					<a class="tile wide imagetext wideimage bg-color-<?php echo $shop_archive_data[$_count]['color']; ?>" href="<?php echo home_url() . '/' . $tax_slug . '/' . $tslug; ?>">
		                 <div class="image-wrapper">
		                    <img src="<?php echo $src;?>" style="max-width: none; max-height:none; width: 310px;">
		                 </div>
		                 <div class="textover-wrapper bg-color-blue">
		                    <div class="app-label"><?php echo $tname; ?></div>
		                 	<div class="app-count"><?php echo $term_count; ?></div>
		                 </div>
					</a>
					<?php $_count++; ?>
					<?php if ( $_count > 5 ) $_count = 0; ?>
				<?php endforeach; ?>

         </div>
         <!-- sidebar end -->