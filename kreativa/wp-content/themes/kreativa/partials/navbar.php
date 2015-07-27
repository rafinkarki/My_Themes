<?php // Exit if accessed directly
if (!defined('ABSPATH')) {
    echo '<h1>Forbidden</h1>';
    exit();
}
?>
<?php
global $kreativa_options;
global $post;
if (is_home()) {
    $pageid = get_option('page_for_posts');
} else {
    $pageid = get_the_ID();
}
if ($menu = get_post_meta($pageid, 'kreativa_menu_select', true)) {
    $menu_object = get_term_by('term_taxonomy_id', $menu[0], 'nav_menu');
}
?>
    <header class="site-header">
        <div id="main-header" class="main-header header-sticky">
            <div class="inner-header clearfix">
                    <!-- BEGIN: LOGO -->
                <div class="logo">
                    <?php 
                        if (isset($kreativa_options['logo']) && $kreativa_options['logo']['url']!='') {?>
                        <a href="<?php echo esc_url(site_url()); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>">
                        <img src="<?php echo esc_url($kreativa_options['logo']['url']); ?>"  data-at2x="<?php echo esc_url($kreativa_options['retinalogo']['url']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" />
                        </a>
                        <?php } else { ?>
                            <a href="<?php echo esc_url(site_url()); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>">
                                <?php echo esc_attr(get_bloginfo('name')); ?>
                            </a>
                    <?php } ?>
                </div>               
                <div class="header-right-toggle pull-right hidden-md hidden-lg">
                    <a href="javascript:void(0)" class="side-menu-button"><i class="fa fa-bars"></i>
                    </a>
                </div>
                <?php
                if (isset($menu_object) && is_object($menu_object)) {
                    $args = array(
                        'menu' => $menu_object->slug,
                        'items_wrap' => '<nav class="main-navigation pull-right hidden-xs hidden-sm"><ul>%3$s</ul>',
                        'echo' => true,
                        'fallback_cb' => 'wp_page_menu()',
                        'walker' => new description_walker()
                    );
                } else {
                    $args = array(
                    'theme_location' => 'primary',
                    'items_wrap' => '<nav class="main-navigation pull-right hidden-xs hidden-sm"><ul>%3$s</ul>',
                    'echo'       => true,
                    'fallback_cb'     => 'wp_page_menu()',
                    'walker'  => new description_walker()
                   );
                }
                wp_nav_menu($args);
                ?>
            <!-- BEGIN: WPML MENU -->
                    <?php
                    do_action('icl_language_selector');
                    ?>
            </div>        
       </div>
    </header><!-- /header -->


