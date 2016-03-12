<?php
function validate_phone($phone) {
  echo $phone;
  $phoneRe = '/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/';
  preg_match($phoneRe, $phone, $matches);
  var_dump($matches);
  return (!empty($matches));
}

function validate_email($email) {
  $emailRe = '/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/';
  preg_match($emailRe, $email, $matches);
  return (!empty($matches));
}
?>
