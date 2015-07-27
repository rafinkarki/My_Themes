<?php // Exit if accessed directly
if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} get_header(); ?>
<?php global $kreativa_options;?>

<section class="single-project">
    <div class="container">
        <div class="col-md-8">
          <?php kreativa_related_media(730,343);?>
         </div>
         <div class="col-md-4">
          <?php kreativa_related_meta();?>
         </div>
         <div class="col-md-12 next-prev text-center clearfix">
            <nav>
                <ul class="pager">
                   <li class="pull-left"><?php previous_post_link('%link','<i class="fa fa-angle-left"></i>');?></li>              

                   <li class="pull-right"><?php next_post_link('%link','<i class="fa fa-angle-right"></i>');?></li>

                </ul>
            </nav>
          </div><!-- end next prev -->
    </div>
    <div class="line-sep"></div>
</section>
<?php if(isset($kreativa_options['portfolio_related']) && $kreativa_options['portfolio_related']==1):?>
   <?php get_template_part('partials/portfolio-related');?>
<?php endif;?>
<?php get_footer(); ?>