<?php 
/* 
This is for POSTING to the COMMENTS
*/
class BlogController  extends CI_Controller 
{
    function Blog()
    {
        parent::Controller();
       $this->load->helper('url');
       $this->load->helper('form');
    }
    
    
    public function index()
    {
        $data['query'] = $this->db->get('entries'); 
        $this->load->view('header');  //this loads the header for the page
        $this->load->view('navbar');  //this loads the nav bar for the page
        $this->load->view('');  //this get's the data from the blog table and displays it
        $this->load->view('footer');  //this loads the footer of the page
    }
    
    function picture() {
 
	/* Loads the Tank Auth "users" model, and assigns it the alias "foo" */
	$this->load->model('tank_auth/users','foo');
 
	/* Gets the logged-in user's ID, from preloaded Tank Auth library */
	$user_id = $this->tank_auth->get_user_id();
 
	/* Queries profile information for the user who's logged in ...
	... including the profile pictures (see the table structure below) */
	$data = $this->foo->get_profile_by_id($user_id);
 
	/* Passes that data to the header, menu, form, and footer views */
	$this->load->view('templates/header', $data);
	$this->load->view('templates/menu', $data);
	/* Loads the upload_form view */
	$this->load->view('upload_form', array('error' => ' ' ));
	$this->load->view('templates/footer', $data);
 
	}
}
    function do_upload() {	
 
	/* Upload Settings */
	$config['upload_path'] = './uploads/';
	$config['allowed_types'] = 'gif|jpg|png';
	$config['max_size']	= '1024';
	$config['max_width']  = '1024';
	$config['width'] = '128';
	$config['max_height']  = '768';
	/* Encrypting helps prevent the file name from being discerned once its saved */
	$config['encrypt_name'] = 'TRUE';
 
	/* Load the CodeIgniter upload library, feed it the config from above */
	$this->load->library('upload', $config);
 
	/* Checks if the do_upload function has been successfully executed ...
	... and if not, shows the upload form and any errors (if they exist) */
	if (!$this->upload->do_upload()){
 
	/* Loads the model (predefined database instructions, see below) ...
	... and assigns it a nickname, I went with 'foo' */
	$this->load->model('tank_auth/users','foo');
 
	/* Makes the logged-in user's id a nice, clean variable */
	$user_id = $this->tank_auth->get_user_id();
 
	/* Use the model to gather all user profile information for that user_id */
	$profile_data = (array) $this->foo->get_profile_by_id($user_id);
 
	/* Pass that data into the data variable (for the views) */
	$data = $profile_data;
 
	/* Process errors if they exist */
	$error = array('error' => $this->upload->display_errors());
 
	/* Pass everything into the views */
	$this->load->view('templates/header', $data);
	$this->load->view('templates/menu', $data);
	$this->load->view('upload_form', $error);
	$this->load->view('templates/footer', $data);
 
	/* ... if the file passes validation ... */ 
	} else { 
 
	/* Load the users model, assign it alias 'foo' (or whatever you want) */
	$this->load->model('tank_auth/users','foo');
 
	/* Assign logged-in user ID to a nice, clean variable */
	$user_id = $this->tank_auth->get_user_id();
 
	/* Assign the upload's metadata (size, dimensions, destination, etc.) ...
	... to an array with another nice, clean variable */
	$upload = (array) $this->upload->data();
 
	/* Assign's the user's profile data to yet another nice, clean variable */
	$profile_data = (array) $this->foo->get_profile_by_id($user_id);
 
	/* Uses two upload library features to assemble the file name (the name, and extension) */
	$filename = $upload['raw_name'].$upload['file_ext'];
 
	/* Same with the thumbnail we'll generate, but with the suffix '_thumb' */
	$thumb = $upload['raw_name']."_thumb".$upload['file_ext'];
 
	/* Set the rules for the upload */
	$config['image_library'] = 'gd2';
	$config['source_image']	= "./uploads/".$filename;
	$config['create_thumb'] = TRUE;
	$config['maintain_ratio'] = TRUE;
	$config['width']	 = 128;
	$config['height']	= 128;
 
	/* Load "image manipulation library", see CodeIgniter user guide */
	$this->load->library('image_lib', $config);
 
	/* Resize the image! */
	$this->image_lib->resize();
 
	/* Assign upload_data to $data variable */
	$data['upload_data'] = $this->upload->data();
 
	/* Assign profile_data to $data variable */
	$data['profile_data'] = $profile_data;
 
	/* Runs the users model (update_photo function, see below) and ...
	... loads the location of the photo new photo into user's profile */
	$this->foo->update_photo($user_id, $filename, $thumb);
 
	/* Load "success" view with all the data! */
	$this->load->view('upload_success', $data);
 
	}
}
}

?>