<?php
function validate_phone($phone) {
  $phoneRe = '/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}\$/';
  $match = preg_match($phoneRe, $phone);
  return ($match === 1);
}

function validate_email($email) {
  $emailRe = '/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))\$/';
  $match = preg_match($emailRe, $email);
  return ($match === 1);
}
?>
