<?php 
 include('connection.php');
 include('include/header.php'); 
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
      $price       =  $_POST['price'];
      
      $photo       = $_FILES['image'];
      $files       = $_FILES['pdf'];
      
       $category  =  $_POST['category'];
      
      $file        =  $photo['name'];
      $filepath    =  $photo['tmp_name'];
      $filerror    =  $photo['error'];

      $destfile    = 'upload/'.$file;
     // $pdf         = 'upload/'.$file;

      move_uploaded_file($filepath, $destfile);
      
       $file        =  $files['name'];
       $filepath    =  $files['tmp_name'];
       $filerror    =  $files['error'];

       $pdf    = 'upload/'.$file;

       move_uploaded_file($filepath, $pdf);

    $sql = "INSERT INTO `bulkemailsending`(`tittle`, `sub_tittle`,`price`, `image`,`pdf`,`cat_id`) VALUES ('$tittle','$sub_tittle','$price', '$destfile','$pdf','$category')";
    //print_r($sql);die();
    $mysql = mysqli_query($conn,$sql);

   if ($mysql==true) {
      echo '<script type="text/javascript">alert("Succesfully Data Inserted")</script>';
      echo "<script>location.href='bulkmailsending.php'</script>";
      
    }else{

      header('location:bulkemailsending.php');
      echo '<script type="text/javascript">alert("Data not Inserted")</script>';
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
            <h1 class="m-0">Bulk Mail Sending Tools</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <a href="user_data15_download.php" class="btn btn-primary" target="_blank">Data Export</a>
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
            <thead>
             <tr>
              <td>SNo.</td>
              <td>Tittle</td>
              <td>Sub Tittle</td>
              <td>Price</td>
              <td>Image</td>
              <td>Text File</td>
              <td>Categories</td>
              <td>Action</td>
             </tr>
            </thead>
            <?php  $i=1;
               $query = "SELECT * FROM bulkemailsending";
               $sql   = mysqli_query($conn,$query);
               while($row = mysqli_fetch_array($sql)){
                   $cat_id = $row['cat_id'];
            ?>
            
            <tbody>
            <tr class="text-center">
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row["tittle"]; ?></td>
                        <td><?php echo $row["sub_tittle"]; ?></td>
                        <td><?php echo $row["price"]; ?></td>
                        <td><a href="<?php echo $row['image']; ?>" target="_blank"><img src="<?php echo $row['image']; ?> " height='40' width='50'></a></td>
                        <td><a href="<?php echo $row['pdf']; ?>" target="_blank" ><object data="<?php echo $row['pdf']; ?>" width="70" height="50"></object></a></td>
                                              
                        <?php 
                            $slq1 = "SELECT * FROM `categories` WHERE id='$cat_id'";
                            //print_r($slq1);
                            $mysqlt = mysqli_query($conn,$slq1);
                            $catdata = mysqli_fetch_assoc($mysqlt);
                           // print_r($catdata);
                        ?>
                        <td><?php echo $catdata['categories'] ?></td>
                                              
                        <td><a data-toggle="tooltip" data-placement="top" title="update" href="bulkemailsending_update.php?id=<?php echo $row["id"]; ?>"><i class='far fa-edit' ></i></a>       
                            <a data-toggle="tooltip" data-placement="top" title="delete" href="bulkemailsending_delete.php?id=<?php echo $row["id"]; ?>"><i class='far fa-trash-alt' ></i></a>
                        </td>
            </tr>

                                         <?php $i++;
                                           }
                                         ?>
            </tbody>
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
        <h5 class="modal-title text-center" id="exampleModalLabel">Bulk Mail Sending Tools
</h5>
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
                  <label>Price :-</label>
                  <input type="text" name="price" required="" placeholder="plz enter price"></input>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <label>Choose Images :-</label>
                  <input type="file" name="image"></input>
                </div>
                <div class="col-sm-6">
                  <label>PDF file :-</label>
                  <input type="file" name="pdf" required="" placeholder="plz uplode file"></input>
                </div>
              </div>
               <div class="row">
                 <div class="col-sm-6">
                    <label class="form-label">Message :-</label>
                    <textarea class="form-control" name="sub_tittle" placeholder="Message" required="required" placeholder="Enter your message"><?php echo $row["sub_tittle"]; ?></textarea>
                  
                  <!--<input class="form-control" id="exampleFormControlInput1" type="text" name="sub_tittle" required="" placeholder="plz enter sub tittle"></input>-->
                </div>
                
                <div class="form-group">
                    <?php 
                    $query = "SELECT * FROM categories";
                   
                    $sqlqry = mysqli_query($conn,$query);
                    
                    
                    
                  ?>
                  <label for="exampleInputEmail1">Category Name</label>
                 
                  <select name="category" class="form-control" required>
                      <option value="" >--Select Category--</option>
                      <?php 
                        while($result = mysqli_fetch_assoc($sqlqry)){
                      ?>
                      <option value="<?php echo $result['id'] ?>"><?php echo $result['categories'] ?></option>
                      <?php } ?>
                      
                  </select>
                  
               </div>
                
                <!--<div class="col-sm-6">-->
                <!--  <label>Choose Images :-</label>-->
                <!--  <input type="file" name="image"></input>-->
                <!--</div>-->
              </div>
              <br>
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