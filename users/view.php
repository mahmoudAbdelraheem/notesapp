<?php

include ("../connect.php");



$stmt = $con->prepare("SELECT * FROM `users`");

$stmt->execute(array());
$count = $stmt->rowCount();
// get the user name data 
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

if($count > 0 ){

    echo json_encode(array("status" => "success", "data" => $data));
}else {
    echo json_encode(array("status"=> "falid"));
}




?>