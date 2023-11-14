<?php
include('connection.php');
$fromdate  =  date("Y-m-d", strtotime($_POST['formDate']));
$toDate  =  date("Y-m-d", strtotime($_POST['toDate']));
$approval = 0;
if(isset($_POST['chekApprov'])){
    $approval = 1;
}
$id = $_POST['hdnID'];

$data['formdate'] = $fromdate;
$data['todate'] = $toDate;
$data['approval'] = $approval;
$updateQuwery = "UPDATE admin SET formdate='$fromdate',todate='$toDate',approval='$approval' WHERE id='$id'";
// print_r($updateQuwery);die();
mysqli_query($conmailer,$updateQuwery);

// $this->db->where('id', $id);
// $this->db->update('admin', $data);

$_SESSION['success'] = 'Plan approve Succesfully!';
header('location: UserApproval.php');
// redirect('UserApproval');

?>