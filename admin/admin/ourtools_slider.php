<?php include('include/header.php'); 
include('include/sidebar.php');

error_reporting(0);
session_start();

if (!isset($_SESSION['userid'])){
echo "<script>location.href='login.php'</script>";
//('location:login.php');
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
<h1 class="m-0">Ourtools Slider</h1>
</div><!-- /.col -->
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<a href="user_data37_download.php" class="btn btn-primary" target="_blank">Data Export</a>
<a href="ourtools-slider-add.php"><i class="material-icons">add</i></a>
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
<th>Title</th>
<th>Subtittle</th>
<th>Action</th>
</tr>
            
<?php 
$sql =  "SELECT * FROM `ourtools_slider`";
$sqlikey = mysqli_query($conn,$sql);
$i=1;
while($result= mysqli_fetch_assoc($sqlikey)){
$cat_id = $result['id'];
?>
                    
<tr class="text-center">
<td><?php echo $i ?></td>
<td> <img src="<?php echo $result['image'] ?>" height="50" width="50" ></td>
<td><?php echo $result['title'] ?></td>
<td><?php echo $result['subtitle'] ?></td>
<td><a href="ourtools-slider-update.php?id=<?php echo $result["id"]; ?>"><i class='far fa-edit' ></i></a>       
<a href="ourtools-slider-delete.php?id=<?php echo $result["id"]; ?>"><i class='far fa-trash-alt' ></i></a></td>
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