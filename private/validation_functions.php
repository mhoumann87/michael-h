<?php

/*================================================
 * is_blank('string')
 * - validate data presence
 * - uses trim() so empty spaces doesn't count
 * - uses '===' to avoid false positives
 * - better than empty() which consider "0" to be empty
================================================*/
function is_blank($value)
{
  return !isset($value) || trim($value) === '';
}