<?php
include('connection.php');
header('Content-type: application/vnd-ms-excel');
$filename="user_dala.xls";
header("Content-Disposition:attachement;filename=\"$filename\" ");
?>
<table class="table table-striped text-center table-bordered">
            
<tr>
<td>SNo.</td>
<td>Categories</td>
</tr>
<?php  $i=1;
$query = "SELECT * FROM categories";
$sql   = mysqli_query($conn,$query);
while($row = mysqli_fetch_array($sql)){
                
?>
<tr class="text-center">
<td><?php echo $i; ?></td>
<td><?php echo $row["categories"]; ?></td>
</tr>

<?php $i++;
}
?>
</table>
