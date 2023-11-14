<?php 
    $this->load->view('includes/header');
    $this->load->view('includes/sidebar');


?>
      <!-- partial -->

        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Live Table </h3>
              <!-- <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Forms</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Form elements</li>
                </ol>
              </nav> -->
            </div>
            <div class="row">
                <?php
                    $success = $this->session->userdata('success');
                    if($success!=""){?>
                    <div class="alert alert-success"><?php echo $success ?></div>
                    
                <?php } ?>
              <div class="col-md-12 grid-margin stretch-card">
                  
                  <table class="table table-bordered table-striped">
                <tr>
                    <td>Action</td>
                    <td>Description</td>
                </tr>
                <tr>
                   
                    <td class="col-md-7"> 
                        <form action="<?php echo base_url('SettingController/saverecord') ?>" method="post">
                            <div class="col-md-10 d-flex">
                            <input type="text" name="licence" placeholder="Enter Licence" class="form-control" value="<?php echo $results[0]['licence_number'] ?>" autocomplete="off">
                       
                            <button type="submit" class="btn btn-primary">Add Licence</button>
                            </div>
                        </form>
                        
                    </td>
                </tr>
                <tr>
                    <td>Test in Mode: &nbsp;<a href="#">Disable</a> </td>
                </tr>
                <tr>
                    <td>Tracking: &nbsp;<a href="#">Enable</a> </td>
                </tr>
                <tr>
                    <td>Marketing Rules: &nbsp;<a href="#">Enable</a> </td>
                </tr>
                <tr>
                    <td>Unsespender Link: &nbsp;<a href="#">Enable</a> </td>
                </tr>
                <tr>
                    <td>Set Random Image: &nbsp;<a href="#">Disable</a> </td>
                </tr>
                <tr>
                    <td>Image Convert Small Size: &nbsp;<a href="#">Disable</a> </td>
                </tr>
                <tr>
                    <td>Link Url Random: &nbsp;<a href="#">Disable</a> </td>
                </tr>
               </table>
              </div>
            
              
             

            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
        <?php 
            $this->load->view('includes/footer');
        ?>