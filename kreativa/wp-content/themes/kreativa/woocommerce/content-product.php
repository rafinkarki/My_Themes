<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) )
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );

// Ensure visibility
if ( ! $product || ! $product->is_visible() )
	return;

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array();
if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] )
	$classes[] = 'first';
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] )
	$classes[] = 'last';
global $kreativa_options;
$shop_layout=esc_attr($kreativa_options['shop_layout']);?>

	<div class="shop-module module white-back box clearfix">
	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
		<div class="divimage text-center">		
			<div class="hovereffect">
				<?php
					/**
					 * woocommerce_before_shop_loop_item_title hook
					 *
					 * @hooked woocommerce_show_product_loop_sale_flash - 10
					 * @hooked woocommerce_template_loop_product_thumbnail - 10
					 */
					do_action( 'woocommerce_before_shop_loop_item_title' );
				?>
				<div class="hovercontent">
					<div class="hoverbutton inlinebutton">
						<a href="<?php the_permalink();?>"><i class="fa fa-link"></i></a>
						<?php

							/**
							 * woocommerce_after_shop_loop_item hook
							 *
							 * @hooked woocommerce_template_loop_add_to_cart - 10
							 */
							do_action( 'woocommerce_after_shop_loop_item' ); 

						?>					
					</div><!-- end hoverbutton -->
				</div><!-- end hovereffect -->
			</div>
			<div class="shop-mini-title">
				<h4><a href="<?php the_permalink();?>" title=""><?php the_title(); ?></a></h4>
				<?php
					/**
					 * woocommerce_after_shop_loop_item_title hook
					 *
					 * @hooked woocommerce_template_loop_rating - 5
					 * @hooked woocommerce_template_loop_price - 10
					 */
					do_action( 'woocommerce_after_shop_loop_item_title' );
				?>	
			</div>
			
		</div><!-- end text-center -->
		<div class="absolute-buttons">
				<a data-toggle="modal" data-tooltip="tooltip" data-target=".modalexample" data-placement="top" title="Click Here" href="#" class=" yith-wcqv-button btn btn-primary" data-product_id="<?php echo $product->id;?>"><i class="fa fa-search"></i> <span>|</span> QUICK VIEW</a>
			</div><!-- end buttons -->	
	</div>

