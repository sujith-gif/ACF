<?php
// Enqueue styles and scripts
function enqueue_styles_and_scripts() {
    // Enqueue Bootstrap CSS
    wp_enqueue_style('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
    // Enqueue your theme stylesheet
    wp_enqueue_style('font-awesome','https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css');
    wp_enqueue_style('theme-style', get_stylesheet_uri());
    wp_enqueue_style('custom-styles', get_template_directory_uri() . '/custom-styles.css', array(), '1.0', 'all');

    // Enqueue Bootstrap JS and Popper.js with jQuery as a dependency
    wp_enqueue_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', array('jquery'), null, true);
    wp_enqueue_script('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array('jquery', 'popper'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_styles_and_scripts');

// Register a custom menu location for icons
// register_nav_menu('icon_menu', 'Icon Menu');

// Register navigation menus
function register_custom_menus() {
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'custom-theme'),
        'secondary' => __('Secondary Menu', 'custom-theme'),
        'footer' => __('Footer Menu', 'custom-theme'),
        'icon_menu' => __('Icon Menu', 'custom-theme'), // Add your custom menu location
                'cart_menu' => __('Cart Menu', 'custom-theme'), // Add a new custom menu for the cart


    ));
}
add_action('init', 'register_custom_menus');

// Add theme support
function theme_support() {
    add_theme_support('title-tag');
    add_theme_support('custom-logo');

    // Set custom logo dimensions
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    add_theme_support('post-thumbnails');
    add_theme_support('menus'); // Add support for menus

    // Add other theme supports as needed
}
add_action('after_setup_theme', 'theme_support');



// Register sidebar for the footer
// Register four sidebars for the footer
for ($i = 1; $i <= 4; $i++) {
    register_sidebar(array(
        'name'          => __('Footer Widget ' . $i, 'custom-theme'),
        'id'            => 'footer-widget-' . $i,
        'description'   => __('Add widgets here to appear in the footer.', 'custom-theme'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5 class="widget-title">',
        'after_title'   => '</h5>',
    ));
}
function register_custom_footer_widgets() {
    register_sidebar(array(
        'name'          => __('Copyright Column', 'custom-theme'),
        'id'            => 'copyright-widget-area',
        'description'   => __('Add widgets here for the copyright column.', 'custom-theme'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5 class="widget-title">',
        'after_title'   => '</h5>',
    ));

    register_sidebar(array(
        'name'          => __('Social Icons Column', 'custom-theme'),
        'id'            => 'social-icons-widget-area',
        'description'   => __('Add widgets here for the social icons column.', 'custom-theme'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5 class="widget-title">',
        'after_title'   => '</h5>',
    ));
}
add_action('widgets_init', 'register_custom_footer_widgets');
// function yith_search_shortcode() {
//     return do_shortcode('[yith_woocommerce_ajax_search preset="default"]');
// }

// add_shortcode('yith_search', 'yith_search_shortcode');

function get_cart_count_menu_item() {
    ob_start();
    ?>
    <li class="nav-item">
        <a class="nav-link cart-icon" href="<?php 
        echo esc_url(wc_get_cart_url());
         ?>">
        <i class="fa-solid fa-bag-shopping"></i>
            <span class="cart-count"><?php 
            echo WC()->cart->get_cart_contents_count(); 
            ?></span>
        </a>
    </li>
    <?php
    return ob_get_clean();
}
add_filter( 'woocommerce_cod_process_payment_order_status', 'change_cod_payment_order_status', 10, 2 );
function change_cod_payment_order_status( $order_status, $order ) {
    return 'on-';
}
/**
 * Add "Cash on Delivery" order status in WooCommerce
 */
function add_cod_order_status() {
    register_post_status('wc-cod', array(
        'label'                     => 'Cash on Delivery',
        'public'                    => true,
        'exclude_from_search'       => false,
        'show_in_admin_all_list'    => true,
        'show_in_admin_status_list' => true,
        /* Add other arguments here as needed */
    ));
}
add_action('init', 'add_cod_order_status');

/**
 * Add "Cash on Delivery" to list of selectable order statuses
 */
function add_cod_to_order_statuses($order_statuses) {
    $new_order_statuses = array();

    // Add new order status after processing
    foreach ($order_statuses as $key => $status) {
        $new_order_statuses[$key] = $status;
        if ('wc-processing' === $key) {
            $new_order_statuses['wc-cod'] = 'Cash on Delivery';
        }
    }

    return $new_order_statuses;
}
add_filter('wc_order_statuses', 'add_cod_to_order_statuses');
// Change order status to 'Cash on Delivery' when payment method is COD
function set_order_status_to_cod($order_id) {
    // Get the order
    $order = wc_get_order($order_id);

    // Check if payment method is Cash on Delivery
    if ($order && 'cod' === $order->get_payment_method()) {
        // Set order status to 'wc-cod'
        $order->update_status('wc-cod');
    }
}
add_action('woocommerce_thankyou', 'set_order_status_to_cod', 10, 1);
//   to display cart count//
//   cart refresh
