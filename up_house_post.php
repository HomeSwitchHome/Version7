<?php require_once("config.php");
require 'functions.php';
// Connexion à la base de données

try
    {
	      $bdd = new PDO('mysql:host=localhost;dbname=hsh', 'root', '', [
	      		PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING
	      	]);
    }
catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }

$sql = "INSERT INTO logements (nombrePieces, adresse, description, villes_id, titre_annonce, surfaceInterieure, surfaceExterieure, nombreLitsSimples, nombreLitsDoubles, descriptionProximite, membres_idMembres, types_idTypes) VALUES(:nombrePieces, :adresse, :description, :villes_id, :titre_annonce, :surfaceInterieure, :surfaceExterieure, :nombreLitsSimples, :nombreLitsDoubles, :descriptionProximite, :membres_idMembres, :types_idTypes)";

debug($sql);

$stmt = $bdd->prepare($sql);

try {
	$stmt->execute(['nombrePieces' => $_POST['nombrePieces'], 'adresse' => $_POST['adresse'], 'description' => $_POST['description'], 'titre_annonce' => $_POST['titre_annonce'], 'surfaceInterieure' => $_POST['surfaceInterieure'], 'surfaceExterieure' => $_POST['surfaceExterieure'], 'nombreLitsSimples' => $_POST['nombreLitsSimples'], 'nombreLitsDoubles' => $_POST['nombreLitsDoubles'], 'descriptionProximite' => $_POST['descriptionProximite'], 'villes_id' => $_POST['villes_id'], 'membres_idMembres' => $_SESSION['userID'], 'types_idTypes' => $_POST['type']]);
} catch (PDOException $e) {
	echo $e->getMessage();
}


?>