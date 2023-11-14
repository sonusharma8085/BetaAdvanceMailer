
<?php include('include/header.php'); 
include('include/sidebar.php');
include('connection.php');
?>
<?php 
error_reporting(0);
session_start();
date_default_timezone_set('Asia/Kolkata');
$currentTime = date( 'Y-m-d h:i:s', time () );
?>
<?php 
if (isset($_POST['submit'])) {

if(isset($_POST['submit'])) {
$heading = $_POST['heading'];
$title = $_POST['title'];
$planvalid = $_POST['planvalid'];
$price = $_POST['price'];
$features = $_POST['features'];

$sql = "INSERT INTO `promotional`(`heading`, `title`, `price`,`planvalid`, `features`)
VALUES ('$heading','$title','$price','$planvalid','$features')";

$mysql = mysqli_query($conn,$sql);
//print_r($sql);die();
if ($mysql==true) {
echo '<script type="text/javascript">alert("Promotional Add Succesfully")
</script>';
echo "<script>location.href='promotional.php'</script>";
}else{
   
header('location:add-list.php');
echo '<script type="text/javascript">alert("Promotional not")
</script>';
}
   
}
}
?>
<div class="content-wrapper">
<section class="content">
<div class="container-fluid">
<br>
<div class="row">
<div class="col-md-12">
<h1>Add Promotional</h1>
</div>
<!--  <div class="col-md-6">
<a href="swdevelatest.php" class="text-right" data-placement="top" title="Add" ><i class="material-icons">add</i></a>
</div> -->
</div>
</div>
<br>
<div class="row col-md-8">
<div class="container">
    <form method="post" action="">
        <div class="form-group">
            <label for="exampleInputPassword1">Heading</label>
            <input type="text" class="form-control" name="heading"  placeholder="Enter heading">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Title</label>
            <input type="text" class="form-control" name="title"  placeholder="Enter Title">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Price</label>
            <input type="text" class="form-control" name="price"  placeholder="Enter Price">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Planvalid</label>
            <input type="text" class="form-control" name="planvalid"  placeholder="Enter Planvalid">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Features</label>
            <input type="text" class="form-control" name="features"  placeholder="Enter features">
        </div>
        <button type="submit" name="submit" class="btn btn-primary btn-sm">Submit</button>
    </form>
</div>
</div>
</div>
</div>
<!-- /.container-fluid -->
</section>
</div>
            
<?php include('include/footer.php'); ?>
