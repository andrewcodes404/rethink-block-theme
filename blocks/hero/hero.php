<?php
// echo '<pre>';
// print_r($block);
// echo '</pre>';

// Create class attribute allowing for custom "className"
$class_name = 'rt-hero-wrapper alignfull';
if (!empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}

// Add any ACF generated classes
if (get_field('remove_margin_bottom') === true) {
  $class_name .= ' rt-hero-wrapper--no-margin-bottom';
}


// Load values and assign defaults.
$title_line1             = get_field('title_line_1');
$title_line2             = get_field('title_line_2');
$title_line3             = get_field('title_line_3');
$title_line4             = get_field('title_line_4');
$subtitle          = get_field('subtitle');
$link              = get_field('link');
$bg_image             = get_field('background_image');
$bg_image_mobile = get_field('background_image_mobile');
$button_type =       'rt-hero__button';
$caption = get_field('caption');
$video = get_field('video');

if ($link) {
  $link_url = $link['url'];
  $link_title = $link['title'];
  $link_target = $link['target'] ? $link['target'] : '_self';
}

if (!$bg_image) {
  $class_name .= ' rt-hero--no-image';
  $button_type = 'rt-hero__button--white';
}

if (get_field('background_image_mobile')) {
  $class_name .= ' rt-hero--has-mobile-bg';
}

?>


<div class="<?php echo esc_attr($class_name); ?>">


  <div class="rt-hero">




    <?php if ($bg_image) : ?>


      <?php if ($caption) : ?>
        <div class="rt-hero__caption">
          <span><?php echo $caption ?> </span>
        </div>
      <?php endif ?>


      <div class="rt-hero__bg-image rt-hero__bg-image--desktop<?php echo get_field('dark_filter') ? ' rt-hero__bg-image--darken' : "" ?>">
        <?php echo wp_get_attachment_image($bg_image, 'full'); ?>

        <?php if ($caption) : ?>
          <div class="rt-hero__caption ">
            <span><?php echo $caption ?> </span>
          </div>
        <?php endif ?>
      </div>

    <?php endif ?>

    <?php if ($bg_image_mobile) : ?>
      <div class="rt-hero__bg-image rt-hero__bg-image--mobile <?php echo get_field('dark_filter') ? 'rt-hero__bg-image--darken' : "" ?>">

        <div class="rt-hero__homepage-text">
          <span class="rt-hero__homepage-text-strapline">HONG KONG'S BEST ATTENDED AND MOST AMBITIOUS BUSINESS EVENT FOR SUSTAINABLE DEVELOPMENT</span>
          <span class="rt-hero__homepage-text-tag">#OnlyWayForward</span>
        </div>
        <?php echo wp_get_attachment_image($bg_image_mobile, 'full'); ?>


      </div>

    <?php endif ?>


    <?php if ($video) : ?>

      <div class="rt-hero__bg-video" id="js-hero-video">
        <video autoplay muted loop>
          <source src="<?php echo $video ?>">
        </video>
      </div>

    <?php endif ?>






    <div class="rt-hero__content">
      <h1 class="rt-hero__title rt-hero__title--desktop">
        <?php if ($title_line1) : ?>
          <span><?php echo esc_html($title_line1); ?></span> <br />
        <?php endif ?>

        <?php if ($title_line2) : ?>
          <span><?php echo esc_html($title_line2); ?></span> <br />
        <?php endif ?>

        <?php if ($title_line3) : ?>
          <span><?php echo esc_html($title_line3); ?></span> <br />
        <?php endif ?>

        <?php if ($title_line4) : ?>
          <span><?php echo esc_html($title_line4); ?></span> <br />
        <?php endif ?>
      </h1>


      <h1 class="rt-hero__title rt-hero__title--mobile">

        <?php if ($title_line1) : ?>
          <?php echo esc_html($title_line1); ?>
        <?php endif ?>

        <?php if ($title_line2) : ?>
          <?php echo esc_html($title_line2); ?>
        <?php endif ?>

        <?php if ($title_line3) : ?>
          <?php echo esc_html($title_line3); ?>
        <?php endif ?>

        <?php if ($title_line4) : ?>
          <?php echo esc_html($title_line4); ?>
        <?php endif ?>

      </h1>

      <?php if ($subtitle) : ?>
        <h2 class="rt-hero__subtitle">
          <span><?php echo esc_html($subtitle); ?></span>
        </h2>

      <?php endif ?>
      <?php if ($link) : ?>
        <div class=" <?php echo $button_type ?> ">
          <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?>
          </a>
        </div>
      <?php endif; ?>
    </div>

  </div>
</div>