<?php 

class RegisterController  extends CI_Controller 
{

    public function index()
    {
        $this->load->view('header');  //this loads the header for the page
        $this->load->view('navbar');  //this loads the nav bar for the page
        $this->load->view('register');   //this loads the body of the page
        $this->load->view('footer');  //this loads the footer of the page
    }
    
}

?>