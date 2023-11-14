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
                        <!-- <h4 class="card-title">ADD Group | Add Bulk Html</h4> -->
                        <form class="forms-sample" action="<?php echo base_url('ClientQueryController/store') ?>"
                            method="post" enctype="multipart/form-data">
                            <?php
                            $success = $this->session->userdata('success');
                            if($success!=""){?>
                            <div class="alert alert-success"><?php echo $success ?></div>
                            <?php } ?>
                            <div class="row d-flex">
                                <div class="form-group col-md-12">
                                    <label for="exampleInputPassword4">Query :</label>
                                    <textarea name="query" id="query" class='form-control' rows="5"></textarea>
                                </div>
                            </div>
                            <button type="submit" name="submit" class="btn btn-sm mt-4 btn-primary me-2">Submit</button>
                            <button class="btn btn-sm mt-4 btn-primary me-2"><a
                                    href="<?php echo base_url('dashboard') ?>"></a>Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Client Query
                        </h4>
                        <!-- <br> -->
                        <div style='height:300px; overflow-y: auto;' class='mt-4'>
                            <table class='table border  datatable'>
                                <thead class='btn-gradient-primary' style='position: sticky; top:0;'>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Query</th>
                                        <th>Answer</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                if(!empty($clientquery)){
                                    
                                    foreach($clientquery as $key => $value){
                                        $sno = $key+1;
                                        ?>
                                    <tr>
                                        <td>

                                            <?php echo $sno; ?></td>
                                        <td><?php echo $value->query ?></td>
                                        <td><?php echo $value->answer ?></td>
                                        <td><?php echo $value->querydate ?></td>
                                        <td>
                                            <button onclick='return deleteFunc(<?php echo $value->id ?>)' class='btn'><i
                                                    class="fa fa-trash" aria-hidden="true"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php
                                }
                               }else{
                                   ?>
                                    <tr>
                                        <td>No Query Avalable</td>
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
    <!-- Button trigger modal -->
    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Open modal for @mdo</button> -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header btn-gradient-primary">
                    <h5 class="modal-title" id="exampleModalLabel">Access limit <span></span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action='<?php echo base_url("UserApproval/access") ?>' method='post'>
                    <div class="modal-body">
                        <div class="mb-3">
                            <input type="hidden" name="hdnID" id='hdnID'>
                            <label for="recipient-name" class="col-form-label">User Name : <span
                                    id='userNamelbl'></span></label>
                            <br><label for="recipient-name" class="col-form-label">From Date:</label>
                            <input type="date" class="form-control" id="formDate" name='formDate'
                                min="<?php echo date('Y-m-d') ?>">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">To Date:</label>
                            <input type="date" class="form-control" id="toDate" name='toDate'
                                min="<?php echo date('Y-m-d') ?>">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name='chekApprov' id="chekApprov">
                            <label class="form-check-label" for="chekApprov">
                                Access approve
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-gradient-primary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-gradient-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Button trigger modal -->
    <script type="text/javascript">
    $(document).ready(function() {
        $('#myModal').on('shown.bs.modal', function() {
            // alert("gfdg");
            $('#myInput').trigger('focus')
        })
    })


    function openmodel(id) {
        $("#hdnID").val(id);
        $("#formDate").val($("#hdnFromDate\\[" + id + "\\]").val());
        $("#toDate").val($("#hdnToDate\\[" + id + "\\]").val());
        $("#userNamelbl").html($("#hdnName\\[" + id + "\\]").val());
    }

    function approv(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to this user login access!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, access it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'post',
                    url: "<?php echo base_url()?>/UserApproval/access",
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
                    url: "<?php echo base_url()?>/SubjectController/delete",
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

        //  return false;

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