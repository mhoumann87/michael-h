<?php

//* Display errors on the page
function display_errors($errors = array())
{
  $output = '';

  if (!empty($errors)) {
    $output .= '<div class="errors">';
    $output .= '<p>Please fix  the following errors:</p>';
    $output .= '<ul>';
    foreach ($errors as $error) {
      $output .= '<li>'.h($error).'</li>';
    }
    $output .= '</ul>';
    $output .= '</div>';
  }

  return $output;
}