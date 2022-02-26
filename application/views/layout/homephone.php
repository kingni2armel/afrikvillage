<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
            <div class="gogo" style="display:none;">
                 <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
                <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            </div>

            <?php $this->load->view('layout/lienboostrap_css.html'); ?>
  <style>
  /* Make the image fully responsive */
  .carousel-inner  {
    width: 100%;
    height: 100%;
  }
    @media all and (min-width:0px) and (max-width:600px){
                .gogo{
                        display:block;
                }
    }
  </style>
</head>
<body">


<?php
if (sizeof($cat1) > 5) { 
?>
 <!-- bloc qui doit contenir les articles de la categorie telephone  -->
  <div class=""style="margin-top:20px">
  <?php  $this->load->view('layout/slogan');?>
  </div>

 <div class="info_parent homeshows" style="margin-top:30px;background-color:red;">
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
          <a href="<?= base_url('category/1') ?>" class="but-voirplus" style="padding : 5px; font-weight: bold; text-decoration: none;"><?php if($_SESSION['site_lang']=='french'){echo "Voir plus";}else{echo "More";} ?></a>
    </div> 
</div>
<div id="demo" class="carousel slide homeshows" data-ride="carousel" style="">
 <!-- premier defilement -->
  <div class="carousel-inner">
            <div class="carousel-item active">
                            <div class="conteiner_im" style="display:flex;justify-content: center;">
                              <div class="im">
                            
                                          <div class="cara">
                                            <h1><?= $cat1[0]->name_article?></h1>
                                          </div>
                                  
                                  <img src="<?php if($cat1[0]->type_a == 'service'){ echo base_url('/_seller_datas_/'.$cat1[0]->id_seller.'/_publication/_service/'.$cat1[0]->name_image ); }else{echo base_url('/_seller_datas_/'.$cat1[0]->id_seller.'/_publication/_product/'.$cat1[0]->name_image );} ?>"> 
                                  <!--ul class="seee">
                                        <li class="ls"><i class="fa fa-share-alt fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                        <li class="ls"><i class="fas fa-comment-alt fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                        <li class="ls"><i class="far fa-bookmark fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                </ul-->  
                                <p><a href="<?= base_url('seller/'.$cat1[0]->id_seller)?>" style="color : black; font-size: 12px;"><?= $cat1[0]->name_shop ?></a></p>

                                  <p class="prix"> <?= $cat1[0]->price ?> $ </p>

                                  <a  id="moreinfo" href="<?= base_url('more/').$cat1[0]->id_article ?>" class="button-btn"><?= $this->lang->line('home_more') ?></a> 
                              </div>
                              <div class="im">
                                
                                    <h1><?= $cat1[1]->name_article?></h1>
                                  
                                  <img src="<?php if($cat1[1]->type_a == 'service'){ echo base_url('/_seller_datas_/'.$cat1[1]->id_seller.'/_publication/_service/'.$cat1[1]->name_image ); }else{echo base_url('/_seller_datas_/'.$cat1[1]->id_seller.'/_publication/_product/'.$cat1[1]->name_image );} ?>" alt="Chicago" >

                                  <p><a href="<?= base_url('seller/'.$cat1[1]->id_seller)?>" style="color : black; font-size: 12px;"><?= $cat1[1]->name_shop ?></a></p>
                                  <!--ul class="seee">
                                        <li class="ls"><i class="fa fa-share-alt fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                        <li class="ls"><i class="fas fa-comment-alt fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                        <li class="ls"><i class="far fa-bookmark fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                </ul-->  
                                  <p class="prix"> <?= $cat1[1]->price ?> $ </p>

                                  <a  id="moreinfo" href="<?= base_url('more/').$cat1[1]->id_article ?>" class="button-btn"><?= $this->lang->line('home_more') ?></a>
                              </div>
                              <div class="im">
                                
                                    <h1><?= $cat1[2]->name_article?></h1>
                                  
                                  <img src="<?php if($cat1[2]->type_a == 'service'){ echo base_url('/_seller_datas_/'.$cat1[2]->id_seller.'/_publication/_service/'.$cat1[2]->name_image ); }else{echo base_url('/_seller_datas_/'.$cat1[2]->id_seller.'/_publication/_product/'.$cat1[2]->name_image );} ?>" alt="Chicago" >
                                  <p><a href="<?= base_url('seller/'.$cat1[2]->id_seller)?>" style="color : black; font-size: 12px;"><?= $cat1[2]->name_shop ?></a></p>
                                  <!--ul class="seee">
                                        <li class="ls"><i class="fa fa-share-alt fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                        <li class="ls"><i class="fas fa-comment-alt fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                        <li class="ls"><i class="far fa-bookmark fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                </ul-->  
                                  <p class="prix"> <?= $cat1[2]->price ?> $ </p>
                                  <a  id="moreinfo" href="<?= base_url('more/').$cat1[2]->id_article ?>" class="button-btn"><?= $this->lang->line('home_more') ?></a>
                              </div>
                    </div>

            <div class="carousel-caption">
            
            </div>   
    </div>
    <!-- deuxieme defilement -->   
    <div class="carousel-item">
                          <div class="conteiner_im" style="display:flex;justify-content: center;">
                                    <div class="im">
                              
                                            <div class="cara">
                                              <h1><?= $cat1[3]->name_article?></h1>
                                            </div>
                                    
                                    <img src="<?php if($cat1[3]->type_a == 'service'){ echo base_url('/_seller_datas_/'.$cat1[3]->id_seller.'/_publication/_service/'.$cat1[3]->name_image ); }else{echo base_url('/_seller_datas_/'.$cat1[3]->id_seller.'/_publication/_product/'.$cat1[3]->name_image );} ?>" alt="Chicago" >
                                    <p><a href="<?= base_url('seller/'.$cat1[3]->id_seller)?>" style="color : black; font-size: 12px;"><?= $cat1[3]->name_shop ?></a></p>
                                    <!--ul class="seee">
                                          <li class="ls"><i class="fa fa-share-alt fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                          <li class="ls"><i class="fas fa-comment-alt fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                          <li class="ls"><i class="far fa-bookmark fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                  </ul-->  
                                    <p class="prix"> <?= $cat1[3]->price ?> $ </p>
                                    <a  id="moreinfo" href="<?= base_url('more/').$cat1[3]->id_article ?>" class="button-btn"><?= $this->lang->line('home_more') ?></a>
                                </div>
                                    <div class="im">
                                      
                                        <h1><?= $cat1[4]->name_article?></h1>
                                        
                                        <img src="<?php if($cat1[3]->type_a == 'service'){ echo base_url('/_seller_datas_/'.$cat1[4]->id_seller.'/_publication/_service/'.$cat1[4]->name_image ); }else{echo base_url('/_seller_datas_/'.$cat1[4]->id_seller.'/_publication/_product/'.$cat1[4]->name_image );} ?>" alt="Chicago" >
                                        <p><a href="<?= base_url('seller/'.$cat1[4]->id_seller)?>" style="color : black; font-size: 12px;"><?= $cat1[4]->name_shop ?></a></p>
                                        <!--ul class="seee">
                                          <li class="ls"><i class="fa fa-share-alt fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                          <li class="ls"><i class="fas fa-comment-alt fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                          <li class="ls"><i class="far fa-bookmark fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                         </ul-->  
                                         <p class="prix"> <?= $cat1[4]->price ?> $ </p>
                                        <a  id="moreinfo" href="<?= base_url('more/').$cat1[4]->id_article ?>" class="button-btn"><?= $this->lang->line('home_more') ?></a>
                                    </div>
                                    <div class="im">
                                      
                                        <h1><?= $cat1[5]->name_article?></h1>
                                        
                                        <img src="<?php if($cat1[5]->type_a == 'service'){ echo base_url('/_seller_datas_/'.$cat1[5]->id_seller.'/_publication/_service/'.$cat1[5]->name_image ); }else{echo base_url('/_seller_datas_/'.$cat1[5]->id_seller.'/_publication/_product/'.$cat1[5]->name_image );} ?>" alt="Chicago" >
                                        <p><a href="<?= base_url('seller/'.$cat1[5]->id_seller)?>" style="color : black; font-size: 12px;"><?= $cat1[5]->name_shop ?></a></p>
                                        <!--ul class="seee">
                                          <li class="ls"><i class="fa fa-share-alt fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                          <li class="ls"><i class="fas fa-comment-alt fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                          <li class="ls"><i class="far fa-bookmark fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                         </ul-->  
                                         <p class="prix"> <?= $cat1[5]->price ?> $ </p>
                                        <a  id="moreinfo" href="<?= base_url('more/').$cat1[5]->id_article ?>" class="button-btn"><?= $this->lang->line('home_more') ?></a>
                                    </div>
                    </div>
  
  
                          <div class="carousel-caption">
  
                          </div>   
      </div>
    <!---->
 
  </div>

</div>
<?php
}
if (sizeof($cat2) > 5) {
  ?>

   <!-- bloc qui doit contenir les articles de la categorie telephone  -->
   <div class="info_parent homeshows" style="margin-top: 18px;">
      <div class="info_parent_items" style="margin-left: 2.3vw;">
            <p class="name_category " style="font-weight: ;">
            <?php
              if ($_SESSION['site_lang'] == 'french') {
                echo "Informatique et multimédia";
              }else{
                echo "Informatic and media";
              }
             ?>
          </p>
      </div>
      <div class="info_parent_items" style="margin-right: 2.3vw;">
            <a href="<?= base_url('category/2') ?>" class="but-voirplus" style="padding : 5px; font-weight: bold; text-decoration: none;"><?php if($_SESSION['site_lang']=='french'){echo "Voir plus";}else{echo "More";} ?></a>
      </div>
  </div>
  <div id="demo" class="carousel slide homeshows" data-ride="carousel">
   <!-- premier defilement -->

    <div class="carousel-inner">
              <div class="carousel-item active">
                              <div class="conteiner_im" style="display:flex;justify-content: center;">
                                <div class="im">
                              
                                            <div class="cara">
                                              <h1><?= $cat2[0]->name_article?></h1>
                                            </div>
                                    
                                    <img src="<?php if($cat2[0]->type_a == 'service'){ echo base_url('/_seller_datas_/'.$cat2[0]->id_seller.'/_publication/_service/'.$cat2[0]->name_image ); }else{echo base_url('/_seller_datas_/'.$cat2[0]->id_seller.'/_publication/_product/'.$cat2[0]->name_image );} ?>" alt="Chicago" >
                                    <p><a href="<?= base_url('seller/'.$cat2[0]->id_seller)?>" style="color : black; font-size: 12px;"><?= $cat2[0]->name_shop ?></a></p>
                                    <!--ul class="seee">
                                          <li class="ls"><i class="fa fa-share-alt fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                          <li class="ls"><i class="fas fa-comment-alt fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                          <li class="ls"><i class="far fa-bookmark fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                  </ul-->  
                                    <p class="prix"> <?= $cat2[0]->price ?> $ </p>
                                    <a  id="moreinfo" href="<?= base_url('more/').$cat2[0]->id_article ?>" class="button-btn"><?= $this->lang->line('home_more') ?></a>
                                </div>
                                <div class="im">
                                  
                                      <h1><?= $cat2[1]->name_article?></h1>
                                    
                                    <img src="<?php if($cat2[1]->type_a == 'service'){ echo base_url('/_seller_datas_/'.$cat2[1]->id_seller.'/_publication/_service/'.$cat2[1]->name_image ); }else{echo base_url('/_seller_datas_/'.$cat2[1]->id_seller.'/_publication/_product/'.$cat2[1]->name_image );} ?>" alt="Chicago" >
                                    <p><a href="<?= base_url('seller/'.$cat2[1]->id_seller)?>" style="color : black; font-size: 12px;"><?= $cat2[1]->name_shop ?></a></p>
                                    <!--ul class="seee">
                                          <li class="ls"><i class="fa fa-share-alt fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                          <li class="ls"><i class="fas fa-comment-alt fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                          <li class="ls"><i class="far fa-bookmark fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                  </ul-->  
                                    <p class="prix"> <?= $cat2[1]->price ?> $ </p>
                                    <a  id="moreinfo" href="<?= base_url('more/').$cat2[1]->id_article ?>" class="button-btn"><?= $this->lang->line('home_more') ?></a>
                                </div>
                                <div class="im">
                                  
                                      <h1><?= $cat2[2]->name_article?></h1>
                                    
                                    <img src="<?php if($cat2[2]->type_a == 'service'){ echo base_url('/_seller_datas_/'.$cat2[2]->id_seller.'/_publication/_service/'.$cat2[2]->name_image ); }else{echo base_url('/_seller_datas_/'.$cat2[2]->id_seller.'/_publication/_product/'.$cat2[2]->name_image );} ?>" alt="Chicago" >
                                    <p><a href="<?= base_url('seller/'.$cat2[2]->id_seller)?>" style="color : black; font-size: 12px;"><?= $cat2[2]->name_shop ?></a></p>
                                    <!--ul class="seee">
                                          <li class="ls"><i class="fa fa-share-alt fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                          <li class="ls"><i class="fas fa-comment-alt fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                          <li class="ls"><i class="far fa-bookmark fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                  </ul-->  
                                    <p class="prix"> <?= $cat2[2]->price ?> $ </p>
                                    <a  id="moreinfo" href="<?= base_url('more/').$cat2[2]->id_article ?>" class="button-btn"><?= $this->lang->line('home_more') ?></a>
                                </div>
                      </div>
  
              <div class="carousel-caption">
              
              </div>   
      </div>
      <!-- deuxieme defilement -->
      <div class="carousel-item">
                        <div class="conteiner_im" style="display:flex;justify-content: center;">
                                  <div class="im">
                            
                                          <div class="cara">
                                            <h1><?= $cat2[3]->name_article?></h1>
                                          </div>
                                  
                                  <img src="<?php if($cat2[3]->type_a == 'service'){ echo base_url('/_seller_datas_/'.$cat2[3]->id_seller.'/_publication/_service/'.$cat2[3]->name_image ); }else{echo base_url('/_seller_datas_/'.$cat2[3]->id_seller.'/_publication/_product/'.$cat2[3]->name_image );} ?>" alt="Chicago" >
                                  <p><a href="<?= base_url('seller/'.$cat2[3]->id_seller)?>" style="color : black; font-size: 12px;"><?= $cat2[3]->name_shop ?></a></p>
                                  <!--ul class="seee">
                                        <li class="ls"><i class="fa fa-share-alt fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                        <li class="ls"><i class="fas fa-comment-alt fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                        <li class="ls"><i class="far fa-bookmark fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                </ul-->  
                                  <p class="prix"> <?= $cat2[3]->price ?> $ </p>
                                  <a  id="moreinfo" href="<?= base_url('more/').$cat2[3]->id_article ?>" class="button-btn"><?= $this->lang->line('home_more') ?></a>
                              </div>
                                  <div class="im">
                                    
                                      <h1><?= $cat2[4]->name_article?></h1>
                                      
                                      <img src="<?php if($cat2[4]->type_a == 'service'){ echo base_url('/_seller_datas_/'.$cat2[4]->id_seller.'/_publication/_service/'.$cat2[4]->name_image ); }else{echo base_url('/_seller_datas_/'.$cat2[4]->id_seller.'/_publication/_product/'.$cat2[4]->name_image );} ?>" alt="Chicago" >
                                      <p><a href="<?= base_url('seller/'.$cat2[4]->id_seller)?>" style="color : black; font-size: 12px;"><?= $cat2[4]->name_shop ?></a></p>
                                      <!--ul class="seee">
                                        <li class="ls"><i class="fa fa-share-alt fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                        <li class="ls"><i class="fas fa-comment-alt fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                        <li class="ls"><i class="far fa-bookmark fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                       </ul-->  
                                       <p class="prix"> <?= $cat2[4]->price ?> $ </p>
                                      <a  id="moreinfo" href="<?= base_url('more/').$cat2[4]->id_article ?>" class="button-btn"><?= $this->lang->line('home_more') ?></a>
                                  </div>
                                  <div class="im">
                                    
                                      <h1><?= $cat2[5]->name_article?></h1>
                                      
                                      <img src="<?php if($cat2[5]->type_a == 'service'){ echo base_url('/_seller_datas_/'.$cat2[5]->id_seller.'/_publication/_service/'.$cat2[5]->name_image ); }else{echo base_url('/_seller_datas_/'.$cat2[5]->id_seller.'/_publication/_product/'.$cat2[5]->name_image );} ?>" alt="Chicago" >
                                      <p><a href="<?= base_url('seller/'.$cat2[5]->id_seller)?>" style="color : black; font-size: 12px;"><?= $cat2[5]->name_shop ?></a></p>
                                      <!--ul class="seee">
                                        <li class="ls"><i class="fa fa-share-alt fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                        <li class="ls"><i class="fas fa-comment-alt fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                        <li class="ls"><i class="far fa-bookmark fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                       </ul-->  
                                       <p class="prix"> <?= $cat2[5]->price ?> $ </p>
                                      <a  id="moreinfo" href="<?= base_url('more/').$cat2[5]->id_article ?>" class="button-btn"><?= $this->lang->line('home_more') ?></a>
                                  </div>
                  </div>


                        <div class="carousel-caption">

                        </div>   
    </div>   
    </div>
  
  </div>
  <?php
  }
?>


<div class="homeshows" style="height: 300px; width:95%;margin-left:2.5vw;">
  <img class="mySlidess" src="<?= base_url('images/banniere.PNG');?>" style="width:100%"> 
</div>
 
 <?php
if (sizeof($cat3) > 5) {
?>
 <!-- bloc qui doit contenir les articles de la categorie vehicule  -->
 <div class="info_parent homeshows" style="margin-top: -90px;">
    <div class="info_parent_items" style="margin-left: 2.3vw;">
          <p class="name_category " style="font-weight: ;">
            <?php
              if ($_SESSION['site_lang'] == 'french') {
                echo "Véhicules";
              }else{
                echo "Vehicles";
              }
             ?>
          </p>
    </div>
    <div class="info_parent_items" style="margin-right: 2.3vw;">
          <a href="<?= base_url('category/3') ?>" class="but-voirplus" style="padding : 5px; font-weight: bold; text-decoration: none;"><?php if($_SESSION['site_lang']=='french'){echo "Voir plus";}else{echo "More";} ?></a>
    </div>
</div>
<div id="demo" class="carousel slide homeshows" data-ride="carousel">
 <!-- premier defilement -->
  <div class="carousel-inner">
            <div class="carousel-item active">
                            <div class="conteiner_im" style="display:flex;justify-content: center;">
                              <div class="im">
                            
                                          <div class="cara">
                                            <h1><?= $cat3[0]->name_article?></h1>
                                          </div>
                                  
                                  <img src="<?php if($cat3[0]->type_a == 'service'){ echo base_url('/_seller_datas_/'.$cat3[0]->id_seller.'/_publication/_service/'.$cat3[0]->name_image ); }else{echo base_url('/_seller_datas_/'.$cat3[0]->id_seller.'/_publication/_product/'.$cat3[0]->name_image );} ?>" alt="Chicago" >
                                  <p><a href="<?= base_url('seller/'.$cat3[0]->id_seller)?>" style="color : black; font-size: 12px;"><?= $cat3[0]->name_shop ?></a></p>
                                  <!--ul class="seee">
                                        <li class="ls"><i class="fa fa-share-alt fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                        <li class="ls"><i class="fas fa-comment-alt fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                        <li class="ls"><i class="far fa-bookmark fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                </ul-->  
                                  <p class="prix"> <?= $cat3[0]->price ?> $ </p>
                                  <a  id="moreinfo" href="<?= base_url('more/').$cat3[0]->id_article ?>" class="button-btn"><?= $this->lang->line('home_more') ?></a>
                              </div>
                              <div class="im">
                                
                                    <h1><?= $cat3[1]->name_article?></h1>
                                  
                                  <img src="<?php if($cat3[1]->type_a == 'service'){ echo base_url('/_seller_datas_/'.$cat3[1]->id_seller.'/_publication/_service/'.$cat3[1]->name_image ); }else{echo base_url('/_seller_datas_/'.$cat3[1]->id_seller.'/_publication/_product/'.$cat3[1]->name_image );} ?>" alt="Chicago" >
                                  <p><a href="<?= base_url('seller/'.$cat3[1]->id_seller)?>" style="color : black; font-size: 12px;"><?= $cat3[1]->name_shop ?></a></p>
                                  <!--ul class="seee">
                                        <li class="ls"><i class="fa fa-share-alt fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                        <li class="ls"><i class="fas fa-comment-alt fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                        <li class="ls"><i class="far fa-bookmark fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                </ul-->  
                                  <p class="prix"> <?= $cat3[1]->price ?> $ </p>
                                  <a  id="moreinfo" href="<?= base_url('more/').$cat3[1]->id_article ?>" class="button-btn"><?= $this->lang->line('home_more') ?></a>
                              </div>
                              <div class="im">
                                
                                    <h1><?= $cat3[2]->name_article?></h1>
                                  
                                  <img src="<?php if($cat3[2]->type_a == 'service'){ echo base_url('/_seller_datas_/'.$cat3[2]->id_seller.'/_publication/_service/'.$cat3[2]->name_image ); }else{echo base_url('/_seller_datas_/'.$cat3[2]->id_seller.'/_publication/_product/'.$cat3[2]->name_image );} ?>" alt="Chicago" >
                                  <p><a href="<?= base_url('seller/'.$cat3[2]->id_seller)?>" style="color : black; font-size: 12px;"><?= $cat3[2]->name_shop ?></a></p>
                                  <!--ul class="seee">
                                        <li class="ls"><i class="fa fa-share-alt fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                        <li class="ls"><i class="fas fa-comment-alt fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                        <li class="ls"><i class="far fa-bookmark fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                </ul-->  
                                  <p class="prix"> <?= $cat3[2]->price ?> $ </p>
                                  <a  id="moreinfo" href="<?= base_url('more/').$cat3[2]->id_article ?>" class="button-btn"><?= $this->lang->line('home_more') ?></a>
                              </div>
                    </div>

            <div class="carousel-caption">
            
            </div>   
    </div>
    <!-- deuxieme defilement -->   
    <div class="carousel-item">
                          <div class="conteiner_im" style="display:flex;justify-content: center;">
                                    <div class="im">
                              
                                            <div class="cara">
                                              <h1><?= $cat3[3]->name_article?></h1>
                                            </div>
                                    
                                    <img src="<?php if($cat3[3]->type_a == 'service'){ echo base_url('/_seller_datas_/'.$cat3[3]->id_seller.'/_publication/_service/'.$cat3[3]->name_image ); }else{echo base_url('/_seller_datas_/'.$cat3[3]->id_seller.'/_publication/_product/'.$cat3[3]->name_image );} ?>" alt="Chicago" >
                                    <p><a href="<?= base_url('seller/'.$cat3[3]->id_seller)?>" style="color : black; font-size: 12px;"><?= $cat3[3]->name_shop ?></a></p>
                                    <!--ul class="seee">
                                          <li class="ls"><i class="fa fa-share-alt fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                          <li class="ls"><i class="fas fa-comment-alt fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                          <li class="ls"><i class="far fa-bookmark fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                  </ul-->  
                                    <p class="prix"> <?= $cat3[3]->price ?> $ </p>
                                    <a  id="moreinfo" href="<?= base_url('more/').$cat3[3]->id_article ?>" class="button-btn"><?= $this->lang->line('home_more') ?></a>
                                </div>
                                    <div class="im">
                                      
                                        <h1><?= $cat3[4]->name_article?></h1>
                                        
                                        <img src="<?php if($cat3[3]->type_a == 'service'){ echo base_url('/_seller_datas_/'.$cat3[4]->id_seller.'/_publication/_service/'.$cat3[4]->name_image ); }else{echo base_url('/_seller_datas_/'.$cat3[4]->id_seller.'/_publication/_product/'.$cat3[4]->name_image );} ?>" alt="Chicago" >
                                        <p><a href="<?= base_url('seller/'.$cat3[4]->id_seller)?>" style="color : black; font-size: 12px;"><?= $cat3[4]->name_shop ?></a></p>
                                        <!--ul class="seee">
                                          <li class="ls"><i class="fa fa-share-alt fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                          <li class="ls"><i class="fas fa-comment-alt fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                          <li class="ls"><i class="far fa-bookmark fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                         </ul-->  
                                         <p class="prix"> <?= $cat3[4]->price ?> $ </p>
                                        <a  id="moreinfo" href="<?= base_url('more/').$cat3[4]->id_article ?>" class="button-btn"><?= $this->lang->line('home_more') ?></a>
                                    </div>
                                    <div class="im">
                                      
                                        <h1><?= $cat3[5]->name_article?></h1>
                                        
                                        <img src="<?php if($cat3[5]->type_a == 'service'){ echo base_url('/_seller_datas_/'.$cat3[5]->id_seller.'/_publication/_service/'.$cat3[5]->name_image ); }else{echo base_url('/_seller_datas_/'.$cat3[5]->id_seller.'/_publication/_product/'.$cat3[5]->name_image );} ?>" alt="Chicago" >
                                        <p><a href="<?= base_url('seller/'.$cat3[5]->id_seller)?>" style="color : black; font-size: 12px;"><?= $cat3[5]->name_shop ?></a></p>
                                        <!--ul class="seee">
                                          <li class="ls"><i class="fa fa-share-alt fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                          <li class="ls"><i class="fas fa-comment-alt fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                          <li class="ls"><i class="far fa-bookmark fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                         </ul-->  
                                         <p class="prix"> <?= $cat3[5]->price ?> $ </p>
                                        <a  id="moreinfo" href="<?= base_url('more/').$cat3[5]->id_article ?>" class="button-btn"><?= $this->lang->line('home_more') ?></a>
                                    </div>
                    </div>
  
  
                          <div class="carousel-caption">
  
                          </div>   
      </div>
    <!---->
 
  </div>

</div>
<?php
}
if (sizeof($cat4) > 5) {
  ?>
   <!-- bloc qui doit contenir les articles de la categorie immobilier  -->
   <div class="info_parent homeshows" style="margin-top:-550px;position:absolute">
      <p class="name_category " style="font-weight: ;">
            <?php
              if ($_SESSION['site_lang'] == 'french') {
                echo "Immobilier";
              }else{
                echo "Real estate";
              }
             ?>
          </p>
      <div class="info_parent_items" style="margin-right: 2.3vw;">
            <a href="<?= base_url('category/4') ?>" class="but-voirplus" style="padding : 5px; font-weight: bold; text-decoration: none;"><?php if($_SESSION['site_lang']=='french'){echo "Voir plus";}else{echo "More";} ?></a>
      </div>
  </div>
  <div id="demo" class="carousel slide homeshows" data-ride="carousel">
   <!-- deuxieme defilement -->

    <div class="carousel-inner">
              <div class="carousel-item active">
                              <div class="conteiner_im" style="display:flex;justify-content: center;">
                                <div class="im">
                              
                                            <div class="cara">
                                              <h1><?= $cat4[0]->name_article?></h1>
                                            </div>
                                    
                                    <img src="<?php if($cat4[0]->type_a == 'service'){ echo base_url('/_seller_datas_/'.$cat4[0]->id_seller.'/_publication/_service/'.$cat4[0]->name_image ); }else{echo base_url('/_seller_datas_/'.$cat4[0]->id_seller.'/_publication/_product/'.$cat4[0]->name_image );} ?>" alt="Chicago" >
                                    <p><a href="<?= base_url('seller/'.$cat4[0]->id_seller)?>" style="color : black; font-size: 12px;"><?= $cat4[0]->name_shop ?></a></p>
                                    <!--ul class="seee">
                                          <li class="ls"><i class="fa fa-share-alt fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                          <li class="ls"><i class="fas fa-comment-alt fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                          <li class="ls"><i class="far fa-bookmark fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                  </ul-->  
                                    <p class="prix"> <?= $cat4[0]->price ?> $ </p>
                                    <a  id="moreinfo" href="<?= base_url('more/').$cat4[0]->id_article ?>" class="button-btn"><?= $this->lang->line('home_more') ?></a><a  id="moreinfo" href="<?= base_url('more/').$cat2[0]->id_article ?>" class="button-btn"><?= $this->lang->line('home_more') ?></a>
                                </div>
                                <div class="im">
                                  
                                      <h1><?= $cat4[1]->name_article?></h1>
                                    
                                    <img src="<?php if($cat4[1]->type_a == 'service'){ echo base_url('/_seller_datas_/'.$cat4[1]->id_seller.'/_publication/_service/'.$cat4[1]->name_image ); }else{echo base_url('/_seller_datas_/'.$cat4[1]->id_seller.'/_publication/_product/'.$cat4[1]->name_image );} ?>" alt="Chicago" >
                                    <p><a href="<?= base_url('seller/'.$cat4[1]->id_seller)?>" style="color : black; font-size: 12px;"><?= $cat4[1]->name_shop ?></a></p>
                                    <!--ul class="seee">
                                          <li class="ls"><i class="fa fa-share-alt fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                          <li class="ls"><i class="fas fa-comment-alt fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                          <li class="ls"><i class="far fa-bookmark fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                  </ul-->  
                                    <p class="prix"> <?= $cat4[1]->price ?> $ </p>
                                    <a  id="moreinfo" href="<?= base_url('more/').$cat4[1]->id_article ?>" class="button-btn"><?= $this->lang->line('home_more') ?></a><a  id="moreinfo" href="<?= base_url('more/').$cat2[0]->id_article ?>" class="button-btn"><?= $this->lang->line('home_more') ?></a>
                                </div>
                                <div class="im">
                                  
                                      <h1><?= $cat4[2]->name_article?></h1>
                                    
                                    <img src="<?php if($cat4[2]->type_a == 'service'){ echo base_url('/_seller_datas_/'.$cat4[2]->id_seller.'/_publication/_service/'.$cat4[2]->name_image ); }else{echo base_url('/_seller_datas_/'.$cat4[2]->id_seller.'/_publication/_product/'.$cat4[2]->name_image );} ?>" alt="Chicago" >
                                    <p><a href="<?= base_url('seller/'.$cat4[2]->id_seller)?>" style="color : black; font-size: 12px;"><?= $cat4[2]->name_shop ?></a></p>
                                    <!--ul class="seee">
                                          <li class="ls"><i class="fa fa-share-alt fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                          <li class="ls"><i class="fas fa-comment-alt fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                          <li class="ls"><i class="far fa-bookmark fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                  </ul-->  
                                    <p class="prix"> <?= $cat4[2]->price ?> $ </p>
                                    <a  id="moreinfo" href="<?= base_url('more/').$cat4[2]->id_article ?>" class="button-btn"><?= $this->lang->line('home_more') ?></a><a  id="moreinfo" href="<?= base_url('more/').$cat2[0]->id_article ?>" class="button-btn"><?= $this->lang->line('home_more') ?></a>
                                </div>
                      </div>
  
              <div class="carousel-caption">
              
              </div>   
      </div>
      
      <div class="carousel-item">
                        <div class="conteiner_im" style="display:flex;justify-content: center;">
                                  <div class="im">
                            
                                          <div class="cara">
                                            <h1><?= $cat4[3]->name_article?></h1>
                                          </div>
                                  
                                  <img src="<?php if($cat4[3]->type_a == 'service'){ echo base_url('/_seller_datas_/'.$cat4[3]->id_seller.'/_publication/_service/'.$cat4[3]->name_image ); }else{echo base_url('/_seller_datas_/'.$cat4[3]->id_seller.'/_publication/_product/'.$cat4[3]->name_image );} ?>" alt="Chicago" >
                                  <p><a href="<?= base_url('seller/'.$cat4[3]->id_seller)?>" style="color : black; font-size: 12px;"><?= $cat4[3]->name_shop ?></a></p>
                                  <!--ul class="seee">
                                        <li class="ls"><i class="fa fa-share-alt fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                        <li class="ls"><i class="fas fa-comment-alt fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                        <li class="ls"><i class="far fa-bookmark fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                </ul-->  
                                  <p class="prix"> <?= $cat4[3]->price ?> $ </p>
                                  <a  id="moreinfo" href="<?= base_url('more/').$cat4[3]->id_article ?>" class="button-btn"><?= $this->lang->line('home_more') ?></a><a  id="moreinfo" href="<?= base_url('more/').$cat2[0]->id_article ?>" class="button-btn"><?= $this->lang->line('home_more') ?></a>
                              </div>
                                  <div class="im">
                                    
                                      <h1><?= $cat4[4]->name_article?></h1>
                                      
                                      <img src="<?php if($cat4[4]->type_a == 'service'){ echo base_url('/_seller_datas_/'.$cat4[4]->id_seller.'/_publication/_service/'.$cat4[4]->name_image ); }else{echo base_url('/_seller_datas_/'.$cat4[4]->id_seller.'/_publication/_product/'.$cat4[4]->name_image );} ?>" alt="Chicago" >
                                      <p><a href="<?= base_url('seller/'.$cat4[4]->id_seller)?>" style="color : black; font-size: 12px;"><?= $cat4[4]->name_shop ?></a></p>
                                      <!--ul class="seee">
                                        <li class="ls"><i class="fa fa-share-alt fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                        <li class="ls"><i class="fas fa-comment-alt fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                        <li class="ls"><i class="far fa-bookmark fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                       </ul-->  
                                       <p class="prix"> <?= $cat4[4]->price ?> $ </p>
                                      <a  id="moreinfo" href="<?= base_url('more/').$cat4[4]->id_article ?>" class="button-btn"><?= $this->lang->line('home_more') ?></a><a  id="moreinfo" href="<?= base_url('more/').$cat2[0]->id_article ?>" class="button-btn"><?= $this->lang->line('home_more') ?></a>
                                  </div>
                                  <div class="im">
                                    
                                      <h1><?= $cat4[5]->name_article?></h1>
                                      
                                      <img src="<?php if($cat4[5]->type_a == 'service'){ echo base_url('/_seller_datas_/'.$cat4[5]->id_seller.'/_publication/_service/'.$cat4[5]->name_image ); }else{echo base_url('/_seller_datas_/'.$cat4[5]->id_seller.'/_publication/_product/'.$cat4[5]->name_image );} ?>" alt="Chicago" >
                                      <p><a href="<?= base_url('seller/'.$cat4[5]->id_seller)?>" style="color : black; font-size: 12px;"><?= $cat4[5]->name_shop ?></a></p>
                                      <!--ul class="seee">
                                        <li class="ls"><i class="fa fa-share-alt fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                        <li class="ls"><i class="fas fa-comment-alt fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                        <li class="ls"><i class="far fa-bookmark fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                       </ul-->  
                                       <p class="prix"> <?= $cat4[5]->price ?> $ </p>
                                      <a  id="moreinfo" href="<?= base_url('more/').$cat4[5]->id_article ?>" class="button-btn"><?= $this->lang->line('home_more') ?></a><a  id="moreinfo" href="<?= base_url('more/').$cat2[0]->id_article ?>" class="button-btn"><?= $this->lang->line('home_more') ?></a>
                                  </div>
                  </div>


                        <div class="carousel-caption">

                        </div>   
    </div>   
    </div>
  
  </div>
  <?php
  } 
if (sizeof($cat5) > 5) {
  ?>
   <div class="info_parent homeshows" style="margin-top: -90px;">
  <div class="info_parent_items" style="margin-left: 2.3vw;">
        <p class="name_category " style="font-weight: ;">
            <?php
              if ($_SESSION['site_lang'] == 'french') {
                echo "Mode et vêtements";
              }else{
                echo "Style and clothes";
              }
             ?>
          </p>
  </div>
    <div class="info_parent_items" style="margin-right: 2.3vw;">
          <a href="<?= base_url('category/5') ?>" class="but-voirplus" style="padding : 5px; font-weight: bold; text-decoration: none;"><?php if($_SESSION['site_lang']=='french'){echo "Voir plus";}else{echo "More";} ?></a>
    </div> 
  </div>
  <div id="demo" class="carousel slide homeshows" data-ride="carousel">
   <!-- deuxieme defilement -->

    <div class="carousel-inner">
              <div class="carousel-item active">
                              <div class="conteiner_im" style="display:flex;justify-content: center;">
                                <div class="im">
                              
                                            <div class="cara">
                                              <h1><?= $cat5[0]->name_article?></h1>
                                            </div>
                                    
                                    <img src="<?php if($cat5[0]->type_a == 'service'){ echo base_url('/_seller_datas_/'.$cat5[0]->id_seller.'/_publication/_service/'.$cat5[0]->name_image ); }else{echo base_url('/_seller_datas_/'.$cat5[0]->id_seller.'/_publication/_product/'.$cat5[0]->name_image );} ?>" alt="Chicago" >
                                    <p><a href="<?= base_url('seller/'.$cat5[0]->id_seller)?>" style="color : black; font-size: 12px;"><?= $cat5[0]->name_shop ?></a></p>
                                    <!--ul class="seee">
                                          <li class="ls"><i class="fa fa-share-alt fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                          <li class="ls"><i class="fas fa-comment-alt fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                          <li class="ls"><i class="far fa-bookmark fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                  </ul-->  
                                    <p class="prix"> <?= $cat5[0]->price ?> $ </p>
                                    <a  id="moreinfo" href="<?= base_url('more/').$cat5[0]->id_article ?>" class="button-btn"><?= $this->lang->line('home_more') ?></a><a  id="moreinfo" href="<?= base_url('more/').$cat2[0]->id_article ?>" class="button-btn"><?= $this->lang->line('home_more') ?></a>
                                </div>
                                <div class="im">
                                  
                                      <h1><?= $cat5[1]->name_article?></h1>
                                    
                                    <img src="<?php if($cat5[1]->type_a == 'service'){ echo base_url('/_seller_datas_/'.$cat5[1]->id_seller.'/_publication/_service/'.$cat5[1]->name_image ); }else{echo base_url('/_seller_datas_/'.$cat5[1]->id_seller.'/_publication/_product/'.$cat5[1]->name_image );} ?>" alt="Chicago" >
                                    <p><a href="<?= base_url('seller/'.$cat5[1]->id_seller)?>" style="color : black; font-size: 12px;"><?= $cat5[1]->name_shop ?></a></p>
                                    <!--ul class="seee">
                                          <li class="ls"><i class="fa fa-share-alt fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                          <li class="ls"><i class="fas fa-comment-alt fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                          <li class="ls"><i class="far fa-bookmark fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                  </ul-->  
                                    <p class="prix"> <?= $cat5[1]->price ?> $ </p>
                                    <a  id="moreinfo" href="<?= base_url('more/').$cat5[1]->id_article ?>" class="button-btn"><?= $this->lang->line('home_more') ?></a><a  id="moreinfo" href="<?= base_url('more/').$cat2[0]->id_article ?>" class="button-btn"><?= $this->lang->line('home_more') ?></a>
                                </div>
                                <div class="im">
                                  
                                      <h1><?= $cat5[2]->name_article?></h1>
                                    
                                    <img src="<?php if($cat5[2]->type_a == 'service'){ echo base_url('/_seller_datas_/'.$cat5[2]->id_seller.'/_publication/_service/'.$cat5[2]->name_image ); }else{echo base_url('/_seller_datas_/'.$cat5[2]->id_seller.'/_publication/_product/'.$cat5[2]->name_image );} ?>" alt="Chicago" >
                                    <p><a href="<?= base_url('seller/'.$cat5[2]->id_seller)?>" style="color : black; font-size: 12px;"><?= $cat5[2]->name_shop ?></a></p>
                                    <!--ul class="seee">
                                          <li class="ls"><i class="fa fa-share-alt fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                          <li class="ls"><i class="fas fa-comment-alt fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                          <li class="ls"><i class="far fa-bookmark fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                  </ul-->  
                                    <p class="prix"> <?= $cat5[2]->price ?> $ </p>
                                    <a  id="moreinfo" href="<?= base_url('more/').$cat5[2]->id_article ?>" class="button-btn"><?= $this->lang->line('home_more') ?></a><a  id="moreinfo" href="<?= base_url('more/').$cat2[0]->id_article ?>" class="button-btn"><?= $this->lang->line('home_more') ?></a>
                                </div>
                      </div>
  
              <div class="carousel-caption">
              
              </div>   
      </div>
      
      <div class="carousel-item">
                        <div class="conteiner_im" style="display:flex;justify-content: center;">
                                  <div class="im">
                            
                                          <div class="cara">
                                            <h1><?= $cat5[3]->name_article?></h1>
                                          </div>
                                  
                                  <img src="<?php if($cat5[3]->type_a == 'service'){ echo base_url('/_seller_datas_/'.$cat5[3]->id_seller.'/_publication/_service/'.$cat5[3]->name_image ); }else{echo base_url('/_seller_datas_/'.$cat5[3]->id_seller.'/_publication/_product/'.$cat5[3]->name_image );} ?>" alt="Chicago" >
                                  <p><a href="<?= base_url('seller/'.$cat5[3]->id_seller)?>" style="color : black; font-size: 12px;"><?= $cat5[3]->name_shop ?></a></p>
                                  <!--ul class="seee">
                                        <li class="ls"><i class="fa fa-share-alt fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                        <li class="ls"><i class="fas fa-comment-alt fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                        <li class="ls"><i class="far fa-bookmark fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                </ul-->  
                                  <p class="prix"> <?= $cat5[3]->price ?> $ </p>
                                  <a  id="moreinfo" href="<?= base_url('more/').$cat5[3]->id_article ?>" class="button-btn"><?= $this->lang->line('home_more') ?></a><a  id="moreinfo" href="<?= base_url('more/').$cat2[0]->id_article ?>" class="button-btn"><?= $this->lang->line('home_more') ?></a>
                              </div>
                                  <div class="im">
                                    
                                      <h1><?= $cat5[4]->name_article?></h1>
                                      
                                      <img src="<?php if($cat5[4]->type_a == 'service'){ echo base_url('/_seller_datas_/'.$cat5[4]->id_seller.'/_publication/_service/'.$cat5[4]->name_image ); }else{echo base_url('/_seller_datas_/'.$cat5[4]->id_seller.'/_publication/_product/'.$cat5[4]->name_image );} ?>" alt="Chicago" >
                                      <p><a href="<?= base_url('seller/'.$cat5[4]->id_seller)?>" style="color : black; font-size: 12px;"><?= $cat5[4]->name_shop ?></a></p>
                                      <!--ul class="seee">
                                        <li class="ls"><i class="fa fa-share-alt fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                        <li class="ls"><i class="fas fa-comment-alt fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                        <li class="ls"><i class="far fa-bookmark fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                       </ul-->  
                                       <p class="prix"> <?= $cat5[4]->price ?> $ </p>
                                      <a  id="moreinfo" href="<?= base_url('more/').$cat5[4]->id_article ?>" class="button-btn"><?= $this->lang->line('home_more') ?></a><a  id="moreinfo" href="<?= base_url('more/').$cat2[0]->id_article ?>" class="button-btn"><?= $this->lang->line('home_more') ?></a>
                                  </div>
                                  <div class="im">
                                    
                                      <h1><?= $cat5[5]->name_article?></h1>
                                      
                                      <img src="<?php if($cat5[5]->type_a == 'service'){ echo base_url('/_seller_datas_/'.$cat5[5]->id_seller.'/_publication/_service/'.$cat5[5]->name_image ); }else{echo base_url('/_seller_datas_/'.$cat5[5]->id_seller.'/_publication/_product/'.$cat5[5]->name_image );} ?>" alt="Chicago" >
                                      <p><a href="<?= base_url('seller/'.$cat5[5]->id_seller)?>" style="color : black; font-size: 12px;"><?= $cat5[5]->name_shop ?></a></p>
                                      <!--ul class="seee">
                                        <li class="ls"><i class="fa fa-share-alt fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                        <li class="ls"><i class="fas fa-comment-alt fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                        <li class="ls"><i class="far fa-bookmark fara-icone" style="font-size:14px;color:#0092da;"></i></li>
                                       </ul-->  
                                       <p class="prix"> <?= $cat5[5]->price ?> $ </p>
                                      <a  id="moreinfo" href="<?= base_url('more/').$cat5[4]->id_article ?>" class="button-btn"><?= $this->lang->line('home_more') ?></a><a  id="moreinfo" href="<?= base_url('more/').$cat2[0]->id_article ?>" class="button-btn"><?= $this->lang->line('home_more') ?></a>
                                  </div>
                  </div>


                        <div class="carousel-caption">

                        </div>   
    </div>   
    </div>
  
  </div>
  <?php
  }
  ?>







































<!-- banniere -->
    
<div class="homeshows" style="height: 300px; width:95%;margin-left:2.5vw;">
  <img class="mySlidess" src="<?= base_url('images/banniere.PNG');?>" style="width:100%"> 
</div>



<!-- troisieme defilement -->
    <!--div class="carousel-item">
                          <div class="conteiner_im" style="display:flex;justify-content: center;">
                            <div class="im">
                          
                                        <div class="cara">
                                          <h1>Pantouro</h1>
                                        </div>
                                
                                <img src="<?= base_url('images/slide4.jpg'); ?>" alt="Chicago" >
                                <p style="font-size: 12px;">Nom boutique</p>
                                <ul class="seee">
                                        <li class="ls"><i class="fa fa-share-alt" style="font-size:14px;color:#0092da;"></i></li>
                                        <li class="ls"><i class="fas fa-comment-alt" style="font-size:14px;color:#0092da;"></i></li>
                                        <li class="ls"><i class="far fa-bookmark" style="font-size:14px;color:#0092da;"></i></li>
                                </ul>  
                                <p class="prix"> Prix </p>
                                <button class="button-btn">Info</button>
                            </div>
                            <div class="im">
                              
                                  <h1>Pantouro</h1>
                                
                                <img src="<?= base_url('images/slide2.jpg'); ?>" alt="Chicago" >
                                <p style="font-size: 12px;">Nom boutique</p>
                                <ul class="seee">
                                        <li class="ls"><i class="fa fa-share-alt" style="font-size:14px;color:#0092da;"></i></li>
                                        <li class="ls"><i class="fas fa-comment-alt" style="font-size:14px;color:#0092da;"></i></li>
                                        <li class="ls"><i class="far fa-bookmark" style="font-size:14px;color:#0092da;"></i></li>
                                </ul>  
                                <p class="prix"> Prix </p>
                                <button  class="button-btn">Info</button>
                            </div>
                            <div class="im">
                          
                                  <h1>Pantouro</h1>
                            
                                <img src="<?= base_url('images/slide1.jpg'); ?>" alt="Chicago">
                                <p style="font-size: 12px;">Nom boutique</p>
                                <ul class="seee">
                                        <li class="ls"><i class="fa fa-share-alt" style="font-size:14px;color:#0092da;"></i></li>
                                        <li class="ls"><i class="fas fa-comment-alt" style="font-size:14px;color:#0092da;"></i></li>
                                        <li class="ls"><i class="far fa-bookmark" style="font-size:14px;color:#0092da;"></i></li>
                                </ul>  
                                <p class="prix"> Prix </p>
                                <button  class="button-btn">Info</button>
                            </div>
                    </div>

      <div class="carousel-caption">
      
      </div>   
    </div-->
  </div>

</div>
<div class="he" style="height:0px"></div>
<style>
    .button-btn{
          margin-left:25px;
    }
  .im{
          padding:  0 8px;
          width:28vw;
          margin:5px;
          height: 250px;
          box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
  }
  .im img{
      width:19vw;
       height:85px;
       margin-top:5px
  }
  .button-btn{
      background-color:#0092da; 
      border:1px solid #0092da; 
      font-weight: bold;
      color:white;
      width: 18vw; 
      height: 50px;
      margin-left:3vw;
  }
  
  p{
      text-align:center;
      color:black;
  }
  h1{
      text-align: center;
      color:#0092da;
      font-size: 12px;
      width: 100%;
  }
  .info_parent{
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  width: 100%;
  margin:0;
  padding:0;
}
.but-voirplus{
  background-color:#0092da;
  color:white;
  border:1px solid #0092da;
}
.homeshows{
  visibility: hidden  ;
  background-color: white !important;
}
.moreinfo{
    text-align:center !important;
}
.ls{
    float:left; 
   display:none;
    margin-top:-1px;
}
.im:hover .ls{
    display:block;
}
@media all and (min-width:0px)  and (max-width:600px){
    .homeshows{
        visibility: visible;
    }
}
@media all and (min-width:0px) and (max-width:367px){
            .seee{
                    margin-left:-25px;
                    margin-top:-8px;
                   
            }
@media all and (min-width:0px) and (max-width:341px){}
            .ls{
                margin-left:2px;
                padding:0px 1px !important;
            }
}
@media all and (min-width:368px) and (max-width:600px){
            .seee{
                    margin-top:-12px;
                    margin-left:-12px;
            }
            .ls{
                    padding:0px 3px;
            }
            .fara-icone{
                  /* color:red !important;
                  font-size:20px !important; */
            }
           
          
}
@media all and (min-width:354px) and (max-width:367px){
            .prix{
              /* font-size:21px; */
            }
            .fara-icone{
                  /* color:red !important;
                  font-size:20px !important; */
            }
           
          
}
@media all and (min-width:411px) and (max-width:367px){
            .prix{
              /* font-size:21px; */
            }
            .fara-icone{
                  /* color:red !important;
                  font-size:20px !important; */
            }
           
          
}
@media all and (min-width:391px) and (max-width:414px){
        .fara-icone{
              
        }
          
}
 
           

          
@media all and (min-width:443px) and (max-width:600px){
            .im:hover .prix{
                    margin-top:45px;
                    
                    margin-right:5vw;
            }
            @media all and (min-width:350px) and (max-width:600px){
            .fara-icone{
                    /* padding:0px 15px; */
                    color:red;
            }
        
}
}

@media all and (min-width:420px) and (max-width:600px){
            
}
.conteiner_im{
    background-color:white
}
]
</style>
</body>
</html>