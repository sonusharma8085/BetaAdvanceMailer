<?php
include('connection.php');
$id = $_GET['id'];

$sql = "DELETE FROM categories WHERE id=$id";
$query = mysqli_query($conn,$sql);
if ($query==true) {
    echo '<script type="text/javascript">alert("Deleted successfully")</script>';
     echo "<script>location.href='categories.php'</script>";
    //header('students.php');
}else{

      echo '<script type="text/javascript">alert("Data not Deleted") </script>';
    header('categories_delete.php');

}

?>