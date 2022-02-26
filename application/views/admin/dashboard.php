<?php $this->load->view('layout/headeradmin.php');?> 


<?php
	//___j'ai chargé ce lien dans le css
	//include_once('layout/lien_css.html');
?>

<div class="conteiner_information"  style="margin-top:200px;">
                <div class="conteiner_information_items">
                             <h1 class="info  total"><a href="<?= base_url('admin/inscriptions') ?>" style="color: white;">Total inscrit</a></h1>
                             <p class="info number" style="font-size: 50px; color : black; font-weight: bolder;"><?= $pannelData['totalUsers'] ?></p>
                </div>
                <div class="conteiner_information_items">
                             <h1 class="info  total"><a href="<?= base_url('admin/clients') ?>" style="color: white;">Total client</a></h1>
                             <p class="info number" style="font-size: 50px; color : black; font-weight: bolder;"><?= $pannelData['totalCustomers'] ?></p>
                </div>
                <div class="conteiner_information_items">
                             <h1 class="info  total"><a href="<?= base_url('admin/vendeurs') ?>" style="color: white;">Total vendeurs</a></h1>
                             <p class="info number" style="font-size: 50px; color : black; font-weight: bolder;"><?= $pannelData['totalSellers'] ?></p>
                </div>
          
</div>
<div class="conteiner_information"  style="margin-top:100px;">
                <div class="conteiner_information_items">
                             <h1 class="info  total"><a href="<?= base_url('admin/categories') ?>" style="color: white;">Total categories</a></h1>
                             <p class="info number" style="font-size: 50px; color : black; font-weight: bolder;"><?= $pannelData['totalCategories'] ?></p>
                </div>
                <div class="conteiner_information_items">
                             <h1 class="info  total"><a href="<?= base_url('admin/articles') ?>" style="color: white;">Total articles</a></h1>
                             <p class="info number" style="font-size: 50px; color : black; font-weight: bolder;"><?= $pannelData['totalArticles'] ?></p>
                </div>
                <div class="conteiner_information_items">
                             <h1 class="info  total"><a href="" style="color: white;">Total moderateurs</a> </h1>
                             <p class="info number" style="font-size: 50px; color : black; font-weight: bolder;"><?= $pannelData['totalModerators'] ?></p>
                </div>
          
</div>


<style>
                .conteiner_information p{
                    margin-top: -15px;
                }
</style>


<?php $this->load->view('admin/footer_admin'); ?>
<style>

            body{
                font-family: poppins;
            }
            .conteiner_information{
                display: flex;
                justify-content: center;
                flex-wrap: wrap;
            }
            .conteiner_information_items{
                background-color: #0092da;
                width: 300px;
                border-radius: 5px;
                height: 100px;
                margin: 0 5px;
            }
            .total{
                color: white;
            }
            .info{
                text-align: center;
            }
            .number{
                color:red;
                font-size: 20px;
            }
            @media all and  (min-width:0px)  and (max-width:700px){
                    .conteiner_information{
                        margin-top:400px;
                    }
            }
</style>
