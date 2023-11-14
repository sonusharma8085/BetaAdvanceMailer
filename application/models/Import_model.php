<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
    class Import_model extends CI_Model {
 
        public function __construct()
        {
            $this->load->database();
        }
        
        public function importData($data) {
  
            $res = $this->db->insert_batch('smtp',$data);
            if($res){
                return TRUE;
            }else{
                return FALSE;
            }
      
        }

        public function importInvoiceData($data) {
  
            $res = $this->db->insert_batch('invoice',$data);
            if($res){
                return TRUE;
            }else{
                return FALSE;
            }
      
        }
    }
?>