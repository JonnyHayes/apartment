<?php
// Extending Twig, for custom filters
add_filter('get_twig', 'get_tooltip_data');
function get_tooltip_data($twig) {
  $twig->addExtension(new Twig_Extension_StringLoader());
  $twig->addFilter('beds', new Twig_SimpleFilter('beds', 'set_bedrooms'));
  $twig->addFilter('unit_num', new Twig_SimpleFilter('unit_num', 'set_unit_num'));
  $twig->addFilter('sq_ft', new Twig_SimpleFilter('sq_ft', 'set_sq_ft_abbr'));
  $twig->addFilter('currency', new Twig_SimpleFilter('currency', 'set_currency'));
  $twig->addFilter('unit_type', new Twig_SimpleFilter('unit_type', 'set_unit_type'));
  return $twig;
}
// Show number of bedrooms and bathrooms
function set_bedrooms($text) {
  // Tooltip formatting
  return ': ' . $text[0] . ' br / ' . $text[2] . ' ba';
}
// Format the unit number
function set_unit_num($text) {
  // Tooltip formatting
  return '#' . $text;
}
// Add sqare footage abbreviation
function set_sq_ft_abbr($text) {
  // Tooltip formatting
  return $text . " sq ft";
}
// Add dollar sign for unit prices
function set_currency($text) {
  // Tooltip formatting
  return "| " . $text;
}
// Set to either 'market' or 'reserved'
function set_unit_type($text) {
  if ($text) {
    return '| Market';
  } else {
    return '| Reserved';
  }
}

// Timeline dates
add_filter('get_twig', 'filter_timeline');
function filter_timeline($twig) {
  $twig->addExtension(new Twig_Extension_StringLoader());
  $twig->addFilter('timeline_date', new Twig_SimpleFilter('timeline_date', 'remove_zero'));
  return $twig;
}
// Remove leading zero from month
function remove_zero($text) {
  if ( $text[6] == '0' ) {
    $day = $text[7];
  } else {
    $day = substr($text, 6);
  }
  return $text[5] . '/' . $day;
}



// Use number of bedrooms to determine cell width size
add_filter('get_twig', 'get_number_bedrooms');
function get_number_bedrooms($twig) {
  $twig->addExtension(new Twig_Extension_StringLoader());
  $twig->addFilter('number_bedrooms', new Twig_SimpleFilter('number_bedrooms','find_number_bedrooms'));
  return $twig;
}
function find_number_bedrooms($text) {
  switch ($text[0]) {
    // One bedroom
    case '1':
      // TODO return class name for px width
      return;
      break;
    // Two bedrooms
    case '2':
      return ;
      break;
    // Three bedrooms
    case '3':
      return;
      break;
    default:
      return;
      break;
  }
}

// Note - these filters are from filtering listings proof of concept.
// Replace underscores with spaces
add_filter('get_twig', 'convert_underscores_to_spaces');
function convert_underscores_to_spaces($twig) {
  $twig->addExtension(new Twig_Extension_StringLoader());
  $twig->addFilter('spaces', new Twig_Filter_Function('replace_underscores'));
  return $twig;
}
function replace_underscores($text) {
  return preg_replace("/(_)/", " ", $text);
}

// Set image url path for listing images
add_filter('get_twig', 'set_img_url');
function set_img_url($twig) {
  $twig->addExtension(new Twig_Extension_StringLoader());
  $twig->addFilter('floor_plan_url', new Twig_Filter_Function('get_floor_plan_url'));
  $twig->addFilter('view_url', new Twig_Filter_Function('get_view_url'));
  return $twig;
}
// Filter to get image url path for floor plans
function get_floor_plan_url($text) {
  return get_stylesheet_directory_uri() . "/img/optimized/" . $text . "_floor_plan.jpg";
}
// Filter to get image url path for views
function get_view_url($text) {
  return get_stylesheet_directory_uri() . "/img/optimized/" . $text . "-sample.jpg";
}
