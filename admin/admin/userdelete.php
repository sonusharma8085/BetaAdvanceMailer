<?php
include('connection.php');

$id = $_POST['id'];


$updateQuwery = "DELETE FROM admin WHERE id='$id'";
// print_r($updateQuwery);die();
mysqli_query($conmailer,$updateQuwery);

// $this->db->where('id', $id);
// $this->db->update('admin', $data);

$_SESSION['success'] = 'User Delete Succesfully!';
header('location: UserApproval.php');
// redirect('UserApproval');

?>