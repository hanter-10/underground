<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage underground
 * @since underground
 */
?>
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

   <!-- Header
   ================================================== -->
   <header id="nav-bar" class="container-fluid">
      <div class="row-fluid">
         <div class="span8">
            <div id="header-container">
               <a id="backbutton" class="win-backbutton" href="javascript:history.back();"></a>
               <h5>UndoerGround</h5>
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
         <div id="top-info" class="pull-right">
	         <a id="settings" class="pull-left" href="#">
	            <b class="icon-settings"></b>
	         </a>
         </div>
      </div>
   </header>