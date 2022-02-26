<?php 
if (!isset($_SESSION['id_user'])) {
  redirect(base_url('connection/login'));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <?php include_once('layout/lien_css.html'); ?>
        <?php include_once('layout/lien_js.html');?> 
    <title>Messages</title>
</head>
<body> 
             
 <div class="he" style="height:50px"></div>

<div class="container"> 
  <div class="row"> 
<?php  
if(isset($_SESSION['privilege']) && $_SESSION['privilege']=='seller' || $_SESSION['privilege']=='customer'){
?>
<div class="col-sm-8" >
<?php  
if (isset($_SESSION['msg'])) {
  echo '<div class="alert alert-warning" role="alert">'.$_SESSION['msg'].'</div>'; 
  unset($_SESSION['msg']);
} 
$query = $this->db->where('id_receiver',$_SESSION['id_user']);
$query = $this->db->where('statut',0);
$query = $this->db->get('message');
$query->result();
$r = $query->num_rows();
?> 
      <h3>
        <?= $this->lang->line('message_titlePage') ?>
<?php 
if ($r>0) {
?>
        <span class="badge rounded-pill bg-danger"> <?= $r ?></span>
<?php
}
?>
      </h3>
      <div class="panel panel-striped">  
                    <table class="table table-bordered" style="margin-top: 20px;"> 
                        <thead>
                            <tr>
                                <th><?= $this->lang->line('message_expColumn') ?></th>
                                <th><?= $this->lang->line('message_msgColumn') ?></th>
                                <th><?= $this->lang->line('message_date') ?></th>
                                <th><?= $this->lang->line('message_option') ?></th>
                            </tr>
                        </thead>
                        <tbody>
<?php  
if (isset($results)) {
  $usr = new utilisateur;
?>
  <?php foreach ($results as $row): 
  $this->db->where('id_user', $row->id_sender);
  $query = $this->db->get('utilisateur');
  $sender = $query->result();
  //___instanciation de l'objet expediteur
                $user = new utilisateur;
                $user->setNomUser($sender[0]->nom_user);
                $user->setPrenomUser($sender[0]->prenom_user); 
  ?> 
                            <tr class="table-light">
                                <td> 
                                    <?php 
                                      if ($sender[0]->nom_user == "Afric" && $sender[0]->prenom_user == "Village") {
                                        echo '<b><p style="color : blue;">'.$sender[0]->nom_user.' '.$sender[0]->prenom_user.'</p></b>';
                                      }
                                      else{
                                        echo '<b>'.$sender[0]->nom_user.' '.$sender[0]->prenom_user.'</b>';
                                      }
                                    ?>
                                </td>
                                <td> 
                                    <?php if($row->statut == 0){echo '<b>'.$row->content.'</b>';}else{echo $row->content;} ?>
                                </td>
                                <td> 
                                  <?php if($row->statut == 0){echo '<b>'.$row->date_message.'</b>';}else{echo $row->date_message;} ?>  
                                </td>
                                <td>
                                    <a class="btn btn-xs badge rounded-pill btn-success rounded me-2" href="<?= base_url('message/'.$row->id_message )?>"><i class="fa fa-eye"></i> <?= $this->lang->line('message_view') ?></a> 

                                    <a class="btn btn-xs badge rounded-pill btn-danger rounded" href="<?=base_url('delmsg/'.$row->id_message) ?>"><i class="fa fa-trash"></i></a>
                                </td> 
                            </tr>
  <?php endforeach ?> 
<?php
}
else
{
?> 
<tr class="table-light">
  <td colspan="4" height="150"><center><b><?= $this->lang->line('message_actu') ?></b></center></td>
</tr>
<?php  
}
?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="text-center" colspan="5">
                                    <div class="row justify-content-center">
                                        <div class="col-4">
                                          <?php //$this->pagination_bootstrap->render() ?>
                                    </div>
                                 </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div> 
               
      </div>
      <div class="col-sm-4" style="margin-top: 50px;"> 
        <div class="card w-80">
          <div class="card-body">
            <h5 class="card-title"><?= $this->lang->line('message_addArticle') ?></h5>
            <p class="card-text"><?= $this->lang->line('message_guide') ?></p>
            <a href="<?= base_url('addarticle')?>" class="btn btn-primary"><?= $this->lang->line('message_addArticleButton') ?></a>
          </div>
        </div>
      </div>
    </div>
<?php
}
else
{
?>
<div class="col-sm-8" style="margin-top: 50px;">
  <h1>category</h1>
</div>
<div class="col-sm-4" style="margin-top: 50px;"> 
  <h1>publicité</h1>
        <!--div class="card w-80">
          <div class="card-body">
            <h5 class="card-title">Publier un nouvel article</h5>
            <p class="card-text">Vous pouvez ajouter un nouvel article en cliquant sur le bouton.</p>
            <a href="<?= base_url('publication/addarticle')?>" class="btn btn-primary">Ajouter un nouvel article</a>
          </div>
        </div-->
</div>
<?php
}
?>
  </div>
</div> 


<?php $this->load->view('layout/comment');?>
<?php
               if (empty($_SESSION['S_id_user'])) {
                  $this->load->view('/layout/footer.php'); 
               }
?>
      <style>
        @media all and (min-width:0px) and  (max-width:600px){
            .he{
                margin-top:50px;
            }
        }
</style>   
                
</body>
</html>
