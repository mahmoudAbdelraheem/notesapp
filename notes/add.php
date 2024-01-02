<?php

include ("../connect.php");

$title = filterRequest("title");
$content = filterRequest("content");
$user_id = filterRequest("user_id");
//$image_name =  uplodImage('file');

//if($image_name !='faild'){
$stmt = $con->prepare("
INSERT INTO `notes`(`note_title`, `note_content`, `note_user`)
 VALUES (?,?,?)");

$stmt->execute(array($title , $content , "$user_id" ));
$count = $stmt->rowCount();

if($count > 0 ){
    echo json_encode(array("status" => "success"));
}else {
    echo json_encode(array("status"=> "falid"));
}

//}




?>