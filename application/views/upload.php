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
</style>
<!-- partial -->
<div id="content" role="main" class="main">
    <div class="content container-fluid">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Upload Attachment</h4>
                        <form class="forms-sample mt-4" action="<?php echo base_url('UploadController') ?>"
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
                            <div class="row d-flex">
                                <div class="form-group col-md-6">
                                    <input type="file" class="form-control" name="image" placeholder="Sender Name"
                                        required>
                                </div>
                                <div class="col-md-2 mt">
                                    <button type="submit" name="submit" class="btn  btn-primary me-2"><i
                                            class="fa fa-upload" aria-hidden="true"></i>Upload </button>

                                </div>
                            </div>
                            <div class='row mt-5'>
                                <?php
                                    foreach($uploads as $key => $value){
                                         $arr = explode('.',$value->image);
                                        // print_r($arr[1]);die();
                                         if($arr[1] != "pdf" && $arr[1] != "csv" && $arr[1] != "xls" && $arr[1] != "xlsx"){
                                        ?>
                                            <div class='col-md-3 mb-3'>
                                                <div style="display: flex;">
                                                    <span>
                                                        <img src="<?php echo base_url('assets/uploads/'.$value->image); ?>" height='200px;'
                                                        width='200px;'>
                                                    </span>

                                                    <span style="" class='btn btn-sm' onclick='return deletefunc(<?php echo $value->id ?>)'><i  style="margin-left: -65px;" class="fa fa-trash tr-btn" aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                        <?php
                                        }else{
                                             ?>
                                            <div class='col-md-3 mb-2'>
                                                <iframe style='height:200px;width:200px;' src="<?php echo base_url('assets/uploads/'.$value->image); ?>" title="W3Schools Free Online Web Tutorials"></iframe>
                                                <span style="margin-top: -400px;margin-left: 180px;" class='btn btn-sm' onclick='return deletefunc(<?php echo $value->id ?>)'><i  style="margin-left: -50px;" class="fa fa-trash tr-btn" aria-hidden="true"></i></span>
                                                <!--<a target="_blank" href='<?php echo base_url('assets/uploads/'.$value->image); ?>' class='btn btn-sm btn-primary'>Download <?php echo $arr[1] ?></a>-->
                                            </div>
                                             <?php
                                        }
                                    }
                                ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <?php 
         $this->load->view('includes/footer');
         ?>
    <script>
    function deletefunc(id) {
       // alert(id);
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'post',
                    url: "<?php echo base_url()?>/UploadController/delete",
                    data: {
                        id: id
                    },
                }).done(function(res) {
                    var msg = "";
                    if (id == 000) {
                        var msg = 'all';
                    }
                    Swal.fire(
                        'Deleted!',
                        'Your ' + msg + ' smtp has been deleted.',
                        'success'
                    )
                    location.reload();
                })

            }
        })
    }
    </script>