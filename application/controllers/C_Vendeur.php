<?php 
require_once 'C_Utilisateur.php';
require_once 'C_Shop.php';
/**
 * 
 */
class Vendeur extends Utilisateur
{
	//___Attributs
	private $_idSeller = '';  
	private $_sellerCreatedAt = "";
        private $_shop;

/**********************************************
*		___Constructeur de la classe Vendeur /
********/      

	//___Constructeur
	function __construct()
	{
		$countArg = func_num_args();//___Compte le nombre d'arguments
		$args = func_get_args();//___Retourne les arguments dans un tableau
		switch ($countArg) {  
			case 11:
				# code...
				$this->Shop11($args[0], $args[1], $args[2], $args[3], $args[4], $args[5], $args[6], $args[7], $args[8], $args[9], $args[10]); 
				parent::__construct($args[0], $args[1], $args[2], $args[3], $args[4], $args[5], $args[6]);
				
                                break; 
			case 8:
				# code...
				$this->Shop8($args[0], $args[1], $args[2], $args[3], $args[4], $args[5], $args[6], $args[6]); 
				parent::__construct($args[0], $args[1], $args[2], $args[3], $args[4], $args[5]);
				break; 
			case 4:
				# code...
				$this->Shop4($args[0], $args[1], $args[2], $args[3]); 
				//parent::__construct($args[0], $args[1], $args[2], $args[3], $args[4], $args[5]);
				break; 
			case 2:
				# code...
				$this->Shop2($args[0], $args[1]); 
				//parent::__construct($args[0], $args[1], $args[2], $args[3], $args[4], $args[5]);
				break; 
			default:
				//Utilisateur();
				break;
		}
		 
	}
		private function Shop8($nom, $prenom, $email, $phone, $password, $sexe, $address,$shop)
		{
			$this->_nomUser = $nom;
			$this->_prenomUser = $prenom;
			$this->_emailUser = $email;
			$this->_phoneUser = $phone;
			$this->_password = $password;
			$this->_sexe = $sexe;
            $this->_addresse = $address;
            $this->_shop = $shop;
			$this->_sellerCreatedAt = date("Y-m-d");
		}
		private function Shop11($nom, $prenom, $email, $phone, $password, $sexe, $addresse, $shopname, $shopcity, $shopstreet, $shopdescription)
		{
			$this->_nomUser = $nom;
			$this->_prenomUser = $prenom;
			$this->_emailUser = $email;
			$this->_phoneUser = $phone;
			$this->_password = $password;
			$this->_sexe = $sexe;
            $this->_shop = new Shop($shopname, $shopcity, $shopstreet, $shopdescription);
            $this->_addresse = $addresse;
			$this->_privilege = "seller";
			$this->_sellerCreatedAt = date("Y-m-d"); 
                        
		}
		//___utilisé par la BD
		private function Shop4($user, $id_seller, $shop, $created_at)
		{
			$this->setIdUser($user->getIdUser());
			$this->_addresse = $user->getAddresse();
			$this->_privilege = $user->getPrivilege();
			$this->_nomUser = $user->getNomUSer();
			$this->_prenomUser = $user->getPrenomUser();
			$this->_emailUser = $user->getEmailUser();
			$this->_phoneUser = $user->getPhoneUser();
			$this->_sexe = $user->getSexe(); 
			$this->_idSeller = $id_seller;
			$this->_shop = $shop;
			$this->_sellerCreatedAt = $created_at;
		}
		private function Shop2($shop, $created_at)
		{  
			$this->_shop = $shop;
			$this->_sellerCreatedAt = $created_at;
		}

/************************************************************************************
*		___Retourne les informations de l'utilisateur a partir d'une classe Vendeur/
*******/
	public function getUserInformationBySeller($seller)
	{  
		$informations_user = array(
			'id_user' =>$this->getIdUser(), 
                        'id_address' => $seller->getIdAddresse(),
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


/**********************************************************
*	___Retourne les informations sur l'adresse du vendeur/
***/
	public function getSellerAddressInformations(){ 
		return $this->_addresse->getAddressUser();
	} 	

        public function getSellerInformationsBySeller($seller){ 
                $informations_seller = array(
			'id_user' => $seller->getIdUser(),  
			'id_seller' => $seller->getIdSeller(),
			'id_address' => $seller->getAddresse()->getIdAddresse(), 
			'nom_user' => $seller->getNomUSer(), 
			'prenom_user' => $seller->getPrenomUser(), 
			'email_user' => $seller->getEmailUser(), 
			'phone_user' => $seller->getPhoneUser(), 
			'password' => $seller->getPassword(), 
			'privilege' => $seller->setPrivilege('seller'), 
			'sexe' => $seller->getSexe(),
			'created_at' => $seller->getSellerCreatedAt(),
                        'shop' => $seller->getShop()
		);
                
                

		return $informations_seller;
	}
/****************************************************************
*		___Retourne les informations sur la boutique du Vendeur/
*******/        
	public function getSellerShop(){
		$shop_informations = array(
			'id' => $this->_shop->getIdShop(), 
			'seller_id' => $this->_shop->getIdSeller(), 
			'shop_name' => $this->_shop->getNameShop(), 
			'shop_city' => $this->_shop->getCityShop(), 
			'shop_street' => $this->_shop->getStreetShop(), 
			'shop_description' => $this->_shop->getDescriptionShop() 
		);
		return $shop_informations;
	}

/*********************************************************
*		___Configuration de l'espace de depot de fichier/
*******/   
public function setUploadEnvironnement($id_seller)
{
	//creation d'un dossier qui porte l'identifiant du vendeur
	if (mkdir(getcwd().'/_seller_datas_/'.$id_seller,0777,true)) 
	{
		//___Creation d'un dossier qui va contenir les annonces
		if (mkdir(getcwd().'/_seller_datas_/'.$id_seller.'/_announce',0777,true)) 
		{
			//___Creation d'un dossier qui va contenir les flyers 
			if (mkdir(getcwd().'/_seller_datas_/'.$id_seller.'/_announce/_flyer',0777,true)) 
			{
				//___Creation d'un dossier qui va contenir les bannieres 
				mkdir(getcwd().'/_seller_datas_/'.$id_seller.'/_announce/_bannner',0777,true); 
				
			}
			
		}
		//Creation d'un dossier qui va contenir les publications
		if (mkdir(getcwd().'/_seller_datas_/'.$id_seller.'/_publication',0777,true)) {
			//___Creation d'un dossier qui va contenir les produits
			if (mkdir(getcwd().'/_seller_datas_/'.$id_seller.'/_publication/_product',0777,true)) {
				//___Creation d'un dossier qui va contenir les services
				mkdir(getcwd().'/_seller_datas_/'.$id_seller.'/_publication/_service',0777,true);
			}
		}

	}
	else{
		//echo "erreur creation folder";
	}

}

	
/***************************************
*				___Getters and Setters/
***************/
        public function getIdSeller() {
            return $this->_idSeller;
        }

        public function getSellerCreatedAt() {
            return $this->_sellerCreatedAt;
        }

        public function setIdSeller($idSeller) {
            $this->_idSeller = $idSeller;
        }

        public function setSellerCreatedAt($sellerCreatedAt) {
            $this->_sellerCreatedAt = $sellerCreatedAt;
        }

        public function getShop() {
            return $this->_shop;
        }

        public function setShop($shop) {
            $this->_shop = $shop;
        }


        
        

}








 ?>
