<?php

/**
 * 
 */
class Addarticle extends CI_model
{
	
	function __construct()
	{
		parent::__construct();
	}
 










 	public function add_view($id_article)
 	{
 		$this->db->where('id_article',$id_article);
 		$query = $this->db->get('see');
 		$query = $query->result();
 		$views = intval($query[0]->views);
 		$views +=1;
 		$data = array('views'=>$views);
 		$this->db->where('id_article', $id_article);
 		$this->db->update('see', $data);
 	}










//___Ajoute un article dans la bc
	public function add_article($type_article,$id_category,$id_shop, $article_name, $description,$prix){

		//___Ajout de l'article
		$data = array(
			'id_article' => '',
			'id_category' => $id_category,
			'id_shop' => $id_shop,
			'type_a' => $type_article,
			'name_article' => $article_name,
			'description_article' => $description,
			'price' => $prix,
			'date_publication' => date('Y-m-d H:i:s')
		);  
		$this->db->insert('article', $data);

		//___Selection de l'ID de l'article precedement enregistré
		$query = $this->db->query("SELECT id_article FROM article WHERE id_category='".$id_category."' AND id_shop=".$id_shop." ORDER BY id_article DESC");
		$row = $query->result(); 
		$id_article = $row[0]->id_article;

		//___Initialisation des vues
		$data = array(
			'id_article' => $id_article,
			'views' => 0
		);
		$this->db->insert('see',$data);

		return $id_article;

	}










//___Ajoute le fichier dans la base de donnees
	public function add_file($id_article, $type, $image)
	{ 
		$data = array(
				'id_image' => '',
				'id_article' => $id_article,
				'name_image' => $image->getNameImage(), 
				'ext_image' => $image->getExtImage()
		);
        $this->db->insert('image_of_article',$data);   
	}










//___Supprimer l'article de la base de donnee
	public function delete_article($article){
		$query = $this->db->where('id_article',$article);
		$query = $this->db->get('article');
		$row = $query->result();
		$type = $row[0]->type_a; 
		$this->db->delete('article', array('id_article' => $article));
		return $type;
	}










//___Supprimer l'image de l'article de la base de donnees
	public function delete_file($article){
		$query = $this->db->where('id_article',$article);
		$query = $this->db->get('image_of_article');
		$rslt = $query->result();
		foreach ($rslt as $row) {
			$img = $row->name_image;
			$this->db->delete('image_of_article', array('id_article' => $article, ));	
		} 
		return $rslt;
	}










	public function getArticleInformations(){
		$query = $this->db->get('article');
		$data = $query->result(); 

		return $data;
	}











	public function getSerciceInformations($id)
	{
		$query = $this->db->where('id_article',$id);
		$query = $this->db->get('service');
		$data = $query->result(); 

		return $data;
	}










	public function getProductInformations($id)
	{
		$query = $this->db->where('id_article',$id);
		$query = $this->db->get('produit');
		$data = $query->result(); 

		return $data;
	}
}