<?php // Exit if accessed directly
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

                    <?php endwhile; ?>

                    <?php if ($wp_query->max_num_pages>1) : ?>

                            <?php kreativa_pagination(); ?>

                    <?php endif; ?>

                    <?php else : ?>

                        <?php get_template_part('partials/nothing-found'); ?>

                <?php endif; ?>
  
            </div>
            <!-- end content -->    
          <div id="sidebar" class="col-md-3 col-sm-12">
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