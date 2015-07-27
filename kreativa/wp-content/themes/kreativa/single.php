<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} get_header(); ?>

<section class="post-section grey-section clearfix">
    <div class="container"> 
    	<div class="row">
           <div id="content" class="col-md-9 col-sm-12">
                <?php if (have_posts()) : ?>

                    <?php while (have_posts()) : the_post(); ?>

                        <div class="white-back box">
                        <?php get_template_part('partials/article'); ?>
                        </div>
                         <?php get_template_part('partials/article-related');?>

                    <?php endwhile; ?>

                    <?php else : ?>

                        <?php get_template_part('partials/nothing-found'); ?>

                <?php endif; ?>
               <?php comments_template( '', true ); ?>
  
            </div>
            <!-- end content -->    
            <div class="col-md-3 col-sm-12">
                 <?php if ( is_active_sidebar( 'kreativa-widgets-aside-right' ) ) { ?>               

                        <?php dynamic_sidebar( 'kreativa-widgets-aside-right' ); ?>                  

                <?php } ?>
                   
            </div>
            <!-- end sidebar -->
        </div>
        <!-- end row -->
    </div>  
    <!-- end container -->
</section>

<?php get_footer(); ?>