<?php
include('connection.php');
$id = $_GET['id'];
$sql = "DELETE FROM promotional WHERE id='$id' ";
$query = mysqli_query($conn,$sql);
if ($query==true) {
echo '<script type="text/javascript">alert("Deleted successfully")</script>';
echo "<script>location.href='promotional.php'</script>";
//header('students.php');
}else{

echo '<script type="text/javascript">alert("Product not Deleted")</script>';
header('promotional_delete.php');

}
?>