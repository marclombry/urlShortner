<?php
require_once('config.php');

// inserer l'url dans la base de donné via le formulaire
//dans le champs id_generer crée un numero aleatoire (avec condition si l'url n'existe pas on fait rien,
//sinon on insert l'url  et on génére se numero avec rand dans le champs id_generer)
if (isset($_POST)) {
	//j'ai enregistrer dans ma variable $resultat du return de la fonctiongenerateRandomString
	$resultat = generateRandomString();
 	$requete = "INSERT INTO urls (url, url_genere) VALUES ('".$_POST['url']."', '".$resultat."')";
  	$bdd->query($requete) or die('erreur ');
  	header('Location: index.php');
}
?>