<?php 

class CompaignController extends CI_Controller {

    public function __construct(){
        parent:: __construct();
       // $this->load->model->();
    } 

    public function index(){

        $this->load->view('compaign');

    }

    public function saverecord(){
        $this->load->model('Compaignmodel');
        $userid = $this->session->userdata('id');
        $formArray = array();
        $formArray['compainame'] = $this->input->post('compaigname');
        $formArray['comname'] = $this->input->post('cname');
        $formArray['comnum'] = $this->input->post('cnumer');
        $formArray['city'] = $this->input->post('country');
        $formArray['userid'] = $userid;
        $this->Compaignmodel->savedata($formArray);
        $this->session->set_flashdata('success','Record Added Succesfully!');
        redirect('CompaignController');
    }

    // public function sendMail(){
    //     $this->load->model('Compaignmodel');

    // }

    function sendMail(){
        $smtpQuery = $this->db->query('SELECT * FROM smtp');
        $smtp = $smtpQuery->result();
        $senderQuery = $this->db->query('SELECT * FROM sender');
        $sender = $senderQuery->result();
        $subjectsQuery = $this->db->query('SELECT * FROM subjects');
        $subjects = $subjectsQuery->result();
        $recipientQuery = $this->db->query('SELECT * FROM recipient');
        $recipient = $recipientQuery->result();
        $bodylineQuery = $this->db->query('SELECT * FROM bodyline');
        $bodyline = $bodylineQuery->result();
        $uploasQuery =  $this->db->get('uploas');
        $uploads = $uploasQuery->result();
        // count($smtp);

        // print_r($recipient[1]->recipient);die();
        // Load PHPMailer library
        $this->load->library('phpmailer_lib');
        // PHPMailer object
        $success = 0;
        $faild = 0;
        for($sm = 0; $sm < count($smtp); $sm++){
            $mail = $this->phpmailer_lib->load();
            // SMTP configuration
            $mail->isSMTP();
            $mail->SMTPAuth = true;
            $mail->Host     = $smtp[$sm]->host;
            $mail->Username = $smtp[$sm]->username;
            $mail->Password = $smtp[$sm]->password;
            $mail->Port       = $smtp[$sm]->port;
            $mail->SMTPSecure = 'tls';
            $mail->setFrom($smtp[$sm]->username, $sender[$sm]->sendername);
            //  $mail->addReplyTo('info@example.com', 'CodexWorld');
            //  Add a recipient
            $mail->addAddress($recipient[$sm]->recipient);
          //  $mail->addAttachment('assets/uploads/'.$uploads[$sm]->image);
            //  Add cc or bcc 
            //  $mail->addCC('cc@example.com');
            //  $mail->addBCC('bcc@example.com');
            //  Email subject
            $mail->Subject = $subjects[$sm]->subject;
            // Set email format to HTML
            $mail->isHTML(true);
            // Email body content
            $mailContent = $bodyline[$sm]->bodyline;
            // $mail->Body = $mailContent;
            $mail->Body = "Hello";
          //  $mail->SMTPDebug = 1;
          //  $mail->Debugoutput = 'echo';
            // Send email
           
            if(!$mail->send()){
                echo 'Message could not be sent. (faild '.$faild++.')</br>';
                echo 'Mailer Error: ' . $mail->ErrorInfo .'</br>';
            }else{
                echo 'Message has been sent (success '.$success++.') </br>';
                echo 'Mailer Error: ' . $mail->ErrorInfo .'</br>';
            }
            die();
        }
        echo '(success '.$success.')';
        echo '(faild '.$faild.')';
    }

    public function template(){
        if(isset($_POST['submit'])){
            $userid = $this->session->userdata('id');
            $formArray = array();
            $formArray['text1'] = $this->input->post('text1');
            $formArray['text2'] = $this->input->post('text2');
            $formArray['fname'] = $this->input->post('fname');
            $formArray['lname'] = $this->input->post('lname');
            $formArray['ganylisy'] = $this->input->post('ganylisy');
            $formArray['template'] = $this->input->post('template');
            $formArray['userid'] = $userid;
            $this->load->model('Compaignmodel');
            $tempdata = $this->Compaignmodel->checkrec($userid);
           if(Empty($tempdata)){
            $this->db->insert('template',$formArray);
            $this->session->set_flashdata('success','Record Added Succesfully!');
            redirect('CompaignController/template');
        }else{

            $this->Compaignmodel->updateerc($userid,$formArray);
            $this->session->set_flashdata('success','Record Updated Succesfully!');
            redirect('CompaignController/template');

        }
        }else{
            $this->load->view('template');
        }
    }

}
?>