<!DOCTYPE html>
<html lang="en">
<head>
  <?php include_once('layout/lien_css.html'); ?>
  <?php include_once('layout/lien_js.html');?>
  <!-- <link rel="stylesheet" href="<?php echo base_url('../../assets/css/home.css');?>"> -->

  <title>Home</title>
</head>

<body>   

   <?php
   if(isset($_SESSION['msg']))
   {
       echo '<div class="alert alert-warning" role="alert">'.$_SESSION['msg'].'</div>';
       unset($_SESSION['msg']);
   }
    /* vue qui contient le slide des images */
   $this->load->view('layout/slide');
   ?>
   <div class="slogan-items" style="margin-top:25px;">
                    
    <?php  $this->load->view('layout/slogan');?>
</div>
   <?php $this->load->view('layout/homephone')?>
   


  <div class="info_parent homeshow" style="margin-top: -1550px !important;">
    <div class="info_parent_items" style="margin-left: 2.3vw;">
          <p class="name_category " style="font-weight: ;">
            <?php
              if ($_SESSION['site_lang'] == "french") {
                echo "Téléphone et tablettes";
              }else{
                echo "Phone and tablets";
              }
             ?>
          </p>
    </div>
    <div class="info_parent_items" style="margin-right: 2.3vw;">
          <a href="<?= base_url('category/1') ?>" class="but-voirplus" style="font-weight: bolder; text-decoration: none; padding: 5px;"><?php if($_SESSION['site_lang']=='french'){echo "Voir plus";}else{echo "More";} ?></a>
    </div>
  </div>

<div class="container homeshow" style="padding-bottom: 20px;margin-top:-65px; ">  
    <!------------------section slide a 5 cellules------------------------> 
    <?php //debug($results); ?>
    <div class="row rowItems" style="margin-top: 50px;">
      <div class="col-lg-12">
        <section id="carroussel1" class="center slider" style="padding-left: 20px; padding-right: 30px;margin-left: -30px;">
<!--quelques elements de la categorie 1-->
            <?php //debug($cat1);
            if (sizeof($cat1)>5) {
                foreach ($cat1 as $row) {
                  ?>
                  <div id="conteiner_see"class="card me-2">
                    <h5 style="background-color:#0092da !important;color:white;font-family:poppins !important" class="card-header"><?=$row->name_article ?></h5>
                    <div class="card-body">
                      <p class="papa" style="text-align: center;"><img class="bobo img-thumbnail" src="<?php if($row->type_a == 'service'){ echo base_url('/_seller_datas_/'.$row->id_seller.'/_publication/_service/'.$row->name_image ); }else{echo base_url('/_seller_datas_/'.$row->id_seller.'/_publication/_product/'.$row->name_image );}?>" class="img-thumbnail" width="100" style="width: 167px;" alt="">
                      </p>
                      <!--div class="conteiner_see">
                                <ul class="see seee see_items">
                                        <li class="l"><i class="fa fa-share-alt" style="font-size:24px;color:#0092da;"></i></li>
                                        <li class="l"><i class="fas fa-comment-alt" style="font-size:24px;color:#0092da;"></i></li>
                                        <li class="l"><i class="far fa-bookmark" style="font-size:24px;color:#0092da;"></i></li>
                                </ul>      
                                  
                          </div-->
                      <h5 class="card-title"><br><p><a href="<?= base_url('seller/'.$row->id_seller)?>" style="color : black;"><?= $this->lang->line('boutique') ?> : <?= $row->name_shop ?></a></p></h5>

                      <p style="text-align: center;" class="card-text"><?= $this->lang->line('prix') ?> : <?php if($row->price=='0'){echo '<span class="badge bg-success">Gratuit</span>';}else{echo $row->price.' $';} ?></p>
                           
                             
                      <a  id="moreinfo" style="margin-left:25px;margin-top:-6px;" href="<?= base_url('more/').$row->id_article ?>" class="btn btn-primary"><?= $this->lang->line('info') ?></a> 
                      
                  </div> 
              </div> 
              <?php
                }
            } 
            ?> 
        </section>
      </div>
    </div> 
</div>

<div class="info_parent homeshow" style="margin-top:-15px;">
    <div class="info_parent_items" style="margin-left: 2.3vw;">
          <p class="name_category " style="font-weight: ;">
            <?php
              if ($_SESSION['site_lang'] == "french") {
                echo "Informatique et multimédia";
              }else{
                echo "Informatic and media";
              }
             ?>
          </p>
    </div>
    <div class="info_parent_items" style="margin-right: 2.3vw;">
          <a href="<?= base_url('category/2') ?>" class="but-voirplus" style="font-weight: bolder; text-decoration: none; padding: 5px;"><?php if($_SESSION['site_lang']=='french'){echo "Voir plus";}else{echo "More";} ?></a>
    </div>
  </div>     
<div class="container homeshow" style="margin-top:-55px">
  <div class="row" style="margin-top: 30px;">
<!--Quelques elements de la categorie 2-->
<?php //echo var_dump($_SESSION['site_lang']);?>
            
      <div class="col-sm-12">
              
        <section class="center slider" style="padding-left: 50px; padding-right: 50px;margin-left: -30px;">
            <?php
            if (sizeof($cat2)>5) {
                foreach ($cat2 as $row) {
                  ?>
                  <div id="conteiner_see" class="card me-2">
                    <h5 style="background-color:#0092da !important;color:white;font-family:poppins !important" class="card-header"><?=$row->name_article ?></h5>
                    <div class="card-body">
                      <p style="text-align: center;"><img class="bobo boborigth img-thumbnail" src="<?php if($row->type_a == 'service'){ echo base_url('/_seller_datas_/'.$row->id_seller.'/_publication/_service/'.$row->name_image ); }else{echo base_url('/_seller_datas_/'.$row->id_seller.'/_publication/_product/'.$row->name_image );}?>" class="img-thumbnail" width="100" style="width: 167px;" alt="">
                      </p>
                      <!--div class="conteiner_see">
                                <ul class="see">
                                        <li class="l"><i class="fa fa-share-alt" style="font-size:24px;color:#0092da;"></i></li>
                                        <li class="l"><i class="fas fa-comment-alt" style="font-size:24px;color:#0092da;"></i></li>
                                        <li class="l"><i class="far fa-bookmark" style="font-size:24px;color:#0092da;"></i></li>
                                </ul>      
                                  
                          </div-->
                      <h5 class="card-title"><br><p><a href="<?= base_url('seller/'.$row->id_seller)?>" style="color : black;"><?= $this->lang->line('boutique') ?> : <?= $row->name_shop ?></a></p></h5>
                      <p style="text-align: center;" class="card-text"><strong><?= $this->lang->line('prix') ?> : </strong><?php if($row->price=='0'){echo '<span class="badge bg-success">Gratuit</span>';}else{echo $row->price.' $';} ?></p>
                      <a  id="moreinfo" style="margin-left:25px;margin-top:-6px" href="<?= base_url('more/').$row->id_article ?>" class="btn btn-primary"><?= $this->lang->line('info') ?></a> 
                         
                    </div> 
              </div> 
              <?php
                }
            } 
            ?> 
        </section>
      </div>
    </div>

</div>
              
        

<div class="homeshow" style="height: 230px; width:95%;margin-left:2.5vw;margin-top:5px">
  <img class="mySlidess" src="<?php  echo base_url('images/banniere.png')?>" style="width:100%">

</div> 

   <div class="info_parent homeshow" style="margin-top: 5px;">
                      <div class="info_parent_items" style="margin-left: 2.3vw;">
                            <p class="name_category"> Voitures</p>
                      </div>
                      <div class="info_parent_items" style="margin-right: 2.3vw;">
                            <a href="<?= base_url('category/3') ?>" class="but-voirplus" style="font-weight: bolder; text-decoration: none; padding: 5px;"><?php if($_SESSION['site_lang']=='french'){echo "Voir plus";}else{echo "More";} ?></a>
                      </div>
      </div>


<div class="container homeshow" style="margin-top:5px">   

<!--Quelques elements de la categorie 3-->
           
<div class="row">

      <div class="col-sm-12">
        <section class="center slider" id="carroussel3" style="padding-left: 50px; padding-right: 50px;margin-left: -30px;">
            <?php
            if (sizeof($cat3)>5) {
                foreach ($cat3 as $row) {
                  ?>
                  <div id="conteiner_see" class="card me-2">
                    <h5 style="background-color:#0092da !important;color:white;font-family:poppins !important" class="card-header"><?=$row->name_article ?></h5>
                    <div class="card-body">
                      <p style="text-align: center;"><img class="bobo boborigth  img-thumbnail" src="<?php if($row->type_a == 'service'){ echo base_url('/_seller_datas_/'.$row->id_seller.'/_publication/_service/'.$row->name_image ); }else{echo base_url('/_seller_datas_/'.$row->id_seller.'/_publication/_product/'.$row->name_image );}?>" class="img-thumbnail" width="100" style="width: 167px;" alt="">
                      </p>
                      <!--div class="conteiner_see">
                                <ul class="see">
                                        <li class="l"><i class="fa fa-share-alt" style="font-size:24px;color:#0092da;"></i></li>
                                        <li class="l"><i class="fas fa-comment-alt" style="font-size:24px;color:#0092da;"></i></li>
                                        <li class="l"><i class="far fa-bookmark" style="font-size:24px;color:#0092da;"></i></li>
                                </ul>      
                                  
                          </div-->
                      <h5 class="card-title"><br><p><a href="<?= base_url('seller/'.$row->id_seller)?>" style="color : black;"><?= $this->lang->line('boutique') ?> : <?= $row->name_shop ?></a></p></h5>
                      <p style="text-align: center;" class="card-text"><strong><?= $this->lang->line('prix') ?> : </strong><?php if($row->price=='0'){echo '<span class="badge bg-success">Gratuit</span>';}else{echo $row->price.' $';} ?></p>
                      <a   id="moreinfo"style="margin-left:25px;margin-top:-6px" href="<?= base_url('more/').$row->id_article ?>" class="btn btn-primary"><?= $this->lang->line('info') ?></a> 
                     
                    </div> 
              </div> 
              <?php
                }
            } 
            ?> 
        </section>
      </div>
    </div>
<!--Quelques elements de la categorie 4-->
<div class="row">
      <div class="col-sm-12">
        <section class="center slider" id="carroussel" style="padding-left: 50px; padding-right: 50px;margin-left: -30px;">
            <?php
            if (sizeof($cat4)>5) {
                foreach ($cat4 as $row) {
                  ?>
                  <div id="conteiner_see" class="card me-2">
                    <h5 style="background-color:#0092da !important;color:white;font-family:poppins !important" class="card-header"><?=$row->name_article ?></h5>
                    <div class="card-body">
                      <p style="text-align: center;"><img class="bobo boborigth img-thumbnail" src="<?php if($row->type_a == 'service'){ echo base_url('/_seller_datas_/'.$row->id_seller.'/_publication/_service/'.$row->name_image ); }else{echo base_url('/_seller_datas_/'.$row->id_seller.'/_publication/_product/'.$row->name_image );}?>" class="img-thumbnail" width="100" style="width: 167px;" alt="">
                      </p>
                      <!--div class="conteiner_see">
                                <ul class="see">
                                       <li class="l"><i class="fa fa-share-alt" style="font-size:24px;color:#0092da;"></i></li>
                                        <li class="l"><i class="fas fa-comment-alt" style="font-size:24px;color:#0092da;"></i></li>
                                        <li class="l"><i class="far fa-bookmark" style="font-size:24px;color:#0092da;"></i></li>
                                </ul>      
                                  
                          </div-->
                      <h5 class="card-title"><br><p><a href="<?= base_url('seller/'.$row->id_seller)?>" style="color : black;"><?= $this->lang->line('boutique') ?> : <?= $row->name_shop ?></a></p></h5>
                      <p style="text-align: center;" class="card-text"><strong><?= $this->lang->line('prix') ?> : </strong><?php if($row->price=='0'){echo '<span class="badge bg-success">Gratuit</span>';}else{echo $row->price.' $';} ?></p>
                      <a  id="moreinfo" style="margin-left:25px;margin-top:-6px" href="<?= base_url('more/').$row->id_article ?>" class="btn btn-primary"><?= $this->lang->line('info') ?></a> 
                     
                    </div> 
              </div> 
              <?php
                }
            } 
            ?> 
        </section>
      </div>
    </div> 
</div>

<?php 
if (sizeof($cat5)>5) {
?>
<div class="homeshow" style="height: 300px; width:95%;margin-left:2.5vw;">
      <img class="mySlidess" src="<?php  echo base_url('images/banniere.png')?>" style="width:100%"> 
 </div>
 
<?php
}
?> 

<div class="container homeshow">    
<!--Quelques elements de la categorie 5-->
<div class="row">
      <div class="col-sm-12">
        <section class="center slider" id="carroussel" style="padding-left: 50px; padding-right: 50px;margin-left: -30px;">
            <?php
            if (sizeof($cat5)>5) {
                foreach ($cat5 as $row) {
                  ?>
                  <div id="conteiner_see" class="card me-2">
                    <h5 style="background-color:#0092da !important;color:white;font-family:poppins !important" class="card-header"><?=$row->name_article ?></h5>
                    <div class="card-body">
                      <p style="text-align: center;"><img class="bobo boborigth img-thumbnail" src="<?php if($row->type_a == 'service'){ echo base_url('/_seller_datas_/'.$row->id_seller.'/_publication/_service/'.$row->name_image ); }else{echo base_url('/_seller_datas_/'.$row->id_seller.'/_publication/_product/'.$row->name_image );}?>" class="img-thumbnail" width="100" style="width: 167px;" alt="">
                      </p>
                      <!--div class="conteiner_see">
                                <ul class="see">
                                        <li class="l"><i class="fa fa-share-alt" style="font-size:24px;color:#0092da;"></i></li>
                                        <li class="l"><i class="fas fa-comment-alt" style="font-size:24px;color:#0092da;"></i></li>
                                        <li class="l"><i class="far fa-bookmark" style="font-size:24px;color:#0092da;"></i></li>
                                </ul>      
                                  
                          </div-->
                      <h5 class="card-title"><br><p><a href="<?= base_url('seller/'.$row->id_seller)?>" style="color : black;"><?= $this->lang->line('boutique') ?> : <?= $row->name_shop ?></a></p></h5>
                      <p style="text-align: center;" class="card-text"><strong><?= $this->lang->line('prix') ?> : </strong><?php if($row->price=='0'){echo '<span class="badge bg-success">Gratuit</span>';}else{echo $row->price.' $';} ?></p>
                      <a   id="moreinfo"style="margin-left:25px;margin-top:-6px" href="<?= base_url('more/').$row->id_article ?>" class="btn btn-primary"><?= $this->lang->line('info') ?></a> 
                 
                  
                    </div> 
              </div> 
              <?php
                }
            } 
            ?> 
        </section>
      </div>
    </div>
<!--Quelques elements de la categorie 6-->
<div class="row">
      <div class="col-sm-12">
        <section class="center slider" id="carroussel" style="padding-left: 50px; padding-right: 50px;margin-left: -30px;">
            <?php
            if (sizeof($cat6)>5) {
                foreach ($cat6 as $row) {
                  ?>
                  <div class="card me-2">
                    <h5 style="background-color:#0092da !important;color:white;font-family:poppins !important" class="card-header"><?=$row->name_article ?></h5>
                    <div id="conteiner_see" class="card-body">
                      <p style="text-align: center;"><img class="bobo boborigth img-thumbnail" src="<?php if($row->type_a == 'service'){ echo base_url('/_seller_datas_/'.$row->id_seller.'/_publication/_service/'.$row->name_image ); }else{echo base_url('/_seller_datas_/'.$row->id_seller.'/_publication/_product/'.$row->name_image );}?>" class="img-thumbnail" width="100" style="width: 167px;" alt="">
                      </p>
                      <!--div class="conteiner_see">
                                <ul class="see">
                                        <li class="l"><i class="fa fa-share-alt" style="font-size:24px;color:#0092da;"></i></li>
                                        <li class="l"><i class="fas fa-comment-alt" style="font-size:24px;color:#0092da;"></i></li>
                                        <li class="l"><i class="far fa-bookmark" style="font-size:24px;color:#0092da;"></i></li>
                                </ul>      
                                  
                          </div-->
                      <h5 class="card-title"><br><p><a href="<?= base_url('seller/'.$row->id_seller)?>" style="color : black;"><?= $this->lang->line('boutique') ?> : <?= $row->name_shop ?></a></p></h5>
                      <p style="text-align: center;" class="card-text"><strong><?= $this->lang->line('prix') ?> : </strong><?php if($row->price=='0'){echo '<span class="badge bg-success">Gratuit</span>';}else{echo $row->price.' $';} ?></p>
                      <a   id="moreinfo"style="margin-left:25px;margin-top:-6px" href="<?= base_url('more/').$row->id_article ?>" class="btn btn-primary"><?= $this->lang->line('info') ?></a> 
                    
                    </div> 
              </div> 
              <?php
                }
            } 
            ?> 
        </section>
      </div>
    </div>
<!--Quelques elements de la categorie 7-->
<div class="row">
      <div class="col-sm-12">
        <section class="center slider" id="carroussel" style="padding-left: 50px; padding-right: 50px;margin-left: -30px;">
            <?php
            if (sizeof($cat7)>5) {
                foreach ($catè as $row) {
                  ?>
                  <div id="conteiner_see" class="card me-2">
                    <h5 style="background-color:#0092da !important;color:white;font-family:poppins !important" class="card-header"><?=$row->name_article ?></h5>
                    <div class="card-body">
                      <p style="text-align: center;"><img class="bobo boborigth img-thumbnail" src="<?php if($row->type_a == 'service'){ echo base_url('/_seller_datas_/'.$row->id_seller.'/_publication/_service/'.$row->name_image ); }else{echo base_url('/_seller_datas_/'.$row->id_seller.'/_publication/_product/'.$row->name_image );}?>" class="img-thumbnail" width="100" style="width: 167px;" alt="">
                      </p>
                      <!--div class="conteiner_see">
                                <ul class="see">
                                        <li class="l"><i class="fa fa-share-alt" style="font-size:24px;color:#0092da;"></i></li>
                                        <li class="l"><i class="fas fa-comment-alt" style="font-size:24px;color:#0092da;"></i></li>
                                        <li class="l"><i class="far fa-bookmark" style="font-size:24px;color:#0092da;"></i></li>
                                </ul>      
                                  
                          </div-->
                      <h5 class="card-title"><br><p><a href="<?= base_url('seller/'.$row->id_seller)?>" style="color : black;"><?= $this->lang->line('boutique') ?> : <?= $row->name_shop ?></a></p></h5>
                      <p style="text-align: center;" class="card-text"><strong><?= $this->lang->line('prix') ?> : </strong><?php if($row->price=='0'){echo '<span class="badge bg-success">Gratuit</span>';}else{echo $row->price.' $';} ?></p>
                      <a  id="moreinfo" style="margin-left:25px;margin-top:-6px" href="<?= base_url('more/').$row->id_article ?>" class="btn btn-primary"><?= $this->lang->line('info') ?></a> 
                   
                 
                    </div> 
              </div> 
              <?php
                }
            } 
            ?> 
        </section>
      </div>
    </div>
<!--Quelques elements de la categorie 8-->
<div class="row">
      <div class="col-sm-12">
        <section class="center slider" id="carroussel" style="padding-left: 50px; padding-right: 50px;margin-left: -30px;">
            <?php
            if (sizeof($cat8)>5) {
                foreach ($cat8 as $row) {
                  ?>
                  <div id="conteiner_see"  class="card me-2"style="border:1px solid red" >
                    <h5 style="background-color:#0092da !important;color:white;font-family:poppins !important" class="card-header"><?=$row->name_article ?></h5>
                    <div class="card-body">
                      <p style="text-align: center;"><img class="bobo boborigth img-thumbnail" src="<?php if($row->type_a == 'service'){ echo base_url('/_seller_datas_/'.$row->id_seller.'/_publication/_service/'.$row->name_image ); }else{echo base_url('/_seller_datas_/'.$row->id_seller.'/_publication/_product/'.$row->name_image );}?>" class="img-thumbnail" width="100" style="width: 167px;" alt="">
                      </p>
                      <!--div class="conteiner_see">
                                <ul class="see">
                                        <li class="l"><i class="fa fa-share-alt" style="font-size:24px;color:#0092da;"></i></li>
                                        <li class="l"><i class="fas fa-comment-alt" style="font-size:24px;color:#0092da;"></i></li>
                                        <li class="l"><i class="far fa-bookmark" style="font-size:24px;color:#0092da;"></i></li>
                                </ul>      
                                  
                          </div-->
                      <h5 class="card-title"><br><p><a href="<?= base_url('seller/'.$row->id_seller)?>" style="color : black;"><?= $this->lang->line('boutique') ?> : <?= $row->name_shop ?></a></p></h5>
                      <p style="text-align: center;" class="card-text"><strong><?= $this->lang->line('prix') ?> : </strong><?php if($row->price=='0'){echo '<span class="badge bg-success">Gratuit</span>';}else{echo $row->price.' $';} ?></p>
                      <a  id="moreinfo" style="margin-left:25px;margin-top:-6px" href="<?= base_url('more/').$row->id_article ?>" class="btn btn-primary"><?= $this->lang->line('info') ?></a> 
                  
                 
                    </div> 
              </div> 
              <?php
                }
            } 
            ?> 
        </section>
      </div>
    </div>


              <style>
                    .bobo{
                          border:none;
                    }
                    /*
                     .card{
                        // border:none;
                        //padding:0 15px; 
                        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                    }
                    */
                  
                    @media all and (min-width:0px) and (max-width:500px){
/*                       
                                .card{
                                      width:100px !important;
                                      
                                      padding:0;
                                      flex:1;
                                      margin:0;
                                }
                                .row{
                                  border:1px solid red;
                                  width:100%;
                                 
                                }
                                .col-lg-12{
                                  width:150px
                                } */
                    }
              </style>

</div>      

<!---------------------------banniere--------------------------------->

<!-----------------------section 3 cellules--------------------------->

<!---------------------------banniere--------------------------------->
                 
<div class="homeshow" style="height: 230px; width:95%;margin-left:2.5vw;margin-top:-55px">
  <img class="mySlidess" src="<?php  echo base_url('images/banniere.png')?>" style="width:100%">

</div> 


<?php $this->load->view('layout/comment');?>

</style>

<script type="text/javascript">
<?php 
if (sizeof($cat1)>5 || sizeof($cat2)>5 || sizeof($cat3)>5 || sizeof($cat4)>5 || sizeof($cat5)>5 || sizeof($cat6)>5 || sizeof($cat7)>5 || sizeof($cat8)>5) {
?>
/*$('#carroussel1').caroufredsel({ 
        scroll : {
          items : 1,
          fx : 'directscroll',
    },
    auto : {
        duration : 500,
        pauseOnHover : 'immediate',
    }
});*/
$('.center').slick({
  dots: false,
  prevArrow:false,
  nextArrow:false,
  infinite: true,
  autoplay : true,
  speed: 300,
  slidesToShow: 5,
  slidesToScroll: 5,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        //slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});
<?php
} 
?>
 
</script>


<style type="text/css">
  .bobo{
    height: 120px; 
   
}
.mySlides {display:none;}
.mySlidess{
    height: 200px;
}
.mySlides{
    height: 400px;
    margin-top: -7vw;
}
.conteiner_slide{
    margin-left: 2.3vw;
    margin-top:-15px !important;
}
/* @media all and (min-width:600px) and (max-width:100000px){
      .row{
        margin-left: 35px;
      }
}

@media all and (min-width:400px) and  (max-width:599px){
  .row{
    margin-left: 20vw;
  }
} */
/* @media all and (min-width:600px) and (max-width:799px){
  .row{
    margin-left: 1vw;
  }
} */
@media all and (min-width:780px) and (max-width:1200px){
  .row{
    margin-left: 8vw;
  }
}
@media all and (min-width:1201px)  and  (max-width:50000px){
      .row{
        margin-left:2.5vw;
      }
}
@media all and (min-width:501px) and (max-width:991px){
                .conteiner_parent_search{
                      visibility: visible;

                }
                .conteiner_slide{
                  margin-top: 190px !important;
                }
       }

       @media all and (min-width:0px) and (max-width:500px){
            .row{
                  margin-left:1vw;
            }
       }

       @media all and (min-width:600px) and (max-width:55000000px){
                .to{
                  margin:0 -6.1vw;
                }
       }
       @media all and (min-width:0px)  and (max-width:400px){
            .to{
                    margin:0 -2vw;
            }
       }

      
 
       /* @media all and (min-width:0px) and (max-width:500px){
              .row{
                margin-left:2v
              }
       } */



  /* @media all and (min-width:0px) and (max-width:100px){
        .row{
          margin-left: 2vw !important;
        }
  } */

  
.info_parent{
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  width: 100%;
  margin:0;
  padding:0;
}
.name_category{
  color:black;
  
  font-weight: bold;
}
.but-voirplus{
  background-color: black;
  border-radius: 5px;
  color:white;
  border:none;

}

@media all and  (min-width:0px) and (max-width:700px){
      .mySlides{
        margin-top:500vw !important;

      }
     
}
@media all and (min-width:501px) and  (max-width:800px){
                                    .mySlides{
                                        margin-top:-75px !important;
                                    }
                                    
                        }
@media all and (min-width:0px) and  (max-width:700px){
                                  .mySlides{
                                    margin-top:205px !important;
                                  }

                        }

  @media all and (min-width:347px) and (max-width:413px)
  {
        .row{
          margin-left: 8vw !important;
        }
  }
  @media all and (min-width:414px) and (max-width:524px)
  {
        .row{
          margin-left: 15vw !important;
        }
  }
       
  @media all and (min-width:0px) and (max-width:322px){
      .bobo{
        margin-left:5vw;
      }
  }
  @media all and (min-width:323px) and (max-width:479px){
      .bobo{
        margin-left:11vw;
      }
  }
  @media all and (min-width:591px) and (max-width:767px){
          #moreinfo{
              margin-left:-0.9vw !important;
          
          }
  }

        /* mise en forme du pop up present sur chaque article*/


.see{
    display:none;
    margin-top:-2vw;
    color:red;
    position:absolute;
    padding:0px 15px;
    margin-top:-1vw;
    margin-left:2vw;
}
.l{
  float:left;
  padding:0px 5px;
  text-align:center
}

#conteiner_see:hover .see{
      display:block;  
}

  #conteiner_see:hover .seee{
      display:block;  
} 
#conteiner_see:hover .seee{
      display:block;  
}
#moreinfo{
    width:auto;
}
/* code qui permet de retirer les bordures sur  les articles */
.card{
  padding :0 5px;
  border:none;
}

@media all and (min-width:784px) and (max-width:10000000000px){
  #moreinfo{
      margin-left:1vw !important;
  }
}


@media all and (min-width:0px) and (max-width:500px){
    
}


/*media qery  de l'image de la categorie*/
@media all and (min-width:0px) and (max-width:500px){
    .boborigth{
      width:85% !important;
      margin-left:4vw !important;
    } 
}
.card{
  margin-left: 15px !important;;
}
.row{
    /* border:1px solid red; */
    margin-left:-0.1vw;
}
  @media all and (min-width:0px) and (max-width:400px){
    .rowItems{
          
          margin-left:15px
    }
  }
@media all and (min-width:500px) and (max-width:700px){
      .message{
        margin-top:70vw !important;

      }
}

@media all and (min-width:0px) and  (max-width:299px){
      .see{
          margin-left:2vw;
      }
}
      @media all and (min-width:300px) and  (max-width:400px){
            .l{
              margin-left:3.5vw;
              color:red;
            }
            .see_items{
                margin-left:8vw;
            }
      }
      @media all and (min-width:401px) and (max-width:460px){
            .l{
                margin-left:5vw;
            }
            .see_items{
                margin-left:7vw;
            }

          
      }

      @media all and (min-width:0px) and (max-width:600px){
          .homeshow{
            display:none;
          }
          .slogan-items{
              display:none;
          }
      }



</style>

</style>



</body>
</html>