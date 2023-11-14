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
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data</h4>
                        <form class="forms-sample" action="<?php echo base_url('SmtpdataController') ?>" method="post"
                            enctype="multipart/form-data">
                            <?php
                        $success = $this->session->userdata('success');
                        if($success!=""){?>
                            <div class="alert alert-success"><?php echo $success ?></div>
                            <?php } ?>
                            <div class="row d-flex">
                                <div class="form-group col-md-12">
                                    <input type="text" name="name" placeholder="Enter Name" required
                                        class="form-control">
                                </div>
                                <div class="form-group col-md-12">
                                    <input type="email" name="email" placeholder="Enter Email" required
                                        class="form-control">
                                </div>
                            </div>
                            <button type="submit" name="submit" class="btn btn-gradient-primary me-2">Submit</button>
                            <button class="btn btn-secondary"><a
                                href="<?php echo base_url('dashboard') ?>">Cancel</a></button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add Bulk Data</h4>
                        <form class="forms-sample" action="<?php echo base_url('SmtpdataController') ?>" method="post"
                            enctype="multipart/form-data">
                            <?php
                        $success1 = $this->session->userdata('success1');
                        if($success1!=""){?>
                            <div class="alert alert-success"><?php echo $success1 ?></div>
                            <?php } ?>
                            <?php
                        $success1 = $this->session->userdata('error1');
                        if($success1!=""){?>
                            <div class="alert alert-danger"><?php echo $error1 ?></div>
                            <?php } ?>

                            <div class="row d-flex">
                                <div class="form-group col-md-12">
                                    <a href="<?php echo base_url('')?>assets/file_format/DATA.xlsx" id="btnExport"
                                        class="btn btn-primary">Download Sample file</a>
                                    <!-- <button class="btn btn-primary" id="btnExport" onClick="fnExcelReport()">Download Sample file</button> -->
                                    <input type="file" id="portid"   class="form-control mt-4"
                                        name="uploadFile" placeholder="smtp Port" required>
                                </div>
                            </div>

                            <button  type="submit" name="submit1" id="sbt" class="btn btn-gradient-primary me-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Bulk Data Records</h4>
                        <div style='height:300px; overflow-y: auto;'>
                            <table class='table border  datatable'>
                                <thead class='btn-gradient-primary' style='position: sticky; top:0;'>
                                    <tr>
                                        <th>S.No</h>
                                        <th>Name</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                if(!empty($smtpdata)){

                                    foreach($smtpdata as $key => $value){
                                        ?>
                                    <tr>
                                        <td><?php echo $key+1; ?></td>
                                        <td><?php echo $value->name ?></td>
                                        <td><?php echo $value->email ?></td>
                                    </tr>
                                    <?php
                                }
                               }else{
                                ?>
                                    <tr>
                                        <td>No Record Avalable</td>
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