<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
<?php wp_body_open(); ?>
<div id="page">
    <header id="site-header" itemscope itemtype="http://schema.org/WPHeader">
        <div>
            <nav itemscope itemtype="http://schema.org/SiteNavigationElement" id="mobile-window">
                <a id="nav-toggle" class="nav-slide-button" href="#">
                    <?php
                    if (get_theme_mod('writertheme_menu_text_setting')) {
                        echo esc_url(get_theme_mod('writertheme_menu_text_setting'));
                    } else {
                        echo esc_html__('Menu', 'writer-theme');
                    } ?>
                    <span></span>
                </a>

                <?php wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_id' => 'primary-menu',
                    'menu_class' => 'pull clear',
                    'container' => false,
                    'depth' => 1
                )); ?>
            </nav>

            <div>
            <?php
                the_custom_logo();
                if (!has_custom_logo()) { ?>
                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" itemscope itemtype="http://schema.org/Brand">
                    <h1 class="site-title" itemprop="name"><?php bloginfo('name'); ?></h1>
                </a>
            <?php } ?>
            </div>
        </div>

        <div>
            <?php get_search_form(); ?>
        </div>
    </header>

    <?php
    if ( is_home() && get_theme_mod( 'writertheme_about_text_setting' ) ) { ?>
        <div class="widget" id="intro">
            <?php echo esc_html( get_theme_mod( 'writertheme_about_text_setting' ) ); ?>
            <a class="nav-link" href="<?php echo esc_url_raw( get_theme_mod( 'writertheme_about_link_setting' ) ); ?>"><?php echo esc_html( get_theme_mod( 'writertheme_about_button_setting' ) ); ?></a>
        </div>
    <?php } ?>

    <?php if (is_search()) { ?>
    <main class="grid" itemscope itemtype="http://schema.org/SearchResultsPage">
    <?php }

    else { ?>
    <main class="grid">
    <?php } ?>

