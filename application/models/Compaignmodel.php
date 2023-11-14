<?php 

class Compaignmodel extends CI_Model {

    public function savedata($formArray){
        $this->db->insert('emailist',$formArray);
    }

    public function checkrec($userid){
       $tempdata =  $this->db->query("SELECT * FROM `template` WHERE userid='$userid'");
       return $tempdata->result_array();
    }

    public function updateerc($userid,$formArray){
        $this->db->where('userid',$userid);                                                                         
        $this->db->update('template',$formArray);
    }

    public function livecompaign($userid){
      $live =   $this->db->query("SELECT * FROM `addlive` WHERE userid = '$userid'");
      return  $live->result_array();
    }

    function getGrafData($id){
        $array1 = ['user_id' => $id , 'status'=>'1'];
        $this->db->where($array1);
        $results = $this->db->get('mail_history');
        $result1 = $results->num_rows();

        $array2 = ['user_id' => $id , 'status'=>'0'];
        $this->db->where($array2);
        $resultf = $this->db->get('mail_history');
        $result2 = $resultf->num_rows();

        $res = ['successData' => $result1 , 'faildData'=>$result2];
        return $res;
    }
    
    public function getPLabDate($userid){
        $live =  $this->db->query("SELECT * from admin WHERE id = '$userid'");
        return $live->result_array();
      
       
    }
    
    public function getSmtp($uid){
        $query = $this->db->query("SELECT count(*) as totalSmtp FROM smtp WHERE userid='".$uid."'");
        return $query->result_array();
    }
    
    public function getHtml($uid){
        $query = $this->db->query("SELECT count(*) as totalHtml FROM html WHERE userid='".$uid."'");
        return $query->result_array();
    }
    
    public function getSenders($uid){
        $query = $this->db->query("SELECT count(*) as totalSenders FROM sender WHERE userid='".$uid."'");
        return $query->result_array();
    }
    
    public function getRecipiant($uid){
        $query = $this->db->query("SELECT count(*) as totalRecipiant FROM recipient WHERE userid='".$uid."'");
        return $query->result_array();
    }
    public function getInvoice($uid){
        $query = $this->db->query("SELECT count(*) as totalInvoice FROM invoice WHERE userid='".$uid."'");
        return $query->result_array();
    }
    public function getSubject($uid){
        $query = $this->db->query("SELECT count(*) as totalSubject FROM subjects WHERE userid='".$uid."'");
        return $query->result_array();
    }
    public function getBodyline($uid){
        $query = $this->db->query("SELECT count(*) as totalbodyline FROM bodyline WHERE user_id='".$uid."'");
        return $query->result_array();
    }
    
    public function getAttechment($uid){
        $query = $this->db->query("SELECT count(*) as totalAttch FROM uploas WHERE userid='".$uid."'");
        return $query->result_array();
    }
    
    
    public function getmailTracking(){
        //  unseen
         $live =  $this->db->query("SELECT count(*) as unseen from mail_history WHERE emaistatus='0'");
         $unseen = $live->result_array();
        //  seen
         $live =  $this->db->query("SELECT count(*) as seen from mail_history WHERE emaistatus='1'");
         $seen = $live->result_array();
         
         $resArr = ['seen'=>$seen,'unseen'=>$unseen];
         return $resArr;
    }
}

?>