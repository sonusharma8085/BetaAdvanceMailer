<?php
include('connection.php');
$id = $_GET['id'];

$sql = "DELETE FROM emailmarketing WHERE id=$id";
$query = mysqli_query($conn,$sql);
if ($query==true) {
    echo '<script type="text/javascript">alert("Deleted successfully")
        </script>';
     echo "<script>location.href='emailmarketing.php'</script>";
    //header('students.php');
}else{

      echo '<script type="text/javascript">alert("Data not Deleted")
        </script>';

      echo "<script>location.href='emailmarketing_delete.php'</script>";  
    //header('app_delete.php');

}

?>