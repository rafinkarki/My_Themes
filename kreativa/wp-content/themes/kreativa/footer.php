<?php // Exit if accessed directly
if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} ?>
<?php  global $kreativa_options; ?>
  <?php if(isset($kreativa_options[ 'footer-on']) && $kreativa_options[ 'footer-on']==1) :?>
	<footer class="footer">
     	<div class="container">
			 <div class="row">
				<?php get_template_part( 'partials/footer-layout'); ?>
			 </div>
		</div>
	</footer>
	 <div class="copyright">
	        <div class="container text-center">
	            <div class="copymessage">
	              <?php echo wp_kses_post($kreativa_options[ 'footer_text']); ?>
	            </div><!-- end copymessage -->
	        </div><!-- end container -->
	    </div><!-- end copyright -->
    <?php endif; ?> 
  </div>  <!--sidebar-menu-inner-end-->
  </div>  <!--sidebar-menu-push-end-->
  </div><!--sidebar-menu-container-end-->
    <div class="backtotop" style="background-image: url('<?php echo get_template_directory_uri();?>/assets/images/back.png')">Scroll to Top</div>  
    <?php if(isset($kreativa_options['meta_javascript']) && $kreativa_options['meta_javascript']!='') 
    echo $kreativa_options['meta_javascript']; ?>  
    
    <?php wp_footer(); ?>
    
    </body>
</html>

