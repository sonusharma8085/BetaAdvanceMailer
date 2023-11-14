<?php
include('connection.php');
header('Content-type: application/vnd-ms-excel');
$filename="user_dala.xls";
header("Content-Disposition:attachement;filename=\"$filename\" ");
?>
<table class="table table-striped text-center table-bordered">
            
<tr>
<td>SNo.</td>
<td>Fullname</td>
<td>FatherNmae</td>
<td>Post Apply</td>
<td>Mobile Nnumber</td>
<td>Email</td>
<td>City</td>
<td>State</td>
<td>JobType</td>
<td>Check</td>
</tr>
<?php 
$query = "SELECT * FROM career";
$sql   = mysqli_query($conn,$query);
while($row = mysqli_fetch_array($sql)){
                
?>
<tr class="text-center">
<td><?php echo $row["id"]; ?></td>
<td><?php echo $row["full_name"]; ?></td>
<td><?php echo $row["father_name"]; ?></td>
<td><?php echo $row["post_apply"]; ?></td>
<td><?php echo $row["mobile_number"]; ?></td>
<td><?php echo $row["email"]; ?></td>
<td><?php echo $row["city"]; ?></td>
<td><?php echo $row["state"]; ?></td>
<td><?php echo $row["jobtype"]; ?></td>
<td><?php echo $row["check"]; ?></td>
</tr>
<?php
}
?>
</table>