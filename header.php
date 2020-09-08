<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My first Blog Theme</title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div class="page">
        <header id="masthead" class="site-header" role="banner">
            <div class="site-branding">
                <p class="site-title">
                    <a href="<?php echo esc_url(home_url('/'));?>">
                        <?php bloginfo( 'name' ); ?>
                    </a>
                </p>
                <p class="site-description">
                    <?php bloginfo( 'description' ) ?>
                </p>
            </div>
            <nav id="site-navigation" class="main-navigation" role="navigation">
                <?php 
                    if(has_nav_menu( 'main-menu' )){
                        wp_nav_menu( [
                            'theme_location' => 'main-menu'
                        ] );
                    }
                ?>
            </nav>
        </header>
    
    <div id="content" class="site-content">
