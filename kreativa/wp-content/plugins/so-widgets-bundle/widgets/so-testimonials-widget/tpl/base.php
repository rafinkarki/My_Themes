<div id="owl-testimonials" class="owl-carousel owl-theme">
	<?php foreach( $instance['testimonials'] as $i => $testimonial ) : ?>
	 	<div class="item col-md-8 col-md-offset-2">
	  		<h4><?php echo  esc_attr($testimonial['title']);?></h4>
	  		<?php if(!empty($testimonial['text'])):?>
		  		<i class="fa fa-quote-left"></i>
		  		<p><?php echo  wp_kses_post($testimonial['text']);?></p>
		  	<?php endif;?>
	  	</div>
	<?php endforeach;?>  	
</div>
<div class="customNavigation">
    <a class="btn prev"><i class="fa fa-angle-left"></i></a>
    <a class="btn next"><i class="fa fa-angle-right"></i></a>
</div>