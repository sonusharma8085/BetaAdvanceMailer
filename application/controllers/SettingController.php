<?php 

class SettingController extends CI_Controller {

    public function index(){
        $this->load->model('Settingmodel');
        $userid = $this->session->userdata('id');
        $results  = $this->Settingmodel->allrec($userid);
        $data['results'] = $results;
        $this->load->view('add-licence',$data);
    }

    public function saverecord(){
       
        $this->load->model('Settingmodel');
        $userid = $this->session->userdata('id');
        $formArray['licence_number'] = $this->input->post('licence');
        $formArray['user_id'] = $userid;
        $recount  = $this->Settingmodel->allrec($userid);
        
        if( empty($recount)){
            
            $this->db->insert('licence',$formArray);
            $this->session->set_flashdata('success','Licence added Succesfully!');

        }else{

            $this->Settingmodel->updatedata($userid,$formArray); 
            $this->session->set_flashdata('success','Licence updated Succesfully!');

        }
        redirect('setting');

    }
}

?>