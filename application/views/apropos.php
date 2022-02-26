
                            <?php include_once('layout/lien_css.html'); ?>
                            <?php include_once('layout/lien_js.html');?>
                             <?php $this->load->view('layout/header.php');?>



                             <div class="conteiner_design" style="width: 100%;height:100px;background-color:#0092da;margin-top:100px">
                                                        <h2 style="margin-left: 38px;">Afrique village</h2>
                                        </div>
                                    <div  class="conteiner_about">

                                    

                                                <div  class="conteiner_About_items">
                                                            <img height="100%"; style="width: 100%;" src="<?php  echo base_url('images/slide2.jpg');?>" alt="fewfew">

                                                </div>
                                             
                                    </div>
                                            <div class="post">
                                                                <div class="post_items">
                                                                                <h1 class="des">Vendre</h1>
                                                                                <p>promouvir les produits africain</p>
                                                                </div>
                                                                <div class="post_items">
                                                                                <h1 class="des">yo</h1>
                                                                </div>
                                                                <div class="post_items">
                                                                                <h1 class="des">yo</h1>
                                                                </div>
                                                                <div class="post_items">
                                                                                <h1 class="des">yo</h1>
                                                                </div>  
                                            </div>
                                    <style>
                                        .des{
                                            text-align: center;
                                        }
                                                .conteiner_about{
                                                                display: flex;
                                                                flex-direction: row;
                                                                flex-wrap: wrap;
                                                                width: 100%;
                                                                height: 300px;
                                                }
                                                .conteiner_About_items{
                                                                flex: 1;
                                                }
                                                .post{
                                                    display: flex;
                                                    justify-content: space-around;
                                                    align-items: center;
                                                    flex-wrap: wrap;
                                                    width: 100%;
                                                    height: auto;
                                                }
                                                .post_items{
                                                    height: 300px;
                                                    border:1px solid red;
                                                    width: 250px;
                                                    margin:25px ;
                                                    border-radius: 5px;
                                                }

                                        

                                    </style>
                             <?php $this->load->view('layout/footer.php');?>

