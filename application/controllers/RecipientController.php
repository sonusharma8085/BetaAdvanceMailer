<?php 

class RecipientController extends CI_Controller {


    public function index(){
        $userid = $this->session->userdata('id');
        if(isset($_POST['submit'])){
            $formArray = array();
            $formArray['recipient'] = $this->input->post('recipientname');
            $formArray['recipientname'] = $this->input->post('recipname');
            $formArray['cname'] = $this->input->post('cname');
            $formArray['number'] = $this->input->post('recipnumber');
             $formArray['userid'] = $userid;
            $this->db->insert('recipient',$formArray);
            $this->session->set_flashdata('success','Recipient added Succesfully!');
            redirect('recipient');
        }else{
            $userid = $this->session->userdata('id');
            $this->db->where('userid',$userid);
            $datas = $this->db->get('recipient');
            $data['recipient'] = $datas->result();
            $this->load->view('recipient',$data);
        }
    }

    public function excelimport(){

        $userid = $this->session->userdata('id');
        $this->load->model('Import_model', 'import');
        $this->load->helper(array('url','html','form'));
        if(isset($_POST['submit1'])){
          
            $path = 'assets/uploads/';
            require_once APPPATH . "/third_party/PHPExcel.php";
            $config['upload_path'] = $path;
            $config['allowed_types'] = 'xlsx|xls|csv';
            $config['remove_spaces'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);            
            if (!$this->upload->do_upload('uploadFile')) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $data = array('upload_data' => $this->upload->data());
            }
            if(empty($error)){
              if (!empty($data['upload_data']['file_name'])) {
                $import_xls_file = $data['upload_data']['file_name'];
            } else {
                $import_xls_file = 0;
            }
            $inputFileName = $path . $import_xls_file;
            try {
                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                // $len = isset($cOTLdata['char_data']) ? count($cOTLdata['char_data']) : 0;
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                
                $objPHPExcel = $objReader->load($inputFileName);
                $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
                $flag = true;
                $i=0;
                foreach ($allDataInSheet as $value) {
                  if($flag){
                    $flag =false;
                    continue;
                  }
                  if($value['A'] != ""){

                      $inserdata[$i]['recipientname'] = $value['A'];
                      $inserdata[$i]['recipient'] = $value['B'];
                      $inserdata[$i]['cname'] = $value['C'];
                      $inserdata[$i]['number'] = $value['D'];
                      $inserdata[$i]['userid'] = $userid;
                      
                      $i++;
                    }
                }               
                // $result = $this->import->importData($inserdata);  
                $result = $this->db->insert_batch('recipient',$inserdata); 
                if($result){
                    $this->session->set_flashdata('success1','Recipient uploded Succesfully!');
                    redirect('recipient');
                }else{
                  echo "ERROR !";
                }             
  
          } catch (Exception $e) {
               die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
                        . '": ' .$e->getMessage());
            }
          }else{
              echo $error['error'];
            }
             


        }else{
            
            $this->load->view('recipient');
        }
    }

    function delete(){
        $id = $this->input->post('id');
        // print_r($this->input->post('id'));die();
        if($id != 000){
            // single delete
            $this->db->where('id',$id);
            $this->db->delete('recipient');
        }else{
            // all delete
            $this->db->truncate('recipient');
        }
    }

    
}

?>