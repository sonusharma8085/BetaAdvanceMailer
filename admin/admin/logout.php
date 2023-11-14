<?php
   include('connection.php');

   session_start();
   if (isset($_SESSION['userid'])) {
        session_destroy();
     echo "<script>location.href='login.php'</script>";
   }else{
      echo "<script>location.href='login.php'</script>";
   }
   
   //header('location:login.php');
?>