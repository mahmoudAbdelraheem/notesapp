<?php

include ("../connect.php");

$title = filterRequest("title");
$content = filterRequest("content");
$user_id = filterRequest("user_id");



if(!isset($_FILES['file'])) {
    // if there is no image uploaded with note 
    // the note will take the defualt image note.png
    $image_name = 'note.png';
    $stmt = $con->prepare("
INSERT INTO `notes`(`note_title`, `note_content`, `note_user`,`note_image`)
 VALUES (?,?,?,?)");

$stmt->execute(array($title , $content , "$user_id",$image_name ));
$count = $stmt->rowCount();

if($count > 0 ){
    echo json_encode(array("status" => "success"));
}else {
    echo json_encode(array("status"=> "falid"));
}


}else{
    $image_name =  uploadImage('file');
    if($image_name !='faild'){

$stmt = $con->prepare("
INSERT INTO `notes`(`note_title`, `note_content`, `note_user`,`note_image`)
 VALUES (?,?,?,?)");

$stmt->execute(array($title , $content , "$user_id",$image_name ));
$count = $stmt->rowCount();

if($count > 0 ){
    echo json_encode(array("status" => "success"));
}else {
    echo json_encode(array("status"=> "falid"));
}
    }
}



?>