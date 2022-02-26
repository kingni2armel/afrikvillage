<!DOCTYPE html>
<html lang="en">
<head> 
    <title>Document</title>
</head>
<body> 

<div class="container" style="padding-bottom: 50px;"> 
    <div class="row">  
        <div class="col-sm-8" style="margin-top: 50px;"> 
            <h1>Information de l'utilisateur <i class="fa fa-pencil" aria-hidden="true"></i></h1> 
            <form action="" method="post">
            <?php 
      if (isset($_SESSION['msg'])) {
        echo '<div class="alert alert-primary" role="alert">'.$_SESSION['msg'].'</div>'; 
        unset($_SESSION['msg']);
      } 
      if (validation_errors()) {
        echo '<div class="alert alert-danger" role="alert">'.validation_errors().'</div>';
      }
      ?>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nom de l'utilisateur</label>
                    <input type="text" name="nom_user" class="form-control" id="exampleFormControlInput1" value="<?= $data['userData']['userData'][0]->nom_user?>">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Prenom de l'utilisateur </label>
                    <input type="text" name="prenom_user" class="form-control" id="exampleFormControlInput1" value="<?= $data['userData']['userData'][0]->prenom_user?> ">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email de l'utilisateur</label>
                    <input type="text" name="email_user" class="form-control" id="exampleFormControlInput1" value="<?= $data['userData']['userData'][0]->email_user?> ">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Contact de l'utilisateur</label>
                    <input type="text" name="phone_user" class="form-control" id="exampleFormControlInput1" value="<?= $data['userData']['userData'][0]->phone_user?> ">
                </div>

                <h3>Informations sur l'adresse de l'utilisateur <i class="fa fa-pencil" aria-hidden="true"></i></h3>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Pays</label>
                    <input type="text" name="pays_user" class="form-control" id="exampleFormControlInput1" value=" <?= $data['userData']['userAddress'][0]->country?>">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Ville</label>
                    <input type="text" name="ville_user" class="form-control" id="exampleFormControlInput1" value=" <?= $data['userData']['userAddress'][0]->city?>">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Rue</label>
                    <input type="text" name="rue_user" class="form-control" id="exampleFormControlInput1" value=" <?= $data['userData']['userAddress'][0]->street?>">
                </div>

                <?php
                if (isset($data['sellerData']['sellerShop'][0])){
                ?>
                    <h3>Informations la boutique de l'utilisateur <i class="fa fa-pencil" aria-hidden="true"></i></h3>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nom de la boutique</label>
                        <input type="text" name="nom_shop" class="form-control" id="exampleFormControlInput1" value=" <?= $data['sellerData']['sellerShop'][0]->name_shop?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Ville de la boutique </label>
                        <input type="text" name="ville_shop" class="form-control" id="exampleFormControlInput1" value="<?= $data['sellerData']['sellerShop'][0]->city_shop?> ">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Rue de la boutique</label>
                        <input type="text" name="rue_shop" class="form-control" id="exampleFormControlInput1" value=" <?= $data['sellerData']['sellerShop'][0]->street_shop?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Description de la boutique</label>
                        <input type="text" name="description_shop" class="form-control" id="exampleFormControlInput1" value="<?= $data['sellerData']['sellerShop'][0]->description_shop?> ">
                    </div>
                <?php
                }
                ?>


                <!--div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div-->
                <div class="col-auto">
                    <button type="submit" name="submit" class="btn btn-success mb-3">Modifier les information de l'utilisateur</button>
                </div>
            </form>
        </div>
        <div class="col-sm-4" style="margin-top: 50px;">
        <div class=" text-dark mb-3" style="max-width: 18rem;border:1px solid #dcdde1;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
">
            <div class="card-header">Privilege utilisateur <br></div>
            <div class="card-body">
                <!--h5 class="card-title">NOTE</h5-->
                <p class="card-text">Cet utilisateur est un client.</p>
            </div>
</div>
        </div>
    </div>  
</div> 



<?php
                //$this->load->view('/layout/footer.php'); 
?>
         
      <style>
                .col-sm-4{
                        
                } 
      </style>          
</body>
</html>