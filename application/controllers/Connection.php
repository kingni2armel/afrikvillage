<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'C_Addresse.php';
require_once 'C_Utilisateur.php';
require_once 'C_Vendeur.php';
require_once 'C_Client.php';
require_once 'C_Shop.php';

class Connection extends CI_Controller{ 
    
    public function __construct() 
    {
        parent::__construct();
        $this->load->helper('language');  
        $this->load->helper('url'); 
    }
    

    ///////////////////////////////////////////////////////
    ///                                                 ///        
    ///     Charge et gere la page d'authentification   ///
    ///                                                 ///
    ///////////////////////////////////////////////////////
    public function login()
    { 
//___chargement de l'entete
         $this->load->view('layout/header'); 


        if (isset($_SESSION['site_lang']) && $_SESSION['site_lang'] == 'english') 
        {
        //___Configuration des regles de validation
        $this->form_validation->set_rules(
            'login','<b>Email address</b>',
            'trim|required|valid_email',
            array(
                'required' => 'The input {field} is required.',
                'valid_email'=> 'The input {field} must be contain a valid email address.'
            )
        ); 
        $this->form_validation->set_rules(
            'pwd','<b>Mot de passe</b>',
            'required',
            array(
                'required' => 'the input {field} is required.'
            )
        );
        }
        else
        {
            //___Configuration des regles de validation
        $this->form_validation->set_rules('login','<b>Adresse email</b>','trim|required|valid_email',); 
        $this->form_validation->set_rules('pwd','<b>Mot de passe</b>','required');
        }

        $this->form_validation->run(); 
        $this->load->view('login');
        //___Lancement de la validation apres la validation du formulaire
        if ($this->form_validation->run() == true) 
        {
            //___Chargement du model
            $this->load->model('loginUser');

            //Recuperation des differents champs
            $login = $this->input->get_post('login');
            $pwd = $this->input->get_post('pwd');

            //___Echaper les donnees
            $login = trim(strip_tags($login));
            $pwd = trim(strip_tags(($pwd)));

            $user = $this->loginUser->getConnection($login, $pwd);

            if ($user != false) 
            {

                //___addresse du vendeur
                $this->session->set_userdata('id_user',$user->getIdUser());
                $this->session->set_userdata('nom_user',$user->getNomUser());
                $this->session->set_userdata('prenom_user',$user->getPrenomUser());
                $this->session->set_userdata('email_user',$user->getEmailUser());
                $this->session->set_userdata('phone_user',$user->getPhoneUser());
                $this->session->set_userdata('privilege',$user->getPrivilege());
                $this->session->set_userdata('sexe',$user->getSexe());
                //___addresse du client
                $this->session->set_userdata('id_address',$user->getAddresse()->getIdAddresse());
                $this->session->set_userdata('country',$user->getAddresse()->getCountry());
                $this->session->set_userdata('city',$user->getAddresse()->getCity());
                $this->session->set_userdata('street',$user->getAddresse()->getStreet()); 

                //___on verifie la valeur du privilege utilisateur
                if ($user->getPrivilege() == 'seller') 
                {
                    //___Si l'utilisateur est un vendeur, on charge les informations du vendeur dans les sessions... 
                    $this->session->set_userdata('id_seller',$user->getIdSeller());
                    $this->session->set_userdata('created_at',$user->getSellerCreatedAt());
                    //___information sur la boutique du vendeur
                    $this->session->set_userdata('id_shop',$user->getShop()->getIdShop());
                    $this->session->set_userdata('name_shop',$user->getShop()->getNameShop());
                    $this->session->set_userdata('street_shop',$user->getShop()->getStreetShop());
                    $this->session->set_userdata('city_shop',$user->getShop()->getCityShop());
                    $this->session->set_userdata('description_shop',$user->getShop()->getDescriptionShop()); 

                    //debug($_SESSION);
                }
                else
                {
                    //___Si l'utilisateur est un client, on charge les ingormations du client dans les sessions
                    $this->session->set_userdata('id_customer',$user->getIdCustomer());
                    $this->session->set_userdata('created_at',$user->getCustomerCreatedAt());


                }
 
                //___page d'accueil
                if ($_SESSION['privilege'] == 'seller') {
                    redirect(site_url('publications'));
                }
                else{
                    redirect(site_url('home'));
                }


            } 
        }

//___Chargement du pied de page
    $this->load->view('/layout/footer.php'); 
     
        
    }
}
