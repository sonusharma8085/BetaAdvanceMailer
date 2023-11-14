<?php
include('connection.php');

$id = $_GET['id'];

$sql = "DELETE FROM smtp WHERE id= $id";
$mysql = mysqli_query($conn,$sql);
if($mysql==true){
    echo '<script type="text/javascript">alert("Succesfully Data Delete")
        </script>';
    echo "<script>location.href='email_data.php'</script>";
}else{
    echo '<script type="text/javascript">alert(" Data Not Delete")
        </script>';
    echo "<script>location.href='email_data.php'</script>";
}

?>