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


<div class="container" style="padding-top: 30px; padding-bottom: 100px;">
<div class="row">
    <div class="col-sm-8">
    <div class="col-sm-12" style="margin-top: 50px;"> 
        <div class="card w-80">
          <div class="card-body">
<?php 
$req  = "SELECT a.id_article, a.id_category, a.type_a, a.name_article, a.description_article, a.price, a.date_publication, i.name_image ";
$req .= "FROM article a, image_of_article i ";
$req .= "WHERE a.id_article = i.id_article AND a.id_article=".$id_article; 
$query = $this->db->query($req);
$row = $query->result(); 
$count = $query->num_rows();
?> 
            <h5 class="card-title"><b><?= $row[0]->name_article ?></b></h5>

            <div class="row">
              <div class="col-sm-10">
                <img src="<?php if($row[0]->type_a == 'service'){ echo base_url('/_seller_datas_/'.$_SESSION['id_seller'].'/_publication/_service/'.$row[0]->name_image ); }else{echo base_url('/_seller_datas_/'.$_SESSION['id_seller'].'/_publication/_product/'.$row[0]->name_image );} ?>" class="img-thumbnail  <?php if($count==1){echo 'd-flex d-block';}else{echo 'd-flex d-none d-md-flex';}?>" alt="<?= $row[0]->name_article; ?>" id="image">  
              </div>
              <div class="col-md-2">
<?php 
$this->db->where('id_article',$row[0]->id_article);
$query = $this->db->get('image_of_article');
$get_img=$query->result();
if ($query->num_rows()>1) {
  # code...
foreach ($get_img as $img) {
?>
      <img src="<?php if($row[0]->type_a == 'service'){ echo base_url('/_seller_datas_/'.$_SESSION['id_seller'].'/_publication/_service/'.$img->name_image ); }else{echo base_url('/_seller_datas_/'.$_SESSION['id_seller'].'/_publication/_product/'.$img->name_image );} ?>" class="img-thumbnail" alt="<?= $row[0]->name_article; ?>" id="<?= 'img'.$img->id_image ?>" onclick="changeImage(this)">  

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
                <p class="card-text"><b>Description :</b> <?= $row[0]->description_article; ?>
                <br><b>Type :</b> <?= $row[0]->type_a; ?>
                <br><b><?= $this->lang->line('info_prix') ?> </b> <?php if($row[0]->price=='0'){echo '<span class="badge bg-success">Gratuit</span>';}else{echo $row[0]->price.' <i class="fa fa-usd" aria-hidden="true"></i>';} ?>
                <br><b><?= $this->lang->line('info_categorie') ?></b> <?= $row[0]->id_category; ?></p>
 <?php  
  $this->db->where('id_article',$id_article);
  $query = $this->db->get('see');
  $vues = $query->result();
  $vues = $vues[0]->views;
  ?>
  <b><i class="fa fa-eye" aria-hidden="true"></i> <?= $vues ?></b> 
                <p class="card-text"><b><?= $this->lang->line('info_date') ?></b> <?= date('Y-m-d',strtotime(strval($row[0]->date_publication))); ?> <b> à :</b> <?= date('H:i',strtotime(strval($row[0]->date_publication))); ?> </p>
                <a href="<?= base_url('del/'.$id_article)?>" class="btn btn-danger"><?= $this->lang->line('info_deleteButton') ?></a> 
              </div>
                <div class="col-sm-6"> 
                 </div>
            </div>
          </div>
        </div>
      </div> 
  </div>
  <div class="col-sm-4" style="margin-top: 50px;"> 
        <div class="card w-80">
          <div class="card-body">
            <h5 class="card-title"><?= $this->lang->line('info_addArticle') ?></h5>
            <p class="card-text"><?= $this->lang->line('info_guide') ?></p>
            <a href="<?= base_url('addarticle')?>" class="btn btn-primary"><?= $this->lang->line('info_addArticleButton') ?></a>
          </div>
        </div>
      </div>
</div>
</div>


<?php $this->load->view('layout/footer'); ?>
<style> 
                @media all and (min-width:0px)  and (max-width:600px){
                        .he{
                              height:70px !important;
                        }
                }
        </style> 
</body>
</html>