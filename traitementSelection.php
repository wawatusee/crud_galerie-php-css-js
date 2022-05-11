<?php
if (isset($_GET["fileName"])){
    $newFileSelected=$_GET["fileName"];
    echo $newFileSelected;
    echo "coucou";
}else{
    echo "pas passé le GET";
}
?>