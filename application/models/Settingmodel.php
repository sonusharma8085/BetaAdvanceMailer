<?php 

class Settingmodel extends CI_Model {
        public function allrec($userid){
           $record =  $this->db->query("SELECT * FROM `licence` WHERE user_id = '$userid'");
           return  $record->result_array();
        }

        public function updatedata($userid,$formArray){

            $this->db->where('user_id',$userid);

			$this->db->update('licence',$formArray);

        }

}
?>