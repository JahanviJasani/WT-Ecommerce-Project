function checkPassword(){
		console.log("cutey")
		var p1 = document.getElementById("password");
		var p2 = document.getElementById("password2");
		if (p1.value !== p2.value) {
			console.log("tatti");
			p1.style.backgroundColor="red";			
		}else{
			console.log("Sahi hai");
			alert("Passwords Match!");
		}
	}