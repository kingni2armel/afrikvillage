<?php
/**
 * 
 */
class Image
{
	private $_idImage = '';
	private $_nameImage;
	private $_extImage;
	
	function __construct()
	{ 
		$num_args = func_num_args();
		$arg = func_get_args();
		switch ($num_args) {
			case '1':
				$this->constructeur1($arg[0]);
				break;
			case '2':
				$this->constructeur2($arg[0], $arg[1]);
				break;
			
			default:
				# code...
				break;
		}
	}

	//___Constructeurs___
	public function constructeur1($name)
	{
		$this->_nameImage = $name; 
	}
	public function constructeur2($name, $ext)
	{
		$this->_nameImage = $name;
		$this->_extImage = $ext;
	}

	//___Getters and Setters___//
	public function getIdImage()
	{
		return $this->_idImage;
	}
	public function setImage($arg)
	{
		$this->_idImage = $arg;
	}
	public function getNameImage()
	{
		return $this->_nameImage;
	}
	public function setNameImage($arg)
	{
		$this->_nameImage = $arg;
	}
	public function getExtImage()
	{
		return $this->_extImage;
	}
	public function setExtImage($arg)
	{
		$this->_extImage = $arg;
	}
}

?>