<?php
include('connection.php');

  $id= $_GET['id'];
  $query= "DELETE FROM mailer WHERE id = $id";
  $mysql = mysqli_query($conn,$query);
  if($mysql==true){
      echo '<script type="text/javascript">alert("Deleted successfully")
        </script>';
     echo "<script>location.href='emaildata.php'</script>";
  }else{
     echo '<script type="text/javascript">alert("Not Data Deleted")
        </script>';
     echo "<script>location.href='emaildata.php'</script>"; 
  }

?>