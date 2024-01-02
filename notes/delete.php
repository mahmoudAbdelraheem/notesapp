<?php

include ("../connect.php");

$note_id = filterRequest("note_id");
$image_name = filterRequest("image_name");



$stmt = $con->prepare("DELETE FROM `notes` WHERE `note_id`=?");

$stmt->execute(array($note_id));
$count = $stmt->rowCount();


if($count > 0 ){
    deleteImage("../upload" ,$image_name);
    echo json_encode(array("status" => "success"));
}else {
    echo json_encode(array("status"=> "falid"));
}




?>