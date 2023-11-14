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
      $sub_tittle  =  $_POST['sub_tittle'];
      $massage     =  $_POST['massage'];
      $photo = $_FILES['image'];

      $file        =  $photo['name'];
      $filepath    =  $photo['tmp_name'];
      $filerror   =  $photo['error'];
      

      $destfile   = 'upload/'.$file;

      move_uploaded_file($filepath, $destfile);


    $sql = "INSERT INTO `seo`(`tittle`, `sub_tittle`, `massage`,`image`) VALUES ('$tittle','$sub_tittle','$massage','$destfile')";

     $mysql = mysqli_query($conn,$sql);
   // print_r($sql);die();
   if ($mysql==true) {
    header('location:seo.php');
    echo '<script type="text/javascript">alert("Succesfully Data Inserted")
        </script>';
    }else{

        header('location:seo.php');
    echo '<script type="text/javascript">alert("Data not Inserted")
        </script>';
   }

    }

  ?>

   

  <!-- Main Sidebar Container -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
       
        <!-- /.row -->
        <!-- Main row -->
        
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalLabel">SEO</h5>
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
                  <label>Tittle :-</label>
                  <input type="text" name="tittle" required="" placeholder="plz enter Tittle"></input>
                </div>
                <div class="col-sm-6">
                  <label>Sub Tittle :-</label>
                  <input type="text" name="sub_tittle" required="" placeholder="plz enter Sub Tittle"></input>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <label>Massage :-</label>
                  <textarea type="text" name="massage" required="" placeholder="plz enter Massage" rows="4" cols="25"></textarea>
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

 


<!--<div class="row col-sm-12">-->
     
        <div class="container-fluid">
      <div class="row">
          <div class="col-md-6">
           <h3>SEO Tittle</h3>
          </div>
          <div class="col-md-6 text-right">
             <a href="user_data25_download.php" class="btn btn-primary" target="_blank">Data Export</a>
            <a href="seo_tittle.php" class="text-right" data-placement="top" title="Add" ><i class="material-icons">add</i></a>
         </div>
      </div>     
 </div>
    </div>

        
    <!-- /.content-header -->

    <!-- Main content -->

      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <!--<div class="row">-->

        <!--  <table class="table table-striped text-center">-->
            
        <!--    <tr>-->
        <!--      <td>SNo.</td>-->
        <!--      <td>Tittle</td>-->
              <!-- <td>Sub Tittle</td> -->
             
              <!-- <td>Image</td> -->
        <!--      <td>Action</td>-->
        <!--    </tr>-->
            <?php 
               $query = "SELECT * FROM seo_tittle";
               $sql   = mysqli_query($conn,$query);
               while($row = mysqli_fetch_array($sql)){
                
            ?>
            <!--<tr class="text-center">-->
            <!--                                  <td><?php echo $row["id"]; ?></td>-->
            <!--                                  <td><?php echo $row["tittle"]; ?></td>-->
                                              <!-- <td><?php echo $row["sub_tittle"]; ?></td> -->
                                              
                                              <!-- <td><a href="<?php echo $row['image']; ?>" target="_blank"><img src="<?php echo $row['image']; ?> " height='40' width='50'></a></td> -->
            <!--                                  <td><a data-toggle="tooltip" data-placement="top" title="update" href="seo_tittle_update.php?id=<?php echo $row["id"]; ?>"><i class='far fa-edit' ></i></a>       -->
            <!--                                      <a data-toggle="tooltip" data-placement="top" title="delete" href="seo_tittle_delete.php?id=<?php echo $row["id"]; ?>"><i class='far fa-trash-alt' ></i></a></td>-->
            <!--                                </tr>-->

                                         <?php
                                           }
                                         ?>
        <!--  </table>-->

        <!--</div>-->

        <br><br>

        <div class="row col-sm-12">

          <div class="container-fluid">
            <div class="row">
          <div class="col-md-6">
            <h3>MOBILE APPLICATIONS Images.</h3>
          </div>
          <div class="col-md-6 text-right">
            <a href="seoimg_deve.php" class="text-right" data-placement="top" title="Add" ><i class="material-icons">add</i></a>
          </div>
        </div>
      </div>
          </div>

          <table class="table table-striped text-center table-bordered">

            
            <tr>
              <td>SNo.</td>
              <td>Massage</td>
              <td>Image</td>
              <td>Action</td>
            </tr>
            <?php 
               $query = "SELECT * FROM seo_img";
               $sql   = mysqli_query($conn,$query);
               $i=1;
               while($row = mysqli_fetch_array($sql)){
                
            ?>
            <tr class="text-center">
                                              <td><?php echo $i; ?></td>
                                              
                                              <td><?php echo $row["massage"]; ?></td>
                                              
                                              <td><a href="<?php echo $row['image']; ?>" target="_blank"><img src="<?php echo $row['image']; ?> " height='40' width='50'></a></td>
                                              <td><a data-toggle="tooltip" data-placement="top" title="update" href="seoimg_update.php?id=<?php echo $row["id"]; ?>"><i class='far fa-edit' ></i></a>       
                                                  <a data-toggle="tooltip" data-placement="top" title="delete" href="seoimg_delete.php?id=<?php echo $row["id"]; ?>"><i class='far fa-trash-alt' ></i></a></td>
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

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->

    </section>
  </div>
    <!-- /.content -->

  <script type="text/javascript">
    $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
  </script>
  <!-- /.content-wrapper -->
  <?php include('include/footer.php'); ?>