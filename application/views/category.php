<!DOCTYPE html>
<html lang="en">
<head>
        <?php include_once('layout/lien_css.html'); ?>
        <?php include_once('layout/lien_js.html');?>
        <!-- <link rel="stylesheet" href="<?php echo base_url('../../assets/css/home.css');?>"> -->
    <title>Document</title>
</head>
<body>

<?php
    $this->load->view('layout/header.php');
?>
  
    
<style type="text/css">
    .carroussel a{
        display: block;
        float:left;
        width: 182px;
        height: 130px;
        margin-right: 40px; 
        padding-left: 10px;}

</style>

<div class="container" style="padding-bottom: 30px; padding-top: 50px;"> 
    <div class="row">
            <h2>
                <?php
                if (isset($results)) {
                    $lang = $this->session->get_userdata('language');  
                    if($lang['site_lang'] == 'french')
                    {                            
                        echo $results[0]->name_category;
                    }
                    else
                    {
                        echo $results[0]->name_category_en; 
                    } 
                }
                ?>
            </h2>
        <!--div class="col"><---annonce </div-->
        <div class=" col-sm-10">
<?php  
if (empty($results)) {
 echo '<h4>'.$this->lang->line('category_emptyElements').'</h4>';
}
else
{
    foreach ($results as $row) {
?>
            <table class="table">
                <tbody>
                    <tr>
                        <td width="200">
                            <img src="<?php if($row->type_a == 'service'){ echo base_url('/_seller_datas_/'.$row->id_seller.'/_publication/_service/'.$row->name_image ); }else{echo base_url('/_seller_datas_/'.$row->id_seller.'/_publication/_product/'.$row->name_image );}?>" width="200" class="img-thumbnail" alt="Chevrolet">  
                        </td>
                        <td> 
                            <p><b><?= $this->lang->line('category_boutique') ?> </b><?= $row->name_shop ?></br>
                                <b><?= $this->lang->line('category_description') ?> </b><?= $row->description_article?> </br> 
                                <b><?= $this->lang->line('category_prix') ?> </b> <?php if($row->price=='0'){echo '<span class="badge bg-success">Gratuit</span>';}else{echo $row->price.' $';} ?>  </br></br>
                                <a href="<?= base_url('more/').$row->id_article ?>" class="btn btn-primary"><?= $this->lang->line('category_moreInfo') ?><i class="fa fa-plus-circle"></i></a> </p>
                        </td>
                    </tr>
                </tbody>
<?php
    }   
}
?> 
                <tfoot>
                            <tr>
                                <td class="text-center" colspan="5">
                                    <div class="row justify-content-center">
                                       <div class="col-4">
                                        <?= $this->pagination_bootstrap->render() ?>
                                      </div>
                                 </div>
                                </td>
                            </tr>
                        </tfoot>
            </table>
     
        </div>
    </div>
</div>       


<?php
                $this->load->view('/layout/footer.php'); 
?>
 <?php $this->load->view('layout/comment');?>               
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