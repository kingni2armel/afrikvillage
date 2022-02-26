<?php 

//include_once ("class/Utilisateur.php");
include_once ("C_Vendeur.php");
include_once ("C_Addresse.php");
include_once ("C_Shop.php");
include_once ("C_Image.php");
include_once ("C_Article.php");
include_once ("C_File.php");


function verifySession(){
    if(empty($_SESSION['id_user'])){
        if ($_SESSION['site_lang'] == 'french') {
            $_SESSION['msg'] = "Vous devez vous connecter pour avoir accès a cette page !";
        }
        else{
            $_SESSION['msg'] = "You must be connected for open this page !";
        }
        redirect('login');
    }
    else{
        return false;
    } 
}


class Publication extends CI_Controller 
{



	public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('language');
    }











    ///////////////////////////////////////////////////////
    ///                                                 ///
    ///     Fourni la page des detail sur un article    ///
    ///                                                 ///
    ///////////////////////////////////////////////////////
    /**
     * @param int $id_article
     * @return view 'more'
     * */
    public function more($id_article){
        //$this->load->view('category');

//___controle de validation de formulaire
        $this->form_validation->set_rules('msg', '<b>Message</b>', 'required');
        $this->form_validation->run();

        $this->load->library('Pagination_bootstrap');

        $req  = "SELECT a.id_article, a.type_a, a.name_article, b.name_shop, a.description_article, a.price, a.date_publication, i.name_image, c.name_category,b.name_shop, b.city_shop, b.description_shop, b.id_seller, u.phone_user ";
        $req .= "FROM article a, image_of_article i, category c ,boutique b, utilisateur u, vendeur v ";
        $req .= "WHERE a.id_shop = b.id_shop AND a.id_category = c.id_category AND a.id_article = i.id_article AND v.id_seller=b.id_seller AND v.id_user = u.id_user AND a.id_article = ".$id_article;
        $sql = $this->db->query($req);
        $data = $sql->result();  

        $this->load->view('more', array('results'=>$data, 'id_article'=>$id_article)); //___vue de la page des category

        if ($this->form_validation->run() == true) {
            $msg = $this->input->get_post('msg');

            $this->load->model('message');//___Chargement du model
            $this->message->send_message($id_article,$msg, $data[0]->name_shop,$data[0]->description_shop);
            
        }   
    }







    ///////////////////////////////////////////////////////////////////////////////
    ///                                                                         ///
    ///     Retourne la page qui lit les articles en fonction d'une categorie   ///
    ///                                                                         ///
    ///////////////////////////////////////////////////////////////////////////////
    public function cat($id){
        $_SESSION['id_category'] = $id;
        redirect('categories');
    }



   //////////////////////////////////////////////////////////////////////
    ///                                                               ///
    ///     Retourne la page qui liste les articles d'une categorie   ///
    ///                                                               ///
    /////////////////////////////////////////////////////////////////////
    public function category(){ 

        $this->load->library('Pagination_bootstrap');
        $lang = $_SESSION['site_lang'];
        if ($lang == "french") 
        {
            $req  = "SELECT a.id_article, a.type_a, a.name_article, a.description_article, a.price, a.date_publication, i.name_image, c.name_category, b.id_seller, b.name_shop ";   
        }
        else
        {
            $req  = "SELECT a.id_article, a.type_a, a.name_article, a.description_article, a.price, a.date_publication, i.name_image, c.name_category_en, b.id_seller, b.name_shop ";   
        }
        $req .= "FROM article a, image_of_article i, category c , boutique b ";
        $req .= "WHERE a.id_shop = b.id_shop AND a.id_category = c.id_category AND a.id_article = i.id_article AND a.id_category= ".$_SESSION['id_category'].' ';
        $req .="GROUP BY id_article ";

        $req .="ORDER BY a.date_publication DESC";
        $sql = $this->db->query($req);
        $data = $sql->result(); 

        $this->pagination_bootstrap->offset(5);    
        if (empty($data)) {
                $this->load->view('category'); //___vue de la page des category    
        }
        else
        {
            $data['results'] = $this->pagination_bootstrap->config('publication/category/',$sql);  
            $this->load->view('category',$data); //___vue de la page des category
        }
    }






    ///////////////////////////////////////////////////////////////////////////////////
    ///                                                                             ///
    ///     retourne la page des articles qui ont deja ete posté par un vendeur     ///
    ///                                                                             ///
    ///////////////////////////////////////////////////////////////////////////////////
    public function publications(){
        
        verifySession();

        if (empty($_SESSION['id_shop'])) {
            redirect(site_url('login'));
        }else{
            $this->load->model('addarticle');//___Chargement du model
            
            $this->load->library('Pagination_bootstrap');//___bibliotheque de pagination

            $req  = "SELECT a.id_article, a.type_a, a.name_article, a.description_article, a.price, a.date_publication, i.name_image ";
            $req .= "FROM article a, image_of_article i ";
            $req .= "WHERE a.id_article = i.id_article AND a.id_shop = ".$_SESSION['id_shop'].' ';
            $req .="GROUP BY id_article ";
            $req .="ORDER BY a.date_publication DESC";

            $sql = $this->db->query($req);
            $data = $sql->result();
            //$sql = $this->db->get('article');//___Chargement de la table

            $this->pagination_bootstrap->offset(5);   

            
            if (empty($data)) {
                $this->load->view('publications'); //___vue de la page des publications
                
            }
            else
            {
                $data['results'] = $this->pagination_bootstrap->config('publication/publications/',$sql);  
                $this->load->view('publications',$data); //___vue de la page des publications
            }
        }
        

    }







    ///////////////////////////////////////////////////////////////////////////
    ///                                                                     ///
    ///     Retourne une page qui affiche les resultats d'une recherche     ///
    ///     effectué par un utilisateur                                     ///
    ///                                                                     ///
    ///////////////////////////////////////////////////////////////////////////

//___controlleur de la page de recherche 
//___prend en parametre l'element a rechercher et la localisation
   public function search($element, $localisation){
//___librairie de pagination
        $this->load->library('Pagination_bootstrap');
//___requette de selection des elements a rechercher
        $ci =& get_instance();
        $ci->load->helper('language');
        $lang = $ci->session->userdata('site_lang');
        #$lang = $this->session->get_userdata('language');  
        if ($lang == "french")
        { 
            $req  = "SELECT a.id_article, a.type_a, a.name_article, a.description_article, a.price, a.date_publication, c.name_category, b.id_seller, b.name_shop ";
        }
        else
        {
            $req  = "SELECT a.id_article, a.type_a, a.name_article, a.description_article, a.price, a.date_publication, c.name_category_en, b.id_seller, b.name_shop ";            
        }
        $req .= "FROM article a, category c , boutique b ";
//___si la localisation n'a pas ete entre dans le champs de recherche y correspondant
        if ($localisation == 'null') 
        {
            $req .= "WHERE a.id_category = c.id_category AND b.id_shop = a.id_shop AND a.name_article LIKE '".$element."%' ";
        }
        else
        {
            $req .= "WHERE a.id_shop = b.id_shop AND a.id_category = c.id_category AND a.name_article LIKE '".$element."%' OR a.description_article LIKE '".$element."%' AND b.city_shop LIKE '".$localisation."' ";
        }
        $req .="GROUP BY id_article "; //echo $req;
//___execution de la requette
        $sql = $this->db->query($req);
//___stockage des elements resultant de la requette dans la variable $data
        $data = $sql->result(); 
//___les elements doivent s'afficher par tranche de 5
        $this->pagination_bootstrap->offset(5);   

        if (empty($data)) {
                $this->load->view('search',array('data'=>$data,'element'=>$element)); //___vue de la page des category    
        }
        else
        {
            $data['element'] = $element;
            $data['localisation'] = $localisation;
            $data['results'] = $this->pagination_bootstrap->config('category/',$sql);   
            $this->load->view('search', $data); //___vue de la page des category
        }
    }












    ////////////////////////////////////////////////////////////////////////////
    ///                                                                     ////
    ///     Retourne la page qui permet a un client de devinir un vendeur   ////
    ///                                                                     ////
    //////////////////////////////////////////////////////////////////////////// 
    public function toseller(){
        verifySession();

    	if (isset($_SESSION['site_lang']) && $_SESSION['site_lang'] == 'french') {
            $this->form_validation->set_rules(
            'nom', 
            '<b>Nom de la boutique</b>', 
            'required',
            array(
                'required' => 'Le champs {field} est requis.'
            )
        );
        $this->form_validation->set_rules(
            'ville', 
            '<b>Ville de la boutique</b>', 
            'required',
            array(
                'required'=>'Le champ {field} est requis.'
            )
        );
        $this->form_validation->set_rules(
            'rue', 
            '<b>Rue de la boutique</b>', 
            'required',
            array(
                'required' => 'Le champ {field} est requis. '
            )
        );
        $this->form_validation->set_rules(
            'description', 
            '<b>Description</b>', 
            'required',
            array(
                'required'=>'Le champs {field} est requis. '
            )
        );
        }
        else
        {
            $this->form_validation->set_rules(
            'nom', 
            '<b>Name of shop</b>', 
            'required',
            array(
                'required' => 'The field {field} is required.'
            )
        );
        $this->form_validation->set_rules(
            'ville', 
            '<b>City of shop</b>', 
            'required',
            array(
                'required'=>'The field {field} is required.'
            )
        );
        $this->form_validation->set_rules(
            'rue', 
            '<b>Street of shop</b>', 
            'required',
            array(
                'required' => 'The field {field} is required. '
            )
        );
        $this->form_validation->set_rules(
            'description', 
            '<b>Description</b>', 
            'required',
            array(
                'required'=>'The field {field} is required. '
            )
        );
        }
    	$this->form_validation->run();
    	$this->load->view('toseller');
    	if ($this->form_validation->run() == true) {
    		$name_shop = $this->input->get_post('nom');
    		$city_shop = $this->input->get_post('ville');
    		$street_shop = $this->input->get_post('rue');
    		$description_shop = $this->input->get_post('description');

    		$name_shop = trim(strip_tags($name_shop));
    		$city_shop = trim(strip_tags($city_shop));
    		$description_shop = trim(strip_tags($description_shop));
    		$street_shop = trim(strip_tags($street_shop));


    		$this->load->model('SignupUser');

    		$shop = new shop($name_shop, $city_shop, $street_shop, $description_shop);
    		$seller = new Vendeur($shop, date('Y-m-d H:i:s'));

    		$data = $this->SignupUser->toseller($seller);

            $id_shop = $data['id_shop'];
            $id_seller = $data['id_seller'];

    		if ($id_shop != null) { 
    			//___On envoie un message de via session_flash qui demande au client de se reconnecter
    			//___On ajoute les session relatif au vendeur
                    $this->session->set_userdata('id_seller',$id_seller);
                    $this->session->set_userdata('id_shop',$id_shop);
                    $this->session->set_userdata('name_shop',$name_shop);
                    $this->session->set_userdata('city_shop',$city_shop);
                    $this->session->set_userdata('street_shop',$street_shop);
                    $this->session->set_userdata('description_shop',$description_shop);
                    $_SESSION['privilege'] = 'seller';
                    $_SESSION['id_shop'] = $id_shop;
                    $_SESSION['id_seller'] = $id_seller;


                //___On redirige le client vers la page relatif a ses informations
                    if (isset($_SESSION['site_lang']) and $_SESSION['site_lang'] == 'french') {
                        $this->session->set_userdata('msg','Votre boutique a ete ajouté !');
                    }
                    else{
                        $this->session->set_userdata('msg','Your shop has been added !');
                    }
                    redirect('myaccount');	

    		}
    		else{
    			if (isset($_SESSION['site_lang']) && $_SESSION['site_lang'] == 'french') {
                    echo "Une erreur s'est produite pendant le changement du statut";
                }
                else{
                    echo "Fatal Error";
                }
    		}
    	}
    }









    ///////////////////////////////////////////////////////////////////////////////////
    ///                                                                             ///
    ///     Retourne le formulaire qui permet au vendeur de poster son article      ///
    ///                                                                             ///
    ///////////////////////////////////////////////////////////////////////////////////
    public function addarticle()
    {
        verifySession();
        //___si l'utilisateur se connecte en tant que vendeur
        if($_SESSION['privilege'] == 'seller')
        {
            //___Regles de validation du formulaire
            $this->form_validation->set_rules('type','Type','required');
            $this->form_validation->set_rules('article','Article','required');
            $this->form_validation->set_rules('category','Category','required');
            $this->form_validation->set_rules('prix','Prix','numeric');
            $this->form_validation->set_rules('description','Description','required');
            //$this->form_validation->set_rules('fichier','Fichier','required');
            $this->form_validation->run();

            //___chargement de la vue qui contient le formulaire
            $this->load->view('addarticle');

            //___Si les champs envoye respectent les regles de validation
            if ($this->form_validation->run() == true) 
            {
                //___creation des variables pour stocker les champs
                $type = $this->input->get_post('type');
                $article_name = $this->input->get_post('article');
                $id_category = $this->input->get_post('category');
                $price = $this->input->get_post('prix');
                $description = $this->input->get_post('description');
                $submit = $this->input->post('submit',true);

                //___Echaper les caracteres
                $article_name = trim(strip_tags($article_name));
                $price = trim(strip_tags($price));
                $description = trim(strip_tags($description));

                //___Chargment du model qui va inserer les donnees dans la bd
                $this->load->model('addarticle');//___Chargement du model 

                $id_article = $this->addarticle->add_article($type,$id_category,$_SESSION['id_shop'],$article_name,$description,$price);

//___ajout des fichiers
                if ($submit) 
                {
                    if (!empty($_FILES['files']['name']) && count(array_filter($_FILES['files']['name']))>0) 
                    {
                        $filescount = count($_FILES['files']['name']);
                        if ($filescount>5) {
                            $filescount = 5;
                        }
                        for ($i=0; $i < $filescount; $i++) 
                        { 
                            $_FILES['file']['name'] = $_FILES['files']['name'][$i];
                            $_FILES['file']['type'] = $_FILES['files']['type'][$i];
                            $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
                            $_FILES['file']['error'] = $_FILES['files']['error'][$i];
                            $_FILES['file']['size'] = $_FILES['files']['size'][$i];

                            $config['allowed_types'] = 'jpeg|jpg|png';
                            $config['max_size'] = '2500';//___2.4 Mo maximum par image
                            $config['max_height'] = '1000';//___hauteur maximum
                            $config['max_width'] = '800';//___largeur maximum
                            $config['encrypt_name'] = true;
                            $config['mod_mime'] = true;
                            $config['mod_mime_fix'] = true;

#___CREATION DE L'ENVIRONNEMENT DE STOCKAGE
    //___si le type de publication se refere au produit
                            if ($type == 'product') 
                            {
    //___chargement du lien pour stocker l'image du produit
                                $config['upload_path'] = './_seller_datas_/'.$_SESSION['id_seller'].'/_publication/_product';
                            }
    //___si le type de publication se reffere au serve
                            else
                            {
    //___chargement du lien pour socket l'image du service
                                $config['upload_path'] = './_seller_datas_/'.$_SESSION['id_seller'].'/_publication/_service';
                            } 

    //___si le recourci n'existe pas 
                            if (!file_exists($config['upload_path']) && $type == 'product') 
                            {
                                //__creation du dossier publication
                                mkdir(getcwd().'/_seller_datas_/'.$_SESSION['id_seller'].'/_publication',0777,true);
                                //___creation d'un dossier pour stocker les images des produits
                                mkdir(getcwd().'/_seller_datas_/'.$_SESSION['id_seller'].'/_publication/_product',0777,true);
                            }
                            elseif(!file_exists($config['upload_path']) && $type == 'service')
                            {
                                //__creation du dossier publication
                                mkdir(getcwd().'/_seller_datas_/'.$_SESSION['id_seller'].'/_publication',0777,true);
                                //___creation d'un dossier pour stocker les services
                                mkdir(getcwd().'/_seller_datas_/'.$_SESSION['id_seller'].'/_publication/_service',0777,true);
                            }



                                $this->load->library('upload',$config);
                                $this->upload->initialize($config);

                            if ($this->upload->do_upload('file')) {
                                $fileData = $this->upload->data();
                                $uploadData[$i]['file_name'] = $fileData['file_name'];
                    $data = array('image_metadata' => $this->upload->data());
    //$this->load->view('ajouterarticle', $data);
    //echo var_dump($data);
                    $this->load->model('addarticle');//___Chargement du model

                    $name = $data['image_metadata']['file_name'];
                    $ext = $data['image_metadata']['file_ext'];
                    
                    $image = new Image($name, $ext);

                    $id_shop = $_SESSION['id_shop']; 
                   
    //___ENVOIS DANS LA BASE DE DONNEES
                    $this->addarticle->add_file($id_article, $type,$image);
    //___UPLOAD DES FICHIERS IMAGES

                            } 
                        }
                            $error = '<p>Erreur : '.$this->upload->display_errors().'</p>';
                        if($this->upload->display_errors() && $filescount == 1){
                            $_SESSION['msg'] = "une erreur c'est produite :".$error;
                        }
                        elseif($this->upload->display_errors() && $filescount > 1)
                        {
                            $_SESSION['msg'] = "Une erreur c'est produite lors de l'envoie de certaines de vos images :";
                            $_SESSION['msg'] .= $error;
                        }
                        redirect('publications');
                    }
                }else{echo "string";}


            }
        }
        //___si l'utilisateur se connecte en tand que client
        elseif ($_SESSION['privilege'] == 'customer') {
            //___On le redirige vers la page 404
            redirect('404_override');

        } 
    }










    ///////////////////////////////////////////////////////////
    ///                                                     ///
    ///     Retourne la page qui founit les details         ///
    ///    sur l'article qui a ete posté par le vendeur     ///
    ///                                                     ///
    ///////////////////////////////////////////////////////////
//___Information sur l'article
    public function info($id_article)
    {
        verifySession();
        $this->load->view('info',array('id_article' => $id_article));
    }










    ///////////////////////////////////////////////////////////////////////////
    ///                                                                     ///            
    ///     Permet au vendeur de supprimer l'article qu'il a eu a poster    ///
    ///                                                                     ///
    ///////////////////////////////////////////////////////////////////////////
//___suppression de l'article
    public function del($id_article)
    {
        verifySession();
        $this->load->model('addarticle');//___Chargement du model 
        $img_list = $this->addarticle->delete_file($id_article);//___array() 
            $type = $this->addarticle->delete_article($img_list[0]->id_article);
        foreach ($img_list as $row) {

//___supression de l'image
            if ($type == 'product') {
                unlink(getcwd().'/_seller_datas_/'.$_SESSION['id_seller'].'/_publication/_product/'.$row->name_image);
            }
            else{
                unlink(getcwd().'/_seller_datas_/'.$_SESSION['id_seller'].'/_publication/_service/'.$row->name_image); 
            } 
            
        }
        if (isset($_SESSION['site_lang']) && $_SESSION['site_lang'] == 'french') {
            $_SESSION['msg'] = "Vous avez supprimer un article";
        }
        else
        {
            $_SESSION['msg'] = "Your article as been deleted";
        }

        redirect('publications');
    }

}


?>
