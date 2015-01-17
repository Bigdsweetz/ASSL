<?php 

class LoginController  extends CI_Controller 
{

    public function index()
    {
        $this->load->view('login');
    }
    
    public function checklogin()
    {
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        
        if($this->form_validation->run() ==false
        {
            $this->load->view('login');
        }else{
        
        }
    }
}

?>