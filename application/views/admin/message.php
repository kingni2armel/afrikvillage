<!DOCTYPE html>
<html lang="fr">
<head> 
    <title>Messages</title>
</head>
<body>
<?php $this->load->view('layout/headeradmin.php');?>
<div class="he" style="height:1px"></div>


<div class="container" style="padding-bottom: 50px;"> 
  <div class="row">  
<div class="col-sm-8" style="margin-top: 50px;">
<?php  
if (isset($_SESSION['msg'])) {
  echo '<div class="alert alert-warning" role="alert">'.$_SESSION['msg'].'</div>'; 
  unset($_SESSION['msg']);
} 


?> 
      <h3><?= $this->lang->line('msg_titlePage') ?></h3>
      <div class="panel panel-striped">  
                    <table class="table table-bordered" style="margin-top: 20px;
					box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

                    
                    "> 
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
                                      echo '<p><b>'.$sender[0]->nom_user.' '.$sender[0]->prenom_user.'</b></p><b>Mail : </b>'.$sender[0]->email_user; 
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
                                          <button type="submit" class="btn btn-success">Repondre</button>
                                          <!--a href="<?=base_url('account/del/'.$row->id_message) ?>" class="btn btn-danger"><?= $this->lang->line('msg_deleteButton') ?></a-->
                                      </form>
                                 </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div> 
               
      </div>
      <div class="col-sm-4" style="margin-top: 50px;"> 
        <div class="w-80">
          <div class="card-body">
            <h5 class="card-title"><u>Notice :</u> </h5>
            <p class="card-text">Vous pouvez repondre à votre correspondant, pour ce faire; entrer votre message dans la case adequate puis cliquez sur <b>"Envoyer une reponse"</b></p>
          </div>
        </div>
      </div>
    </div> 
  </div> 



 
        
          <style> 
          .w-80{
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

          }
                @media all and (min-width:0px)  and (max-width:600px){
                        .he{
                              height:70px !important;
                        }
                }
        </style>       
</body>
</html>