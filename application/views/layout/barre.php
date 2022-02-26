<div class="container-input">
                          <form action="" method="POST">
                                  <input class="rend" type="text" name="localisation" placeholder="<?= $this->lang->line('header_localisation') ?>">
                                  <input class="rend" name="element" type="search" placeholder="<?= $this->lang->line('header_recherche') ?>">
                                  <button class=" butsend" name="srch" type="submit"> <?= $this->lang->line('header_recherche') ?></button>
                          </form>
                              </div> 


                                <style>
                                                    .container-input{
                                                             display: none;
                                                    }

                                                @media all and (min-width:601px) and  (max-width:767px){
                                                            .container-input{
                                                                display: block;
                                                                margin-top: 3vw;
                                                                position: fixed;
                                                                top:0;
                                                                left: 0;
                                                                z-index: 2;

                                                            }
                                                            .butsend{
                                                                color:white;
                                                                background-color:#0092da;
                                                                width: 15vw;
                                                                border:1px solid white
                                                            }

                                                            .rend{
                                                                /* border-radius: 5px; */
                                                                outline: none;
                                                                border:1px solid white
                                                            }
                                                }
                                                @media all and (min-width:600px)  and (max-width:617px){
                                                            .container-input{
                                                                margin-left: 12vw;
                                                            }
                                                }

                                                @media all and (min-width:618px)  and (max-width:732px){
                                                            .container-input{
                                                                margin-left: 12vw;
                                                            }
                                                }
                                                @media all and (min-width:733px)  and (max-width:766px){
                                                            .container-input{
                                                                margin-left: 20vw;
                                                            }
                                                }
                                                @media all and (min-width:601px) and (max-width:663px){
                                                        .rend{
                                                            width: 25vw !important;
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
    ?>