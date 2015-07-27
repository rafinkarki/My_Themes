<?php
/**
 * kreativa functions file.
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();}

global $kreativa_options;

if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/inc/ReduxCore/framework.php' ) ) {
    require_once( dirname( __FILE__ ) . '/inc/ReduxCore/framework.php' );
}
if ( !isset( $kreativa_options ) && file_exists( dirname( __FILE__ ) . '/themeoption-config.php' ) ) {
    require_once( dirname( __FILE__ ) . '/themeoption-config.php' );
}

if ( file_exists( dirname( __FILE__ ) . '/inc/vcaddons/vc-config.php' ) ) {
    require_once( dirname( __FILE__ ) . '/inc/vcaddons/vc-config.php' );
}
require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
require( trailingslashit( get_template_directory() ) . 'inc/aquaresizer.php' );
require( trailingslashit( get_template_directory() ) . 'inc/widgets.php' );
require( trailingslashit( get_template_directory() ) . 'inc/helpers.php' );

/*********************************************************************
* THEME SETUP
*/

function kreativa_setup() {

    global $kreativa_options;

    // Translations support. Find language files in kreativa/languages
    load_theme_textdomain('kreativa', get_template_directory().'/languages');
    $locale = get_locale();
    $locale_file = get_template_directory()."/languages/{$locale}.php";
    if(is_readable($locale_file)) { require_once($locale_file); }

    // Set content width
    global $content_width;
    if (!isset($content_width)) $content_width = 720;

    // Editor style (editor-style.css)
    add_editor_style(array('assets/css/editor-style.css'));

    // Load plugin checker
    require(get_template_directory() . '/inc/plugin-activation.php');

    //Include all post types
    require(get_template_directory() . '/inc/meta-box.php');
    // Nav Menu (Custom menu support)
    if (function_exists('register_nav_menu')) :
        register_nav_menu('primary', __('kreativa Primary Menu', 'kreativa'));
    endif;

    // Theme Features: Automatic Feed Links
    add_theme_support('automatic-feed-links');

    // Theme Features: woocommerce
    add_theme_support( 'woocommerce' );

    // Theme Features: Dynamic Sidebar
    add_post_type_support( 'post', 'simple-page-sidebars' );


    // Theme Features: Post Thumbnails and custom image sizes for post-thumbnails
    add_theme_support('post-thumbnails', array('post', 'page','product','portfolio','team'));

    // Theme Features: Post Formats
    add_theme_support('post-formats', array( 'gallery', 'image', 'link', 'quote', 'video', 'audio'));


    
}
add_action('after_setup_theme', 'kreativa_setup');

function kreativa_widgets_setup() {

    global $kreativa_options;
    // Widget areas
    if (function_exists('register_sidebar')) :
        // Sidebar right
        register_sidebar(array(
            'name' => "Blog Sidebar",
            'id' => "kreativa-widgets-aside-right",
            'description' => __('Widgets placed here will display in the right sidebar', 'kreativa'),
            'before_widget' => '<div id="%1$s" class="widget wow fadeIn box white-back %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="module-title"><h4>',
            'after_title'   => '</h4><span class="module-separator"></span></div>'
        ));

        // Woocommerce sidebar
        register_sidebar(array(
            'name' => "WooCommerce Sidebar",
            'id' => "kreativa-widgets-woocommerce-sidebar",
            'description' => __('Widgets placed here will display in the product page sidebar', 'kreativa'),
            'before_widget' => '<div id="%1$s" class="sidebar_widget widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h5>',
            'after_title'   => '</h5>'
        ));
        // Footer Block 1
        register_sidebar(array(
            'name' => "Footer Block 1",
            'id' => "kreativa-widgets-footer-block-1",
            'description' => __('Widgets placed here will display in the right sidebar', 'kreativa'),
            'before_widget' => '<div id="%1$s" class="widget wow fadeIn %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="module-title"><h4>',
            'after_title'   => '</h4><span class="module-separator"></span></div>'
        ));
        // Footer Block 2
        register_sidebar(array(
            'name' => "Footer Block 2",
            'id' => "kreativa-widgets-footer-block-2",
          	'description' => __('Widgets placed here will display in the right sidebar', 'kreativa'),
            'before_widget' => '<div id="%1$s" class="widget wow fadeIn %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="module-title"><h4>',
            'after_title'   => '</h4><span class="module-separator"></span></div>'
        ));
        // Footer Block 3
       register_sidebar(array(
            'name' => "Footer Block 3",
            'id' => "kreativa-widgets-footer-block-3",
           'description' => __('Widgets placed here will display in the right sidebar', 'kreativa'),
            'before_widget' => '<div id="%1$s" class="widget wow fadeIn %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="module-title"><h4>',
            'after_title'   => '</h4><span class="module-separator"></span></div>'
        ));
        

        // Footer Block 4
       register_sidebar(array(
            'name' => "Footer Block 4",
            'id' => "kreativa-widgets-footer-block-4",
            'description' => __('Widgets placed here will display in the right sidebar', 'kreativa'),
            'before_widget' => '<div id="%1$s" class="widget wow fadeIn %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="module-title"><h4>',
            'after_title'   => '</h4><span class="module-separator"></span></div>'
        ));
        
       
    endif;
   
}
add_action('widgets_init', 'kreativa_widgets_setup');


// The excerpt "more" button
function kreativa_excerpt($text) {
    return str_replace('[&hellip;]', '[&hellip;]<a class="" title="'. sprintf (__('Read more on %s','kreativa'), get_the_title()).'" href="'.get_permalink().'">' . __(' Read more','kreativa') . '</a>', $text);
}
add_filter('the_excerpt', 'kreativa_excerpt');

// wp_title filter
function kreativa_title( $title, $sep ) {
    global $paged, $page;
    if ( is_feed() ) {
        return $title;
    } 
    $title .= get_bloginfo( 'name' );
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) ) {
        $title = "$title $sep $site_description";
    } 
    if ( $paged >= 2 || $page >= 2 ) {
        $title = sprintf( __( 'Page %s', 'kreativa' ), max( $paged, $page ) ) . " $sep $title";
    } 
    return $title;

} 
add_filter( 'wp_title', 'kreativa_title', 10, 2 );

/*********************************************************************
 * Function to load all theme assets (scripts and styles) in header
 */
function kreativa_load_theme_assets() {

    global $kreativa_options;

    // Do not know any method to enqueue a script with conditional tags!
    echo '
    <!--[if lt IE 9]>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
   <![endif]-->
	
	<!--[if IE]>
		<link rel="stylesheet" href="'.get_template_directory_uri().'/assets/css/ie.css" media="screen" type="text/css" />
    	<![endif]-->

    ';  

    // Enqueue all the theme CSS
    wp_enqueue_style('bootstrap', get_template_directory_uri().'/assets/css/bootstrap.css');
    wp_enqueue_style('animate', get_template_directory_uri().'/assets/css/animate.css');
    wp_enqueue_style('simple-line-icons', get_template_directory_uri().'/assets/css/simple-line-icons.css');
	wp_enqueue_style('font-awesome', get_template_directory_uri().'/assets/css/font-awesome.min.css');
    wp_enqueue_style('main', get_stylesheet_directory_uri().'/style.css');
    wp_enqueue_style('setting', get_template_directory_uri().'/assets/rs-plugin/css/settings.css');
    wp_enqueue_style('color', get_template_directory_uri().'/assets/css/color.css');
    
    // Enqueue all the js files of theme
    wp_enqueue_script('jquery');
   	//wp_enqueue_script('jquery.min', get_template_directory_uri().'/assets/js/jquery.min.js', array(), FALSE, TRUE);
    wp_enqueue_script('bootstrap.min', get_template_directory_uri().'/assets/js/bootstrap.min.js', array(), FALSE, TRUE);
    wp_enqueue_script('rev-slider-tools', get_template_directory_uri().'/assets/rs-plugin/js/jquery.themepunch.tools.min.js', array(), FALSE, TRUE);
    wp_enqueue_script('rev-slider-revolution', get_template_directory_uri().'/assets/rs-plugin/js/jquery.themepunch.revolution.min.js', array(), FALSE, TRUE);
    wp_enqueue_script('plugins', get_template_directory_uri().'/assets/js/plugins.js', array(), FALSE, TRUE);
    wp_enqueue_script('custom', get_template_directory_uri().'/assets/js/custom.js', array(), FALSE, TRUE);
    

    $inline_css='';
    if(isset($kreativa_options['extra-css'])){
    $inline_css.=$kreativa_options['extra-css'];  
    }
    wp_add_inline_style( 'custom-style', $inline_css );
	$color_variation ='';
    if(isset($kreativa_options['custom_color_primary']) && $kreativa_options['custom_color_primary']!=''){
    $main_custom_color_primary= esc_attr($kreativa_options['custom_color_primary']);

    } else {
    $main_custom_color_primary= "#F5F5F5";
    }
   
         $hex_primary = str_replace("#", "", esc_attr($main_custom_color_primary));

           if(strlen($hex_primary) == 3) {
              $r = hexdec(substr($hex_primary,0,1).substr($hex_primary,0,1));
              $g = hexdec(substr($hex_primary,1,1).substr($hex_primary,1,1));
              $b = hexdec(substr($hex_primary,2,1).substr($hex_primary,2,1));
           } else {
              $r = hexdec(substr($hex_primary,0,2));
              $g = hexdec(substr($hex_primary,2,2));
              $b = hexdec(substr($hex_primary,4,2));
           }
            $new_custom_color_primary= array($r, $g, $b);  
            

            $color_variation='
                .footer-1,.footer-2,.footer-3 .boxed,.on-blog-grid .blog-item .blog-text,.on-blog .blog-item .blog-text,.blog-single .blog-item .blog-text,
                .client-items .item,.line-sep {
                  background-color: '.$main_custom_color_primary.';
                }


                .page-heading-owl,.blog-items .item .blog-content img,.blog-items .item .blog-content i  {
                  background: '.$main_custom_color_primary.';
                  }
  
            ';
        wp_add_inline_style( 'color', $color_variation );



}
add_action('wp_enqueue_scripts', 'kreativa_load_theme_assets');

/*********************************************************************
 * Gallery SUPPORT
 */

add_filter('post_gallery', 'kreativa_post_gallery', 10, 2);
function kreativa_post_gallery($output, $attr) {
    global $post;

    if (isset($attr['orderby'])) {
        $attr['orderby'] = sanitize_sql_orderby($attr['orderby']);
        if (!$attr['orderby'])
            unset($attr['orderby']);
    }

    extract(shortcode_atts(array(
        'order' => 'ASC',
        'orderby' => 'menu_order ID',
        'id' => $post->ID,
        'itemtag' => 'dl',
        'icontag' => 'dt',
        'captiontag' => 'dd',
        'columns' => 3,
        'size' => 'thumbnail',
        'include' => '',
        'exclude' => ''
    ), $attr));

    $id = intval($id);
    if ('RAND' == $order) $orderby = 'none';

    if (!empty($include)) {
        $include = preg_replace('/[^0-9,]+/', '', $include);
        $_attachments = get_posts(array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));

        $attachments = array();
        foreach ($_attachments as $key => $val) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    }

    if (empty($attachments)) return '';


    // Here's your actual output, you may customize it to your need
    $output = "<div class=\"flexslider post-gallery\">\n";
    $output .= "<ul class=\"slides\">\n";

    // Now you loop through each attachment
    foreach ($attachments as $id => $attachment) {
        // Fetch the thumbnail (or full image, it's up to you)
//      $img = wp_get_attachment_image_src($id, 'medium');
//      $img = wp_get_attachment_image_src($id, 'my-custom-image-size');
        $img = wp_get_attachment_image_src($id, 'full');

        $output .= "<li>";
        $output .= "<img src=\"{$img[0]}\" width=\"{$img[1]}\" height=\"{$img[2]}\" alt=\"\" />";
        $output .= "</li>";
    }

    $output .= "</ul>\n";
    $output .= "</div>\n";

    return $output;
}

/*********************************************************************
 * RETINA SUPPORT
 */
add_filter('wp_generate_attachment_metadata', 'kreativa_retina_support_attachment_meta', 10, 2);
function kreativa_retina_support_attachment_meta($metadata, $attachment_id) {

    // Create first image @2
    kreativa_retina_support_create_images(get_attached_file($attachment_id), 0, 0, false);

    foreach ($metadata as $key => $value) {
        if (is_array($value)) {
            foreach ($value as $image => $attr) {
                if (is_array($attr))
                    kreativa_retina_support_create_images(get_attached_file($attachment_id), $attr['width'], $attr['height'], true);
            }
        }
    }

    return $metadata;
}

function kreativa_retina_support_create_images($file, $width, $height, $crop = false) {

    $resized_file = wp_get_image_editor($file);
    if (!is_wp_error($resized_file)) {

        if ($width || $height) {
            $filename = $resized_file->generate_filename($width . 'x' . $height . '@2x');
            $resized_file->resize($width * 2, $height * 2, $crop);
        } else {
            $filename = str_replace('-@2x','@2x',$resized_file->generate_filename('@2x'));
        }
        $resized_file->save($filename);

        $info = $resized_file->get_size();

        return array(
            'file' => wp_basename($filename),
            'width' => $info['width'],
            'height' => $info['height'],
        );
    }

    return false;
}

add_filter('delete_attachment', 'kreativa_delete_retina_support_images');
function kreativa_delete_retina_support_images($attachment_id) {
    $meta = wp_get_attachment_metadata($attachment_id);
    if(is_array($meta)){
        $upload_dir = wp_upload_dir();
        $path = pathinfo($meta['file']);

        // First image (without width-height specified
        $original_filename = $upload_dir['basedir'] . '/' . $path['dirname'] . '/' . wp_basename($meta['file']);
        $retina_filename = substr_replace($original_filename, '@2x.', strrpos($original_filename, '.'), strlen('.'));
        if (file_exists($retina_filename)) unlink($retina_filename);

        foreach ($meta as $key => $value) {
            if ('sizes' === $key) {
                foreach ($value as $sizes => $size) {
                    $original_filename = $upload_dir['basedir'] . '/' . $path['dirname'] . '/' . $size['file'];
                    $retina_filename = substr_replace($original_filename, '@2x.', strrpos($original_filename, '.'), strlen('.'));
                    if (file_exists($retina_filename))
                        unlink($retina_filename);
                }
            }
        }
    }
}

// Enqueue comment-reply script if comments_open and singular
function kreativa_enqueue_comment_reply() {
        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
                wp_enqueue_script( 'comment-reply' );
        }
}
add_action( 'wp_enqueue_scripts', 'kreativa_enqueue_comment_reply' );




function kreativa_body_classes( $classes ) {
    if (!is_page_template('kreativa-page-builder.php') ) :
    $classes[] = 'multipage';
    endif;  
    $classes[]='headerstyle1 headerfixed';
    return $classes;
}
add_filter( 'body_class', 'kreativa_body_classes' );



add_action( 'tgmpa_register', 'kreativa_register_required_plugins' );

function kreativa_register_required_plugins() {
 

    $plugins = array(
 
      
       
        array(
            'name'               => 'Siteorigin-Panels', // The plugin name.
            'slug'               => 'siteorigin-panels', // The plugin slug (typically the folder name).
            'source'             => get_stylesheet_directory() . '/inc/plugins/siteorigin-panels.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
        ),
         array(
            'name'               => 'Siteorigin-Bundle', // The plugin name.
            'slug'               => 'so-widgets-bundle', // The plugin slug (typically the folder name).
            'source'             => get_stylesheet_directory() . '/inc/plugins/so-widgets-bundle.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
        ),
       
        array(
            'name'               => 'Theme Addons', // The plugin name.
            'slug'               => 'kreativa-addons', // The plugin slug (typically the folder name).
            'source'             => get_stylesheet_directory() . '/inc/plugins/kreativa-addons.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
        ), 
        
       
        array(
            'name'      => 'Contact Form Plugin ', 
            'slug'       => 'contact-form-7', 
            'required'    => true,
        ),      
        
    );
 
    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => __( 'Install Required Plugins', 'tgmpa' ),
            'menu_title'                      => __( 'Install Plugins', 'tgmpa' ),
            'installing'                      => __( 'Installing Plugin: %s', 'tgmpa' ), // %s = plugin name.
            'oops'                            => __( 'Something went wrong with the plugin API.', 'tgmpa' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins' ),
            'return'                          => __( 'Return to Required Plugins Installer', 'tgmpa' ),
            'plugin_activated'                => __( 'Plugin activated successfully.', 'tgmpa' ),
            'complete'                        => __( 'All plugins installed and activated successfully. %s', 'tgmpa' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );
 
    tgmpa( $plugins, $config );
 
}

 function kreativa_comment($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);
	if ('div' == $args['style']) {
		$tag = 'div';
		$add_below = 'comment';
	}
	else {
		$tag = 'li';
		$add_below = 'div-comment';
	}

?>
     <<?php	echo $tag ?> <?php
	comment_class(empty($args['has_children']) ? '' : 'parent') ?> id="comment-<?php
	comment_ID() ?>">	 	 
    <?php if($depth>1): echo'<div class="media reply-comment">';?>
       <?php else: echo'<div class="media"> ';
       endif;?> 
 		<div class="pull-left relative">
		<?php
        if ($args['avatar_size'] != 0) echo get_avatar($comment, $args['avatar_size']); 
        ?>
    	</div>
    	 <div class="pull-right relative btn btn-primary btn-sm ">

     		<?php
			if ($args['max_depth'] != $depth): ?>
				 <?php
				comment_reply_link(array(
					'reply_text' => 'REPLY',
					'depth' => $depth,
					'max_depth' => $args['max_depth']
				));
			endif; ?>
     	 </div>
   
   <?php
	printf(__(' <div class="media-body"><h3>%s</h3>') , get_comment_author_link()); ?>
   <?php
	/* translators: 1: date */
	printf(__('%1$s', 'kreativa') , get_comment_date()); ?>
        
    
    <?php
	if ($comment->comment_approved == '0'): ?>
        <em class="comment-awaiting-moderation"><?php
		_e('Your comment is awaiting moderation.', 'dikka'); ?></em>
        <br />
    <?php
	endif; ?>
    <p><?php
	comment_text(); ?></p> 
    </div>
    </div>
    

<?php
}

function removeDemoModeLink() {
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2 );
    }
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );    
    }
}

add_action( 'init', 'kreativa_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function kreativa_initialize_cmb_meta_boxes() {

    if ( ! class_exists( 'cmb_Meta_Box' ) )
        require_once 'inc/cmb/init.php';

}

//add_filter( 'woocommerce_enqueue_styles', '__return_false' );

function kreativa_detect_woocommerce()
{
    global $post;
    if ( has_shortcode( $post->post_content, 'woocommerce_cart' ) || has_shortcode( $post->post_content, 'woocommerce_my_account' ) || has_shortcode( $post->post_content, 'woocommerce_checkout' )|| get_query_var( 'wishlist-action',1 ) !=1)
    {
        return true;
    } 
    return false;
}

Class Description_Walker extends Walker_Nav_Menu
{
	function start_lvl(&$output, $depth = 0, $args = array())
	{
		$indent = str_repeat("\t", $depth);
		$output.= "\n$indent<ul class=\"sub-menu depth_$depth\ role=menu\ \">\n";
	}
	function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output)
	{
		// check, whether there are children for the given ID and append it to the element with a (new) ID
		$element->hasChildren = isset($children_elements[$element->ID]) && !empty($children_elements[$element->ID]);
		return parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
	}
	function start_el(&$output, $item, $depth = 0, $args = array() , $current_object_id = 0)
	{
		global $wp_query;
		$indent = ($depth) ? str_repeat("\t", $depth) : '';
		$class_names = $value = '';
		$classes = empty($item->classes) ? array() : (array)$item->classes;
		$class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes) , $item));
		$class_names = ' ' . esc_attr($class_names) . '';
		$output.= $indent . '<li >';
		$attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
		$attributes.= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
		$attributes.= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
		$attributes.= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
		$prepend = '';
		$append = '';
		$description = !empty($item->description) ? '<span>' . esc_attr($item->description) . '</span>' : '';
		$item_output = $args->before;
		if ($item->hasChildren) {
			$item_output.= '';
			$item_output.= '<a class="has-submenu" ' . esc_attr($class_names) . '" ' . $attributes . '>';
		}
		else {
			$item_output.= '<a class="' . esc_attr($class_names) . '" ' . $attributes . '>';
		}
		$item_output.= $args->link_before . $prepend . apply_filters('the_title', $item->title, $item->ID) . $append;
		$item_output.= $description . $args->link_after;
		$item_output.= '</a>';
		$item_output.= $args->after;
		$output.= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
	}
}




function theme_scripts() {
	global $kreativa_options;
     // If this is the home page, run this script
     if($kreativa_options['portfolio_layout']=='1' ||$kreativa_options['portfolio_layout']== '2' || $kreativa_options['portfolio_layout']=='3') {
        wp_enqueue_script( 'masonry-1', get_template_directory_uri() . '/assets/js/masonry.js', array() , FALSE, TRUE);
     }
     // Otherwise, run this script
     elseif($kreativa_options['portfolio_layout']=='4' ){
         wp_enqueue_script( 'masonry-3col', get_template_directory_uri() . '/assets/js/masonry-3col.js', array() , FALSE, TRUE);
     }
	 else{
		  wp_enqueue_script( 'masonry-4col', get_template_directory_uri() . '/assets/js/masonry-4col.js', array() , FALSE, TRUE);
		 
		 }
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );
?>

<?php
//Builder functions

function kreativa_row_style_fields($fields) {
    
$fields['row_id'] = array(
      'name'        => __('Row ID', 'siteorigin-panels'),
      'type'        => 'text',
      'group'       => 'attributes',
      'description' => __('Please give an id(without #)', 'siteorigin-panels'),
      'priority'    => 10,
);

$fields['row_stretch'] = array(
      'name'        => __('', 'siteorigin-panels'),
      'type'        => 'hidden',
      'group'       => 'layout',   
      
);

$fields['row_container'] = array(
      'name'        => __('Row Styles', 'siteorigin-panels'),
      'type'        => 'select',
      'group'       => 'layout',
      'description' => __('Choose between contained or full row styple', 'siteorigin-panels'),
      'priority'    => 10,
      'options'     => array(
            'container'        => __('Container', 'siteorigin-panels'),
            'container-row'        => __('Container with row', 'siteorigin-panels'),
            'full-width'        => __('Full-Width', 'siteorigin-panels'),
            
            ),
);


  return $fields;
}

add_filter( 'siteorigin_panels_row_style_fields', 'kreativa_row_style_fields');


function kreativa_panels_row_container_start( $grid, $attributes ) {
    if(isset($grid['style']['row_id']) && $grid['style']['row_id']!='' )
    echo '<div id="'.$grid['style']['row_id'].'">';
    if(isset($grid['style']['row_container']) && $grid['style']['row_container']!='container-row')
    echo '<div class="'.$grid['style']['row_container'].'">';
    if(isset($grid['style']['row_container']) && $grid['style']['row_container']=='container-row'){
    echo '<div class="container">';
    echo '<div class="row">';
    }
   

}

add_filter('siteorigin_panels_row_container_start', 'kreativa_panels_row_container_start', 10, 2);


function kreativa_panels_row_container_end( $grid, $attributes ) { 
    if(isset($grid['style']['row_id']) && $grid['style']['row_id']!='')
    echo '</div>'; 
    if(isset($grid['style']['row_container'])&& $grid['style']['row_container']!='container-row')
    echo '</div>';
    if(isset($grid['style']['row_container']) && $grid['style']['row_container']=='container-row'){
    echo '</div>';
    echo '</div>';
        }
   

}
add_filter('siteorigin_panels_row_container_end', 'kreativa_panels_row_container_end', 10, 2);
