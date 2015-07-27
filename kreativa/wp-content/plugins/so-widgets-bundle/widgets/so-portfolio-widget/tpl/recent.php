<?php $number=esc_attr($instance['number']);
$arg = array('post_type'=>'portfolio','posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ;
$query = new WP_Query( $arg );//var_dump($query);?>
        <?php if ($query->have_posts()) : ?>
            <div class="project-items">      
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                <?php
                $portfolio_item_title = get_the_title( $post->ID );
                $image_url= wp_get_attachment_thumb_url( get_post_thumbnail_id($post->ID) );
                $thumb =  wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                $terms = get_the_terms( $post->ID, 'portfolio_filter' );          
                if ( $terms && ! is_wp_error( $terms ) ) : 

                    $term_links = array();
                    foreach ( $terms as $term ) {
                        $term_links[] = $term->slug;
                    }
                                        
                    $filters = join( " ", $term_links );
                endif;   
                ?> 
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
                <?php endwhile; ?>              
            </div>
        <?php else : ?>

            <?php get_template_part('partials/nothing-found'); ?>

        <?php endif; wp_reset_postdata();?>