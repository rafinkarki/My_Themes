<?php
/**
 * Pagination - Show numbered pagination for catalog pages.
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.2.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $wp_query;

if ( $wp_query->max_num_pages <= 1 ) {
	return;
}


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
        echo ' <ul class="pagination">';
		for ($i = $start_page; $i <= $end_page; $i++) {
            if ($i == $paged)
                 echo ' <li><a href="'.get_pagenum_link($i).'">' . $i . '</a></li>';
            else
                echo ' <li><a href="'.get_pagenum_link($i).'">' . $i . '</a></li>';
        }
		$var2 = $paged;
	if ($paged == $end_page) echo ('<li> <a href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>');
	else echo ('<li><a href="' . get_pagenum_link(++$var2) . '" aria-label="Next"><span aria-hidden="true">»</span></a></li>');
        
        echo '</ul></nav>';