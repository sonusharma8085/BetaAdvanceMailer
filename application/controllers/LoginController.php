<?php 

class LoginController extends CI_Controller {

    public function index()
    {
        $this->load->view('login');
    }

    public function login()
    {
        $this->load->model('Loginmodel');
        $username =  $this->input->post('username');
        $password =  $this->input->post('password');
        $logincount =  $this->Loginmodel->login($username,$password);
        $adminid = $logincount[0]['id'];
        $adminname = $logincount[0]['name'];
      
        if(empty($logincount)){
            $this->session->set_flashdata('failure','Username and Password Incorrect');
            redirect('LoginController');
        }else{
            $curentDate = date('Y-m-d');
            // $curentDate = "2022-12-19";
            // print);die();
            // print_r($logincount[0]['todate']);die();
            $curentDate = date('Y-m-d', strtotime($curentDate));
            $contractDateBegin = date('Y-m-d', strtotime($logincount[0]['formdate']));
            $contractDateEnd = date('Y-m-d', strtotime($logincount[0]['todate']));
    
            if(($curentDate <= $contractDateEnd && $logincount[0]['approval'] == 1)){
               // echo "is between";
                $this->session->set_userdata('id',$adminid);
                $this->session->set_userdata('name',$adminname);
                $this->session->set_userdata('profile_image',$logincount[0]['profile_image']);
                $plan['fromDate'] = $logincount[0]['formdate'];
                $plan['toDate'] = $logincount[0]['todate'];
                $this->session->set_userdata('planDate',$plan);
                $this->session->set_userdata('profile_image',$logincount[0]['profile_image']);
                redirect('dashboard');
            }else{
                $this->session->set_flashdata('failure','Login plan expire please contact your service provider');
                redirect('LoginController');  
            }
        }

    }

    public function logout()
		{
			$this->session->sess_destroy();
			redirect('login');
		}
}

?>