<?php 
//This is the SITE home page...not be confused with the USER home page
class IndexController  extends CI_Controller 
{

    public function index()
    {
        $this->load->library('session');
        $this->load->view('header');  //this loads the header for the page
        $this->load->view('navbar');  //this loads the nav bar for the page
        $this->load->view('index');   //this loads the body of the page
        $this->load->view('footer');  //this loads the footer of the page
    }
    
}

?>