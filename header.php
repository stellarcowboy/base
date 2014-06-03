<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<title>
        <?php if(is_front_page()) {?>
            <?php bloginfo('name'); ?>
        <?php } else { ?>
            <?php echo wp_title( ' | ', false, right ); 
            bloginfo('name'); ?>
        <?php } ?>
	</title>
	<!-- While these meta keywords are not ideal and the meta description could be better, they are better than nothing -->
	<meta name="keywords" content="<?php bloginfo( 'name' ); echo ' , '; bloginfo( 'description' ); ?>" />
	<meta name="description" content="<?php bloginfo( 'description' ); ?>" />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="index" title="<?php bloginfo( 'name' ); ?>" href="<?php echo get_option('home'); ?>/" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'rss2_url' ); ?>" />
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'atom_url' ); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="wrapper">
    <?php include('mainnav.php'); ?>