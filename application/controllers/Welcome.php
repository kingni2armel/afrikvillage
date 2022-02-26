<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct() 
    {
        parent::__construct(); 
        $this->load->helper('url'); 
        $this->load->helper('language');  
    }

    ///////////////////////////////////////////////////////////
    ///                                                     ///
    ///     la cette fonction redirige juste                ///
    ///     l'utilisateur vers la fonction home()           ///
    ///     du au fait que lorsque la page demarre          ///
    ///     sans redirection, les icones utiliser           ///
    ///     via le framework FONTAWESOME ne chargent pas    ///
    ///                                                     ///
    ///////////////////////////////////////////////////////////
    public function index()
    {
        redirect('home');
    }

    ///////////////////////////////////////////
    ///                                     ///
    ///       Charge de la page d'accueil   ///
    ///                                     ///
    ///////////////////////////////////////////
    public function home()
    { 
        
        $ci =& get_instance();
        $ci->load->helper('language');
        $lang = $ci->session->userdata('site_lang');
//___Requette pour recuperer les elements de la categorie 1
        if ($lang == "french") {
            $req1  = "SELECT a.id_article, a.type_a, a.name_article, a.description_article, a.price, a.date_publication, i.name_image, c.name_category, b.id_seller, b.name_shop ";
        }
        else {
            $req1  = "SELECT a.id_article, a.type_a, a.name_article, a.description_article, a.price, a.date_publication, i.name_image, c.name_category_en, b.id_seller, b.name_shop ";
        }

        $req1 .= "FROM article a, image_of_article i, category c , boutique b ";
        $req1 .= "WHERE a.id_shop = b.id_shop AND a.id_category = c.id_category AND a.id_article = i.id_article AND a.id_category = 1 ";
        $req1 .="GROUP BY id_article ";
        $req1 .="ORDER BY a.date_publication DESC";
//___Requete pour recuperer les elements de la categorie 2
        if ($lang == "french") {
            $req2  = "SELECT a.id_article, a.type_a, a.name_article, a.description_article, a.price, a.date_publication, i.name_image, c.name_category, b.id_seller, b.name_shop ";
        }
        else {
            $req2  = "SELECT a.id_article, a.type_a, a.name_article, a.description_article, a.price, a.date_publication, i.name_image, c.name_category_en, b.id_seller, b.name_shop ";
        }

        $req2 .= "FROM article a, image_of_article i, category c , boutique b ";
        $req2 .= "WHERE a.id_shop = b.id_shop AND a.id_category = c.id_category AND a.id_article = i.id_article AND a.id_category = 2 ";
        $req2 .="GROUP BY id_article ";
        $req2 .="ORDER BY a.date_publication DESC";
//___Requete pour recuperer les elements de la categorie 3
        if ($lang == "french") {
            $req3  = "SELECT a.id_article, a.type_a, a.name_article, a.description_article, a.price, a.date_publication, i.name_image, c.name_category, b.id_seller, b.name_shop ";
        }
        else {
            $req3  = "SELECT a.id_article, a.type_a, a.name_article, a.description_article, a.price, a.date_publication, i.name_image, c.name_category_en, b.id_seller, b.name_shop ";
        }

        $req3 .= "FROM article a, image_of_article i, category c , boutique b ";
        $req3 .= "WHERE a.id_shop = b.id_shop AND a.id_category = c.id_category AND a.id_article = i.id_article AND a.id_category = 3 ";
        $req3 .="GROUP BY id_article ";
        $req3 .="ORDER BY a.date_publication DESC";
//___Requete pour recuperer les elements de la categorie 3
        if ($lang == "french") {
            $req4  = "SELECT a.id_article, a.type_a, a.name_article, a.description_article, a.price, a.date_publication, i.name_image, c.name_category, b.id_seller, b.name_shop ";
        }
        else {
            $req4  = "SELECT a.id_article, a.type_a, a.name_article, a.description_article, a.price, a.date_publication, i.name_image, c.name_category_en, b.id_seller, b.name_shop ";
        }

        $req4 .= "FROM article a, image_of_article i, category c , boutique b ";
        $req4 .= "WHERE a.id_shop = b.id_shop AND a.id_category = c.id_category AND a.id_article = i.id_article AND a.id_category = 4 ";
        $req4 .="GROUP BY id_article ";
        $req4 .="ORDER BY a.date_publication DESC";
//___Requete pour recuperer les elements de la categorie 3
        if ($lang == "french") {
            $req5  = "SELECT a.id_article, a.type_a, a.name_article, a.description_article, a.price, a.date_publication, i.name_image, c.name_category, b.id_seller, b.name_shop ";
        }
        else {
            $req5  = "SELECT a.id_article, a.type_a, a.name_article, a.description_article, a.price, a.date_publication, i.name_image, c.name_category_en, b.id_seller, b.name_shop ";
        }

        $req5 .= "FROM article a, image_of_article i, category c , boutique b ";
        $req5 .= "WHERE a.id_shop = b.id_shop AND a.id_category = c.id_category AND a.id_article = i.id_article AND a.id_category = 5 ";
        $req5 .="GROUP BY id_article ";
        $req5 .="ORDER BY a.date_publication DESC";
//___Requete pour recuperer les elements de la categorie 6
        if ($lang == "french") {
            $req6  = "SELECT a.id_article, a.type_a, a.name_article, a.description_article, a.price, a.date_publication, i.name_image, c.name_category, b.id_seller, b.name_shop ";
        }
        else {
            $req6  = "SELECT a.id_article, a.type_a, a.name_article, a.description_article, a.price, a.date_publication, i.name_image, c.name_category_en, b.id_seller, b.name_shop ";
        }

        $req6 .= "FROM article a, image_of_article i, category c , boutique b ";
        $req6 .= "WHERE a.id_shop = b.id_shop AND a.id_category = c.id_category AND a.id_article = i.id_article AND a.id_category = 6 ";
        $req6 .="GROUP BY id_article ";
        $req6 .="ORDER BY a.date_publication DESC";
//___Requete pour recuperer les elements de la categorie 7
        if ($lang == "french") {
            $req7  = "SELECT a.id_article, a.type_a, a.name_article, a.description_article, a.price, a.date_publication, i.name_image, c.name_category, b.id_seller, b.name_shop ";
        }
        else {
            $req7  = "SELECT a.id_article, a.type_a, a.name_article, a.description_article, a.price, a.date_publication, i.name_image, c.name_category_en, b.id_seller, b.name_shop ";
        }

        $req7 .= "FROM article a, image_of_article i, category c , boutique b ";
        $req7 .= "WHERE a.id_shop = b.id_shop AND a.id_category = c.id_category AND a.id_article = i.id_article AND a.id_category = 7 ";
        $req7 .="GROUP BY id_article ";
        $req7 .="ORDER BY a.date_publication DESC";
//___Requete pour recuperer les elements de la categorie 8
        if ($lang == "french") {
            $req8  = "SELECT a.id_article, a.type_a, a.name_article, a.description_article, a.price, a.date_publication, i.name_image, c.name_category, b.id_seller, b.name_shop ";
        }
        else {
            $req8  = "SELECT a.id_article, a.type_a, a.name_article, a.description_article, a.price, a.date_publication, i.name_image, c.name_category_en, b.id_seller, b.name_shop ";
        }

        $req8 .= "FROM article a, image_of_article i, category c , boutique b ";
        $req8 .= "WHERE a.id_shop = b.id_shop AND a.id_category = c.id_category AND a.id_article = i.id_article AND a.id_category = 8 ";
        $req8 .="GROUP BY id_article ";
        $req8 .="ORDER BY a.date_publication DESC";
//___chargement de l'entete
        $this->load->view('layout/header');    

        $sql1 = $this->db->query($req1);
        $sql2 = $this->db->query($req2);
        $sql3 = $this->db->query($req3);
        $sql4 = $this->db->query($req4);
        $sql5 = $this->db->query($req5);
        $sql6 = $this->db->query($req6);
        $sql7 = $this->db->query($req7);
        $sql8 = $this->db->query($req8);
        $data1 = $sql1->result();
        $data2 = $sql2->result();
        $data3 = $sql3->result();
        $data4 = $sql4->result();
        $data5 = $sql5->result();
        $data6 = $sql6->result();
        $data7 = $sql7->result();
        $data8 = $sql8->result();

        $this->load->view('home',array('cat1'=>$data1,'cat2'=>$data2,'cat3'=>$data3,'cat4'=>$data4,'cat5'=>$data5,'cat6'=>$data6,'cat7'=>$data7,'cat8'=>$data8));	   

//___chargement du pied de page
        $this->load->view('layout/footerphone.php'); 

    }

    public function error_404(){
        $this->load->view('heropage');
    }   




}
