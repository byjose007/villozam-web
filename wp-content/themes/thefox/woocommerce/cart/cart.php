<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


global $woocommerce;

wc_print_notices();
?>


<?php

do_action( 'woocommerce_before_cart' ); ?>

<form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">

<?php do_action( 'woocommerce_before_cart_table' ); ?>
<script type="text/javascript" charset="utf-8">

var j$ = jQuery;

j$.noConflict();

	j$(window).load(function() {

		j$(".cross-sells ul").carouFredSel({
					responsive: true,
					width: "100%",
					scroll: 1,
					prev: ".related_left",
					next: ".related_right",
					auto: false,
					items: {
						width: 330,
						height: "100%",
					//	height: "30%",	//	optionally resize item-height
						visible: {
							min: 1,
							max: 4
						}
					}
				});
		j$(".products").css("opacity","1");



				});
	</script>


<div class="user_current_cart">
<table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
	<thead>
		<tr>
			<th class="product-remove">&nbsp;</th>
			<th class="product-thumbnail"><?php esc_html_e( 'Product', 'thefoxwp' ); ?></th>
            <th class="product-name"><?php esc_html_e( 'Description', 'thefoxwp' ); ?></th>
			<th class="product-price"><?php esc_html_e( 'Price', 'thefoxwp' ); ?></th>
			<th class="product-quantity"><?php esc_html_e( 'Quantity', 'thefoxwp' ); ?></th>
			<th class="product-subtotal"><?php esc_html_e( 'Subtotal', 'thefoxwp' ); ?></th>

		</tr>
	</thead>
	<tbody>
		<?php do_action( 'woocommerce_before_cart_contents' ); ?>

		<?php
foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
			$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

			if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
				$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
				?>
				<tr class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
                        						<!-- Remove from cart link -->
						<td class="product-remove">
							<?php
								echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
									'<a href="%s" class="remove fa fa-times" aria-label="%s" data-product_id="%s" data-product_sku="%s"></a>',
									esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
									__( 'Remove this item', 'thefoxwp' ),
									esc_attr( $product_id ),
									esc_attr( $_product->get_sku() )
								), $cart_item_key );
							?>
						</td>
						<!-- The thumbnail -->
						<td class="product-thumbnail">
							<?php
							$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

							if ( ! $product_permalink ) {
								echo $thumbnail;
							} else {
								printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail );
							}
						?>
						</td>

						<!-- Product Name -->
						<td class="product-name">
							<?php
							if ( ! $product_permalink ) {
									echo wp_kses_post( $product_name . '&nbsp;' );
								} else {
									echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key );
								}

								// Meta data
								echo wc_get_formatted_cart_item_data( $cart_item );

								// Backorder notification
								if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
									echo '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'thefoxwp' ) . '</p>';
								}
						?>
						</td>

						<!-- Product price -->
						<td class="product-price">
							<?php
								echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
						?>
						</td>

						<!-- Quantity inputs -->
						<td class="product-quantity">
						<?php
								if ( $_product->is_sold_individually() ) {
									$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
								} else {
									$product_quantity = woocommerce_quantity_input( array(
										'input_name'  => "cart[{$cart_item_key}][qty]",
										'input_value' => $cart_item['quantity'],
										'max_value'   => $_product->get_max_purchase_quantity(),
										'min_value'   => '0',
									), $_product, false );
								}

								echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item );
							?>
						</td>

						<!-- Product subtotal -->
						<td class="product-subtotal">
							<?php
							echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
						?>
						</td>

					</tr>
					<?php
				}
			}


		do_action( 'woocommerce_cart_contents' );
		?>
		<?php do_action( 'woocommerce_after_cart_contents' ); ?>
	</tbody>
</table>

<?php if ( wc_coupons_enabled() ) { ?>
		<div class="coupon">
		<input name="coupon_code" class="input-text" id="coupon_code" placeholder="<?php esc_html_e( 'Enter promotion code here', 'thefoxwp' ); ?>" /> <input type="submit" class="button alt2" name="apply_coupon" value="<?php esc_html_e( 'Apply', 'thefoxwp' ); ?>" />
		<?php do_action('woocommerce_cart_coupon'); ?>
		</div>
<?php } ?>

  <div class="update_cart">
	<input type="submit" class="button alt2" name="update_cart" value="<?php esc_html_e( 'Update Cart', 'thefoxwp' ); ?>" /> <input type="submit" class="checkout-button button" name="proceed" value="<?php esc_html_e( 'Proceed to Checkout &rarr;', 'thefoxwp' ); ?>" />


	<?php do_action( 'woocommerce_cart_actions' ); ?>

	<?php wp_nonce_field( 'woocommerce-cart' ); ?>
    </div>
</div>




<div class="shipping_calc_container">


</div>




<?php do_action( 'woocommerce_after_cart_table' ); ?>

</form>
<div class="cart-collaterals">

	<?php do_action('woocommerce_cart_collaterals'); ?>
	<?php woocommerce_shipping_calculator(); ?>

</div>


<?php do_action( 'woocommerce_after_cart' ); ?>
