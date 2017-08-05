<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="mobile-web-app-capable" content="yes">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
<style>
.sticky-shrinknav-header-title { color: <?php echo get_theme_mod( 'nvc_header' ); ?> }
.hover-underline-menu .menu { background-color: <?php echo get_theme_mod( 'nvc_nav' ); ?> }
a { color: <?php echo get_theme_mod( 'nvc_link' ); ?> }
a:hover { color: <?php echo get_theme_mod( 'nvc_link_hover' ); ?> }
.button, [type="submit"] { background: <?php echo get_theme_mod( 'nvc_link' ); ?> !important; }
.button:hover, [type="submit"]:hover { background: <?php echo get_theme_mod( 'nvc_link_hover' ); ?> !important; }
header h1 a { color: <?php echo get_theme_mod( 'nvc_header_link' ); ?> }
header h1 a:hover { color: <?php echo get_theme_mod( 'nvc_header_link_hover' ); ?> }
footer, .page-numbers.current { background-color: <?php echo get_theme_mod( 'nvc_footer' ); ?> }
footer p, footer a, footer h5, footer li { color: <?php echo get_theme_mod( 'nvc_footertext' ); ?> }
</style>
</head>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">

<header role="banner" itemscope itemtype="http://schema.org/WPHeader">
	<h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
	<nav class="hover-underline-menu" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement" data-menu-underline-from-center>
		<?php wp_nav_menu(array('theme_location' => 'header', 'menu_class' => 'menu align-center sticky-shrinknav-menu')); ?>
	</nav>
</header>

<div class="wrapper" role="main">