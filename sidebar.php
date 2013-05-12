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
						<a class="tile app bg-color-<?php echo $other_news_data[$_count]['color']; ?>" href="<?php the_permalink(); ?>">
							<div class="image-wrapper">
								<span class="icon icon-list-2"></span>
							</div>
							<span class="app-label"><?php the_title(); ?></span>
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

					<a class="tile wide imagetext wideimage bg-color-<?php echo $other_shop_data[$_count]['color']; ?>" href="<?php echo home_url() . '/' . $tax_slug . '/' . $tslug; ?>">
		                 <div class="image-wrapper">
		                    <img src="content/img/metro-tiles.jpg">
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