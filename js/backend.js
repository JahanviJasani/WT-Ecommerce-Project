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
function addURL(category,type,id) {
    var anchor = document.getElementById(id);
    if((id>=1 && id<=10) || (id>=41 && id<=50) || (id>=81 && id<=90)) {
        anchor.href="mens_footwear.php?category="+category+"&type="+type;
    }
    if(id>=11 && id<=20) {
        anchor.href="womens_footwear.php?category="+category+"&type="+type;
    }
    if(id>=21 && id<=26) {
        anchor.href="mens.php?category="+category+"&type="+type;
    }
    if(id>=27 && id<=32) {
        anchor.href="womens.php?category="+category+"&type="+type;
    }
    if(id==33) {
        anchor.href="mens.php?category="+category+"&type="+type;
    }
    if(id==34) {
        anchor.href="womens.php?category="+category+"&type="+type;
    }
}

function getSize(id) {
    //debugger
    var size = document.getElementById(id).value;
    var url = window.location.href;
    var field="size";
    console.log(url.indexOf('&' + field + '='));
    if (url.indexOf('&' + field + '=') != -1) {
        console.log("hello");
        var newUrl=url.replace(url.indexOf('&' + size + '='),size);
        window.location=newUrl;
    } 
    else {
        window.location=window.location.href+"&size="+size;
    }
}