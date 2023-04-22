<?php
// echo '<pre>';
// print_r($block);
// echo '</pre>';

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'rt-logos-wrapper alignfull ';
if (!empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}

// Add any ACF generated classes
if (get_field('remove_margin_bottom') === true) {
  $class_name .= ' rt-logos-wrapper--no-margin-bottom';
}

// Load values and assign defaults.
$title = get_field('title');
$profiles = get_field('profiles');
$allow_pop_up = get_field('allow_pop_up');




$logo_class = "";
if ($allow_pop_up) {
  $logo_class = "rt-logo__img--allow-pop-up";
}
if ($profiles) : ?>


  <div class="<?php echo esc_attr($class_name); ?>">
    <?php if ($title) : ?>
      <h2> <?php echo $title ?> </h2>
    <?php endif ?>
    <div class="rt-logos-<?php the_field('size') ?>">
      <?php foreach ($profiles as $profile) : ?>



        <?php

        $post_id = $profile->ID;
        $post_type = get_post_type($post_id);
        $image = get_field('image', $post_id);
        $companyLogo = get_field('company_logo', $post_id);
        $title = get_the_title($post_id);
        $booth = get_field('booth', $post_id);
        $website = get_field('website', $post_id);
        $linkedin = get_field('linkedin', $post_id);
        $facebook = get_field('facebook', $post_id);
        $twitter = get_field('twitter', $post_id);
        $instagram = get_field('instagram', $post_id);
        $description = get_field("description", $post_id);
        $bio = get_field("bio", $post_id);
        $position = get_field("position", $post_id);
        $works_for_a_assoc_company = get_field("works_for_a_company",  $post_id);
        $assoc_company = get_field("sponsor_partner_company", $post_id);
        $company = get_field("company", $post_id);



        ?>

        <div class="rt-logo rt-logo-<?php the_field('size') ?> js-logo">
          <div class="rt-logo__img <?php echo $logo_class ?> ">
            <?php
            $image = get_field('image', $profile->ID);
            $size = 'large';
            if ($image) {
              echo wp_get_attachment_image($image, $size);
            }
            ?>
          </div>
        </div>

        <div class="rt-logo-modal-wrapper js-modal">

          <div class="rt-logo-modal">

            <div class="rt-logo-modal__topbar">

            </div>

            <div class="rt-logo-modal__logo">
              <?php
              $image = get_field('image', $profile->ID);
              $size = 'medium';
              if ($image) {
                echo wp_get_attachment_image($image, $size);
              }
              ?>
            </div>

            <div class="rt-logo-modal__content">

              <div class="rt-logo-modal__header">

                <div class="rt-logo-modal__header-title">
                  <h3><?php echo $title ?> </h3>

                  <?php if ($booth) : ?>
                    <h3>Booth <?php echo $booth ?> </h3>
                  <?php endif ?>
                </div>
                <div class="rt-logo-modal__header-socials">

                  <?php if ($website) : ?>
                    <a href="<?php echo  $website ?>" target="_blank" class="rt-logo-modal__header-social rt-logo-modal__header-social--website"></a>
                  <?php endif ?>

                  <?php if ($linkedin) : ?>
                    <a href="<?php echo  $linkedin ?>" target="_blank" class="rt-logo-modal__header-social rt-logo-modal__header-social--linkedin"></a>
                  <?php endif ?>

                  <?php if ($facebook) : ?>
                    <a href="<?php echo  $facebook ?>" target="_blank" class="rt-logo-modal__header-social rt-logo-modal__header-social--facebook"></a>
                  <?php endif ?>

                  <?php if ($instagram) : ?>
                    <a href="<?php echo  $instagram ?>" target="_blank" class="rt-logo-modal__header-social rt-logo-modal__header-social--instagram"></a>
                  <?php endif ?>

                  <?php if ($twitter) : ?>
                    <a href="<?php echo  $twitter ?>" target="_blank" class="rt-logo-modal__header-social rt-logo-modal__header-social--twitter"></a>
                  <?php endif ?>


                </div>
              </div>

              <div class="rt-logo-modal__desc">
                <?php echo $description ?>
              </div>
            </div>


          </div>

        </div>

      <?php endforeach; ?>
    </div>
  </div>
<?php endif; ?>