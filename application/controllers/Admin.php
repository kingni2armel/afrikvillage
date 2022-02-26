<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once 'C_Addresse.php';
require_once 'C_Utilisateur.php';
require_once 'C_Vendeur.php';
require_once 'C_Client.php';
require_once 'C_Shop.php';
require_once 'C_Administrateur.php';

function verifySession(){
    if(empty($_SESSION['S_id_user'])){ 
        $_SESSION['msg'] = "Vous devez vous connecter pour avoir accès a cette page !"; 
        redirect('admin/login');
    }
    else{
        return false;
    } 
}

	class Admin extends CI_Controller{

		/***
		* @__construct : Constructeur de la classse parente
		 */
		public function __construct()
		{
			parent::__construct();
			$this->load->helper('language');
			$this->load->helper('url');

			$this->load->model('admin_pannel');
		}


		///////////////////////////////////////////
		///										///	
		/// 	fonction d'authentification		///
		///										///
		///////////////////////////////////////////
	/**
    * @param : null
	 * @return :
	 **/
		public function login(){
			//___Definition des regles de validation
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

			//___Lancement de la verification du formulaire
			$this->form_validation->run();

			//___chargement...css
			$this->load->view('layout/lien_css');
			//___Chargement de la vue d'authentification de l'utilisateur
			$this->load->view('admin/login');

			//___Si le formulaire est soumis
			if ($this->form_validation->run() == true ){
				//___Chargement du model d'authentification
				$this->load->model('LoginUser');

				//Recuperation des differents champs
				$login = $this->input->get_post('login');
				$pwd = $this->input->get_post('pwd');
				$data = $this->LoginUser->adminLogin($login, $pwd);

				if (is_array($data)) {

					//Creation des sessions du superUtilisateur
					//___Donnees sur le surper utilisateur
					$this->session->set_userdata('S_id_user',$data['user']->getIdUser());
					$this->session->set_userdata('S_nom_user',$data['user']->getNomUser());
					$this->session->set_userdata('S_prenom_user',$data['user']->getPrenomUser());
					$this->session->set_userdata('S_email_user',$data['user']->getEmailUser());
					$this->session->set_userdata('S_phone_user',$data['user']->getPhoneUser());
					$this->session->set_userdata('S_privilege',$data['user']->getPrivilege());
					$this->session->set_userdata('S_sexe',$data['user']->getSexe());
					//___Donnees sur l'adresse du super utilisateur
					$this->session->set_userdata('S_id_address',$data['address']->getIdAddresse());
					$this->session->set_userdata('S_country',$data['address']->getCountry());
					$this->session->set_userdata('S_city',$data['address']->getCity());
					$this->session->set_userdata('S_street',$data['address']->getStreet()); 

					//___Redirection vers l'admin pannel
					redirect('admin/dashboard'); 
				}
				else{
					$_SESSION['msg'] = 'ERREUR : Login ou mot de passe incorrecte';
					redirect('admin/login');
				}

			}



		}
	///////////////////////////////////////////
	///										///		
	///		Dashboard de l'administrateur	///
	///										///
	///////////////////////////////////////////
	public function dashboard(){
		verifySession();
		//insertion des sessions de l'admin dans un tableau
		$usrData = array(
			'S_id_user' => $_SESSION['S_id_user'],
			'S_nom_user' => $_SESSION['S_nom_user'],
			'S_prenom_user' => $_SESSION['S_prenom_user'],
			'S_email_user' => $_SESSION['S_email_user'],
			'S_phone_user' => $_SESSION['S_phone_user'],
			'S_privilege' => $_SESSION['S_privilege'],
			'S_sexe' => $_SESSION['S_sexe'],
			'S_id_address' => $_SESSION['S_id_address'],
			'S_country' => $_SESSION['S_country'],
			'S_city' => $_SESSION['S_city'],
			'S_street' => $_SESSION['S_street']
		);
		//	Chargement des donnees du dashboard dans un tableau
		$this->load->model('LoginUser');
		$pannelData = $this->LoginUser->adminPannelData();

		//___chargement...css
		$this->load->view('layout/lien_css');
		//___chargement du dashboard de l'admin et des donnees du pannel
		$this->load->view(
			'admin/dashboard', 
			array(
				'userData' => $usrData,
				'pannelData' => $pannelData
			)
		);

	}

	///////////////////////////////////////////////////////////
	///														///
	///		Liste des messages recu par l'administrateur	///
	///														///
	///////////////////////////////////////////////////////////
	public function list_messages()
	{
		verifySession();
		//___chargement du model
		$this->load->model('message');
		//___bibliotheque de pagination
		$this->load->library('Pagination_bootstrap');

		$req  = "SELECT  m.id_message, m.id_sender, m.content, m.statut, m.date_message, u.nom_user, u.prenom_user, u.email_user ";
            $req .= "FROM message m, utilisateur u ";
            $req .= "WHERE u.id_user=m.id_receiver AND u.email_user='".$_SESSION['S_email_user']."' ";
            $req .="ORDER BY m.date_message DESC"; //echo $req;
            $sql = $this->db->query($req);
            $data = $sql->result();

		//___5 messages par pagination
		$this->pagination_bootstrap->offset(5);

		//___lien css et js
		$this->load->view('layout/lien_js');
		$this->load->view('layout/lien_css');
		//___entete d'administration
		$this->load->view('layout/headeradmin.php');
		//___Si l'utilisateur n'a recu aucun message
		if (empty($data)){

			$this->load->view('admin/list_message');
		}
		//___Sinon on retourne la liste des messages qu'il a recu
		else{
			$data = $this->pagination_bootstrap->config('account/message/',$sql);
			$this->load->view('admin/list_message',array('results'=>$data)); //___vue de la page des publications
		}
	}

///////////////////////////////////////////////
///                                         ///
///     Recupere les donnees d'un message   ///
///                                         ///            
///////////////////////////////////////////////
/**
*  @param : id_message
 * @return :
 */

    public function message($id_message)
    {
    	verifySession();
    	$this->load->view('layout/lien_css');
    	$this->load->view('layout/lien_js');

        $this->form_validation->set_rules('msg','Message','required');

//___Chargement de la validation du formulaire
        $this->form_validation->run();

        if ($this->form_validation->run() == true){
            //___Recuperation des champs du client
            $receiver = $this->input->get_post('receiver');
            $message = $this->input->get_post('msg');
            $message = trim(strip_tags($message));

            //___Chargement du model
            $this->load->model('message');//___ model

            if (empty($message)){
                $_SESSION['msg'] = "Votre message n'a pas été envoyé car vous n'avez pas inseré votre réponse !";
                redirect('admin/list_messages');
            }
            else{
                $reply = $this->message->replyMessage($_SESSION['S_id_user'], $receiver, $message);
                if ($reply) {
            	redirect('admin/list_messages');
                } 
            }


        }



//___requete de selection du message
        $req  = "SELECT m.id_message, m.id_sender, m.content, m.statut, m.date_message, u.nom_user, u.prenom_user, u.email_user ";
        $req .= "FROM message m, utilisateur u ";
        $req .= "WHERE u.id_user=m.id_receiver AND m.id_message=".$id_message;
        $req .=" ORDER BY m.date_message DESC"; 
//___execution de la requete
        $query = $this->db->query($req); 

//___recuperation des donnees qui resulte de la requete
        $data = $query->result();
//___si l'identifiant du message n'est lié a aucun message
        if(empty($data)){
            redirect('admin/list_messages');
        }
//___selection des donnees de l'expediteur a partit de son identifiant
            $req2 = "SELECT u.nom_user, u.prenom_user, u.email_user FROM utilisateur u WHERE id_user = ".$data[0]->id_sender;
            $sql2 = $this->db->query($req2);
            $sender= $sql2->result();

//___chargement de la vue 'message'
        $this->load->view('admin/message', array('results' => $data, 'sender'=>$sender));

//___si le statut du message est egale a 0
        if ($data[0]->statut == 0) {
//___Modification du statut du message
            $statut = array('statut' => 1);
            $this->db->where('id_message', $id_message);
            $this->db->update('message', $statut);
        }
        return ;

    }

	///////////////////////////////////////////////////////////////////////////////
	///																			///
	///		Retourne la liste de tous les utilisateurs inscrit dans le site 	///
	///																			///
	///////////////////////////////////////////////////////////////////////////////
	public function inscriptions(){
//___chargement de la vue
		verifySession();
		$this->load->view('layout/lien_css');
		$this->load->view('layout/headeradmin.php');

		$data = $this->admin_pannel->total_inscrits(); 

		$this->load->view('admin/lstinscription', array('count'=>$data['count'],'data'=>$data['data']));

		$this->load->view('layout/lien_js');

	}


	///////////////////////////////////////////////////////////////////////////////
	///																			///
	///		Retourne la liste de tous les clients inscrit dans le site 			///
	///																			///
	///////////////////////////////////////////////////////////////////////////////
	public function clients(){
		verifySession();
		$this->load->view('layout/lien_css');
		$this->load->view('layout/headeradmin.php');

		$data = $this->admin_pannel->total_clients();  

		$this->load->view('admin/lstcustomer', array('count'=>$data['count'],'data'=>$data['data']));

		$this->load->view('layout/lien_js');

	}

	///////////////////////////////////////////////////////////////////////////////
	///																			///
	///		Retourne la liste de tous les vendeurs inscrit dans le site 		///
	///																			///
	///////////////////////////////////////////////////////////////////////////////
	public function vendeurs(){
		verifySession();
		$this->load->view('layout/lien_css');
		$this->load->view('layout/headeradmin.php');

		$data = $this->admin_pannel->total_vendeurs();  

		$this->load->view('admin/lstseller', array('count'=>$data['count'],'data'=>$data['data']));

		$this->load->view('layout/lien_js');

	}

	///////////////////////////////////////////////////////////////////////////////
	///																			///
	///		Retourne la liste de toutes les categories insérées dans le site 	///
	///																			///
	///////////////////////////////////////////////////////////////////////////////
	public function categories(){
		verifySession();
		$this->load->view('layout/lien_css');
		$this->load->view('layout/headeradmin.php');

		$data = $this->admin_pannel->total_categories();  

		$this->load->view('admin/lstcategorie', array('count'=>$data['count'],'data'=>$data['data']));

		$this->load->view('layout/lien_js');

	}


	///////////////////////////////////////////////////////////////////////////
	///																		///
	///		Retourne la liste de tous les articles publiés dans le site 	///
	///																		///
	///////////////////////////////////////////////////////////////////////////
	public function articles(){
		verifySession();
		$this->load->view('layout/lien_css');
		$this->load->view('layout/headeradmin.php');

		$data = $this->admin_pannel->total_articles();  

		$this->load->view('admin/lstarticle', array('count'=>$data['count'],'data'=>$data['data']));

		$this->load->view('layout/lien_js');

	}

	///////////////////////////////////////////////////////////////////////////
	///																		///
	///		Retourne la liste de tous les moderateurs ajoutés dans le site 	///
	///																		///
	///////////////////////////////////////////////////////////////////////////
	public function moderateurs(){
		verifySession();
		/*$this->load->view('layout/lien_css');
		$this->load->view('layout/headeradmin.php');
		$this->load->view('admin/lstinscription');
		$this->load->view('layout/lien_js');*/

	}

	///////////////////////////////////////////////////////
	///													///
	///		Retourne les informations d'un utilisateur	///
	///													///
	///////////////////////////////////////////////////////
	public function info_user($id_user){
		verifySession();
		$this->load->view('layout/lien_css');
		$this->load->view('layout/headeradmin.php');

		$data = $this->admin_pannel->info_user($id_user); 

		$this->load->view('admin/info_user', array('userData'=>$data)); 
		 
		$this->load->view('layout/lien_js');

	}


	///////////////////////////////////////////////////////////////
	///													        ///
	///		Permet d'edititer les informations des utilisateurs	///
	///													        ///
	///////////////////////////////////////////////////////////////
	public function edit_user($id_user){
		verifySession();
		$this->load->view('layout/lien_css');
		$this->load->view('layout/headeradmin.php');

		$data = $this->admin_pannel->info_user($id_user);

		//___parametre de validation du formulaire
		$this->form_validation->set_rules('nom_user', 'nom de l\'utilisateur', 'required');
		$this->form_validation->set_rules('prenom_user', 'prenom de l\'utilisateur', 'required');
		$this->form_validation->set_rules('email_user', 'email de l\'utilisateur', 'required');
		$this->form_validation->set_rules('phone_user', 'telephone de l\'utilisateur', 'required');
		$this->form_validation->set_rules('pays_user', 'pays de l\'utilisateur', 'required');
		$this->form_validation->set_rules('ville_user', 'ille de l\'utilisateur', 'required');
		$this->form_validation->set_rules('rue_user', 'rue de l\'utilisateur', 'required');

		//___si les info d'un vendeur sont sur le point d'etre modifier
		if($this->input->get_post('nom_shop')){
			$this->form_validation->set_rules('nom_shop', 'nom de la boutique de l\'utilisateur', 'required');
			$this->form_validation->set_rules('ville_shop', 'ville de la boutique de l\'utilisateur', 'required');
			$this->form_validation->set_rules('rue_shop', 'rue de la boutique de l\'utilisateur', 'required');
			$this->form_validation->set_rules('description_shop', 'description de la boutique de l\'utilisateur', 'required');
		}

		//___Execution de formulaire
		$this->form_validation->run();

		if ($this->form_validation->run() == true){
			//___recuperation des donnees de l'utilisateur
			$nom_user = $this->input->get_post('nom_user');
			$prenom_user = $this->input->get_post('prenom_user');
			$email_user = $this->input->get_post('email_user');
			$phone_user = $this->input->get_post('phone_user');
			//___recuperation des donnees sur l'adresse de l'utilisateur
			$pays_user = $this->input->get_post('pays_user');
			$ville_user = $this->input->get_post('ville_user');
			$rue_user = $this->input->get_post('rue_user');

			if ($this->input->get_post('nom_shop')){
				//___recuperation des donnees sur la boutique de l'utilisateur
				$nom_shop = $this->input->get_post('nom_shop');
				$ville_shop = $this->input->get_post('ville_shop');
				$rue_shop = $this->input->get_post('rue_shop');
				$description_shop = $this->input->get_post('description_shop');
				$id_shop = $data['sellerData']['sellerShop'][0]->id_shop;
			}
			if(isset($id_shop)){
				$stmt_shop = $this->admin_pannel->update_shop($id_shop, $nom_shop, $ville_shop, $rue_shop, $description_shop);
			}

			$id_user = $data['userData']['userData'][0]->id_user;
			$id_address = $data['userData']['userAddress'][0]->id_address;
			$stmt_user = $this->admin_pannel->update_user($id_user,$id_address,$nom_user, $prenom_user, $email_user, $phone_user, $pays_user, $ville_user, $rue_user);
			redirect('admin/edit_user/'.$id_user);

			//On affiche le message de confirmation
			$_SESSION['msg'] = "Votre modification a ete prise en compte !!";
		}

		$this->load->view('admin/edit_user', array('data'=>$data));  

		$this->load->view('layout/lien_js');
	}


	/*----------------------------------------------------*/////
	public function edit_category($id_category){
		verifySession();
		$this->load->view('layout/lien_css');
		$this->load->view('layout/headeradmin.php');
		//___parametre de validation du formulaire
		$this->form_validation->set_rules('category_fr','Categorie en francais','required');
        $this->form_validation->set_rules('category_en','Categorie en anglais','required');
        $this->form_validation->set_rules('category_icon','Icone de la categorie','required');

		//___execution du formulaire
		$this->form_validation->run(); 

		if ($this->form_validation->run() == true) {
			$cat_fr = $this->input->get_post('category_fr');
			$cat_en = $this->input->get_post('category_en');
			$cat_ico = $this->input->get_post('category_icon');

			$stmt = $this->admin_pannel->update_category($id_category, $cat_fr, $cat_en, $cat_ico);
			if ($stmt) {
				$_SESSION['msg'] = 'La modification a été effectué avec succès!';
			} 

		}
		else {
			
		}
		$category = $this->admin_pannel->get_category($id_category); 
		
		$this->load->view('admin/edit_category',array('category' => $category));  

		$this->load->view('layout/lien_js');
	}

	public function add_category(){
		verifySession();
		$this->load->view('layout/lien_css');
		$this->load->view('layout/headeradmin.php');
		//___parametre de validation du formulaire
		$this->form_validation->set_rules('category_fr','Categorie en francais','required');
        $this->form_validation->set_rules('category_en','Categorie en anglais','required');
        $this->form_validation->set_rules('category_icon','Icone de la categorie','required');

		//___execution du formulaire
		$this->form_validation->run(); 

		if ($this->form_validation->run() == true) {
			$cat_fr = $this->input->get_post('category_fr');
			$cat_en = $this->input->get_post('category_en');
			$cat_ico = $this->input->get_post('category_icon');

			$stmt = $this->admin_pannel->add_category($cat_fr, $cat_en, $cat_ico);
			if ($stmt) {
				$_SESSION['msg'] = 'La catégorie a été ajouté avec succès!';
			} 

		}
		else {
			
		} 
		
		$this->load->view('admin/add_category');  

		$this->load->view('layout/lien_js');
	}

	public function del_category($id_category){
		verifySession();
		$stmt = $this->admin_pannel->del_category($id_category);
		if ($stmt) {
			redirect('admin/categories');
		}
		
	}
















    
    /*public function Superviseur()
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
                    redirect(site_url('publication/publications'));
                }
                else{
                    redirect(site_url());
                }


            }
        }

//___Chargement du pied de page
    $this->load->view('/layout/footer.php');


    }*/
}



 ?>
