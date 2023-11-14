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

     $sql   = mysqli_query($conn,"SELECT * FROM product WHERE id ='".$_GET['id']."'");
     $row   = mysqli_fetch_array($sql);
     $catId =     $row['cat_id'];
    
    if (isset($_POST['submit'])) {
      
      $pname     =  $_POST['pname'];
      $title     =  $_POST['title'];
      $subtitle  =  $_POST['subtitle'];
      $category  =  $_POST['category'];
      $oldimage  =  $_POST['oldimage'];
      $oldpdf  =  $_POST['oldpdf'];
      $price  =  $_POST['price'];
      
     

    if($_FILES['image']['tmp_name']!=""){
      $photo = $_FILES['image'];
      $file      =  $photo['name'];
      $filepath  =  $photo['tmp_name'];
      $filerror  =  $photo['error'];
      
    //   if ($photo != '') {
    //     $photo = $_FILES['image']['name'];
    //   }else{
    //     
    //   }

      $destfile   = 'upload/'.$file;

      move_uploaded_file($filepath, $destfile);
    }else{
        
        $destfile = $oldimage;
    }
    
    if($_FILES['pdf']['tmp_name']!=""){
      $files       = $_FILES['pdf'];
     
     $file        =  $files['name'];
     $filepath    =  $files['tmp_name'];
     $filerror    =  $files['error'];

     $pdf    = 'upload/'.$file;
    
     move_uploaded_file($filepath, $pdf);
    }else{
        
        $pdf = $oldpdf;
    }

    $sql20 = "update product set title= '$title',pname= '$pname', subtitle='$subtitle', image='$destfile',cat_id='$category',price='$price' WHERE id =$id";
    
   
     $mysql = mysqli_query($conn,$sql20);
   // print_r($sql);die();
       if ($mysql==true) {
             //header('location:affiliatemarketing.php');
              echo '<script type="text/javascript">alert("Succesfully Data update")</script>';
            echo "<script>location.href='product.php'</script>";
        }else{

             echo '<script type="text/javascript">alert("Data not update")</script>';
              header('location:product_update.php');
        }

    }

  ?>

  <div class="content-wrapper">
   <section class="content">
      <div class="container-fluid">
         <br>
         <div class="row">
            <div class="col-md-12">
               <h1>Update Product</h1>
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
                      <?php 
                        $sql12 = "SELECT * FROM `categories` WHERE id='$id'";
                        
                        $mysqliry = mysqli_query($conn,$sql12);
                        $catdata = mysqli_fetch_assoc($mysqliry);
                        
                        $catname =$catdata['categories'];
                        $catid =$catdata['id'];
                      
                      ?>
                      
                      <option value="<?php echo $catid ?>" ><?php echo $catname ?></option>
                      <?php 
                        while($result = mysqli_fetch_assoc($sqlqry)){
                      ?>
                      <option value="<?php echo $result['id'] ?>"><?php echo $result['categories'] ?></option>
                      <?php } ?>
                      
                  </select>
                  
               </div>
               <div class="form-group">
                   <input type="hidden" name="oldimage" value="<?php echo $row['image'] ?>">
                  <label for="exampleInputPassword1">Product Name</label>
                  <input type="text" class="form-control" name="pname"  placeholder="Enter Products" value="<?php echo $row['pname'] ?>">
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
                  <label for="exampleInputPassword1">Price</label>
                  <input type="text" class="form-control" name="price"  placeholder="Enter Price" value="<?php echo $row['price'] ?>">
               </div>
               <div class="form-group">
                  
                  <img src="<?php echo $row['image'] ?>" style="height="50" width="50""  >
                  <label for="exampleInputPassword1">Image</label>
                  <input type="file" name="image" class="form-control"  >
               </div>
                  <div class="col-sm-6">
                  <label>PDF file :-</label>
                   <input type="file" name="pdf" class="form-control"  >
                  <input type="hidden" name="oldpdf" value='<?php echo $row['pdf'] ?>'>
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