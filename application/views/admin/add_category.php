<!DOCTYPE html>
<html lang="en">
<head> 
    <title>Document</title>
</head>
<body> 

<div class="container" style="padding-bottom: 50px;"> 
    <div class="row">  
        <div class="col-sm-8" style="margin-top: 50px;">
            <h1>Ajouter une nouvelle categorie <i class="fa fa-pencil" aria-hidden="true"></i></h1> 
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
                    <label for="exampleFormControlInput1" class="form-label">Nom de la categorie en francais</label>
                    <input type="text" name="category_fr" class="form-control" id="exampleFormControlInput1" placeholder="categorie fr">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nom de la categorie en anglais </label>
                    <input type="text" name="category_en" class="form-control" id="exampleFormControlInput1" placeholder="categorie en">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Icone cette categorie</label>
                    <input type="text" name="category_icon" class="form-control" id="exampleFormControlInput1" placeholder="icone de la categorie">
                </div>
                <!--div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div-->
                <div class="col-auto">
                    <button type="submit" name="submit" class="btn btn-success mb-3">Ajouter une categorie</button>
                </div>
            </form>
        </div>
        <div class="col-sm-4" style="margin-top: 50px;">
        <div class=" text-dark bg-light mb-3" style="max-width: 18rem;">
            <div class="card-header">Ajouter une nouvelle categorie</div>
            <div class="card-body">
                <!--h5 class="card-title">NOTE</h5-->
                <p class="card-text">pour ajouter une categorie :<br>*Entrez le nom de la categorie en français<br>*Entrez le nom de la categorie en anglais<br>*Choisissez votre <a href="https://fontawesome.com/v4.7/icons/" target="_blank">fontAwasome</a> et le coller dans le dernier champs avant de valider le formulaire.</p>
            </div>
</div>
        </div>
    </div>  
</div> 



<?php
                //$this->load->view('/layout/footer.php'); 
?>
         
       
         <style>
                                @media all and (min-width:0px)  and  (max-width:800px){
                                    .container{
                                        margin-top:85px;
                                    }
                                }
         </style>
</body>
</html>