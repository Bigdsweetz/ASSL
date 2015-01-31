<?php 
/* 
This is for POSTING to the BLOG
*/
class BlogPostController  extends CI_Controller 
{
   function Blog_Post()
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
        $this->load->view('create_blog',$data);   //this loads the body of the page
        $this->load->view('footer');  //this loads the footer of the page
    }
    
    function blogs()
    {
        $data['title'] = " My Blog Title";
        $data['heading'] = " My Blog Heading";
        $this->db->where('id', $this->uri->segment(3));
        $data['query'] = $this->db->get('entries'); 
        
        $this->load->view('header');  //this loads the header for the page
        $this->load->view('navbar');  //this loads the nav bar for the page
        $this->load->view('blog_view', $data);
        $this->load->view('footer');  //this loads the footer of the page
    }
    
    function blog_insert()
    {
        $this->db->insert('entries', $_POST);
        
        redirect('blogcontroller/comments/');
    }
    
    function create_blog(){
        $this->load->view('header');  //this loads the header for the page
        $this->load->view('navbar');  //this loads the nav bar for the page
        $this->load->view('blog_post_create');
        $this->load->view('footer');  //this loads the footer of the page
        
    }
    
}

?>