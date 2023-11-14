<?php 
class SenderController extends CI_Controller
{
    public function index(){
        $userid = $this->session->userdata('id');
        if(isset($_POST['submit'])){
            $formArray = array();
            $formArray['sendername'] = $this->input->post('sendname');
            $formArray['userid'] = $userid;
            $this->db->insert('sender',$formArray);

            $this->session->set_flashdata('success','Succesfully');

            redirect('SenderController');
            


        }else  if(isset($_POST['submit1'])){
            
            $this->load->model('Sendermodel', 'sender');
            $this->load->helper(array('url','html','form'));

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
                    $inserdata[$i]['sendername'] = $value['A'];
                    $inserdata[$i]['userid'] = $userid;
                    $i++;
                }               
                $result = $this->sender->importData($inserdata);   
                if($result){
                    $this->session->set_flashdata('success1','uploded Succesfully!');
                    redirect('SenderController');
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
            $userid = $this->session->userdata('id');
            $this->db->where('userid',$userid);
            $datas = $this->db->get('sender');
            $data['sender'] = $datas->result();
            
            $this->load->view('sender',$data);

        }
    }

    function delete(){
        $id = $this->input->post('id');
        // print_r($this->input->post('id'));die();
        if($id != 000){
            // single delete
            $this->db->where('id',$id);
            $this->db->delete('sender');
        }else{
            // all delete
            $this->db->truncate('sender');
        }
    }
    
}


?>