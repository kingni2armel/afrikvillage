<!DOCTYPE html>
<html lang="en">
<head>
        <?php include_once('layout/lien_css.html'); ?>
        <?php include_once('layout/lien_js.html');?>
        <!-- <link rel="stylesheet" href="<?php echo base_url('../../assets/css/home.css');?>"> -->
    <title>AfricVillage-<?= $element ?></title>
</head>
<body>

<?php
    $this->load->view('layout/header.php');
?>
  
    
<style type="text/css">
    body{
        padding-top : 50px;
    }
    .carroussel a{display: block;float:left;width: 182px;height: 130px;margin-right: 40px; padding-left: 10px;}

</style>

<div class="container" style="padding-bottom: 30px; padding-top: 50px;"> 
    <div class="row">
            <h2>
                <?php  
                    if (isset($results) && $element && $localisation!='null') {
                    echo  $this->lang->line('search_elementResult').' "'.$element.'" '.$this->lang->line('search_preposition').' "'.$localisation.'"';
                    }
                    elseif(isset($results) && $element)
                    {
                        echo $this->lang->line('search_elementResult').' "'.$element.'"';
                    }
                ?>
            </h2>
        <div class="col"><---annonce---></div>
        <div class=" col-sm-10">
<?php  
if (empty($results)) {
 echo '<h1>Aucun resultat pour "'.$element.'" !</h1>';
}
else
{
    foreach ($results as $row) {
//___reation de l'objet image qui va s'afficher dans les resultats
        $req = "SELECT * FROM image_of_article WHERE id_article=".$row->id_article;
//___execution de la requette
        $sql = $this->db->query($req); 
//___stockage des elements resultant de la requette dans la variable $data
        $image = $sql->result(); 
        $lang = $this->session->get_userdata('language');  
        if($lang['site_lang'] == 'french')
        {                            
            $category = $row->name_category;
        }
        else
        {
            $category = $row->name_category_en;                        
        } 
?>
            <table class="table">
                <tbody>
                    <tr>
                        <td width="200">
                            <img src="<?php if($row->type_a == 'service'){ echo base_url('/_seller_datas_/'.$row->id_seller.'/_publication/_service/'.$row->name_image ); }else{echo base_url('/_seller_datas_/'.$row->id_seller.'/_publication/_product/'.$image[0]->name_image );}?>" width="200" class="img-thumbnail" alt="Chevrolet">  
                        </td>
                        <td> 
                            <p><b><?= $this->lang->line('search_boutique') ?> </b><?= $row->name_shop ?></br>
                                <b><?= $this->lang->line('search_description') ?> </b><?= $row->description_article?> </br> 
                                <b><?= $this->lang->line('search_prix') ?> </b> <?php if($row->price=='0'){echo '<span class="badge bg-success">Gratuit</span>';}else{echo $row->price.' <i class="fa fa-usd" aria-hidden="true"></i>';} ?>  </br>
                                <b><?= $this->lang->line('search_category') ?> </b><?= $category ?></br></br>
                                <a href="<?= base_url('more/').$row->id_article ?>" class="btn btn-primary"><?= $this->lang->line('search_detailButton') ?> <i class="fa fa-plus-circle"></i></a> </p>
                        </td>
                    </tr>
                </tbody>
            </table> 
<?php
    }   
}
?> 
     
        </div>
    </div>
</div>       


<?php
                $this->load->view('/layout/footer.php'); 
?>
                
</body>
<script type="text/javascript">
    $('#carroussel').caroufredsel({ 
        scroll : {
            items : 1,
            fx : 'directscroll',
        },
        auto : {
            duration : 800,
            pauseOnHover : 'immediate',
        }
    });
</script>
</html>