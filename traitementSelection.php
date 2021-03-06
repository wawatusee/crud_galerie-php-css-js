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
<?php
//Modification fichier enregistré
if(isset($_POST['newFileSelected'])){
    /////TODO//////Remplacer dans le json la valeur de image_taquin, sauvegarder dans js/image-taquin.json
    //Remplacer dans le json la valeur de image_taquin
    $jsonImageTaquin->image_taquin=$newFileSelected;
    //sauvegarder dans js/image-taquin.json
    //Le 3eme parametre devrait être rempli, peut-être avec lock-ex pour s'assurer qu'un seul administrateur change le fichier JSON
    //On aimerait un retour de cette action pour pouvoir passer à autre chose.
    $contentToSend=json_encode($jsonImageTaquin);
    $defaultImageChanged=file_put_contents("js/image-taquin.json",$contentToSend);
    //Quand le taquin par défaut a été changé, edirection vers page publique
    if($defaultImageChanged){
        header("Location:index.php");
    }

} else echo "aucun fichier remplacé";
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
    <h1>Page administration</h1><a href="index.php" target="_self" rel="noopener noreferrer">Taquin</a>
    </header>
    <article>
        <h2>Modification image</h2>
        <section class="gallery">
            <figure class="min">
                <img src="images/min/<?php echo $newFileSelected; ?>"/>
                <figcaption>
                    <div class="titleFigcaption">Fichier selectionné :</div>
                    <div><?php echo $newFileSelected; ?></div>
                </figcaption>
            </figure>
        </section>
        <?php
        //EN cours
        function saveNewNameToJson(string $content,string $location="js/image-taquin.json"){
            $jsonImageTaquin->image_taquin=$content;
        }
        ?>
    <!--Formulaire de validation de nouvelle image-->
        <form action="" method="POST">
                <fieldset>
                <legend>Nouvelle image du taquin</legend>
                <textarea name="newFileSelected" id=""><?php echo $newFileSelected; ?></textarea>
                <button type="submit">Valider</button>
            </fieldset>
        </form>
    </article>
    <fieldset><legend>README</legend>
        <p>Interface crud
            <H2>Done :</H2>
            <ul><li>Design perfect</li>
                <li>Charger Json</li>
                <li>Récupération objet en cours</li>
                <li>Cibler clé valeur nom fichier</li>
                <li>GET réception objet sélectionné</li>
                <li>Affichage de l'objet en cours et du nouvel objet sélectionné</li>
                <li>Construire formulaire</li>
                <li>Traitement conditionnel du formulaire</li>
                <li>Modifier clé valeur</li>
                <li>Updater json en ligne</li>
            </ul> , 
            <h2>ToDo :</h2>
            <ul>
                <li>Création de TESTS pour chaque action</li>
            </ul>
        </p>
    </fieldset>
</body>
</html>
