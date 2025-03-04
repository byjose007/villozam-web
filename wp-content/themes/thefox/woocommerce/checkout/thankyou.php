<?php
/**
 * Thankyou page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     8.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( $order ) : ?>

	<?php if ( $order->has_status( 'failed' ) ) : ?>

		<p><?php _e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction.', 'thefoxwp' ); ?></p>

		<p><?php
			if ( is_user_logged_in() )
				_e( 'Please attempt your purchase again or go to your account page.', 'thefoxwp' );
			else
				_e( 'Please attempt your purchase again.', 'thefoxwp' );
		?></p>

		<p>
			<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php _e( 'Pay', 'thefoxwp' ) ?></a>
			<?php if ( is_user_logged_in() ) : ?>
			<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay"><?php _e( 'My Account', 'thefoxwp' ); ?></a>
			<?php endif; ?>
		</p>

	<?php else : ?>
		<div class="order_complete_ctn">
        <h2><?php _e( 'Billing Details', 'thefoxwp' ); ?></h2>
		<h3 class="thx_msg"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Thank you. Your order has been received.', 'thefoxwp' ), $order ); ?></h3>

		<ul class="order_details">
			<li class="order">
				<?php _e( 'Order:', 'thefoxwp' ); ?>
				<strong><?php echo $order->get_order_number(); ?></strong>
			</li>
			<li class="date">
				<?php _e( 'Date:', 'thefoxwp' ); ?>
				<strong><?php echo wc_format_datetime( $order->get_date_created() ); ?></strong>
			</li>
			<?php if ( is_user_logged_in() && $order->get_user_id() === get_current_user_id() && $order->get_billing_email() ) : ?>
				<li class="woocommerce-order-overview__email email">
					<?php _e( 'Email:', 'woocommerce' ); ?>
					<strong><?php echo $order->get_billing_email(); ?></strong>
				</li>
			<?php endif; ?>

			<li class="total">
				<?php _e( 'Total:', 'thefoxwp' ); ?>
				<strong><?php echo $order->get_formatted_order_total(); ?></strong>
			</li>
				<?php if ( $order->get_payment_method_title() ) : ?>

				<li class="woocommerce-order-overview__payment-method method">
					<?php _e( 'Payment method:', 'woocommerce' ); ?>
					<strong><?php echo wp_kses_post( $order->get_payment_method_title() ); ?></strong>
				</li>

			<?php endif; ?>
		</ul>
		<div class="clear"></div>

	<?php endif; ?>

		<?php do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>
		<?php do_action( 'woocommerce_thankyou', $order->get_id() ); ?>

<?php else : ?>

	<p><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Thank you. Your order has been received.', 'thefoxwp' ), null ); ?></p>

<?php endif; ?>
