<!DOCTYPE html>
<html lang="en">
<head>
        <?php // include_once('layout/lien_css.html'); ?>
        <?php // include_once('layout/lien_js.html');?> 
    <title>Admin messages</title>
</head>
<body> 

<div class="container" style="padding-bottom: 50px;"> 
  <div class="row"> 

<div class="col-sm-8" style="margin-top: 50px;">
<?php  
if (isset($_SESSION['msg'])) {
  echo '<div class="alert alert-warning" role="alert">'.$_SESSION['msg'].'</div>'; 
  unset($_SESSION['msg']);
} 
$query = $this->db->where('id_receiver',$_SESSION['S_id_user']);
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
                    <table class="table table-bordered" style="margin-top: 20px;
					box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                    
                    "> 
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
                                    <?= '<b>'.$sender[0]->nom_user.' '.$sender[0]->prenom_user.'</b>' ?>   
                                </td>
                                <td> 
                                    <?php if($row->statut == 0){echo '<b>'.$row->content.'</b>';}else{echo $row->content;} ?>
                                </td>
                                <td> 
                                  <?php if($row->statut == 0){echo '<b>'.$row->date_message.'</b>';}else{echo $row->date_message;} ?>  
                                </td>
                                <td>
                                    <a class="btn btn-xs badge rounded-pill btn-success rounded me-2" href="<?= base_url('admin/message/'.$row->id_message )?>"><i class="fa fa-eye"></i> <?= $this->lang->line('message_view') ?></a> 

                                    <!--a class="btn btn-xs badge rounded-pill btn-danger rounded" href="<?=base_url('account/del/'.$row->id_message) ?>"><i class="fa fa-trash"></i></a-->
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
                                          <?= $this->pagination_bootstrap->render() ?>
                                    </div>
                                 </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div> 
               
      </div>
    </div>

  </div>
</div> 

 
<?php
                $this->load->view('/layout/footer.php'); 
?>
         
                
</body>
</html>
