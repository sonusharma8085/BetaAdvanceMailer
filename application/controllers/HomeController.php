<?php 

class HomeController extends CI_Controller {

    public function index()
    {   

        $this->load->model('Compaignmodel');
        $userid = $this->session->userdata('id');
        $data['grafh'] = $this->Compaignmodel->getGrafData($userid);
        echo "f";die;
        $data['jkjl'] = $this->Compaignmodel->getmailTracking($userid);
        $data['smtp'] = $this->Compaignmodel->getSmtp($userid);
        $data['html'] = $this->Compaignmodel->getHtml($userid);
        $data['senders'] = $this->Compaignmodel->getSenders($userid);
        $data['recipiant'] = $this->Compaignmodel->getRecipiant($userid);
        $data['invoice'] = $this->Compaignmodel->getInvoice($userid);
        $data['subjects'] = $this->Compaignmodel->getSubject($userid);
        $data['bodyline'] = $this->Compaignmodel->getBodyline($userid);
        $data['attch'] = $this->Compaignmodel->getAttechment($userid);
      //  print_r($data['smtp']);die();
        // print_r($data['jkjl']['unseen']['0']['unseen']);die();
        $data['mailSeen'] = $data['jkjl']['seen'][0]['seen'];
        $data['mailUnSeen'] = $data['jkjl']['unseen']['0']['unseen'];
        
        $this->load->view('index',$data);
    }
    
    function expDateUpdate(){
        $this->load->model('Compaignmodel');
        $userid = $this->input->post('id');
        $data = $this->Compaignmodel->getPLabDate($userid);
        
        //print_r($data[0]);die();
        $plan['fromDate'] = $data[0]['formdate'];
        $plan['toDate'] = $data[0]['todate'];
        $this->session->set_userdata('name',$data[0]['name']);
        $this->session->set_userdata('profile_image',$data[0]['profile_image']);
        $this->session->set_userdata('planDate',$plan);
        
    }


    
}

?>