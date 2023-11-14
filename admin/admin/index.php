 <?php include('include/header.php'); 
    include('include/sidebar.php');
  ?>
<?php 
  error_reporting(0);
   session_start();
// print_r($_SESSION['userid']);die();
  if ($_SESSION['userid'] == ""){
     echo "<script>location.href='login.php'</script>";
    //('location:login.php');
  }
  ?>
  <?php 
    
    if (isset($_POST['submit'])) {
      //print_r($_FILES);die();

      $tittle      =  $_POST['tittle'];
      $sub_tittle        =  $_POST['sub_tittle'];
      //$contact       =  $_POST['contact'];
      // $photo = $_FILES['image'];

      // $file        =  $photo['name'];
      // $filepath    =  $photo['tmp_name'];
      // $filerror   =  $photo['error'];
      

      // $destfile   = 'upload/'.$file;

      // move_uploaded_file($filepath, $destfile);


    $sql = "INSERT INTO `swf_slider`(`tittle`, `sub_tittle`) VALUES ('$tittle','$sub_tittle')";

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
<style>
    
    .welcome-text {
    text-align: center;
    left: 274px;
    top: 230px;
}
</style>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 welcome-text">
            <h1 class="m-0">Welcome to the Admin Portal!</h1>
          </div><!-- /.col -->
          <!--<div class="col-sm-6">-->
          <!--  <ol class="breadcrumb float-sm-right">-->
          <!--    <a class="text-right" data-toggle="modal" data-target="#exampleModal" data-placement="top" title="Add" ><i class="material-icons">add</i></a>-->
          <!--  </ol>-->
          <!--</div>-->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
   


  </div>

  <script type="text/javascript">
    $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
  </script>

  <script type="text/javascript">
    $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
  </script>
  <!-- /.content-wrapper -->
  <?php include('include/footer.php'); ?>