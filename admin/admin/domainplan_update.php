<?php include('include/header.php'); 
    include('include/sidebar.php');
  ?>
<?php 
  error_reporting(0);
   session_start();

  if (!isset($_SESSION['userid'])){
     echo "<script>location.href='login.php'</script>";
    //('location:login.php');
  }
  ?>
  <?php 

  $query = mysqli_query($conn,"SELECT * FROM domainplan");
  $sql   = mysqli_query($conn,"SELECT * FROM domainplan WHERE id ='".$_GET['id']."'");
  $row   = mysqli_fetch_array($sql);

    
    if (isset($_POST['submit'])) {
      $id = $_GET['id'];
      //print_r($_FILES);die();

      $domain_name      =  $_POST['domain_name'];
      $off_plan  =  $_POST['off_plan'];
     // $massage  =  $_POST['massage'];
      
    //   $photo = $_FILES['image'];

    //   $file        =  $photo['name'];
    //   $filepath    =  $photo['tmp_name'];
    //   $filerror    =  $photo['error'];

    //   if ($photo != '') {
    //     $photo = $_FILES['image']['name'];
    //   }else{
    //     $photo = $_FILES['image'];
    //   }

    //   $destfile   = 'upload/'.$file;

    //   move_uploaded_file($filepath, $destfile);


    $sql = "update domainplan set id = $id, domain_name= '$domain_name', off_plan='$off_plan' WHERE id =$id";

     $mysql = mysqli_query($conn,$sql);
   // print_r($sql);die();
   if ($mysql==true) {
    //header('location:affiliatemarketing.php');
    echo '<script type="text/javascript">alert("Succesfully Data update")
        </script>';
        echo "<script>location.href='domainplan.php'</script>";
    }else{

    echo '<script type="text/javascript">alert("Data not update")
        </script>';
        header('location:domainplan_update.php');
   }

    }

  ?>

  <!-- Main Sidebar Container -->

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0 text-center">Update Domain Plan</h1>
          </div><!-- /.col -->
          <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <button type="button" class="btn btn-primary text-right" data-toggle="modal" data-target="#exampleModal">Add</button>
            </ol>
          </div> --><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content ">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="container-fluid">

            <form action="" method="POST" enctype="multipart/form-data">
              <div class="row col-sm-6">
                <div class="col-sm-6">
                  <label class="form-label">Domain Name :-</label>
                  <input class="form-control" type="text" name="domain_name" required="" placeholder="Enter Domain Nmae" id="exampleFormControlInput1" value="<?php echo $row["domain_name"]; ?>"></input>
                </div>
                <div class="col-sm-6">
                  <label class="form-label">Percentage Off :-</label>
                  <input class="form-control" id="exampleFormControlInput1" type="text" name="off_plan" required="" placeholder="Enter Percentage Off" value="<?php echo $row["off_plan"]; ?>"></input>
                </div>
              </div>
              <div class="row">
                <!-- <div class="col-sm-6">
                  <label class="form-label">Massage :-</label>
                  <textarea class="form-control" id="exampleFormControlInput1" type="text" name="massage" required="" placeholder="plz enter Massage" ><?php echo $row["massage"]; ?></textarea>
                </div> -->
                <!--<div class="col-sm-6">-->
                <!--  <label class="form-label">Choose Images :-</label>-->
                <!--  <input class="form-control" id="exampleFormControlInput1" type="file" name="image"></input>-->
                <!--</div>-->
              </div>
              <br>
              <button type="submit" name="submit" class="btn btn-primary ">Submit</button>
            </form>

          </div>
        </div>
        </div>
        <!-- /.row -->
        <!-- Main row -->
        
<!-- Button trigger modal -->
</div>
</section></div>
  <!-- /.content-wrapper -->
  <?php include('include/footer.php'); ?>