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
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">ADD Group | Add Bulk Html</h4>
                        <form class="forms-sample" action="<?php echo base_url('HtmlController') ?>" method="post"
                            enctype="multipart/form-data">
                            <?php
                        $success = $this->session->userdata('success');
                        if($success!=""){?>
                            <div class="alert alert-success"><?php echo $success ?></div>
                            <?php } ?>
                            <div class="row d-flex">
                                <div class="form-group col-md-12">
                                    <label for="exampleInputPassword4">Html Code :</label>
                                    <textarea name="htmlCode" id="htmlCode" class='form-control' rows="10"></textarea>
                                </div>
                                <!-- <div class="form-group col-md-6 ">
                                    <label for="exampleInputPassword4">Date</label>
                                    <input type="date" class="form-control" name="date" placeholder="Date" required>
                                </div> -->

                            </div>
                            <!-- <div class="row d-flex">
                                <div class="form-group col-md-6">
                                    <label for="exampleInputPassword4">Currency</label>
                                    <input type="text" class="form-control" name="currency" placeholder="Currency"
                                        required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Product</label>
                                    <input type="text" id='product' name='product' class='form-control'
                                        placeholder="Product">
                                </div>
                            </div> -->
                            <div class="row d-flex">


                            </div>

                            <!-- <div class="row d-flex">
                                <div class="form-group col-md-6">
                                    <label for="">Price</label>
                                    <input type="text" class="form-control" name="price" placeholder="Price" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Tax</label>
                                    <input type="text" class="form-control" name="tax" placeholder="Tax" required>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="">Note</label>
                                    <input type="text" class="form-control" name="note" placeholder="Note" required>
                                </div>
                            </div> -->
                            <button type="submit" name="submit" class="btn btn-sm mt-4 btn-primary me-2">Submit</button>
                            <button class="btn btn-sm mt-4 btn-primary me-2"><a
                                    href="<?php echo base_url('dashboard') ?>"></a>Cancel</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- <div class="col-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add Bulk Html</h4>
                        <form class="forms-sample" action="<?php echo base_url('InvoiceController/excelimport') ?>"
                            method="post" enctype="multipart/form-data">
                            <?php
                        $success1 = $this->session->userdata('success1');
                        if($success1!=""){?>
                            <div class="alert alert-success"><?php echo $success1 ?></div>
                            <?php } ?>
                            <?php
                        $success1 = $this->session->userdata('error1');
                        if($error1!=""){?>
                            <div class="alert alert-success"><?php echo $error1 ?></div>
                            <?php } ?>

                            <div class="row d-flex">
                                <div class="form-group col-md-12 ">
                                    <a href="<?php echo base_url('')?>assets/file_format/invoce.xlsx" id="btnExport"
                                        class="btn btn-primary">Download Sample file</a>
                                    <input type="file" id="portid" class="form-control mt-4" name="uploadFile"
                                        placeholder="smtp Port" required>
                                </div>
                               
                            </div>

                            <button type="submit" name="submit1" id="sbt"
                                class="btn btn-gradient-primary me-2">Submit</button>

                        </form>
                    </div>
                </div>
            </div> -->
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Bulk Html Records<button onclick='return deleteFunc(000)'
                                style='float:right;' class='btn btn-sm  btn-primary'>All Delete <i class="fa fa-trash"
                                    aria-hidden="true"></i></button></h4>
                        <div style='height:300px; overflow-y: auto;' class='mt-4'>
                            <table class='table border  datatable'>
                                <thead class='btn-gradient-primary' style='position: sticky; top:0;'>
                                    <tr>
                                        <th>S.No</h>
                                        <th>Html</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                if(!empty($html)){

                                    foreach($html as $key => $value){
                                        $newDate = date("d-m-Y", strtotime($value->date));
                                        ?>
                                    <tr>
                                        <td><?php echo $key+1; ?></td>
                                        <td><?php echo $value->htmlcode ?></td>
                                        <td><button class='btn btn-sm '
                                                onclick='return deleteFunc(<?php echo $value->id ?>)'><i
                                                    class="fa fa-trash" aria-hidden="true"></i></button></td>
                                    </tr>
                                    <?php
                                }
                               }else{
                                ?>
                                    <tr>
                                        <td>No Html Avalable</td>
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
                    url: "<?php echo base_url()?>/HtmlController/delete",
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