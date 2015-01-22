<?php 

class RegisterModel extends CI_Model { //This adds the user to the database.

    public function add_user($user_info)
    {   //auery to add user to database
        $this->db->insert('profile' , $user_info);
    
    }
}
?>