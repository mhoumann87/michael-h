<?php

// Prevent this code from being loaded ub the browser
// without first setting the necessary object
if (!isset($user)) {
  redirect_to(url_for('/admin/users/index.php'));
}

