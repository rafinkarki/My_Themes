<?php
/**
 * Related Products
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

if ( empty( $product ) || ! $product->exists() ) {
	return;
}
$posts_per_page=3;
$related = $product->get_related( $posts_per_page );

if ( sizeof( $related ) == 0 ) return;

$args = apply_filters( 'woocommerce_related_products_args', array(
	'post_type'            => 'product',
	'ignore_sticky_posts'  => 1,
	'no_found_rows'        => 1,
	'posts_per_page'       => $posts_per_page,
	'orderby'              => $orderby,
	'post__in'             => $related,
	'post__not_in'         => array( $product->id )
) );

$products = new WP_Query( $args );

$woocommerce_loop['columns'] = $columns;

if ( $products->have_posts() ) : ?>

	<div class=" row white-back box text-center related products">
		<div class="module-title">
			<h4><?php _e( 'Related Items', 'woocommerce' ); ?></h4>
			<span class="module-separator"></span>
		</div>

		

			<?php while ( $products->have_posts() ) : $products->the_post(); ?>
				<div class="col-md-4 col-sm-6 col-xs-12 wow fadeInUp">
				<?php wc_get_template_part( 'content', 'product' ); ?>
				</div>

			<?php endwhile; // end of the loop. ?>

	

	</div>

<?php endif;

wp_reset_postdata();
