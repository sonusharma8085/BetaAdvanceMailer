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
     //print_r($_POST);
     //die();
   
     $category  =  $_POST['category'];
     $title      =  $_POST['title'];
     $pname      =  $_POST['pname'];
     $subtitle     =  $_POST['subtitle'];
     $price     =  $_POST['price'];
     
     
     $photo = $_FILES['image'];
   
     $file        =  $photo['name'];
     $filepath    =  $photo['tmp_name'];
     $filerror   =  $photo['error'];
     
   
     $destfile   = 'upload/'.$file;
   
     move_uploaded_file($filepath, $destfile);
     
     $files       = $_FILES['pdf'];
     
     $file        =  $files['name'];
     $filepath    =  $files['tmp_name'];
     $filerror    =  $files['error'];

     $pdf    = 'upload/'.$file;
    
     move_uploaded_file($filepath, $pdf);
     
   
   $sql = "INSERT INTO `product`(`pname`, `title`, `subtitle`, `image`,`cat_id`,`price`,`pdf`,`created_date`) VALUES ('$pname','$title','$subtitle','$destfile','$category','$price','$pdf','$currentTime')";
   
    //  print_r($sql);die();
    $mysql = mysqli_query($conn,$sql);
    //print_r($sql);die();
    if ($mysql==true) {
    //header('location:afiliateimg.php');
        echo '<script type="text/javascript">alert("Product Add Succesfully")
        </script>';
        echo "<script>location.href='product.php'</script>";
    }else{
   
       header('location:add-product.php');
        echo '<script type="text/javascript">alert("Product not")
       </script>';
   }
   
   }
   
   ?>
<div class="content-wrapper">
   <section class="content">
      <div class="container-fluid">
         <br>
         <div class="row">
            <div class="col-md-12">
               <h1>Add Product</h1>
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
               <div class="form-group">
                  <label for="exampleInputPassword1">Product Name</label>
                  <input type="text" class="form-control" name="pname"  placeholder="Enter Products">
               </div>
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
                <div class="col-sm-6">
                  <label>PDF file :-</label>
                  <input type="file" name="pdf" required="" placeholder="plz uplode file"></input>
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