<?php 
    $this->load->view('includes/header');
    $this->load->view('includes/sidebar');
?>

<!-- partial -->
<div id="content" role="main" class="main">
    <div class="content container-fluid">
        <div class="page-header">
            <h3 class="page-title">Email Access </h3>
        </div>
        <div class="row">
            <?php
                $success = $this->session->flashdata('success');
                if($success!=""){?>
            <div class="alert alert-success"><?php echo $success ?></div>
            <?php } ?>
            <?php
                $error = $this->session->flashdata('error');
                if($error!=""){?>
            <div class="alert alert-danger"><?php echo $error ?></div>
            <?php } ?>
            <div class="col-md-12 grid-margin stretch-card">
                <form action="<?php echo base_url('CompaignController/sendMail')?>" class="w-100" method="post">
                    <div class="row d-flex ml-3">
                        <div class='form-group col-md-9'
                            style="background-color: #fff;padding: 20px;margin-left: 25px;">
                            <div class="row">
                                <div class='col-md-6'>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="bodyLine"
                                            name='bodyLine' >
                                        <label class="form-check-label" for="bodyLine">
                                            Body Line
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="html" name='html'>
                                        <label class="form-check-label" for="html">
                                            Html
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""  id="invoice"
                                            name='invoice'>
                                        <label class="form-check-label" for="invoice">
                                            Invoice
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="attechment"
                                            name='attechment' >
                                        <label class="form-check-label" for="attechment">
                                            Attechment
                                        </label>
                                    </div>
                                </div>
                                        <div class='col-md-3'>
                                            <lebel>Enter Mail Skip Time</lebel>
                                            <input type='text' id='skipTime' name='skipTime' placeholder='Enter time in seccond' class='form-control'/>
                                        </div>
                                <div class='col-md-3 lodergif' style="margin-bottom: -98px;display:none;">
                                    <img src="<?php echo base_url()?>assets/images/200w.gif" alt="" srcset="">
                                </div>
                            </div>

                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary submitBtn btn-sm"><i
                                            class="fa fa-envelope" aria-hidden="true"></i> Send Mail</button>
                                    <button type="submit" class="btn btn-danger submitBtn btn-sm"><i
                                            class="fa fa-envelope" aria-hidden="true"></i> Stop </button>
                                    <button type="submit" class="btn btn-success submitBtn btn-sm"><i
                                            class="fa fa-envelope" aria-hidden="true"></i> Resend Mail </button>
                                </div>
                            </div>
                            <!--<div class='col-md-10'>-->
                            <!--    <br>-->
                            <!--    <div class="progress" style="height: 20px;">-->
                            <!--        <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: <?php echo $process ?>; color:black;" aria-valu enow="2" aria-valuemin="100%" aria-valuemax="100%"><?php echo $process ?> </div>-->
                            <!--    </div>-->
                            <!--    <br>    -->
                            <!--</div>-->
                        </div>
                    </div>
                </form>

            </div>
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Mail Send History &nbsp;&nbsp;&nbsp; 
                        
                            <a href="<?php echo base_url('CompaignController/exportCsv') ?>" style='float:right;' class='btn btn-primary btn-sm' > Export <i class="fa fa-file-excel-o" aria-hidden="true"></i></a>
                            <!--<button onclick='return exportToexcel()' style='float:right;' class='btn btn-primary btn-sm'>Export <i class="fa fa-file-excel-o" aria-hidden="true"></i></button>-->
                            <button onclick='return deleteFunc(000)' style='float:right;' class='btn btn-primary btn-sm'>Clear history <i class="fa fa-trash" aria-hidden="true"></i></button>
                        </h4>
                        <br>
                        <div style='height:300px; overflow-y: auto; mt-5'>
                            <table class='table table-borderless table-thead-bordered table-nowrap table-align-middle card-table' id='tableCompany'>
                                <thead class='thead-light' style='position: sticky; top:0;'>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Sender Name</th>
                                        <th>Subject</th>
                                        <th>Recipient Name</th>
                                        <th>Date Time</th>
                                        <th>Status</th>
                                        <th>Email Send Status</th>
                                        <th>Email Open time</th>
                                        <!-- <th>Action</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                if(!empty($history)){
                                    foreach($history as $key => $value){
                                        ?>
                                    <tr>
                                        <td><?php echo $key+1; ?></td>
                                        <td><?php echo $value->sender_name ?></td>
                                        <td><?php echo $value->subject ?></td>
                                        <td><?php echo $value->recipient ?></td>
                                        <td><?php echo $value->created_date ?></td>
                                        <td><?php echo ($value->status == 1) ?  '<b><span style="color:green;">Success</span></b>' : '<b><span style="color:red;">Failed</span></b>'  ?>
                                        </td>
                                         <td class="text-center"><?php echo ($value->emaistatus == 1) ?  '<b><span style="color:green;">Seen</span></b>' : '<b><span style="color:red;">unseen</span></b>'  ?>
                                        </td>
                                        <td><?php echo $value->email_open_datetime ?></td>
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

    <!-- content-wrapper ends -->
    <?php 
        $this->load->view('includes/footer');
    ?>
    <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
 

   <script src="https://gitcdn.xyz/repo/FuriosoJack/TableHTMLExport/v1.0.0/src/tableHTMLExport.js"></script>
    <script>
    $(document).ready(function() {
        $(".submitBtn").click(function() {
            
            if($("#bodyLine").prop('checked') == false && $("#html").prop('checked') == false && $("#invoice").prop('checked') == false && $("#attechment").prop('checked') == false){
                Swal.fire(
                  //  'Message',
                    'Select one any mailing option',
                 //   'warning' 
                )
            return false;
            }   
            $('.lodergif').css('display', 'block');
        })
    })
        
    function sendMaile(){
        
    }
    
    // function exportToexcel(){
    //     alert();
    //     $("#tableCompany").tableHTMLExport({
    //         type:'csv',
    //         filename:'codehim-html-table-to-excel.csv',
    //     });
    // }

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
                    url: "<?php echo base_url()?>/CompaignController/delete",
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
                        'Your ' + msg + ' History has been deleted.',
                        'success'
                    )
                    location.reload();
                })

            }
        })

        // return false;

    }
    </script>