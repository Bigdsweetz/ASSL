<?php 

class Join extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        
    }
    
    public function index()
    {
        $this->load-helper('form');
        $this->load->view('header');
        $this->load->view('TheOp/form');
        $this->load->view('footer');
    }

}

?>