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
.replace-file {
    justify-content: flex-end;
    display: flex;
    color: blue;
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


            <div class="col-md-12">
                <div class="d-flex">
                    <div class="card-body col-md-6">
                        <h4 class="card-title"><a href="<?php echo base_url('LiveCompaignController/addlive') ?>"><i class="fa fa-plus" aria-hidden="true"></i>Add Live</a></h4>
                    </div>
                    <div class="replace-file m-3 col-md-6">
                      <h5>Replace file : Disable | Send email again:Disable</h2>
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