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
   
     $username     =  $_POST['username'];
     $password      =  $_POST['password'];
     $name     =  $_POST['name'];
     $contact_no     =  $_POST['contact_no'];
     $mobile_no     =  $_POST['mobile_no'];
     $address     =  $_POST['address'];
     $fromDate     =  $_POST['fromDate'];
     $toDate    =  $_POST['toDate'];
     
     //print_r($_POST);die();
     
     $photo = $_FILES['profile_image'];
   
     $file        =  $photo['name'];
     $filepath    =  $photo['tmp_name'];
     $filerror   =  $photo['error'];
     
   
     $destfile   = 'upload/'.$file;
   
     move_uploaded_file($filepath, $destfile);
     if(isset($_POST['check'])){
        $check = "1";
     }else{
        $check = "0";
     }
     
     
   
   $sql = "INSERT INTO `admin`(`username`, `password`, `name`,`contact_no`,`mobile_no`,`address`, `profile_image`,`formdate`,`todate`,`approval`) VALUES ('$username','$password','$name','$contact_no', '$mobile_no', '$address', '$destfile','$fromDate','$toDate','$check')";
   
    //  print_r($sql);die();
    $mysql = mysqli_query($conmailer,$sql);
    //print_r($sql);die();
    if ($mysql==true) {
    //header('location:afiliateimg.php');
        echo '<script type="text/javascript">alert("User Add Succesfully")
        </script>';
        echo "<script>location.href='UserApproval.php'</script>";
    }else{
   
       header('location:add_user.php');
        echo '<script type="text/javascript">alert("User not")
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
               <h1>Add User</h1>
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
                <div class='row'>
                     <div class="col-md-6 form-group">
                    <label for="exampleInputPassword1">Name</label>
                    <input type="text" class="form-control" name="name"  placeholder="Name">
                </div>
                    <div class='col-md-6'>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Username</label>
                            <input type="text" class="form-control" name="username"  placeholder="Username">
                        </div>
                    </div>
               
               
                <div class="col-md-6 form-group">
                    <label for="exampleInputPassword1">Contact Number</label>
                    <input type="text" class="form-control" name="contact_no"  placeholder="Contact Number">
                </div>
                <div class="col-md-6 form-group">
                    <label for="exampleInputPassword1">Mobile Number</label>
                    <input type="text" class="form-control" name="mobile_no"  placeholder="Mobile Number">
                </div>
                  <div class="col-md-6 form-group">
                    <label for="exampleInputPassword1">Address</label>
                    <input type="text" class="form-control" name="address" placeholder="Address">
                </div>
                 
                 <div class="col-md-6 form-group">
                    <label for="exampleInputPassword1">From Date</label>
                    <input type="date" class="form-control" name="fromDate" value='<?php echo date("d-m-Y");?>' min="<?php echo date('Y-m-d') ?>">
                </div>
                <div class="col-md-6 form-group">
                    <label for="exampleInputPassword1">To Date</label>
                    <input type="date" class="form-control" name="toDate" value='<?php echo date("d-m-Y");?>' min="<?php echo date('Y-m-d') ?>">
                </div>
               
              
                <div class="col-md-6 form-group">
                    <label for="exampleInputPassword1">Profile Image</label>
                    <input type="file" name="profile_image" class="form-control"  >
                </div>
                 <div class="col-md-6 form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="password"  placeholder="Password">
                </div>
                <div class="col-md-6 form-group">
                    <label for="exampleInputPassword1">Approve</label>
                    <input type="checkbox" name="check">
                </div>
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