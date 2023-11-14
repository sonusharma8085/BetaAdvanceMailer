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

  $query = mysqli_query($conn,"SELECT * FROM homesider");
  $sql   = mysqli_query($conn,"SELECT * FROM homesider WHERE id ='".$_GET['id']."'");
  $row   = mysqli_fetch_array($sql);
  $imagedata = $row['image'];

    
    if (isset($_POST['submit'])) {
      $id = $_GET['id'];
    //   print_r($_POST);die();

       $fullname      =  $_POST['title'];
       $massage  =  $_POST['subtitle'];
      $photo = $_FILES['image'];
      
    if(!$photo==""){
    
      $file        =  $photo['name'];
      $filepath    =  $photo['tmp_name'];
      $filerror   =  $photo['error'];
    //   if ($photo != '') {
    //     $photo = $_FILES['image']['name'];
    //   }else{
    //     $photo = $_FILES['image'];
    //   }

      $destfile   = 'upload/'.$file;

      move_uploaded_file($filepath, $destfile);


    $sql = "update homesider set id = $id, title='$fullname', subtitle='$massage', image='$destfile' WHERE id =$id";
    $mysql = mysqli_query($conn,$sql);
    }else{
        
        $sql = "update homesider set id = $id, title='$fullname', subtitle='$massage', image='$imagedata' WHERE id =$id";
        print_r($sql);
        die();
        $mysql = mysqli_query($conn,$sql);
    }

     
   // print_r($sql);die();
   if ($mysql==true) {
    // header('location:seo.php');
    echo '<script type="text/javascript">alert("Succesfully Data update")
        </script>';
    echo "<script>location.href='homesider.php'</script>";
    }else{

    echo '<script type="text/javascript">alert("Data not update")
        </script>';
        header('location:update-homesider.php');
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
            <h1 class="m-0 text-center">Update Home Sliders</h1>
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
        <div class="row col-md-8">
          <div class="container-fluid">

            <form method="post" action="" enctype='multipart/form-data'>
               <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <input type="text" name="title" class="form-control" value="<?php  echo $row['title'] ?>"  placeholder="Enter Title">
                  
               </div>
               <div class="form-group">
                  <label for="exampleInputPassword1">Subtitle</label>
                  <input type="text" class="form-control" name="subtitle" value="<?php  echo $row['subtitle'] ?>" placeholder="Enter Subtitle">
               </div>
               <div class="form-group">
                  <label for="exampleInputPassword1">Image</label>
                  <input type="file" name="image" class="form-control"  placeholder="Enter Subtitle">
                  <img src="<?php echo $row['image']; ?>" height="50" width="50">
               </div>

               <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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