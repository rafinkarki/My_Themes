<?php
/**
 * Visual Composer Eelement: Message
 * 
 */

extract(shortcode_atts(array(
    'icon' => '',
    'color' => '',
    'box_bg' => '',
    'box_color' => '',
    'box_br_color' => '', 
    'box_br_thickness' => '',
    'box_br_style' => '',
   
), $atts));
 
?>
<?php if($color=='custom') : ?>
    <div class="alert-box <?php echo $color;?> <?php echo $box_bg;?> <?php echo $box_color;?> <?php echo $box_br_color;?> <?php echo $box_br_thickness;?> <?php echo $box_br_style;?> ">
        <i class="fa fa-<?php echo $icon; ?>"></i>
        <p><?php echo wpb_js_remove_wpautop($content, true); ?></p>
    </div>
<?php else : ?>
    <div class="alert-box <?php echo $color;?>">
        <p><?php echo wpb_js_remove_wpautop($content, true); ?></p>
    </div>
<?php endif; ?>
