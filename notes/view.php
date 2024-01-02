<?php

include ("../connect.php");

$id = filterRequest("u_id");



$stmt = $con->prepare("SELECT * FROM `notes` WHERE note_user= ?");

$stmt->execute(array($id));
$count = $stmt->rowCount();
// get the user name data 
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

if($count > 0 ){

    echo json_encode(array("status" => "success", "data" => $data));
}else {
    echo json_encode(array("status"=> "falid"));
}




?>