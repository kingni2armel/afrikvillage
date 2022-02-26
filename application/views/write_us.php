<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once('layout/lien_css.html'); ?>
    <?php include_once('layout/lien_js.html');?>

    <title>Write to us</title>
</head>

<body>


<?php //$this->load->view('layout/homephone')?>





<div class="container" style="padding-bottom: 20px; margin-top:165px; "> 
    <?php //debug($results); ?>
    <div class="row ">
        <div class="col-lg-6">
<?php
if(isset($_SESSION['msg']))
{
    echo '<div class="alert alert-warning" role="alert">'.$_SESSION['msg'].'</div>';
    unset($_SESSION['msg']);
}
?>
        <h1>Envoyer un message à AfricVillage</h1>
        <form method="post">
            <div class="input-group mb-3">
                  <input class="form-control " readonly="" name="receiver" value="<?= $_SESSION['email_user']?>">
            </div>
            <div class="input-group mb-3">
              <textarea class="form-control" name="msg" placeholder="Envoyer nous votre message..."></textarea>
            </div>
              <button type="submit" class="btn btn-success">Envoyer mon message</button>
              <a href="#" class="btn btn-danger">Effacer le message</a>
          </form>
        </div>
    </div>
</div>


</body>
</html>