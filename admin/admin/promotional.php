<?php include('include/header.php'); 
include('include/sidebar.php');

error_reporting(0);
session_start();

// if (!isset($_SESSION['id'])){
//    echo "<script>location.href='login.php'</script>";
//   //('location:login.php');
// }
?>
<?php 

if (isset($_POST['submit'])) {
$heading = $_POST['heading'];
$title = $_POST['title'];
$planvalid = $_POST['planvalid'];
$features = $_POST['features'];

$sql = "INSERT INTO `crud`(`id`, `heading`, `title`, `planvalid`, `features`)
VALUES (NULL,'$heading','$title','$planvalid','$features')";
$mysql = mysqli_query($conn,$sql);
if ($mysql==true) {
    
echo '<script type="text/javascript">alert("Succesfully Category Inserted")</script>';
echo "<script>location.href='add-list.php'</script>";
}else{

header('location:add-list.php');
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
<h1 class="m-0">Promotional</h1>
</div><!-- /.col -->
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<a href="add-list.php"><i class="material-icons">add</i></a>
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
<th>Heading</th>
<th>Title</th>
<th>Price</th>
<th>Planvalid</th>
<th>features</th>
<th>Action</th>
</tr>

<?php 
$sql =  "SELECT * FROM `promotional`";
$sqlikey = mysqli_query($conn,$sql);
$i=1;
while($result= mysqli_fetch_assoc($sqlikey)){
$id = $result['id'];
// print_r( $cat_id);
?>
<tr class="text-center">
<td><?php echo $i ?></td>
<td><?php echo $result['heading'] ?></td>
<td><?php echo $result['title'] ?></td>
<td><?php echo $result['price'] ?></td>
<td><?php echo $result['planvalid'] ?></td>
<td><?php echo $result['features'] ?></td>
                        
                        
<td><a href="promotional_update.php?id=<?php echo $result["id"]; ?>"><i class='far fa-edit' ></i></a>       
<a href="promotional_delete.php?id=<?php echo $result["id"]; ?>"><i class='far fa-trash-alt' ></i></a></td>
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
<h5 class="modal-title text-center" id="exampleModalLabel">Promotional Add</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<div class="row">
<div class="container">

<form action="" method="POST">
</div>
<br>
<button type="submit" name="submit" class="btn btn-primary ">Submit</button>
</form>

</div>
</div>
</div>
</div>
</div>
</div>
<br><br>

<script type="text/javascript">
$('#myModal').on('shown.bs.modal', function () {
$('#myInput').trigger('focus')
})
</script>
<!-- /.content-wrapper -->          
            





<?php include('include/footer.php'); ?>

 