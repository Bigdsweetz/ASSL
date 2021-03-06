<?php 

class RegisterController  extends CI_Controller 
{

    public function index()
    {
        
        
    
        
        $data = array ( 
                            'field'=>'password',
                            'label'=>'password',//name we display when the error happens
                            'rules'=>'trim|required|xss_clean|matches[confirmed_password]', //This helps to stop XSS attacks
                        );//This is the data going into the input box
        
         $data = array ( 
                            'field'=>'confirmed_password',
                            'label'=>'Password Confirmation',//name we display when the error happens
                            'rules'=>'trim|required|', //This helps to stop XSS attacks
                        );//This is the data going into the input box
        
          $data = array ( 
                            'field'=>'email',
                            'label'=>'email',//name we display when the error happens
                            'rules'=>'trim|required|is_unique[profile.email]|valid_emil|xss_clean', //This helps to stop XSS attacks
                        );//This is the data going into the input box
        
    
        
        $this->form_validation->set_rules('email','email','trim|required|is_unique[profile.email]|valid_emil|xss_clean');  //The validation rule for the e-mail
        $this->form_validation->set_rules('password','password','trim|required|matches[confirmed_password]');  //The validation for password
        $this->form_validation->set_rules('confirmed_password','confirmed_password','trim|required');  //The validation for confirmed password
        
        if ($this->form_validation->run() === FALSE){ //This should display errors and return user to page.
        
            $this->load->view('header');  //this loads the header for the page
            $this->load->view('navbar');  //this loads the nav bar for the page
            $this->load->view('register');   //this loads the body of the page
            $this->load->view('footer');  //this loads the footer of the page
        }
        else{
            $this->load->model('registermodel');//Loads the register model
            
            $user_info = array(
                'username'=>$this->input->post('username'),
                'email'=>$this->input->post('email'),
                'password'=>md5($this->input->post('password')),
            
            );
                
            $this->registermodel->add_user($user_info);    
            redirect('/appunto-auth/user/login');
        }
       
    }
    
}

?>