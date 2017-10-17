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
    if((id>=11 && id<=20) || (id>=51 && id<=60) || (id>=91 && id<=100)) {
        anchor.href="womens_footwear.php?category="+category+"&type="+type;
    }
    if(id>=21 && id<=26 || (id>=61 && id<=66) || (id>=101 && id<=106)) {
        anchor.href="mens_bags.php?category="+category+"&type="+type;
    }
    if((id>=27 && id<=32) || (id>=67 && id<=72) || (id>=107 && id<=112)) {
        anchor.href="womens_bags.php?category="+category+"&type="+type;
    }
    if(id==33 || id==113 || id==115 || id==117 || id==119) {
        anchor.href="mens_watches.php?category="+category+"&type="+type;
    }
    if(id==34 || id==114 || id==116 || id==118 || id==120) {
        anchor.href="womens_watches.php?category="+category+"&type="+type;
    }
}

function getSize(id) {
    var size = document.getElementById(id).value;
    var url = window.location.href;
    if (url.indexOf('&size=') != -1) {
        var parameter = gup( 'size' );
        var newUrl=url.replace(parameter,size);
        window.location=newUrl;
    } 
    else {
        window.location=window.location.href+"&size="+size;
    }
}
function gup(name)
{
  name = name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
  var regexS = "[\\?&]"+name+"=([^&#]*)";
  var regex = new RegExp( regexS );
  var results = regex.exec( window.location.href );
  if( results == null )
    return "";
  else
    return results[1];
}
function getpricerange(id) {
    console.log("hello");
    var anchor = document.getElementById(id);
    var url = window.location.href;
    var range=0;
    if(id=="pr1") {
        range=1;
    }else if(id=="pr2") {
        range=2;
    }else if(id=="pr3") {
        range=3;
    }else if(id=="pr4") {
        range=4;
    }else if(id=="pr5") {
        range=5;
    }
    if (url.indexOf('&range=') != -1) {
        var parameter = gup( 'range' );
        var newUrl=url.replace(parameter,range);
        anchor.href=newUrl;
    } 
    else {
        window.location=window.location.href+"&range="+range;
    }
}
function getrange() {
    var min = document.getElementById("low-price").value;
    var max = document.getElementById("high-price").value;
    var url = window.location.href;
    if ((url.indexOf('&min=') != -1) && (url.indexOf('&max=') != -1)) {
        var parameter1 = gup( 'min' );
        var parameter2 = gup( 'max' );
        var newUrl=url.replace(parameter1,min);
        console.log(newUrl);
        var finalUrl=newUrl.replace(parameter2,min);
        console.log(finalUrl);
        anchor.href=finalUrl;
    } 
    else {
        window.location=window.location.href+"&min="+min+"&max="+max;
    }
}

function getdisplaytype(id) {
    console.log("displaytype fnction k andar");
    var anchor = document.getElementById(id);
    var url = window.location.href;
    var displaytype = "";
    if (id=="dt1") {
        displaytype = "Analog";
    } else if (id=="dt2") {
        displaytype = "Digital";
    } else if (id=="dt3") {
        displaytype = "Analog-Digital";
    } else if (id=="dt4") {
        displaytype = "Touchscreen";
    }

    if (url.indexOf('&displaytype=') != -1) {
        console.log("displaytype if andar");
        var parameter = gup( 'displaytype' );
        var newUrl=url.replace(parameter,displaytype);
        anchor.href=newUrl;
    } 
    else {
        console.log("displaytype else k andar");
        window.location=window.location.href+"&displaytype="+displaytype;
    }
}
function remove_queryString() {
    var url = window.location.href; 
    if(url.indexOf("?") != -1)
        url = url.split("?")[0];
    window.location=url;
}
function add_to_cart(pid,user_id)
{
    var xhttp = new XMLHttpRequest();
    var qty=-1;
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            //alert(this.responseText);
            document.getElementById('cart_count').innerHTML=this.responseText;
            window.scrollTo(0,0);
        }
    };
    xhttp.open("POST", "add_to_cart.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("product_id="+pid+"&user_id="+user_id+"&qty="+qty);

}