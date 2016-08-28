<?php require_once('config.php');

// je verfie que lutilisateur a bien demander une url

// je verifie dans ma base de donnée si ce code correspondant a une url existe

// si il existe, je recupere l'url original(['url']), sinon je ne fait rien.
    if(isset($_GET['url_genere'])){
        $requete = "SELECT url, clicks FROM urls WHERE url_genere = '".$_GET['url_genere']."'";
        $exec = $bdd->query($requete);
        $resultat = $exec->fetch();

        if (isset($resultat['url'])){
            $sql = "UPDATE urls SET clicks = ".($resultat['clicks'] + 1)." WHERE url_genere = '".$_GET['url_genere']."'";
            $bdd->query($sql);
            header('Location: ' .$resultat['url']);
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
        <h1>Theme example</h1>
        <p>This is a template showcasing the optional theme stylesheet included in Bootstrap. Use it as a starting point
            to create something more unique by building on or modifying it.</p>
    </div>

    <div class="container">
        <h2>URL SHORTNER</h2>
        <form method="POST" action="traitement.php">
            <div class="form-group">
                <label for="url">URL:</label>
                <input type="url" name='url' class="form-control" id="url" placeholder="Enter un url">
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
    $bdd = new PDO('mysql:host=localhost;port=3307;dbname=urlbase', 'root', '');
    $requete = $bdd->query("SELECT * FROM urls");
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
                    <a href="http://localhost/urlShortner/?url_genere=<?php echo $resultat['url_genere'] ?>"><?php echo $resultat['url_genere'] ?></a>
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