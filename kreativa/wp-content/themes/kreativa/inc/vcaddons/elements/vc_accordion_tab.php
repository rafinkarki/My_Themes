<?php
$output = $title = '';

extract(shortcode_atts(array(
	'title' => __("Section", "js_composer")
), $atts));


$output .= "\n\t\t\t" . '<li class="accordion">';
    $output .= "\n\t\t\t\t" . '<div class="accordion-header"><div class="accordion-icon"></div><h6>'.$title.'</h6></div>';
    $output .= "\n\t\t\t\t" . '<div class="accordion-content  vc_clearfix">';
        $output .= ($content=='' || $content==' ') ? __("Empty section. Edit page to add content here.", "js_composer") : "\n\t\t\t\t" . wpb_js_remove_wpautop($content);
        $output .= "\n\t\t\t\t" . '</div>';
    $output .= "\n\t\t\t" . '</li> ' . $this->endBlockComment('.wpb_accordion_section') . "\n";

echo $output;