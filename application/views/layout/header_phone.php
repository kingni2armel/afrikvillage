

<?php
//___somme des messages non lu de l'utilisateur 
$msg_non_lu = '';
if (isset($_SESSION['id_user'])) {
  $this->db->where('id_receiver',$_SESSION['id_user']);
  $this->db->where('statut',0);
  $query = $this->db->get('message');
  $query->result();
  $msg_non_lu = $query->num_rows();
}
?>
<div class="conteiner_phone">
                 <div class="conteiner_t">
                                    <div class="conteiner_items">
                                              <a href="<?=  base_url('home'); ?>"><img class="logo" src="<?= base_url('images/agent.png'); ?>" alt=""> </a>

                                    </div>
                                    <div class="conteiner_items">
                                      <form method="post">
                                          <ul style="margin-top:5px;margin-left:-15px;"> 
                                            <?php //var_dump($_SESSION['site_lang']);
                                              if ($_SESSION['site_lang'] == "french") {
                                            ?>  
                                                <li id="en" style="color:#0092da" class="li_items"><button class="langue" name="en">EN</button></li>
                                            <?php
                                              }
                                              elseif($_SESSION['site_lang'] == "english") {
                                            ?>
                                                  <li id="fr" class="li_items" style="color:#0092da"><button class="langue" name="fr">FR</button></li>
                                            <?php    
                                              }
                                            ?>
                                            
                                              
                                               
                                                <?php
                                                      if (isset($_SESSION['privilege'])) 
                                                      {
                                                        ?>
                                                        <ul style="margin-left:20vw;margin-right:15px  !important" class="navbar-nav me-auto mb-2 mb-lg-0">
                                                          <li class="nav-item dropdown active">
                                                            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                              <i class="me-1 fa fa-user fa-1x" aria-hidden="true"></i> 
                                                              <?= $_SESSION['nom_user'].' '.$_SESSION['prenom_user'] ?>
                                                              <?php 
                                                              if ($msg_non_lu != 0) {
                                                                echo '<span class="badge bg-danger">'.$msg_non_lu.'</span>';
                                                              }
                                                              ?>
                                                            </a>
                                                            <ul class="dropdown-menu  aria-labelledby="navbarDropdownMenuLink">
                                                              <li>
                                                                <a class="dropdown-item" href="<?= base_url('messagelist') ?>"> <i   class="me-2 fa fa-envelope" aria-hidden="true"></i><?= $this->lang->line('header_message') ?>
                                                                <?php 
                                                                if ($msg_non_lu != 0) {
                                                                  echo '<span class="badge rounded-pill bg-danger">'.$msg_non_lu.'</span>';
                                                                }
                                                                ?>
                                                              </a>
                                                            </li> 
                                                            <?php 
                                                            if ($_SESSION['privilege'] == "seller") {
                                                              ?>
                                                              <li>
                                                                <a class="dropdown-item" href="<?= base_url('publications') ?>"><i class="me-2 fa fa-paper-plane" aria-hidden="true"></i><?= $this->lang->line('header_publication') ?></a>
                                                              </li> 
                                                              <li>
                                                                <a class="dropdown-item" href="#"><i class="me-2 fa fa-bullhorn" aria-hidden="true"></i><?= $this->lang->line('header_annonce') ?></a>
                                                              </li> 
                                                              <?php
                                                            }
                                                            ?>
                                                
                                                
                                                            <li>
                                                              <a class="dropdown-item" href="<?= base_url('myaccount') ?>"> <i class="me-2 fa fa-cog" aria-hidden="true"></i><?= $this->lang->line('header_compte') ?></a>
                                                            </li>
                                                            <li>
                                                              <form method="post">
                                                                <button class="dropdown-item" name="logout"><i class="me-2 fa fa-sign-out" aria-hidden="true"></i><?= $this->lang->line('header_deconnexion') ?></button>
                                                              </form>
                                                            </li> 
                                                          </ul>
                                                        </li>
                                                      </ul>
                                                      <?php
                                                    }else {
                                                    ?>
                                                <li class="li_items"><button class="btn-connect"><a style="color:white;" href="<?= base_url('login');?>"><?= $this->lang->line('header_connexion') ?></a></button></li>
                                                    <?php
                                                    }
                                                ?>
                                                           
                                                </ul>
                                                </form>
                                    </div>
                  </div>


                <form method="post" action="">
                                          <input style="margin-top:5px" class="input-items" type="text" id="para" placeholder="<?= $this->lang->line('header_recherche') ?>" name="element"/>
                                          <div id="cara">

                                                <input class="input-items"  type="text" placeholder="<?= $this->lang->line('header_localisation') ?>" name="localisation"></br>
                                                <input type="submit" class="input-items-search" value="Rechercher" name="srch" />
                                                <input id="annuler" type="reset" class="input-items2" value="Annuler"/>
                                         
                                    </div>
                                                
                </form>


                <div style="margin-top:-5px">
                                    <?php $this->load->view('layout/slidecategorie'); ?>
                </div>
</div>





<style>
            #cara{
                display: none;
            }

</style>
<script>
/* code javascript qui permet de  cacher et montrer  les differents champs de texte */
document.getElementById("para").addEventListener("click", function() {
  document.getElementById("cara").style.display="block";
  document.getElementById("pp").style.marginTop="263px";
  document.getElementById("pp").style.position="absolute";

});
document.getElementById("annuler").addEventListener("click", function() {
  document.getElementById("cara").style.display="none";
  document.getElementById("pp").style.marginTop="108px";


});
/* code javascript qui permet montrer la langue en fonction du clickk */

document.getElementById("en").addEventListener("click", function() {
  document.getElementById("en").style.display="none";
  document.getElementById('fr').style.display="block";


}); 
document.getElementById("fr").addEventListener("click", function() {
  document.getElementById("fr").style.display="none";
  document.getElementById('en').style.display="block";


}); 
</script>
</div>


<style>
                  .conteiner_phone{
                        width:100%;
                        position:fixed;
                        top:0;
                        left:0;     
                        z-index:1;
                        background-color:#f8f9f9;
                      
                  }
                  .btn-connect{
                              background-color:#0092da;
                              color:white;
                              border:1px solid #0092da;
                              border-radius:5px;
                  }
                  .btn-connect:focus{
                              background-color:white;
                              border:white;
                              color:#0092da;
                              transition:2s;
                  }
                  .conteiner_t{
                        display:flex;
                        justify-content:space-between;
                  }
                  .logo{
                        width:50px;
                        margin-left:15px
                  }
                  .li_items{
                        float:left;
                        padding:0 15px;
                  }
            .input-items{
                        margin-left:3vw !important;
                        width:94vw;
                        heigth:150px !important;
                        margin:8px;
                        padding-left:10px;
                        height:38px;
                        border-radius:5px;
                        
                        
                       
                        
            }
            .input-items:focus{
                    
            }
            .langue{
              background-color:#0092da;
              color:white;  
              border:1px solid #0092da;
              border-radius:5px;
            }
           .input-items-search{
                        margin-left:3vw !important;
                        width:94vw;
                        heigth:100px !important;
                        margin:8px;  
                        padding-left:15px;   
                        height:38px; 
                        background-color:#0092da;
                        border:1px solid #0092da; 
                        color:white;
                        border-radius:5px;
           }
            .input-items2{
                        margin-left:3vw !important;
                        width:94vw;
                        heigth:100px !important;
                        margin:8px;  
                        padding-left:15px;   
                        height:38px;
                        background-color:red;
                        border:1px solid red;
                        color:white;
                        border-radius:5px;
                         
            }
            .conteiner_phone{
                              display:none;
                        }

      #fr{
                   
      }

@media all and (min-width:0px) and (max-width:600px){
                        .conteiner_phone{
                              display:block !important;
                        }
} 
</style>

<?php 
//___si l'utilisateur clique sur le bouton rechercher
    if (isset($_POST['srch'])) {
      $localisation = trim($_POST['localisation']);
      $element = trim($_POST['element']);
//___si l'utilisateur entre la localisation et un element de recherche
      if ($element != null && $localisation != null) {
        redirect('publication/search/'.$element.'/'.$localisation);
      }
//___si l'utilisateur entre l'element de recherche sans la localisation
      elseif($element !=null && $localisation == null){
        $localisation = 'null';
        redirect('publication/search/'.$element.'/'.$localisation);
      }
      else
      {
        redirect($_SERVER['HTTP_REFERER']);
      }
    }

//___si l'utilisateur clique sur FR
    if (isset($_POST['fr'])) {
      redirect('LanguageSwitcher/switchLang/french');
    }
    elseif(isset($_POST['en']))
    {
      redirect('LanguageSwitcher/switchLang/english');
    }

    ?>