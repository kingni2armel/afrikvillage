<!DOCTYPE html>
<html lang="en">
<head> 
    <title>Document</title>
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
?> 
      <h1>Total clients (<?= $count ?>)</h1>
      <div class="panel panel-striped">  
                    <table class="table table-bordered" style="margin-top: 20px;
					box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

                    "> 
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Address email</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody> 
<?php  

foreach ($data as $row) {
?>
                            <tr class="table-light">
                              <td><?= $row->nom_user ?></td>
                              <td><?= $row->prenom_user ?></td>
                              <td><?= $row->email_user ?></td> 
                                <td>
                                    <a class="btn btn-xs badge rounded-pill btn-success rounded me-2" href="<?= base_url('admin/info_user/').$row->id_user ?>"><i class="fa fa-plus-circle"></i> info</a> 
                                    <a class="btn btn-xs badge rounded-pill btn-primary rounded me-2" href="<?= base_url('admin/edit_user/').$row->id_user ?>"><i class="fa fa-pencil"></i> Edit</a> 
                                    <!--a class="btn btn-xs badge rounded-pill btn-danger rounded" href=""><i class="fa fa-trash"></i></a-->
                                </td> 
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
    </div>  
  </div>
</div> 



<?php
                $this->load->view('/layout/footer.php'); 
?>
         
                
</body>
</html>