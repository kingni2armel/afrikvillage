<?php


class Database
{
	private $_host = 'localhost';
	private $_username = 'root';
	private $_password = '';
	private $_dbname = 'afric_village';

	public function db(){
		$conn = new PDO("mysql:host=$this->_host;dbname=$this->_dbname", $this->_username, $this->_password);

		return $conn;
	}


}
