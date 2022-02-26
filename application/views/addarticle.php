<!DOCTYPE html>
<html>
<head>
	<?php include_once('layout/lien_css.html'); ?>
    <?php include_once('layout/lien_js.html');?> 
	<title>Ajouter un article</title>
</head>
<body>
<?php $this->load->view('layout/header'); ?>
<div class="he" style="height:1px"></div>


<div class="container" style="padding-top: 30px; padding-bottom: 30px;">
	<div class="row">  
  <div class="col-sm-8">
		<h2><?= $this->lang->line('addarticle_title') ?></h2>

		<form method="post" enctype="multipart/form-data" action="">
<?php
if (validation_errors()) {
  echo '<div class="alert alert-danger" role="alert">'.validation_errors().'</div>';
}
if (isset($_SESSION['msg'])) {
  echo '<div class="alert alert-danger" role="alert">'.$_SESSION['msg'].'</div>';
  unset($_SESSION['msg']);
}
?>
                <div class="row mb-3">
                  <div class="col">  
                    <select name="type" class="form-control">
<?php 
/*if ($_POST['type'] != '') {
?>
                                      <option><?= set_value('type')?></option>
<?php
}
else
{
?>

<?php
}*/
?>
                                      <option value=""><?= $this->lang->line('addarticle_type') ?></option>
                                      <option value="product"><?= $this->lang->line('addarticle_produit') ?></option>
                                      <option value="service"><?= $this->lang->line('addarticle_service') ?></option>
                              </select>
                </div> 
                <div class="col">  
                    <select name="category" class="form-control">
                                      <option value=""><?= $this->lang->line('addarticle_category') ?></option>
<?php 
$stmt = $this->db->get('category'); 
foreach ($stmt->result() as $row) {
  if (isset($_SESSION['site_lang']) && $_SESSION['site_lang']=='french') {
    $category = $row->name_category;
?>
<option value="<?= $row->id_category?>"><?= $row->name_category ?></option>
<?php
  }
  else
  {
?>
<option value="<?= $row->id_category?>"><?= $row->name_category_en ?></option>
<?php
  }
}
//$stmt = $stmt->num_rows();debug($stmt);
?> 
                              </select>
                </div> 
                </div>
                <div class="row mb-3">
                    <div class="col">
                      <input type="text" class="form-control" name="article" placeholder="<?= $this->lang->line('addarticle_name') ?>" value="<?= set_value('rue')?>">
                    </div> 
                    <div class="col input-group mb-3">
                      <span class="input-group-text" id="basic-addon1">
                        <i class="fa fa-usd" aria-hidden="true"></i>
                      </span>
                      <input type="text" class="form-control" name="prix" placeholder="<?= $this->lang->line('addarticle_prix') ?>" value="<?= set_value('pobox')?>">
                    </div>
                </div>
                <div class="input-group mb-3">  
                    <input type="file" class="form-control" name="files[]" multiple>
                </div>  
                <div class="input-group mb-3">  
                    <textarea class="form-control" name="description" placeholder="<?= $this->lang->line('addarticle_description') ?>"></textarea></div> 
                <button type="submit" name="submit" value="submit" class="btn btn-success" style="margin-top:20px;"><?= $this->lang->line('addarticle_submit') ?></button>
          <button type="reset" class="btn btn-danger" style="margin-top: 20px;"><?= $this->lang->line('addarticle_reset') ?></button> 
            </form>
	</div>
  <div class="col-sm-4">
          <div class="card w-80">
              <div class="card-body">
                  <h5 class="card-title">Guide de publication</h5>
                  <p class="card-text">1->Bien vouloir indiqué si votre article est un produit ou un service</p>
                  <p class="card-text">2->Bien vouloir selectionner une categorie qui correspond a votre article</p>
                  <p class="card-text">3->Bien vouloir renseigner le prix de votre article (ne rien mettre si votre article est gratuit)</p>
                  <p class="card-text">4->Selectionnez les images de votre article (au plus 5 images au format jpeg, jpg, png; d'une maximale de 1000x1000 et 2.4Mo)</p>
                  <p class="card-text">5->Ajouter une description a votre article puis cliquez sur <b>"Publier mon article"</b></p>
                  <a href="<?= base_url('addarticle')?>" class="btn btn-primary"><?= $this->lang->line('publication_addArticleButton') ?></a>
              </div>
          </div>
  </div>

  </div>

</div>


<?php $this->load->view('layout/footer'); ?>
<style> 
                @media all and (min-width:0px)  and (max-width:600px){
                        .he{
                              height:110px !important;
                        }
                }
        </style> 
</body>
</html>