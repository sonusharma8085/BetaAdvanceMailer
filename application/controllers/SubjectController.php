<?php 
class SubjectController extends CI_Controller
{
        public function index(){
            $userid = $this->session->userdata('id');
            if(isset($_POST['submit'])){
                $formArray = array();
                $formArray['subject'] = $this->input->post('subject');
                $formArray['userid'] = $userid;
                $this->db->insert('subjects',$formArray);

                $this->session->set_flashdata('success','Succesfully');

                redirect('SubjectController');

            }else if(isset($_POST['submit1'])){
                
                $this->load->model('Subjectmodel', 'subject');
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
                        if($value['A'] != ""){
                            $inserdata[$i]['subject'] = $value['A'];
                            $inserdata[$i]['userid'] = $userid;
                            $i++;
                        }
                    }     
                    if(isset($inserdata)){
                        $result = $this->subject->importData($inserdata);   
                    }else{
                        $this->session->set_flashdata('error1','more subjects not found!');
                        redirect('SubjectController');
                    }          
                    if($result){
                        $this->session->set_flashdata('success1','Subjects uploded Succesfully!');
                        redirect('SubjectController');
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
                $this->db->where('userid',$userid);
                $datas= $this->db->get('subjects');
                $data['subjecs'] = $datas->result();
        
                $this->load->view('subject',$data);

            }
        }

        function delete(){
            $id = $this->input->post('id');
            // print_r($this->input->post('id'));die();
            if($id != 000){
                // single delete
                $this->db->where('id',$id);
                $this->db->delete('subjects');
            }else{
                // all delete
                $this->db->truncate('subjects');
            }
        }


}


?>