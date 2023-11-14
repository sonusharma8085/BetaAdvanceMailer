<?php 

class CompaignController extends CI_Controller {

    public function __construct(){
        parent:: __construct();
       // $this->load->model->();
       date_default_timezone_set("Asia/Calcutta"); 
       $this->load->model('Compaignmodel');
    } 

    public function invoiceview(){
         $userid = $this->session->userdata('id');
        $smtpQuery = $this->db->query('SELECT * FROM smtp WHERE userid="'.$userid.'"');
        $smtp = $smtpQuery->result();
        $senderQuery = $this->db->query('SELECT * FROM sender WHERE userid="'.$userid.'"');
        $sender = $senderQuery->result();
        $subjectsQuery = $this->db->query('SELECT * FROM subjects WHERE userid="'.$userid.'"');
        $subjects = $subjectsQuery->result();
        $recipientQuery = $this->db->query('SELECT * FROM recipient WHERE userid="'.$userid.'"');
        $recipient = $recipientQuery->result();
        $bodylineQuery = $this->db->query('SELECT * FROM bodyline where user_id="'.$userid.'"');
        $bodyline = $bodylineQuery->result();
        $invoiceQuery =  $this->db->query('SELECT * FROM invoice WHERE  userid="'.$userid.'"' );
        $invoice = $invoiceQuery->result();
        $pageData['k'] = 0;
        $pageData['fremail'] =  $smtp[0]->username;
        $pageData['frname'] =  $sender[0]->sendername;
        $pageData['toEmail'] =  $recipient[0]->recipient;
        $pageData['toName'] =  $sender[0]->sendername;
        $pageData['invoice'] = $invoice;
        $this->load->view('invoice_view',$pageData);
    }

    public function index(){
        $userid = $this->session->userdata('id');
        $pageData['success'] = 0;
        $pageData['faild'] = 0;
        $pageData['progessTotal'] = 0;
        $this->db->order_by('id', 'desc');
        $this->db->where('user_id',$userid);
        $query = $this->db->get('mail_history');
    
        $pageData['history'] = $query->result();
        $pageData['process'] = $this->session->flashdata('process');    
        
        // print_r($pageData['process']);die();
        $this->load->view('compaign',$pageData);
    }

    function getData(){
        $userid = $this->session->userdata('id');
        $data = $this->Compaignmodel->getGrafData($userid);
        //   print_r($data['successData']);die();
        echo json_encode($data);
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
        $userid = $this->session->userdata('id');
        $smtpQuery = $this->db->query('SELECT * FROM smtp WHERE userid="'.$userid.'"');
        $smtp = $smtpQuery->result();
        $senderQuery = $this->db->query('SELECT * FROM sender WHERE userid="'.$userid.'"');
        $sender = $senderQuery->result();
        $subjectsQuery = $this->db->query('SELECT * FROM subjects WHERE userid="'.$userid.'"');
        $subjects = $subjectsQuery->result();
        $recipientQuery = $this->db->query('SELECT * FROM recipient WHERE userid="'.$userid.'"');
        $recipient = $recipientQuery->result();
        $bodylineQuery = $this->db->query('SELECT * FROM bodyline');
        $bodyline = $bodylineQuery->result();
      
      
        $bodulinereplaced = str_replace("%name%",$recipient[0]->recipientname,$bodyline[0]->bodyline);
       
        // print_r($bodulinereplaced);
        // die();
        $uploasQuery =  $this->db->get('uploas');
        $uploads = $uploasQuery->result();
        $invoiceQuery =  $this->db->query('SELECT * FROM invoice WHERE  userid="'.$userid.'"' );
        $invoice = $invoiceQuery->result();
    //   print_r($invoice);die();

        $htmlQuery =  $this->db->get('html');
        $htmlCon = $htmlQuery->result();
       

       

        $this->load->library('PHPMailer_Lib');
        // PHPMailer object
        $success = 1;
        $faild = 0;
        $a = 0; // smtp
        $b = 0; // sender name
        $c = 0; // subject
        $d = 0; // body line
        $e = 0; // uplods attechment
        $f = 0; // htmlCon
        $g = 0; // invoice
        $this->session->set_userdata('progessTotal',count($recipient));
        $skipTime = $this->input->post('skipTime');
        $pro = 0;
        for($sm = 0; $sm < count($recipient); $sm++){
           

            try {
                $pageData['k'] = $g;
                $pageData['fremail'] =  $smtp[$a]->username;
                $pageData['frname'] =  $sender[$b]->sendername;
                $pageData['toEmail'] =  $recipient[$sm]->recipient;
                $pageData['toName'] =  $sender[$b]->sendername;
                $pageData['invoice'] = $invoice;
                $htmlBody = $this->load->view('invoice_view',$pageData,true);
                //  print_r($htmlBody);
                //  die();
                //  print_r($htmlBody."</br>");
                $mail = $this->phpmailer_lib->load();
                // SMTP configuration
                $mail->isSMTP();
                $mail->SMTPAuth = true;
                $mail->Host     = $smtp[$a]->host;
                $mail->Username = $smtp[$a]->username;
                $mail->Password = $smtp[$a]->password;
                $mail->Port     = $smtp[$a]->port;
                $mail->SMTPSecure = 'tls';
                $track_code = md5(rand());
                // print_r($mailSatus);
                try {
                    $validCredentials = $mail->SmtpConnect();
                  //  print_r("workign smtp" . $a."</br>");
                }
                catch(Exception $error) { //Returning False is  NOT an Exception.
                    //print_r("not working smtp ".$a."</br>");
                    $status = 0;
                    $this->saveHistory($status,$smtp[$a]->username,$recipient[$sm]->recipient,$subjects[$c]->subject,$track_code);
                    $a++;
                    $faild++;
                    continue;
                }

                $mail->setFrom($smtp[$a]->username, $sender[$b]->sendername);
                $mail->Subject = $subjects[$c]->subject;
                $mail->addAddress($recipient[$sm]->recipient);
                $mail->AddReplyTo($smtp[$a]->replay_email, 'Beta Mailer');
                // Set email format to HTML
                // Email body content
                $mailContent = $bodulinereplaced;
                $postHtml = $this->input->post('html');
                $invoicepost = $this->input->post('invoice');
                $bodyLine = $this->input->post('bodyLine');
                $attechment = $this->input->post('attechment');

                if(isset($invoicepost)){
                    if(count($invoice)!= 0){
                        $htmlBody = $htmlBody;
                    }else{
                        $this->session->set_flashdata('error',$faild . 'Blank invoice not accepted');
                        redirect('CompaignController');
                    }
                }else{
                    $htmlBody = "";
                }

                if(isset($bodyLine)){
                     if( $mailContent != ""){
                        $mailContent = $mailContent;
                    }else{
                        $this->session->set_flashdata('error',$faild . 'Blank body line not accepted');
                        redirect('CompaignController');
                    }
                }else{
                    $mailContent = "";
                }

                if(isset($attechment)){
                    if( $uploads[$e]->image != ""){
                            $mail->Body = $uploads[$e]->image;
                        }else{
                            $this->session->set_flashdata('error',$faild . 'Blank attechment not accepted');
                            redirect('CompaignController');
                        }
                    $mail->addAttachment('assets/uploads/'.$uploads[$e]->image);
                }
                $htmlcode = "";
                if(isset($postHtml)){
                    if($htmlCon[$f]->htmlcode !=  ""){
                        $htmlcode = $htmlCon[$f]->htmlcode;
                    }else{
                        $this->session->set_flashdata('error',$faild . 'Blank html not accepted');
                            redirect('CompaignController');
                    }
                }
                
                $message_body = $htmlcode.'</br>'.$htmlBody.'</br>'.$mailContent;
                
                $url = base_url('CompaignController/emailTrack?code=').$track_code;
                
                $message_body.="<img style='display:none;' src='".$url."' />";
                
                // $message_body.='<img src="'.base_url('CompaignController/emailTrack/').$track_code.'"'>
                
                $mail->Body = $message_body;
                // print_r($mail->Body);
                // die();
            
                $mail->isHTML(true);
                $mail->SMTPDebug = 1;
                //   print_r($mail);die();

                if(!$mail->send()){
                    continue;
                    $status = 0;
                    $this->session->set_flashdata('error',$faild++ . ' Mail Sending Error!');
                }else{
                    $status = 1;
                    $this->session->set_flashdata('success',$success++ . ' Mail Successfully Send!');
                    $this->session->set_flashdata('error',$faild . ' Mail Sending Error!');
                }        
                // if(isset($skipTime)){
                //     sleep($skipTime);
                // }
                $this->saveHistory($status,$smtp[$a]->username,$recipient[$sm]->recipient,$subjects[$c]->subject,$track_code);
                $a++;
                $b++;
                $c++;
                $d++;
                $e++;
                $f++;
                $g++;
                if(count($smtp) == $a){                                                                                         
                    $a=0;
                }   
                if(count($sender) == $b){
                    $b=0;
                }  
                if(count($subjects) == $c){
                    $c=0;
                }
                if(count(array($bodulinereplaced)) == $d){
                    $d=0;
                }
                if(count($uploads) == $e){
                    $e=0;
                }
                if(count($htmlCon) == $f){
                    $f=0;
                }
                if(count($invoice) == $g){
                    $g=0;
                }
                $pro + 10;
                $this->session->set_flashdata('process',"50");
                $this->index();
           }catch(Exception $error) {
               $this->session->set_flashdata('error',$error->getMessage());
           }
          //  continue;
          //print_r($a."sonu</br>");
        }
        //    die();
        redirect('CompaignController');
    }

    function saveHistory($status,$username,$recipient,$subject,$track_code){
        $userid = $this->session->userdata('id');
        $data['status'] = $status;
        $data['sender_name'] = $username;
        $data['subject'] = $subject;
        $data['recipient'] = $recipient;
        $data['user_id'] = $userid;
        $data['email_status'] = $track_code;
        $this->db->insert('mail_history',$data);
    }

    function delete(){
        $id = $this->input->post('id');
        // print_r($this->input->post('id'));die();
        if($id != 000){
            // single delete
            $this->db->where('id',$id);
            $this->db->delete('mail_history');
        }else{
            // all delete
            $this->db->truncate('mail_history');
        }
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
    
    public function exportCsv(){
        
        $this->db->order_by('id', 'desc');
        $hostey = $this->db->get('mail_history');

        $ailehistry = $hostey->result_array();

        
        // $delimiter=",";
        // $fields = array("S.no", "Name", "Quantity","Price","Discount","Category","Subcategory","Description","Image","Color","Created_at");
        // $f = fopen( 'php://output', 'w' );
        // fputcsv($f,$fields,$delimiter);
        
        $html="<table><tr><th>SNO</th><th>SENDER NAME</th><th>SUBJECT</th><th>RECIPIENT NAME</th><th>DATE TIME</th><th>STATUS</th><th>Email Send Status</th><th>Email Open Time</th></tr> ";
        
     
      $i=1; foreach($ailehistry as $produtesh){
            if($produtesh['status']=="1"){
                $status="Success";
            }else{
                
                $status="Failed";
            }
            
             if($produtesh['emaistatus']=="1"){
                $emalsatus="Seen";
            }else{
                
                $emalsatus="Unseen";
            }
            
            $html.='<tr><td>'.$i.'</td><td>'.$produtesh['subject'].'</td><td>'.$produtesh['sender_name'].'</td><td>'.$produtesh['recipient'].'</td><td>'.$produtesh['created_date'].'</td><td>'.$status.'</td><td>'.$emalsatus.'</td><td>'.$produtesh['email_open_datetime'].'</td></tr>';
         
         $i++;   
         

         
        }
        
        
        $html.='</table>';
        
        header('Content-Type:application/xls');
        header('Content-Disposition:attachment;filename=report.xls');
        echo $html;
        // die();
    
        
    }
    
    public function emailTrack(){
        
        if(isset($_GET["code"])){
            $date = date('Y-m-d H:i:s');
            
            $array = array('email_status' => $_GET["code"], 'emaistatus' => "0");
            
            $formArray['emaistatus'] = "1";
            $formArray['email_open_datetime'] =$date; 
            
            $this->db->where($array); 
            
            $this->db->update('mail_history',$formArray);
            
        }
        
    }

}
?>