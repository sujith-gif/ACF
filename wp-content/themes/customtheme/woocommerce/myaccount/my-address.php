<?php
/**
 * My Addresses
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-address.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.6.0
 */

defined( 'ABSPATH' ) || exit;

$customer_id = get_current_user_id();

if ( ! wc_ship_to_billing_address_only() && wc_shipping_enabled() ) {
	$get_addresses = apply_filters(
		'woocommerce_my_account_get_addresses',
		array(
			'billing'  => __( 'Billing address', 'woocommerce' ),
			'shipping' => __( 'Shipping address', 'woocommerce' ),
		),
		$customer_id
	);
} else {
	$get_addresses = apply_filters(
		'woocommerce_my_account_get_addresses',
		array(
			'billing' => __( 'Billing address', 'woocommerce' ),
		),
		$customer_id
	);
}

$oldcol = 1;
$col    = 1;
?>
<p>
    <?php echo apply_filters('woocommerce_my_account_my_address_description', esc_html__('The following addresses will be used on the checkout page by default.', 'woocommerce')); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
</p>
<?php if (!wc_ship_to_billing_address_only() && wc_shipping_enabled()) : ?>
    <div class="woocommerce-Addresses col-12">
<?php endif; ?>
<?php foreach ($get_addresses as $name => $address_title) :
    $address = wc_get_account_formatted_address($name);
    $col     = $col * -1;
    $oldcol  = $oldcol * -1;
    // Retrieve user information inside the loop
    $user_info = get_userdata($customer_id);
    ?>
    <div class="woocommerce-Address mb-4">
        <div class="address-header">
            <h3><?php echo esc_html($address_title); ?></h3>
            <a href="<?php echo esc_url(wc_get_endpoint_url('edit-address', $name)); ?>" class="edit btn btn-sm btn-primary"><?php echo $address ? esc_html__('Edit', 'woocommerce') : esc_html__('Add', 'woocommerce'); ?></a>
        </div>
        <div class="address-content">
            <table class="table table">
                <tbody>
                    <tr>
                        <th class=""><?php esc_html_e('First Name', 'woocommerce'); ?></th>
                        <td><?php echo esc_html($user_info->billing_first_name); ?></td>
                    </tr>
                    <tr>
                        <th class=""><?php esc_html_e('Last Name', 'woocommerce'); ?></th>
                        <td><?php echo esc_html($user_info->billing_last_name); ?></td>
                    </tr>
          <tr>
                         <th class=""><?php esc_html_e( 'Country', 'woocommerce' ); ?></th>
                         <td><?php echo esc_html( $user_info->billing_country ); ?></td>
                     </tr>
                     <tr>
                         <th class=""><?php esc_html_e( 'Street Address', 'woocommerce' ); ?></th>
                         <td><?php echo esc_html( $user_info->billing_address_1 ); ?></td>
                     </tr>
                     <tr>
                         <th class=""><?php esc_html_e( 'Town/City', 'woocommerce' ); ?></th>
                         <td><?php echo esc_html( $user_info->billing_city ); ?></td>
                     </tr>
                     <tr>
                         <th class=""><?php esc_html_e( 'State', 'woocommerce' ); ?></th>
                         <td><?php echo esc_html( $user_info->billing_state ); ?></td>
                     </tr>
                     <tr>
                         <th class=""><?php esc_html_e( 'Postcode', 'woocommerce' ); ?></th>
                         <td><?php echo esc_html( $user_info->billing_postcode ); ?></td>
                     </tr>
                     <tr>
                         <th class=""><?php esc_html_e( 'Phone', 'woocommerce' ); ?></th>
                         <td><?php echo esc_html( $user_info->billing_phone ); ?></td>
                     </tr>
                     <tr>
                         <th class=""><?php esc_html_e( 'Email', 'woocommerce' ); ?></th>
                         <td><?php echo esc_html( $user_info->user_email ); ?></td>
                     </tr>
                </tbody>
            </table>
        </div>
    </div>
<?php endforeach; ?>
<?php if (!wc_ship_to_billing_address_only() && wc_shipping_enabled()) : ?>
    </div>
<?php endif; ?>