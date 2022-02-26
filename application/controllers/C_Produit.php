<?php 
require_once 'C_Article.php';
require_once 'C_Image.php';
/**
 * 
 */
class Produit
{
	//___Attributs
	private  $_article; //___is article object
	private  $_price;
	private  $_image;//___is file object

	//___Constructeur
	function __construct()
	{
		$num_args = func_num_args();
		$arg = func_get_args();
		switch ($num_args) {
			case '3':
				Constructeur3($arg[0], $arg[1], $arg[2]);
				break;
			
			default:
				# code...
				break;
		}
	}

	//___Constructeurs
	public function Constructeur3($article, $image, $price)
	{
		$this->_article = $article;
		$this->_image = $image;
		$this->_price = $price;
	}

	//___Configure le fichier (image) attaché au service
	public function setFile(){
		
	}
}







 ?>
