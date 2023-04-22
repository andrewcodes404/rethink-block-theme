<?php

function rt_enqueue_js()
{
  wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/src/js/index.js', '', '', true);
  wp_enqueue_script('tiny-slider', get_template_directory_uri() . '/assets/src/js/tiny-slider.min.js', '', '', true);
  wp_enqueue_script('tiny-slider_init', get_template_directory_uri() . '/assets/src/js/tiny-slider_init.js', '', '', true);
}

add_action('wp_enqueue_scripts', 'rt_enqueue_js');


//Stylesheets
function rt_enqueue_styles()
{
  ///fonts
  wp_enqueue_style('rt-gfonts-css', 'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,700;1,400;1,700&display=swap');

  // internal style sheet
  wp_enqueue_style('rt-style', get_template_directory_uri() . '/assets/dist/style.css', array(), filemtime(get_template_directory() . '/assets/dist/style.css'), false);
}

add_action('wp_enqueue_scripts', 'rt_enqueue_styles');
