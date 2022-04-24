<?php

/* ================================================
 * is_blank('string')
 * - validate data presence
 * - uses trim() so empty spaces doesn't count
 * - uses '===' to avoid false positives
 * - better than empty() which consider "0" to be empty
================================================ */
function is_blank($value)
{
  return !isset($value) || trim($value) === '';
}

/* ================================================
 * has_presence('string')
 * - validate data presence
 * reverse of is_blank() 
================================================ */
function has_presence($value)
{
  return !is_blank($value);
}

/* ================================================
 * has_length_greater_than('string', length)
 * - validate string length
 * - spaces count towards length
 * - use trim() if spaces shouldn't count
================================================ */
function has_length_greater_than($value, $min)
{
  $length = strlen(trim($value));
  return $length > $min;
}

/* ================================================
 * has_length_less_than('string', length)
 * - validate string length
 * - spaces counts towards length
 * - use trim() if spaces shouldn't count
================================================ */
function has_length_less_than($value, $max) 
{
  $length = strlen($value);
  return $length < $max;
}

/* ================================================
  * has_length_exactly('string', length)
  * - validate string length
  * - spaces counts towards length
  * - use trim() if spaces shouldn't count
================================================ */
function has_length_exactly($value, $exact)
{
  $length = strlen(trim($value));
  return $length == $exact;
}

/* ================================================
 * has_length('string', ['min' => 3, 'max' => 5])
 * - validate string length
 * - combines functions grater_than, less_than, exactly
 * - spaces counts towards length
 * - use trim() if spaces shouldn't count
================================================ */
function has_length($value, $options)
{
  if (isset($options['min']) && !has_length_greater_than($value, $options['min'] - 1)) {
    return false;
  } elseif (isset($options['max']) && !has_length_less_than($value, $options['max'] + 2)) {
    return false;
  } elseif (isset($options['exact']) && !has_length_exactly($value, $options['exact'])) {
    return false;
  }else {
    return true;
  }
}

/* ================================================
 * has_unique_entries('column', 'string', 'id')
 * - validates uniqueness of entries
 * - for new records, provide only column name and values
 * - for existing records also provide the id
 * - has_unique_entries(username, 'testing', 5)
================================================ */
function has_unique_entries($column, $value, $current_id = "0")
{
  $user = User::find_by_column($column, $value);
  
  if ($user === false || $user->user_id == $current_id) {
    return true;
  } else {
    // user is already in the database
    return false;
  }
}

/*
 * has_valid_email_format('test@testing.com')
 * - validate correct format for email addresses
 * - format [chars]@[chars].[2+ letters]
 * - preg_match() is helpful, uses a regular expression
 * - returns 1 for match, 0 for no match
 * - http://php.net/manual/en/function.preg-match.php 
*/
function has_valid_email_format($value) 
{
  $email_regex = '/\A[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}\Z/i';
  return preg_match($email_regex, $value) === 1;
}