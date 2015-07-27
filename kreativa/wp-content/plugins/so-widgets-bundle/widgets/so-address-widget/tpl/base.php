<div class="info-icons">
    <ul>
        <?php if(!empty($instance['phone'])):?>
            <li>
            <?php if( !empty( $instance['link'] ) ) echo '<a  href="' . esc_url( $instance['link'] ) . '" ' . ( $instance['new_window'] ? 'target="_blank"' : '' ) . '>'; ?>
            <i class="fa fa-phone"></i><?php echo esc_attr($instance['phone']);?>
            <?php if( !empty( $frame['moreurl'] ) ) echo '</a>'; ?>
            </li>
        <?php endif;?>
        <?php if(!empty($instance['email'])):?>
            <li>
            <?php if( !empty( $instance['link'] ) ) echo '<a  href="' . esc_url( $instance['link'] ) . '" ' . ( $instance['new_window'] ? 'target="_blank"' : '' ) . '>'; ?>
                <i class="fa fa-envelope"></i><?php echo esc_attr($instance['email']);?>
            <?php if( !empty( $frame['moreurl'] ) ) echo '</a>'; ?>           
           </li>
        <?php endif;?>
        <?php if(!empty($instance['website'])):?>
            <li>
                <?php if( !empty( $instance['link'] ) ) echo '<a  href="' . esc_url( $instance['link'] ) . '" ' . ( $instance['new_window'] ? 'target="_blank"' : '' ) . '>'; ?>
                <i class="fa fa-globe"></i><?php echo esc_attr($instance['website']);?>
                <?php if( !empty( $frame['moreurl'] ) ) echo '</a>'; ?>
            </li>
        <?php endif;?> 
    </ul>
</div>
             