<?php
/**
 * Display single product reviews (comments)
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.2
 */
global $product;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! comments_open() ) {
	return;
}
?>
<div id="reviews" >
	<div id="comments">
		<div class="module-title">
			<h4><?php _e( 'Reviews', 'woocommerce' );?></h4>
			<span class="module-separator"></span>
		</div>

		

		<?php if ( have_comments() ) : ?>
			<div class="comment-list-wrapper">
				<div class="comment-list">
					 <?php	  $args = array (
	                   'paged' => true,
	                   'avatar_size'       => 80,
	                   'style'             => 'ul',
	                   'callback'=> 'kreativa_comment',
	                   'per_page' =>'8',
	                   ); 
	                 wp_list_comments($args);
	                 ?>
				</div>
			</div>

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
				echo '<nav class="woocommerce-pagination">';
				paginate_comments_links( apply_filters( 'woocommerce_comment_pagination_args', array(
					'prev_text' => '&larr;',
					'next_text' => '&rarr;',
					'type'      => 'list',
				) ) );
				echo '</nav>';
			endif; ?>

		<?php else : ?>

			<p class="woocommerce-noreviews"><?php _e( 'There are no reviews yet.', 'woocommerce' ); ?></p>

		<?php endif; ?>
	</div>

	<?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->id ) ) : ?>

		<div id="review_form_wrapper">
			<div id="review_form" >

      
				<?php
					$commenter = wp_get_current_commenter();
					
					$comment_form = array(
						'title_reply'          => have_comments() ? __( '', 'woocommerce' ) : __( 'Be the first to review', 'woocommerce' ) . ' &ldquo;' . get_the_title() . '&rdquo;',
						'title_reply_to'       => __( 'Leave a Reply to %s', 'woocommerce' ),
						'comment_notes_before' => '<legend><span>Your details</span></legend>',
						'comment_notes_after'  => '',
						'fields'               => array(
							'author' => '<div class="form-group col-md-12 has-icon-left  comment-form-author">' . '<label for="author" class="sr-only">' . __( 'Name', 'woocommerce' ) . ' <span class="required">*</span></label> ' .
							            '<input id="author" class="form-control" name="author" placeholder="Name" type="text"   aria-required="true" /><span class="icon-user14 icon-left"></span></div>',
							'email'  => '<div class="form-group col-md-12 has-icon-left comment-form-email"><label for="email" class="sr-only">' . __( 'Email', 'woocommerce' ) . ' <span class="required">*</span></label> ' .
							            '<input id="email" name="email" type="text" placeholder="Email address" class="form-control"   aria-required="true" /><span class="icon-envelope7 icon-left"></div>',
						),
						'label_submit'  => __( 'Submit', 'woocommerce' ),
						'logged_in_as' =>  sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>','bella'), get_edit_user_link(), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink($post->ID) ) ) ),
						'comment_field' => ''
					);
					
					if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' ) {
						$comment_form['comment_field'] = ' <legend><span>' . __( 'Your Ratings', 'woocommerce' ) .'</span></legend> <div class="form-group col-md-12 comment-form-rating"><select name="rating" id="rating">
							<option value="">' . __( 'Rate&hellip;', 'woocommerce' ) . '</option>
							<option value="5">' . __( 'Perfect', 'woocommerce' ) . '</option>
							<option value="4">' . __( 'Good', 'woocommerce' ) . '</option>
							<option value="3">' . __( 'Average', 'woocommerce' ) . '</option>
							<option value="2">' . __( 'Not that bad', 'woocommerce' ) . '</option>
							<option value="1">' . __( 'Very Poor', 'woocommerce' ) . '</option>
						</select></div>';
					}

					$comment_form['comment_field'] .= '<div class="form-group col-md-12 has-icon-left" comment-form-comment"><label class="sr-only" for="comment">' . __( 'Your Review', 'woocommerce' ) . '</label><textarea id="comment" placeholder="Your review" class="form-control" name="comment" cols="30" rows="4" aria-required="true"></textarea><span class="icon-pen3 icon-left"></div>
					<footer>
					        <input type="submit" name="submit" value="Submit review" style="margin-right: 10px;" class="btn btn-primary">
					        <button type="reset" class="btn btn-default">Reset <span class="btn-icon-right icon-cancel5"></span></button>
							</footer>';
					
					ob_start();
				    comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
				    echo str_replace('class="comment-form"','class="comment-form rcw-form container-fluid"',ob_get_clean());
				?>
			</div>
		</div>

	<?php else : ?>

		<p class="woocommerce-verification-required"><?php _e( 'Only logged in customers who have purchased this product may leave a review.', 'woocommerce' ); ?></p>

	<?php endif; ?>

	<div class="clear"></div>
</div>
