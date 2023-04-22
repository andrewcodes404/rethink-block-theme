
<?php // array of filters (field key => field name)

// // array of filters (field key => field name)
// $GLOBALS['my_query_filters'] = array(
//   'field_1'   => 'day',
//   'field_2'   => 'location'
// );


// // action
// add_action('pre_get_posts', 'my_pre_get_posts', 10, 1);

// function my_pre_get_posts($query)
// {

//   // bail early if is in admin
//   if (is_admin()) return;


//   // bail early if not main query
//   // - allows custom code / plugins to continue working
//   if (!$query->is_main_query()) return;


//   // get meta query
//   $meta_query = $query->get('meta_query');


//   // loop over filters
//   foreach ($GLOBALS['my_query_filters'] as $key => $name) {

//     // continue if not found in url
//     if (empty($_GET[$name])) {

//       continue;
//     }


//     // get the value for this filter
//     // eg: http://www.website.com/events?city=melbourne,sydney
//     $value = explode(',', $_GET[$name]);


//     // append meta query

//     $meta_query = [];
//     $meta_query[] = array(
//       'key'       => $name,
//       'value'     => $value,
//       'compare'   => 'IN',
//     );
//   }


//   // update meta query
//   $query->set('meta_query', $meta_query);
// }



// function my_pre_get_posts($query)
// {

//   // do not modify queries in the admin
//   if (is_admin()) {
//     return $query;
//   }


//   // only modify queries for 'event' post type
//   if (isset($query->query_vars['post_type']) && $query->query_vars['post_type'] == 'speaker-items') {

//     // allow the url to alter the query
//     if (isset($_GET['position'])) {

//       $query->set('meta_key', 'position');
//       $query->set('meta_value', $_GET['position']);
//     }
//   }


//   // return
//   return $query;
// }

// add_action('pre_get_posts', 'my_pre_get_posts');

// function range_search_all_public_post_types($q)
// {
//   if (is_search() && is_main_query() && '' == $q->get('post_type') && !empty($_GET['post_type']) && post_type_exists($_GET['post_type']) && get_post_type_object($_GET['post_type'])->public)
//     $q->set('post_type', $_GET['post_type']);
// }
// add_action('pre_get_posts', 'range_search_all_public_post_types');


// function my_pre_get_posts($query)
// {
//   // do not modify queries in the admin
//   if (is_admin()) {
//     return $query;
//   }
//   // only modify queries for 'event' post type
//   if (isset($query->query_vars['post_type']) && $query->query_vars['post_type'] == 'session-2022') {


//     echo " in acf-filters";
//     // $location = "";
//     // if ( isset($_GET['location'])) {
//     //   $location =  $_GET['location'];
//     // } else {
//     //   $location = 'susTrans';
//     // }

//     $location =  isset($_GET['location']) ? $_GET['location'] : 'susTrans';
//     $day =   isset($_GET['day']) ? $_GET['day'] : 'day1';

//     // allow the url to alter the query
//     if (isset($_GET['location'])  || isset($_GET['day'])) {
//       $query->set('meta_query',  array(
//         'relation' => 'AND',
//         array(
//           'key' => 'location',
//           'value' => $location,
//         ),
//         array(
//           'key' => 'day',
//           'value' =>  $day,
//         ),
//       ));
//       // $query->set('paged', 1);
//     }
//   }
//   // return
//   return $query;
// }

// add_action('pre_get_posts', 'my_pre_get_posts');





// add_filter('query_loop_block_query_vars', 'wpdocs_filter_query');
// function wpdocs_filter_query($query)
// {

//   echo " in query_loop_block_query_vars";
//   // ignore if the query block is not using this post type
//   if ('wpdocs_event' !== $query['session-2022']) {
//     return $query;
//   }
//   echo " in query_loop_block_query_vars";

//   $location =  isset($_GET['location']) ? $_GET['location'] : 'susTrans';
//   $day =   isset($_GET['day']) ? $_GET['day'] : 'day1';


//   // allow the url to alter the query
//   if (isset($_GET['location'])  || isset($_GET['day'])) {
//     $query->set('meta_query',  array(
//       'relation' => 'AND',
//       array(
//         'key' => 'location',
//         'value' => $location,
//       ),
//       array(
//         'key' => 'day',
//         'value' =>  $day,
//       ),
//     ));
//     // $query->set('paged', 1);
//   }


//   // // always exclude events with dates in the past
//   // $query['meta_key'] = 'eventDate';
//   // $query['meta_value'] = date('Y-m-d');
//   // $query['meta_compare'] = '>=';

//   // // If date order was chosen in the block settings, change to use the Event date instead of Post date
//   // if ('date' === $query['orderby']) {
//   //   $query['orderby'] = 'meta_value';
//   // }

//   return $query;
// }



// Replace :query-motor-electric search keyword for a custom taxonomy query.
add_action('pre_get_posts', function (\WP_Query $q) {

  $location =  isset($_GET['location']) ? $_GET['location'] : 'bec';
  $day =   isset($_GET['day']) ? $_GET['day'] : 'day1';

  // echo "pre gret posts running";
  if ($q->is_search() && 'session-keyword' === trim($q->get('s'))) {
    $q->set('meta_query',  array(
      'relation' => 'AND',
      array(
        'key' => 'location',
        'value' => $location,
      ),
      array(
        'key' => 'day',
        'value' =>  $day,
      ),
    ));
    // Clear search, unset search query variable or use a stop-word filter.
    $q->set('s', '');
  }





  
});
