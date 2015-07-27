<?php // Exit if accessed directly
if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} global $blog_page;$var_quote='';?>
<?php  switch ($blog_page) {
    case 'classic-one':
        $w='1140';
        $h='584';
        break;
    case 'classic-two':
        $w='555';
        $h='550';
        break;
    case 'classic-three':
        $w='360';
        $h='321';
        break;   
    default:       
        break;
}
    ?>
<?php if (is_single() OR is_page()) : ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class("blog-item");?>>
    <?php $check_video=0;$check_gallery=0;$check_audio=0;$check_link=0; $var_quote=0;?> 
    <?php if(!has_post_format('quote')):?>
        <?php if(!is_page()) : ?>
            <div class="meta">
                <span> <?php if (get_the_category()) : ?><?php the_category(' / ');endif; ?> <?php _e('|','kreativa'); ?> <?php echo get_the_date('d - M - Y') ?></span>
            </div><!-- end meta -->

            <div class="blog-title">
                <h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
            </div><!-- end title -->
        <?php endif; ?>
    <?php endif;?>
        
         <!-- Gallery Post Format -->   
        <?php if ( has_post_format('gallery') ) : $check_gallery=1; ?>
            <div class="ImageWrapper">         
               <?php if ( get_post_gallery() ) :
                    $gallery = get_post_gallery( get_the_ID(), false ); ?>               
                    <div class="flexslider flex-direction-nav-on-top">
                        <ul class="slides entry">
                        <?php foreach( $gallery['src'] AS $src ):?>
                           <li><img class="img-responsive" src="<?php echo esc_url($src); ?>" alt="" /></li>                          
                        <?php endforeach;?>
                        </ul>
                    </div>
                <?php   endif;?>
            </div>
        <?php   endif;  ?>

         <!-- Video Post Format -->
        <?php if (has_post_format('video')) : 
        $check_video=1;
        $videoID = get_post_meta( $post->ID, 'video_id', true ); 
        ?> 
           
                <div class="ImageWrapper">
                    <?php echo wp_oembed_get( esc_url($videoID) ); 
                    ?> 
                </div>
           
        <?php endif; ?>    

        <!-- Audio Post Format -->
        <?php if (has_post_format('audio')) : 
        $check_audio=1;
        ?>
            <div class="post-audio">
                <div class="audiowrapper">
                    <?php
                    $audioID = get_post_meta( $post->ID, 'audio_id', true ); 
                    echo wp_oembed_get(  esc_url($audioID) ); 
                    ?> 
                </div>
            </div>
        <?php endif; ?> 

        <!-- Quote Post Format -->
        <?php if (has_post_format('quote')) :  
        $var_quote=1; ?>
             <div class="quote-post">
                <blockquote><?php echo esc_attr(get_post_meta( $post->ID, 'q_content', true )); ?><small><?php echo esc_attr(get_post_meta( $post->ID, 'q_author', true )); ?></small></blockquote>
            </div> 
        <?php endif; ?>

        <!-- Link Post Format -->
        <?php if (has_post_format('link')) :  
        $check_link=1; ?>
            <div class="post-link">
                <span class="link-title"><?php echo esc_attr(get_post_meta( $post->ID, 'link_title', true )); ?></span>
                <a href="<?php echo esc_attr(get_post_meta( $post->ID, 'link_url', true )); ?>"><?php echo esc_attr(get_post_meta( $post->ID, 'link_url', true )); ?></a>
            </div>
        <?php endif; ?>
  

        <?php if (has_post_thumbnail() && (!is_single() || !is_page()) && ($check_video==0 && $check_gallery==0 && $check_audio==0 && $var_quote==0 && $check_link==0 )) :

            $att = get_post_meta(get_the_ID(),'_thumbnail_id',true);
            $thumb = get_post($att);
            if (is_object($thumb)) { $att_ID = $thumb->ID; $att_url = $thumb->guid; }
            else { $att_ID = $post->ID; $att_url = $post->guid; }
            $att_title = (!empty(get_post($att_ID)->post_excerpt)) ? get_post($att_ID)->post_excerpt : get_the_title($att_ID);
            ?>
            <div class="ImageWrapper">
                <?php echo get_the_post_thumbnail(get_the_ID(), 'full', array('class' => 'img-responsive')); ?>
                <div class="ImageOverlayLi"></div>
                <div class="Buttons StyleH">
                    <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr($att_title); ?>"><span class="bubble border-radius"><i class="fa fa-comment-o"></i> <?php comments_number( '0', '1', '%' ); ?></span></a>
                </div>
            </div>
        <?php endif; ?> 
        <?php if(kreativa_detect_woocommerce()!=true) :?>       
            <div class="single-blog-desc">
            <?php 
                    $postContentStr = apply_filters('the_content', strip_shortcodes($post->post_content));
                    echo $postContentStr;     
                ?>
            </div><!-- end desc -->
        <?php else:
             the_content();
        endif;?>


      
    </div><!-- end blog -->
<?php else: ?>

    <div id="post-<?php the_ID(); ?>" <?php post_class("blog-item");?>>
    <?php $check_video=0; $check_gallery=0; $check_audio=0;  $check_link=0; $var_quote=0;?> 
        <!-- Gallery Post Format -->   
        <?php if ( has_post_format('gallery') ) : $check_gallery=1; ?>
            <div class="ImageWrapper">         
               <?php if ( get_post_gallery() ) :
                    $gallery = get_post_gallery( get_the_ID(), false ); ?>               
                    <div class="flexslider flex-direction-nav-on-top">
                        <ul class="slides entry">
                        <?php foreach( $gallery['src'] AS $src ):?>
                            <?php if($blog_page=='masonry'):?> <li><img class="img-responsive" src="<?php echo esc_url($src); ?>" alt="" /></li>    
                            <?php else:                                
                                $img_url = wp_get_attachment_image_src( $src,'full'); 
                                $n_img = aq_resize( $src, $width = $w, $height = $h, $crop = true, $single = true, $upscale = true ); ?>
                                <li><img class="img-responsive" src="<?php echo esc_url($n_img); ?>" alt="" /></li>    
                            <?php endif;?>                                                     
                        <?php endforeach;?>
                        </ul>
                    </div>
                <?php   endif;?>
            </div>
        <?php   endif;  ?>

         <!-- Video Post Format -->
        <?php if (has_post_format('video')) : 
        $check_video=1;
        $videoID = get_post_meta( $post->ID, 'video_id', true );  ?>             
        <div class="ImageWrapper">
              <?php echo wp_oembed_get(  esc_url($videoID) );?>
        </div>            
        <?php endif; ?>    

        <!-- Audio Post Format -->
        <?php if (has_post_format('audio')) : 
        $check_audio=1;
        ?>
           
        <div class="audiowrapper">
            <?php
            $audioID = get_post_meta( $post->ID, 'audio_id', true ); 
            echo wp_oembed_get( esc_url($audioID) ); 
            ?> 
        </div>
           
        <?php endif; ?> 

        <!-- Quote Post Format -->
        <?php if (has_post_format('quote')) :  
        $var_quote=1; ?>
            <a href="<?php the_permalink();?>">
                <div class="quote-post">
                    <blockquote><?php echo esc_attr(get_post_meta( $post->ID, 'q_content', true )); ?><small><?php echo esc_attr(get_post_meta( $post->ID, 'q_author', true )); ?></small></blockquote>
                </div>   
            </a>        
        <?php endif; ?>

        <!-- Link Post Format -->
        <?php if (has_post_format('link')) :  
        $check_link=1; ?>
            <div class="post-link">
                <span class="link-title"><?php echo esc_attr(get_post_meta( $post->ID, 'link_title', true )); ?></span>
                <a href="<?php echo esc_attr(get_post_meta( $post->ID, 'link_url', true )); ?>"><?php echo esc_attr(get_post_meta( $post->ID, 'link_url', true )); ?></a>
            </div>
        <?php endif; ?>
  

        <?php if (has_post_thumbnail() && (!is_single() || !is_page()) && ($check_video==0 && $check_gallery==0 && $check_audio==0 && $var_quote==0 && $check_link==0 )) :

            $att = get_post_meta(get_the_ID(),'_thumbnail_id',true);
            $thumb = get_post($att);
            if (is_object($thumb)) { $att_ID = $thumb->ID; $att_url = $thumb->guid; }
            else { $att_ID = $post->ID; $att_url = $post->guid; }
            $att_title = (!empty(get_post($att_ID)->post_excerpt)) ? get_post($att_ID)->post_excerpt : get_the_title($att_ID);
            ?>
            <div class="ImageWrapper">
            <?php if($blog_page=='masonry'): echo get_the_post_thumbnail(get_the_ID(), 'full', array('alt'=>'','class'=>"img-responsive",'title'=> '')); ?>
           
            <?php else:
                   $thumbnail = get_post_thumbnail_id();                        
                   $img_url = wp_get_attachment_image_src( $thumbnail,'full'); //get img URL
                   $n_img = aq_resize( $img_url[0], $width = $w, $height = $h, $crop = true, $single = true, $upscale = true ); 
                ?><img src="<?php echo esc_url($n_img);?>" class="img-responsive"/> 
            <?php endif;?>              
                <div class="ImageOverlayLi"></div>
                <div class="Buttons StyleH">
                    <a href="<?php the_permalink(); ?>" title="<?php echo $att_title; ?>"><span class="bubble border-radius"><i class="fa fa-comment-o"></i> <?php comments_number( '0', '1', '%' ); ?></span></a>
                </div>
            </div>
        <?php endif; ?>

        <?php if($var_quote==0):?>
            <div class="meta">
                <span> <?php if (get_the_category()) : ?><?php the_category(' / ');endif; ?> <?php _e('|','kreativa'); ?> <?php echo get_the_date('d - M - Y') ?></span>
            </div><!-- end meta -->

            <div class="blog-title">
                <h3><a href="<?php the_permalink(); ?>">
                   <?php kreativa_post_title();?>
                </a></h3>
            </div><!-- end title -->
             <div class="blog-desc">
                  <?php the_excerpt(); ?>
            </div><!-- end desc -->

            <div class="blog-button">
                <a href="<?php the_permalink(); ?>" title="" class="btn btn-primary border-radius"><?php _e('Read more','kreativa'); ?></a>
            </div><!-- end button -->
        <?php endif;?>

    </div><!-- end blog -->

<?php endif; ?>






