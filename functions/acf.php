<?php

add_filter('acf/settings/save_json', 'my_acf_json_save_point');

function my_acf_json_save_point($path)
{
  // update path
  $path = get_stylesheet_directory() . '/acf-json';
  // return
  return $path;
}

// Tell acf wwp-content/themes/rethink-block-theme/assets/src/images/icons the blocks are
add_filter('acf/settings/load_json', 'my_acf_json_load_point');
function my_acf_json_load_point($paths)
{
  unset($paths[0]);
  $paths[] = get_template_directory() . '/acf-json';
  return $paths;
}

// create options page
if (function_exists('acf_add_options_page')) {
  acf_add_options_page(array(
    'page_title'  => 'Site options',
    'menu_title'  => 'Site options',
    'menu_slug'   => 'theme-options',
    'capability'  => 'edit_posts',
    'redirect'    => false,
    'icon_url'    => 'dashicons-admin-generic',
    'position'    => 22,
  ));
}




/**
 * @desc Add colours to admin for acf colour choices - eg Quote module
 *
 * In ACF....
 * Background Colour Picker example
 * white : <div class='acf-radio-color acf-radio-color--white'>White</div>
 * off-white : <div class='acf-radio-color acf-radio-color--off-white'>Off White</div>
 *
 * Illustrion picker example
 * dog1 : <div class='acf-illustration'><div class="acf-icon acf-icon--dog1"></div></div>
 */

function acf_radio_choices()
{
  echo '<style>

     #acf-illustration-picker .acf-button-group{
       flex-wrap: wrap;
     }


     #acf-illustration-picker .acf-button-group label{
       flex: unset;
     }


     #acf-illustration-picker ul.acf-radio-list li label {
       display: flex;
       flex-direction: column-reverse;
       align-items: center;
       justify-content: center;
       flex : unset;
     }

     .acf-icon-wrapper {
       width: 80px;
       margin-right: 15px;

       text-align: center;
       background-color: black;
     }

     .acf-icon {
       width: 70px;
       height: 70px;

       background-repeat: no-repeat;
       background-position: center;
       ;
     }

.acf-icon--icon-C02{background-image: url("/wp-content/themes/rethink-block-theme/assets/src/images/icons/icon-C02.svg");}
.acf-icon--icon-city{background-image: url("/wp-content/themes/rethink-block-theme/assets/src/images/icons/icon-city.svg");}
.acf-icon--icon-community{background-image: url("/wp-content/themes/rethink-block-theme/assets/src/images/icons/icon-community.svg");}
.acf-icon--icon-company{background-image: url("/wp-content/themes/rethink-block-theme/assets/src/images/icons/icon-company.svg");}
.acf-icon--icon-donation{background-image: url("/wp-content/themes/rethink-block-theme/assets/src/images/icons/icon-donation.svg");}
.acf-icon--icon-email{background-image: url("/wp-content/themes/rethink-block-theme/assets/src/images/icons/icon-email.svg");}
.acf-icon--icon-followers{background-image: url("/wp-content/themes/rethink-block-theme/assets/src/images/icons/icon-followers.svg");}
.acf-icon--icon-national{background-image: url("/wp-content/themes/rethink-block-theme/assets/src/images/icons/icon-national.svg");}
.acf-icon--icon-partners{background-image: url("/wp-content/themes/rethink-block-theme/assets/src/images/icons/icon-partners.svg");}
.acf-icon--icon-planet{background-image: url("/wp-content/themes/rethink-block-theme/assets/src/images/icons/icon-planet.svg");}
.acf-icon--icon-regional{background-image: url("/wp-content/themes/rethink-block-theme/assets/src/images/icons/icon-regional.svg");}
.acf-icon--icon-solutions{background-image: url("/wp-content/themes/rethink-block-theme/assets/src/images/icons/icon-solutions.svg");}
.acf-icon--icon-speakers{background-image: url("/wp-content/themes/rethink-block-theme/assets/src/images/icons/icon-speakers.svg");}
.acf-icon--icon-themed-theatres{background-image: url("/wp-content/themes/rethink-block-theme/assets/src/images/icons/icon-themed-theatres.svg");}
.acf-icon--icon-total-visitors{background-image: url("/wp-content/themes/rethink-block-theme/assets/src/images/icons/icon-total-visitors.svg");}
.acf-icon--icon-trees{background-image: url("/wp-content/themes/rethink-block-theme/assets/src/images/icons/icon-trees.svg");}
.acf-icon--icon-website{background-image: url("/wp-content/themes/rethink-block-theme/assets/src/images/icons/icon-website.svg");}
.acf-icon--icon-workshops{background-image: url("/wp-content/themes/rethink-block-theme/assets/src/images/icons/icon-workshops.svg");}

   </style>';
}

add_action('admin_head', 'acf_radio_choices');
