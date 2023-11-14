<?php include('include/header.php'); 
    include('include/sidebar.php');
    // include('user_auth.php');
  ?>

  <?php 

  $query = mysqli_query($conn,"SELECT * FROM datarecimg");
  $sql   = mysqli_query($conn,"SELECT * FROM datarecimg WHERE id ='".$_GET['id']."'");
  $row   = mysqli_fetch_array($sql);

    
    if (isset($_POST['submit'])) {
      $id = $_GET['id'];
      //print_r($_FILES);die();

      // $tittle      =  $_POST['tittle'];
      // $sub_tittle  =  $_POST['sub_tittle'];
      $tittle  =  $_POST['tittle'];
      
      $photo = $_FILES['image'];

      $file        =  $photo['name'];
      $filepath    =  $photo['tmp_name'];
      $filerror   =  $photo['error'];
      if ($photo != '') {
        $photo = $_FILES['image']['name'];
      }else{
        $photo = $_FILES['image'];
      }

      $destfile   = 'upload/'.$file;

      move_uploaded_file($filepath, $destfile);


    $sql = "update datarecimg set id = $id, tittle='$tittle', image='$destfile' WHERE id =$id";

     $mysql = mysqli_query($conn,$sql);
   // print_r($sql);die();
   if ($mysql==true) {
    //header('location:seo.php');
    echo '<script type="text/javascript">alert("Succesfully Data update")
        </script>';
     echo "<script>location.href='datarecovery.php'</script>";
    }else{

    echo '<script type="text/javascript">alert("Data not update")
        </script>';
        //header('location:seoimg_update.php');
    echo "<script>location.href='datarecimg_update.php'</script>";
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
            <h1 class="m-0 text-center">Updat DataRecovery Image</h1>
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
                  <label class="form-label">Tittle :-</label>
                  <input class="form-control" id="exampleFormControlInput1" type="text" name="tittle" required="" placeholder="plz enter Massage" value="<?php echo $row["tittle"]; ?>"></input>
                </div>
                <div class="col-sm-6">
                  <label class="form-label">Choose Images :-</label>
                  <input class="form-control" id="exampleFormControlInput1" type="file" name="image"></input>
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