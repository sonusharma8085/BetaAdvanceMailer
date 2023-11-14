<?php 
class BodylineController extends CI_Controller
{
    
    public function index(){
        $userid = $this->session->userdata('id');
            $this->db->where('user_id',$userid);
          $datas = $this->db->get('bodyline');
          $data['bodyline'] = $datas->result();
          $this->load->view('Bodyline',$data);
    }

    function excelImport(){
      $userid = $this->session->userdata('id');
      $this->load->model('BodylineImport', 'bodyline');
      $this->load->helper(array('html','form'));

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
              $inserdata[$i]['bodyline'] = $value['A'];
              $inserdata[$i]['user_id'] = $userid;
              $i++;
            }
          }        
          // print_r($inserdata);die();      
          if(isset($inserdata)){
            $result = $this->bodyline->importData($inserdata);
            if($result){
              $this->session->set_flashdata('success1','uploded Succesfully!');
                redirect('BodylineController');
            }else{
                echo "ERROR !";
            } 
          }else{
            $this->session->set_flashdata('error1','Data not found...!');
            redirect('BodylineController');
          }

    } catch (Exception $e) {
         die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
                  . '": ' .$e->getMessage());
      }
    }else{
        echo $error['error'];
      }
    }

    function store(){
      $bodyline  = $this->input->post('bodyline');
       $userid = $this->session->userdata('id');
      $data['bodyline'] = $bodyline;
      $data['user_id'] = $userid;
    //  print_r($bodyline);die();
      $result = $this->db->insert('bodyline',$data);
      if($result){
        $this->session->set_flashdata('success','Body line created Succesfully!');
        redirect('BodylineController');
      }else{
        echo "ERROR !";
      } 
    }

    function delete(){
      $id = $this->input->post('id');
      // print_r($this->input->post('id'));die();
      if($id != 000){
          // single delete
          $this->db->where('id',$id);
          $this->db->delete('bodyline');
      }else{
          // all delete
          $this->db->truncate('bodyline');
      }
  }

}

?>