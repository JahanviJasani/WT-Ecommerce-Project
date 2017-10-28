function getcurrpage(curr) {
    var url = window.location.href.split('?')[0];
    var fileName = url.split("/").slice(-1); 
    if(fileName=="index.php") {
        var d = document.getElementById("home_nb");
        d.classList.add("menu__item--current", "active");
    }
    else if(fileName=="about.php") {
        var d = document.getElementById("about_nb");
        d.classList.add("menu__item--current", "active");
    }
    else if(fileName=="contact.php") {
        var d = document.getElementById("contact_nb");
        d.classList.add("menu__item--current", "active");
    }
    else if(fileName=="mens_footwear.php" || fileName=="womens_footwear.php") {
        var d = document.getElementById("footwear_nb");
        d.classList.add("menu__item--current", "active");
    }
    else if(fileName=="mens_bags.php" || fileName=="womens_bags.php") {
        var d = document.getElementById("bag_nb");
        d.classList.add("menu__item--current", "active");
    }
    else if(fileName=="mens_watches.php" || fileName=="womens_watches.php") {
        var d = document.getElementById("watch_nb");
        d.classList.add("menu__item--current", "active");
    }
}
function resetvalues1() {
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
    if((id>=27 && id<=32) || (id>=67 && id<=72) || (id>=107 && id<=112) || (id>=124 && id<=126)) {
        anchor.href="womens_bags.php?category="+category+"&type="+type;
    }
    if(id==33 || id==113 || id==115 || id==117 || id==119) {
        anchor.href="mens_watches.php?category="+category+"&type="+type;
    }
    if(id==34 || id==114 || id==116 || id==118 || id==120) {
        anchor.href="womens_watches.php?category="+category+"&type="+type;
    }
    if(id=="all_mb1" || id=="all_mb2"){
        anchor.href="mens_bags.php?category="+category+"&type="+type;
    }
    if(id=="all_wb1" || id=="all_wb2"){
        anchor.href="womens_bags.php?category="+category+"&type="+type;
    }
    if(id=="all_mf1" || id=="all_mf2"){
        anchor.href="mens_footwear.php?category="+category+"&type="+type;
    }
    if(id=="all_wf1" || id=="all_wf2"){
        anchor.href="womens_footwear.php?category="+category+"&type="+type;
    }
    if(id=="all_mw1" || id=="all_mw2"){
        anchor.href="mens_watches.php?category="+category+"&type="+type;
    }
    if(id=="all_ww1" || id=="all_ww2"){
        anchor.href="mens_watches.php?category="+category+"&type="+type;
    }
}

function getSize(id) {
    var size = document.getElementById(id).value;
    var url = window.location.href;
    if (url.indexOf('&size=') != -1) {
        var parameter = gup( 'size' );
        var newUrl=url.replace(parameter,size);
        console.log(parameter);
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
    var anchor = document.getElementById(id);
    var url = window.location.href;
    if (url.indexOf('&range=') != -1) {
        var parameter = gup( 'range' );
        console.log(parameter);
        var newUrl=url.replace(parameter,id);
        anchor.href=newUrl;
    } 
    else {
        window.location=window.location.href+"&range="+id;
    }
}
function getdiscount(id,disc) {
    var anchor = document.getElementById(id);
    var url = window.location.href;
    var disrange=disc;
    if (url.indexOf('&disc_range=') != -1) {
        var parameter = gup( 'disc_range' );
        var newUrl=url.replace(parameter,disrange);
        anchor.href=newUrl;
    } 
    else {
        window.location=window.location.href+"&disc_range="+disrange;
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
        var finalUrl=newUrl.replace(parameter2,min);
        anchor.href=finalUrl;
    } 
    else {
        window.location=window.location.href+"&min="+min+"&max="+max;
    }
}

function remove_queryString() {
    var url = window.location.href; 
    if(url.indexOf("?") != -1)
        url = url.split("?")[0];
    window.location=url;
}
function add_to_cart(pid,user_id,size)
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
    xhttp.send("product_id="+pid+"&user_id="+user_id+"&qty="+qty+"&size="+size);

}

function getdisplaytype(id) {
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
        var parameter = gup( 'displaytype' );
        var newUrl=url.replace(parameter,displaytype);
        anchor.href=newUrl;
    } 
    else {
        window.location=window.location.href+"&displaytype="+displaytype;
    }
}

function change_sort_order(id) {
    var anchor = document.getElementById(id);
    var url = window.location.href;
    var sortorder = "";
    if (anchor.value=="default") {
        sortorder = "default";
    } else if (anchor.value=="name_asc") {
        sortorder = "name_asc";
    } else if (anchor.value=="name_desc") {
        sortorder = "name_desc";
    } else if (anchor.value=="price_asc") {
        sortorder = "price_asc";
    } else if (anchor.value=="price_desc") {
        sortorder = "price_desc";
    }

    if (url.indexOf('&sortorder=') != -1) {
        var parameter = gup( 'sortorder' );
        var newUrl=url.replace(parameter,sortorder);
        window.location=newUrl;
    } 
    else {
        window.location=window.location.href+"&sortorder="+sortorder;
    }
}

function showSellerPageModal() {
    var currUrl = window.location.href;
    if (currUrl.indexOf('?')>(-1)) {
        window.location=currUrl+"&sellerpage=true";
    } else {
        window.location=currUrl+"?getsellerpage=true";
    }
    
}
function removeParam(key) {
    var sourceURL = window.location.href;
    var rtn = sourceURL.split("?")[0],
        param,
        params_arr = [],
        queryString = (sourceURL.indexOf("?") !== -1) ? sourceURL.split("?")[1] : "";
    if (queryString !== "") {
        params_arr = queryString.split("&");
        for (var i = params_arr.length - 1; i >= 0; i -= 1) {
            param = params_arr[i].split("=")[0];
            if (param === key) {
                params_arr.splice(i, 1);
            }
        }
         rtn = rtn + "?" + params_arr.join("&");
    }
    window.location = rtn;
}
function gotoprod(pid) {
    window.location="single.php?pid="+pid;
}