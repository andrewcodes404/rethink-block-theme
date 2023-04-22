<?php

$loction_array = array(
  array("susTrans", "Sustainable Transformation Theatre", 'location-active'),
  array("bec", "BEC Sustainable Business Theatre", ''),
  array("susPart", "Sustainable Partnerships Theatre", ''),
  array("susRes", "Sustainable Resources Theatre", ''),
  array("susCom", "Sustainable Communities Theatre", ''),
  array("change", "Change Makers Stage", ''),
  array("futureLeaders", "Future Leaders Stage", ''),
);
?>

<div class="content-layout">

  <div id="t-speaker__filters-wrapper" class="t-speaker__filters-wrapper">
    <div class="t-speaker__filters t-speaker__filters--day">

      <label for="day1" class="t-speaker__filter t-speaker__filter--day t-speaker__filter--day-active">
        <input class="speakerfilters__day" type="radio" id="day1" name="day" value="day1">Day 1
      </label>

      <label for="day2" class="t-speaker__filter t-speaker__filter--day">
        <input class="speakerfilters__day" type="radio" id="day2" name="day" value="day2"> Day 2
      </label>

    </div>

    <div class="t-speaker__filters t-speaker__filters--location">
      <?php foreach ($loction_array as $key => $location) : ?>

        <label for="<?php echo $location['0'] ?>" class="t-speaker__filter t-speaker__filter--location t-speaker__filter--<?php echo $location['0'] ?> t-speaker__filter--<?php echo $location['2'] ?>">
          <input class="speakerfilters__location" type="radio" id="<?php echo $location['0'] ?>" name="location" value="<?php echo $location['0'] ?>">
          <?php echo $location['1'] ?>
        </label>

      <?php endforeach; ?>

    </div>

  </div>
</div>
