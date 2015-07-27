<?php // Exit if accessed directly
if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit(); global $kreativa_options;} 
global $kreativa_options;
$image_url=get_template_directory_uri().'/assets/images/heading-bg.jpg';
if(!empty($kreativa_options['breadcrumb_image']['url']))
$image_url=esc_url($kreativa_options['breadcrumb_image']['url']);
$pageid=get_the_ID();
$page_setting_title=get_post_meta( $pageid, 'kreativa_pagetitle_title',true);
$page_setting_subtitle=get_post_meta( $pageid, 'kreativa_pagetitle_subtitle',true);
$page_setting_image=get_post_meta( $pageid, 'kreativa_pagetitle_image',true);
if(!empty($page_setting_image)):
    $image_url=esc_url($page_setting_image);
endif;
$page_setting_line=get_post_meta( $pageid, 'kreativa_pagetitle_line',true);?>

<section class="page-heading" style="width: 100%; height: 100%;  background-image: url('<?php echo $image_url; ?>')">
    <div class="container"> 
        <div class="page-title">
        <?php if ( isset($page_setting_title) && $page_setting_title!='') :?>
            <h1><?php echo  $page_setting_title; ?></h1>                               
        <?php elseif (is_home()) :?>
            <h1><?php _e('BLOG MAIN', 'kreativa'); ?></h1>
        <?php elseif (is_single()) :?>
            <h1><?php echo get_the_title(); ?></h1>
        <?php elseif (is_page()) : ?>        
            <h1><?php echo get_the_title(); ?></h1>   
        <?php elseif (is_author()) : ?>
            <h1><?php _e('AUTHOR', 'kreativa'); ?></h1>
        <?php elseif (is_search()) : ?>
            <h1><?php _e('SEARCH', 'kreativa'); ?></h1>
        <?php elseif (is_category()) : ?>
            <h1><?php _e('CATEGORY', 'kreativa'); ?></h1>
        <?php elseif (is_tag()) : ?>
            <h1><?php _e('TAG', 'kreativa'); ?></h1>
        <?php elseif (is_archive()) : ?>
        <?php if (get_post_type() == 'product') : ?>
            <h1><?php _e('PRODUCTS', 'kreativa'); ?></h1>
        <?php else: ?>
            <h1><?php _e('ARCHIVE', 'kreativa'); ?></h1>
        <?php endif; ?>
        <?php elseif (get_post_type() == 'product') : ?>
            <h1><?php _e('PRODUCTS', 'kreativa'); ?></h1>
        <?php else : ?>
            <h1><?php _e('PAGE NOT FOUND', 'kreativa'); ?></h1>
        <?php endif; ?>         
       <?php if($page_setting_line=="")  { ?>
           <div class="line-dec"></div> 
        <?php } ?>        
        <?php if ( isset($page_setting_subtitle) && $page_setting_subtitle!='') :?>
            <span><?php echo wp_kses_post($page_setting_subtitle); ?></span>
        <?php else:?>
            <span><?php echo nl2br(wp_kses_post($kreativa_options['subtitle_text']));?></span>
        <?php endif; ?>
        </div>
    </div>      
</section>

