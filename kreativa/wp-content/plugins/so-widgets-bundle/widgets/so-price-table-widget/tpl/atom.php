<?php if($instance['featured']):
    $class='active';
else:
    if($instance['gray']):
        $class='background-gray';
    else:
        $class='';
    endif;
endif;?>
<div class="pricing-box <?php echo $class;?>">
    <div class="pricing-head">
        <h3><?php echo  esc_attr($instance['title'])  ?></h3>
        <?php if($instance['price']):?>
            <h1><sup><?php _e('$','siteorigin_widget')?></sup><?php echo esc_attr($instance['price']) ?><?php if($instance['per']):?><em><?php _e('/','siteorigin_widget')?><?php echo esc_attr($instance['per']) ?></em><?php endif;?></h1>
        <?php endif;?>
    </div><!-- end pricing head -->
    <div class="pricing-body">
        <ul>
            <?php foreach($instance['features'] as $i => $feature) : ?>                          
                <li> <?php echo wp_kses_post($feature['text']) ?></li>         
            <?php endforeach;?>  
        </ul>
    </div><!-- end pricing body -->
    <div class="pricing-footer">
        <?php if( !empty( $instance['btnurl'] ) ) echo '<a  href="' . esc_url( $instance['btnurl'] ) . '" ' . ( $instance['new_window'] ? 'target="_blank"' : '' ) . ' class="btn btn-primary border-radius" >'; ?>
            <?php echo esc_attr($instance['btntext']);?>
        <?php if( !empty( $instance['btnurl'] ) ) echo '</a>'; ?> 
    </div><!-- end pricing footer -->
</div><!-- end pricing -->