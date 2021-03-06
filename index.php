<?php
require_once('config.php');

// je verfie que lutilisateur a bien demander une url

// je verifie dans ma base de donnée si ce code correspondant a une url existe

// si il existe, je recupere l'url original(['url']), sinon je ne fait rien.
    if(isset($_GET['url_genere'])){
        $requete = "SELECT url, clicks FROM urls WHERE url_genere = '".htmlspecialchars($_GET['url_genere'])."'";
        $exec = $bdd->query($requete);
        $resultat = $exec->fetch();

        if (isset($resultat['url'])){
            $sql = "UPDATE urls SET clicks = ".(htmlspecialchars($resultat['clicks']) + 1)." WHERE url_genere = '".htmlspecialchars($_GET['url_genere'])."'";
            $bdd->query($sql);
            header('Location: ' .$resultat['url']);
        }
    }

    if (isset($_POST['url'])) {
        if ($_POST['url'] != "") {
            //j'ai enregistrer dans ma variable $resultat du return de la fonctiongenerateRandomString
          
            $resultat = generateRandomString();
            $requete = "INSERT INTO urls (url, url_genere) VALUES ('".htmlspecialchars($_POST['url'])."', '".$resultat."')";
           
           $bdd->query($requete)or die('erreur ');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>


<div class="container theme-showcase" role="main">
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <h1>URL SHORTNER</h1>
        <p>Url shortner fait en PHP, Bootstrap, ChartJS.</p>
    </div>

    <div class="container">
        <form method="POST">
            <div class="form-group">
                <label for="url">URL:</label>
                <input required type="url" name='url' class="form-control" id="url" placeholder="Enter un url">
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-default">Envoyer</button>
            </div>
        </form>
    </div>

</div>


    <div class="container">
    <a target="_blank" class="btn btn-success" href="http://localhost/urlShortner/graph.php">Statistiques des clicks</a>

    <?php
    $requete = $bdd->query("SELECT * FROM urls ORDER BY id DESC");
    ?>
    <table class="table">
        <thead>
        <tr>
            <th>Vrai url</th>
            <th>url generé</th>
            <th>nombre de click</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($requete->fetchAll() as $resultat) { ?>
            <tr class="success">
                <td><?php echo $resultat['url'] ?></td>
                <td>
                    <a target="_blank" href="http://localhost/urlShortner/?url_genere=<?php echo $resultat['url_genere'] ?>"><?php echo $resultat['url_genere'] ?></a>
                <td>
                <td><?php echo $resultat['clicks'] ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>
