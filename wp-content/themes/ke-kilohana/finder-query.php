<?php
// Get floor plans, based on selected number of bedrooms
if (isset($_POST['bedroom'])) {
  // Capture selected number of bedrooms
  $bedroom = $_POST['bedroom'];

  // Define floor plans with matching number of bedrooms
  $bedroomArray = array(
    // TDOD get all the floor plans with matching number of bedrooms
    // TODO foreach loop, to iterate over posts, to build out arrays
    // look at earlier twig templating
    '1' => array('fp_1bed_a', 'fp_1bed_b', 'fp_1bed_c'),
    '2' => array('fp_2bed_a', 'fp_2bed_b', 'fp_2bed_c'),
    '3' => array('fp_3bed_a', 'fp_3bed_b', 'fp_3bed_c')
  );

  // Display floor plan images
  if ($bedroom !== 'Select') {
    // TODO use thumbnail size images
    echo '<select class="image-picker" name="floor_plans" id="floor_plans_select" data-bedroom="1">';
    foreach ($bedroomArray[$bedroom] as $value) {
      // TODO determine which data is coming from the array
      // either build out the image source
      // or filter string/text from image name
      echo "<option value='" . $value . "'>" . $value . "</option>";
      // echo "<option data-img-src=" . $value .
    }
    echo "</select>";
  }
  flush();
}

// Get floor numbers, based on selected floor group
if (isset($_POST['floorgroup'])) {
  // Caputure selected floor group
  $floorGroup = $_POST['floorgroup'];

  // Define floor numbers with matching number of floor group
  $floorGroupArray = array(
    '8' => range(8, 11),
    '14' => range(12, 17),
    '20' => range(18, 23),
    '26' => range(24, 29),
    '32' => range(30, 35),
    '38' => range(36, 39),
    '42' => range(40, 42)
  );

  // Display floor number dropdown
  if ($floorGroup !== 'Select') {
    echo '<select name="floor_number" id="floor_number_select" data-floorgroup="8">';
    foreach ($floorGroupArray[$floorGroup] as $floor) {
      echo "<option value='" . $floor . "'>" . $floor . "</option>";
    }
    echo "</select>";
  }
  flush();
}

?>
