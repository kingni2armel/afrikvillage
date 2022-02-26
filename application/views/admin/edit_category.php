<!DOCTYPE html>
<html lang="en">
<head> 
    <title>Document</title>
</head>
<body> 

<div class="container" style="padding-bottom: 50px;"> 
    <div class="row">  
        <div class="col-sm-8" style="margin-top: 50px;">
            <h1>Modifier une categorie <i class="fa fa-pencil" aria-hidden="true"></i></h1> 
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
                    <input type="text" name="category_fr" class="form-control" id="exampleFormControlInput1" value="<?= $category[0]->name_category ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nom de la categorie en anglais </label>
                    <input type="text" name="category_en" class="form-control" id="exampleFormControlInput1" value="<?= $category[0]->name_category_en ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Icone cette categorie</label>
                    <input type="text" name="category_icon" class="form-control" id="exampleFormControlInput1" value="<?= $category[0]->icon ?>">
                </div>
                <!--div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div-->
                <div class="col-auto">
                    <button type="submit" name="submit" class="btn btn-success mb-3">Modifier la categorie</button>
                </div>
            </form>
        </div>
        <div class="col-sm-4" style="margin-top: 50px;">
        <div class="card text-dark bg-light mb-3" style="max-width: 18rem;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
">
            <div class="card-header">ICONE ACTUELLE <br> <i class="fa fa-5x <?= $category[0]->icon ?>" aria-hidden="true"></i></div>
            <div class="card-body">
                <!--h5 class="card-title">NOTE</h5-->
                <p class="card-text">Pour choisir l'icone de la categorie, veuillez cliquer <a href="https://fontawesome.com/v4.7/icons/" target="_blank">ici</a>.</p>
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