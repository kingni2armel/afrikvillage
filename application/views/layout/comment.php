
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

  <p onclick="document.getElementById('id01').style.display='block'" id="myBtn"><i class='fas fa-comment' style='font-size:32px;color:#00cc8c;margin-top:50px'></i></p>

<style>
    
           
<?php
    if (isset($_POST['msg_admin'])){
        $msg = trim(strip_tags($_POST['msg']));
        if (empty($msg)){
            $_SESSION['msg'] = "Vous n'avez pas saisi de message à transmettre...Veuillez réessayer SVP !";
            redirect('about/write_us');
        }
        elseif(!$_SESSION['id_user']){
            $_SESSION['msg'] = "Vous devez vous connecter pour nous envoyer votre message SVP !";
            redirect('connection/login');
        }
        else{
            //___instantiation de la BD
            $db = new PDO('mysql:host=localhost;dbname=afric_village','root','');
            //___recuperation de l'ID_user du receipteur
            $req = "SELECT id_user FROM utilisateur WHERE privilege='administrator'";
            $stmt = $db->query($req);
            $element = $stmt->fetch();
            $receiver = $element['id_user'];
            $date = date('Y-m-d H:i:s');
            $req = "INSERT INTO message VALUES('',".$_SESSION['id_user'].",".$receiver.",'".$msg."',0,'".$date."')";
            $stmt = $db->query($req);
            if ($stmt){
                $_SESSION['msg'] = "Votre message à bien été envoyé...Vous allez receiver une reponse !";
                redirect('about/write_us');
            }
            else{
                $_SESSION['msg'] = "Une erreur c'est produite !".$req;
                redirect('about/write_us');
            }
        }
    }
?>

          
            
        </style>
        <div id="id01" class="modal">
      <form class="modal-content animate" action="" method="post">
                    <h1 class="title-para" style="font-size: 35px;text-align:center;">Envoyer un message à AfricVillage</h1>
                        <p style="text-align: center;"><textarea class="textarea" name="msg" id="" cols="30" rows="10"></textarea></p>
                        <div class="imgcontainer">
                        </div>      
                        <div class="container" style="background-color:#f1f1f1">
                          
                              <button  style="border-radius:5px" name="msg_admin"  type="submit" class="cancel-btn">Envoyer</button>
                              <button  style="border-radius:5px"  type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Annuler</button>
                        </div>
      </form>
    </div>
    
    
    <style>
         #myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  font-size: 18px;
  border: none;
  outline: none;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 4px;
  height:25px;
  height:80px
}
    
    /* Extra styles for the cancel button */
    .cancel-info{
        outline: none;
        background-color: #0092da !important;

        background-color: #f44336;
    }
    .cancel-btn {
        outline:none;
        border:1px solid #0092da;
        color:white;
        width: auto;
        padding: 10px 18px;
       background-color: #0092da;
    }
    .cancelbtn{
        border:1px solid  #f44336;
        color:white;
    }
 
    
    /* Center the image and position the close button */
    .imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
    }
    
    img.avatar {
    width: 40%;
    border-radius: 50%;
    }
    
    .container {
    padding: 16px;
    }
    .textarea{
            height: 80px;
            width:25vw;
            outline: none;
            margin-top: 25px;
    }
    
    span.psw {
    float: right;
    padding-top: 16px;
    }
    
    /* The Modal (background) */
    .modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
    }
    
    /* Modal Content/Box */
    .modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
    }
    
    /* The Close Button (x) */
    .close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
    }
    
    .close:hover,
    .close:focus {
    color: red;
    cursor: pointer;
    }
    
    /* Add Zoom Animation */
    .animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
    }
    
    @-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
    }
    
    @keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
    }
    
    /* Change styles for span and cancel button on extra small screens */
    @media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
    }
    @media all and (min-width:0px) and (max-width:500px){
                .title-para{
                        font-size:15px !important;
                }
                .textarea{
                                width:150px !important;
                }
    }
    .boris{
      height: 100px;
    }
    </style>
    
    <script>
                var modal  = document.getElementById('id01');
                var  caneva = document.getElementsByClassName('cancel-btn');
                var text = document.getElementsByClassName('textarea');
                var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
                

    
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
    }
     
      
        caneva.addEvenlistener('click',function(e){
                        if(text.length>10){
                                    alert(' texting message ');
                        }
        })
                
    </script>