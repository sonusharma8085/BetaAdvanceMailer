 <?php include('include/header.php'); 
    include('include/sidebar.php');
  ?>
<?php 
  error_reporting(0);
   session_start();

  if ($_SESSION['userid'] == ""){
     echo "<script>location.href='login.php'</script>";
    //('location:login.php');
  }
  ?>
  <?php 
    
    if (isset($_POST['submit'])) {
      //print_r($_FILES);die();

      $address      =  $_POST['address'];
      $email        =  $_POST['email'];
      $contact       =  $_POST['contact'];
      // $photo = $_FILES['image'];

      // $file        =  $photo['name'];
      // $filepath    =  $photo['tmp_name'];
      // $filerror   =  $photo['error'];
      

      // $destfile   = 'upload/'.$file;

      // move_uploaded_file($filepath, $destfile);


    $sql = "INSERT INTO `contact_us`(`address`, `email`, `contact`) VALUES ('$address','$email','$contact')";

     $mysql = mysqli_query($conn,$sql);
   // print_r($sql);die();
   if ($mysql==true) {
   // header('location:webdesign_develpoment.php');
    echo '<script type="text/javascript">alert("Succesfully Data Inserted")</script>';
     echo "<script>location.href='index.php'</script>";
    }else{

       // header('location:index.php');
    echo '<script type="text/javascript">alert("Data not Inserted")</script>';
     echo "<script>location.href='index.php'</script>";
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
            <h1 class="m-0">Contact Us</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <a href="user_data4_download.php" class="btn btn-primary" target="_blank">Data Export</a>
              <a class="text-right" data-toggle="modal" data-target="#exampleModal" data-placement="top" title="Add" ><i class="material-icons">add</i></a>
          <!--  </ol>-->
          <!--</div>-->
          <!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">

          
          <table class="table table-striped text-center table-bordered">
            
            <tr>
              <td>SNo.</td>
              <td>Address</td>
              <td>Email</td>
              <td>Contact No.</td>
             <!--  <td>Image</td> -->
              <td>Action</td>
            </tr>
            <?php 
               $query = "SELECT * FROM contact_us";
               $sql   = mysqli_query($conn,$query);
               while($row = mysqli_fetch_array($sql)){
                
            ?>
            <tr class="text-center">
                   <td><?php echo $row["id"]; ?></td>
                   <td><?php echo $row["address"]; ?></td>
                   <td><?php echo $row["email"]; ?></td>
                   <td><?php echo $row["contact"]; ?></td>
                                              
                   <td><a data-toggle="tooltip" data-placement="top" title="update" href="contact_update.php?id=<?php echo $row["id"]; ?>"><i class='far fa-edit' ></i></a>       
                    <!--<a data-toggle="tooltip" data-placement="top" title="delete" href="contact_detele.php?id=<?php echo $row["id"]; ?>"><i class='far fa-trash-alt' ></i></a>--></td>
                                            </tr>

              <?php
                    }
             ?>
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
        <h5 class="modal-title text-center" id="exampleModalLabel">Contact Us</h5>
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
                  <label class="form-label">Address :-</label>
                  <input type="text" name="address" required="" placeholder="plz enter address"></input>
                </div>
                <div class="col-sm-6">
                  <label class="form-label">Email :-</label>
                  <input type="text" name="email" required="" placeholder="plz enter Email"></input>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <label class="form-label">Contact :-</label>
                  <input type="text" name="contact" required="" placeholder="plz enter contact"></input>
                </div>
                
              </div><br>
              <button type="submit" name="submit" class="btn btn-primary ">Submit</button>
            </form>

          </div>
        </div>
      </div>
<!--       <div class="modal-footer text-center">
        
      </div> -->
    </div>
  </div>
</div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->

       <br><br>



        </div>

    </section>
    <!-- /.content -->
  </div>
  <script type="text/javascript">
    $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
  </script>
  <!-- /.content-wrapper -->
  <?php include('include/footer.php'); ?>