<?php
/**
 * Review order form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     5.2.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce;

?><div id="order_review_t"><div class="order_and_total_wrapper woocommerce-checkout-review-order-table">
	<table class="shop_table">
		<thead>
			<tr>
				<th class="product-name"><?php _e( 'Product', 'thefoxwp' ); ?></th>
				<th class="product-description"><?php _e( 'Description', 'thefoxwp' ); ?></th>
				<th class="product-qty"><?php _e( 'Quantity', 'thefoxwp' ); ?></th>
				<th class="product-total"><?php _e( 'Total', 'thefoxwp' ); ?></th>
			</tr>
		</thead>

		<tbody>
			<?php
				do_action( 'woocommerce_review_order_before_cart_contents' );

				if (sizeof(WC()->cart->get_cart())>0) :
			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item )  :
						$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
						if ($_product->exists() && $cart_item['quantity']>0) :
							echo '
								<tr class="' . esc_attr( apply_filters('woocommerce_checkout_table_item_class', 'checkout_table_item', $cart_item, $cart_item_key ) ) . '">';
								?>
						<!-- The thumbnail -->
						<td class="product-name">
							<?php
								$thumbnail = apply_filters( 'woocommerce_in_cart_product_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

								if ( ! $_product->is_visible() )
									echo !empty( $thumbnail ) ? $thumbnail : '';
								else
									printf('<a href="%s">%s</a>', esc_url( get_permalink( apply_filters('woocommerce_in_cart_product_id', $cart_item['product_id'] ) ) ), $thumbnail );
							?>
						</td>

						<!-- Product Name -->
						<td class="product-description">

							<?php echo apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;'; ?>
						</td>
                        <?php echo '<td class="product-qty">'.apply_filters( 'woocommerce_checkout_item_quantity', '<strong class="product-quantity">' . $cart_item['quantity'] . '</strong>', $cart_item, $cart_item_key ) .
										wc_get_formatted_cart_item_data( $cart_item ) .'
										</td>
									<td class="product-total">' . apply_filters( 'woocommerce_checkout_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ) . '</td>
								</tr>';
						endif;
					endforeach;
				endif;

				do_action( 'woocommerce_review_order_after_cart_contents' );
			?>
		</tbody>
    <tfoot class="rd_order_total" cellspacing="0">
			<tr class="cart-subtotal">
				<th><?php _e( 'Cart Subtotal', 'thefoxwp' ); ?></th>
				<td><?php wc_cart_totals_subtotal_html(); ?></td>
			</tr>

			<?php if ( WC()->cart->get_total_discount() ) : ?>

			<tr class="discount">
				<th><?php _e( 'Cart Discount', 'thefoxwp' ); ?></th>
				<td>-<?php echo WC()->cart->get_total_discount(); ?></td>
			</tr>

			<?php endif; ?>
<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

				<?php do_action( 'woocommerce_review_order_before_shipping' ); ?>

				<?php wc_cart_totals_shipping_html(); ?>

				<?php do_action( 'woocommerce_review_order_after_shipping' ); ?>

						<?php endif; ?>

			<?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
				<tr class="fee">
					<th><?php echo esc_html( $fee->name ); ?></th>
					<td><?php wc_cart_totals_fee_html( $fee ); ?></td>
				</tr>
			<?php endforeach; ?>

			<?php if ( WC()->cart->get_tax_price_display_mode === 'excl' ) : ?>
				<?php if ( get_option( 'woocommerce_tax_total_display' ) === 'itemized' ) : ?>
					<?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : ?>
						<tr class="tax-rate tax-rate-<?php echo sanitize_title( $code ); ?>">
							<th><?php echo esc_html( $tax->label ); ?></th>
							<td><?php echo wp_kses_post( $tax->formatted_amount ); ?></td>
						</tr>
					<?php endforeach; ?>
				<?php else : ?>
					<tr class="tax-total">
						<th><?php echo esc_html( WC()->countries->tax_or_vat() ); ?></th>
						<td><?php echo wc_price( WC()->cart->get_taxes_total() ); ?></td>
					</tr>
				<?php endif; ?>
			<?php endif; ?>

		<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
			<tr class="cart-discount coupon-<?php echo esc_attr( $code ); ?>">
				<th><?php wc_cart_totals_coupon_label( $coupon ); ?></th>
				<td><?php wc_cart_totals_coupon_html( $coupon ); ?></td>
			</tr>
		<?php endforeach; ?>

			<?php do_action( 'woocommerce_review_order_before_order_total' ); ?>

			<tr class="total">
				<th><?php _e( 'Order Total', 'thefoxwp' ); ?></th>
				<td><?php wc_cart_totals_order_total_html(); ?></td>
			</tr>

			<?php do_action( 'woocommerce_review_order_after_order_total' ); ?>
		</tfoot>
        </table>
        </div></div>
