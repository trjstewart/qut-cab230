function validate() {
  CheckName();
  PasswordCheck();
}

function CheckName() {
  var surname = document.forms.namedItem("registration").elements.namedItem("surname").value;
  var surnameMissing = document.getElementById("surnameMissing");
  if (surname == "") { surnameMissing.style.visibility = "visible"; }
  else { surnameMissing.style.visibility = "hidden"; }
}

function PasswordCheck() {
  var password = document.forms.namedItem("registration").elements.namedItem("password").value;
  var repassword = document.forms.namedItem("registration").elements.namedItem("repassword").value;
  var passwordMissmatch = document.getElementById("PasswordMissmatch");

  console.log(password + ' and ' + repassword);

  if (password != repassword || password == "") { passwordMissmatch.style.visibility = "visible"; }
  else { passwordMissmatch.style.visibility = "hidden"; }
}
