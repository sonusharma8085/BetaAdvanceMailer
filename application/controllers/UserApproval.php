<?php
class UserApproval extends CI_Controller{

    function __construct(){
        parent::__construct();
    }

    function index(){
        $datas = $this->db->get('admin');
        $data['userName'] = $datas->result();
        $this->load->view('userApproval',$data);
    }

    function access(){
       // print_r($this->input->post());die();
        $fromdate  =  date("Y-m-d", strtotime($this->input->post('formDate')));
        $toDate  =  date("Y-m-d", strtotime($this->input->post('toDate')));
        $inputchk = $this->input->post('chekApprov');
        $approval = 0;
        if(isset($inputchk)){
            $approval = 1;
        }
        $id = $this->input->post('hdnID');

        $data['formdate'] = $fromdate;
        $data['todate'] = $toDate;
        $data['approval'] = $approval;
        $this->db->where('id', $id);
        $this->db->update('admin', $data);

        $this->session->set_flashdata('success','Plan approve Succesfully!');
        redirect('UserApproval');
    }
}
?>