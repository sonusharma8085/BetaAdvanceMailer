<?php
include('connection.php');
$id = $_GET['id'];

$sql = "DELETE FROM latest_arti_img WHERE id=$id";
$query = mysqli_query($conn,$sql);
if ($query==true) {
     echo '<script type="text/javascript">alert("Deleted successfully")</script>';
     echo "<script>location.href='latest-articles-img.php'</script>";
    //header('students.php');
}else{

      echo '<script type="text/javascript">alert("Data not Deleted")</script>';
      header('latest-art-img-delete.php');

}

?>