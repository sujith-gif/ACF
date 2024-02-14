<?php
/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/dashboard.php.
 *
 * @package WooCommerce\Templates
 * @version 4.4.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$allowed_html = array(
    'a' => array(
        'href' => array(),
    ),
);
?>

<p>
    <!-- <?php
    printf(
        /* translators: 1: user display name 2: logout url */
        wp_kses(__( 'Hello %1$s (not %1$s? <a href="%2$s">Log out</a>)', 'woocommerce' ), $allowed_html),
        '<strong>' . esc_html($current_user->display_name) . '</strong>',
        esc_url(wc_logout_url())
    );
    ?> -->
</p>

<p>
    <h2>Dashboard</h2>
    <?php
    /* translators: 1: Orders URL 2: Address URL 3: Account URL. */
    $dashboard_desc = __('From your account dashboard you can view your <a href="%1$s">recent orders</a>, manage your <a href="%2$s">billing address</a>, and <a href="%3$s">edit your password and account details</a>.', 'woocommerce');
    if (wc_shipping_enabled()) {
        $dashboard_desc = __('From your account dashboard you can view your <a href="%1$s">recent orders</a>, manage your <a href="%2$s">shipping and billing addresses</a>, and <a href="%3$s">edit your password and account details</a>.', 'woocommerce');
    }
    printf(
        wp_kses($dashboard_desc, $allowed_html),
        esc_url(wc_get_endpoint_url('orders')),
        esc_url(wc_get_endpoint_url('edit-address')),
        esc_url(wc_get_endpoint_url('edit-account'))
    );
    ?>
</p>
<div class="container mt-4">
    <div class="row flex-nowrap gap">
        <!-- Column 1 - Shopping Icon -->
        <div class="col-md-4 text-center bg-E7F7FD p-3">
            <a href="<?php echo esc_url(wc_get_endpoint_url('orders')); ?>">
                <i class="fas fa-bag-shopping fa-3x"></i>
                <p class="mt-2">Orders</p>
            </a>
        </div>

        <!-- Column 2 - Location Icon -->
        <div class="col-md-4 text-center bg-E7F7FD p-3">
            <a href="<?php echo esc_url(wc_get_endpoint_url('edit-address')); ?>">
                <i class="fa-solid fa-location-dot fa-3x"></i>
                <p class="mt-2">Address</p>
            </a>
        </div>

        <!-- Column 3 - Account Details Icon -->
        <div class="col-md-4 text-center bg-E7F7FD p-3">
            <a href="<?php echo esc_url(wc_get_endpoint_url('edit-account')); ?>">
                <i class="fa-regular fa-user fa-3x"></i>
                <p class="mt-2">Account Details</p>
            </a>
        </div>
    </div>
</div>


<?php
/**
 * My Account dashboard.
 *
 * @since 2.6.0
 */

do_action('woocommerce_account_dashboard');

/**
 * Deprecated woocommerce_before_my_account action.
 *
 * @deprecated 2.6.0
 */
do_action('woocommerce_before_my_account');

/**
 * Deprecated woocommerce_after_my_account action.
 *
 * @deprecated 2.6.0
 */
do_action('woocommerce_after_my_account');
