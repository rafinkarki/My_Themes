<?php
/*
 * Template Name: Blog Template WIith Two Columns
 *
 */
// Exit if accessed directly
if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} get_header(); ?>

<?php query_posts('post_type=post&post_status=publish&paged='. get_query_var('paged')); ?>
		<section class="post-section white-section clearfix">
        	<div class="container">
            	<div class="row text-center">
                <?php if (have_posts()) : ?>

                    <?php while (have_posts()) : the_post(); ?>
                        <?php get_template_part('partials/articlecol2'); ?>                        	
                    <?php endwhile; ?>
                    </div>

                    <?php if ($wp_query->max_num_pages>1) : ?>
                        <nav class="text-center">'
                            <?php kreativa_pagination(); ?>
                        </nav>
                    <?php endif; ?>

                    <?php else : ?>

                        <?php get_template_part('partials/nothing-found'); ?>

                <?php endif; ?>
                </div>
   			</section>
          	
<?php get_footer(); ?>