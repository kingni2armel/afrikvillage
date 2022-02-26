
<?php $this->load->view('layout/comment');?>
<footer>
            <div class="data-footer" >
           
				<div class="data-footer-items" >
                                <ul>
                                                        <li><h4 class="fs-5 text" style="color: #2ebed7;"><?= $this->lang->line('entreprise') ?></h4></li>
                                                        <li><?= $this->lang->line('promouvoir_annonce') ?></li>
                                                        <li><?= $this->lang->line('promouvoir_entreprise') ?></li>
                                                        <li><?= $this->lang->line('recommandation') ?></li> 
                                        </ul>
                                                
				</div>
                               
                                <div class="data-footer-items" >
                                        <ul>
                                                        <li><h4 class="fs-5 text" style="color: #2ebed7;"><?= $this->lang->line('information') ?></h4></li>
                                                        <li><?= $this->lang->line('apropos') ?></li>
                                                        <li><?= $this->lang->line('utilisation') ?></li>
                                                        <li><?= $this->lang->line('echanges') ?></li>
                                        </ul>
                                                
				</div>

                                <div class="data-footer-items" >
                                        <ul>
                                                        <li><h4 class="fs-5 text" style="color: #2ebed7;"><?= $this->lang->line('renseignement') ?></h4></li>
                                                        <li><?= $this->lang->line('avantage_inscription') ?></li>
                                                        <li><?= $this->lang->line('publicite') ?> </li>
                                        </ul>
                                                
				</div>
                                <div class="data-footer-items" >
                                        <ul>
                                                        <li><h4 class="fs-5 text" style="color: #2ebed7;"><?= $this->lang->line('soutient') ?></h4></li>
                                                        <li><?= $this->lang->line('aide') ?></li>
                                                        <li><?= $this->lang->line('faq') ?>  </li>
                                        </ul>
                                                
				</div>
                                <!--div class="data-footer-items" >
                                <ul>
                                                        <li><h4 class="fs-5" style="color: #2ebed7;">SUIVEZ NOUS</h4></li>
                                                        <li><i class="insta me-1 fa fa-instagram fa-3x" id="insta" aria-hidden="true" style="color: #2ebed7;"></i></li>
                                                        <li><i class="me-1 fa fa-facebook-official fa-3x" aria-hidden="true" style="color: #2ebed7;"></i></li>
                                                        <li><i class="me-1 fa fa-whatsapp fa-3x" aria-hidden="true" style="color: #2ebed7;"></i>   </li>
                                                        <li><i class="me-1 fa fa-twitter-square fa-3x" aria-hidden="true" style="color: #2ebed7;"></i></li>
                                        </ul>
                                                
				</div-->

                               
                    
            </div>
</footer>

            <style> 
                            footer{ 
                                position:absolute;
                                left:0px;
                                bottom:0px;
                                height:30px;
                                width:100%;
                                margin-bottom : -50px;

                            }
                                .data-footer{
                                        width:100%;
                                        display:flex;
                                        flex-wrap:wrap;
                                        justify-content:space-around;
                                        background-color: #3c3c3c;  
                                }

                               .data-footer-items{
                                       color : white;
                                      
                               }

                               @media all and (min-width:0px)  and (max-width:500px){
                                        .data-footer{
                                                justify-content:flex-start
                                        }
                               }


                               
            </style>
