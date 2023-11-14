<?php
  include('connection.php');
  $id = $_GET['id'];

   $sql = "DELETE FROM latest_update WHERE id=$id";
   $query = mysqli_query($conn,$sql);
    if ($query==true) {
      echo '<script type="text/javascript">alert("Deleted successfully")</script>';
      echo "<script>location.href='latest_update.php'</script>";
    }else{

       echo '<script type="text/javascript">alert("Data not Deleted")</script>';
        header('delete_update1.php');

    }

?>