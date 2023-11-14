<?php
class ProfileController extends CI_Controller{
    // global var
    var $userid;
    function __construct(){
        parent::__construct();
        $this->userid = $this->session->userdata('id');
    }

    function index(){
        
        $this->db->where('id', $this->userid);
        $query = $this->db->get('admin');
        $data['profile'] = $query->result();

        // print_r($data['profile'][0]);die();
        $this->load->view('profile',$data);
    }

    function update(){
     ///  print_r($_FILES['images']['name']);die();
        if($_FILES['images']['name'] != ""){
            // echo "image selected";
            $path = 'assets/profile/';
            $config['upload_path']          = $path;
            $config['allowed_types']        = 'jpg|png';
            $config['max_size']             = 100;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;
            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('images'))
            {
                $error = array('error' => $this->upload->display_errors());
                //print_r($error);die();
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('ProfileController');
            }
            else
            {
                $data = array('upload_data' => $this->upload->data());
                $imageName = $data['upload_data']['file_name'];
            }
        
        }else{
          //  echo "OLd Image not seleted";
            $imageName = $this->input->post('hdnImage');
        }
        $datas['name'] = $this->input->post('name');
        //    $data['username'] = $this->input->post('username');
        $datas['contact_no'] = $this->input->post('contactNo');
        $datas['mobile_no'] = $this->input->post('mobileNo');
        $datas['address'] = $this->input->post('address');
        $datas['profile_image'] = $imageName;

        $this->db->where('id',$this->userid);
        $this->db->update('admin',$datas);
        $this->session->set_userdata('profile_image',$imageName);
        //    print_r($datas);
        //    die();
        $this->session->set_flashdata('success','Profile uploded Succesfully!');
        redirect('ProfileController');
     }
}


?>