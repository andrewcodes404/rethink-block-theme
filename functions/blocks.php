<?php

// Register block types ---// Register block types ---// Register block types ---
// register_block_type(get_template_directory() . '/blocks/anchor-tabs/block.json');
register_block_type(get_template_directory() . '/blocks/carousel/block.json');
register_block_type(get_template_directory() . '/blocks/hero/block.json');
register_block_type(get_template_directory() . '/blocks/icon-banner/block.json');
register_block_type(get_template_directory() . '/blocks/icon-title/block.json');
register_block_type(get_template_directory() . '/blocks/logos/block.json');
// register_block_type(get_template_directory() . '/blocks/post-session-speakers/block.json');
// register_block_type(get_template_directory() . '/blocks/programme-global/block.json');
// register_block_type(get_template_directory() . '/blocks/speakers/block.json');
// register_block_type(get_template_directory() . '/blocks/test-block/block.json');
register_block_type(get_template_directory() . '/blocks/youtube/block.json');


// Register a category for Rethink blocks
// function rethink_custom_block_category($categories)
// {
//   return array_merge(
//     $categories,
//     [
//       [
//         'slug'  => 'rethink-blocks',
//         'title' => esc_html__('Rethink Blocks', 'rethink-blocks'),
//         'icon'  => 'yes', // Slug of a WordPress Dashicon or custom SVG
//       ],

//     ]
//   );
// }
// add_action('block_categories_all', 'rethink_custom_block_category', 10, 2);


// Registers category and pushes it up the list
function custom_block_category($categories)
{
  $custom_block = array(
    'slug'  => 'rethink-blocks',
    'title' => esc_html__('Rethink Blocks', 'rethink-blocks'),
    'icon'  => 'yes', // Slug of a WordPress Dashicon or custom SVG
  );

  $categories_sorted = array();
  $categories_sorted[0] = $custom_block;

  foreach ($categories as $category) {
    $categories_sorted[] = $category;
  }

  return $categories_sorted;
}
add_filter('block_categories_all', 'custom_block_category', 10, 2);



add_filter('allowed_block_types_all', 'apd_allowed_block_types', 10, 2);

function apd_allowed_block_types($allowed_blocks)
{
  return array(

    //ACF
    // 'acf/anchor-tabs',
    'acf/carousel-all-in-one',
    'acf/hero',
    'acf/icon-banner',
    'acf/icon-title',
    'acf/logos',
    'acf/post-session-speakers',
    'acf/programme-global',
    'acf/programme-grid',
    'acf/programme-snippet',
    'acf/programmes',
    'acf/speakers',
    'acf/youtube',

    // plugins
    // 'modula/gallery',
    'gravityforms/form',
    'pb/accordion-item',

    // the wp-blocks
    'core/group',
    'core/image',
    'core/gallery',
    'core/heading',
    'core/file',
    'core/list',
    'core/buttons',
    'core/column',
    'core/columns',
    'core/block',
    'core/paragraph',
    'core/table',
    // 'core/spacer',
    'core/html'
  );
}
