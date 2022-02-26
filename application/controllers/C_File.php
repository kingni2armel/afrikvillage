<?php 
/**
 * 
 */
class File  
{
	//___Attributs
	private $_id;
	private  $_name;
	private  $_extention; 

	//___Constructeur 
	public function __construct() { 
        
    }

	public function setImageFileByArticleId($id_article)
	{
		 
	}

//___GETTERS 
	public function getId(){
		return $this->_id;
	} 

	public function getNameFile(){
		return $this->_name;
	} 

	public function getExtentionFile(){
		return $this->_extention;
	} 
}









 ?>