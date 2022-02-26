<?php 

class Mend extends CI_Controller{

    public function __construct()

    {
            parent::__construct();
            $this->load->helper('url');
    }

        public function comment(){
                    $this->load->view('layout/comment');
        }
    }
?>