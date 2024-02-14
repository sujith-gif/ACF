<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <?php
            if (function_exists('the_custom_logo')) {
                $custom_logo_id = get_theme_mod('custom_logo');
                $logo = wp_get_attachment_image_src($custom_logo_id);
            }
            ?>
            <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo $logo[0] ?>" alt="Logo" height="30"></a>

            <!-- Hamburger Icon Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Navigation Items -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <?php
                // Display the primary menu
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_class'     => 'navbar-nav mr-auto',

                ));

                ?>
                <ul class="navbar-nav ml-auto">

                    <?php

                    wp_nav_menu(array(
                        'theme_location' => 'icon_menu',
                        'menu_class'     => 'navbar-nav ml-auto',
                        'items_wrap' => '<ul class="navbar-nav me-auto mb-2 mb-lg-0">%3$s' . get_cart_count_menu_item('cart-count-icon') . '</ul>',

                    ));

                    ?>


                </ul>
            </div>
        </nav>
    </div>