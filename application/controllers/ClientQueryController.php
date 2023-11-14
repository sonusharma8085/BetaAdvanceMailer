<?php 

class ClientQueryController extends CI_Controller {

    public function index()
    {   
        $datas = $this->db->get('clientquery');
        $data['clientquery'] = $datas->result();
        $this->load->view('ClientQuery',$data);
    }

    function store(){
        $query = $this->input->post('query');

        $data['query'] = $query;
        $data['clientname'] = $this->session->userdata('name');

        $this->db->insert('clientquery',$data); 
        $this->session->set_flashdata('success','Query submited Succesfully!');
        redirect('ClientQueryController');
    }
    
    function MailerPlan(){
        
         $this->load->view('mailerPlan');
    }


    
}

?>