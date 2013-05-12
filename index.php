<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<!-- Mobile viewport optimized: h5bp.com/viewport -->
	<meta name="viewport" content="width=device-width,minimum-scale=1">

	<!-- remove or comment this line if you want to use the local fonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>

	<!-- Le styles -->
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/metro/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/metro/bootstrap-responsive.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/metro/bootmetro.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/metro/bootmetro-tiles.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/metro/bootmetro-charms.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/metro/metro-ui-light.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/metro/icomoon.css">

	<!--  these two css are to use only for documentation -->
   <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/metro/demo.css">
   <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/js/metro/google-code-prettify/prettify.css" >

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

<?php wp_head(); ?>
</head>

<body data-accent="blue">
  <!-- Prompt IE 6 users to install Chrome Frame. Remove this if you support IE 6.
       chromium.org/developers/how-tos/chrome-frame-getting-started -->
  <!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->

   <header id="hero" class="">
         <div class="jumbotron masthead">
            <div class="container-fluid">
               <div class="row-fluid">
                  <div class="inner span5">
                     <h1>UnderGround</h1>
                     <h2>アンダーグラウンドスタイル</h2>
                     <p>ここに説明文を入れる。ここに説明文を入れる。ここに説明文を入れる。ここに説明文を入れる。ここに説明文を入れる。ここに説明文を入れる。</p>
                  </div>
                  <div class="span7">
                     <p class="pull-right">
                        <a class="btn btn-large btn-success" href="javascript:void(0)" style="margin:5px;width:250px;">
                           使用方法とかのリンク
                           <i class="icon-arrow-right-7"></i>
                        </a>
						<br />
                        <a class="btn btn-large btn-warning" href="javascript:void(0)" style="margin:5px;width:250px;">
                           サービスとかのリンク
                           <i class="icon-arrow-right-7"></i>
                        </a>
                        <br />
                        <a class="btn btn-large btn-danger" href="javascript:void(0)" style="margin:5px;width:250px;">
                           Aboutとかのリンク
                           <i class="icon-arrow-right-7"></i>
                        </a>
                     </p>
                  </div>
               </div>
            </div>
         </div>
   </header>


   <div id="home-tiles" class="container-fluid metro marketing">
      <h1>UnderGround Place</h1>
      <p class="marketing-byline">参加している地域は以下になります的な。説明の場所</p>

      <div class="row-fluid">
         <?php foreach ( get_custom_post_type() as $cp_type ): ?>
         <div class="span4">
            <a class="tile wide imagetext bg-color-<?php echo $cp_type['color']; ?> app first" href="<?php echo home_url() . '/' . $cp_type['slug']; ?>">
               <div class="image-wrapper">
                  <span class="icon icon-grid-view"/>
               </div>
               <div class="column-text">
                  <div class="text-header3"><?php echo $cp_type['label']; ?></div>
               </div>
               <div class="app-count">
				<?php
					echo wp_count_posts( $cp_type['slug'], 'publish' )->publish;
				?>
               </div>
            </a>
         </div>
         <?php endforeach; ?>
      </div>
   </div>

<?php
echo get_footer(); ?>