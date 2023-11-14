<?php
   include('connection.php');
   $id = $_GET['id'];

    $sql = "DELETE FROM product WHERE id='$id' ";
    $query = mysqli_query($conn,$sql);
      if ($query==true) {
        echo '<script type="text/javascript">alert("Deleted successfully")</script>';
        echo "<script>location.href='product.php'</script>";
       //header('students.php');
     }else{

      echo '<script type="text/javascript">alert("Product not Deleted")</script>';
      header('product_delete.php');

   }
?>