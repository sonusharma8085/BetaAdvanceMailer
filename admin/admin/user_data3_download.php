<?php
include('connection.php');
header('Content-type: application/vnd-ms-excel');
$filename="user_dala.xls";
header("Content-Disposition:attachement;filename=\"$filename\" ");
?>
<table class="table table-striped text-center table-bordered">
            
<tr>
<th>#</th>
<th>Product Name</th>
<th>Title</th>
<th>Price</th>
<th>Subtitle</th>
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
<td><?php echo $result['pname'] ?></td>
<td><?php echo $result['title'] ?></td>
<td><?php echo $result['price'] ?></td>
<td><?php echo $result['subtitle'] ?></td>
</tr>
<?php 
$i++;
} ?>
                 
</table>
