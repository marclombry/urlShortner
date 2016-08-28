<?php

//faire un tableau dans un tablo da da da da index prenom valeur marc

$tab = array(
	array(
		array(
			array(
				array(
					'toto' => array(
						array(
							'prenom' => 'marc'
							)
						)
					)
				)
			)
		)
);

print_r($tab);

//vardump des key de tout les tableau
//cree fonction qui fait que si la variable est un tableau alort je rapel la fonction elle meme
//sinon tu fait print r de la valeur

function rec($tab){
	//si c'est un array 
	if(is_array($tab)){
		//parcours le array
		foreach($tab as $t){
			//si c'est un array
			if(is_array($t)){
				//je rapel cette methode
				rec($t);
			} else {
				//sinon print_r de la valeur
				print_r($t);
			}
		}
	}
}
rec($tab);


for($i=0;$i<=10;$i++){
	for($a=0;$a<=10;$a++){
		echo "i vaut $i <br>";
		echo "a vaut $a <br>";
	}
}
