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
$title      =  $_POST['title'];
$subtitle     =  $_POST['subtitle'];
$photo = $_FILES['image'];
$file        =  $photo['name'];
$filepath    =  $photo['tmp_name'];
$filerror   =  $photo['error'];
$destfile   = 'upload/'.$file;
move_uploaded_file($filepath, $destfile);
$sql = "INSERT INTO `ourtools_slider`(`title`, `subtitle`, `image`, `created_at`) VALUES ('$title','$subtitle','$destfile','$currentTime')";
$mysql = mysqli_query($conn,$sql);
// print_r($sql);die();
if ($mysql==true) {
//header('location:afiliateimg.php');
echo '<script type="text/javascript">alert("Succesfully Data Inserted")</script>';
echo "<script>location.href='ourtools_slider.php'</script>";
}else{
header('location:ourtools-slider-add.php');
echo '<script type="text/javascript">alert("Data not Inserted")</script>';
}
}
?>
<div class="content-wrapper">
<section class="content">
<div class="container-fluid">
<br>
<div class="row">
<div class="col-md-12">
<h1>Add Ourtools Slider </h1>
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
<label for="exampleInputEmail1">Title</label>
<input type="text" name="title" class="form-control"  placeholder="Enter Title">
</div>
<div class="form-group">
<label for="exampleInputPassword1">Subtitle</label>
<input type="text" class="form-control" name="subtitle"  placeholder="Enter Subtitle">
</div>
<div class="form-group">
<label for="exampleInputPassword1">Image</label>
<input type="file" name="image" class="form-control"  placeholder="Enter Subtitle">
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