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
  
    date_default_timezone_set('Asia/Calcutta'); 
    $create_at  =date("d-m-Y"); // time in India
    
    if (isset($_POST['submit'])) {
      //print_r($_FILES);die();

      $name        =  $_POST['name'];
      $category    =  $_POST['category'];
      $massage     =  $_POST['massage'];
      $sub_category= $_POST['sub_category'];
      $photo       = $_FILES['image'];

      $file        =  $photo['name'];
      $filepath    =  $photo['tmp_name'];
      $filerror    =  $photo['error'];
      

      $destfile   = 'upload/'.$file;

      move_uploaded_file($filepath, $destfile);


    $sql = "INSERT INTO `latest_update`(`name` , `category`,`massage`,`sub_category`,`image`,`create_at`) VALUES ('$name', '$category', '$massage','$sub_category','$destfile','$create_at')";

     $mysql = mysqli_query($conn,$sql);
   // print_r($sql);die();
      if ($mysql==true) {
          echo '<script type="text/javascript">alert("Succesfully Data Inserted")</script>';
          header('location:latest_update.php');
      }else{
        echo '<script type="text/javascript">alert("Data not Inserted")</script>';
        header('location:latest_update.php');
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
            <h1 class="m-0">Latest Update</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <a href="user_data34_download.php" class="btn btn-primary" target="_blank">Data Export</a>
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

          
          <table class="table table-striped text-center table-bordered">
            
            <tr>
              <td>SNo.</td>
             <td>Name</td>
              <td>Category</td>
              <td>Sub Category</td>
              <td>Massege</td>
              
              <td>Time</td>
              <td>Image</td>
              <td>Action</td>
            </tr>
            <?php 
               $query = "SELECT * FROM latest_update";
               $sql   = mysqli_query($conn,$query);
               $i=1;
               while($row = mysqli_fetch_array($sql)){
                
            ?>
            <tr class="text-center">
                                              <td><?php echo $i ?></td>
                                              
                                              <td><?php echo $row["name"]; ?></td>
                                              <td><?php echo $row["category"]; ?></td>
                                              <td><?php echo $row["sub_category"];?></td>
                                              <td><?php echo $row["massage"]; ?></td>
                                              
                                              <td><?php echo $row["create_at"]; ?></td>
                                              <td><a href="<?php echo $row['image']; ?>" target="_blank"><img src="<?php echo $row['image']; ?> " height='40' width='50'></a></td>
                                              <td><a data-toggle="tooltip" data-placement="top" title="update" href="latest_update1.php?id=<?php echo $row["id"]; ?>"><i class='far fa-edit' ></i></a>       
                                                  <a data-toggle="tooltip" data-placement="top" title="delete" href="latest_detele1.php?id=<?php echo $row["id"]; ?>"><i class='far fa-trash-alt' ></i></a></td>
                                            </tr>

                                         <?php
                                            $i++;
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
        <h5 class="modal-title text-center" id="exampleModalLabel">Latest Update</h5>
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
                  <label>Name :-</label>
                  <input type="text" name="name" required="" placeholder="Enter Name"></input>
                </div>
                <div class="col-sm-6">
                  <label>Category :-</label>
                  <input type="text" name="category" required="" placeholder="Enter Category"></input>
                </div>
              </div>
               <div class="row">
                <div class="col-sm-6">
                  <label>Sub Category :-</label>
                  <input type="text" name="sub_category" required="" placeholder="Enter Sub Category"></input>
                </div>
                <!--<div class="col-sm-6">-->
                <!--  <label>Category :-</label>-->
                <!--  <input type="text" name="category" required="" placeholder="Enter Category"></input>-->
                <!--</div>-->
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <label>Massage :-</label>
                  <textarea type="text" name="massage" required="" placeholder="Enter Massage" rows="4" cols="25"></textarea>
                </div>
                <div class="col-sm-6">
                  <label>Choose Images :-</label>
                  <input type="file" name="image"></input>
                </div>
              </div>
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