<div class="slider">
    <div class="fullwidthbanner-container">
        <div class="fullwidthbanner">
            <ul>
                <?php foreach($instance['frames'] as $frame) : ?>
                    <li class="first-slide" data-transition="<?php echo $instance['animation'];?>" data-slotamount="10" data-masterspeed="<?php echo esc_attr($instance['speed']);?>">
                        <?php if( empty($frame['background_image']) ) $background_image = false;
                        else $background_image = wp_get_attachment_image_src($frame['background_image'], 'full');?>
                        <img src="<?php echo esc_url($background_image[0]);?>" data-fullwidth<?php echo $frame['align'];?>ing="on" alt="slide">
                        <div class="tp-caption first-line lft tp-resizeme start" data-x="<?php echo $frame['align'];?>" data-hoffset="0" data-y="280" data-speed="1000" data-start="200" data-easing="Power4.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0" data-endelementdelay="0"><?php echo esc_attr($frame['layertitle']); ?></div>
                        <div class="tp-caption second-line lfb tp-resizeme start" data-x="<?php echo $frame['align'];?>" data-hoffset="0" data-y="340" data-speed="1000" data-start="800" data-easing="Power4.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0" data-endelementdelay="0"> <?php echo esc_attr($frame['title']); ?> </div>
                        <div class="tp-caption third-line sfb tp-resizeme start" data-x="<?php echo $frame['align'];?>" data-hoffset="0" data-y="380" data-speed="1000" data-start="2200" data-easing="Power4.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0" data-endelementdelay="0"><p><?php echo nl2br(wp_kses_post($frame['layersubtitle'])); ?></p></div>
                        <div class="tp-caption slider-btn sfb tp-resizeme start" data-x="<?php echo $frame['align'];?>" data-hoffset="0" data-y="400" data-speed="1000" data-start="2200" data-easing="Power4.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0" data-endelementdelay="0">
                            
                            <?php if( !empty( $frame['moreurl'] ) ) echo '<a  href="' . esc_url( $frame['moreurl'] ) . '" ' . ( $frame['new_window'] ? 'target="_blank"' : '' ) . ' class="btn-slider" >'; ?>
                                <?php echo esc_attr( $frame['moretext'] ) ?>
                            <?php if( !empty( $frame['moreurl'] ) ) echo '</a>'; ?>
                        </div>
                    </li>
                <?php endforeach;?>                
            </ul>
        </div>
    </div>
</div>