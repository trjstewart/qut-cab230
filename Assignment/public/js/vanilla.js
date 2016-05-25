function checkPass()
{
    //Store the password field objects into variables ...
    var pass1 = document.getElementById('pass1');
    var pass2 = document.getElementById('pass2');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');


    //Compare the values in the password field
    //and the confirmation field
    if(pass1.value == pass2.value){
        //The passwords match.
        message.innerHTML = "";
        submit.disabled = false;

    }else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        submit.disabled = true;
        message.innerHTML = "Passwords Do Not Match!"
    }
}
