<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php include_once('layout/lien_css.html'); ?>
  <?php include_once('layout/lien_js.html');?>
  <title></title>
 <?php $this->load->view('layout/header.php');?>
<div class="container w3-container" style="margin-top:100px">

  <div class="w3-bar " style="background-color:#0092da;height:50px">
    <button class="w3-bar-item w3-button tablink w3-red"style="height:50px" onclick="openCity(event,'London')">Info Vendeur</button>
    <button class="w3-bar-item w3-button tablink"style="height:50px" onclick="openCity(event,'Paris')">Info Boutique</button>

  </div>

  <div id="London" class="w3-container w3-border city">
    <h2 class="title-des" style="text-align:center">Information sur le vendeur</h2>
        <div class="ongletv">

                    <div class="ongletv-itemd">
                                <p class="pvendeur"> <strong>Nom :</strong> <?php echo $userInfo->nom_user; ?></p>
                                <p class="pvendeur"><strong>Prenom :</strong>  <?php echo $userInfo->prenom_user; ?></p>
                                <p class="pvendeur"><strong>Email :</strong> <?php echo $userInfo->email_user; ?></p>

                    </div> 
        </div>

  </div>

    <div id="Paris" class="w3-container w3-border city" style="display:none">
        <h2 class="title-des" style="text-align:center">Information sur la boutique</h2>
        <div class="ongletv">

            <div class="ongletv-itemd">
                <p class="pvendeur"><strong>Nom Boutique :</strong>  <?php echo $shopInfo->name_shop; ?></p>
                <p class="pvendeur"><strong>Ville :</strong> <?php echo $shopInfo->street_shop; ?></p>
                <p class="pvendeur"><strong>Rue :</strong> <?php echo $shopInfo->city_shop; ?></p>

            </div>
            <div class="ongletv-itemd">
                <p class="pvendeur"> <strong>Description :</strong> 
                    <?php
                        $description =  $shopInfo->description_shop;
                        /*if (strlen($description>10)) {
                             $text = substr($description,0,10).'...';
                        }
                        else{
                            $text = $description;
                        }*/ 
                        echo $description;
                    ?>
                </p>
            </div>
        </div>

    </div>


</div>

<script>
function openCity(evt, cityName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " w3-red";
}


</script>

    <!-- <h1>PAGE DU VENDEUR</h1> -->
    <br><br>
    <!-- <h4>info de l'utisateur dans le tableaux $userInfo</h4> -->
<?php
    // var_dump($userInfo);

?>

    <!-- <h4>info sur la boutique de l'utisateur dans le tableaux $shopInfo</h4> -->
<?php
    // var_dump($shopInfo);
?>
    <!-- <h4>info sur les articles posté par le vendeur dans le tableaux $shopInfo</h4> -->
<?php
    // var_dump($shopArticles);


/*



<?php if($row[0]->type_a == 'service'){ echo base_url('/_seller_datas_/'.$results[0]->id_seller.'/_publication/_service/'.$row[0]->name_image ); }else{echo base_url('/_seller_datas_/'.$results[0]->id_seller.'/_publication/_product/'.$row[0]->name_image );} ?>



*/

?>
<br>
<br>
<br>
<br>
<!-- <?php if($shopArticles->type_a == 'service'){ echo base_url('/_seller_datas_/'.$shopInfo->id_seller.'/_publication/_service/'.$shopArticles->name_image ); }else{echo base_url('/_seller_datas_/'.$shopInfo->id_seller.'/_publication/_product/'.$shopArticles->name_image );} ?>
<img src="<?php if($shopArticles->type_a == 'service'){ echo base_url('/_seller_datas_/'.$shopInfo->id_seller.'/_publication/_service/'.$shopArticles->name_image ); }else{echo base_url('/_seller_datas_/'.$shopInfo->id_seller.'/_publication/_product/'.$shopArticles->name_image );} ?>" alt=""> -->


<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<?php $this->load->view('layout/categorieseller'); ?>
<?php $this->load->view('layout/footer'); ?>


<style>
            body{
                    padding:0;
                    margin:0;
            }
            .ongletv{
                    display:flex;
                    justify-content:space-between;
            }
            .pvendeur{
                font-size:25px;
            }
            .title-des{

                        color:#0092da;
                }

            @media all and (min-width:0px)  and (max-width:600px){

                .w3-bar{
                    margin-top:100px;
                }
                .pvendeur{
                        font-size:12px;
                }
                .title-des{
                        font-size:15px;
                        color:#0092da;
                }
            }
</style>
</body>
</html>