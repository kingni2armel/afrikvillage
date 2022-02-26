<?php
include_once ("C_Utilisateur.php");

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



class Account extends CI_Controller
{
	
	public function __construct() {
        parent::__construct();
        $this->load->helper('url');
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
//___Si l'utilisateur ne s'est pas connecté, on le redirige a la page de connection 
        verifySession();

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
                redirect('messagelist');
            }
            else{
                $reply = $this->message->replyMessage($_SESSION['id_user'], $receiver, $message);
                if ($reply) {
                    redirect('messagelist');
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
            redirect('messagelist');
        }
//___selection des donnees de l'expediteur a partit de son identifiant
            $req2 = "SELECT u.nom_user, u.prenom_user, u.email_user FROM utilisateur u WHERE id_user = ".$data[0]->id_sender;
            $sql2 = $this->db->query($req2);
            $sender= $sql2->result();

//___chargement de la vue 'message'
        $this->load->view('message', array('results' => $data, 'sender'=>$sender));

//___si le statut du message est egale a 0
        if ($data[0]->statut == 0) {
//___Modification du statut du message
            $statut = array('statut' => 1);
            $this->db->where('id_message', $id_message);
            $this->db->update('message', $statut);
        }
        return ;

    }







//////////////////////////////////////////////////////////////////////
///                                                                /// 
///     Retourne la liste des message qu'un utilisateur a recu     ///
///                                                                ///
//////////////////////////////////////////////////////////////////////

/**
*  @param : null
 * @return :
 */	
    public function list_message()
    { 
//___Si l'utilisateur ne s'est pas connecté, on le redirige a la page de connection 
        verifySession();


            $this->load->model('message');//___Chargement du model
            
            $this->load->library('Pagination_bootstrap');//___bibliotheque de pagination

            $req  = "SELECT  m.id_message, m.id_sender, m.content, m.statut, m.date_message, u.nom_user, u.prenom_user, u.email_user ";
            $req .= "FROM message m, utilisateur u ";
            $req .= "WHERE u.id_user=m.id_receiver AND u.email_user='".$_SESSION['email_user']."' ";
            $req .="ORDER BY m.date_message DESC"; //echo $req;
            $sql = $this->db->query($req);
            $data = $sql->result();
            //$sender = $sql->result();
            //$sql = $this->db->get('article');//___Chargement de la table

            $this->pagination_bootstrap->offset(5);   

            
            if (empty($data)) {
                $this->load->view('layout/header.php');
                $this->load->view('list_message'); //___vue de la page des publications
                
            }
            else
            {
//__on retourne les donnees utilisateurs et un objet
                $this->db->where('id_user',$data[0]->id_sender);
                $query = $this->db->get('utilisateur');
                $sender = $query->result();

                $data = $this->pagination_bootstrap->config('account/message/',$sql);
                $this->load->view('layout/header.php');  
                $this->load->view('list_message',array('results'=>$data)); //___vue de la page des publications
            } 

        return ;
    }







///////////////////////////////////////////////////////////////////////
///                                                                 ///
///     recupere et retourne les informations d'un utilisateurs     ///
///                                                                 ///
///////////////////////////////////////////////////////////////////////
	/**
	* @param : null
	 * @return:
	 */
    public function personnalInfo(){
//___Si l'utilisateur ne s'est pas connecté, on le redirige a la page de connection 
        verifySession();


//___Verification
        $this->form_validation->set_rules('nom','Nom','required');
        $this->form_validation->set_rules('prenom','Prenom','required');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email');
        $this->form_validation->set_rules('phone','Phone number','required');
        $this->form_validation->set_rules('sexe','Sexe','required');

        $this->form_validation->set_rules('pays','Country','required');
        $this->form_validation->set_rules('ville','Town','required');
        $this->form_validation->set_rules('rue','Street','required'); 

        $this->form_validation->set_rules('pwd','<b>Mot de passe</b>','required');
        $this->form_validation->set_rules('rpwd','de <b>confirmation du mot de passe</b>','required|matches[pwd]');
        if ($_SESSION['privilege'] == 'seller') {
            $this->form_validation->set_rules('shopname','Shop name','required');
            $this->form_validation->set_rules('shopstreet','Shop street','required');
            $this->form_validation->set_rules('shoptown','Shop Town','required');
            $this->form_validation->set_rules('description','Shop Town','required');
        }
//___Chargement de la validation du formulaire
        $this->form_validation->run(); 
//___Chargement du model
        $this->load->model('signupuser');//___Chargement du model

//___Chargement des variables 
        if($this->form_validation->run()==true)
        {
            //___chargement du model d'inscription du vendeur

            //___Recuperation des champs du client
            $nom = $this->input->get_post('nom');
            $prenom = $this->input->get_post('prenom');
            $email = $this->input->get_post('email');
            $phone = $this->input->get_post('phone');
            $sexe = $this->input->get_post('sexe');
            $password = $this->input->get_post('pwd');

            //___Recuperation des champs Addresse
            $pays = $this->input->get_post('pays');
            $ville = $this->input->get_post('ville');
            $rue = $this->input->get_post('rue'); 

            //___Recuperatiin des champs Boutique
            $shopname = $this->input->get_post('shopname');
            $shoptown = $this->input->get_post('shoptown');
            $shopstreet = $this->input->get_post('shopstreet');
            $shopdescription = $this->input->get_post('description');

            //___Echaper les caracteres
            $nom = trim(strip_tags($nom));
            $prenom = trim(strip_tags($prenom));
            $email = trim(strip_tags($email));
            $phone = trim(strip_tags($phone));
            $password = trim(strip_tags($password));
            $ville = trim(strip_tags($ville));
            $rue = trim(strip_tags($rue));
            $shopname = trim(strip_tags($shopname));
            $shoptown = trim(strip_tags($shoptown));
            $shopstreet = trim(strip_tags($shopstreet));
            $shopdescription = trim(strip_tags($shopdescription));

            if ($_SESSION['privilege'] == 'customer'){
                $this->signupuser->updateCustomerInformations($nom, $prenom, $email, $phone, $sexe, $password, $pays, $ville, $rue);
            }
            else
            {
               $deb = $this->signupuser->updateSellerInformations($nom, $prenom, $email, $phone, $sexe, $password, $pays, $ville, $rue, $shopname, $shoptown, $shopstreet, $shopdescription); 

//echo var_dump($deb);
            } 
        }
//___Chargement de la vue

    	$this->load->view('personnalInfo');

        	return ;

    }







///////////////////////////////////////
///                                 ///        
///    suppression de l'article     ///
///                                 ///
///////////////////////////////////////
    public function del($id_message)
    {
//___Si l'utilisateur ne s'est pas connecté, on le redirige a la page de connection 
        verifySession();


        $this->load->model('message');//___Chargement du model 
        $this->message->delete_message($id_message);//___array()
        $_SESSION['msg'] = 'Message supprimé';
        redirect('messagelist');
    }



////////////////////////////////////////////
///                                      ///        
///    retourne la page d'un vendeur     ///
///                                      ///
////////////////////////////////////////////
    public function seller($id_seller)
    {
        $this->load->model('seller');
        $info = $this->seller->getIdUserOfSeller($id_seller); 
        $this->load->view('seller', array(
            'userInfo' => $info['userInfo'][0],
            'shopInfo' => $info['shopInfo'][0],
            'shopArticles' => $info['shopArticles']
            )
        );
    }







}
