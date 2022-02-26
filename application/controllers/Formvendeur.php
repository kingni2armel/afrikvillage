<?php 
//include_once ("class/Utilisateur.php");
include_once ("C_Vendeur.php");
include_once ("C_Addresse.php");
include_once ("C_Shop.php");


function verifySession(){
    if(empty($_SESSION['id_user'])){
        if ($_SESSION['site_lang'] == 'french') {
            $_SESSION['msg'] = "Vous devez vous connecter pour avoir accès a cette page !";
        }
        else{
            $_SESSION['msg'] = "You must be connected for open this page !";
        }
        redirect('login');
    }
    else{
        return false;
    } 
}




class Formvendeur extends CI_Controller{


    public function __construct()
    {
            parent::__construct();
            $this->load->helper('url');
    }

    public  function formulairevendeur()
    {
        verifySession();
        //___Verification
        $this->form_validation->set_rules('nom','Nom','required');
        $this->form_validation->set_rules('prenom','Prenom','required');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email');
        $this->form_validation->set_rules('phone','Phone number','required');
        $this->form_validation->set_rules('pays','Country','required');
        $this->form_validation->set_rules('ville','Town','required');
        $this->form_validation->set_rules('rue','Street','required');
        $this->form_validation->set_rules('pobox','P.O Box','required');
        $this->form_validation->set_rules('shopname','Shop name','required');
        $this->form_validation->set_rules('shopstreet','Shop street','required');
        $this->form_validation->set_rules('shoptown','Shop Town','required');
        //$this->form_validation->set_rules('gender','Gender','required');
        $this->form_validation->set_rules('pwd','Password','required');
        $this->form_validation->set_rules('rpwd','Password confirmation','required|matches[pwd]');
        $this->form_validation->run();
        $this->load->view('formulairevendeur');

        //___Si le formulaire est valide
        if ($this->form_validation->run() == true) 
        {         

            //___chargement du model d'inscription du vendeur
            $this->load->model('signupuser');//___Chargement du model

            //___Recuperation des champs Addresse
            $pays = $this->input->get_post('pays');
            $ville = $this->input->get_post('ville');
            $rue = $this->input->get_post('rue'); 

            //___Recuperation des champs du vendeur
            $nom = $this->input->get_post('nom');
            $prenom = $this->input->get_post('prenom');
            $email = $this->input->get_post('email');
            $phone = $this->input->get_post('phone');
            $password = $this->input->get_post('pwd');
            $sexe = $this->input->get_post('gender');

            //___Recuperatiin des champs Boutique
            $shopname = "JKLMfashion";
            $shoptown = $this->input->get_post('shoptown');
            $shopstreet = $this->input->get_post('shopstreet');
            $shopdescription = "Vetements de soirés...";  
             
            //___Traitement
            $addresse = new Addresse($pays, $ville, $rue);//objet Addresse 
            $id_address = $this->signupuser->saveAddress($addresse);//___add adresse
            $addresse->setIdAddresse($id_address);

            //___Creation du vendeur
            $seller = new Vendeur($nom, $prenom, $email, $phone, $password, $sexe, $addresse,$shopname,$shoptown,$shopstreet,$shopdescription);
            $seller->setIdAddress($id_address); 
            $seller->setPrivilege("seller");      
            $id_user = $this->signupuser->saveSeller($seller);
            $seller->setIdUser($id_user); 
            
            
            //___Creation de la boutique
            $shop = new Shop($shopname, $shoptown, $shopstreet,$shopdescription);
 
            //___Ajout de l'utilisateur dans la base de donnees
            //$seller->setIdSeller($addresse->getIdAddresse());  
            //___Insertion du vendeur dans la base de donnee
            //$this->seller->addSeller($seller,$addresse); 
             
        }
        
    }
}

?>
