
<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Kreativa
 * @since Kreativa 1.0
 */

if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} get_header(); global $kreativa_options; ?>
<section class="white-section white-bg">
	<div class="container">
		<div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-12">
                <div class="notfound wow fadeIn text-center">
					<h1><?php _e('404','kreativa')?></h1>
                    <h2><?php _e('We are very sorry, but the page not found','kreativa')?></h2>
                    <p><?php echo wp_kses_post($kreativa_options['404_text']);?></p>
                    <a href="<?php echo esc_url(site_url()); ?>" class="btn btn-lg btn-primary"><?php _e('BACK TO HOME','kreativa')?></a>
                </div><!-- end welcome -->
            </div><!-- end col -->
		</div><!-- end row -->
	</div><!-- end container -->
</section><!-- end section -->
<?php get_footer(); ?>
