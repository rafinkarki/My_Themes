    <?php // Exit if accessed directly
    if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} ?>
  <?php if ( post_password_required() ) { ?>
        <p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.','kreativa')?></p>
    <?php
    return;
    }
    $ncom = get_comments_number();
    ?>
 
      <?php if ( have_comments() ) : ?>
       <div class="white-back box">
          <div class="module-title">
            <h4><?php _e('COMMENTS  ','kreativa');?></h4>
            <span class="module-separator"></span>
          </div><!-- end title -->
        <?php endif;?>                      
        <?php if ($ncom >= get_option('comments_per_page') && get_option('page_comments')) : ?>
          <nav id="comment-nav-above">
            <?php paginate_comments_links(); ?>
          </nav>
        <?php endif; ?>
          <?php if (comments_open()) : ?>
           <div class="comment-list-wrapper">
             <div class="comment-list">
                <?php	  $args = array (
                   'paged' => true,
                   'avatar_size'       => 80,
                   'style'             => 'ul',
                   'callback'=> 'kreativa_comment',
                   'per_page' =>'8',
                   ); 
                 wp_list_comments($args);
                 ?>
             
          </div>
        </div> 
     </div>
        <?php if ($ncom >= get_option('comments_per_page') && get_option( 'page_comments' ) ) : ?>
        <nav id="comment-nav-below">
          <?php paginate_comments_links(); ?>
        </nav>
      <?php endif; ?>
        <?php else : // this is displayed if there are no comments so far ?>

          <?php if ('open' == $post->comment_status) : ?>
            <!-- If comments are open, but there are no comments. -->

          <?php else : // comments are closed ?>
            <!-- If comments are closed. -->
            <p class="nocomments">Comments are closed.</p>

          <?php endif; ?>
        <?php endif; ?>

        <?php if ('open' == $post->comment_status) : ?>

          
<div class="white-back box">

      <?php
      $commenter = wp_get_current_commenter();

      $comment_form = array(
        'title_reply'          => have_comments() ? __( '<div class="module-title"><h4>Leave a Feedback</h4> <span class="module-separator"></span></span></div>', 'woocommerce' ) : __( '', 'woocommerce' ) ,
        'title_reply_to'       => __( 'Leave a Reply to %s', 'kreativa' ),
        'comment_notes_before' => '',
        'comment_notes_after'  => '',
        'fields'               => array(
          'author' => '<div class="form-group col-md-12 has-icon-right"><input id="author" name="author" type="text" placeholder="Name*" value="' . esc_attr( $commenter['comment_author'] ) . '" class="form-control" aria-required="true" /> <span class="icon-user14 icon-right"></span></div>',
          'email'  => '<div class="form-group col-md-12 has-icon-right"><input id="email" name="email" type="text" placeholder="Email*" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" class="form-control"  aria-required="true" /><span class="icon-envelope7 icon-right"></span></div>',
          'website'  => ' <div class="form-group col-md-12 has-icon-right"><input id="website" name="website" type="text" placeholder="WEBSITE"  class="form-control"   /><span class="icon-earth22 icon-right"></span></div>',

          ),
        'label_submit'  => '',
        'logged_in_as' => '<div class="col-md-4">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>','dikka'), get_edit_user_link(), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink($post->ID) ) ) ) . '</div>',

        'comment_field' => ''
        );

    $comment_form['comment_field'] .= '<div class="form-group col-md-12 has-icon-right"> <textarea id="comment" name="comment" class="form-control" rows="6" aria-required="true"></textarea><span class="icon-pen3 icon-right"></span> </div>
    <footer>
    <button id="submit" name="submit" class="btn btn-primary"> COMMENT</button>
	</footer>
	
	';
     comment_form(  $comment_form  );
	 echo str_replace('class="comment-form"','class="rcw-form"',ob_get_clean());
    
    ?>
    </div>
  <?php endif; ?>
  


