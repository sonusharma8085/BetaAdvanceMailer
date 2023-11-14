<?php 

class UploadController extends CI_Controller {

    public function index(){

        if(isset($_POST['submit'])){
            
            $userid = $this->session->userdata('id');
            $config['upload_path']          = 'assets/uploads/';
            $config['allowed_types']        = '*';
            $config['encrypt_name'] = 'true';

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('image'))
            {
                $error = array('error' => $this->upload->display_errors());
                $errors = $error['error'];
                $this->session->set_flashdata('failure',$errors);
                redirect('UploadController');
            }
            else
            {
                $data = array('image' => $this->upload->data());
                $images =  $data['image']['file_name'];
               
                $formArray['image'] = $images;
                $formArray['userid'] = $userid;

                $this->db->insert('uploas',$formArray);
                $this->session->set_flashdata('success','Image uploded Succesfully!');
                redirect('UploadController');

            }

        }else{  
            $userid = $this->session->userdata('id');
            $this->db->where('userid',$userid);
           $datas =  $this->db->get('uploas');
            $data['uploads'] = $datas->result();
            $this->load->view('upload',$data);
    }
    }

    function delete(){
        $id = $this->input->post('id');
        // print_r($this->input->post('id'));die();
        if($id != 000){
            // single delete
            $this->db->where('id',$id);
            $this->db->delete('uploas');
        }else{
            // all delete
            $this->db->truncate('uploas');
        }
    }

}




?>