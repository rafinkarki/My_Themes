<?php // Exit if accessed directly
if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} get_header(); ?>
<? global $kreativa_options;?>
<section class="single-project">
    <div class="container">
        <div class="col-md-6">
          <?php kreativa_related_media(550,550);?>
         </div>
         <div class="col-md-4">
          <?php kreativa_related_team_meta();?>
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
<?php get_footer(); ?>