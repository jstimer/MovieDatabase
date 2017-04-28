<?php require "movie_db.inc";

	StartHTML( "Movie Database" );
	
	HTMLHeader();
	
	HTMLNav();
	
	?>
		
		
		
		<!-- webpage info should go here-->


		

<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing:border-box}
body {font-family: Verdana,sans-serif;margin:0}
.mySlides {display:none}



/* Slideshow container */
.slideshow-container {
  max-width: 500px;
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
  color: white;
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
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: left;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor:pointer;
  height: 13px;
  width: 13px;
  margin: 0 2px;
  background-color: #bbb;
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

<div class="body">
<p><b> Top videos this week! </b></p>

<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="images/kongpbanner3.jpg "width="500px" height ="200px">
  <div class="text"></div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="images/darkknight.jpg "width="500px" height ="200">
  <div class="text"></div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="images/sausageparty.jpg "width="500px" height ="200">
  <div class="text"></div>
</div>

<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>

<script>
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
</script>
<!-- Top Rated Movies -->
<p><b>Top Rated Movies</b></p>

<p>
 <a href="http://10.1.2.2/~kap7849/Comp305/MovieDatabase-talonbrdng-NewMaster/single.php?filmName=881661">
<img border="0" alt="W3Schools" src="images/guardians.jpg" width="100" height="100">
</a>

 <a href="http://10.1.2.2/~kap7849/Comp305/MovieDatabase-talonbrdng-NewMaster/single.php?filmName=881641">
<img border="0" alt="W3Schools" src="images/40yr.jpg" width="100" height="100">
</a>

 <a href="http://10.1.2.2/~kap7849/Comp305/MovieDatabase-talonbrdng-NewMaster/single.php?filmName=881616">
<img border="0" alt="W3Schools" src="images/2fast.jpg" width="100" height="100">
</a>

 <a href="http://10.1.2.2/~kap7849/Comp305/MovieDatabase-talonbrdng-NewMaster/single.php?filmName=881617">
<img border="0" alt="W3Schools" src="images/back2.jpg" width="100" height="100">
</a>

 <a href="http://10.1.2.2/~kap7849/Comp305/MovieDatabase-talonbrdng-NewMaster/single.php?filmName=881652">
<img border="0" alt="W3Schools" src="images/knocked.jpg" width="100" height="100">
</a>
			<!-- Welcome message -->
<p><b>Welcome to our Movie Website! Enjoy free trailers and information about<br> 
new movies, older movies or even movies that haven't been shown yet! </b></p>


<!-- hover images -->
<style>
.container {
  position: relative;
  width: 50%;
  white-space: nowrap;
}

.image {
  display: block;
  width: 500px;
  height: auto;
  
}

.overlay {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  height: 100%;
  width: 500px;
  opacity: 0;
  transition: .5s ease;
  background-color: #008CBA;
}

.container:hover .overlay {
  opacity: 1;
}

.text {
  color: white;
  font-size: 20px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
}



</style>
</head>
<body>


<p><b>Upcoming Movies!</b></p>

<div class="container">
  <img src="images/transformers.jpg" alt="Avatar" class="image">
  <div class="overlay">
    <div class="text">Release Date: June 23, 2017</div>
  </div>
  </div>

<p>
 Humans and Transformers are at war, Optimus Prime is gone.<br>
 The key to saving our future lies buried in the secrets of the past,<br> 
 in the hidden history of Transformers on Earth.
  </p>

<div class="container">
  <img src="images/mummy.jpg" alt="Avatar" class="image">
  <div class="overlay">
    <div class="text">Release Date: June 9, 2017</div>
  </div>
</div>

<p>An ancient princess is awakened from her crypt beneath the desert,<br>
 bringing with her malevolence grown over millennia, and terrors that<br>
  defy human comprehension.
</p>

<div class="container">
  <img src="images/despicable.jpg" alt="Avatar" class="image">
  <div class="overlay">
    <div class="text">Release Date: June 30, 2017</div>
  </div>
</div>

<p>Gru meets his twin brother Dru he never knew about.</p>

<div class="container">
  <img src="images/spider.jpg" alt="Avatar" class="image">
  <div class="overlay">
    <div class="text">Release Date: July 5, 2017</div>
  </div>
</div>

<p>Following the events of Captain America: Civil War (2016),<br> 
Peter Parker attempts to balance his life in high school with his<br>
 career as the web-slinging superhero Spider-Man.

</body>





<?php	
		HTMLFooter();
?>