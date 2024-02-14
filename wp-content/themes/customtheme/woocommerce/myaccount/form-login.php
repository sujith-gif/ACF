<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

do_action('woocommerce_before_customer_login_form'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2><?php esc_html_e('Login', 'woocommerce'); ?></h2>

            <form class="woocommerce-form woocommerce-form-login login" method="post">

                <?php do_action('woocommerce_login_form_start'); ?>

                <div class="form-group">
                    <label for="username"><?php esc_html_e('Username or email address', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
                    <input type="text" class="form-control" name="username" id="username" autocomplete="username" value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" />
                </div>

                <div class="form-group">
                    <label for="password"><?php esc_html_e('Password', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
                    <input class="form-control" type="password" name="password" id="password" autocomplete="current-password" />
                </div>

                <?php do_action('woocommerce_login_form'); ?>

                <div class="form-group form-check">
                    <input class="form-check-input" name="rememberme" type="checkbox" id="rememberme" value="forever" />
                    <label class="form-check-label" for="rememberme"><?php esc_html_e('Remember me', 'woocommerce'); ?></label>
                </div>
                <?php wp_nonce_field('woocommerce-login', 'woocommerce-login-nonce'); ?>
                <button type="submit" class="btn btn-primary" name="login" value="<?php esc_attr_e('Log in', 'woocommerce'); ?>"><?php esc_html_e('Log in', 'woocommerce'); ?></button>

                <p class="woocommerce-LostPassword lost_password">
                    <a href="<?php echo esc_url(wp_lostpassword_url()); ?>"><?php esc_html_e('Lost your password?', 'woocommerce'); ?></a>
                </p>

                <?php do_action('woocommerce_login_form_end'); ?>
            </form>
        </div>

        <div class="col-md-6">
            <!-- Registration Form -->
            <?php if ('yes' === get_option('woocommerce_enable_myaccount_registration')) : ?>

                <h2><?php esc_html_e('Register', 'woocommerce'); ?></h2>

                <form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action('woocommerce_register_form_tag'); ?> >

                    <?php do_action('woocommerce_register_form_start'); ?>

                    <div class="form-group">
                        <label for="reg_email"><?php esc_html_e('Email address', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
                        <input type="email" class="form-control" name="email" id="reg_email" autocomplete="email" value="<?php echo (!empty($_POST['email'])) ? esc_attr(wp_unslash($_POST['email'])) : ''; ?>" />
                    </div>

                    <div class="form-group">
                        <label for="reg_password"><?php esc_html_e('Password', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
                        <input type="password" class="form-control" name="password" id="reg_password" autocomplete="new-password" />
                    </div>

                    <?php do_action('woocommerce_register_form'); ?>

                    <?php wp_nonce_field('woocommerce-register', 'woocommerce-register-nonce'); ?>
                    <button type="submit" class="btn btn-success" name="register" value="<?php esc_attr_e('Register', 'woocommerce'); ?>"><?php esc_html_e('Register', 'woocommerce'); ?></button>

                    <?php do_action('woocommerce_register_form_end'); ?>
                </form>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php do_action('woocommerce_after_customer_login_form'); ?>
