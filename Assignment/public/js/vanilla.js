function checkPass()
{
    //Store the password field objects into variables ...
    var pass1 = document.getElementById('pass1');
    var pass2 = document.getElementById('pass2');
    var message = document.getElementById('confirmMessage');
    //Compare the passwords
    if(pass1.value == pass2.value){
        //The passwords match.
        message.innerHTML = "";
        submit.disabled = false;
    }else{
        //The passwords do not match.
        submit.disabled = true;
        message.innerHTML = "Passwords Do Not Match!"
    }
}
