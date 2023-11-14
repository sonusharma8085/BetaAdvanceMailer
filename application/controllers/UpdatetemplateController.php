<?php 

class UpdatetemplateController extends CI_Controller {

    public function index(){
        
           $userid = $this->session->userdata('id');

           if(isset($_POST['submit'])){

           $formArray = array();

           $formArray['invoice'] = $this->input->post('invoice');

           $formArray['template'] = $this->input->post('content');

           $formArray['userid'] = $userid;

           $this->load->model('Templatemodel');

           $tempdata = $this->Templatemodel->allrecord($userid);

            if(!empty($tempdata)){

                $this->Templatemodel->updatedata($userid,$formArray);

                $this->session->set_flashdata('success','Update Succesfully');

                redirect('UpdatetemplateController');
                
            }else{

            $this->db->insert('updatetemplate',$formArray);

            $this->session->set_flashdata('success','Success');

            redirect('UpdatetemplateController');

        }}else{

            $this->load->model('Templatemodel');

            $data['temdata'] = $this->Templatemodel->allrecord($userid);

            $this->load->view('updatetemplate',$data);
        }

    }
}
?>