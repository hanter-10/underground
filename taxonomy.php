<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
    <meta name="description" content="Camera a free jQuery slideshow with many effects, transitions, adaptive layout, easy to customize, using canvas and mobile ready">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
	<link rel='stylesheet' id='camera-css'  href='<?php echo get_template_directory_uri(); ?>/css/slider/camera.css' type='text/css' media='all'>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/metro/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/metro/bootstrap-responsive.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/metro/bootmetro.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/metro/bootmetro-tiles.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/metro/bootmetro-charms.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/metro/metro-ui-light.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/metro/icomoon.css">

   <!-- Le fav and touch icons -->
   <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/ico/favicon.ico">
   <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/ico/apple-touch-icon-144-precomposed.png">
   <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/ico/apple-touch-icon-114-precomposed.png">
   <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/ico/apple-touch-icon-72-precomposed.png">
   <link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/ico/apple-touch-icon-57-precomposed.png">

   <!-- All JavaScript at the bottom, except for Modernizr and Respond.
      Modernizr enables HTML5 elements & feature detects; Respond is a polyfill for min/max-width CSS3 Media Queries
      For optimal performance, use a custom Modernizr build: www.modernizr.com/download/ -->
   <script src="<?php echo get_template_directory_uri(); ?>/js/metro//modernizr-2.6.1.min.js"></script>

    <style>
		html,body {
			height: 100%;
			margin: 0;
			padding: 0;
		}
		a {
			color: #09f;
		}
		a:hover {
			text-decoration: none;
		}
		#back_to_camera {
			background: rgba(255,255,255,.9);
			clear: both;
			display: block;
			height: 40px;
			line-height: 40px;
			padding: 20px;
			position: relative;
			z-index: 1;
		}
		.fluid_container {
			bottom: 0;
			height: 100%;
			left: 0;
			position: fixed;
			right: 0;
			top: 0;
			z-index: 0;
		}
		#camera_wrap {
			bottom: 0;
			height: 100%;
			left: 0;
			margin-bottom: 0!important;
			position: fixed;
			right: 0;
			top: 0;
		}
		.camera_bar {
			z-index: 2;
		}
		.camera_thumbs {
			margin-top: -168px;
			position: relative;
			z-index: 1;
		}
		.camera_thumbs_cont {
			border-radius: 0;
			-moz-border-radius: 0;
			-webkit-border-radius: 0;
		}
		.camera_overlayer {
			opacity: .1;
		}
	</style>

	<script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/js/slider/jquery.min.js'></script>
    <script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/js/slider/jquery.mobile.customized.min.js'></script>
    <script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/js/slider/jquery.easing.1.3.js'></script>
    <script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/js/slider/camera.js'></script>

    <script>
		jQuery(function(){

			jQuery('#camera_wrap').camera({
				height: 'auto',
				loader: 'bar',
				barPosition: 'top',
				playPause: false,
				pagination: false,
				thumbnails: true,
				hover: false,
				opacityOnGrid: false
				//imagePath: '<?php echo get_template_directory_uri(); ?>/img/'
			});

		});
	</script>
</head>
<body>
<div class="fluid_container">
		<div id="back_to_camera">
	    	<header id="nav-bar" class="container-fluid">
		      <div class="row-fluid">
		         <div class="span12">
		            <div id="header-container">
		               <a id="backbutton" class="win-backbutton" href="javascript:history.back();"></a>
		               <h5>UndoerGround : <strong><?php echo (get_term_by("slug", $term, $taxonomy)->name);?></strong></h5>
		               <div class="dropdown">
		                  <a class="header-dropdown dropdown-toggle accent-color" data-toggle="dropdown" href="#">
		                     <?php echo esc_html(get_post_type_object(get_post_type())->label ); ?> UnderGround.
		                     <b class="caret"></b>
		                  </a>
		                  <ul class="dropdown-menu">
			                  <?php foreach ( get_custom_post_type() as $cp_type ) : ?>
			                  <li><a href="<?php echo home_url() . '/' . $cp_type['slug']; ?>"><?php echo $cp_type['label']; ?></a></li>
			                  <?php endforeach; ?>
			                  <li class="divider"></li>
			                  <li><a href="<?php echo home_url(); ?>">Home</a></li>
			              </ul>
			           </div>
		            </div>
		         </div>
		      </div>
		   </header>
	    </div>
        <div class="camera_wrap camera_emboss pattern_1" id="camera_wrap">

        	<?php
        	// 取得情報
        	$args = array(
        			'post_type' => get_post_type(),
        			'taxonomy' => $taxonomy,
        			'term' => $term,
        			'posts_per_page' => -1,
        	);
        	// クエリ発行
        	query_posts( $args );
        	?>

        	<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php the_title();?>

					<?php
					// アイキャッチ画像の情報を取得
					$eye_img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
					list( $src, $width, $height ) = $eye_img;
					$thum_eye_img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail' );
					list( $thum_src, $thum_width, $thum_height ) = $thum_eye_img;
					?>

					<div data-thumb="<?php echo $thum_src;?>" data-src="<?php echo $src;?>">
						<div class="camera_caption fadeFromBottom" >
							<a href="<?php the_permalink() ?>" >
								<h2><?php the_title();?></h2>
								<?php the_excerpt();?>
							</a>
						</div>
		            </div>
				<?php endwhile; ?>
			<?php endif; ?>

			<?php wp_reset_query(); ?>
        </div><!-- #camera_wrap -->
</div>
<!-- Grab Google CDN's jQuery. fall back to local if necessary -->
<script>window.jQuery || document.write("<script src='scripts/jquery-1.8.2.min.js'>\x3C/script>")</script>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/metro/jquery.mousewheel.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/metro/jquery.scrollTo.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/metro/bootstrap.min.js"></script>
</body>
</html>
