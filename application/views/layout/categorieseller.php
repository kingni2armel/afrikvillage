
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!--script>
var x = 0;
$(document).ready(function(){
  $("div").scroll(function(){
    $("span").text( x+= 1);
  });
});
</script-->
</head>
<body>


<h3 style="text-align:center;margin-top:-35px;">Articles publiés</h3>
      <div class="conteinrg" style="display:flex;justify-content:center;">
      <div class="sc" style="border:1px solid black;height:300px;overflow:scroll;">
<table>
  <tr>
    <th>Image</th>
    <th>Article</th>
    <th>Prix</th>
    <th>Date de publication</th> 
    <th></th>
  </tr>
  <tr>
<?php 
foreach ($shopArticles as $row) {
  
?>
  <tr>
    <td><img src="<?php if($row->type_a == 'service'){ echo base_url('/_seller_datas_/'.$row->id_seller.'/_publication/_service/'.$row->name_image ); }else{echo base_url('/_seller_datas_/'.$shopInfo->id_seller.'/_publication/_product/'.$row->name_image );} ?>" alt=""></td>
    <td><?= $row->name_article?></td>
    <td><?= $row->price ?></td>
    <td><?= $row->date_publication ?></td>
    <td><a href="<?= base_url('publication/more/'.$row->id_article)?>">Voir l'article</a></td>
 
<?php
}
?>
  </tr>
</table>
</div>
<div>

</div>
      </div>

<div class="lo" style="height:25px;"></div>
<style>
table, th , td{
  border:1px solid black;
  border-collapse:collapse;
}
th, td{
  padding:15px;
}
th{
  background-color:#0092da;
  color:white;
}

@media all and (min-width:0px)  and (max-width:400px){
      .sc{
        width:300px !important;
      }
      .conteinrg{
        justify-content:flex-start !important;
        margin-left:10vw;
      }
}
@media all and (min-width:401px)  and (max-width:600px){
      .sc{
        width:300px !important;
      }
      .conteinrg{
        justify-content:flex-start !important;
        margin-left:20vw;
      }
}
@media all and (min-width:700px)  and (max-width:50000000px){
        .sc{
          width:70vw!important;
          height:400px !important;
        }
        table{
           
            width: 70vw !important

        }
}
</style>
</head>
<body>










<script>
var slideIndexy= 1;
showSlides(slideIndexy);

function plusSlidesc(n) {
  showSlides(slideIndexy += n);
}

function currentSlide(n) {
  showSlides(slideIndexy = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlidesz");
  var dob = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndexy = 1}    
  if (n < 1) {slideIndexy = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dob.length; i++) {
      dob[i].className = dob[i].className.replace(" active", "");
  }
  slides[slideIndexy-1].style.display = "block";  
  dob[slideIndexy-1].className += " active";
}
</script>

</body>
</html> 
