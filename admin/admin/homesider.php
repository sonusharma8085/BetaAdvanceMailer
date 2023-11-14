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

  <div class="content-wrapper">

    <section class="content">
      <div class="container-fluid">



        <br>

         <div class="row">
             <div class="container-fluid">
              <div class="row">
                <div class="col-sm-6">
                   <h2 >Home Slider </h2>
                </div><!-- /.col -->
                <div class="col-sm-6">
                   <ol class="text-right">
                    <a href="user_data22_download.php" class="btn btn-primary" target="_blank">Data Export</a>
                   <a href="add-homesider.php" class="text-right" title="Add" ><i class="material-icons">add</i></a>
                   </ol>
                </div>
          <!-- /.col -->
             </div>
        <!-- /.row -->

      </div><!-- /.container-fluid -->
    <!-- /.content-header -->
          <table class="table table-striped text-center table-bordered">
            
            <tr>
              <td>S.No.</td>
              <td>Title</td>
            <td> Subtitle</td>
              <td>Image</td>
              <td>Action</td>
            </tr>
            <?php 
               $query = "SELECT * FROM homesider";
               $sql   = mysqli_query($conn,$query);
               $i=1;
               while($row = mysqli_fetch_array($sql)){
                
            ?>
            <tr class="text-center">
                   <td><?php echo $i ?></td>
                    <td><?php echo $row["title"]; ?></td> 
                   <td><?php echo $row["subtitle"]; ?></td>
                   <td><a href="<?php echo $row['image']; ?>" target="_blank"><img src="<?php echo $row['image']; ?> " height='40' width='50'></a></td>
                   
                                              
                   <td><a data-toggle="tooltip" data-placement="top" title="update" href="update-homesider.php?id=<?php echo $row["id"]; ?>"><i class='far fa-edit' ></i></a>       
                    <a data-toggle="tooltip" data-placement="top" title="delete" href="delete-homesider.php?id=<?php echo $row["id"]; ?>"><i class='far fa-trash-alt' ></i></a></td>
                                            </tr>

              <?php
              $i++;
                    }
             ?>
          </table>

        </div>

      </div>



    </section>
    <!-- /.content -->
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