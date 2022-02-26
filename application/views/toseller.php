<?php ;
if (!isset($_SESSION['id_user'])) {
  redirect(base_url('connection/login'));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <?php include_once('layout/lien_css.html'); ?>
        <?php include_once('layout/lien_js.html');?> 
    <title>Document</title>
</head>
<body>
             <?php $this->load->view('layout/header.php');?>

<div class="container" style="padding-bottom: 50px;"> 


  <div class="row"> 
    <div class="col-sm-8" style="margin-top: 50px;">
      <h1><?= $this->lang->line('toseller_title') ?></h1>
<?php
if (validation_errors()) {
  echo '<div class="alert alert-danger" role="alert">'.validation_errors().'</div>';
}
?>
<!--information sur la boutique du vendeur-->                                  
        <form method="post">  
                <div class="row mb-3">
                    <div class="col">
                      <input type="text" class="form-control" name="nom" placeholder="<?= $this->lang->line('toseller_nom') ?>" value="<?= set_value('nom') ?>">
                    </div>
                    <div class="col">
                      <input type="text" class="form-control" name="ville" placeholder="<?= $this->lang->line('toseller_ville') ?>" value="<?= set_value('ville') ?>">
                    </div>
                </div> 
                <div class="row mb-3">
                    <div class="col">
                      <input type="text" class="form-control" name="rue" placeholder="<?= $this->lang->line('toseller_rue') ?>" value="<?= set_value('rue') ?>">
                    </div>
                </div>  
                  <div class="input-group mb-3">  
                    <textarea class="form-control" name="description" placeholder="<?= $this->lang->line('toseller_description') ?>"><?= set_value('description') ?></textarea>
                  </div> 
 <div class="col-sm-8">
	
                <button type="submit" name="submit" class="btn btn-success" style="margin-top:20px;"><?= $this->lang->line('toseller_submit') ?></button>
          <button type="reset" class="btn btn-danger" style="margin-top: 20px;"><?= $this->lang->line('toseller_reset') ?></button> 
</div>
            </form>
                </div>
      <div class="col-sm-4" style="margin-top: 50px;">  
      <div class="col-sm-12" >  
        	<div class="card w-80">
          <div class="card-body">
            <h5 class="card-title"><?= $this->lang->line('toseller_notice') ?></h5>
            <p class="card-text"><?= $this->lang->line('toseller_guide') ?></p>
          </div>
        </div> 
    </div>
      </div>
      </div>
    </div>
  </div> 



         


   

  
 
</form>
<?php
                $this->load->view('/layout/footer.php'); 
?>
         
                
</body>
</html>