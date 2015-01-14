<?php 

class register extends CI_Model//class (name of file) extends CI_Model
{

    public function __construct() //This loads the database.
    {
        $this->load->database();
    }
    
    public function get_register()   //public function (name it something smart)
    {
        $query = $this->db->get('profile'); //$query = $this->db->get('table name in database');
        return $query->result_array();
    }

}

?>