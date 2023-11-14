<?php include('include/header.php'); 
include('include/sidebar.php');
include('connection.php');
?>
<?php 
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
<h1 class="m-0">Mailer Contact</h1>
</div><!-- /.col -->
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<a href="user_data35_download.php" class="btn btn-primary" target="_blank">Data Export</a>
<a class="text-right" data-toggle="modal" data-target="#exampleModal" data-placement="top" title="Add" ><i class="material-icons">add</i></a>
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
<td>SNo.</td>
<td>First Name</td>
<td>Last Name</td>
<td>Email</td>
<td>Contact</td>
<td>State</td>
<td>City</td>
<td>Description</td>
<td>Date</td>
<td>Action</td>
</tr>
<?php 
$query = "SELECT * FROM maller_contact";
$sql   = mysqli_query($conmailer,$query);
while($row = mysqli_fetch_array($sql)){
?>
<tr class="text-center">
<td><?php echo $row["id"]; ?></td>
<td><?php echo $row["first_name"]; ?></td>
<td><?php echo $row["last_name"]; ?></td>
<td><?php echo $row["email"]; ?></td>
<td><?php echo $row["mobileno"]; ?></td>
<td><?php echo $row["city"]; ?></td>
<td><?php echo $row["state"]; ?></td>
<td><?php echo $row["description"]; ?></td>
<td><?php echo $row['current_date']; ?></td>
                                              
<!--<td><!-- <a data-toggle="tooltip" data-placement="top" title="update" href="afiliat_update.php?id=<?php echo $row["id"]; ?>"><i class='far fa-edit' ></i></a> -->       
<td> <a data-toggle="tooltip" data-placement="top" title="delete" href="mailer_contact_delete.php?id=<?php echo $row["id"]; ?>"><i class='far fa-trash-alt' ></i></a></td>
</tr>
<?php
}
?>
</table>
</div>
<!-- /.row -->
<!-- Main row -->
<!-- /.row (main row) -->
</div><!-- /.container-fluid -->
<br><br>
        
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