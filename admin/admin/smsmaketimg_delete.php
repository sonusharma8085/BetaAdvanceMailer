<?php
include('connection.php');
$id = $_GET['id'];

$sql = "DELETE FROM smsmarketing_img WHERE id=$id";
$query = mysqli_query($conn,$sql);
if ($query==true) {
    echo '<script type="text/javascript">alert("Deleted successfully")
        </script>';
     echo "<script>location.href='smsmarketing.php'</script>";
    //header('students.php');
}else{

      echo '<script type="text/javascript">alert("Data not Deleted")
        </script>';
    header('smsmarketing_img_delete.php');

}

?>