<?php 
/**
 * 
 */
class Message extends CI_model
{
	
	function __construct()
	{
		parent::__construct();
	} 










	///////////////////////////////////////////////////////////////////////////////////////
	///																	                ///
	///	Permet d'envoyer des messages aux vendeur, en rapport avec un article publié	///
	///																	                ///
	///////////////////////////////////////////////////////////////////////////////////////
	public function send_message($id_article,$content,$name_shop, $description)
	{
//___recuperation de l'ID utilisateur de l'expediteur(client)
		$sender = $_SESSION['id_user'];
//___recuperation de l'ID du vendeur
		$req = "SELECT id_seller FROM boutique WHERE name_shop='".$name_shop."' AND description_shop='".$description."'";
		$stmt = $this->db->query($req); 
            $rslt = $stmt->row();  
            $id_seller = $rslt->id_seller;
//___recuperation de l'ID utilisateur du vendeur
     $req = "SELECT id_user FROM vendeur WHERE id_seller=".$id_seller;
		$stmt = $this->db->query($req); 
            $rslt = $stmt->row();  
            $id_user = $rslt->id_user;
//___si l'ID utilisateur est celui de l'expediteur
        if ($id_user == $sender) 
        {
        	$_SESSION['msg'] = "<b>Erreur :</b> Ce message ne peut être envoyé car cet article a été publié par vous !";
			redirect('more/'.$id_article);

        }
        else
        {
//___recuperation de l'ID utilisateur du recepteur(vendeur)
        	$receiver = $id_user; 
//___insertion du message dans la table message
			$data = array(
				'id_message' => '',
				'id_sender' => $sender,
				'id_receiver' => $receiver,
				'content' => $content,
				'statut' => 0,
				'date_message' => date('Y-m-d H:i:s')
			);
			$this->db->insert('message',$data);
//___message de confirmation d'envoi
			$_SESSION['msg'] = "Votre message a été envoyé";
			redirect('more/'.$id_article);
        }
	}





	///////////////////////////////////////////////////////////////////////
    ///																    ///
    ///	Permet a un utilisateur de repondre a un message qu'il a recu	///
    ///																    ///
    ///////////////////////////////////////////////////////////////////////
    /**
    * @sender int (id_user)
     * @receiver string (email)
     * @content string
     **/
    public function replyMessage($sender, $receiver, $content)
    {
//___recuperation de l'ID_user du recepteur
        $req = $this->db->get_where('utilisateur','email_user = "'.$receiver.'"');
        $stmt = $req->result(); var_dump($receiver);
        $id_user_receiver = $stmt[0]->id_user;
//___recuperation de l'ID utilisateur du recepteur(vendeur)
            $receiver = $id_user;
//___insertion du message dans la table message
            $data = array(
                'id_message' => '',
                'id_sender' => $sender,
                'id_receiver' => $id_user_receiver,
                'content' => $content,
                'statut' => 0,
                'date_message' => date('Y-m-d H:i:s')
            );
            $this->db->insert('message',$data);
//___message de confirmation d'envoi
            $_SESSION['msg'] = "Votre message a été envoyé";
            return true;
    }
	///////////////////////////////////////////////////////////////
	///												            ///
	///		Permet d'envoyer un message a l'administrateur	    ///
	///												            ///
	///////////////////////////////////////////////////////////////
	public function write_us($content){
//___recuperation de l'ID utilisateur de l'expediteur(client/vendeur)
		$sender = $_SESSION['id_user'];
//___recuperation de l'ID administrateur 
		//$req = 'SELECT id_user FROM utilisateur WHERE privilege="administrator"';
		$req = $this->db->get_where('utilisateur',"privilege='administrator");
		$stmt = $req->result();
		$receiver = $stmt[0]->id_user;
//___insertion du message dans la table message
		$data = array(
			'id_message' => '',
			'id_sender' => $sender,
			'id_receiver' => $receiver,
			'content' => $content,
			'statut' => 0,
			'date_message' => date('Y-m-d H:i:s')
		);
		$this->db->insert('message',$data);
//___message de confirmation d'envoi
		$_SESSION['msg'] = "Votre message a été envoyé";
		redirect('writeus');
	}





	////////////////////////////////////////////////////////////////////
	///													///
	///		Permet a l'utilisateur de supprimer un message recu 	///
	///													///
	//////////////////////////////////////////////////////////////////// 
	public function delete_message($id_message){
		$this->db->where('id_message',$id_message);  
		$this->db->delete('message', array('id_message' => $id_message));

		return ;
	}










}
?>