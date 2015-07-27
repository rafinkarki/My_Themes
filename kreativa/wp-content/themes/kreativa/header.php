<?php // Exit if accessed directly
if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} ?>
<!DOCTYPE html>
<?php
global $kreativa_options;
 ?>
<html <?php language_attributes(); ?> class="csstransforms csstransforms3d csstransitions">
<head>
<meta charset="<?php bloginfo('charset'); ?>" />
<?php if(isset($kreativa_options['meta_author']) && $kreativa_options['meta_author']!='') : ?>
<meta name="author" content="<?php echo esc_attr($kreativa_options['meta_author']); ?>">	
<?php else: ?>
<meta name="author" content="<?php esc_attr(bloginfo('name')); ?>">
<?php endif; ?>
<?php if(isset($kreativa_options['meta_author']) && $kreativa_options['meta_desc']!='') : ?>
<meta name="description" content="<?php echo esc_attr($kreativa_options['meta_desc']); ?>">	
<?php endif; ?>
<?php if(isset($kreativa_options['meta_author']) && $kreativa_options['meta_keyword']!='') : ?>
<meta name="keyword" content="<?php echo esc_attr($kreativa_options['meta_keyword']); ?>">	
<?php endif; ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=0">
<title><?php wp_title( '-', true, 'right' );?></title>
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php if(isset($kreativa_options['favicon']['url'])) :  ?>
<link rel="shortcut icon" href="<?php echo esc_url($kreativa_options['favicon']['url']); ?>">
<?php endif; ?>
<?php
wp_head();
?>
</head> 
<?php global $kreativa_options;
$class='';
if($kreativa_options['theme-layout']=='2'):  $class='container boxed'; endif;?>
<body  <?php body_class($class); ?>> 
<?php if ( isset($kreativa_options['preloader'])  && $kreativa_options['preloader'] == 1) : ?> 
	<div id="loader">
	    <div class="loader-container">
	    	<?php if(isset($kreativa_options['preloader-logo']['url']) && $kreativa_options['preloader-logo']['url']!='') : ?>
	       <h3 class="loader-back-text"><img src="<?php echo esc_url($kreativa_options['preloader-logo']['url']); ?> "  data-at2x="<?php echo esc_url($kreativa_options['preloader-retinalogo']['url']); ?>" alt=""/></h3>
	        <?php endif; ?>
	        <?php if($kreativa_options['preloader-title']==1): ?>
	        <h6 class="loading-heading"><?php echo esc_attr(get_bloginfo('name')); ?></h6>
	   		<?php endif; ?>
	    </div>
	</div>
<?php endif ; ?>
<!-- BEGIN: FULL CONTENT DIV -->
<div class="sidebar-menu-container" id="sidebar-menu-container">
	<div class="sidebar-menu-push">
	<div class="sidebar-menu-overlay"></div>
		<div class="sidebar-menu-inner">
			<?php get_template_part('partials/navbar');
			$breadcrumb=1;
			if($breadcrumb==1 && is_page_template('kreativa-page-builder.php') ):
				$breadcrumb=0;
			endif;
			if($breadcrumb==1 && is_404()):
				$breadcrumb=0;
			endif;
			if ($breadcrumb==1) :
				get_template_part('partials/breadcrumb');
			endif;