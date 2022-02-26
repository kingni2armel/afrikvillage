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
      <h1>Total catégories (<?= $count ?>)</h1>
      <div class="panel panel-striped">  
                    <table class="table table-bordered" style="margin-top: 20px;
					box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

                    "> 
                        <thead>
                            <tr>
                                <th>Icones</th>
                                <th>Categorie FR</th>
                                <th>Categorie EN</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody> 
<?php  

foreach ($data as $row) {
?>
                            <tr class="table-light">
                              <td><?=  '<i class="fa '.$row->icon.'" aria-hidden="true"></i>' ?></td>
                              <td><?= $row->name_category ?></td>
                              <td><?= $row->name_category_en ?></td> 
                                <td>
                                    <a class="btn btn-xs badge rounded-pill btn-primary rounded me-2" href="<?= base_url('admin/edit_category/').$row->id_category?>"><i class="fa fa-pencil"></i> editer</a> 
                                    <a class="btn btn-xs badge rounded-pill btn-danger rounded" href="<?= base_url('admin/del_category/').$row->id_category?>"><i class="fa fa-trash"></i></a>
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
      <div class="col-sm-4" style="margin-top: 50px;">
        <div class=" text-dark bg-light mb-3" style="max-width: 18rem;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
">
            <div class="card-header">AJOUTER UNE CATEGORIE <i class="fa  fa-plus-circle" aria-hidden="true"></i></div>
            <div class="card-body">
                <!--h5 class="card-title">NOTE</h5-->
                <p class="card-text">Pour ajouter une nouvelle categorie, veuillez cliquer <a href="<?= base_url('admin/add_category') ?>" target="_blank">ici</a>.</p>
            </div>
</div>
        </div>
    </div>  
  </div>
</div> 



<?php
                //$this->load->view('/layout/footer.php'); 
?>
         
                
</body>
</html>