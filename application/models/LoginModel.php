<?php 

class LoginModel extends CI_Model  //This checkes to see if the username and password that was given matches anything in the database. 

    public function login($username, $password)
    {
        $this->db->select('username', 'password');  //This get's the username and password.
        $this->db->from('profile' ); //This is checking against the table inside the database.
        $this->db->where('username', $username); //This is checking the inputted username against the username in the database.
        $this->db->where('password', $password); //This is checking the inputted password against the password in the database.
        
        $query = $this->db->get('profile'); //$query = $this->db->get('table name in database');
       
           
        if ($query->num_rows() ==1){
            return true;
        }else{
            return false;
        }
    
}

?>