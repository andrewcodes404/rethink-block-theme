<?php
// echo '<pre>';
// print_r($block);
// echo '</pre>';

// Create class attribute allowing for custom "className"
$class_name = 'rt-icon-banner-wrapper alignfull';
if (!empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}

// Add any ACF generated classes
if (get_field('remove_margin_bottom') === true) {
  $class_name .= ' rt-icon-banner-wrapper--no-margin-bottom';
}

// "icon-C02",
// "icon-city",
// "icon-community",
// "icon-company",
// "icon-donation",
// "icon-email",
// "icon-followers",
// "icon-national",
// "icon-partners",
// "icon-planet",
// "icon-regional",
// "icon-solutions",
// "icon-speakers",
// "icon-themed-theatres",
// "icon-total",
// "icon-trees",
// "icon-website",
// "icon-workshops"

$icons_stats = array(
  array("image" => "icon-attendance", "caption" => "+6000 Attendance"),
  array("image" =>   "icon-solutions", "caption" => "+250 Solutions"),
  array("image" =>  "icon-workshops", "caption" => "48 Workshops"),
  array("image" => "icon-speakers", "caption" => "6 Global Keynotes"),
  array("image" =>  "icon-themed-theatres", "caption" => "8 Themed Theartres"),
);

$icons_themes = [
  array("image" => "icon-community", "caption" => "Community"),
  array("image" => "icon-company", "caption" => "Company"),
  array("image" => "icon-city", "caption" => "City"),
  array("image" => "icon-national", "caption" => "National"),
  array("image" => "icon-regional", "caption" => "Regional"),
  array("image" => "icon-planet", "caption" => "Planet"),
];

$type = get_field('type');
$class_name .= ' rt-icon-banner-wrapper--' . $type;

$icons = $icons_stats;
if ($type === "themes") {
  $icons = $icons_themes;
}

?>


<div class="<?php echo esc_attr($class_name); ?>">
  <div class="rt-icon-banner">
    <?php foreach ($icons  as $icon) { ?>

      <div class="rt-icon-banner__item">

        <div class="rt-icon-banner__icon">
          <img src="/wp-content/themes/rethink-block-theme/assets/src/images/icons/<?php echo $icon['image'] ?>.svg" alt="" srcset="">
        </div>

        <div class="rt-icon-banner__caption">
          <p><?php echo $icon['caption']  ?></p>
        </div>

      </div>

    <?php

    }
    ?>



  </div>


</div>