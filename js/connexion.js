let guide = 0

let logo = document.getElementById("img1")
let fille2 = document.getElementById("img2")
let fille3 = document.getElementById("img3")
let point1 = document.querySelector(".left_side ul li:nth-child(1)")
let point2 = document.querySelector(".left_side ul li:nth-child(2)")
let point3 = document.querySelector(".left_side ul li:nth-child(3)")




function supprimer() {
	let objets = [logo, fille2, fille3, point1, point2, point3]

	for(let i =0; i<objets.length ; i++) {
		objets[i].removeAttribute("class")
	}
}

function caroussel() {
	if(guide == 0) {
		supprimer()
		logo.classList.add("premiere_position")
		fille2.classList.add("deuxieme_position")
		fille3.classList.add("troisieme_position")

		point1.classList.add("img_active")


		guide = 1
	} else if(guide == 1) {
		supprimer()
		logo.classList.add("troisieme_position")
		fille2.classList.add("premiere_position")
		fille3.classList.add("deuxieme_position")

		point2.classList.add("img_active")


		guide = 2
	} else {
		supprimer()
		logo.classList.add("deuxieme_position")
		fille2.classList.add("troisieme_position")
		fille3.classList.add("premiere_position")

		point3.classList.add("img_active")

		guide = 0
	}
}


setInterval(caroussel, 5000)

point1.onclick = function() {guide = 0;	caroussel();}
point2.onclick = function() {guide = 1;	caroussel();}
point3.onclick = function() {guide = 2;	caroussel();}