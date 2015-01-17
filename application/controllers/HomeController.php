<?php 

class HomeController  extends CI_Controller 
{

    public function index()
    {
        $this->load->view('header');  //this loads the header for the page
        $this->load->view('navbar');  //this loads the nav bar for the page
        $this->load->view('home');   //this loads the body of the page
        $this->load->view('footer');  //this loads the footer of the page
    }
    
    public function checklogin()
    {
        $this->form_validation->set_rules('username', 'username', 'required'); 
        $this->form_validation->set_rules('password', 'password', 'required');
        
        if($this->form_validation->run() ==false)
        {
            $this->load->view('login'); //If the user puts in the wrong username and/or password, it reloads the Login page
        }else{
            redirect('HomeController/Index');
        }
    }
     public function verifyUser()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
         
         $this->load->model('LoginModel');
         
         
         if($this->LoginModel->login($username, $password)){
            return true;
         }else{
             $this->form_validation->set_message('verifyUser', 'Incorrect Username and or password. Please try again.');
         }
    }
}

?>