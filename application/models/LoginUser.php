<?php

/**
 * Description of Connection
 *
 * @author JKLMpro
 */
class LoginUser extends CI_model
{
    public function getUserInformationById($id_user){
        
    }
	/***
	* @getConnection : verification d'authentification
	 * @param : login, motDePasse
	 * @return :
	 */
    public function getConnection($login,$pwd)
	{
    	$req = $this->db->get_where('utilisateur','email_user = "'.$login.'"');
    	$stmt = $req->result();
    	$rslt = sizeof($stmt);
    	if ($rslt == 1) 
    	{
            $pwd_verify = password_verify($pwd, $stmt[0]->password);
            if ($pwd_verify){
                //Stockage dans les variables
                $id_user = $stmt[0]->id_user;
                $id_address = $stmt[0]->id_address;
                $nom_user = $stmt[0]->nom_user;
                $prenom_user = $stmt[0]->prenom_user;
                $email_user = $stmt[0]->email_user;
                $phone_user = $stmt[0]->phone_user;
                $privilege = $stmt[0]->privilege;
                $sexe = $stmt[0]->sexe;

                //Selection de toutes les donnees de l'utilisateur
                $req = $this->db->get_where('addresse', 'id_address = "'.$id_address.'"');
                $stmt = $req->result();
                //Stockage dans les variables
                $id_address = $stmt[0]->id_address;
                $country = $stmt[0]->country;
                $city = $stmt[0]->city;
                $street = $stmt[0]->street;

                //___Instantiation de l'objet Addresse
                $addresse = new Addresse($id_address, $country, $city, $street);

                //___Instantiation de l'objet Utilisateur
                $user = new Utilisateur($nom_user, $prenom_user, $email_user, $phone_user, $sexe, $addresse, $id_user, $privilege);

                //___Si l'utilisateur est un vendeur
                if ($privilege == 'seller') {
                    //___On recupere les donnees du vendeur
                    $req = $this->db->get_where('vendeur','id_user = "'.$id_user.'"');
                    $stmt = $req->result();


                    //Stockage dans les variables
                    $id_seller = $stmt[0]->id_seller;
                    $created_at = $stmt[0]->seller_created_at;

                    //___On recupere les donnees de la boutique du vendeur
                    $req = $this->db->get_where('boutique','id_seller = "'.$id_seller.'"');
                    $stmt = $req->result();

                    //Stockage dans les variables
                    $id_shop = $stmt[0]->id_shop;
                    $name_shop = $stmt[0]->name_shop;
                    $street_shop = $stmt[0]->street_shop;
                    $city_shop = $stmt[0]->city_shop;
                    $description_shop = $stmt[0]->description_shop;

                    //___Instantiation de l'objet Boutique
                    $shop = new Shop($id_shop, $id_seller, $name_shop,$city_shop, $street_shop, $description_shop);
//debug($shop);

                    //___Instantiation de l'objet Vendeur
                    $seller = new Vendeur($user,$id_seller, $shop, $created_at);

                    //___On retourne un tableau contenant les objet cree precedement
                    /*$data = array(
                        'vendeur' => $seller
                    );*/
                    return $seller;

                }
                else
                {
                    //___On recupere les donnees du client
                    $req = $this->db->get_where('client','id_user = "'.$id_user.'"');
                    $stmt = $req->result();

                    //Stockage dans les variables
                    $id_client = $stmt[0]->id_seller;
                    $created_at = $stmt[0]->seller_created_at;
                    //___Instantiation de l'objet Vendeur
                    $client = new Client($user, $id_client, $created_at);


                    return $client;
                }
            }
            else
            {

                if($_SESSION['site_lang'] == "french"){
                    $_SESSION['msg'] = 'Email ou mot de passe incorrect !';
                }
                else{
                    $_SESSION['msg'] = 'Email or password is wrong !';
                }
                $_SESSION['login'] = $login;
                redirect(site_url('login'));
            }
    	}
        elseif($rslt == 0)
        {
            if($_SESSION['site_lang'] == "french"){
                $_SESSION['msg'] = 'Ces information ne sont pas reconnu par le systeme...veuillez réessayer SVP !';
            }
            else{
                $_SESSION['msg'] = 'these informations are not recongnized by the system...please, try again !';
            }
            $_SESSION['login'] = $login;
            redirect(site_url('login'));
        }

    }

    /***
    * @adminLogin :authentification administrateur
	 * @param $login : email utilisateur
	 * @param $pwd : mot de passe utilisateur
	 * @return $data : tableau qui contient l'objet utilisateur et adresse en cas de success
	 * @return false : en cas d'echec
	 */
    public function adminLogin($login, $pwd)
	{
    	//______Selection des donnees de l'utilisateur dans la base de donnee 
		$req = $this->db->get_where('utilisateur','email_user="'.$login.'"');
		$stmt = $req->result(); 
    	$rslt = sizeof($stmt); 
		//_____Si les donnees d'entree correspondent et le privilege est 'admin"
		if ($rslt == 1){
			//si le mot de passe est correct
			$privilege = $stmt[0]->privilege;
			$pwd_verify = password_verify($pwd, $stmt[0]->password);
			if ($pwd_verify && $privilege=="administrator") {
				//_Stockage dans les variables
				$id_user = $stmt[0]->id_user;
				$id_address = $stmt[0]->id_address;
				$nom_user = $stmt[0]->nom_user;
				$prenom_user = $stmt[0]->prenom_user;
				$email_user = $stmt[0]->email_user;
				$phone_user = $stmt[0]->phone_user;
				$sexe = $stmt[0]->sexe;

				//Selection de toutes les donnees de l'utilisateur
                $req = $this->db->get_where('addresse', 'id_address = "'.$id_address.'"');
                $stmt = $req->result();
                //Stockage dans les variables
                $id_address = $stmt[0]->id_address;
                $country = $stmt[0]->country;
                $city = $stmt[0]->city;
                $street = $stmt[0]->street;
                //___Instantiation de l'objet Addresse
				$addresse = new Addresse($id_address, $country, $city, $street);

				//___Instantiation de l'objet Utilisateur
				$user = new Utilisateur($nom_user, $prenom_user, $email_user, $phone_user, $sexe, $addresse, $id_user, $privilege);

				//_Creation d'un tableau, stockage des objet adresse, utilisateur
				//_Retour du tableau
				$data = array(
					'user' => $user,
					'address' => $addresse
				);
				return $data;
			}
		} 
		else{
			return false;
		}
	}

	/***
	* @adminPannelData : retourne les statistiques sur le nombre d'utilisateur
	 * @param null
	 * @return  $data : tableau de donnees statistiques
	 */
	public function adminPannelData(){
		//__retourne le nombre total d'utilisateurs inscrit sur la plateforme
		$totalUsers = "SELECT COUNT(*) FROM utilisateur";
		//__retourne le nombre total de clients inscrit sur la plateforme
		$totalCustomers = "SELECT COUNT(*) FROM utilisateur WHERE privilege ='customer' ";
		//__retourne le nombre total de vendeur inscrit sur la plateforme
		$totalSellers = "SELECT COUNT(*) FROM utilisateur WHERE privilege = 'seller'";
		//__retourne le nombre total de categories des articles
		$totalCategories = "SELECT COUNT(*) FROM category";
		//__retourne le nombre total d'article posté dans la plateforme
		$totalArticles = "SELECT COUNT(*) FROM article";
		//__retourne le nombre total de moderateurs qui s'occupent de la gestion de la plateforme
		$totalModerators = "SELECT COUNT(*) FROM utilisateur WHERE privilege='moderator'";

		//__Execution des requetes
		$totalUsers = $this->db->query($totalUsers);
		$totalCustomers = $this->db->query($totalCustomers);
		$totalSellers = $this->db->query($totalSellers);
		$totalCategories = $this->db->query($totalCategories);
		$totalArticles = $this->db->query($totalArticles);
		$totalModerators = $this->db->query($totalModerators);

		//__recuperation des donnees
		$totalUsers = $totalUsers->row_array();
		$totalUsers = $totalUsers['COUNT(*)'];

		$totalCustomers = $totalCustomers->row_array();
		$totalCustomers = $totalCustomers['COUNT(*)'];

		$totalSellers = $totalSellers->row_array();
		$totalSellers = $totalSellers['COUNT(*)'];

		$totalCategories = $totalCategories->row_array();
		$totalCategories = $totalCategories['COUNT(*)'];

		$totalArticles = $totalArticles->row_array();
		$totalArticles = $totalArticles['COUNT(*)'];

		$totalModerators = $totalModerators->row_array();
		$totalModerators = $totalModerators['COUNT(*)'];

		//__retour de differentes donnees via un tableau
		$data = array(
			'totalUsers' => $totalUsers,
			'totalCustomers' => $totalCustomers,
			'totalSellers' => $totalSellers,
			'totalCategories' => $totalCategories,
			'totalArticles' => $totalArticles,
			'totalModerators' => $totalModerators
		);

		return $data;
	}

}
