<?php $speakers_array = array() ?>

<?php $speakers = get_field('speakers', get_the_ID()); ?>

<?php echo 'sessionID = ' . get_the_ID() ?>


<?php foreach ($speakers as $speaker) : ?>
  <?php
  $speakerId = $speaker->ID;
  $speakerId = $speaker->ID;
  if (!in_array($speakerId, $speakers_array)) {
    array_push($speakers_array,  $speakerId);
  }
  ?>

<?php endforeach; ?>



<?php foreach ($speakers_array as $speaker_from_array) : ?>

  <?php
  // $speaker_from_arrayId = $speaker_from_array->ID;

  $position = get_field('position', $speaker_from_array);
  $company = get_field('company',  $speaker_from_array);

  ?>
  <p> <?php echo get_the_title($speaker_from_array); ?></p>

<?php endforeach; ?>
