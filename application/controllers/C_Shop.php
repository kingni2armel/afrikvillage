<?php 
//require_once 'Addresse.php'; 
require_once 'C_Vendeur.php';
/**
 * 
 */
class Shop
{
	private  $_idShop ='';
	private $_idSeller ='';
	private $_nameShop;
	private $_cityShop; 
	private $_streetShop;
	private  $_descriptionShop;
	//private  $_vendeur; //___is vendeur object

	//___Constructeur
	function __construct()
	{
		$countArgs = func_num_args();
		$arg = func_get_args();
		switch ($countArgs) { 
			case '4':
				$this->Shop4($arg[0], $arg[1], $arg[2], $arg[3]);
				break;
			case '5':
				$this->Shop5($arg[0], $arg[1], $arg[2], $arg[3], $arg[4]);
				break;
			case '6':
				$this->Shop6($arg[0], $arg[1], $arg[2], $arg[3], $arg[4], $arg[5]);
				break;
			default:
				# code...
				break;
		}
	} 

	private function Shop4($name, $city, $street, $description)
	{ 
		$this->_nameShop = $name;
		$this->_cityShop = $city;
		$this->_streetShop = $street;
		$this->_descriptionShop = $description;
	}

	private function Shop5($id_seller,$name, $city, $street, $description)
	{
		$this->_idSeller = $id_seller;
		$this->_nameShop = $name;
		$this->_cityShop = $city;
		$this->_streetShop = $street;
		$this->_descriptionShop = $description;
	}

	private function Shop6($id_shop,$id_seller,$name, $city, $street, $description)
	{
		$this->_idShop = $id_shop;
		$this->_idSeller = $id_seller;
		$this->_nameShop = $name;
		$this->_streetShop = $street;
		$this->_cityShop = $city;
		$this->_descriptionShop = $description;
	}

	public function getShopInformations()
	{
		$shop_information = array(
			'id_shop' => $this->_idShop,
			'id_seller' => $this->_idSeller,
			'name_shop' => $this->_nameShop,   
			'city_shop' => $this->_cityShop, 
			'street_shop' => $this->_streetShop, 
			'description_shop' => $this->_descriptionShop
		);

		return $shop_information;
	}
	//___Retourne le nombre d'article en boutique
	public function articlesCount(){
		
	}

	public function getIdShop() {
            return $this->_idShop;
        }

        public function getIdSeller() {
            return $this->_idSeller;
        }

        public function getNameShop() {
            return $this->_nameShop;
        }

        public function getCityShop() {
            return $this->_cityShop;
        }

        public function getStreetShop() {
            return $this->_streetShop;
        }

        public function getDescriptionShop() {
            return $this->_descriptionShop;
        }

        public function setIdShop($idShop) {
            $this->_idShop = $idShop;
        }

        public function setIdSeller($idSeller) {
            $this->_idSeller = $idSeller;
        }

        public function setNameShop($nameShop) {
            $this->_nameShop = $nameShop;
        }

        public function setCityShop($cityShop) {
            $this->_cityShop = $cityShop;
        }

        public function setStreetShop($streetShop) {
            $this->_streetShop = $streetShop;
        }

        public function setDescriptionShop($descriptionShop) {
            $this->_descriptionShop = $descriptionShop;
        }


}








 ?>
