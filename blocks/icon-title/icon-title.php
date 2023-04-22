<?php

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'rt-icon-title-wrapper alignfull';
if (!empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}


// Add any ACF generated classes
if (get_field('remove_margin_bottom') === true) {
  $class_name .= ' rt-icon-title-wrapper--no-margin-bottom';
}


$style = '';
$title = get_field('title');
$color = get_field('color');
$icon = get_field('icon');

?>


<div class="<?php echo esc_attr($class_name); ?>">

  <div class="rt-icon-title rt-icon-title--<?php echo $color  ?>">
    <div class="rt-icon-title__inner">
      <div class="rt-icon-title__icon-wrapper">
        <div class="rt-icon-title__icon rt-icon-title__icon--<?php echo $color ?> rt-icon-title__icon--<?php echo $color  ?>">
          <img src="/wp-content/themes/rethink-block-theme/assets/src/images/icons/<?php echo $icon ?>.svg" alt="icon">
        </div>
      </div>

      <h4 class="rt-icon-title__text "><?php echo $title ?> </h4>

    </div>
  </div>
</div>