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
        $this->load->view('blog',$data);  //this get's the data from the blog table and displays it
        $this->load->view('footer');  //this loads the footer of the page
    }
    
    function comments()
    {
        $data['title'] = " My Comment Title";
        $data['heading'] = " My Comment Heading";
        $this->db->where('entry_id', $this->uri->segment(3));
        $data['query'] = $this->db->get('comments'); 
        
        $this->load->view('header');  //this loads the header for the page
        $this->load->view('navbar');  //this loads the nav bar for the page
        $this->load->view('comment_view', $data);
        $this->load->view('footer');  //this loads the footer of the page
    }
    
    function comment_insert()
    {
        $this->db->insert('comments', $_POST);
        
        redirect('blogcontroller/comments/' .$_POST['entry_id']);
    }
    
}

?>