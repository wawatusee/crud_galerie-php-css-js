<?php 
//Import du fichier json source
$jsonImageTaquin=json_decode(file_get_contents("js/image-taquin.json"));
//Récupération du nom de l'image source
$selectedImage=$jsonImageTaquin->image_taquin;
?>
<!DOCTYPE html>
<!--Traitement des données entrantes-->
<?php
//Si GET est reçu, le nom du fichier sélectionnée est stoqué 
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
        <h2>Validation fichier sélectionné</h2>
    </section>
    <section class="gallery">
        <figure class="min">
            <img src="images/min/<?php echo $selectedImage; ?>" title="Image Taquin actuelle"/>
            <figcaption><div class="titleFigcaption">Fichier actuel :</div><div></div><?php echo $selectedImage; ?></div></figcaption>
        </figure>
        <figure class="min">
            <img src="images/min/<?php echo $newFileSelected; ?>"/>
            <figcaption><div class="titleFigcaption">Fichier selectionné :</div><div><?php echo $newFileSelected; ?></div></figcaption>
        </figure>
    </section>
    <code><?php var_dump($jsonImageTaquin); ?></code>
    <?php
    function saveNewNameToJson(string $content,string $location="js/image-taquin.json"){
        $jsonImageTaquin->image_taquin=$content;
    }
    ?>
    <form action="" method="POST">
        <fieldset>
        <legend>Voulez vous remplacer?</legend>
        <label type="text" name="selectedImage" value="<?php echo $selectedImage; ?>"><?php echo $selectedImage; ?></label><br>
        <label type="text" name="newFileSelected" value="<?php echo $newFileSelected; ?>">par <?php echo $newFileSelected; ?></label>
        <button type="submit">Remplacer</button>
        </fieldset>
    </form>
</body>
</html>
