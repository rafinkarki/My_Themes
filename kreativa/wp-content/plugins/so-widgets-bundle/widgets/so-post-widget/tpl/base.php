<?php
$query = siteorigin_widget_post_selector_process_query( $instance['posts'] );
$the_query = new WP_Query( $query );
?>
<?php if($the_query->have_posts()) : ?>
    <div class="blog-items">
	<?php while($the_query->have_posts()) : $the_query->the_post(); ?>

    <div class="item col-md-4">
        <div class="blog-content">
            	 <?php if (has_post_thumbnail()) : 
	            	$att = get_post_meta(get_the_ID(),'_thumbnail_id',true);
		            $thumb = get_post($att);
		            if (is_object($thumb)) { $att_ID = $thumb->ID; $att_url = $thumb->guid; }
		            else { $att_ID = $post->ID; $att_url = $post->guid; }
		            $att_title = (!empty(get_post($att_ID)->post_excerpt)) ? get_post($att_ID)->post_excerpt : get_the_title($att_ID);
	            	$thumbnail = get_post_thumbnail_id(get_the_ID());                        
	               	$img_url = wp_get_attachment_image_src( $thumbnail,'full'); //get img URL
	               	$n_img = aq_resize( $img_url[0], $width = 70, $height = 70, $crop = true, $single = true, $upscale = true ); 
	                ?><img src="<?php echo esc_url($n_img);?>" class="img-responsive"/>
	             <?php endif;?> 
                <div class="text-content">
                    <h6><a href="<?php the_permalink(); ?>"> <?php kreativa_post_title();?></a></h6>          
                    <span> <?php echo get_the_date('d  F  Y') ?><?php _e(' / ','kreativa'); ?><?php if (get_the_category()) : ?><?php the_category(' , ');endif; ?>  </span>
                </div>           
        </div><!-- end blog -->
    </div><!-- end col -->
	
	<?php endwhile; wp_reset_postdata(); ?>
</div>
<?php endif; ?>
