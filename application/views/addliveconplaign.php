<?php 
$this->load->view('includes/header');
$this->load->view('includes/sidebar');

?>
<style>
input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    margin: 0;
}
select.form-control {
    height: 40px!important;
}
</style>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <!-- <div class="page-header">
              <h3 class="page-title"> Form elements </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Forms</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Form elements</li>
                </ol>
              </nav>
            </div> -->
        <div class="row">


            <div class="col-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add To Live</h4>
                        <form class="forms-sample mt-4" action="<?php echo base_url('LiveCompaignController/addlive') ?>"
                            method="post" enctype="multipart/form-data">
                            <?php
                        $success = $this->session->userdata('success');
                        if($success!=""){?>
                            <div class="alert alert-success"><?php echo $success ?></div>
                            <?php } ?>
                            <?php
                        $failure = $this->session->userdata('failure');
                        if($failure!=""){?>
                            <div class="alert alert-warning"><?php echo $failure ?></div>
                            <?php } ?>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <select name="seletc" class="form-control">
                                        <option value="">Select</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row d-flex">
                                <div class="form-group col-md-6">
                                    <select name="totakhrs" class="form-control">
                                        <option value="">Total Hours</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <select name="groups" class="form-control">
                                        <option value="">Smtp Groups</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row d-flex">
                                <div class="form-group col-md-6">
                                    <select name="startafter" class="form-control">
                                        <option value="">Start After</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <select name="bcc" class="form-control">
                                        <option value="Send Bcc">Send Bcc</option>
                                        <option value="Send Cc">Send Cc</option>
                                    </select>
                                </div>
                            </div>


                            <button type="submit" name="submit" class="btn btn-gradient-primary me-2">Submit </button>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">List Compaign</h4>
                        <table class="table table-bordered table-stripped">
                           
                            <tr>
                                <?php 
                                    if(!empty($livedata)){
                                ?>
                                <td class="text-center"><?php echo $livedata[0]['username'] ?></td>
                                <?php } ?>
                            </tr>
                        </table>
                        
                    </div>
                </div>
            </div>






        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
    <?php 
         $this->load->view('includes/footer');
         ?>