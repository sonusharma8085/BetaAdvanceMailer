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

  $query = mysqli_query($conn,"SELECT * FROM contact_us");
  $sql   = mysqli_query($conn,"SELECT * FROM contact_us WHERE id ='".$_GET['id']."'");
  $row   = mysqli_fetch_array($sql);

    
    if (isset($_POST['submit'])) {
      $id = $_GET['id'];
      //print_r($_FILES);die();

      $address  =  $_POST['address'];
      $email    =  $_POST['email'];
      $contact  =  $_POST['contact'];


    $sql = "update contact_us set id = $id, address= '$address', email='$email', contact='$contact' WHERE id =$id";

     $mysql = mysqli_query($conn,$sql);
   // print_r($sql);die();
   if ($mysql==true) {
   
    echo '<script type="text/javascript">alert("Succesfully Data update")
        </script>';
        echo "<script>location.href='index.php'</script>";
    }else{

    echo '<script type="text/javascript">alert("Data not update")
        </script>';
        header('location:contact_update.php');
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
            <h1 class="m-0 text-center">Update Contact Us</h1>
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
                  <label class="form-label">Address :-</label>
                  <input class="form-control" type="text" name="address" required="" placeholder="plz enter Address" id="exampleFormControlInput1" value="<?php echo $row["address"]; ?>"></input>
                </div>
                <div class="col-sm-6">
                  <label class="form-label">Email :-</label>
                  <input class="form-control" id="exampleFormControlInput1" type="text" name="email" required="" placeholder="plz enter Email" value="<?php echo $row["email"]; ?>"></input>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <label class="form-label">Massage :-</label>
                  <input class="form-control" id="exampleFormControlInput1" type="text" name="contact" required="" placeholder="plz enter Contact" value="<?php echo $row["contact"]; ?>" ></input>
                </div>
               
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