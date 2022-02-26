<?php
    class Seller extends CI_model
    {
        public function getIdUserOfSeller($id_seller){
//___selection de l'id utilisateur du vendeur
            $query = $this->db->where('id_seller',$id_seller);
            $query = $this->db->get('vendeur');
            $row = $query->result();
            if (is_array($row) && isset($row[0]->id_user)) {
                $id_user = $row[0]->id_user;
                //___recuperation des information du vendeur a partir de son id utilisateur
                            $query = $this->db->where('id_user', $id_user);
                            $query = $this->db->get('utilisateur');
                            $userInfo = $query->result();
                //___recuperation des information sur la boutique du vendeur
                            $query = $this->db->where('id_seller', $id_seller);
                            $query = $this->db->get('boutique');
                            $shopInfo = $query->result();
                            $id_shop = $shopInfo[0]->id_shop;
                //___recuperation des articles postés par le vendeur
                            $query = $this->db->where('id_shop', $id_shop);
                            //$query = $this->db->select('*');
                            //$query = $this->db->from('article');
                            $query = $this->db->join('image_of_article','image_of_article.id_article=article.id_article');
                            $query = $this->db->get('article');
                            $infoAboutArticles = $query->result();
                            /*if ($infoAboutArticles == null) {
                                $infoAboutArticles = null;
                            }*/
                //___retour des infos collecté sous forme de tableaux indexé
                            $data = array(
                                'userInfo' => $userInfo,
                                'shopInfo' => $shopInfo,
                                'shopArticles' => $infoAboutArticles
                            );            
                            return $data;
            }else{
                return ;
            }
        }        
    }
    
?>
