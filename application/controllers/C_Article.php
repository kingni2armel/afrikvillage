<?php 
require_once 'C_Shop.php';
/**
 * 
 */
class Article
{
	//___Attributs
	private $_id_article;
	private $_type;
	private $_name;
	private $_description_article;
	private $_boutique; //___$_boutique est un objet

	//___Constructeur
	function __construct()
	{  
		$num_args = func_num_args();
		$arg = func_get_args();
		switch ($num_args) {
			case '4':
				Constructeur4($arg[0], $arg[1], $arg[2], $arg[3]);
				break;
			
			default:
				# code...
				break;
		}
	}

	public function Constructeur4($id_article, $type, $name, $description){
        $this->_id_article = $id_article;
        $this->_type = $type;
        $this->_name = $name;
        $this->_description_article = $description;
	}

	//___Retourne le nombre de vue d'un article
	public function viewsCount(){

	}

	//___Configure le type d'article (produit ou service)
	public function setType(){
		
	}

}







 ?>
