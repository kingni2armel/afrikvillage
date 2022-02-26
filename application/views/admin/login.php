
			<div class="conteiner_design" style="width: 100%;height:100px;background-color:#0092da;">
				<ul class="conteiner-ul-dash-login">
							<li style="margin-top:30px" class="li-dash"><a href="<?=  base_url('welcome/home');?>"><img class="logo-dash" src="<?php  echo base_url('images/agent.jpg');?>" alt=""></a></li>
							<li style="margin-top:30px" class="li-dash"><h2>Afric village espace admin</h2>
</li>
				</ul>
				  </div>

				  
			
				<style>
								.boutlogo{
									
								}
				</style>
			
	<style>

				.boutlogo{
					margin-top:100px;
					background-image:url('../images/agent.png');
					background-repeat:no-repeat;
					background-attachement:fixed;
					background-size:cover;
					width:30%;
					height:520px;
					margin-left:12vw;

				}
				.conteiner_design{
					position:fixed;
					top:0;
					lelft:0;
					z-index:1;
				}
				.btn-connect{
						background-color: #0092da;
						border-radius: 5px;
						border:1px solid #0092da;
						color:white;
						height:50px;
						width: 10vw;
				}
				.btn-annuler{
					width: 10vw;
					background-color:   red;
					border:1px solid red;
					border-radius:  5px;
					height:50px;
					color:white;

				}
			
				.image{
						width:100%;
						heigth:100px;

				}
					.conteiner_log{
								display:flex;
								justify-content: center;
								align-items: center;
								margin-top:-350px;
								margin-left:25vw;
						
					}
					.input_admin{
					margin-bottom: 20px;
					outline: none;
					border-radius: 5px;
					width: 100%;
					height: 50px;
					border:none;
					padding-left: 10px;
					box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
					}
					.input_admin:focus{
					
						transition: 1s;
					}
					H1{
						text-align:center;
						margin-top:-30px;
					}
					.logo-dash{
							height:45px;
					}
					.conteiner_log{
								
								background-image
					}
					.li-dash{
						float:left;
						padding:0px 5px;
						list-style:none;
					}
					.conteiner-ul-dash-login{
							margin-left:-15px !important;
							margin-top:5px !important;
					}
				

	</style>
	
	
<style>

				
.hero-image {
  background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("../images/agent.png");
  height: 90vh;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
  margin-top:100px;
}

.hero-text {
  text-align: center;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: white;
}




</style>
</head>
<body>

<div class="hero-image">
  <div class="hero-text">
  <div class="conteiner_log_items">
											<form action="" method="post">
												<h1>Admin Pannel</h1>

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

															<input class="input_admin" type="text" placeholder="login" name="login"></br>
															<input class="input_admin" type="password" placeholder="Password" name="pwd"></br>
																<div class="cont-but" style="display:flex;justify-content: center;">
																			<div class="p">
																				<button class ="btn-connect" type ="submit" name="connexion"> Sing in</button>
																				<button class="btn-annuler" type="reset">Annuler</button>
																			</div>
																			<div class="p"></div>
																</div>
											</form>


								</div>
  </div>
</div>
<style>
	li{
		list-style: none;
	}
</style>
<?php $this->load->view('layout/footer'); ?>
