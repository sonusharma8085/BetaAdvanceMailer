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
    
if (isset($_POST['submit'])) {

// $tittle      =  $_POST['tittle'];
$categories  =  $_POST['categories'];
//   $sub_tittle  =  $_POST['sub_tittle'];
//   $massage     =  $_POST['massage'];
//   $photo = $_FILES['image'];
//   $file        =  $photo['name'];
//   $filepath    =  $photo['tmp_name'];
//   $filerror   =  $photo['error'];
//   $destfile   = 'upload/'.$file;

//   move_uploaded_file($filepath, $destfile);

$sql = "INSERT INTO `categories`(`categories`) VALUES ($categories')";
$mysql = mysqli_query($conn,$sql);
// print_r($sql);die();
if ($mysql==true) {
echo '<script type="text/javascript">alert("Succesfully Category Inserted")</script>';
echo "<script>location.href='categories.php'</script>";
}else{
header('location:categories.php');
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
<h1 class="m-0">Product</h1>
</div><!-- /.col -->
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<a href="user_data3_download.php" class="btn btn-primary" target="_blank">Data Export</a>
<a href="add-product.php"><i class="material-icons">add</i></a>
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
<tr>
<th>#</th>
<th>Image</th>
<th>Product Name</th>
<th>Title</th>
<th>Price</th>
<th>Subtitle</th>
<th>Category Name</th>
<th>Action</th>
</tr>
            
<?php 
$sql =  "SELECT * FROM `product`";
$sqlikey = mysqli_query($conn,$sql);
$i=1;
while($result= mysqli_fetch_assoc($sqlikey)){
$cat_id = $result['cat_id'];
// print_r( $cat_id);
?>
                    
<tr class="text-center">
<td><?php echo $i ?></td>
<td> <img src="<?php echo $result['image'] ?>" height="50" width="50" ></td>
<td><?php echo $result['pname'] ?></td>
<td><?php echo $result['title'] ?></td>
<td><?php echo $result['price'] ?></td>
<td><?php echo $result['subtitle'] ?></td>
<?php 
$slq1 = "SELECT * FROM `categories` WHERE id='$cat_id'";
//print_r($slq1);
$mysqlt = mysqli_query($conn,$slq1);
$catdata = mysqli_fetch_assoc($mysqlt);
?>
<td><?php echo $catdata['categories'] ?></td>
<td><a href="product_update.php?id=<?php echo $result["id"]; ?>"><i class='far fa-edit' ></i></a>       
<a href="product_delete.php?id=<?php echo $result["id"]; ?>"><i class='far fa-trash-alt' ></i></a></td>
                </tr>
<?php 
$i++;
} ?>
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
<h5 class="modal-title text-center" id="exampleModalLabel">Product Add</h5>
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
<label> :-</label>
<input type="text" name="categories" required="" placeholder="Enter categories"></input>
</div>
<!--<div class="col-sm-6">-->
<!--  <label>Sub Tittle :-</label>-->
<!--  <input type="text" name="sub_tittle" required="" placeholder="Enter Sub Tittle"></input>-->
<!--</div>-->
</div>
<!--<div class="row">-->
<!--   <div class="col-sm-6">-->
<!--    <label>Categories :-</label>-->
<!--    <intup type="text" name="categories" required="" placeholder="Enter Categories"></input>-->
<!--  </div> -->-->
<!--  <div class="col-sm-6">-->
<!--    <label>Choose Images :-</label>-->
<!--    <input type="file" name="image"></input>-->
<!--  </div>-->
<!--</div>-->
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