<?php 

class Loginmodel extends CI_Model {

        public function login($username,$password){
        $logindet =  $this->db->query("SELECT * FROM `admin` WHERE username='$username' && password='$password'");
         return   $logindet->result_array();
        }

}


?>