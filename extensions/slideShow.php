
<style>
* {box-sizing:border-box}
body {font-family: Verdana,sans-serif;margin:0}
.mySlides {display:none}

/* Slideshow container */
.slideshow-container {
  width: 100%;
  position: relative;
  margin: auto;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: #DDDDDD;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: #333333;
}

/* Caption text */
.text {
	background-color: #333333;
	color: #DDDDDD;
	font-size: 20px;
	padding: 8px 12px;
	position: absolute;
	bottom: 5px;
	width: 100%;
	text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
	color: #333333;
	font-size: 12px;
	padding: 8px 12px;
	position: absolute;
	top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 13px;
  width: 13px;
  margin: 0 2px;
  background-color: #BBBBBB;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}
</style>

<div class="slideshow-container">

	<a class="prev" onclick="plusSlides(-1)">&#10094;</a>

	<div class="mySlides fade" align="center">
		<div class="numbertext">1 / 5</div>
		<img src="../images/SlideShow/Dog.jpg" style="height: 95%;">
		<div class="text">This is a Dog.</div>
	</div>


	<div class="mySlides fade" align="center">
		<div class="numbertext">2 / 5</div>
		<img src="../images/SlideShow/Bright Day.jpg" style="height: 95%;">
		<div class="text">These are Girls in a Bright Day.</div>
	</div>

	<div class="mySlides fade" align="center">
		<div class="numbertext">3 / 5</div>
		<img src="../images/SlideShow/Power.jpg" style="height: 95%;">
		<div class="text">This is a Power Button.</div>
	</div>

	<div class="mySlides fade" align="center">
		<div class="numbertext">4 / 5</div>
		<img src="../images/SlideShow/Chair.jpg" style="height: 95%;">
		<div class="text">This is a Chair.</div>
	</div>

	<div class="mySlides fade" align="center">
		<div class="numbertext">5 / 5</div>
		<img src="../images/SlideShow/House.jpg" style="height: 95%;">
		<div class="text">This is a House.</div>
	</div>

	<a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>

<div style="text-align:center">
	<span class="dot" onclick="currentSlide(1)"></span> 
	<span class="dot" onclick="currentSlide(2)"></span> 
	<span class="dot" onclick="currentSlide(3)"></span> 
	<span class="dot" onclick="currentSlide(4)"></span> 
	<span class="dot" onclick="currentSlide(5)"></span> 
</div>

<script type="text/javascript">
	var slideIndex = 1;
	showSlides(slideIndex);

	function plusSlides(n) {
	  showSlides(slideIndex += n);
	}

	function currentSlide(n) {
	  showSlides(slideIndex = n);
	}

	function showSlides(n) {
		var i;
		var slides = document.getElementsByClassName("mySlides");
		var dots = document.getElementsByClassName("dot");
		if (n > slides.length) {slideIndex = 1}    
		if (n < 1) {slideIndex = slides.length}
		for (i = 0; i < slides.length; i++) {
		  slides[i].style.display = "none";  
		}
		for (i = 0; i < dots.length; i++) {
		  dots[i].className = dots[i].className.replace(" active", "");
		}
		slides[slideIndex-1].style.display = "block";  
		dots[slideIndex-1].className += " active";
	}
	
	//Modification
	var x = 1;
	
	function autoSlider() {
		currentSlide(x);
		++x;
		if(x == 4)
			x = 1;
	}
	
	setInterval(autoSlider(), 1000);
	
</script>














