<?php 

class Join extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        
    }
    
    public function index()
    {
        $this->load->view('header');
        echo "Hello from Space";
        $this->load->view('footer');
    }

}

?>