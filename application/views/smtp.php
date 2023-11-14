<?php 
error_reporting(0);
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
                        <h4 class="card-title">Add SMTP  
                    <a target='_blanke' href="https://www.betaitsolution.com/emailserver.php">
                        <span class='btn btn-sm btn-primary'>Purchase Plan</span>        
                    </a>
                    </h4>
                        <form class="forms-sample" action="<?php echo base_url('SmtpController') ?>" method="post"
                            enctype="multipart/form-data">
                            <?php
                        $success = $this->session->userdata('success');
                        if($success!=""){?>
                            <div class="alert alert-success"><?php echo $success ?></div>
                            <?php } ?>
                            <div class="row d-flex mb-2">
                                <div class="form-group col-md-6">
                                    <label for="">Host</label>
                                    <input type="text" class="form-control" name="host" placeholder="smtp Host"
                                        required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Port</label>
                                    <input type="text" class="form-control" name="port" placeholder="smtp Port"
                                        required>
                                </div>
                            </div>
                            <div class="row d-flex">
                                <div class="form-group col-md-6">
                                    <label for="User Name">Username</label>
                                    <input type="text" class="form-control" name="username" placeholder="Username"
                                        required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="User Name">Replay Email</label>
                                    <input type="text" class="form-control" name="replayEmail" placeholder="Replay Email">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Password</label>
                                    <input type="text" class="form-control" name='password'>
                                </div>

                            </div>
                            <div class="row d-flex">


                            </div>

                            <button type="submit" name="submit" class="btn btn-sm btn-primary mt-2">Submit</button>
                            <button class="btn btn-sm btn-primary mt-2"><a
                                    href="<?php echo base_url('dashboard') ?>"></a>Cancel</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-4 grid-margin stretch-card mt-4">
                <div class="card mt-4">
                    <div class="card-body">
                        <h4 class="card-title">Add Bulk SMTP</h4>
                        <form class="forms-sample" action="<?php echo base_url('SmtpController/excelimport') ?>"
                            method="post" enctype="multipart/form-data">
                            <?php
                        $success1 = $this->session->userdata('success1');
                        if($success1!=""){?>
                            <div class="alert alert-success"><?php echo $success1 ?></div>
                            <?php } ?>

                            <div class="row d-flex">
                                <div class="form-group col-md-12 ">
                                    <a href="<?php echo base_url('')?>assets/file_format/SMTPID.xlsx" id="btnExport"
                                        class="btn btn-primary">Download Sample file</a>
                                    <!-- <button class="btn btn-primary" id="btnExport" onClick="fnExcelReport()">Download Sample file</button> -->
                                    <input type="file" id="portid" class="form-control mt-4" name="uploadFile"
                                        placeholder="smtp Port" required>
                                </div>
                                <table id="theTable" class="table table-bordered" style="display:none;">
                                    <thead>
                                        <tr class="header">
                                            <th>Smtp Host</th>
                                            <th>Smtp Port</th>
                                            <th>Emailid</th>
                                            <th>Password</th>
                                            <!-- <th>Status</th> -->
                                        </tr>
                                    </thead>
                                </table>
                            </div>

                            <button type="submit" name="submit1" id="sbt"
                                class="btn btn-primary me-2 btn-sm mt-2">Submit</button>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 grid-margin stretch-card">
                <div class="card mt-4">
                    <div class="card-body">
                        <h4 class="card-title">Bulk SMTP Records <button onclick='return deleteFunc(000)' style='float:right;' class='btn btn-sm btn-primary'>All Delete <i
                                class="fa fa-trash" aria-hidden="true"></i></button></h4>
                       <br>
                        <div style='height:300px; overflow-y: auto;mt-5'>
                            <table class='table border  datatable'>
                                <thead class='thead-light' style='position: sticky; top:0;'>
                                    <tr>
                                        <th>S.No</h>
                                        <th>Username</th>
                                        <th>SMTP Host</th>
                                        <th>SMTP Port</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                if(!empty($smtps)){

                                    foreach($smtps as $key => $value){
                                        ?>
                                    <tr>
                                        <td><?php echo $key+1; ?></td>
                                        <td><?php echo $value->username ?></td>
                                        <td><?php echo $value->host ?></td>
                                        <td><?php echo $value->port ?></td> 
                                        <td><button class='btn btn-sm ' onclick='return deleteFunc(<?php echo $value->id ?>)'><i class="fa fa-trash"
                                                    aria-hidden="true"></i></button></td>
                                    </tr>
                                    <?php
                                }
                               }else{
                                ?>
                                    <tr>
                                        <td>No SMTP Avalable</td>
                                    </tr>
                                    <?php
                            }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <script type="text/javascript">
    function deleteFunc(id) {
        // alert("function call done "+id);
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
                    url: "<?php echo base_url()?>/SmtpController/delete",
                    data: {
                        id: id
                    },
                }).done(function(res){
                    var msg = "";
                    if(id == 000){
                        var msg = 'all';
                    }
                    Swal.fire(
                            'Deleted!',
                            'Your '+msg+' smtp has been deleted.',
                            'success'
                        )
                        location.reload();
                    })
                    
            }
        })

       // return false;

    }

    function fnExcelReport() {
        $("#btnExport").hide();
        $("#sbt").show();
        $("#portid").show();
        var table = document.getElementById('theTable'); // id of table
        var tableHTML = table.outerHTML;
        var fileName = 'download.xls';

        var msie = window.navigator.userAgent.indexOf("MSIE ");

        // If Internet Explorer
        if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {
            dummyFrame.document.open('txt/html', 'replace');
            dummyFrame.document.write(tableHTML);
            dummyFrame.document.close();
            dummyFrame.focus();
            return dummyFrame.document.execCommand('SaveAs', true, fileName);
        }
        //other browsers
        else {
            var a = document.createElement('a');
            tableHTML = tableHTML.replace(/  /g, '').replace(/ /g, '%20'); // replaces spaces
            a.href = 'data:application/vnd.ms-excel,' + tableHTML;
            a.setAttribute('download', fileName);
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
        }
    }
    </script>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
    <?php 
         $this->load->view('includes/footer');
         ?>