<?php $number=esc_attr($instance['number']);?>
<?php query_posts('post_type=team&post_status=publish&posts_per_page='.$number.'&paged='. get_query_var('paged')); ?>

    <?php if (have_posts()) :  ?>
    <div class="team-member">      
        <?php while (have_posts()) : the_post();?>
          <?php  $pageid=get_the_ID();  
            $facebook=esc_attr(get_post_meta( $pageid, 'kreativa_facebook',true));
            $twitter=esc_attr(get_post_meta( $pageid, 'kreativa_twitter',true));
            $linkedin=esc_attr(get_post_meta( $pageid, 'kreativa_linkedin',true));
            $terms = get_the_terms( $post->ID, 'team_post' );        
            if ( $terms && ! is_wp_error( $terms ) ) :
                $term_links = array();
                foreach ( $terms as $term ) {
                    $term_links[] = $term->slug;
                }                                        
                $filters = join( " ", $term_links );
            endif; ?>
            <div class="item col-md-4 <?php echo $filters;?>">
               <div class="thumb-holder">
                        <?php $thumbnail = get_post_thumbnail_id($post->ID);                        
                           $img_url = wp_get_attachment_image_src( $thumbnail,'full'); 
                           $n_img = aq_resize( $img_url[0], $width = 360, $height = 360, $crop = true, $single = true, $upscale = true );
                        ?><a href="<?php the_permalink();?>"><img src="<?php echo esc_url($n_img);?>"  alt=""></a>
                    <div class="thumb-content">
                        <div class="thumb-icons">
                            <ul> 
                            <?php if (!empty($twitter)) : ?>
                                <li><a  href="<?php echo esc_url( $twitter);?>" <?php echo  $instance['new_window'] ? 'target="_blank"' : '';  ?> ><i class="fa fa-twitter"></i></a></li>
                            <?php endif;?>                       
                            <?php if (!empty($facebook)) : ?>
                                <li><a href="<?php echo esc_url( $facebook );?>" <?php echo  $instance['new_window'] ? 'target="_blank"' : '';  ?> ><i class="fa fa-facebook"></i></a></li>
                            <?php endif;?>
                            <?php if (!empty($linkedin)) : ?>
                                <li><a href="<?php echo esc_url( $linkedin );?>" <?php echo  $instance['new_window'] ? 'target="_blank"' : '';  ?>> <i class="fa fa-linkedin"></i></a></li>
                            <?php endif;?>
                            </ul>
                        </div>
                        <div class="thumb-text">
                            <a href="<?php the_permalink();?>"><h4><?php kreativa_post_title(); ?></h4></a>
                            <?php
                            $filters = get_the_terms($post->ID,'team_post');
                            $c_filter = '';
                            if(!empty($filters)){
                                foreach($filters as $f=>$filter){
                                    $c_filter .=  ($f==0) ? $filter->name : ', '.$filter->name;
                                }
                                echo "<span>".esc_html($c_filter)."</span>";
                            }
                            ?>
                        </div>                     
                    </div>
                </div>     
            </div>
        <?php endwhile; ?>  
    </div> 
        <?php else : ?>

            <?php get_template_part('partials/nothing-found'); ?>
    
    <?php endif; wp_reset_query();?>
