<?php
if(!function_exists('kreativa_related_media')){
    function kreativa_related_media($w,$h){
        ?>
        <div class="ImageWrapper">         
           <?php if ( get_post_gallery() ) :
                $gallery = get_post_gallery( get_the_ID(), false ); ?> 
                <div class="slider">                                           
                  <div class="fullwidthbanner-container">
                    <div class="fullwidthbanner">
                      <ul>                                  
                        <?php foreach( $gallery['src'] AS $src ):
                          $img_url = wp_get_attachment_image_src( $src); 
                          $n_img = aq_resize( $src, $width = $w, $height =  $h, $crop = true, $single = true, $upscale = true ); ?>
                          <li class="first-slide" data-transition="fade" data-slotamount="10" data-masterspeed="300">
                            <img class="img-responsive" src="<?php echo esc_url($n_img); ?>" alt="" data-fullwidthcentering="on" alt="slide">
                          </li>                              
                        <?php endforeach;?>
                      </ul> 
                    </div>                             
                  </div>
                </div>
            <?php endif;?>
            <?php if( has_post_thumbnail() && !get_post_gallery()):
              $thumbnail = get_post_thumbnail_id();                        
               $img_url = wp_get_attachment_image_src( $thumbnail,'full'); 
               $n_img = aq_resize( $img_url[0], $width =  $w, $height =  $h, $crop = true, $single = true, $upscale = true ); //get img URL
            ?><div class="portfolio-media"> <img src="<?php echo esc_url($n_img);?>" class="img-responsive"/></div> 
            <?php endif;?>                      
        </div>
        <?php
  }
}
//Related metas
if(!function_exists('kreativa_related_meta')){
    function kreativa_related_meta(){
        global $post;        
        if(is_home()){
            $pageid=get_option('page_for_posts');
        } else {
            $pageid=get_the_ID();
        }
        $name=esc_attr(get_post_meta( $pageid, 'kreativa_portfolio_name',true));
        $terms = get_the_terms( $post->ID, 'portfolio_filter' ); 
        $subtitle = esc_html( get_post_meta($pageid, 'kreativa_portfolio_subtitle',true));
        $facebook=esc_attr(get_post_meta( $pageid, 'kreativa_facebook',true));
        $twitter=esc_attr(get_post_meta( $pageid, 'kreativa_twitter',true));
        $google=esc_attr(get_post_meta( $pageid, 'kreativa_google',true));
        $linkedin=esc_attr(get_post_meta( $pageid, 'kreativa_linkedin',true));
        $rss=esc_attr(get_post_meta( $pageid, 'kreativa_rss',true));
        $youtube=esc_attr(get_post_meta( $pageid, 'kreativa_youtube',true));
        $postContentStr = apply_filters('the_content', strip_shortcodes($post->post_content));?>
        <div class="project-details">
          <h6><?php the_title();?></h6>      
          <?php if($subtitle):?>
            <span><?php echo $subtitle;?></span>
          <?php endif;?>
          <?php echo wp_kses_post($postContentStr); ?> 
          <div class="share-project">
            <div class="social-icons">
              <ul>
                <?php if (!empty($twitter)) : ?>
                   <li><a href="<?php echo esc_url( $twitter);?>" target="_blank" ><i class="fa fa-twitter"></i></a></li>
                <?php endif;?>                       
                <?php if (!empty($facebook)) : ?>
                  <li><a href="<?php echo esc_url( $facebook);?>" target="_blank" ><i class="fa fa-facebook"></i></a></li>                   
                <?php endif;?>
                <?php if (!empty($google)) : ?>
                  <li><a href="<?php echo esc_url( $facebook);?>" target="_blank" ><i class="fa fa-google"></i></a></li>
                <?php endif;?>
                <?php if (!empty($rss)) : ?>
                   <li><a href="<?php echo esc_url( $rss);?>" target="_blank" ><i class="fa fa-rss"></i></a></li>
                <?php endif;?>                       
                <?php if (!empty($linkedin)) : ?>
                  <li><a href="<?php echo esc_url( $linkedin);?>" target="_blank" ><i class="fa fa-linkedin"></i></a></li>                   
                <?php endif;?>
                <?php if (!empty($youtube)) : ?>
                  <li><a href="<?php echo esc_url( $youtube);?>" target="_blank" ><i class="fa fa-youtube"></i></a></li>
                <?php endif;?>
              </ul>
            </div>
          </div>
        </div><!-- end title -->
        <?php
  }
}
if(!function_exists('kreativa_related_team_meta')){
    function kreativa_related_team_meta(){
        global $post;        
        if(is_home()){
            $pageid=get_option('page_for_posts');
        } else {
            $pageid=get_the_ID();
        }
        
        $terms = get_the_terms( $post->ID, 'team_post' ); 
        $facebook=esc_attr(get_post_meta( $pageid, 'kreativa_facebook',true));
        $twitter=esc_attr(get_post_meta( $pageid, 'kreativa_twitter',true));
        $linkedin=esc_attr(get_post_meta( $pageid, 'kreativa_linkedin',true));
        $postContentStr = apply_filters('the_content', strip_shortcodes($post->post_content));?>
        <div class="project-details">
          <h6><?php the_title();?></h6>      
          <?php if($subtitle):?>
          <?php endif;?>
          <?php echo wp_kses_post($postContentStr); ?> 
          <div class="share-project">
            <div class="social-icons">
              <ul>
                <?php if (!empty($twitter)) : ?>
                   <li><a href="<?php echo esc_url( $twitter);?>" target="_blank" ><i class="fa fa-twitter"></i></a></li>
                <?php endif;?>                       
                <?php if (!empty($facebook)) : ?>
                  <li><a href="<?php echo esc_url( $facebook);?>" target="_blank" ><i class="fa fa-facebook"></i></a></li>                   
                <?php endif;?>      
                <?php if (!empty($linkedin)) : ?>
                  <li><a href="<?php echo esc_url( $linkedin);?>" target="_blank" ><i class="fa fa-linkedin"></i></a></li>                   
                <?php endif;?>
              </ul>
            </div>
          </div>
        </div><!-- end title -->
        <?php
  }
}
//Title
function kreativa_post_title(){
    global $post;
    $title = get_the_title(); 
    $count=(str_word_count($title));  
    if($count>=6) :                                  
        $title =substr($title, 0,35);
        echo wp_kses_post($title.'...');               
    else:
        echo wp_kses_post($title);
    endif;
  
}


// kreativa Pagination
// Code taken from: http://wp-snippets.com/pagination-for-twitter-bootstrap/
function kreativa_pagination ($before = '', $after = '') {

    global $kreativa_options;

    echo $before;

    

        global $wpdb, $wp_query;

        $request = $wp_query->request;
        $posts_per_page = intval(get_query_var('posts_per_page'));
        $paged = intval(get_query_var('paged'));
        $numposts = $wp_query->found_posts;
        $max_page = $wp_query->max_num_pages;

        if ($numposts <= $posts_per_page) return;
        if (empty($paged) || $paged == 0) $paged = 1;

        $pages_to_show = 7;
        $pages_to_show_minus_1 = $pages_to_show - 1;
        $half_page_start = floor($pages_to_show_minus_1 / 2);
        $half_page_end = ceil($pages_to_show_minus_1 / 2);
        $start_page = $paged - $half_page_start;

        if ($start_page <= 0) $start_page = 1;
        $end_page = $paged + $half_page_end;
        if (($end_page - $start_page) != $pages_to_show_minus_1) {
            $end_page = $start_page + $pages_to_show_minus_1;
        }
        if ($end_page > $max_page) {
            $start_page = $max_page - $pages_to_show_minus_1;
            $end_page = $max_page;
        }
        if ($start_page <= 0) $start_page = 1;       
        echo '<nav class="text-center">';
            echo'<ul class="pagination">';
            $var=$paged;
            
            if($paged!=$start_page)
                echo ( '<li><a href="'.get_pagenum_link(--$var).'" aria-label="Previous"><span aria-hidden="true">«</span></a></li>' );
            else
                echo ( '<li class="disabled"><a href="#" aria-label="Previous"<span aria-hidden="true">«</span></a></li>' );
            for ($i = $start_page; $i <= $end_page; $i++) {
                
                if ($i == $paged)
                    echo ' <li><a href="#">' .$i. '</a></li>';
                else{
                    echo ' <li><a href="'.get_pagenum_link($i).'">' . $i . '</a></li>';
                            }
            }
            $var2=$paged;
            if($paged==$end_page)
            
                echo ( '<li class="disabled"><a href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>' );
            else
                echo ( '<li><a href="'.get_pagenum_link(++$var2).'" aria-label="Next"><span aria-hidden="true">»</span></a></li>' );       
            
            echo '</ul>';
        echo '</nav>';

    echo $after;

    return;
}


//Displaying Breadcrumbs navigation
function kreativa_breadcrumb() {
 
  $showOnHome = 1; // 1 - show breadcrumbs on the homepage, 0 - don't show
  $delimiter = '  /  '; // delimiter between crumbs
  $home = 'Home'; // text for the 'Home' link
  $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
  $before = '<span class="active">'; // tag before the current crumb
  $after = '</span>'; // tag after the current crumb
 
  global $post;
  $homeLink = get_bloginfo('url');
 ?>
  
 <?php 
  if (is_home() || is_front_page()) {
 
    if ($showOnHome == 1) echo '<li><a href="' . $homeLink . '">' . $home . '</a></li>';
 
  } else {
 
    echo '<li><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . '</li> ';
 
    if ( is_category() ) {
      $thisCat = get_category(get_query_var('cat'), false);
      if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
      echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;
   
 
    } 
     if ( is_tax('portfolio_filter') ) {
      $thistax = get_taxonomy('portfolio_filter');
      //if ($thistax->parent != 0) echo get_category_parents($thistax->parent, TRUE, ' ' . $delimiter . ' ');
      echo $before . 'Archive by filter "' . single_cat_title('', false) . '"' . $after;
    }elseif ( is_search() ) {
      echo $before . 'Search results for "' . get_search_query() . '"' . $after;
 
    } elseif ( is_day() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('d') . $after;
 
    } elseif ( is_month() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('F') . $after;
 
    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;
 
    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
        if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
        echo $cats;
        if ($showCurrent == 1) echo $before . get_the_title() . $after;
      }
 
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->singular_name . $after;
 
    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
 
    } elseif ( is_page() && !$post->post_parent ) {
      if ($showCurrent == 1) echo $before . get_the_title() . $after;
 
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      for ($i = 0; $i < count($breadcrumbs); $i++) {
        echo $breadcrumbs[$i];
        if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . ' ';
      }
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
 
    } elseif ( is_tag() ) {
      echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
 
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $before . 'Articles posted by ' . $userdata->display_name . $after;
 
    } elseif ( is_404() ) {
      echo $before . 'Error 404' . $after;
    }
 
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
 
    echo '</li>';?>
   
    <?php
 
  }
} // end kreativa_breadcrumbs()
// Stop Page Builder Automatic Update
function kreativa_filter_plugin_updates( $value ) {
    unset( $value->response['siteorigin-panels/siteorigin-panels.php'] );
    unset( $value->response['so-widgets-bundle/so-widgets-bundle.php'] );
    return $value;
}
add_filter( 'site_transient_update_plugins', 'kreativa_filter_plugin_updates' );

//Social Icons (Footer)
if(!function_exists('kreativa_social_icons')){
    function kreativa_social_icons(){        
        global $kreativa_options;
        $number=''; $total=12;
        $number=  esc_attr($kreativa_options['icons-number']);
        if($number==5) $number=4; 
        $number=$total/$number;?>
        <section class="social-section nopadding clearfix">
            <div class="row-fluid">
                <?php if (!empty($kreativa_options['social_facebook'])) : ?>
                    <div class="social col-md-<?php echo esc_attr($number);?> col-sm-6 col-xs-6 social-facebook-bg">
                        <a href="<?php  echo esc_url($kreativa_options['social_facebook']); ?>"><i class="fa fa-facebook fa-2x"></i></a>
                    </div>
                <?php endif; ?>
                <?php if (!empty($kreativa_options['social_twitter'])) : ?>
                    <div class="social col-md-<?php echo esc_attr($number);?> col-sm-6 col-xs-6 social-twitter-bg">
                        <a href="<?php  echo esc_url($kreativa_options['social_twitter']); ?>"><i class="fa fa-twitter fa-2x"></i></a>
                    </div> 
                <?php endif; ?>
                <?php if (!empty($kreativa_options['social_googlep'])) : ?>
                    <div class="social col-md-<?php echo esc_attr($number);?> col-sm-6 col-xs-6 social-google-plus-bg">
                        <a href="<?php  echo esc_url($kreativa_options['social_googlep']); ?>"><i class="fa fa-google-plus fa-2x"></i></a>
                    </div>
                <?php endif; ?>
                <?php if (!empty($kreativa_options['social_vimeo'])) : ?>
                    <div class="social col-md-<?php echo esc_attr($number);?> col-sm-6 col-xs-6 social-vimeo-bg">
                        <a href="<?php  echo esc_url($kreativa_options['social_vimeo']); ?>"><i class="fa fa-vimeo-square fa-2x"></i></a>
                    </div> 
                <?php endif; ?>
                <?php if (!empty($kreativa_options['social_youtube'])) : ?>
                    <div class="social col-md-<?php echo esc_attr($number);?> col-sm-6 col-xs-6 social-youtube-bg">
                        <a href="<?php  echo esc_url($kreativa_options['social_youtube']); ?>"><i class="fa fa-youtube fa-2x"></i></a>
                    </div> 
                <?php endif; ?>
                <?php if (!empty($kreativa_options['social_tumblr'])) : ?>
                    <div class="social col-md-<?php echo esc_attr($number);?> col-sm-6 col-xs-6 social-tumblr-bg">
                        <a href="<?php  echo esc_url($kreativa_options['social_tumblr']); ?>"><i class="fa fa-tumblr fa-2x"></i></a>
                    </div>  
                <?php endif; ?>
                <?php if (!empty($kreativa_options['social_dribbble'])) : ?>
                    <div class="social col-md-<?php echo esc_attr($number);?> col-sm-6 col-xs-6 social-dribbble-bg">
                        <a href="<?php  echo esc_url($kreativa_options['social_tumblr']); ?>"><i class="fa fa-dribbble fa-2x"></i></a>
                    </div> 
                <?php endif; ?>           
                <?php if (!empty($kreativa_options['social_pinterest'])) : ?>
                    <div class="social col-md-<?php echo esc_attr($number);?> col-sm-6 col-xs-6 social-pinterest-bg">
                        <a href="<?php  echo esc_url($kreativa_options['social_pinterest']); ?>"><i class="fa fa-pinterest fa-2x"></i></a>
                    </div> 
                <?php endif; ?>
                <?php if (!empty($kreativa_options['social_linkedin'])) : ?>
                    <div class="social col-md-<?php echo esc_attr($number);?> col-sm-6 col-xs-6 social-linkedin-bg">
                        <a href="<?php  echo esc_url($kreativa_options['social_linkedin']); ?>"><i class="fa fa-linkedin fa-2x"></i></a>
                    </div> 
                <?php endif; ?>
                <?php if (!empty($kreativa_options['social_instagram'])) : ?>
                    <div class="social col-md-<?php echo esc_attr($number);?> col-sm-6 col-xs-6 social-instagram-bg">
                        <a href="<?php  echo esc_url($kreativa_options['social_instagram']); ?>"><i class="fa fa-instagram fa-2x"></i></a>
                    </div>  
                <?php endif; ?>            
            </div>
        </section>
        <?php
  }
}