function validatePhoneNumber(phoneNumber) {
  // http://stackoverflow.com/questions/18375929/validate-phone-number-using-javascript
  var phoneRe = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
  return !!phoneNumber.match(phoneRe);
}

function validateEmailAddress(emailAddress) {
  // http://stackoverflow.com/questions/46155/validate-email-address-in-javascript
  var emailRe = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return !!emailAddress.match(emailRe);
}
