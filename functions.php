<?php

define ("MB" , 1048576);

// this function for secure input data
function filterRequest ($request){
    return htmlspecialchars(strip_tags($_POST[$request]));
}

// for uploding images

function uploadImage($imageRequert){
    global $msgError;
    $imageName =  rand(100,10000) . $_FILES[$imageRequert]['name'];
    $imageTmp  = $_FILES[$imageRequert]['tmp_name'];
    $imageSize = $_FILES[$imageRequert]['size'];

    $allowExt   = array("png","jpg","gif","jpeg", "heic");
    $imageArray = explode(".", $imageName);
 
   $ext = end($imageArray);
   $ext = strtolower($ext);

   if(!empty($imageName && !in_array($ext , $allowExt))){
        $msgError[] = "Ext not found"; 
   }
   if($imageSize > 5 * MB){
        $msgError[] = "Image size is more than 5 MB";
   }
   if(empty($msgError)){
    move_uploaded_file($imageTmp , '../upload/' .$imageName);
   return $imageName;
   }else {
    return 'faild';
   }
}

//for delete an image from server
function deleteImage($dir , $imageName){
    if(file_exists($dir . '/' . $imageName ) && $imageName  != "note.png"){
        unlink($dir . '/' . $imageName );
        return 'success';
    }else {
        return 'faild';
    }
}



// for secure API with user name and password 
{
function checkAuthenticate(){
    if (isset($_SERVER['PHP_AUTH_USER'])  && isset($_SERVER['PHP_AUTH_PW'])) {

        if ($_SERVER['PHP_AUTH_USER'] != "memo" ||  $_SERVER['PHP_AUTH_PW'] != "mahmoud"){
            header('WWW-Authenticate: Basic realm="My Realm"');
            header('HTTP/1.0 401 Unauthorized');
            echo 'Page Not Found';
            exit;
        }
    } else {
        exit;
    }
}
}

?>