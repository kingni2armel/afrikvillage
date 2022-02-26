<?php 
require_once('C_Database.php');
class Utilisateur extends Database
{ 
	private  $_idUser = '';
    private $_idAddresse='';
	protected  $_nomUser;
	protected  $_prenomUser;
	protected  $_emailUser;
	protected  $_phoneUser;
	protected  $_password;
	protected  $_privilege = "";
	protected  $_addresse;//___is addresse object
	protected  $_sexe;

	//___CONSTRUCTOR
	function __construct()
	{  
		$countArg = func_num_args();//___Compte le nombre d'arguments
		$args = func_get_args();//___Retourne les arguments dans un tableau
		switch ($countArg) {
			case 1:
				# code...
				$this->Utilisateur1($id); 
				break;
			case 8:
				# code...
				$this->Utilisateur8($args[0], $args[1], $args[2], $args[3], $args[4], $args[5], $args[6], $args[7]); 
				break;
			case 10:
				# code...
				$this->Utilisateur10($args[0], $args[1], $args[2], $args[3], $args[4], $args[5], $args[6], $args[7], $args[8], $args[9]); 
				break;
			
			default:
				//Utilisateur();
				break;
		}
	}


	///////////////////////////////////////////////////////////////////////////
	/// 																	///
	///		Creation de plusieurs fonctions qui genere un constructeur		///
	/// 	en fonction du ou des paramettres passé 						///
	/// 																	///
	///////////////////////////////////////////////////////////////////////////
	/***
	* @Utilisateur7 : constructeur de la classe
	 * @param : nom, prenom, email, phone, motDePasse, sexe, adresse
	 * @return : true
	 */
	private function Utilisateur7($nom, $prenom, $email, $phone, $pwd, $sexe, $addresse)
	{
		$this->_addresse = $addresse;
		$this->_nomUser = $nom;
		$this->_prenomUser = $prenom;
		$this->_emailUser = $email;
		$this->_phoneUser = $phone;
		$this->_password = $pwd;
		$this->_sexe = $sexe;
		$this->_addresse = $addresse;
		$this->_privilege = "seller";

		return true;
	}

	/***
	 * @Utilisateur8 : constructeur de la classe
	 * @param : nom, prenom, email, phone, motDePasse, sexe, adresse, idUser, privilege
	 * @return : true
	 */
	//___Constructeur a 8 parametres
	private function Utilisateur8($nom, $prenom, $email, $phone, $sexe, $addresse, $id_user, $privilege)
	{
		$this->_idUser = $id_user;
		$this->_nomUser = $nom;
		$this->_prenomUser = $prenom;
		$this->_emailUser = $email;
		$this->_phoneUser = $phone; 
		$this->_sexe = $sexe;
		$this->_addresse = $addresse;
		$this->_privilege = $privilege;

		return true;
	}

	/***
	 * @Utilisateur10 : constructeur de la classe
	 * @param : nom, prenom, email, phone, motDePasse, privilege, sexe, pays, ville, rue
	 * @return : true
	 */
	private function Utilisateur10($nom, $prenom, $email, $phone, $pwd, $privilege, $sexe ,$country, $city, $street)
	{
		$addresse = new Addresse($country, $city, $street);
		$this->_addresse = $addresse;
		$this->_nomUser = $nom;
		$this->_prenomUser = $prenom;
		$this->_emailUser = $email;
		$this->_phoneUser = $phone;
		$this->_password = $pwd;
		$this->_sexe = $sexe;
		$this->_privilege = $privilege;

		return true;
	}

	//___getUserInformation() : retourne les informations d'un utilisateur : Array
	/***
	 * @getUserInformation : Retourne les information d'un utilisateur
	 * @param : seller
	 * @return : informationsUtilisateur(array)
	 */
	public function getUserInformation($seller)
	{
		$informations_user = array(
			'id_user' => $seller->getIdUser(),  
			'nom_user' => $this->_nomUser, 
			'prenom_user' => $this->_prenomUser, 
			'email_user' => $this->_emailUser, 
			'phone_user' => $this->_phoneUser, 
			'password' => $this->_password, 
			'privilege' => $this->_privilege, 
			'sexe' => $this->_sexe 
		);

		return $informations_user;
	}
	/***
	 * @getUserInformations : Recupere et retourne les informations d'un utilisateur
	 * @param : null
	 * @return : informationsUtilisateur (array)
	 */
    public function getUserInformations()
	{
		$informations_user = array(
			'id_user' => $this->_idUser,  
			'nom_user' => $this->_nomUser, 
			'prenom_user' => $this->_prenomUser, 
			'email_user' => $this->_emailUser, 
			'phone_user' => $this->_phoneUser, 
			'password' => $this->_password, 
			'privilege' => $this->_privilege, 
			'sexe' => $this->_sexe 
		);

		return $informations_user;
	}

	/***
	* @getUserInformationsById : Recupere les information de l'utilisateur a partir de son ID
	 * @param : idUtilisateur
	 * @return : informationUtilisateur
	 */
	public function getUserInformationsById($id_user)
	{  
		

		return ;
	}

	//___getAddressUser() : fonction retourne les informations de l'adresse d'un utilisateur : Array
	/***
	* @getAddressUserInformation : recupere et retourne les informations sur l'adresse de l'utilisateur
	 * @param : null
	 * @return : l'adresseUtilisateur
	 */
	public function getAddressUserInformation()
	{
		//$id_address = $this->getIdAddress();
		$id = $this->getAddresse(); 
		$addresse_user = array(
			'id' => $id->getIdAddresse(), 
			'country' => $id->getCountry(), 
			'city' => $id->getCity(), 
			'street' => $id->getStreet()
		);

		return $addresse_user;
	}

	///////////////////////////////////////////
	///										///
	///	l'utilisateur peut lire un message	///
	/// 									///
	///////////////////////////////////////////

	public function message($id_message)
	{
//___requete de selection des message
		$req  = "SELECT m.id_message, m.id_sender, m.content, m.statut, m.date_message, u.nom_user, u.prenom_user, u.email_user ";
		$req .= "FROM message m, utilisateur u ";
		$req .= "WHERE u.id_user=m.id_receiver AND m.id_message=".$id_message;
		$req .=" ORDER BY m.date_message DESC";
//___execution de la requete
		$query = $this->db->query($req);

//___recuperation des donnees qui resulte de la requete
		$data = $query->result();

//___selection des donnees de l'expediteur a partit de son identifiant
		$req2 = "SELECT u.nom_user, u.prenom_user, u.email_user FROM utilisateur u WHERE id_user = ".$data[0]->id_sender;
		$sql2 = $this->db->query($req2);
		$sender= $sql2->result();


//___si le statut du message est egale a 0
		if ($data[0]->statut == 0) {
//___Modification du statut du message
			$statut = array('statut' => 1);
			$this->db->where('id_message', $id_message);
			$this->db->update('message', $statut);
		}
//___on retourne le contenu du message et l'information sur l'expediteur
		$data = array('results' => $data, 'sender'=>$sender);

		return $data;

	}
	///////////////////////////////////////////////////////////////////////////////
	/// 																		///
	///		L'utilisateur peut consulter la liste des messages qu'il a recu		///
	/// 																		///
	///////////////////////////////////////////////////////////////////////////////
	public function list_messages()
	{
			//___requete
			$req  = "SELECT  m.id_message, m.id_sender, m.content, m.statut, m.date_message, u.nom_user, u.prenom_user, u.email_user ";
			$req .= "FROM message m, utilisateur u ";
			$req .= "WHERE u.id_user=m.id_receiver AND u.email_user='".$_SESSION['S_email_user']."' ";
			$req .="ORDER BY m.date_message DESC"; //echo $req;

			//___execution dela requete
			$query = $this->db()->query($req);
			//___resultat de la requete
			$rslt = $query->fetch();
			//___donnees de retour

			/*$this->db->select('*');
			$this->db->from('message');
			$this->db->join('utilisateur','message.id_user=utilisateur.id_user');
			$this->db->order_by('message.dta','DESC');
			$query = $this->db->get();
			$query = $query->result();*/
			$data = array(
				'data'=>$rslt,
				'query'=>$query);

			return $data;
	}


		public function getIdUser() {
            return $this->_idUser;
        }
        public function getIdAddress() {
            return $this->_idAddresse->getIdAddress();
        }

        public function setIdAddress($arg) {
            $this->_idAddresse=$arg;
        }
        public function getNomUser() {
            return $this->_nomUser;
        }

        public function getPrenomUser() {
            return $this->_prenomUser;
        }

        public function getEmailUser() {
            return $this->_emailUser;
        }

        public function getPhoneUser() {
            return $this->_phoneUser;
        }

        public function getPassword() {
            return $this->_password;
        }

        public function getPrivilege() {
            return $this->_privilege;
        }

        public function getAddresse() {
            return $this->_addresse;
        }

        public function getSexe() {
            return $this->_sexe;
        }

        public function setIdUser($idUser) {
            $this->_idUser = $idUser;
        }

        public function setNomUser($nomUser) {
            $this->_nomUser = $nomUser;
        }

        public function setPrenomUser($prenomUser) {
            $this->_prenomUser = $prenomUser;
        }

        public function setEmailUser($emailUser) {
            $this->_emailUser = $emailUser;
        }

        public function setPhoneUser($phoneUser) {
            $this->_phoneUser = $phoneUser;
        }

        public function setPassword($password) {
            $this->_password = $password;
        }

        public function setPrivilege($privilege) {
            $this->_privilege = $privilege;
        }

        public function setAddresse($addresse) {
            $this->_addresse = $addresse;
        }

        public function setSexe($sexe) {
            $this->_sexe = $sexe;
        }




}










?>
