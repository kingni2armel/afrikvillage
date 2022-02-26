<!DOCTYPE html>
<html lang="en">
<head>
  <?php include_once('layout/lien_css.html'); ?>
  <?php include_once('layout/lien_js.html');?> 
  <title></title>
</head>
<body>
 <?php $this->load->view('layout/header.php');?>


 <div class="he" style="height:50px"></div>

 <div class="container"> 


  <div class="row"> 
    <div class="col-sm-8" >
      <?php
      if (isset($_SESSION['msg'])) {
        echo '<div class="alert alert-primary" role="alert">'.$_SESSION['msg'].'</div>'; 
        unset($_SESSION['msg']);
      }
      ?>
      <h1><?= $this->lang->line('personnalinfo_title') ?></h1>
      <?php
      if (validation_errors()) {
        echo '<div class="alert alert-danger" role="alert">'.validation_errors().'</div>';
      }
      ?>
      <form method="post">
        <div class="row mb-3">
          <div class="col">
            <input type="text" class="form-control" name="nom" placeholder="<?= $this->lang->line('personnalinfo_nom') ?>" value="<?= $_SESSION['nom_user'] ?>">
          </div>
          <div class="col">
            <input type="text" class="form-control" name="prenom" placeholder="<?= $this->lang->line('personnalinfo_prenom') ?>"  value="<?= $_SESSION['prenom_user'] ?>">
          </div>
        </div>
        <div class="row mb-3">
          <div class="col">
            <input type="text" class="form-control" name="email" placeholder="<?= $this->lang->line('personnalinfo_email') ?>" value="<?= $_SESSION['email_user'] ?>">
          </div>
          <div class="col">
            <input type="number" class="form-control" name="phone" placeholder="<?= $this->lang->line('personnalinfo_phone') ?>" value="<?= $_SESSION['phone_user'] ?>">
          </div>
        </div>
        <div class="row mb-3">
          <div class="col">  
            <select name="pays" class="form-control">
              <option value="<?= $_SESSION['country'] ?>"><?php if($_SESSION['country']=='canada'){echo 'canada';}else{ echo 'Pays : USA';}?></option>
              <option value="canada">CANADA</option>
              <option value="usa">USA</option>
            </select>
          </div> 
          <div class="col">
            <input type="text" class="form-control" name="ville" placeholder="<?= $this->lang->line('personnalinfo_ville') ?>" value="<?= $_SESSION['city'] ?>">
          </div>
        </div>
        <div class="row mb-3">
          <div class="col">
            <input type="text" class="form-control" name="rue" placeholder="<?= $this->lang->line('personnalinfo_rue') ?>" value="<?= $_SESSION['street'] ?>">
          </div>
          <div class="col">
            <div class="input-group mb-3">  
              <select name="sexe" class="form-control">
                <option value="<?= $_SESSION['sexe'] ?>"><?php if($_SESSION['sexe']=="m"){if($_SESSION['site_lang']=='french'){echo 'Sexe : Homme';}else{echo 'Sex : Man';}}else{if($_SESSION['site_lang']=='english'){echo 'Sex : Woman';}else{echo 'Sexe : Femme';}}?></option>
                <option value="m"><?= $this->lang->line('personnalinfo_homme') ?></option>
                <option value="f"><?= $this->lang->line('personnalinfo_femme') ?></option> 
              </select>
            </div>
          </div>
        </div> 
                            <div class="row mb-3">
                              <div class="col">
                                <input type="password" class="form-control" name="pwd" placeholder="<?= $this->lang->line('personnalinfo_pwd') ?>">
                              </div>
                              <div class="col">
                                <input type="password" class="form-control" name="rpwd" placeholder="<?= $this->lang->line('personnalinfo_rpwd') ?>">
                              </div>
                            </div>   

                            <!--information sur la boutique du vendeur--> 

                            <?php 
                            if ($_SESSION['privilege'] == "seller") {
                              ?>
                              <h2><?= $this->lang->line('personnalinfo_titleShop') ?></h2>
                              <h1><?= $this->lang->line('personnalinfo_ShopInfo') ?></h1> 
                              <div class="row mb-3">
                                <div class="col">
                                  <input type="text" class="form-control" name="shopname" placeholder="<?= $this->lang->line('personnalinfo_shopName') ?>" value="<?= $_SESSION['name_shop'] ?>">
                                </div>
                                <div class="col">
                                  <input type="text" class="form-control" name="shopstreet" placeholder="<?= $this->lang->line('personnalinfo_shopStreet') ?>" value="<?= $_SESSION['street_shop'] ?>">
                                </div>
                              </div> 
                              <div class="row mb-3">
                                <div class="col">
                                  <input type="text" class="form-control" name="shoptown" placeholder="<?= $this->lang->line('personnalinfo_shopCity') ?>" value="<?= $_SESSION['city_shop'] ?>">
                                </div>
                              </div>  
                              <div class="input-group mb-3">  
                                <textarea class="form-control" name="description" placeholder="<?= $this->lang->line('personnalinfo_shopDescription') ?>"><?= $_SESSION['description_shop'] ?></textarea></div> 
                                <?php
                              }
                              ?> <div class="col-sm-8">

                                <button type="submit" name="submit" class="btn btn-success" style="margin-top:20px;"><?= $this->lang->line('personnalinfo_submitButton') ?></button>
                                <button type="reset" class="btn btn-danger" style="margin-top: 20px;"><?= $this->lang->line('personnalinfo_resetButton') ?></button> 
                              </div>
                            </form>
                          </div>
                          <?php 
                          if ($_SESSION['privilege'] == 'customer') {
                            ?>
                            <div class="col-sm-4" style="margin-top: 50px;">  
                              <div class="col-sm-12" >  
                                <div class="card w-80">
                                  <div class="card-body">
                                    <h5 class="card-title"><?= $this->lang->line('personnalinfor_guideTitle') ?></h5>
                                    <p class="card-text"><?= $this->lang->line('personnalinfo_toseller') ?></p>
                                    <a href="<?= base_url('upgradstatut')?>" class="btn btn-primary"><?= $this->lang->line('personnalinfo_toSellerButton') ?></a>
                                  </div>
                                </div> 
                              </div>
                            </div>
                            <?php
                          }  
                          ?>
                        </div>
                      </div>
                    </div> 










                  </form>
                  <?php
                  $this->load->view('/layout/footer.php'); 
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