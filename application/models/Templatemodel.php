<?php 

class Templatemodel extends CI_Model {

    public function allrecord($userid){

       $counts =  $this->db->query("SELECT * FROM `updatetemplate` WHERE userid='$userid'");
       return  $counts->result_array();

    }


    public function updatedata($userid,$formArray){

        $this->db->where('userid',$userid);

        $this->db->update('updatetemplate',$formArray);

    }

}
?>