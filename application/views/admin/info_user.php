<!DOCTYPE html>
<html lang="en">
<head> 
    <title>Document</title>
</head>
<body> 

<div class="container" style="padding-bottom: 50px;"> 
  <div class="row">  
<div class="col-sm-8" style="margin-top: 50px;">
 <h1>Informations sur l'utilisateur</h1> 
<?php
 if (isset($userData['sellerData'])) {
    foreach ($userData['userData']['userData'] as $row) {
        if ($row->privilege == 'seller') {
            echo '<p><b>Privilege :</b> Cet utilisateur est un <strong>Vendeur</strong></p>'; 
        } 
        echo '<p><b>Nom :</b> '.$row->nom_user.'</p>';
        echo '<p><b>Prenom :</b> '.$row->prenom_user.'</p>'; 
        echo '<p><b>Email :</b> '.$row->email_user.'</p>'; 
        echo '<p><b>Phone :</b> '.$row->phone_user.'</p>'; 
        
          
    }
?> 
 <h3>Informations sur l'adresse de l'utilisateur</h3> 
<?php
    foreach ($userData['userData']['userAddress'] as $row) { 
        echo '<p><b>Pays :</b> '.$row->country.'</p>';
        echo '<p><b>Ville :</b> '.$row->city.'</p>'; 
        echo '<p><b>Rue :</b> '.$row->street.'</p>';  
        
          
    }
   
?>
 <h3>Informations sa boutique</h3> 
<?php
        foreach ($userData['sellerData']['sellerShop'] as $row) {
            echo '<p><b>Nom de sa boutique :</b> '.$row->name_shop.'</p>';
            echo '<p><b>située à :</b> '.$row->street_shop.'</p>'; 
            echo '<p><b>Dans la ville :</b> '.$row->city_shop.'</p>'; 
            echo '<p><b>Description de la boutique:</b> '.$row->description_shop.'</p>';  
        } 
    }elseif ($userData) {
        foreach ($userData['userData']['userData'] as $row) { 
            echo '<p><b>Nom :</b> '.$row->nom_user.'</p>';
            echo '<p><b>Prenom :</b> '.$row->prenom_user.'</p>'; 
            echo '<p><b>Email :</b> '.$row->email_user.'</p>'; 
            echo '<p><b>Phone :</b> '.$row->phone_user.'</p>';       
        }
?>
 <h3>Informations sur l'adresse de l'utilisateur</h3> 
<?php
        foreach ($userData['userData']['userAddress'] as $row) { 
            echo '<p><b>Pays :</b> '.$row->country.'</p>';
            echo '<p><b>Ville :</b> '.$row->city.'</p>'; 
            echo '<p><b>Rue :</b> '.$row->street.'</p>';  
            
            
        }
    }
?>
        <div class="col-auto">
            <a href="<?= base_url('admin/edit_user/'.$userData['userData']['userData'][0]->id_user)?>" class="btn btn-success mb-3">Modifier les information de cet utilisateur</a>
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