<?php include('include/header.php'); 
    include('include/sidebar.php');
     include('connection.php');
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
  $id = $_GET['id'];
  $sql   = mysqli_query($conn,"SELECT * FROM bulkemailsending WHERE id ='".$_GET['id']."'");
  $row   = mysqli_fetch_array($sql);
  
  $catId =     $row['cat_id'];
    
    if (isset($_POST['submit'])) {
      $id = $_GET['id'];
     
      $tittle      =  $_POST['tittle'];
      $sub_tittle  =  $_POST['sub_tittle'];
      $price       =  $_POST['price'];
      $photo      = $_FILES['image'];
      $files       = $_FILES['pdf'];
      
      $category  =  $_POST['category'];

      $file        =  $photo['name'];
      $filepath    =  $photo['tmp_name'];
      $filerror   =  $photo['error'];

      $destfile   = 'upload/'.$file;

      move_uploaded_file($filepath, $destfile);
      
      $file        =  $files['name'];
      $filepath    =  $files['tmp_name'];
      $filerror    =  $files['error'];

       $pdf   = 'upload/'.$file;

      move_uploaded_file($filepath, $pdf);

    $sql = "UPDATE `bulkemailsending` SET `tittle`='$tittle',`sub_tittle`='$sub_tittle',`price`='$price',`image`='$destfile',`pdf`='$pdf',`cat_id`='$category' WHERE id =$id";
//print_r($sql);die();
     $mysql = mysqli_query($conn,$sql);
  
   if ($mysql==true) {
    //header('location:seo.php');
    echo '<script type="text/javascript">alert("Succesfully Data update")
        </script>';
    echo "<script>location.href='bulkmailsending.php'</script>";
    }else{

    echo '<script type="text/javascript">alert("Data not update")
        </script>';
        header('location:bulkemailsending_update.php');
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
            <h1 class="m-0 text-center">Update Bulk email sending </h1>
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
                  <label class="form-label">Tittlt :-</label>
                  <input class="form-control" id="exampleFormControlInput1" type="text" name="tittle" required="" placeholder="Enter tittle" value="<?php echo $row["tittle"]; ?>"></input>
                </div>
                <div class="col-sm-6">
                  <label class="form-label">Price :-</label>
                  <input class="form-control" id="exampleFormControlInput1" type="text" name="price" required="" placeholder="Enter Price" value="<?php echo $row["price"]; ?>"></input>
                </div>
                
              </div>
                <div class ="row col-sm-6">
                
                <div class="col-sm-6">
                  <label class="form-label">Choose Images :-</label>
                  <img src="<?php echo $row['image'] ?>" style="height="50" width="50""  >
                  <input class="form-control" id="exampleFormControlInput1" type="file" name="image"></input>
                </div>
                <div class="col-sm-6">
                  <label class="form-label">Choose File :-</label>
                  <img src="<?php echo $row['pdf'] ?>" style="height="50" width="50""  >
                  <input class="form-control" id="exampleFormControlInput1" type="file" name="pdf"></input>
                </div>
                
              </div>
              
               <div class ="row col-sm-6">
                <!--     <div class="col-sm-6">-->
                <!--  <label class="form-label">Price :-</label>-->
                <!--  <input class="form-control" id="exampleFormControlInput1" type="text" name="price" required="" placeholder="Enter Price" value="<?php echo $row["price"]; ?>"></input>-->
                <!--</div>-->
                
                <div class="col-sm-6">
                    <label class="form-label">Message :-</label>
                    <textarea class="form-control" name="sub_tittle" placeholder="Message" required="required" placeholder="Enter your message"><?php echo $row["sub_tittle"]; ?></textarea>
                  
                  <!--<input class="form-control" id="exampleFormControlInput1" type="text" name="sub_tittle" required="" placeholder="plz enter sub tittle"></input>-->
                </div>
                
                 <div class="form-group col-sm-6">
                    <?php 
                    $queryct = "SELECT * FROM categories";
                   
                    $sqlqry = mysqli_query($conn,$queryct);
                    
                  ?>
                   
                  <label for="exampleInputEmail1">Category Name</label>
                 
                  <select name="category" class="form-control" required>
                      
                      <?php 
                        while($result = mysqli_fetch_assoc($sqlqry)){
                            //print_r($result);
                      ?>
                      <option value="<?php echo $result['id'] ?>"  <?php echo ($row["cat_id"] == $result['id']) ? "selected='selected'" : ''; ?> ><?php echo $result['categories'] ?></option>
                      <?php } ?>
                      
                  </select>
                  
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

<script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
<script src="https://cdn.ckeditor.com/ckeditor5/10.0.1/classic/ckeditor.js"></script>
  <!-- /.content-wrapper -->
  <?php include('include/footer.php'); ?>
  