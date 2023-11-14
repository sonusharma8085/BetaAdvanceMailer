<?php 

class SmtpDataController extends CI_Controller {
    public function __construct(){
        parent::__construct();
        // $this->load->model->
    }

    public function index(){
        $userid = $this->session->userdata('id');
        if(isset($_POST['submit'])){
            $formArray = array();
            $formArray['sname'] = $this->input->post('sendername');
            $formArray['username'] = $this->input->post('username');
            $formArray['password'] = $this->input->post('password');
            $formArray['select'] = $this->input->post('one');
            $formArray['host'] = $this->input->post('host');
            $formArray['port'] = $this->input->post('port');
            $formArray['userid'] = $userid;
            $this->db->insert('smtp',$formArray);
            $this->session->set_flashdata('success','Smtp added Succesfully!');
            redirect('SmtpController');
        }else{

            $datas = $this->db->get('smtp');
            $data['smtps'] = $datas->result();
            $this->load->view('smtdata',$data);
        }
    }

    function delete(){
        $id = $this->input->post('id');
        // print_r($this->input->post('id'));die();
        if($id != 000){
            // single delete
            $this->db->where('id',$id);
            $this->db->delete('smtp');
        }else{
            // all delete
            $this->db->truncate('smtp');
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

                      $inserdata[$i]['host'] = $value['A'];
                      $inserdata[$i]['port'] = $value['B'];
                      $inserdata[$i]['username'] = $value['C'];
                      $inserdata[$i]['password'] = $value['D'];
                      $inserdata[$i]['userid'] = $userid;
                      $i++;
                    }
                }               
                $result = $this->import->importData($inserdata);   
                if($result){
                    $this->session->set_flashdata('success1','Smtp uploded Succesfully!');
                    redirect('SmtpController');
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
            
            $this->load->view('smtp');
        }
    }

    
}

?>