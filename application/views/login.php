<!DOCTYPE html>
<html>
<head>
  <?php include_once('layout/lien_css.html'); ?>
  <?php include_once('layout/lien_js.html');?>
  <title>Login</title>
</head>
<body> 

<div class="container" style="padding-bottom: 50px;"> 
  <div class="row">
    <div class="col-sm-8">
      <div class="pannel-body">
          <h3 class="title-h"><span class="label label-primary"><?= $this->lang->line('login_connexion') ?></span></h3> 
          
<?php
if (validation_errors()) {
  echo '<div class="alert alert-danger" role="alert">'.validation_errors().'</div>';
} 
if(isset($_SESSION['msg']))
{
  echo '<div class="alert alert-warning" role="alert">'.$_SESSION['msg'].'</div>';
  unset($_SESSION['msg']);
}
?>
        </div>
        <form method="post" action=""> 

          <div class="input-group mb-3">
            <span class="input-group-text">@</span>
            <input type="text" class="form-control" placeholder="<?= $this->lang->line('login_email') ?>" aria-label="Username"  name="login" value="<?php echo set_value('login'); if(isset($_SESSION['login'])){echo $_SESSION['login']; unset($_SESSION['login']);}?>">
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock" aria-hidden="true"></i></span>
            <input type="password" class="form-control" placeholder="<?= $this->lang->line('login_pwd') ?>" aria-label="Username" aria-describedby="basic-addon1" name="pwd">
          </div> 
          <!--button type="reset" class="btn btn-danger" style="margin-top: 20px;"><?= $this->lang->line('login_reset') ?></button-->
          <p>Si vous n'avez pas de compte, <a href="<?= base_url('signin') ?>">veuillez vous inscrire</a> !</p>
          <button type="submit" name="submit" class="btn btn-success" style="margin-top:20px;background-color:#0092da !important;border:1px solid #0092da;"><?= $this->lang->line('login_submit') ?></button>
          
        </form>
      </div>
    </div>
    
    <div class="col-sm-4"></div>
  </div> 
         

  <style>
                  @media all  and (min-width:0px) and  (max-width:600px){
                      .title-h{
                        margin-top: 20vw !important;
                      }
                  }
                  @media all and (min-width:0px) and  (max-width:600px){
                                   .title-h{
                                     margin-top: 80px !important;
                                   }
                                    
                        }
          </style> 
  
<?php
//debug($this->lang->line('jklm')); 
//debug( $this->session->get_userdata('language')); 
?>
  <?php $this->load->view('layout/comment');?> 
   
</body>
</html>