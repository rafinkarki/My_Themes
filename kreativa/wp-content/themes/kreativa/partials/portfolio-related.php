<?php global $kreativa_options;
$title=esc_attr($kreativa_options['related_title']);
$subtitle=wp_kses_post($kreativa_options['related_subtitle']);
?>
<section class="similar-projects">
  <div class="container">
    <div class="section-heading">
      <?php if($title)echo '<h4>'.$title.'</h4>';?>
      <?php if($subtitle) echo'<span class="section-subtitle">'.$subtitle.'</span>';?>
    </div>
    <div class="row">
    <?php $custom_taxterms = wp_get_object_terms( $post->ID, 'portfolio_filter', array('fields' => 'ids') );
      $args = array(
      'post_type' => 'portfolio',
      'post_status' => 'publish',
      'posts_per_page' =>4, 
      'orderby' => 'rand',
      'tax_query' => array(
          array(
            'taxonomy' => 'portfolio_filter',
            'field' => 'id',
            'terms' => $custom_taxterms,
          )
      ),
      'post__not_in' => array ($post->ID),
      );
      $related_items = new WP_Query( $args ); 
      if( $related_items->have_posts() ) : ?>
        <div class="project-items">
          <?php while( $related_items->have_posts() )  : $related_items->the_post(); ?>
            <div class="item col-md-3">
              <div class="thumb-holder">
                  <?php $thumbnail = get_post_thumbnail_id($post->ID);                        
                     $img_url = wp_get_attachment_image_src( $thumbnail,'full'); //get img URL
                     $n_img = aq_resize( $img_url[0], $width = 263, $height = 252, $crop = true, $single = true, $upscale = true );
                  ?><a href="<?php echo the_permalink();?>"><img src="<?php echo esc_url($n_img);?>" alt=""> </a>
                  <div class="thumb-content">
                      <div class="thumb-likes">
                          <span><i class="fa fa-heart-o"></i>29</span>
                      </div>
                      <div class="thumb-text">
                          <a href="<?php echo the_permalink();?>"><h4><?php kreativa_post_title(); ?></h4></a>
                          <span><i class="fa fa-folder-o"></i>
                          <?php
                              $filters = get_the_terms($post->ID,'portfolio_filter');
                              $c_filter = '';
                              if(!empty($filters)){
                                  foreach($filters as $f=>$filter){
                                      $c_filter .=  ($f==0) ? $filter->name : ', '.$filter->name;
                                  }
                                  echo esc_html($c_filter);
                              }
                          ?></span>
                      </div>                                    
                  </div>
              </div>
            </div>
          <?php 
          endwhile;?>
        </div>
      <?php endif;
      wp_reset_postdata();?>  
      </div>      
  </div><!-- end container -->
</section>