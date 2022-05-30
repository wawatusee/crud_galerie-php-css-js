<?php
$url="images/min";
 if(isset($_POST["fileToDestry"])){
    $fileTodestry=$_POST["fileToDestry"];
    echo "Fichier à détruire :";
    var_dump($fileTodestry);
    destroyImages($fileTodestry);
}
function destroyImages($fileName){
    unlink("images/min/".$fileName);
    unlink("images/".$fileName);
}
