 <?php 
            class   About extends CI_Controller{

                    public function __construct()
                    {
                        parent::__construct();
                        $this->load->helper('url');
                    }

                    public function apropos(){
                        $this->load->view('apropos');
                    }

                    public function write_us(){
                        
                        //___chargement de l'entete
                        $this->load->view('layout/header');  
                        
                        $this->load->view('write_us');

                        //___chargement du pied de page
                        $this->load->view('layout/footer.php');
                    }
            }
 
 ?>