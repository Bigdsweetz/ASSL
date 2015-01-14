<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        $this->load->model('register');// this->load->model('name of the page you created')
        $data['register_list'] = $this->register->get_register(); //$data['what your defining'] = $this->register->get_name of the page you created();
        echo var_dump($data['register_list']);//echo var_dump($data['what your defining']);
        
		$this->load->view('welcome_message');
        
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */