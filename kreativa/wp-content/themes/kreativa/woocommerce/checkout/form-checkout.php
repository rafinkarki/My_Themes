<?php
/**
 * Checkout Form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

				<div class="row white-back box">
					<div class="col-md-12">
							<?php
							wc_print_notices();
							
							do_action( 'woocommerce_before_checkout_form', $checkout );
							
							// If checkout registration is disabled and not logged in, the user cannot checkout
							if ( ! $checkout->enable_signup && ! $checkout->enable_guest_checkout && ! is_user_logged_in() ) {
								echo apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) );
								return;
							}
							
							// filter hook for include new pages inside the payment method
							$get_checkout_url = apply_filters( 'woocommerce_get_checkout_url', WC()->cart->get_checkout_url() ); ?>
							<div class="module-title">
								<h4><?php _e('Products','WooCommerce')?></h4>
								<span class="module-separator"></span>
							</div>
							<div class="table-responsive clearfix">
							<table id="cart-table" class="table table-condensed" cellspacing="0">
								<thead>
									<tr>
										<th class="product-remove"><?php _e( 'Action', 'woocommerce' ); ?></th>
										<th class="product-thumbnail"><?php _e( 'Image', 'woocommerce' ); ?></th>
										<th class="product-name"><?php _e( 'Product', 'woocommerce' ); ?></th>
										<th class="product-price"><?php _e( 'Price', 'woocommerce' ); ?></th>
										<th class="product-quantity"><?php _e( 'Quantity', 'woocommerce' ); ?></th>
										<th class="product-subtotal"><?php _e( 'Total', 'woocommerce' ); ?></th>
									</tr>
								</thead>
								<tbody>
									<?php do_action( 'woocommerce_before_cart_contents' ); ?>

									<?php
									foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
										$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
										$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

										if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
											?>
											<tr class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

												<td class="product-remove">
													<?php
														echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf( '<a href="%s" class="remove" title="%s">&times;</a>', esc_url( WC()->cart->get_remove_url( $cart_item_key ) ), __( 'Remove this item', 'woocommerce' ) ), $cart_item_key );
													?>
												</td>

												<td class="product-thumbnail">
													<?php
														$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(array(50,50)), $cart_item, $cart_item_key );

														if ( ! $_product->is_visible() )
															echo $thumbnail;
														else
															printf( '<a href="%s">%s</a>', $_product->get_permalink( $cart_item ), $thumbnail );
													?>
												</td>

												<td class="product-name">
													<?php
														if ( ! $_product->is_visible() )
															echo apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key ) . '&nbsp;';
														else
															echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s </a>', $_product->get_permalink( $cart_item ), $_product->get_title() ), $cart_item, $cart_item_key );

														// Meta data
														echo WC()->cart->get_item_data( $cart_item );

							               				// Backorder notification
							               				if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) )
							               					echo '<p class="backorder_notification">' . __( 'Available on backorder', 'woocommerce' ) . '</p>';
													?>
												</td>

												<td class="product-price">
													<?php
														echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
													?>
												</td>

												<td class="product-quantity">
													<?php
														if ( $_product->is_sold_individually() ) {
															$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
														} else {
															$product_quantity = woocommerce_quantity_input( array(
																'input_name'  => "cart[{$cart_item_key}][qty]",
																'input_value' => $cart_item['quantity'],
																'max_value'   => $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(),
																'min_value'   => '0'
															), $_product, false );
														}

														echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key );
													?>
												</td>

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
						</div>
							<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( $get_checkout_url ); ?>" enctype="multipart/form-data">
							
								<?php if ( sizeof( $checkout->checkout_fields ) > 0 ) : ?>
							
									<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>
							
									<div class="col2-set" id="customer_details">
										<div class="col-1">
											<?php do_action( 'woocommerce_checkout_billing' ); ?>
										</div>
						
										<div class="col-2">
											<?php do_action( 'woocommerce_checkout_shipping' ); ?>
										</div>
									</div>
							
									<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>
									<div class="module-title">
										<h4 id="order_review_heading"><?php _e( 'Your order', 'woocommerce' ); ?></h4>
										<span class="module-separator"></span>
									</div>						
							
								<?php endif; ?>
							
								<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>
							
								<div id="order_review" class="woocommerce-checkout-review-order">
									<?php do_action( 'woocommerce_checkout_order_review' ); ?>
								</div>
							
								<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
								
							</form>
							
							<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
						</div>	
					</div>
		