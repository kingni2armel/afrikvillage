<?php
class SignupUser extends CI_model 
{
    function __construct()
    {
            parent::__construct();
    }
    
//___Ajoute un vendeur dans la base de donnees :
    public function saveAddress($addresse)
    {
            $data = $addresse->getAddress();
            $this->db->insert('addresse',$data); 

            //___Recuperation de l'id utilisateur du vendeur 
            $query = $this->db->query("SELECT id_address FROM addresse WHERE country='".$addresse->getCountry()."' AND city='".$addresse->getCity()."' And street='".$addresse->getStreet()."'");
            $row = $query->row();  
            //$addresse->setIdAddresse($id);
            return $row->id_address;     
    }
    







//___upload le statut du client a celui de vendeur
    public function toSeller($seller){
        $seller_data = array(
            'id_seller' => $seller->getIdSeller(),
            'id_user' => $_SESSION['id_user'],
            'seller_created_at' => $seller->getSellerCreatedAt()
        );
        //Insertion du vendeur: Query()
            $this->db->insert('vendeur',$seller_data);  
            //___Recuperation de la donnee "id_user" : String
            $req = "SELECT id_seller FROM vendeur WHERE id_user='".$_SESSION['id_user']."'";
            $stmt = $this->db->query($req); 
            $rslt = $stmt->row();  
            $id_seller = $rslt->id_seller; 

        //___Recuperation de son ID(seller)

        $shop = $seller->getShop();

        $shop_data = array(
            'id_shop' => '',
            'id_seller' => $id_seller,
            'name_shop' => $shop->getNameShop(),
            'city_shop' => $shop->getCityShop(),
            'street_shop' => $shop->getStreetShop(),
            'description_shop' => $shop->getDescriptionShop()
        );

        //Insertion du vendeur: Query()
            $this->db->insert('boutique',$shop_data);

        //___Mise a jour du privilege utilisateur(customer vers seller) 
        $this->db->where('id_user',$_SESSION['id_user']);
        $this->db->update('utilisateur', array('privilege' => 'seller'));

        //___suppression du client vers la table utilisateur
        $this->db->where('id_user',$_SESSION['id_user']);
        $this->db->delete('client');

        //___Recuperation de la donnee "id_shop" : String
            $req = "SELECT id_shop FROM boutique WHERE id_seller=".$id_seller;
            $stmt = $this->db->query($req); 
            $rslt = $stmt->row();  
            $id_shop = $rslt->id_shop; 



        return array('id_shop'=>$id_shop,'id_seller'=>$id_seller);
    }











//___Sauvegarde les informations de l'utilisateur dans la base de donnees
    public function saveSeller($seller)
    {
        $vendeur = $seller;
        //Collecte des donnees : Array()
        $user_info = $seller->getUserInformation($seller);
        $seller = $seller->getSellerInformationsBySeller($seller);//___donnees du vendeur chargé
        $data = array(
            'id_user' => $user_info['id_user'],
            'id_address' => $seller['id_address'],   
            'nom_user' => $user_info['nom_user'], 
            'prenom_user' => $user_info['prenom_user'], 
            'email_user' => $user_info['email_user'], 
            'phone_user' => $user_info['phone_user'], 
            'password' => $user_info['password'], 
            'privilege' => $user_info['privilege'], 
            'sexe' => $user_info['sexe'] 
        ); 
        
            //Insertion : Query()
            $this->db->insert('utilisateur',$data);  
            //___Recuperation de la donnee "id_user" : String
            $req = "SELECT id_user FROM utilisateur WHERE email_user='".$seller['email_user']."'";
            $stmt = $this->db->query($req); 
            $rslt = $stmt->row();  
            $id_user = $rslt->id_user; 
            $seller_data = array(
                   'id_seller' => '',
                    'id_user' => $id_user,
                    'seller_created_at' => $seller['created_at']
            );   
                //___Ajout dans la table vendeur
                $this->db->insert('vendeur',$seller_data);
                //___Recuperation de l'ID du vendeur
                $req = "SELECT id_seller FROM vendeur as v, utilisateur as u WHERE u.id_user=v.id_user";
                $stmt = $this->db->query($req); 
                $rslt = $stmt->row();  
                $id_seller = $rslt->id_seller;
                //___Creation de l'environnement de fichier uploadé
                $vendeur->setUploadEnvironnement($id_seller);
                //___attribution de l'ID du vendeur a l'objet shop
                $seller['shop']->setIdSeller($id_seller);
                //___Collecte des donnees liée a la boutique du vendeur
                debug($seller['shop']);
                $shop_data = array(
                    'id_shop' => '',
                    'id_seller' => $seller['shop']->getIdSeller(),
                    'name_shop' => $seller['shop']->getNameShop(),
                    'street_shop' => $seller['shop']->getStreetShop(),
                    'city_shop' => $seller['shop']->getCityShop(),
                    'description_shop' => $seller['shop']->getDescriptionShop()
                );
                //___Insertion de la boutique
                $this->db->insert('boutique',$shop_data);  
            return true;  
            
    }
    










    public function saveCustomer($client)
    {
        $data = $client->getUserInformations();
        $data = array(
            'id_user' => $data['id_user'],
            'id_address' => $client->getAddresse()->getIdAddresse(),  
            'nom_user' => $data['nom_user'], 
            'prenom_user' => $data['prenom_user'], 
            'email_user' => $data['email_user'], 
            'phone_user' => $data['phone_user'], 
            'password' => $data['password'], 
            'privilege' => $data['privilege'], 
            'sexe' => $data['sexe']
        );  
        $this->db->insert('utilisateur',$data);
        $req = "SELECT id_user FROM utilisateur WHERE email_user='".$data['email_user']."'";
            $stmt = $this->db->query($req); 
            $rslt = $stmt->row();  
            $id_user = $rslt->id_user;
        $client->setIdUser($id_user);
        $client->setCustomerCreatedAt(date('Y-m-d H:i:s'));
        $data = array(
            'id_customer' => '',
            'id_user' => $client->getIdUser(),
            'customer_created_at' => $client->getCustomerCreatedAt()
        );
        $this->db->insert('client',$data);

        

    }











    public function updateCustomerInformations($nom, $prenom, $email, $phone, $sexe, $password, $pays, $ville, $rue)
    {
        $query = $this->db->where('email_user', $email);
        $query = $this->db->get('utilisateur');
        $row = $query->result();
//___Information de l'utilisateur
        $nom_user = $row[0]->nom_user;
        $prenom_user = $row[0]->prenom_user;
        $email_user = $row[0]->email_user;
        $phone_user = $row[0]->phone_user;
        $password_user = $row[0]->password; 
        $sexe_user = $row[0]->sexe;
        $id_address = $row[0]->id_address;
        $id_user = $row[0]->id_user;
//___informations addresse de l'utilisateur
        $query = $this->db->where('id_address',$id_address);
        $query = $this->db->get('addresse');
        $row = $query->result();
        $country = $row[0]->country;
        $city = $row[0]->city;
        $street = $row[0]->street;
//___si les donnees sur l'utilisateur sont differente de celle enregistré
        if ($nom == $nom_user && $prenom == $prenom_user && $email == $email_user && $phone == $phone_user && $password == $password_user && $sexe == $sexe_user && $pays == $country && $city == $ville && $rue == $street)  
        {  
            if ($_SESSION['site_lang'] == 'french') {
                $_SESSION['msg'] = "Vous n'avez modifié aucun champ !";
            }
            else{
                $_SESSION['msg'] = "You have not changed any fields !";
            }
            redirect('myaccount');  
            return $nom_user;   
        }
        else
        {
            $data = array(
                'nom_user' => $nom,
                'prenom_user' => $prenom,
                'email_user' => $email,
                'phone_user' => $phone,
                'password' => $password,
                'sexe' => $sexe
            );
            $this->db->where('id_user', $id_user);
            $this->db->update('utilisateur', $data); 
//___si les donnees sur l'addresse sont differente de celle enregistré
            $data = array(
                'country' => $pays,
                'city' => $ville,
                'street' => $rue
            );
            $this->db->where('id_address', $id_address);
            $this->db->update('addresse', $data);      
            
//___destruction des sessions  
            session_unset();
//___creation d'un message
            if ($_SESSION['site_lang'] == 'french') {
                $_SESSION['msg'] = 'Vos informations ont ete mis a jour !';
            }
            else{
                $_SESSION['msg'] = 'Your informations has been update !';
            }
//___redirection a vers la page de connection
            redirect('login');
            return $street;
        } 
    }











    public function updateSellerInformations($nom, $prenom, $email, $phone, $sexe, $password, $pays, $ville, $rue, $shopname, $shoptown, $shopstreet, $description)
    {
        $query = $this->db->where('email_user', $email);
        $query = $this->db->get('utilisateur');
        $row = $query->result();
//___Information de l'utilisateur
        $nom_user = $row[0]->nom_user;
        $prenom_user = $row[0]->prenom_user;
        $email_user = $row[0]->email_user;
        $phone_user = $row[0]->phone_user;
        $sexe_user = $row[0]->sexe;
        $password_user = $row[0]->password;
        $privilege_user = $row[0]->privilege;
        $id_address = $row[0]->id_address;
        $id_user = $row[0]->id_user;
//___informations addresse de l'utilisateur
        $query = $this->db->where('id_address',$id_address);
        $query = $this->db->get('addresse');
        $row = $query->result();
        $country = $row[0]->country;
        $city = $row[0]->city;
        $street = $row[0]->street;
//___informations boutique du vendeur
        $query = $this->db->where('id_seller', $_SESSION['id_seller']);
        $query = $this->db->get('boutique');
        $row = $query->result();
        $name_shop = $row[0]->name_shop;
        $street_shop = $row[0]->street_shop;
        $city_shop = $row[0]->city_shop;
        $description_shop = $row[0]->description_shop;
//___Si les information des differents champs sont egaux a ceux de la vas de donnees 
        if ($nom == $nom_user && $prenom == $prenom_user && $email == $email_user && $phone == $phone_user && $password == $password_user && $sexe == $sexe_user && $pays == $country && $city == $ville && $rue == $street && $shopname ==$name_shop && $shopstreet ==$street_shop  && $shoptown == $city_shop && $description == $description_shop) 
        {
            if ($_SESSION['site_lang'] == 'french') {
                $_SESSION['msg'] = 'Vous n\'avez modifié aucun champ !';
            }
            else{
                $_SESSION['msg'] = 'you didn\'t modify any field !';
            }
            redirect('myaccount');  
            return ;   
        }
        else
        {
            $data = array(
                'nom_user' => $nom,
                'prenom_user' => $prenom,
                'email_user' => $email,
                'phone_user' => $phone,
                'password' => $password,
                'sexe' => $sexe
            );
            $this->db->where('id_user', $id_user);
            $this->db->update('utilisateur', $data); 
//___si les donnees sur l'addresse sont differente de celle enregistré
            $data = array(
                'country' => $pays,
                'city' => $ville,
                'street' => $rue
            );
            $this->db->where('id_address', $id_address);
            $this->db->update('addresse', $data);  
//___si les donnees sur l'la boutique sont differente de celle enregistré
            $data = array(
                'name_shop' => $shopname,
                'city_shop' => $shoptown,
                'street_shop' => $shopstreet,
                'description_shop' => $description
            );
            $this->db->where('id_seller', $_SESSION['id_seller']);
            $this->db->update('boutique', $data);   
            
//___destruction des sessions  
            session_unset();
//___creation d'un message
            if ($_SESSION['site_lang'] == 'french') {
                $_SESSION['msg'] = 'Vos informations ont ete mis a jour !';
            }
            else{
                $_SESSION['msg'] = 'Your informations have been updated !';
            }
//___redirection a vers la page de connection
            redirect('login');
            return ;
        }

    }

}
