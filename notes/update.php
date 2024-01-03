<?php

include ("../connect.php");

$title = filterRequest("new_title");
$content = filterRequest("new_content");
$image_name = filterRequest("note_image");
$note_id = filterRequest("note_id");

// if note image is update it will be true
if(isset($_FILES['file'])){
    // delete old image
    deleteImage("../upload" ,$image_name);
    // upload new image
    $image_name =uploadImage("file");
    

}


$stmt = $con->prepare("UPDATE `notes` SET `note_title`=? , `note_content`=? , `note_image` = ? WHERE note_id = ?");

$stmt->execute(array($title , $content,$image_name , "$note_id"));
$count = $stmt->rowCount();

if($count > 0 ){
    echo json_encode(array("status" => "success"));
}else {
    echo json_encode(array("status"=> "falid"));
}




?>