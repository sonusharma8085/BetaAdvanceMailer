<?php
include('connection.php');

$id = $_GET['id'];


$updateQuwery = "DELETE FROM maller_contact WHERE id='$id'";
// print_r($updateQuwery);die();
mysqli_query($conmailer,$updateQuwery);

// $this->db->where('id', $id);
// $this->db->update('admin', $data);

$_SESSION['success'] = 'User Delete Succesfully!';
header('location: mailler_contact.php');
// redirect('UserApproval');

?>