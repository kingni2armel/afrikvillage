<?php 
/**
 * @attribute $_idAddresse : designe identifiant de l'adresse d'un utilisateur
 * @attribute $_country : designe le pays d'un utilisateur
 * @attribute $_city : designe la ville d'un utilisateur
 * @attribute $_street : designe la rue d'un utilisateur
 * @property getAddress : retourne les informations sur l'adresse sous forme de tableau
 * @property __construct : constructeur de la classe
 * @property addresse3 : constructeur 1
 * @property addresse4 : constructeur 2
 * @property getIdAddresse : retourne l'identifiant de l'adresse
 */
class Addresse
{
	//___Attributs
	private  $_idAddresse = '';
	private  $_country;
	private  $_city;
	private  $_street; 

	//___Constructeur
	function __construct()
	{
		$count_args = func_num_args();
		$arg = func_get_args();
		switch ($count_args) {
			case '3': 
				$this->addresse3($arg[0],$arg[1],$arg[2]);
				break;
			case '4':
				$this->addresse4($arg[0],$arg[1],$arg[2],$arg[3]);
				break;
			default:
				//...code
				break;
		}
	}
	//___fonction qui prepare le constructeur
	public function addresse3($country, $city, $street)
	{
		$this->_country = $country;
		$this->_city = $city;
		$this->_street = $street;  
	}
	public function addresse4($id_address, $country, $city, $street)
	{
		$this->_idAddresse = $id_address;
		$this->_country = $country;
		$this->_city = $city;
		$this->_street = $street; 
	}


	public function getAddress()
	{
		$address = array(
			'id_address' => $this->_idAddresse, 
			'country' => $this->_country, 
			'city' => $this->_city, 
			'street' => $this->_street,   
		);

		return $address;
	}




	public function getIdAddresse() {
            return $this->_idAddresse;
        }

        public function getCountry() {
            return $this->_country;
        }

        public function getCity() {
            return $this->_city;
        }

        public function getStreet() {
            return $this->_street;
        } 
        public function setIdAddresse($idAddresse) {
            $this->_idAddresse = $idAddresse;
        }

        public function setCountry($country) {
            $this->_country = $country;
        }

        public function setCity($city) {
            $this->_city = $city;
        }

        public function setStreet($street) {
            $this->_street = $street;
        }







	
}






 ?>
