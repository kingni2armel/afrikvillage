<div class="marquee-rtl">
                <div class=" "> 
                        <p style="color:#0092da;">
                                <?php 
                                if ($_SESSION['site_lang'] == "french") {
                                        echo "Africvillage, la reference des entrepreneurs Africains au Canada";
                                }
                                else{
                                        echo "Africvillage, the reference of african entrepreneurs in Canada";
                                }
                                 ?>
                        </p>                
        </div>
</div>

<style>
            .marquee-rtl{
                    max-width: 30em;
                    margin:1em auto 2em;
                    border: 1em auto 2em;
                    overflow: hidden;
                    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
                    height: 50px;
                    margin-top:-15px !important;

            }
            /*.marquee-rtl > :first-child {
                display: inline-block;
                padding-right: 2em;
                padding-left: 100%;
                white-space: nowrap;
                animation:defilement-rtl 15s infinite linear; 
                margin-top:15px;
            }*/
            @keyframes  defilement-rtl {
                0%{
                        transform: translate3d(0,0,0);

                }
                100%{
                        transform: translate3d(-100%,0,0);
                }
            }
            @media all and  (min-width:0px) and (max-width:600px){
                        .marquee-rtl{
                                        width:90vw;

                        }
            }
</style>