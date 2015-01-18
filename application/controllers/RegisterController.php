<?php 

class RegisterController  extends CI_Controller 
{

    public function index()
    {
        
        
        
        
        
        $data = array ( 
                            'field'=>'email',
                            'label'=>'email',//name we display when the error happens
                            'rules'=>'trim|required|valid_emil|xss_clean', //This helps to stop XSS attacks
                        );//This is the data going into the input box
        
        $this->form_validation->set_rules('email','email','trim|required|valid_emil|xss_clean');  //This way I don't have to rewrite my rules for everything. It's done once and that's it. 
        
        if ($this->form_validation->run() ===FALSE){ //This should display errors and return user to page.
        
            $this->load->view('header');  //this loads the header for the page
            $this->load->view('navbar');  //this loads the nav bar for the page
            $this->load->view('register');   //this loads the body of the page
            $this->load->view('footer');  //this loads the footer of the page
        }
        else{
            echo "wazzup";
        }
       
    }
    
}

?>