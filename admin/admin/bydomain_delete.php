<?php
include('connection.php');
$id = $_GET['id'];

$sql = "DELETE FROM bydomain WHERE id=$id";
$query = mysqli_query($conn,$sql);
if ($query==true) {
    echo '<script type="text/javascript">alert("Deleted successfully")
        </script>';
     echo "<script>location.href='bydomain.php'</script>";
    //header('students.php');
}else{

      echo '<script type="text/javascript">alert("Data not Deleted")
        </script>';
    header('bydomain_delete.php');

}

?>