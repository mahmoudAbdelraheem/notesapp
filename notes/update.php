<?php

include ("../connect.php");

$title = filterRequest("new_title");
$content = filterRequest("new_content");
$note_id = filterRequest("note_id");


$stmt = $con->prepare("UPDATE `notes` SET `note_title`=? , `note_content`=? WHERE note_id = ?");

$stmt->execute(array($title , $content , "$note_id"));
$count = $stmt->rowCount();

if($count > 0 ){
    echo json_encode(array("status" => "success"));
}else {
    echo json_encode(array("status"=> "falid"));
}




?>