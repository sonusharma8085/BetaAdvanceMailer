<?php
include('connection.php');
header('Content-type: application/vnd-ms-excel');
$filename="user_dala.xls";
header("Content-Disposition:attachement;filename=\"$filename\" ");
?>
<table class="table table-striped text-center table-bordered">
<tr>
<th>#</th>
<th>Title</th>
<th>Subtittle</th>
<th>Description</th>
</tr>
            
<?php 
$sql =  "SELECT * FROM `latest_articles`";
$sqlikey = mysqli_query($conn,$sql);
$i=1;
while($result= mysqli_fetch_assoc($sqlikey)){
$cat_id = $result['id'];
?>
                    
<tr class="text-center">
<td><?php echo $i ?></td>
<td><?php echo $result['title'] ?></td>
<td><?php echo $result['subtitle'] ?></td>
<td><?php echo $result['description'] ?></td>
</tr>
<?php 
$i++;
} ?>
                 
</table>
</div>