<?php 
//Import du fichier json source
$jsonImageTaquin=json_decode(file_get_contents("js/image-taquin.json"));
//Récupération du nom de l'image source
$selectedImage=$jsonImageTaquin->image_taquin;
?>
<!DOCTYPE html>
<?php
if (isset($_GET["fileName"])){
    $newFileSelected=$_GET["fileName"];
}else{
    echo "pas passé le GET";
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" media="screen" href="css/screen.css" />
    <title>Selection fichier</title>
</head>
<body>
<header>
    <h1>Page administration</h1><a href="../" target="_self" rel="noopener noreferrer">Retour Page principale</a>
    </header>
    <section>
        <h2>Validation image sélectionnée</h2>
    </section>
    <section class="gallery">
        <div class="min">
            <h3>Image selectionnée</h3>
            <img src="images/min/<?php echo $newFileSelected; ?>"/>
            <figcaption><?php echo $newFileSelected; ?></figcaption>
        </div>
        <div class="min">
            <h3>Image Taquin actuelle</h3>
            <img src="images/min/<?php echo $selectedImage; ?>"/>
            <figcaption><?php echo $selectedImage; ?></figcaption>
        </div>
    </section>
</body>
</html>
