<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box}

.mySlidesss {display: none}


/* mise en forme de la couleur des icones*/
.iconetoggle{
      color:#0092da;
}
/* Next & previous buttons */
.item{
            margin-left: 7vw;
            border-radius:50%;
            /* margin-rigth:10vw; */
}

.item-icone-text{
  margin-top:-5px;
}
.slideshow-container{

    display: none;
    position: fixed;
    top:0;
    left: 0;
    background-color:#f8f9f9;
    width: 100%; 
}
@media all  and (min-width:0px) and (max-width:700px){
        .slideshow-container{
            display: block;
         
        }
        .prev{
            margin-right: 15vw !important;
            margin-top:-50vw;
        }
}
.prev, .next {
  cursor: pointer;
  position: absolute;
  /* top: 50%; */
  width: auto;
    padding: 16px;
 
    color: #0092da;
    font-weight: bold;
    font-size: 18px;
    transition: 0.6s ease;
    border-radius: 0 3px 3px 0;
    user-select: none;
   
    

    }
    .prev{
        margin-top:-70px;
        /* margin-left:-50vw !important; */
        
    }

    .next{
    
    margin-top:-70px;
    right: 0;
    border-radius: 3px 0 0 3px;
    margin-left: -45vw !important;
 
}


.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

body{
  padding-top: 100px;
}

/* Fading animation */

img{
    height: 50px;
    
}
@-webkit-keyframes fade {
  /* from {opacity: .4} 
  to {opacity: 1} */
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}
/* .conteinerr{
  margin-right:15px;
} */

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}

@media all and (min-width:601px) and (max-width:700px){
            .slideshow-container{
                    margin-top: -850px !important;
            }
}
@media all and (min-width:0px) and (max-width:359px){
        
        .items{
          margin-left:20vw !important;
        }
        .iconetoggle{
          margin-left:1vw;
        }
}
@media all and (min-width:360px) and (max-width:399px){
      .iconetoggle{
          margin-left:2vw;
      }
}
@media all and (min-width:400px) and (max-width:600px){
      .iconetoggle{
          margin-left:5.5vw;
      }
}
/* @media all and (min-width:400px) and (max-width:600px){
        .items{
          margin-left:vw;
        }   
} */
</style>
</head>
<body>

<div id="pp" class="slideshow-container" style="margin-top: 108px;">

<div class="mySlidesss">
                <div class="conteinerr " style="display: flex; margin-right: 40px;">
                            <div class="item col">
                              <center>
                                <a href="<?= base_url('category/1') ?>">
                                  <i class="fa fa-mobile iconetoggle" style="font-size:24px;color:#0092da"></i>
                                </a>
                                  <p class="item-icone-text" style="font-size:10px;">
                                  <?php  
                                    if ($_SESSION['site_lang'] == 'french') {
                                      echo "Phones et tablettes";
                                    }
                                    else{
                                      echo "Phone and tablets";
                                    }
                                  ?>
                                </p>
                              </center>

                           </div>
                           
                           <div class="item col">
                            <center>
                              <a href="<?= base_url('category/2') ?>">
                               <i class="fa fa-desktop iconetoggle" style="font-size:24px;color:#0092da;"></i>
                             </a>
                             <p class="item-icone-text" style="font-size:10px;">
                                <?php  
                                    if ($_SESSION['site_lang'] == 'french') {
                                      echo "Informatique et média";
                                    }
                                    else{
                                      echo "Informatic and media";
                                    }
                                  ?>
                              </p>
                            </center>
                           </div>
                           <div class="item col">
                                <center>
                                  <a href="<?= base_url('category/3') ?>">
                                     <i class="fa fa-car iconetoggle" style="font-size:24px;color:#0092da;"></i>
                                   </a>
                                   <p class="item-icone-text" style="font-size:10px;">
                                      <?php  
                                    if ($_SESSION['site_lang'] == 'french') {
                                      echo "Véhicules";
                                    }
                                    else{
                                      echo 'Vehicles';
                                    }
                                  ?>
                                   </p>
                                </center>
                           </div>
                           <div class="item col">
                                <center>
                                  <a href="<?= base_url('category/4') ?>">
                                     <i class="fa fa-building iconetoggle" style="font-size:24px;color:#0092da;"></i>
                                   </a>
                                   <p class="item-icone-text" style="font-size:10px;">
                                      <?php  
                                    if ($_SESSION['site_lang'] == 'french') {
                                      echo "Immobilier";
                                    }
                                    else{
                                      echo "Immovable";
                                    }
                                  ?>
                                   </p>
                                </center>
                           </div>
                        
                           
                </div>
 
</div>

<div class="mySlidesss">
        
<div class="conteinerr" style="display: flex; margin-right: 40px;">
                            <div class="item col">
                              <center>
                                <a href="<?= base_url('category/5') ?>">
                                  <i class="fa fa-male" style="font-size:24px;color:#0092da;"></i>
                                </a>
                                <p class="item-icone-text" style="font-size: 10px;">
                                    <?php  
                                    if ($_SESSION['site_lang'] == 'french') {
                                      echo "Vêtements";
                                    }
                                    else{
                                      echo "Clothing";
                                    }
                                  ?>
                                </p>
                            </center>
                              </div>
                            <div class="item col">
                              <center>
                                <a href="<?= base_url('category/6') ?>">
                                  <i class="fa fa-gamepad iconetoggle" style="font-size:24px;"></i>
                                </a>
                                <p class="item-icone-text" style="font-size: 10px;">
                                    <?php  
                                    if ($_SESSION['site_lang'] == 'french') {
                                      echo "Loisir";
                                    }
                                    else{
                                      echo "Leisure";
                                    }
                                  ?>
                                </p>
                              </center>
                            </div>
                            <div class="item col">
                              <center>
                                <a href="<?= base_url('category/7') ?>">
                                      <i class="fa fa-home iconetoggle" style="font-size:24px;"></i>
                                    </a>
                                    <p class="item-icone-text" style="font-size: 10px;">
                                        <?php  
                                    if ($_SESSION['site_lang'] == 'french') {
                                      echo "Maison";
                                    }
                                    else{
                                      echo "House";
                                    }
                                  ?>
                                    </p>
                              </center>
                            </div>
                            <div class="item col">
                              <center>
                                <a href="<?= base_url('category/8') ?>">
                                    <i class="fa fa-briefcase iconetoggle" style="font-size:24px;"></i>
                                   </a>
                                   <p class="item-icone-text" style="font-size: 10px;">
                                        <?php  
                                    if ($_SESSION['site_lang'] == 'french') {
                                      echo "Emploi et Formation";
                                    }
                                    else{
                                      echo "Work and formations";
                                    }
                                  ?>
                                   </p>
                              </center>    
                           </div>
                         
                </div>
  
</div>

<div class="mySlidesss">
 
<div class="conteinerr" style="display: flex; margin-right: 40px;">
                            <div class="item col">
                              <center>
                                <a href="<?= base_url('category/9') ?>">
                            <i class="fa fa-hdd-o iconetoggle" style="font-size:24px"></i>
                          </a>
                            <p class="item-icone-text" style="font-size: 10px;">
                                  <?php  
                                    if ($_SESSION['site_lang'] == 'french') {
                                      echo "Service et entreprise";
                                    }
                                    else{
                                      echo "Service and enterprise";
                                    }
                                  ?>
                            </p>
                    </center>

                            </div>
                             <div class="item col">
                              <center>
                                <a href="<?= base_url('category/10') ?>">
                             <i class="fa fa-bathtub iconetoggle" style="font-size:24px"></i>
                           </a>
                             <p class="item-icone-text" style="font-size: 10px;">
                                  <?php  
                                    if ($_SESSION['site_lang'] == 'french') {
                                      echo "Beauté et bien-être";
                                    }
                                    else{
                                      echo "Beauty and well-being";
                                    }
                                  ?>
                             </p>
                          </center>
                            </div>
                            <div class="item col">
                              <center>
                                <a href="<?= base_url('category/11') ?>">
                                <i class="me-2 fa fa-book" style="font-size:24px;color:#0092da"></i>
                              </a>
                                <p class="item-icone-text" style="font-size: 10px;">
                                    <?php  
                                    if ($_SESSION['site_lang'] == 'french') {
                                      echo "Livres";
                                    }
                                    else{
                                      echo "Book";
                                    }
                                  ?>
                                </p>
                              </center>
                              </div>
                              <div class="item col">
                                <center>
                                  <a href="<?= base_url('category/12') ?>">
                                   <i class="fa fa-lemon-o iconetoggle" style="font-size:24px"></i>
                                 </a>
                                   <p class="item-icone-text" style="font-size: 10px;">
                                       <?php  
                                    if ($_SESSION['site_lang'] == 'french') {
                                      echo "Aliment";
                                    }
                                    else{
                                      echo "Aliment";
                                    }
                                  ?>
                                   </p>
                                </center>
                           </div>
                           

                </div>
 
</div>

<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>
<br>



<script>
var slideIndex = 1;
showSlidess(slideIndex);

function plusSlides(c) {
  showSlidess(slideIndex += c);
}

function currentSlide(c) {
  showSlidess(slideIndex = c);
}

function showSlidess(c) { 
  var b;
  var slides = document.getElementsByClassName("mySlidesss");
  var dots = document.getElementsByClassName("dots");
  if (c > slides.length) {slideIndex = 1}    
  if (c < 1) {slideIndex = slides.length}
  for (b = 0; b < slides.length; b++) {
      slides[b].style.display = "none";  
  }
  for (b = 0; b < dots.length; b++) {
      dots[b].className = dots[b].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>

</body>
</html> 
