<?php include('include/header.php'); 
   include('include/sidebar.php');
   include('connection.php');
   ?>
<?php 
   error_reporting(0);
    session_start();
    date_default_timezone_set('Asia/Kolkata');
    $currentTime = date( 'Y-m-d h:i:s', time () );
   
   if (!isset($_SESSION['userid'])){
      echo "<script>location.href='login.php'</script>";
     //('location:login.php');
   }
   ?>
<?php 
   if (isset($_POST['submit'])) {
    //  print_r($_POST);
    //  die();
   
    //$category      =  $_POST['category'];
     $title      =  $_POST['title'];
     $price      =  $_POST['price'];
     // $pname      =  $_POST['pname'];
     $subtitle     =  $_POST['subtitle'];
     
     
     $photo = $_FILES['image'];
   
     $file        =  $photo['name'];
     $filepath    =  $photo['tmp_name'];
     $filerror   =  $photo['error'];
     
   
     $destfile   = 'upload/'.$file;
   
     move_uploaded_file($filepath, $destfile);
   
   $sql = "INSERT INTO `trendingsw`(`title`, `subtitle`, `price`,`image`, `created_date`) VALUES ('$title','$subtitle','$price','$destfile','$currentTime')";
   
    $mysql = mysqli_query($conn,$sql);
   // print_r($sql);die();
   if ($mysql==true) {
   //header('location:afiliateimg.php');
   echo '<script type="text/javascript">alert(" Add Succesfully") </script>';
   echo "<script>location.href='trending_software.php'</script>";
   }else{
   
       header('location:trending_software.php');
   echo '<script type="text/javascript">alert("Product not")</script>';
   }
   
   }
   
   ?>
<div class="content-wrapper">
   <section class="content">
      <div class="container-fluid">
         <br>
         <div class="row">
            <div class="col-md-12">
               <h1>Add Trending Software</h1>
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
               
               <!--<div class="form-group">-->
               <!--   <label for="exampleInputPassword1">Product Name</label>-->
               <!--   <input type="text" class="form-control" name="pname"  placeholder="Enter Products">-->
               <!--</div>-->
                <div class="form-group">
                  <label for="exampleInputPassword1">Title</label>
                  <input type="text" class="form-control" name="title"  placeholder="Enter Title">
               </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Sub-Title</label>
                  <input type="text" class="form-control" name="subtitle"  placeholder="Enter Subtitle">
               </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Price</label>
                  <input type="text" class="form-control" name="price"  placeholder="Enter Price">
               </div>
               <div class="form-group">
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
<?php include('include/footer.php'); ?>