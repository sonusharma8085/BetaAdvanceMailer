<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
    class BodylineImport extends CI_Model {
 
        public function __construct()
        {
            $this->load->database();
        }
        
        public function importData($data) {
            $res = $this->db->insert_batch('bodyline',$data);
            if($res){
                return TRUE;
            }else{
                return FALSE;
            }
      
        }
    }
?>