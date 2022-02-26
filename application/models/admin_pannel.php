<?php 
class Admin_pannel extends CI_model
{
	
	function __construct()
	{
		parent::__construct();
	}
 
	public function total_inscrits(){
		$query = $this->db->select('id_user');
		$query = $this->db->select('nom_user');
		$query = $this->db->select('prenom_user');
		$query = $this->db->select('email_user');
		$query = $this->db->get('utilisateur');
		$data = $query->result();
		$num = $query->num_rows(); 
		return array('count' => $num, 'data' => $data);
	}

	public function total_clients(){
		$query = $this->db->select('id_user');
		$query = $this->db->select('nom_user');
		$query = $this->db->select('prenom_user');
		$query = $this->db->select('email_user');
		$query = $this->db->where('privilege','customer');
		$query = $this->db->get('utilisateur');

		$data = $query->result();
		$count = $query->num_rows();
 
		return array('count' => $count, 'data' => $data);
	}

	public function total_vendeurs(){
		$query = $this->db->select('id_user');
		$query = $this->db->select('nom_user');
		$query = $this->db->select('prenom_user');
		$query = $this->db->select('email_user');
		$query = $this->db->where('privilege','seller');
		$query = $this->db->get('utilisateur');

		$data = $query->result();
		$count = $query->num_rows();
 
		return array('count' => $count, 'data' => $data);
	}

	public function total_categories(){ 
		$query = $this->db->get('category');

		$data = $query->result();
		$count = $query->num_rows();
 
		return array('count' => $count, 'data' => $data);
	}


	public function total_articles(){
		$query = $this->db->select('type_a');
		$query = $this->db->select('name_article');
		//$query = $this->db->select('description_article');
		//$query = $this->db->select('price');
		$query = $this->db->select('date_publication'); 
		$query = $this->db->get('article');

		$data = $query->result();
		$count = $query->num_rows();
 
		return array('count' => $count, 'data' => $data);
	}
	/*---------------------------------------------------*/
	public function info_user($id_user){
		//on recupere le privilege de l'utilisateur a partir de son identifiant
		$query = $this->db->select('privilege');
		$query = $this->db->where('id_user',$id_user);
		$query = $this->db->get('utilisateur');
		$rslt = $query->result();
		//___Si l'utilisateur est un client
		if ($rslt[0]->privilege == 'customer') {
			//___on recupere les information de l'utilisateur
			$query = $this->db->where('id_user', $id_user);
			$query = $this->db->get('utilisateur');
			$userData = $query->result();

			//___On recupere les informations sur l'adresse du vendeur
			$query = $this->db->where('id_address', $userData[0]->id_address);
			$query = $this->db->get('addresse');
			$userAddress = $query->result();

			$userData = array('userData' => $userData, 'userAddress' => $userAddress);

			return array('userData' => $userData);
		}
		if ($rslt[0]->privilege == 'moderator' || $rslt[0]->privilege == 'administrator') {
			//___on recupere les information de l'utilisateur
			$query = $this->db->where('id_user', $id_user);
			$query = $this->db->get('utilisateur');
			$userData = $query->result();

			//___On recupere les informations sur l'adresse du vendeur
			$query = $this->db->where('id_address', $userData[0]->id_address);
			$query = $this->db->get('addresse');
			$userAddress = $query->result();

			$userData = array('userData' => $userData, 'userAddress' => $userAddress);

			return array('userData' => $userData);
		}
		elseif ($rslt[0]->privilege == 'seller') {
			//___on recupere les information de l'utilisateur
			$query = $this->db->where('id_user', $id_user);
			$query = $this->db->get('utilisateur');
			$userData = $query->result();

			//___On recupere les informations sur l'adresse du vendeur
			$query = $this->db->where('id_address', $userData[0]->id_address);
			$query = $this->db->get('addresse');
			$userAddress = $query->result();

			$userData = array('userData' => $userData, 'userAddress' => $userAddress);

			//___on recupere les information du vendeur
			$query = $this->db->where('id_user', $id_user);
			$query = $this->db->get('vendeur');
			$sellerData = $query->result();

			//___on recupere les informations sur la boutique du vendeur
			$query = $this->db->where('id_seller',$sellerData[0]->id_seller);
			$query = $this->db->get('boutique');
			$sellerShop = $query->result();
			$sellerData = array('sellerData' => $sellerData, 'sellerShop' => $sellerShop);

			//__on retourne les informations du vendeur dans un tableau
			return array('userData' => $userData, 'sellerData' => $sellerData);
		} 
	}
/* --------------------CRUD CATEGORIE---------------------- */
	public function get_category($id_category){
		$query = $this->db->where('id_category', $id_category);
		$query = $this->db->get('category');
		$cat = $query->result();
		
		return $cat;
	}

	public function update_category($idcat, $catfr, $caten, $caticon){
		$data = array(
			'name_category' => $catfr,
			'name_category_en' => $caten,
			'icon' =>$caticon
		);
		$query = $this->db->where('id_category', $idcat);
		$query = $this->db->update('category', $data);

		if ($query) {
			return true;
		}
		else{
			return false;
		}
	}

	public function add_category($catfr, $caten, $caticon){
		$data = array(
			'id_category' => '',
			'name_category' => $catfr,
			'name_category_en' => $caten,
			'icon' =>$caticon
		); 
		$query = $this->db->insert('category', $data);

		if ($query) {
			return true;
		}
		else{
			return false;
		}
	}

	public function del_category($id_category){
		$query = $this->db->where('id_category', $id_category);
		$query = $this->db->delete('category');

		return true;
	}

	/*--------------------CRUD UTILISATEUR--------------------*/
    public function update_user($id_user,$id_address, $nom_user, $prenom_user, $email_user, $phone_user, $pays_user, $ville_user, $rue_user){
        //___mise a jour des donnees de l'utilisateur
        $data_user = array(
            'nom_user' => $nom_user,
            'prenom_user' => $prenom_user,
            'email_user' => $email_user,
            'phone_user' =>$phone_user
        );
        $query = $this->db->where('id_user', $id_user);
        $query = $this->db->update('utilisateur', $data_user);

        //___mise a jour des donnees de l'adresse de l'utilisateur
        $data_user_address = array(
            'country' => $pays_user,
            'city' => $ville_user,
            'street' => $rue_user
        );
        $query = $this->db->where('id_address', $id_address);
        $query = $this->db->update('addresse', $data_user_address);

        if ($query) {
            return true;
        }
        else{
            return false;
        }
    }

    public function update_shop($id_shop, $nom_shop, $ville_shop, $rue_shop, $description_shop){
        $data_shop = array(
            'name_shop' => $nom_shop,
            'street_shop' => $rue_shop,
            'city_shop' => $ville_shop,
            'description_shop' => $description_shop
        );
        $query = $this->db->where('id_shop', $id_shop);
        $query = $this->db->update('boutique', $data_shop);
    }









}

?>