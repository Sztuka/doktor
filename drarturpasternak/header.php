<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset=<?php bloginfo('charset') ?>>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?> data-bs-spy="scroll" data-bs-target="#navbarNav">
        <nav class="navbar navbar-expand-lg navbar-light sticky-top">
            <div class="container-fluid">
                <!-- Left container for logo -->
                <div class="navbar-brand">
                    <a href="<?php echo home_url(); ?>" class="logo-placeholder">
                        <?php
                        if ( function_exists( 'the_custom_logo' ) ) {
                            the_custom_logo();
                        }
                        ?>
                    </a>
                </div>
                <!-- Middle container for menu -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <div class="navbar-text d-lg-none mb-3">
                            <a href="#" class="language-toggler pl active">PL</a>
                            <a href="#" class="language-toggler en">EN</a>
                        </div>
                        <?php
                        wp_nav_menu( array(
                            'theme_location' => 'header-menu',
                            'container'      => false,
                            'menu_class'     => 'navbar-nav',
                            'fallback_cb'    => '__return_false',
                            'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                            'depth'          => 3,
                            'walker'         => new Bootstrap_Walker_Nav_Menu(),
                        ) );
                        ?>
                    </div>
                </div>
                <!-- Right container for language toggler -->
                <div class="navbar-text">
                    <a href="#" class="language-toggler en"><span>EN</span></a>
                    <a href="#" class="language-toggler pl active"><span>PL</span></a>
                </div>
            </div>
        </nav>
