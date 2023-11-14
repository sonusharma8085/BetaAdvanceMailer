<?php include('include/header.php'); 
    include('include/sidebar.php');
 
   error_reporting(0);
   session_start();

  if (!isset($_SESSION['userid'])){
     echo "<script>location.href='login.php'</script>";
    //('location:login.php');
   }
  ?>
  <?php 
     $id = $_GET['id'];

     $sql   = mysqli_query($conn,"SELECT * FROM latest_arti_img WHERE id ='".$_GET['id']."'");
     $row   = mysqli_fetch_array($sql);

    if (isset($_POST['submit'])) {
      
     
      $title     =  $_POST['title'];
      $subtitle  =  $_POST['subtitle'];

      $oldimage  =  $_POST['oldimage'];
      
    if($_FILES['image']['tmp_name']!=""){
      $photo = $_FILES['image'];
      $file      =  $photo['name'];
      $filepath  =  $photo['tmp_name'];
      $filerror  =  $photo['error'];

      $destfile   = 'upload/'.$file;

      move_uploaded_file($filepath, $destfile);
    }else{
        
        $destfile = $oldimage;
    }

    $sql20 = "update latest_arti_img set title= '$title', subtitle='$subtitle', image='$destfile' WHERE id =$id";
    
   
     $mysql = mysqli_query($conn,$sql20);
   // print_r($sql);die();
       if ($mysql==true) {
             
              echo '<script type="text/javascript">alert("Succesfully Data update")</script>';
              echo "<script>location.href='latest-articles-img.php'</script>";
        }else{

              echo '<script type="text/javascript">alert("Data not update")</script>';
              header('location:latest-art-img-update.php');
        }

    }

  ?>

  <div class="content-wrapper">
   <section class="content">
      <div class="container-fluid">
         <br>
         <div class="row">
            <div class="col-md-12">
               <h1>Update Trending sw</h1>
            </div>
            <!--  <div class="col-md-6">
               <a href="swdevelatest.php" class="text-right" data-placement="top" title="Add" ><i class="material-icons">add</i></a>
               </div> -->
         </div>
      </div>
      <br>
      <div class="row col-md-8">
         <div class="container">
            <form method="post" action="" enctype='multipart/form-data'>
              
               <div class="form-group">
                   <input type="hidden" name="oldimage" value="<?php echo $row['image'] ?>">
                 
               </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Title</label>
                  <input type="text" class="form-control" name="title"  placeholder="Enter Title" value="<?php echo $row['title'] ?>">
               </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Sub-Title</label>
                  <input type="text" class="form-control" name="subtitle"  placeholder="Enter Subtitle" value="<?php echo $row['subtitle'] ?>">
               </div>
               <div class="form-group">
                  
                  <img src="<?php echo $row['image'] ?>" style="height="50" width="50""  >
                  <label for="exampleInputPassword1">Image</label>
                  <input type="file" name="image" class="form-control"  >
               </div>

               <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
         </div>
      </div>
</div>
<!-- /.container-fluid -->
</section>
</div>
  <!-- /.content-wrapper -->
<?php include('include/footer.php'); ?>