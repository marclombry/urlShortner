<?php
require_once('config.php');

// inserer l'url dans la base de donné via le formulaire
//dans le champs id_generer crée un numero aleatoire (avec condition si l'url n'existe pas on fait rien,
//sinon on insert l'url  et on génére se numero avec rand dans le champs id_generer)
if(isset($_POST)){
	function generateRandomString($length = 10) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    	$charactersLength = strlen($characters);
    	$randomString = '';
   	for ($i = 0; $i < $length; $i++) {
       		 $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
$resultat= generateRandomString();//j'ai enregistrer dans ma variable $resultat du return de la fonctiongenerateRandomString
 	 $requete = "INSERT INTO urls (url, url_genere) VALUES ('".$_POST['url']."', '".$resultat."')";// faire une requete d'insertion
  	var_dump($requete);

  	$bdd->query($requete) or die('erreur ');
}
?>
