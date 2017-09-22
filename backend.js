function resetvalues1() {
    console.log("hello");
    document.getElementById("sign_in_form").reset();
}
function resetvalues2() {
    document.getElementById("sign_up_form").reset();
}
function validatePassword(){
    var password = document.getElementById("password")
    var confirm_password = document.getElementById("password2");

    if(password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}
