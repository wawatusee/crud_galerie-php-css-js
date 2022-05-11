<!DOCTYPE html>
<?php
if (isset($_GET["fileName"])){
    $newFileSelected=$_GET["fileName"];
    echo $newFileSelected;
}else{
    echo "pas passé le GET";
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <img src="images/<?php echo $newFileSelected ?>" alt="Fichier sélectionné">
</body>
</html>
