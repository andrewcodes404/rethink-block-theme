<?php

//Html <head></head>
include(get_theme_file_path('/functions/head.php'));

// Enqueue styles and js
include(get_theme_file_path('/functions/enqueue.php'));

// Styles for the edito
include(get_theme_file_path('/functions/editor.php'));

// ACF
require_once get_template_directory() . '/functions/acf.php';

// ACF Blocks
require_once get_template_directory() . '/functions/blocks.php';

// Custom ACF filters
// require_once get_template_directory() . '/functions/acf-filters.php';


// SOMETHING FOR ORDERING SPEAKER NAMES 👇
/**
 * Order posts by the last word in the post_title.
 * Activated when orderby is 'wpse_last_word'
 * @link https://wordpress.stackexchange.com/a/198624/26350
 */
// add_filter('posts_orderby', function ($orderby, \WP_Query $q) {
//   if ('wpse_last_word' === $q->get('orderby') && $get_order = $q->get('order')) {
//     if (in_array(strtoupper($get_order), ['ASC', 'DESC'])) {
//       global $wpdb;
//       $orderby = " SUBSTRING_INDEX( {$wpdb->posts}.post_title, ' ', -1 ) " . $get_order;
//     }
//   }
//   return $orderby;
// }, PHP_INT_MAX, 2);
