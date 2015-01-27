<?php 
//This is the USER home page view...

class HomeController  extends CI_Controller 
{

    public function index()
    {
        $this->load->view('header');  //this loads the header for the page
        $this->load->view('navbar');  //this loads the nav bar for the page
        $this->load->view('home' , array('error' => ' ' ));   //this loads the body of the page
        $this->load->view('footer');  //this loads the footer of the page
    }
    
    function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url')); //This should be auto loaded.
	}
    
	function do_upload()
	{
		$config['upload_path'] = '../../TheOP/upload/'; //This is supposed to have the files that are uploaded go to this folder.
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);
                $this->upload->initialize($config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
            
            $this->load->view('header');  //this loads the header for the page
            $this->load->view('navbar');  //this loads the nav bar for the page
			$this->load->view('home', $error);
            $this->load->view('footer');  //this loads the footer of the page
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
            
            $this->load->view('header');  //this loads the header for the page
            $this->load->view('navbar');  //this loads the nav bar for the page
			$this->load->view('home_success', $data);
            $this->load->view('footer');  //this loads the footer of the page
		}
    }
}

?>