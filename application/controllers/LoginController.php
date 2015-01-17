<?php 

class LoginController  extends CI_Controller 
{

    public function index()
    {
        $this->load->view('header');
        $this->load->view('navbar');
        $this->load->view('login');
        $this->load->view('footer');
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