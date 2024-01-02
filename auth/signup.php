<?php

include ("../connect.php");

$name = filterRequest("u_name");
$email = filterRequest("u_email");
$pass = filterRequest("u_pass");


$stmt = $con->prepare("
INSERT INTO `users`(`u_name`, `u_email`, `u_pass`)
 VALUES (?,?,?)");

$stmt->execute(array($name , $email , $pass));
$count = $stmt->rowCount();

if($count > 0 ){
    echo json_encode(array("status" => "success"));
}else {
    echo json_encode(array("status"=> "falid"));
}




?>