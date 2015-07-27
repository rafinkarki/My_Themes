<?php
/* Code for recent posts widget*/

class WP_Widget_Latest_Post_creativ extends WP_Widget {
    function __construct() {
         $widget_ops = array('classname' => 'Latest Post', 'description' => __( "Gives list of latest posts with testimonials.","flatty") );
        parent::__construct('latest_post_widget', __('Latest Posts(creativ)','creativ'), $widget_ops);
        $this->alt_option_name = 'latest_post';
    }
    public function widget( $args, $instance ) { 

        ob_start();
        extract($args);
        $title='';     
        $cache='';
        $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
        $number = ( ! empty( $instance['number'] ) )? absint( $instance['number'] ) : 2;
         echo $args['before_widget'];?>        
         <?php if($number!=0):if ( ! empty( $title )) {
            echo $args['before_title'] ?><?php echo esc_attr($instance['title'])?> <?php echo $args['after_title'];
          }          
          $r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) );
          if ($r->have_posts()) :
          ?><ul>
            <?php while ( $r->have_posts() ) : $r->the_post(); ?>
                <li>
                    <?php
                     $thumbnail = get_post_thumbnail_id();                        
                     $img_url = wp_get_attachment_image_src( $thumbnail,'full'); //get img URL
                     $n_img = aq_resize( $img_url[0], $width = 81, $height = 81, $crop = true, $single = true, $upscale = true ); ?>
                    <?php if(!empty($n_img)):?><img src="<?php echo esc_url($n_img);?>" alt="" class="alignleft"><?php endif;?>
                    <h3> <a href="<?php the_permalink();?>"><?php creativ_post_title();?></a></h3>
                    <span class="metabox">
                        <?php if (get_the_category()) : ?>                        
                            <?php the_category('/');
                        endif; ?> <span><?php echo get_the_date('F d , Y') ?></span>
                    </span>                    
               </li>
              <?php endwhile; ?>
            </ul>
          <?php endif;?>     
        <?php  wp_reset_postdata(); ?>
        <?php  $content = ob_get_clean();
        wp_cache_set('latest_post', $cache, 'widget');
        echo $content;
        echo $args['after_widget'];?>               
    <?php endif;?>
    
    <?php }

    
    public function form( $instance ) {
        $instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '' ) );
        $title = strip_tags($instance['title']);
        $number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 2;
        
?>
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
        <p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of products to show:','flatty' ); ?></label>
        <input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
      
       
<?php    }    
    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = (int) $new_instance['number'];        
        $this->flush_widget_cache();
        $alloptions = wp_cache_get( 'alloptions', 'options' );
        if ( isset($alloptions['latest_post']) )
            delete_option('latest_post');
            return $instance;
        
    }
 function flush_widget_cache() {

        wp_cache_delete('latest_post', 'widget');
    }
      
}
register_widget('WP_Widget_Latest_Post_creativ');



