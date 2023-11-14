<?php 
    $this->load->view('includes/header');
?>

<?php 
    $this->load->view('includes/sidebar');
?>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Template </h3>

        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <form class="form-sample" action="<?php echo base_url('CompaignController/template') ?>"
                            method="post">

                            <?php
                    $success = $this->session->userdata('success');
                    if($success!=""){?>
                            <div class="alert alert-success"><?php echo $success ?></div>

                            <?php } ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <Textarea cols="133" rows="2" class="form-control" name="text1"
                                                required></Textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <Textarea cols="133" rows="1" class="form-control" name="text2"
                                                required></Textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">First Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="fname" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Last Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="lname" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <Textarea placeholder="Google Analytics" cols="133" rows="2"
                                                class="form-control" name="ganylisy" required></Textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <Textarea cols="133" rows="15" class="form-control" name="template"
                                                required></Textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>




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