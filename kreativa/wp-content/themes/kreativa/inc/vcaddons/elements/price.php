<?php
/**
 * Visual Composer Element: Pricing Table
 * 
 */
function pricing_func($atts, $content = null )
{
	extract( shortcode_atts( array(
				'el_class' => '',
				'scheme' => '',
				'title' => '',
				'price' => '',
				'price_small' => '',
				'currency' => '',
				'period' => '',
				'link' => '',
				'button_text' => '',
				'featured' => '',
				'featured_text' => '',
			), $atts) );
    
    ob_start();
    ?>
    <div class="pricing-table <?php echo $scheme; ?> <?php echo ($featured =='yes' ? 'featured' : ''); ?>">
				<div class="pricing-table-inner">
					<header>
						<?php if($featured =='yes') : ?>
						<span class="pricing-table-tag"><?php echo $featured_text; ?></span>
						<?php endif;?>
						<h4><?php echo $title; ?></h4>
					</header>
					<div class="pricing">
						<span class="currency"><?php echo $currency; ?></span>
						<span class="price"><?php echo $price; ?></span>
						<span class="inline-blocks">
							<span class="price small"><?php echo $price_small; ?></span>
							<span class="period"><?php echo $period; ?></span>
						</span>
					</div>
						<?php echo do_shortcode(strip_tags($content, '<ul><li>')); ?>

					<footer>
						<a href="<?php echo $link; ?>" class="button bg-blue color-white"><?php echo $button_text; ?></a>
					</footer>
				</div>
			</div><!-- /Pricing Table -->
    <?php
    
    $html = ob_get_contents();
	ob_end_clean();
    return $html;    
}

add_shortcode('pricing', 'pricing_func');