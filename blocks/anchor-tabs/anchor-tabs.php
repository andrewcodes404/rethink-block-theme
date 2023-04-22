<?php

// Create class attribute allowing for custom "className"
$class_name = 'rt-tabs-wrapper-wrapper alignfull margin-block-start-0';
if (!empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}

// Add any ACF generated classes
$margin_top = get_field('remove_margin_top');
if ($margin_top) {
  $class_name .= ' margin-block-start-0';
}

// Look for wp block styles and add them inline
$style = '';

// Check for padding
if (!empty($block['style']['spacing']['padding']['top'])) {
  $pt = $block['style']['spacing']['padding']['top'];
  $pt = 'padding-top: var(--wp--preset--spacing--' . substr($pt, -2) . ');';
  $style .=  $pt;
}

if (!empty($block['style']['spacing']['padding']['bottom'])) {
  $pb = $block['style']['spacing']['padding']['bottom'];
  $pb = 'padding-bottom: var(--wp--preset--spacing--' . substr($pb, -2) . ');';
  $style .=  $pb;
}

// Check for background-color
if (!empty($block['backgroundColor'])) {
  $background_color = $block['backgroundColor'];
  $style .= 'background-color: var(--wp--preset--color--' . $block['backgroundColor']  . ');';
}

$tabs = get_field('tabs');
?>
<div class="<?php echo esc_attr($class_name); ?>" style="<?php echo esc_attr($style) ?>">
  <div class="rt-tabs-wrapper">
    <div class="rt-tabs">
      <?php foreach ($tabs as $tab) : ?>
        <a href="#<?php echo $tab['anchor_link'] ?>" class="rt-tab">
          <?php echo $tab['label'] ?>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
</div>