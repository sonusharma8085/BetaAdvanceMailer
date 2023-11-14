<?php include('include/header.php'); 
    include('include/sidebar.php');
    include('connection.php')
  ?>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php 
  error_reporting(0);
   session_start();

  if (!isset($_SESSION['userid'])){
     echo "<script>location.href='login.php'</script>";
    //('location:login.php');
  }
  ?>

<!-- Main Sidebar Container -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">User Approval</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <!-- <a class="text-right" data-toggle="modal" data-target="#exampleModal" data-placement="top" title="Add" ><i class="material-icons">add</i></a> -->
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <table class="table table-striped text-center">
                    <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>User Name</th>
                        <th>Approval</th>
                        <th>Action</th>
                    </tr>
                    <?php 
                        $query = "SELECT * FROM admin";
                        $sql   = mysqli_query($conmailer,$query);
                        $i=1;
                        while($value = mysqli_fetch_array($sql)){
                    ?>
                    <tr>
                        <td>
                            <input type="hidden" name="hdnFromDate[<?php echo $value["id"] ?>]"
                                id='hdnFromDate[<?php echo $value["id"] ?>]' value='<?php echo $value["formdate"] ?>'>
                            <input type="hidden" name="hdnToDate[<?php echo $value["id"] ?>]"
                                id='hdnToDate[<?php echo $value["id"] ?>]' value='<?php echo $value["todate"] ?>'>
                            <?php echo $i; ?>
                        </td>
                        <td><input type="hidden" name="hdnName[<?php echo $value["id"] ?>]"
                                id='hdnName[<?php echo $value["id"] ?>]'
                                value='<?php echo $value["name"] ?>'><?php echo $value["name"] ?></td>
                        <td><?php echo $value["username"] ?></td>
                        <td><button data-bs-toggle="modal" data-bs-target="#exampleModal"
                                onclick='return openmodel(<?php echo $value["id"] ?>)' data-bs-whatever="@mdo"
                                class='btn'>edit</button></td>
                        <td>
                            <button onclick='return deleteFunc(<?php echo $value["id"] ?>)' class='btn'><i class="fa fa-trash" aria-hidden="true"></i></button>
                            
                        </td>
                    </tr>
                    <?php
                    $i++;
                    }
                    ?>
                </table>
            </div>
            
        </div><!-- /.container-fluid -->

        <br><br>
      
</div><!-- /.container-fluid -->

</section>
</div>
<!-- /.content -->
<!-- / model  -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header btn-gradient-primary" >
                    <h5 class="modal-title" id="exampleModalLabel">Access limit<span></span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="upprovalSubmit.php" method='post'>
                        <div class="mb-3">
                            <input type="hidden" name="hdnID" id='hdnID'>
                            <label for="recipient-name" class="col-form-label">User Name : <span id='userNamelbl'></span></label>
                            <br><label for="recipient-name" class="col-form-label">From Date:</label>
                            <input type="date" class="form-control" id="formDate" name='formDate' min="<?php echo date('Y-m-d') ?>">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">To Date:</label>
                            <input type="date" class="form-control" id="toDate" name='toDate' min="<?php echo date('Y-m-d') ?>">
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<script type="text/javascript">
// $('#myModal').on('shown.bs.modal', function() {
//     $('#myInput').trigger('focus')
// })
    function openmodel(id){
        $("#hdnID").val(id);
        $("#formDate").val($("#hdnFromDate\\["+id+"\\]").val());
        $("#toDate").val($("#hdnToDate\\["+id+"\\]").val());
        $("#userNamelbl").html($("#hdnName\\["+id+"\\]").val());
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
                    url: "upprovalSubmit",
                    data: {
                        id: id,
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
                    url: "userdelete.php",
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
<!-- /.content-wrapper -->
<?php include('include/footer.php'); ?>