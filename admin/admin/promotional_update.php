<?php include('include/header.php'); 
    include('include/sidebar.php');
 
error_reporting(0);
session_start();
?>
<?php

$id = $_POST['hdnid'];

$sql   = mysqli_query($conn,"SELECT * FROM promotional WHERE id ='".$_GET['id']."'");
$row   = mysqli_fetch_array($sql);
if (isset($_POST['submit'])) {

//print_r($id);die();

      
$heading     =  $_POST['heading'];
$title     =  $_POST['title'];
$price = $_POST['price'];
$planvalid  =  $_POST['planvalid'];
$features  =  $_POST['features'];

$sql = "update promotional set title= '$title',heading= '$heading', planvalid='$planvalid',features='$features',price='$price' WHERE id =$id";
$mysql = mysqli_query($conn,$sql);
// print_r($sql);die();
if ($mysql==true) {
//header('location:affiliatemarketing.php');
echo '<script type="text/javascript">alert("Succesfully Data update")</script>';
echo "<script>location.href='promotional.php'</script>";
}else{

echo '<script type="text/javascript">alert("Data not update")</script>';
header('location:promotional_update.php');
}

}

?>
    
<div class="content-wrapper">
<section class="content">
<div class="container-fluid">
<br>
<div class="row">
<div class="col-md-12">
<h1>Update Promotional</h1>
</div>
</div>
</div>
<br>
<div class="row col-md-8">
    <div class="container">
        <form method="post" action="">
            <div class="form-group">
                <input type="hidden" name="hdnid" value="<?php echo $row['id'] ?>">
                <label for="exampleInputPassword1">Title</label>
                <input type="text" class="form-control" name="title"  placeholder="Enter Title" value="<?php echo $row['title'] ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Heading</label>
                <input type="text" class="form-control" name="heading"  placeholder="Enter Heading" value="<?php echo $row['heading'] ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Price</label>
                <input type="text" class="form-control" name="price"  placeholder="Enter Price" value="<?php echo $row['price'] ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Planvalid</label>
                <input type="text" class="form-control" name="planvalid"  placeholder="Enter Planvalid" value="<?php echo $row['planvalid'] ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Features</label>
                <input type="text" class="form-control" name="features"  placeholder="Enter Features" value="<?php echo $row['features'] ?>">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
</div>
</div>
<!-- /.container-fluid -->
</section>
</div>
<!-- /.content-wrapper -->
<?php include('include/footer.php'); ?>