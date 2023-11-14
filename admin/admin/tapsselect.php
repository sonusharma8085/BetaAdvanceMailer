
<?php
    include('connection.php');

    $starus = $_POST['st'];
    $admid = $_POST['id'];
    $sql = "UPDATE `taps` SET `stats`='$starus' WHERE id='$admid'";
    
    $mysql = mysqli_query($conn,$sql);
    if ($mysql==true) {
    echo "success";
    }else{
         echo "failde";
   }
    
    
    
?>
