<?php
include('connection.php');
$id = $_GET['id'];

$sql = "DELETE FROM byhosting WHERE id=$id";
$query = mysqli_query($conn,$sql);
if ($query==true) {
    echo '<script type="text/javascript">alert("Deleted successfully")
        </script>';
     echo "<script>location.href='hosting.php'</script>";
    
}else{

      echo '<script type="text/javascript">alert("Data not Deleted")
        </script>';
    header('hosting_delete.php');

}

?>