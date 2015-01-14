<?php 

class Join extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('register');
        
    }
    
    public function index()
    {
        $this->load->helper('form');
        $this->load->view('header');
        $this->load->view('TheOp/form');
        $this->load->view('footer');
    }
    
    public function save()
	{
		$this->load->library('form_validation');
		
		$data['title'] = "Join Our Community";
		
		$this->form_validation->set_rules('email','Email', 'trim|required|valid_email');
		
		if ( $this->form_validation->run() == FALSE ) //If the form fails upon the submit button being clicked, this will run
		{
			$this->load->view('header', $data);
			$this->load->view('join/form');
			$this->load->view('footer');
		}
		else  //if the form passes after the submit button is hit. This runs. 
		{
			$this->load->helper('url');
			$postdata = array(
				'first_name'	=> $this->input->post('first_name'),
				'last_name'		=> $this->input->post('last_name'),
				'email'			=> $this->input->post('email'),
				'username'		=> $this->input->post('username'),
				'password'		=> $this->input->post('password'),
				'bio'			=> $this->input->post('bio'),
			);
			$this->register->insert($postdata);
			
			$this->load->view('header', $data);
			$this->load->view('TheOp/saved');
			$this->load->view('footer');
		}
	}

}

?>