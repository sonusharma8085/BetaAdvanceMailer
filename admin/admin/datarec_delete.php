<?php
include('connection.php');
$id = $_GET['id'];

$sql = "DELETE FROM datarecover WHERE id=$id";
$query = mysqli_query($conn,$sql);
if ($query==true) {
    echo '<script type="text/javascript">alert("Deleted successfully")
        </script>';
     echo "<script>location.href='datarecovery.php'</script>";
    //header('students.php');
}else{

      echo '<script type="text/javascript">alert("Data not Deleted")
        </script>';
    header('affiliate_delete.php');

}

?>