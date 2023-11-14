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
//   $id = $_GET['id'];
//   $sql   = mysqli_query($conn,"SELECT * FROM categories WHERE id = $id ");
//   $row   = mysqli_fetch_array($sql);

     $id = $_GET['id'];

     $sql   = mysqli_query($conn,"SELECT * FROM categories WHERE id ='".$_GET['id']."'");
     $row   = mysqli_fetch_array($sql);

    
    if (isset($_POST['submit'])) {
       $id = $_GET['id'];
      //print_r($_FILES);die();

      $categories      =  $_POST['categories'];


    $sql = "update categories set id = $id, categories= '$categories' WHERE id ='".$_GET['id']."' ";
//print_r($sql);die();
     $mysql = mysqli_query($conn,$sql);
    
   if ($mysql==true) {
    //header('location:categories.php');
        echo '<script type="text/javascript">alert("Succesfully Data update")</script>';
        echo "<script>location.href='categories.php'</script>";
    }else{

        echo '<script type="text/javascript">alert("Data not update")</script>';
        header('location:categories_update.php');
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
            <h1 class="m-0 text-center">Categories Update</h1>
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
                  <input class="form-control" type="text" name="categories" required="" placeholder="Enter Tittle" id="exampleFormControlInput1" value="<?php echo $row["categories"]; ?>"></input>
                </div>
                <!--<div class="col-sm-6">-->
                <!--  <label class="form-label">Sub Tittle :-</label>-->
                <!--  <input class="form-control" id="exampleFormControlInput1" type="text" name="sub_tittle" required="" placeholder="plz enter Sub Tittle" value="<?php echo $row["sub_tittle"]; ?>"></input>-->
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