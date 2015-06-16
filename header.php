<?php
if(function_exists('xdebug_disable')) { xdebug_disable(); }
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Foreign_Affairs
 * @since Foreign Affairs 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title(); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/superfish.css">
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.ico" />
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,700,700italic|Roboto+Condensed:400italic,400,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
    <![endif]-->
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page">
    <div id="header">

        <div class="clearfix"></div>
        <div class="container">
        
       
            <div class="logo">
                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" class="img-responsive" alt="<?php bloginfo('name'); ?>">
                    <div class="row pull-right site-title">
                        <h5 class="bordered"><?php _e('Turkish Republic of Northern Cyprus','foreignaffairs') ?></h5>
                        <h5><?php _e('Ministry of Foreign Affairs','foreignaffairs') ?><br>&nbsp;</h5>
						<h5><?php bloginfo('name'); ?></h5>
                    </div>
                </a>
            </div>
            <div class="pull-right">
                <ul class="list-inline language pull-right">
					<?php if( function_exists('icl_get_languages') && 1==2) : ?>
                    <?php foreach(icl_get_languages('skip_missing=N&orderby=KEY&order=DIR&link_empty_to=str') as $lang): ?>
                        <?php $class = $lang["active"] ? "active": ""; ?>
                    <li class="item <?php echo $class;?>">
                        <a href="<?php echo $lang["url"] ?>"><?php echo $lang["native_name"]?></a>
                    </li>
                    <?php endforeach; ?>
					<?php endif; ?>
                </ul>
                <div class="clearfix"></div>
                <div id="search-container" class="search-box-wrapper pull-right">
                    <div class="search-box">
                        <?php get_search_form(); ?>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
                <nav id="primary-navigation" class="site-navigation primary-navigation" role="navigation">
                	<div id="consular-main-menu">
                		<div id="megaMenuToggle" class="megaMenuToggle">Menu&nbsp; <span class="megaMenuToggle-icon"></span></div>
                    <?php wp_nav_menu(array('theme_location' => 'primary', 'menu_class' => 'nav-menu sf-menu list-inline pull-right')); ?>
                </div>
                </nav>
                <div class="clearfix"></div>
        </div>
    </div>
    <div class="container">
        <div id="main" class="site-main container-fluid">