<?php 

class LiveCompaignController extends CI_Controller {

    public function index(){

        $this->load->view('livecompaign');

    }
    public function addlive(){
        $this->load->model('Compaignmodel');
        $userid = $this->session->userdata('id');

        if(isset($_POST['submit'])){
            
            $str_result = '0123456789'; 
  
            $entrycode = substr(str_shuffle($str_result), 0, 6); 

            $formArray = array();
            $formArray['cinpaign'] = $this->input->post('seletc');
            $formArray['username'] = $entrycode;

            $formArray['totalhrs'] = $this->input->post('totakhrs'); 
            $formArray['groups'] = $this->input->post('groups'); 
            $formArray['startafter'] = $this->input->post('startafter'); 
            $formArray['bcc'] = $this->input->post('bcc'); 
            $formArray['userid'] = $userid; 
            $this->db->insert('addlive',$formArray);
            $this->session->set_flashdata('success','Succesfully Added!');
            redirect('LiveCompaignController/addlive');


        }else{
            $data['livedata'] = $this->Compaignmodel->livecompaign($userid);
            $this->load->view('addliveconplaign',$data);
        }

    }
}

?>