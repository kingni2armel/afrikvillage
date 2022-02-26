<!DOCTYPE html>
	<html lang="fr">
	<?php
	/*function debug($arg)
  {
    echo "<pre>";
    var_dump($arg);
    echo "</pre>";
  }*/
	if (empty($_SESSION['S_id_user'])){
		redirect('admin/login');
	}
	?>
	<body>
		<div class="cara">

			<div class="cara_items">


							<ul >
							<li style="margin-top:30px" class="li-dash"><a href="<?=  base_url('welcome/home');?>"><img class="logo-dash" src="<?php  echo base_url('images/agent.jpg');?>" alt=""></a></li>
							<li class="li-dash"><h1 style="font-size:30px;margin-top:10px;">Admin Panel</h1></li>
							</ul>
			</div>
			<div class="cara_items">


				<ul>

				<li><a href="<?= base_url('admin/list_messages') ?>" class="link-da">Messages</a></li>
				<li><a href="<?= base_url('admin/dashboard') ?>" class="link-da" >Accueil</a></li>
				<li class="dropdownee">
					<a href="javascript:void(0)" class="dropbtnee"><?= $_SESSION['S_email_user']?></a>
					<div class="dropdowne-contentee">
						<a href="#">Moderateurs</a>
						<a href="#">Clients</a>
						<a href="#">Vendeurs</a>
						<form method="post">
							<button name="leave" style="border : none;margin-left:10px">Deconnexion</button>
						</form>

					</div>
				</li>
				</ul>
			</div>

		</div>

	</body>
	</html>

	<style>
		body{
			padding: 0;
			margin:0;
		}
		.cara{
			display: flex;
			justify-content: space-between;
			align-items: center;
			width: 100% !important;
			position: fixed;
			top:0;
			left: 0;
			background-color: #0092da;
		}
		.dropbtnee:hover{
		  color:white !important;
		}
		.link-da:hover{
			  color:white !important;
		}
	ul {
	  list-style-type: none;
	  margin: 0;
	  padding: 0;
	  overflow: hidden;

	}

	li {
	  float: left;
	}

	li a, .dropbtnee {
	  display: inline-block;
	  color: white;
	  text-align: center;
	  padding: 14px 16px;
	  text-decoration: none;
	}
	li.dropdownee {
	  display: inline-block;
	}

	.dropdowne-contentee {
	  display: none;
	  position: absolute;
	  background-color: #f9f9f9;
	  min-width: 160px;
	  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	  z-index: 1;
	 ;
	}

	.dropdowne-contentee a {
	  color: black;
	  padding: 12px 16px;
	  text-decoration: none;
	  display: block;
	  text-align: left;
	}

	.dropdowne-contentee a:hover {background-color: #f1f1f1;}

	.dropdownee:hover .dropdowne-contentee {
	  display: block;
	}
	.logo-dash{
							height:45px;
							margin-top:-40px;
					}
	.li-dash{
		float-left;
	}
	</style>
	<?php
	//echo debug($pannelData);



	if (isset($_POST['leave'])){
		session_unset();
		redirect('admin/login');
	}
	?>
