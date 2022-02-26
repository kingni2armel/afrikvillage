<?php 
if (!isset($_SESSION['id_user'])) {
  echo $_SESSION['id_user'];
  redirect(base_url('connection/login'));
}  
?>
<!DOCTYPE html>
<html lang="fr">
<head>
        <?php include_once('layout/lien_css.html'); ?>
        <?php include_once('layout/lien_js.html');?> 
    <title>Messages</title>
</head>
<body>
<?php $this->load->view('layout/header.php');?>
<div class="he" style="height:1px"></div>


<div class="container" style="padding-bottom: 50px;"> 
  <div class="row"> 
<?php  
if(isset($_SESSION['privilege']) && $_SESSION['privilege']=='seller'){
?>
<div class="col-sm-8" style="margin-top: 50px;">
<?php  
if (isset($_SESSION['msg'])) {
  echo '<div class="alert alert-warning" role="alert">'.$_SESSION['msg'].'</div>'; 
  unset($_SESSION['msg']);
} 


?> 
      <h3><?= $this->lang->line('msg_titlePage') ?></h3>
      <div class="panel panel-striped">  
                    <table class="table table-bordered" style="margin-top: 20px;"> 
                        <thead>
                            <tr>
                                <th><?= $this->lang->line('msg_expColumn') ?></th>
                                <th><?= $this->lang->line('msg_message') ?></th> 
                            </tr>
                        </thead>
                        <tbody>
<?php
if (isset($results)) {
?>
  <?php foreach ($results as $row): ?> 
                            <tr class="table-light">
                                <td> 
                                    <?php  
                                      if ($sender[0]->nom_user == "Afric" && $sender[0]->prenom_user == "Village") {
                                        echo '<b><p style="color : blue;">'.$sender[0]->nom_user.' '.$sender[0]->prenom_user.'</p></b>';
                                      }
                                      else{
                                        echo '<b>'.$sender[0]->nom_user.' '.$sender[0]->prenom_user.'</b>';
                                      }  
                                      echo '<b>Mail : </b>'.$sender[0]->email_user; 
                                    ?>   
                                </td>
                                <td> 
                                    <?php echo $row->content; ?>

                                    <br><br><b><?= $this->lang->line('msg_date') ?> </b> <?= date('Y-m-d',strtotime(strval($row->date_message))) ?><b>  <?= $this->lang->line('msg_prep') ?></b> <?= date('H:i',strtotime(strval($row->date_message))) ?>
                                </td>  
                            </tr>
  <?php endforeach ?> 
<?php
}
else
{
?> 
<tr class="table-light">
  <td colspan="4" height="150"><center><b>Vous n'avez aucun nouveau message !</b></center></td>
</tr>
<?php  
}
?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="text-center" colspan="5">
                                    <h5>Envoyer une reponce</h5>
                                    <div class="row justify-content-center">
                                      <form method="post">
                                          <div class="input-group mb-3">
                                              <input class="form-control " readonly name="receiver" value="<?= $sender[0]->email_user ?>">
                                          </div>
                                        <div class="input-group mb-3">
                                          <textarea class="form-control" name="msg" placeholder="Envoyer une reponse"></textarea>
                                        </div>
                                          <button type="submit" class="btn btn-success"><?= $this->lang->line('msg_replyButton') ?></button>
                                          <a href="<?=base_url('delmsg/'.$row->id_message) ?>" class="btn btn-danger"><?= $this->lang->line('msg_deleteButton') ?></a>
                                      </form>
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
            <h5 class="card-title"><u>Notice :</u> </h5>
            <p class="card-text">Vous pouvez reponde à votre correspondant, pour ce faire; entrer votre message dans la case adequate puis cliquez sur <b>"Envoyer une reponse"</b></p>
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



<?php
                $this->load->view('/layout/footer.php'); 
?>
        
          <style> 
                @media all and (min-width:0px)  and (max-width:600px){
                        .he{
                              height:70px !important;
                        }
                }
        </style>       
</body>
</html>