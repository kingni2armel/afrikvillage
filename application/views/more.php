  <!DOCTYPE html>
<html>
<head>
  <?php include_once('layout/lien_css.html'); ?>
    <?php include_once('layout/lien_js.html');?> 
  <title>Ajouter un article</title>
</head>
<body>
<?php $this->load->view('layout/header'); ?>

<div class="container" style="padding-top: 30px; padding-bottom: 100px;">
  <div class="row">
      <div class="col-sm-8">
        <div class="col-sm-12" style="margin-top: 50px;">
          <div class="card w-80">
            <div class="card-body">
  <?php 
  $req  = "SELECT a.id_article, a.id_category, a.type_a, a.name_article, a.description_article, a.price, a.date_publication, i.name_image ";
  $req .= "FROM article a, image_of_article i ";
  $req .= "WHERE a.id_article = i.id_article AND a.id_article=".$results[0]->id_article; 
  $query = $this->db->query($req);
  $row = $query->result(); 
  $count = $query->num_rows(); 
  ?> 
              <h5 class="card-title"><b><?= $row[0]->name_article ?></b></h5>
              <div class="row">
                <div class="col-sm-10">
                  <img src="<?php if($row[0]->type_a == 'service'){ echo base_url('/_seller_datas_/'.$results[0]->id_seller.'/_publication/_service/'.$row[0]->name_image ); }else{echo base_url('/_seller_datas_/'.$results[0]->id_seller.'/_publication/_product/'.$row[0]->name_image );} ?>" class="img-thumbnail <?php if($count > 1){echo 'd-flex d-none d-sm-flex';} ?>" alt="<?= $row[0]->name_article; ?>" id="image">
                </div>
                <div class="col-sm-2">
<?php 
$this->db->where('id_article',$row[0]->id_article);
$query = $this->db->get('image_of_article');
$get_img=$query->result();
if ($query->num_rows()>1) {
  # code...
foreach ($get_img as $img) {
?>
      <img src="<?php if($row[0]->type_a == 'service'){ echo base_url('/_seller_datas_/'.$results[0]->id_seller.'/_publication/_service/'.$img->name_image ); }else{echo base_url('/_seller_datas_/'.$results[0]->id_seller.'/_publication/_product/'.$img->name_image );} ?>" id="<?= 'img'.$img->id_image ?>" class="img-thumbnail" alt="<?= $row[0]->name_article; ?>"  onclick="changeImage(this)">
      <style type="text/css">
          #<?='img'.$img->id_image ?>{
            display: block;
          }
      </style>
      <script type="text/javascript">
          //var x = document.getElementById('<?= 'img'.$img->id_image ?>');
          var x = document.getElementById('image');
          function changeImage(element)
          {  
            var v = element.getAttribute("src"); 
            x.setAttribute("src", v);
          }
      </script>
<?php
}
}
?> 
                </div> 
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <p class="card-text">
                    <b><?= $this->lang->line('more_prix') ?> </b> <?php if($row[0]->price=='0'){echo '<span class="badge bg-success">Gratuit</span>';}else{echo $row[0]->price.' $';} ?></br> 
                    <b><?= $this->lang->line('more_date') ?> : </b>
                    <?php
                     $today = date('Y-m-d');
                     $date = date('Y-m-d',strtotime(strval($row[0]->date_publication))); 
                     $date1 = new DateTime($today);
                     $date2 = $date1->diff(new DateTime($date)); 
                     $nombreDeJour = $date2->days;
                     
                     switch ($nombreDeJour) {
                      case 0: 
                           if ($_SESSION['site_lang'] == 'french') {
                             echo 'Aujourd\'hui';
                           }
                           else{
                            echo 'to day';
                           } 
                         break;
                      case 1: 
                           if ($_SESSION['site_lang'] == 'french') {
                             echo 'hier';
                           }
                           else{
                            echo 'yesterday';
                           } 
                         break;
                      case 2: 
                           if ($_SESSION['site_lang'] == 'french') {
                             echo 'Il ya 2 jour';
                           }
                           else{
                            echo '2 day ago';
                           }
                           break;
                      case 3: 
                           if ($_SESSION['site_lang'] == 'french') {
                             echo 'Il ya 3 jour';
                           }
                           else{
                            echo '3 day ago';
                           }
                           break; 
                      case 4: 
                           if ($_SESSION['site_lang'] == 'french') {
                             echo 'Il ya 4 jour';
                           }
                           else{
                            echo '4 day ago';
                           }
                         break;
                      case 5: 
                           if ($_SESSION['site_lang'] == 'french') {
                             echo 'Il ya 5 jour';
                           }
                           else{
                            echo '5 day ago';
                           }
                         break;
                      case 6: 
                           if ($_SESSION['site_lang'] == 'french') {
                             echo 'Il ya 6 jour';
                           }
                           else{
                            echo '6 day ago';
                           }
                         break;
                      case 7: 
                           if ($_SESSION['site_lang'] == 'french') {
                             echo 'Il ya 7 jour';
                           }
                           else{
                            echo '7 day ago';
                           }
                         break;
                       default:
                         # code...
                         break;
                     }  
                      if ($nombreDeJour>7) {
                        if ($_SESSION['site_lang'] == 'french') {
                             echo 'Il ya 1 semaine';
                           }
                           else{
                            echo '1 week ago';
                           } 
                      }
                    ?>
                    <br><b><?= $this->lang->line('more_description') ?></b> <?= $row[0]->description_article; ?>
                  </p>
 <?php 
  if (isset($_SESSION['id_seller']) && $_SESSION['id_seller'] == $results[0]->id_seller) {
  ?>
  <a href="<?= base_url('del/'.$results[0]->id_article)?>" class="btn btn-danger"><?= $this->lang->line('more_deleteButton') ?></a>
  <?php
  }
  ?> 
                </div>
                <div class="col-sm-6">
                  <b><?= $this->lang->line('more_boutique') ?> <a href="<?= base_url('seller/'.$results[0]->id_seller)?>" style="color : black;"><?= $results[0]->name_shop ?></a> 
 <?php 
  if (isset($_SESSION['id_seller']) && $_SESSION['id_seller'] == $results[0]->id_seller) {
  $this->db->where('id_article',$id_article);
  $query = $this->db->get('see');
  $vues = $query->result();
  $vues = $vues[0]->views;
  ?>
  <br><b><i class="fa fa-eye" aria-hidden="true"></i></b> <?= $vues ?>
  <?php
  }
  if (isset($_SESSION['id_user'])) {
?>
                    <p><a href="#" class="btn btn-success"><i class="fa fa-phone" aria-hidden="true"></i> <?= $results[0]->phone_user ?></a></p>
<?php
  }
  else
  {
?>
                    <p><button class="voircontact" onclick="document.getElementById('id01').style.display='block'" style="width:auto;"><i class="fa fa-phone" aria-hidden="true"></i> <?= $this->lang->line('more_voirNumero') ?></button></p>

<?php
  }
  ?> 
                  
                </div>
              </div>
            </div>
          </div>
        </div> 
    </div>    
                 <div class="col-md-4" style="margin-top: 50px;"> 
          <div class="card w-80">
            <div class="btn-group"> 
              <a href="#" class="btn btn-primary" id="btn-contactvendeur"><?= $this->lang->line('more_contacterVendeur') ?></a> 
              <a href="#" class="btn btn-primary" id="btn-notervendeur"><?= $this->lang->line('more_noterVendeur') ?></a> 
            </div>
  <?php 
  if (isset($_SESSION['privilege'])) {
    if ($_SESSION['privilege']=='customer' || $_SESSION['privilege'] == 'seller' || $_SESSION['privilege'] == 'client') {
      # code...
  ?>
            <form method="post">
              <?php
if (validation_errors()) {
  echo '<div class="alert alert-danger" role="alert">'.validation_errors().'</div>';
}
              ?>
              <div class="card-body">
  <?php 
    if (isset($_SESSION['msg'])) {
     // echo '<div class="alert alert-danger" role="alert">'.$_SESSION['msg'].'</div>';
      unset($_SESSION['msg']);
    }
  ?>
              <div class="conteiner_message" id="conteiner-message">
                <h5 class="card-title"><?= $this->lang->line('more_envoyerMessage') ?></h5> <br>
                <textarea class="form-control" name="msg" value="<?= set_value('nom')?>" placeholder="Ecrivez votre message"></textarea><br>
                <button type="submit" class="btn btn-success"><?= $this->lang->line('more_envoyerButton') ?></button> 
              </div>
            </div>
            </form>
            <div class="conteiner_note" style="display: none;" id="conteiner-note" >
      
                        <form class="" action="" method="post">
            
              <div class="card-body">
                        
                            <h5 class="card-title" for=""><?= $this->lang->line('more_envoyerRemarque') ?></h5>
                      <div class="vv" id="">
                            <div class="rating"><!--
                            --><a id ="etoile1" class="t" href="#5" title="Donner 5 étoiles">☆</a><!--
                            --><a  id ="etoile2" class="t"  href="#4" title="Donner 4 étoiles">☆</a><!--
                            --><a  id ="etoile3" class="t"  href="#3" title="Donner 3 étoiles">☆</a><!--
                            --><a  id ="etoile4" class="t"  href="#2" title="Donner 2 étoiles">☆</a><!--
                            --><a  id ="etoile5" class="t"  href="#1" title="Donner 1 étoile">☆</a>
                        
                            </div>

                    </div>
                        <div class="ll">
                             <textarea class="form-control" name="note" value="<?= set_value('nom')?>" placeholder="Ecrivez votre message"></textarea><br>
                            <button type="submit" class="btn btn-success">Envoyer</button>
                        </div>
                      </div>
                        </form>
              </div>
  <?php
    }
  }
  ?> 
          </div>


<?php $this->load->view('layout/voir'); ?>
   
        </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Alert</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
       <!-- pop au cas ou il veux voir le numero du vendeur mais n'est pas connecte -->
      <div class="modal-body">
        Vous devez vous connecter pour avoir plus d'information sur les coordonnées de boutique !!!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        <a href="<?= base_url('connection/login') ?>" class="btn btn-success">Se connecter</a>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('layout/footer'); ?>

<script type="text/javascript">
    var myModal = document.getElementById('myModal');
    var myInput = document.getElementById('myInput');
    var noter_vendeur= document.getElementById('btn-notervendeur');
    var contact_vendeur= document.getElementById('btn-contactvendeur');
    var conteinerNote= document.getElementById('conteiner-note');
    var conteinerMessage= document.getElementById('conteiner-message');

        noter_vendeur.addEventListener('click',function(e){
            conteinerMessage.style.display="none";
            conteinerNote.style.display="block";
        })
        contact_vendeur.addEventListener('click',function(e){
            conteinerNote.style.display="none";
            conteinerMessage.style.display="block";
        })

    myModal.addEventListener('shown.bs.modal', function () {
      myInput.focus()
    })
</script>

<style>

        .conteiner_note{
          margin-top: -35px;  
        } 
        .voircontact{
          background-color: #0092da;
          border-radius: 5px;
          border:1px solid #0092da;
          color:white
        }
</style>

</body>
</html>