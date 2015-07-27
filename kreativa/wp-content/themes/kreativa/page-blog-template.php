<?php
/*
 * Template Name: Blog Template WIith Right Side Bar
 *
 */
// Exit if accessed directly
if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} get_header(); ?>

<?php query_posts('post_type=post&post_status=publish&paged='. get_query_var('paged')); ?>
<section class="post-section grey-section clearfix">
    <div class="container"> 
    	<div class="row">
           <div id="content" class="col-md-9 col-sm-12">
                <?php if (have_posts()) : ?>

                    <?php while (have_posts()) : the_post(); ?>

                        <div class="white-back box">
                        <?php get_template_part('partials/article'); ?>
                        </div>

                    <?php endwhile; ?>

                    <?php if ($wp_query->max_num_pages>1) : ?>
                        <nav class="text-left">
                            <?php kreativa_pagination(); ?>
                        </nav>
                    <?php endif; ?>

                    <?php else : ?>

                        <?php get_template_part('partials/nothing-found'); ?>

                <?php endif; ?>
  
            </div>
            <!-- end content -->   
             <?php if ( is_active_sidebar( 'kreativa-widgets-aside-right' ) ) { ?>
                     <div id="sidebar" class="col-md-3 col-sm-12">

                        <?php dynamic_sidebar( 'kreativa-widgets-aside-right' ); ?>

                    </div>

                <?php } ?> 
          
               
            <!-- end sidebar -->
        </div>
        <!-- end row -->
    </div>  
    <!-- end container -->
</section>

<?php get_footer(); ?>