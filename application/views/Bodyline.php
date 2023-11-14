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
        <div class="row">
            <div class="col-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Body Line</h4>
                        <form class="forms-sample" action="<?php echo base_url('BodylineController/store') ?>"
                            method="post" enctype="multipart/form-data">
                            <?php
                        $success = $this->session->userdata('success');
                        if($success!=""){?>
                            <div class="alert alert-success"><?php echo $success ?></div>
                            <?php } ?>
                            <div class="row d-flex">
                                <div class="form-group col-md-12">
                                    
                                    <textarea name="bodyline"></textarea>
                                    <!--<textarea name="bodyline" id="bodyLine" cols="30" rows="10"-->
                                    <!--    class="form-control"></textarea>-->
                                </div>
                            </div>
                            <button type="submit" name="submit" class="btn btn-sm mt-4 btn-primary">Submit</button>
                            <button class="btn btn-sm mt-4 btn-primary"><a
                                    href="<?php echo base_url('dashboard') ?>"></a>Cancel</button>
                        </form> 
                    </div>
                </div>
            </div>

            <div class="col-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add Body Line Data</h4>
                        <form class="forms-sample" action="<?php echo base_url('BodylineController/excelImport') ?>"
                            method="post" enctype="multipart/form-data">
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
                                    <a href="<?php echo base_url('')?>assets/file_format/bodyline.xlsx" id="btnExport"
                                        class="btn btn-primary">Download Sample file</a>
                                    <!-- <button class="btn btn-primary" id="btnExport" onClick="fnExcelReport()">Download Sample file</button> -->
                                    <input type="file" id="portid" class="form-control mt-4" name="uploadFile"
                                        placeholder="smtp Port" required>
                                </div>
                            </div>

                            <button type="submit" name="submit1" id="sbt"
                                class="btn btn-sm btn-primary mt-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 grid-margin stretch-card">
                <div class="card mt-4">
                    <div class="card-body">
                        <h4 class="card-title">Bulk Body Line Records <button onclick='return deleteFunc(000)'
                                style='float:right;' class='btn btn-sm btn-primary'>All Delete <i class="fa fa-trash"
                                    aria-hidden="true"></i></button></h4>
                        <br>
                        <div style='height:300px; overflow-y: auto; mt-5'>
                            <table class='table border  datatable'>
                                <thead class='thead-light' style='position: sticky; top:0;'>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Body line</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                if(!empty($bodyline)){
                                    foreach($bodyline as $key => $value){
                                        ?>
                                    <tr>
                                        <td><?php echo $key+1; ?></td>
                                        <td><?php echo $value->bodyline ?></td>
                                        <td><button class='btn btn-sm '
                                                onclick='return deleteFunc(<?php echo $value->id ?>)'><i
                                                    class="fa fa-trash" aria-hidden="true"></i></button></td>
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
<script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
<script>
        CKEDITOR.replace( 'bodyline' );
</script>
                
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
                    url: "<?php echo base_url()?>/BodylineController/delete",
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