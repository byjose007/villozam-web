<?php
/**
 * Single Product Thumbnails
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-thumbnails.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version   3.5.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


global $post, $product, $woocommerce;

$attachment_ids = $product->get_gallery_image_ids();

if ( $attachment_ids ) {
	?>

<div class="product_thumb_wrapper">
<div class="woo_img_next fa fa-angle-up"></div>
<div class="single_products_thumbnails">
			<?php
				// From product-image.php
				if ( has_post_thumbnail() ) {

					$image_title 		= esc_attr( get_the_title( get_post_thumbnail_id() ) );
					$image_link  		= wp_get_attachment_url( get_post_thumbnail_id() );
					$image	   		= get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_thumbnail' ), array(
						'title' => $image_title
						) );
					$attachment_count   = count( $product->get_gallery_image_ids() );

					if ( $attachment_count > 0 ) {
						$gallery = '[product-gallery]';
					} else {
						$gallery = '';
					}

					echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', sprintf( '%s', $image ), $post->ID );

				}

				$loop = 0;
				$columns = apply_filters( 'woocommerce_product_thumbnails_columns', 3 );

				foreach ( $attachment_ids as $attachment_id ) {

					$classes[] = 'image-'.$attachment_id;

					$image_link = wp_get_attachment_url( $attachment_id );

					if ( ! $image_link )
						continue;

					$image	   = wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_small_thumbnail_size', 'shop_thumbnail' ) );
					$image_class = esc_attr( implode( ' ', $classes ) );
					$image_title = esc_attr( get_the_title( $attachment_id ) );

					echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', sprintf( '%s', $image ), $attachment_id, $post->ID, $image_class );

					$loop++;
				}

			?>

</div>
<div class="woo_img_prev fa fa-angle-down"></div>
	</div>
	<?php
}
