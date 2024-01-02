<?php

include ("../connect.php");

$email = filterRequest("u_email");
$pass = filterRequest("u_pass");


$stmt = $con->prepare("SELECT * FROM `users` WHERE u_pass= ? AND u_email = ? ");

$stmt->execute(array($pass , $email));
$count = $stmt->rowCount();
// get the user name data 
$data = $stmt->fetch(PDO::FETCH_ASSOC);

if($count > 0 ){

    echo json_encode(array("status" => "success", "data" => $data));
}else {
    echo json_encode(array("status"=> "falid"));
}




?>