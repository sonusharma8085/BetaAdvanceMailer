<?php 
    class Smtpdatamodel extends CI_Model
    {
        public function __construct()
        {
            $this->load->database();
        }
        
        public function importData($data) {
  
            $res = $this->db->insert_batch('data',$data);
            if($res){
                return TRUE;
            }else{
                return FALSE;
            }
      
        }
        
    }
    

?>