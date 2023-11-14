<?php 
 include('connection.php');
 include('include/header.php'); 
 include('include/sidebar.php');
  error_reporting(0);
  session_start();

  if (!isset($_SESSION['userid'])){
     echo "<script>location.href='login.php'</script>";
  }
  ?>
 <?php 
    if (isset($_POST['submit'])) {
      $taps      =  $_POST['taps'];
      $sql = "INSERT INTO `taps`( `taps`) VALUES ('$taps')";
      $mysql = mysqli_query($conn,$sql);
       if ($mysql==true) {
         echo '<script type="text/javascript">alert("Succesfully Data Inserted")</script>';
         echo "<script>location.href='taps.php'</script>";
       }else{
         header('location:taps.php');
         echo '<script type="text/javascript">alert("Data not Inserted")</script>';
        }
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
            <h1 class="m-0">Taps</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <a href="user_data6_download.php" class="btn btn-primary" target="_blank">Data Export</a>
              <a class="text-right" data-toggle="modal" data-target="#exampleModal" data-placement="top" title="Add" ><i class="material-icons">add</i></a>
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
          <table class="table table-striped text-center table-bordered" >
              <tr>
                 <td>SNo.</td>
                 <td>Taps</td>
                 <td>Status</td>
                 <td>Action</td>
             </tr>
                <?php
                 $query = "SELECT * FROM taps";
                 $sql   = mysqli_query($conn,$query);
                 while($row = mysqli_fetch_array($sql)){
                ?>
             <tr class="text-center">
                <td><?php echo $row["id"]; ?></td>
                <td><?php echo $row["taps"]; ?></td>
                <?php 
                    if($row["stats"]==1){ ?>
                    
                <td><input type="checkbox" id ="checkbox" checked  value="<?php echo $row["stats"]; ?>" onclick="myFunction(0,<?php echo $row['id'] ?>)"></td>
                
                <?php }else{ ?>
                
                <td><input type="checkbox" id ="checkbox"   value="<?php echo $row["stats"]; ?>" onclick="myFunction(1,<?php echo $row['id'] ?>)"></td>
                
                <?php } ?>
                                              
                <td><a data-toggle="tooltip" id ="checkbox" data-placement="top" title="update" href="taps_update.php?id=<?php echo $row["id"]; ?>"><i class='far fa-edit' ></i></a>       
                  <!--<a data-toggle="tooltip" data-placement="top" title="delete" href="taps_delete.php?id=<?php echo $row["id"]; ?>"><i class='far fa-trash-alt' ></i></a>-->
                </td>
             </tr>
             <?php } ?>
           </table>
       </div>
<!-- /.row -->
<!-- Main row -->
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalLabel">Taps</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
        <div class="row">
          <div class="container">

            <form action="" method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="col-sm-6">
                  <label>Taps :-</label>
                  <input type="text" name="taps" required="" placeholder="Enter Taps"></input>
                </div>
                
              </div>
              
              <br>
              <button type="submit" name="submit" class="btn btn-primary ">Submit</button>
            </form>

          </div>
        </div>
      </div>

    </div>
  </div>
</div>
<!-- /.row (main row) -->
</div>
<!-- /.container-fluid -->

<br><br>
</div>
<!-- Button trigger modal -->
<!-- /.row (main row) -->
 </div>
<!-- /.container-fluid -->
</section>
</div>
<!-- /.content -->

  <script type="text/javascript">
    $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
  </script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script>
  
  function myFunction(st,id) {
  //alert(st);
      $.ajax({
        url:  "tapsselect.php",
        type: "POST",
        cache: false,
        data:{  st: st, id: id  },
        success: function(data){
            if(data="success"){
                
            swal({
            // title: "Good job!",
            text: "Succesfully Update!",
            icon: "success",
            button: "Okay, Done!",
            });
            }
          //$('#checkbox').html(checkbox); 
        }
     });
  
}



  </script>
  
  <!-- /.content-wrapper -->
  <?php include('include/footer.php'); ?>
  