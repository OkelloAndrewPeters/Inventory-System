<?php

function redirect($url) {
    header('Location: '.$url);
    die();
}

$con = new mysqli("localhost", "root", "", "inventory");

if (isset($_POST['inventoryBtn'])){ 
    // get all of the form data 
    $item = $_POST['item']; 
    $modal= $_POST['modal']; 
    $status= $_POST['status']; 
    $date_of_aquisition = $_POST['date_of_aquisition']; 
    $total = $_POST['total'];
   
    // next code block 

    if ($item != "" && $modal != "" && $status != "" && $date_of_aquisition != "" && $total != "") {
    	$error_msg = "Please fill out all the fields";
    }

    $var = mysqli_query($con, "INSERT INTO inventory_list VALUES (
    '{$id}', '{$item}', '{$modal}', '{$status}', '{$date_of_aquisition}', '{$total}')");


    redirect('dashboard.php');
}
	
?>