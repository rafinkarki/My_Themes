<?php // Exit if accessed directly
if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} get_header(); ?>


<section  class="post-section grey-section clearfix">
            
            <!-- BEGIN BLOG WIDTH | OPTION: "big", "medium" container -->
            <div class="container"> 
                
                <!-- BEGIN BLOG POSTS --> 
                <div class="row">    
                    <?php if(kreativa_detect_woocommerce()==true) : 
                        echo '<div id="content" class="col-md-10 col-md-offset-1 col-sm-12">';
                    else:
                        echo '<div id="content" class="col-md-9 col-sm-12">';
                    endif;?>                    
                             <?php if (have_posts()) : ?>

                                <?php while (have_posts()) : the_post(); ?>

                                    <?php get_template_part('partials/article'); ?>                              

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
               
                <?php if(kreativa_detect_woocommerce()!=true) : ?>
                    <div id="sidebar" class="col-xs-12 col-sm-12 col-md-3 ">                   
                         <?php if ( is_active_sidebar( 'kreativa-widgets-aside-right' ) ) { ?>         

                                <?php dynamic_sidebar( 'kreativa-widgets-aside-right' ); ?>                  

                        <?php } ?>
                    </div>
                <?php endif; ?>
                   
               
                
                </div>
            </div>  
            <!-- END: BLOG CONTAINER -->
        </section>
<?php get_footer(); ?>