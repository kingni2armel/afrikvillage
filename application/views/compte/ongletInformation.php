<script>
    function openPage(pageName,elmnt,color) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontents");
        for (i = 0; i < tabcontent.length; i++) {
          tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablink");
        for (i = 0; i < tablinks.length; i++) {
          tablinks[i].style.backgroundColor = "";
        }
        document.getElementById(pageName).style.display = "block";
        elmnt.style.backgroundColor = color;
      }
 </script> 
<?php
 //debug();
?>
    <div class="conteiner_button">
              <div class="items_boutton">
                 <input class="inputs" type="text" placeholder=" Nom" name="nom_update" value="<?=$_SESSION['nom_user']?>"> 
              </div>
              <div class="items_boutton">
                   <input  class="inputs"type="text" placeholder=" Prénom " name="prenom_update" value="<?=$_SESSION['prenom_user']?>">
              </div>

    </div>
    <div class="conteiner_button">
              <div class="items_boutton">
              <input  class="inputs" type="formulaireclientmail" placeholder="Email" name="email_update" value="<?=$_SESSION['email_user']?>">
              </div>
              <div class="items_boutton">
                   <input  class="inputs"type="tel" placeholder="Phone " name="phone_update" value="<?=$_SESSION['phone_user']?>">
              </div>

    </div>
    <div class="conteiner_button">
              <div class="items_boutton">
             
              <input  class="inputs" type="text" placeholder="Pays" name="pays_update" value="<?=$_SESSION['country']?>">
              </div>
              <div class="items_boutton">
                   <input  class="inputs"type="tel" placeholder=" Ville " name="ville_update" value="<?=$_SESSION['city']?>">
              </div>

    </div>
    <div class="conteiner_button">
              <div class="items_boutton">
              <input  class="inputs" type="text" placeholder="Rue" name="rue_update" value="<?=$_SESSION['street']?>">
              </div>
              <div class="items_boutton">
                   <input  class="inputs"type="text" placeholder="Boite Postale " name="boite_update" required>
              </div>

    </div>
<?php 
  //debug($_SESSION['privilege']);
if ($_SESSION['privilege'] == "seller") {
?>
    <div class="conteiner_button">
              <div class="items_boutton">
              <input  class="inputs" type="text" placeholder="Nom de la boutique" name="nomboutique_update" value="<?=$_SESSION['name_shop']?>">
              </div>
              <div class="items_boutton">
                   <input  class="inputs"type="text" placeholder="Rue de la boutique" name="rueboutique_update" value="<?=$_SESSION['street_shop']?>">
              </div>

    </div>
    <div class="conteiner_button">
              <div class="items_boutton">
              <input  class="inputs" type="text" placeholder="Ville de la boutique" name="villeboutique_update" value="<?=$_SESSION['city_shop']?>">
              </div>
    </div>
<?php
}
?>
    <div class="conteiner_button"> 
              <div class="items_boutton">
                              <select class="inputs" name="sexe" id="" > 
                              <option value="">sexe</option>
                              <option value="m">Masculin</option>
                              <option value="f">Feminin</option>

                           
                              </select>
                   </div>

    </div>
    <div class="conteiner_button">
              <div class="items_boutton">
              <input  class="inputs" type="password" placeholder="password" name="password_update"equired>
              </div>
              <div class="items_boutton">
                   <input  class="inputs"type="password" placeholder="Password confirme " name="password_confirme_update" required>
              </div>

    </div>
    <div class="conteiner_button">
              <div class="items_boutton">
                    <button class="boutton_sing">Update Mes Informations</button>
              </div>
              <div class="items_boutton">
                   <button class="boutton_annuler" >Retourner a l'accueil</button>
              </div>

    </div>