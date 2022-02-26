<?php 
require_once 'C_Utilisateur.php';
/**
 * 
 */
class Client extends Utilisateur
{
	//___Attributs
	private  $_idCustomer;
	private  $_customerCreatedAt;
    private $_idUser;

	/*
	private int $_id_user;
	protected string $_nom_user;
	protected string $_prenom_user;
	protected string $_email_user;
	protected sting $_phone_user;
	protected string $_password;
	protected string $_privilege;
	protected Addresse $_addresse;
	*/
	function __construct()
	{
		$countArgs = func_num_args();
                $args = func_get_args();
                switch ($countArgs) {
                    case 7:
                        $this->client7($args[0], $args[1], $args[2], $args[3], $args[4], $args[5],$args[6]);
                        parent::__construct($args[0], $args[1], $args[2], $args[3], $args[4], $args[5]);
                        break;
                    case 3:
                        $this->client3($args[0], $args[1], $args[2]); 
                        break;

                    default:
                        break;
                }
	}
        
        public function client7($nom, $prenom, $email, $phone, $password, $sexe, $addresse){
            $this->_nomUser = $nom;
            $this->_prenomUser = $prenom;
            $this->_emailUser = $email;
            $this->_password = $password;
            $this->_phoneUser = $phone;
            $this->_sexe = $sexe;
            $this->_addresse = $addresse;
        }
        //___utilisé par la BD
        private function client3($user, $id_client, $created_at)
        {
            $this->setIdUser($user->getIdUser());
            $this->_addresse = $user->getAddresse();
            $this->_privilege = $user->getPrivilege();
            $this->_nomUser = $user->getNomUSer();
            $this->_prenomUser = $user->getPrenomUser();
            $this->_emailUser = $user->getEmailUser();
            $this->_phoneUser = $user->getPhoneUser();
            $this->_sexe = $user->getSexe(); 
            $this->_idCustomer = $id_client; 
            $this->_customerCreatedAt = $created_at;
        }
        
	//___Permet au client de s'inscrire
	public function signIn($user, $addresse){
		$this->_nom_user = $user->_nom_user;
		$this->_prenom_user = $user->_prenom_user;
		$this->_email_user = $user->_email_user;
		$this->_phone_user = $user->_phone_user;
		$this->_password = $user->_password;
		$this->_privilege = $user->_privilege;
		$this->_addresse = $addresse;
	}

	//___Permet au client d'ajouter un commentaire
	public function addComment(){

	}

	//___Permet au client de voir les coordonnees d'un vendeur
	public function seeSellerContact(){
		
	}
        
        
        public function getIdCustomer() {
            return $this->_idCustomer;
        }

        public function getCustomerCreatedAt() {
            return $this->_customerCreatedAt;
        }

        public function setIdCustomer($idCustomer) {
            $this->_idCustomer = $idCustomer;
        }

        public function setCustomerCreatedAt($customerCreatedAt) {
            $this->_customerCreatedAt = $customerCreatedAt;
        }
        public function getIdUser() {
            return $this->_idUser;
        }

        public function setIdUser($idUser) {
            $this->_idUser = $idUser;
        }



}

 ?>
