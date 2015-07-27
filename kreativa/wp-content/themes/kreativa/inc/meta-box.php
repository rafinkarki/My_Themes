<?php

global $metaboxes;
$metaboxes = array(
    'link' => array(
        'title' => __('Link Settings', 'kreativa'),
        'applicableto' => 'post',
        'location' => 'normal',
        'display_condition' => 'post-format-link',
        'priority' => 'high',
        'fields' => array(
            'link_title' => array(
                'title' => __('Link Title:', 'kreativa'),
                'type' => 'text',
                'description' => '',
                'size' => 60
            ),
            'link_url' => array(
                'title' => __('link url:', 'kreativa'),
                'type' => 'text',
                'description' => '',
                'size' => 60
            )
        )
    ),
    
    'video_code' => array(
        'title' => __('Video Settings', 'kreativa'),
        'applicableto' => 'post',
        'location' => 'normal',
        'display_condition' => 'post-format-video',
        'priority' => 'high',
        'fields' => array(
            'video_id' => array(
                'title' => __('Video url:', 'kreativa'),
                'type' => 'text',
                'description' => '',
                'size' => 60
            )
        )
    ),
    
    'audio_code' => array(
        'title' => __('Audio Settings', 'kreativa'),
        'applicableto' => 'post',
        'location' => 'normal',
        'display_condition' => 'post-format-audio',
        'priority' => 'high',
        'fields' => array(
            'audio_id' => array(
                'title' => __('Audio url:', 'kreativa'),
                'type' => 'text',
                'description' => '',
                'size' => 60
            )
        )
    ),

    'quote_author' => array(
        'title' => __('Quote Settings', 'kreativa'),
        'applicableto' => 'post',
        'location' => 'normal',
        'display_condition' => 'post-format-quote',
        'priority' => 'high',
        'fields' => array(

            'q_content' => array(
                'title' => __('Quote content:', 'kreativa'),
                'type' => 'textarea',
                'description' => '',
                'size' => 20
            ),

            'q_author' => array(
                'title' => __('quote author:', 'kreativa'),
                'type' => 'text',
                'description' => '',
                'size' => 20
            )
        )
    )
);

add_action( 'add_meta_boxes', 'kreativa_add_post_format_metabox' );
 
function kreativa_add_post_format_metabox() {
    global $metaboxes;
 
    if ( ! empty( $metaboxes ) ) {
        foreach ( $metaboxes as $id => $metabox ) {
            add_meta_box( $id, $metabox['title'], 'kreativa_show_metaboxes', $metabox['applicableto'], $metabox['location'], $metabox['priority'], $id );
        }
    }
}

function kreativa_show_metaboxes( $post, $args ) {
    global $metaboxes;
 
    $custom = get_post_custom( $post->ID );
    $fields = $tabs = $metaboxes[$args['id']]['fields'];
 
    /** Nonce **/
    $output = '<input type="hidden" name="post_format_meta_box_nonce" value="' . wp_create_nonce( basename( __FILE__ ) ) . '" />';
 
    if ( sizeof( $fields ) ) {
        foreach ( $fields as $id => $field ) {
            switch ( $field['type'] ) {
                default:
                case "text":
                    if(isset($custom[$id][0])) {
                    $output .= '<label for="' . $id . '">' . $field['title'] . '</label><input id="' . $id . '" type="text" name="' . $id . '" value="' . $custom[$id][0] . '" size="' . $field['size'] . '" />';
                    } else {
                    $output .= '<label for="' . $id . '">' . $field['title'] . '</label><input id="' . $id . '" type="text" name="' . $id . '" value="" size="' . $field['size'] . '" />';
                    }
                    break;
            }
        }
    }
 
    echo $output;
}


add_action( 'save_post', 'kreativa_save_metaboxes' );
 
function kreativa_save_metaboxes( $post_id ) {
    global $metaboxes;
 
    // verify nonce
    
    if(isset($_POST['post_format_meta_box_nonce'])){
    if ( ! wp_verify_nonce( $_POST['post_format_meta_box_nonce'], basename( __FILE__ ) ) )
        return $post_id;
    }

    // check autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
        return $post_id;
 
    // check permissions
    if ( isset( $_POST['post_type'] ) &&  'page' == $_POST['post_type'] ) {
        if ( ! current_user_can( 'edit_page', $post_id ) )
            return $post_id;
    } elseif ( ! current_user_can( 'edit_post', $post_id ) ) {
        return $post_id;
    }
 
    $post_type = get_post_type();

    // loop through fields and save the data
    foreach ( $metaboxes as $id => $metabox ) {
        // check if metabox is applicable for current post type
        if ( $metabox['applicableto'] == $post_type ) {
            $fields = $metaboxes[$id]['fields'];
 
            foreach ( $fields as $id => $field ) {
                $old = get_post_meta( $post_id, $id, true );
                if(isset($_POST[$id])) {
                    $new = $_POST[$id];
     
                    if ( $new && $new != $old ) {
                        update_post_meta( $post_id, $id, $new );
                    }
                    elseif ( '' == $new && $old || ! isset( $_POST[$id] ) ) {
                        delete_post_meta( $post_id, $id, $old );
                    }
                }
            }
        }
    }
}


add_action( 'admin_print_scripts', 'kreativa_display_metaboxes', 1000 );
function kreativa_display_metaboxes() {
    global $metaboxes;
    if ( get_post_type() == "post" ) :
        ?>
        <script type="text/javascript">// <![CDATA[
            $ = jQuery;
 
            <?php
            $formats = $ids = array();
            foreach ( $metaboxes as $id => $metabox ) {
                array_push( $formats, "'" . $metabox['display_condition'] . "': '" . $id . "'" );
                array_push( $ids, "#" . $id );
            }
            ?>
 
            var formats = { <?php echo implode( ',', $formats );?> };
            var ids = "<?php echo implode( ',', $ids ); ?>";
             function displayMetaboxes() {
                // Hide all post format metaboxes
                $(ids).hide();
                // Get current post format
                var selectedElt = $("input[name='post_format']:checked").attr("id");
 
                // If exists, fade in current post format metabox
                if ( formats[selectedElt] )
                    $("#" + formats[selectedElt]).fadeIn();
            }
 
            $(function() {
                // Show/hide metaboxes on page load
                displayMetaboxes();
 
                // Show/hide metaboxes on change event
                $("input[name='post_format']").change(function() {
                    displayMetaboxes();
                });
            });
 
        // ]]></script>
        <?php
    endif;
}

function be_attachment_field_credit( $form_fields, $post ) {
    $form_fields['destination_url'] = array(
        'label' => 'Destination',
        'input' => 'text',
        'value' => get_post_meta( $post->ID, 'destination_url', true ),
        'helps' => 'Add destination URL',
    );
    return $form_fields;
}
add_filter( 'attachment_fields_to_edit', 'be_attachment_field_credit', 10, 2 );

function be_attachment_field_credit_save( $post, $attachment ) {
    if( isset( $attachment['destination_url'] ) )
    update_post_meta( $post['ID'], 'destination_url', esc_url( $attachment['destination_url'] ) );
    return $post;
}
add_filter( 'attachment_fields_to_save', 'be_attachment_field_credit_save', 10, 2 );


add_filter( 'cmb_meta_boxes', 'kreativa_cmb_metaboxes' );
function kreativa_cmb_metaboxes( array $meta_boxes ) {

    $prefix = 'kreativa_';

     $meta_boxes['page_metabox'] = array(
        'id'         => 'page_metabox',
        'title'      => __( 'kreativa Page Settings', 'kreativa' ),
        'pages'      => array( 'page', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        'fields'     => array(

           

           array(
                'name'    => __( 'Page Title ', 'kreativa' ),
                'id'      => $prefix . 'pagetitle_title',
                'type'    => 'text',
            ),
			array(
                'name'    => __( 'Page Sub Title ', 'kreativa' ),
                'id'      => $prefix . 'pagetitle_subtitle',
                'type'    => 'text',
            ),

            array(
                'name' => __(' Background Bread Crumb Image', 'kreativa') ,
                'desc' => __('Upload an image or enter a URL.', 'kreativa') ,
                'id' => $prefix . 'pagetitle_image',
                'type' => 'file',
            ) ,

            array(
                'name' => 'Hide Page Title Line',
                'desc' => 'Donot display page line below subtitle',
                'id' => $prefix . 'pagetitle_line',
                'type' => 'checkbox'
            ),

           
        )
    );
    $meta_boxes['menu_metabox'] = array(
            'id'         => 'menu_metabox',
            'title'      => __( 'Menu Option', 'bella' ),
            'pages'      => array( 'page', ), // Post type
            'context'    => 'side',
            'priority'   => 'high',
            'show_names' => true, // Show field names on the left
            'fields'     => array(
                array(
                    'name'     => __( 'Menus', 'bella' ),
                    'desc'     => __( 'Select menu for this page', 'bella' ),
                    'id'       => $prefix . 'menu_select',
                    'type'     => 'taxonomy_select',
                    'taxonomy' => 'nav_menu', // Taxonomy Slug
                    'default' => 'bella-main-menu',
                ),
            )
        );
    $meta_boxes['team_metabox'] = array(
            'id'         => 'team_metabox',
            'title'      => __( 'Custom Team Options', 'creativ' ),
            'pages'      => array( 'team' ), 
            'context'    => 'normal',
            'normal'   => 'high',
            'show_names' => true, // Show field names on the left
            'fields'     => array(

                array(
                    'name' => 'Personal Facebook Url',
                    'desc' => 'Please enter the client\'s facebook url',
                    'id' => $prefix . 'facebook',
                    'type' => 'text_medium'
                ),
                 array(
                    'name' => 'Personal Twitter Url',
                    'desc' => 'Please enter the client\'s twitter url',
                    'id' => $prefix . 'twitter',
                    'type' => 'text_medium'
                ),
                array(
                    'name' => 'Personal Linkedin Url',
                    'desc' => 'Please enter the client\'s linkedin url',
                    'id' => $prefix . 'linkedin',
                    'type' => 'text_medium'
                ),
            )
        );

     $meta_boxes['portfolio_metabox'] = array(
        'id'         => 'portfolio_metabox',
        'title'      => __( 'Custom Portfolio Options', 'kreativa' ),
        'pages'      => array( 'portfolio' ), 
        'context'    => 'normal',
        'normal'   => 'high',
        'show_names' => true, // Show field names on the left
        'fields'     => array(

          
            array(
                'name' => 'Project Subtitle',
                'desc' => 'Please enter the short intro of project as subtitle',
                'id' => $prefix . 'portfolio_subtitle',
                'type' => 'text_medium'
            ),
            array(
                'name' => 'Facebook Url',
                'desc' => 'Please enter the facebook url',
                'id' => $prefix . 'facebook',
                'type' => 'text_medium'
                ),
            array(
                'name' => 'Twitter Url',
                'desc' => 'Please enter the twitter url',
                'id' => $prefix . 'twitter',
                'type' => 'text_medium'
            ),
            array(
                'name' => 'Google Url',
                'desc' => 'Please enter the google url',
                'id' => $prefix . 'google',
                'type' => 'text_medium'
            ),
             array(
                'name' => 'Linkedin Url',
                'desc' => 'Please enter the linkedin url',
                'id' => $prefix . 'linkedin',
                'type' => 'text_medium'
                ),
            array(
                'name' => 'RSS Url',
                'desc' => 'Please enter the rss url',
                'id' => $prefix . 'rss',
                'type' => 'text_medium'
            ),
            array(
                'name' => 'Youtube Url',
                'desc' => 'Please enter the youtube url',
                'id' => $prefix . 'youtube',
                'type' => 'text_medium'
            ),
            
        )
    );
   

    return $meta_boxes;
}

?>
