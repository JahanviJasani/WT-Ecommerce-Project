function selectitem(){
    var item = document.getElementById("category-dropdown");
    var itemValue = item.options[item.selectedIndex].value;
    var item2 = document.getElementById("gender-dropdown");
    var item2Value = item2.options[item2.selectedIndex].value;
    if (item2Value=="") {
        var footwear = document.getElementById("footwear-div");
        var bag = document.getElementById("bag-div");
        var watch = document.getElementById("watch-div");
        footwear.style.display="none";
        bag.style.display="none";
        watch.style.display="none";
    } else if (itemValue=="") {
        var footwear = document.getElementById("footwear-div");
        var bag = document.getElementById("bag-div");
        var watch = document.getElementById("watch-div");
        footwear.style.display="none";
        bag.style.display="none";
        watch.style.display="none";
    } else if (itemValue=="footwear" && item2Value=="men") {
        selectfootwearmen();
    } else if (itemValue=="bag" && item2Value=="men") {
        selectbagmen();
    } else if(itemValue=="watch" && item2Value=="men") {
        selectwatchmen();
    } else if (itemValue=="footwear" && item2Value=="women") {
        selectfootwearwomen();
    } else if (itemValue=="bag" && item2Value=="women") {
        selectbagwomen();
    } else if(itemValue=="watch" && item2Value=="women") {
        selectwatchwomen();
    }
}

function selectfootwearmen(){
    document.getElementById("gender-footwear").value = "men";
    var footwear = document.getElementById("footwear-div");
    var bag = document.getElementById("bag-div");
    var watch = document.getElementById("watch-div");
    var men = document.getElementById("footwear-men");
    var women = document.getElementById("footwear-women");
    var size_m = document.getElementById("size_for_men");
    var size_w = document.getElementById("size_for_women");
    men.style.display="block";
    women.style.display="none";
    men.setAttribute("required", "");
    women.removeAttribute("required", "");
    footwear.style.display="block";
    bag.style.display="none";
    watch.style.display="none";
    size_w.style.display="none";
    size_m.style.display="block";
}
function selectbagmen(){
    document.getElementById("gender-bag").value = "men";
    var footwear = document.getElementById("footwear-div");
    var bag = document.getElementById("bag-div");
    var watch = document.getElementById("watch-div");
    var men = document.getElementById("bag-men");
    var women = document.getElementById("bag-women");
    men.style.display="block";
    women.style.display="none";
    men.setAttribute("required", "");
    women.removeAttribute("required", "");
    footwear.style.display="none";
    bag.style.display="block";
    watch.style.display="none";
}
function selectwatchmen(){
    document.getElementById("gender-watch").value = "men";
    var footwear = document.getElementById("footwear-div");
    var bag = document.getElementById("bag-div");
    var watch = document.getElementById("watch-div");
    footwear.style.display="none";
    bag.style.display="none";
    watch.style.display="block";
}
function selectfootwearwomen(){
    document.getElementById("gender-footwear").value = "women";
    var footwear = document.getElementById("footwear-div");
    var bag = document.getElementById("bag-div");
    var watch = document.getElementById("watch-div");
    var men = document.getElementById("footwear-men");
    var women = document.getElementById("footwear-women");
    var size_m = document.getElementById("size_for_men");
    var size_w = document.getElementById("size_for_women");
    women.style.display="block";
    men.style.display="none";
    women.setAttribute("required", "");
    men.removeAttribute("required", "");
    footwear.style.display="block";
    bag.style.display="none";
    watch.style.display="none";
    size_m.style.display="none";
    size_w.style.display="block";
}
function selectbagwomen(){
    document.getElementById("gender-bag").value = "women";
    var footwear = document.getElementById("footwear-div");
    var bag = document.getElementById("bag-div");
    var watch = document.getElementById("watch-div");
    var men = document.getElementById("bag-men");
    var women = document.getElementById("bag-women");
    women.style.display="block";
    men.style.display="none";
    women.setAttribute("required", "");
    men.removeAttribute("required", "");
    footwear.style.display="none";
    bag.style.display="block";
    watch.style.display="none";
}
function selectwatchwomen(){
    document.getElementById("gender-watch").value = "women";
    var footwear = document.getElementById("footwear-div");
    var bag = document.getElementById("bag-div");
    var watch = document.getElementById("watch-div");
    footwear.style.display="none";
    bag.style.display="none";
    watch.style.display="block";
}
function deleteitems(){
    document.getElementById("before_delete").style.display="none";
    document.getElementById("after_delete").style.display="block";
    document.getElementById("hidediv").style.display="none";
    document.getElementById("button_delete").style.display="block";
}
function deletiondone(){
    document.getElementById("button_delete").style.display="none";
    document.getElementById("hidediv").style.display="block";
}
function checkbox_validate() {
    if(size3w.checked==1) {
        document.getElementById("stock_size3w").style.display="inline-block";
    } else {
        document.getElementById("stock_size3w").style.display="none";
    }
    if(size4w.checked==1) {
        document.getElementById("stock_size4w").style.display="inline-block";
    } else {
        document.getElementById("stock_size4w").style.display="none";
    }
    if(size5w.checked==1) {
        document.getElementById("stock_size5w").style.display="inline-block";
    } else {
        document.getElementById("stock_size5w").style.display="none";
    }
    if(size6w.checked==1) {
        document.getElementById("stock_size6w").style.display="inline-block";
    } else {
        document.getElementById("stock_size6w").style.display="none";
    }
    if(size7w.checked==1) {
        document.getElementById("stock_size7w").style.display="inline-block";
    } else {
        document.getElementById("stock_size7w").style.display="none";
    }
    if(size8w.checked==1) {
        document.getElementById("stock_size8w").style.display="inline-block";
    } else {
        document.getElementById("stock_size8w").style.display="none";
    }
    if(size6m.checked==1) {
        document.getElementById("stock_size6m").style.display="inline-block";
    } else {
        document.getElementById("stock_size6m").style.display="none";
    }
    if(size7m.checked==1) {
        document.getElementById("stock_size7m").style.display="inline-block";
    } else {
        document.getElementById("stock_size7m").style.display="none";
    }
    if(size8m.checked==1) {
        document.getElementById("stock_size8m").style.display="inline-block";
    } else {
        document.getElementById("stock_size8m").style.display="none";
    }
    if(size9m.checked==1) {
        document.getElementById("stock_size9m").style.display="inline-block";
    } else {
        document.getElementById("stock_size9m").style.display="none";
    }
    if(size10m.checked==1) {
        document.getElementById("stock_size10m").style.display="inline-block";
    } else {
        document.getElementById("stock_size10m").style.display="none";
    }
    if(size11m.checked==1) {
        document.getElementById("stock_size11m").style.display="inline-block";
    } else {
        document.getElementById("stock_size11m").style.display="none";
    }
    if(size12m.checked==1) {
        document.getElementById("stock_size12m").style.display="inline-block";
    } else {
        document.getElementById("stock_size12m").style.display="none";
    }
}
function select_link() {
    var gender = document.getElementById("gender-footwear").value;
    if(gender=="men") {
        gender_select.href="images/mens.png"
    } else if (gender=="women") {
        gender_select.href="images/womens.png"
    }
}
function additems() {
    console.log("Hello");
    window.location="http://localhost/WT-Ecommerce-Project/addproduct.php"
}
function prevpage() {
    window.location="http://localhost/WT-Ecommerce-Project/seller_products.php"
}