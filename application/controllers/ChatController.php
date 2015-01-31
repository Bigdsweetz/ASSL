<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ChatController extends CI_Controller {
  /* The default function that gets called when visiting the page */
  public function index() {  
    $this->load->view('header');  //this loads the header for the page
    $this->load->view('navbar');  //this loads the nav bar for the page  
    $this->load->view('chat2');
    $this->load->view('footer');  //this loads the footer of the page  
  }
  
    function chat($me, $you)
    {
        $data['me'] = $me;
        $data['you'] = $you;
        $this->load->view('chatty', $data);
    }
	
}

  
?>
