<?php
/**
 * Checkout Order Receipt Template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/order-receipt.php.
 *
 * @package WooCommerce\Templates
 * @version 3.2.0
 */

if (!defined('ABSPATH')) {
    exit;
}
?>

<style>
    /* Custom styles for order receipt */
    .order_details {
        list-style-type: none;
        padding: 10px;
        background-color: #f7f7f7; /* Add your preferred background color */
        border: 1px solid #e0e0e0; /* Add your preferred border color */
        border-radius: 5px;
        font-size: 16px; /* Add your preferred font size */
    }

    .order_details li {
        margin-bottom: 10px;
    }

    .order_details strong {
        font-weight: bold;
    }

    .clear {
        clear: both;
    }
</style>

<ul class="order_details">
    <li class="order">
        <?php esc_html_e('Order number:', 'woocommerce'); ?>
        <strong><?php echo esc_html($order->get_order_number()); ?></strong>
    </li>
    <li class="date">
        <?php esc_html_e('Date:', 'woocommerce'); ?>
        <strong><?php echo esc_html(wc_format_datetime($order->get_date_created())); ?></strong>
    </li>
    <li class="total">
        <?php esc_html_e('Total:', 'woocommerce'); ?>
        <strong><?php echo wp_kses_post($order->get_formatted_order_total()); ?></strong>
    </li>
    <?php if ($order->get_payment_method_title()) : ?>
        <li class="method">
            <?php esc_html_e('Payment method:', 'woocommerce'); ?>
            <strong><?php echo wp_kses_post($order->get_payment_method_title()); ?></strong>
        </li>
    <?php endif; ?>
</ul>

<?php do_action('woocommerce_receipt_' . $order->get_payment_method(), $order->get_id()); ?>

<div class="clear"></div>
