<?php 
    if(!empty($_FILES)){
        require_once("imgClass.php");//J'importe la class image de Grafikart
        print_r($_FILES['img']);
        $img=$_FILES['img'];//Stoquer dans img les images uploadées via la méthode http post
        $incoming_format=strtolower(substr($img['name'], -3));//transforme en minuscule l'extension des fichiers récupérée grace à la méthode substr
        $allowed_format=array("jpeg","jpg","png","gif");//Lister dans un tableau les formats d'images acceptés
        echo "'extension du fichier entrant '.$incoming_format";
        if(in_array($incoming_format,$allowed_format)){//Si le format de l'image fait partie des formats tolérés 
        move_uploaded_file($img['tmp_name'],"images/".$img['name']);//Bouger l'image dans le répertoire prévu avec son nom initial
        Img::creerMin("images/".$img['name'],"images/min",$img['name'],215,112);//Avec une méthode de la classe image de Grafikart créer une miniature stoquée dans le répertoire désiré 
        img::convertirJPG("images/".$img['name']);//Toujours avec une méthode grafikart, convertir l'image en jpg
        }
        else {
            echo "Ce fichier n'est pas au format accepté.";//Sinon on prévient le client que le format de l'image n'était pas bon
        }
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <script type="text/javascript" src="zoombox/jquery.js"></script>
    <script type="text/javascript" src="zoombox/zoombox.js"></script> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>upload-images_grafikart</title>
    <link rel="stylesheet" type="text/css" media="screen" href="css/screen.css" />
    <link href="zoombox/zoombox.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
    <header>
        <h1>Page administration</h1><a href="../" target="_self" rel="noopener noreferrer">Retour Page principale</a>
    </header>
    <section class="tutorial">
        <h2>Gestion images sources</h2>
    </section>
    <article>
        <?php
        if(isset($erreur)){
            echo $erreur;
        }
        ?>
        <form method="post" action="index.php" enctype ="multipart/form-data">
            Ajouter une image
            <input class="file" type="file" name="img"/>
            <input class="submit" type="submit" name="Upload">
        </form>
        <section class="gallery">
        <?php 
        $dos="images/min";//Donner le chemin des miniatures
        $dir=opendir($dos);//Ouvrir le répertoire des miniatures
        while($file=readdir($dir)){//Pour chacune des images du dossier
            $imageName=substr($file,0,-4);
            $allowed_format=array("jpeg","jpg","gif","png");//Définir les formats d'images acceptés
            $incoming_format=strtolower(substr($file,-3));//Convertir l'extension de l'image en minuscules
            if(in_array($incoming_format,$allowed_format)){//Si les formats du fichier sont acceptés
             ?>
             <div class="min">
                 <a href="images/<?php echo $file; ?>" rel="zoombox[galerie]">
                      <img src="images/min/<?php echo $file; ?>"/>
                </a>
                <form action="traitement.php" method="post">
                    <input type="radio" id="<?php  echo $imageName ?>" name="defaultTaquin" value="The good one" checked>
                    <label for="<?php  echo $imageName ?>"><?php  echo $imageName ?></label>
                    <input type="button" value="-">
                </form>
            </div>
            <?php
                }
            }
            ?>
        </section>
        <p>Transform in CRUD,
            <ul>
                <li> uploader file(ok)</li>
                <li>delete file</li>
                <li>select file</li>
                <li>rename file</li>
            </ul>
        </p>
    </article>
</body>
</html>