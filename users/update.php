<?php
include ("../connect.php");

$user_id = filterRequest("user_id");
$name = filterRequest("new_name");
$email = filterRequest("new_email");
$pass = filterRequest("new_pass");


$stmt = $con->prepare("UPDATE `users` SET `u_name`=? , `u_email`=? , `u_pass` =? WHERE u_id = ?");

$stmt->execute(array($name , $email , $pass , $user_id));
$count = $stmt->rowCount();

if($count > 0 ){
    echo json_encode(array("status" => "success"));
}else {
    echo json_encode(array("status"=> "falid"));
}


?>