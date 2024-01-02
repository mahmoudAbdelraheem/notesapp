<?php

$fileName = 'logo.png';


$seperateFile = explode(".", $fileName);
$ext = end($seperateFile);

$allowExt = array("png","jpg","gif","jpeg");

if(in_array($ext, $allowExt)){
    echo"yes";
}
else{
    
    echo"No";
}

?>