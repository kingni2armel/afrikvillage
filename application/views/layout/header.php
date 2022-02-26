<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

  <!-- bloc contenand la bare de navigation -->



  <?php 
  function debug($arg)
  {
    echo "<pre>";
    var_dump($arg);
    echo "</pre>";
  }
  if (!isset($_SESSION['site_lang'])) {
            $_SESSION['site_lang'] = 'french';
        }
//___somme des messages non lu de l'utilisateur 
  $msg_non_lu = '';
  if (isset($_SESSION['id_user'])) {
    $this->db->where('id_receiver',$_SESSION['id_user']);
    $this->db->where('statut',0);
    $query = $this->db->get('message');
    $query->result();
    $msg_non_lu = $query->num_rows();
  }
  ?>
  <nav class="navbar navbar-expand-md navbar-dark bg-primary">
    <div class="container-fluid">
      <!-- <button class="d-flex  d-lg-flex" id="sidebares" style="outline:none !important;border:none;border-radius:5px;height:2q5px" >&#9776;</button> -->
      <a style="margin-left: 5px;" class="navbar-brand" href="<?= base_url('home'); ?>"><img  src="<?php echo base_url().'images/agent.jpg';?>"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <!--li class="nav-item">
          <a class="nav-link active" aria-current="page" href="">Link1</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="">Link2</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">A propos</a>
        </li-->
        <!------------------------SECTION RESERVE AUX CATEGORIES------------------------->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?= $this->lang->line('header_categorie') ?>
          </a>
          <?php 
          $stmt = $this->db->get('category');
          ?>
          <ul class="dropdown-menu  aria-labelledby="navbarDropdownMenuLink">
            <?php 
            foreach ($stmt->result() as $row) {
              ?>
              <li>
                <a class="dropdown-item" href="<?= base_url('category/'.$row->id_category)?>"> 
                  <?php
                  $lang = $this->session->get_userdata('language'); 
                  if (isset($lang['site_lang']) && $lang['site_lang'] == "french") {;
                    $category = $row->name_category;
                  }
                  elseif(isset($lang['site_lang']) && $lang['site_lang'] == "english"){
                    $category = $row->name_category_en;
                  }//debug($lang);
 
                    echo '<i class="me-2 fa '.$row->icon.'" aria-hidden="true"></i>'.$category;
                   
                  ?>
                </a>
              </li>
              <?php
            }
            ?> 
          </ul>
        </li>
      </ul>
      <!-------------------SECTION RESERVE AU FORMULAIRE DE RECHERCHE--------------------->
      <form method="post" class="d-flex d-none d-lg-flex">
        <div class="input-group">
          <span class="input-group-text" id="basic-addon1">
            <i class="fa fa-map-marker" aria-hidden="true"></i>
          </span>
          <input class="form-control me-1" type="text" placeholder="<?= $this->lang->line('header_localisation') ?>" aria-label="Search" name="localisation">
        </div>  
        <div class="input-group">
          <span class="input-group-text" id="basic-addon1">
            <i class="fa fa-search" aria-hidden="true"></i>
          </span>   
          <input class="form-control me-1" type="text" placeholder="<?= $this->lang->line('header_recherche') ?>" aria-label="Search" name="element">
        </div> 
        <!--input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"-->
        <button class="btn btn-outline-primary me-2" type="submit" name="srch"><?= $this->lang->line('header_boutton-rechercher') ?></button>      
      </form> 
      <?php 
      if (isset($_SESSION['privilege'])) 
      {
        ?>
        <ul style="margin-left:20vw;" class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="me-1 fa fa-user fa-1x" aria-hidden="true"></i> 
              <?= $_SESSION['nom_user'].' '.$_SESSION['prenom_user'] ?>
              <?php 
              if ($msg_non_lu != 0) {
                echo '<span class="badge bg-danger">'.$msg_non_lu.'</span>';
              }
              ?>
            </a>
            <ul class="dropdown-menu  aria-labelledby="navbarDropdownMenuLink">
              <li>
                <a class="dropdown-item" href="<?= base_url('messagelist') ?>"> <i   class="me-2 fa fa-envelope" aria-hidden="true"></i><?= $this->lang->line('header_message') ?>
                <?php 
                if ($msg_non_lu != 0) {
                  echo '<span class="badge rounded-pill bg-danger">'.$msg_non_lu.'</span>';
                }
                ?>
              </a>
            </li> 
            <?php 
            if ($_SESSION['privilege'] == "seller") {
              ?>
              <li>
                <a class="dropdown-item" href="<?= base_url('publications') ?>"><i class="me-2 fa fa-paper-plane" aria-hidden="true"></i><?= $this->lang->line('header_publication') ?></a>
              </li> 
              <li>
                <a class="dropdown-item" href="#"><i class="me-2 fa fa-bullhorn" aria-hidden="true"></i><?= $this->lang->line('header_annonce') ?></a>
              </li> 
              <?php
            }
            ?>


            <li>
              <a class="dropdown-item" href="<?= base_url('myaccount') ?>"> <i class="me-2 fa fa-cog" aria-hidden="true"></i><?= $this->lang->line('header_compte') ?></a>
            </li>
            <li>
              <form method="post">
                <button class="dropdown-item" name="logout"><i class="me-2 fa fa-sign-out" aria-hidden="true"></i><?= $this->lang->line('header_deconnexion') ?></button>
              </form>
            </li> 
          </ul>
        </li>
      </ul>
      <?php
    }
    else
    {
      ?>
      <form class="d-flex me-2" method="post"> 
        <div class="d-grid gap-2 col-12 mx-auto">
            <button class="btn btn-outline-primary disabled" style="border:none;" name="signup" type="submit"><?= $this->lang->line('header_inscription') ?></button>
        </div>
      </form>
      <form class="d-flex me-2" method="post"> 
        <div class="d-grid gap-2 col-12 mx-auto">
          <button class="btn btn-outline-primary" name="connection" type="submit"><?= $this->lang->line('header_connexion') ?></button> 
        </div>
      </form> 
      <?php
    }
    ?>
    <form method="post">
      <button name="en" class="btn btn-primary"><u>EN</u></button>
      <button name="fr" class="btn btn-primary"><u>FR</u></button>
    </form>
  </div>
</div>
</nav>
              <?php  $this->load->view('layout/barre'); ?>
              <?php $this->load->view('layout/header_phone'); ?>  
             
<?php 
if (isset($_POST['connection'])) {
  redirect('login');
}
elseif(isset($_POST['signup'])){
  redirect('signin');
}
elseif(isset($_POST['logout'])){//___si l'utilisateur clique sur le bouton deconnection
  //___addresse du vendeur
                unset($_SESSION['id_user']); 
                unset($_SESSION['nom_user']);
                unset($_SESSION['prenom_user']); 
                unset($_SESSION['email_user']); 
                unset($_SESSION['phone_user']); 
                unset($_SESSION['sexe']); 
                //___addresse du client
                unset($_SESSION['id_address']); 
                unset($_SESSION['country']); 
                unset($_SESSION['city']); 
                unset($_SESSION['street']);  

                //___on verifie la valeur du privilege utilisateur
                if ($_SESSION['privilege'] == 'seller') 
                {
                    //___Si l'utilisateur est un vendeur, on charge les informations du vendeur dans les sessions... 
                    unset($_SESSION['id_seller']); 
                    unset($_SESSION['created_at']); 
                    //___information sur la boutique du vendeur
                    unset($_SESSION['id_shop']); 
                    unset($_SESSION['name_shop']); 
                    unset($_SESSION['street_shop']); 
                    unset($_SESSION['city_shop']); 
                    unset($_SESSION['description_shop']);  
                    unset($_SESSION['privilege']); 
                }
                else
                {
                    unset($_SESSION['privilege']); 
                } 
                 
  redirect(base_url());
}
?>

  
<!-- <div id="conts-sidebar">

  <button id="closesidebar">close</button>

  <img class="imagesidebar"  style ="width:100%;margin-top:10px"src="<?php  echo  base_url('images/sidebarimage.jpg');?>" alt="">
  <div class="container_liste" style=>

    <a href="<?php echo  base_url('about/apropos') ?>"><button  id="linksidebar">A propos</button></a>
    <button id="linksidebar">Nous contacter</button>
    <button id="linksidebar"id="">Ajouter une annonce</button>

  </div>     
           <div class="conteiner_search">
              <form action="" method="POST">
                     <div class="conteiner_parent_search">
                                 <div class="conteiner_input_search">
                                       <input class="input-btn-search" id ="" type="text"placeholder="Localisation">

                                          <input class="input-btn-search" type="search"placeholder="Rechercher">

                                          <input class="input-send-search" type="submit" value="Rechercher ">
                                </div>
                     </div>
              </form>
      </div>  

</div>   -->



<style>

  #closesidebar{
    border-radius:5px;
    width:10vw;
    border:none;
    background-color:#0092da;
    outline:none;  
    margin-top: 5px;
    color:white;
    margin-left: 5px;
    width: 90%;

  }
  .conteiner_search{
    visibility: hidden;
  }
  .input-send-search
  {
    border-radius:5px;
    width:10vw;
    border:none;
    outline:none;  
    background-color: #0092da;
    margin-top: 5px;
    color:white;
    margin-left: 5px;
    width: 90%;
  }
  .input-btn-search{
    border-radius:5px;
    width:90%;
    background-color:#fff;
    outline:none;  
    border: 2px solid #0092da;
    margin-top: 5px;
    color:black;
    margin-left: 5px;
  }
  #linksidebar{
    border-radius:5px;
    width:90%;
    border:none;
    background-color:#fff;
    outline:none;  
    background-color: #0092da;
    margin-top: 5px;
    color:white;
    margin-left: 5px;
  }
  li{
    list-style: none;
  }
  .imagesidebar{
    margin: 5px;
    padding-right: 15px;
    box-shadow: rgba(1, 1, 0, 0.5);
  }
  .ul_liste_sidebar{
    color:white;
    margin:0;
    padding:0
  }
  .ul_liste_sidebar:hover{
    color:red;
    transition: 2s;
  }
  #conts-sidebar{
    width: 20vw; 
    z-index: 1;
    margin-top:65px !important;
    position: fixed;
    top:0;
    left: 0;
    margin-right: -80px;
    /* background-color: #3c3c3c; */
    background-color: white;
    margin-top: 9vh;
    height: 100%;
    margin-left:-300px;
    /* border: 1px solid red; */

  }

  @media all and (min-width:0px) and (max-width:100000000px){

  }


  @media all  and (min-width:0px) and (max-width:767px){

    #conts-sidebar{
      margin-top:55px;
    }
  }

  @media all and (min-width:768px) and (max-width:991px){
   #conts-sidebar{
     margin-top:85px !important;
   }
 }

            /* .console{
                position: relative  !important;
                
                } */

                .lien:hover{
                  color:red !important;
                  transition: 1s !important;
                }

                @media all and (min-width:0px) and (max-width:767px){

                  #conts-sidebar{
                    width:200px;
                  }
                  #closesidebar{
                    width: auto;
                  }
                  
                }
                @media all and (min-width:0px) and (max-width:991px){
                      .conteiner_search{
                        visibility:visible !important;
                      }
                }


              </style>



              <script>
                var sidebare = document.getElementById('sidebares');
                var conts = document.getElementById('conts-sidebar');
                var close = document.getElementById('closesidebar');
                sidebare.addEventListener('click',function(e){

                  conts.style.marginLeft="0.3px";
                  conts.style.transition="ease 1s";
                })
                close.addEventListener('click',function(e){
                  conts.style.marginLeft="-300px";
                  conts.style.transition="ease 1s";
                })
              </script>


              <style>
                .navbar{
                  position: fixed;
                  top:0;
                  left:0;
                  width: 100%;
                  z-index:1;

                }   


              </style>

<!--div class="d-lg-none">hide on lg and wider screens</div>
  <div class="d-none d-lg-block">hide on screens smaller than lg</div-->


    <?php 
//___si l'utilisateur clique sur le bouton rechercher
    if (isset($_POST['srch'])) {
      $localisation = trim($_POST['localisation']);
      $element = trim($_POST['element']);
//___si l'utilisateur entre la localisation et un element de recherche
      if ($element != null && $localisation != null) {
        redirect('publication/search/'.$element.'/'.$localisation);
      }
//___si l'utilisateur entre l'element de recherche sans la localisation
      elseif($element !=null && $localisation == null){
        $localisation = 'null';
        redirect('publication/search/'.$element.'/'.$localisation);
      }
      else
      {
        redirect($_SERVER['HTTP_REFERER']);
      }
    }

//___si l'utilisateur clique sur FR
    if (isset($_POST['fr'])) {
      redirect('LanguageSwitcher/switchLang/french');
    }
    elseif(isset($_POST['en']))
    {
      redirect('LanguageSwitcher/switchLang/english');
    }

    ?>
  <style>
                .navbar{
                      position: fixed !important;
                }   
                /* .conteiner_search{
                    
                    position: fixed;
                    z-index: 1;
                    margin-top:-14px;
                    width: 100%;
                    visibility: hidden;
                   
                } */
                /* .conteiner_parent_search{
                  width: 100%;
                  display: flex;
                  justify-content: center;
                  margin-right: 15px !important;  
                  visibility: hidden  ;            
                 
                } */
              /* .input-btn-search{
                border-radius: 5px;
                border:1px solid none;
                outline:none;
                height: 38px;
                border:2px solid #0092da;
                padding-left: 2px;
                margin: 0 4px;
                
              }
              .input-send-search{
                border-radius: 5px;
                background-color: #0092da;
                color:white;
                border:none;
                height:38px;
                outline: none;
                              } */


              /* @media all and (min-width:0px) and (max-width:700px){
                .input-btn-search{
                          margin:5px 0;
                }
              }
              @media all and (min-width:0px)  and (max-width:450px){
                    .input-btn-search{
                      margin-left:15vw;
                    }       
              }
              @media all and (min-width:0px) and (max-width:991px){
                .conteiner_search{
                  visibility: visible;
                }
                .conteiner_parent_search{
                      visibility: visible;

                }
              } */
            
                @media all and (min-width:0px)  and  (max-width:600px){
                    .navbar{
                      display: none !important;
                    }
                }
               
        
    </style>
  </body>
  </html>



