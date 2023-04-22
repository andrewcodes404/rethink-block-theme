<?php
// echo '<pre>';
// print_r($block);
// echo '</pre>';

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'rt-carousel-wrapper alignfull';
if (!empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}

// Add any ACF generated classes
if (get_field('remove_margin_bottom') === true) {
  $class_name .= ' rt-carousel-wrapper--no-margin-bottom';
}


// Load values and assign defaults.
$title = get_field('title');
$carousel_items = get_field('carousel_items');
$index = get_field('index');

if ($carousel_items) : ?>
  <div class="<?php echo esc_attr($class_name); ?>">


    <div class="rt-carousel-inner">
      <?php if ($title) : ?>
        <h2> <?php echo $title ?> </h2>
      <?php endif ?>
      <div class="rt-carousel rt-carousel--all-in-one rt-carousel--all-in-one<?php echo $index ?>">

        <?php foreach ($carousel_items as $carousel_item) : ?>

          <div class="rt-carousel-item">

            <div class="rt-carousel-item__img">
              <?php
              $image = get_field('image', $carousel_item->ID);
              $size = 'carousel';
              if ($image) {
                echo wp_get_attachment_image($image, $size);
              }
              ?>
            </div>

            <?php if (get_post_type($carousel_item->ID)  === "speaker-items") : ?>
              <div class="rt-carousel-item__text">
                <p><?php echo get_the_title($carousel_item->ID); ?></p>
                <p><?php the_field('position', $carousel_item->ID); ?></p>
                <p><?php the_field('company', $carousel_item->ID); ?></p>
              </div>
            <?php endif ?>
          </div>

        <?php endforeach; ?>

      </div>
    </div>
  </div>

<?php endif; ?>