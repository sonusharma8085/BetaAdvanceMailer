<?php 

class InvoiceController extends CI_Controller {
    public function __construct(){
        parent::__construct();
        // $this->load->model->
    }

    public function index(){
        $userid = $this->session->userdata('id');
        $path = 'assets/invoice/';
        if(isset($_POST['submit'])){
            

            $config['upload_path']          = $path;
            $config['allowed_types']        = '*';
            $config['max_size']             = 100;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;
            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('images'))
            {
                $error = array('error' => $this->upload->display_errors());
           //  print_r($error);die();
                redirect('InvoiceController');
            }
            else
            {
                $data = array('upload_data' => $this->upload->data());
                $logoName = $data['upload_data']['file_name'];
            }
           
            $formArray = array();
            $formArray['invoiceno'] = $this->input->post('invNo');
            $formArray['date'] = $this->input->post('date');
            $formArray['currency'] = $this->input->post('currency');
             $formArray['company_name'] = $this->input->post('compaName');
              $formArray['customer_name'] = $this->input->post('cusName');
            $formArray['product'] = $this->input->post('product');
             $formArray['quntity'] = $this->input->post('qty');
            $formArray['tax'] = $this->input->post('tax');
            $formArray['price'] = $this->input->post('price');
            $formArray['note'] = $this->input->post('note');
            $formArray['userid'] = $userid;
            $formArray['logo'] = $logoName;
            
             // print_r($formArray);die();
            $this->db->insert('invoice',$formArray);
            $this->session->set_flashdata('success','Invoice added Succesfully!');
            redirect('InvoiceController');
        }else{
            $userid = $this->session->userdata('id');
            $this->db->where('userid',$userid);
            $datas = $this->db->get('invoice');
            $data['invoice'] = $datas->result();
            $this->load->view('invoice',$data);  
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
                if(!empty($data['upload_data']['file_name'])) {
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

                      $inserdata[$i]['invoiceno'] = $value['A'];
                      $inserdata[$i]['date'] = $value['B'];
                      $inserdata[$i]['currency'] = $value['C'];
                      $inserdata[$i]['product'] = $value['D'];
                      $inserdata[$i]['price'] = $value['E'];
                      $inserdata[$i]['note'] = $value['F'];
                      $inserdata[$i]['tax'] = $value['G'];
                      $inserdata[$i]['userid'] = $userid;
                      $i++;
                    }
                } 
                if(isset($inserdata)){
                    $result = $this->import->importInvoiceData($inserdata);   
                    if($result){
                        $this->session->set_flashdata('success1','Invoice uploded Succesfully!');
                        redirect('InvoiceController');
                    }else{
                        echo "ERROR !";
                    }
                }else{
                    $this->session->set_flashdata('error1','Deta Not found!');
                    redirect('InvoiceController');
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

    function delete(){
        $id = $this->input->post('id');
        // print_r($this->input->post('id'));die();
        if($id != 000){
            // single delete
            $this->db->where('id',$id);
            $this->db->delete('invoice');
        }else{
            // all delete
            $this->db->truncate('invoice');
        }
    }

    
}

?>