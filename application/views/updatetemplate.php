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


            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Update Template</h4>
                        <form class="forms-sample mt-4" action="<?php echo base_url('UpdatetemplateController') ?>"
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
                                    <?php 
                                        if(!empty($temdata)){
                                    ?>
                                    <input type="text" class="form-control" name="invoice" placeholder="Invoice" value="<?php  echo $temdata[0]['invoice'] ?>">
                                    <?php }else{ ?>
                                    <input type="text" class="form-control" name="invoice" placeholder="Invoice" >

                                        <?php } ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                <?php 
                                        if(!empty($temdata)){
                                    ?>
                                    <textarea name="content" class="form-control" cols="133" rows="10" placeholder="Enter Content" value="<?php  echo $temdata[0]['template'] ?>"> <?php  echo $temdata[0]['template'] ?></textarea>
                                    <?php }else{ ?>
                                        <textarea name="content" class="form-control" cols="133" rows="10" placeholder="Enter Content" ></textarea>


                                        <?php } ?>
                                </div>
                            </div>

                            <button type="submit" name="submit" class="btn btn-gradient-primary me-2">Submit </button>

                        </form>
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