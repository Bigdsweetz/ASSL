<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ChatController extends CI_Controller {
  /* The default function that gets called when visiting the page */
  public function index() {  
    $this->load->view('header');  //this loads the header for the page
    $this->load->view('navbar');  //this loads the nav bar for the page  
    $this->load->view('chat');
    $this->load->view('footer');  //this loads the footer of the page  
  }
  
  public function get_chats() {
    /* Connect to the mySQL database - config values can be found at:
    /application/config/database.php */
    $dbconnect = $this->load->database();
    
    /* Load the database model:
    /application/models/simple_model.php */
    $this->load->model('ChatModel');
    
    /* Create a table if it doesn't exist already */
    $this->Chat_model->create_table();
    
    echo json_encode($this->Chat_model->get_chat_after($_REQUEST["time"]));
  }
  
  public function insert_chat() {
    /* Connect to the mySQL database - config values can be found at:
    /application/config/database.php */
    $dbconnect = $this->load->database();
    
    /* Load the database model:
    /application/models/simple_model.php */
    $this->load->model('ChatModel');
    
    /* Create a table if it doesn't exist already */
    $this->Chat_model->create_table();

    $this->Chat_model->insert_message($_REQUEST["message"]); 
  }
  
  public function time() {
    echo "[{\"time\":" +  time() + "}]";
  }
  
}?>
