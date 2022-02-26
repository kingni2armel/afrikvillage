<!DOCTYPE html>
<html lang="en">
<head>
  <?php include_once('layout/lien_css.html'); ?>
  <?php include_once('layout/lien_js.html');?> 
  <title>Document</title>
</head>
<body>
 <?php $this->load->view('layout/header.php');?> 
</body>
<body>

 <div class="container" style="padding-bottom: 50px;"> 


  <div class="row"> 
    <div class="col-sm-8" style="margin-top: 50px;">
      <h1 class="title-h"><?= $this->lang->line('signin_inscription') ?></h1>
      <form method="post">
        <?php
        if (validation_errors()) {
          echo '<div class="alert alert-danger" role="alert">'.validation_errors().'</div>';
        } 
        if(isset($_SESSION['msg']))
        {
          echo '<div class="alert alert-warning" role="alert">'.$_SESSION['msg'].'</div>';
          unset($_SESSION['msg']);
        }
        ?>

        <div class="row mb-3">
          <div class="col">
            <input type="text" class="form-control" name="nom" placeholder="<?= $this->lang->line('signin_nom') ?>" value="<?= set_value('nom')?>">
          </div>
          <div class="col">
            <input type="text" class="form-control" name="prenom" placeholder="<?= $this->lang->line('signin_prenom') ?>"  value="<?= set_value('prenom')?>">
          </div>
        </div>
        <div class="row mb-3">
          <div class="col">
            <input type="text" class="form-control" name="email" placeholder="<?= $this->lang->line('signin_email') ?>" value="<?= set_value('email')?>">
          </div>
          <div class="col">
            <input type="number" class="form-control" name="phone" placeholder="<?= $this->lang->line('signin_phone') ?>" value="<?= set_value('phone')?>">
          </div>
        </div>
        <div class="row mb-3">
          <div class="col">  
            <select name="pays" class="form-control">
              <option value=""><?= $this->lang->line('signin_pays') ?></option>
              <option value="canada">CANADA</option>
              <option value="usa">USA</option>
            </select>
          </div> 
          <div class="col">
            <input type="text" class="form-control" name="ville" placeholder="<?= $this->lang->line('signin_ville') ?>" value="<?= set_value('pays')?>">
          </div>
        </div>
        <div class="row mb-3"> 
          <div class="col">
            <input type="text" class="form-control" name="rue" placeholder="<?= $this->lang->line('signin_rue') ?>" value="<?= set_value('rue')?>">
          </div> 
        <div class="col">  
          <select name="sexe" class="form-control">
            <option value=""><?= $this->lang->line('signin_sexe') ?></option>
            <option value="m">Homme</option>
            <option value="f">Femme</option>
          </select>
        </div>
        </div>
        <div class="row mb-3">
          <div class="col">
            <input type="password" class="form-control" name="password" placeholder="<?= $this->lang->line('signin_pwd') ?>">
          </div>
          <div class="col">
            <input type="password" class="form-control" name="password_confirme" placeholder="<?= $this->lang->line('signin_rpwd') ?>">
          </div>
        </div>
        <p>Si vous avez déjà un compte, <a href="<?= base_url('login') ?>">veuillez vous connecter</a> !</p>
        <button type="submit" name="signin" class="btn btn-success" style="margin-top:20px;background-color:#0092da !important;border:1px solid #0092da">
            <?= $this->lang->line('signin_submit') ?>
        </button>
        <!--button type="reset" class="btn btn-danger" style="margin-top: 20px;">
          <?= $this->lang->line('signin_reset') ?>
        </button--> 
      </form>  
    </div>
    <div class="col-sm-4" style="margin-top: 50px;">
      <h5>
        <?= $this->lang->line('signin_social') ?>
      </h5>
    </div>
  </div>
</div> 

</form>

<?php
$this->load->view('/layout/footer.php'); 
?>

          <style>
                  @media all  and (min-width:0px) and  (max-width:600px){
                      .title-h{
                        margin-top: 20vw !important;
                      }
                  }
                  @media all and (min-width:0px) and  (max-width:500px){
                                    .title-h{
                                        margin-top:12vh !important;
                                    }
                                    
                        }
          </style>
</body>
</html>