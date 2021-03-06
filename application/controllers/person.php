<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Person extends CI_Controller {

	// num of records per page
	private $limit = 10;
	
	function __construct()
	{
		parent::__construct();
		
		// load library
		$this->load->library(array('table','form_validation'));
		
		// load helper
		$this->load->helper('url');
		
		// load model
		$this->load->model('Person_model','',TRUE);
	}
	
	function index($offset = 0)
	{
		// offset
		$uri_segment = 3;
		$offset = $this->uri->segment($uri_segment);
		
		// load data
		$persons = $this->Person_model->get_paged_list($this->limit, $offset)->result();
		
		// generate pagination
		$this->load->library('pagination');
		$config['base_url'] = site_url('person/index/');
 		$config['total_rows'] = $this->Person_model->count_all();
 		$config['per_page'] = $this->limit;
		$config['uri_segment'] = $uri_segment;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		
		// generate table data
		$this->load->library('table');
		$this->table->set_empty("&nbsp;");
		$this->table->set_heading('No', 'Username','Name', 'Gender', 'Created', 'Actions');
		$i = 0 + $offset;
		foreach ($persons as $person)
		{
			$this->table->add_row(++$i, $person->username, $person->name, $person->surname,strtoupper($person->gender)=='M'? 'Male':'Female', date('d-m-Y',strtotime($person->created)), 
				anchor('person/view/'.$person->id,'view',array('class'=>'view')).' '.
				anchor('person/update/'.$person->id,'update',array('class'=>'update'))//.' '.
				//anchor('person/delete/'.$person->id,'delete',array('class'=>'delete','onclick'=>"return confirm('Are you sure want to delete this person?')"))
			);
		}
		$data['table'] = $this->table->generate();
		
		// load view
        $this->load->view('header');  //this loads the header for the page
        $this->load->view('navbar');  //this loads the nav bar for the page
        $this->load->view('personList', $data);  //this loads the body of the page
        $this->load->view('footer');
	}
	
	function add()
	{
		// set empty default form field values
		$this->_set_fields();
		// set validation properties
		$this->_set_rules();
		
		// set common properties
		$data['title'] = 'Add new person';
		$data['message'] = '';
		$data['action'] = site_url('person/addPerson');
		$data['link_back'] = anchor('person/index/','Back to User page',array('class'=>'back'));
	
		// load view
        $this->load->view('header');  //this loads the header for the page
        $this->load->view('navbar');  //this loads the nav bar for the page
		$this->load->view('personedit', $data);
        $this->load->view('footer');
	}
	
	function addPerson()
	{
		// set common properties
		$data['title'] = 'Add new person';
		$data['action'] = site_url('person/addPerson');
		$data['link_back'] = anchor('person/index/','Back to User page',array('class'=>'back'));
		
		// set empty default form field values
		$this->_set_fields();
		// set validation properties
		$this->_set_rules();
		
		// run validation
		if ($this->form_validation->run() == FALSE)
		{
			$data['message'] = '';
		}
		else
		{
			// save data
			$person = array('name' => $this->input->post('name'),
							'username' => $this->input->post('username'),
							'created' => date('Y-m-d', strtotime($this->input->post('created'))));
			$id = $this->Person_model->save($person);
			
			// set user message
			$data['message'] = '<div class="success">add new person success</div>';
		}
		
		// load view
        $this->load->view('header');  //this loads the header for the page
        $this->load->view('navbar');  //this loads the nav bar for the page
		$this->load->view('personedit', $data);
        $this->load->view('footer');
	}
	
	function view($id)
	{
		// set common properties
		$data['title'] = 'Person Details';
		$data['link_back'] = anchor('person/index/','Back to User page',array('class'=>'back'));
		
		// get person details
		$data['person'] = $this->Person_model->get_by_id($id)->row();
		
		// load view
		$this->load->view('header');  //this loads the header for the page
        $this->load->view('navbar');  //this loads the nav bar for the page
        $this->load->view('personview', $data);
        $this->load->view('footer');
	}
	
	function update($id)
	{
		// set validation properties
		$this->_set_rules();
		
		// prefill form values  this get's the data from the database
		$person = $this->Person_model->get_by_id($id)->row();
        $this->form_data = new stdClass();
		$this->form_data->name = $person->name;
        $this->form_data->surname = $person->surname;
        $this->form_data->username = $person->username;
		$this->form_data->gender = strtoupper($person->gender);
		$this->form_data->created = date('d-m-Y',strtotime($person->created));
		
		// set common properties
		$data['title'] = 'Update person';
		$data['message'] = '';
		$data['action'] = site_url('person/updateperson');
		$data['link_back'] = anchor('person/index/','Back to User page',array('class'=>'back'));
	
		// load view
        $this->load->view('header');  //this loads the header for the page
        $this->load->view('navbar');  //this loads the nav bar for the page
		$this->load->view('personedit', $data);
        $this->load->view('footer');
	}
	
	function updatePerson()
	{
		// set common properties
		$data['title'] = 'update person';
		$data['action'] = site_url('person/updateperson');
		$data['link_back'] = anchor('person/index/','Back to User page',array('class'=>'back'));
		
		// set empty default form field values
		$this->_set_fields();
		// set validation properties
		$this->_set_rules();
		
		// run validation
		if ($this->form_validation->run() == FALSE)
		{
			$data['message'] = '';
		}
		else
		{
			// save data
			$id = $this->input->post('id');
			$person = array('name' => $this->input->post('name'),
                            'surname' => $this->input->post('surname'),
                            'username' => $this->input->post('username'),
							'gender' => $this->input->post('gender'),
							'created' => date('Y-m-d', strtotime($this->input->post('created'))));
			$this->Person_model->update($id,$person);
			
			// set user message
			$data['message'] = '<div class="success">update person success</div>';
		}
		
		// load view
        $this->load->view('header');  //this loads the header for the page
        $this->load->view('navbar');  //this loads the nav bar for the page
		$this->load->view('personedit', $data);
        $this->load->view('footer');
	}
	
	function delete($id)
	{
		// delete person
		$this->Person_model->delete($id);
		
		// redirect to person list page
		redirect('person/index/','refresh');
	}
	
	// set empty default form field values
	function _set_fields()
	{
        $this->form_data = new stdClass;
		$this->form_data->id = '';
		$this->form_data->username = '';
        $this->form_data->name = '';
        $this->form_data->surname = '';
		$this->form_data->gender = '';
		$this->form_data->created = '';
	}
	
	// validation rules
	function _set_rules()
	{
		$this->form_validation->set_rules('username', 'UserName', 'trim|required');
        $this->form_validation->set_rules('surname', 'SurName', 'trim|required');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('gender', 'Gender', 'trim|required');
        $this->form_validation->set_rules('created', 'created', 'trim|required|callback_valid_date');
		
		$this->form_validation->set_message('required', '* required');
		$this->form_validation->set_message('isset', '* required');
		$this->form_validation->set_message('valid_date', 'date format is not valid. dd-mm-yyyy');
		$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
	}
	
	// date_validation callback
	function valid_date($str)
	{
		//match the format of the date
		if (preg_match ("/^([0-9]{2})-([0-9]{2})-([0-9]{4})$/", $str, $parts))
		{
			//check weather the date is valid of not
			if(checkdate($parts[2],$parts[1],$parts[3]))
				return true;
			else
				return false;
		}
		else
			return false;
	}
}
?>