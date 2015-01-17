<?php 

class LoginController  extends CI_Controller 
{

    public function index()
    {
        $this->load->view('header');  //this loads the header for the page
        $this->load->view('navbar');  //this loads the nav bar for the page
        $this->load->view('login');   //this loads the body of the page
        $this->load->view('footer');  //this loads the footer of the page
    }
    
    public function checklogin()
    {
        $this->form_validation->set_rules('username', 'Username', 'required'); 
        $this->form_validation->set_rules('password', 'Password', 'required|callback_verifyUser');//This matches the username and password to the database see line 29 for function
        
        if($this->form_validation->run() == false)//This makes it so that the page reloads if the form has any errors
        {
            $this->load->view('header');  //this loads the header for the page
            $this->load->view('navbar');  //this loads the nav bar for the page
            $this->load->view('login'); //If the user puts in the wrong username and/or password, it reloads the Login page
            $this->load->view('footer');  //this loads the footer of the page
        }else{
            redirect('HomeController/Index');
        }
    }
     public function verifyUser()  //This goes and verifies the username and password against the database. 
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
         
         $this->load->model('LoginModel');
         
         
         if($this->LoginModel->login($username, $password)){  //this is defining the login model 
            return true;
         }else{
             $this->form_validation->set_message('verifyUser', 'Incorrect Username and or password. Please try again.');
             return false;
         }
    }
}

?>