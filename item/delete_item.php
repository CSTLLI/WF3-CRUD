<!--**************************************************************************************-->
<!-- 																					  -->
<!-- Project: CRUD	                                    / $$      /$$ /$$$$$$$$ /$$$$$$   -->
<!--                  			                        | $$  /$ | $$| $$_____//$$__  $$  -->
<!-- edit_item.php                                 	    | $$ /$$$| $$| $$     |__/  \ $$  -->
<!--                                                  	| $$/$$ $$ $$| $$$$$     /$$$$$/  -->
<!-- By: vcastell <valeriocastellipro@gmail.com>	    | $$$$_  $$$$| $$__/    |___  $$  -->
<!--                                              		| $$$/ \  $$$| $$      /$$  \ $$  -->
<!-- Created: 2022/02/21 15:30:00 vcastell   	        | $$/   \  $$| $$     |  $$$$$$/  -->
<!-- Updated: 2022/02/21 15:29:28 vcastell              |__/     \__/|__/      \______/   -->
<!--                                                                     				  -->
<!--**************************************************************************************-->

<?php

include_once "../header.php";
include_once "../config.php";

$item_id = intval($_GET['id']);

try {
	//echo $categorie;

	$sth = $conn -> prepare("DELETE FROM guitare WHERE id = '$item_id' ");

	// $sth->bindValue(':item_id', $item_id, PDO::PARAM_INT);

	$sth->execute();
	
	if ($sth->rowCount()){
		echo 
			"<main>
				<div class='card my-5 mx-auto w-50 text-center text-dark'>
					<p class='text-center'>L'item a été supprimé avec succès!</p>

					<a class='text-dark' href='index.php'>Retour</a>
				</div>
			</main>
		</body>
	</html>";	
	}
	
} catch(PDOException $e){
		echo "<div class='container alert alert-danger' role='alert'> Une erreur est survenue. </div>";
		echo $e->getMessage();
}

?>