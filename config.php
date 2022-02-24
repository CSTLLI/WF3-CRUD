<!--**************************************************************************************-->
<!-- 																					  -->
<!-- Project: CRUD	                                    / $$      /$$ /$$$$$$$$ /$$$$$$   -->
<!--                  			                        | $$  /$ | $$| $$_____//$$__  $$  -->
<!-- config.php                                    	    | $$ /$$$| $$| $$     |__/  \ $$  -->
<!--                                                  	| $$/$$ $$ $$| $$$$$     /$$$$$/  -->
<!-- By: vcastell <valeriocastellipro@gmail.com>	    | $$$$_  $$$$| $$__/    |___  $$  -->
<!--                                              		| $$$/ \  $$$| $$      /$$  \ $$  -->
<!-- Created: 2022/02/21 15:30:00 vcastell   	        | $$/   \  $$| $$     |  $$$$$$/  -->
<!-- Updated: 2022/02/21 15:29:28 vcastell              |__/     \__/|__/      \______/   -->
<!--                                                                     				  -->
<!--**************************************************************************************-->

<?php
	$servername = "phpmyadmin.test";
	$username = "root";
	$password = "";

	setlocale(LC_ALL, 'fr_FR.utf8','fra', 'French'); 

	try {
	$conn = new PDO("mysql:host=$servername;dbname=guitares", $username, $password);
	// set the PDO error mode to exception
	$conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$conn -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

	//echo "Connected successfully";

	} catch(PDOException $e) {
	echo "Connection failed: " . $e -> getMessage();
	die();
	}

	// $sth = $conn -> prepare("SELECT prenom AS Prenom, UPPER(nom) AS Nom, DATE_FORMAT(date_de_naissance, '%d %M %Y') AS 'Date de naissance' , reference AS 'Classe', annee AS 'Annee de promotion' FROM eleve
	// INNER JOIN classe ON classe.id_classe = eleve.classe_id
	// INNER JOIN promotion ON promotion.id_promotion = classe.promotion_id
	// ORDER BY nom ASC;");

	// $sth -> execute();
	// $result = $sth -> fetchAll();
?>